<?php
use \Firebase\JWT\JWT;
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
    $myCtrl = 'book_zoom';
}
_auth();
$ui->assign('_sysfrm_menu', 'book_zoom');
$ui->assign('_title', 'book_zoom'.' - '. $config['CompanyName']);
$ui->assign('_st', Bookings);
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$username = $user["username"];
$nama_user = $user["fullname"];

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

 require_once 'zoom_api_config.php';
require_once 'php-jwt-master/src/BeforeValidException.php';
require_once 'php-jwt-master/src/ExpiredException.php';
require_once 'php-jwt-master/src/SignatureInvalidException.php';
require_once 'php-jwt-master/src/JWT.php';
function delete_meeting($meeting_id){
     $request_url = "https://api.zoom.us/v2/meetings/".$meeting_id;
    $token = array(
        "iss" => API_KEY,
        "exp" => time() + 3600 //60 seconds as suggested
        
    );
    $getJWTKey = JWT::encode($token, API_SECRET);
    $headers = array(
        "authorization: Bearer " . $getJWTKey,
        "content-type: application/json",
        "Accept: application/json",
    );

    //$fieldsArr = json_encode($createMeetingArr);

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $request_url,
        //CURLOPT_RETURNTRANSFER => true,
        //CURLOPT_ENCODING => "",
        //CURLOPT_MAXREDIRS => 10,
        //CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        //CURLOPT_POSTFIELDS => $fieldsArr,
        CURLOPT_HTTPHEADER => $headers,
    ));

    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if (!$result)
    {
        return $err;
    }
    
return json_decode($result);

}
 



require_once 'zoom_api_config.php';
require_once 'php-jwt-master/src/BeforeValidException.php';
require_once 'php-jwt-master/src/ExpiredException.php';
require_once 'php-jwt-master/src/SignatureInvalidException.php';
require_once 'php-jwt-master/src/JWT.php';
function createMeeting($data = array())
{
    $createMeetingArr = array();
    if (!empty($data['alternative_host_ids'])) {
        if (count($data['alternative_host_ids']) > 1) {
            $alternative_host_ids = implode(",", $data['alternative_host_ids']);
        } else {
        $alternative_host_ids = $data['alternative_host_ids'][0];
        }
    }
    $createMeetingArr['topic'] = $data['topic'];
    $createMeetingArr['agenda'] = !empty($data['agenda']) ? $data['agenda'] : "";
    $createMeetingArr['type'] = !empty($data['type']) ? $data['type'] : 2; //Scheduled
    $createMeetingArr['start_time'] = $data['start_date'];
    $createMeetingArr['timezone'] = 'Asia/Bangkok ';
    $createMeetingArr['password'] = !empty($data['password']) ? $data['password'] : $passcode;
    $createMeetingArr['duration'] = !empty($data['duration']) ? $data['duration'] : $durasi;
    $createMeetingArr['settings'] = array(
        'join_before_host' => !empty($data['join_before_host']) ? true : false,
        'host_video' => !empty($data['option_host_video']) ? true : false,
        'participant_video' => !empty($data['option_participants_video']) ? true : false,
        'mute_upon_entry' => !empty($data['option_mute_participants']) ? true : false,
        'enforce_login' => !empty($data['option_enforce_login']) ? true : false,
        'auto_recording' => !empty($data['option_auto_recording']) ? $data['option_auto_recording'] : "none",
        'alternative_hosts' => isset($alternative_host_ids) ? $alternative_host_ids : ""
    );

    $request_url = "https://api.zoom.us/v2/users/" . EMAIL_ID . "/meetings";
    $token = array(
        "iss" => API_KEY,
        "exp" => time() + 3600 //60 seconds as suggested
    );
    $getJWTKey = JWT::encode($token, API_SECRET);
    $headers = array(
        "authorization: Bearer " . $getJWTKey,
        "content-type: application/json",
        "Accept: application/json",
    );

        $fieldsArr = json_encode($createMeetingArr);

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $request_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $fieldsArr,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if (!$result)
    {
        return $err;
    }
    return json_decode($result);
}

function cekTanggal($tanggal_waktu) {
    $today = date('Y-m-d');
    $tomorrow = date('Y-m-d', strtotime('tomorrow'));
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('Y-m-d', $tanggal_timestamp);
    if($tanggal === $today) {
        return 1;
    } else if($tanggal === $tomorrow) {
        return 2;
    } else {
        return 0;
    }
}

function changeFormat($tanggal_waktu) {
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('l, d M Y', $tanggal_timestamp);
    return $tanggal;
}

function rangeMeeting($mulai, $durasi) {
    $mulai_timestamp = strtotime($mulai);
    $awal = date('H:i', $mulai_timestamp);
    $akhir = date('H:i', $mulai_timestamp + (3600 * $durasi));
    return $awal . ' - ' . $akhir;
}

function historyTanggal($tanggal, $durasi) {
    $today = date('Y-m-d H:i:s');
    $today_timestamp = strtotime($today);
    $tanggal_timestamp = strtotime($tanggal) + (3600 * $durasi);
    $hasil = $today_timestamp - $tanggal_timestamp;
    return $hasil;
}

function cekWaktu($tanggal_waktu, $durasi) {
    $d = ORM::for_table('daftar_booking_zoom','dblogin')->where_not_equal('subjek','Pinjam Barang Inventaris')->where_in('status', array('PEND', 'READY'))->find_many();
    foreach($d as $ds) {
        if(changeFormat($tanggal_waktu) == changeFormat($ds['tanggal_meeting'])) {
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
            
            if($meeting_awal < $booking_awal) {
                if($meeting_akhir > $booking_awal) return true;
            } else {
                if($meeting_awal < $booking_akhir) return true;
            }
        }
    }
    return false;
}

function cekPinjaman($tanggal_waktu, $durasi, $pinjam) {
    $d = ORM::for_table('daftar_booking_zoom','dblogin')->where_not_equal('pinjaman','')->where_in('status', array('PEND', 'READY'))->find_many();
    foreach($d as $ds) {
        if(changeFormat($tanggal_waktu) == changeFormat($ds['tanggal_meeting'])) {
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

            if($meeting_awal < $booking_awal) {
                if($meeting_akhir > $booking_awal) {
                    foreach($pinjam as $item) {
                        if(strpos($ds['pinjaman'], $item) !== false) return true;
                    }
                }
            } else {
                if($meeting_awal < $booking_akhir) {
                    foreach($pinjam as $item) {
                        if(strpos($ds['pinjaman'], $item) !== false) return true;
                    }
                }
            }
            
        }
    }
    return false;
}

function namaBooking($userId) {
    $d = ORM::for_table('sys_users','dblogin')->find_one($userId);
    $nama = $d['fullname'];
    return $nama;
}

ORM::get_db('dblogin')->beginTransaction();
try {
    $d = ORM::for_table('daftar_booking_zoom','dblogin')->where_in('status', array('PEND', 'READY'))->find_many();
    foreach($d as $ds) {
        $tanggal = $ds['tanggal_meeting'];
        $durasi = $ds['durasi'];
        $link = $ds['link_zoom'];
        if(historyTanggal($tanggal, $durasi) > 0) {
            $ds->status = 'DONE';
            $ds->save();
        } else if($link != '') {
            $ds->status = 'READY';
            $ds->save();
        }
    }
    ORM::get_db('dblogin')->commit();
}
catch(PDOException $ex) {
    ORM::get_db('dblogin')->rollBack();
    throw $ex;
}


switch ($action) {
    case 'list':
        Event::trigger('book_zoom/list/');
        $ui->assign('_sysfrm_menu1', 'listbook_zoom');
        $d = ORM::for_table('daftar_booking_zoom','dblogin')->where_not_equal('subjek','Pinjam Barang Inventaris')->where_in('status', array('PEND', 'READY'))->order_by_asc('tanggal_meeting')->find_many();
//        $e = ORM::for_table('daftar_booking_zoom','dblogin')->join('sys_users',array('daftar_booking_zoom.user_id', '=', 'sys_users.id'))->find_one($cid);
        $tanggal_sementara = "";
        $user_id = $user['id'];
        $ui->assign('tanggal_sementara',$tanggal_sementara);
        $ui->assign('d',$d);
//        $ui->assign('e',$e);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/book_zoom.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->assign('user_id',$user_id);
        $ui->display('list-book-zoom.tpl');
        break;
    
    case 'pinjaman':
        Event::trigger('book_zoom/pinjaman/');
        $ui->assign('_sysfrm_menu1', 'listbook_alat');
        $d = ORM::for_table('daftar_booking_zoom','dblogin')->where_not_equal('pinjaman','')->where_in('status', array('PEND', 'READY'))->order_by_asc('tanggal_meeting')->find_many();
//        $e = ORM::for_table('daftar_booking_zoom','dblogin')->join('sys_users',array('daftar_booking_zoom.user_id', '=', 'sys_users.id'))->find_one($cid);
        $tanggal_sementara = "";
        $user_id = $user['id'];
        
        $ui->assign('tanggal_sementara',$tanggal_sementara);
        $ui->assign('d',$d);
//        $ui->assign('e',$e);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/book_alat.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->assign('user_id',$user_id);
        $ui->display('list-book-alat.tpl');
        break;
        
    case 'history':
        Event::trigger('book_zoom/history/');
        $ui->assign('_sysfrm_menu1', 'historybook_zoom');
        $user_id = $user['id'];
        if(_auth2('HISTORY-BOOKING-ZOOM',$user['id'])){
            $d = ORM::for_table('daftar_booking_zoom','dblogin')->where_in('status', array('DONE', 'CANCEL'))->order_by_desc('tanggal_meeting')->limit(10)->find_many();
        } else {
            $d = ORM::for_table('daftar_booking_zoom','dblogin')->where('user_id', $user_id)->where_in('status', array('DONE', 'CANCEL'))->order_by_desc('tanggal_meeting')->limit(10)->find_many();
        }
        $tanggal_sementara = "";
        $ui->assign('tanggal_sementara',$tanggal_sementara);
        $ui->assign('d',$d);
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/book_zoom.js"></script>');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->assign('user_id',$user_id);
        $ui->display('history-book-zoom.tpl');
        break;
        
    case 'add':
        Event::trigger('book_zoom/add/');
        $listwaktu = "";
		for($x = 0; $x < 24; $x++) {
            $jam = sprintf("%02d", $x) .":00";
			$listwaktu .= '<option value="'.$jam.'">'.$jam.'</option>';
            $menit = sprintf("%02d", $x) .":30";
			$listwaktu .= '<option value="'.$menit.'">'.$menit.'</option>';
		}
        $ui->assign('waktu',$listwaktu);
        
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'add-book-zoom')));
        $ui->display('add-book-zoom.tpl');
        break;
        
    case 'addPinjaman':
        Event::trigger('book_zoom/addPinjaman/');
        $listwaktu = "";
		for($x = 0; $x < 24; $x++) {
            $jam = sprintf("%02d", $x) .":00";
			$listwaktu .= '<option value="'.$jam.'">'.$jam.'</option>';
            $menit = sprintf("%02d", $x) .":30";
			$listwaktu .= '<option value="'.$menit.'">'.$menit.'</option>';
		}
        $ui->assign('waktu',$listwaktu);
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'add-book-alat')));
        
        $ui->display('add-book-alat.tpl');
        break;

    case 'add-post':
        Event::trigger('book_zoom/add-post/');
        $subjek = _post('subjek');
        $passcode = _post('passcode');
        $tanggal_meeting = _post('tanggal_meeting');
        $waktu_meeting = _post('waktu_meeting');
        $durasi = _post('durasi');
        $pinjam = $_POST['pinjaman'];
        $direksi = _post('direksi');
        $pinjaman = "";
        
        foreach($pinjam as $p){
            $pinjaman .= $p . ", ";
        }
        $msg = '';
        if($subjek == ''){
            $msg .= 'Subjek meeting tidak boleh kosong <br>';
        }
        if($passcode == ''){
            $msg .= 'Password meeting tidak boleh kosong <br>';
        }
        if(strlen($passcode)>10){
            $msg .= 'Password meeting tidak boleh lebih dari 10 karakter <br>';
        }
        if($direksi == ''){
            $msg .= 'Pilih apakah direksi mengikuti meeting <br>';
        }
        if($tanggal_meeting == ''){
            $msg .= 'Tanggal meeting tidak boleh kosong <br>';
        }
        $tanggal_meeting .= " ".$waktu_meeting;
        if($waktu_meeting == ''){
            $msg .= 'Waktu meeting tidak boleh kosong <br>';
        }
        if($durasi == ''){
            $msg .= 'Durasi meeting tidak boleh kosong <br>';
        }
        if(cekWaktu($tanggal_meeting, $durasi)) {
            $msg .= 'Sudah terdapat meeting pada waktu yang dipilih, harap ganti waktu meeting <br>';
        }
        if($pinjaman != ""){
            if(cekPinjaman($tanggal_meeting, $durasi)) {
                $msg .= 'Sudah terdapat pinjaman terhadap barang inventaris IT pada waktu yang dipilih <br>';
            }
        }
        $start_time = str_replace(" ", "T", $tanggal_meeting);

        if($msg == ''){

            ORM::get_db('dblogin')->beginTransaction();
			try {
                //zoom api create meeting
                $start_time = str_replace(" ", "T", $tanggal_meeting);
                $start_time .= ':00';
                $arr['topic']=$subjek;
                $arr['start_date']=$start_time;
                $arr['duration']=$durasi*60;
                $arr['password']=$passcode;
                $arr['type']='2';
                $result=createMeeting($arr);
                
                if(isset($result->id)){
                    $zoom_url=$result->join_url;
                    $meeting_id=$result->id;
                    $passcode_zoom=$result->password;
                    $start_zoom=$result->start_time;
                    $zoom_duration=$result->duration;

                }else{
                    echo '<pre>';
                    print_r($result);
                }

                $linkmeeting = '
                    Topic: '. $subjek .'<br>
                    Time : '. $tanggal_meeting .' WIB, Asia/Bangkok<br><br>
                    Join Zoom Meeting<br>
                    '. $zoom_url .'<br><br>
                    Meeting ID: '. $meeting_id .'<br>
                    Passcode: '. $passcode_zoom .'
                ';

                $d = ORM::for_table('daftar_booking_zoom','dblogin')->create();
                $d->user_id = $user['id'];
                $d->subjek = $subjek;
                $d->password = $passcode;
                $d->direksi = $direksi;
                $d->tanggal_meeting = $tanggal_meeting;
                $d->durasi = $durasi;
                $d->pinjaman = $pinjaman;
                $d->status = "PEND";
                $d->link_zoom = $linkmeeting;
                $d->meeting_id = $meeting_id;
                $d->add_date = date('Y-m-d H:i:s');
            
                $d->save();
                
                
                


                $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Booking:Booking Zoom')->find_one();
                
                $subject = new Template($e['subject']);
                $subject->set('business_name', $config['CompanyName']);
                $subj = $subject->output();
                $message = new Template($e['message']);
                $message->set('business_name', $config['CompanyName']);
                $message->set('name', $nama_user);
                $message->set('username', $username);
                $message->set('subjek', $subjek);
                $message->set('tanggal_meeting', $tanggal_meeting);
                $message->set('durasi', $durasi);
                $message_o = $message->output();
                Notify_Email::_send($nama_user,'capella.zoom@gmail.com',$subj,$message_o);

                $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Booking:Link Zoom')->find_one();
                $f = ORM::for_table('sys_users','dblogin')->find_one($user['id']);
                
                $subject = new Template($e['subject']);
                $subject->set('business_name', $config['CompanyName']);
                $subj = $subject->output();
                $message = new Template($e['message']);
                $message->set('business_name', $config['CompanyName']);
                $message->set('name', $f['fullname']);
                $message->set('link_zoom', $linkmeeting);
                $message_o = $message->output();
                Notify_Email::_send($f['fullname'],$f['username'],$subj,$message_o);
                echo "Email berhasil dikirim";
                
                ORM::get_db('dblogin')->commit();
                $cid = $d->id();
                _log('Tambah Booking Zoom [CID: '.$cid.']','Admin',$user['id']);
                $_SESSION['ntype']='s' ; $_SESSION['notify']='Meeting berhasil dibooking, link meeting akan dikirim melalui email atau Get Link';
                echo '<script>window.location = "'.U.$myCtrl.'/list'.'"</script>';
            }
            catch(PDOException $ex) {
				ORM::get_db('dblogin')->rollBack();
				throw $ex;
			}
        }
        else{
            echo $msg;
           // $start_time = str_replace(" ", "T", $tanggal_meeting);
           // echo $start_time;
            
            
        }
        break;
    
    case 'addPinjaman-post':
        Event::trigger('book_zoom/addPinjaman-post/');
        $subjek = 'Pinjam Barang Inventaris';
        $direksi = '';
        $tanggal_meeting = _post('tanggal_meeting');
        $waktu_meeting = _post('waktu_meeting');
        $durasi = _post('durasi');
        $pinjam = $_POST['pinjaman'];
        $pinjaman = "";
        
        foreach($pinjam as $p){
            $pinjaman .= $p . ", ";
        }
        $msg = '';
        if($tanggal_meeting == ''){
            $msg .= 'Tanggal meeting tidak boleh kosong <br>';
        }
        $tanggal_meeting .= " ".$waktu_meeting;
        if($waktu_meeting == ''){
            $msg .= 'Waktu meeting tidak boleh kosong <br>';
        }
        if($durasi == ''){
            $msg .= 'Durasi meeting tidak boleh kosong <br>';
        }
        if($pinjaman == ''){
            $msg .= 'Barang pinjaman tidak boleh kosong <br>';
        }
        if(cekPinjaman($tanggal_meeting, $durasi, $pinjam)) {
            $msg .= 'Sudah terdapat pinjaman pada waktu yang dipilih, harap ganti waktu pinjaman <br>';
        }
        if($msg == ''){
            ORM::get_db('dblogin')->beginTransaction();
			try {
                $d = ORM::for_table('daftar_booking_zoom','dblogin')->create();
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
                _log('Tambah Booking Zoom [CID: '.$cid.']','Admin',$user['id']);
                $_SESSION['ntype']='s' ; $_SESSION['notify']='Pinjaman Berhasil Ditambahkan';
                echo '<script>window.location = "'.U.$myCtrl.'/pinjaman'.'"</script>';
            }
            catch(PDOException $ex) {
				ORM::get_db('dblogin')->rollBack();
				throw $ex;
			}
        }
        else{
            echo $msg;
        }
        break;    
        
    case 'kirimemail':
        $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Booking:Booking Zoom')->find_one();

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
        
        echo Notify_Email::_send('Tes','capella.zoom@gmail.com',$subj,$message_o);
        
        break;
        
    case 'edit':
        Event::trigger('book_zoom/edit/');
        $cid = $routes['2'];
        $d = ORM::for_table('daftar_booking_zoom','dblogin')->join('sys_users',array('daftar_booking_zoom.user_id', '=', 'sys_users.id'))->find_one($cid);
        if($d['user_id'] != $user['id']){
            _auth1('ADD-ZOOM-LINK',$user['id']);
        }
        
//        echo "<script type='text/javascript'>alert('$user_id');</script>";
        if($d){
			$ui->assign('_sysfrm_menu1', 'listbook_zoom');
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css('s2/css/select2.min'));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','ckeditor/ckeditor','s2/js/i18n/'.lan(),'edit-book-zoom')));
			$ui->assign('xjq', '
			 $("#country").select2({
			 theme: "bootstrap"
			 });
			 ');
            $ui->display('edit-book-zoom.tpl');
        }
        break;
        
    case 'edit-post':
        Event::trigger('book_zoom/edit-post/');
        _auth1('ADD-ZOOM-LINK',$user['id']);
        $id = _post('cid');
        $subjek = _post('subjek');
        $link_zoom = _post('link_zoom');
        $d = ORM::for_table('daftar_booking_zoom','dblogin')->find_one($id);
        $id_user = $d['user_id'];
        if($d){
            $msg = '';
            if($subjek == ''){
                $msg .= 'Subjek Meeting tidak boleh kosong <br>';
            }
            if($link_zoom == ''){
                $msg .= 'Link Zoom tidak boleh kosong <br>';
            }
            if($msg == ''){
                ORM::get_db('dblogin')->beginTransaction();
			    try {
                    
                    $d = ORM::for_table('daftar_booking_zoom','dblogin')->find_one($id);
                    $d->subjek = $subjek;
                    $d->link_zoom = $link_zoom;
                    $d->save();
                    ORM::get_db('dblogin')->commit();
                    $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Booking:Link Zoom')->find_one();
                    $f = ORM::for_table('sys_users','dblogin')->find_one($id_user);
                    
                    $subject = new Template($e['subject']);
                    $subject->set('business_name', $config['CompanyName']);
                    $subj = $subject->output();
                    $message = new Template($e['message']);
                    $message->set('business_name', $config['CompanyName']);
                    $message->set('name', $f['fullname']);
                    $message->set('link_zoom', $link_zoom);
                    $message_o = $message->output();
                    Notify_Email::_send($f['fullname'],$f['username'],$subj,$message_o);
                    echo "Email berhasil dikirim";
                    
                }
                catch(PDOException $ex) {
                    ORM::get_db('dblogin')->rollBack();
                    throw $ex;
                }
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list', 'e', 'Booking tersebut tidak ditemukan');
        }
        break;
        
    case 'cancel':
        Event::trigger('book_zoom/cancel/');
        $id = $routes['2'];
        $d = ORM::for_table('daftar_booking_zoom','dblogin')->find_one($id);
        
        if($d['user_id'] != $user['id']){
            _auth1('CANCEL-BOOKING-ZOOM',$user['id']);
        }
        if($d){
            ORM::get_db('dblogin')->beginTransaction();
            try {
                
                $d->status = "CANCEL";
                 //delete zoom meeting API
                $meeting_id = $d->get('meeting_id');
                delete_meeting($meeting_id);
                $d->save();
                ORM::get_db('dblogin')->commit();
                r2(U.$myCtrl.'/list', 'e', 'Booking telah di Cancel');
               

                
            }
            catch(PDOException $ex) {
                ORM::get_db('dblogin')->rollBack();
                throw $ex;
            }
        }else{
            r2(U.$myCtrl.'/list', 'e', 'Booking tersebut tidak ditemukan');
        }
        break;
    case 'cancelPinjaman':
        Event::trigger('book_zoom/cancelPinjaman/');
        $id = $routes['2'];
        $d = ORM::for_table('daftar_booking_zoom','dblogin')->find_one($id);
        if($d['user_id'] != $user['id']){
            _auth1('CANCEL-BOOKING-ZOOM',$user['id']);
        }
        if($d){
            ORM::get_db('dblogin')->beginTransaction();
            try {
                $d->status = "CANCEL";
                $d->save();
                ORM::get_db('dblogin')->commit();
                r2(U.$myCtrl.'/pinjaman', 'e', 'Pinjaman telah di Cancel');
            }
            catch(PDOException $ex) {
                ORM::get_db('dblogin')->rollBack();
                throw $ex;
            }
        }else{
            r2(U.$myCtrl.'/pinjaman', 'e', 'Pinjaman tersebut tidak ditemukan');
        }
        break;
    default:
        echo 'action not defined';
}