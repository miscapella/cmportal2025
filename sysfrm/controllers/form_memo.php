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
    $myCtrl = 'book_zoom';
}
_auth();
$ui->assign('_sysfrm_menu', 'form_memo');
$ui->assign('_title', 'form_memo'.' - '. $config['CompanyName']);
$ui->assign('_st', Memo);
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


switch ($action) {
    case 'list':
        Event::trigger('form_memo/list/');
        $ui->assign('_sysfrm_menu1', 'listmemo');
        
        $ui->display('list-memo.tpl');
        break;
        
    case 'add':
        Event::trigger('form_memo/add/');
      
        $ui->assign('_sysfrm_menu1', 'listmemo');
        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','ckeditor/ckeditor','s2/js/i18n/'.lan())));
        $ui->assign('xjq', '
         $("#country").select2({
         theme: "bootstrap"
         });
         ');
        $ui->display('add-form-memo.tpl');
        
        break;
        
    case 'sent':
        Event::trigger('form_memo/sent/');
        $ui->assign('_sysfrm_menu1', 'sentmemo');
        
        $ui->display('sent-memo.tpl');
        break;
    default:
        echo 'action not defined';
}