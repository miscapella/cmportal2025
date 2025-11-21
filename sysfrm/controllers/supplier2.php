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
    $myCtrl = 'supplier';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Supplier - '. $config['CompanyName']);
$ui->assign('_st', 'Supplier');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'add':

		_auth1('SUPPLIER-ADD',$user['id']);
        Event::trigger('supplier/add/');

        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']

        $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
        $ui->assign('fs',$fs);


//        $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="ui/lib/s2/css/select2.min.css"/>
//');
		$ui->assign('_sysfrm_menu1', 'contact');
		$ui->assign('_sysfrm_menu2', 'addsupp');
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'add-supplier')));
        $tags = Tags::get_all('supplier');
        $ui->assign('tags',$tags);
        $ui->assign('xjq', '
 $("#country").select2({
 theme: "bootstrap"
 });
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
 ');



        $ui->display('add-supplier.tpl');






        break;

    case 'summary':


        Event::trigger('supplier/summary/');


        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ti = ORM::for_table('sys_transactions')
                ->where('payerid',$cid)
                ->sum('cr');
            if($ti == ''){
                $ti = '0';
            }
            $ui->assign('ti',$ti);
            $te = ORM::for_table('sys_transactions')
                ->where('payeeid',$cid)
                ->sum('dr');
            if($te == ''){
                $te = '0';
            }

            $ui->assign('te',$te);
            $ui->assign('d',$d);

            $cf = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
            $ui->assign('cf',$cf);

            $ui->display('ajax.supplier-summary.tpl');
        }
        else{

        }


        break;

    case 'activity':

        Event::trigger('supplier/activity/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ac = ORM::for_table('sys_activity')->where('cid',$cid)->limit(20)->order_by_desc('id')->find_many();
            $ui->assign('ac',$ac);
            $ui->display('ajax.supplier-activity.tpl');
        }
        else{

        }


        break;


    case 'invoices':

        Event::trigger('supplier/invoices/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
$i = ORM::for_table('sys_invoices')->where('userid',$cid)->find_many();
            $ui->assign('i',$i);
            $ui->display('ajax.supplier-invoices.tpl');
        }
        else{

        }


        break;


    case 'transactions':

        Event::trigger('supplier/transactions/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $tr = ORM::for_table('sys_transactions')
                ->where_raw('(`payerid` = ? OR `payeeid` = ?)', array($cid, $cid))
                ->order_by_desc('id')->find_many();
            $ui->assign('tr',$tr);
            $ui->display('ajax.supplier-transactions.tpl');
        }
        else{

        }


        break;

    case 'email':

        Event::trigger('supplier/email/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $e = ORM::for_table('sys_email_logs')
                ->where('userid',$cid)
                ->order_by_desc('id')->find_many();
            $ui->assign('d',$d);
            $ui->assign('e',$e);
            $ui->display('ajax.supplier-emails.tpl');
        }
        else{

        }


        break;


    case 'edit':

		_auth1('SUPPLIER-EDIT',$user['id']);
        Event::trigger('supplier/edit/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
            $ui->assign('fs',$fs);
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            $tags = Tags::get_all('Supplier');
            $ui->assign('tags',$tags);
            $dtags = explode(',',$d['tags']);
            $ui->assign('dtags',$dtags);
            $ui->display('ajax.supplier-edit.tpl');
        }
        else{

        }


        break;



    case 'add-activity-post':

        Event::trigger('supplier/add-activity-post/');

        $cid = _post('cid');
        $msg = $_POST['msg'];
        $icon = $_POST['icon'];
        $icon = trim($icon);
        //<a href="#"><i class="fa fa-camera"></i></a>

        $icon = str_replace('<a href="#"><i class="','',$icon);
        $icon = str_replace('"></i></a>','',$icon);
        if($icon == ''){
            $icon = 'fa fa-check';
        }

        if(Validator::Length($msg,1000,5) == false){
            echo $_L['Message Should be between 5 to 1000 characters'];
        }
        else{
            $d = ORM::for_table('sys_activity')->create();
            $d->cid = $cid;
            $d->msg = $msg;
            $d->icon = $icon;
            $d->stime = time();
            $d->sdate = date('Y-m-d');
            $d->o = $user['id'];
            $d->oname = $user['fullname'];
            $d->save();

            echo $cid;
        }

        break;


    case 'activity-delete':

        Event::trigger('supplier/activity-delete/');

        $id = $routes['3'];
        $d = ORM::for_table('sys_activity')->find_one($id);
        $d->delete();
        $cid = $routes['2'];
        r2(U.$myCtrl.'/view/'.$cid.'/','s',$_L['Deleted Successfully']);
        break;

    case 'view':

		_auth1('SUPPLIER-VIEW',$user['id']);
        Event::trigger('supplier/view/');

        $id  = $routes['2'];
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            $extra_tab = '';
            $extra_jq = '';

            Event::trigger('supplier/view/_on_start');

            $ui->assign('extra_tab', $extra_tab);

            //find all activity for this user
            $ac = ORM::for_table('sys_activity')->where('cid',$id)->limit(20)->order_by_desc('id')->find_many();
            $ui->assign('ac',$ac);





			$ui->assign('_sysfrm_menu1', 'contact');
			$ui->assign('_sysfrm_menu2', 'listsupp');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','sn/summernote','sn/summernote-bs3','sn/summernote-sysfrm','imgcrop/assets/css/croppic')));




            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'sn/summernote.min','imgcrop/croppic','profile1')));

            $ui->assign('xjq', '
 var cid = $(\'#cid\').val();
    var _url = $("#_url").val();
    var cb = function cb (){

            };


 '.
                $extra_jq);

            $ui->assign('d',$d);

            Event::trigger('supplier/view/_on_display');

            $ui->display('supplier-profile-alt.tpl');

        }
        else{
            r2(U . 'supplier/list/', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'add-post':

        Event::trigger('supplier/add-post/');

        Event::trigger('supplier/add-post/_on_start');

        $account = _post('account');
        $company = _post('company');
        $email = _post('email');
        $phone = _post('phone');

        if(isset($_POST['tags']) AND ($_POST['tags']) != ''){
            $tags = $_POST['tags'];
        }
        else{
            $tags = '';
        }

        $address = _post('address');
        $city = _post('city');
        $state = _post('state');
        $zip = _post('zip');
        $country = _post('country');
        $msg = '';

//check if tag is already exisit



        if($account == ''){
            $msg .= $_L['Account Name is required'].' <br>';
        }

//check account is already exist
        $chk = ORM::for_table('crm_accounts')->where('account',$account)->where('code','Supplier')->find_one();
        if($chk){
            $msg .= 'Account already exist <br>';
        }

        if($email != ''){
            if(Validator::Email($email) == false){
                $msg .= $_L['Invalid Email'].' <br>';
            }
            $f = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

            if($f){
                $msg .= $_L['Email already exist'].' <br>';
            }
        }


        if($msg == ''){

            Tags::save($tags,'Supplier');

            $d = ORM::for_table('crm_accounts')->create();

            $d->code = 'Supplier';
			$d->account = $account;
            $d->email = $email;
            $d->phone = $phone;
            $d->address = $address;
            $d->city = $city;
            $d->zip = $zip;
            $d->state = $state;
            $d->country = $country;
            $d->tags = Arr::arr_to_str($tags);

            //others
            $d->fname = '';
            $d->lname = '';
            $d->company = $company;
            $d->jobtitle = '';
            $d->cid = '0';
            $d->o = '0';
            $d->balance = '0.00';
            $d->status = 'Active';
            $d->notes = '';
            $d->password = '';
            $d->token = '';
            $d->ts = '';
            $d->img = '';
            $d->web = '';
            $d->facebook = '';
            $d->google = '';
            $d->linkedin = '';

            //
            $d->save();
            $cid = $d->id();
            _log1($_L['Supplier baru telah ditambahkan'].' '.$account.' [CID: '.$cid.']',$user['username'],$user['id']);

            //now add custom fields
            $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
            foreach($fs as $f){
                $fvalue = _post('cf'.$f['id']);
                $fc = ORM::for_table('crm_customfieldsvalues')->create();
                $fc->fieldid = $f['id'];
                $fc->relid = $cid;
                $fc->fvalue = $fvalue;
                $fc->save();
            }
            //

            Event::trigger('supplier/add-post/_on_finished');
//            echo $cid;
			$data = array(
					'msg'			=>  $msg,
					'dataopt'		=>  "<option value='$cid'>$account</option>",
					'dataval'		=>	$cid);
			echo json_encode($data);
        }
        else{
//			echo $msg;
			$data = array( 'msg' => $msg);
            echo json_encode($data);
        }
        break;

    case 'list':

		_auth1('SUPPLIER-LIST',$user['id']);
        Event::trigger('supplier/list/');

        $ui->assign('_st', 'Supplier'.'<span class="pull-right"><a href="'.U.'supplier/set_view_mode/card/'.'"><i class="fa fa-th"></i></a> <a href="'.U.'supplier/set_view_mode/tbl/'.'"><i class="fa fa-align-justify"></i></a></span>');

        $name = _post('name');
        //find all tags
        if($name != ''){
            $paginator = Paginator::bootstrap('crm_accounts','code','Supplier','account','%'.$name.'%');
            $d = ORM::for_table('crm_accounts')->where('code','Supplier')->where_like('account','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
			$t = ORM::for_table('crm_accounts')->where('code','Supplier')->where_like('account','%'.$name.'%')->order_by_asc('account')->find_many();
			$ui->assign('t',$t);
        }
        elseif(isset($routes[2]) AND ($routes[2]) != '' AND (!is_numeric($routes[2]))){
			$tags = $routes[2];
            $paginator['contents'] = '';
            $d = ORM::for_table('crm_accounts')->where('code','Supplier')->where_like('account','%'.$tags.'%')->order_by_desc('id')->find_many();
			if($tags != '') {
				$paginator = Paginator::bootstrap('crm_accounts','code','Supplier','account','%'.$tags.'%');
				$t = ORM::for_table('crm_accounts')->where('code','Supplier')->where_like('account','%'.$tags.'%')->order_by_asc('account')->find_many();
				$ui->assign('t',$t);
			}
        }
        else{
            $paginator = Paginator::bootstrap('crm_accounts','code','Supplier');
            $d = ORM::for_table('crm_accounts')->where('code','Supplier')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('account')->find_many();
        }

        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'contact');
		$ui->assign('_sysfrm_menu2', 'listsupp');
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/list-supplier.js"></script>

');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display('list-supplier.tpl');

        break;


    case 'edit-post':

        Event::trigger('supplier/edit-post/');


        $id = _post('fcid');
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            $account = _post('account');
            $company = _post('company');

            $email = _post('edit_email');

            if(isset($_POST['tags'])){
                $tags = $_POST['tags'];
            }
            else{
                $tags = '';
            }


            $phone = _post('phone');
            $address = _post('address');
            $city = _post('city');
            $state = _post('state');
            $zip = _post('zip');
            $country = _post('country');
            $msg = '';

            if($account == ''){
                $msg .= $_L['Account Name is required']. ' <br>';
            }
//            if($tags != ''){
//                $pieces = explode(',', $tags);
//                foreach($pieces as $element)
//                {
//                    $tg = ORM::for_table('sys_tags')->where('text',$element)->where('type','Contacts')->find_one();
//                    if(!$tg){
//                        $tc = ORM::for_table('sys_tags')->create();
//                        $tc->text = $element;
//                        $tc->type = 'Contacts';
//                        $tc->save();
//                    }
//                }
//            }

            // Sadia ================= From V 2.4

            Tags::save($tags,'supplier');


            //check email already exist




//            if($address == ''){
//                $msg .= 'Address is required <br>';
//            }
//            if($city == ''){
//                $msg .= 'City is required <br>';
//            }
//            if($state == ''){
//                $msg .= 'State is required <br>';
//            }
//            if($zip == ''){
//                $msg .= 'ZIP is required <br>';
//            }
//            if($country == ''){
//                $msg .= 'Country is required <br>';
//            }
                if($email != ''){

                if($email != ($d['email'])){
                    $f = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

                    if($f){
                        $msg .= $_L['Email already exist'].' <br>';
                    }
                }
                if(Validator::Email($email) == false){
                    $msg .= $_L['Invalid Email'].' <br>';
                }
            }
//            if($phone != ''){
//                if(!is_numeric($phone)){
//                    $msg .= $_L['Invalid Phone'].' <br>';
//                }
//            }

            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);
                $d->account = $account;
                $d->company = $company;


                $d->email = $email;
                $d->tags = Arr::arr_to_str($tags);
                $d->phone = $phone;
                $d->address = $address;
                $d->city = $city;
                $d->zip = $zip;
                $d->state = $state;
                $d->country = $country;
                $d->save();
				_log1('Supplier Edit : '.$account.' [CID: '.$id.']',$user['username'],$user['id']);


                //delete existing records
                $exf = ORM::for_table('crm_customfieldsvalues')->where('relid',$id)->delete_many();
                $fs = ORM::for_table('crm_customfields')->order_by_asc('id')->find_many();
                foreach($fs as $f){
                    $fvalue = _post('cf'.$f['id']);
                    $fc = ORM::for_table('crm_customfieldsvalues')->create();
                    $fc->fieldid = $f['id'];
                    $fc->relid = $id;
                    $fc->fvalue = $fvalue;
                    $fc->save();
                }

                echo $id;
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list', 'e', $_L['Account_Not_Found']);
        }

        break;
    case 'delete':

        Event::trigger('supplier/delete/');


        $id = $routes['2'];
        if($_app_stage == 'Demo'){
            r2(U.$myCtrl.'/list/', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){
            $d->delete();
            r2(U.$myCtrl.'/list/', 's', $_L['account_delete_successful']);
        }

        break;


    case 'more':

        Event::trigger('supplier/more/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            $ui->display('ajax.supplier-more.tpl');
        }
        else{

        }


        break;

    case 'edit-more':

        Event::trigger('supplier/edit-more/');

        $id = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){
            $img = _post('picture');
            $facebook = _post('facebook');
            $google = _post('google');
            $linkedin = _post('linkedin');

            $msg = '';



            //check email already exist





            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);

                $d->img = $img;
                $d->facebook = $facebook;
                $d->google = $google;
                $d->linkedin = $linkedin;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list/', 'e', $_L['Account_Not_Found']);
        }


        break;


    case 'edit-notes':

        Event::trigger('supplier/edit-notes/');

        $id = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            $notes = _post('notes');

            $msg = '';



            //check email already exist





            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);


                $d->notes = $notes;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list/', 'e', $_L['Account_Not_Found']);
        }


        break;

    case 'render-address':

        Event::trigger('supplier/render-address/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        $address = $d['address'];
        $city = $d['city'];
        $state = $d['state'];
        $zip = $d['zip'];
        $country = $d['country'];
        echo "$address
$city
$state $zip
$country
";
        break;


    case 'send_email':

        Event::trigger('supplier/send_email/');

        $msg = '';
        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        $email = $d['email'];
        $toname = $d['account'];
$subject = _post('subject');
        if($subject == ''){
            $msg .= $_L['Subject is Empty'].' <br>';
        }
        $message = $_POST['message'];
if($message == ''){
    $msg .= $_L['Message is Empty'].' <br>';
}
        if($msg == ''){
            //send email
            Notify_Email::_send($toname,$email,$subject,$message,$cid);
            echo $cid;

        }
        else{
            echo $msg;
        }
        break;


    case 'modal_add':

        Event::trigger('supplier/modal_add/');

        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']
        $ui->display('modal_add_supplier.tpl');


        break;


    case 'set_view_mode':

        Event::trigger('supplier/set_view_mode/');
        if(isset($routes['2']) AND ($routes['2'] != 'tbl')){
            $mode = 'card';
        }
        else{
            $mode = 'tbl';
        }

        update_option('supplier_set_view_mode',$mode);

        r2(U.'supplier/list/');

        break;



    default:
        echo 'action not defined';
}