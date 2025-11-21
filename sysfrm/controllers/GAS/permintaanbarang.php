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
	$myCtrl = 'Permintaan Barang';
}
_auth();

$ui->assign('_sysfrm_menu', 'User-Request');
$ui->assign('_title', 'User Request - ' . $config['CompanyName']);
$ui->assign('_st', 'User Request');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

function filterdept($user_dept)
{
	$sysusers = ORM::for_table('sys_users', 'dblogin')->select('id')->where('kode_dept', $user_dept)->find_many();
	$array = array();
	foreach ($sysusers as $usersss) {
		array_push($array, $usersss->id);
	}
	return $array;
}


switch ($action) {
	case 'list-mintabarang':
		Event::trigger('permintaanbarang/list-mintabarang/');
		

		// if ($user['user_type'] == "Admin") {
		// 	$ui->assign('administrator', true);
		// } else {
		// 	$dept_head = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();
		// 	if ($dept_head) {
		// 		if ($dept_head['kode_dept'] == "SDH") {
		// 			$ui->assign('service_head', $dept_head);
		// 		} else {
		// 			$ui->assign('dept_head', $dept_head);
		// 		}
		// 	} else {
		// 		$ga_admin = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
		// 		if ($ga_admin['approval'] == $user['username']) {
		// 			$ui->assign('ga_admin', $ga_admin);
		// 		}
		// 	}
		// }

		$ui->assign('_sysfrm_menu1', 'List UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-mintabarang', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'list-mintabarang.tpl');
		break;

	

	case 'list-mintabarang-departemen':
		Event::trigger('permintaanbarang/list-mintabarang-departemen/');
		_auth1('SHOW-DEPT-UR', $user['id']);

		$department = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', $user['kode_dept'])->find_one();

		$ui->assign('_sysfrm_menu1', 'Departemen UR');
		$ui->assign('department', $department);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-mintabarang-departemen', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'list-mintabarang-departemen.tpl');
		break;

	case 'list-mintabarang-servicehead':
		Event::trigger('permintaanbarang/list-mintabarang-servicehead/');
		_auth1('SHOW-SERVICEHEAD-UR', $user['id']);

		$ui->assign('_sysfrm_menu1', 'Service Head UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-mintabarang-servicehead', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'list-mintabarang-servicehead.tpl');
		break;

	case 'list-mintabarang-gaadmin':
		Event::trigger('permintaanbarang/list-mintabarang-gaadmin/');
		_auth1('SHOW-GAADMIN-UR', $user['id']);

		$ui->assign('_sysfrm_menu1', 'GA Admin UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-mintabarang-gaadmin', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'list-mintabarang-gaadmin.tpl');
		break;

		// case 'list-mintabarang-pending':
		// 	Event::trigger('permintaanbarang/list-mintabarang-pending/');
		// 	_auth1('SHOW-UR',$user['id']);

		// 	if ($user['user_type'] == "Admin") {
		// 		$ui->assign('administrator', true);
		// 	} else {
		// 		$dept_head = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();
		// 		if ($dept_head) {
		// 			if ($dept_head['kode_dept'] == "SDH") {
		// 				$ui->assign('service_head', $dept_head);
		// 			} else {
		// 				$ui->assign('dept_head', $dept_head);
		// 			}
		// 		} else {
		// 			$ga_admin = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
		// 			if ($ga_admin['approval'] == $user['username']) {
		// 				$ui->assign('ga_admin', $ga_admin);
		// 			}
		// 		}
		// 	}

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'UR Pending');
		// 	$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang-pending')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'list-mintabarang-pending.tpl');
		// 	break;

		// case 'list-mintabarang-approved':
		// 	Event::trigger('permintaanbarang/list-mintabarang-approved/');
		// 	_auth1('SHOW-UR',$user['id']);

		// 	if ($user['user_type'] == "Admin") {
		// 		$ui->assign('administrator', true);
		// 	} else {
		// 		$dept_head = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();
		// 		if ($dept_head) {
		// 			if ($dept_head['kode_dept'] == "SDH") {
		// 				$ui->assign('service_head', $dept_head);
		// 			} else {
		// 				$ui->assign('dept_head', $dept_head);
		// 			}
		// 		} else {
		// 			$ga_admin = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
		// 			if ($ga_admin['approval'] == $user['username']) {
		// 				$ui->assign('ga_admin', $ga_admin);
		// 			}
		// 		}
		// 	}

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'UR Approved');
		// 	$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang-approved')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'list-mintabarang-approved.tpl');
		// 	break;

		// case 'list-mintabarang-rejected':
		// 	Event::trigger('permintaanbarang/list-mintabarang-rejected/');
		// 	_auth1('SHOW-UR',$user['id']);

		// 	if ($user['user_type'] == "Admin") {
		// 		$ui->assign('administrator', true);
		// 	} else {
		// 		$dept_head = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();
		// 		if ($dept_head) {
		// 			if ($dept_head['kode_dept'] == "SDH") {
		// 				$ui->assign('service_head', $dept_head);
		// 			} else {
		// 				$ui->assign('dept_head', $dept_head);
		// 			}
		// 		} else {
		// 			$ga_admin = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
		// 			if ($ga_admin['approval'] == $user['username']) {
		// 				$ui->assign('ga_admin', $ga_admin);
		// 			}
		// 		}
		// 	}

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'UR Reject');
		// 	$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang-rejected')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'list-mintabarang-rejected.tpl');
		// 	break;

		// case 'list-mintabarang-cancelled':
		// 	Event::trigger('permintaanbarang/list-mintabarang-cancelled/');
		// 	_auth1('SHOW-UR',$user['id']);

		// 	if ($user['user_type'] == "Admin") {
		// 		$ui->assign('administrator', true);
		// 	} else {
		// 		$dept_head = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();
		// 		if ($dept_head) {
		// 			if ($dept_head['kode_dept'] == "SDH") {
		// 				$ui->assign('service_head', $dept_head);
		// 			} else {
		// 				$ui->assign('dept_head', $dept_head);
		// 			}
		// 		} else {
		// 			$ga_admin = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
		// 			if ($ga_admin['approval'] == $user['username']) {
		// 				$ui->assign('ga_admin', $ga_admin);
		// 			}
		// 		}
		// 	}

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'UR Cancel');
		// 	$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang-cancelled')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'list-mintabarang-cancelled.tpl');
		// 	break;

	case 'add-mintabarang':
		Event::trigger('permintaanbarang/add-mintabarang/');
		

		$clist = '<option value="">Pilih Inventaris</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="PENGADAAN BARU">PENGADAAN BARU</option>';
		$clist .= '<option value="PERGANTIAN">PERGANTIAN</option>';

		$idate = date('d-m-Y');
		$ui->assign('_sysfrm_menu1', 'Buat UR');
		$ui->assign('clist', $clist);
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-mintabarang', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));

		$ui->display($spath . 'add-mintabarang.tpl');
		break;

	case 'add-mintabarang-post':
		Event::trigger('permintaanbarang/add-mintabarang-post/');
	

		// $unitkerja = _post('unitkerja');
		// $nomor = _post('nomor');
		$tgl = _post('tgl');

		$keperluan = explode(',', _post('keperluan'));
		$namabarang = explode(',', _post('namabarang'));
		$qty = explode(',', _post('qty'));
		$diperlukan = explode(',', _post('diperlukan'));
		$keterangan = explode(',', _post('keterangan'));
		// $item = explode(',', _post('item'));
		// $bagian = explode(',', _post('bagian'));
		// $main = explode(',', _post('main'));
		// $sub = explode(',', _post('sub'));
		// $line = explode(',', _post('line'));
		$msg = '';
		$total = 0;
		// if ($unitkerja == '') $msg .= 'Unit Kerja diperlukan';
		// if ($nomor == '') $msg .= 'Nomor diperlukan';
		if ($tgl == '') $msg .= 'Tanggal diperlukan';
		for ($i = 0; $i < count($keperluan); $i++) {
			$temp_msg = '';
			if ($keperluan[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ' : Keperluan diperlukan <br />';
			if ($namabarang[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ' : Nama Barang diperlukan <br />';
			if ($qty[$i] == 0) $temp_msg .= 'UR ' . strval($i + 1) . ' : Qty Req diperlukan <br />';
			else $total += $qty[$i];
			if ($diperlukan[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ' : Tanggal diperlukan <br />';
			if ($keterangan[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ' : Keterangan diperlukan <br />';
			if ($temp_msg <> '') $msg .= $temp_msg . ($i == count($keperluan) - 1 ? '' : '<br>');
		}
		// $msg_item = '';
		// $msg_qty = '';
		// $msg_diperlukan = '';
		// $i = 0;
		// $ii = 0;
		// foreach($keperluan as $code) {
		// 	// if($item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
		// 	if($diperlukan[$i] == '')	$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		// 	if($qty[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		// 	if($code <> '') $ii++;
		// 	$i++;
		// }
		// 	if($ii > 0) {
		// 		if($msg_item <> '')
		// 			$msg .= $msg_item.'<br>';
		// 		if($msg_qty <> '')
		// 			$msg .= $msg_qty.'<br>';
		// 		if($msg_diperlukan <> '')
		// 			$msg .= $msg_diperlukan.'<br>';
		// 	} else $msg .= 'Belum ada data Request<br>';
		// 	sort($item);
		// 	$cek = '';
		// 	$flag = false;
		// 	$error = '';
		// foreach($item as $code) {
		// 	if($cek == $code) {
		// 		$flag = true;
		// 		break;
		// 	} else
		// 		$flag = false;
		// 		$cek = $code;
		// 	}
		// if($flag)
		// 	$msg .= 'Ada Item Stock double<br>';

		// if($unitkerja == '') $msg .= 'Data Unit Kerja Wajib Diisi<br>';
		// if($nomor == '') $msg .= 'Nomor Wajib Diisi<br>';
		if ($msg == '') {
			ORM::get_db()->beginTransaction();
			try {
				$tgl = Validator::Date1(_post('tgl'));
				$bl = date('M', strtotime($tgl));
				$th = date('Y', strtotime($tgl));
				// $chk = ORM::for_table('mintabarang_master')
				// 	->raw_query('select * from mintabarang_master where year(tanggal)=' . $th .
				// 		' and month(tanggal)=' . date('m', strtotime($tgl)) .
				// 		' order by no_mintabarang desc')
				// 	->find_one();

				$chk = ORM::for_table('mintabarang_master')
					->raw_query("SELECT * FROM mintabarang_master 
											WHERE YEAR(tanggal) = " . $th .
						" AND MONTH(tanggal) = " . date('m', strtotime($tgl)) .
						" AND no_mintabarang LIKE '%CM-" . $user['kode_cabang'] . "/" . $user['kode_bagian'] . "/%'" .
						" ORDER BY no_mintabarang DESC")
					->find_one();
				if ($chk) {
					// Extract the numeric part, increment it, and pad with zeros
					$lastNo = intval(substr($chk['no_mintabarang'], 0, 4));
					$no = str_pad(++$lastNo, 4, '0', STR_PAD_LEFT);
				} else {
					// Start with '0001' if no records found for the month
					$no = '0001';
				}
				// Assemble the format
				$no = $no . '/CM-' . $user['kode_cabang'] . '/' . $user['kode_bagian'] . '/' . $bl . '/' . $th;

				$approve_key = generateRandomString(24);
				$reject_key = generateRandomString(24);
				$comment_key = generateRandomString(24);

				$d = ORM::for_table('mintabarang_master')->create();
				$d->no_mintabarang = $no;
				// $d->unit_kerja=$unitkerja;
				$d->kode_dept = $user['kode_dept'];
				// $d->nomor = $nomor;
				$d->tanggal = $tgl;
				$d->sisa = $total;
				$d->approval = 'PENDING';
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');
				$d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;
				$d->save();

				$isi = '';
				for ($i = 0; $i < count($keperluan); $i++) {
					// $sitem = $item[$i];
					// $sqty = str_replace(".", "", $qty[$i]);
					// $sketerangan = $keterangan[$i];
					// $snamabarang = $namabarang[$i];
					// $sdiperlukan = $diperlukan[$i];
					// $sbagian = $bagian[$i];
					// $smain = $main[$i];
					// $ssub = $sub[$i];
					// $sline = $line[$i];

					$y = ORM::for_table('mintabarang_detail')->create();
					$y->no_mintabarang = $no;
					// $y->kode_item = $sitem;
					$y->qty_req = $qty[$i];
					$y->sisa = $qty[$i];
					if (Validator::Date1($diperlukan[$i]) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($diperlukan[$i]));
					else
						$y->tgl_diperlukan = null;
					$y->keperluan = $keperluan[$i];
					$y->keterangan = $keterangan[$i];
					$y->namabarang = $namabarang[$i];
					// $y->bagian = $sbagian;
					// $y->main = $smain;
					// $y->sub = $ssub;
					// $y->line = $sline;
					$y->approval = 'PENDING';
					$y->save();
					// $i++;

					// $r = ORM::for_table('daftar_itemstock')->where('kd_item', $sitem)->find_one();
					// $bagians = ORM::for_table('daftar_kategori')->where('kd_kategori', $sbagian)->find_one();
					// $mains = ORM::for_table('daftar_kategori')->where('kd_kategori', $smain)->find_one();
					// $subs = ORM::for_table('daftar_kategori')->where('kd_kategori', $ssub)->find_one();
					// $lines = ORM::for_table('daftar_kategori')->where('kd_kategori', $sline)->find_one();
					$isi .= "<b>PERMINTAAN BARANG #" . (intval($i) + 1) . "</b> <br>
							Keperluan : " . $keperluan[$i] . " <br>";
					// if($code == 'STOCK'){
					// 	$isi .= "Bagian : STOCK <br>";
					// } else {
					// 	$isi .= "Bagian : ". $bagians['nm_kategori'] ." | ". $mains['nm_kategori'] ." > ". $subs['nm_kategori'] ." > ". $lines['nm_kategori'] ." <br>";
					// }
					// Qty Request : ". number_format($qty[$i], 0, '', '.') ." <br>
					$isi .= "
							Item : " . $namabarang[$i] . " <br>
							Qty Request : " . $qty[$i] . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($diperlukan[$i])) . " <br>
							Keterangan : " . $keterangan[$i] . " <br><br>
					";
				}
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Data UR : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

				$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval UR')->find_one();
				$to = ['capella.zoom@gmail.com'];
				$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', $user['kode_dept'])->find_many();
				if ($g) $to = [];

				foreach ($g as $gs) {
					$to = array_merge($to, explode('|', $gs['atasan']));
				}
				$subject = new Template($e['subject']);
				$subject->set('business_name', $config['CompanyName']);
				$subj = $subject->output();
				$message = new Template($e['message']);
				$message->set('no_ur', $no);
				$message->set('tgl_ur', $tgl);
				// $message->set('nomor', $nomor);
				// $message->set('unit_kerja', $unitkerja);
				$message->set('isi', $isi);
				$linkcomment = APP_URL . '/?ng=gas-api/comment-ur/' . $cid . '/token_' . $comment_key;
				$linkapprove = APP_URL . '/?ng=gas-api/approve-ur/' . $cid . '/token_' . $approve_key;
				$linkreject = APP_URL . '/?ng=gas-api/reject-ur/' . $cid . '/token_' . $reject_key;
				$message->set('link_comment', $linkcomment);
				$message->set('link_approve', $linkapprove);
				$message->set('link_reject', $linkreject);
				// $message->set('program', 'https://sns.capellagroup.com/?ng=login/');
				$message->set('business_name', $config['CompanyName']);
				$message_o = $message->output();

				foreach ($to as $item) {
					Notify_Email::_send($item, $item, $subj, $message_o);
				}

				Event::trigger('permintaanbarang/add-mintabarang-post/_on_finished');
				$data = array(
					'msg'			=>  'Berhasil Membuat UR ! <br />
											 No. UR : ' . $no . $temp,
					'dataval'		=>	1
				);
				echo json_encode($data);
			} catch (PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
		} else {
			$data = array(
				'msg'			=>  $msg,
				'dataval'		=>	'a'
			);
			echo json_encode($data);
		}
		break;

	case 'detail-mb':
		Event::trigger('permintaanbarang/detail-mb/');
		_auth1('SHOW-UR', $user['id']);

		$uri = $_SERVER['HTTP_REFERER'];
		$uri = rtrim($uri, '/');
		$uri = substr($uri, strrpos($uri, '/') + 1);
		switch ($uri) {
			case "list-mintabarang-departemen":
				$ui->assign('_sysfrm_menu1', 'Departemen UR');
				$ui->assign('previous_uri', 'list-mintabarang-departemen');
				break;
			case "list-mintabarang-servicehead":
				$ui->assign('_sysfrm_menu1', 'Service Head UR');
				$ui->assign('previous_uri', 'list-mintabarang-servicehead');
				break;
			case "list-mintabarang-gaadmin":
				$ui->assign('_sysfrm_menu1', 'GA Admin UR');
				$ui->assign('previous_uri', 'list-mintabarang-gaadmin');
				break;
			default:
				$ui->assign('_sysfrm_menu1', 'List UR');
				$ui->assign('previous_uri', 'list-mintabarang');
				break;
		}

		$id = $routes['3'];
		$id = str_replace('uid', '', $id);
		$e = ORM::for_table('mintabarang_master')->where("id", $id)->find_one();
		$d = ORM::for_table('mintabarang_detail')
			->table_alias("a")
			->select_many("a.keperluan", "a.bagian", "a.kode_item", "a.qty_req", "a.tgl_diperlukan", "a.keterangan", "a.namabarang")
			// ->left_outer_join("daftar_itemstock", array("a.kode_item", "=", "b.kd_item"), "b")
			// ->select("b.nm_item")
			->left_outer_join("daftar_kategori", array("a.bagian", "=", "c.kd_kategori"), "c")
			->select("c.nm_kategori")
			->where("a.no_mintabarang", $e->no_mintabarang)
			->find_many();
		$clist = "";
		$nomor = 1;
		foreach ($d as $item) {
			$tgl_diperlukan = date("d-m-Y", strtotime($item->tgl_diperlukan));
			$clist .= "<tr><td>$nomor</td>";
			$clist .= "<td>$item->keperluan</td>";
			// $clist.="<td>$item->nm_kategori</td>";
			// $clist.="<td>$item->nm_item</td>";
			$clist .= "<td>$item->namabarang</td>";
			$clist .= "<td>$item->qty_req</td>";
			$clist .= "<td>$tgl_diperlukan</td>";
			$clist .= "<td>$item->keterangan</td></tr>";
			$nomor += 1;
		};
		$e['approval'] === 'CANCEL' && $e['approval'] = 'CANCELLED';
		$ui->assign('clist_detail', $clist);
		$ui->assign('es', $e);
		$ui->assign('ds', $d);
		$ui->display($spath . 'detail-mintabarang.tpl');
		break;

	case 'edit-mb':
		Event::trigger('permintaanbarang/edit-mb/');
		_auth1('EDIT-UR', $user['id']);

		$uri = $_SERVER['HTTP_REFERER'];
		$uri = rtrim($uri, '/');
		$uri = substr($uri, strrpos($uri, '/') + 1);
		switch ($uri) {
			case "list-mintabarang-pending":
				$ui->assign('_sysfrm_menu1', 'UR Pending');
				$ui->assign('previous_uri', 'list-mintabarang-pending');
				break;
			case "list-mintabarang-approved":
				$ui->assign('_sysfrm_menu1', 'UR Approved');
				$ui->assign('previous_uri', 'list-mintabarang-approved');
				break;
			case "list-mintabarang-rejected":
				$ui->assign('_sysfrm_menu1', 'UR Reject');
				$ui->assign('previous_uri', 'list-mintabarang-rejected');
				break;
			case "list-mintabarang-cancelled":
				$ui->assign('_sysfrm_menu1', 'UR Cancel');
				$ui->assign('previous_uri', 'list-mintabarang-cancelled');
				break;
			default:
				$ui->assign('_sysfrm_menu1', 'List UR');
				$ui->assign('previous_uri', 'list-mintabarang');
				break;
		}

		$id = $routes['3'];
		$id = str_replace('uid', '', $id);
		$e = ORM::for_table('mintabarang_master')->where("id", $id)->find_one();
		if ($e->approval <> "PENDING" || $e->disetujui_atasan_oleh <> "" || $e->disetujui_service_oleh <> "" || $e->disetujui_gas_oleh <> "") {
			switch ($uri) {
				case "list-mintabarang-pending":
					r2(U . 'permintaanbarang/list-mintabarang-pending', 'e', 'Permintaan barang tidak bisa diedit karena sudah dalam proses');
					break;
				case "list-mintabarang-approved":
					r2(U . 'permintaanbarang/list-mintabarang-approved', 'e', 'Permintaan barang tidak bisa diedit karena sudah dalam proses');
					break;
				case "list-mintabarang-rejected":
					r2(U . 'permintaanbarang/list-mintabarang-rejected', 'e', 'Permintaan barang tidak bisa diedit karena sudah dalam proses');
					break;
				case "list-mintabarang-cancelled":
					r2(U . 'permintaanbarang/list-mintabarang-cancelled', 'e', 'Permintaan barang tidak bisa diedit karena sudah dalam proses');
					break;
				default:
					r2(U . 'permintaanbarang/list-mintabarang', 'e', 'Permintaan barang tidak bisa diedit karena sudah dalam proses');
					break;
			}
			// r2(U.'permintaanbarang/list-mintabarang', 'e', 'Permintaan barang tidak bisa diedit karena sudah dalam proses');
		}
		if ($e->dibuat_oleh <> $user["id"]) {
			switch ($uri) {
				case "list-mintabarang-pending":
					r2(U . 'permintaanbarang/list-mintabarang-pending', 'e', 'Permintaan barang hanya bisa diedit oleh pengaju');
					break;
				case "list-mintabarang-approved":
					r2(U . 'permintaanbarang/list-mintabarang-approved', 'e', 'Permintaan barang hanya bisa diedit oleh pengaju');
					break;
				case "list-mintabarang-rejected":
					r2(U . 'permintaanbarang/list-mintabarang-rejected', 'e', 'Permintaan barang hanya bisa diedit oleh pengaju');
					break;
				case "list-mintabarang-cancelled":
					r2(U . 'permintaanbarang/list-mintabarang-cancelled', 'e', 'Permintaan barang hanya bisa diedit oleh pengaju');
					break;
				default:
					r2(U . 'permintaanbarang/list-mintabarang', 'e', 'Permintaan barang hanya bisa diedit oleh pengaju');
					break;
			}
			// r2(U.'permintaanbarang/list-mintabarang', 'e', 'Permintaan barang hanya bisa diedit oleh pengaju');
		}

		$d = ORM::for_table('mintabarang_detail')
			->table_alias("a")
			->select_many("a.keperluan", "a.bagian", "a.main", "a.sub", "a.line", "a.kode_item", "a.qty_req", "a.tgl_diperlukan", "a.keterangan", "a.namabarang")
			->left_outer_join("daftar_itemstock", array("a.kode_item", "=", "b.kd_item"), "b")
			->select("b.nm_item")
			->left_outer_join("daftar_kategori", array("a.bagian", "=", "c.kd_kategori"), "c")
			->select("c.nm_kategori")
			->where("a.no_mintabarang", $e->no_mintabarang)
			->find_many();

		$clist = "";
		foreach ($d as $index => $item) {
			$tgl_diperlukan = date("d-m-Y", strtotime($item['tgl_diperlukan']));
			$clist .= '<tr><td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a> ' . strval($index + 1) . '</td>';
			$clist .= '<td style="vertical-align: middle"><select name="keperluan[]" class="form-control keperluan" style="width: 100%;" value="' . $item['keperluan'] . '" required>';
			$clist .= '<option value="">Pilih Inventaris</option>';
			$item['keperluan'] === 'STOCK' ? $clist .= '<option value="STOCK" selected>STOCK</option>' : $clist .= '<option value="STOCK">STOCK</option>';
			$item['keperluan'] === 'PENGADAAN BARU' ? $clist .= '<option value="PENGADAAN BARU" selected>PENGADAAN BARU</option>' : $clist .= '<option value="PENGADAAN BARU">PENGADAAN BARU</option>';
			$item['keperluan'] === 'PERGANTIAN' ? $clist .= '<option value="PERGANTIAN" selected>PERGANTIAN</option></select></td>' : $clist .= '<option value="PERGANTIAN">PERGANTIAN</option></select></td>';
			$clist .= '<td style="vertical-align: middle"><input type="text" name="namabarang[]" class="namabarang" value="' . $item['namabarang'] . '" style="width: 100%;"></td>';
			$clist .= '<td style="vertical-align: middle"><input type="text" name="qty[]" class="qty" value="' . $item['qty_req'] . '" style="width: 100%;"></td>';
			$clist .= '<td style="vertical-align: middle"><input type="text" name="diperlukan[]" class="diperlukan tgl" value="' . $tgl_diperlukan . '" style="width: 100%;"></td>';
			$clist .= '<td style="vertical-align: middle"><input type="text" name="keterangan[]" class="keterangan" value="' . $item['keterangan'] . '" style="width: 100%;"></td></tr>';
			// $clist .= '<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="'. $item->bagian.'"></td>';
			// $clist .= '<td style="display:none;"><input type="text" name="main[]" class="main" value="'.$item->main.'"></td>';
			// $clist .= '<td style="display:none;"><input type="text" name="sub[]" class="sub" value="'.$item->sub.'"></td>';
			// $clist .= '<td style="display:none;"><input type="text" name="line[]" class="line" value="'.$item->line.'"></td>';
			// $clist .= '<td><a href="#" class="detail-bagian" value="'.$item->nm_kategori.'">'.$item->nm_kategori.'</a></td>';
			// $clist .= '<td style="display:none;"><input type="text" name="item[]" class="item" value="'.$item->kd_item.'" readonly></td>';
			// $clist .= '<td><a href="#" class="detail-itemstock" value="'.$item->kd_item.'">'.$item->nm_item.'</a></td>';
		}

		$clist_opt = '<option value="">Pilih Inventaris</option>';
		$clist_opt .= '<option value="STOCK">STOCK</option>';
		$clist_opt .= '<option value="PENGADAAN">PENGADAAN BARU</option>';
		$clist_opt .= '<option value="PERGANTIAN">PERGANTIAN</option>';

		$ui->assign('id', $id);
		$ui->assign('clist', $clist_opt);
		$ui->assign('clist_edit', $clist);
		$ui->assign('es', $e);
		$ui->assign('ds', $d);

		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-mintabarang', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));

		$ui->display($spath . 'edit-mintabarang.tpl');
		break;

	case 'edit-mintabarang-post':
		Event::trigger('permintaanbarang/edit-mintabarang-post/');
		_auth1('EDIT-UR', $user['id']);

		$id = _post('id');
		$no_ur = _post('no_ur');
		$keperluan = explode(',', _post('keperluan'));
		$namabarang = explode(',', _post('namabarang'));
		$qty = explode(',', _post('qty'));
		$diperlukan = explode(',', _post('diperlukan'));
		$keterangan = explode(',', _post('keterangan'));

		$msg = '';
		for ($i = 0; $i < count($keperluan); $i++) {
			$temp_msg = '';
			if ($keperluan[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ': Keperluan diperlukan <br />';
			if ($namabarang[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ': Nama Barang diperlukan <br />';
			if ($qty[$i] == 0) $temp_msg .= 'UR ' . strval($i + 1) . ': Qty Req diperlukan <br />';
			if ($diperlukan[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ': Tanggal diperlukan <br />';
			if ($keterangan[$i] == '') $temp_msg .= 'UR ' . strval($i + 1) . ': Keterangan diperlukan <br />';
			if ($temp_msg <> '') $msg .= $temp_msg . ($i == count($keperluan) - 1 ? '' : '<br>');
		}

		// $keperluan = explode(',', _post('keperluan'));
		// $item = explode(',', _post('item'));
		// $bagian = explode(',', _post('bagian'));
		// $main = explode(',', _post('main'));
		// $sub = explode(',', _post('sub'));
		// $line = explode(',', _post('line'));
		// $namabarang = explode(',', _post('namabarang'));
		// $qty = explode(',', _post('qty'));
		// $diperlukan = explode(',', _post('diperlukan'));
		// $keterangan = explode(',', _post('keterangan'));
		// $id=_post('idjs');
		// $msg = '';
		// $msg_item = '';
		// $msg_qty = '';
		// $msg_diperlukan = '';
		// $i = 0;
		// $ii = 0;
		// foreach($keperluan as $code) {
		// 	// if($item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
		// 	if($diperlukan[$i] == '')	$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		// 	if($qty[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		// 	if($code <> '') $ii++;
		// 	$i++;
		// }
		// if($ii > 0) {
		// 	if($msg_item <> '')
		// 		$msg .= $msg_item.'<br>';
		// 	if($msg_qty <> '')
		// 		$msg .= $msg_qty.'<br>';
		// 	if($msg_diperlukan <> '')
		// 		$msg .= $msg_diperlukan.'<br>';
		// } else $msg .= 'Belum ada data Request<br>';
		// sort($item);
		// $cek = '';
		// $flag = false;
		// $error = '';
		// foreach($item as $code) {
		// 	if($cek == $code) {
		// 		$flag = true;
		// 		break;
		// 	} else
		// 		$flag = false;
		// 		$cek = $code;
		// 	}
		// if($flag)
		// 	$msg .= 'Ada Item Stock double<br>';

		// $e = ORM::for_table('mintabarang_master')->where("id",$id)->find_one();
		// $no_mintabarang=$e->no_mintabarang;
		// $tgl=date("d-m-Y", strtotime($e->tanggal));
		// $unitkerja=$e->unit_kerja;
		// $nomor=$e->nomor;
		// $kode_dept=$e->$user['kode_dept'];

		if ($msg == '') {
			$x = ORM::for_table('mintabarang_master')->where("id", $id)->find_one();

			if ($x) {
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $no_ur)->delete_many();

					$isi = '';
					for ($i = 0; $i < count($keperluan); $i++) {
						$y = ORM::for_table('mintabarang_detail')->create();
						$y->no_mintabarang = $no_ur;
						$y->qty_req = $qty[$i];
						if (Validator::Date1($diperlukan[$i]) <> 'Salah')
							$y->tgl_diperlukan = date('Y-m-d', strtotime($diperlukan[$i]));
						else
							$y->tgl_diperlukan = null;
						$y->keperluan = $keperluan[$i];
						$y->keterangan = $keterangan[$i];
						$y->namabarang = $namabarang[$i];
						$y->approval = 'PENDING';
						$y->save();

						$isi .= "<b>PERMINTAAN BARANG #" . (intval($i) + 1) . "</b> <br>
								Keperluan : " . $keperluan[$i] . " <br>
								Item : " . $namabarang[$i] . " <br>
								Qty Request : " . $qty[$i] . " <br>
								Tanggal Diperlukan : " . date('Y-m-d', strtotime($diperlukan[$i])) . " <br>
								Keterangan : " . $keterangan[$i] . " <br><br>
						";
					}

					ORM::get_db()->commit();
					_log1('Ubah Data UR : ' . $no_ur . ' [CID: ' . $id . ']', $user['username'], $user['id']);

					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval UR')->find_one();
					$to = ['capella.zoom@gmail.com'];
					$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', $user['kode_dept'])->find_many();
					if ($g) $to = [];

					foreach ($g as $gs) {
						$to = array_merge($to, explode('|', $gs['atasan']));
					}
					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $x['dibuat_tgl']);
					$message->set('nomor', $x['nomor']);
					// $message->set('unit_kerja', $unitkerja);
					$message->set('isi', $isi);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					foreach ($to as $item) {
						Notify_Email::_send($item, $item, $subj, $message_o);
					}

					Event::trigger('permintaanbarang/add-mintabarang-post/_on_finished');
					$data = array(
						'msg'			=>  'Berhasil Update UR !
												 No. UR : ' . $no_ur,
						'dataval'		=>	1
					);
					echo json_encode($data);
				} catch (PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
					echo $ex;
				}
			} else {
				r2(U . 'permintaanbarang/list-mintabarang', 'e', 'Data UR tersebut tidak ditemukan');
			}
		} else {
			$data = array(
				'msg'			=>  $msg,
				'dataval'		=>	'a'
			);
			echo json_encode($data);
		}
		break;

	case 'persetujuan-ur':
		Event::trigger('permintaanbarang/persetujuan-ur/');
		_auth1('SHOW-PERSETUJUAN-UR', $user['id']);

		$ui->assign('_sysfrm_menu', 'Persetujuan');
		$ui->assign('_sysfrm_menu1', 'Persetujuan UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'persetujuan-ur', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));

		$ui->display($spath . 'persetujuan-ur.tpl');
		break;

	case 'persetujuan-ur1':
		Event::trigger('permintaanbarang/persetujuan-ur1/');
		_auth1('PERSETUJUAN-UR', $user['id']);

		$cid = $routes['3'];
		$d = ORM::for_table('mintabarang_master')->find_one($cid);
		if ($d) {
			$ui->assign('d', $d);
			$ui->assign('cid', $cid);
			$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $d['no_mintabarang'])->find_many();
			$tg1 = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active', 'Y')->find_many();
			$idate = date('d-m-Y', strtotime($d['tanggal']));
			$idates = date('d-m-Y', strtotime($n['tanggal']));
			$ui->assign('e', $e);
			$ui->assign('tg1', $tg1);
			$ui->assign('tg3', $tg3);
			$ui->assign('idate', $idate);
			$ui->assign('idates', $idates);
			$ui->assign('_sysfrm_menu1', 'Persetujuan UR');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'persetujuan-ur1', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
			$ui->display($spath . 'persetujuan-ur1.tpl');
		} else r2(U . 'permintaanbarang/persetujuan-ur', 'e', 'User request tersebut tidak ditemukan');
		break;

	case 'persetujuan-ur1-aprv':
		Event::trigger('permintaanbarang/persetujuan-ur1-aprv/');
		_auth1('PERSETUJUAN-UR', $user['id']);

		$idphp = _post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		$no_ur = $d['no_mintabarang'];
		$tgl = $d['tanggal'];
		$nomor = $d['nomor'];

		$c = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $d['no_mintabarang'])->order_by_asc('id')->find_many();
		$isi = '';
		for ($i = 0; $i < count($c); $i++) {
			$isi .= "<b>PERMINTAAN BARANG #" . (intval($i) + 1) . "</b> <br>
					Keperluan : " . $c[$i]['keperluan'] . " <br>
					Item : " . $c[$i]['namabarang'] . " <br>
					Qty Request : " . $c[$i]['qty_req'] . " <br>
					Tanggal Diperlukan : " . date('Y-m-d', strtotime($c[$i]['tgl_diperlukan'])) . " <br>
					Keterangan : " . $c[$i]['keterangan'] . " <br><br>
			";
		}

		if ($d) {
			$nomor = $d->no_mintabarang;
			if ($d->tahap == 1) {

				$bengkel = ORM::for_table('daftar_department', 'dblogin')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
				$kode_bengkel = array();
				foreach ($bengkel as $b) {
					array_push($kode_bengkel, $b->kode_dept);
				}

				$d->disetujui_atasan_oleh = $user['fullname'];
				$d->disetujui_atasan_nama = $user['username'];
				$d->disetujui_atasan_tgl = date('Y-m-d');

				if (in_array($d->kode_dept, $kode_bengkel)) {
					$d->tahap = 2;
					$email = 2;
				} else {
					$d->tahap = 3;
					$email = 3;
				}
			} else if ($d->tahap == 2) {
				$d->disetujui_service_oleh = $user['fullname'];
				$d->disetujui_service_nama = $user['username'];
				$d->disetujui_service_tgl = date('Y-m-d');
				$d->tahap = 3;
				$email = 3;
			} else {
				$d->approval = 'APPROVED';
				$d->disetujui_gas_oleh = $user['fullname'];
				$d->disetujui_gas_nama = $user['username'];
				$d->disetujui_gas_tgl = date('Y-m-d');
				$email = 4;
			}
			$d->save();
			ORM::get_db()->commit();

			switch ($email) {
				case 2:
					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval UR')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'SDH')->find_one();
					if ($g) $to = $g['atasan'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $tgl);
					$message->set('nomor', $nomor);
					$message->set('isi', $isi);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to, $to, $subj, $message_o);
					break;
				case 3:
					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval UR')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
					if ($g) $to = $g['approval'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $tgl);
					$message->set('nomor', $nomor);
					$message->set('isi', $isi);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to, $to, $subj, $message_o);
					break;
				case 4:
					break;
			}

			$data = array(
				'msg'			=>  'Berhasil Approve No. ' . $nomor,
				'dataval'		=>	1
			);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'Tidak ada data ' . $idphp,
				'dataval'		=>	1
			);
			echo json_encode($data);
		}
		break;

	case 'persetujuan-ur1-reject':
		Event::trigger('permintaanbarang/persetujuan-ur1-reject/');
		_auth1('PERSETUJUAN-UR', $user['id']);

		$idphp = _post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		if ($d) {
			$nomor = $d->no_mintabarang;
			$d->approval = 'REJECTED';
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['username'];
			$d->ditolak_tgl = date('Y-m-d');
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Reject No. ' . $nomor,
				'dataval'		=>	1
			);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'tdk ada data ' . $idphp,
				'dataval'		=>	1
			);
			echo json_encode($data);
		}
		break;

	case 'penerimaan-ur':
		Event::trigger('permintaanbarang/penerimaan-ur/');
		_auth1('SHOW-PENERIMAAN-UR', $user['id']);

		$ui->assign('_sysfrm_menu', 'Persetujuan');
		$ui->assign('_sysfrm_menu1', 'Penerimaan UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'penerimaan-ur', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));

		$ui->display($spath . 'penerimaan-ur.tpl');
		break;

	case 'penerimaan-ur1':
		Event::trigger('permintaanbarang/penerimaan-ur1/');
		_auth1('PENERIMAAN-UR', $user['id']);

		$cid = $routes['3'];
		$d = ORM::for_table('mintabarang_master')->find_one($cid);
		if ($d) {
			$ui->assign('d', $d);
			$ui->assign('cid', $cid);
			$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $d['no_mintabarang'])->find_many();
			$tg1 = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active', 'Y')->find_many();
			$idate = date('d-m-Y', strtotime($d['tanggal']));
			$idates = date('d-m-Y', strtotime($n['tanggal']));
			$ui->assign('e', $e);
			$ui->assign('tg1', $tg1);
			$ui->assign('tg3', $tg3);
			$ui->assign('idate', $idate);
			$ui->assign('idates', $idates);
			$ui->assign('_sysfrm_menu1', 'Penerimaan UR');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'penerimaan-ur1', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
			$ui->display($spath . 'penerimaan-ur1.tpl');
		} else r2(U . 'permintaanbarang/penerimaan-ur', 'e', 'User request tersebut tidak ditemukan');
		break;

	case 'penerimaan-ur1-aprv':
		Event::trigger('permintaanbarang/penerimaan-ur1-aprv/');
		_auth1('PENERIMAAN-UR', $user['id']);

		$idphp = _post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		$no_ur = $d['no_mintabarang'];
		$tgl = $d['tanggal'];
		$nomor = $d['nomor'];

		if ($d) {
			$nomor = $d->no_mintabarang;
			$d->approval = 'APPROVED';
			$d->disetujui_gas_oleh = $user['fullname'];
			$d->disetujui_gas_nama = $user['username'];
			$d->disetujui_gas_tgl = date('Y-m-d');
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Menerima No. ' . $nomor,
				'dataval'		=>	1
			);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'Tidak ada data ' . $idphp,
				'dataval'		=>	1
			);
			echo json_encode($data);
		}
		break;

	case 'penerimaan-ur1-reject':
		Event::trigger('permintaanbarang/penerimaan-ur1-reject/');
		_auth1('PENERIMAAN-UR', $user['id']);

		$idphp = _post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		if ($d) {
			$nomor = $d->no_mintabarang;
			$d->approval = 'REJECTED';
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['username'];
			$d->ditolak_tgl = date('Y-m-d');
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Reject No. ' . $nomor,
				'dataval'		=>	1
			);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'tdk ada data ' . $idphp,
				'dataval'		=>	1
			);
			echo json_encode($data);
		}
		break;

	case 'detail-ur-reject':
		Event::trigger('permintaanbarang/detail-ur-reject/');
		_auth1('UR-APRV-GAS', $user['id']);
		$idphp = _post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		if ($d) {
			$nomor = $d->no_mintabarang;
			$d->approval = 'REJECTED';
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['username'];
			$d->ditolak_tgl = date('Y-m-d');
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Reject No. ' . $nomor,
				'dataval'		=>	1
			);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'tdk ada data ' . $idphp,
				'dataval'		=>	1
			);
			echo json_encode($data);
		}
		break;

	case 'detail-ur-aprv1':
		Event::trigger('permintaanbarang/detail-ur-aprv1/');
		_auth1('UR-APRV-GAS', $user['id']);

		$idphp = _post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		$no_ur = $d['no_mintabarang'];
		$tgl = $d['tanggal'];
		$nomor = $d['nomor'];

		$c = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $d['no_mintabarang'])->order_by_asc('id')->find_many();
		$isi = '';
		for ($i = 0; $i < count($c); $i++) {
			$isi .= "<b>PERMINTAAN BARANG #" . (intval($i) + 1) . "</b> <br>
					Keperluan : " . $c[$i]['keperluan'] . " <br>
					Item : " . $c[$i]['namabarang'] . " <br>
					Qty Request : " . $c[$i]['qty_req'] . " <br>
					Tanggal Diperlukan : " . date('Y-m-d', strtotime($c[$i]['tgl_diperlukan'])) . " <br>
					Keterangan : " . $c[$i]['keterangan'] . " <br><br>
			";
		}

		if ($d) {
			$nomor = $d->no_mintabarang;
			if ($d->tahap == 1) {

				$bengkel = ORM::for_table('daftar_department', 'dblogin')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
				$kode_bengkel = array();
				foreach ($bengkel as $b) {
					array_push($kode_bengkel, $b->kode_dept);
				}

				$d->disetujui_atasan_oleh = $user['fullname'];
				$d->disetujui_atasan_nama = $user['username'];
				$d->disetujui_atasan_tgl = date('Y-m-d');

				if (in_array($d->kode_dept, $kode_bengkel)) {
					$d->tahap = 2;
					$email = 2;
				} else {
					$d->tahap = 3;
					$email = 3;
				}
			} else if ($d->tahap == 2) {
				$d->disetujui_service_oleh = $user['fullname'];
				$d->disetujui_service_nama = $user['username'];
				$d->disetujui_service_tgl = date('Y-m-d');
				$d->tahap = 3;
				$email = 3;
			} else {
				$d->approval = 'APPROVED';
				$d->disetujui_gas_oleh = $user['fullname'];
				$d->disetujui_gas_nama = $user['username'];
				$d->disetujui_gas_tgl = date('Y-m-d');
				$email = 4;
			}
			$d->save();
			ORM::get_db()->commit();

			switch ($email) {
				case 2:
					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval UR')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'SDH')->find_one();
					if ($g) $to = $g['atasan'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $tgl);
					$message->set('nomor', $nomor);
					$message->set('isi', $isi);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to, $to, $subj, $message_o);
					break;
				case 3:
					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval UR')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
					if ($g) $to = $g['approval'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $tgl);
					$message->set('nomor', $nomor);
					$message->set('isi', $isi);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to, $to, $subj, $message_o);
					break;
				case 4:
					break;
			}

			$data = array(
				'msg'			=>  'Berhasil Approve No. ' . $nomor,
				'dataval'		=>	1
			);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'Tidak ada data ' . $idphp,
				'dataval'		=>	1
			);
			echo json_encode($data);
		}
		break;




	case 'list-ur-aprv':
		Event::trigger('permintaanbarang/list-ur-aprv/');
		_auth1('UR-APRV-GAS', $user['id']);
		$msg = $routes['3'];
		$array = filterdept($user['kode_dept']);
		// echo $array;
		// $d = ORM::for_table('mintabarang_master')->where('approval', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		// $e = ORM::for_table('mintabarang_master')->where('approval', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		// $cd = ORM::for_table('mintabarang_master')->where('approval', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		// $ce = ORM::for_table('mintabarang_master')->where('approval', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		// $coba = ORM::fS
		// $ui->assign('d',$d);
		// $ui->assign('e',$e);
		// $ui->assign('cd',$cd);
		// $ui->assign('ce',$ce);
		$ce = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', $user["kode_dept"])->find_one();
		$cd = ORM::for_table('daftar_approval')->where('approval', $user["username"])->find_one();
		// $ui->assign('atasan', ($ce["atasan"] == $user["username"]) || ($user["user_type"] == "Admin"));
		$ui->assign('atasan', $ce["atasan"]);
		$ui->assign('ga_admin', $cd);
		$ui->assign('msg', $msg);
		$ui->assign('_sysfrm_menu2', 'user-request-approve');
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-ur-approved', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
		$ui->display($spath . 'list-ur-aprv.tpl');
		break;

		// case 'list-ur-aprv':
		// 	Event::trigger('permintaanbarang/list-ur-aprv/');
		// 	_auth1('UR-APRV-GAS',$user['id']);
		// 	$msg = $routes['3'];
		// 	$array = filterdept($user['kode_dept']);
		// 	$d = ORM::for_table('mintabarang_master')->where('approval', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		// 	$e = ORM::for_table('mintabarang_master')->where('approval', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		// 	$cd = ORM::for_table('mintabarang_master')->where('approval', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		// 	$ce = ORM::for_table('mintabarang_master')->where('approval', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		// 	$ui->assign('d',$d);
		// 	$ui->assign('e',$e);
		// 	$ui->assign('cd',$cd);
		// 	$ui->assign('ce',$ce);
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu2', 'user-request-approve');
		// 	// $ui->assign('xfooter');
		// 	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-ur-approved','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'list-ur-aprv.tpl');
		// 	break;

	case 'detail-ur-aprv':
		Event::trigger('permintaanbarang/detail-ur-aprv/');
		_auth1('UR-DETAIL-APRV-GAS', $user['id']);
		$cid = $routes['3'];
		$d = ORM::for_table('mintabarang_master')->find_one($cid);
		if ($d) {
			$ui->assign('d', $d);
			$ui->assign('cid', $cid);
			$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $d['no_mintabarang'])->find_many();
			$f = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
			$tg1 = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active', 'Y')->find_many();
			$idate = date('d-m-Y', strtotime($d['tanggal']));
			$idates = date('d-m-Y', strtotime($n['tanggal']));
			$ui->assign('e', $e);
			$ui->assign('f', $f);
			$ui->assign('tg1', $tg1);
			$ui->assign('tg3', $tg3);
			$ui->assign('idate', $idate);
			$ui->assign('idates', $idates);
			$ui->assign('_sysfrm_menu2', 'user-request-approve');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'detail-ur-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
			$ui->display($spath . 'detail-ur-aprv.tpl');
		} else r2(U . 'permintaanbarang/list-ur-aprv', 'e', 'User request tersebut tidak ditemukan');
		break;

		// case 'render-bagian':
		// 	$kode = _post('kode');
		// 	if($kode <> '') {
		// 		if($kode == 'STOCK') {
		// 			$opt = '<option value="STOCK">STOCK</option>';
		// 			$data = array(
		// 					'opt'			=>	$opt);
		// 			echo json_encode($data);
		// 		} else {
		// 			$opt = '<option value="">Pilih Bagian</option>';
		// 			$y = ORM::for_table('daftar_kategori')->where('parent', 'Y')->find_many();
		// 			foreach($y as $r) {
		// 				$opt .= '<option value="'.$r['kode_kategori'].'">'.$r['nm_kategori'].'</option>';
		// 				}
		// 			$data = array(
		// 					'opt'			=>	$opt);
		// 			echo json_encode($data);
		// 		}
		// 	} else {
		// 		$data = array(
		// 				'opt'	=>	'<option value="">Pilih Bagian</option>');
		// 		echo json_encode($data);
		// 	}
		// 	break;


	case 'render-main':
		$kode = _post('kode');
		if ($kode <> '') {
			if ($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
					'opt'			=>	$opt
				);
				echo json_encode($data);
			} else {
				$opt = '<option value="">Pilih Main Data</option>';
				$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
				foreach ($y as $r) {
					$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nm_kategori'] . '</option>';
				}
				$data = array(
					'opt'			=>	$opt
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'opt'	=>	'<option value="">Pilih Main Data</option>'
			);
			echo json_encode($data);
		}

		break;


	case 'render-sub':

		$kode = _post('kode');
		if ($kode <> '') {
			if ($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
					'opt'			=>	$opt
				);
				echo json_encode($data);
			} else {
				$opt = '<option value="">Pilih Sub Data</option>';
				$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
				foreach ($y as $r) {
					$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nm_kategori'] . '</option>';
				}
				$data = array(
					'opt'			=>	$opt
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'opt'	=>	'<option value="">Pilih Sub Data</option>'
			);
			echo json_encode($data);
		}

		break;

	case 'render-line':
		$kode = _post('kode');
		if ($kode <> '') {
			if ($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
					'opt'			=>	$opt
				);
				echo json_encode($data);
			} else {

				$opt = '<option value="">Pilih Line Data</option>';
				$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
				foreach ($y as $r) {
					$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nm_kategori'] . '</option>';
				}
				$data = array(
					'opt'			=>	$opt
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'opt'	=>	'<option value="">Pilih Line Data</option>'
			);
			echo json_encode($data);
		}
		break;


	case 'render-inv_item':
		$kode = _post('kode');
		if ($kode <> '') {
			if ($kode == 'STOCK') {
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
				foreach ($y as $r) {
					$opt .= '<option value="' . $r['kd_item'] . '">' . $r['nm_item'] . '</option>';
				}
				$data = array(
					'opt'			=>	$opt,
					'nama_bagian'	=>  'STOCK'
				);
				echo json_encode($data);
			} else {
				$z = ORM::for_table('daftar_kategori')->where('kode_kategori', $kode)->find_one();
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori', $kode)->find_many();
				foreach ($y as $r) {
					$x = ORM::for_table('daftar_itemstock')->where('kd_item', $r['kd_item'])->where('active', 'Y')->find_one();
					$opt .= '<option value="' . $r['kd_item'] . '">' . $x['nm_item'] . '</option>';
				}
				$data = array(
					'opt'			=>	$opt,
					'nama_bagian'	=>  $z['nm_kategori']
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'opt'	=>	'<option value="">Pilih Item Stock</option>',
				'nama_bagian'  => ''
			);
			echo json_encode($data);
		}
		break;

	case 'render-itemstock':
		$kode = _post('kode');
		if ($kode <> '') {
			$y = ORM::for_table('daftar_itemstock')->where('kd_item', $kode)->find_one();
			if ($y) {
				$data = array(
					'merk'			=>	$y['merk'],
					'tipe'			=>	$y['tipe'],
					'satuan'		=>	$y['satuan'],
					'spesifikasi'	=>	$y['spesifikasi'],
					'nm_item'		=>  $y['nm_item']
				);
				echo json_encode($data);
			} else {
				$data = array(
					'merk'			=>	'',
					'tipe'			=>	'',
					'satuan'		=>	'',
					'spesifikasi'	=>	'',
					'nm_item'		=>  ''
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'merk'			=>	'',
				'tipe'			=>	'',
				'satuan'		=>	'',
				'spesifikasi'	=>	'',
				'nm_item'		=>  ''
			);
			echo json_encode($data);
		}
		break;

		// case 'dept-list-mintabarang-pending':
		// 	Event::trigger('permintaanbarang/dept-list-mintabarang-pending/');
		// 	_auth1('SHOW-DEPT-UR',$user['id']);

		// 	$d = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'User Request Departemen');
		// 	$ui->assign('_sysfrm_menu2', 'UR Pending');
		// 	$ui->assign('d', $d);
		// 	$ui->assign('xfooter', Asset::js(array($spath.'dept-list-mintabarang')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'dept-list-mintabarang-pending.tpl');
		// 	break;

		// case 'dept-list-mintabarang-approved':
		// 	Event::trigger('permintaanbarang/dept-list-mintabarang-approved/');
		// 	_auth1('SHOW-DEPT-UR',$user['id']);

		// 	$d = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'User Request Departemen');
		// 	$ui->assign('_sysfrm_menu2', 'UR Approved');
		// 	$ui->assign('d', $d);
		// 	$ui->assign('xfooter', Asset::js(array($spath.'dept-list-mintabarang')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'dept-list-mintabarang-approved.tpl');
		// 	break;

		// case 'dept-list-mintabarang-rejected':
		// 	Event::trigger('permintaanbarang/dept-list-mintabarang-rejected/');
		// 	_auth1('SHOW-DEPT-UR',$user['id']);

		// 	$d = ORM::for_table('daftar_department', 'dblogin')->where('atasan', $user['username'])->find_one();

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'User Request Departemen');
		// 	$ui->assign('_sysfrm_menu2', 'UR Reject');
		// 	$ui->assign('d', $d);
		// 	$ui->assign('xfooter', Asset::js(array($spath.'dept-list-mintabarang')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'dept-list-mintabarang-rejected.tpl');
		// 	break;

		// case 'dept-list-mintabarang-cancelled':
		// 	Event::trigger('permintaanbarang/dept-list-mintabarang-cancelled/');
		// 	_auth1('SHOW-DEPT-UR',$user['id']);

		// 	$msg = $routes['3'];
		// 	$ui->assign('msg',$msg);
		// 	$ui->assign('_sysfrm_menu1', 'User Request Departemen');
		// 	$ui->assign('_sysfrm_menu2', 'UR Cancelled');
		// 	$ui->assign('xfooter', Asset::js(array($spath.'dept-list-mintabarang')));
		// 	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		// 	$ui->display($spath.'dept-list-mintabarang-cancelled.tpl');
		// 	break;


		case 'render-status-ur':
			$kode = _post('kode');
			if (!empty($kode)) { // Cek jika kode tidak kosong
				$y = ORM::for_table('mintabarang_master')->where('no_mintabarang', $kode)->find_one();
				if ($y) {
					$data = array(
						'disetujui_atasan_oleh' => $y['disetujui_atasan_oleh'],
						'disetujui_atasan_tgl' => $y['disetujui_atasan_tgl'],
						'disetujui_gas_oleh' => $y['disetujui_gas_oleh'],
						'disetujui_gas_tgl' => $y['disetujui_gas_tgl'],
						'disetujui_service_oleh' => $y['disetujui_service_oleh'],
						'disetujui_service_tgl' => $y['disetujui_service_tgl'],
						'no_mintabarang' => $y['no_mintabarang'], // Tambahkan no_mintabarang jika diperlukan
						'pesan' => $y['pesan']
					);
					echo json_encode($data);
				} else {
					// Mengembalikan array kosong jika tidak ada data
					echo json_encode(array(
						'disetujui_atasan_oleh' => '',
						'disetujui_atasan_tgl' => '',
						'disetujui_gas_oleh' => '',
						'disetujui_gas_tgl' => '',
						'disetujui_service_oleh' => '',
						'disetujui_service_tgl' => '',
						'no_mintabarang' => '', // Tambahkan ini untuk konsistensi
						'pesan' => ''
					));
				}
			} else {
				// Jika kode kosong, kembalikan array kosong
				echo json_encode(array(
					'disetujui_atasan_oleh' => '',
					'disetujui_atasan_tgl' => '',
					'disetujui_gas_oleh' => '',
					'disetujui_gas_tgl' => '',
					'disetujui_service_oleh' => '',
					'disetujui_service_tgl' => '',
					'no_mintabarang' => '',
					'pesan' => ''
				));
			}
			break;
			
	default:
		echo 'action not defined';
}
