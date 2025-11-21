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
    $myCtrl = 'pembelian';
}
_auth();
$ui->assign('_sysfrm_menu', 'transaksi');
$ui->assign('_title', 'Pembelian - '. $config['CompanyName']);
$ui->assign('_st', 'Pembelian');
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
//     case 'list-pr':

//         Event::trigger('pembelian/listpr/');

// 		_auth1('PR-LIST',$user['id']);
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $d = ORM::for_table('pr_master')->where_like('no_pr','%'.$name.'%')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('status')->order_by_desc('posisi')->find_many();
//             $cd = ORM::for_table('pr_master')->where_like('no_pr','%'.$name.'%')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('status')->order_by_desc('posisi')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $d = ORM::for_table('pr_master')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('status')->order_by_desc('posisi')->find_many();
            
//             $cd = ORM::for_table('pr_master')->where_not_equal('status', 'CANCEL')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('status')->order_by_desc('posisi')->count();
//         }
        
//         $ui->assign('d',$d);
//         $ui->assign('cd',$cd);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu3', 'list-pr');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr.tpl');

//         break;
    
//     case 'list-pr-pending':

// 		Event::trigger('pembelian/listpr/');
// 		_auth1('PR-LIST-PENDING',$user['id']);
// 		$msg = $routes['3'];
// 		$ui->assign('msg',$msg);
//         $ui->assign('_sysfrm_menu2', 'pr-pending');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
//         $ui->display($spath.'list-pr-pending.tpl');

// //         Event::trigger('pembelian/listpr/');

// // 		_auth1('PR-LIST-PENDING',$user['id']);
// // 		$name = _post('name');
// // 		$msg = $routes['3'];
// //         $ui->assign('name',$name);
// //         if($name != ''){
// //             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
// //             $d = ORM::for_table('pr_master')->where('posisi', 'PR')->where_in('status', array('PENDING', 'REVISI'))->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
// //             $cd = ORM::for_table('pr_master')->where('posisi', 'PR')->where_in('status', array('PENDING', 'REVISI'))->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
// //         }
// //         else{
// //             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
// //             $d = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where_in('status', array('PENDING', 'REVISI'))->order_by_desc('no_pr')->find_many();
            
// //             $cd = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where_in('status', array('PENDING', 'REVISI'))->order_by_desc('no_pr')->count();
// //         }
        
// //         $ui->assign('d',$d);
// //         $ui->assign('cd',$cd);
// // 		$ui->assign('msg',$msg);
// //         $ui->assign('paginator',$paginator);
// //         $ui->assign('_sysfrm_menu2', 'pr-pending');
// //         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
// //         $ui->assign('jsvar', '
// // _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
// //  ');
// //         $ui->display($spath.'list-pr-pending.tpl');

//         break;
        
//     case 'list-pr1-pending':

//         Event::trigger('pembelian/listpr/');

// 		_auth1('PR1-LIST-PENDING',$user['id']);
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $d = ORM::for_table('pr_master')->where('posisi', 'PR1')->where_in('status', array('PENDING', 'REVISI'))->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $cd = ORM::for_table('pr_master')->where('posisi', 'PR1')->where_in('status', array('PENDING', 'REVISI'))->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $d = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where_in('status', array('PENDING', 'REVISI'))->order_by_desc('no_pr')->find_many();
            
//             $cd = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where_in('status', array('PENDING', 'REVISI'))->order_by_desc('no_pr')->count();
//         }
        
//         $ui->assign('d',$d);
//         $ui->assign('cd',$cd);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu3', 'pr1-pending');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-pending.tpl');

//         break;
        
//     case 'list-pr-reject':

//         Event::trigger('pembelian/listpr/');
        
// 		_auth1('PR-LIST-REJECT',$user['id']); 
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $e = ORM::for_table('pr_master')->where('posisi', 'PR')->where('status', 'REJECT')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $ce = ORM::for_table('pr_master')->where('posisi', 'PR')->where('status', 'REJECT')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $e = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'REJECT')->order_by_desc('no_pr')->find_many();
            
//             $ce = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'REJECT')->order_by_desc('no_pr')->count();
//         }
//         $ui->assign('e',$e);
//         $ui->assign('ce',$ce);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu2', 'pr-reject');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-rejected.tpl');

//         break;
        
//     case 'list-pr1-reject':

//         Event::trigger('pembelian/listpr/');
        
// 		_auth1('PR1-LIST-REJECT',$user['id']); 
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $e = ORM::for_table('pr_master')->where('posisi', 'PR1')->where('status', 'REJECT')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $ce = ORM::for_table('pr_master')->where('posisi', 'PR1')->where('status', 'REJECT')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $e = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'REJECT')->order_by_desc('no_pr')->find_many();
            
//             $ce = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'REJECT')->order_by_desc('no_pr')->count();
//         }
//         $ui->assign('e',$e);
//         $ui->assign('ce',$ce);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu2', 'purchase-requisition');
//         $ui->assign('_sysfrm_menu3', 'pr1-reject');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-rejected.tpl');

//         break;
        
//     case 'list-pr-approve':

//         Event::trigger('pembelian/listpr/');

// 		_auth1('PR-LIST-APPROVE',$user['id']);
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $f = ORM::for_table('pr_master')->where('posisi', 'PR')->where('status', 'APPROVE')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $cf = ORM::for_table('pr_master')->where('posisi', 'PR')->where('status', 'APPROVE')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $f = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'APPROVE')->order_by_desc('no_pr')->find_many();
            
//             $cf = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'APPROVE')->order_by_desc('no_pr')->count();
//         }
        
//         $ui->assign('f',$f);
//         $ui->assign('cf',$cf);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu2', 'pr-approve');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-approved.tpl');

//         break;
        
//     case 'list-pr1-approve':

//         Event::trigger('pembelian/listpr/');

// 		_auth1('PR1-LIST-APPROVE',$user['id']);
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $f = ORM::for_table('pr_master')->where('posisi', 'PR1')->where('status', 'APPROVE')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $cf = ORM::for_table('pr_master')->where('posisi', 'PR1')->where('status', 'APPROVE')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $f = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'APPROVE')->order_by_desc('no_pr')->find_many();
            
//             $cf = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'APPROVE')->order_by_desc('no_pr')->count();
//         }
        
//         $ui->assign('f',$f);
//         $ui->assign('cf',$cf);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu3', 'pr1-approve');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-approved.tpl');

//         break;
        
//     case 'list-pr-done':

//         Event::trigger('pembelian/listpr/');

// 		_auth1('PR-LIST-DONE',$user['id']);
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $f = ORM::for_table('pr_master')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $cf = ORM::for_table('pr_master')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $f = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'DONE')->order_by_desc('no_pr')->find_many();
            
//             $cf = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'DONE')->order_by_desc('no_pr')->count();
//         }
        
//         $ui->assign('f',$f);
//         $ui->assign('cf',$cf);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu3', 'pr-done');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-done.tpl');

//         break;
        
//     case 'list-pr-cancel':

//         Event::trigger('pembelian/listpr/');

// 		_auth1('PR-LIST',$user['id']);
// 		$name = _post('name');
// 		$msg = $routes['3'];
//         $ui->assign('name',$name);
//         if($name != ''){
//             $paginator = Paginator::bootstrap('pr_master','no_pr','%'.$name.'%','','','','','','','50','');
//             $g = ORM::for_table('pr_master')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->find_many();
//             $cg = ORM::for_table('pr_master')->where_like('no_pr','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pr')->count();
//         }
//         else{
//             $paginator = Paginator::bootstrap('pr_master','','','','','','','','','50','');
//             $g = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'CANCEL')->order_by_desc('no_pr')->find_many();
            
//             $cg = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'CANCEL')->order_by_desc('no_pr')->count();
//         }
        
//         $ui->assign('g',$g);
//         $ui->assign('cg',$cg);
// 		$ui->assign('msg',$msg);
//         $ui->assign('paginator',$paginator);
//         $ui->assign('_sysfrm_menu3', 'pr-cancel');
//         $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
//         $ui->assign('jsvar', '
// _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//  ');
//         $ui->display($spath.'list-pr-cancel.tpl');

//         break;

	case 'list-pr':
		Event::trigger('pembelian/listpr/');
		_auth1('PR-LIST',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu3', 'list-pr');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\'; ');
		$ui->display($spath.'list-pr.tpl');
		break;

	case 'list-pr1':
		Event::trigger('pembelian/list-pr1/');
		_auth1('SHOW-PR',$user['id']);

		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu3', 'list-pr');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\'; ');
		$ui->display($spath.'list-pr.tpl');
		break;

	case 'list-pr-pending':
		Event::trigger('pembelian/listpr/');
		_auth1('PR-LIST-PENDING',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'pr-pending');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-pr-pending.tpl');
		break;
		
	case 'list-pr1-pending':
		Event::trigger('pembelian/listpr/');
		_auth1('PR1-LIST-PENDING',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu3', 'pr1-pending');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-pr-sup-pending.tpl');
		break;
		
	case 'list-pr-reject':
		Event::trigger('pembelian/listpr/');
		_auth1('PR-LIST-REJECT',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'pr-reject');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-pr-rejected.tpl');
		break;
		
	case 'list-pr1-reject':
		Event::trigger('pembelian/listpr/');
		_auth1('PR1-LIST-REJECT',$user['id']); 
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'purchase-requisition');
		$ui->assign('_sysfrm_menu3', 'pr1-reject');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '
	_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	');
		$ui->display($spath.'list-pr-sup-rejected.tpl');
		break;
		
	case 'list-pr-approve':
		Event::trigger('pembelian/listpr/');
		_auth1('PR-LIST-APPROVE',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'pr-approve');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '
	_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	');
		$ui->display($spath.'list-pr-approved.tpl');
		break;
		
	case 'list-pr1-approve':
		Event::trigger('pembelian/listpr/');
		_auth1('PR1-LIST-APPROVE',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu3', 'pr1-approve');
		$ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
		$ui->assign('jsvar', '
	_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	');
	$ui->display($spath.'list-pr-sup-approved.tpl');
	break;
    
	case 'detail-pr':
        Event::trigger('pembelian/detail-pr/');

		_auth1('PR-DETAIL',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
            if($d['posisi'] == 'PR'){
                if($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
                    $ui->assign('_sysfrm_menu1', 'permintaan');
                    $ui->assign('_sysfrm_menu2', 'pr-pending');
                } else if($d['status'] == 'REJECT') {
                    $ui->assign('_sysfrm_menu1', 'permintaan');
                    $ui->assign('_sysfrm_menu2', 'pr-reject');
                } else if($d['status'] == 'APPROVE') {
                    $ui->assign('_sysfrm_menu1', 'permintaan');
                    $ui->assign('_sysfrm_menu2', 'pr-approve');
                }
            } else {
                if($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
                    $ui->assign('_sysfrm_menu1', 'pembelian');
                    $ui->assign('_sysfrm_menu3', 'pr1-pending');
                } else if($d['status'] == 'REJECT') {
                    $ui->assign('_sysfrm_menu1', 'pembelian');
                    $ui->assign('_sysfrm_menu3', 'pr1-reject');
                } else if($d['status'] == 'APPROVE') {
                    $ui->assign('_sysfrm_menu1', 'pembelian');
                    $ui->assign('_sysfrm_menu3', 'pr1-approve');
                }
            }
            
			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
            $ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);          
        
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-pr','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'detail-pr.tpl');
        } else r2(U.'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');

        break;
        
        
    case 'add-pr':

        Event::trigger('pembelian/add-pr/');

		_auth1('PR-ADD',$user['id']);

		$urlist = '<option value="">Pilih UR</option>';
		$d = ORM::for_table('mintabarang_master')->where_raw('sisa > 0')->find_many();
		foreach($d as $data) {
			$urlist .= '<option value="' . $data['no_mintabarang'] . '">' . $data['no_mintabarang'] . ' - ' . $data['dibuat_nama'] . '</option>';
		}

		$clist = '';
		$clist = '<option value="">Pilih Keperluan</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="PENGADAAN">PENGADAAN BARU</option>';
		$clist .= '<option value="PERGANTIAN">PERGANTIAN</option>';

		// $tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();

		// foreach ($tg as $r) {
		// 	$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['nm_inventaris'].'</option>';
		// }
		$idate = date('d-m-Y');
		$ui->assign('clist',$clist);
		$ui->assign('urlist',$urlist);
		$ui->assign('idate',$idate);
        $ui->assign('_sysfrm_menu1', 'permintaan');
        $ui->assign('_sysfrm_menu2', 'pr-add');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-pr','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-pr.tpl');
        break;

    case 'add-pr-post':

        Event::trigger('pembelian/add-pr-post/');

		$id = explode(',', _post('id'));
		$max = explode(',', _post('max'));
		$kd_inventaris = explode(',', _post('kd_inventaris'));
        $kd_item = explode(',', _post('kd_item'));
        $qty_req = explode(',', _post('qty_req'));
		$tgl = explode(',', _post('tgl'));
        $keterangan = explode(',', _post('keterangan'));

        $supplier1 = explode(',', _post('supplier1'));
        $hargasupplier1 = explode(',', _post('hargasupplier1'));
        $keterangansupplier1 = explode(',', _post('keterangansupplier1'));
        $filesupplier1 = explode(',', _post('filesupplier1'));
        $supplier2 = explode(',', _post('supplier2'));
        $hargasupplier2 = explode(',', _post('hargasupplier2'));
        $keterangansupplier2 = explode(',', _post('keterangansupplier2'));
        $filesupplier2 = explode(',', _post('filesupplier2'));
        $supplier3 = explode(',', _post('supplier3'));
        $hargasupplier3 = explode(',', _post('hargasupplier3'));
        $keterangansupplier3 = explode(',', _post('keterangansupplier3'));
        $filesupplier3 = explode(',', _post('filesupplier3'));
        $supplierpilihan = explode(',', _post('supplierpilihan'));
        $list_ur = explode(',', _post('list_ur'));

		$msg = '';
		for ($i = 0; $i < count($id); $i++) {
			$temp_msg = '';
			$maxi = intval($max[$i]);
			$harga1 = intval(str_replace(".", "", $hargasupplier1[$i]));
			$harga2 = intval(str_replace(".", "", $hargasupplier2[$i]));
			$harga3 = intval(str_replace(".", "", $hargasupplier3[$i]));
			if ($kd_inventaris[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' : Keperluan tidak boleh kosong <br>';
			if ($kd_item[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' : Item Stock tidak boleh kosong <br>';
			if ($qty_req[$i] == 0 || $qty_req[$i] < 0) $temp_msg .= 'PR ' . strval($i + 1) . ' : Qty Req tidak boleh kosong <br>';
			else if ($maxi <> 0 && $qty_req[$i] > $maxi) $temp_msg .= 'PR ' . strval($i + 1) . ' : Qty Req melebihi permintaan user (' . $maxi . ') <br>';
			if ($tgl[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' : Tgl Diperlukan tidak boleh kosong <br>';
			if (!$supplierpilihan) $temp_msg .= 'PR ' . strval($i + 1) . ' : Supplier wajib dipilih <br>';

			if ($supplier1[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : Supplier tidak boleh kosong <br>';
			if ($harga1 == 0) $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : Harga tidak boleh kosong <br>';
			if ($keterangansupplier1[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : Keterangan tidak boleh kosong <br>';
			if ($filesupplier1[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 1 : File tidak boleh kosong <br>';

			if ($supplier2[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : Supplier tidak boleh kosong <br>';
			if ($harga2 == 0) $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : Harga tidak boleh kosong <br>';
			if ($keterangansupplier2[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : Keterangan tidak boleh kosong <br>';
			if ($filesupplier2[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 2 : File tidak boleh kosong <br>';

			if ($supplier3[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : Supplier tidak boleh kosong <br>';
			if ($harga3 == 0) $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : Harga tidak boleh kosong <br>';
			if ($keterangansupplier3[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : Keterangan tidak boleh kosong <br>';
			if ($filesupplier3[$i] == '') $temp_msg .= 'PR ' . strval($i + 1) . ' - Supplier 3 : File tidak boleh kosong <br>';

			if ($temp_msg <> '') $msg .= $temp_msg . ($i == count($id) - 1 ? '' : '<br>');
		}

		// $msg_item = '';
		// $msg_qty = '';
		// $msg_tgl = '';
		// $msg_supplier1 = '';
		// $msg_hargasupplier1 = '';
		// $msg_supplierpilihan = '';
		// $msg_supplierpilihannama = '';
		// $msg_supplierpilihanharga = '';
		// $i = 0;
		// $ii = 0;
		// foreach($kd_inventaris as $code) {
		// 	$supplier = [$supplier1[$i], $supplier2[$i], $supplier3[$i]];
		// 	$harga = [$hargasupplier1[$i], $hargasupplier2[$i], $hargasupplier3[$i]];
		// 	if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
		// 	if($tgl[$i] == '')	$msg_tgl = 'Ada detail yang belum memilih Tanggal Diperlukan';
		// 	if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		// 	if($supplier1[$i] == '') $msg_supplier1 = 'Ada detail yang belum mengisi Supplier 1';
		// 	if($hargasupplier1[$i] == 0) $msg_hargasupplier1 = 'Ada detail yang belum mengisi Harga Supplier 1';
		// 	if($supplierpilihan[$i] == '') {
		// 		$msg_supplierpilihan = 'Ada detail yang belum mengisi Supplier Pilihan';
		// 	} else {
		// 		if($supplier[$supplierpilihan[$i] - 1] == '') $msg_supplierpilihannama = 'Supplier yang dipilih tidak memiliki nama' . $supplier[1];
		// 		if($harga[$supplierpilihan[$i] - 1] == 0) $msg_supplierpilihanharga = 'Supplier yang dipilih tidak memiliki harga';
		// 	}
		// 	if($code <> '') $ii++;
		// 	$i++;
		// }
		// if($ii > 0) {
		// 	if($msg_item <> '')
		// 		$msg .= $msg_item.'<br>';
		// 	if($msg_qty <> '')
		// 		$msg .= $msg_qty.'<br>';
		// 	if($msg_tgl <> '')
		// 		$msg .= $msg_tgl.'<br>';
		// 	if($msg_supplier1 <> '')
		// 		$msg .= $msg_supplier1.'<br>';
		// 	if($msg_hargasupplier1 <> '')
		// 		$msg .= $msg_hargasupplier1.'<br>';
		// 	if($msg_supplierpilihan <> '')
		// 		$msg .= $msg_supplierpilihan.'<br>';
		// 	if($msg_supplierpilihannama <> '')
		// 		$msg .= $msg_supplierpilihannama.'<br>';
		// 	if($msg_supplierpilihanharga <> '')
		// 		$msg .= $msg_supplierpilihanharga.'<br>';
		// } else $msg .= 'Belum memilih Keperluan<br>';

		// sort($kd_item);
		// $cek = '';
		// $flag = false;
		// $error = '';
		// foreach($kd_item as $code) {
		// 	if($cek == $code) {
		// 		$flag = true;
		// 		break;
		// 	} else
		// 		$flag = false;
		// 	$cek = $code;
		// }
		// if($flag)
		// 	$msg .= 'Ada Kode Item Stock double<br>';

		// if($priority == '') $msg .= 'Belum Memilih Tingkat Kepentingan';
        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$tgl_pr = Validator::Date1(_post('idate'));
				$bl=date('n',strtotime($tgl_pr));
				$th=date('Y', strtotime($tgl_pr));
				$chk = ORM::for_table('pr_master')->raw_query('select * from pr_master where month(tgl_pr)='.$bl.' and year(tgl_pr)='.$th.' order by no_pr desc')->find_one();
				if($chk) {
					$no = ++$chk['no_pr'];
				} else {
					$no = 'PR/'.$th.'/'.date('m',strtotime($tgl_pr)).'/0001';
				}

				$d = ORM::for_table('pr_master')->create();
				$d->no_pr = $no;
				$d->tgl_pr = $tgl_pr;
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');
				$d->posisi = 'PR';
                $d->status = 'PENDING';
				$d->save();

				$i = 0;
				foreach($kd_inventaris as $code) {
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					// $sqty1 = str_replace(".", "", $qty_stock[$i]);
					$sket = $keterangan[$i];
					$stgl = $tgl[$i];

					$ssupplier1 = $supplier1[$i];
					$shargasupplier1 = $hargasupplier1[$i];
					$sketerangansupplier1 = $keterangansupplier1[$i];
					$sfilesupplier1 = $filesupplier1[$i];
					$ssupplier2 = $supplier2[$i];
					$shargasupplier2 = $hargasupplier2[$i];
					$sketerangansupplier2 = $keterangansupplier2[$i];
					$sfilesupplier2 = $filesupplier2[$i];
					$ssupplier3 = $supplier3[$i];
					$shargasupplier3 = $hargasupplier3[$i];
					$sketerangansupplier3 = $keterangansupplier3[$i];
					$sfilesupplier3 = $filesupplier3[$i];
					$ssupplierpilihan = $supplierpilihan[$i];

					$y = ORM::for_table('pr_detail')->create();
					$y->no_pr = $no;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->sisa = $sqty;
                    $y->status = 'PENDING';
					if(Validator::Date1($stgl) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($stgl));
					else
						$y->tgl_diperlukan = null;
					$y->keperluan = $code;
					$y->keterangan = $sket;
					$y->kd_supplier1 = $ssupplier1;
					$y->harga1 = str_replace(".", "", $shargasupplier1);
					$y->keterangan_supplier1 = $sketerangansupplier1;
					$y->file_supplier1 = $sfilesupplier1;
					$y->kd_supplier2 = $ssupplier2;
					$y->harga2 = str_replace(".", "", $shargasupplier2);
					$y->keterangan_supplier2 = $sketerangansupplier2;
					$y->file_supplier2 = $sfilesupplier2;
					$y->kd_supplier3 = $ssupplier3;
					$y->harga3 = str_replace(".", "", $shargasupplier3);
					$y->keterangan_supplier3 = $sketerangansupplier3;
					$y->file_supplier3 = $sfilesupplier3;
					$y->supplierpilihan = $ssupplierpilihan;
					$y->hargapilihan = str_replace(".", "", [$shargasupplier1, $shargasupplier2, $shargasupplier3][$ssupplierpilihan - 1]);
					$y->save();

					$i++;
				}
				foreach($list_ur as $ur) {
					$x = ORM::for_table('mintabarang_master')->where('no_mintabarang',$ur)->find_one();
					if ($x) {
						$x->status = 'PENDING';
						$x->save();
					}
				}
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Data PR : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/add-pr-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Update. No. PR : '.$no,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;

    case 'edit-pr':

        Event::trigger('pembelian/edit-pr/');

		_auth1('PR-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Keperluan</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			$clist .= '<option value="PENGADAAN">PENGADAAN BARU</option>';
			$clist .= '<option value="PERGANTIAN">PERGANTIAN</option>';
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->table_alias("a")->select("a.*")->select("b.nm_item")->left_outer_join("daftar_itemstock",array("a.kd_item","=","b.kd_item"),"b")->where('a.status','aktif')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
			$ui->assign('idate',$idate);
            $ui->assign('_sysfrm_menu2', 'pr-pending');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-pr','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'edit-pr.tpl');
        } else r2(U.'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');

        break;

    case 'edit-pr-post':

        Event::trigger('pembelian/edit-pr-post/');

		$no_pr = _post('no_pr');
		$kd_inventaris = explode(',', _post('kd_inventaris'));
        $kd_item = explode(',', _post('kd_item'));
        $qty_req = explode(',', _post('qty_req'));
        $qty_stock = explode(',', _post('qty_stock'));
		$tgl = explode(',', _post('tgl'));
        $keterangan = explode(',', _post('keterangan'));
		// $priority = _post('priority');
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
		$i = 0;
		$ii = 0;
		foreach($kd_inventaris as $code) {
			if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
			if($code <> '') $ii++;
			$i++;
		}
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
		} else $msg .= 'Belum ada data Request';

		$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
		if($d['status'] != 'PENDING'){
			$msg .= 'Hanya Data PR dengan Status PENDING yang dapat melakukan Edit';
		}
		// if($priority == '') $msg .= 'Belum Memilih Tingkat Kepentingan';

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$tgl_pr = Validator::Date1(_post('idate'));
				$bl=date('n',strtotime($tgl_pr));
				$th=date('Y', strtotime($tgl_pr));

				$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				$d->diedit_oleh = $user['id'];
				$d->diedit_nama = $user['fullname'];
				$d->diedit_tgl = date('Y-m-d H:i:s');
				// $d->priority = $priority;
				$d->save();
				
				$i = 0;
				$x = ORM::for_table("pr_detail")->where('no_pr',$no_pr)->delete_many();
				foreach($kd_inventaris as $code) {
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $qty_stock[$i]);
					$sket = $keterangan[$i];
					$stgl = $tgl[$i];
					
					$y = ORM::for_table('pr_detail')->create();
					$y->no_pr = $no_pr;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->qty_stock = $sqty1;
					$y->status = 'PENDING';
					if(Validator::Date1($stgl) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($stgl));
					else
						$y->tgl_diperlukan = null;
					$y->keperluan = $code;
					$y->keterangan = $sket;
					$y->save();
					
					$i++;
				}
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Edit Data PR : '.$no_pr.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/add-pr-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Update. No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;
        
    case 'edit-pr-supplier':

        Event::trigger('pembelian/edit-pr/');

		_auth1('PR-EDIT-SUPPLIER',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
            $tg4 = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nama_supplier")->left_outer_join("daftar_supplier",array("a.kd_supplier","=","b.kode_supplier"),"b")->where('status','aktif')->find_many();
			
			
            foreach ($tg as $r) {
                $clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
            }

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
            $ui->assign('tg3',$tg3);
            $ui->assign('tg4',$tg4);
            $ui->assign('_sysfrm_menu3', 'pr1-pending');
			$ui->assign('idate',$idate);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-pr-supplier','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'edit-pr-supplier.tpl');
        } else r2(U.'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');

        break;

    case 'edit-pr-supplier-post':

        Event::trigger('pembelian/edit-pr-supplier-post/');

		$no_pr = _post('no_pr');
		$kd_inventaris = explode(',', _post('kd_inventaris'));
        $kd_item = explode(',', _post('kd_item'));
        $qty_req = explode(',', _post('qty_req'));
        $qty_stock = explode(',', _post('qty_stock'));
		$tgl = explode(',', _post('tgl'));
        $keterangan = explode(',', _post('keterangan'));
        $kd_supplier1 = explode(',', _post('kd_supplier1'));
        $harga1 = explode(',', _post('harga1'));
		$keterangan_supplier1 = explode(',', _post('keterangan_supplier1'));
		$file_supplier1 = explode(',', _post('file_supplier1'));
        $kd_supplier2 = explode(',', _post('kd_supplier2'));
        $harga2 = explode(',', _post('harga2'));
		$keterangan_supplier2 = explode(',', _post('keterangan_supplier2'));
		$file_supplier2 = explode(',', _post('file_supplier2'));
        $kd_supplier3 = explode(',', _post('kd_supplier3'));
        $harga3 = explode(',', _post('harga3'));
		$keterangan_supplier3 = explode(',', _post('keterangan_supplier3'));
		$file_supplier3 = explode(',', _post('file_supplier3'));
        $supplierpilihan = explode(',', _post('supplierpilihan'));
		$pembelian = _post('pembelian');
        
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
        $msg_supplier = '';
        $msg_pilihan = '';
		$i = 0;
		$ii = 0;
		foreach($kd_inventaris as $code) {
			if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
            if($kd_supplier1[$i] == '' ||  $harga1[$i] == '') $msg_supplier = 'Ada detail yang Kode Supplier 1 dan Harga 1 masih kosong';
            if($supplierpilihan[$i] == '') $msg_pilihan = 'Ada detail yang belum memilih Supplier Pilihan';
			if($code <> '') $ii++;
			$i++;
		}
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
            if($msg_supplier <> '')
                $msg .= $msg_supplier.'<br>';
            if($msg_pilihan <> '')
                $msg .= $msg_pilihan.'<br>';
		} else $msg .= 'Belum ada data Request';

		$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
		if($d['status'] != 'PENDING'){
			$msg .= 'Hanya Data PR dengan Status PENDING yang dapat melakukan Edit';
		}
		if($d['posisi'] != 'PR1'){
			$msg .= 'Hanya Data PR dengan Posisi PR1 yang dapat melakukan Edit';
		}
		if($pembelian == ''){
			$msg .= 'Jenis Pembelian tidak boleh kosong';
		}

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$tgl_pr = Validator::Date1(_post('idate'));
				$bl=date('n',strtotime($tgl_pr));
				$th=date('Y', strtotime($tgl_pr));

				$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				$d->sup_diedit_oleh = $user['id'];
				$d->sup_diedit_nama = $user['fullname'];
				$d->sup_diedit_tgl = date('Y-m-d H:i:s');
				$d->pembelian = $pembelian;
                if($d['status'] == 'REJECT' or $d['status'] == 'REVISI'){
                    $d->status = 'REVISI';
                }
				$d->save();
				
				$i = 0;
				$x = ORM::for_table("pr_detail")->where('no_pr',$no_pr)->delete_many();
				foreach($kd_inventaris as $code) {
					$skditem = $kd_item[$i];
                    $skd_inventaris = $kd_inventaris[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $qty_stock[$i]);
					$sket = $keterangan[$i];
					$stgl = $tgl[$i];
                    $skdsupplier1 = $kd_supplier1[$i];
                    $sharga1 = str_replace(".", "", $harga1[$i]);
					$sketerangansupplier1 = $keterangan_supplier1[$i];
					$sfilesupplier1 = $file_supplier1[$i];
                    $skdsupplier2 = $kd_supplier2[$i];
                    $sharga2 = str_replace(".", "", $harga2[$i]);
					$sketerangansupplier2 = $keterangan_supplier2[$i];
					$sfilesupplier2 = $file_supplier2[$i];
                    $skdsupplier3 = $kd_supplier3[$i];
                    $sharga3 = str_replace(".", "", $harga3[$i]);
					$sketerangansupplier3 = $keterangan_supplier3[$i];
					$sfilesupplier3 = $file_supplier3[$i];
                    if($supplierpilihan[$i] == 'supplier1') {
                        $ssupplierpilihan = $skdsupplier1;
                        $hargapilihan = $sharga1;
                    } else if($supplierpilihan[$i] == 'supplier2') {
                        $ssupplierpilihan = $skdsupplier2;
                        $hargapilihan = $sharga2;
                    } else if($supplierpilihan[$i] == 'supplier3') {
                        $ssupplierpilihan = $skdsupplier3;
                        $hargapilihan = $sharga3;
                    }
                    
					$y = ORM::for_table('pr_detail')->create();
					
					$y->no_pr = $no_pr;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->qty_stock = $sqty1;
                    $y->kd_supplier1 = $skdsupplier1;
                    $y->harga1 = $sharga1;
					$y->keterangan_supplier1 = $sketerangansupplier1;

					$y->file_supplier1 = $sfilesupplier1;

                    $y->kd_supplier2 = $skdsupplier2;
                    $y->harga2 = $sharga2;
					$y->keterangan_supplier2 = $sketerangansupplier2;

					$y->file_supplier2 = $sfilesupplier2;

                    $y->kd_supplier3 = $skdsupplier3;
                    $y->harga3 = $sharga3;
					$y->keterangan_supplier3 = $sketerangansupplier3;

					$y->file_supplier3 = $sfilesupplier3;

                    $y->supplierpilihan = $ssupplierpilihan;
                    $y->hargapilihan = $hargapilihan;
                    $y->status = 'PR';
					if(Validator::Date1($stgl) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($stgl));
					else
						$y->tgl_diperlukan = null;
//					$y->kd_inventaris = ($code == 'pStock' ? 'Untuk Stock' : $code);
                    $y->kd_inventaris = $skd_inventaris;
					$y->keperluan = $sket;
					$y->save();
					
					$i++;
				}
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Edit PR Supplier :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/add-pr-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Update. No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break; 
        
    case 'list-pr-aprv':
        Event::trigger('pembelian/list-pr-aprv/');

		_auth1('PR-APRV',$user['id']);
		$msg = $routes['3'];
        $ui->assign('name',$name);
        $d = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'PENDING')->order_by_desc('no_pr')->find_many();
        $e = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'REVISI')->order_by_desc('no_pr')->find_many();
        $f = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'PENDING')->order_by_desc('no_pr')->find_many();
        $g = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'REVISI')->order_by_desc('no_pr')->find_many();
        
        $cd = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'PENDING')->order_by_desc('no_pr')->count();
        $ce = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR')->where('status', 'REVISI')->order_by_desc('no_pr')->count();
        $cf = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'PENDING')->order_by_desc('no_pr')->count();
        $cg = ORM::for_table('pr_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'PR1')->where('status', 'REVISI')->order_by_desc('no_pr')->count();

        $ui->assign('d',$d);
        $ui->assign('e',$e);
        $ui->assign('f',$f);
        $ui->assign('g',$g);
        $ui->assign('cd',$cd);
        $ui->assign('ce',$ce);
        $ui->assign('cf',$cf);
        $ui->assign('cg',$cg);
		$ui->assign('msg',$msg);
        $ui->assign('_sysfrm_menu2', 'purchase-requisition-approve');
        $ui->assign('xfooter', Asset::js(array($spath.'list-pr')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-pr-aprv.tpl');

        break;
    
    case 'detail-pr-aprv':
        Event::trigger('pembelian/detail-pr/');

		_auth1('PR-DETAIL-APRV',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        $n = ORM::for_table('pr_master')->where('no_pr',$d['revisi_pr'])->find_one();
        if($d){
            $ui->assign('d',$d);
            $ui->assign('n',$n);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
            $f = ORM::for_table('pr_detail')->where('no_pr',$d['revisi_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
            $idates = date('d-m-Y', strtotime($n['tgl_pr']));
            
			$ui->assign('e',$e);
            $ui->assign('f',$f);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
			$ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);
            $ui->assign('idates',$idates);
            $ui->assign('_sysfrm_menu2', 'purchase-requisition-approve');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-pr-aprv','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'detail-pr-aprv.tpl');
        } else r2(U.'pembelian/list-pr-aprv', 'e', 'Pembelian tersebut tidak ditemukan');

        break;
        
     case 'detail-pr-aprvsup':
        Event::trigger('pembelian/detail-pr/');

		_auth1('PR-DETAIL-APRV',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
            $ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);          
            $ui->assign('_sysfrm_menu2', 'purchase-requisition-approve');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-pr-aprv','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'detail-pr-aprvsup.tpl');
        } else r2(U.'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');

        break;
        
    case 'detail-pr-approve':

        Event::trigger('pembelian/detail-pr-approve/');
        $msg = '';
        $no_pr = _post('no_pr');
        $pesan = _post('pesan');

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {

				$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
                if($d["posisi"] == 'PR'){
					$x = ORM::for_table('sys_appconfig')->where('setting', 'pr_diketahui')->find_one();
					$y = ORM::for_table('sys_appconfig')->where('setting', 'pr_diperiksa')->find_one();
					$z = ORM::for_table('sys_appconfig')->where('setting', 'pr_disetujui')->find_one();
					if($user['username'] == $x['value']) {
						$d->diketahui_oleh = $user['id'];
						$d->diketahui_nama = $user['fullname'];
						$d->diketahui_tgl = date('Y-m-d H:i:s');
					} else if($user['username'] == $y['value']) {
						$d->diperiksa_oleh = $user['id'];
						$d->diperiksa_nama = $user['fullname'];
						$d->diperiksa_tgl = date('Y-m-d H:i:s');
					} else if($user['username'] == $z['value']){
						$d->disetujui_oleh = $user['id'];
						$d->disetujui_nama = $user['fullname'];
						$d->disetujui_tgl = date('Y-m-d H:i:s');
					}
                } else {
                    $d->disetujui_oleh = $user['id'];
                    $d->disetujui_nama = $user['fullname'];
                    $d->disetujui_tgl = date('Y-m-d H:i:s');
                }
                $d->pesan = $pesan;
				$d->save();
				$e = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				if($e['diketahui_oleh'] != 0 && $e['diperiksa_oleh'] != 0 && $e['disetujui_oleh'] != 0) {
					$e->status = 'APPROVE';
					$e->save();
				}
                
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Approve PR :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/pr-aprv/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Approve. No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;
        
	case 'detail-pr-approvesup':

		Event::trigger('pembelian/detail-pr-approvesup/');
		$msg = '';
		$no_pr = _post('no_pr');
		$pesan = _post('pesan');
		$kd_inventaris = explode(',', _post('kd_inventaris'));
		$kd_item = explode(',', _post('kd_item'));
		$supplierpilihan = explode(',', _post('supplierpilihan'));

		if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {

				$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				$d->sup_disetujui_oleh = $user['id'];
				$d->sup_disetujui_nama = $user['fullname'];
				$d->sup_disetujui_tgl = date('Y-m-d H:i:s');
				
				$d->pesan = $pesan;
				$d->status = 'APPROVE';
				$d->save();

				$i = 0;
				foreach($kd_item as $item) {
					$skditem = $kd_item[$i];
                    $skd_inventaris = $kd_inventaris[$i];
					$ssupplierpilihan = $supplierpilihan[$i];
					$e = ORM::for_table('pr_detail')->where('no_pr', $no_pr)->where('kd_inventaris', $skd_inventaris)->where('kd_item', $skditem)->find_one();
					$e->supplierpilihan = $ssupplierpilihan;
					$e->save();
					$i++;
				}
				
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Approve PR :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/pr-aprv/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Approve. No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
		}
		else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
		}
		break;

    case 'detail-pr-reject':
        
        Event::trigger('pembelian/detail-pr-reject/');
        $msg = '';
        $no_pr = _post('no_pr');
        $pesan = _post('pesan');

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {

				$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				
				$d->ditolak_oleh = $user['id'];
				$d->ditolak_nama = $user['fullname'];
				$d->ditolak_tgl = date('Y-m-d H:i:s');
                
                $d->pesan = $pesan;
                $d->status = 'REJECT';
				$d->save();
				
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Reject PR :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/pr-aprv/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Reject. No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;
    
    case 'revisi-pr':

        Event::trigger('pembelian/revisi-pr/');

		_auth1('PR-REVISI',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['nm_inventaris'].'</option>';
			}
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->table_alias("a")->select("a.*")->select("b.nm_item")->left_outer_join("daftar_itemstock",array("a.kd_item","=","b.kd_item"),"b")->where('a.status','aktif')->find_many();

            
            $idate = date('d-m-Y', strtotime($d['tgl_pr']));
            $idates = date('d-m-Y');
            
            $tgl_pr = Validator::Date1($idates);
            $bl=date('n',strtotime($tgl_pr));
            $th=date('Y', strtotime($tgl_pr));
            $chk = ORM::for_table('pr_master')->raw_query('select * from pr_master where month(tgl_pr)='.$bl.' and year(tgl_pr)='.$th.' order by no_pr desc')->find_one();
            if($chk) {
                $no = ++$chk['no_pr'];
            } else {
                $no = 'PR/'.$th.'/'.date('m',strtotime($tgl_pr)).'/0001';
            }
			
            
			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
			$ui->assign('idate',$idate);
            $ui->assign('idates',$idates);
            $ui->assign('no_revisi',$no);
            $ui->assign('_sysfrm_menu2', 'pr-reject');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'revisi-pr','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'revisi-pr.tpl');
        } else r2(U.'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');

        break;

    case 'revisi-pr-post':

        Event::trigger('pembelian/revisi-pr-post/');

		$no_pr = _post('no_pr');
        $no_revisi = _post('no_revisi');
        $ket_revisi = _post('ket_revisi');
		$priority_revisi = _post('priority_revisi');
		$kd_inventaris = explode(',', _post('kd_inventaris'));
        $kd_item = explode(',', _post('kd_item'));
        $qty_req = explode(',', _post('qty_req'));
        $qty_stock = explode(',', _post('qty_stock'));
		$tgl = explode(',', _post('tgl'));
        $keterangan = explode(',', _post('keterangan'));
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
		$msg_tgl = '';
		$i = 0;
		$ii = 0;
        
        $n = ORM::for_table('pr_master')->where('no_pr',$no_revisi)->find_one();
        if($n) {
            $msg .= 'No PR Revisi telah terdaftar, mohon refresh halaman untuk mendapatkan No PR Revisi baru';
        }
		foreach($kd_inventaris as $code) {
			if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
			if($tgl[$i] == 0)	$msg_tgl = 'Ada detail yang belum mengisi Tgl Diperlukan';
			if($code <> '') $ii++;
			$i++;
		}
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
			if($msg_tgl <> '')
				$msg .= $msg_tgl.'<br>';
		} else $msg .= 'Belum ada data Request';

        
        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$tgl_pr = Validator::Date1(_post('idate'));
                $tgl_pr_revisi = Validator::Date1(_post('idates'));
				$bl=date('n',strtotime($tgl_pr));
				$th=date('Y', strtotime($tgl_pr));
				
                $d = ORM::for_table('pr_master')->create();
				$d->no_pr = $no_revisi;
				$d->tgl_pr = $tgl_pr_revisi;
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');
				$d->posisi = 'PR';
                $d->status = 'REVISI';
                $d->priority = $priority_revisi;
                $d->revisi_pr = $no_pr;
                $d->keterangan_revisi = $ket_revisi;
				$d->save();                
                
                $e = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				$e->diedit_oleh = $user['id'];
				$e->diedit_nama = $user['fullname'];
				$e->diedit_tgl = date('Y-m-d H:i:s');
                $e->posisi = 'PR';
                $e->status = 'CANCEL';
				$e->save();
                
                $i = 0;
				foreach($kd_inventaris as $code) {
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $qty_stock[$i]);
					$sket = $keterangan[$i];
					$stgl = $tgl[$i];
					
					$y = ORM::for_table('pr_detail')->create();
					$y->no_pr = $no_revisi;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->qty_stock = $sqty1;
					if(Validator::Date1($stgl) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($stgl));
					else
						$y->tgl_diperlukan = null;
					$y->kd_inventaris = ($code == 'STOCK' ? 'STOCK' : $code);
					$y->keperluan = $sket;
					$y->status = 'PENDING';
					$y->save();
					
					$i++;
				}
				$cid = $d->id();
				ORM::get_db()->commit();
				_log('Revisi PR :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/revisi-pr-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Revisi. No. PR : '.$no_revisi,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;
        
    case 'supplier-pr':

        Event::trigger('pembelian/supplier-pr/');

		_auth1('PR-SUPPLIER',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('pr_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('pr_detail')->where('no_pr',$d['no_pr'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Keperluan</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			$clist .= '<option value="PENGADAAN">PENGADAAN BARU</option>';
			$clist .= '<option value="PERGANTIAN">PERGANTIAN</option>';
			// foreach ($tg as $r) {
			// 	$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			// }
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
            $tg4 = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nama_supplier")->left_outer_join("daftar_supplier",array("a.kd_supplier","=","b.kode_supplier"),"b")->find_many();
			
            // foreach ($tg as $r) {
            //     $clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
            // }

			$idate = date('d-m-Y', strtotime($d['tgl_pr']));
			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
            $ui->assign('tg3',$tg3);
            $ui->assign('tg4',$tg4);
            $ui->assign('_sysfrm_menu2', 'pr-approve');
			$ui->assign('idate',$idate);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-pr-supplier','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'add-pr-supplier.tpl');
        } else r2(U.'pembelian/list-pr', 'e', 'Pembelian tersebut tidak ditemukan');

        break;

    case 'supplier-pr-post':

        Event::trigger('pembelian/supplier-pr-post/');

		$no_pr = _post('no_pr');
		$pembelian = _post('pembelian');
		// $kd_inventaris = explode(',', _post('kd_inventaris'));
				// $keperluan = explode(',', _post('keperluan'));
        // $kd_item = explode(',', _post('kd_item'));
        // $qty_req = explode(',', _post('qty_req'));
        // $qty_stock = explode(',', _post('qty_stock'));
		// $tgl = explode(',', _post('tgl'));
        // $keterangan = explode(',', _post('keterangan'));
        $kd_supplier1 = explode(',', _post('kd_supplier1'));
        $harga1 = explode(',', _post('harga1'));
		$keterangan_supplier1 = explode(',', _post('keterangan_supplier1'));
		$file_supplier1 = explode(',', _post('file_supplier1'));
        $kd_supplier2 = explode(',', _post('kd_supplier2'));
        $harga2 = explode(',', _post('harga2'));
		$keterangan_supplier2 = explode(',', _post('keterangan_supplier2'));
		$file_supplier2 = explode(',', _post('file_supplier2'));
        $kd_supplier3 = explode(',', _post('kd_supplier3'));
        $harga3 = explode(',', _post('harga3'));
		$keterangan_supplier3 = explode(',', _post('keterangan_supplier3'));
		$file_supplier3 = explode(',', _post('file_supplier3'));
        $supplierpilihan = explode(',', _post('supplierpilihan'));
		
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
        $msg_supplier = '';
        $msg_pilihan = '';
		$i = 0;
		$ii = 1;
		// foreach($kd_inventaris as $code) {
			if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
            if($kd_supplier1[$i] == '' ||  $harga1[$i] == '') $msg_supplier = 'Ada detail yang Kode Supplier 1 dan Harga 1 masih kosong';
            if($supplierpilihan[$i] == '') $msg_pilihan = 'Ada detail yang belum memilih Supplier Pilihan';
			// if($code <> '') $ii++;
			$i++;
		// }
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
            if($msg_supplier <> '')
                $msg .= $msg_supplier.'<br>';
            if($msg_pilihan <> '')
                $msg .= $msg_pilihan.'<br>';
		} else $msg .= 'Belum ada data Request';

		$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
		if($d['status'] != 'APPROVE'){
			$msg .= 'Hanya Data PR dengan Status APPROVE yang dapat memilih supplier';
		}
		if($d['posisi'] != 'PR'){
			$msg .= 'Hanya Data PR dengan Posisi PR yang dapat memilih supplier';
		}
		if($pembelian == ''){
			$msg .= 'Jenis Pembelian Tidak Boleh Kosong';
		}

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$tgl_pr = Validator::Date1(_post('idate'));
				$bl=date('n',strtotime($tgl_pr));
				$th=date('Y', strtotime($tgl_pr));

				$d = ORM::for_table('pr_master')->where('no_pr',$no_pr)->find_one();
				$d->sup_dibuat_oleh = $user['id'];
				$d->sup_dibuat_nama = $user['fullname'];
				$d->sup_dibuat_tgl = date('Y-m-d H:i:s');
                $d->posisi = 'PR1';
                $d->status = 'PENDING';
				$d->pembelian = $pembelian;
				$d->save();
				
				$i = 0;
				$x = ORM::for_table("pr_detail")->where('no_pr',$no_pr)->delete_many();
				foreach($kd_inventaris as $code) {
					$skditem = $kd_item[$i];
                    $skd_inventaris = $kd_inventaris[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $qty_stock[$i]);
					$sket = $keterangan[$i];
					$stgl = $tgl[$i];
                    $skdsupplier1 = $kd_supplier1[$i];
                    $sharga1 = str_replace(".", "", $harga1[$i]);
					$sketerangansupplier1 = $keterangan_supplier1[$i];

					$sfilesupplier1 = $file_supplier1[$i];

                    $skdsupplier2 = $kd_supplier2[$i];
                    $sharga2 = str_replace(".", "", $harga2[$i]);
					$sketerangansupplier2 = $keterangan_supplier2[$i];

					$sfilesupplier2 = $file_supplier2[$i];

                    $skdsupplier3 = $kd_supplier3[$i];
                    $sharga3 = str_replace(".", "", $harga3[$i]);
					$sketerangansupplier3 = $keterangan_supplier3[$i];

					$sfilesupplier3 = $file_supplier3[$i];

                    if($supplierpilihan[$i] == 'supplier1') {
                        $ssupplierpilihan = $skdsupplier1;
                        $hargapilihan = $sharga1;
                    } else if($supplierpilihan[$i] == 'supplier2') {
                        $ssupplierpilihan = $skdsupplier2;
                        $hargapilihan = $sharga2;
                    } else if($supplierpilihan[$i] == 'supplier3') {
                        $ssupplierpilihan = $skdsupplier3;
                        $hargapilihan = $sharga3;
                    }
					
					$y = ORM::for_table('pr_detail')->create();
					
					$y->no_pr = $no_pr;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->qty_stock = $sqty1;
                    $y->kd_supplier1 = $skdsupplier1;
                    $y->harga1 = $sharga1;
					$y->keterangan_supplier1 = $sketerangansupplier1;

					$y->file_supplier1 = $sfilesupplier1;

                    $y->kd_supplier2 = $skdsupplier2;
                    $y->harga2 = $sharga2;
					$y->keterangan_supplier2 = $sketerangansupplier2;

					$y->file_supplier2 = $sfilesupplier2;

                    $y->kd_supplier3 = $skdsupplier3;
                    $y->harga3 = $sharga3;
					$y->keterangan_supplier3 = $sketerangansupplier3;

					$y->file_supplier3 = $sfilesupplier3;

                    $y->supplierpilihan = $ssupplierpilihan;
                    $y->hargapilihan = $hargapilihan;
                    $y->status = 'PR';
					if(Validator::Date1($stgl) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($stgl));
					else
						$y->tgl_diperlukan = null;
//					$y->kd_inventaris = ($code == 'pStock' ? 'Untuk Stock' : $code);
                    $y->kd_inventaris = $skd_inventaris;
					$y->keperluan = $sket;
					$y->save();
					
					$i++;
				}
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Supplier : '.$no_pr.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/pr-aprv/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Update. No. PR : '.$no_pr,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break; 
        
    case 'list-po':

        Event::trigger('pembelian/listpo/');

		_auth1('PO-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('po_master','no_po','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        else{
            $paginator = Paginator::bootstrap('po_master','','','','','','','','','50','');
            $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            
            $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'purchase-order');
        $ui->assign('_sysfrm_menu3', 'list-po');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po.tpl');

        break;
    
    case 'list-po-pending':

        Event::trigger('pembelian/listpo/');

		_auth1('PO-LIST-PENDING',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('po_master','no_po','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        else{
            $paginator = Paginator::bootstrap('po_master','','','','','','','','','50','');
            $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where_in('status', array('PENDING', 'REVISI'))->order_by_desc('no_po')->find_many();
            
            $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where_in('status', array('PENDING', 'REVISI'))->order_by_desc('no_po')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'purchase-order');
        $ui->assign('_sysfrm_menu3', 'po-pending');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po-pending.tpl');

        break;
    
    case 'list-po-ready':

        Event::trigger('pembelian/listpo/');

		_auth1('PO-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('po_master','no_po','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        else{
            $paginator = Paginator::bootstrap('po_master','','','','','','','','','50','');
            
            $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'READY')->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'READY')->order_by_desc('no_po')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'purchase-order');
        $ui->assign('_sysfrm_menu3', 'po-ready');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po-ready.tpl');

        break;
        
    case 'list-po-approve':

        Event::trigger('pembelian/listpo/');

		_auth1('PO-LIST-APPROVE',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('po_master','no_po','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        else{
            $paginator = Paginator::bootstrap('po_master','','','','','','','','','50','');
            
            $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'APPROVE')->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'APPROVE')->order_by_desc('no_po')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'purchase-order');
        $ui->assign('_sysfrm_menu3', 'po-approve');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po-approved.tpl');

        break;
        
    case 'list-po-reject':

        Event::trigger('pembelian/listpo/');

		_auth1('PO-LIST-REJECT',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('po_master','no_po','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        else{
            $paginator = Paginator::bootstrap('po_master','','','','','','','','','50','');
            
            $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'REJECT')->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'REJECT')->order_by_desc('no_po')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'purchase-order');
        $ui->assign('_sysfrm_menu3', 'po-reject');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po-rejected.tpl');

        break;
        
    case 'list-po-cancel':

        Event::trigger('pembelian/listpo/');

		_auth1('PO-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('po_master','no_po','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->where_like('no_po','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_po')->count();
        }
        else{
            $paginator = Paginator::bootstrap('po_master','','','','','','','','','50','');
            
            $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'CANCEL')->order_by_desc('no_po')->find_many();
            $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('posisi', 'CANCEL')->order_by_desc('no_po')->count();
        }
        
        $ui->assign('d',$d);
        $ui->assign('cd',$cd);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('_sysfrm_menu2', 'purchase-order');
        $ui->assign('_sysfrm_menu3', 'po-cancel');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po-cancel.tpl');

        break;

    case 'add-po':

        Event::trigger('pembelian/add-po/');

		_auth1('PO-ADD',$user['id']);

		$clist = '';
		$clist = '<option value="">Pilih Supplier</option>';
		$tg = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
		foreach ($tg as $r) {
			$clist .= '<option value="'.$r['kode_supplier'].'">'.$r['kode_supplier'].' - '.$r['nama_supplier'].'</option>';
		}

		$list_direksi = '<option value="">Pilih Direksi</option>';
		$dir = ORM::for_table('sys_users', 'dblogin')->where('kode_dept','DIR')->find_many();
		foreach ($dir as $j) {
			$list_direksi .= '<option value="'.$j['username'].'">'.$j['fullname'].'</option>';
		}

		$idate = date('d-m-Y');
		$ui->assign('opt_supplier',$clist);
		$ui->assign('list_direksi',$list_direksi);
		$ui->assign('idate',$idate);
        $ui->assign('_sysfrm_menu3', 'list-po');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));


        $ui->display($spath.'add-po.tpl');

        break;

    case 'add-po-post':
        Event::trigger('pembelian/add-po-post/');

		$no_pr = explode(',', _post('no_pr'));
        $kd_item = explode(',', _post('kd_item'));
        $id = explode(',', _post('id'));
        $max = explode(',', _post('max'));
        $qty_req = explode(',', _post('qty_req'));
        $garansi_bulan = explode(',', _post('garansi_bulan'));
        $garansi_hari = explode(',', _post('garansi_hari'));
		$harga = explode(',', _post('harga'));
		$keterangan = explode(',', _post('keterangan'));
		$supplier = _post('supplier');
		$catatan = _post('catatan');
		$lokasi_pengiriman = _post('lokasi_pengiriman');
		$syarat_pembayaran = _post('syarat_pembayaran');
		$priority = _post('priority');
		$ppn = _post('ppn');
		$exclude_ppn = _post('exclude_ppn');
		$dir = _post('direksi_approval');

		$harga_total = 0;
		foreach ($harga as $i => $h) {
			$harga_total += intval(str_replace(".", "", $h)) * intval($qty_req[$i]);
		}

		$msg = '';
		if ($supplier == '') $msg .= 'Supplier wajib dipilih <br>';
		if ($priority == '') $msg .= 'Tingkat Kepentingan wajib dipilih <br>';
		if ($exclude_ppn == 'false' && $ppn == 0) $msg .= 'Ppn wajib diisi <br>';
		for ($i = 0; $i < count($id); $i++) {
			if ($qty_req[$i] > $max[$i]) $msg .= 'PO '. strval($i + 1) . ' : Quantity melebihi permintaan (' . $max[$i] . ') <br />';
		}
		if ($harga_total > 2000000 && $dir == '')
			$msg .= 'Direksi Approval wajib dipilih <br>';

		// $msg = '';
		// $msg_item = '';
		// $msg_qty = '';
		// $i = 0;
		// $ii = 0;
		// foreach($no_pr as $code) {
		// 	if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
		// 	if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
		// 	if($code <> '') $ii++;
		// 	$i++;
		// }
		// if($ii > 0) {
		// 	if($msg_item <> '')
		// 		$msg .= $msg_item.'<br>';
		// 	if($msg_qty <> '')
		// 		$msg .= $msg_qty.'<br>';
		// } else $msg .= 'Belum ada data Request<br>';

		// if($priority == ''){
		// 	$msg .= 'Tingkat Kepentingan belum diisi';
		// }

        if($msg == ''){
			ORM::get_db()->beginTransaction();
			try {
				$tgl_po = Validator::Date1(_post('idate'));
				$bl=date('n',strtotime($tgl_po));
				$th=date('Y', strtotime($tgl_po));
				$chk = ORM::for_table('po_master')->raw_query('select * from po_master where month(tgl_po)='.$bl.' and year(tgl_po)='.$th.' order by no_po desc')->find_one();
				if($chk) {
					$no = ++$chk['no_po'];
				} else {
					$no = 'PO/'.$th.'/'.date('m',strtotime($tgl_po)).'/0001';
				}
				$i = 0;
				$total = 0;
				foreach($no_pr as $code) {
					$snopr = $no_pr[$i];
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $harga[$i]);
					$sket = $keterangan[$i];

					$y = ORM::for_table('po_detail')->create();
					$y->no_po = $no;
					$y->no_pr = $snopr;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->garansi_bulan = $garansi_bulan[$i];
					$y->garansi_hari = $garansi_hari[$i];
					$y->harga = $sqty1;
					$total_temp = (int)$sqty1 * (int)$sqty;
					$y->keterangan = $sket;
					$total += (int)$total_temp;
					$y->save();

					$z = ORM::for_table('pr_detail')->where('id', $id[$i])->find_one();
					$z->sisa -= $qty_req[$i];
					$z->save();

					$i++;
				}

				$d = ORM::for_table('po_master')->create();
				$d->no_po = $no;
				$d->tgl_po = $tgl_po;
				$d->kd_supplier = $supplier;
				$d->priority = $priority;
				$d->catatan = $catatan;
				$exclude_ppn == 'true' ? $d->exclude_ppn = 1 : $d->ppn = $ppn;
				$d->lokasi_pengiriman = $lokasi_pengiriman;
				$d->syarat_pembayaran = $syarat_pembayaran;
				$d->total_harga = $total;
				$total_netto = (int)$total + ((int)$total*(int)$ppn/100);
				$d->total_netto = $total_netto;
				(int)$harga_total > 2000000 && $d->dir_approval = $dir;
				// $d->status = 'PENDING';
				$d->status = 'APPROVE';
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Data PO : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/add-po-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Update. No. PO : '.$no,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;    
    
    case 'edit-po':

        Event::trigger('pembelian/edit-po/');

		_auth1('PO-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('po_master')->find_one($cid);
		$g = ORM::for_table('daftar_supplier')->where('kode_supplier', $d['kd_supplier'])->find_one();
		$namasupplier = $g['nm_supplier'];
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('po_detail')->where('no_po',$d['no_po'])->find_many();
			
			$x = ORM::for_table('pr_detail')->where('status', 'PR')->where('supplierpilihan', $kode)->find_many();
            $clist = '';
            foreach($e as $item) {
                $y = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
                $clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                            <td><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" readonly></td>
                            <td><select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item"><option value="'. $item["kd_item"] .'">'. $y["nm_item"] .'</option></select></td>
                            <td><input type="text" name="qty_req[]" class="qty_req amount" value='. $item["qty_req"] .' readonly></td>
                            <td><input type="text" name="harga[]" class="harga amount" value="'. $item["harga"] .'" readonly></td>
                            <td><input type="text" name="keterangan[]" class="keterangan" value="'. $item["keterangan"] .'"></td>
                ';
            };

			$idate = date('d-m-Y', strtotime($d['tgl_po']));
			$ui->assign('d',$d);
			$ui->assign('e',$e);
			$ui->assign('clist',$clist);
            $ui->assign('_sysfrm_menu3', 'po-pending');
			$ui->assign('idate',$idate);
			$ui->assign('namasupplier',$namasupplier);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'edit-po.tpl');
        } else r2(U.'pembelian/list-po', 'e', 'Pembelian tersebut tidak ditemukan');

        break;

    case 'edit-po-post':

        Event::trigger('pembelian/edit-po-post/');

		$cid = $routes['3'];
		$no_po = _post('no_po');
		$no_pr = explode(',', _post('no_pr'));
        $kd_item = explode(',', _post('kd_item'));
        $qty_req = explode(',', _post('qty_req'));
		$harga = explode(',', _post('harga'));
		$keterangan = explode(',', _post('keterangan'));
		$catatan = _post('catatan');
		$lokasi_pengiriman = _post('lokasi_pengiriman');
		$syarat_pembayaran = _post('syarat_pembayaran');
		$ppn = _post('ppn');
		$priority = _post('priority');
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
		$i = 0;
		$ii = 0;
		foreach($no_pr as $code) {
			if($kd_item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($qty_req[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
			if($code <> '') $ii++;
			$i++;
		}
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
		} else $msg .= 'Belum ada data Request<br>';

		if($priority == ''){
			$msg .= 'Tingkat Kepentingan tidak boleh kosong';
		}
        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$x = ORM::for_table("po_detail")->where('no_po',$no_po)->find_many();
				foreach($x as $code) {
					$z = ORM::for_table('pr_detail')->where('no_pr', $code['no_pr'])->where('kd_item', $code['kd_item'])->find_one();
					$z->status = 'PR';
					$z->save();
				}
				$y = ORM::for_table("po_detail")->where('no_po',$no_po)->delete_many();
				$total = 0;
				$i = 0;
				foreach($no_pr as $code) {
					$snopr = $no_pr[$i];
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $harga[$i]);
					$sket = $keterangan[$i];
					
					$y = ORM::for_table('po_detail')->create();
					$y->no_po = $no_po;
					$y->no_pr = $snopr;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					$y->harga = $sqty1;
					$total_temp = (int)$sqty1 * (int)$sqty;
					$y->keterangan = $sket;
					$total += (int)$total_temp;
					$y->save();

					$z = ORM::for_table('pr_detail')->where('no_pr', $snopr)->where('kd_item', $skditem)->find_one();
					$z->status = 'PO';
					$z->save();
					$i++;
				}

				$d = ORM::for_table('po_master')->where('no_po', $no_po)->find_one();
				$d->diedit_oleh = $user['id'];
				$d->diedit_nama = $user['fullname'];
				$d->diedit_tgl = date('Y-m-d H:i:s');
				$d->catatan = $catatan;
				$d->lokasi_pengiriman = $lokasi_pengiriman;
				$d->syarat_pembayaran = $syarat_pembayaran;
				$d->ppn = $ppn;
				$d->priority = $priority;
				$d->total_harga = $total;
				$total_netto = (int)$total + ((int)$total*(int)$ppn/100);
				$d->total_netto = $total_netto;
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log('Edit PO :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/edit-po-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Update. No. PO : '.$no_po,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break; 
    
    case 'detail-po':
        Event::trigger('pembelian/detail-po/');

		_auth1('PO-DETAIL',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('po_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('po_detail')->where('no_po',$d['no_po'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_po']));
			if($d['status'] == 'PENDING' or $d['status'] == 'REVISI') {
				$ui->assign('_sysfrm_menu2', 'purchase-order');
				$ui->assign('_sysfrm_menu3', 'po-pending');
			} else if($d['status'] == 'REJECT') {
				$ui->assign('_sysfrm_menu2', 'purchase-order');
				$ui->assign('_sysfrm_menu3', 'po-reject');
			} else if($d['status'] == 'APPROVE') {
				$ui->assign('_sysfrm_menu2', 'purchase-order');
				$ui->assign('_sysfrm_menu3', 'po-approve');
			}

			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
            $ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);
            $ui->assign('_sysfrm_menu2', 'purchase-order');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'detail-po.tpl');
        } else r2(U.'pembelian/list-po', 'e', 'Pembelian tersebut tidak ditemukan');

        break;
        
    case 'list-po-aprv':
        Event::trigger('pembelian/list-po-aprv/');

		_auth1('PO-APRV',$user['id']);
		$msg = $routes['3'];
        $ui->assign('name',$name);
        $d = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'PENDING')->order_by_desc('no_po')->find_many();
        $e = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'REVISI')->order_by_desc('no_po')->find_many();
        
        $cd = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'PENDING')->order_by_desc('no_po')->count();
        $ce = ORM::for_table('po_master')->offset($paginator['startpoint'])->limit($paginator['limit'])->where('status', 'REVISI')->order_by_desc('no_po')->count();

        $ui->assign('d',$d);
        $ui->assign('e',$e);
        $ui->assign('cd',$cd);
        $ui->assign('ce',$ce);
		$ui->assign('msg',$msg);
        $ui->assign('_sysfrm_menu2', 'purchase-order-approve');
        $ui->assign('xfooter', Asset::js(array($spath.'list-po')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-po-aprv.tpl');

        break;
        
    case 'detail-po-aprv':
        Event::trigger('pembelian/detail-po/');

		_auth1('PO-DETAIL-APRV',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('po_master')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$e = ORM::for_table('po_detail')->where('no_po',$d['no_po'])->find_many();
			
			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
				
			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
            $tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_po']));
            $idates = date('d-m-Y', strtotime($n['tgl_po']));
            
			$ui->assign('e',$e);
            $ui->assign('f',$f);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
            $ui->assign('tg3',$tg3);
			$ui->assign('idate',$idate);
            $ui->assign('idates',$idates);
            $ui->assign('_sysfrm_menu2', 'purchase-order-approve');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-po-aprv','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'detail-po-aprv.tpl');
        } else r2(U.'pembelian/list-po-aprv', 'e', 'Pembelian tersebut tidak ditemukan');

        break;
        
    case 'detail-po-approve':

        Event::trigger('pembelian/detail-po-approve/');
        $msg = '';
        $no_po = _post('no_po');
        $pesan = _post('pesan');

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {

				$d = ORM::for_table('po_master')->where('no_po',$no_po)->find_one();
				$d->disetujui_oleh = $user['id'];
				$d->disetujui_nama = $user['fullname'];
				$d->disetujui_tgl = date('Y-m-d H:i:s');
                $d->pesan = $pesan;
                $d->status = 'APPROVE';
				$d->save();

				$e = ORM::for_table('po_detail')->where('no_po',$no_po)->find_many();
				foreach($e as $item) {
					$f = ORM::for_table('pr_detail')->where('no_pr',$item['no_pr'])->where('kd_item',$item['kd_item'])->find_one();
					$f->status = 'DONE';
					$f->save();
				}
                
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Approve PO :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/po-aprv/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Approve. No. PO : '.$no_po,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;
        
    case 'detail-po-reject':
        
        Event::trigger('pembelian/detail-po-reject/');
        $msg = '';
        $no_po = _post('no_po');
        $pesan = _post('pesan');

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {

				$d = ORM::for_table('po_master')->where('no_po',$no_po)->find_one();
				$d->disetujui_oleh = $user['id'];
				$d->disetujui_nama = $user['fullname'];
				$d->disetujui_tgl = date('Y-m-d H:i:s');
                $d->pesan = $pesan;
                $d->status = 'REJECT';
				$d->save();
				
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Reject PO :'.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/po-aprv/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Reject. No. PO : '.$no_po,
						'dataval'		=>	1);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
        }
        break;
        
    

 	case 'render-inv_item':

        $kode = _post('kode');
		if($kode <> '') {
			// if($kode == 'STOCK') {
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kd_item'].'">'.$r['nm_item'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			// } else {
				// $opt = '<option value="">Pilih Item Stock</option>';
				// $y = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$kode)->where('status','aktif')->find_many();
				// foreach($y as $r) {
				// 	$x = ORM::for_table('daftar_itemstock')->where('kd_item',$r['kd_item'])->where('active','Y')->find_one();
				// 	$opt .= '<option value="'.$r['kd_item'].'">'.$x['nm_item'].'</option>';
				// }
				// $data = array(
				// 		'opt'			=>	$opt);
				// echo json_encode($data);
			// }
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Item Stock</option>');
			echo json_encode($data);
		}
		
        break;
        
    case 'render-po-supplier':

        $kode = _post('kode');
		if($kode <> '') {
            $x = ORM::for_table('pr_detail')->where_raw('sisa > 0')->where_any_is([
				['kd_supplier1' => $kode, 'supplierpilihan' => '1'],
				['kd_supplier2' => $kode, 'supplierpilihan' => '2'],
				['kd_supplier3' => $kode, 'supplierpilihan' => '3']
			])->find_many();
            $clist = '';
            foreach($x as $item) {
                $y = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
                $clist .= '<tr><td style="width: 3% ;vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none; background-color: #f7f7f7"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
                            <td style="width: 13% ;vertical-align: middle"><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" style="width: 100%; background-color: transparent; border: none;" readonly>
							<input type="hidden" name="id_pr_detail[]" class="id_pr_detail" value="' . $item["id"] . '"/>
							<input type="hidden" name="max[]" class="max" value="' . $item["sisa"] . '"/></td>
                            <td style="width: 20% ;vertical-align: middle"><input type="hidden" name="kd_item[]" class="kd_item" value="'. $item["kd_item"] .'">
							<input type="text" value="'. $y["nm_item"] .'" style="width: 100%; background-color: transparent; border: none;" readonly></td>
                            <td style="width: 10% ;vertical-align: middle"><input type="text" name="harga[]" class="harga amount" value="'. $item["hargapilihan"] .'" style="width: 100%; background-color: transparent; border: none;" readonly></td>
                            <td style="width: 10% ;vertical-align: middle"><input type="text" name="qty_req[]" class="qty_req" value='. $item["sisa"] .' style="width: 100%;"></td>
                            <td style="width: 7% ;vertical-align: middle"><input type="number" name="garansi_bulan[]" class="garansi_bulan" placeholder="Bulan" min="0" style="width: 100%;"></td>
                            <td style="width: 7% ;vertical-align: middle"><input type="number" name="garansi_hari[]" class="garansi_hari" placeholder="Hari" min="0" style="width: 100%;"></td>
                            <td style="width: 30% ;vertical-align: middle"><input type="text" name="keterangan[]" class="keterangan" style="width: 100%;"></td></tr>
                ';
            };
            
            $data = array(
                    'clist'			=>	$clist);
            echo json_encode($data);
			
		} else {
			$data = array(
					'clist'	=>	'<option value="">Pilih Item Stock</option>');
			echo json_encode($data);
		}
		
        break;
	
	case 'render-po-suppliers':

		$kode = _post('kode');
		$no_po = _post('no_po');
		if($kode <> '') {
			$clist = '';
			$d = ORM::for_table('po_detail')->where('no_po', $no_po)->find_many();
			foreach($d as $item) {
				$e = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
				$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
							<td><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" readonly></td>
							<td><select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item"><option value="'. $item["kd_item"] .'">'. $e["nm_item"] .'</option></select></td>
							<td><input type="text" name="qty_req[]" class="qty_req amount" value='. $item["qty_req"] .' readonly></td>
							<td><input type="text" name="harga[]" class="harga amount" value="'. $item["harga"] .'" readonly></td>
							<td><input type="text" name="keterangan[]" class="keterangan"></td>
				';
			}
			$x = ORM::for_table('pr_detail')->where('status', 'PR')->where('supplierpilihan', $kode)->find_many();
			foreach($x as $item) {
				$y = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
				$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
							<td><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" readonly></td>
							<td><select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item"><option value="'. $item["kd_item"] .'">'. $y["nm_item"] .'</option></select></td>
							<td><input type="text" name="qty_req[]" class="qty_req amount" value='. $item["qty_req"] .' readonly></td>
							<td><input type="text" name="harga[]" class="harga amount" value="'. $item["hargapilihan"] .'" readonly></td>
							<td><input type="text" name="keterangan[]" class="keterangan"></td>
				';
			};
			
			$data = array(
					'clist'			=>	$clist);
			echo json_encode($data);
			
		} else {
			$data = array(
					'clist'	=>	'<option value="">Pilih Item Stock</option>');
			echo json_encode($data);
		}
		
		break;
        
    case 'render-kd_supplier':
        $kode = _post('kode');
		if($kode <> '') {
            $opt = '<option value="">Pilih Supplier</option>';
            $y = ORM::for_table('daftar_itemstock_supplier')->where(array(
                'kd_item' => $kode,
                'status' => 'aktif'
            ))->find_many();
            foreach($y as $r) {
                $opt .= '<option value="'.$r['kd_supplier'].'">'.$r['kd_supplier'].'</option>';
            }
            $data = array(
                    'opt'			=>	$opt);
            echo json_encode($data);
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Supplier</option>');
			echo json_encode($data);
		}
        break;

	case 'ganti-supplier':
		$cid = _post('cid');
		$supplier = _post('supplier');

		$d = ORM::for_table('pr_detail')->where('id', $cid)->find_one();

		if($d){
			$harga = [$d['harga1'], $d['harga2'], $d['harga3']];
			ORM::get_db()->beginTransaction();
			try {
				if ($supplier <> '1' && $supplier <> '2' && $supplier <> '3') $supplier = '1';
				$d->supplierpilihan = $supplier;
				$d->hargapilihan = $harga[$supplier - 1];
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Ganti Data Supplier. PR : '.$d['no_pr'].' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/ganti-supplier/_on_finished');
				$data = array(
					'dataval' => 1
				);
				echo json_encode($data);
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        }
        else {
			$data = array(
				'msg' => 'PR tidak dapat ditemukan',
				'dataval' => 'a'
			);
			echo json_encode($data);
        }
		break;

	case 'upload-file':
		if(isset($_FILES['file']['name'])){
			$filename = $_FILES['file']['name'];
			$timestamp = time();
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			$allowed_extensions = array("jpg","jpeg","png","pdf","xlsx","xls");
			$response = array();
			$status = 0;
			if(in_array(strtolower($extension), $allowed_extensions)) {
				$new_filename = $timestamp . '.' . $extension;
				$location = "uploads/GAS/PR_SUPPLIER/" . $new_filename;
				if (file_exists($location)) {
					$status = 2;
				} else {
					if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
						$status = 1; 
						$response['path'] = $location;
						$response['extension'] = $extension;
					}
				}
			}
			$response['status'] = $status;
			$response['filename'] = $new_filename;
			echo json_encode($response);
			exit;
		}
		echo 0;
		break;

   default:
        echo 'action not defined';
}