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
$action = $routes['1'];
$ui->assign('_sysfrm_menu', 'contacts');
$ui->assign('_title', 'Accounts- '. $config['CompanyName']);
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
if((strtotime("now") < strtotime($_SESSION['maintenance']) or strtotime("now") > strtotime($_SESSION['maintenance_date']))) {
	r2(U.'login');
}
switch ($action) {
    case 'giveon':

        Event::trigger('unavailable/giveon/');
		ORM::get_db('dblogin')->beginTransaction();
		try
		{
			r2(U.'login');
			// $i = ORM::for_table('sys_appconfig','dblogin')->where('setting','maintenance')->find_one();
			// if($i) {
				// $i->value='N';
				// $i->save();
				// ORM::get_db('dblogin')->commit();
			// }
		}
		catch(PDOException $ex) {
			ORM::get_db('dblogin')->rollBack();
			throw $ex;
		}

        break;
    default:
		$wkt = strtotime($config['maintenance_date']) - time();
		$ui->assign('wkt',$wkt);
        $ui->display('unavailable.tpl');
		
		break;
}