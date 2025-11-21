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
    $myCtrl = 'company';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', $_L['Company'].' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Company']);
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
        
        Event::trigger('company/add/');
		_auth1('ADD-COMPANY',$user['id']); 
        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']


//        $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="ui/lib/s2/css/select2.min.css"/>
//');
		$ui->assign('_sysfrm_menu1', 'company');
		$ui->assign('_sysfrm_menu2', 'addcompany');
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'add-company')));
        //$tags = Tags::get_all('Company');
        $ui->assign('xjq', '
         $("#country").select2({
         theme: "bootstrap"
         });
         ');
        $ui->display('add-company.tpl');
        break;

    case 'edit':

        Event::trigger('company/edit/');

		_auth1('EDIT-COMPANY',$user['id']);
        _auth1();
        $cid = $routes['2'];
        $d = ORM::for_table('sys_company','dblogin')->find_one($cid);
        if($d){
			$ui->assign('_sysfrm_menu1', 'company');
			$ui->assign('_sysfrm_menu2', 'listcompany');
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$ui->assign('xheader', Asset::css('s2/css/select2.min'));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'edit-company')));
			$tags = Tags::get_all('Company');
			$ui->assign('xjq', '
			 $("#country").select2({
			 theme: "bootstrap"
			 });
			 ');
            $ui->display('edit-company.tpl');
        }

        break;

    case 'add-post':

        Event::trigger('company/add-post/');

        $company = _post('company');
        $email = _post('email');
        $phone = _post('phone');

        $address = _post('address');
        $city = _post('city');
        $state = _post('state');
        $zip = _post('zip');
        $country = _post('country');
        $msg = '';

//check if tag is already exisit



        if($company == ''){
            $msg .= 'Nama Perusahaan tidak boleh kosong <br>';
        }

//check account is already exist
        $chk = ORM::for_table('sys_company','dblogin')->where('company',$company)->find_one();
        if($chk){
            $msg .= 'Nama Perusahaan tersebut telah ada <br>';
        }

        if($email != ''){
            if(Validator::Email($email) == false){
                $msg .= $_L['Invalid Email'].' <br>';
            }
            $f = ORM::for_table('sys_company','dblogin')->where('email',$email)->find_one();

            if($f){
                $msg .= $_L['Email already exist'].' <br>';
            }
        }


        if($msg == ''){

            $d = ORM::for_table('sys_company','dblogin')->create();

			$d->company = $company;
            $d->email = $email;
            $d->phone = $phone;
            $d->address = $address;
            $d->city = $city;
            $d->zip = $zip;
            $d->state = $state;
            $d->country = $country;
            $d->status = 'Active';
            $d->notes = '';
            $d->token = '';

            //
            $d->save();
            $cid = $d->id();
            _log('Tambah Perusahaan'.$company.' [CID: '.$cid.']','Admin',$user['id']);

            Event::trigger('company/add-post/_on_finished');
            echo $cid;
        }
        else{
            echo $msg;
        }
        break;

    case 'list':

        Event::trigger('company/list/');

		_auth1('OPEN-COMPANY',$user['id']);
        $name = _post('name');
			$ui->assign('_sysfrm_menu1', 'company');
			$ui->assign('_sysfrm_menu2', 'listcompany');
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('sys_company','company','%'.$name.'%','','','','','','','50','dblogin');
            $d = ORM::for_table('sys_company','dblogin')->where_like('company','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }
        else{
            $paginator = Paginator::bootstrap('sys_company','','','','','','','','','50','dblogin');
            $d = ORM::for_table('sys_company','dblogin')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('company')->find_many();
        }

        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/list-company.js"></script>

');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display('list-company.tpl');

        break;


    case 'edit-post':

        Event::trigger('company/edit-post/');


        $id = _post('cid');
        $d = ORM::for_table('sys_company','dblogin')->find_one($id);
        if($d){

            $company = _post('company');
            $email = _post('email');
            $phone = _post('phone');
            $address = _post('address');
            $city = _post('city');
            $state = _post('state');
            $zip = _post('zip');
            $country = _post('country');
            $msg = '';


            //check email already exist
			if($email != ''){
				if($email != ($d['email'])){
					$f = ORM::for_table('sys_company','dblogin')->where('email',$email)->find_one();

					if($f){
						$msg .= $_L['Email already exist'].' <br>';
					}
				}
				if(Validator::Email($email) == false){
					$msg .= $_L['Invalid Email'].' <br>';
				}
            }

            if($msg == ''){


                $d = ORM::for_table('sys_company','dblogin')->find_one($id);
                $d->company = $company;
                $d->email = $email;
                $d->phone = $phone;
                $d->address = $address;
                $d->city = $city;
                $d->zip = $zip;
                $d->state = $state;
                $d->country = $country;
                $d->save();

                echo $id;
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list', 'e', 'Perusahaan tersebut tidak ditemukan');
        }

        break;
    case 'delete':

        Event::trigger('company/delete/');
		_auth1('DELETE-COMPANY',$user['id']);
        $id = $routes['2'];
        $d = ORM::for_table('sys_company','dblogin')->find_one($id);
        if($d){
            $d->delete();
            r2(U.$myCtrl.'/list/', 's', 'Berhasil menghapus Perusahaan');
        }

        break;

//    case 'render-address':
//
//        Event::trigger('compnay/render-address/');
//
//        $cid = _post('cid');
//        $d = ORM::for_table('sys_company','dblogin')->find_one($cid);
//        $address = $d['address'];
//        $city = $d['city'];
//        $state = $d['state'];
//        $zip = $d['zip'];
//        $country = $d['country'];
//        echo "$address
//$city
//$state $zip
//$country
//";
//        break;

    default:
        echo 'action not defined';
}