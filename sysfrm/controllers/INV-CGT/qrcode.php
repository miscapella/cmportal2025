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
$ui->assign('_title', 'Cetak QR Code - ' . $config['CompanyName']);
$ui->assign('_st', 'Cetak QR Code');
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
	break;

case 'cetak':
	_auth1('CETAK-QRCODE-INVENTARIS', $user['id']);
	$cid = $routes['3'];
	$url = "http://192.168.201.180/cmportal/?ng=menu_INV-CGT/inventaris/home/". $cid ."/";
	// $tanggal = changeFormat2($d["tgl_po"]);
	$nama_inventaris_record = ORM::for_table('daftar_inventaris')->select('nama_inventaris')->where('id', $cid)->find_one();
	if (!$nama_inventaris_record) {
		header("Location: " . $_url . "?ng=menu_INV-CGT/inventaris/list/");
		exit;
	}
	echo '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='. $url .'" /></td>';
	break;

default:
	echo 'action not defined';
}