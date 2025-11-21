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
    $myCtrl = 'supplier';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'listviapengiriman');
$ui->assign('_title', 'Daftar Via Pengiriman - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Via Pengiriman');
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
    case 'add':
        Event::trigger('viapengiriman/add/');
		_auth1('PENGIRIMAN-ADD',$user['id']);
       
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-pengiriman','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-pengiriman.tpl');
        break;

    case 'edit':
        Event::trigger('viapengiriman/edit/');

		_auth1('PENGIRIMAN-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_via_pengiriman')->find_one($cid);
      
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-pengiriman','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-pengiriman.tpl');
        }
        break;

    case 'add-post':
        Event::trigger('viapengiriman/add-post/');

        $kode_via = _post('kode_via');
        $nama_pengiriman = _post('nama_pengiriman');
        $resi = _post('resi');
       
        $msg = '';
        if($kode_via == ''){
            $msg .= 'Kode Via tidak boleh kosong. <br>';
        }
        if($nama_pengiriman == ''){
            $msg .= 'Nama Pengiriman tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_via_pengiriman')->where('kode_via',$kode_via)->find_one();
        if($chk){
            $msg .= 'Kode Via tersebut sudah ada <br>';
        }
        if($msg == ''){

            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_via_pengiriman')->create();

                $d->kode_via = strtoupper($kode_via);
                $d->nama_pengiriman = strtoupper($nama_pengiriman);
                if($resi == 'Y') {
                    $d->resi = 'Y';
                } else {
                    $d->resi = 'N';
                }

                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Pengiriman : '.$kode_via.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('viapengiriman/add-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex){
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            echo $msg;
        }
        break;

    case 'list':
        Event::trigger('viapengiriman/list/');
		_auth1('VIAPENGIRIMAN-LIST',$user['id']);
        $msg = $routes[3];
        $d = ORM::for_table('daftar_via_pengiriman')->find_many();
        $ui->assign('d',$d);
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-pengiriman','dp/dist/datepicker.min','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-pengiriman.tpl');
        break;

    case 'edit-post':
        Event::trigger('viapengiriman/edit-post/');

        $id = _post('cid');
        $kode_via = _post('kode_via');
        $nama_pengiriman = _post('nama_pengiriman');
        $resi = _post('resi');
        
        $msg = '';
        if($kode_via == ''){
            $msg .= 'Kode Via tidak boleh kosong. <br>';
        }
        if($nama_pengiriman == ''){
            $msg .= 'Nama Pengiriman tidak boleh kosong. <br>';
        }
        

		$d = ORM::for_table('daftar_via_pengiriman')->find_one($id);
        if($d){
            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('daftar_via_pengiriman')->find_one($id);
                    $d->kode_via = $kode_via;
					$d->nama_pengiriman = strtoupper($nama_pengiriman);
                    if($resi == 'Y') {
                        $d->resi = 'Y';
                    } else {
                        $d->resi = 'N';
                    }
                    
                    
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Data pengiriman : '.$kode_via.' [CID: '.$id.']',$user['username'],$user['id']);
                    Event::trigger('viapengiriman/add-post/_on_finished');
                    echo $id;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else{
                echo $msg;
            }

        }
        else{
            r2(U.'supplier/list', 'e', 'Data Supplier tersebut tidak ditemukan');
        }
        break;

    
    
    default:
        echo 'action not defined';
}