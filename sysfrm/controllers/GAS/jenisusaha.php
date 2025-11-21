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
    $myCtrl = 'jenisusaha';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'jenisusaha');
$ui->assign('_title', 'Daftar Jenis Usaha - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Jenis Usaha');
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
        Event::trigger('jenisusaha/add/');
		_auth1('JENISUSAHA-ADD',$user['id']);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-jenis-usaha','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-jenis-usaha.tpl');
        break;

    case 'add-post':
        Event::trigger('jenisusaha/add-post/');
        _auth1('JENISUSAHA-ADD',$user['id']);

        $nama_usaha = strtoupper(_post('nama_usaha'));
        $kode_usaha = '';
        $msg = '';

        if($nama_usaha == '') {
            $msg .= 'Nama Usaha tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_jenis_usaha')->where('nama_usaha',$nama_usaha)->find_one();
        if($chk){
            $msg .= 'Nama Usaha tersebut sudah ada <br>';
        }

        if ($msg == '') {
            ORM::get_db()->beginTransaction();
            try {
                $chk = ORM::for_table('daftar_jenis_usaha')->raw_query('select * from daftar_jenis_usaha order by kode_usaha desc')->find_one();
                if($chk) {
                    $kode_usaha = ++$chk['kode_usaha'];
                } else {
                    $kode_usaha = 'JENISUSAHA/001';
                }
                $d = ORM::for_table('daftar_jenis_usaha')->create();

                $d->kode_usaha = $kode_usaha;
                $d->nama_usaha = $nama_usaha;

                $d->add_by = $user['id'];
                $d->add_date = date('Y-m-d H:i:s');
                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Jenis Usaha : '.$kode_usaha.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('jenisusaha/add-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        } else {
            echo $msg;
        }
        break;

    case 'edit':
        Event::trigger('supplier/edit/');
		_auth1('JENISUSAHA-EDIT',$user['id']);

        $cid = $routes['3'];
        $d = ORM::for_table('daftar_jenis_usaha')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-jenis-usaha','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-jenis-usaha.tpl');
        }
        break;

    case 'edit-post':
        Event::trigger('supplier/edit-post/');
        _auth1('JENISUSAHA-EDIT',$user['id']);

        $id = _post('cid');
        $nama_usaha = strtoupper(_post('nama_usaha'));

        $msg = '';
        if($nama_usaha == '') {
            $msg .= 'Nama Usaha tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_jenis_usaha')->where('nama_usaha', $nama_usaha)->where_not_equal('id', $id)->find_one();
        if($chk){
            $msg .= 'Nama Usaha tersebut sudah ada <br>';
        }

		$d = ORM::for_table('daftar_jenis_usaha')->find_one($id);
        if($d){
            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('daftar_jenis_usaha')->find_one($id);
					$d->nama_usaha = $nama_usaha;

					$d->edit_by = $user['id'];
					$d->edit_date = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Data Jenis Usaha : '.$kode_usaha.' [CID: '.$id.']',$user['username'],$user['id']);
                    Event::trigger('jenisusaha/edit-post/_on_finished');
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
            r2(U.'jenisusaha/list', 'e', 'Data Jenis Usaha tersebut tidak ditemukan');
        }
        break;

    case 'list':
        Event::trigger('jenisusaha/list');
		_auth1('SHOW-SUPPLIER',$user['id']);
        $msg = $routes[3];
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-jenis-usaha','dp/dist/datepicker.min','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-jenis-usaha.tpl');
        break;

    default:
        echo 'action not defined';
}