<?php
_auth();
Event::trigger('dashboard/');
$ui->assign('_title', $_L['Dashboard'].' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Dashboard']);
$ui->assign('ncomp', $_SESSION['ncomp']);
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('_sysfrm_menu', 'dashboard');
$ui->assign('_sysfrm_menu1', '');
$ui->assign('_sysfrm_menu2', '');

// Path to program templates
$spath = 'prog/'.'SERVICE'.'/';

// Autoload program & header selection (mirror of core dashboard)
$_SESSION['optMenu'] = '';
$action = $routes['2'];
if ($action <> '') {
    if ($action == 'awal') {
        unset($_SESSION['menu']);
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        unset($_SESSION['dbname']);
        define('U', APP_URL.'/?ng=');
        $ui->assign('_url', APP_URL.'/?ng=');
        $ui->assign('tplheader', 'sections/header_default');
    } else {
        // Force active menu to SERVICE and bind DB from sys_menu
        $_SESSION['menu'] = 'SERVICE';
        $e = ORM::for_table('sys_menu','dblogin')->where('kode_program','SERVICE')->find_one();
        if ($e) {
            $_SESSION['dbname']   = $e['database_name'];
            ORM::configure("mysql:host=".$e['database_host'].";dbname=".$_SESSION['dbname']);
            ORM::configure('username', $e['username']);
            ORM::configure('password', $e['password']);
        }
        define('U', APP_URL.'/?ng=menu_SERVICE/');
        $ui->assign('_url', APP_URL.'/?ng=menu_SERVICE/');
        $ui->assign('tplheader', 'sections/header_service');
    }
}

// Build program selector options the same way as other dashboards
$d = ORM::for_table('sys_menu','dblogin')->order_by_asc('kode_program')->find_many();
$_SESSION['optMenu'] .= '<option value="FORM" '.(($_SESSION['menu'] ?? '') == 'FORM' ? 'selected' : '').'>FORM</option>';
foreach ($d as $p) {
    if ($user['user_type'] == 'Admin') {
        if ($p['kode_program'] != 'FORM') {
            $_SESSION['optMenu'] .= '<option value="'.$p['kode_program'].'" '.(($_SESSION['menu'] ?? '') == $p['kode_program'] ? 'selected' : '').'>'.ucfirst($p['kode_program']).'</option>';
        }
    } else {
        // Follow permission style in core dashboard (SHOW-PROGRAM-<KODE>)
        if ($p['kode_program'] == 'GAS') {
            $_SESSION['optMenu'] .= '<option value="GAS" '.(($_SESSION['menu'] ?? '') == 'GAS' ? 'selected' : '').'>GAS</option>';
        } else {
            $e = ORM::for_table('daftar_otoritas_user','dblogin')
                ->where('kode_oto','SHOW-PROGRAM-'.$p['kode_program'])
                ->where('user_id',$user['id'])
                ->find_one();
            if ($e) {
                $_SESSION['optMenu'] .= '<option value="'.$p['kode_program'].'" '.(($_SESSION['menu'] ?? '') == $p['kode_program'] ? 'selected' : '').'>'.ucfirst($p['kode_program']).'</option>';
            }
        }
    }
}

// Assets (optional)
$ui->assign('xheader', '');
$ui->assign('xfooter', '');

Event::trigger('dashboard/_on_display');

$ui->display($spath.'dashboard.tpl');
