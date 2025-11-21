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
    $myCtrl = 'inventaris';
}
_auth();
$ui->assign('_sysfrm_menu', 'testing');
$ui->assign('_sysfrm_menu1', 'testing');
$ui->assign('_sysfrm_menu2', 'testing');
$ui->assign('_title', 'Testing - '. $config['CompanyName']);
$ui->assign('_st', 'Testing');
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
    case 'main':
        Event::trigger('permintaanbarang/list-ur-aprv/');
		_auth1('UR-APRV',$user['id']);
		$msg = $routes['3'];
		$array = filterdept($user['kode_dept']);
		$d = ORM::for_table('mintabarang_master')->where('status', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		$e = ORM::for_table('mintabarang_master')->where('status', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		$cd = ORM::for_table('mintabarang_master')->where('status', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		$ce = ORM::for_table('mintabarang_master')->where('status', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		$ui->assign('d',$d);
		$ui->assign('e',$e);
		$ui->assign('cd',$cd);
		$ui->assign('ce',$ce);
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'user-request-approve');
		// $ui->assign('xfooter');
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-ur-approved','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-ur-aprv.tpl');
		break;
    default:
        echo 'action not defined';
}