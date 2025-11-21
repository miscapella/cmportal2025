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
	$myCtrl = 'permintaan';
}
_auth();
$ui->assign('_sysfrm_menu', 'Permintaan');
$ui->assign('_title', 'Permintaan - ' . $config['CompanyName']);
$ui->assign('_st', 'Permintaan');
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
	case 'add-pr':
		Event::trigger('permintaan/add-pr/');
		_auth1('ADD-PR', $user['id']);

		$urlist = '<option value="">Pilih UR</option>';
		$d = ORM::for_table('mintabarang_master')->where('approval', 'APPROVED')->where_raw('sisa > 0')->order_by_desc('id')->find_many();
		foreach ($d as $data) {
			$urlist .= '<option value="' . $data['no_mintabarang'] . '">' . $data['no_mintabarang'] . ' - ' . $data['dibuat_nama'] . '</option>';
		}

		$dir_list = '<option value="">Pilih Direksi</option>';
		$dir = ORM::for_table('sys_users', 'dblogin')->where('kode_dept', 'DIR')->find_many();
		foreach ($dir as $direksi) {
			$dir_list .= '<option value="' . $direksi['username'] . '">' . $direksi['fullname'] . '</option>';
		}

		$clist = '';
		$clist = '<option value="">Pilih Keperluan</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="PENGADAAN BARU">PENGADAAN BARU</option>';
		$clist .= '<option value="PERGANTIAN">PERGANTIAN</option>';

		$idate = date('d-m-Y');
		$ui->assign('clist', $clist);
		$ui->assign('urlist', $urlist);
		$ui->assign('dirlist', $dir_list);
		$ui->assign('idate', $idate);
		$ui->assign('_sysfrm_menu1', 'Buat PR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-pr', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->display($spath . 'add-pr.tpl');
		break;

	case 'add-pr-post':
		Event::trigger('permintaan/add-pr-post/');
		_auth1('ADD-PR', $user['id']);

		$id = explode(',', _post('id'));
		$max = explode(',', _post('max'));
		$kd_inventaris = explode(',', _post('kd_inventaris'));
		$kd_item = explode(',', _post('kd_item'));
		$qty_req = explode(',', _post('qty_req'));
		$tgl = explode(',', _post('tgl'));
		$keterangan = explode(',', _post('keterangan'));
		$supplier1 = explode(',', _post('supplier1'));
		$exclude_ppn1 = explode(',',_post('exclude_ppn1'));
		$ppn1 = explode(',',_post('ppn1'));
		$hargasupplier1 = explode(',', _post('hargasupplier1'));
		$harga_ppn1 = explode(',',_post('harga_ppn1'));
		$keterangansupplier1 = explode(',', _post('keterangansupplier1'));
		$filesupplier1 = explode(',', _post('filesupplier1'));
		$garansi_bulan_supplier1 = explode(',', _post('garansi_bulan_supplier1'));
		$garansi_hari_supplier1 = explode(',', _post('garansi_hari_supplier1'));
		$supplier2 = explode(',', _post('supplier2'));
		$exclude_ppn2 = explode(',',_post('exclude_ppn2'));
		$ppn2 = explode(',',_post('ppn2'));
		$hargasupplier2 = explode(',', _post('hargasupplier2'));
		$harga_ppn2 = explode(',',_post('harga_ppn2'));
		$keterangansupplier2 = explode(',', _post('keterangansupplier2'));
		$garansi_bulan_supplier2 = explode(',', _post('garansi_bulan_supplier2'));
		$garansi_hari_supplier2 = explode(',', _post('garansi_hari_supplier2'));
		$filesupplier2 = explode(',', _post('filesupplier2'));
		$supplier3 = explode(',', _post('supplier3'));
		$exclude_ppn3 = explode(',',_post('exclude_ppn3'));
		$ppn3 = explode(',',_post('ppn3'));
		$hargasupplier3 = explode(',', _post('hargasupplier3'));
		$harga_ppn3 = explode(',',_post('harga_ppn3'));
		$keterangansupplier3 = explode(',', _post('keterangansupplier3'));
		$filesupplier3 = explode(',', _post('filesupplier3'));
		$garansi_bulan_supplier3 = explode(',', _post('garansi_bulan_supplier3'));
		$garansi_hari_supplier3 = explode(',', _post('garansi_hari_supplier3'));
		$supplierpilihan = explode(',', _post('supplierpilihan'));
		$list_ur = explode(',', _post('list_ur'));
		$dir_pilihan = _post('dir_pilihan');

		$approve_key = generateRandomString(24);
		$reject_key = generateRandomString(24);
		$comment_key = generateRandomString(24);

		$tahap = 2;
		$l = ORM::for_table('daftar_itemstock')->where('kategori', 'IT')->find_many();
		$b = ORM::for_table('daftar_itemstock')->where('kategori', 'Service')->find_many();

		$it_items = [];
		foreach ($l as $item) {
			array_push($it_items, $item['kd_item']);
		}

		$service_items = [];
		foreach ($b as $item) {
			array_push($service_items, $item['kd_item']);
		}

		$total = 0;

		for ($i = 0; $i < count($id); $i++) {
			$temp_msg = '';
			$maxi = intval($max[$i]);
			$harga1 = intval(str_replace(".", "", $hargasupplier1[$i]));
			$harga2 = intval(str_replace(".", "", $hargasupplier2[$i]));
			$harga3 = intval(str_replace(".", "", $hargasupplier3[$i]));
			$harga_ppn1 = intval(str_replace(".","",$harga_ppn1[$i]));
			$harga_ppn2 = intval(str_replace(".","",$harga_ppn2[$i]));
			$harga_ppn3 = intval(str_replace(".","",$harga_ppn3[$i]));
			if ($kd_inventaris[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' : Keperluan tidak boleh kosong <br>';
			if ($kd_item[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' : Item Stock tidak boleh kosong <br>';
			if ($qty_req[$i] == 0 || $qty_req[$i] < 0) $temp_msg .= 'PR ' . strval($i + 1) . ' : Qty Req tidak boleh kosong <br>';
			else if ($maxi <> 0 && $qty_req[$i] > $maxi) $temp_msg .= 'PR ' . strval($i + 1) . ' : Qty Req melebihi permintaan user (' . $maxi . ') <br>';
			if ($tgl[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' : Tgl Diperlukan tidak boleh kosong <br>';
			if (!$supplierpilihan[$i]) $temp_msg .= 'PR ' . strval($i + 1) . ' : Supplier wajib dipilih <br>';

			if ($supplier1[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : Supplier tidak boleh kosong <br>';
			if ($harga1 == 0) $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : Harga tidak boleh kosong <br>';
			if ($keterangansupplier1[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : Keterangan tidak boleh kosong <br>';
			if ($filesupplier1[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : File tidak boleh kosong <br>';
			if (!$exclude_ppn1 && $ppn1 == 0) $msg .= 'Ppn Supplier 1 wajib diisi <br>';


			if ($supplier2[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : Supplier tidak boleh kosong <br>';
			if ($harga2 == 0) $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : Harga tidak boleh kosong <br>';
			if ($keterangansupplier2[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : Keterangan tidak boleh kosong <br>';
			if ($filesupplier2[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : File tidak boleh kosong <br>';
			if (!$exclude_ppn2 && $ppn2 == 0) $msg .= 'Ppn Supplier 2 wajib diisi <br>';


			if ($supplier3[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : Supplier tidak boleh kosong <br>';
			if ($harga3 == 0) $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : Harga tidak boleh kosong <br>';
			if ($keterangansupplier3[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : Keterangan tidak boleh kosong <br>';
			if ($filesupplier3[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : File tidak boleh kosong <br>';
			if (!$exclude_ppn3 && $ppn3 == 0) $msg .= 'Ppn Supplier 3 wajib diisi <br>';


			if ($temp_msg <> '') $msg .= $temp_msg . ($i == count($id) - 1 ? '' : '<br>');

			$temp_harga = [$harga1, $harga2, $harga3];
			$temp_pilihan_netto = [$harga_ppn1,$harga_ppn2,$harga_ppn3];
			$total += intval($temp_harga[$supplierpilihan[$i] - 1]) * intval($qty_req[$i]);
			$total_net += intval($temp_pilihan_netto[$supplierpilihan[$i]-1]);
			if (in_array($kd_item[$i], $it_items)) $tahap = 1;
			if (in_array($kd_item[$i], $service_items)) $tahap = 6;
		}

		if ($total >= 2000000 && $dir_pilihan == '') $msg = $msg ? 'Direksi Approval wajib dipilih <br><br>' . $msg : 'Direksi Approval wajib dipilih';

		if ($msg == '') {

			ORM::get_db()->beginTransaction();
			try {
				$tgl_pr = Validator::Date1(_post('idate'));
				$bl = date('n', strtotime($tgl_pr));
				$th = date('Y', strtotime($tgl_pr));
				$kode_cabang = $user['kode_cabang'];
				// $chk = ORM::for_table('pr_master')->raw_query('select * from pr_master where month(tgl_pr)=' . $bl . ' and year(tgl_pr)=' . $th . ' and kode_cabang=' . $kode_cabang . ' order by no_pr desc')->find_one();
				$chk = ORM::for_table('pr_master')
					->raw_query('select * from pr_master where month(tgl_pr) = ? and year(tgl_pr) = ? and kode_cabang = ? order by no_pr desc', [$bl, $th, $kode_cabang])
					->find_one();
				if ($chk) {
					$no = ++$chk['no_pr'];
				} else {
					$no = 'PR-' . $kode_cabang . '/' . $th . '/' . date('m', strtotime($tgl_pr)) . '/0001';
				}

				// PR-NNN/2024/10/nomor

				$d = ORM::for_table('pr_master')->create();
				
				$d->no_pr = $no;
				$d->tgl_pr = $tgl_pr;
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');
				$d->tahap = $tahap;
				$d->total_harga = $total;
				$d->dir_pilihan = $dir_pilihan;
				$d->kode_cabang = $user['kode_cabang'];
				$d->status = 'PENDING';
				$d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;

				$total_netto = 0;

				$i = 0;
				foreach ($kd_inventaris as $code) {
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					// $sqty1 = str_replace(".", "", $qty_stock[$i]);
					$sket = $keterangan[$i];
					$stgl = $tgl[$i];
					
					$ssupplier1 = $supplier1[$i];
					$sexclude_ppn1 = $exclude_ppn1[$i];
					$sppn1 = $ppn1[$i];
					$shargasupplier1 = $hargasupplier1[$i];
					$sharga_ppn1 = $harga_ppn1[$i];
					$sketerangansupplier1 = $keterangansupplier1[$i];
					$sfilesupplier1 = $filesupplier1[$i];
					$sgaransi_bulan_supplier1 = $garansi_bulan_supplier1[$i];
					$sgaransi_hari_supplier1 = $garansi_hari_supplier1[$i];
					$ssupplier2 = $supplier2[$i];
					$sexclude_ppn2 = $exclude_ppn2[$i];
					$sppn2 = $ppn2[$i];
					$shargasupplier2 = $hargasupplier2[$i];
					$sharga_ppn2 = $harga_ppn2[$i];
					$sketerangansupplier2 = $keterangansupplier2[$i];
					$sfilesupplier2 = $filesupplier2[$i];
					$sgaransi_bulan_supplier2 = $garansi_bulan_supplier2[$i];
					$sgaransi_hari_supplier2 = $garansi_hari_supplier2[$i];
					$ssupplier3 = $supplier3[$i];
					$sexclude_ppn3 = $exclude_ppn3[$i];
					$sppn3 = $ppn3[$i];
					$shargasupplier3 = $hargasupplier3[$i];
					$sharga_ppn3 = $harga_ppn3[$i];
					$sketerangansupplier3 = $keterangansupplier3[$i];
					$sfilesupplier3 = $filesupplier3[$i];
					$sgaransi_bulan_supplier3 = $garansi_bulan_supplier3[$i];
					$sgaransi_hari_supplier3 = $garansi_hari_supplier3[$i];
					$ssupplierpilihan = $supplierpilihan[$i];

					$y = ORM::for_table('pr_detail')->create();
					$y->no_pr = $no;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->sisa = $sqty;
					$y->status = 'PENDING';
					if (Validator::Date1($stgl) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($stgl));
					else
						$y->tgl_diperlukan = null;
					$y->keperluan = $code;
					$y->keterangan = $sket;
					$y->kd_supplier1 = $ssupplier1;
					$y->exclude_ppn1 = $sexclude_ppn1 == 'false' ? 0 : 1;
					if ($sexclude_ppn1 == 'false') {
						$y->ppn1 = $sppn1;
						$y->harga_ppn1 = str_replace(".", "", $shargasupplier1) + str_replace(".", "", $shargasupplier1) * ($sppn1 / 100); 
						$harga_netto1 = str_replace(".", "", $shargasupplier1) + str_replace(".", "", $shargasupplier1) * ($sppn1 / 100); 
					} else {
						$y->harga_ppn1 = str_replace(".", "", $shargasupplier1); 
						$harga_netto1 = str_replace(".", "", $shargasupplier1); 
					}
					$y->harga1 = str_replace(".", "", $shargasupplier1); 
					$y->keterangan_supplier1 = $sketerangansupplier1;
					$y->file_supplier1 = $sfilesupplier1;
					$y->garansi_bulan_supplier1 = $sgaransi_bulan_supplier1;
					$y->garansi_hari_supplier1 = $sgaransi_hari_supplier1;
					$y->kd_supplier2 = $ssupplier2;
					$y->exclude_ppn2 = $sexclude_ppn2 == 'false' ? 0 : 1;
					if ($sexclude_ppn2 == 'false') {
						$y->ppn2 = $sppn2;
						$y->harga_ppn2 = str_replace(".", "", $shargasupplier2) + str_replace(".", "", $shargasupplier2) * ($sppn2 / 100); 
						$harga_netto2 = str_replace(".", "", $shargasupplier2) + str_replace(".", "", $shargasupplier2) * ($sppn2 / 100); 
					} else {
						$harga_netto2 = str_replace(".", "", $shargasupplier2); 
					}
					$y->harga2 = str_replace(".", "", $shargasupplier2);
					$y->keterangan_supplier2 = $sketerangansupplier2;
					$y->file_supplier2 = $sfilesupplier2;
					$y->garansi_bulan_supplier2 = $sgaransi_bulan_supplier2;
					$y->garansi_hari_supplier2 = $sgaransi_hari_supplier2;
					$y->kd_supplier3 = $ssupplier3;
					$y->exclude_ppn3 = $sexclude_ppn3 == 'false' ? 0 : 1;
					if ($sexclude_ppn3 == 'false') {
						$y->ppn3 = $sppn3;
						$y->harga_ppn3 = str_replace(".", "", $shargasupplier3) + str_replace(".", "", $shargasupplier3) * ($sppn3 / 100); 
						$harga_netto3 = str_replace(".", "", $shargasupplier3) + str_replace(".", "", $shargasupplier3) * ($sppn3 / 100); 
					} else {
						$y->harga_ppn3 = str_replace(".", "", $shargasupplier3); 
						$harga_netto3 = str_replace(".", "", $shargasupplier3); 
					}
					$y->harga3 = str_replace(".", "", $shargasupplier3);
					$y->keterangan_supplier3 = $sketerangansupplier3;
					$y->file_supplier3 = $sfilesupplier3;
					$y->garansi_bulan_supplier3 = $sgaransi_bulan_supplier3;
					$y->garansi_hari_supplier3 = $sgaransi_hari_supplier3;
					$y->supplierpilihan = $ssupplierpilihan;
					$y->hargapilihan = str_replace(".", "", [$shargasupplier1, $shargasupplier2, $shargasupplier3][$ssupplierpilihan - 1]);
					$y->harga_pilihan_netto = [$harga_netto1, $harga_netto2, $harga_netto3][$ssupplierpilihan-1];
					$total_netto += [$harga_netto1, $harga_netto2, $harga_netto3][$ssupplierpilihan-1];
					$y->save();
					
					$i++;
				}

				$d->total_harga_netto = $total_netto;
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Data PR : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

				$isi = '';
				$sql = "
					SELECT a.*, b.kategori, b.nm_item, c.nama_supplier
					FROM pr_detail a
					LEFT JOIN daftar_itemstock b ON a.kd_item = b.kd_item
					LEFT JOIN daftar_supplier c ON c.kode_supplier =
						CASE a.supplierpilihan
							WHEN 1 THEN a.kd_supplier1
							WHEN 2 THEN a.kd_supplier2
							WHEN 3 THEN a.kd_supplier3
						END
					WHERE a.no_pr = :no_pr
				";

				$pr_detail = ORM::for_table('pr_detail')->raw_query($sql, array('no_pr' => $no))->find_many();

				foreach ($pr_detail as $index => $detail) {
					$kd_supplier = [$detail['kd_supplier1'], $detail['kd_supplier2'], $detail['kd_supplier3']];
					$daftar_harga = [$detail['harga1'], $detail['harga2'], $detail['harga3']];
					$harga = 'Rp ' . number_format($daftar_harga[$detail['supplierpilihan'] - 1], 0, '', '.');
					$keterangan_supplier = [$detail['keterangan_supplier1'], $detail['keterangan_supplier2'], $detail['keterangan_supplier3']];
					$garansi_bulan_supplier = [$detail['garansi_bulan_supplier1'], $detail['garansi_bulan_supplier2'], $detail['garansi_bulan_supplier3']];
					$garansi_hari_supplier = [$detail['garansi_hari_supplier1'], $detail['garansi_hari_supplier2'], $detail['garansi_hari_supplier3']];

					$isi .= '<b>PURCHASE REQUISITION ITEM #' . strval($index + 1) . '</b> <br>
							Keperluan : ' . $detail['keperluan'] . ' <br>
							Kategori : ' . $detail['kategori'] . ' <br>
							Item : ' . $detail['nm_item'] . ' <br>
							Qty Request : ' . strval($detail['qty_req']) . ' <br>
							Tanggal Diperlukan : ' . date('Y-m-d', strtotime($detail['tgl_diperlukan'])) . ' <br>
							Keterangan : ' . $detail['keterangan'] . ' <br>
							<b>Pilihan Supplier</b><br>
							Kode Supplier : ' . $kd_supplier[$detail['supplierpilihan'] - 1] . '<br>
							Nama Supplier : ' . $detail['nama_supplier'] . '<br>
							Harga : ' . $harga . '<br>
							Keterangan Supplier : ' . $keterangan_supplier[$detail['supplierpilihan'] - 1] . '<br><br>
					';
				}

				if ($tahap == 1) {
					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PR GAS')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'EDP')->find_one();
					if ($g) $to = $g['atasan'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_pr', $no);
					$message->set('tgl_pr', $tgl_pr);
					$message->set('total_harga', $total);
					$message->set('isi', $isi);
					$linkcomment = APP_URL . '/?ng=gas-api/comment-pr/' . $cid . '/token_' . $comment_key;
					$linkapprove = APP_URL . '/?ng=gas-api/approve-pr/' . $cid . '/token_' . $approve_key;
					$linkreject = APP_URL . '/?ng=gas-api/reject-pr/' . $cid . '/token_' . $reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to, $to, $subj, $message_o);
				} else {
					$e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Approval:Approval PR GAS')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_approval')->where('setting', 'GA_SPV')->find_one();
					if ($g) $to = $g['approval'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_pr', $no);
					$message->set('tgl_pr', $tgl_pr);
					$message->set('total_harga', $total);
					$message->set('isi', $isi);
					$linkcomment = APP_URL . '/?ng=gas-api/comment-pr/' . $cid . '/token_' . $comment_key;
					$linkapprove = APP_URL . '/?ng=gas-api/approve-pr/' . $cid . '/token_' . $approve_key;
					$linkreject = APP_URL . '/?ng=gas-api/reject-pr/' . $cid . '/token_' . $reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to, $to, $subj, $message_o);
				}

				Event::trigger('permintaan/add-pr-post/_on_finished');
				$data = array(
					'msg'			=>  'Berhasil Membuat PR <br> No. PR : ' . $no,
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

	case 'list-pr':
		Event::trigger('permintaan/list-pr/');
		_auth1('SHOW-PR', $user['id']);

		$msg = $routes['3'];
		$ui->assign('msg', $msg);
		$ui->assign('_sysfrm_menu1', 'List PR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-pr1', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\'; ');
		$ui->display($spath . 'list-pr1.tpl');
		break;

	case 'render-status-pr':
		$kode = _post('kode');
		if (!empty($kode)) {
			$y = ORM::for_table('pr_master')->where('no_pr', $kode)->find_one();
			if ($y) {
				$data = array(
					'aprv_it_nama' => $y['aprv_it_nama'],
					'aprv_it_tgl' => $y['aprv_it_tgl'],
					'aprv_ga_spv_nama'=> $y['aprv_ga_spv_nama'],
					'aprv_ga_spv_tgl'=> $y['aprv_ga_spv_tgl'],
					'aprv_ga_head_nama'=> $y['aprv_ga_head_nama'],
					'aprv_ga_head_tgl'=>$y['aprv_ga_head_tgl'],
					'aprv_mktsrv_nama'=>$y['aprv_mktsrv_nama'],
					'aprv_mktsrv_tgl'=>$y['aprv_mktsrv_tgl'],
					'aprv_dir_nama'=>$y['aprv_dir_nama'],
					'aprv_dir_tgl'=>$y['aprv_dir_tgl'],
					'no_pr'=>$y['no_pr']
				);
				echo json_encode($data);
			} else {
				// Mengembalikan array kosong jika tidak ada data
				echo json_encode(array(
					'aprv_it_nama' => '',
					'aprv_it_tgl' => '',
					'aprv_ga_spv_nama' => '',
					'aprv_ga_spv_tgl' => '',
					'aprv_ga_head_nama'=>'',
					'aprv_ga_head_tgl'=>'',
					'aprv_mktsrv_nama' => '',
					'aprv_mktsrv_tgl' => '',
					'aprv_dir_nama' => '' ,
					'aprv_dir_tgl'=>'',
					'no_pr'=>''
					// Tambahkan ini untuk konsistensi
					// 'pesan' => ''
				));
			}
			} else {
				// Jika kode kosong, kembalikan array kosong
				echo json_encode(array(
					'aprv_it_nama' => '',
					'aprv_it_tgl' => '',
					'aprv_ga_spv_nama' => '',
					'aprv_ga_spv_tgl' => '',
					'aprv_ga_head_nama'=>'',
					'aprv_ga_head_tgl'=>'',
					'aprv_mktsrv_nama' => '',
					'aprv_mktsrv_tgl' => '',
					'aprv_dir_nama' => '' ,
					'aprv_dir_tgl'=>'',
					'no_pr'=>''
				));
			}
			break;

	case 'detail-pr':
		Event::trigger('permintaan/detail-pr/');
		_auth1('SHOW-PR', $user['id']);

		$cid = $routes['3'];
		$d = ORM::for_table('pr_master')->find_one($cid);
		if ($d) {
			$ui->assign('d', $d);
			$ui->assign('cid', $cid);

			$e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();

			$tg = ORM::for_table('daftar_inventaris')->where('active', 'Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="' . $r['kd_inventaris'] . '">' . $r['kd_inventaris'] . ' - ' . $r['nm_inventaris'] . '</option>';
			}

			$tg1 = ORM::for_table('daftar_itemstock')->where('active', 'Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active', 'Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));

			$ui->assign('_sysfrm_menu1', 'List PR');
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
		} else r2(U . 'permintaan/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');
		break;

	case 'upload-file':
		if (isset($_FILES['file']['name'])) {
			$filename = $_FILES['file']['name'];
			$timestamp = time();
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			$allowed_extensions = array("jpg", "jpeg", "png", "pdf", "xlsx", "xls");
			$response = array();
			$status = 0;
			if (in_array(strtolower($extension), $allowed_extensions)) {
				$new_filename = $timestamp . '.' . $extension;
				$location = "uploads/GAS/PR_SUPPLIER/" . $new_filename;
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
