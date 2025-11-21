<?php
ORM::configure("mysql:host=localhost;dbname=cmportal_gas");
ORM::configure('username', 'root');
ORM::configure('password', '');

function generateIsiEmailUR($no_mintabarang) {
    $c = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $no_mintabarang)->order_by_asc('id')->find_many();
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
    return $isi;
}

function generateIsiEmailPR($no_pr) {
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

    $isi = '';
    foreach ($pr_detail as $index => $detail) {
        $kd_supplier = [$detail['kd_supplier1'], $detail['kd_supplier2'], $detail['kd_supplier3']];
        $daftar_harga = [$detail['harga1'], $detail['harga2'], $detail['harga3']];
        $harga = 'Rp ' . number_format($daftar_harga[$detail['supplierpilihan'] - 1], 0, '', '.');
        $keterangan_supplier = [$detail['keterangan_supplier1'], $detail['keterangan_supplier2'], $detail['keterangan_supplier3']];

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

    return $isi;
}

$action = $routes[1];
switch ($action) {
    case 'comment-ur':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('mintabarang_master')->find_one($v_uid);
        if ($d && $v_token === $d['comment_key']) {
            $ui->assign('_url', U);
            $ui->assign('uid', $v_uid);
            $ui->assign('token', $v_token);
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','ur-approval')));
            $ui->display('ur-approval.tpl');
        } else {
            echo 'Kode approval tidak ditemukan';
        }
        break;

    case 'comment-ur-approve':
        $v_uid = _post('uid');
        $v_token = _post('token');
        $isi = _post('isi');

        $d = ORM::for_table('mintabarang_master')->find_one($v_uid);
        if ($d && $d['approval'] === 'PENDING' && $d['comment_key'] <> '') {
            if ($v_token !== $d['comment_key']) {
                $data = array(
                    'msg'			=>  'Kode approval tidak ditemukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            } else if ($isi === '') {
                $data = array(
                    'msg'			=>  'Pesan diperlukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            }
            $no_ur = $d['no_mintabarang'];
            $tgl_ur = $d['tanggal'];
            $tahap = $d['tahap'];

            ORM::get_db()->beginTransaction();
            switch ($tahap) {
                case 1:
                    $bengkel = ORM::for_table('daftar_department', 'dblogin')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
                    $kode_bengkel = array();
                    foreach ($bengkel as $b) {
                        array_push($kode_bengkel, $b['kode_dept']);
                    }

                    $d->pesan = $isi;
                    $d->disetujui_atasan_oleh = $user['fullname'];
                    $d->disetujui_atasan_nama = $user['username'];
                    $d->disetujui_atasan_tgl = date('Y-m-d');

                    if (in_array($d['kode_dept'], $kode_bengkel)) {
                        $d->tahap = 2;
                        $email = 2;
                    } else {
                        $d->tahap = 3;
                        $email = 3;
                    }
                    break;
                case 2:
                    $d->pesan = $isi;
                    $d->disetujui_service_oleh = $user['fullname'];
                    $d->disetujui_service_nama = $user['username'];
                    $d->disetujui_service_tgl = date('Y-m-d');
                    $d->tahap = 3;
                    $email = 3;
                    break;
                case 3:
                    $d->approval = 'APPROVED';
                    $d->pesan = $isi;
                    $d->disetujui_gas_oleh = $user['fullname'];
                    $d->disetujui_gas_nama = $user['username'];
                    $d->disetujui_gas_tgl = date('Y-m-d');
                    $d->approve_key = '';
                    $d->reject_key = '';
                    $d->comment_key = '';
                    $email = 4;
                    break;
                default:
                    $data = array(
                        'msg'			=>  'Error 500 <br> Terjadi kesalahan internal',
                        'dataval'		=>	'a'
                    );
                    echo json_encode($data);
                    break;
            }

            if ($email === 2 || $email === 3) {
                $approve_key = generateRandomString(24);
                $reject_key = generateRandomString(24);
                $comment_key = generateRandomString(24);
                $d->approve_key = $approve_key;
                $d->reject_key = $reject_key;
                $d->comment_key = $comment_key;
                $isi = generateIsiEmailUR($no_ur);
            }

            $cid = $d->id();
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
                    $message->set('tgl_ur', $tgl_ur);
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
                    $data = array(
                        'msg'			=>  'UR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
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
                    $message->set('tgl_ur', $tgl_ur);
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
                    $data = array(
                        'msg'			=>  'UR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
                    break;
                case 4:
                    $data = array(
                        'msg'			=>  'UR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
                    break;
                default:
                    $data = array(
                        'msg'			=>  'Error 500 <br> Terjadi kesalahan internal',
                        'dataval'		=>	'a'
                    );
                    echo json_encode($data);
                    break;
            }
        } else {
            $data = array(
                'msg'			=>  'Kode approval tidak ditemukan',
                'dataval'		=>	'a'
            );
            echo json_encode($data);
        }
        break;

    case 'comment-ur-reject':
        $v_uid = _post('uid');
        $v_token = _post('token');
        $isi = _post('isi');

        $d = ORM::for_table('mintabarang_master')->find_one($v_uid);
        if ($d && $d['approval'] === 'PENDING' && $d['comment_key'] <> '') {
            if ($v_token !== $d['comment_key']) {
                $data = array(
                    'msg'			=>  'Kode approval tidak ditemukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            } else if ($isi === '') {
                $data = array(
                    'msg'			=>  'Pesan diperlukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            }

            ORM::get_db()->beginTransaction();
            $d->approval = 'REJECTED';
            $d->pesan = $isi;
            $d->ditolak_oleh = $user['id'];
            $d->ditolak_nama = $user['username'];
            $d->ditolak_tgl = date('Y-m-d');
            $d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';

            $d->save();
            ORM::get_db()->commit();

            $data = array(
                'msg'			=>  'UR berhasil di reject',
                'dataval'		=>	1
            );
            echo json_encode($data);
        } else {
            $data = array(
                'msg'			=>  'Kode approval tidak ditemukan',
                'dataval'		=>	'a'
            );
            echo json_encode($data);
        }
        break;

    case 'approve-ur':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('mintabarang_master')->find_one($v_uid);
        if ($d && $d['approval'] === 'PENDING' && $d['approve_key'] <> '') {
            if ($v_token !== $d['approve_key']) {
                echo "Kode approval tidak ditemukan";
                return;
            }
            $no_ur = $d['no_mintabarang'];
            $tgl_ur = $d['tanggal'];
            $tahap = $d['tahap'];

            ORM::get_db()->beginTransaction();
            switch ($tahap) {
                case 1:
                    $bengkel = ORM::for_table('daftar_department', 'dblogin')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
                    $kode_bengkel = array();
                    foreach ($bengkel as $b) {
                        array_push($kode_bengkel, $b['kode_dept']);
                    }

                    $d->disetujui_atasan_oleh = $user['fullname'];
                    $d->disetujui_atasan_nama = $user['username'];
                    $d->disetujui_atasan_tgl = date('Y-m-d');

                    if (in_array($d['kode_dept'], $kode_bengkel)) {
                        $d->tahap = 2;
                        $email = 2;
                    } else {
                        $d->tahap = 3;
                        $email = 3;
                    }
                    break;
                case 2:
                    $d->disetujui_service_oleh = $user['fullname'];
                    $d->disetujui_service_nama = $user['username'];
                    $d->disetujui_service_tgl = date('Y-m-d');
                    $d->tahap = 3;
                    $email = 3;
                    break;
                case 3:
                    $d->approval = 'APPROVED';
                    $d->disetujui_gas_oleh = $user['fullname'];
                    $d->disetujui_gas_nama = $user['username'];
                    $d->disetujui_gas_tgl = date('Y-m-d');
                    $d->approve_key = '';
                    $d->reject_key = '';
                    $d->comment_key = '';
                    $email = 4;
                    break;
                default:
                    echo "Error 500 <br> Terjadi kesalahan internal";
                    break;
            }

            if ($email === 2 || $email === 3) {
                $approve_key = generateRandomString(24);
				$reject_key = generateRandomString(24);
				$comment_key = generateRandomString(24);
                $d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;
                $isi = generateIsiEmailUR($no_ur);
            }

            $cid = $d->id();
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
					$message->set('tgl_ur', $tgl_ur);
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
                    echo 'UR berhasil di approve';
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
					$message->set('tgl_ur', $tgl_ur);
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
                    echo 'UR berhasil di approve';
					break;
				case 4:
                    echo 'UR berhasil di approve';
					break;
                default:
                    echo "Error 500 <br> Terjadi kesalahan internal";
                    break;
			}
        } else {
            echo "Kode approval tidak ditemukan";
        }
        break;

    case 'reject-ur':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('mintabarang_master')->find_one($v_uid);
        if ($d && $d['approval'] === 'PENDING' && $d['reject_key'] <> '') {
            if ($v_token !== $d['reject_key']) {
                echo "Kode approval tidak ditemukan";
                return;
            }
            ORM::get_db()->beginTransaction();
            $d->approval = 'REJECTED';
			$d->ditolak_oleh = $user['id'];
			$d->ditolak_nama = $user['username'];
			$d->ditolak_tgl = date('Y-m-d');
            $d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';

            $d->save();
            ORM::get_db()->commit();

            echo "UR berhasil di reject";
        } else {
            echo "Kode approval tidak ditemukan";
        }
        break;

    case 'comment-pr':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('pr_master')->find_one($v_uid);
        if ($d && $v_token === $d['comment_key']) {
            $ui->assign('_url', U);
            $ui->assign('uid', $v_uid);
            $ui->assign('token', $v_token);
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','pr-approval')));
            $ui->display('pr-approval.tpl');
        } else {
            echo 'Kode approval tidak ditemukan';
        }
        break;

    case 'comment-pr-approve':
        $v_uid = _post('uid');
        $v_token = _post('token');
        $isi = _post('isi');

        $d = ORM::for_table('pr_master')->find_one($v_uid);
        if ($d && $d['status'] === 'PENDING' && $d['comment_key'] <> '') {
            if ($v_token !== $d['comment_key']) {
                $data = array(
                    'msg'			=>  'Kode approval tidak ditemukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            } else if ($isi === '') {
                $data = array(
                    'msg'			=>  'Pesan diperlukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            }
            $no_pr = $d["no_pr"];
            $tgl_pr = $d["tgl_pr"];
            $total_harga = 'Rp ' . number_format($d['total_harga'], 0, '', '.');
            $direksi = $d['dir_pilihan'];
            $tahap = $d["tahap"];

            ORM::get_db()->beginTransaction();
            switch ($tahap) {
                case 1:
                    $d->pesan = $isi;
                    $d->aprv_it_oleh = $user['id'];
                    $d->aprv_it_nama = $user['fullname'];
                    $d->aprv_it_tgl = date('Y-m-d H:i:s');
                    $d->tahap = 2;
                    $email = 2;
                    break;
                case 2:
                    $d->pesan = $isi;
                    $d->aprv_ga_spv_oleh = $user['id'];
                    $d->aprv_ga_spv_nama = $user['fullname'];
                    $d->aprv_ga_spv_tgl = date('Y-m-d H:i:s');
                    $d->tahap = 3;
                    $email = 3;
                    break;
                case 3:
                    // $d->pesan = $isi;
                    // $d->aprv_ga_head_oleh = $user['id'];
                    // $d->aprv_ga_head_nama = $user['fullname'];
                    // $d->aprv_ga_head_tgl = date('Y-m-d H:i:s');

                    // if ($d['total_harga'] >= 2000000) {
                    //     $d->tahap = 5;
                    //     $email = 5;
                    // } else {
                    //     $d->status = 'APPROVE';
                    //     $d->approve_key = '';
                    //     $d->reject_key = '';
                    //     $d->comment_key = '';
                    //     $email = 6;
                    // }
                    // break;
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
                    $d->pesan = $isi;
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
                    $d->pesan = $isi;
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
                    $data = array(
                        'msg'			=>  'Error 500 <br> Terjadi kesalahan internal',
                        'dataval'		=>	'a'
                    );
                    echo json_encode($data);
                    break;
            }

            if ($email === 2 || $email === 3 || $email === 4 || $email === 5) {
                $approve_key = generateRandomString(24);
				$reject_key = generateRandomString(24);
				$comment_key = generateRandomString(24);
                $d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;
                $isi = generateIsiEmailPR($no_pr);
            }

            $cid = $d->id();
            $d->save();
			ORM::get_db()->commit();

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
					$message->set('tgl_pr', $tgl_pr);
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
                    $data = array(
                        'msg'			=>  'PR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
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
					$message->set('tgl_pr', $tgl_pr);
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
                    $data = array(
                        'msg'			=>  'PR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
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
					$message->set('tgl_pr', $tgl_pr);
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
                    $data = array(
                        'msg'			=>  'PR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
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
					$message->set('tgl_pr', $tgl_pr);
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
                    $data = array(
                        'msg'			=>  'PR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
                    break;
				case 6:
                    $data = array(
                        'msg'			=>  'PR berhasil di approve',
                        'dataval'		=>	1
                    );
                    echo json_encode($data);
					break;
                default:
                    $data = array(
                        'msg'			=>  'Error 500 <br> Terjadi kesalahan internal',
                        'dataval'		=>	'a'
                    );
                    echo json_encode($data);
                    break;
			}
        } else {
            $data = array(
                'msg'			=>  'Kode approval tidak ditemukan',
                'dataval'		=>	'a'
            );
            echo json_encode($data);
        }
        break;

    case 'comment-pr-reject':
        $v_uid = _post('uid');
        $v_token = _post('token');
        $isi = _post('isi');

        $d = ORM::for_table('pr_master')->find_one($v_uid);
        if ($d && $d['status'] === 'PENDING' && $d['comment_key'] <> '') {
            if ($v_token !== $d['comment_key']) {
                $data = array(
                    'msg'			=>  'Kode approval tidak ditemukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            } else if ($isi === '') {
                $data = array(
                    'msg'			=>  'Pesan diperlukan',
                    'dataval'		=>	'a'
                );
                echo json_encode($data);
                return;
            }

            ORM::get_db()->beginTransaction();
            $d->status = 'REJECT';
            $d->pesan = $isi;
            $d->ditolak_oleh = $user['id'];
            $d->ditolak_nama = $user['username'];
            $d->ditolak_tgl = date('Y-m-d');
            $d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';

            $d->save();
            ORM::get_db()->commit();

            $data = array(
                'msg'			=>  'PR berhasil di reject',
                'dataval'		=>	1
            );
            echo json_encode($data);
        } else {
            $data = array(
                'msg'			=>  'Kode approval tidak ditemukan',
                'dataval'		=>	'a'
            );
            echo json_encode($data);
        }
        break;

    case 'approve-pr':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('pr_master')->find_one($v_uid);
        if ($d && $d['status'] === 'PENDING' && $d['approve_key'] <> '') {
            if ($v_token !== $d['approve_key']) {
                echo "Kode approval tidak ditemukan";
                return;
            }
            $no_pr = $d["no_pr"];
            $tgl_pr = $d["tgl_pr"];
            $total_harga = 'Rp ' . number_format($d['total_harga'], 0, '', '.');
            $direksi = $d['dir_pilihan'];
            $tahap = $d["tahap"];

            ORM::get_db()->beginTransaction();
            switch ($tahap) {
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
                    // $d->aprv_ga_head_oleh = $user['id'];
                    // $d->aprv_ga_head_nama = $user['fullname'];
                    // $d->aprv_ga_head_tgl = date('Y-m-d H:i:s');

                    // if ($d['total_harga'] >= 2000000) {
                    //     $d->tahap = 5;
                    //     $email = 5;
                    // } else {
                    //     $d->status = 'APPROVE';
                    //     $d->approve_key = '';
                    //     $d->reject_key = '';
                    //     $d->comment_key = '';
                    //     $email = 6;
                    // }
                    // break;
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
                        $email = 6;
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
                    $email = 6;
                    break;
                case 6:
                    $d->aprv_mktsrv_oleh = $user['id'];
                    $d->aprv_mktsrv_nama = $user['fullname'];
                    $d->aprv_mktsrv_tgl = date('Y-m-d H:i:s');
                    $d->tahap = 2;
                    $email = 2;
                    break;
            
                default:
                    echo "Error 500 <br> Terjadi kesalahan internal";
                    break;
            }

            if ($email === 2 || $email === 3 || $email === 4 || $email === 5) {
                $approve_key = generateRandomString(24);
				$reject_key = generateRandomString(24);
				$comment_key = generateRandomString(24);
                $d->approve_key = $approve_key;
				$d->reject_key = $reject_key;
				$d->comment_key = $comment_key;
                $isi = generateIsiEmailPR($no_pr);
            }

            $cid = $d->id();
            $d->save();
			ORM::get_db()->commit();

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
					$message->set('tgl_pr', $tgl_pr);
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
                    echo 'PR berhasil di approve';
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
					$message->set('tgl_pr', $tgl_pr);
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
                    echo 'PR berhasil di approve';
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
					$message->set('tgl_pr', $tgl_pr);
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
                    echo 'PR berhasil di approve';
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
					$message->set('tgl_pr', $tgl_pr);
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
                    echo 'PR berhasil di approve';
                    break;
				case 6:
                    echo 'PR berhasil di approve';
					break;
                default:
                    echo "Error 500 <br> Terjadi kesalahan internal";
                    break;
			}
        } else {
            echo "Kode approval tidak ditemukan";
        }
        break;

    case 'reject-pr':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('pr_master')->find_one($v_uid);
        if ($d && $d['status'] === 'PENDING' && $d['reject_key'] <> '') {
            if ($v_token !== $d['reject_key']) {
                echo "Kode approval tidak ditemukan";
                return;
            }
            ORM::get_db()->beginTransaction();
            $d->status = 'REJECT';
            $d->ditolak_oleh = $user['id'];
            $d->ditolak_nama = $user['username'];
            $d->ditolak_tgl = date('Y-m-d');
            $d->approve_key = '';
            $d->reject_key = '';
            $d->comment_key = '';

            $d->save();
            ORM::get_db()->commit();

            echo "PR berhasil di reject";
        } else {
            echo "Kode approval tidak ditemukan";
        }
        break;

    default:
        echo 'action not defined';
}