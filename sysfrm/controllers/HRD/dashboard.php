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
_auth();
Event::trigger('dashboard/');
$ui->assign('_title', $_L['Dashboard'].' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Dashboard']);
$ui->assign('ncomp',$_SESSION['ncomp']);
$user = User::_info();
$ui->assign('user',$user);
$spath = 'prog/'.$_SESSION['menu'].'/';

//autoload menu program
$_SESSION['optMenu'] = '';
$action = $routes['2'];
if($action<>'') {
	if($action == 'awal') {
		unset($_SESSION['menu']);
		define('U', APP_URL.'/?ng=');
		$ui->assign('_url', APP_URL.'/?ng=');
		$ui->assign('tplheader', 'sections/header_default');
	} else {
		$_SESSION['menu'] = $action;
		$e = ORM::for_table('sys_menu','dblogin')->where('kode_program',$action)->find_one();
		if($e) {
			$_SESSION['dbname']=$e['database_name'];
			ORM::configure("mysql:host=".$e['database_host'].";dbname=".$_SESSION['dbname']);
			ORM::configure('username', $e['username']);
			ORM::configure('password', $e['password']);
		}
		define('U', APP_URL.'/?ng=menu_'.$_SESSION['menu'].'/');
		$ui->assign('_url', APP_URL.'/?ng=menu_'.$_SESSION['menu'].'/');
		$ui->assign('tplheader', 'sections/header_'.$_SESSION['menu']);
	}
}
$d = ORM::for_table('sys_menu','dblogin')->order_by_asc('kode_program')->find_many();
$_SESSION['optMenu'] .=	'<option value="FORM" '.($_SESSION['menu'] == "FORM" ? 'selected' : '').'>FORM</option>';
foreach($d as $p){
	if ($user['user_type'] == 'Admin') {
        if($p['kode_program'] != 'FORM'){
		    $_SESSION['optMenu'] .=	'<option value="'.$p['kode_program'].'" '.($_SESSION['menu'] == $p['kode_program'] ? 'selected' : '').'>'.ucfirst($p['kode_program']).'</option>';
        }
	} else {
		$e = ORM::for_table('daftar_otoritas_user','dblogin')->where('kode_oto','SHOW-PROGRAM')->where('user_id',$user['id'])->find_one();
		if($e){
			$_SESSION['optMenu'] .=	'<option value="'.$p['kode_program'].'" '.($_SESSION['menu'] == $p['kode_program'] ? 'selected' : '').'>'.ucfirst($p['kode_program']).'</option>';
		}
	}
}
//**End Autoload Menu ***

$ui->assign('xheader', '
<link href="'.APP_URL.'/ui/lib/c3/c3.min.css" rel="stylesheet" type="text/css">
');

$ui->assign('xfooter', '
<script type="text/javascript" src="'.APP_URL.'/ui/lib/jslib/dashboard-alt.js"></script>
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/d3.min.js"></script>
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/c3.min.js"></script>
');

$ui->assign('xjq', '

var chart = c3.generate({
    bindto: \'#chart\',
    data: {
	columns: [

		[\''.$_L['Income'].'\', \'0\','.$d1i.','.$d2i.', '.$d3i.', '.$d4i.', '.$d5i.', '.$d6i.', '.$d7i.', '.$d8i.', '.$d9i.', '.$d10i.', '.$d11i.', '.$d12i.', '.$d13i.', '.$d14i.', '.$d15i.', '.$d16i.', '.$d17i.', '.$d18i.', '.$d19i.', '.$d20i.', '.$d21i.', '.$d22i.', '.$d23i.', '.$d24i.', '.$d25i.', '.$d26i.', '.$d27i.', '.$d28i.', '.$d29i.', '.$d30i.', '.$d31i.'],
		[\''.$_L['Expense'].'\', \'0\','.$d1e.','.$d2e.', '.$d3e.', '.$d4e.', '.$d5e.', '.$d6e.', '.$d7e.', '.$d8e.', '.$d9e.', '.$d10e.', '.$d11e.', '.$d12e.', '.$d13e.', '.$d14e.', '.$d15e.', '.$d16e.', '.$d17e.', '.$d18e.', '.$d19e.', '.$d20e.', '.$d21e.', '.$d22e.', '.$d23e.', '.$d24e.', '.$d25e.', '.$d26e.', '.$d27e.', '.$d28e.', '.$d29e.', '.$d30e.', '.$d31e.']
	],
        type: \'area-spline\',
         colors: {
            '.$_L['Income'].': \'#23c6c8\',
            '.$_L['Expense'].': \'#ed5565\'
        }
    }

});

var dchart = c3.generate({
    bindto: \'#dchart\',
    data: {
        columns: [
            [\''.$_L['Income'].'\', '.$mi.'],
            [\''.$_L['Expense'].'\', '.$me.'],
        ],
        type : \'donut\',
        colors: {
            '.$_L['Income'].': \'#23c6c8\',
            '.$_L['Expense'].': \'#ed5565\'
        }
    },
    donut: {
        title: "'.$_L['Income_Vs_Expense'].'"
    }
});

    $("#set_goal").click(function (e) {
        e.preventDefault();

        bootbox.prompt({
            title: "'.$_L['Set New Goal for Net Worth'].'",
            value: "'.$v_goal.'",
            buttons: {
        \'cancel\': {
            label: \''.$_L['Cancel'].'\'
        },
        \'confirm\': {
            label: \''.$_L['OK'].'\'
        }
    },
            callback: function(result) {
                if (result === null) {

                } else {
                   // alert(result);
                     $.post( "'.U.'settings/networth_goal/", { goal: result })
        .done(function( data ) {
            location.reload();
        });
                }
            }
        });

    });

 ');

Event::trigger('dashboard/_on_display');

$ui->display($spath.'dashboard.tpl');