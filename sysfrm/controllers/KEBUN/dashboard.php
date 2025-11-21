<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
_auth();
Event::trigger('dashboard/');
$ui->assign('_title', $_L['Dashboard'].' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Dashboard']);
$ui->assign('ncomp',$_SESSION['ncomp']);
$user = User::_info();
$ui->assign('user',$user);
$spath = 'prog/'.$_SESSION['menu'].'/';

//autoload menu program
$_SESSION['optMenu'] = '';
$action = $routes['2'];
if($action<>'') {
	if($action == 'awal') {
		unset($_SESSION['menu']);
		define('U', APP_URL.'/?ng=');
		$ui->assign('_url', APP_URL.'/?ng=');
		$ui->assign('tplheader', 'sections/header_default');
	} else {
		$_SESSION['menu'] = $action;
		$e = ORM::for_table('sys_menu','dblogin')->where('kode_program',$action)->find_one();
		if($e) {
			$_SESSION['dbname']=$e['database_name'];
			ORM::configure("mysql:host=".$e['database_host'].";dbname=".$_SESSION['dbname']);
			ORM::configure('username', $e['username']);
			ORM::configure('password', $e['password']);
		}
		define('U', APP_URL.'/?ng=menu_'.$_SESSION['menu'].'/');
		$ui->assign('_url', APP_URL.'/?ng=menu_'.$_SESSION['menu'].'/');
		$ui->assign('tplheader', 'sections/header_'.$_SESSION['menu']);
	}
}
$d = ORM::for_table('sys_menu','dblogin')->order_by_asc('kode_program')->find_many();
foreach($d as $p){
	if ($user['user_type'] == 'Admin') {
		$_SESSION['optMenu'] .=	'<option value="'.$p['kode_program'].'" '.($_SESSION['menu'] == $p['kode_program'] ? 'selected' : '').'>'.ucfirst($p['kode_program']).'</option>';
	} else {
		$e = ORM::for_table('daftar_otoritas_user','dblogin')->where('kode_oto','SHOW-PROGRAM')->where('user_id',$user['id'])->find_one();
		if($e){
			$_SESSION['optMenu'] .=	'<option value="'.$p['kode_program'].'" '.($_SESSION['menu'] == $p['kode_program'] ? 'selected' : '').'>'.ucfirst($p['kode_program']).'</option>';
		}
	}
}
//**End Autoload Menu ***

$ui->assign('xheader', '
<link href="'.APP_URL.'/ui/lib/c3/c3.min.css" rel="stylesheet" type="text/css">
');

$ui->assign('xfooter', '
<script type="text/javascript" src="'.APP_URL.'/ui/lib/jslib/dashboard-alt.js"></script>
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/d3.min.js"></script>
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/c3.min.js"></script>
');

Event::trigger('dashboard/_on_display');

$ui->display($spath.'dashboard.tpl');