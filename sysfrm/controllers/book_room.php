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
    $myCtrl = 'book_room';
}
_auth();
$ui->assign('_sysfrm_menu', 'book_room');
$ui->assign('_title', 'book_room' . ' - ' . $config['CompanyName']);
$ui->assign('_st', Bookings);
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$username = $user["username"];
$nama_user = $user["fullname"];

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');


function cekTanggal($tanggal_waktu)
{
    $today = date('Y-m-d');
    $tomorrow = date('Y-m-d', strtotime('tomorrow'));
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('Y-m-d', $tanggal_timestamp);
    if ($tanggal === $today) {
        return 1;
    } else if ($tanggal === $tomorrow) {
        return 2;
    } else {
        return 0;
    }
}

function changeFormat($tanggal_waktu)
{
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('l, d M Y', $tanggal_timestamp);
    return $tanggal;
}

function rangeMeeting($mulai, $durasi)
{
    $mulai_timestamp = strtotime($mulai);
    $awal = date('H:i', $mulai_timestamp);
    $akhir = date('H:i', $mulai_timestamp + (3600 * $durasi));
    return $awal . ' - ' . $akhir;
}

function historyTanggal($tanggal, $durasi)
{
    $today = date('Y-m-d H:i:s');
    $today_timestamp = strtotime($today);
    $tanggal_timestamp = strtotime($tanggal) + (3600 * $durasi);
    $hasil = $today_timestamp - $tanggal_timestamp;
    return $hasil;
}

function cekWaktu($tanggal_waktu, $durasi)
{
    $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_not_equal('subjek', 'Pinjam Barang Inventaris')->where_not_equal('subjek', 'Pinjam Ruangan')->where_in('status', array('PEND', 'READY'))->find_many();
    foreach ($d as $ds) {
        if (changeFormat($tanggal_waktu) == changeFormat($ds['tanggal_meeting'])) {
            $booking_menit = date('i', strtotime($ds['tanggal_meeting']));
            $booking_jam = date('H', strtotime($ds['tanggal_meeting']));
            //            $booking_akhir = (int)$booking_jam + (int)$ds['durasi'];
            $booking_awal = ((int)$booking_jam * 60) + (int)$booking_menit;
            $booking_akhir = (int)$booking_awal + ($ds['durasi'] * 60);

            $meeting_menit = date('i', strtotime($tanggal_waktu));
            $meeting_jam = date('H', strtotime($tanggal_waktu));
            //            $meeting_akhir = (int)$meeting_jam + (int)$durasi;
            $meeting_awal = ((int)$meeting_jam * 60) + (int)$meeting_menit;
            $meeting_akhir = (int)$meeting_awal + ($durasi * 60);

            if ($meeting_awal < $booking_awal) {
                if ($meeting_akhir > $booking_awal) return true;
            } else {
                if ($meeting_awal < $booking_akhir) return true;
            }
        }
    }
    return false;
}

function cekWaktuHall($tanggal_waktu, $durasi, $id_ruangan)
{
    $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where('subjek', 'Pinjam Ruangan')->where('id_ruangan', $id_ruangan)->where_in('status', array('PEND', 'READY'))->find_many();
    foreach ($d as $ds) {
        if (changeFormat($tanggal_waktu) == changeFormat($ds['tanggal_meeting'])) {
            $booking_menit = date('i', strtotime($ds['tanggal_meeting']));
            $booking_jam = date('H', strtotime($ds['tanggal_meeting']));
            //            $booking_akhir = (int)$booking_jam + (int)$ds['durasi'];
            $booking_awal = ((int)$booking_jam * 60) + (int)$booking_menit;
            $booking_akhir = (int)$booking_awal + ($ds['durasi'] * 60);

            $meeting_menit = date('i', strtotime($tanggal_waktu));
            $meeting_jam = date('H', strtotime($tanggal_waktu));
            //            $meeting_akhir = (int)$meeting_jam + (int)$durasi;
            $meeting_awal = ((int)$meeting_jam * 60) + (int)$meeting_menit;
            $meeting_akhir = (int)$meeting_awal + ($durasi * 60);

            if ($meeting_awal < $booking_awal) {
                if ($meeting_akhir > $booking_awal) return true;
            } else {
                if ($meeting_awal < $booking_akhir) return true;
            }
        }
    }
    return false;
}

function cekPinjaman($tanggal_waktu, $durasi, $pinjam)
{
    $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_not_equal('pinjaman', '')->where_in('status', array('PEND', 'READY'))->find_many();
    foreach ($d as $ds) {
        if (changeFormat($tanggal_waktu) == changeFormat($ds['tanggal_meeting'])) {
            $pinjamanBarang = $ds['pinjaman'];
            $booking_menit = date('i', strtotime($ds['tanggal_meeting']));
            $booking_jam = date('H', strtotime($ds['tanggal_meeting']));
            //            $booking_akhir = (int)$booking_jam + (int)$ds['durasi'];
            $booking_awal = ((int)$booking_jam * 60) + (int)$booking_menit;
            $booking_akhir = (int)$booking_awal + ($ds['durasi'] * 60);

            $meeting_menit = date('i', strtotime($tanggal_waktu));
            $meeting_jam = date('H', strtotime($tanggal_waktu));
            //            $meeting_akhir = (int)$meeting_jam + (int)$durasi;
            $meeting_awal = ((int)$meeting_jam * 60) + (int)$meeting_menit;
            $meeting_akhir = (int)$meeting_awal + ($durasi * 60);

            if ($meeting_awal < $booking_awal) {
                if ($meeting_akhir > $booking_awal) {
                    foreach ($pinjam as $item) {
                        if (strpos($ds['pinjaman'], $item) !== false) return true;
                    }
                }
            } else {
                if ($meeting_awal < $booking_akhir) {
                    foreach ($pinjam as $item) {
                        if (strpos($ds['pinjaman'], $item) !== false) return true;
                    }
                }
            }
        }
    }
    return false;
}

function barangTersedia($tanggal_waktu, $durasi)
{
    $list_barang = ["laptop acer", "laptop hp", "infocus A", "speaker", "microphone", "webcam", "tripod"];
    $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_not_equal('pinjaman', '')->where_in('status', array('PEND', 'READY'))->find_many();
    $tanggal_request_awal = new DateTime($tanggal_waktu);
    $durasi_hour = new DateInterval('PT' . $durasi . 'H');
    $tanggal_request_akhir = clone $tanggal_request_awal;
    $tanggal_request_akhir->add($durasi_hour);
    $barang_terpinjam = '';
    foreach ($d as $ds) {
        $tanggal_awal = new DateTime($ds['tanggal_meeting']);
        $durasi_hour = new DateInterval('PT' . $ds['durasi'] . 'H');
        $tanggal_akhir = clone $tanggal_awal;
        $tanggal_akhir->add($durasi_hour);
        $is_crashed = ($tanggal_request_awal < $tanggal_akhir && $tanggal_request_akhir > $tanggal_awal);
        if ($is_crashed) {
            $barang_terpinjam .= $ds['pinjaman'];
        }
    }
    // Explode the string into an array
    $items = explode(", ", $barang_terpinjam);
    $filtered_items = array_diff($list_barang, $items);

    // Implode the array back into a string
    $unique_string = implode(", ", $filtered_items);
    return $unique_string;
}

function namaBooking($userId)
{
    $d = ORM::for_table('sys_users', 'dblogin')->find_one($userId);
    $nama = $d['fullname'];
    return $nama;
}

ORM::get_db('dblogin')->beginTransaction();
try {
    $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_in('status', array('PEND', 'READY'))->find_many();
    foreach ($d as $ds) {
        $tanggal = $ds['tanggal_meeting'];
        $durasi = $ds['durasi'];
        $link = $ds['link_zoom'];
        if (historyTanggal($tanggal, $durasi) > 0) {
            $ds->status = 'DONE';
            $ds->save();
        } else if ($link != '') {
            $ds->status = 'READY';
            $ds->save();
        }
    }
    ORM::get_db('dblogin')->commit();
} catch (PDOException $ex) {
    ORM::get_db('dblogin')->rollBack();
    throw $ex;
}


switch ($action) {
    case 'list':
        Event::trigger('book_room/list/');
        //        echo "<script type='text/javascript'>alert('$message');</script>";
        $ui->assign('_sysfrm_menu1', 'listbook_room');
        // $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_equal('subjek', 'Pinjam Ruangan')->where_in('status', array('PEND', 'READY'))->order_by_asc('tanggal_meeting')->find_many();
        $d = ORM::for_table('daftar_booking_zoom', 'dblogin')
        ->select('daftar_booking_zoom.*')
        ->select('daftar_ruangan.nama_ruangan')
        ->join('daftar_ruangan', array('daftar_booking_zoom.id_ruangan', '=', 'daftar_ruangan.id'))
        ->where_equal('subjek', 'Pinjam Ruangan')
        ->where_in('status', array('PEND', 'READY'))
        ->order_by_asc('tanggal_meeting')
        ->find_many();
        //        $e = ORM::for_table('daftar_booking_zoom','dblogin')->join('sys_users',array('daftar_booking_zoom.user_id', '=', 'sys_users.id'))->find_one($cid);
        $tanggal_sementara = "";
        $user_id = $user['id'];
        $ui->assign('tanggal_sementara', $tanggal_sementara);
        $ui->assign('d', $d);
        //        $ui->assign('e',$e);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/book_room.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
        $ui->assign('user_id', $user_id);
        $ui->display('list-book-room.tpl');
        break;

    case 'pinjaman':
        Event::trigger('book_room/pinjaman/');
        $ui->assign('_sysfrm_menu1', 'listbook_alat');
        $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_not_equal('pinjaman', '')->where_in('status', array('PEND', 'READY'))->order_by_asc('tanggal_meeting')->find_many();
        //        $e = ORM::for_table('daftar_booking_zoom','dblogin')->join('sys_users',array('daftar_booking_zoom.user_id', '=', 'sys_users.id'))->find_one($cid);
        $tanggal_sementara = "";
        $user_id = $user['id'];

        $ui->assign('tanggal_sementara', $tanggal_sementara);
        $ui->assign('d', $d);
        //        $ui->assign('e',$e);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/book_alat.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
        $ui->assign('user_id', $user_id);
        $ui->display('list-book-alat.tpl');
        break;

    case 'history':
        Event::trigger('book_room/history/');

        $ui->assign('_sysfrm_menu1', 'historybook_room');
        $user_id = $user['id'];
        if (_auth2('HISTORY-BOOKING-ZOOM', $user['id'])) {
            $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where_in('status', array('DONE', 'CANCEL'))->order_by_desc('tanggal_meeting')->limit(10)->find_many();
        } else {
            $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->where('user_id', $user_id)->where_in('status', array('DONE', 'CANCEL'))->order_by_desc('tanggal_meeting')->limit(10)->find_many();
        }
        $tanggal_sementara = "";
        $ui->assign('tanggal_sementara', $tanggal_sementara);
        $ui->assign('d', $d);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/book_zoom.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
        $ui->assign('user_id', $user_id);
        $ui->display('history-book-zoom.tpl');
        break;

    case 'history-export':
        _phpspreadsheet();
        break;

    case 'add':
        Event::trigger('book_room/add/');
        $listwaktu = "";
        for ($x = 0; $x < 24; $x++) {
            $jam = sprintf("%02d", $x) . ":00";
            $listwaktu .= '<option value="' . $jam . '">' . $jam . '</option>';
            $menit = sprintf("%02d", $x) . ":30";
            $listwaktu .= '<option value="' . $menit . '">' . $menit . '</option>';
        }
        $daftar_ruangan = ORM::for_table('daftar_ruangan', 'dblogin')->find_many();
        $ui->assign('waktu', $listwaktu);
        $ui->assign('daftar_ruangan', $daftar_ruangan);
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), 'add-book-room')));
        $ui->display('add-book-room.tpl');
        break;

    case 'addPinjaman':
        Event::trigger('book_room/addPinjaman/');
        $listwaktu = "";
        for ($x = 0; $x < 24; $x++) {
            $jam = sprintf("%02d", $x) . ":00";
            $listwaktu .= '<option value="' . $jam . '">' . $jam . '</option>';
            $menit = sprintf("%02d", $x) . ":30";
            $listwaktu .= '<option value="' . $menit . '">' . $menit . '</option>';
        }
        $ui->assign('waktu', $listwaktu);
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), 'add-book-alat')));

        $ui->display('add-book-alat.tpl');
        break;

    case 'add-post':
        Event::trigger('book_room/add-post/');
        $subjek = 'Pinjam Ruangan';
        $tanggal_meeting = _post('tanggal_meeting');
        $waktu_meeting = _post('waktu_meeting');
        $durasi = _post('durasi');
        $peserta = _post('jumlah_peserta');
        $ruangan = _post('ruangan');
        $keterangan = _post('keterangan');
        $pinjam = $_POST['pinjaman'];
        $direksi = _post('direksi');
        $pinjaman = "";

        foreach ($pinjam as $p) {
            $pinjaman .= $p . ", ";
        }
        $msg = '';
        if ($ruangan == '') {
            $msg .= 'Harus memilih salah satu ruangan <br>';
        }
        if ($direksi == '') {
            $msg .= 'Pilih apakah direksi mengikuti meeting <br>';
        }
        if ($tanggal_meeting == '') {
            $msg .= 'Tanggal booking tidak boleh kosong <br>';
        }
        $tanggal_meeting .= " " . $waktu_meeting;
        if ($waktu_meeting == '') {
            $msg .= 'Waktu booking tidak boleh kosong <br>';
        }
        if ($durasi == '') {
            $msg .= 'Durasi booking tidak boleh kosong <br>';
        }
        if (cekWaktuHall($tanggal_meeting, $durasi, $ruangan)) {
            $msg .= 'Sudah terdapat booking pada waktu yang dipilih, harap ganti waktu meeting <br>';
        }
        if (intval($peserta) < 1) {
            $msg .= 'Jumlah Peserta minimal harus 1 <br>';
        }
        if ($pinjaman != "") {
            if (cekPinjaman($tanggal_meeting, $durasi, $pinjam)) {
                $barang_tersedia = barangTersedia($tanggal_meeting, $durasi);
                $msg .= 'Sudah terdapat pinjaman pada waktu yang dipilih, barang yang tersedia: <br>' . $barang_tersedia . '<br>Harap memilih barang tersedia atau mengganti waktu pinjaman <br>';
            }
        }
        $start_time = str_replace(" ", "T", $tanggal_meeting);

        if ($msg == '') {
            try {
                ORM::get_db('dblogin')->beginTransaction();
                $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->create();
                $d->user_id = $user['id'];
                $d->subjek = $subjek;
                $d->direksi = $direksi;
                $d->tanggal_meeting = $tanggal_meeting;
                $d->durasi = $durasi;
                $d->pinjaman = $pinjaman;
                $d->id_ruangan = $ruangan;
                $d->keterangan = $keterangan;
                $d->jumlah_peserta = $peserta;
                $d->status = "READY";

                $d->add_date = date('Y-m-d H:i:s');

                $d->save();




                //Email booking Ruangan
                // $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Booking:Booking Room')->find_one();

                // $subject = new Template($e['subject']);
                // $subject->set('business_name', $config['CompanyName']);
                // $subj = $subject->output();
                // $message = new Template($e['message']);
                // $message->set('business_name', $config['CompanyName']);
                // $message->set('name', $nama_user);
                // $message->set('username', $username);
                // $message->set('subjek', $subjek);
                // $message->set('tanggal_meeting', $tanggal_meeting);
                // $message->set('durasi', $durasi);
                // $message_o = $message->output();
                // Notify_Email::_send($nama_user,'capella.zoom@gmail.com',$subj,$message_o);

                // $f = ORM::for_table('sys_users','dblogin')->find_one($user['id']);


                // $message->set('name', $f['fullname']);
                // $message_o = $message->output();
                // Notify_Email::_send($f['fullname'],$f['username'],$subj,$message_o);
                // echo "Email berhasil dikirim";

                ORM::get_db('dblogin')->commit();
                $cid = $d->id();
                _log('Tambah Booking Room [CID: ' . $cid . ']', 'Admin', $user['id']);
                $_SESSION['ntype'] = 's';
                $_SESSION['notify'] = 'Ruangan berhasil dibooking !';
                echo '<script>window.location = "' . U . $myCtrl . '/list' . '"</script>';
            } catch (PDOException $ex) {
                ORM::get_db('dblogin')->rollBack();
                throw $ex;
            }
        } else {
            echo $msg;
            // $start_time = str_replace(" ", "T", $tanggal_meeting);
            // echo $start_time;


        }
        break;

    case 'addPinjaman-post':
        Event::trigger('book_room/addPinjaman-post/');
        $subjek = 'Pinjam Barang Inventaris';
        $direksi = '';
        $tanggal_meeting = _post('tanggal_meeting');
        $waktu_meeting = _post('waktu_meeting');
        $durasi = _post('durasi');
        $pinjam = $_POST['pinjaman'];
        $pinjaman = "";

        foreach ($pinjam as $p) {
            $pinjaman .= $p . ", ";
        }
        $msg = '';
        if ($tanggal_meeting == '') {
            $msg .= 'Tanggal meeting tidak boleh kosong <br>';
        }
        $tanggal_meeting .= " " . $waktu_meeting;
        if ($waktu_meeting == '') {
            $msg .= 'Waktu meeting tidak boleh kosong <br>';
        }
        if ($durasi == '') {
            $msg .= 'Durasi meeting tidak boleh kosong <br>';
        }
        if ($pinjaman == '') {
            $msg .= 'Barang pinjaman tidak boleh kosong <br>';
        }
        if (cekPinjaman($tanggal_meeting, $durasi, $pinjam)) {
            $barang_tersedia = barangTersedia($tanggal_meeting, $durasi);
            $msg .= 'Sudah terdapat pinjaman pada waktu yang dipilih, barang yang tersedia: <br>' . $barang_tersedia . '<br>Harap memilih barang tersedia atau mengganti waktu pinjaman <br>';
        }
        if ($msg == '') {
            ORM::get_db('dblogin')->beginTransaction();
            try {
                $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->create();
                $d->user_id = $user['id'];
                $d->subjek = $subjek;
                $d->direksi = $direksi;
                $d->tanggal_meeting = $tanggal_meeting;
                $d->durasi = $durasi;
                $d->pinjaman = $pinjaman;
                $d->status = "READY";
                $d->add_date = date('Y-m-d H:i:s');
                //
                $d->save();
                ORM::get_db('dblogin')->commit();
                $cid = $d->id();
                _log('Tambah Booking Zoom [CID: ' . $cid . ']', 'Admin', $user['id']);
                $_SESSION['ntype'] = 's';
                $_SESSION['notify'] = 'Pinjaman Berhasil Ditambahkan';
                echo '<script>window.location = "' . U . $myCtrl . '/pinjaman' . '"</script>';
            } catch (PDOException $ex) {
                ORM::get_db('dblogin')->rollBack();
                throw $ex;
            }
        } else {
            echo $msg;
        }
        break;

    case 'kirimemail':
        $e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Booking:Booking Room')->find_one();

        $subject = new Template($e['subject']);
        $subject->set('business_name', $config['CompanyName']);
        $subj = $subject->output();
        $message = new Template($e['message']);
        $message->set('business_name', $config['CompanyName']);
        $message->set('name', "tes");
        $message->set('username', "capella.zoom@gmail.com");
        $message->set('subjek', "Tes Email");
        $message->set('tanggal_meeting', "1-1-2022");
        $message->set('durasi', "3");
        $message_o = $message->output();

        echo Notify_Email::_send('Tes', 'capella.zoom@gmail.com', $subj, $message_o);

        break;

    case 'edit':
        Event::trigger('book_room/edit/');
        $cid = $routes['2'];
        $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->join('sys_users', array('daftar_booking_zoom.user_id', '=', 'sys_users.id'))->find_one($cid);
        if ($d['user_id'] != $user['id']) {
            _auth1('ADD-ZOOM-LINK', $user['id']);
        }

        //        echo "<script type='text/javascript'>alert('$user_id');</script>";
        if ($d) {
            $ui->assign('_sysfrm_menu1', 'listbook_room');
            $ui->assign('d', $d);
            $ui->assign('cid', $cid);
            $ui->assign('xheader', Asset::css('s2/css/select2.min'));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 'ckeditor/ckeditor', 's2/js/i18n/' . lan(), 'edit-book-zoom')));
            $ui->assign('xjq', '
			 $("#country").select2({
			 theme: "bootstrap"
			 });
			 ');
            $ui->display('edit-book-zoom.tpl');
        }
        break;

    case 'edit-post':
        Event::trigger('book_room/edit-post/');
        _auth1('ADD-ZOOM-LINK', $user['id']);
        $id = _post('cid');
        $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->find_one($id);
        $id_user = $d['user_id'];
        if ($d) {
            $msg = '';
            if ($msg == '') {
                ORM::get_db('dblogin')->beginTransaction();
                try {
                    $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->find_one($id);
                    $e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Booking:Link Zoom')->find_one();
                    $f = ORM::for_table('sys_users', 'dblogin')->find_one($id_user);

                    $subject = new Template($e['subject']);
                    $subject->set('business_name', $config['CompanyName']);
                    $subj = $subject->output();
                    $message = new Template($e['message']);
                    $message->set('business_name', $config['CompanyName']);
                    $message->set('name', $f['fullname']);
                    $message->set('link_zoom', $link_zoom);
                    $message_o = $message->output();
                    Notify_Email::_send($f['fullname'], $f['username'], $subj, $message_o);
                    echo "Email berhasil dikirim";
                } catch (PDOException $ex) {
                    ORM::get_db('dblogin')->rollBack();
                    throw $ex;
                }
            } else {
                echo $msg;
            }
        } else {
            r2(U . $myCtrl . '/list', 'e', 'Booking tersebut tidak ditemukan');
        }
        break;

    case 'cancel':
        Event::trigger('book_room/cancel/');
        $id = $routes['2'];
        $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->find_one($id);

        if ($d['user_id'] != $user['id']) {
            _auth1('CANCEL-BOOKING-ZOOM', $user['id']);
        }
        if ($d) {
            ORM::get_db('dblogin')->beginTransaction();
            try {
                $d->status = "CANCEL";
                $d->save();
                ORM::get_db('dblogin')->commit();
                r2(U . $myCtrl . '/list', 'e', 'Booking telah di Cancel');
            } catch (PDOException $ex) {
                ORM::get_db('dblogin')->rollBack();
                throw $ex;
            }
        } else {
            r2(U . $myCtrl . '/list', 'e', 'Booking tersebut tidak ditemukan');
        }
        break;
    case 'cancelPinjaman':
        Event::trigger('book_room/cancelPinjaman/');
        $id = $routes['2'];
        $d = ORM::for_table('daftar_booking_zoom', 'dblogin')->find_one($id);
        if ($d['user_id'] != $user['id']) {
            _auth1('CANCEL-BOOKING-ZOOM', $user['id']);
        }
        if ($d) {
            ORM::get_db('dblogin')->beginTransaction();
            try {
                $d->status = "CANCEL";
                $d->save();
                ORM::get_db('dblogin')->commit();
                r2(U . $myCtrl . '/pinjaman', 'e', 'Pinjaman telah di Cancel');
            } catch (PDOException $ex) {
                ORM::get_db('dblogin')->rollBack();
                throw $ex;
            }
        } else {
            r2(U . $myCtrl . '/pinjaman', 'e', 'Pinjaman tersebut tidak ditemukan');
        }
        break;
    default:
        echo 'action not defined';
}
