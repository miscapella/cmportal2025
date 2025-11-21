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
    $myCtrl = 'jabatan';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'listjabatan');
$ui->assign('_title', 'Daftar Jabatan - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Jabatan');
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
        Event::trigger('jabatan/add/');
		_auth1('JABATAN-ADD',$user['id']);
        $departemen = '';
        $tg = ORM::for_table('daftar_departemen')->order_by_asc('dep_id')->find_many();
        foreach ($tg as $r) {
            $departemen .= '<option value="'.$r['dep_id'].'">'.$r['dep_id'].' - '.$r['dep_name'].'</option>';
        }
        $ui->assign('departemen', $departemen);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-jabatan','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-jabatan.tpl');
        break;

    case 'add-post':
        Event::trigger('jabatan/add-post/');

        $id_jabatan = _post('id_jabatan');
        $nama_jabatan = _post('nama_jabatan');
        $id_departemen = _post('id_departemen');

        $msg = '';
        if($id_jabatan == ''){
            $msg .= 'Id Jabatan tidak boleh kosong. <br>';
        }
        if($nama_jabatan == ''){
            $msg .= 'Nama Jabatan tidak boleh kosong. <br>';
        }
        if($id_departemen == ''){
            $msg .= 'Id Departemen tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_jabatan')->where('id_jabatan',$id_jabatan)->find_one();
        if($chk){
            $msg .= 'Id Jabatan tersebut sudah ada <br>';
        }
        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_jabatan')->create();

                $d->id_jabatan = $id_jabatan;
                $d->nama_jabatan = $nama_jabatan;
                $d->dep_id = $id_departemen;

                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Jabatan : '.$person_id.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('jabatan/add-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            echo $msg;
        }
        break;

    case 'edit':
        Event::trigger('jabatan/edit/');

        _auth1('JABATAN-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_jabatan')->find_one($cid);
        
        if($d){
            $departemen = '';
            $tg = ORM::for_table('daftar_departemen')->order_by_asc('dep_id')->find_many();
            foreach ($tg as $r) {
                if($r['dep_id'] == $d['dep_id']) {
                    $departemen .= '<option value="'.$r['dep_id'].'" selected>'.$r['dep_id'].' - '.$r['dep_name'].'</option>';
                } else {
                    $departemen .= '<option value="'.$r['dep_id'].'">'.$r['dep_id'].' - '.$r['dep_name'].'</option>';
                }
            }

            $ui->assign('departemen', $departemen);
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-jabatan','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-jabatan.tpl');
        }
        break;

    case 'edit-post':
        Event::trigger('jabatan/edit-post/');

        $id = _post('cid');
        $id_jabatan = _post('id_jabatan');
        $nama_jabatan = _post('nama_jabatan');
        $id_departemen = _post('id_departemen');

        $msg = '';
        if($id_jabatan == ''){
            $msg .= 'Id Jabatan tidak boleh kosong. <br>';
        }
        if($nama_jabatan == ''){
            $msg .= 'Nama Jabatan tidak boleh kosong. <br>';
        }
        if($id_departemen == ''){
            $msg .= 'Id Departemen Id tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('daftar_jabatan')->where('id_jabatan',$id_jabatan)->find_one();
        if($chk && $chk['id'] != $id){
            $msg .= 'Kode Jabatan tersebut sudah ada <br>';
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_jabatan')->find_one($id);

                $d->id_jabatan = $id_jabatan;
                $d->nama_jabatan = $nama_jabatan;
                $d->dep_id = $id_departemen;
                $d->picture;
                $d->save();

                ORM::get_db()->commit();
                _log1('Edit Data Jabatan : '.$emp_id.' [CID: '.$id.']',$user['username'],$user['id']);
                Event::trigger('jabatan/edit-post/_on_finished');
                echo $id;
            }
            catch(PDOException $ex) {
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
        Event::trigger('jabatan/list/');
		_auth1('JABATAN-LIST',$user['id']);
        $msg = $routes['3'];
        $d = ORM::for_table('daftar_jabatan')->find_many();
        $ui->assign('d',$d);
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-jabatan','dp/dist/datepicker.min','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-jabatan.tpl');
        break;

    default:
        echo 'action not defined';
}