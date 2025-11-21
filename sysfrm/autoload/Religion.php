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

Class Religion
{
    public static function all($selected = '')
    {
        $clist = '
	<option value="buddha">Buddha</option>
	<option value="hindu">Hindu</option>
	<option value="islam">Islam</option>
	<option value="kristen">Kristen</option>';
        $sfind = 'value="' . $selected . '"';
        if ($selected != '') {
            $religi = str_replace($sfind, $sfind . ' selected="selected"', $clist);
            return $religi;
        } else {
            return $clist;
        }


    }

}