<?php
// ***************************************************************************
// **                                                                       **
// ** Email : fortunate@fortunateshop.com                                   **
// ** Website : www.fortunateshop.com                                       **
// ** Copyright (c) Taniwan. All Rights Reserved                            **
// **                                                                       **
// ***************************************************************************
// **                                                                       **
// ** This software is furnished under a license and may be used and copied **
// ** only  in  accordance  with  the  terms  of such  license and with the **
// ** inclusion of the above copyright notice.                              **
// **                                                                       **
// ***************************************************************************

if(!isset($myCtrl)){
    $myCtrl = 'pengiriman';
}
_auth();
$ui->assign('_sysfrm_menu', 'distribusi');
$ui->assign('_title', 'Pengiriman - '. $config['CompanyName']);
$ui->assign('_st', 'Pengiriman');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'list':
        Event::trigger('pengiriman/list/');

		_auth1('PENGIRIMAN-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('spbi_master','no_spbi','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('spbi_master')->where_like('no_spbi','%'.$name.'%')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_spbi')->find_many();
            $cd = ORM::for_table('spbi_master')->where_like('no_spbi','%'.$name.'%')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_spbi')->count();
        }
        else{
            $paginator = Paginator::bootstrap('spbi_master','','','','','','','','','50','');
            $d = ORM::for_table('spbi_master')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_spbi')->find_many();
            
            $cd = ORM::for_table('spbi_master')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_spbi')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'listpengiriman');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-spbi.tpl');
        break;

    case 'add':

        Event::trigger('pengiriman/add/');
        _auth1('PENGIRIMAN-ADD',$user['id']);

        $clist = '';
        $clist = '<option value="">Pilih No PO</option>';
        $tg = ORM::for_table('po_master')->where('status','APPROVE')->find_many();
            
        foreach ($tg as $r) {
            $clist .= '<option value="'.$r['no_po'].'">'.$r['no_po'].'</option>';
        }
        $idate = date('d-m-Y');
        $ui->assign('opt_po',$clist);
        $ui->assign('idate',$idate);
        $ui->assign('_sysfrm_menu2', 'addpengiriman');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-spbi','dp/dist/datepicker.min','btn-top/btn-top','numeric')));

        $ui->display($spath.'add-spbi.tpl');
        break;

    case 'add-post':
        Event::trigger('pengiriman/add-post/');

        $no_pr = explode(',', _post('no_pr'));
        $kd_item = explode(',', _post('kd_item'));
        $qty_req = explode(',', _post('qty_req'));
        $keterangan = explode(',', _post('keterangan'));
        $no_po = _post('no_po');
        $kepada = _post('kepada');
        $pesan = _post('pesan');
        $msg = '';
        $msg_item = '';
        $msg_qty = '';
        $i = 0;
        $ii = 0;
        foreach($no_pr as $code) {
            if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
            if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
            if($code <> '') $ii++;
            $i++;
        }
        if($ii > 0) {
            if($msg_item <> '')
                $msg .= $msg_item.'<br>';
            if($msg_qty <> '')
                $msg .= $msg_qty.'<br>';
        } else $msg .= 'Belum ada data Request<br>';

        if($kepada == ''){
            $msg .= 'Kepada tidak boleh kosong';
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $tgl_spbi = Validator::Date1(_post('idate'));
                $bl=date('n',strtotime($tgl_spbi));
                $th=date('Y', strtotime($tgl_spbi));
                $chk = ORM::for_table('spbi_master')->raw_query('select * from spbi_master where month(tgl_spbi)='.$bl.' and year(tgl_spbi)='.$th.' order by no_spbi desc')->find_one();
                if($chk) {
                    $no = ++$chk['no_spbi'];
                } else {
                    $no = 'SPBI/'.$th.'/'.date('m',strtotime($tgl_spbi)).'/0001';
                }
                $i = 0;
                $total = 0;
                foreach($no_pr as $code) {
                    $snopr = $no_pr[$i];
                    $skditem = $kd_item[$i];
                    $sqty = str_replace(".", "", $qty_req[$i]);
                    $sket = $keterangan[$i];
                    
                    $y = ORM::for_table('spbi_detail')->create();
                    $y->no_spbi = $no;
                    $y->no_pr = $snopr;
                    $y->kd_item = $skditem;
                    $y->qty = $sqty;
                    $y->keterangan = $sket;
                    $y->save();

                    $z = ORM::for_table('pr_detail')->where('no_pr', $snopr)->where('kd_item', $skditem)->find_one();
                    $z->status = 'DIKIRIM';
                    $z->save();
                    $i++;
                }

                $d = ORM::for_table('spbi_master')->create();
                $d->no_spbi = $no;
                $d->no_po = $no_po;
                $d->tgl_spbi = $tgl_spbi;
                $d->keterangan = $pesan;
                $d->kepada = $kepada;
                $d->status = 'DIKIRIM';
                $d->dibuat_oleh = $user['id'];
                $d->dibuat_nama = $user['fullname'];
                $d->dibuat_tgl = date('Y-m-d H:i:s');
                $d->save();

                $status = 'Full';
                $detail = ORM::for_table('po_detail')->where('no_po', $no_po)->find_many();
                foreach($detail as $item) {
                    $pr = ORM::for_table('pr_detail')->where('no_pr', $item['no_pr'])->where('kd_item', $item['kd_item'])->find_one();
                    if($pr['status'] != 'DIKIRIM') {
                        $status = 'Tidak';
                        break;
                    }
                }

                if($status == 'Full'){
                    $e = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
                    $e->status = 'DIKIRIM';
                    $e->save();
                }
               
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data SPBI : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('pengiriman/add-po-post/_on_finished');
                $data = array(
                        'msg'			=>  'Berhasil Update. No. SPBI : '.$no,
                        'dataval'		=>	1);
                echo json_encode($data);
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            $data = array(
                    'msg'			=>  $msg,
                    'dataval'		=>	'a');
            echo json_encode($data);
        }
        break;  

    case 'render-spbi':
        $kode = _post('kode');
        if($kode <> '') {
            $w = ORM::for_table('po_master')->where('no_po', $kode)->find_one();
            $supplier = ORM::for_table('daftar_supplier')->where('kd_supplier', $w['kd_supplier'])->find_one();
            $nm_supplier = $supplier['kd_supplier'] .' - '. $supplier['nm_supplier'];
            $x = ORM::for_table('po_detail')->where('no_po', $kode)->find_many();
            $clist = '';
            foreach($x as $item) {
                $y = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
                $z = ORM::for_table('pr_detail')->where('no_pr', $item["no_pr"])->where('kd_item', $item["kd_item"])->find_one();
                if($z['status'] == 'DONE') {
                    $clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                    <td><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" readonly></td>
                    <td><select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item"><option value="'. $item["kd_item"] .'">'. $y["nm_item"] .'</option></select></td>
                    <td><input type="text" name="qty_req[]" class="qty_req amount" value='. $item["qty_req"] .' readonly></td>
                    <td><input type="text" name="satuan[]" class="satuan" value="'. $y["satuan"] .'" readonly></td>
                    <td><input type="text" name="keterangan[]" class="keterangan"></td>
                    ';
                }
                
            };
            
            $data = array(
                    'clist'			=>	$clist,
                    'nm_supplier' => $nm_supplier);
            echo json_encode($data);
            
        } else {
            $data = array(
                    'clist'	=>	'<option value="">Pilih No PO</option>',
                    'nm_supplier' => '');
            echo json_encode($data);
        }
        
        break;

   default:
        echo 'action not defined';
}