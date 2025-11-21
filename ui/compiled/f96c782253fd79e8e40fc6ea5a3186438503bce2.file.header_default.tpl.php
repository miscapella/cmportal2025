<?php /* Smarty version Smarty-3.1.13, created on 2025-02-19 14:13:34
         compiled from "ui\theme\softhash\sections\header_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1153783015645461c81c8b61-62040163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f96c782253fd79e8e40fc6ea5a3186438503bce2' => 
    array (
      0 => 'ui\\theme\\softhash\\sections\\header_default.tpl',
      1 => 1739949211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1153783015645461c81c8b61-62040163',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_645461c82c44e7_30554622',
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
    '_L' => 0,
    'user' => 0,
    '_sysfrm_menu1' => 0,
    '_sysfrm_menu2' => 0,
    'ncomp' => 0,
    '_st' => 0,
    'news_flash' => 0,
    'color_text' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_645461c82c44e7_30554622')) {function content_645461c82c44e7_30554622($_smarty_tpl) {?><!DOCTYPE html>
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

                    <li <?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='dashboard'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['_c']->value['redirect_url'];?>
/"><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dashboard'];?>
</span></a></li>
                    
                    <?php if (_auth2('SHOW-MASTER-DATA',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='data'){?>mm-active<?php }?>">
                            <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Master Data</span><span class="fa arrow"></span></a>
                            <ul class="nav-second-level">
                                <?php if (_auth2('SHOW-COMPANY',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='company'){?>mm-active<?php }?>">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
company/list/">List <?php echo $_smarty_tpl->tpl_vars['_L']->value['Company'];?>
</a>
                                </li>
                                <?php }?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='department'){?>mm-active<?php }?>">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
department/list/">List Unit Usaha</a>
                                </li>
                                <?php if (_auth2('SHOW-RUANGAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='ruangan'){?>mm-active<?php }?>">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ruangan/list/">List Ruangan</a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                    <?php }?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='book_zoom'){?>mm-active<?php }?>">
                        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Booking </span><span class="fa arrow"></span></a>
                        <ul class="nav-second-level">
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listbook_zoom'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/list/">List Booking Zoom</a></li>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listbook_alat'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/pinjaman/">List Barang Pinjaman</a></li>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listbook_room'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_room/list/">List Booking Room | Hall</a></li>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='historybook_zoom'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/history/">My Booking History</a></li>
                        </ul>
                    </li>
<!--
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='form_memo'){?>mm-active<?php }?>">
                        <a href="#"><i class="fa fa-paperclip"></i> <span class="nav-label">Form Memo </span><span class="fa arrow"></span></a>
                        <ul class="nav-second-level">
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listmemo'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form_memo/list/">Inbox</a></li>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='sentmemo'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form_memo/sent/">Sent</a></li>
                        </ul>
                    </li>
-->
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='my_account'){?>mm-active<?php }?>">
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['My Account'];?>
 </span><span class="fa arrow"></span></a>
                        <ul class="nav-second-level">

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                            
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>
                            
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>
                        </ul>
                    </li>
                      
                    
                    <?php if (($_smarty_tpl->tpl_vars['user']->value['username'])=='admin@fortunateshop.com'){?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='util'){?>mm-active<?php }?>">
                            <a href="#"><i class="fa fa-bars"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Utilities'];?>
 </span><span class="fa arrow"></span></a>
                            <ul class="nav-second-level">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/activity/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Activity Log'];?>
</a></li>
								<?php if (($_smarty_tpl->tpl_vars['user']->value['id'])==1){?>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sent-emails/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Message Log'];?>
</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/dbstatus/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Database Status'];?>
</a></li>
									<li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/cronlogs/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['CRON Log'];?>
</a></li>
								<?php }?>
                            </ul>
                        </li>
                    <?php }?>
					<?php if (_auth2('SHOW-SETTINGS',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
						<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='settings'){?>mm-active<?php }?>">
							<a href="#"><i class="fa fa-cogs"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
 </span><span class="fa arrow"></span></a>
							<ul class="nav-second-level">
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['General Settings'];?>
</a></li>
								<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='manageuser'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage Users'];?>
</a></li>
								<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='aktivasiuser'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/user-activate/">Aktivasi Users</a></li>
								<?php if (_auth2('SHOW-MANAGE-OTORITAS',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
								<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='otoritas'){?>mm-active<?php }?>"><a href="#">Manage Otoritas <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listotoritas'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas/">Daftar Otoritas</a></li>
										<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='groupotoritas'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas-group/">Group Otoritas</a></li>
										<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='otoritasuser'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas-user/">Otoritas User</a></li>
									</ul>
								</li>
								<?php }?>
							</ul>
						</li>
					<?php }?>

                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                    <a href="#"><img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/logo.png" alt="Logo"></a>
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right hidden-xs">

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
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
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

<!--			<button onclick="topFunction()" id="myBtn" title="Go to top"></button>-->
			<?php if (isset($_smarty_tpl->tpl_vars['news_flash']->value)){?>
				<div style="background-color:white;color:<?php echo $_smarty_tpl->tpl_vars['color_text']->value;?>
;font-weight:normal;font-family:calibri;height:35px;margin-top:10px;font-size:22px;padding:2px 10px 2px">
					<marquee onmouseover="this.stop();" onmouseout="this.start();" direction="left" align="center"><?php echo $_smarty_tpl->tpl_vars['news_flash']->value;?>
</marquee>
				</div>
			<?php }?>
            <div class="wrapper wrapper-content">
                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
                <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?><?php }} ?>