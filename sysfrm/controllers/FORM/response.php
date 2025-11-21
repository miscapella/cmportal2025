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
    $myCtrl = 'Form';
}
_auth();
$ui->assign('_sysfrm_menu', 'response');
$ui->assign('_title', 'Form Response - '. $config['CompanyName']);
$ui->assign('_st', 'Form Response');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

function changeFormat($tanggal_waktu) {
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('Y-m-d 00:00:00', $tanggal_timestamp);
    return $tanggal;
}

function changeFormat2($tanggal_waktu) {
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('Y-m-d 23:59:59', $tanggal_timestamp);
    return $tanggal;
}

switch ($action) {
    case 'list-form':
        Event::trigger('response/list-form/');
		_auth1('RESPONSE-FORM-LIST',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
        $ui->assign('_sysfrm_menu1', 'listresponse');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-form-response','numeric')));
        $ui->display($spath.'list-response.tpl');
        break;

    case 'list':
        Event::trigger('response/list/');
		_auth1('RESPONSE-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['4'];
        $uid = $routes['3'];
        $ui->assign('name',$name);
        $form = ORM::for_table('form_master')->find_one($uid);
        $kode = $form['kode_form'];
        $d = ORM::for_table('daftar_response')->where('kode_form', $kode)->order_by_desc('add_date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('form',$form);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu1', 'listresponse');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');    
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top', 'css/loader')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-form','numeric')));
        $ui->display($spath.'list-form-response.tpl');
        break;

    case 'list-detail':
        Event::trigger('response/list-detail/');
        _auth1('RESPONSE-LIST-DETAIL',$user['id']);
        $name = _post('name');
        $msg = $routes['4'];
        $uid = $routes['3'];
        $ui->assign('name',$name);
        $form = ORM::for_table('form_master')->find_one($uid);
        $kode = $form['kode_form'];
        $d = ORM::for_table('daftar_response')->where('kode_form', $kode)->order_by_desc('add_date')->find_many();
        
        $e = ORM::for_table('form_detail')->where('kode_form', $kode)->find_many();
        $hasil = '';
        $count = 0;
        foreach($e as $item){
            if(fmod($item['section'], 1) != 0){
                $hasil .= '<th style="text-align: center; vertical-align: middle;white-space: nowrap;">'.$item['pertanyaan'].'</th>';
                $count++;
            }
        }

        $ui->assign('d',$d);
        $ui->assign('msg',$msg);
        $ui->assign('form',$form);
        $ui->assign('count',$count);
        $ui->assign('hasil',$hasil);
        $ui->assign('_sysfrm_menu1', 'listresponse');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
    ');
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-form','numeric')));
        $ui->display($spath.'list-response-detail.tpl');
        break;

    case 'resends':
        $uid = _post('kode');
        $data = array(
            'msg'			=>	$uid);
        echo json_encode($data);
        break;
    
    case 'resend':
        $uid = _post('kode');
        $d = ORM::for_table('daftar_response')->find_one($uid);
        $isi_jawaban = explode('|',$d['value']);
        $isi_pertanyaan = explode('|',$d['question']);
        $approval = explode(',',$d['approval_by']);
        $approval_status = explode(',',$d['approval_status']);
        $comment_key = explode(',',$d['comment_key']);
        $approve_key = explode(',',$d['approve_key']);
        $reject_key = explode(',',$d['reject_key']);
        $comment = explode(',',$d['comment']);
        
        if($d['status'] != 'In Progress'){
            $data = array(
                'msg'			=>	'Tidak bisa resend email pada form yang telah di approve atau di reject');
            echo json_encode($data);
        } else {
            $index = 0;
            $target = '';
            foreach($approval_status as $x) {
                if($x == 'In Progress'){
                    $target = $approval[$index];
                    $commentkey = $comment_key[$index];
                    $approvekey = $approve_key[$index];
                    $rejectkey = $reject_key[$index];
                    break;
                }
                $index++;
            }
            $content = '
                <table style="width: 100%;">
                    <tr style="text-align: left; font-size:9pt;">
                        <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Respondent</th>
                        <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'.$d['fullname'].'</th>
                    </tr>
                    <tr style="font-size:9pt">
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Employee Id</td>
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'.$d['emp_id'].'</td>
                    </tr>
                    <tr style="font-size:9pt">
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Unit Usaha</td>
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $d['department'] .'</td>
                    </tr>';
            $i = 0;
            foreach($isi_jawaban as $item){
                if($item != ''){
                    $content .= '
                        <tr style="font-size:9pt">
                            <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $isi_pertanyaan[$i] .'</td>
                            <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</td>
                        </tr>
                    ';
                }
                $i++;
            }
            $content .= '
                </table>                    
            ';
            $approval_content = '
            <table style="width: 100%;">
                <tr style="text-align: left; font-size:9pt;">
                    <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                    <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">In Progress</th>
                </tr>';
            $i = 0;
            foreach($approval as $item){
                $approval_content .= '
                    <tr style="text-align: left; font-size:9pt;">
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $approval_status[$i] .'</th>
                    </tr>';
                if($comment[$i] != 'NULL'){
                    $approval_content .= '
                    <tr style="text-align: left; font-size:9pt;">
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Message</th>
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $comment[$i] .'</th>
                    </tr>';
                }
                $i++;
            }
            $approval_content .= '</table> ';
            $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Form:Request Approval')->find_one();
            $f = ORM::for_table('form_master')->where('kode_form', $d['kode_form'])->find_one();
            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('request_id', $d['id']);
            $message->set('tanggal', $d['add_date']);
            $message->set('title', $f['nama_form']);
            $message->set('content', $content);
            $message->set('approval_content', $approval_content);
            $linkcomment = APP_URL.'/?ng=form-api/comment-form/'.$d['id'].'/token_'.$commentkey;
            $linkapprove = APP_URL.'/?ng=form-api/approve-form/'.$d['id'].'/token_'.$approvekey;
            $linkreject = APP_URL.'/?ng=form-api/reject-form/'.$d['id'].'/token_'.$rejectkey;
            $message->set('link_comment', $linkcomment);
            $message->set('link_approve', $linkapprove);
            $message->set('link_reject', $linkreject);
            $message_o = $message->output();
            Notify_Email::_send($target,$target,$subj,$message_o);
            $msg = 'Form berhasil dikirim kepada ' . $target;
            $data = array(
                'msg'			=>	$msg);
            echo json_encode($data);
        }
        break;

    case 'render-status':
        $kode = _post('kode');
        if($kode <> '') {
            $y = ORM::for_table('daftar_response')->find_one($kode);
            if($y) {
                $data = array(
                        'approval'=>	$y['approval_by'],
                        'tanggal'=>	$y['approval_date'],
                        'status'	 =>	$y['approval_status'],
                        'comment'	 =>	$y['comment'],
                        'stat'      => $y['status']);
                echo json_encode($data);
            } else {
                $data = array(
                    'approval'	=>	'',
                    'tanggal'	=>	'',
                    'status'	=>	'',
                    'comment'	=>	'',
                    'stat'      => '');
                echo json_encode($data);
            }
        } else {
            $data = array(
                'approval'	=>	'',
                'tanggal'	=>	'',
                'status'	=>	'',
                'comment'	=>	'',
                'stat'      => '');
            echo json_encode($data);
        }
    break;

    case 'render-response':
        $kode = _post('kode');
        if($kode <> '') {
            $y = ORM::for_table('daftar_response')->find_one($kode);
            if($y) {
                $data = array(
                        'question'=>	$y['question'],
                        'value'=>	$y['value'],
                        'approval'=> $y['approval_by'],
                        'tanggal'=>	$y['approval_date'],
                        'status'=> $y['approval_status'],
                        'message'=> $y['comment']);
                echo json_encode($data);
            } else {
                $data = array(
                    'question'	=>	'',
                    'value'	=>	'',
                    'approval'=> '',
                    'tanggal'	=>	'',
                    'status'=> '',
                    'message'=>'');
                echo json_encode($data);
            }
        } else {
            $data = array(
                'question'	=>	'',
                'value'	=>	'',
                'approval'=> '',
                'tanggal'	=>	'',
                'status'=> '',
                'message'=>'');
            echo json_encode($data);
        }
    break;

    case 'laporan':
        Event::trigger('response/laporan/');
        _auth1('RESPONSE-LAPORAN',$user['id']);
        $today = date('d F Y');
        $opt = '';
        if($user['user_type'] == 'Admin'){
            $form = ORM::for_table('form_master')->order_by_asc('kode_form')->find_many();
        } else {
            $dept = '%'. $user['kode_dept'] . '%';
            $form = ORM::for_table('form_master')->where_like('kode_form', $dept)->order_by_asc('kode_form')->find_many();
        }
        
        foreach($form as $item){
            $opt .= '<option value="'.$item["id"].'">'.$item["kode_form"].'</option>';
        }
        $ui->assign('today',$today);
        $ui->assign('opt',$opt);
        $ui->assign('_sysfrm_menu1', 'exportresponse');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'laporan','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'laporan.tpl');
        break;

    case 'export':
        $uid = _post('kode_form');
        $tipe = _post('type');
        $dari = _post('dari');
        $sampai = _post('sampai');
        $tanggal_dari = changeFormat($dari);
        $tanggal_sampai = changeFormat2($sampai);
        $data = [];
        $headers = [];
        $form = ORM::for_table('form_master')->find_one($uid);
        $filename = $form['nama_form'];
        $kode = $form['kode_form'];
        $d = ORM::for_table('daftar_response')->raw_query("select * from daftar_response where kode_form = '". $kode ."' and add_date >= '". $tanggal_dari ."' and add_date <= '". $tanggal_sampai ."' order by add_date asc")->find_many();
        $e = ORM::for_table('form_detail')->where('kode_form', $kode)->find_many();
        array_push($headers, 'Kode Form');
        array_push($headers, 'Employee Id');
        array_push($headers, 'Respondent');
        array_push($headers, 'Unit Usaha');
        array_push($headers, 'Tanggal');
        array_push($headers, 'Status');
        foreach($e as $item){
            if(fmod($item['section'], 1) != 0){
                array_push($headers, $item['pertanyaan']);
            }
        }
        foreach($d as $items){
            $jawaban = [];
            array_push($jawaban, $items['kode_form']);
            array_push($jawaban, $items['emp_id']);
            array_push($jawaban, $items['fullname']);
            array_push($jawaban, $items['department']);
            $tanggal = explode(' ',$items['add_date']);
            $hari = explode('-',$tanggal[0]);
            $waktu = explode(':',$tanggal[1]);
            $tgl = $hari[2] .'-'. $hari[1] .'-'. $hari[0] .' '. $waktu[0] .':'. $waktu[1];
            array_push($jawaban, $tgl);
            array_push($jawaban, $items['status']);
            $jawaban2 = explode('|',$items['value']);
            $hasil = array_merge($jawaban,$jawaban2);
            array_push($data, $hasil);
        }
        _phpspreadsheet($filename, $data, $headers, $tipe);
    break;

    default:
        echo 'action not defined';
}