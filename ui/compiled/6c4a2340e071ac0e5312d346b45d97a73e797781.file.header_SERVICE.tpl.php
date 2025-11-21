<?php /* Smarty version Smarty-3.1.13, created on 2025-11-17 14:58:22
         compiled from "ui\theme\softhash\sections\header_SERVICE.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137250030068b937106082a7-78052222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c4a2340e071ac0e5312d346b45d97a73e797781' => 
    array (
      0 => 'ui\\theme\\softhash\\sections\\header_SERVICE.tpl',
      1 => 1763366300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137250030068b937106082a7-78052222',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_68b9371134e086_31955585',
  'variables' => 
  array (
    '_title' => 0,
    'app_url' => 0,
    '_theme' => 0,
    'plugin_ui_header' => 0,
    'plugin_ui_header_add' => 0,
    '_c' => 0,
    'xheader' => 0,
    '_comp' => 0,
    'nav0' => 0,
    '_sysfrm_menu' => 0,
    '_url' => 0,
    'user' => 0,
    '_sysfrm_menu1' => 0,
    '_sysfrm_menu2' => 0,
    '_L' => 0,
    '_url1' => 0,
    'ncomp' => 0,
    '_st' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_68b9371134e086_31955585')) {function content_68b9371134e086_31955585($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/animate.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/mm-vertical.css" rel="stylesheet">
    <link href="ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style.css?ver=2.0.1" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/component.css?ver=2.0.1" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/custom.css" rel="stylesheet">
    <link href="ui/lib/btn-top/btn-top.css" rel="stylesheet">
    <link href="ui/lib/DataTables/datatables.min.css" rel="stylesheet"/>

<?php  $_smarty_tpl->tpl_vars['plugin_ui_header_add'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plugin_ui_header_add']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plugin_ui_header']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plugin_ui_header_add']->key => $_smarty_tpl->tpl_vars['plugin_ui_header_add']->value){
$_smarty_tpl->tpl_vars['plugin_ui_header_add']->_loop = true;
?>
    <?php echo $_smarty_tpl->tpl_vars['plugin_ui_header_add']->value;?>

<?php } ?>

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['rtl']=='1'){?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['xheader']->value)){?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>
</head>

<body class="fixed-nav <?php if ($_SESSION['minibar']=='1'){?> mini-navbar <?php }?> " oncontextmenu="return false">
    <section>
        <div id="wrapper">
            <nav class="sidebar-nav navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="metismenu" id="side-menu">
                        <?php echo $_smarty_tpl->tpl_vars['_comp']->value;?>

                        <?php echo $_smarty_tpl->tpl_vars['nav0']->value;?>

                        <?php echo $_smarty_tpl->getSubTemplate ("sections/header_profile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php echo $_smarty_tpl->getSubTemplate ("sections/header_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <li <?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='dashboard'){?>class="mm-active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['_c']->value['redirect_url'];?>
/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>
    
                        <?php if (_auth2('SHOW-MASTERDATA-CUSTOMER',$_smarty_tpl->tpl_vars['user']->value['id'])||_auth2('SHOW-MASTERDATA-POSISI',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='masterdata'){?>mm-active<?php }?>">
                            <a class="has-arrow" href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Master Data</span></a>
                            <ul class="nav-second-level">
                                <?php if (_auth2('SHOW-MASTERDATA-CUSTOMER',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='customer-list'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/list/">List Customer</a></li>
                                <?php }?>
                                <?php if (_auth2('SHOW-MASTERDATA-TIPE-KENDARAAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='tipe-kendaraan-list'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/list/">List Tipe Kendaraan</a></li>
                                <?php }?>
                                <!-- <?php if (_auth2('SHOW-MASTERDATA-CABANG',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='cabang-list'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cabang/list/">List Cabang</a></li>
                                <?php }?> -->
                            </ul>
                        </li>
                        <?php }?>
    
                        <?php if (_auth2('SHOW-GRAFIK-CUSTOMER',$_smarty_tpl->tpl_vars['user']->value['id'])||_auth2('SHOW-PRODUKTIVITAS-BENGKEL',$_smarty_tpl->tpl_vars['user']->value['id'])||_auth2('SHOW-PRODUKTIVITAS-MARKETING',$_smarty_tpl->tpl_vars['user']->value['id'])||_auth2('SHOW-LAPORAN-SERVICE',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='analisis'){?>mm-active<?php }?>">
                            <a class="has-arrow" href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Analisis</span></a>
                            <ul class="nav-second-level">
                                <?php if (_auth2('SHOW-GRAFIK-CUSTOMER',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='grafik-customer'){?>mm-active<?php }?>">
                                    <a href="#" class="has-arrow">Grafik Customer</a>
                                    <ul class="nav-third-level">
                                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='profil-distribusi-customer'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/profil-distribusi-customer/">Profil Distribusi Customer</a></li>
                                        <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='rekapitulasi-cuti-customer'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/rekapitulasi-cuti-customer/">Rekapitulasi Cuti Customer</a></li> -->
                                        <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='demografi-customer'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/demografi-customer/">Demografi Customer</a></li> -->
                                        <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='status-customer'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/status-customer/">Status Customer</a></li> -->
                                        <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='pendidikan-customer'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/pendidikan-customer/">Pendidikan Customer</a></li> -->
                                        <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='terminated-customer'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/terminated-customer/">Terminated Customer</a></li> -->
                                        <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='bpjs-kesehatan'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
grafik-customer/bpjs-kesehatan/">BPJS Kesehatan</a></li> -->
                                    </ul>
                                </li>
                                <?php }?>
                                <?php if (_auth2('SHOW-LAPORAN-SERVICE',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='laporan-service'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/">Laporan</a></li>
                                <?php }?>
                                <!-- <?php if (_auth2('SHOW-PRODUKTIVITAS-BENGKEL',$_smarty_tpl->tpl_vars['user']->value['id'])||_auth2('SHOW-PRODUKTIVITAS-MARKETING',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='produktivitas'){?>mm-active<?php }?>">
                                    <a href="#" class="has-arrow">Produktivitas</a>
                                    <ul class="nav-third-level">
                                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='produktivitas-bengkel'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-bengkel/list/">Bengkel</a></li>
                                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='produktivitas-marketing'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-marketing/list/">Marketing</a></li>
                                    </ul>
                                </li>
                                <?php }?> -->
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
    
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg">
                
                <div class="row border-bottom">
                    <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">
    
                        <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/logo.png" alt="Logo">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>
    
                        </div>
                        <ul class="nav navbar-top-links navbar-right hidden-xs">
    
    
    
    <!--
                            <li>
                                <form class="navbar-form full-width" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search Customers'];?>
...">
                                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
    
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" id="get_activity" href="#" aria-expanded="true">
                                    <i class="fa fa-bell"></i>
                                </a><div class="dropdown-backdrop"></div>
                                <ul class="dropdown-menu dropdown-alerts" id="activity_loaded">
    
    
    
                                    <li id="activity_wait">
                                        <div class="text-center link-block">
                                            <a href="javascript:void(0)">
                                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Please Wait'];?>
...</strong> <br> <br>
                                                <img class="text-center" src="sysfrm/uploads/system/download.gif" alt="Loading....">
    
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
    -->
    
                            <li class="dropdown navbar-user">
    
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img']=='gravatar'){?>
                                        <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['username']));?>
?s=200" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value['img']==''){?>
                                        <img src="ui/lib/imgs/default-user-avatar.png" alt="">
                                    <?php }else{ ?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                    <?php }?>
    
                                    <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Welcome'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
</span> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu animated fadeInLeft">
                                    <li class="arrow"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>
    
                                </ul>
                            </li>
    
                        </ul>
    
                    </nav>
                </div>
    
                <div class="row wrapper white-bg page-heading">
                    <div class="col-lg-12">
                        <h2 style="color: #2F4050; font-size: 16px; font-weight: 400; margin-top: 18px"><b><?php echo $_smarty_tpl->tpl_vars['ncomp']->value;?>
</b> - <?php echo $_smarty_tpl->tpl_vars['_st']->value;?>
 </h2>
    
                    </div>
    
                </div>
    
                <button onclick="topFunction()" id="myBtn" title="Go to top"></button>
                <div class="wrapper wrapper-content">
                    <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

    <?php }?><?php }} ?>