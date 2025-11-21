<?php

Class Notify_Email
{


    protected $contents;
    protected $values = array();

    public static function _init($config_id = 1)
    {
        global $config;
        $sysEmail = $config['sysEmail'];
        $sysCompany = $config['CompanyName'];
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
		$mail->SMTPDebug = 0;
        //check for smtp
        $e = ORM::for_table('sys_emailconfig','dblogin')->find_one($config_id);
        if($e && $e['method'] == 'smtp'){
            $mail->IsSMTP();
			$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
            $mail->Host = $e['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $e['username'];
            $mail->Password = $e['password'];
            $mail->SMTPSecure = $e['secure'];
            $mail->Port = $e['port'];
            // Set from address based on config
            $mail->SetFrom($e['username'], $sysCompany);
        } else {
            $mail->SetFrom($sysEmail, $sysCompany);
        }
        //$mail->AddReplyTo($sysEmail, $sysCompany);
        return $mail;
    }


    public static function _log($userid, $email, $subject, $message, $iid='0', $status='success', $error_message='', $sender_email='')
    {
        $date = date('Y-m-d H:i:s');
        $d = ORM::for_table('sys_email_logs','dblogin')->create();
        $d->userid = $userid;
        $d->sender = $sender_email;
        $d->email = $email;
        $d->subject = $subject;
        $d->message = $message;
        $d->date = $date;
        $d->iid = $iid;
        $d->status = $status;
        $d->error_message = $error_message;
        $d->save();
        $id = $d->id();
        return $id;

    }


    public static function _send($name,$to,$subject,$message,$attach='',$uid='0',$iid='0'){
        // Cek email terakhir untuk menentukan config mana yang akan digunakan
        $last_email_log = ORM::for_table('sys_email_logs','dblogin')
            ->order_by_desc('date')
            ->limit(1)
            ->find_one();
        
        $primary_config = 1; // capella.zoom@gmail.com (ID 1)
        $backup_config = 2;  // capellamiro@gmail.com (ID 2)
        
        // Tentukan config yang akan digunakan berdasarkan log terakhir
        $config_to_use = $primary_config;
        if($last_email_log && $last_email_log['status'] == 'failed') {
            // Jika email terakhir gagal, gunakan config alternatif
            $sender_last = $last_email_log['sender'];
            if(strpos($sender_last, 'capella.zoom@gmail.com') !== false) {
                $config_to_use = $backup_config; // Gunakan capellamiro@gmail.com
                error_log("Last email from capella.zoom failed, switching to capellamiro");
            } else {
                $config_to_use = $primary_config; // Kembali ke capella.zoom@gmail.com
                error_log("Last email from capellamiro failed, switching back to capella.zoom");
            }
        }
        
        error_log("Starting email send with Config ID: $config_to_use");
        
        // Coba kirim dengan config pertama
        $result = self::_try_send($name, $to, $subject, $message, $attach, $uid, $iid, $config_to_use);
        
        // Jika gagal, coba dengan config alternatif
        if(!$result['success']) {
            $alternative_config = ($config_to_use == $primary_config) ? $backup_config : $primary_config;
            error_log("First attempt failed, trying alternative Config ID: $alternative_config");
            $result = self::_try_send($name, $to, $subject, $message, $attach, $uid, $iid, $alternative_config);
        }
        
        return $result['message'];
    }
    
    private static function _try_send($name, $to, $subject, $message, $attach, $uid, $iid, $config_id) {
        $mail = self::_init($config_id);
        $mail->AddAddress($to, $name);
		$mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        
        // Get sender email for logging
        $email_config = ORM::for_table('sys_emailconfig','dblogin')->find_one($config_id);
        $sender_email = $email_config ? $email_config['username'] : 'unknown';
        
        // Debug: Log which config is being used
        error_log("Email Config ID: $config_id, Sender: $sender_email");
        
        global $_app_stage;
		if($attach <> '') {
			if(is_array($attach)) {
				foreach($attach as $item) {
					$mail->addAttachment($item);
				}
			} else {
                $mail->addAttachment($attach);
			}
		}
        
        $success = false;
        $error_msg = '';
        $msg = '';
        
		if($mail->send()) {
			$success = true;
			$msg = "Berhasil kirim Email dari: " . $sender_email;
            self::_log($uid, $to, $subject, $message, $iid, 'success', '', $sender_email);
		} else {
			$error_msg = $mail->ErrorInfo;
			$msg = "Error dari " . $sender_email . ": " . $error_msg;
            self::_log($uid, $to, $subject, $message, $iid, 'failed', $error_msg, $sender_email);
		}

		$mail->ClearAllRecipients();
		$mail->ClearReplyTos();
		
		return array(
		    'success' => $success,
		    'message' => $msg,
		    'error' => $error_msg
		);
    }

    public static function _test()
    {
        $mail = self::_init();
        $email = 'donotreply@bdinfosys.com';
        $mail_subject = 'Test Email';
        $name = 'Razib';
        $body = 'Hello this is test email body';
        $mail->AddAddress($email, $name);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();

    }

    public static function _otp($otp,$name,$email)
    {
        $mail = self::_init();
        global $config;

        $sysCompany = $config['CompanyName'];
        $mail_subject = $sysCompany . ' OTP (One Time Password)';

        $body = 'Your '.$sysCompany.' password has been verified and OTP is required to proceed further. Your current session OTP is '.$otp.' and only valid for this session. If you didn\'t login, please contact us immediately.';
        $mail->AddAddress($email, $name);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();

    }

   

   }