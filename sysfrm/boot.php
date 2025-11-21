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

session_start();
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function r2($to, $ntype = 'e', $msg = '') {
	if ($msg == '') {
		header("location: $to");exit;
	}
	$_SESSION['ntype'] = $ntype;
	$_SESSION['notify'] = $msg;
	header("location: $to");exit;
}

function isAdmin() {
	if (isset($_SESSION['uid'])) {
		$d = ORM::for_table('sys_users', 'dblogin')->find_one($_SESSION['uid']);
		if ($d['user_type'] == 'Admin') {
			return true;
		} else {
			return false;
		}
	} else {

		r2(APP_URL . '/?ng=login/');

	}
}

if (file_exists('sysfrm/config.php')) {
	require 'sysfrm/config.php';
} else {

	r2('sysfrm/install');

}

if ($_app_stage == 'Dev') {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(-1);
} else {
	error_reporting(1);
}
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

function safedata($value) {
	$value = trim($value);
	//  $value=htmlentities($value, ENT_QUOTES, 'utf-8');
	return $value;
}
//Extend
function _post($param, $defvalue = '') {
	if (!isset($_POST[$param])) {
		return $defvalue;
	} else {
		return safedata($_POST[$param]);
	}
}

function _get($param, $defvalue = '') {
	if (!isset($_GET[$param])) {
		return $defvalue;
	} else {
		return safedata($_GET[$param]);
	}
}
function _raid($l = '6') {
	$r = substr(str_shuffle(str_repeat('0123456789', $l)), 0, $l);
	return $r;

}

require 'sysfrm/orm.php';
ORM::configure("mysql:host=$db_host;dbname=$db_name", null, "dblogin");
ORM::configure('username', $db_user, "dblogin");
ORM::configure('password', $db_password, "dblogin");
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'), "dblogin");
ORM::configure('return_result_sets', true); // returns result sets
ORM::configure('logging', true);

// Extract menu from URL if it starts with menu_
$req = _get('ng');
$routes = explode('/', $req);
$handler = $routes['0'];

// Store direct URL before login if not already set
if(!isset($_SESSION['direct'])) {
    $_SESSION['direct'] = _get('ng');
    

}

// Add this new logic to set menu from URL and corresponding database
if (strpos($handler, 'menu_') === 0) {
    $menu = substr($handler, 5); // Remove 'menu_' prefix to get menu name
    $_SESSION['menu'] = $menu;
    
    // Set database based on menu
    $_SESSION['dbname'] = 'cmportal_' . strtolower($menu);

	
    
    // Configure the menu-specific database connection as "default"
    ORM::configure("mysql:host=$db_host;dbname=" . $_SESSION['dbname'], null, "default");
    ORM::configure('username', $db_user, "default");
    ORM::configure('password', $db_password, "default");
    ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'), "default");


	// Set database based on menu untuk Production vvv
	// Configure the menu-specific database connection as "default" untuk Production vvv

	// $_SESSION['dbname'] = 'capellag_portal_' . strtolower($menu);
    // try {
    //     ORM::configure("mysql:host=$db_host;dbname=" . $_SESSION['dbname'], null, "default");
    //     ORM::configure('username', $db_user, "default");
    //     ORM::configure('password', $db_password, "default");
    //     ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'), "default");
    //     ORM::configure('return_result_sets', true, "default");
    //     ORM::configure('logging', true, "default");
    // } catch (PDOException $e) {
    //     // If connection fails, log error and use main database
    //     error_log("Database connection failed: " . $e->getMessage());
    //     $_SESSION['dbname'] = 'capellag_portal';
    //     ORM::configure("mysql:host=$db_host;dbname=capellag_portal", null, "default");
    //     ORM::configure('username', $db_user, "default");
    //     ORM::configure('password', $db_password, "default");
    //     ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'), "default");
    //     ORM::configure('return_result_sets', true, "default");
    //     ORM::configure('logging', true, "default");
    // }
}

// Always use dblogin connection for sys_appconfig since it's in the main database
$result = ORM::for_table('sys_appconfig', 'dblogin')->find_many();

foreach ($result as $value) {
	$config[$value['setting']] = $value['value'];
}
$_SESSION['maintenance'] = $config['maintenance'];
$_SESSION['maintenance_date'] = $config['maintenance_date'];

date_default_timezone_set($config['timezone']);
function _notify($msg, $type = 'e') {
	$_SESSION['ntype'] = $type;
	$_SESSION['notify'] = $msg;
}
$_c = $config;
require_once 'sysfrm/lib/smarty/libs/Smarty.class.php';

$_theme = APP_URL . '/ui/theme/' . $config['theme'];
//language
$lan_file = 'sysfrm/lan/' . $config['language'] . '/common.lan.php';
require $lan_file;
$ui = new Smarty();
$ui->setTemplateDir('ui/theme/' . $config['theme'] . '/');
$ui->setCompileDir('ui/compiled/');
$ui->setConfigDir('ui/conf/');
$ui->setCacheDir('ui/cache/');
$ui->assign('_theme', $_theme);
$ui->assign('_c', $config);
$ui->assign('_L', $_L);
$ui->assign('_sysfrm_menu', 'dashboard');
$ui->assign('_title', $config['CompanyName']);
$ui->assign('_st', 'Sysfrm');
$ui->assign('_topic', 'dashboard');
$ui->assign('jsvar', '');
$ui->assign('news_flash', $config['news_flash']);
$ui->assign('tpl_footer', true);
$ui->assign('_pls', ORM::for_table('sys_pl', 'dblogin')->where('status', '1')->find_many());

//auto load menu program
if (isset($_SESSION['menu']) and $_SESSION['menu'] != null and $_SESSION['menu'] != '') {
	$ui->assign('tplheader', 'sections/header_' . $_SESSION['menu']);
} else {
	$ui->assign('tplheader', 'sections/header_default');
}

$ui->assign('tplfooter', 'sections/footer_default');

//
function _mpdf($title = 'PT Capella Medan', $print = 'Empty, check boot.php', $orientasi = 'P') {
	require_once 'sysfrm/lib/mpdf/mpdf.php';

//    $mpdf = new mPDF();
	if ($orientasi == 'P') {
		$mpdf = new mPDF();
	} else {
		$mpdf = new mPDF(
			'', // mode - default ''
			'A4-L', // format - A4, for example, default ''
			0, // font size - default 0
			'', // default font family
			5, // margin_left
			5, // margin right
			27, // margin top
			10, // margin bottom
			9, // margin header
			9, // margin footer
			'L' // L - landscape, P - portrait
		);
	}

	$html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $title . '</title>
            <link href="ui/theme/softhash/css/reportcss.css" rel="stylesheet">
        </head>
        <body>' . $print . '</body>
        </html>
    ';
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}

function _phpspreadsheet($filename, $data, $headers, $tipe) {
	require 'sysfrm/lib/phpspreadsheet/vendor/autoload.php';
	$spreadsheet = new Spreadsheet();
	//Specify the properties for this document
	$spreadsheet->getProperties()
		->setTitle($config['CompanyName'])
		->setSubject($filename)
		->setDescription($filename . ' ' . $config['CompanyName'])
		->setCreator('Team IT')
		->setCompany($config['CompanyName'])
		->setLastModifiedBy('Team IT');
	$activeWorksheet = $spreadsheet->getActiveSheet();
	if ($tipe == 'excel') {
		for ($i = 0, $l = sizeof($headers); $i < $l; $i++) {
			$activeWorksheet->setCellValueByColumnAndRow($i + 1, 1, $headers[$i]);
		}
		for ($i = 0, $l = sizeof($data); $i < $l; $i++) { // row $i
			$j = 0;
			foreach ($data[$i] as $k => $v) { // column $j
				$activeWorksheet->setCellValueByColumnAndRow($j + 1, ($i + 1 + 1), $v);
				$j++;
			}
		}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
	} else {
		$headers = implode(',', $headers);
		$activeWorksheet->setCellValueByColumnAndRow(1, 1, $headers);
		for ($i = 0, $l = sizeof($data); $i < $l; $i++) {
			$jawaban = implode(',', $data[$i]);
			$activeWorksheet->setCellValueByColumnAndRow(1, ($i + 1 + 1), $jawaban);
		}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '.csv"');
		header('Cache-Control: max-age=0');
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Csv');
	}
	$writer->save('php://output');
}

function _msglog($type, $msg) {
	$_SESSION['ntype'] = $type;
	$_SESSION['notify'] = $msg;
}

if (isset($_SESSION['notify'])) {
	$notify = $_SESSION['notify'];
	$ntype = $_SESSION['ntype'];
	if ($ntype == 's') {
		$ui->assign('notify', '<div class="alert alert-success">
								<button class="close" data-bs-dismiss="alert" data-dismiss="alert" style="float:right">
									×
								</button>
								<i class="fa-fw fa fa-check"></i>
								' . $notify . '
							</div>');

	} else {

		$ui->assign('notify', '<div class="alert alert-danger">
								<button class="close" data-bs-dismiss="alert" data-dismiss="alert" style="float:right">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								' . $notify . '
							</div>');
	}
	unset($_SESSION['notify']);
	unset($_SESSION['ntype']);
}

function _autoloader($class) {

	if (strpos($class, '_') !== false) {
		// $c_dir = explode($class,'_');
		$class = str_replace('_', '/', $class);
		include 'autoload/' . $class . '.php';

	} else {
		include 'autoload/' . $class . '.php';
	}

}

spl_autoload_register('_autoloader');

//! Auth
function _auth() {
	if (isset($_SESSION['uid'])) {
		// if(isset($_SESSION['dbname'])){
		// ORM::configure("mysql:host=localhost;dbname=".$_SESSION['dbname']);
		// ORM::configure('username', 'root');
		// ORM::configure('password', '');
		if (isset($_SESSION["timeout"])) {
			if (strtotime("now") >= strtotime($_SESSION['maintenance']) and strtotime("now") <= strtotime($_SESSION['maintenance_date'])) {
				$_SESSION["varlock"] = true;
			} else {
				$_SESSION["varlock"] = false;
				if (strtotime("now") > strtotime($_SESSION['maintenance_date'])) {
					$d = ORM::for_table('sys_appconfig', 'dblogin')->where('setting', 'news_flash1')->find_one();
					if ($d) {
						$e = ORM::for_table('sys_appconfig', 'dblogin')->where('setting', 'news_flash')->find_one();
						$e->value = $d['value'];
						$e->save();
					}
				}
			}
			if ($_SESSION['varlock'] and !isAdmin()) {
				r2(U . 'unavailable');
			} else {
				if (time() < $_SESSION["timeout"] + TIMEOUT) {
					$_SESSION["timeout"] = time() + TIMEOUT;
				} else {
					unset($_SESSION["timeout"]);
					unset($_SESSION['uid']);
					unset($_SESSION['menu']);
					unset($_SESSION['user']);
					unset($_SESSION['password']);
					unset($_SESSION['dbname']);
					unset($_SESSION['direct']);
					r2(APP_URL . '/?ng=login/');

				}
			}
		} else {
			r2(APP_URL . '/?ng=login/');
		}

		return true;
		// }
		// else{
		// r2(U.'login/');
		// }
	} else {
		if(!isset($_SESSION['direct'])) {
            $_SESSION['direct'] = _get('ng');
        }
		r2(APP_URL . '/?ng=login/');
	}
}

// additional function

function _admin() {
	if (isset($_SESSION['uid'])) {
		$d = ORM::for_table('sys_users', 'dblogin')->find_one($_SESSION['uid']);
		if ($d['user_type'] == 'Admin') {
			return true;
		} else {
			r2(APP_URL . '/?ng=login/');
		}
	} else {

		r2(APP_URL . '/?ng=login/');

	}
}

require 'sysfrm/functions.php';

$req = _get('ng');
$routes = explode('/', $req);
$handler = $routes['0'];
if ($handler == '') {
	$handler = 'default';
}

$plugin_ui_header = array();

//plugin support
$PluginManager = new Plugins();
$ps = ORM::for_table('sys_pl', 'dblogin')->where('status', '1')->order_by_asc('sorder')->find_many();

foreach ($ps as $p) {
	$PluginManager->loadPlugins($p['c']);
}

require 'sysfrm/plugged.php';

// routing started

Event::trigger('routing_started');

$pl_path = '';
//

if (!(isset($_SESSION['direct'])) and $handler != 'login') {
	$_SESSION['direct'] = $req;
	// echo "<script>alert('".$_SESSION['direct']."')</script>";
}
// echo "<script>alert('".$_SESSION['direct']."')</script>";
// echo "<script>alert('".$handler."')</script>";
if (substr($handler, 0, 4) != 'menu') {
	$sys_render = 'sysfrm/controllers/' . $handler . '.php';
	$ui->assign('app_url', APP_URL . '/');
	if (($config['url_rewrite']) == '1') {
		define('U', APP_URL . '/');
		$ui->assign('_url', APP_URL . '/');
		$ui->assign('_url1', APP_URL . '/');
	} else {
		define('U', APP_URL . '/?ng=');
		$ui->assign('_url', APP_URL . '/?ng=');
		$ui->assign('_url1', APP_URL . '/?ng=');
	}
} else {
	$handler1 = $routes['1'];
	$handler2 = $routes['2'];
	if ($handler1 == 'form' && $handler2 == 'add-input') {
		_auth();
		$sys_render = 'sysfrm/controllers/' . $_SESSION['menu'] . '/' . $handler1 . '.php';
		$ui->assign('app_url', APP_URL . '/');
		if (($config['url_rewrite']) == '1') {
			define('U', APP_URL . '/');
			$ui->assign('_url', APP_URL . '/');
			$ui->assign('_url1', APP_URL . '/');
		} else {
			define('U', APP_URL . '/?ng=menu_' . $_SESSION['menu'] . '/');
			$ui->assign('_url', APP_URL . '/?ng=menu_' . $_SESSION['menu'] . '/');
			$ui->assign('_url1', APP_URL . '/?ng=');
		}
	} else {
		_auth();
		$sys_render = 'sysfrm/controllers/' . $_SESSION['menu'] . '/' . $handler1 . '.php';

		// Izinkan serverside hanya jika request adalah AJAX/JSON; selain itu redirect ke dashboard
		$isAjax = (
			(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') ||
			(isset($_SERVER['HTTP_ACCEPT']) && stripos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) ||
			(isset($_SERVER['CONTENT_TYPE']) && stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== false)
		);
		if ($handler1 === 'serverside' && !$isAjax) {
			r2(APP_URL . '/?ng=menu_' . $_SESSION['menu'] . '/dashboard/');
		}

		$ui->assign('app_url', APP_URL . '/');
		if (($config['url_rewrite']) == '1') {
			define('U', APP_URL . '/');
			$ui->assign('_url', APP_URL . '/');
			$ui->assign('_url1', APP_URL . '/');
		} else {
			define('U', APP_URL . '/?ng=menu_' . $_SESSION['menu'] . '/');
			$ui->assign('_url', APP_URL . '/?ng=menu_' . $_SESSION['menu'] . '/');
			$ui->assign('_url1', APP_URL . '/?ng=');
		}
	}


}
if (file_exists($sys_render)) {
	include $sys_render;
} else {

	// exit ("$sys_render");

//    @Since v 2.4 supports routing to plugin

	$p1 = false;
	$p2 = false;

	if (isset($routes['0']) AND ($routes['0']) != '') {
		$p1 = true;
	}

	if (isset($routes['1']) AND ($routes['1']) != '') {
		$p2 = true;
	}

	if ($p1 AND $p2) {

		$dir = $routes['0'];
		$cont = $routes['1'];
		$path = 'sysfrm/plugins/' . $dir . '/' . $cont . '.php';
		$pl_path = 'sysfrm/plugins/' . $dir . '/';
		if (file_exists($path)) {
			$_pd = 'sysfrm/plugins/' . $dir;
			$ui->assign('_pd', 'sysfrm/plugins/' . $dir);
			require $path;

		}

	} else {
//    echo $path;
		r2(U . 'dashboard/', 'e', $_L['Plugin Not Found']);
	}

}


// // Clear all cookies
// if (isset($_SERVER['HTTP_COOKIE'])) {
//     $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
//     foreach($cookies as $cookie) {
//         $parts = explode('=', $cookie);
//         $name = trim($parts[0]);
//         setcookie($name, '', time() - 3600, '/');
//         setcookie($name, '', time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
//     }
// }