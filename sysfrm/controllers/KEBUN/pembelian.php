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
	$myCtrl = 'pembelian';
}
_auth();
$ui->assign('_sysfrm_menu', 'transaksi');
$ui->assign('_title', 'Pembelian - ' . $config['CompanyName']);
$ui->assign('_st', 'Pembelian');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

function filterdept($user_dept) {
	$sysusers = ORM::for_table('sys_users', 'dblogin')->select('id')->where('kode_dept', $user_dept)->find_many();
	$array = array();
	foreach ($sysusers as $usersss) {
		array_push($array, $usersss->id);
	}
	return $array;
}

function encryptUrlParams($params) {
    $key = "miscapella"; // Use a strong secret key
    $cipher = "AES-256-CBC";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($params, $cipher, $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

switch ($action) {
case 'list-pr':
	Event::trigger('pembelian/listpr/');
	_auth1('PR-LIST', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu3', 'list-pr');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-pr.tpl');
	break;

case 'list-pr-pending':
	Event::trigger('pembelian/listpr/');
	_auth1('PR-LIST-PENDING', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'pr-pending');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-pr-pending.tpl');
	break;

case 'list-pr1-pending':
	Event::trigger('pembelian/listpr/');
	_auth1('PR1-LIST-PENDING', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu3', 'pr1-pending');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-pr-sup-pending.tpl');
	break;

case 'list-pr-reject':
	Event::trigger('pembelian/listpr/');
	_auth1('PR-LIST-REJECT', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'pr-reject');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-pr-rejected.tpl');
	break;

case 'list-pr1-reject':
	Event::trigger('pembelian/listpr/');
	_auth1('PR1-LIST-REJECT', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-requisition');
	$ui->assign('_sysfrm_menu3', 'pr1-reject');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
 ');
	$ui->display($spath . 'list-pr-sup-rejected.tpl');
	break;

case 'list-pr-approve':
	Event::trigger('pembelian/listpr/');
	_auth1('PR-LIST-APPROVE', $user['id']);
	$name = _post('name');
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'pr-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
 ');
	$ui->display($spath . 'list-pr-approved.tpl');
	break;

case 'list-pr1-approve':
	Event::trigger('pembelian/listpr/');
	_auth1('PR1-LIST-APPROVE', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu3', 'pr1-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
 ');
	$ui->display($spath . 'list-pr-sup-approved.tpl');
	break;

case 'detail-pr':
	Event::trigger('pembelian/detail-pr/');
	_auth1('PR-DETAIL', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$tg = ORM::for_table('daftar_kategori')->find_many();
		$clist = '';
		$clist = '<option value="">Pilih Inventaris</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		foreach ($tg as $r) {
			$clist .= '<option value="' . $r['kd_inventaris'] . '">' . $r['kd_inventaris'] . ' - ' . $r['nm_inventaris'] . '</option>';
		}
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		if ($d['posisi'] == 'PR') {
			if ($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
				$ui->assign('_sysfrm_menu1', 'permintaan');
				$ui->assign('_sysfrm_menu2', 'pr-pending');
			} else if ($d['status'] == 'REJECT') {
				$ui->assign('_sysfrm_menu1', 'permintaan');
				$ui->assign('_sysfrm_menu2', 'pr-reject');
			} else if ($d['status'] == 'APPROVE') {
				$ui->assign('_sysfrm_menu1', 'permintaan');
				$ui->assign('_sysfrm_menu2', 'pr-approve');
			}
		} else {
			if ($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
				$ui->assign('_sysfrm_menu1', 'pembelian');
				$ui->assign('_sysfrm_menu3', 'pr1-pending');
			} else if ($d['status'] == 'REJECT') {
				$ui->assign('_sysfrm_menu1', 'pembelian');
				$ui->assign('_sysfrm_menu3', 'pr1-reject');
			} else if ($d['status'] == 'APPROVE') {
				$ui->assign('_sysfrm_menu1', 'pembelian');
				$ui->assign('_sysfrm_menu3', 'pr1-approve');
			}
		}
		$ui->assign('e', $e);
		$ui->assign('tg', $tg);
		$ui->assign('clist', $clist);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-pr', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-pr.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'add-pr':
	Event::trigger('pembelian/add-pr/');
	_auth1('PR-ADD', $user['id']);
	$clist = '';
	$clist = '<option value="">Pilih Keperluan</option>';
	$clist .= '<option value="STOCK">STOCK</option>';
	$clist .= '<option value="DIRECT">DIRECT</option>';
	$idate = date('d-m-Y');
	$ui->assign('clist', $clist);
	$ui->assign('idate', $idate);
	$ui->assign('_sysfrm_menu1', 'permintaan');
	$ui->assign('_sysfrm_menu2', 'pr-add');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-pr', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-pr.tpl');
	break;

case 'add-pr-post':
	Event::trigger('pembelian/add-pr-post/');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$bagian = explode(',', _post('bagian'));
	$main = explode(',', _post('main'));
	$sub = explode(',', _post('sub'));
	$line = explode(',', _post('line'));
	$qty = explode(',', _post('qty'));
	$diperlukan = explode(',', _post('diperlukan'));
	$keterangan = explode(',', _post('keterangan'));
	$priority = _post('priority');
	$no_pr_fisik = _post('no_pr_fisik');
	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$msg_diperlukan = '';
	$i = 0;
	$ii = 0;

	$approve_key = generateRandomString(24);
	$reject_key = generateRandomString(24);
	$comment_key = generateRandomString(24);

	foreach ($keperluan as $code) {
		if ($item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($diperlukan[$i] == '') {
			$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		}

		if ($qty[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

		if ($msg_tgl != '') {
			$msg .= $msg_tgl . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	// sort($item);
	$cek = '';
	$flag = false;
	$error = '';
	foreach ($item as $code) {
		if ($cek == $code) {
			$flag = true;
			break;
		} else {
			$flag = false;
		}

		$cek = $code;
	}
	if ($flag) {
		$msg .= 'Ada Item Stock double<br>';
	}

	if ($priority == '') {
		$msg .= 'Belum Memilih Tingkat Kepentingan<br>';
	}

	if ($no_pr_fisik == '') {
		$msg .= 'No PR Fisik Harus Diisi<br>';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_pr = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_pr));
			$th = date('Y', strtotime($tgl_pr));
			$chk = ORM::for_table('pr_master')->raw_query('select * from pr_master where month(tgl_pr)=' . $bl . ' and year(tgl_pr)=' . $th . ' order by no_pr desc')->find_one();
			if ($chk) {
				$no = ++$chk['no_pr'];
			} else {
				$no = 'PR/' . $th . '/' . date('m', strtotime($tgl_pr)) . '/0001';
			}
			$d = ORM::for_table('pr_master')->create();
			$d->no_pr = $no;
			$d->tgl_pr = $tgl_pr;
			$d->dibuat_oleh = $user['id'];
			$d->dibuat_nama = $user['fullname'];
			$d->dibuat_tgl = date('Y-m-d H:i:s');
			$d->posisi = 'PR';
			$d->status = 'PENDING';
			$d->approve_key = $approve_key;
			$d->reject_key = $reject_key;
			$d->comment_key = $comment_key;
			$d->priority = $priority;
			$d->no_pr_fisik = $no_pr_fisik;
			$d->save();

			$i = 0;
			$isi = '';
			foreach ($keperluan as $code) {
				$sitem = $item[$i];
				$sqty = str_replace(".", "", $qty[$i]);
				$sketerangan = $keterangan[$i];
				$sdiperlukan = $diperlukan[$i];
				$sbagian = $bagian[$i];
				$smain = $main[$i];
				$ssub = $sub[$i];
				$sline = $line[$i];

				$y = ORM::for_table('pr_detail')->create();
				$y->no_pr = $no;
				$y->kode_item = $sitem;
				$y->qty_req = $sqty;
				$y->status = 'PENDING';
				if (Validator::Date1($sdiperlukan) != 'Salah') {
					$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
				} else {
					$y->tgl_diperlukan = null;
				}

				$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
				$y->keterangan = $sketerangan;
				$y->bagian = $sbagian;
				$y->main = $smain;
				$y->sub = $ssub;
				$y->line = $sline;
				$y->save();
				$i++;

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
				$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
				$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
				$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
				$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
				$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
							Keperluan : " . $code . " <br>";
				if ($code == 'STOCK') {
					$isi .= "Bagian : STOCK <br>";
				} else {
					$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
				}
				$isi .= "
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($sqty, 0, '', '.') . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($sdiperlukan)) . " <br>
							Keterangan : " . $sketerangan . " <br><br>
					";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Data PR : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PR')->find_one();
			$to = ['capella.zoom@gmail.com'];
			$g = ORM::for_table('daftar_approval')->where('kode_dept', $user['kode_dept'])->where_in('setting', array('pr_disetujui', 'pr_diketahui', 'pr_diperiksa'))->find_many();
			if ($g) {
				$to = [];
			}

			foreach ($g as $gs) {
				$to = array_merge($to, explode('|', $gs['approval']));
			}

			
			foreach ($to as $item) {
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_pr', $no);
			$message->set('tgl_pr', $tgl_pr);
			$message->set('kepentingan', $priority);
			$linkcomment = APP_URL . '/?ng=kebun-api/comment-pr/' . $cid . '/token_' . $comment_key;
			$params = $user['kode_dept'] . '/' . $item;
			$encryptedParams = encryptUrlParams($params);
			$linkcomment .= '/' . $encryptedParams;
			$linkapprove = APP_URL . '/?ng=kebun-api/approve-pr/' . $cid . '/token_' . $approve_key . '/' . $encryptedParams;
			$linkreject = APP_URL . '/?ng=kebun-api/reject-pr/' . $cid . '/token_' . $reject_key . '/' . $encryptedParams;
			$message->set('link_comment', $linkcomment);
			$message->set('link_approve', $linkapprove);
			$message->set('link_reject', $linkreject);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			Notify_Email::_send($item, $item, $subj, $message_o);
			}
			Event::trigger('pembelian/add-pr-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. PR : ' . $no,
				'dataval' => 1);
			echo json_encode($data);
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

case 'edit-pr':
	Event::trigger('pembelian/edit-pr/');
	_auth1('PR-EDIT', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_kategori')->find_many();
		$clist = '';
		$clist = '<option value="">Pilih Keperluan</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="DIRECT">DIRECT</option>';

		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$ui->assign('e', $e);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('clist', $clist);
		$ui->assign('idate', $idate);
		$ui->assign('_sysfrm_menu2', 'pr-pending');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-pr', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'edit-pr.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'edit-pr-post':
	Event::trigger('pembelian/edit-pr-post/');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$bagian = explode(',', _post('bagian'));
	$main = explode(',', _post('main'));
	$sub = explode(',', _post('sub'));
	$line = explode(',', _post('line'));
	$qty = explode(',', _post('qty'));
	$diperlukan = explode(',', _post('diperlukan'));
	$keterangan = explode(',', _post('keterangan'));
	$priority = _post('priority');
	$no_pr = _post('no_pr');
	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$msg_diperlukan = '';
	$i = 0;
	$ii = 0;
	foreach ($keperluan as $code) {
		if ($item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($diperlukan[$i] == '') {
			$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		}

		if ($qty[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

		if ($msg_diperlukan != '') {
			$msg .= $msg_diperlukan . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	// sort($item);
	$cek = '';
	$flag = false;
	$error = '';
	foreach ($item as $code) {
		if ($cek == $code) {
			$flag = true;
			break;
		} else {
			$flag = false;
		}

		$cek = $code;
	}
	if ($flag) {
		$msg .= 'Ada Item Stock double<br>';
	}

	$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
	if ($d['status'] != 'PENDING') {
		$msg .= 'Hanya Data PR dengan Status PENDING yang dapat diubah';
	}
	if ($d['diperiksa_tgl'] || $d['diketahui_tgl'] || $d['disetujui_tgl']) {
		$msg .= 'PR tidak dapat diubah karena sudah ada approval';
	}
	if ($priority == '') {
		$msg .= 'Belum Memilih Tingkat Kepentingan';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_pr = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_pr));
			$th = date('Y', strtotime($tgl_pr));

			$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$d->diedit_oleh = $user['id'];
			$d->diedit_nama = $user['fullname'];
			$d->diedit_tgl = date('Y-m-d H:i:s');
			$d->priority = $priority;
			$d->save();

			$i = 0;
			$x = ORM::for_table("pr_detail")->where('no_pr', $no_pr)->delete_many();
			foreach ($keperluan as $code) {
				$sitem = $item[$i];
				$sqty = str_replace(".", "", $qty[$i]);
				$sketerangan = $keterangan[$i];
				$sdiperlukan = $diperlukan[$i];
				$sbagian = $bagian[$i];
				$smain = $main[$i];
				$ssub = $sub[$i];
				$sline = $line[$i];

				$y = ORM::for_table('pr_detail')->create();
				$y->no_pr = $no_pr;
				$y->kode_item = $sitem;
				$y->qty_req = $sqty;
				$y->status = 'PENDING';
				if (Validator::Date1($sdiperlukan) != 'Salah') {
					$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
				} else {
					$y->tgl_diperlukan = null;
				}

				$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
				$y->keterangan = $sketerangan;
				$y->bagian = $sbagian;
				$y->main = $smain;
				$y->sub = $ssub;
				$y->line = $sline;
				$y->save();
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Edit Data PR : ' . $no_pr . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('pembelian/add-pr-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. PR : ' . $no_pr,
				'dataval' => 1);
			echo json_encode($data);
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

case 'edit-pr-supplier':
	Event::trigger('pembelian/edit-pr/');
	_auth1('PR-EDIT-SUPPLIER', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_kategori')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$tg4 = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nama_supplier")->left_outer_join("daftar_supplier", array("a.kode_supplier", "=", "b.kode_supplier"), "b")->where('status', 'aktif')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$ui->assign('e', $e);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('tg3', $tg3);
		$ui->assign('tg4', $tg4);
		$ui->assign('_sysfrm_menu3', 'pr1-pending');
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-pr-supplier', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'edit-pr-supplier.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'edit-pr-supplier-post':
	Event::trigger('pembelian/edit-pr-supplier-post/');
	$no_pr = _post('no_pr');
	$pembelian = _post('pembelian');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$bagian = explode(',', _post('bagian'));
	$main = explode(',', _post('main'));
	$sub = explode(',', _post('sub'));
	$line = explode(',', _post('line'));
	$qty = explode(',', _post('qty'));
	$diperlukan = explode(',', _post('diperlukan'));
	$keterangan = explode(',', _post('keterangan'));
	$kode_supplier1 = explode(',', _post('kode_supplier1'));
	$harga1 = explode(',', _post('harga1'));
	$keterangan_supplier1 = explode(',', _post('keterangan_supplier1'));
	$file_supplier1 = explode(',', _post('file_supplier1'));
	$kode_supplier2 = explode(',', _post('kode_supplier2'));
	$harga2 = explode(',', _post('harga2'));
	$keterangan_supplier2 = explode(',', _post('keterangan_supplier2'));
	$file_supplier2 = explode(',', _post('file_supplier2'));
	$kode_supplier3 = explode(',', _post('kode_supplier3'));
	$harga3 = explode(',', _post('harga3'));
	$keterangan_supplier3 = explode(',', _post('keterangan_supplier3'));
	$file_supplier3 = explode(',', _post('file_supplier3'));
	$supplierpilihan = explode(',', _post('supplierpilihan'));

	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$msg_diperlukan = '';
	$msg_supplier = '';
	$msg_pilihan = '';
	$i = 0;
	$ii = 0;
	foreach ($keperluan as $code) {
		if ($item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($diperlukan[$i] == '') {
			$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		}

		if ($qty[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($kode_supplier1[$i] == '' || $harga1[$i] == '') {
			$msg_supplier = 'Ada detail yang Kode Supplier 1 dan Harga 1 masih kosong';
		}

		if ($supplierpilihan[$i] == '') {
			$msg_pilihan = 'Ada detail yang belum memilih Supplier Pilihan';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

		if ($msg_supplier != '') {
			$msg .= $msg_supplier . '<br>';
		}

		if ($msg_pilihan != '') {
			$msg .= $msg_pilihan . '<br>';
		}

		if ($msg_diperlukan != '') {
			$msg .= $msg_diperlukan . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request';
	}

	$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
	if ($d['status'] != 'PENDING' && $d['status'] != 'REJECT' && $d['status'] != 'REVISI') {
		$msg .= 'Hanya Data PR dengan Status PENDING atau REJECT yang dapat melakukan Edit<br>';
	}
	if ($d['posisi'] != 'PR1') {
		$msg .= 'Hanya Data PR dengan Posisi PR1 yang dapat melakukan Edit<br>';
	}
	if ($pembelian == '') {
		$msg .= 'Jenis Pembelian tidak boleh kosong<br>';
	}

	if ($msg == '') {

		ORM::get_db()->beginTransaction();
		try {
			$tgl_pr = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_pr));
			$th = date('Y', strtotime($tgl_pr));

			$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$d->sup_diedit_oleh = $user['id'];
			$d->sup_diedit_nama = $user['fullname'];
			$d->sup_diedit_tgl = date('Y-m-d H:i:s');
			$d->pembelian = $pembelian;
			if ($d['status'] == 'REJECT' or $d['status'] == 'REVISI') {
				$d->status = 'REVISI';
			}
			$d->save();

			$i = 0;
			$x = ORM::for_table("pr_detail")->where('no_pr', $no_pr)->delete_many();
			foreach ($keperluan as $code) {
				$sitem = $item[$i];
				$sqty = str_replace(".", "", $qty[$i]);
				$sketerangan = $keterangan[$i];
				$sdiperlukan = $diperlukan[$i];
				$sbagian = $bagian[$i];
				$smain = $main[$i];
				$ssub = $sub[$i];
				$sline = $line[$i];
				$skodesupplier1 = $kode_supplier1[$i];
				$sharga1 = str_replace(".", "", $harga1[$i]);
				$sketerangansupplier1 = $keterangan_supplier1[$i];
				$sfilesupplier1 = $file_supplier1[$i];
				$skodesupplier2 = $kode_supplier2[$i];
				$sharga2 = str_replace(".", "", $harga2[$i]);
				$sketerangansupplier2 = $keterangan_supplier2[$i];
				$sfilesupplier2 = $file_supplier2[$i];
				$skodesupplier3 = $kode_supplier3[$i];
				$sharga3 = str_replace(".", "", $harga3[$i]);
				$sketerangansupplier3 = $keterangan_supplier3[$i];
				$sfilesupplier3 = $file_supplier3[$i];
				if ($supplierpilihan[$i] == 'supplier1') {
					$ssupplierpilihan = $skodesupplier1;
					$hargapilihan = $sharga1;
				} else if ($supplierpilihan[$i] == 'supplier2') {
					$ssupplierpilihan = $skodesupplier2;
					$hargapilihan = $sharga2;
				} else if ($supplierpilihan[$i] == 'supplier3') {
					$ssupplierpilihan = $skodesupplier3;
					$hargapilihan = $sharga3;
				}

				$y = ORM::for_table('pr_detail')->create();
				$y->no_pr = $no_pr;
				$y->kode_item = $sitem;
				$y->qty_req = $sqty;
				$y->status = 'PR';
				if (Validator::Date1($sdiperlukan) != 'Salah') {
					$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
				} else {
					$y->tgl_diperlukan = null;
				}

				$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
				$y->keterangan = $sketerangan;
				$y->bagian = $sbagian;
				$y->main = $smain;
				$y->sub = $ssub;
				$y->line = $sline;
				$y->kode_supplier1 = $skodesupplier1;
				$y->harga1 = $sharga1;
				$y->keterangan_supplier1 = $sketerangansupplier1;
				$y->file_supplier1 = $sfilesupplier1;
				$y->kode_supplier2 = $skodesupplier2;
				$y->harga2 = $sharga2;
				$y->keterangan_supplier2 = $sketerangansupplier2;
				$y->file_supplier2 = $sfilesupplier2;
				$y->kode_supplier3 = $skodesupplier3;
				$y->harga3 = $sharga3;
				$y->keterangan_supplier3 = $sketerangansupplier3;
				$y->file_supplier3 = $sfilesupplier3;
				$y->supplierpilihan = $ssupplierpilihan;
				$y->hargapilihan = $hargapilihan;
				$y->save();

				$i++;
				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
				$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $ssupplierpilihan)->find_one();
				$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
				$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
				$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
				$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
				$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
							Keperluan : " . $code . " <br>";
				if ($code == 'STOCK') {
					$isi .= "Bagian : STOCK <br>";
				} else {
					$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
				}
				$isi .= "
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($sqty, 0, '', '.') . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($sdiperlukan)) . " <br>
							Keterangan : " . $sketerangan . " <br>
					";
				$isi .= "<b>Pilihan Supplier</b><br>
							Kode Supplier : " . $ssupplierpilihan . "<br>
							Nama Supplier : " . $s['nama_supplier'] . "<br>
							Harga : " . number_format($hargapilihan, 0, '', '.') . "<br>
							Keterangan Supplier : " . $keteranganpilihan . "<br><br>
					";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Edit Supplier Biding :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);
			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PR Biding')->find_one();
			$to = ['capella.zoom@gmail.com'];
			if ($pembelian == 'lokal') {
				$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'biding_local_disetujui'))->find_one();
			} else {
				$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'biding_disetujui'))->find_one();
			}
			if ($g) {
				$to = explode('|', $g['approval']);
			}
			foreach ($to as $item) {
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_pr', $no_pr);
			$message->set('tgl_pr', $tgl_pr);
			$message->set('pembelian', $pembelian);
			$linkcomment = APP_URL . '/?ng=kebun-api/comment-pr/' . $cid . '/token_' . $comment_key;
			$params = $user['kode_dept'] . '/' . $item;
			$encryptedParams = encryptUrlParams($params);
			$linkcomment .= '/' . $encryptedParams;
			$linkapprove = APP_URL . '/?ng=kebun-api/approve-pr/' . $cid . '/token_' . $approve_key . '/' . $encryptedParams;
			$linkreject = APP_URL . '/?ng=kebun-api/reject-pr/' . $cid . '/token_' . $reject_key . '/' . $encryptedParams;
			$message->set('link_comment', $linkcomment);
			$message->set('link_approve', $linkapprove);
			$message->set('link_reject', $linkreject);
			$message->set('program', APP_URL .'/?ng=menu_KEBUN/pembelian/detail-pr-aprvsup/'.$cid);
			$message_o = $message->output();
			Notify_Email::_send($item, $item, $subj, $message_o);
			}
			Event::trigger('pembelian/add-pr-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. PR : ' . $no_pr,
				'dataval' => 1);
			echo json_encode($data);
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

case 'list-pr-aprv':
	Event::trigger('pembelian/list-pr-aprv/');
	_auth1('PR-APRV', $user['id']);
	$msg = $routes['3'];
	if ($user['kode_dept'] == "PNK") {
		$condition = "ditolak_oleh";
		// $diketahui = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', $user['kode_dept'])->find_one();
		// $diketahui = explode('|', $diketahui['approval']);
		// foreach($diketahui as $item) {
		// 	if($item == $user['username']){
		// 		$condition = "diketahui_oleh";
		// 		break;
		// 	}
		// }

		$diketahui = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', "KEB")->find_one();
		$diketahui = explode('|', $diketahui['approval']);
		foreach ($diketahui as $item) {
			if ($item == $user['username']) {
				$condition = "diketahui_oleh";
				break;
			} else {
				$diketahui = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', "PKS")->find_one();
				$diketahui = explode('|', $diketahui['approval']);
				if ($item == $user['username']) {
					$condition = "diketahui_oleh";
					break;
				}
			}
		}

		// $diperiksa = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', $user['kode_dept'])->find_one();
		// $diperiksa = explode('|', $diperiksa['approval']);
		// foreach($diperiksa as $item) {
		// 	if($item == $user['username']){
		// 		$condition = "diperiksa_oleh";
		// 		break;
		// 	}
		// }

		$diperiksa = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', "KEB")->find_one();
		$diperiksa = explode('|', $diperiksa['approval']);
		foreach ($diperiksa as $item) {
			if ($item == $user['username']) {
				$condition = "diperiksa_oleh";
				break;
			} else {
				$diperiksa = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', "PKS")->find_one();
				$diperiksa = explode('|', $diperiksa['approval']);
				if ($item == $user['username']) {
					$condition = "diperiksa_oleh";
					break;
				}
			}
		}

		// $disetujui = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', $user['kode_dept'])->find_one();
		// $disetujui = explode('|', $disetujui['approval']);
		// foreach($disetujui as $item) {
		// 	if($item == $user['username']){
		// 		$condition = "disetujui_oleh";
		// 		break;
		// 	}
		// }

		$disetujui = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', "KEB")->find_one();
		$disetujui = explode('|', $disetujui['approval']);
		foreach ($disetujui as $item) {
			if ($item == $user['username']) {
				$condition = "disetujui_oleh";
				break;
			} else {
				$disetujui = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', "PKS")->find_one();
				$disetujui = explode('|', $disetujui['approval']);
				if ($item == $user['username']) {
					$condition = "disetujui_oleh";
					break;
				}
			}
		}
		if ($user['golongan'] <4) {
		$d = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'PENDING',
		))->where($condition, '0')->find_many();

		$e = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'REVISI',
		))->where($condition, '0')->find_many();

		$cd = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'PENDING',
		))->where($condition, '0')->count();
		$ce = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'REVISI',
		))->where($condition, '0')->count();
		}
		if ($user['golongan'] > 3) {
			$f = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'PENDING',
			))->find_many();
			$g = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'REVISI',
			))->find_many();
			$cf = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'PENDING',
			))->count();
			$cg = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'REVISI',
			))->count();
		}
	} else {
		$condition = "ditolak_oleh";
		$diketahui = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', $user['kode_dept'])->find_one();
		$diketahui = explode('|', $diketahui['approval']);
		foreach ($diketahui as $item) {
			if ($item == $user['username']) {
				$condition = "diketahui_oleh";
				break;
			}
		}

		$diperiksa = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', $user['kode_dept'])->find_one();
		$diperiksa = explode('|', $diperiksa['approval']);
		foreach ($diperiksa as $item) {
			if ($item == $user['username']) {
				$condition = "diperiksa_oleh";
				break;
			}
		}

		$disetujui = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', $user['kode_dept'])->find_one();
		$disetujui = explode('|', $disetujui['approval']);
		foreach ($disetujui as $item) {
			if ($item == $user['username']) {
				$condition = "disetujui_oleh";
				break;
			}
		}
		$array = filterdept($user['kode_dept']);
		if ($user['golongan'] <4) {
		$d = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'PENDING',
		))->where($condition, '0')->where_in('dibuat_oleh', $array)->find_many();

		$e = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'REVISI',
		))->where($condition, '0')->where_in('dibuat_oleh', $array)->find_many();

		$cd = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'PENDING',
		))->where_in('dibuat_oleh', $array)->where($condition, '0')->count();
		$ce = ORM::for_table('pr_master')->where(array(
			'posisi' => 'PR',
			'status' => 'REVISI',
		))->where_in('dibuat_oleh', $array)->where($condition, '0')->count();
		}

		if ($user['golongan'] > 3) {
			$f = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'PENDING',
			))->where_in('dibuat_oleh', $array)->find_many();
			$g = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'REVISI',
			))->where_in('dibuat_oleh', $array)->find_many();

			$cf = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'PENDING',
			))->where_in('dibuat_oleh', $array)->count();
			$cg = ORM::for_table('pr_master')->where(array(
				'posisi' => 'PR1',
				'status' => 'REVISI',
			))->where_in('dibuat_oleh', $array)->count();
		}
	}

	$ui->assign('d', $d);
	$ui->assign('e', $e);
	$ui->assign('f', $f);
	$ui->assign('g', $g);
	$ui->assign('cd', $cd);
	$ui->assign('ce', $ce);
	$ui->assign('cf', $cf);
	$ui->assign('cg', $cg);
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-requisition-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-pr-aprv.tpl');
	break;

case 'detail-pr-aprv':
	Event::trigger('pembelian/detail-pr/');

	_auth1('PR-DETAIL-APRV', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	$n = ORM::for_table('pr_master')->where('no_pr', $d['revisi_pr'])->find_one();
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('n', $n);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$f = ORM::for_table('pr_detail')->where('no_pr', $d['revisi_pr'])->find_many();
		$tg = ORM::for_table('daftar_kategori')->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$idates = date('d-m-Y', strtotime($n['tgl_pr']));
		$ui->assign('e', $e);
		$ui->assign('f', $f);
		$ui->assign('tg', $tg);
		$ui->assign('clist', $clist);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('_sysfrm_menu2', 'purchase-requisition-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-pr-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-pr-aprv.tpl');
	} else {
		r2(U . 'pembelian/list-pr-aprv', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'detail-pr-aprvsup':
	Event::trigger('pembelian/detail-pr/');

	_auth1('PR-DETAIL-APRV', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$tg = ORM::for_table('daftar_kategori')->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();

		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$ui->assign('e', $e);
		$ui->assign('tg', $tg);
		$ui->assign('clist', $clist);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('_sysfrm_menu2', 'purchase-requisition-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-pr-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-pr-aprvsup.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'detail-pr-approve':
	Event::trigger('pembelian/detail-pr-approve/');
	$msg = '';
	$no_pr = _post('no_pr');
	$pesan = _post('pesan');
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			if ($d["posisi"] == 'PR') {
				if ($user['kode_dept'] == 'PNK') {
					$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', 'KEB')->find_one();
					$diketahui = explode('|', $x['approval']);
					$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', 'KEB')->find_one();
					$diperiksa = explode('|', $y['approval']);
					$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', 'KEB')->find_one();
					$disetujui = explode('|', $z['approval']);
					// Check KEB
					if (in_array($user['username'], $diketahui)) {
						$d->diketahui_oleh = $user['id'];
						$d->diketahui_nama = $user['fullname'];
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					} else {
						// Check PKS
						$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', 'PKS')->find_one();
						$diketahui = explode('|', $x['approval']);
						if (in_array($user['username'], $diketahui)) {
							$d->diketahui_oleh = $user['id'];
							$d->diketahui_nama = $user['fullname'];
							$d->diketahui_tgl = date('Y-m-d H:i:s');
						}
					}

					if (in_array($user['username'], $diperiksa)) {
						$d->diperiksa_oleh = $user['id'];
						$d->diperiksa_nama = $user['fullname'];
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					} else {
						$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', 'KEB')->find_one();
						$diperiksa = explode('|', $y['approval']);
						if (in_array($user['username'], $diperiksa)) {
							$d->diperiksa_oleh = $user['id'];
							$d->diperiksa_nama = $user['fullname'];
							$d->diperiksa_tgl = date('Y-m-d H:i:s');
						}
					}

					if (in_array($user['username'], $disetujui)) {
						$d->disetujui_oleh = $user['id'];
						$d->disetujui_nama = $user['fullname'];
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					} else {
						$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', 'KEB')->find_one();
						$disetujui = explode('|', $z['approval']);
						if (in_array($user['username'], $disetujui)) {
							$d->disetujui_oleh = $user['id'];
							$d->disetujui_nama = $user['fullname'];
							$d->disetujui_tgl = date('Y-m-d H:i:s');
						}
					}
				} else {
					$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', $user['kode_dept'])->find_one();
					$diketahui = explode('|', $x['approval']);
					$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', $user['kode_dept'])->find_one();
					$diperiksa = explode('|', $y['approval']);
					$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', $user['kode_dept'])->find_one();
					$disetujui = explode('|', $z['approval']);
					if (in_array($user['username'], $diketahui)) {
						$d->diketahui_oleh = $user['id'];
						$d->diketahui_nama = $user['fullname'];
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					}
					if (in_array($user['username'], $diperiksa)) {
						$d->diperiksa_oleh = $user['id'];
						$d->diperiksa_nama = $user['fullname'];
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					}
					if (in_array($user['username'], $disetujui)) {
						$d->disetujui_oleh = $user['id'];
						$d->disetujui_nama = $user['fullname'];
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					}
				}
			} else {
				$d->disetujui_oleh = $user['id'];
				$d->disetujui_nama = $user['fullname'];
				$d->disetujui_tgl = date('Y-m-d H:i:s');
			}
			$d->pesan = $pesan;
			$d->save();
			$e = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			if ($e['diketahui_oleh'] != 0 && $e['diperiksa_oleh'] != 0 && $e['disetujui_oleh'] != 0) {
				$e->status = 'APPROVE';
				$e->save();
				$g = ORM::for_table('pr_detail')->where('no_pr', $no_pr)->find_many();
				$isi = '';
				$i = 1;

				foreach ($g as $item) {
					$r = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
					$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['bagian'])->find_one();
					$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['main'])->find_one();
					$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['sub'])->find_one();
					$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['line'])->find_one();
					$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
						Keperluan : " . $item['keperluan'] . " <br>";
					if ($item['keperluan'] == 'STOCK') {
						$isi .= "Bagian : STOCK <br>";
					} else {
						$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
					}
					$isi .= "
								Item : " . $r['nama_item'] . " <br>
								Qty Request : " . number_format($item['qty_req'], 0, '', '.') . " <br>
								Tanggal Diperlukan : " . date('Y-m-d', strtotime($item['tgl_diperlukan'])) . " <br>
								Keterangan : " . $item['keterangan'] . " <br><br>
						";

					$i++;
				}
				$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response PR Approval')->find_one();
				$g = ORM::for_table('sys_users', 'dblogin')->find_one($e['dibuat_oleh']);
				$subject = new Template($f['subject']);
				$subject->set('business_name', $config['CompanyName']);
				$subject->set('status', $e['status']);
				$subj = $subject->output();
				$message = new Template($f['message']);
				$message->set('business_name', $config['CompanyName']);
				$message->set('isi', $isi);
				$message->set('no_pr', $e['no_pr']);
				$message->set('tgl_pr', $e['tgl_pr']);
				$message->set('kepentingan', $e['priority']);
				$message->set('status', $e['status']);
				$message->set('pesan', $e['pesan']);
				$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
				$message_o = $message->output();
				Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			}

			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Approve PR :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('pembelian/pr-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Approve. No. PR : ' . $no_pr,
				'dataval' => 1);
			echo json_encode($data);
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

case 'detail-pr-approvesup':
	Event::trigger('pembelian/detail-pr-approvesup/');
	$msg = '';
	$no_pr = _post('no_pr');
	$pesan = _post('pesan');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$supplierpilihan = explode(',', _post('supplierpilihan'));
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$d->sup_disetujui_oleh = $user['id'];
			$d->sup_disetujui_nama = $user['fullname'];
			$d->sup_disetujui_tgl = date('Y-m-d H:i:s');
			$d->pesan = $pesan;
			$d->status = 'APPROVE';
			$d->save();
			$i = 0;
			$isi = '';
			foreach ($item as $items) {
				$sitem = $item[$i];
				$skeperluan = $keperluan[$i];
				$ssupplierpilihan = $supplierpilihan[$i];
				$e = ORM::for_table('pr_detail')->where('no_pr', $no_pr)->where('keperluan', $skeperluan)->where('kode_item', $sitem)->find_one();
				$sharga = 0;
				if ($e['kode_supplier1'] == $ssupplierpilihan) {
					$sharga = $e['harga1'];
					$keteranganpilihan = $e['keterangan_supplier1'];
				} else if ($e['kode_supplier2'] == $ssupplierpilihan) {
					$sharga = $e['harga2'];
					$keteranganpilihan = $e['keterangan_supplier2'];
				} else if ($e['kode_supplier3'] == $ssupplierpilihan) {
					$sharga = $e['harga3'];
					$keteranganpilihan = $e['keterangan_supplier3'];
				}
				$e->hargapilihan = $sharga;
				$e->supplierpilihan = $ssupplierpilihan;
				$e->save();

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
				$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $ssupplierpilihan)->find_one();
				$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $e['bagian'])->find_one();
				$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $e['main'])->find_one();
				$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $e['sub'])->find_one();
				$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $e['line'])->find_one();
				$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
					Keperluan : " . $skeperluan . " <br>";
				if ($skeperluan == 'STOCK') {
					$isi .= "Bagian : STOCK <br>";
				} else {
					$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
				}
				$isi .= "
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($e['qty_req'], 0, '', '.') . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($e['tgl_diperlukan'])) . " <br>
							Keterangan : " . $e['keterangan'] . " <br>
					";
				$isi .= "<b>Pilihan Supplier</b><br>
						Kode Supplier : " . $ssupplierpilihan . "<br>
						Nama Supplier : " . $s['nama_supplier'] . "<br>
						Harga : " . number_format($sharga, 0, '', '.') . "<br>
						Keterangan Supplier : " . $keteranganpilihan . "<br><br>
					";
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Approve PR Biding :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response PR Biding Approval')->find_one();
			$g = ORM::for_table('sys_users', 'dblogin')->find_one($d['dibuat_oleh']);
			$subject = new Template($f['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subject->set('status', $d['status']);
			$subj = $subject->output();
			$message = new Template($f['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_pr', $d['no_pr']);
			$message->set('tgl_pr', $d['tgl_pr']);
			$message->set('pembelian', $d['pembelian']);
			$message->set('status', $d['status']);
			$message->set('pesan', $d['pesan']);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			Event::trigger('pembelian/pr-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Approve. No. PR : ' . $no_pr,
				'dataval' => 1);
			echo json_encode($data);
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

case 'detail-pr-reject':
	Event::trigger('pembelian/detail-pr-reject/');
	$msg = '';
	$no_pr = _post('no_pr');
	$pesan = _post('pesan');
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['fullname'];
			$d->ditolak_tgl = date('Y-m-d H:i:s');
			$d->pesan = $pesan;
			$d->status = 'REJECT';
			$d->save();
			$g = ORM::for_table('pr_detail')->where('no_pr', $no_pr)->find_many();
			$isi = '';
			$i = 1;
			foreach ($g as $item) {
				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
				$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['supplierpilihan'])->find_one();
				$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['bagian'])->find_one();
				$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['main'])->find_one();
				$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['sub'])->find_one();
				$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['line'])->find_one();
				$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
					Keperluan : " . $item['keperluan'] . " <br>";
				if ($item['keperluan'] == 'STOCK') {
					$isi .= "Bagian : STOCK <br>";
				} else {
					$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
				}
				$isi .= "
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($item['qty_req'], 0, '', '.') . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($item['tgl_diperlukan'])) . " <br>
							Keterangan : " . $item['keterangan'] . " <br>
					";
				if ($d['posisi'] == 'PR1') {
					if ($item['supplierpilihan'] == $item['kode_supplier1']) {
						$keteranganpilihan = $item['keterangan_supplier1'];
					} else if ($item['supplierpilihan'] == $item['kode_supplier2']) {
						$keteranganpilihan = $item['keterangan_supplier2'];
					} else if ($item['supplierpilihan'] == $item['kode_supplier3']) {
						$keteranganpilihan = $item['keterangan_supplier3'];
					}
					$isi .= "<b>Pilihan Supplier</b><br>
							Kode Supplier : " . $item['supplierpilihan'] . "<br>
							Nama Supplier : " . $s['nama_supplier'] . "<br>
							Harga : " . number_format($item['hargapilihan'], 0, '', '.') . "<br>
							Keterangan Supplier : " . $keteranganpilihan . "<br><br>
						";
				}
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Reject PR :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			if ($d['posisi'] == 'PR1') {
				$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response PR Biding Approval')->find_one();
			} else {
				$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response PR Approval')->find_one();
			}
			$g = ORM::for_table('sys_users', 'dblogin')->find_one($d['dibuat_oleh']);
			$subject = new Template($f['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subject->set('status', $d['status']);
			$subj = $subject->output();
			$message = new Template($f['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_pr', $d['no_pr']);
			$message->set('tgl_pr', $d['tgl_pr']);
			if ($d['posisi'] == 'PR1') {
				$message->set('pembelian', $d['pembelian']);
			} else {
				$message->set('kepentingan', $d['priority']);
			}
			$message->set('status', $d['status']);
			$message->set('pesan', $d['pesan']);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			Event::trigger('pembelian/pr-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Reject. No. PR : ' . $no_pr,
				'dataval' => 1);
			echo json_encode($data);
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

case 'revisi-pr':
	Event::trigger('pembelian/revisi-pr/');
	_auth1('PR-REVISI', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_kategori')->find_many();
		$clist = '';
		$clist = '<option value="">Pilih Keperluan</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="DIRECT">DIRECT</option>';
		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$idates = date('d-m-Y');
		$tgl_pr = Validator::Date1($idates);
		$bl = date('n', strtotime($tgl_pr));
		$th = date('Y', strtotime($tgl_pr));
		$chk = ORM::for_table('pr_master')->raw_query('select * from pr_master where month(tgl_pr)=' . $bl . ' and year(tgl_pr)=' . $th . ' order by no_pr desc')->find_one();
		if ($chk) {
			$no = ++$chk['no_pr'];
		} else {
			$no = 'PR/' . $th . '/' . date('m', strtotime($tgl_pr)) . '/0001';
		}
		$ui->assign('e', $e);
		$ui->assign('tg', $tg);
		$ui->assign('clist', $clist);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('no_revisi', $no);
		$ui->assign('_sysfrm_menu2', 'pr-reject');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'revisi-pr', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'revisi-pr.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'revisi-pr-post':
	Event::trigger('pembelian/revisi-pr-post/');
	$no_pr = _post('no_pr');
	$no_revisi = _post('no_revisi');
	$ket_revisi = _post('ket_revisi');
	$priority_revisi = _post('priority_revisi');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$bagian = explode(',', _post('bagian'));
	$main = explode(',', _post('main'));
	$sub = explode(',', _post('sub'));
	$line = explode(',', _post('line'));
	$qty = explode(',', _post('qty'));
	$diperlukan = explode(',', _post('diperlukan'));
	$keterangan = explode(',', _post('keterangan'));
	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$msg_diperlukan = '';
	$i = 0;
	$ii = 0;

	$approve_key = generateRandomString(24);
	$reject_key = generateRandomString(24);
	$comment_key = generateRandomString(24);
	$n = ORM::for_table('pr_master')->where('no_pr', $no_revisi)->find_one();
	if ($n) {
		$msg .= 'No PR Revisi telah terdaftar, mohon refresh halaman untuk mendapatkan No PR Revisi baru';
	}
	foreach ($keperluan as $code) {
		if ($item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($diperlukan[$i] == '') {
			$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		}

		if ($qty[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

		if ($msg_tgl != '') {
			$msg .= $msg_tgl . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	// sort($item);
	$cek = '';
	$flag = false;
	$error = '';
	foreach ($item as $code) {
		if ($cek == $code) {
			$flag = true;
			break;
		} else {
			$flag = false;
		}

		$cek = $code;
	}
	if ($flag) {
		$msg .= 'Ada Item Stock double<br>';
	}

	if ($priority_revisi == '') {
		$msg .= 'Belum Memilih Tingkat Kepentingan';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_pr = Validator::Date1(_post('idate'));
			$tgl_pr_revisi = Validator::Date1(_post('idates'));
			$bl = date('n', strtotime($tgl_pr));
			$th = date('Y', strtotime($tgl_pr));

			$d = ORM::for_table('pr_master')->create();
			$d->no_pr = $no_revisi;
			$d->tgl_pr = $tgl_pr_revisi;
			$d->dibuat_oleh = $user['id'];
			$d->dibuat_nama = $user['fullname'];
			$d->dibuat_tgl = date('Y-m-d H:i:s');
			$d->posisi = 'PR';
			$d->status = 'REVISI';
			$d->approve_key = $approve_key;
			$d->reject_key = $reject_key;
			$d->comment_key = $comment_key;
			$d->priority = $priority_revisi;
			$d->revisi_pr = $no_pr;
			$d->keterangan_revisi = $ket_revisi;
			$d->save();

			$e = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$e->diedit_oleh = $user['id'];
			$e->diedit_nama = $user['fullname'];
			$e->diedit_tgl = date('Y-m-d H:i:s');
			$e->posisi = 'PR';
			$e->status = 'CANCEL';
			$e->save();

			$i = 0;
			foreach ($keperluan as $code) {
				$sitem = $item[$i];
				$sqty = str_replace(".", "", $qty[$i]);
				$sketerangan = $keterangan[$i];
				$sdiperlukan = $diperlukan[$i];
				$sbagian = $bagian[$i];
				$smain = $main[$i];
				$ssub = $sub[$i];
				$sline = $line[$i];

				$y = ORM::for_table('pr_detail')->create();
				$y->no_pr = $no_revisi;
				$y->kode_item = $sitem;
				$y->qty_req = $sqty;
				$y->status = 'PENDING';
				if (Validator::Date1($sdiperlukan) != 'Salah') {
					$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
				} else {
					$y->tgl_diperlukan = null;
				}

				$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
				$y->keterangan = $sketerangan;
				$y->bagian = $sbagian;
				$y->main = $smain;
				$y->sub = $ssub;
				$y->line = $sline;
				$y->save();
				$i++;

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
				$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
				$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
				$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
				$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
				$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
							Keperluan : " . $code . " <br>";
				if ($code == 'STOCK') {
					$isi .= "Bagian : STOCK <br>";
				} else {
					$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
				}
				$isi .= "
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($sqty, 0, '', '.') . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($sdiperlukan)) . " <br>
							Keterangan : " . $sketerangan . " <br><br>
					";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log('Revisi PR :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PR')->find_one();
			$to = ['capella.zoom@gmail.com'];
			$g = ORM::for_table('daftar_approval')->where('kode_dept', $user['kode_dept'])->where_in('setting', array('pr_disetujui', 'pr_diketahui', 'pr_diperiksa'))->find_many();
			if ($g) {
				$to = [];
			}

			foreach ($g as $gs) {
				$to = array_merge($to, explode('|', $gs['approval']));
			}

			
			foreach ($to as $item) {
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_pr', $no_revisi);
			$message->set('tgl_pr', $tgl_pr);
			$message->set('kepentingan', $priority_revisi);
			$linkcomment = APP_URL . '/?ng=kebun-api/comment-pr/' . $cid . '/token_' . $comment_key;
			$params = $user['kode_dept'] . '/' . $item;
			$encryptedParams = encryptUrlParams($params);
			$linkcomment .= '/' . $encryptedParams;
			$linkapprove = APP_URL . '/?ng=kebun-api/approve-pr/' . $cid . '/token_' . $approve_key . '/' . $encryptedParams;
			$linkreject = APP_URL . '/?ng=kebun-api/reject-pr/' . $cid . '/token_' . $reject_key . '/' . $encryptedParams;
			$message->set('link_comment', $linkcomment);
			$message->set('link_approve', $linkapprove);
			$message->set('link_reject', $linkreject);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			Notify_Email::_send($item, $item, $subj, $message_o);
			}

			Event::trigger('pembelian/revisi-pr-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Revisi. No. PR : ' . $no_revisi,
				'dataval' => 1);
			echo json_encode($data);
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

case 'supplier-pr':
	Event::trigger('pembelian/supplier-pr/');
	_auth1('PR-SUPPLIER', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('pr_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
		$clist = '';
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg2 = ORM::for_table('daftar_kategori')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$tg4 = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nama_supplier")->left_outer_join("daftar_supplier", array("a.kode_supplier", "=", "b.kode_supplier"), "b")->where('status', 'aktif')->find_many();

		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$ui->assign('e', $e);
		$ui->assign('tg', $tg);
		$ui->assign('clist', $clist);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg2', $tg2);
		$ui->assign('tg3', $tg3);
		$ui->assign('tg4', $tg4);
		$ui->assign('_sysfrm_menu2', 'pr-approve');
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-pr-supplier', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'add-pr-supplier.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'supplier-pr-post':
	Event::trigger('pembelian/supplier-pr-post/');
	$no_pr = _post('no_pr');
	$pembelian = _post('pembelian');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$bagian = explode(',', _post('bagian'));
	$main = explode(',', _post('main'));
	$sub = explode(',', _post('sub'));
	$line = explode(',', _post('line'));
	$qty = explode(',', _post('qty'));
	$diperlukan = explode(',', _post('diperlukan'));
	$keterangan = explode(',', _post('keterangan'));
	$kode_supplier1 = explode(',', _post('kode_supplier1'));
	$harga1 = explode(',', _post('harga1'));
	$keterangan_supplier1 = explode(',', _post('keterangan_supplier1'));
	$file_supplier1 = explode(',', _post('file_supplier1'));
	$kode_supplier2 = explode(',', _post('kode_supplier2'));
	$harga2 = explode(',', _post('harga2'));
	$keterangan_supplier2 = explode(',', _post('keterangan_supplier2'));
	$file_supplier2 = explode(',', _post('file_supplier2'));
	$kode_supplier3 = explode(',', _post('kode_supplier3'));
	$harga3 = explode(',', _post('harga3'));
	$keterangan_supplier3 = explode(',', _post('keterangan_supplier3'));
	$file_supplier3 = explode(',', _post('file_supplier3'));
	$supplierpilihan = explode(',', _post('supplierpilihan'));

	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$msg_diperlukan = '';
	$msg_supplier = '';
	$msg_pilihan = '';
	$i = 0;
	$ii = 0;
	foreach ($keperluan as $code) {
		if ($item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($diperlukan[$i] == '') {
			$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		}

		if ($qty[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($kode_supplier1[$i] == '' || $harga1[$i] == '') {
			$msg_supplier = 'Ada detail yang Kode Supplier 1 dan Harga 1 masih kosong';
		}

		if ($supplierpilihan[$i] == '') {
			$msg_pilihan = 'Ada detail yang belum memilih Supplier Pilihan';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

		if ($msg_supplier != '') {
			$msg .= $msg_supplier . '<br>';
		}

		if ($msg_pilihan != '') {
			$msg .= $msg_pilihan . '<br>';
		}

		if ($msg_diperlukan != '') {
			$msg .= $msg_diperlukan . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request';
	}

	$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
	$comment_key = $d['comment_key'];
	$approve_key = $d['approve_key'];
	$reject_key = $d['reject_key'];
	
	if ($d['status'] != 'APPROVE') {
		$msg .= 'Hanya Data PR dengan Status APPROVE yang dapat memilih supplier';
	}
	if ($d['posisi'] != 'PR') {
		$msg .= 'Hanya Data PR dengan Posisi PR yang dapat memilih supplier';
	}
	if ($pembelian == '') {
		$msg .= 'Jenis Pembelian Tidak Boleh Kosong';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_pr = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_pr));
			$th = date('Y', strtotime($tgl_pr));

			$d = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$d->sup_dibuat_oleh = $user['id'];
			$d->sup_dibuat_nama = $user['fullname'];
			$d->sup_dibuat_tgl = date('Y-m-d H:i:s');
			$d->posisi = 'PR1';
			$d->status = 'PENDING';
			$d->pembelian = $pembelian;
			$d->save();

			$i = 0;
			$isi = '';
			$x = ORM::for_table("pr_detail")->where('no_pr', $no_pr)->delete_many();
			foreach ($keperluan as $code) {
				$sitem = $item[$i];
				$sqty = str_replace(".", "", $qty[$i]);
				$sketerangan = $keterangan[$i];
				$sdiperlukan = $diperlukan[$i];
				$sbagian = $bagian[$i];
				$smain = $main[$i];
				$ssub = $sub[$i];
				$sline = $line[$i];
				$skodesupplier1 = $kode_supplier1[$i];
				$sharga1 = str_replace(".", "", $harga1[$i]);
				$sketerangansupplier1 = $keterangan_supplier1[$i];
				$sfilesupplier1 = $file_supplier1[$i];
				$skodesupplier2 = $kode_supplier2[$i];
				$sharga2 = str_replace(".", "", $harga2[$i]);
				$sketerangansupplier2 = $keterangan_supplier2[$i];
				$sfilesupplier2 = $file_supplier2[$i];
				$skodesupplier3 = $kode_supplier3[$i];
				$sharga3 = str_replace(".", "", $harga3[$i]);
				$sketerangansupplier3 = $keterangan_supplier3[$i];
				$sfilesupplier3 = $file_supplier3[$i];
				if ($supplierpilihan[$i] == 'supplier1') {
					$ssupplierpilihan = $skodesupplier1;
					$hargapilihan = $sharga1;
					$keteranganpilihan = $sketerangansupplier1;
				} else if ($supplierpilihan[$i] == 'supplier2') {
					$ssupplierpilihan = $skodesupplier2;
					$hargapilihan = $sharga2;
					$keteranganpilihan = $sketerangansupplier2;
				} else if ($supplierpilihan[$i] == 'supplier3') {
					$ssupplierpilihan = $skodesupplier3;
					$hargapilihan = $sharga3;
					$keteranganpilihan = $sketerangansupplier3;
				}

				$y = ORM::for_table('pr_detail')->create();
				$y->no_pr = $no_pr;
				$y->kode_item = $sitem;
				$y->qty_req = $sqty;
				$y->status = 'PR';
				if (Validator::Date1($sdiperlukan) != 'Salah') {
					$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
				} else {
					$y->tgl_diperlukan = null;
				}

				$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
				$y->keterangan = $sketerangan;
				$y->bagian = $sbagian;
				$y->main = $smain;
				$y->sub = $ssub;
				$y->line = $sline;
				$y->kode_supplier1 = $skodesupplier1;
				$y->harga1 = $sharga1;
				$y->keterangan_supplier1 = $sketerangansupplier1;
				$y->file_supplier1 = $sfilesupplier1;
				$y->kode_supplier2 = $skodesupplier2;
				$y->harga2 = $sharga2;
				$y->keterangan_supplier2 = $sketerangansupplier2;
				$y->file_supplier2 = $sfilesupplier2;
				$y->kode_supplier3 = $skodesupplier3;
				$y->harga3 = $sharga3;
				$y->keterangan_supplier3 = $sketerangansupplier3;
				$y->file_supplier3 = $sfilesupplier3;
				$y->supplierpilihan = $ssupplierpilihan;
				$y->hargapilihan = $hargapilihan;
				$y->save();
				$i++;

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
				$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $ssupplierpilihan)->find_one();
				$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
				$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
				$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
				$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
				$isi .= "<b>PURCHASE REQUISITION ITEM #" . $i . "</b> <br>
							Keperluan : " . $code . " <br>";
				if ($code == 'STOCK') {
					$isi .= "Bagian : STOCK <br>";
				} else {
					$isi .= "Bagian : " . $bagians['nama_kategori'] . " | " . $mains['nama_kategori'] . " > " . $subs['nama_kategori'] . " > " . $lines['nama_kategori'] . " <br>";
				}
				$isi .= "
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($sqty, 0, '', '.') . " <br>
							Tanggal Diperlukan : " . date('Y-m-d', strtotime($sdiperlukan)) . " <br>
							Keterangan : " . $sketerangan . " <br>
					";
				$isi .= "<b>Pilihan Supplier</b><br>
							Kode Supplier : " . $ssupplierpilihan . "<br>
							Nama Supplier : " . $s['nama_supplier'] . "<br>
							Harga : " . number_format($hargapilihan, 0, '', '.') . "<br>
							Keterangan Supplier : " . $keteranganpilihan . "<br><br>
					";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Supplier Biding : ' . $no_pr . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PR Biding')->find_one();
			$to = ['capella.zoom@gmail.com'];
			if ($pembelian == 'lokal') {
				$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'biding_local_disetujui'))->find_one();
			} else {
				$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'biding_disetujui'))->find_one();
			}
			if ($g) {
				$to = explode('|', $g['approval']);
			}
			foreach ($to as $item) {
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_pr', $no_pr);
			$message->set('tgl_pr', $tgl_pr);
			$message->set('pembelian', $pembelian);
			$linkcomment = APP_URL . '/?ng=kebun-api/comment-pr/' . $cid . '/token_' . $comment_key;
			$params = $user['kode_dept'] . '/' . $item;
			$encryptedParams = encryptUrlParams($params);
			$linkcomment .= '/' . $encryptedParams;
			$linkapprove = APP_URL . '/?ng=kebun-api/approve-pr/' . $cid . '/token_' . $approve_key . '/' . $encryptedParams;
			$linkreject = APP_URL . '/?ng=kebun-api/reject-pr/' . $cid . '/token_' . $reject_key . '/' . $encryptedParams;
			$message->set('link_comment', $linkcomment);
			$message->set('link_approve', $linkapprove);
			$message->set('link_reject', $linkreject);
			$message->set('program', APP_URL .'/?ng=menu_KEBUN/pembelian/detail-pr-aprvsup/'.$cid);
			$message_o = $message->output();
			Notify_Email::_send($item, $item, $subj, $message_o);
			}
			Event::trigger('pembelian/pr-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. PR : ' . $no_pr,
				'dataval' => 1);
			echo json_encode($data);
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

case 'list-spmk-pending':
	Event::trigger('pembelian/listspmkpending/');
	_auth1('SPMK-LIST-PENDING', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'spmk-pending');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-spmk-pending.tpl');
	break;

case 'list-spmk-approve':
	Event::trigger('pembelian/listspmkapprove/');
	_auth1('SPMK-LIST-APPROVED', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'spmk-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-spmk-approved.tpl');
	break;

case 'list-spmk-reject':
	Event::trigger('pembelian/listspmkreject/');
	_auth1('SPMK-LIST-REJECT', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'spmk-reject');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-spmk-rejected.tpl');
	break;

case 'list-spnk-pending':
	Event::trigger('pembelian/listspnkpending/');
	_auth1('SPNK-LIST-PENDING', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'spnk-pending');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-spnk-pending.tpl');
	break;

case 'list-spnk-approve':
	Event::trigger('pembelian/listspnkapprove/');
	_auth1('SPNK-LIST-APPROVED', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'spnk-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-spnk-approved.tpl');
	break;

case 'list-spnk-reject':
	Event::trigger('pembelian/listspnkreject/');
	_auth1('SPNK-LIST-REJECT', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'spnk-reject');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
	$ui->display($spath . 'list-spnk-rejected.tpl');
	break;

case 'detail-spmk':
	Event::trigger('pembelian/detail-spmk/');
	_auth1('SPMK-DETAIL', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		if ($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
			$ui->assign('_sysfrm_menu2', 'spmk-pending');
		} else if ($d['status'] == 'REJECT') {
			$ui->assign('_sysfrm_menu2', 'spmk-reject');
		} else if ($d['status'] == 'APPROVE') {
			$ui->assign('_sysfrm_menu2', 'spmk-approve');
		}
		$ui->assign('e', $e);
		$ui->assign('d', $d);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('back', "list-spmk-pending");
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-spmk', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-spmk.tpl');
	} else {
		r2(U . 'pembelian/list-spmk', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'detail-spnk-aprv':
	Event::trigger('pembelian/detail-spnk/');
	_auth1('SPNK-DETAIL-APRV', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	$n = ORM::for_table('spmk_master')->where('no_spmk', $d['revisi_spmk'])->find_one();
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('n', $n);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$f = ORM::for_table('spmk_detail')->where('no_spmk', $d['revisi_spmk'])->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$idates = date('d-m-Y', strtotime($n['tgl_spmk']));
		$ui->assign('e', $e);
		$ui->assign('f', $f);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('_sysfrm_menu2', 'surat-perintah-kerja-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-spmk-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-spnk-aprv.tpl');
	} else {
		r2(U . 'pembelian/list-spmk-aprv', 'e', 'SPnK tersebut tidak ditemukan');
	}

	break;

case 'detail-spmk-aprv':
	Event::trigger('pembelian/detail-spmk/');
	_auth1('SPMK-DETAIL-APRV', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	$n = ORM::for_table('spmk_master')->where('no_spmk', $d['revisi_spmk'])->find_one();
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('n', $n);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$f = ORM::for_table('spmk_detail')->where('no_spmk', $d['revisi_spmk'])->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$idates = date('d-m-Y', strtotime($n['tgl_spmk']));
		$ui->assign('e', $e);
		$ui->assign('f', $f);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('_sysfrm_menu2', 'surat-permintaan-kerja-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-spmk-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-spmk-aprv.tpl');
	} else {
		r2(U . 'pembelian/list-spmk-aprv', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'detail-spmk-aprvsup':
	Event::trigger('pembelian/detail-spmk/');

	_auth1('SPMK-DETAIL-APRV', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$f = ORM::for_table('spmk_detail')->where('no_spmk', $d['revisi_spmk'])->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$idates = date('d-m-Y', strtotime($n['tgl_spmk']));
		$ui->assign('e', $e);
		$ui->assign('f', $f);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('_sysfrm_menu2', 'surat-permintaan-kerja-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-spmk-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-spmk-aprvsup.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'detail-spmk-approve':
	Event::trigger('pembelian/detail-spmk-approve/');
	$msg = '';
	$no_spmk = _post('no_spmk');
	$pesan = _post('pesan');
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			if ($d["posisi"] == 'SPMK') {
				if ($user['kode_dept'] == 'PNK') {
					$w = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'KEB', 'setting' => 'spmk_disurvey'))->find_one();
					$x = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'KEB', 'setting' => 'spmk_diketahui'))->find_one();
					$y = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'KEB', 'setting' => 'spmk_diperiksa'))->find_one();
					$z = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'KEB', 'setting' => 'spmk_disetujui'))->find_one();
				} else {
					$w = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'spmk_disurvey'))->find_one();
					$x = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'spmk_diketahui'))->find_one();
					$y = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'spmk_diperiksa'))->find_one();
					$z = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'spmk_disetujui'))->find_one();
				}
				if ($user['username'] == $x['approval']) {
					$d->diketahui_oleh = $user['id'];
					$d->diketahui_nama = $user['fullname'];
					$d->diketahui_tgl = date('Y-m-d H:i:s');
				} else {
					$x = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'PKS', 'setting' => 'spmk_diketahui'))->find_one();
					if ($user['username'] == $x['approval']) {
						$d->diketahui_oleh = $user['id'];
						$d->diketahui_nama = $user['fullname'];
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					}
				}
				if ($user['username'] == $y['approval']) {
					$d->diperiksa_oleh = $user['id'];
					$d->diperiksa_nama = $user['fullname'];
					$d->diperiksa_tgl = date('Y-m-d H:i:s');
				} else {
					$y = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'PKS', 'setting' => 'spmk_diperiksa'))->find_one();
					if ($user['username'] == $y['approval']) {
						$d->diperiksa_oleh = $user['id'];
						$d->diperiksa_nama = $user['fullname'];
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					}
				}
				if ($user['username'] == $z['approval']) {
					$d->disetujui_oleh = $user['id'];
					$d->disetujui_nama = $user['fullname'];
					$d->disetujui_tgl = date('Y-m-d H:i:s');
				} else {
					$z = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'PKS', 'setting' => 'spmk_disetujui'))->find_one();
					if ($user['username'] == $z['approval']) {
						$d->disetujui_oleh = $user['id'];
						$d->disetujui_nama = $user['fullname'];
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					}
				}
				if ($user['username'] == $w['approval']) {
					$d->disurvey_oleh = $user['id'];
					$d->disurvey_nama = $user['fullname'];
					$d->disurvey_tgl = date('Y-m-d H:i:s');
				} else {
					$w = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'PKS', 'setting' => 'spmk_disurvey'))->find_one();
					if ($user['username'] == $w['approval']) {
						$d->disurvey_oleh = $user['id'];
						$d->disurvey_nama = $user['fullname'];
						$d->disurvey_tgl = date('Y-m-d H:i:s');
					}
				}
			} else {
				$d->ktr_disetujui_oleh = $user['id'];
				$d->ktr_disetujui_nama = $user['fullname'];
				$d->ktr_disetujui_tgl = date('Y-m-d H:i:s');
			}
			$d->pesan = $pesan;
			$d->save();
			$e = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			if ($e['diketahui_oleh'] != 0 && $e['diperiksa_oleh'] != 0 && $e['disetujui_oleh'] != 0 && $e['disurvey_oleh'] != 0) {
				$e->status = 'APPROVE';
				$e->save();
				$g = ORM::for_table('spmk_detail')->where('no_spmk', $no_spmk)->find_many();
				$isi = '';
				$i = 1;

				foreach ($g as $item) {
					$isi .= "<b>SERVIS #" . $i . "</b> <br>
						Spesifikasi : " . $item['spesifikasi'] . " <br>
						Block : " . $item['block'] . " <br>
						Ha : " . $item['ha'] . " <br>
						Pkk : " . $item['pkk'] . " <br>
						";
					$i++;
				}
				$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response SPMK Approval')->find_one();
				$g = ORM::for_table('sys_users', 'dblogin')->find_one($e['dibuat_oleh']);
				$subject = new Template($f['subject']);
				$subject->set('business_name', $config['CompanyName']);
				$subject->set('status', $e['status']);
				$subj = $subject->output();
				$message = new Template($f['message']);
				$message->set('business_name', $config['CompanyName']);
				$message->set('isi', $isi);
				$message->set('no_spmk', $e['no_spmk']);
				$message->set('tgl_spmk', $e['tgl_spmk']);
				// $message->set('kepentingan', $e['priority']);
				$message->set('status', $e['status']);
				$message->set('pesan', $e['pesan']);
				$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
				$message_o = $message->output();
				Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			}

			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Approve SPMK :' . $no_spmk . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('pembelian/spmk-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Approve. No. SPmK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'detail-spmk-approvesup':
	Event::trigger('pembelian/detail-spmk-approvesup/');
	$msg = '';
	$no_spmk = _post('no_spmk');
	$pesan = _post('pesan');
	$id_kontrak = explode(',', _post('id_kontrak'));
	$supplierpilihan = explode(',', _post('supplierpilihan'));
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$is_dir = false;
			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			if ($d['ktr_disetujui_oleh'] == 0) {
				$d->ktr_disetujui_oleh = $user['id'];
				$d->ktr_disetujui_nama = $user['fullname'];
				$d->ktr_disetujui_tgl = date('Y-m-d H:i:s');
			} else {
				$d->ktr_disetujui_dir_oleh = $user['id'];
				$d->ktr_disetujui_dir_nama = $user['fullname'];
				$d->ktr_disetujui_dir_tgl = date('Y-m-d H:i:s');
				$d->status = 'APPROVE';
				$is_dir = true;
			}
			$d->pesan = $pesan;
			$d->save();
			$i = 0;
			$isi = '';
			foreach ($id_kontrak as $id) {
				$kontrak = ORM::for_table('spmk_detail')->where('no_spmk', $no_spmk)->where('id', $id)->find_one();
				$ssupplierpilihan = $supplierpilihan[$i];
				$sharga = 0;
				if ($kontrak['kontraktor1'] == $ssupplierpilihan) {
					$sharga = $kontrak['harga1'];
					$keteranganpilihan = $kontrak['keterangan_kontraktor1'];
				} else if ($kontrak['kontraktor2'] == $ssupplierpilihan) {
					$sharga = $kontrak['harga2'];
					$keteranganpilihan = $kontrak['keterangan_kontraktor2'];
				} else if ($kontrak['kontraktor3'] == $ssupplierpilihan) {
					$sharga = $kontrak['harga3'];
					$keteranganpilihan = $kontrak['keterangan_kontraktor3'];
				}
				$kontrak->hargapilihan = $sharga;
				$kontrak->kontraktorpilihan = $ssupplierpilihan;
				$kontrak->save();

				if ($is_dir) {
					$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $ssupplierpilihan)->find_one();
					$isi .= "<b>SERVIS #" . $i . "</b> <br>
						Spesifikasi : " . $kontrak['spesifikasi'] . " <br>
						Block : " . $kontrak['block'] . " <br>
						Ha : " . $kontrak['ha'] . " <br>
						Pkk : " . $kontrak['pkk'] . " <br>
						";
					$isi .= "<b>Pilihan Supplier</b><br>
						Kode Supplier : " . $ssupplierpilihan . "<br>
						Nama Supplier : " . $s['nama_supplier'] . "<br>
						Harga : " . number_format($sharga, 0, '', '.') . "<br>
						Keterangan Supplier : " . $keteranganpilihan . "<br><br>
					";
					$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response SPMK Bidding Approval')->find_one();
					$g = ORM::for_table('sys_users', 'dblogin')->find_one($d['dibuat_oleh']);
				} else {
					$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $ssupplierpilihan)->find_one();
					$isi .= "<b>SERVIS #" . $i . "</b> <br>
						Spesifikasi : " . $kontrak['spesifikasi'] . " <br>
						Block : " . $kontrak['block'] . " <br>
						Ha : " . $kontrak['ha'] . " <br>
						Pkk : " . $kontrak['pkk'] . " <br>
						";
					$isi .= "<b>Pilihan Supplier</b><br>
						Kode Supplier : " . $ssupplierpilihan . "<br>
						Nama Supplier : " . $s['nama_supplier'] . "<br>
						Harga : " . number_format($sharga, 0, '', '.') . "<br>
						Keterangan Supplier : " . $keteranganpilihan . "<br><br>
					";
					$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval SPMK Bidding')->find_one();
					$to = ['capella.zoom@gmail.com'];
					$g = ORM::for_table('daftar_approval')->where(array('setting' => 'spmk_bidding_disetujui_dir'))->find_one();
					if ($g) {
						$to = explode('|', $g['approval']);
					}
				}
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Approve SPMK Biding :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$subject = new Template($f['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$message = new Template($f['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_spmk', $d['no_spmk']);
			$message->set('tgl_spmk', $d['tgl_spmk']);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			if ($is_dir) {
				$subject->set('status', $d['status']);
				$message->set('status', $d['status']);
				$message->set('pesan', $d['pesan']);
				$subj = $subject->output();
				$message_o = $message->output();
				Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			} else {
				$subj = $subject->output();
				$message_o = $message->output();
				foreach ($to as $item) {
					Notify_Email::_send($item, $item, $subj, $message_o);
				}
			}
			Event::trigger('pembelian/spmk-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Approve. No. SPMK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'detail-spmk-reject':
	Event::trigger('pembelian/detail-spmk-reject/');
	$msg = '';
	$no_spmk = _post('no_spmk');
	$pesan = _post('pesan');
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['fullname'];
			$d->ditolak_tgl = date('Y-m-d H:i:s');
			$d->pesan = $pesan;
			$d->status = 'REJECT';
			$d->save();
			$g = ORM::for_table('spmk_detail')->where('no_spmk', $no_spmk)->find_many();
			$isi = '';
			$i = 1;
			foreach ($g as $item) {
				$isi .= "<b>SERVIS #" . $i . "</b> <br>
					spesifikasi : " . $item['spesifikasi'] . " <br>
					block : " . $item['block'] . " <br>
					ha : " . $item['ha'] . " <br>
					pkk : " . $item['pkk'] . " <br>
					";
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Reject SPMK :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			// if($d['posisi'] == 'SPMK1'){
			// 	$f = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Response:Response SPMK Biding Approval')->find_one();
			// } else {
			// 	$f = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Response:Response SPMK Approval')->find_one();
			// }
			// $g = ORM::for_table('sys_users','dblogin')->find_one($d['dibuat_oleh']);
			// $subject = new Template($f['subject']);
			// $subject->set('business_name', $config['CompanyName']);
			// $subject->set('status', $d['status']);
			// $subj = $subject->output();
			// $message = new Template($f['message']);
			// $message->set('business_name', $config['CompanyName']);
			// $message->set('isi', $isi);
			// $message->set('no_spmk', $d['no_spmk']);
			// $message->set('tgl_spmk', $d['tgl_spmk']);
			// if($d['posisi'] == 'SPMK1'){
			// 	$message->set('pembelian', $d['pembelian']);
			// } else {
			// 	$message->set('kepentingan', $d['priority']);
			// }
			// $message->set('status', $d['status']);
			// $message->set('pesan', $d['pesan']);
			// $message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			// $message_o = $message->output();
			// Notify_Email::_send($g['username'],$g['username'],$subj,$message_o);
			Event::trigger('pembelian/pr-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Reject. No. SPMK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'add-spmk':
	Event::trigger('pembelian/add-spmk/');
	_auth1('SPMK-ADD', $user['id']);
	$idate = date('d-m-Y');
	$ui->assign('idate', $idate);
	$ui->assign('_sysfrm_menu2', 'spmk-add');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-spmk', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-spmk.tpl');
	break;

case 'add-spmk-post':
	Event::trigger('pembelian/add-spmk-post/');
	$spesifikasi = explode(',', _post('spesifikasi'));
	$block = explode(',', _post('block'));
	$ha = explode(',', _post('ha'));
	$pkk = explode(',', _post('pkk'));
	$priority = _post('priority');
	$divisi = _post('divisi');
	$jenis_pekerjaan = _post('jenis_pekerjaan');
	$lokasi = _post('lokasi');
	$afdeling = _post('afdeling');
	$msg = '';
	$msg_spesifikasi = '';
	$i = 0;
	$ii = 0;
	foreach ($spesifikasi as $code) {
		if ($spesifikasi[$i] == '') {
			$msg_spesifikasi = 'Ada detail yang belum mengisi Spesifikasi';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_spesifikasi != '') {
			$msg .= $msg_spesifikasi . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	// sort($spesifikasi);
	$cek = '';
	$flag = false;
	$error = '';
	foreach ($spesifikasi as $code) {
		if ($cek == $code) {
			$flag = true;
			break;
		} else {
			$flag = false;
		}

		$cek = $code;
	}
	if ($flag) {
		$msg .= 'Ada Spesifikasi double<br>';
	}

	if ($priority == '') {
		$msg .= 'Belum Memilih Tingkat Kepentingan<br>';
	}

	if ($divisi == '') {
		$msg .= 'Divisi Harus Diisi<br>';
	}

	if ($jenis_pekerjaan == '') {
		$msg .= 'Jenis Pekerjaan Harus Diisi<br>';
	}

	if ($lokasi == '') {
		$msg .= 'Lokasi Harus Diisi<br>';
	}

	if ($afdeling == '') {
		$msg .= 'Afdeling Harus Diisi<br>';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_spmk = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_spmk));
			$th = date('Y', strtotime($tgl_spmk));
			$chk = ORM::for_table('spmk_master')->raw_query('select * from spmk_master where month(tgl_spmk)=' . $bl . ' and year(tgl_spmk)=' . $th . ' order by no_spmk desc')->find_one();
			if ($chk) {
				$no = ++$chk['no_spmk'];
			} else {
				$no = 'SPMK/' . $th . '/' . date('m', strtotime($tgl_spmk)) . '/0001';
			}
			$d = ORM::for_table('spmk_master')->create();
			$d->no_spmk = $no;
			$d->tgl_spmk = $tgl_spmk;
			$d->dibuat_oleh = $user['id'];
			$d->dibuat_nama = $user['fullname'];
			$d->dibuat_tgl = date('Y-m-d H:i:s');
			$d->posisi = 'SPMK';
			$d->status = 'PENDING';
			$d->priority = $priority;
			$d->divisi = $divisi;
			$d->jenis_pekerjaan = $jenis_pekerjaan;
			$d->lokasi = $lokasi;
			$d->afdeling = $afdeling;
			$d->save();

			$i = 0;
			$isi = '';
			foreach ($spesifikasi as $code) {
				$sspesifikasi = $spesifikasi[$i];
				$sblock = $block[$i];
				$sha = $ha[$i];
				$spkk = $pkk[$i];

				$y = ORM::for_table('spmk_detail')->create();
				$y->no_spmk = $no;
				$y->spesifikasi = $sspesifikasi;
				$y->block = $sblock;
				$y->ha = $sha;
				$y->pkk = $spkk;
				$y->status = 'PENDING';
				$y->save();
				$i++;

				$isi .= "<b>SERVIS #" . $i . "</b> <br>
							Spesifikasi : " . $sspesifikasi . " <br>
							Block : " . $sblock . " <br>
							Ha : " . $sha . " <br>
							PKK : " . $spkk . " <br><br>
					";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah Data SPmK : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval SPMK')->find_one();
			$to = ['capella.zoom@gmail.com'];
			$g = ORM::for_table('daftar_approval')->where('kode_dept', $user['kode_dept'])->where_in('setting', array('spmk_disurvey', 'spmk_diketahui', 'spmk_diperiksa', 'spmk_disetujui'))->find_many();
			if ($g) {
				$to = [];
			}

			foreach ($g as $gs) {
				$to = array_merge($to, explode('|', $gs['approval']));
			}
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_spmk', $no);
			$message->set('tgl_spmk', $tgl_spmk);
			$message->set('kepentingan', $priority);
			$message->set('divisi', $divisi);
			$message->set('jenis_pekerjaan', $jenis_pekerjaan);
			$message->set('lokasi', $lokasi);
			$message->set('afdeling', $afdeling);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			foreach ($to as $item) {
				Notify_Email::_send($item, $item, $subj, $message_o);
			}

			Event::trigger('pembelian/add-spmk-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. SPmK : ' . $no,
				'dataval' => 1);
			echo json_encode($data);
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

case 'edit-spmk':
	Event::trigger('pembelian/edit-spmk/');
	_auth1('SPMK-EDIT', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$ui->assign('e', $e);
		$ui->assign('idate', $idate);
		$ui->assign('_sysfrm_menu2', 'spmk-pending');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-spmk', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'edit-spmk.tpl');
	} else {
		r2(U . 'pembelian/list-spmk-pending', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'edit-spmk-post':
	Event::trigger('pembelian/edit-spmk-post/');
	$spesifikasi = explode(',', _post('spesifikasi'));
	$block = explode(',', _post('block'));
	$ha = explode(',', _post('ha'));
	$pkk = explode(',', _post('pkk'));
	$priority = _post('priority');
	$divisi = _post('divisi');
	$jenis_pekerjaan = _post('jenis_pekerjaan');
	$lokasi = _post('lokasi');
	$afdeling = _post('afdeling');
	$no_spmk = _post('no_spmk');
	$msg = '';
	$msg_spesifikasi = '';
	$i = 0;
	$ii = 0;
	foreach ($spesifikasi as $code) {
		if ($spesifikasi[$i] == '') {
			$msg_spesifikasi = 'Ada detail yang belum mengisi Spesifikasi';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_spesifikasi != '') {
			$msg .= $msg_spesifikasi . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	$cekSpesifikasi = $spesifikasi;
	// sort($cekSpesifikasi);
	$cek = '';
	$flag = false;
	$error = '';
	foreach ($cekSpesifikasi as $code) {
		if ($cek == $code) {
			$flag = true;
			break;
		} else {
			$flag = false;
		}

		$cek = $code;
	}
	if ($flag) {
		$msg .= 'Ada Spesifikasi double<br>';
	}

	if ($priority == '') {
		$msg .= 'Belum Memilih Tingkat Kepentingan<br>';
	}

	if ($divisi == '') {
		$msg .= 'Divisi Harus Diisi<br>';
	}

	if ($jenis_pekerjaan == '') {
		$msg .= 'Jenis Pekerjaan Harus Diisi<br>';
	}

	if ($lokasi == '') {
		$msg .= 'Lokasi Harus Diisi<br>';
	}

	if ($afdeling == '') {
		$msg .= 'Afdeling Harus Diisi<br>';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			$d->diedit_oleh = $user['id'];
			$d->diedit_nama = $user['fullname'];
			$d->diedit_tgl = date('Y-m-d H:i:s');
			$d->priority = $priority;
			$d->divisi = $divisi;
			$d->jenis_pekerjaan = $jenis_pekerjaan;
			$d->lokasi = $lokasi;
			$d->afdeling = $afdeling;
			$d->diketahui_oleh = 0;
			$d->diketahui_nama = '';
			$d->diketahui_tgl = NULL;
			$d->diperiksa_oleh = 0;
			$d->diperiksa_nama = '';
			$d->diperiksa_tgl = NULL;
			$d->disetujui_oleh = 0;
			$d->disetujui_nama = '';
			$d->disetujui_tgl = NULL;
			$d->disurvey_oleh = 0;
			$d->disurvey_nama = '';
			$d->disurvey_tgl = NULL;
			$d->ditolak_oleh = 0;
			$d->ditolak_nama = '';
			$d->ditolak_tgl = NULL;
			if ($d['status'] == 'REJECT') {
				$d->status = 'REVISI';
			}
			$d->save();

			$i = 0;
			$x = ORM::for_table("spmk_detail")->where('no_spmk', $no_spmk)->delete_many();
			foreach ($spesifikasi as $code) {
				$sspesifikasi = $spesifikasi[$i];
				$sblock = $block[$i];
				$sha = $ha[$i];
				$spkk = $pkk[$i];

				$y = ORM::for_table('spmk_detail')->create();
				$y->no_spmk = $no_spmk;
				$y->spesifikasi = $sspesifikasi;
				$y->block = $sblock;
				$y->ha = $sha;
				$y->pkk = $spkk;
				$y->status = 'PENDING';
				$y->save();
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Edit Data SPmK : ' . $no_spmk . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('pembelian/edit-spmk-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. SPmK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'edit-spmk-kontraktor':
	Event::trigger('pembelian/edit-spmk/');
	_auth1('SPMK-EDIT-SUPPLIER', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$ui->assign('e', $e);
		$ui->assign('tg3', $tg3);
		$ui->assign('_sysfrm_menu2', 'spmk-pending');
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-spmk-kontraktor', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'edit-spmk-kontraktor.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}
	break;

case 'edit-spmk-kontraktor-post':
	Event::trigger('pembelian/edit-pr-supplier-post/');
	$no_spmk = _post('no_spmk');
	$spesifikasi = explode(',', _post('spesifikasi'));
	$pkk = explode(',', _post('pkk'));
	$ha = explode(',', _post('ha'));
	$block = explode(',', _post('block'));
	$kode_kontraktor1 = explode(',', _post('kode_kontraktor1'));
	$harga1 = explode(',', _post('harga1'));
	$keterangan_kontraktor1 = explode(',', _post('keterangan_kontraktor1'));
	$file_kontraktor1 = explode(',', _post('file_kontraktor1'));
	$kode_kontraktor2 = explode(',', _post('kode_kontraktor2'));
	$harga2 = explode(',', _post('harga2'));
	$keterangan_kontraktor2 = explode(',', _post('keterangan_kontraktor2'));
	$file_kontraktor2 = explode(',', _post('file_kontraktor2'));
	$kode_kontraktor3 = explode(',', _post('kode_kontraktor3'));
	$harga3 = explode(',', _post('harga3'));
	$keterangan_kontraktor3 = explode(',', _post('keterangan_kontraktor3'));
	$file_kontraktor3 = explode(',', _post('file_kontraktor3'));
	$kontraktorpilihan = explode(',', _post('kontraktorpilihan'));

	$msg = '';
	$msg_spesifikasi = '';
	$msg_kontraktor = '';
	$msg_pilihan = '';
	$i = 0;
	$ii = 0;
	foreach ($spesifikasi as $code) {
		if ($spesifikasi[$i] == '') {
			$msg_spesifikasi = 'Ada detail yang belum memilih Spesifikasi';
		}

		if ($kode_kontraktor1[$i] == '' || $harga1[$i] == '') {
			$msg_kontraktor = 'Ada detail yang Kontraktor 1 dan Harga 1 masih kosong';
		}

		if ($kontraktorpilihan[$i] == '') {
			$msg_pilihan = 'Ada detail yang belum memilih kontraktor Pilihan';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_spesifikasi != '') {
			$msg .= $msg_spesifikasi . '<br>';
		}

		if ($msg_kontraktor != '') {
			$msg .= $msg_kontraktor . '<br>';
		}

		if ($msg_pilihan != '') {
			$msg .= $msg_pilihan . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request';
	}

	$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
	if ($d['status'] != 'PENDING' && $d['status'] != 'REJECT' && $d['status'] != 'REVISI') {
		$msg .= 'Hanya Data SPmK dengan Status PENDING atau REJECT yang dapat melakukan Edit<br>';
	}
	if ($d['posisi'] != 'SPMK1') {
		$msg .= 'Hanya Data SPmK dengan Posisi SPMK1 yang dapat melakukan Edit<br>';
	}
	if ($d['posisi'] == 'SPMK1' && ($d['status'] == 'PENDING' || $d['status'] == 'REVISI')) {
		$msg .= 'Hanya Data SPmK dengan Status REJECT untuk Posisi SPmK1 yang dapat melakukan Edit';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_spmk = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_spmk));
			$th = date('Y', strtotime($tgl_spmk));

			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			$d->ktr_diedit_oleh = $user['id'];
			$d->ktr_diedit_nama = $user['fullname'];
			$d->ktr_diedit_tgl = date('Y-m-d H:i:s');
			$d->ktr_disetujui_oleh = 0;
			$d->ktr_disetujui_nama = "";
			$d->ktr_disetujui_tgl = null;
			if ($d['status'] == 'REJECT' or $d['status'] == 'REVISI') {
				$d->status = 'REVISI';
			}
			$d->save();

			$i = 0;
			$isi = '';
			$x = ORM::for_table("spmk_detail")->where('no_spmk', $no_spmk)->delete_many();
			foreach ($spesifikasi as $code) {
				$sspesifikasi = $spesifikasi[$i];
				$sblock = $block[$i];
				$sha = $ha[$i];
				$spkk = $pkk[$i];
				$skodekontraktor1 = $kode_kontraktor1[$i];
				$sharga1 = str_replace(".", "", $harga1[$i]);
				$sketerangankontraktor1 = $keterangan_kontraktor1[$i];
				$sfilekontraktor1 = $file_kontraktor1[$i];
				$skodekontraktor2 = $kode_kontraktor2[$i];
				$sharga2 = str_replace(".", "", $harga2[$i]);
				$sketerangankontraktor2 = $keterangan_kontraktor2[$i];
				$sfilekontraktor2 = $file_kontraktor2[$i];
				$skodekontraktor3 = $kode_kontraktor3[$i];
				$sharga3 = str_replace(".", "", $harga3[$i]);
				$sketerangankontraktor3 = $keterangan_kontraktor3[$i];
				$sfilekontraktor3 = $file_kontraktor3[$i];
				if ($kontraktorpilihan[$i] == 'kontraktor1') {
					$skontraktorpilihan = $skodekontraktor1;
					$hargapilihan = $sharga1;
					$keteranganpilihan = $sketerangankontraktor1;
				} else if ($kontraktorpilihan[$i] == 'kontraktor2') {
					$skontraktorpilihan = $skodekontraktor2;
					$hargapilihan = $sharga2;
					$keteranganpilihan = $sketerangankontraktor2;
				} else if ($kontraktorpilihan[$i] == 'kontraktor3') {
					$skontraktorpilihan = $skodekontraktor3;
					$hargapilihan = $sharga3;
					$keteranganpilihan = $sketerangankontraktor3;
				}

				$y = ORM::for_table('spmk_detail')->create();
				$y->status = 'SPMK';
				$y->no_spmk = $no_spmk;
				$y->spesifikasi = $sspesifikasi;
				$y->block = $sblock;
				$y->ha = $sha;
				$y->pkk = $spkk;
				$y->kontraktor1 = $skodekontraktor1;
				$y->harga1 = $sharga1;
				$y->keterangan_kontraktor1 = $sketerangankontraktor1;
				$y->file_kontraktor1 = $sfilekontraktor1;
				$y->kontraktor2 = $skodekontraktor2;
				$y->harga2 = $sharga2;
				$y->keterangan_kontraktor2 = $sketerangankontraktor2;
				$y->file_kontraktor2 = $sfilekontraktor2;
				$y->kontraktor3 = $skodekontraktor3;
				$y->harga3 = $sharga3;
				$y->keterangan_kontraktor3 = $sketerangankontraktor3;
				$y->file_kontraktor3 = $sfilekontraktor3;
				$y->kontraktorpilihan = $skontraktorpilihan;
				$y->hargapilihan = $hargapilihan;
				$y->save();
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Edit Kontraktor Biding :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('pembelian/edit-spmk-kontraktor-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. SPMK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'revisi-spmk':
	Event::trigger('pembelian/revisi-pr/');
	_auth1('PR-REVISI', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$clist = '';
		$clist = '<option value="">Pilih Keperluan</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="DIRECT">DIRECT</option>';
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$idates = date('d-m-Y');
		$tgl_spmk = Validator::Date1($idates);
		$bl = date('n', strtotime($tgl_spmk));
		$th = date('Y', strtotime($tgl_spmk));
		$chk = ORM::for_table('spmk_master')->raw_query('select * from spmk_master where month(tgl_spmk)=' . $bl . ' and year(tgl_spmk)=' . $th . ' order by no_spmk desc')->find_one();
		if ($chk) {
			$no = ++$chk['no_spmk'];
		} else {
			$no = 'PR/' . $th . '/' . date('m', strtotime($tgl_spmk)) . '/0001';
		}
		$ui->assign('e', $e);
		$ui->assign('tg', $tg);
		$ui->assign('clist', $clist);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('no_revisi', $no);
		$ui->assign('_sysfrm_menu2', 'spmk-reject');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'revisi-pr', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'revisi-spmk.tpl');
	} else {
		r2(U . 'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
	}
	break;

case 'revisi-spmk-post':
	Event::trigger('pembelian/revisi-pr-post/');
	$no_pr = _post('no_pr');
	$no_revisi = _post('no_revisi');
	$ket_revisi = _post('ket_revisi');
	$priority_revisi = _post('priority_revisi');
	$keperluan = explode(',', _post('keperluan'));
	$item = explode(',', _post('item'));
	$bagian = explode(',', _post('bagian'));
	$main = explode(',', _post('main'));
	$sub = explode(',', _post('sub'));
	$line = explode(',', _post('line'));
	$qty = explode(',', _post('qty'));
	$diperlukan = explode(',', _post('diperlukan'));
	$keterangan = explode(',', _post('keterangan'));
	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$msg_diperlukan = '';
	$i = 0;
	$ii = 0;
	$n = ORM::for_table('pr_master')->where('no_pr', $no_revisi)->find_one();
	if ($n) {
		$msg .= 'No PR Revisi telah terdaftar, mohon refresh halaman untuk mendapatkan No PR Revisi baru';
	}
	foreach ($keperluan as $code) {
		if ($item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($diperlukan[$i] == '') {
			$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
		}

		if ($qty[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

		if ($msg_tgl != '') {
			$msg .= $msg_tgl . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	// sort($item);
	$cek = '';
	$flag = false;
	$error = '';
	foreach ($item as $code) {
		if ($cek == $code) {
			$flag = true;
			break;
		} else {
			$flag = false;
		}

		$cek = $code;
	}
	if ($flag) {
		$msg .= 'Ada Item Stock double<br>';
	}

	if ($priority_revisi == '') {
		$msg .= 'Belum Memilih Tingkat Kepentingan';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_pr = Validator::Date1(_post('idate'));
			$tgl_pr_revisi = Validator::Date1(_post('idates'));
			$bl = date('n', strtotime($tgl_pr));
			$th = date('Y', strtotime($tgl_pr));

			$d = ORM::for_table('pr_master')->create();
			$d->no_pr = $no_revisi;
			$d->tgl_pr = $tgl_pr_revisi;
			$d->dibuat_oleh = $user['id'];
			$d->dibuat_nama = $user['fullname'];
			$d->dibuat_tgl = date('Y-m-d H:i:s');
			$d->posisi = 'PR';
			$d->status = 'REVISI';
			$d->priority = $priority_revisi;
			$d->revisi_pr = $no_pr;
			$d->keterangan_revisi = $ket_revisi;
			$d->save();

			$e = ORM::for_table('pr_master')->where('no_pr', $no_pr)->find_one();
			$e->diedit_oleh = $user['id'];
			$e->diedit_nama = $user['fullname'];
			$e->diedit_tgl = date('Y-m-d H:i:s');
			$e->posisi = 'PR';
			$e->status = 'CANCEL';
			$e->save();

			$i = 0;
			foreach ($keperluan as $code) {
				$sitem = $item[$i];
				$sqty = str_replace(".", "", $qty[$i]);
				$sketerangan = $keterangan[$i];
				$sdiperlukan = $diperlukan[$i];
				$sbagian = $bagian[$i];
				$smain = $main[$i];
				$ssub = $sub[$i];
				$sline = $line[$i];

				$y = ORM::for_table('pr_detail')->create();
				$y->no_pr = $no_revisi;
				$y->kode_item = $sitem;
				$y->qty_req = $sqty;
				$y->status = 'PENDING';
				if (Validator::Date1($sdiperlukan) != 'Salah') {
					$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
				} else {
					$y->tgl_diperlukan = null;
				}

				$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
				$y->keterangan = $sketerangan;
				$y->bagian = $sbagian;
				$y->main = $smain;
				$y->sub = $ssub;
				$y->line = $sline;
				$y->save();
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log('Revisi PR :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			Event::trigger('pembelian/revisi-pr-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Revisi. No. PR : ' . $no_revisi,
				'dataval' => 1);
			echo json_encode($data);
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

case 'add-spnk':
	Event::trigger('pembelian/add-spnk/');
	_auth1('SPMK-ADD', $user['id']);
	$clist = '';
	$clist = '<option value="">Pilih Kontraktor</option>';
	$tg = ORM::for_table('daftar_supplier')->raw_query(
		'SELECT DISTINCT (daftar_supplier.nama_supplier), daftar_supplier.kode_supplier
			FROM (spmk_detail
			INNER JOIN daftar_supplier
			ON daftar_supplier.kode_supplier = CONVERT(spmk_detail.kontraktorpilihan USING utf32))
			WHERE spmk_detail.status LIKE "SPMK"')->find_many();
	foreach ($tg as $r) {
		$clist .= '<option value="' . $r['kode_supplier'] . '">' . $r['kode_supplier'] . ' - ' . $r['nama_supplier'] . '</option>';
	}
	$idate = date('d-m-Y');
	$ui->assign('opt_kontraktor', $clist);
	$ui->assign('idate', $idate);
	$ui->assign('_sysfrm_menu2', 'spnk-add');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-spnk', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-spnk.tpl');
	break;

case 'edit-spnk':
	Event::trigger('pembelian/edit-spnk/');
	_auth1('SPNK-EDIT', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_pr']));
		$ui->assign('e', $e);
		$ui->assign('tg3', $tg3);
		$ui->assign('_sysfrm_menu2', 'spnk-pending');
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-spnk', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'edit-spnk.tpl');
	} else {
		r2(U . 'pembelian/list-spnk-pending', 'e', 'SPK tersebut tidak ditemukan');
	}

	break;

case 'edit-spnk-post':
	Event::trigger('pembelian/edit-spnk-post/');
	$no_spmk = _post('no_spmk');
	$spesifikasi = explode(',', _post('spesifikasi'));
	$pkk = explode(',', _post('pkk'));
	$ha = explode(',', _post('ha'));
	$block = explode(',', _post('block'));
	$kontraktor1 = explode(',', _post('kontraktor1'));
	$harga1 = explode(',', _post('harga1'));
	$keterangan_kontraktor1 = explode(',', _post('keterangan_kontraktor1'));
	$file_kontraktor1 = explode(',', _post('file_kontraktor1'));
	$kontraktor2 = explode(',', _post('kontraktor2'));
	$harga2 = explode(',', _post('harga2'));
	$keterangan_kontraktor2 = explode(',', _post('keterangan_kontraktor2'));
	$file_kontraktor2 = explode(',', _post('file_kontraktor2'));
	$kontraktor3 = explode(',', _post('kontraktor3'));
	$harga3 = explode(',', _post('harga3'));
	$keterangan_kontraktor3 = explode(',', _post('keterangan_kontraktor3'));
	$file_kontraktor3 = explode(',', _post('file_kontraktor3'));
	$kontraktorpilihan = explode(',', _post('kontraktorpilihan'));

	$msg = '';
	$msg_spesifikasi = '';
	$msg_kontraktor = '';
	$msg_pilihan = '';
	$i = 0;
	$ii = 0;
	foreach ($spesifikasi as $code) {
		if ($spesifikasi[$i] == '') {
			$msg_spesifikasi = 'Ada detail yang belum memilih Spesifikasi';
		}

		if ($kontraktor1[$i] == '' || $harga1[$i] == '') {
			$msg_kontraktor = 'Ada detail yang Kontraktor 1 dan Harga 1 masih kosong';
		}

		if ($kontraktorpilihan[$i] == '') {
			$msg_pilihan = 'Ada detail yang belum memilih kontraktor Pilihan';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_spesifikasi != '') {
			$msg .= $msg_spesifikasi . '<br>';
		}

		if ($msg_kontraktor != '') {
			$msg .= $msg_kontraktor . '<br>';
		}

		if ($msg_pilihan != '') {
			$msg .= $msg_pilihan . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			$d->ktr_diedit_oleh = $user['id'];
			$d->ktr_diedit_nama = $user['fullname'];
			$d->ktr_diedit_tgl = date('Y-m-d H:i:s');
			$d->save();

			$i = 0;
			$isi = '';
			$x = ORM::for_table("spmk_detail")->where('no_spmk', $no_spmk)->delete_many();
			foreach ($spesifikasi as $code) {
				$sspesifikasi = $spesifikasi[$i];
				$sblock = $block[$i];
				$sha = $ha[$i];
				$spkk = $pkk[$i];
				$skodekontraktor1 = $kontraktor1[$i];
				$sharga1 = str_replace(".", "", $harga1[$i]);
				$sketerangankontraktor1 = $keterangan_kontraktor1[$i];
				$sfilekontraktor1 = $file_kontraktor1[$i];
				$skodekontraktor2 = $kontraktor2[$i];
				$sharga2 = str_replace(".", "", $harga2[$i]);
				$sketerangankontraktor2 = $keterangan_kontraktor2[$i];
				$sfilekontraktor2 = $file_kontraktor2[$i];
				$skodekontraktor3 = $kontraktor3[$i];
				$sharga3 = str_replace(".", "", $harga3[$i]);
				$sketerangankontraktor3 = $keterangan_kontraktor3[$i];
				$sfilekontraktor3 = $file_kontraktor3[$i];
				if ($kontraktorpilihan[$i] == 'kontraktor1') {
					$skontraktorpilihan = $skodekontraktor1;
					$hargapilihan = $sharga1;
					$keteranganpilihan = $sketerangankontraktor1;
				} else if ($kontraktorpilihan[$i] == 'kontraktor2') {
					$skontraktorpilihan = $skodekontraktor2;
					$hargapilihan = $sharga2;
					$keteranganpilihan = $sketerangankontraktor2;
				} else if ($kontraktorpilihan[$i] == 'kontraktor3') {
					$skontraktorpilihan = $skodekontraktor3;
					$hargapilihan = $sharga3;
					$keteranganpilihan = $sketerangankontraktor3;
				}

				$y = ORM::for_table('spmk_detail')->create();
				$y->no_spmk = $no_spmk;
				$y->spesifikasi = $sspesifikasi;
				$y->block = $sblock;
				$y->ha = $sha;
				$y->pkk = $spkk;
				$y->status = 'SPNK';
				$y->kontraktor1 = $skodekontraktor1;
				$y->harga1 = $sharga1;
				$y->keterangan_kontraktor1 = $sketerangankontraktor1;
				$y->file_kontraktor1 = $sfilekontraktor1;
				$y->kontraktor2 = $skodekontraktor2;
				$y->harga2 = $sharga2;
				$y->keterangan_kontraktor2 = $sketerangankontraktor2;
				$y->file_kontraktor2 = $sfilekontraktor2;
				$y->kontraktor3 = $skodekontraktor3;
				$y->harga3 = $sharga3;
				$y->keterangan_kontraktor3 = $sketerangankontraktor3;
				$y->file_kontraktor3 = $sfilekontraktor3;
				$y->kontraktorpilihan = $skontraktorpilihan;
				$y->hargapilihan = $hargapilihan;
				$y->save();
				$i++;

				// $r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
				// $s = ORM::for_table('daftar_supplier')->where('kode_supplier', $ssupplierpilihan)->find_one();
				// $bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
				// $mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
				// $subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
				// $lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
				// $isi .= "<b>PURCHASE REQUISITION ITEM #". $i ."</b> <br>
				// 		Keperluan : ". $code ." <br>";
				// if($code == 'STOCK'){
				// 	$isi .= "Bagian : STOCK <br>";
				// } else {
				// 	$isi .= "Bagian : ". $bagians['nama_kategori'] ." | ". $mains['nama_kategori'] ." > ". $subs['nama_kategori'] ." > ". $lines['nama_kategori'] ." <br>";
				// }
				// $isi .= "
				// 		Item : ". $r['nama_item'] ." <br>
				// 		Qty Request : ". number_format($sqty, 0, '', '.') ." <br>
				// 		Tanggal Diperlukan : ". date('Y-m-d', strtotime($sdiperlukan)) ." <br>
				// 		Keterangan : ". $sketerangan ." <br>
				// ";
				// $isi .= "<b>Pilihan Supplier</b><br>
				// 		Kode Supplier : ". $ssupplierpilihan ."<br>
				// 		Nama Supplier : ". $s['nama_supplier'] ."<br>
				// 		Harga : ". number_format($hargapilihan, 0, '', '.') ."<br>
				// 		Keterangan Supplier : ". $keteranganpilihan ."<br><br>
				// ";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Edit SPNK : ' . $no_pr . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			// $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval PR Biding')->find_one();
			// $to = ['capella.zoom@gmail.com'];
			// if($pembelian == 'lokal'){
			// 	$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'biding_local_disetujui'))->find_one();
			// } else {
			// 	$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'biding_disetujui'))->find_one();
			// }
			// if($g) {
			// 	$to = explode('|', $g['approval']);
			// }
			// $subject = new Template($e['subject']);
			// $subject->set('business_name', $config['CompanyName']);
			// $subj = $subject->output();
			// $message = new Template($e['message']);
			// $message->set('business_name', $config['CompanyName']);
			// $message->set('isi', $isi);
			// $message->set('no_pr', $no_pr);
			// $message->set('tgl_pr', $tgl_pr);
			// $message->set('pembelian', $pembelian);
			// $message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			// $message_o = $message->output();
			// foreach($to as $item){
			// 	Notify_Email::_send($item,$item,$subj,$message_o);
			// }
			Event::trigger('pembelian/spnk-pending/_on_finished');
			$data = array(
				'msg' => 'Berhasil Edit. No. SPNK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'kontraktor-spmk':
	Event::trigger('pembelian/kontraktor-spmk/');
	_auth1('SPMK-KONTRAKTOR', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('spmk_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $d['no_spmk'])->find_many();
		$clist = '';
		$tg3 = ORM::for_table('daftar_supplier')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_spmk']));
		$ui->assign('e', $e);
		$ui->assign('clist', $clist);
		$ui->assign('tg3', $tg3);
		$ui->assign('_sysfrm_menu2', 'spmk-approve');
		$ui->assign('idate', $idate);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-spmk-kontraktor', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'add-spmk-kontraktor.tpl');
	} else {
		r2(U . 'pembelian/list-spmk-approve', 'e', 'SPmK tersebut tidak ditemukan');
	}

	break;

case 'kontraktor-spmk-post':
	Event::trigger('pembelian/kontraktor-spmk-post/');
	$no_spmk = _post('no_spmk');
	$spesifikasi = explode(',', _post('spesifikasi'));
	$pkk = explode(',', _post('pkk'));
	$ha = explode(',', _post('ha'));
	$block = explode(',', _post('block'));
	$kode_kontraktor1 = explode(',', _post('kode_kontraktor1'));
	$harga1 = explode(',', _post('harga1'));
	$keterangan_kontraktor1 = explode(',', _post('keterangan_kontraktor1'));
	$file_kontraktor1 = explode(',', _post('file_kontraktor1'));
	$kode_kontraktor2 = explode(',', _post('kode_kontraktor2'));
	$harga2 = explode(',', _post('harga2'));
	$keterangan_kontraktor2 = explode(',', _post('keterangan_kontraktor2'));
	$file_kontraktor2 = explode(',', _post('file_kontraktor2'));
	$kode_kontraktor3 = explode(',', _post('kode_kontraktor3'));
	$harga3 = explode(',', _post('harga3'));
	$keterangan_kontraktor3 = explode(',', _post('keterangan_kontraktor3'));
	$file_kontraktor3 = explode(',', _post('file_kontraktor3'));
	$kontraktorpilihan = explode(',', _post('kontraktorpilihan'));

	$msg = '';
	$msg_spesifikasi = '';
	$msg_kontraktor = '';
	$msg_pilihan = '';
	$i = 0;
	$ii = 0;
	foreach ($spesifikasi as $code) {
		if ($spesifikasi[$i] == '') {
			$msg_spesifikasi = 'Ada detail yang belum memilih Spesifikasi';
		}

		if ($kode_kontraktor1[$i] == '' || $harga1[$i] == '') {
			$msg_kontraktor = 'Ada detail yang Kontraktor 1 dan Harga 1 masih kosong';
		}

		if ($kontraktorpilihan[$i] == '') {
			$msg_pilihan = 'Ada detail yang belum memilih kontraktor Pilihan';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_spesifikasi != '') {
			$msg .= $msg_spesifikasi . '<br>';
		}

		if ($msg_kontraktor != '') {
			$msg .= $msg_kontraktor . '<br>';
		}

		if ($msg_pilihan != '') {
			$msg .= $msg_pilihan . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request';
	}

	$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
	if ($d['status'] != 'APPROVE') {
		$msg .= 'Hanya Data SPmK dengan Status APPROVE yang dapat memilih kontraktor';
	}
	if ($d['posisi'] != 'SPMK') {
		$msg .= 'Hanya Data SPmK dengan Posisi SPMK yang dapat memilih supplier';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_spmk = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_spmk));
			$th = date('Y', strtotime($tgl_spmk));

			$d = ORM::for_table('spmk_master')->where('no_spmk', $no_spmk)->find_one();
			$d->ktr_dibuat_oleh = $user['id'];
			$d->ktr_dibuat_nama = $user['fullname'];
			$d->ktr_dibuat_tgl = date('Y-m-d H:i:s');
			$d->posisi = 'SPMK1';
			$d->status = 'PENDING';
			$d->save();

			$i = 0;
			$isi = '';
			$x = ORM::for_table("spmk_detail")->where('no_spmk', $no_spmk)->delete_many();
			foreach ($spesifikasi as $code) {
				$sspesifikasi = $spesifikasi[$i];
				$sblock = $block[$i];
				$sha = $ha[$i];
				$spkk = $pkk[$i];
				$skodekontraktor1 = $kode_kontraktor1[$i];
				$sharga1 = str_replace(".", "", $harga1[$i]);
				$sketerangankontraktor1 = $keterangan_kontraktor1[$i];
				$sfilekontraktor1 = $file_kontraktor1[$i];
				$skodekontraktor2 = $kode_kontraktor2[$i];
				$sharga2 = str_replace(".", "", $harga2[$i]);
				$sketerangankontraktor2 = $keterangan_kontraktor2[$i];
				$sfilekontraktor2 = $file_kontraktor2[$i];
				$skodekontraktor3 = $kode_kontraktor3[$i];
				$sharga3 = str_replace(".", "", $harga3[$i]);
				$sketerangankontraktor3 = $keterangan_kontraktor3[$i];
				$sfilekontraktor3 = $file_kontraktor3[$i];
				if ($kontraktorpilihan[$i] == 'kontraktor1') {
					$skontraktorpilihan = $skodekontraktor1;
					$hargapilihan = $sharga1;
					$keteranganpilihan = $sketerangankontraktor1;
				} else if ($kontraktorpilihan[$i] == 'kontraktor2') {
					$skontraktorpilihan = $skodekontraktor2;
					$hargapilihan = $sharga2;
					$keteranganpilihan = $sketerangankontraktor2;
				} else if ($kontraktorpilihan[$i] == 'kontraktor3') {
					$skontraktorpilihan = $skodekontraktor3;
					$hargapilihan = $sharga3;
					$keteranganpilihan = $sketerangankontraktor3;
				}

				$y = ORM::for_table('spmk_detail')->create();
				$y->no_spmk = $no_spmk;
				$y->spesifikasi = $sspesifikasi;
				$y->block = $sblock;
				$y->ha = $sha;
				$y->pkk = $spkk;
				$y->status = 'SPMK';
				$y->kontraktor1 = $skodekontraktor1;
				$y->harga1 = $sharga1;
				$y->keterangan_kontraktor1 = $sketerangankontraktor1;
				$y->file_kontraktor1 = $sfilekontraktor1;
				$y->kontraktor2 = $skodekontraktor2;
				$y->harga2 = $sharga2;
				$y->keterangan_kontraktor2 = $sketerangankontraktor2;
				$y->file_kontraktor2 = $sfilekontraktor2;
				$y->kontraktor3 = $skodekontraktor3;
				$y->harga3 = $sharga3;
				$y->keterangan_kontraktor3 = $sketerangankontraktor3;
				$y->file_kontraktor3 = $sfilekontraktor3;
				$y->kontraktorpilihan = $skontraktorpilihan;
				$y->hargapilihan = $hargapilihan;
				$y->save();
				$i++;

				$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $skontraktorpilihan)->find_one();
				$isi .= "<b>SERVIS #" . $i . "</b> <br>";
				$isi .= "
							Spesifikasi : " . $sspesifikasi . " <br>
							Block : " . $sblock . " <br>
							Ha : " . $sha . " <br>
							PKK : " . $spkk . " <br>
					";
				$isi .= "<b>Pilihan Supplier</b><br>
							Kode Supplier : " . $skontraktorpilihan . "<br>
							Nama Supplier : " . $s['nama_supplier'] . "<br>
							Harga : " . number_format($hargapilihan, 0, '', '.') . "<br>
							Keterangan Supplier : " . $keteranganpilihan . "<br><br>
					";
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Tambah SPMK Bidding : ' . $no_spmk . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval SPMK Bidding')->find_one();
			$to = ['capella.zoom@gmail.com'];
			$g = ORM::for_table('daftar_approval')->where(array('setting' => 'spmk_bidding_disetujui_adir'))->find_one();
			if ($g) {
				$to = explode('|', $g['approval']);
			}
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_spmk', $no_spmk);
			$message->set('tgl_spmk', $tgl_spmk);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			foreach ($to as $item) {
				Notify_Email::_send($item, $item, $subj, $message_o);
			}
			Event::trigger('pembelian/spmk-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. SPMK : ' . $no_spmk,
				'dataval' => 1);
			echo json_encode($data);
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

case 'list-spmk-aprv':
	Event::trigger('pembelian/list-spmk-aprv/');
	_auth1('SPMK-APRV', $user['id']);
	$msg = $routes['3'];

	if ($user['kode_dept'] == "PNK") {
		$condition = "ditolak_oleh";
		$diketahui_true = false;
		$diketahui = ORM::for_table('daftar_approval')->where('setting', 'spmk_diketahui')->where('kode_dept', "KEB")->find_one();
		$diketahui = explode('|', $diketahui['approval']);
		foreach ($diketahui as $item) {
			if ($item == $user['username']) {
				$condition = "diketahui_oleh";
				$diketahui_true = true;
				break;
			}
		}
		if ($diketahui_true == false) {
			$diketahui = ORM::for_table('daftar_approval')->where('setting', 'spmk_diketahui')->where('kode_dept', "PKS")->find_one();
			$diketahui = explode('|', $diketahui['approval']);
			foreach ($diketahui as $item) {
				if ($item == $user['username']) {
					$condition = "diketahui_oleh";
					$diketahui_true = true;
					break;
				}
			}
		}

		$diperiksa_true = false;
		$diperiksa = ORM::for_table('daftar_approval')->where('setting', 'spmk_diperiksa')->where('kode_dept', "KEB")->find_one();
		$diperiksa = explode('|', $diperiksa['approval']);
		foreach ($diperiksa as $item) {
			if ($item == $user['username']) {
				$condition = "diperiksa_oleh";
				$diperiksa_true = true;
				break;
			}
		}
		if ($diperiksa_true == false) {
			$diperiksa = ORM::for_table('daftar_approval')->where('setting', 'spmk_diperiksa')->where('kode_dept', "PKS")->find_one();
			$diperiksa = explode('|', $diperiksa['approval']);
			foreach ($diperiksa as $item) {
				if ($item == $user['username']) {
					$condition = "diperiksa_oleh";
					$diperiksa_true = true;
					break;
				}
			}
		}

		$disetujui_true = false;
		$disetujui = ORM::for_table('daftar_approval')->where('setting', 'spmk_disetujui')->where('kode_dept', "KEB")->find_one();
		$disetujui = explode('|', $disetujui['approval']);
		foreach ($disetujui as $item) {
			if ($item == $user['username']) {
				$condition = "disetujui_oleh";
				$disetujui_true = true;
				break;
			}
		}
		if ($disetujui_true == false) {
			$disetujui = ORM::for_table('daftar_approval')->where('setting', 'spmk_disetujui')->where('kode_dept', "PKS")->find_one();
			$disetujui = explode('|', $disetujui['approval']);
			foreach ($disetujui as $item) {
				if ($item == $user['username']) {
					$condition = "disetujui_oleh";
					$disetujui_true = true;
					break;
				}
			}
		}

		// SPMK
		$d = ORM::for_table('spmk_master')->where(array(
			'posisi' => 'SPMK',
			'status' => 'PENDING',
		))->where($condition, '0')->find_many();

		$e = ORM::for_table('spmk_master')->where(array(
			'posisi' => 'SPMK',
			'status' => 'REVISI',
		))->where($condition, '0')->find_many();

		$cd = ORM::for_table('spmk_master')->where(array(
			'posisi' => 'SPMK',
			'status' => 'PENDING',
		))->where($condition, '0')->count();
		$ce = ORM::for_table('spmk_master')->where(array(
			'posisi' => 'SPMK',
			'status' => 'REVISI',
		))->where($condition, '0')->count();

	} else {
		$condition = "ditolak_oleh";
		$diketahui = ORM::for_table('daftar_approval')->where('setting', 'spmk_diketahui')->where('kode_dept', $user['kode_dept'])->find_one();
		$diketahui = explode('|', $diketahui['approval']);
		foreach ($diketahui as $item) {
			if ($item == $user['username']) {
				$condition = "diketahui_oleh";
				break;
			}
		}

		$diperiksa = ORM::for_table('daftar_approval')->where('setting', 'spmk_diperiksa')->where('kode_dept', $user['kode_dept'])->find_one();
		$diperiksa = explode('|', $diperiksa['approval']);
		foreach ($diperiksa as $item) {
			if ($item == $user['username']) {
				$condition = "diperiksa_oleh";
				break;
			}
		}

		$disetujui = ORM::for_table('daftar_approval')->where('setting', 'spmk_disetujui')->where('kode_dept', $user['kode_dept'])->find_one();
		$disetujui = explode('|', $disetujui['approval']);
		foreach ($disetujui as $item) {
			if ($item == $user['username']) {
				$condition = "disetujui_oleh";
				break;
			}
		}

		// List Approval Asdir
		$bidding_condition = false;
		$disetujui_asisten = ORM::for_table('daftar_approval')->where('setting', 'spmk_bidding_disetujui_adir')->find_one();
		$disetujui_asisten = explode('|', $disetujui_asisten['approval']);
		foreach ($disetujui_asisten as $item) {
			if ($item == $user['username']) {
				$condition = "ktr_disetujui_oleh";
				$bidding_condition = true;
				break;
			}
		}

		// List Approval Dir
		$disetujui_dir = ORM::for_table('daftar_approval')->where('setting', 'spmk_bidding_disetujui_dir')->find_one();
		$disetujui_dir = explode('|', $disetujui_dir['approval']);
		foreach ($disetujui_dir as $item) {
			if ($item == $user['username']) {
				$condition = "ktr_disetujui_dir_oleh";
				$bidding_condition = true;
				break;
			}
		}

		// SPMK
		if (!$bidding_condition) {
			$array = filterdept($user['kode_dept']);
			$d = ORM::for_table('spmk_master')->where(array(
				'posisi' => 'SPMK',
				'status' => 'PENDING',
			))->where($condition, '0')->where_in('dibuat_oleh', $array)->find_many();
			$e = ORM::for_table('spmk_master')->where(array(
				'posisi' => 'SPMK',
				'status' => 'REVISI',
			))->where($condition, '0')->where_in('dibuat_oleh', $array)->find_many();

			$cd = ORM::for_table('spmk_master')->where(array(
				'posisi' => 'SPMK',
				'status' => 'PENDING',
			))->where($condition, '0')->where_in('dibuat_oleh', $array)->count();
			$ce = ORM::for_table('spmk_master')->where(array(
				'posisi' => 'SPMK',
				'status' => 'REVISI',
			))->where($condition, '0')->where_in('dibuat_oleh', $array)->count();
		} else {
			if ($condition == "ktr_disetujui_dir_oleh") {
				$f = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'PENDING',
				))->where_not_equal('ktr_disetujui_oleh', '0')->where($condition, '0')->find_many();
				$g = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'REVISI',
				))->where_not_equal('ktr_disetujui_oleh', '0')->where($condition, '0')->find_many();

				$cf = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'PENDING',
				))->where_not_equal('ktr_disetujui_oleh', '0')->where($condition, '0')->count();
				$cg = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'REVISI',
				))->where_not_equal('ktr_disetujui_oleh', '0')->where($condition, '0')->count();
			} else {
				$f = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'PENDING',
				))->where($condition, '0')->find_many();
				$g = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'REVISI',
				))->where($condition, '0')->find_many();

				$cf = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'PENDING',
				))->where($condition, '0')->count();
				$cg = ORM::for_table('spmk_master')->where(array(
					'posisi' => 'SPMK1',
					'status' => 'REVISI',
				))->where($condition, '0')->count();
			}
		}
	}

	$ui->assign('user_dept', $user['kode_dept']);
	$ui->assign('condition', $condition);
	$ui->assign('d', $d);
	$ui->assign('e', $e);
	$ui->assign('f', $f);
	$ui->assign('g', $g);
	$ui->assign('cd', $cd);
	$ui->assign('ce', $ce);
	$ui->assign('cf', $cf);
	$ui->assign('cg', $cg);
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'surat-permintaan-kerja-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-spmk.aprv')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-spmk-aprv.tpl');
	break;

case 'list-spnk-aprv':
	Event::trigger('pembelian/list-spnk-aprv/');
	_auth1('SPNK-APRV', $user['id']);
	$msg = $routes['3'];

	$condition = "ditolak_oleh";
	$disetujui = ORM::for_table('daftar_approval')->where('setting', 'spnk_disetujui')->find_one();
	$disetujui = explode('|', $disetujui['approval']);
	foreach ($disetujui as $item) {
		if ($item == $user['username']) {
			$condition = "ktr_disetujui_oleh";
			break;
		}
	}
	$d = ORM::for_table('spmk_master')->where(array(
		'posisi' => 'SPNK',
		'status' => 'PENDING',
	))->where($condition, '0')->find_many();

	$e = ORM::for_table('spmk_master')->where(array(
		'posisi' => 'SPNK',
		'status' => 'REVISI',
	))->where($condition, '0')->find_many();

	$cd = ORM::for_table('spmk_master')->where(array(
		'posisi' => 'SPNK',
		'status' => 'PENDING',
	))->where($condition, '0')->count();
	$ce = ORM::for_table('spmk_master')->where(array(
		'posisi' => 'SPNK',
		'status' => 'REVISI',
	))->where($condition, '0')->count();

	$ui->assign('d', $d);
	$ui->assign('e', $e);
	$ui->assign('cd', $cd);
	$ui->assign('ce', $ce);
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'surat-perintah-kerja-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-pr')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-spnk-aprv.tpl');
	break;

case 'list-po':
	Event::trigger('pembelian/listpo/');
	_auth1('PO-LIST', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-order');
	$ui->assign('_sysfrm_menu3', 'list-po');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-po.tpl');
	break;

case 'list-po-pending':
	Event::trigger('pembelian/listpo/');
	_auth1('PO-LIST-PENDING', $user['id']);
	$msg = $routes['3'];
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-order');
	$ui->assign('_sysfrm_menu3', 'po-pending');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-po-pending.tpl');
	break;

case 'list-po-ready':
	Event::trigger('pembelian/listpo/');
	_auth1('PO-LIST', $user['id']);
	$name = _post('name');
	$msg = $routes['3'];
	$ui->assign('name', $name);
	if ($name != '') {
		$paginator = Paginator::bootstrap('po_master', 'no_po', '%' . $name . '%', '', '', '', '', '', '', '50', '');
		$d = ORM::for_table('po_master')->where_like('no_po', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
		$cd = ORM::for_table('po_master')->where_like('no_po', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
	} else {
		$paginator = Paginator::bootstrap('po_master', '', '', '', '', '', '', '', '', '50', '');

		$d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'READY')->order_by_desc('no_po')->find_many();
		$cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'READY')->order_by_desc('no_po')->count();
	}

	$ui->assign('d', $d);
	$ui->assign('cd', $cd);
	$ui->assign('msg', $msg);
	$ui->assign('paginator', $paginator);
	$ui->assign('_sysfrm_menu2', 'purchase-order');
	$ui->assign('_sysfrm_menu3', 'po-ready');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
 ');
	$ui->display($spath . 'list-po-ready.tpl');
	break;

case 'list-po-approve':
	Event::trigger('pembelian/listpo/');
	_auth1('PO-LIST-APPROVE', $user['id']);
	$msg = $routes['3'];
	$d = ORM::for_table('po_master')->where('status', 'APPROVE')->order_by_desc('no_po')->find_many();
	$cd = ORM::for_table('po_master')->where('status', 'APPROVE')->order_by_desc('no_po')->count();
	$ui->assign('d', $d);
	$ui->assign('cd', $cd);
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-order');
	$ui->assign('_sysfrm_menu3', 'po-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-po-approved.tpl');
	break;

case 'list-po-reject':
	Event::trigger('pembelian/listpo/');
	_auth1('PO-LIST-REJECT', $user['id']);
	$msg = $routes['3'];
	$d = ORM::for_table('po_master')->where('status', 'REJECT')->order_by_desc('no_po')->find_many();
	$cd = ORM::for_table('po_master')->where('status', 'REJECT')->order_by_desc('no_po')->count();
	$ui->assign('d', $d);
	$ui->assign('cd', $cd);
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-order');
	$ui->assign('_sysfrm_menu3', 'po-reject');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-po-rejected.tpl');
	break;

case 'list-po-cancel':

	Event::trigger('pembelian/listpo/');

	_auth1('PO-LIST', $user['id']);
	$name = _post('name');
	$msg = $routes['3'];
	$ui->assign('name', $name);
	if ($name != '') {
		$paginator = Paginator::bootstrap('po_master', 'no_po', '%' . $name . '%', '', '', '', '', '', '', '50', '');
		$d = ORM::for_table('po_master')->where_like('no_po', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
		$cd = ORM::for_table('po_master')->where_like('no_po', '%' . $name . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
	} else {
		$paginator = Paginator::bootstrap('po_master', '', '', '', '', '', '', '', '', '50', '');

		$d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'CANCEL')->order_by_desc('no_po')->find_many();
		$cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'CANCEL')->order_by_desc('no_po')->count();
	}

	$ui->assign('d', $d);
	$ui->assign('cd', $cd);
	$ui->assign('msg', $msg);
	$ui->assign('paginator', $paginator);
	$ui->assign('_sysfrm_menu2', 'purchase-order');
	$ui->assign('_sysfrm_menu3', 'po-cancel');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
 ');
	$ui->display($spath . 'list-po-cancel.tpl');

	break;

case 'add-po':
	Event::trigger('pembelian/add-po/');
	_auth1('PO-ADD', $user['id']);
	$clist = '';
	$clist = '<option value="">Pilih Supplier</option>';
	$tg = ORM::for_table('daftar_supplier')->raw_query(
		'SELECT DISTINCT (daftar_supplier.nama_supplier), daftar_supplier.kode_supplier
			FROM (pr_detail
			INNER JOIN daftar_supplier
			ON daftar_supplier.kode_supplier = CONVERT(pr_detail.supplierpilihan USING utf32))
			WHERE pr_detail.status LIKE "PR"')->find_many();
	foreach ($tg as $r) {
		$clist .= '<option value="' . $r['kode_supplier'] . '">' . $r['kode_supplier'] . ' - ' . $r['nama_supplier'] . '</option>';
	}
	$idate = date('d-m-Y');
	$ui->assign('opt_supplier', $clist);
	$ui->assign('idate', $idate);
	$ui->assign('_sysfrm_menu3', 'list-po');
	$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
	$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-po', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
	$ui->display($spath . 'add-po.tpl');
	break;

case 'add-po-post':
	Event::trigger('pembelian/add-po-post/');
	$no_pr = explode(',', _post('no_pr'));
	$kode_item = explode(',', _post('kode_item'));
	$qty_req = explode(',', _post('qty_req'));
	$harga = explode(',', _post('harga'));
	$keterangan = explode(',', _post('keterangan'));
	$supplier = _post('supplier');
	$catatan = _post('catatan');
	$lokasi_pengiriman = _post('lokasi_pengiriman');
	$syarat_pembayaran = _post('syarat_pembayaran');
	$priority = _post('priority');
	$ppn = _post('ppn');
	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$i = 0;
	$ii = 0;
	foreach ($no_pr as $code) {
		if ($kode_item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($qty_req[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	if ($priority == '') {
		$msg .= 'Tingkat Kepentingan belum diisi';
	}

	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$tgl_po = Validator::Date1(_post('idate'));
			$bl = date('n', strtotime($tgl_po));
			$th = date('Y', strtotime($tgl_po));
			$chk = ORM::for_table('po_master')->raw_query('select * from po_master where month(tgl_po)=' . $bl . ' and year(tgl_po)=' . $th . ' order by no_po desc')->find_one();
			if ($chk) {
				$no = ++$chk['no_po'];
			} else {
				$no = 'PO/' . $th . '/' . date('m', strtotime($tgl_po)) . '/0001';
			}
			$i = 0;
			$total = 0;
			$isi = '';
			foreach ($no_pr as $code) {
				$snopr = $no_pr[$i];
				$skodeitem = $kode_item[$i];
				$sqty = str_replace(".", "", $qty_req[$i]);
				$sqty1 = str_replace(".", "", $harga[$i]);
				$sket = $keterangan[$i];
				$y = ORM::for_table('po_detail')->create();
				$y->no_po = $no;
				$y->no_pr = $snopr;
				$y->kode_item = $skodeitem;
				$y->qty_req = $sqty;
				$y->harga = $sqty1;
				$total_temp = (int) $sqty1 * (int) $sqty;
				$y->keterangan = $sket;
				$total += (int) $total_temp;
				$y->save();
				$z = ORM::for_table('pr_detail')->where('no_pr', $snopr)->where('kode_item', $skodeitem)->find_one();
				$z->status = 'PO';
				$z->save();
				$i++;

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $skodeitem)->find_one();
				$isi .= "<b>PURCHASE ORDER ITEM #" . $i . "</b>";
				$isi .= "
							No PR : " . $snopr . " <br>
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($sqty, 0, '', '.') . " <br>
							Harga : " . number_format($sqty1, 0, '', '.') . " <br>
							Keterangan : " . $sket . " <br><br>
					";
			}
			$d = ORM::for_table('po_master')->create();
			$d->no_po = $no;
			$d->tgl_po = $tgl_po;
			$d->kode_supplier = $supplier;
			$d->priority = $priority;
			$d->catatan = $catatan;
			$d->ppn = $ppn;
			$d->lokasi_pengiriman = $lokasi_pengiriman;
			$d->syarat_pembayaran = $syarat_pembayaran;
			$d->total_harga = $total;
			$total_netto = (int) $total + ((int) $total * (int) $ppn / 100);
			$d->total_netto = $total_netto;
			$d->status = 'PENDING';
			$d->dibuat_oleh = $user['id'];
			$d->dibuat_nama = $user['fullname'];
			$d->dibuat_tgl = date('Y-m-d H:i:s');
			$d->save();
			$cid = $d->id();
			$tgl_kerjasama = ORM::for_table('daftar_supplier')->where('kode_supplier', $supplier)->where_null('tgl_mulai_kerjasama')->find_one();
			if ($tgl_kerjasama) {
				$tgl_kerjasama->tgl_mulai_kerjasama = $tgl_po;
				$tgl_kerjasama->save();
			}
			ORM::get_db()->commit();
			_log1('Tambah Data PO : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $supplier)->find_one();
			$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PO')->find_one();
			$to = ['capella.zoom@gmail.com'];
			// $g = ORM::for_table('daftar_approval')->where(array('kode_dept' => $user['kode_dept'], 'setting' => 'po_disetujui'))->find_one();
			$g = ORM::for_table('daftar_approval')->where(array('kode_dept' => 'KEB', 'setting' => 'po_disetujui'))->find_one();
			if ($g) {
				$to = explode('|', $g['approval']);
			}
			$subject = new Template($e['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subj = $subject->output();
			$message = new Template($e['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_po', $no);
			$message->set('tgl_po', $tgl_po);
			$message->set('kepentingan', $priority);
			$message->set('nama_supplier', $s['nama_supplier']);
			$message->set('total_harga', number_format($total, 0, '', '.'));
			$message->set('ppn', $ppn);
			$message->set('total_netto', number_format($total_netto, 0, '', '.'));
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			foreach ($to as $item) {
				Notify_Email::_send($item, $item, $subj, $message_o);
			}
			Event::trigger('pembelian/add-po-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. PO : ' . $no,
				'dataval' => 1);
			echo json_encode($data);
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

case 'edit-po':
	Event::trigger('pembelian/edit-po/');
	_auth1('PO-EDIT', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('po_master')->find_one($cid);
	$g = ORM::for_table('daftar_supplier')->where('kode_supplier', $d['kode_supplier'])->find_one();
	$namasupplier = $g['nama_supplier'];
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('po_detail')->where('no_po', $d['no_po'])->find_many();
		$x = ORM::for_table('pr_detail')->where('status', 'PR')->where('supplierpilihan', $kode)->find_many();
		$clist = '';
		foreach ($e as $item) {
			$y = ORM::for_table('daftar_itemstock')->where('kode_item', $item["kode_item"])->find_one();
			$z = ORM::for_table('pr_master')->where('no_pr', $item["no_pr"])->find_one();
			$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                            <td><a href="' . U . 'pembelian/detail-pr/' . $z['id'] . '" target="_blank">' . $item["no_pr"] . '</a><input type="text" name="no_pr[]" class="no_pr" value="' . $item["no_pr"] . '" style="display:none"></td>
                            <td><a href="#" class="detail-itemstock" value="' . $item["kode_item"] . '">' . $y["nama_item"] . '</a><input type="text" name="kode_item[]" class="kode_item" value="' . $item["kode_item"] . '" style="display:none"></td>
                            <td><input type="text" name="qty_req[]" class="qty_req amount" value=' . $item["qty_req"] . ' readonly></td>
                            <td><input type="text" name="harga[]" class="harga amount" value="' . $item["harga"] . '" readonly></td>
                            <td><input type="text" name="keterangan[]" class="keterangan" value="' . $item["keterangan"] . '"></td>
                ';
		}
		;
		$idate = date('d-m-Y', strtotime($d['tgl_po']));
		$ui->assign('d', $d);
		$ui->assign('e', $e);
		$ui->assign('clist', $clist);
		$ui->assign('_sysfrm_menu3', 'po-pending');
		$ui->assign('idate', $idate);
		$ui->assign('namasupplier', $namasupplier);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-po', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'edit-po.tpl');
	} else {
		r2(U . 'pembelian/list-po', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'edit-po-post':
	Event::trigger('pembelian/edit-po-post/');
	$cid = $routes['3'];
	$no_po = _post('no_po');
	$no_pr = explode(',', _post('no_pr'));
	$kode_item = explode(',', _post('kode_item'));
	$qty_req = explode(',', _post('qty_req'));
	$harga = explode(',', _post('harga'));
	$keterangan = explode(',', _post('keterangan'));
	$catatan = _post('catatan');
	$lokasi_pengiriman = _post('lokasi_pengiriman');
	$syarat_pembayaran = _post('syarat_pembayaran');
	$ppn = _post('ppn');
	$priority = _post('priority');
	$msg = '';
	$msg_item = '';
	$msg_qty = '';
	$i = 0;
	$ii = 0;
	foreach ($no_pr as $code) {
		if ($kode_item[$i] == '') {
			$msg_item = 'Ada detail yang belum memilih Item Stock';
		}

		if ($qty_req[$i] == 0) {
			$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		}

		if ($code != '') {
			$ii++;
		}

		$i++;
	}
	if ($ii > 0) {
		if ($msg_item != '') {
			$msg .= $msg_item . '<br>';
		}

		if ($msg_qty != '') {
			$msg .= $msg_qty . '<br>';
		}

	} else {
		$msg .= 'Belum ada data Request<br>';
	}

	if ($priority == '') {
		$msg .= 'Tingkat Kepentingan tidak boleh kosong';
	}
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$x = ORM::for_table("po_detail")->where('no_po', $no_po)->find_many();
			foreach ($x as $code) {
				$z = ORM::for_table('pr_detail')->where('no_pr', $code['no_pr'])->where('kode_item', $code['kode_item'])->find_one();
				$z->status = 'PR';
				$z->save();
			}
			$y = ORM::for_table("po_detail")->where('no_po', $no_po)->delete_many();
			$total = 0;
			$i = 0;
			foreach ($no_pr as $code) {
				$snopr = $no_pr[$i];
				$skodeitem = $kode_item[$i];
				$sqty = str_replace(".", "", $qty_req[$i]);
				$sqty1 = str_replace(".", "", $harga[$i]);
				$sket = $keterangan[$i];
				$y = ORM::for_table('po_detail')->create();
				$y->no_po = $no_po;
				$y->no_pr = $snopr;
				$y->kode_item = $skodeitem;
				$y->qty_req = $sqty;
				$y->harga = $sqty1;
				$total_temp = (int) $sqty1 * (int) $sqty;
				$y->keterangan = $sket;
				$total += (int) $total_temp;
				$y->save();
				$z = ORM::for_table('pr_detail')->where('no_pr', $snopr)->where('kode_item', $skodeitem)->find_one();
				$z->status = 'PO';
				$z->save();
				$i++;
			}

			$d = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
			$d->diedit_oleh = $user['id'];
			$d->diedit_nama = $user['fullname'];
			$d->diedit_tgl = date('Y-m-d H:i:s');
			$d->catatan = $catatan;
			$d->lokasi_pengiriman = $lokasi_pengiriman;
			$d->syarat_pembayaran = $syarat_pembayaran;
			$d->ppn = $ppn;
			$d->priority = $priority;
			$d->total_harga = $total;
			$total_netto = (int) $total + ((int) $total * (int) $ppn / 100);
			$d->total_netto = $total_netto;
			if ($d['status'] == 'REJECT') {
				$d->status = 'REVISI';
			}
			$d->save();
			$cid = $d->id();
			ORM::get_db()->commit();
			_log('Edit PO :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);
			Event::trigger('pembelian/edit-po-post/_on_finished');
			$data = array(
				'msg' => 'Berhasil Update. No. PO : ' . $no_po,
				'dataval' => 1);
			echo json_encode($data);
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

case 'detail-po':
	Event::trigger('pembelian/detail-po/');
	_auth1('PO-DETAIL', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('po_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('po_detail')->where('no_po', $d['no_po'])->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->find_many();

		$idate = date('d-m-Y', strtotime($d['tgl_po']));
		if ($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
			$ui->assign('_sysfrm_menu2', 'purchase-order');
			$ui->assign('_sysfrm_menu3', 'po-pending');
		} else if ($d['status'] == 'REJECT') {
			$ui->assign('_sysfrm_menu2', 'purchase-order');
			$ui->assign('_sysfrm_menu3', 'po-reject');
		} else if ($d['status'] == 'APPROVE') {
			$ui->assign('_sysfrm_menu2', 'purchase-order');
			$ui->assign('_sysfrm_menu3', 'po-approve');
		}

		$ui->assign('e', $e);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('_sysfrm_menu2', 'purchase-order');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-po', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-po.tpl');
	} else {
		r2(U . 'pembelian/list-po', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'list-po-aprv':
	Event::trigger('pembelian/list-po-aprv/');
	_auth1('PO-APRV', $user['id']);
	$msg = $routes['3'];
	$d = ORM::for_table('po_master')->where('status', 'PENDING')->order_by_desc('no_po')->find_many();
	$e = ORM::for_table('po_master')->where('status', 'REVISI')->order_by_desc('no_po')->find_many();
	$cd = ORM::for_table('po_master')->where('status', 'PENDING')->order_by_desc('no_po')->count();
	$ce = ORM::for_table('po_master')->where('status', 'REVISI')->order_by_desc('no_po')->count();
	$ui->assign('d', $d);
	$ui->assign('e', $e);
	$ui->assign('cd', $cd);
	$ui->assign('ce', $ce);
	$ui->assign('msg', $msg);
	$ui->assign('_sysfrm_menu2', 'purchase-order-approve');
	$ui->assign('xfooter', Asset::js(array($spath . 'list-po')));
	$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
	$ui->display($spath . 'list-po-aprv.tpl');
	break;

case 'detail-po-aprv':
	Event::trigger('pembelian/detail-po/');
	_auth1('PO-DETAIL-APRV', $user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('po_master')->find_one($cid);
	if ($d) {
		$ui->assign('d', $d);
		$ui->assign('cid', $cid);
		$e = ORM::for_table('po_detail')->where('no_po', $d['no_po'])->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->where('active', 'Y')->find_many();
		$idate = date('d-m-Y', strtotime($d['tgl_po']));
		$idates = date('d-m-Y', strtotime($n['tgl_po']));
		$ui->assign('e', $e);
		$ui->assign('tg1', $tg1);
		$ui->assign('tg3', $tg3);
		$ui->assign('idate', $idate);
		$ui->assign('idates', $idates);
		$ui->assign('_sysfrm_menu2', 'purchase-order-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-po-aprv', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'detail-po-aprv.tpl');
	} else {
		r2(U . 'pembelian/list-po-aprv', 'e', 'Pembelian tersebut tidak ditemukan');
	}

	break;

case 'detail-po-approve':
	Event::trigger('pembelian/detail-po-approve/');
	$msg = '';
	$no_po = _post('no_po');
	$pesan = _post('pesan');
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
			$d->disetujui_oleh = $user['id'];
			$d->disetujui_nama = $user['fullname'];
			$d->disetujui_tgl = date('Y-m-d H:i:s');
			$d->pesan = $pesan;
			$d->status = 'APPROVE';
			$d->save();
			$e = ORM::for_table('po_detail')->where('no_po', $no_po)->find_many();
			$i = 1;
			$isi = '';
			foreach ($e as $item) {
				$f = ORM::for_table('pr_detail')->where('no_pr', $item['no_pr'])->where('kode_item', $item['kode_item'])->find_one();
				$f->status = 'DONE';
				$f->save();

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
				$isi .= "<b>PURCHASE ORDER ITEM #" . $i . "</b><br>";
				$isi .= "
							No PR : " . $item['no_pr'] . " <br>
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($item['qty_req'], 0, '', '.') . " <br>
							Harga : " . number_format($item['harga'], 0, '', '.') . " <br>
							Keterangan : " . $item['keterangan'] . " <br><br>
					";
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Approve PO :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $d['kode_supplier'])->find_one();
			$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response PO Approval')->find_one();
			$g = ORM::for_table('sys_users', 'dblogin')->find_one($d['dibuat_oleh']);
			$subject = new Template($f['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subject->set('status', $d['status']);
			$subj = $subject->output();
			$message = new Template($f['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_po', $d['no_po']);
			$message->set('tgl_po', $d['tgl_po']);
			$message->set('kepentingan', $d['priority']);
			$message->set('nama_supplier', $s['nama_supplier']);
			$message->set('total_harga', number_format($d['total_harga'], 0, '', '.'));
			$message->set('ppn', $d['ppn']);
			$message->set('total_netto', number_format($d['total_netto'], 0, '', '.'));
			$message->set('status', $d['status']);
			$message->set('pesan', $d['pesan']);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			Event::trigger('pembelian/po-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Approve. No. PO : ' . $no_po,
				'dataval' => 1);
			echo json_encode($data);
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

case 'detail-po-reject':
	Event::trigger('pembelian/detail-po-reject/');
	$msg = '';
	$no_po = _post('no_po');
	$pesan = _post('pesan');
	if ($msg == '') {
		ORM::get_db()->beginTransaction();
		try {
			$d = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
			$d->disetujui_oleh = $user['id'];
			$d->disetujui_nama = $user['fullname'];
			$d->disetujui_tgl = date('Y-m-d H:i:s');
			$d->pesan = $pesan;
			$d->status = 'REJECT';
			$d->save();
			$e = ORM::for_table('po_detail')->where('no_po', $no_po)->find_many();
			$i = 1;
			$isi = '';
			foreach ($e as $item) {
				$f = ORM::for_table('pr_detail')->where('no_pr', $item['no_pr'])->where('kode_item', $item['kode_item'])->find_one();
				$f->status = 'PR';
				$f->save();

				$r = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
				$isi .= "<b>PURCHASE ORDER ITEM #" . $i . "</b><br>";
				$isi .= "
							No PR : " . $item['no_pr'] . " <br>
							Item : " . $r['nama_item'] . " <br>
							Qty Request : " . number_format($item['qty_req'], 0, '', '.') . " <br>
							Harga : " . number_format($item['harga'], 0, '', '.') . " <br>
							Keterangan : " . $item['keterangan'] . " <br><br>
					";
				$i++;
			}
			$cid = $d->id();
			ORM::get_db()->commit();
			_log1('Reject PO :' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

			$s = ORM::for_table('daftar_supplier')->where('kode_supplier', $d['kode_supplier'])->find_one();
			$f = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Response:Response PO Approval')->find_one();
			$g = ORM::for_table('sys_users', 'dblogin')->find_one($d['dibuat_oleh']);
			$subject = new Template($f['subject']);
			$subject->set('business_name', $config['CompanyName']);
			$subject->set('status', $d['status']);
			$subj = $subject->output();
			$message = new Template($f['message']);
			$message->set('business_name', $config['CompanyName']);
			$message->set('isi', $isi);
			$message->set('no_po', $d['no_po']);
			$message->set('tgl_po', $d['tgl_po']);
			$message->set('kepentingan', $d['priority']);
			$message->set('nama_supplier', $s['nama_supplier']);
			$message->set('total_harga', number_format($d['total_harga'], 0, '', '.'));
			$message->set('ppn', $d['ppn']);
			$message->set('total_netto', number_format($d['total_netto'], 0, '', '.'));
			$message->set('status', $d['status']);
			$message->set('pesan', $d['pesan']);
			$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
			$message_o = $message->output();
			Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			Event::trigger('pembelian/po-aprv/_on_finished');
			$data = array(
				'msg' => 'Berhasil Reject. No. PO : ' . $no_po,
				'dataval' => 1);
			echo json_encode($data);
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

case 'render-inv_item':
	$kode = _post('kode');
	if ($kode != '') {
		if ($kode == 'STOCK') {
			$opt = '<option value="">Pilih Item Stock</option>';
			$y = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
			foreach ($y as $r) {
				$opt .= '<option value="' . $r['kode_item'] . '">' . $r['nama_item'] . '</option>';
			}
			$data = array(
				'opt' => $opt,
				'nama_bagian' => 'STOCK');
			echo json_encode($data);
		} else {
			$z = ORM::for_table('daftar_kategori')->where('kode_kategori', $kode)->find_one();
			$opt = '<option value="">Pilih Item Stock</option>';
			$y = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori', $kode)->find_many();
			foreach ($y as $r) {
				$x = ORM::for_table('daftar_itemstock')->where('kode_item', $r['kode_item'])->where('active', 'Y')->find_one();
				$opt .= '<option value="' . $r['kode_item'] . '">' . $x['nama_item'] . '</option>';
			}
			$data = array(
				'opt' => $opt,
				'nama_bagian' => $z['nama_kategori']);
			echo json_encode($data);
		}
	} else {
		$data = array(
			'opt' => '<option value="">Pilih Item Stock</option>',
			'nama_bagian' => '');
		echo json_encode($data);
	}
	break;

case 'render-itemstock':
	$kode = _post('kode');
	if ($kode != '') {
		$y = ORM::for_table('daftar_itemstock')->where('kode_item', $kode)->find_one();
		if ($y) {
			$data = array(
				'merk' => $y['merk'],
				'tipe' => $y['tipe'],
				'satuan' => $y['satuan'],
				'spesifikasi' => $y['spesifikasi'],
				'nama_item' => $y['nama_item']);
			echo json_encode($data);
		} else {
			$data = array(
				'merk' => '',
				'tipe' => '',
				'satuan' => '',
				'spesifikasi' => '',
				'nama_item' => '');
			echo json_encode($data);
		}
	} else {
		$data = array(
			'merk' => '',
			'tipe' => '',
			'satuan' => '',
			'spesifikasi' => '',
			'nama_item' => '');
		echo json_encode($data);
	}
	break;

case 'render-detail-bagian':
	$kode = _post('kode');
	if ($kode != '') {
		$y = ORM::for_table('daftar_kategori')->where('kode_kategori', $kode)->find_one();
		$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $y['kode_kategori_parent'])->find_one();
		$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $subs['kode_kategori_parent'])->find_one();
		$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $mains['kode_kategori_parent'])->find_one();
		if ($y) {
			$data = array(
				'bagian' => $bagians['nama_kategori'],
				'main' => $mains['nama_kategori'],
				'sub' => $subs['nama_kategori'],
				'line' => $y['nama_kategori']);
			echo json_encode($data);
		} else {
			$data = array(
				'bagian' => '',
				'main' => '',
				'sub' => '',
				'line' => '');
			echo json_encode($data);
		}
	} else {
		$data = array(
			'bagian' => '',
			'main' => '',
			'sub' => '',
			'line' => '');
		echo json_encode($data);
	}
	break;

case 'render-bagian':
	$kode = _post('kode');
	if ($kode != '') {
		if ($kode == 'STOCK') {
			$opt = '<option value="STOCK">STOCK</option>';
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		} else {
			$opt = '<option value="">Pilih Bagian</option>';
			$y = ORM::for_table('daftar_kategori')->where('parent', 'Y')->find_many();
			foreach ($y as $r) {
				$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nama_kategori'] . '</option>';
			}
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		}
	} else {
		$data = array(
			'opt' => '<option value="">Pilih Bagian</option>');
		echo json_encode($data);
	}
	break;

case 'render-main':
	$kode = _post('kode');
	if ($kode != '') {
		if ($kode == 'STOCK') {
			$opt = '<option value="STOCK">STOCK</option>';
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		} else {
			$opt = '<option value="">Pilih Main Data</option>';
			$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
			foreach ($y as $r) {
				$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nama_kategori'] . '</option>';
			}
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		}
	} else {
		$data = array(
			'opt' => '<option value="">Pilih Main Data</option>');
		echo json_encode($data);
	}

	break;

case 'render-sub':

	$kode = _post('kode');
	if ($kode != '') {
		if ($kode == 'STOCK') {
			$opt = '<option value="STOCK">STOCK</option>';
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		} else {
			$opt = '<option value="">Pilih Sub Data</option>';
			$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
			foreach ($y as $r) {
				$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nama_kategori'] . '</option>';
			}
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		}
	} else {
		$data = array(
			'opt' => '<option value="">Pilih Sub Data</option>');
		echo json_encode($data);
	}

	break;

case 'render-line':
	$kode = _post('kode');
	if ($kode != '') {
		if ($kode == 'STOCK') {
			$opt = '<option value="STOCK">STOCK</option>';
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		} else {

			$opt = '<option value="">Pilih Line Data</option>';
			$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
			foreach ($y as $r) {
				$opt .= '<option value="' . $r['kode_kategori'] . '">' . $r['nama_kategori'] . '</option>';
			}
			$data = array(
				'opt' => $opt);
			echo json_encode($data);
		}
	} else {
		$data = array(
			'opt' => '<option value="">Pilih Line Data</option>');
		echo json_encode($data);
	}
	break;

case 'render-po-supplier':
	$kode = _post('kode');
	if ($kode != '') {
		$x = ORM::for_table('pr_detail')->where('status', 'PR')->where('supplierpilihan', $kode)->find_many();
		$clist = '';
		foreach ($x as $item) {
			$y = ORM::for_table('daftar_itemstock')->where('kode_item', $item["kode_item"])->find_one();
			$z = ORM::for_table('pr_master')->where('no_pr', $item["no_pr"])->find_one();
			$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                            <td><a href="' . U . 'pembelian/detail-pr/' . $z['id'] . '" target="_blank">' . $item["no_pr"] . '</a><input type="text" name="no_pr[]" class="no_pr" value="' . $item["no_pr"] . '" style="display:none"></td>
                            <td><a href="#" class="detail-itemstock" value="' . $item["kode_item"] . '">' . $y["nama_item"] . '</a><input type="text" name="kode_item[]" class="kode_item" value="' . $item["kode_item"] . '" style="display:none"></td>
                            <td><input type="text" name="qty_req[]" class="qty_req amount" value=' . $item["qty_req"] . ' readonly></td>
                            <td><input type="text" name="harga[]" class="harga amount" value="' . $item["hargapilihan"] . '" readonly></td>
                            <td><input type="text" name="keterangan[]" class="keterangan"></td>
                ';
		}
		;
		$data = array(
			'clist' => $clist);
		echo json_encode($data);
	} else {
		$data = array(
			'clist' => '<option value="">Pilih Item Stock</option>');
		echo json_encode($data);
	}
	break;

case 'render-po-suppliers':
	$kode = _post('kode');
	$no_po = _post('no_po');
	if ($kode != '') {
		$clist = '';
		$d = ORM::for_table('po_detail')->where('no_po', $no_po)->find_many();
		foreach ($d as $item) {
			$e = ORM::for_table('daftar_itemstock')->where('kode_item', $item["kode_item"])->find_one();
			$z = ORM::for_table('po_master')->where('no_po', $item["no_po"])->find_one();
			$n = ORM::for_table('pr_master')->where('no_pr', $item["no_pr"])->find_one();
			$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                            <td><a href="' . U . 'pembelian/detail-pr/' . $n['id'] . '" target="_blank">' . $item["no_pr"] . '</a><input type="text" name="no_pr[]" class="no_pr" value="' . $item["no_pr"] . '" style="display:none"></td>
                            <td><a href="#" class="detail-itemstock" value="' . $item["kode_item"] . '">' . $e["nama_item"] . '</a><input type="text" name="kode_item[]" class="kode_item" value="' . $item["kode_item"] . '" style="display:none"></td>
                            <td><input type="text" name="qty_req[]" class="qty_req amount" value=' . $item["qty_req"] . ' readonly></td>
                            <td><input type="text" name="harga[]" class="harga amount" value="' . $item["harga"] . '" readonly></td>
                            <td><input type="text" name="keterangan[]" class="keterangan"></td>
                ';
		}
		$x = ORM::for_table('pr_detail')->where('status', 'PR')->where('supplierpilihan', $kode)->find_many();
		foreach ($x as $item) {
			$y = ORM::for_table('daftar_itemstock')->where('kode_item', $item["kode_item"])->find_one();
			$z = ORM::for_table('pr_master')->where('no_pr', $item["no_pr"])->find_one();
			$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                            <td><a href="' . U . 'pembelian/detail-pr/' . $z['id'] . '" target="_blank">' . $item["no_pr"] . '</a><input type="text" name="no_pr[]" class="no_pr" value="' . $item["no_pr"] . '" style="display:none"></td>
                            <td><a href="#" class="detail-itemstock" value="' . $item["kode_item"] . '">' . $y["nama_item"] . '</a><input type="text" name="kode_item[]" class="kode_item" value="' . $item["kode_item"] . '" style="display:none"></td>
                            <td><input type="text" name="qty_req[]" class="qty_req amount" value=' . $item["qty_req"] . ' readonly></td>
                            <td><input type="text" name="harga[]" class="harga amount" value="' . $item["hargapilihan"] . '" readonly></td>
                            <td><input type="text" name="keterangan[]" class="keterangan"></td>
                ';
		}
		;
		$data = array(
			'clist' => $clist);
		echo json_encode($data);
	} else {
		$data = array(
			'clist' => '<option value="">Pilih Item Stock</option>');
		echo json_encode($data);
	}
	break;

case 'render-kd_supplier':
	$kode = _post('kode');
	if ($kode != '') {
		$opt = '<option value="">Pilih Supplier</option>';
		$y = ORM::for_table('daftar_itemstock_supplier')->where(array(
			'kd_item' => $kode,
			'status' => 'aktif',
		))->find_many();
		foreach ($y as $r) {
			$opt .= '<option value="' . $r['kd_supplier'] . '">' . $r['kd_supplier'] . '</option>';
		}
		$data = array(
			'opt' => $opt);
		echo json_encode($data);
	} else {
		$data = array(
			'opt' => '<option value="">Pilih Supplier</option>');
		echo json_encode($data);
	}

	break;

case 'render-status-pending':
	$kode = _post('kode');
	if ($kode != '') {
		$y = ORM::for_table('pr_master')->find_one($kode);
		if ($y) {
			$data = array(
				'diperiksa_nama' => $y['diperiksa_nama'],
				'diperiksa_tgl' => $y['diperiksa_tgl'],
				'diketahui_nama' => $y['diketahui_nama'],
				'diketahui_tgl' => $y['diketahui_tgl'],
				'disetujui_nama' => $y['disetujui_nama'],
				'disetujui_tgl' => $y['disetujui_tgl'],
				'sup_disetujui_nama' => $y['sup_disetujui_nama'],
				'sup_disetujui_tgl' => $y['sup_disetujui_tgl'],
				'pesan' => $y['pesan'],
				'no_pr' => $y['no_pr']);
			echo json_encode($data);
		} else {
			$data = array(
				'diperiksa_nama' => '',
				'diperiksa_tgl' => '',
				'diketahui_nama' => '',
				'diketahui_tgl' => '',
				'disetujui_nama' => '',
				'disetujui_tgl' => '',
				'sup_disetujui_nama' => '',
				'sup_disetujui_tgl' => '',
				'pesan' => '',
				'no_pr' => '');
			echo json_encode($data);
		}
	} else {
		$data = array(
			'diperiksa_nama' => '',
			'diperiksa_tgl' => '',
			'diketahui_nama' => '',
			'diketahui_tgl' => '',
			'disetujui_nama' => '',
			'disetujui_tgl' => '',
			'sup_disetujui_nama' => '',
			'sup_disetujui_tgl' => '',
			'pesan' => '',
			'no_pr' => '');
		echo json_encode($data);
	}
	break;

case 'render-status-spmk-pending':
	$kode = _post('kode');
	if ($kode != '') {
		$y = ORM::for_table('spmk_master')->find_one($kode);
		if ($y) {
			$data = array(
				'diperiksa_nama' => $y['diperiksa_nama'],
				'diperiksa_tgl' => $y['diperiksa_tgl'],
				'diketahui_nama' => $y['diketahui_nama'],
				'diketahui_tgl' => $y['diketahui_tgl'],
				'disetujui_nama' => $y['disetujui_nama'],
				'disetujui_tgl' => $y['disetujui_tgl'],
				'disurvey_nama' => $y['disurvey_nama'],
				'disurvey_tgl' => $y['disurvey_tgl'],
				'ktr_disetujui_nama' => $y['ktr_disetujui_nama'],
				'ktr_disetujui_tgl' => $y['ktr_disetujui_tgl'],
				'pesan' => $y['pesan'],
				'no_spmk' => $y['no_spmk']);
			echo json_encode($data);
		} else {
			$data = array(
				'diperiksa_nama' => '',
				'diperiksa_tgl' => '',
				'diketahui_nama' => '',
				'diketahui_tgl' => '',
				'disetujui_nama' => '',
				'disetujui_tgl' => '',
				'disurvey_nama' => '',
				'disurvey_tgl' => '',
				'ktr_disetujui_nama' => '',
				'ktr_disetujui_tgl' => '',
				'pesan' => '',
				'no_spmk' => '');
			echo json_encode($data);
		}
	} else {
		$data = array(
			'diperiksa_nama' => '',
			'diperiksa_tgl' => '',
			'diketahui_nama' => '',
			'diketahui_tgl' => '',
			'disetujui_nama' => '',
			'disetujui_tgl' => '',
			'disurvey_nama' => '',
			'disurvey_tgl' => '',
			'ktr_disetujui_nama' => '',
			'ktr_disetujui_tgl' => '',
			'pesan' => '',
			'no_spmk' => '');
		echo json_encode($data);
	}
	break;


case 'render-status-spmk-bidding':
	$kode = _post('kode');
	if ($kode != '') {
		$y = ORM::for_table('spmk_master')->find_one($kode);
		if ($y) {
			$data = array(
				'ktr_disetujui_nama' => $y['ktr_disetujui_nama'],
				'ktr_disetujui_tgl' => $y['ktr_disetujui_tgl'],
				'ktr_disetujui_dir_nama' => $y['ktr_disetujui_dir_nama'],
				'ktr_disetujui_dir_tgl' => $y['ktr_disetujui_dir_tgl'],
				'pesan' => $y['pesan'],
				'no_spmk' => $y['no_spmk']);
			echo json_encode($data);
		} else {
			$data = array(
				'ktr_disetujui_nama' => '',
				'ktr_disetujui_tgl' => '',
				'ktr_disetujui_dir_nama' => '',
				'ktr_disetujui_dir_tgl' => '',
				'pesan' => '',
				'no_spmk' => '');
			echo json_encode($data);
		}
	} else {
		$data = array(
			'diperiksa_nama' => '',
			'diperiksa_tgl' => '',
			'diketahui_nama' => '',
			'diketahui_tgl' => '',
			'disetujui_nama' => '',
			'disetujui_tgl' => '',
			'disurvey_nama' => '',
			'disurvey_tgl' => '',
			'ktr_disetujui_nama' => '',
			'ktr_disetujui_tgl' => '',
			'pesan' => '',
			'no_spmk' => '');
		echo json_encode($data);
	}
	break;
case 'render-spnk-kontraktor':
	$kode = _post('kode');
	if ($kode != '') {
		$x = ORM::for_table('spmk_detail')->where('status', 'SPMK')->where('kontraktorpilihan', $kode)->find_many();
		$clist = '';
		foreach ($x as $item) {
			// $y = ORM::for_table('daftar_itemstock')->where('kode_item', $item["kode_item"])->find_one();
			// $z = ORM::for_table('pr_master')->where('no_pr', $item["no_pr"])->find_one();
			$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
														<td><a href="' . U . 'pembelian/detail-spmk/' . $item['id'] . '" target="_blank">' . $item["no_spmk"] . '</a><input type="text" name="no_spmk[]" class="no_spmk" value="' . $item["no_spmk"] . '" style="display:none"></td>
														<td><a href="#" class="detail-itemstock" value="' . $item["divisi"] . '">' . $item["divisi"] . '</a><input type="text" name="kode_item[]" class="kode_item" value="' . $item["kode_item"] . '" style="display:none"></td>
														<td><input type="text" name="qty_req[]" class="qty_req amount" value=' . $item["qty_req"] . ' readonly></td>
														<td><input type="text" name="harga[]" class="harga amount" value="' . $item["hargapilihan"] . '" readonly></td>
														<td><input type="text" name="keterangan[]" class="keterangan"></td>
								';
		}
		;
		$data = array(
			'clist' => $clist);
		echo json_encode($data);
	} else {
		$data = array(
			'clist' => '<option value="">Pilih Item Stock</option>');
		echo json_encode($data);
	}
	break;

case 'upload-file':
	if (isset($_FILES['file']['name'])) {
		$filename = $_FILES['file']['name'];
		$timestamp = time();
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$name = basename($filename, "." . $extension);
		$extension = strtolower($extension);
		$allowed_extensions = array("jpg", "jpeg", "png", "pdf", "xlsx", "xls");
		$response = array();
		$status = -1;
		if (in_array(strtolower($extension), $allowed_extensions)) {
			$new_filename = $name . '-' . $timestamp . '.' . $extension;
			$location = "uploads/KEBUN/" . $new_filename;
			if (file_exists($location)) {
				$status = 2;
			} else {
				if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
					$status = 1;
					$response['path'] = $location;
					$response['extension'] = $extension;
				}
			}
		}
		$response['status'] = $status;
		$response['filename'] = $new_filename;
		echo json_encode($response);
		exit;
	}
	echo 0;
	break;

default:
	echo 'action not defined';
}