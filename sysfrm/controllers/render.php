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
$action = $routes['1'];
$kode_vihara = $routes['2'];
switch($action){
	case 'minibar':

        Event::trigger('render/minibar/');

		if(!isset($_SESSION['minibar']) || $_SESSION['minibar'] == '2')
			$_SESSION['minibar']='1';
		elseif($_SESSION['minibar'] == '1')
			$_SESSION['minibar']='2';
        break;
	
    default:
        echo 'action not defined';
		
}

