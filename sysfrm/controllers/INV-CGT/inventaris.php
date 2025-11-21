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
$ui->assign('_title', 'Daftar Inventaris - ' . $config['CompanyName']);
$ui->assign('_st', 'Daftar Inventaris');
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
case 'home':
	Event::trigger('inventaris/home');
	_auth1('INVENTARIS-HOME', $user['id']);
	$id_inventaris = $routes['3'];
	$msg = $routes['4'];

	$nama_inventaris_record = ORM::for_table('daftar_inventaris')->select('nama_inventaris')->where('id', $id_inventaris)->find_one();

	if (!$nama_inventaris_record) {
		header("Location: " . $_url . "?ng=menu_INV-CGT/dashboard");
		exit;
	}
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu', 'dashboard');
	$ui->assign('id_inventaris', $id_inventaris);
	$ui->assign('nama_inventaris', $nama_inventaris_record->nama_inventaris);
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'nav-bar/style', 'number/spin-box')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'home-inventaris', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'home-inventaris.tpl');
	break;

case 'list':
	Event::trigger('inventaris/list');
	_auth1('INVENTARIS-LIST', $user['id']);

	$ui->assign('_sysfrm_menu1', 'listinventaris');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-inventaris', 'dp/dist/datepicker.min', 'numeric')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-inventaris.tpl');
	break;

case 'add':
	Event::trigger('inventaris/add/');
	_auth1('INVENTARIS-ADD', $user['id']);

	$ui->assign('_sysfrm_menu1', 'listinventaris');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'nav-bar/style', 'number/spin-box')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-inventaris', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-inventaris.tpl');
	break;

case 'add-post':
	Event::trigger('inventaris/add-post');

	$nama_inventaris = _post('nama_inventaris');
	$dipakai_oleh_select = explode("-", _post('dipakai_oleh'));
	$dipakai_oleh = $dipakai_oleh_select[0];
	$dipakai_oleh_nama = $dipakai_oleh_select[1];
	$msg = '';
	if ($nama_inventaris == '') {
		$msg .= 'Nama Inventaris tidak boleh kosong. <br>';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			// Check Last Kode Inventaris
			$chk = ORM::for_table('daftar_inventaris')->raw_query('SELECT * FROM daftar_inventaris ORDER BY kode_inventaris DESC')->find_one();
			if ($chk) {
				$kode_inventaris = ++$chk['kode_inventaris'];
			} else {
				$kode_inventaris = 'INVEN/00001';
			}
			$d = ORM::for_table('daftar_inventaris')->create();

			$d->kode_inventaris = $kode_inventaris;
			$d->nama_inventaris = strtoupper($nama_inventaris);
			$d->dipakai_oleh = $dipakai_oleh;
			$d->dipakai_oleh_nama = $dipakai_oleh_nama;

			$d->save();
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Data Inventaris : ' . $kode_inventaris . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('inventaris/add-post/_on_finished');
			echo $cid;
		} catch (PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
			echo $ex;
		}
	} else {
		echo $msg;
	}
	break;

case 'detail':
	Event::trigger('inventaris/detail');
	_auth1('INVENTARIS-DETAIL', $user['id']);
	$id_inventaris = $routes['3'];
	$check_komponen_redirect = $routes['4'];
	$nama_inventaris_record = ORM::for_table('daftar_inventaris')->where('id', $id_inventaris)->find_one();
	if ($nama_inventaris_record) {
		$nama_inventaris = $nama_inventaris_record->nama_inventaris;
	} else {
		$nama_inventaris = null;
	}

	$ui->assign('msg', $msg);
	if ($check_komponen_redirect == "Tidak Ada Komponen pada Item Ini") {
		$ui->assign('check_redirect', $check_komponen_redirect);
	} else {
		$ui->assign('msg', $check_komponen_redirect);
	}
	$ui->assign('id_inventaris', $id_inventaris);
	$ui->assign('nama_inventaris', $nama_inventaris);
	$ui->assign('_sysfrm_menu1', 'listinventaris');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-item', 'dp/dist/datepicker.min', 'numeric')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-item.tpl');
	break;

case 'additem':
	Event::trigger('inventaris/additem');
	_auth1('INVENTARIS-ADDITEM', $user['id']);
	$cid = $routes['3'];

	$ui->assign('inv_id', $cid);
	$ui->assign('_sysfrm_menu1', 'listinventaris');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'nav-bar/style', 'number/spin-box')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-item', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-item.tpl');
	break;

case 'additem-post':
	Event::trigger('inventaris/additem-post');

	$id_inventaris = _post('id_inventaris');
	$nama_item = _post('nama_item');
	$ada_komponen_checkbox = _post('ada_komponen');
	if ($ada_komponen_checkbox == 'Y') {
		$ada_komponen = 'Y';
	} else {
		$ada_komponen = 'N';
	}

	$msg = '';
	if ($nama_item == '') {
		$msg .= 'Nama Item tidak boleh kosong. <br>';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			// Get Kode Inventaris
			$kode_inventaris_query = ORM::for_table('daftar_inventaris')->where('id', $id_inventaris)->find_one();

			if ($kode_inventaris_query) {
				$kode_inventaris = $kode_inventaris_query->kode_inventaris;
			} else {
				$kode_inventaris = null;
			}
			// Check Last Kode Item
			$chk = ORM::for_table('daftar_item')->raw_query('SELECT * FROM daftar_item ORDER BY kode_item DESC')->find_one();
			if ($chk) {
				$kode_item = ++$chk['kode_item'];
			} else {
				$kode_item = 'ITEMS/00001';
			}
			$d = ORM::for_table('daftar_item')->create();

			$d->kode_inventaris = $kode_inventaris;
			$d->kode_item = $kode_item;
			$d->nama_item = strtoupper($nama_item);
			$d->ada_komponen = $ada_komponen;

			$d->save();
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Data Item : ' . $kode_item . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('inventaris/additem-post/_on_finished');
			echo $cid;
		} catch (PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
			echo $ex;
		}
	} else {
		echo $msg;
	}
	break;

case 'detail-item':
	Event::trigger('inventaris/detail-item');
	_auth1('INVENTARIS-DETAIL-ITEM', $user['id']);
	$id_inventaris = $routes['3'];
	$id_item = $routes['4'];
	$msg = $routes['5'];

	$check_is_komponen = ORM::for_table('daftar_item')->select('ada_komponen')->where('id', $id_item)->find_one();
	if ($check_is_komponen && $check_is_komponen->ada_komponen === "N") {
		header("Location: " . $_url . "?ng=menu_INV-CGT/inventaris/detail/$id_inventaris/Tidak Ada Komponen pada Item Ini");
		exit;
	}
	$nama_inventaris_record = ORM::for_table('daftar_inventaris')->where('id', $id_inventaris)->find_one();
	if ($nama_inventaris_record) {
		$nama_inventaris = $nama_inventaris_record->nama_inventaris;
	} else {
		$nama_inventaris = null;
	}

	$nama_item_record = ORM::for_table('daftar_item')->where('id', $id_item)->find_one();
	if ($nama_item_record) {
		$nama_item = $nama_item_record->nama_item;
	} else {
		$nama_item = null;
	}

	$ui->assign('msg', $msg);
	$ui->assign('id_inventaris', $id_inventaris);
	$ui->assign('nama_inventaris', $nama_inventaris);
	$ui->assign('id_item', $id_item);
	$ui->assign('nama_item', $nama_item);
	$ui->assign('_sysfrm_menu1', 'listinventaris');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-komponen', 'dp/dist/datepicker.min', 'numeric')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-komponen.tpl');
	break;

case 'addkomponen':
	Event::trigger('inventaris/addkomponen');
	_auth1('INVENTARIS-ADDKOMPONEN', $user['id']);
	$id_inventaris = $routes['3'];
	$id_item = $routes['4'];

	$ui->assign('id_inventaris', $id_inventaris);
	$ui->assign('id_item', $id_item);
	$ui->assign('_sysfrm_menu1', 'listinventaris');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'nav-bar/style', 'number/spin-box')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-komponen', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-komponen.tpl');
	break;

case 'addkomponen-post':
	Event::trigger('inventaris/addkomponen-post');

	$id_inventaris = _post('id_inventaris');
	$id_item = _post('id_item');
	$nama_komponen = _post('nama_komponen');

	$msg = '';
	if ($nama_komponen == '') {
		$msg .= 'Nama Komponen tidak boleh kosong. <br>';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			// Get Kode Item
			$kode_item_record = ORM::for_table('daftar_item')->where('id', $id_item)->find_one();

			if ($kode_item_record) {
				$kode_item = $kode_item_record->kode_item;
			} else {
				$kode_item = null;
			}
			// Check Last Kode Komponen
			$chk = ORM::for_table('daftar_komponen')->raw_query('SELECT * FROM daftar_komponen ORDER BY kode_komponen DESC')->find_one();
			if ($chk) {
				$kode_komponen = ++$chk['kode_komponen'];
			} else {
				$kode_komponen = 'KOPEN/00001';
			}
			$d = ORM::for_table('daftar_komponen')->create();

			$d->kode_item = $kode_item;
			$d->kode_komponen = $kode_komponen;
			$d->nama_komponen = strtoupper($nama_komponen);

			$d->save();
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Data Komponen : ' . $kode_komponen . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('inventaris/addkomponen-post/_on_finished');
			echo $cid;
		} catch (PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
			echo $ex;
		}
	} else {
		echo $msg;
	}
	break;

case 'perbaikan-post':
	Event::trigger('inventaris/perbaikan-post');

	$kode_barang = _post('kode_barang');
	$nama_barang_lama = _post('namaBarangLamaModal');
	$nama_barang_baru = _post('namaBarangBaruModal');
	$alasan_pergantian = _post('alasanPergantianModal');
	$detail_perbaikan = _post('keteranganModal');
	$tipe = _post('tipe');

	$msg = '';

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			// Check Last Kode Komponen
			// $chk = ORM::for_table('daftar_komponen')->raw_query('SELECT * FROM daftar_komponen ORDER BY kode_komponen DESC')->find_one();
			// if ($chk) {
			// 	$kode_komponen = ++$chk['kode_komponen'];
			// } else {
			// 	$kode_komponen = 'KOPEN/00001';
			// }

			$err = false;
			if ($nama_barang_baru != "") {
				if (strpos($kode_barang, 'ITEMS') !== false) {
					$d = ORM::for_table('daftar_item')->where('kode_item', $kode_barang)->find_one();
					$d->nama_item = strtoupper($nama_barang_baru);
				} else if (strpos($kode_barang, 'KOPEN') !== false) {
					$d = ORM::for_table('daftar_komponen')->where('kode_komponen', $kode_barang)->find_one();
					$d->nama_komponen = strtoupper($nama_barang_baru);
				} else {
					$err = true;
				}
				if (!$err) {
					$d->save();
				}
			}

			$d = ORM::for_table('log_perbaikan')->create();

			$d->kode_barang = $kode_barang;
			$d->barang_lama = strtoupper($nama_barang_lama);
			$d->barang_baru = strtoupper($nama_barang_baru);
			$d->alasan_pergantian = $alasan_pergantian;
			$d->detail_perbaikan = $detail_perbaikan;
			$d->tgl_perbaikan = date('Y-m-d H:i:s');
			$d->tipe = $tipe;

			$d->save();
			$cid = $d->id();
			ORM::get_db()->commit();
			// _log1('Tambah Data Perbaikan Inventaris : ' . $kode_komponen . ' [CID: ' . $cid . ']', $user['username'], $user['id']);
			_log1('Tambah Data Perbaikan Inventaris : [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('inventaris/addkomponen-post/_on_finished');
			echo $cid;
		} catch (PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
			echo $ex;
		}
	} else {
		echo $msg;
	}
	break;

case 'form-pelaporan':
	Event::trigger('inventaris/form-pelaporan/');

	$id_inventaris = $routes['3'];

	$inventaris_record = ORM::for_table('daftar_inventaris')->where('id', $id_inventaris)->find_one();
	if (!$inventaris_record) {
		header("Location: " . $_url . "?ng=dashboard/menu/INV-CGT/Inventaris tidak ditemukan");
		exit;
	}
	$item_record = ORM::for_table('daftar_item')->where('kode_inventaris', $inventaris_record['kode_inventaris'])->find_many();

	$ui->assign('cid', $id_inventaris);
	$ui->assign('inventaris_record', $inventaris_record);
	$ui->assign('item_record', $item_record);
	$ui->assign('_sysfrm_menu1', 'formpelaporan');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'form-pelaporan', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'form-pelaporan.tpl');
	break;

case 'form-pelaporan-post':
	Event::trigger('inventaris/form-pelaporan-post');

	$kode_inventaris = _post('kode_inventaris');
	$nama_inventaris = _post('nama_inventaris');
	$kode_item = _post('kode_item');
	$nama_item = _post('nama_item');
	$kode_komponen = _post('kode_komponen');
	$nama_komponen = _post('nama_komponen');
	$detail_permasalahan = _post('detail_permasalahan');

	$msg = '';

	if ($kode_item == "") {
		$msg .= 'Harus memilih item<br>';
	}

	if ($detail_permasalahan == "") {
		$msg .= "Silahkan mengisi detail permasalahan<br>";
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			// Check Last Kode Form
			$chk = ORM::for_table('form_pelaporan')->raw_query('SELECT * FROM form_pelaporan ORDER BY kode_form DESC')->find_one();
			if ($chk) {
				$kode_form = ++$chk['kode_form'];
			} else {
				$kode_form = 'FORM/00001';
			}

			$d = ORM::for_table('form_pelaporan')->create();

			$d->kode_form = $kode_form;
			$d->kode_inventaris = $kode_inventaris;
			$d->nama_inventaris = $nama_inventaris;
			$d->kode_item = $kode_item;
			$d->nama_item = $nama_item;
			$d->kode_komponen = $kode_komponen;
			$d->nama_komponen = $nama_komponen;
			$d->detail_permasalahan = $detail_permasalahan;
			$d->tgl_pelaporan = date('Y-m-d H:i:s');
			$d->status = 'PENDING';

			$d->save();
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Data Form Pelaporan Inventaris : [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('inventaris/form-pelaporan-post/_on_finished');
			echo $cid;
		} catch (PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
			echo $ex;
		}
	} else {
		$data = array(
			'msg' => $msg,
			'dataval' => 'a');
		echo json_encode($data);
	}
	break;

case 'history':
	Event::trigger('inventaris/history');
	_auth1('INVENTARIS-history', $user['id']);

	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu', 'dashboard');
	$ui->assign('id_inventaris', $id_inventaris);
	$ui->assign('nama_inventaris', $nama_inventaris_record->nama_inventaris);
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'nav-bar/style', 'number/spin-box')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'history-inventaris', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'history-inventaris.tpl');
	break;

default:
	echo 'action not defined';
}