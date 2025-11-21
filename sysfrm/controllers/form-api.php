<?php
ORM::configure("mysql:host=localhost;dbname=cmportal_form");
ORM::configure('username', 'root');
ORM::configure('password', '');
$action = $routes[1];
switch ($action) {
    case 'approve-form':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);    
        $d = ORM::for_table('daftar_response')->find_one($v_uid);
        $kode = $d['kode_form'];
        $status_approve = 0;
        if($d){
            $kepada = explode(',',$d['approval_by']);
            $approval = explode(',',$d['approval_status']);
            $tanggal = explode(',',$d['approval_date']);
            $approve_token = explode(',',$d['approve_key']);
            $reject_token = explode(',',$d['reject_key']);
            $comment_token = explode(',',$d['comment_key']);
            $comment = explode(',',$d['comment']);
            $index = 0;
            foreach($approve_token as $k){
                if($v_token == $k){
                    $approval[$index] = 'Approved';
                    $tanggal[$index] = date('Y-m-d H:i:s');
                    $d->approval_status = implode(',',$approval);
                    $d->approval_date = implode(',',$tanggal);
                    
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
                    $isi_jawaban = explode('|', $d['value']);
                    $isi_pertanyaan = explode('|', $d['question']);
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
                    $status = 0;
                    foreach($approval as $l){
                        if($l == 'In Progress') $status = 1;
                    }
                    if($status == 0){
                        $d->status = 'Approved';
                        $d->approve_key = '';
                        $d->reject_key = '';
                        $d->comment_key = '';
                        $target = $d['user_id'];
                        $d->save();
                        
                        // Send Email to Requester
                        $approval_content = '
                            <table style="width: 100%;">
                                <tr style="text-align: left; font-size:9pt;">
                                    <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                    <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approved</th>
                                </tr>';
                        $i = 0;
                        foreach($approval as $item){
                            $approval_content .= '
                                <tr style="text-align: left; font-size:9pt;">
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $kepada[$i] .'</th>
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
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
                        $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Form:Approval')->find_one();
                        $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                        $subject = new Template($e['subject']);
                        $subject->set('business_name', $config['CompanyName']);
                        $subject->set('status', 'Approved');
                        $subject->set('id_status', $v_uid);
                        $subj = $subject->output();
                        $message = new Template($e['message']);
                        $message->set('business_name', $config['CompanyName']);
                        $message->set('request_id', $v_uid);
                        $message->set('status', 'Approved');
                        $message->set('tanggal', date('d F Y'));
                        $message->set('title', $f['nama_form']);
                        $message->set('content', $content);
                        $message->set('approval_content', $approval_content);
                        $message_o = $message->output();
                        Notify_Email::_send($target,$target,$subj,$message_o);
                    } else {
                        $d->save();
                        // Send Email to Approval
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
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $kepada[$i] .'</th>
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
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
                        $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                        $j = $index + 1;
                        $subject = new Template($e['subject']);
                        $subject->set('business_name', $config['CompanyName']);
                        $subj = $subject->output();
                        $message = new Template($e['message']);
                        $message->set('business_name', $config['CompanyName']);
                        $message->set('request_id', $v_uid);
                        $message->set('tanggal', date('d F Y'));
                        $message->set('title', $f['nama_form']);
                        $message->set('content', $content);
                        $message->set('approval_content', $approval_content);
                        $linkcomment = APP_URL.'/?ng=form-api/comment-form/'.$v_uid.'/token_'.$comment_token[$j];
                        $linkapprove = APP_URL.'/?ng=form-api/approve-form/'.$v_uid.'/token_'.$approve_token[$j];
                        $linkreject = APP_URL.'/?ng=form-api/reject-form/'.$v_uid.'/token_'.$reject_token[$j];
                        $message->set('link_comment', $linkcomment);
                        $message->set('link_approve', $linkapprove);
                        $message->set('link_reject', $linkreject);
                        $message_o = $message->output();
                        Notify_Email::_send($kepada[$j],$kepada[$j],$subj,$message_o);
                    }
                    $status_approve = 1;
                    echo 'Form berhasil di approve';
                }
                $index++;
            }
        } else {
            echo 'Kode Approval tidak ditemukan';
        }
        if($status_approve == 0){
            echo 'Kode Approval tidak valid';
        }
    break;

    case 'reject-form':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);    
        $d = ORM::for_table('daftar_response')->find_one($v_uid);
        $kode = $d['kode_form'];
        $status_approve = 0;
        if($d){
            $kepada = explode(',',$d['approval_by']);
            $approval = explode(',',$d['approval_status']);
            $tanggal = explode(',',$d['approval_date']);
            $approve_token = explode(',',$d['approve_key']);
            $reject_token = explode(',',$d['reject_key']);
            $comment_token = explode(',',$d['comment_key']);
            $comment = explode(',',$d['comment']);
            $index = 0;
            foreach($reject_token as $k){
                if($v_token == $k){
                    $approval[$index] = 'Rejected';
                    $tanggal[$index] = date('Y-m-d H:i:s');
                    $d->approval_status = implode(',',$approval);
                    $d->approval_date = implode(',',$tanggal);
                    
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
                    $isi_jawaban = explode('|', $d['value']);
                    $isi_pertanyaan = explode('|', $d['question']);
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
                    $d->status = 'Rejected';
                    $d->approve_key = '';
                    $d->reject_key = '';
                    $d->comment_key = '';
                    $target = $d['user_id'];
                    $d->save();
                    
                    // Send Email to Requester
                    $approval_content = '
                        <table style="width: 100%;">
                            <tr style="text-align: left; font-size:9pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Rejected</th>
                            </tr>';
                    $i = 0;
                    foreach($approval as $item){
                        $approval_content .= '
                            <tr style="text-align: left; font-size:9pt;">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $kepada[$i] .'</th>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
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
                    $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Form:Approval')->find_one();
                    $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                    $subject = new Template($e['subject']);
                    $subject->set('business_name', $config['CompanyName']);
                    $subject->set('status', 'Rejected');
                    $subject->set('id_status', $v_uid);
                    $subj = $subject->output();
                    $message = new Template($e['message']);
                    $message->set('business_name', $config['CompanyName']);
                    $message->set('request_id', $v_uid);
                    $message->set('status', 'Rejected');
                    $message->set('tanggal', date('d F Y'));
                    $message->set('title', $f['nama_form']);
                    $message->set('content', $content);
                    $message->set('approval_content', $approval_content);
                    $message_o = $message->output();
                    Notify_Email::_send($target,$target,$subj,$message_o);
                    $status_approve = 1;
                    echo 'Form berhasil di reject';
                }
                $index++;
            }
        } else {
            echo 'Kode Approval tidak ditemukan';
        }
        if($status_approve == 0){
            echo 'Kode Approval tidak valid';
        }
    break;

    case 'comment-form':
        $v_uid = $routes[2];
        $v_token = $routes[3];
        $v_token = str_replace('token_','',$v_token);
        $d = ORM::for_table('daftar_response')->find_one($v_uid);
        $status_approve = 0;
        $comment_token = explode(',',$d['comment_key']);
        if($d){
            foreach($comment_token as $k){
                if($v_token == $k) {
                    $status_approve = 1;
                    $ui->assign('_url', U);
                    $ui->assign('uid', $v_uid);
                    $ui->assign('token', $v_token);
                    $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','form-approval')));
                    $ui->display('form-approval.tpl');
                }
            }
        } else {
            echo 'Kode Approval tidak ditemukan';
        }
        if($status_approve == 0){
            echo 'Kode Approval tidak valid';
        }
    break;

    case 'comment-approve-form':
        $v_uid = _post('uid');
        $v_token = _post('token');
        $isi = _post('isi');
        $d = ORM::for_table('daftar_response')->find_one($v_uid);
        $kode = $d['kode_form'];
        $status_approve = 0;
        
        if($d){
            $kepada = explode(',',$d['approval_by']);
            $approval = explode(',',$d['approval_status']);
            $tanggal = explode(',',$d['approval_date']);
            $approve_token = explode(',',$d['approve_key']);
            $reject_token = explode(',',$d['reject_key']);
            $comment_token = explode(',',$d['comment_key']);
            $comment = explode(',',$d['comment']);
            $index = 0;
            foreach($comment_token as $k){
                if($v_token == $k){
                    $approval[$index] = 'Approved';
                    $tanggal[$index] = date('Y-m-d H:i:s');
                    $comment[$index] = $isi;
                    $d->approval_status = implode(',',$approval);
                    $d->approval_date = implode(',',$tanggal);
                    $d->comment = implode(',',$comment);

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
                    $isi_jawaban = explode('|', $d['value']);
                    $isi_pertanyaan = explode('|', $d['question']);
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
                    $status = 0;
                    foreach($approval as $l){
                        if($l == 'In Progress') $status = 1;
                    }
                    if($status == 0){
                        $d->status = 'Approved';
                        $d->approve_key = '';
                        $d->reject_key = '';
                        $d->comment_key = '';
                        $target = $d['user_id'];
                        $d->save();
                        
                        // Send Email to Requester
                        $approval_content = '
                            <table style="width: 100%;">
                                <tr style="text-align: left; font-size:9pt;">
                                    <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                    <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approved</th>
                                </tr>';
                        $i = 0;
                        foreach($approval as $item){
                            $approval_content .= '
                                <tr style="text-align: left; font-size:9pt;">
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $kepada[$i] .'</th>
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
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
                        $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Form:Approval')->find_one();
                        $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                        $subject = new Template($e['subject']);
                        $subject->set('business_name', $config['CompanyName']);
                        $subject->set('status', 'Approved');
                        $subject->set('id_status', $v_uid);
                        $subj = $subject->output();
                        $message = new Template($e['message']);
                        $message->set('business_name', $config['CompanyName']);
                        $message->set('request_id', $v_uid);
                        $message->set('status', 'Approved');
                        $message->set('tanggal', date('d F Y'));
                        $message->set('title', $f['nama_form']);
                        $message->set('content', $content);
                        $message->set('approval_content', $approval_content);
                        $message_o = $message->output();
                        Notify_Email::_send($target,$target,$subj,$message_o);
                    } else {
                        $d->save();
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
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $kepada[$i] .'</th>
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
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
                        $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                        $j = $index + 1;
                        $subject = new Template($e['subject']);
                        $subject->set('business_name', $config['CompanyName']);
                        $subj = $subject->output();
                        $message = new Template($e['message']);
                        $message->set('business_name', $config['CompanyName']);
                        $message->set('request_id', $v_uid);
                        $message->set('tanggal', date('d F Y'));
                        $message->set('title', $f['nama_form']);
                        $message->set('content', $content);
                        $message->set('approval_content', $approval_content);
                        $linkcomment = APP_URL.'/?ng=form-api/comment-form/'.$v_uid.'/token_'.$comment_token[$j];
                        $linkapprove = APP_URL.'/?ng=form-api/approve-form/'.$v_uid.'/token_'.$approve_token[$j];
                        $linkreject = APP_URL.'/?ng=form-api/reject-form/'.$v_uid.'/token_'.$reject_token[$j];
                        $message->set('link_comment', $linkcomment);
                        $message->set('link_approve', $linkapprove);
                        $message->set('link_reject', $linkreject);
                        $message_o = $message->output();
                        Notify_Email::_send($kepada[$j],$kepada[$j],$subj,$message_o);
                    }
                    $status_approve = 1;
                    echo json_encode('Form berhasil di approve');
                }
                $index++;
            }
        } else {
            echo json_encode('Kode Approval tidak ditemukan');
        }
        if($status_approve == 0){
            echo json_encode('Kode Approval tidak valid');
        }
    break;

    case 'comment-reject-form':
        $v_uid = _post('uid');
        $v_token = _post('token');
        $isi = _post('isi');   
        $d = ORM::for_table('daftar_response')->find_one($v_uid);
        $kode = $d['kode_form'];
        $status_approve = 0;
        if($d){
            $kepada = explode(',',$d['approval_by']);
            $approval = explode(',',$d['approval_status']);
            $tanggal = explode(',',$d['approval_date']);
            $approve_token = explode(',',$d['approve_key']);
            $reject_token = explode(',',$d['reject_key']);
            $comment_token = explode(',',$d['comment_key']);
            $comment = explode(',',$d['comment']);
            $index = 0;
            foreach($comment_token as $k){
                if($v_token == $k){
                    $approval[$index] = 'Rejected';
                    $tanggal[$index] = date('Y-m-d H:i:s');
                    $comment[$index] = $isi;
                    $d->approval_status = implode(',',$approval);
                    $d->approval_date = implode(',',$tanggal);
                    $d->comment = implode(',',$comment);
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
                    $isi_jawaban = explode('|', $d['value']);
                    $isi_pertanyaan = explode('|', $d['question']);
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
                    $d->status = 'Rejected';
                    $d->approve_key = '';
                    $d->reject_key = '';
                    $d->comment_key = '';
                    $target = $d['user_id'];
                    $d->save();
                    
                    // Send Email to Requester
                    $approval_content = '
                        <table style="width: 100%;">
                            <tr style="text-align: left; font-size:9pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Rejected</th>
                            </tr>';
                    $i = 0;
                    foreach($approval as $item){
                        $approval_content .= '
                            <tr style="text-align: left; font-size:9pt;">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $kepada[$i] .'</th>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">'. $item .'</th>
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
                    $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Form:Approval')->find_one();
                    $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                    $subject = new Template($e['subject']);
                    $subject->set('business_name', $config['CompanyName']);
                    $subject->set('status', 'Rejected');
                    $subject->set('id_status', $v_uid);
                    $subj = $subject->output();
                    $message = new Template($e['message']);
                    $message->set('business_name', $config['CompanyName']);
                    $message->set('request_id', $v_uid);
                    $message->set('status', 'Rejected');
                    $message->set('tanggal', date('d F Y'));
                    $message->set('title', $f['nama_form']);
                    $message->set('content', $content);
                    $message->set('approval_content', $approval_content);
                    $message_o = $message->output();
                    Notify_Email::_send($target,$target,$subj,$message_o);
                    $status_approve = 1;
                    
                    echo json_encode('Form berhasil di reject');
                }
                $index++;
            }
        } else {
            
            echo json_encode('Kode Approval tidak ditemukan');
        }
        if($status_approve == 0){
            
            echo json_encode('Kode Approval tidak valid');
        }
    break;

    default:
        echo 'action not defined';
}