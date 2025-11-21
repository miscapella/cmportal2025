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
    $myCtrl = 'departemen';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'listdepartemen');
$ui->assign('_title', 'Daftar Departemen - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Departemen');
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
        Event::trigger('departemen/add/');
		_auth1('DEPARTEMEN-ADD',$user['id']);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-departemen','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-departemen.tpl');
        break;
    
    case 'add-post':
        Event::trigger('departemen/add-post/');

        $kode_departemen = _post('kode_departemen');
        $nama_departemen = _post('nama_departemen');
        
        $msg = '';
        if($kode_departemen == ''){
            $msg .= 'Kode Departemen tidak boleh kosong. <br>';
        }
        if($nama_departemen == ''){
            $msg .= 'Nama Departemen tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_departemen')->where('dep_id',$kode_departemen)->find_one();
        if($chk){
            $msg .= 'Kode Departemen tersebut sudah ada <br>';
        }

        if($msg == ''){

            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_departemen')->create();

                $d->dep_id = strtoupper($kode_departemen);
                $d->dep_name = strtoupper($nama_departemen);
                
                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Departemen : '.$kode_departemen.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('departemen/add-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
            }
        }
        else{
            echo $msg;
        }
        break;

    case 'edit':
        Event::trigger('departemen/edit/');

        _auth1('DEPARTEMEN-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_departemen')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-departemen','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-departemen.tpl');
        }
        break;

    case 'edit-post':
        Event::trigger('departemen/edit-post/');

        $id = _post('cid');
        $kode_departemen_sebelum = _post('kode_departemen_sebelum');
        $kode_departemen = _post('kode_departemen');
        $nama_departemen = _post('nama_departemen');

        $msg = '';
        if($kode_departemen == ''){
            $msg .= 'Kode Departemen tidak boleh kosong. <br>';
        }
        if($nama_departemen == ''){
            $msg .= 'Nama Departemen tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_departemen')->where('dep_id',$kode_departemen)->find_one();
        if($chk && $chk['id'] != $id){
            $msg .= 'Kode Departemen tersebut sudah ada <br>';
        }
        

        $d = ORM::for_table('daftar_departemen')->find_one($id);
        if($d){
            if($msg == ''){
                ORM::get_db()->beginTransaction();
                try {
                    $k = ORM::for_table('daftar_karyawan')->where('role_group_id',$kode_departemen_sebelum)->find_many();
                    foreach($k as $r) {
                        $r->role_group_id = strtoupper($kode_departemen);
                        $r->save();
                    }

                    $d = ORM::for_table('daftar_departemen')->find_one($id);
                    $d->dep_id = strtoupper($kode_departemen);
                    $d->dep_name = strtoupper($nama_departemen);
                    $d->save();

                    ORM::get_db()->commit();
                    _log1('Edit Data Departemen : '.$kode_supplier.' [CID: '.$id.']',$user['username'],$user['id']);
                    Event::trigger('departemen/add-post/_on_finished');
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
            r2(U.'karyawan/list', 'e', 'Data Karyawan tersebut tidak ditemukan');
        }
        break;

    case 'list':
        Event::trigger('departemen/list/');
		_auth1('DEPARTEMEN-LIST',$user['id']);
        $msg = $routes[3];
        $d = ORM::for_table('daftar_departemen')->find_many();
        $ui->assign('d',$d);
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-departemen','dp/dist/datepicker.min','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-departemen.tpl');
        break;

    default:
        echo 'action not defined';
}