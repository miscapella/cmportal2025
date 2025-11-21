<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
Class Dealer {
    public static function all($type = '',$selected = '') {
		$clist = '';
		$clist = '<option value="">Pilih Cabang</option>';
		if($type == '') {
			$tg = ORM::for_table('dealer','dblogin')->find_many();
		} elseif ($type == 'Showroom') {
			$tg = ORM::for_table('dealer','dblogin')->where('showroom',1)->find_many();
		} elseif ($type == 'Workshop')
			$tg = ORM::for_table('dealer','dblogin')->where('workshop',1)->find_many();
			
		foreach ($tg as $r) {
			$clist .= '<option value="'.$r['kdcab'].'" '.($selected == trim($r['kdcab']) ? 'selected="selected"' : '').'>'.$r['cabang'].'</option>';
		}
		return $clist;
    }
}