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
$file_build = '3600';
if (isset($routes['1'])) {
    $do = $routes['1'];
} else {
    $do = 'login-display';
}
switch($do){
    case 'post':
        $username = _post('username');
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = addslashes($username);
        $password = _post('password');
        $password = addslashes($password);
		$company = _post('company');
        if($company == ''){
            _msglog('e','Perusahaan belum dipilih');
            r2(U.'login/');
        }
        if($username != '' AND $password != '') {// and $company != ''){
            $d = ORM::for_table('sys_users','dblogin')->where('username',$username)->find_one();
            if($d){
                $d_pass = $d['password'];
                if($d['status'] == 'Active'){
                    if(Password::_verify($password,$d_pass) == true){
                        //Now check if OTP is enabled
                        if($d['otp'] == 'Yes'){
                            Otp::make($d['id']);
                            $_SESSION['tuid'] = $d['id'];

                            r2(U.'otp');
                        }
                        else{
                            $_SESSION['uid'] = $d['id'];
                            $d->last_login = date('Y-m-d H:i:s');
                            $d->save();
                            //login log
                            $_SESSION['comp'] = $company;
                            $e = ORM::for_table('sys_company','dblogin')->where('id', $company)->find_one();
                            if ($e) {
                                $_SESSION['ncomp'] = $e['company'];
                                // $_SESSION['dbname'] = $e['database_name'];
                            }
                            else {
                                $_SESSION['ncomp'] = 'No. Company';
                                // $_SESSION['dbname'] = '';
                            }
                            $_SESSION['timeout'] = time();

                            _log($_L['Login Successful'].' '.$username,'Admin',$d['id']);
                           // setcookie("tplsub", 'material', time()+15552000);
                            if(!isset($config['build']) OR ($config['build'] < $file_build)){
                                r2(U.'update/');
                            }
                            else{
                                $rd = $config['redirect_url'].'/';
                            }


    //                if ((isset($routes['2'])) AND (($routes['2'] != ''))){
    //                    $rd =  $routes['2'];
    //                    exit($rd);
    //                }

                            r2(U.$rd);
                        }

                    }
                    else{
                        _msglog('e',$_L['Invalid Username or Password']);
                        _log($_L['Failed Login'].' '.$username,'Admin');
                        r2(U.'login/');
                    }
                }
                else {
                    _msglog('e','Account is Inactive');
                    r2(U.'login/');
                }
                
            }
            else{
				_msglog('e',$_L['Invalid Username or Password']);
				r2(U.'login/');
            }
        }

        else{
			// if($username != '' and $password != '') {
				// _msglog('e','Belum memilih perusahaan');
				// r2(U.'login/');
			// }
			// else {
				_msglog('e',$_L['Invalid Username or Password']);
				r2(U.'login/');
			// }
        }


        break;

    case 'login-display':
        $ui->display('login.tpl');
        break;
    
    case 'register':
        $d = ORM::for_table('daftar_department','dblogin')->find_many();
		$dlist = '';
		foreach($d as $item) {
			$dlist .= '<option value="'.$item["kode_dept"].'">'.$item["nama_dept"].'</option>';
		}
		$ui->assign('department',$dlist);
		$ui->assign('_url', U);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','register')));
        $ui->display('register.tpl');
        break;
        
    case 'register-post':
        $username = _post('username');
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = addslashes($username);
        $fullname = _post('fullname');
        $emp = _post('emp');
        $password = _post('password');
        $password = addslashes($password);
        $cpassword = _post('cpassword');
        $department = _post('department');
        $atasan = _post('atasan');
        $pin = generateRandomString(24);
        for ($xx = 0; $xx < 100; $xx++) {
            $cari = ORM::for_table('sys_users','dblogin')->where('pin',$pin)->find_one();
            if (!$cari) {
                break;
            } else {
                $pin = generateRandomString(24);
            }
        }
        $msg = '';
        if(Validator::Email($username) == false){
            $msg .= $_L['notice_email_as_username']. '<br>';
        }
        if(Validator::Length($fullname,26,2) == false){
            $msg .= 'Full Name should be between 3 to 25 characters'. '<br>';
        }
        if(!Validator::Length($password,15,5)){
            $msg .= 'Password should be between 6 to 15 characters'. '<br>';
        }
        if($password != $cpassword){
            $msg .= 'Passwords does not match'. '<br>';
        }
        //check department validation
        if($department == ''){
            $msg .= 'Department tidak boleh kosong'. '<br>';
        }
        if($emp == ''){
            $msg .= 'Employee Id tidak boleh kosong'. '<br>';
        }
        //check with same name account is exist
        $d = ORM::for_table('sys_users','dblogin')->where('username',$username)->find_one();
        if($d){
            $msg .= $_L['account_already_exist']. '<br>';
        }
        
        if($msg == ''){
            $password = Password::_crypt($password);
            $xkey = _raid('10');
            // Add Account
            ORM::get_db('dblogin')->beginTransaction();
			try {
                $d = ORM::for_table('sys_users','dblogin')->create();
                $d->username = $username;
                $d->password = $password;
                $d->fullname = $fullname;
                $d->user_type = 'Employee';
                $d->kode_dept = $department;
                $d->supervisor = $atasan;
                $d->emp_id = $emp;

                //others
                $d->phonenumber = '';
                $d->golongan = 1;
                $d->last_login = date('Y-m-d H:i:s');
                $d->creationdate = date('Y-m-d H:i:s');
               
                $d->img = '';
                $d->otp = 'No';
                $d->pin_enabled = 'No';
                $d->pin = $pin;
                $d->api = 'No';
                $d->pwresetkey = '';
                $d->keyexpire = '';
                $d->status = 'Inactive';
                $d->activekey = $xkey;
                
                //
                $d->save();
                ORM::get_db('dblogin')->commit();
                
                // $d = ORM::for_table('sys_users','dblogin')->where('username', $username)->find_one();
                // $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Admin:Activation Account Key')->find_one();
                // $subject = new Template($e['subject']);
                // $subject->set('business_name', $config['CompanyName']);
                // $subj = $subject->output();
                // $message = new Template($e['message']);
                // $message->set('name', $d['fullname']);
                // $message->set('business_name', $config['CompanyName']);
                // $message->set('activation_link', U.'login/activation-validate/'.$d['id'].'/token_'.$xkey);
                // $message->set('username', $d['username']);
                // $message_o = $message->output();
                // Notify_Email::_send($d['fullname'],$d['username'],$subj,$message_o);
                
                r2(U . 'login/register', 's', 'Akun berhasil register, menunggu admin untuk mengaktivasi akun anda');
            }
            catch(PDOException $ex) {
				ORM::get_db('dblogin')->rollBack();
				throw $ex;
			}
        }
        else{
            r2(U . 'login/register/', 'e', $msg);
        }
        break;
        
    case 'department':
        $department = _post('department');
        $d = ORM::for_table('daftar_department','dblogin')->find_one($department);
		if($d)
			echo $d['atasan'];
		else
			echo '';
        break;
    
    case 'forgot-pw':
        $ui->display('forgot-pw.tpl');
        break;
        
    

    case 'forgot-pw-post':
        $username = _post('username');
        $d = ORM::for_table('sys_users','dblogin')->where('username', $username)->find_one();
        if ($d) {

            $xkey = _raid('10');
            $d->pwresetkey = $xkey;
            $d->keyexpire = time() + 3600;

            $d->save();

            $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Admin:Password Change Request')->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('password_reset_link', U.'login/pwreset-validate/'.$d['id'].'/token_'.$xkey);
            $message->set('username', $d['username']);
            $message->set('ip_address', $_SERVER["REMOTE_ADDR"]);
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'],$d['username'],$subj,$message_o);

            _msglog('s',$_L['Check your email to reset Password']);

            r2(U.'login/');

        } else {
            _msglog('e',$_L['User Not Found'].'!');

            r2(U.'login/forgot-pw/');
        }

        break;

    case 'pwreset-validate':

        $v_uid = $routes['2'];
        $v_token = $routes['3'];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('sys_users','dblogin')->find_one($v_uid);

        if($d){

            $d_token = $d['pwresetkey'];
            if($v_token != $d_token){
                r2(U.'login/','e',$_L['Invalid Password Reset Key'].'!');
            }
            $keyexpire = $d['keyexpire'];
            $ctime = time();
            if ($ctime > $keyexpire) {
                r2(U.'login/','e',$_L['Password Reset Key Expired']);
            }
            $password = _raid('6');
            $npassword = Password::_crypt($password);

            $d->password = $npassword;
            $d->pwresetkey = '';
            $d->keyexpire = '0';
            $d->save();

            $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Admin:New Password')->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('login_url', U.'login/');
            $message->set('username', $d['username']);
            $message->set('password', $password);
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'],$d['username'],$subj,$message_o);

            _msglog('s','Password baru telah dikirim. Cek Email anda');

            r2(U.'login/');

        }

        break;

    case 'activation-validate':

        $v_uid = $routes['2'];
        $v_token = $routes['3'];
        $v_token = str_replace('token_','',$v_token);
        
        $d = ORM::for_table('sys_users','dblogin')->find_one($v_uid);
        if($d){
            $d_token = $d['activekey'];
            if($v_token != $d_token){
                r2(U.'login/','e','Invalid Activation Key');
            }
            $d->status = 'Active';
            $d->activekey = '';
            $d->save();

            $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Admin:Activation Account')->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('username', $d['username']);
            $message->set('login_url', U.'login/');
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'],$d['username'],$subj,$message_o);
            
            _msglog('s','Aktivasi Akun Berhasil');

            r2(U.'login/');

        }

        break;
    case 'render-dept':

        $dept = _post('dept');
        if($dept <> '') {
			$y = ORM::for_table('daftar_department','dblogin')->where('kode_dept',$dept)->find_one();
            $opt = $y['atasan'];
			echo json_encode($opt);
		} else {
			$opt = '';
			echo json_encode($opt);
		}
		
        break;

    default:
		$d = ORM::for_table('sys_company','dblogin')->find_many();
		$clist = '';
		foreach($d as $item) {
			$clist .= '<option value="'.$item["id"].'"'.($item['id']==1 ? ' selected=selected' : '').'>'.$item["company"].'</option>';
		}
		$ui->assign('company',$clist);
        
        
        $ui->display('login.tpl');
        break;
}

