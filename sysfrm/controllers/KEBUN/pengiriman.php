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
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
        $ui->assign('_sysfrm_menu2', 'listpengiriman');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-spbi','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'list-spbi.tpl');
        break;

    case 'add':
        Event::trigger('pengiriman/add/');
        _auth1('PENGIRIMAN-ADD',$user['id']);
        // Edit by ramiro 21/02/2024
        $po_id = $routes['3'];
        $default_po = ORM::for_table('po_master')->where('status', 'APPROVE')->where('id', $po_id)->find_one();
        if ($default_po) {
            $plist = '';
            //$nama_supplier = $supplier['kode_supplier'] .' - '. $supplier['nama_supplier'];
            $pg = ORM::for_table('daftar_via_pengiriman')->find_many();
            foreach ($pg as $g) {
                $plist .= '<option value="'.$g['kode_via'].$g['resi'].'">'.$g['nama_pengiriman'].'</option>';
            }
            $ulist = '';
            //$nama_supplier = $supplier['kode_supplier'] .' - '. $supplier['nama_supplier'];
            $ug = ORM::for_table('sys_users', 'dblogin')->where('golongan','1')->find_many();
            foreach ($ug as $q) {
                $ulist .= '<option value="'.$q['username'].'">'.$q['fullname'].' - '. $q['username'].'</option>';
            }

            $clist = '';
            $clist = '<option value="'.$default_po['no_po'].'">'. $default_po['no_po'] .'</option>';
            $tg = ORM::for_table('po_master')->where('status','APPROVE')->where_not_equal('id', $po_id)->find_many();
            foreach ($tg as $r) {
                $clist .= '<option value="'.$r['no_po'].'">'.$r['no_po'].'</option>';
            }
            $idate = date('d-m-Y');
            $ui->assign('opt_po',$clist);
            $ui->assign('opt_user',$ulist);
            $ui->assign('opt_pengiriman',$plist);
            $ui->assign('idate',$idate);
            $ui->assign('_sysfrm_menu2', 'pendingpengiriman');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-spbi','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'add-spbi.tpl');
        } else r2(U.'pengiriman/pending', 'e', 'No. PO tersebut tidak ditemukan');
        break;

    case 'add-post':
        Event::trigger('pengiriman/add-post/');
        $no_pr = explode(',', _post('no_pr'));
        $kode_item = explode(',', _post('kode_item'));
        $qty_req = explode(',', _post('qty_req'));
        $keterangan = explode(',', _post('keterangan'));
        $no_po = _post('no_po');
        $kode_via = _post('kode_via');
        $kepada = _post('kepada');
        $pesan = _post('pesan');
        $file_spbi = _post('sfile_spbi');
        $no_resi = _post('no_resi');
        $msg = '';
        $msg_item = '';
        $msg_qty = '';
        $i = 0;
        $ii = 0;
        foreach($no_pr as $code) {
            if($kode_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
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
        if(strlen($no_resi)>25){
            $msg .= 'No. Resi maksimal 25 karakter, Jika lebih input No. Resi pada keterangan SPBI<br>';
        }
        if($kepada == ''){
            $msg .= 'Kepada tidak boleh kosong<br>';
        }
        if($file_spbi == ''){
            $msg .= 'Bukti pengiriman tidak boleh kosong<br>';
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
                $isi = '';
                foreach($no_pr as $code) {
                    $snopr = $no_pr[$i];
                    $skodeitem = $kode_item[$i];
                    $sqty = str_replace(".", "", $qty_req[$i]);
                    $sket = $keterangan[$i];
                    $y = ORM::for_table('spbi_detail')->create();
                    $y->no_spbi = $no;
                    $y->no_pr = $snopr;
                    $y->kode_item = $skodeitem;
                    $y->qty = $sqty;
                    $y->keterangan = $sket;
                    $y->save();

                    $z = ORM::for_table('pr_detail')->where('no_pr', $snopr)->where('kode_item', $skodeitem)->find_one();
                    $z->status = 'DIKIRIM';
                    $z->save();
                    $i++;
                    $item = ORM::for_table('daftar_itemstock')->where('kode_item', $skodeitem)->find_one();
                    $isi .= "<b>SURAT PENGANTARAN BARANG INTERN ITEM #". $i ."</b>";
					$isi .= "
                            No PR : ". $snopr ." <br>
							Item : ". $item['nama_item'] ." <br>
							Qty Kirim : ". number_format($sqty, 0, '', '.') ." <br>
							Satuan : ". $item['satuan'] ." <br>
							Keterangan : ". $sket ." <br><br>
                            ";
							// Satuan : ". number_format($sqty, 0, '', '.') ." <br>
                }

                $d = ORM::for_table('spbi_master')->create();
                $d->no_spbi = $no;
                $d->no_po = $no_po;
                $d->tgl_spbi = $tgl_spbi;
                $d->keterangan = $pesan;
                $d->kode_via = $kode_via;
                $d->kepada = $kepada;
                $d->file_spbi = $file_spbi;
                $d->no_resi = $no_resi;
                
                $d->status = 'DIKIRIM';
                $d->dibuat_oleh = $user['id'];
                $d->dibuat_nama = $user['fullname'];
                $d->dibuat_tgl = date('Y-m-d H:i:s');
                $d->save();
                $status = 'Full';
                $detail = ORM::for_table('po_detail')->where('no_po', $no_po)->find_many();
                foreach($detail as $item) {
                    $pr = ORM::for_table('pr_detail')->where('no_pr', $item['no_pr'])->where('kode_item', $item['kode_item'])->find_one();
                    if($pr['status'] != 'DIKIRIM') {
                        $status = 'Tidak';
                        break;
                    }
                }
                $e = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
                if($status == 'Full'){
                    $e->status = 'DIKIRIM';
                    $e->save();
                }
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data SPBI : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

                // $detail_item_array = ORM::for_table('daftar_itemstock')->where_in('kode_item', $kode_item_array)->find_many();
                $i = 0;
                foreach($kode_item_array as $each_pr) {
                    
                    $i++;
                    
                }

                $supplier = ORM::for_table('daftar_supplier')->where('kode_supplier', $e['kode_supplier'])->find_one();
                $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Spbi:Spbi Pengiriman')->find_one();
				$to = [$kepada];
				// $g = ORM::for_table('daftar_approval')->where('kode_dept', $user['kode_dept'])->where_in('setting', array('pr_disetujui', 'pr_diketahui', 'pr_diperiksa'))->find_many();
				// if($g) $to = [];
				foreach($g as $gs) {
					$to = array_merge($to, explode('|', $gs['approval']));
				}
                $subject = new Template($e['subject']);
                $subject->set('business_name', $config['CompanyName']);
                $subj = $subject->output();
                $message = new Template($e['message']);
                $message->set('business_name', $config['CompanyName']);
				$message->set('isi', $isi);
                // No Spbi
                $message->set('no_spbi', $no);
                // Tanggal SPbi
                $message->set('tgl_spbi', $tgl_spbi);
                // Supplier
                $message->set('supplier', $supplier['nama_supplier']);
                // No PO
                $message->set('no_po', $no_po);
				// $message->set('kepentingan', $priority);
				$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
                $message_o = $message->output();
				foreach($to as $item){
					Notify_Email::_send($item,$item,$subj,$message_o);
				}

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
        
    // Added by steven 12/12/2023
    case 'pending':
        Event::trigger('pengiriman/pending/');
		_auth1('PR-LIST',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
        $ui->assign('_sysfrm_menu2', 'pendingpengiriman');
        $ui->assign('xfooter', Asset::js(array($spath.'list-spbi-pending')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\'; ');
        $ui->display($spath.'list-spbi-pending.tpl');
        break;

    case 'render-spbi':
        $kode = _post('kode');
        if($kode <> '') {
            $w = ORM::for_table('po_master')->where('no_po', $kode)->find_one();
            $supplier = ORM::for_table('daftar_supplier')->where('kode_supplier', $w['kode_supplier'])->find_one();
            $nama_supplier = $supplier['kode_supplier'] .' - '. $supplier['nama_supplier'];
            $x = ORM::for_table('po_detail')->where('no_po', $kode)->find_many();
            $clist = '';
            foreach($x as $item) {
                $y = ORM::for_table('daftar_itemstock')->where('kode_item', $item["kode_item"])->find_one();
                $z = ORM::for_table('pr_detail')->where('no_pr', $item["no_pr"])->where('kode_item', $item["kode_item"])->find_one();
                if($z['status'] == 'DONE') {
                    $clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                    <td><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" readonly></td>
                    <td><select name="kode_item[]" class="kode_item" id="kode_item" class="kode_item"><option value="'. $item["kode_item"] .'">'. $y["nama_item"] .'</option></select></td>
                    <td><input type="text" name="qty_req[]" class="qty_req amount" value='. $item["qty_req"] .' readonly></td>
                    <td><input type="text" name="satuan[]" class="satuan" value="'. $y["satuan"] .'" readonly></td>
                    <td><input type="text" name="keterangan[]" class="keterangan"></td>
                    ';
                }
            };
            $data = array(
                    'clist'			=>	$clist,
                    'nama_supplier' => $nama_supplier);
            echo json_encode($data);
        } else {
            $data = array(
                    'clist'	=>	'<option value="">Pilih No PO</option>',
                    'nama_supplier' => '');
            echo json_encode($data);
        }
        break;
    //add by Ramiro 23 Feb 2024 09:31
    case 'upload-file':
        if(isset($_FILES['file']['name'])){
            $filename = $_FILES['file']['name'];
            $timestamp = time();
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $allowed_extensions = array("jpg","jpeg","png");
            $response = array();
            $status = 0;
            if(in_array(strtolower($extension), $allowed_extensions)) {
                $new_filename = $timestamp . '.' . $extension;
                $location = "uploads/KEBUN/" . $new_filename;
                if (file_exists($location)) {
                    $status = 2;
                } else {
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
                        $status = 1; 
                        $response['path'] = $location;
                        $response['extension'] = $extension;
                    }
                }
            }
            $response['status'] = $status;
            $response['filename'] = $new_filename;
            echo json_encode($response);
            exit;
        }
        echo 0;
        break;

    
   default:
        echo 'action not defined';
}