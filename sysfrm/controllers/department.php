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
    $myCtrl = 'department';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Unit Usaha'.' - '. $config['CompanyName']);
$ui->assign('_st', "Unit Usaha");
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$username = $user["username"];

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

switch ($action) {
    case 'list':
        Event::trigger('department/list/');

		_auth1('OPEN-DEPARTMENT',$user['id']);
        $nama_dept = _post('nama_dept');
			$ui->assign('_sysfrm_menu1', 'department');
			$ui->assign('_sysfrm_menu2', 'listdepartment');
        $ui->assign('nama_dept',$nama_dept);
        if($nama_dept != ''){
            $paginator = Paginator::bootstrap('daftar_department','kode_dept','%'.$nama_dept.'%','','','','','','','50','dblogin');
            $d = ORM::for_table('daftar_department','dblogin')->where_like('nama_dept','%'.$nama_dept.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }
        else{
            $paginator = Paginator::bootstrap('daftar_department','','','','','','','','','50','dblogin');
            $d = ORM::for_table('daftar_department','dblogin')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('nama_dept')->find_many();
        }

        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/list-department.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display('list-department.tpl');
        break;
        
    case 'add':
        Event::trigger('department/add/');
		_auth1('ADD-DEPARTMENT',$user['id']);
		$ui->assign('_sysfrm_menu1', 'department');
		$ui->assign('_sysfrm_menu2', 'adddepartment');
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'add-department')));
        
        $ui->display('add-department.tpl');
        break;

    case 'add-post':
        Event::trigger('department/add-post/');
        $kode_dept = _post('kode_dept');
        $nama_dept = _post('nama_dept');
        $atasan = _post('atasan');
        
        $msg = '';

        if($kode_dept == ''){
            $msg .= 'Kode Department tidak boleh kosong <br>';
        }
        if(!Validator::FixLength($kode_dept,3)){
            $msg .= 'Kode Department harus berisi 3 huruf <br>';
        }
        $chk = ORM::for_table('daftar_department','dblogin')->where('kode_dept',$kode_dept)->find_one();
        if($chk){
            $msg .= 'Kode Department tersebut telah ada <br>';
        }
        
        if($nama_dept == ''){
            $msg .= 'Nama Department tidak boleh kosong <br>';
        }
        $chk = ORM::for_table('daftar_department','dblogin')->where('nama_dept',$nama_dept)->find_one();
        if($chk){
            $msg .= 'Nama Department tersebut telah ada <br>';
        }
        
        if($atasan == ''){
            $msg .= 'Atasan tidak boleh kosong <br>';
        }

        if($msg == ''){
            ORM::get_db('dblogin')->beginTransaction();
			try {
                $d = ORM::for_table('daftar_department','dblogin')->create();

                $d->kode_dept = $kode_dept;
                $d->nama_dept = $nama_dept;
                $d->atasan = $atasan;
                $d->add_date = date('Y-m-d H:i:s');
                $d->add_by = $username;

                //
                $d->save();
                ORM::get_db('dblogin')->commit();
                $cid = $d->id();
                _log('Tambah Department'.$nama_dept.' [CID: '.$cid.']','Admin',$user['id']);

                echo $cid;
            }
            catch(PDOException $ex) {
				ORM::get_db('dblogin')->rollBack();
				throw $ex;
			}
        }
        else{
            echo $msg;
        }
        break;
    
    case 'edit':
        Event::trigger('department/edit/');

		_auth1('EDIT-DEPARTMENT',$user['id']);
        $cid = $routes['2'];
        $d = ORM::for_table('daftar_department','dblogin')->find_one($cid);
        if($d){
			$ui->assign('_sysfrm_menu1', 'department');
			$ui->assign('_sysfrm_menu2', 'listdepartment');
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css('s2/css/select2.min'));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'edit-department')));
			$tags = Tags::get_all('Department');
			$ui->assign('xjq', '
			 $("#country").select2({
			 theme: "bootstrap"
			 });
			 ');
            $ui->display('edit-department.tpl');
        }
        break;
        
    case 'edit-post':
        Event::trigger('department/edit-post/');

        $id = _post('cid');
        $d = ORM::for_table('daftar_department','dblogin')->find_one($id);
        if($d){
            $kode_dept = _post('kode_dept');
            $nama_dept = _post('nama_dept');
            $atasan = _post('atasan');
            $msg = '';
            //check email already exist
            if($kode_dept == ''){
                $msg .= 'Kode Department tidak boleh kosong <br>';
            }
            if(!Validator::FixLength($kode_dept,3)){
                $msg .= 'Kode Department harus berisi 3 huruf <br>';
            }
            if($nama_dept == ''){
                $msg .= 'Nama Department tidak boleh kosong <br>';
            }
            if($atasan == ''){
                $msg .= 'Atasan tidak boleh kosong <br>';
            }
            if($msg == ''){
                ORM::get_db('dblogin')->beginTransaction();
			    try {
                    $d = ORM::for_table('daftar_department','dblogin')->find_one($id);

                    $d->kode_dept = $kode_dept;
                    $d->nama_dept = $nama_dept;
                    $d->atasan = $atasan;
                    $d->edit_date = date('Y-m-d H:i:s');
                    $d->edit_by = $username;
                    $d->save();
                    ORM::get_db('dblogin')->commit();
                    echo $id;
                }
                catch(PDOException $ex) {
                    ORM::get_db('dblogin')->rollBack();
                    throw $ex;
                }
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list', 'e', 'Department tersebut tidak ditemukan');
        }
        break;
        
    case 'delete':
        Event::trigger('department/delete/');

		_auth1('DELETE-DEPARTMENT',$user['id']);
        $id = $routes['2'];
        $d = ORM::for_table('daftar_department','dblogin')->find_one($id);
        if($d){
            $d->delete();
            r2(U.$myCtrl.'/list/', 's', 'Berhasil menghapus Department');
        }

        break;
    default:
        echo 'action not defined';
}