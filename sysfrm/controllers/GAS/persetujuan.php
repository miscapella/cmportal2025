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
    $myCtrl = 'persetujuan';
}
_auth();
$ui->assign('_sysfrm_menu', 'Persetujuan');
$ui->assign('_title', 'Persetujuan - '. $config['CompanyName']);
$ui->assign('_st', 'Persetujuan');
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
	case 'persetujuan-ur':
		Event::trigger('persetujuan/persetujuan-ur/');
	

		$ui->assign('_sysfrm_menu1', 'Persetujuan UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'persetujuan-ur','dp/dist/datepicker.min','btn-top/btn-top','numeric')));

		$ui->display($spath.'persetujuan-ur.tpl');
		break;

	case 'persetujuan-ur1':
		Event::trigger('persetujuan/persetujuan-ur1/');
		

		$cid = $routes['3'];
		$d = ORM::for_table('mintabarang_master')->find_one($cid);
		if($d){
			$ui->assign('d',$d);
			$ui->assign('cid',$cid);
			$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang',$d['no_mintabarang'])->find_many();
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
			$idate = date('d-m-Y', strtotime($d['tanggal']));
			$idates = date('d-m-Y', strtotime($n['tanggal']));
			$ui->assign('e',$e);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);
			$ui->assign('idates',$idates);
			$ui->assign('_sysfrm_menu1', 'Persetujuan UR');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'persetujuan-ur1','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
			$ui->display($spath.'persetujuan-ur1.tpl');
		} else r2(U.'persetujuan/persetujuan-ur', 'e', 'User request tersebut tidak ditemukan');
		break;

	case 'persetujuan-ur1-aprv':
		Event::trigger('persetujuan/persetujuan-ur1-aprv/');
		

		$idphp=_post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		$no_ur = $d['no_mintabarang'];
		$tgl = $d['tanggal'];
		$nomor = $d['nomor'];

		$c = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $d['no_mintabarang'])->order_by_asc('id')->find_many();
		$isi = '';
		for ($i = 0; $i < count($c); $i ++) {
			$isi .= "<b>PERMINTAAN BARANG #". (intval($i) + 1) ."</b> <br>
					Keperluan : ". $c[$i]['keperluan'] ." <br>
					Item : ". $c[$i]['namabarang'] ." <br>
					Qty Request : ". $c[$i]['qty_req'] ." <br>
					Tanggal Diperlukan : ". date('Y-m-d', strtotime($c[$i]['tgl_diperlukan'])) ." <br>
					Keterangan : ". $c[$i]['keterangan'] ." <br><br>
			";
		}

		if ($d) {
			$nomor=$d->no_mintabarang;
			if ($d->tahap == 1) {

				$bengkel = ORM::for_table('daftar_department', 'dblogin')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
				$kode_bengkel = array();
				foreach ($bengkel as $b) {
					array_push($kode_bengkel, $b->kode_dept);
				}

				$d->disetujui_atasan_oleh=$user['fullname'];
				$d->disetujui_atasan_nama=$user['username'];
				$d->disetujui_atasan_tgl=date('Y-m-d');

				if (in_array($d->kode_dept, $kode_bengkel)) {
					$d->tahap = 2;
					$email = 2;
				} else {
					$d->tahap = 3;
					$email = 3;
				}
			} else if ($d->tahap == 2) {
				$d->disetujui_service_oleh=$user['fullname'];
				$d->disetujui_service_nama=$user['username'];
				$d->disetujui_service_tgl=date('Y-m-d');
				$d->tahap = 3;
				$email = 3;
			} else {
				$d->approval='APPROVED';
				$d->disetujui_gas_oleh=$user['fullname'];
				$d->disetujui_gas_nama=$user['username'];
				$d->disetujui_gas_tgl=date('Y-m-d');
				$d->approve_key = '';
				$d->reject_key = '';
				$d->comment_key = '';
				$email = 4;
			}

			if ($email === 2 || $email === 3) {
                $approve_key = generateRandomString(24);
				$reject_key = generateRandomString(24);
				$comment_key = generateRandomString(24);
                $d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;
            }

			$d->save();
			ORM::get_db()->commit();

			switch($email) {
				case 2:
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval UR')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_department','dblogin')->where('kode_dept', 'SDH')->find_one();
					if($g) $to = $g['atasan'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $tgl);
					$message->set('isi', $isi);
					$linkcomment = APP_URL.'/?ng=gas-api/comment-ur/'.$cid.'/token_'.$comment_key;
					$linkapprove = APP_URL.'/?ng=gas-api/approve-ur/'.$cid.'/token_'.$approve_key;
					$linkreject = APP_URL.'/?ng=gas-api/reject-ur/'.$cid.'/token_'.$reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to,$to,$subj,$message_o);
					break;
				case 3:
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval UR')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_approval')->where('setting', 'GA_ADMIN')->find_one();
					if($g) $to = $g['approval'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_ur', $no_ur);
					$message->set('tgl_ur', $tgl);
					$message->set('isi', $isi);
					$linkcomment = APP_URL.'/?ng=gas-api/comment-ur/'.$cid.'/token_'.$comment_key;
					$linkapprove = APP_URL.'/?ng=gas-api/approve-ur/'.$cid.'/token_'.$approve_key;
					$linkreject = APP_URL.'/?ng=gas-api/reject-ur/'.$cid.'/token_'.$reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to,$to,$subj,$message_o);
					break;
				default:
					break;
			}

			$data = array(
				'msg'			=>  'Berhasil Approve No. '.$nomor,
				'dataval'		=>	1);
			echo json_encode($data);
		}
		else {
			$data = array(
				'msg'			=>  'Tidak ada data '.$idphp,
				'dataval'		=>	1);
			echo json_encode($data);
		}
		break;

	case 'persetujuan-ur1-reject':
		Event::trigger('persetujuan/persetujuan-ur1-reject/');
	

		$idphp=_post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		if ($d) {
			$nomor=$d->no_mintabarang;
			$d->approval = 'REJECTED';
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['username'];
			$d->ditolak_tgl = date('Y-m-d');
            $d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Reject No. '.$nomor,
				'dataval'		=>	1);
				echo json_encode($data);
		} else {
			$data = array(
					'msg'			=>  'tdk ada data '.$idphp,
					'dataval'		=>	1);
			echo json_encode($data);
		}
		break;
	

	
	case 'penerimaan-ur':
		Event::trigger('persetujuan/penerimaan-ur/');
	
		$ui->assign('_sysfrm_menu1', 'Penerimaan UR');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'penerimaan-ur','dp/dist/datepicker.min','btn-top/btn-top','numeric')));

		$ui->display($spath.'penerimaan-ur.tpl');
		break;

	case 'penerimaan-ur1':
		Event::trigger('persetujuan/penerimaan-ur1/');


		$cid = $routes['3'];
		$d = ORM::for_table('mintabarang_master')->find_one($cid);
		if($d){
			$ui->assign('d',$d);
			$ui->assign('cid',$cid);
			$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang',$d['no_mintabarang'])->find_many();
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
			$idate = date('d-m-Y', strtotime($d['tanggal']));
			$idates = date('d-m-Y', strtotime($n['tanggal']));
			$ui->assign('e',$e);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);
			$ui->assign('idates',$idates);
			$ui->assign('_sysfrm_menu1', 'Penerimaan UR');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'penerimaan-ur1','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
			$ui->display($spath.'penerimaan-ur1.tpl');
		} else r2(U.'persetujuan/penerimaan-ur', 'e', 'User request tersebut tidak ditemukan');
		break;

	case 'penerimaan-ur1-aprv':
		Event::trigger('persetujuan/penerimaan-ur1-aprv/');
		

		$idphp=_post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		$no_ur = $d['no_mintabarang'];
		$tgl = $d['tanggal'];
		$nomor = $d['nomor'];

		if ($d) {
			$nomor=$d->no_mintabarang;
			$d->approval = 'APPROVED';
			$d->disetujui_gas_oleh = $user['fullname'];
			$d->disetujui_gas_nama = $user['username'];
			$d->disetujui_gas_tgl = date('Y-m-d');
			$d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Menerima No. '.$nomor,
				'dataval'		=>	1);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'Tidak ada data '.$idphp,
				'dataval'		=>	1);
			echo json_encode($data);
		}
		break;

	case 'penerimaan-ur1-reject':
		Event::trigger('persetujuan/penerimaan-ur1-reject/');
	

		$idphp=_post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		if ($d) {
			$nomor=$d->no_mintabarang;
			$d->approval = 'REJECTED';
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['username'];
			$d->ditolak_tgl = date('Y-m-d');
			$d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Reject No. '.$nomor,
				'dataval'		=>	1);
				echo json_encode($data);
		} else {
			$data = array(
					'msg'			=>  'tdk ada data '.$idphp,
					'dataval'		=>	1);
			echo json_encode($data);
		}
		break;

	case 'persetujuan-pr':
		Event::trigger('persetujuan/persetujuan-pr/');
		

		$msg = $routes['3'];

		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu', 'Persetujuan');
        $ui->assign('_sysfrm_menu1', 'Persetujuan PR');
        $ui->assign('xfooter', Asset::js(array($spath.'persetujuan-pr')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'persetujuan-pr.tpl');
		break;

	case 'persetujuan-pr1':
		Event::trigger('persetujuan/persetujuan-pr1/');
		

		$cid = $routes['3'];
		$d = ORM::for_table('pr_master')->find_one($cid);
		$n = ORM::for_table('pr_master')->where('no_pr',$d['revisi_pr'])->find_one();
		if($d){
			$ui->assign('d',$d);
			$ui->assign('n',$n);
			$ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			$f = ORM::for_table('pr_detail')->where('no_pr',$d['revisi_pr'])->find_many();

			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}

			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
			$idates = date('d-m-Y', strtotime($n['tgl_pr']));

			$ui->assign('e',$e);
			$ui->assign('f',$f);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
			$ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);
			$ui->assign('idates',$idates);
			$ui->assign('_sysfrm_menu', 'Permintaan');
			$ui->assign('_sysfrm_menu1', 'Persetujuan PR');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-pr-aprv','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
			$ui->display($spath.'detail-pr-aprv.tpl');
		} else r2(U.'persetujuan/persetujuan-pr', 'e', 'Permintaan tersebut tidak ditemukan');
		break;

	case 'persetujuan-pr1-aprv':
		Event::trigger('persetujuan/persetujuan-ur1-aprv/');
		

		$no_pr = _post('no_pr');
		$pesan = _post('pesan');

		$d = ORM::for_table('cmportal_gas.pr_master')->table_alias("a")->select("a.*")->select("b.kode_dept")->left_outer_join("cmportal.sys_users",array("a.dibuat_oleh","=","b.id"),"b")->where('a.no_pr', $no_pr)->find_one();

		if ($d) {
			ORM::get_db()->beginTransaction();
			$tgl=$d['tgl_pr'];
			$total_harga= 'Rp ' . number_format($d['total_harga'], 0, '', '.');
			$direksi=$d['dir_pilihan'];

			switch ($d['tahap']) {
				case 1:
					$d->aprv_it_oleh = $user['id'];
					$d->aprv_it_nama = $user['fullname'];
					$d->aprv_it_tgl = date('Y-m-d H:i:s');
					$d->tahap = 2;
					$email = 2;
					break;
				case 2:
					$d->aprv_ga_spv_oleh = $user['id'];
					$d->aprv_ga_spv_nama = $user['fullname'];
					$d->aprv_ga_spv_tgl = date('Y-m-d H:i:s');
					$d->tahap = 3;
					$email = 3;
					break;
				case 3:
				// 	$d->aprv_ga_head_oleh = $user['id'];
				// 	$d->aprv_ga_head_nama = $user['fullname'];
				// 	$d->aprv_ga_head_tgl = date('Y-m-d H:i:s');

				// 	// $bengkel = ORM::for_table('daftar_department', 'dblogin')->select('kode_dept')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
				// 	// $kode_bengkel = array();
				// 	// foreach ($bengkel as $b) {
				// 	// 	array_push($kode_bengkel, $b['kode_dept']);
				// 	// }

				// 	if ($d['total_harga'] >= 2000000) {
				// 		$d->tahap = 5;
				// 		$email = 5;
				// 	} else {
				// 		$d->status = 'APPROVE';
				// 		$d->approve_key = '';
				// 		$d->reject_key = '';
				// 		$d->comment_key = '';
				// 		$email = 7;
				// 	}
				// 	break;
					$d->aprv_ga_head_oleh = $user['id'];
					$d->aprv_ga_head_nama = $user['fullname'];
					$d->aprv_ga_head_tgl = date('Y-m-d H:i:s');

					// Check if PR creator is from "bengkel" and aprv_mktsrv_oleh is empty
					if ($pr_creator == 'bengkel' && empty($d->aprv_mktsrv_oleh)) {
						// Directly move to stage 4
						$d->tahap = 4;
						$email = 4;
					} else {
						if ($d['total_harga'] >= 2000000) {
							$d->tahap = 5;
							$email = 5;
						} else {
							$d->status = 'APPROVE';
							$d->approve_key = '';
							$d->reject_key = '';
							$d->comment_key = '';
							$email = 7;
						}
					}
					break;
	



				case 4:
					$d->aprv_mktsrv_oleh = $user['id'];
					$d->aprv_mktsrv_nama = $user['fullname'];
					$d->aprv_mktsrv_tgl = date('Y-m-d H:i:s');

					if ($d['total_harga'] >= 2000000) {
						$d->tahap = 5;
						$email = 5;
					} else {
						$d->status = 'APPROVE';
						$d->approve_key = '';
						$d->reject_key = '';
						$d->comment_key = '';
						$email = 7;
					}
					break;
				case 5:
					$d->aprv_dir_oleh = $user['id'];
					$d->aprv_dir_nama = $user['fullname'];
					$d->aprv_dir_tgl = date('Y-m-d H:i:s');
					$d->status = 'APPROVE';
					$d->approve_key = '';
                    $d->reject_key = '';
                    $d->comment_key = '';
					$email = 7;
					break;

				case 6:
					$d->aprv_mktsrv_oleh = $user['id'];
					$d->aprv_mktsrv_nama = $user['fullname'];
					$d->aprv_mktsrv_tgl = date('Y-m-d H:i:s');
					$d->tahap = 2;
					$email = 2;
					break;
				default:
					$email = 7;
					break;
			}

			if ($email === 2 || $email === 3 || $email === 4 || $email === 5) {
                $approve_key = generateRandomString(24);
				$reject_key = generateRandomString(24);
				$comment_key = generateRandomString(24);
                $d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;
            }

			$cid = $d->id();
			$d->save();
			ORM::get_db()->commit();
			_log1('Approve PR :'.$no_pr.' [CID: '.$cid.']',$user['username'],$user['id']);

			Event::trigger('persetujuan/pr-aprv/_on_finished');

			if ($email <> 6) {
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
				$pr_detail = ORM::for_table('pr_detail')->raw_query($sql, array('no_pr' => $no_pr))->find_many();

				foreach ($pr_detail as $index => $detail) {
					$kd_supplier = [$detail['kd_supplier1'], $detail['kd_supplier2'], $detail['kd_supplier3']];
					$daftar_harga = [$detail['harga1'], $detail['harga2'], $detail['harga3']];
					$harga = 'Rp ' . number_format($daftar_harga[$detail['supplierpilihan'] - 1], 0, '', '.');
					$keterangan_supplier = [$detail['keterangan_supplier1'], $detail['keterangan_supplier2'], $detail['keterangan_supplier3']];
					// $ppn = [$detail['ppn1'], $detail['ppn2'],$detail['ppn3']];
					// $harga_ppn = [$detail['harga_ppn1'],$detail['harga_ppn2'],$detail['harga_ppn3']];

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
			}

			switch($email) {
				case 2:
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval PR GAS')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_approval')->where('setting', 'GA_SPV')->find_one();
					if($g) $to = $g['approval'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_pr', $no_pr);
					$message->set('tgl_pr', $tgl);
					$message->set('total_harga', $total_harga);
					$message->set('isi', $isi);
					$linkcomment = APP_URL.'/?ng=gas-api/comment-pr/'.$cid.'/token_'.$comment_key;
					$linkapprove = APP_URL.'/?ng=gas-api/approve-pr/'.$cid.'/token_'.$approve_key;
					$linkreject = APP_URL.'/?ng=gas-api/reject-pr/'.$cid.'/token_'.$reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to,$to,$subj,$message_o);
					break;
				case 3:
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval PR GAS')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'GAS')->find_one();
					if($g) $to = $g['atasan'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_pr', $no_pr);
					$message->set('tgl_pr', $tgl);
					$message->set('total_harga', $total_harga);
					$message->set('isi', $isi);
					$linkcomment = APP_URL.'/?ng=gas-api/comment-pr/'.$cid.'/token_'.$comment_key;
					$linkapprove = APP_URL.'/?ng=gas-api/approve-pr/'.$cid.'/token_'.$approve_key;
					$linkreject = APP_URL.'/?ng=gas-api/reject-pr/'.$cid.'/token_'.$reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to,$to,$subj,$message_o);
					break;
				case 4:
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval PR GAS')->find_one();
					$to = 'capella.zoom@gmail.com';
					$g = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'SDH')->find_one();
					if($g) $to = $g['atasan'];

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_pr', $no_pr);
					$message->set('tgl_pr', $tgl);
					$message->set('total_harga', $total_harga);
					$message->set('isi', $isi);
					$linkcomment = APP_URL.'/?ng=gas-api/comment-pr/'.$cid.'/token_'.$comment_key;
					$linkapprove = APP_URL.'/?ng=gas-api/approve-pr/'.$cid.'/token_'.$approve_key;
					$linkreject = APP_URL.'/?ng=gas-api/reject-pr/'.$cid.'/token_'.$reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to,$to,$subj,$message_o);
					break;
				case 5:
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval PR GAS')->find_one();
					$to = 'capella.zoom@gmail.com';
					if($direksi) $to = $direksi;

					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('no_pr', $no_pr);
					$message->set('tgl_pr', $tgl);
					$message->set('total_harga', $total_harga);
					$message->set('isi', $isi);
					$linkcomment = APP_URL.'/?ng=gas-api/comment-pr/'.$cid.'/token_'.$comment_key;
					$linkapprove = APP_URL.'/?ng=gas-api/approve-pr/'.$cid.'/token_'.$approve_key;
					$linkreject = APP_URL.'/?ng=gas-api/reject-pr/'.$cid.'/token_'.$reject_key;
					$message->set('link_comment', $linkcomment);
					$message->set('link_approve', $linkapprove);
					$message->set('link_reject', $linkreject);
					$message->set('business_name', $config['CompanyName']);
					$message_o = $message->output();

					Notify_Email::_send($to,$to,$subj,$message_o);
					break;
				default:
					break;
			}

			$data = array(
				'msg'			=>  'Berhasil Approve PR. <br> No. PR : '.$no_pr,
				'dataval'		=>	1);
			echo json_encode($data);
		} else {
			$data = array(
				'msg'			=>  'Permintaan tidak dapat ditemukan',
				'dataval'		=>	'a');
			echo json_encode($data);
		}
		break;

	case 'persetujuan-pr1-reject':
		Event::trigger('persetujuan/persetujuan-ur1-reject/');
		

        $no_pr = _post('no_pr');
        $pesan = _post('pesan');
		$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();

        if ($d) {
			ORM::get_db()->beginTransaction();
			try {
				$d->ditolak_oleh = $user['id'];
				$d->ditolak_nama = $user['fullname'];
				$d->ditolak_tgl = date('Y-m-d H:i:s');

                $d->pesan = $pesan;
                $d->status = 'REJECT';
				$d->approve_key = '';
				$d->reject_key = '';
				$d->comment_key = '';
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Reject PR :'.$no_pr.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('persetujuan/pr-reject/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Reject PR. <br> No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			} catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        } else {
			$data = array(
					'msg'			=>  'Permintaan tidak dapat ditemukan',
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;

	case 'ganti-supplier':
		$cid = _post('cid');
		$supplier = _post('supplier');

		$d = ORM::for_table('pr_detail')->where('id', $cid)->find_one();

		if($d){
			$pr = ORM::for_table('pr_master')->where('no_pr', $d['no_pr'])->find_one();

			$harga = [$d['harga1'], $d['harga2'], $d['harga3']];
			$harga_netto = [$d['harga_ppn1'], $d['harga_ppn2'], $d['harga_ppn3']];

			ORM::get_db()->beginTransaction();
			try {
				if ($supplier <> '1' && $supplier <> '2' && $supplier <> '3') $supplier = '1';
				$total_harga = $pr['total_harga'] - $d['hargapilihan'] + $harga[$supplier - 1];
				$total_harga_netto = $pr['total_harga_netto'] - $d['harga_pilihan_netto'] + $harga_netto[$supplier - 1];
				$pr->total_harga = $total_harga;
				$pr->total_harga_netto = $total_harga_netto;
				$pr->save();

				$d->supplierpilihan = $supplier;
				$d->hargapilihan = $harga[$supplier - 1];
				$d->harga_pilihan_netto = $harga_netto[$supplier - 1];
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Ganti Data Supplier. PR : '.$d['no_pr'].' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('persetujuan/ganti-supplier/_on_finished');
				$data = array(
					'dataval' => 1,
					'total_harga' => $total_harga,
					'total_harga_netto' => $total_harga_netto,
				);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
		} else {
			$data = array(
				'msg' => 'PR tidak dapat ditemukan',
				'dataval' => 'a'
			);
			echo json_encode($data);
		}
		break;

   default:
        echo 'action not defined';
}