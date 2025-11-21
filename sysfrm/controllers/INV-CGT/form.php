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

if (!isset($myCtrl)) {
	$myCtrl = 'karyawan';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Daftar Form Pelaporan - ' . $config['CompanyName']);
$ui->assign('_st', 'Daftar Form Pelaporan');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

switch ($action) {
case 'list':
	$cid = $routes['3'];

	$nama_inventaris_record = ORM::for_table('daftar_inventaris')->where('id', $cid)->find_one();

	if (!$nama_inventaris_record) {
		header("Location: " . $_url . "?ng=menu_INV-CGT/dashboard");
		exit;
	}

  $list_form = ORM::for_table('form_pelaporan')->where('id', $cid)->find_many();

	$ui->assign('msg', $msg);
  $ui->assign('list_form', $list_form);
	$ui->assign('id_inventaris', $cid);
	$ui->assign('nama_inventaris', $nama_inventaris_record->nama_inventaris);
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'nav-bar/style', 'number/spin-box')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-form', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'list-form.tpl');
	break;

default:
	echo 'action not defined';
}