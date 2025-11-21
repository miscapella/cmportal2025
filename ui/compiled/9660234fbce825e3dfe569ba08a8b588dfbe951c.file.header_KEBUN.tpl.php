<?php /* Smarty version Smarty-3.1.13, created on 2024-11-15 14:43:24
         compiled from "ui\theme\softhash\sections\header_KEBUN.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17527676164be253bb68994-40155893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9660234fbce825e3dfe569ba08a8b588dfbe951c' => 
    array (
      0 => 'ui\\theme\\softhash\\sections\\header_KEBUN.tpl',
      1 => 1731638097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17527676164be253bb68994-40155893',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64be253c459593_10831557',
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
    'nav1' => 0,
    'user' => 0,
    '_sysfrm_menu1' => 0,
    '_sysfrm_menu2' => 0,
    '_sysfrm_menu3' => 0,
    '_url1' => 0,
    'ncomp' => 0,
    '_st' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64be253c459593_10831557')) {function content_64be253c459593_10831557($_smarty_tpl) {?><!DOCTYPE html>
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
/"><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dashboard'];?>
</span></a></li>

                    <?php echo $_smarty_tpl->tpl_vars['nav1']->value;?>

                    <?php if (_auth2('SHOW-MASTERDATA',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='data'){?>mm-active<?php }?>">
                        <a class="has-arrow" href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Master Data</span></a>
                        <ul class="nav-second-level">
                            <?php if (_auth2('SHOW-SUPPLIER',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listsupplier'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
supplier/list/"><i class="fa fa-user"></i> Daftar Supplier</a></li>
							<?php }?>
                            <?php if (_auth2('SHOW-VIA-PENGIRIMAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listviapengiriman'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
viapengiriman/list/"><i class="fa fa-truck"></i> Via Pengiriman</a></li>
							<?php }?>
                            <?php if (_auth2('SHOW-BAGIAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listkategori'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/list/"><i class="fa fa-list"></i> Bagian</a></li>
							<?php }?>
                            <?php if (_auth2('SHOW-ITEM-STOCK',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='itemstock'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-book"></i> Item Stock</a>
								<ul class="nav-third-level">
									<?php if (_auth2('SHOW-LIST-ITEM-STOCK',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listitemstock'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list/"><i class="fa fa-cogs"></i> Item Stock</a></li>
									<?php }?>
                                    <?php if (_auth2('SHOW-ITEM-PERSETUJUAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listpersetujuan'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list-approve/"><i class="fa fa-check-square-o"></i> Daftar Persetujuan</a></li>
									<?php }?>
								</ul>
							</li>
                            <?php }?>
							<!-- <?php if (_auth2('SHOW-DATA-INVENTARIS',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='listinventaris'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-th-list"></i> Data Inventaris</a>
								<ul class="nav-third-level">
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listinventaris'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/"><i class="fa fa-building"></i> Data Inventaris</a></li>
									<?php if (_auth2('SHOW-INVENTARIS-PERSETUJUAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listpersetujuaninv'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list-approve/"><i class="fa fa-check-square-o"></i> Daftar Persetujuan</a></li>
									<?php }?>
								</ul>
							</li>
							<?php }?> -->
                        </ul>
					</li>
					<?php }?>

                    <?php if (_auth2('SHOW-USER-REQUEST',$_smarty_tpl->tpl_vars['user']->value['id'])){?>                    
					<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='User-Request'){?>mm-active<?php }?>">
						<a class="has-arrow" href="#"><i class="fa fa-truck"></i> <span class="nav-label">User Request (UR) </span></a>
						<ul class="nav-second-level">
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='List UR'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-mintabarang/">List UR</a></li> 
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='UR Pending'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-mintabarang-pending/">UR Pending</a></li>
						</ul>
					</li>
					<?php }?>
                    <?php if (_auth2('SHOW-LOGISTIC',$_smarty_tpl->tpl_vars['user']->value['id'])){?>                    
					<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='Logistic'){?>mm-active<?php }?>">
						<a class="has-arrow" href="#"><i class="fa fa-truck"></i> <span class="nav-label">Logistic </span></a>
						<ul class="nav-second-level">
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='List UR Approved'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/list-ur-approved/">Daftar UR Approved</a></li> 
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='Keluar Barang'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/list-keluarbarang/">Pengeluaran Barang</a></li> 
						</ul>
					</li>
					<?php }?>
                    <?php if (_auth2('SHOW-TRANSAKSI',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='transaksi'){?>mm-active<?php }?>">
                        <a class="has-arrow" href="#"><i class="fa fa-list"></i> <span class="nav-label">Transaksi</span></a>
                        <ul class="nav-second-level">
                            <!-- <?php if (_auth2('SHOW-SPMK',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='spmk'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-cogs"></i> SPmK</a>
								<ul class="nav-third-level">
								    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spmk-add'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/add-spmk/">Tambah SPmK</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spmk-pending'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spmk-pending/">SPmK PENDING</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spmk-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spmk-approve/">SPmK APPROVED</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spmk-reject'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spmk-reject/">SPmK REJECTED</a></li>
								</ul>
							</li>
                            <?php }?>
                            <?php if (_auth2('SHOW-SPNK',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='spnk'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-user"></i> SPnK</a>
								<ul class="nav-third-level">
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spnk-add'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/add-spnk/">Tambah SPnK</a></li>  -->
								    <!-- <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spnk-pending'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spnk-pending/">SPnK PENDING</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spnk-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spnk-approve/">SPnK APPROVED</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='spnk-reject'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spnk-reject/">SPnK REJECTED</a></li>
								</ul>
							</li>
                            <?php }?> -->
                            <?php if (_auth2('SHOW-PERMINTAAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='permintaan'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-file"></i> Permintaan</a>
								<ul class="nav-third-level">
                                    <?php if (_auth2('SHOW-PR-ADD',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
								    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='pr-add'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/add-pr/">Tambah PR</a></li>
                                    <?php }?>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='pr-pending'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-pending/">PR PENDING</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='pr-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-approve/">PR APPROVED</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='pr-reject'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-reject/">PR REJECTED</a></li>
								</ul>
							</li>
                            <?php }?>
                            <?php if (_auth2('SHOW-PEMBELIAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='pembelian'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-shopping-cart"></i> Pembelian</a>
								<ul class="nav-third-level">
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='purchase-requisition'){?>mm-active<?php }?>">
									    <a href="#" class="has-arrow">Purchase Requisition</a>
                                        <ul class="nav-fourth-level">
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='list-pr'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr/" style="padding-left: 67px;">LIST PR</a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='pr1-pending'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr1-pending/" style="padding-left: 67px;">PR PENDING</a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='pr1-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr1-approve/" style="padding-left: 67px;">PR APPROVED</a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='pr1-reject'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr1-reject/" style="padding-left: 67px;">PR REJECTED</a></li>
<!--                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='pr-cancel'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-cancel/" style="padding-left: 67px;">PR CANCELED</a></li>-->
                                        </ul>
									</li>
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='purchase-order'){?>mm-active<?php }?>">
                                        <a href="#" class="has-arrow">Purchase Order</a>
                                        <ul class="nav-fourth-level">
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='list-po'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po/" style="padding-left: 67px;">LIST PO</a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='po-pending'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-pending/" style="padding-left: 67px;">PO PENDING</a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='po-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-approve/" style="padding-left: 67px;">PO APPROVED</a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='po-reject'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-reject/" style="padding-left: 67px;">PO REJECTED</a></li>
                                            
<!--                                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu3']->value=='po-cancel'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-cancel/" style="padding-left: 67px;">PO CANCELED</a></li>-->
                                        </ul>
                                    </li>
								</ul>
							</li>
				            <?php }?>
				            <?php if (_auth2('SHOW-PEMBELIAN-PERSETUJUAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='persetujuan'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-check-square-o"></i> Persetujuan</a>
								<ul class="nav-third-level">
                                    <?php if (_auth2('SHOW-UR-APRV',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='user-request-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-ur-aprv/">Approve UR</a></li>
                                    <?php }?>
                                    <!-- <?php if (_auth2('SHOW-SPMK-APRV',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='surat-permintaan-kerja-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spmk-aprv/">Approve SPmK</a></li>
                                    <?php }?>
                                    <?php if (_auth2('SHOW-SPNK-APRV',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='surat-perintah-kerja-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spnk-aprv/">Approve SPnK</a></li>
                                    <?php }?> -->
                                    <?php if (_auth2('SHOW-PR-APRV',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='purchase-requisition-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-aprv/">Approve PR</a></li>
                                    <?php }?>
                                    <?php if (_auth2('SHOW-PO-APRV',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='purchase-order-approve'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-aprv/">Approve PO</a></li>
                                    <?php }?>
								</ul>
							</li>
<!--							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='lismutasi'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/mutasi/"><i class="fa fa-car"></i> Mutasi Mobil Inventaris</a></li>-->
                            <?php }?>
						</ul>
<!--
                        <ul class="nav-second-level">
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='service'){?>mm-active<?php }?>">
								<a href="#" class="has-arrow"><i class="fa fa-cogs"></i> Service</a>
								<ul class="nav-third-level">
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='add-service'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
service/add/">Service Mobil Inventaris</a></li>
                                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='list-service'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
service/list/">List Service Mobil Inventaris</a></li>
								</ul>
							</li>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='lismutasi'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/mutasi/"><i class="fa fa-car"></i> Mutasi Mobil Inventaris</a></li>

						</ul>
-->
					</li>
					<?php }?>
                    <?php if (_auth2('SHOW-DISTRIBUSI',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
					<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='distribusi'){?>mm-active<?php }?>">
						<a class="has-arrow" href="#"><i class="fa fa-truck"></i> <span class="nav-label">Distribusi </span></a>
						<ul class="nav-second-level">
                            <?php if (_auth2('SHOW-PENGIRIMAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='pengiriman'){?>mm-active<?php }?>">
                                <a href="#" class="has-arrow">Pengiriman</a>
								<ul class="nav-third-level">
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='pendingpengiriman'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengiriman/pending/">SPBI Pending</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listpengiriman'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengiriman/list/">List SPBI</a></li>
								</ul>
                            </li> 
                            <?php }?>
                            <?php if (_auth2('SHOW-PENERIMAAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu1']->value=='penerimaan'){?>mm-active<?php }?>">
                                <a href="#" class="has-arrow">Penerimaan</a>
								<ul class="nav-third-level">
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='addpenerimaan'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
penerimaan/add/">Add BPnB</a></li>
									<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='listpenerimaan'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
penerimaan/list/">List BPnB</a></li>
								</ul>
                            </li> 
                            <?php }?>
						</ul>
					</li>
					<?php }?>
                   
					<?php if (_auth2('SHOW-LAPORAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
					<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='reports'){?>mm-active<?php }?>">
						<a class="has-arrow" href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports'];?>
 </span></a>
						<ul class="nav-second-level">
                            <?php if (_auth2('SHOW-LAPORAN-PR',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='laporanpr'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/pr/">Laporan PR</a></li> 
                            <?php }?>
                            <?php if (_auth2('SHOW-LAPORAN-PEMENUHAN-PR',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='laporanpemenuhanpr'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/pemenuhanpr/">Laporan Pemenuhan PR</a></li> 
                            <?php }?>
                            <?php if (_auth2('SHOW-LAPORAN-PO',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu2']->value=='laporanpo'){?>mm-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/po/">Laporan PO</a></li> 
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

                    <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/logo_sns.png" alt="Logo">
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