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
    $myCtrl = 'penerimaan';
}
_auth();
$ui->assign('_sysfrm_menu', 'distribusi');
$ui->assign('_title', 'Penerimaan - '. $config['CompanyName']);
$ui->assign('_st', 'penerimaan');
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
        Event::trigger('penerimaan/list/');

		_auth1('PENERIMAAN-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('spbi_master','no_bpnb','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('spbi_master')->where_like('no_bpnb','%'.$name.'%')->where('status', 'DITERIMA')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_bpnb')->find_many();
            $cd = ORM::for_table('spbi_master')->where_like('no_bpnb','%'.$name.'%')->where('status', 'DITERIMA')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_bpnb')->count();
        }
        else{
            $paginator = Paginator::bootstrap('spbi_master','','','','','','','','','50','');
            $d = ORM::for_table('spbi_master')->where('status', 'DITERIMA')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_bpnb')->find_many();
            
            $cd = ORM::for_table('spbi_master')->where('status', 'DITERIMA')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_bpnb')->count();
        }

        $tg = ORM::for_table('daftar_supplier')->find_many();
        $tg2 = ORM::for_table('po_master')->find_many();
        
        $ui->assign('tg',$tg);
        $ui->assign('tg2',$tg2);
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'listpenerimaan');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-bpnb.tpl');
        break;

    case 'add':

        Event::trigger('penerimaan/add/');
        _auth1('PENERIMAAN-ADD',$user['id']);

        $clist = '';
        $clist = '<option value="">Pilih No. SBPI</option>';
        $tg = ORM::for_table('spbi_master')->where('status','DIKIRIM')->find_many();
            
        foreach ($tg as $r) {
            $clist .= '<option value="'.$r['no_spbi'].'">'.$r['no_spbi'].'</option>';
        }
        $idate = date('d-m-Y');
        $ui->assign('opt_spbi',$clist);
        $ui->assign('idate',$idate);
        $ui->assign('_sysfrm_menu2', 'addpenerimaan');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-bpnb','dp/dist/datepicker.min','btn-top/btn-top','numeric')));

        $ui->display($spath.'add-bpnb.tpl');
        break;

    case 'add-post':
        Event::trigger('penerimaan/add-post/');

        $no_pr = explode(',', _post('no_pr'));
        $kd_item = explode(',', _post('kd_item'));
        $no_spbi = _post('spbi');
        $pesan = _post('pesan');
        $msg = '';
        $msg_item = '';
        $i = 0;
        $ii = 0;
        foreach($no_pr as $code) {
            if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
            if($code <> '') $ii++;
            $i++;
        }
        if($ii > 0) {
            if($msg_item <> '')
                $msg .= $msg_item.'<br>';
        } else $msg .= 'Belum ada data Request<br>';

        if($no_spbi == ''){
            $msg .= 'Nomor SPBI tidak boleh kosong';
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $tgl_bpnb = Validator::Date1(_post('idate'));
                $bl=date('n',strtotime($tgl_bpnb));
                $th=date('Y', strtotime($tgl_bpnb));
                $chk = ORM::for_table('spbi_master')->raw_query('select * from spbi_master where month(tgl_bpnb)='.$bl.' and year(tgl_bpnb)='.$th.' order by no_bpnb desc')->find_one();
                if($chk) {
                    $no = ++$chk['no_bpnb'];
                } else {
                    $no = 'BPNB/'.$th.'/'.date('m',strtotime($tgl_bpnb)).'/0001';
                }
                $i = 0;
                foreach($no_pr as $code) {
                    $snopr = $no_pr[$i];
                    $skditem = $kd_item[$i];
                    
                    $y = ORM::for_table('pr_detail')->where('no_pr', $snopr)->where('kd_item', $skditem)->find_one();
                    $y->status = 'DITERIMA';
                    $y->save();
                    $i++;
                }

                $d = ORM::for_table('spbi_master')->where('no_spbi', $no_spbi)->find_one();
                $no_po = $d['no_po'];
                $d->no_bpnb = $no;
                $d->tgl_bpnb = $tgl_bpnb;
                $d->keterangan_bpnb = $pesan;
                $d->status = 'DITERIMA';
                $d->diterima_oleh = $user['id'];
                $d->diterima_nama = $user['fullname'];
                $d->diterima_tgl = date('Y-m-d H:i:s');
                $d->save();

                $e = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
                $e->status = 'DITERIMA';
                $e->save();

                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data BPNB : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('penerimaan/add-po-post/_on_finished');
                $data = array(
                        'msg'			=>  'Berhasil Update. No. BPNB : '.$no,
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

    case 'render-bpnb':
        $kode = _post('kode');
        if($kode <> '') {
            $w = ORM::for_table('spbi_master')->where('no_spbi', $kode)->find_one();
            $po = ORM::for_table('po_master')->where('no_po', $w['no_po'])->find_one();
            $supplier = ORM::for_table('daftar_supplier')->where('kd_supplier', $po['kd_supplier'])->find_one();
            $nm_supplier = $supplier['kd_supplier'] .' - '. $supplier['nm_supplier'];
            $x = ORM::for_table('spbi_detail')->where('no_spbi', $kode)->find_many();
            $clist = '';
            $nourut = 1;
            foreach($x as $item) {
                $y = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
                $clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">'. $nourut .'</td>
                            <td><input type="text" name="no_po[]" class="no_po" value="'. $w['no_po'] .'" readonly></td>
                            <td><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" readonly></td>
                            <td><select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item"><option value="'. $item["kd_item"] .'">'. $y["nm_item"] .'</option></select></td>
                            <td><input type="text" name="qty_req[]" class="qty_req amount" value='. $item["qty"] .' readonly></td>
                            <td><input type="text" name="satuan[]" class="satuan" value="'. $y["satuan"] .'" readonly></td>
                ';
                $nourut++;
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