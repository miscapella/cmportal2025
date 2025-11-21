<?php
ORM::configure("mysql:host=localhost;dbname=cmportal_kebun");
ORM::configure('username', 'root');
ORM::configure('password', '');



function decryptUrlParams($encryptedParams) {
    $key = "miscapella"; // Use the same secret key as encryption
    $cipher = "AES-256-CBC";
    $encryptedData = base64_decode($encryptedParams);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($encryptedData, 0, $ivlen);
    $encrypted = substr($encryptedData, $ivlen);
    return openssl_decrypt($encrypted, $cipher, $key, 0, $iv);
}
$action = $routes[1];
switch ($action) {
	
	case 'approve-pr':
        $v_uid = $routes['2'];
        $v_token = $routes['3'];
        $v_token = str_replace('token_','',$v_token);
        $encryptedParams = $routes['4'];

        // Decrypt the parameters
        $params = decryptUrlParams($encryptedParams);
        list($v_kodedept, $v_approval) = explode('/', $params);
        
        // Add debug statements to check values
        error_log("Encrypted params: " . $encryptedParams);
        error_log("Decrypted params: " . $params);
        error_log("Department: " . $v_kodedept);
        error_log("Approval: " . $v_approval);
		ORM::get_db()->beginTransaction();

        $d = ORM::for_table('pr_master')->where('id', $v_uid)->find_one();
			if ($d["posisi"] == 'PR' && $d["status"] != 'REJECT') {	
				if ($v_kodedept == 'PNK') {
					$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', 'KEB')->find_one();
					$diketahui = explode('|', $x['approval']);
					$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', 'KEB')->find_one();
					$diperiksa = explode('|', $y['approval']);
					$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', 'KEB')->find_one();
					$disetujui = explode('|', $z['approval']);
					// Check KEB
					if (in_array($v_approval, $diketahui)) {
						$d->diketahui_oleh = '88';
						$d->diketahui_nama = $v_approval;
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					} else {
						// Check PKS
						$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', 'PKS')->find_one();
						$diketahui = explode('|', $x['approval']);
						if (in_array($v_approval, $diketahui)) {
							$d->diketahui_oleh = '88';
							$d->diketahui_nama = $v_approval;
							$d->diketahui_tgl = date('Y-m-d H:i:s');
						}
					}

					if (in_array($v_approval, $diperiksa)) {
						$d->diperiksa_oleh = '88';
						$d->diperiksa_nama = $v_approval;
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					} else {
						$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', 'KEB')->find_one();
						$diperiksa = explode('|', $y['approval']);
						if (in_array($v_approval, $diperiksa)) {
							$d->diperiksa_oleh = '88';
							$d->diperiksa_nama = $v_approval;
							$d->diperiksa_tgl = date('Y-m-d H:i:s');
						}
					}

					if (in_array($v_approval, $disetujui)) {
						$d->disetujui_oleh = '88';
						$d->disetujui_nama = $v_approval;
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					} else {
						$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', 'KEB')->find_one();
						$disetujui = explode('|', $z['approval']);
						if (in_array($v_approval, $disetujui)) {
							$d->disetujui_oleh = '88';
							$d->disetujui_nama = $v_approval;
							$d->disetujui_tgl = date('Y-m-d H:i:s');
						}
					}
				} else {
					$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', $v_kodedept)->find_one();
					$diketahui = explode('|', $x['approval']);
					$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', $v_kodedept)->find_one();
					$diperiksa = explode('|', $y['approval']);
					$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', $v_kodedept)->find_one();
					$disetujui = explode('|', $z['approval']);
					if (in_array($v_approval, $diketahui)) {
						$d->diketahui_oleh = '88';
						$d->diketahui_nama = $v_approval;
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					}
					if (in_array($v_approval, $diperiksa)) {
						$d->diperiksa_oleh = '88';
						$d->diperiksa_nama = $v_approval;
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					}
					if (in_array($v_approval, $disetujui)) {
						$d->disetujui_oleh = '88';
						$d->disetujui_nama = $v_approval;
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					}
				}
				$d->save();
			
			$e = ORM::for_table('pr_master')->where('id', $v_uid)->find_one();
			if ($e['diketahui_oleh'] != 0 && $e['diperiksa_oleh'] != 0 && $e['disetujui_oleh'] != 0) {
				$e->status = 'APPROVE';
				$e->save();
				
				$g = ORM::for_table('pr_detail')->where('no_pr', $e['no_pr'])->find_many();
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
				$message->set('program', APP_URL.'?ng=menu_KEBUN/pembelian/list-pr-aprv/');
				$message_o = $message->output();
				Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			}
			ORM::get_db()->commit();
			
			echo 'PR berhasil di approve oleh '.$v_approval . ' dari '.$v_kodedept;
        	break;
			} 	
		else {
			echo'Approve gagal ! PR telah di REJECT';
			break;
		}
	
	case 'reject-pr':
		$v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);
		$encryptedParams = $routes['4'];

        // Decrypt the parameters
        $params = decryptUrlParams($encryptedParams);
        list($v_kodedept, $v_approval) = explode('/', $params);
        
        // Add debug statements to check values
        error_log("Encrypted params: " . $encryptedParams);
        error_log("Decrypted params: " . $params);
        error_log("Department: " . $v_kodedept);
        error_log("Approval: " . $v_approval);
		ORM::get_db()->beginTransaction();

		$d = ORM::for_table('pr_master')->where('id', $v_uid)->find_one();
		if($d['status']!='APPROVE'){
			$d->ditolak_oleh = '88';
			$d->ditolak_nama = $v_approval;
			$d->ditolak_tgl = date('Y-m-d H:i:s');
			
			$d->status = 'REJECT';
			$d->save();
			$g = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
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
			
			_log1('Reject PR :' . $kode . ' [CID: ' . $cid . ']', $v_approval, '88');

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
			$message->set('program', APP_URL.'?ng=menu_KEBUN/pembelian/list-pr-aprv/');
			$message_o = $message->output();
			Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			ORM::get_db()->commit();
			echo 'PR berhasil di reject oleh '.$v_approval . ' dari '.$v_kodedept;
		}else{
			echo'Reject gagal ! PR telah di APPROVE';
		}
        break;
			
	
	case 'comment-pr':
		$v_uid = $routes[2];
			
		$v_token = $routes[3];
			
		$v_token = str_replace('token_','',$v_token);
			
		$encryptedParams = $routes['4'];

        // Decrypt the parameters
        $params = decryptUrlParams($encryptedParams);
        list($v_kodedept, $v_approval) = explode('/', $params);
        
        // Add debug statements to check values
        error_log("Encrypted params: " . $encryptedParams);
        error_log("Decrypted params: " . $params);
        error_log("Department: " . $v_kodedept);
        error_log("Approval: " . $v_approval);
			
		$d = ORM::for_table('pr_master')->find_one($v_uid);
			
		if ($d && $v_token === $d['comment_key']) {
			
			$ui->assign('_url', U);

			$ui->assign('d', $d);
			
			$ui->assign('uid', $v_uid);
			
			$ui->assign('token', $v_token);
			
			$ui->assign('kodedept', $v_kodedept);
			
			$ui->assign('approval', $v_approval);
			
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','pr-approval-kebun')));
			
			$ui->display('pr-approval-kebun.tpl');
			
		} else {
			
			echo 'Kode approval tidak ditemukan';
			
		}
			
		break;
	
	case 'comment-pr-approve':

		$v_uid = _post('uid');
			
		$v_token = _post('token');
			
		$isi = _post('isi');
			
		$v_kodedept = _post('kodedept');
			
		$v_approval = _post('approval');
			
		$d = ORM::for_table('pr_master')->find_one($v_uid);
			
		if ($d && $d['status'] === 'PENDING' && $d['comment_key'] <> '') {
			
		 	if ($v_token !== $d['comment_key']) {
				$data = array(
			
                 	'msg'			=>  'Kode approval tidak ditemukan',
                    'dataval'		=>	'a'
			
				);
			
				echo json_encode($data);
				return;
			
			} 
			else if ($isi === '') {
			
				$data = array(
					'msg'			=>  'Pesan diperlukan',
                	'dataval'		=>	'a'
				);
				echo json_encode($data);
				return;
			
			}
			
			$no_pr = $d["no_pr"];
			
			$tgl_pr = $d["tgl_pr"];
			
			ORM::get_db()->beginTransaction();

        $d = ORM::for_table('pr_master')->where('id', $v_uid)->find_one();
			if ($d["posisi"] == 'PR' && $d["status"] != 'REJECT') {	
				if ($v_kodedept == 'PNK') {
					$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', 'KEB')->find_one();
					$diketahui = explode('|', $x['approval']);
					$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', 'KEB')->find_one();
					$diperiksa = explode('|', $y['approval']);
					$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', 'KEB')->find_one();
					$disetujui = explode('|', $z['approval']);
					// Check KEB
					if (in_array($v_approval, $diketahui)) {
						$d->diketahui_oleh = '88';
						$d->diketahui_nama = $v_approval;
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					} else {
						// Check PKS
						$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', 'PKS')->find_one();
						$diketahui = explode('|', $x['approval']);
						if (in_array($v_approval, $diketahui)) {
							$d->diketahui_oleh = '88';
							$d->diketahui_nama = $v_approval;
							$d->diketahui_tgl = date('Y-m-d H:i:s');
						}
					}

					if (in_array($v_approval, $diperiksa)) {
						$d->diperiksa_oleh = '88';
						$d->diperiksa_nama = $v_approval;
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					} else {
						$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', 'KEB')->find_one();
						$diperiksa = explode('|', $y['approval']);
						if (in_array($v_approval, $diperiksa)) {
							$d->diperiksa_oleh = '88';
							$d->diperiksa_nama = $v_approval;
							$d->diperiksa_tgl = date('Y-m-d H:i:s');
						}
					}

					if (in_array($v_approval, $disetujui)) {
						$d->disetujui_oleh = '88';
						$d->disetujui_nama = $v_approval;
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					} else {
						$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', 'KEB')->find_one();
						$disetujui = explode('|', $z['approval']);
						if (in_array($v_approval, $disetujui)) {
							$d->disetujui_oleh = '88';
							$d->disetujui_nama = $v_approval;
							$d->disetujui_tgl = date('Y-m-d H:i:s');
						}
					}
				} else {
					$x = ORM::for_table('daftar_approval')->where('setting', 'pr_diketahui')->where('kode_dept', $v_kodedept)->find_one();
					$diketahui = explode('|', $x['approval']);
					$y = ORM::for_table('daftar_approval')->where('setting', 'pr_diperiksa')->where('kode_dept', $v_kodedept)->find_one();
					$diperiksa = explode('|', $y['approval']);
					$z = ORM::for_table('daftar_approval')->where('setting', 'pr_disetujui')->where('kode_dept', $v_kodedept)->find_one();
					$disetujui = explode('|', $z['approval']);
					if (in_array($v_approval, $diketahui)) {
						$d->diketahui_oleh = '88';
						$d->diketahui_nama = $v_approval;
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					}
					if (in_array($v_approval, $diperiksa)) {
						$d->diperiksa_oleh = '88';
						$d->diperiksa_nama = $v_approval;
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					}
					if (in_array($v_approval, $disetujui)) {
						$d->disetujui_oleh = '88';
						$d->disetujui_nama = $v_approval;
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					}
				}
			} else {
				$data = array(
					'msg'			=>  'Approve gagal ! PR telah di REJECT',
					'dataval'		=>	1
				);
				break;
			}
			$d-> pesan = $isi;
			$d->save();
			
			$e = ORM::for_table('pr_master')->where('id', $v_uid)->find_one();
			if ($e['diketahui_oleh'] != 0 && $e['diperiksa_oleh'] != 0 && $e['disetujui_oleh'] != 0) {
				$e->status = 'APPROVE';
				$e->save();
				
				$g = ORM::for_table('pr_detail')->where('no_pr', $e['no_pr'])->find_many();
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
				$message->set('program', APP_URL.'?ng=menu_KEBUN/pembelian/list-pr-aprv/');
				$message_o = $message->output();
				Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
			}
			ORM::get_db()->commit();
			
			}
			
			// Notify_Email::_send($to,$to,$subj,$message_o);
			$data = array(
				'msg'			=>  'PR berhasil di approve oleh '.$v_approval . ' dari '.$v_kodedept,
				'dataval'		=>	1
			);
			echo json_encode($data);
			break;

	case 'comment-pr-reject':
		$v_uid = _post('uid');
			
		$v_token = _post('token');
			
		$isi = _post('isi');
			
		$v_kodedept = _post('kodedept');
			
		$v_approval = _post('approval');
			
		$d = ORM::for_table('pr_master')->find_one($v_uid);
			
		if ($d && $d['status'] === 'PENDING' && $d['comment_key'] <> '') {
			
		 	if ($v_token !== $d['comment_key']) {
				$data = array(
			
                 	'msg'			=>  'Kode approval tidak ditemukan',
                    'dataval'		=>	'a'
			
				);
			
				echo json_encode($data);
				return;
			
			} 
			else if ($isi === '') {
			
				$data = array(
					'msg'			=>  'Pesan diperlukan',
                	'dataval'		=>	'a'
				);
				echo json_encode($data);
				return;
			
			}
			
			$no_pr = $d["no_pr"];
			
			$tgl_pr = $d["tgl_pr"];
			
			ORM::get_db()->beginTransaction();
			$d = ORM::for_table('pr_master')->where('id', $v_uid)->find_one();
		if($d['status']!='APPROVE'){
			$d->ditolak_oleh = '88';
			$d->ditolak_nama = $v_approval;
			$d->ditolak_tgl = date('Y-m-d H:i:s');
			$d-> pesan = $isi;
			$d->status = 'REJECT';
			$d->save();
			$g = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
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
			
			_log1('Reject PR :' . $kode . ' [CID: ' . $cid . ']', $v_approval, '88');

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
			$message->set('program', APP_URL.'?ng=menu_KEBUN/pembelian/list-pr-aprv/');
			$message_o = $message->output();
			Notify_Email::_send($g['username'], $g['username'], $subj, $message_o);
		}
			ORM::get_db()->commit();
			
			}
			
			// Notify_Email::_send($to,$to,$subj,$message_o);
			$data = array(
				'msg'			=>  'PR berhasil di reject oleh '.$v_approval . ' dari '.$v_kodedept,
				'dataval'		=>	1
			);
			echo json_encode($data);
			break;

	default:
		echo "Error 500 <br> Terjadi kesalahan internal";
	break;
}

    