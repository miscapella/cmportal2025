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
    $myCtrl = 'approve';
}
_auth();
$ui->assign('_sysfrm_menu', 'approve');
$ui->assign('_title', 'Approval - '. $config['CompanyName']);
$ui->assign('_st', 'Approval');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

switch ($action) {
    case 'list':
        $ui->assign('_sysfrm_menu1', 'listapproval');
        Event::trigger('approve/list/');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top', 'css/loader')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'list-approval','modal','btn-top/btn-top')));
        $ui->display($spath.'list-approval.tpl');
        break;

    case 'history':
        Event::trigger('approve/history/');
        $response = ORM::for_table('daftar_response')->find_many();
        $e = ORM::for_table('form_master')->find_many();
        $d = [];
        $form = [];
        $respondent = [];
        $approve = [];
        $reject = [];
        $comment = [];
        $status = [];
        $stat = [];
        $date = [];
        foreach ($response as $item){
            $current = explode(',',$item['approval_by']);
            $appstat = explode(',',$item['approval_status']);
            $currentIndex = 0;
            foreach($current as $cur) {
                if($cur == $user['username'] and $appstat[$currentIndex] != 'In Progress') {
                    array_push($d, $item['id']);
                    array_push($form, $item['kode_form']);
                    array_push($respondent, $item['fullname']);
                    array_push($stat, $item['status']);
                    $datestat = explode(',',$item['approval_date']);
                    array_push($status, $appstat[$currentIndex]);
                    array_push($date, $datestat[$currentIndex]);
                    break;
                }
                $currentIndex++;
            }
        }

        $ui->assign('d',$d);
        $ui->assign('e',$e);
        $ui->assign('form',$form);
        $ui->assign('respondent',$respondent);
        $ui->assign('date',$date);
        $ui->assign('stat',$stat);
        $ui->assign('status',$status);
        $ui->assign('_sysfrm_menu', 'formapprove');
        $ui->assign('_sysfrm_menu1', 'historyapproval');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top', 'css/loader')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-approval','numeric')));
        
        
        $ui->display($spath.'history-approval.tpl');
        break;
    
   default:
        echo 'action not defined';
}