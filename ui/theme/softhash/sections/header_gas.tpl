<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_title}</title>
    <link rel="shortcut icon" href="{$app_url}sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="{$app_url}sysfrm/uploads/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{$app_url}sysfrm/uploads/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{$app_url}sysfrm/uploads/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{$app_url}sysfrm/uploads/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{$app_url}sysfrm/uploads/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{$app_url}sysfrm/uploads/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{$app_url}sysfrm/uploads/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{$app_url}sysfrm/uploads/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}sysfrm/uploads/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{$app_url}sysfrm/uploads/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}sysfrm/uploads/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{$app_url}sysfrm/uploads/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}sysfrm/uploads/icon/favicon-16x16.png">
    <link rel="manifest" href="{$app_url}sysfrm/uploads/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{$app_url}sysfrm/uploads/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="{$_theme}/css/animate.css" rel="stylesheet">
    <link href="{$_theme}/css/metisMenu.min.css" rel="stylesheet">
    <link href="{$_theme}/css/mm-vertical.css" rel="stylesheet">
    <link href="ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{$_theme}/css/style.css?ver=2.0.1" rel="stylesheet">
    <link href="{$_theme}/css/component.css?ver=2.0.1" rel="stylesheet">
    <link href="{$_theme}/css/custom.css" rel="stylesheet">
    <link href="ui/lib/btn-top/btn-top.css" rel="stylesheet">
    <link href="ui/lib/DataTables/datatables.min.css" rel="stylesheet"/>

{foreach $plugin_ui_header as $plugin_ui_header_add}
    {$plugin_ui_header_add}
{/foreach}

    {if $_c['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}
</head>

<body class="fixed-nav {if $smarty.session.minibar == '1'} mini-navbar {/if} " oncontextmenu="return false">
<section>
    <div id="wrapper">
        <nav class="sidebar-nav navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="metismenu" id="side-menu">
					{$_comp}
                    {$nav0}
					{include file="sections/header_profile.tpl"}
					{include file="sections/header_menu.tpl"}
                    <li {if $_sysfrm_menu eq 'dashboard'}class="mm-active"{/if}><a href="{$_url}{$_c['redirect_url']}/"><i class="fa fa-th-large"></i> <span class="nav-label">{$_L['Dashboard']}</span></a></li>

                    {$nav1}
                    {if _auth2('SHOW-MASTERDATA-GAS',$user['id'])}
                    <li class="{if $_sysfrm_menu eq 'data'}mm-active{/if}">
                        <a class="has-arrow" href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Master Data</span></a>
                        <ul class="nav-second-level">
                            {if _auth2('SHOW-JENIS-USAHA',$user['id'])}
                            <li class="{if $_sysfrm_menu1 eq 'jenisusaha'}mm-active{/if}"><a href="{$_url}jenisusaha/list/">Jenis Usaha </a></li>
							{/if}
                            {if _auth2('SHOW-SUPPLIER',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'listsupplier'}mm-active{/if}"><a href="{$_url}supplier/list/">Daftar Supplier </a></li>
							{/if}
							{if _auth2('SHOW-ITEM-STOCK',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'itemstock'}mm-active{/if}">
								<a href="#" class="has-arrow">Daftar Inventaris</a>
								<ul class="nav-third-level">
									<!-- <li class="{if $_sysfrm_menu2 eq 'listkategori'}mm-active{/if}"><a href="{$_url}kategori/list/"><i class="fa fa-list"></i> Kategori Inventaris</a></li> -->
									<li class="{if $_sysfrm_menu2 eq 'listitemstock'}mm-active{/if}"><a href="{$_url}itemstock/list/">Daftar Barang </a></li>
									<!--{if _auth2('SHOW-ITEM-PERSETUJUAN',$user['id'])}
									<li class="{if $_sysfrm_menu2 eq 'listpersetujuan'}mm-active{/if}"><a href="{$_url}itemstock/list-approve/"><i class="fa fa-check-square-o"></i> Daftar Persetujuan</a></li>
									{/if}-->
								</ul>
							</li>
							{/if}
							{if _auth2('SHOW-DATA-INVENTARIS-GAS',$user['id'])}
							<!-- <li class="{if $_sysfrm_menu1 eq 'listinventaris'}mm-active{/if}">
								<a href="#" class="has-arrow"><i class="fa fa-th-list"></i> Data Inventaris</a>
								<ul class="nav-third-level">
									<li class="{if $_sysfrm_menu2 eq 'listinventaris'}mm-active{/if}"><a href="{$_url}inventaris/list/"><i class="fa fa-building"></i> Data Inventaris</a></li>
									{if _auth2('SHOW-INVENTARIS-PERSETUJUAN',$user['id'])}
									<li class="{if $_sysfrm_menu2 eq 'listpersetujuaninv'}mm-active{/if}"><a href="{$_url}inventaris/list-approve/"><i class="fa fa-check-square-o"></i> Daftar Persetujuan</a></li>
									{/if}
								</ul>
							</li>
							{/if}

							{if _auth2('SHOW-INVENTARIS-MOBIL',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'listinventarismobil'}mm-active{/if}">
								<a href="#" class="has-arrow"><i class="fa fa-th-list"></i> Inventaris Mobil</a>
								<ul class="nav-third-level">
									<li class="{if $_sysfrm_menu2 eq 'listinventarismobil'}mm-active{/if}"><a href="{$_url}inventaris/list-mobil/"><i class="fa fa-car"></i> Mobil Inventaris</a></li>
									<li class="{if $_sysfrm_menu2 eq 'jenisservice'}mm-active{/if}"><a href="{$_url}jenisservice/list/"><i class="fa fa-cogs"></i> Jenis Service</a></li>
									<li class="{if $_sysfrm_menu2 eq 'listbengkel'}mm-active{/if}"><a href="{$_url}bengkel/list/"><i class="fa fa-dashboard"></i> Daftar Bengkel</a></li>    
								</ul>
							</li> -->
                            {/if}

                        </ul>
					</li>
                    {/if}

                    
					<li class="{if $_sysfrm_menu eq 'User-Request'}mm-active{/if}">
						<a class="has-arrow" href="#"><i class="fa fa-truck"></i> <span class="nav-label">User Request (UR) </span></a>
						<ul class="nav-second-level">
                        <li class="{if $_sysfrm_menu1 eq 'List UR'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang/">List UR</a></li>
                        <li class="{if $_sysfrm_menu1 eq 'Buat UR'}mm-active{/if}"><a href="{$_url}permintaanbarang/add-mintabarang/">Buat UR</a></li> 
                            {if _auth2('SHOW-DEPT-UR',$user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'Departemen UR'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-departemen/">Departemen UR</a></li>
                            {/if}
                            {if _auth2('SHOW-SERVICEHEAD-UR',$user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'Service Head UR'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-servicehead/">Service Head UR</a></li>
                            {/if}
                            {if _auth2('SHOW-GAADMIN-UR',$user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'GA Admin UR'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-gaadmin/">GA Admin UR</a></li>
                            {/if}
                            <!-- <li class="{if $_sysfrm_menu1 eq 'UR Pending'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-pending/">UR Pending</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'UR Approved'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-approved/">UR Approved</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'UR Reject'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-rejected/">UR Rejected</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'UR Cancel'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-mintabarang-cancelled/">UR Cancelled</a></li> -->
						</ul>
					</li>
					

                    {if _auth2('SHOW-PR',$user['id'])}
					<li class="{if $_sysfrm_menu eq 'Permintaan'}mm-active{/if}">
						<a class="has-arrow" href="#"><i class="fa fa-file"></i>  <span class="nav-label">Permintaan </span></a>
						<ul class="nav-second-level">
                            {if _auth2('ADD-PR',$user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'Buat PR'}mm-active{/if}"><a href="{$_url}permintaan/add-pr/">Buat PR</a></li>
                            {/if}
                            <li class="{if $_sysfrm_menu1 eq 'List PR'}mm-active{/if}"><a href="{$_url}permintaan/list-pr/">List PR</a></li>
						</ul>
					</li>
					{/if}

                    {if _auth2('SHOW-PO',$user['id'])}
					<li class="{if $_sysfrm_menu eq 'Purchase Order'}mm-active{/if}">
						<a class="has-arrow" href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Purchase Order </span></a>
						<ul class="nav-second-level">
                            {if _auth2('ADD-PO',$user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'Buat PO'}mm-active{/if}"><a href="{$_url}pembelian/add-po/">Buat PO</a></li>
                            {/if}
                            <li class="{if $_sysfrm_menu1 eq 'List PO'}mm-active{/if}"><a href="{$_url}pembelian/list-po/">List PO</a></li>
						</ul>
					</li>
					{/if}

                    <!-- {if _auth2('SHOW-TRANSAKSI-GAS',$user['id'])}
                    <li class="{if $_sysfrm_menu eq 'transaksi'}mm-active{/if}">
                        <a class="has-arrow" href="#"><i class="fa fa-list"></i> <span class="nav-label">Transaksi</span></a>
                        <ul class="nav-second-level">
                            {if _auth2('SHOW-PERMINTAAN-GAS',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'permintaan'}mm-active{/if}">
								<a href="#" class="has-arrow"><i class="fa fa-file"></i> Permintaan</a>
								<ul class="nav-third-level">
								    <li class="{if $_sysfrm_menu2 eq 'pr-add'}mm-active{/if}"><a href="{$_url}pembelian/add-pr/">Tambah PR</a></li>
									<li class="{if $_sysfrm_menu2 eq 'pr-pending'}mm-active{/if}"><a href="{$_url}pembelian/list-pr-pending/">PR PENDING</a></li>
									<li class="{if $_sysfrm_menu2 eq 'pr-approve'}mm-active{/if}"><a href="{$_url}pembelian/list-pr-approve/">PR APPROVED</a></li>
									<li class="{if $_sysfrm_menu2 eq 'pr-reject'}mm-active{/if}"><a href="{$_url}pembelian/list-pr-reject/">PR REJECTED</a></li>
								</ul>
							</li>
                            {/if}
                            {if _auth2('SHOW-PEMBELIAN-GAS',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'pembelian'}mm-active{/if}">
								<a href="#" class="has-arrow"><i class="fa fa-shopping-cart"></i> Pembelian</a>
								<ul class="nav-third-level"> -->
									<!-- <li class="{if $_sysfrm_menu2 eq 'purchase-requisition'}mm-active{/if}">
									    <a href="#" class="has-arrow">Purchase Requisition</a>
                                        <ul class="nav-fourth-level">
                                            <li class="{if $_sysfrm_menu3 eq 'list-pr'}mm-active{/if}"><a href="{$_url}pembelian/list-pr/" style="padding-left: 67px;">LIST PR</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'pr1-pending'}mm-active{/if}"><a href="{$_url}pembelian/list-pr1-pending/" style="padding-left: 67px;">PR PENDING</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'pr1-approve'}mm-active{/if}"><a href="{$_url}pembelian/list-pr1-approve/" style="padding-left: 67px;">PR APPROVED</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'pr1-reject'}mm-active{/if}"><a href="{$_url}pembelian/list-pr1-reject/" style="padding-left: 67px;">PR REJECTED</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'pr-cancel'}mm-active{/if}"><a href="{$_url}pembelian/list-pr-cancel/" style="padding-left: 67px;">PR CANCELED</a></li>
                                        </ul>
									</li> -->
                                    <!-- <li class="{if $_sysfrm_menu2 eq 'purchase-order'}mm-active{/if}">
                                        <a href="#" class="has-arrow">Purchase Order</a>
                                        <ul class="nav-fourth-level">
                                            <li class="{if $_sysfrm_menu3 eq 'list-po'}mm-active{/if}"><a href="{$_url}pembelian/list-po/" style="padding-left: 67px;">LIST PO</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'po-pending'}mm-active{/if}"><a href="{$_url}pembelian/list-po-pending/" style="padding-left: 67px;">PO PENDING</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'po-approve'}mm-active{/if}"><a href="{$_url}pembelian/list-po-approve/" style="padding-left: 67px;">PO APPROVED</a></li>
                                            <li class="{if $_sysfrm_menu3 eq 'po-reject'}mm-active{/if}"><a href="{$_url}pembelian/list-po-reject/" style="padding-left: 67px;">PO REJECTED</a></li> -->
                                            
<!--                                            <li class="{if $_sysfrm_menu3 eq 'po-cancel'}mm-active{/if}"><a href="{$_url}pembelian/list-po-cancel/" style="padding-left: 67px;">PO CANCELED</a></li>-->
                                        <!-- </ul>
                                    </li>
								</ul>
							</li>
				            {/if} -->
				            <!-- {if _auth2('SHOW-PEMBELIAN-PERSETUJUAN-GAS',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'persetujuan'}mm-active{/if}">
								<a href="#" class="has-arrow"><i class="fa fa-check-square-o"></i> Persetujuan</a>
								<ul class="nav-third-level">
                                    <li class="{if $_sysfrm_menu2 eq 'user-request-approve'}mm-active{/if}"><a href="{$_url}permintaanbarang/list-ur-aprv/">Approve UR</a></li>
									<li class="{if $_sysfrm_menu2 eq 'purchase-requisition-approve'}mm-active{/if}"><a href="{$_url}pembelian/list-pr-aprv/">Approve PR</a></li> -->
									<!-- <li class="{if $_sysfrm_menu2 eq 'purchase-order-approve'}mm-active{/if}"><a href="{$_url}pembelian/list-po-aprv/">Approve PO</a></li> -->
								<!-- </ul>
							</li> -->
<!--							<li class="{if $_sysfrm_menu2 eq 'lismutasi'}mm-active{/if}"><a href="{$_url}inventaris/mutasi/"><i class="fa fa-car"></i> Mutasi Mobil Inventaris</a></li>-->
                            <!-- {/if}
						</ul> -->

                        <!-- <ul class="nav-second-level">
							<li class="{if $_sysfrm_menu1 eq 'service'}mm-active{/if}">
								<a href="#" class="has-arrow"><i class="fa fa-cogs"></i> Service</a>
								<ul class="nav-third-level">
									<li class="{if $_sysfrm_menu2 eq 'add-service'}mm-active{/if}"><a href="{$_url}service/add/">Service Mobil Inventaris</a></li>
                                    <li class="{if $_sysfrm_menu2 eq 'list-service'}mm-active{/if}"><a href="{$_url}service/list/">List Service Mobil Inventaris</a></li>
								</ul>
							</li>
							<li class="{if $_sysfrm_menu2 eq 'lismutasi'}mm-active{/if}"><a href="{$_url}inventaris/mutasi/"><i class="fa fa-car"></i> Mutasi Mobil Inventaris</a></li>

						</ul> -->

					<!-- </li>
					{/if} -->

                   
					<li class="{if $_sysfrm_menu eq 'Persetujuan'}mm-active{/if}">
						<a class="has-arrow" href="#"><i class="fa fa-check-square-o"></i> <span class="nav-label">Persetujuan</a>
						<ul class="nav-second-level">
                            
                                <li class="{if $_sysfrm_menu1 eq 'Persetujuan UR'}mm-active{/if}"><a href="{$_url}persetujuan/persetujuan-ur/">Persetujuan UR</a></li>
                            
                                <li class="{if $_sysfrm_menu1 eq 'Penerimaan UR'}mm-active{/if}"><a href="{$_url}persetujuan/penerimaan-ur/">Penerimaan UR</a></li>
                           
                                <li class="{if $_sysfrm_menu1 eq 'Persetujuan PR'}mm-active{/if}"><a href="{$_url}persetujuan/persetujuan-pr/">Persetujuan PR</a></li>
                            
					</li>
					

                    {if _auth2('SHOW-DISTRIBUSI-GAS',$user['id'])}
					<!-- <li class="{if $_sysfrm_menu eq 'distribusi'}mm-active{/if}">
						<a class="has-arrow" href="#"><i class="fa fa-truck"></i> <span class="nav-label">Distribusi </span></a>
						<ul class="nav-second-level">
                            {if _auth2('SHOW-PENGIRIMAN-GAS',$user['id'])}
                            <li class="{if $_sysfrm_menu1 eq 'pengiriman'}mm-active{/if}">
                                <a href="#" class="has-arrow">Pengiriman</a>
								<ul class="nav-third-level">
									<li class="{if $_sysfrm_menu2 eq 'addpengiriman'}mm-active{/if}"><a href="{$_url}pengiriman/add/">Add SPBI</a></li>
									<li class="{if $_sysfrm_menu2 eq 'listpengiriman'}mm-active{/if}"><a href="{$_url}pengiriman/list/">List SPBI</a></li>
								</ul>
                            </li> 
                            {/if}
                            {if _auth2('SHOW-PENERIMAAN-GAS',$user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'penerimaan'}mm-active{/if}">
                                <a href="#" class="has-arrow">Penerimaan</a>
								<ul class="nav-third-level">
									<li class="{if $_sysfrm_menu2 eq 'addpenerimaan'}mm-active{/if}"><a href="{$_url}penerimaan/add/">Add BPnB</a></li>
									<li class="{if $_sysfrm_menu2 eq 'listpenerimaan'}mm-active{/if}"><a href="{$_url}penerimaan/list/">List BPnB</a></li>
								</ul>
                            </li> 
                            {/if}
						</ul>
					</li> -->
					{/if}
					{if _auth2('SHOW-LAPORAN-GAS',$user['id'])}
					<!-- <li class="{if $_sysfrm_menu eq 'reports'}mm-active{/if}">
						<a class="has-arrow" href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">{$_L['Reports']} </span></a>
						<ul class="nav-second-level">
                            {if _auth2('SHOW-LAPORAN-PR-GAS',$user['id'])}
                            <li class="{if $_sysfrm_menu2 eq 'laporanpr'}mm-active{/if}"><a href="{$_url}laporan/pr/">Laporan PR</a></li> 
                            {/if}
                            {if _auth2('SHOW-LAPORAN-PEMENUHAN-PR-GAS',$user['id'])}
                            <li class="{if $_sysfrm_menu2 eq 'laporanpemenuhanpr'}mm-active{/if}"><a href="{$_url}laporan/pemenuhanpr/">Laporan Pemenuhan PR</a></li> 
                            {/if}
                            {if _auth2('SHOW-LAPORAN-PO-GAS',$user['id'])}
							<li class="{if $_sysfrm_menu2 eq 'laporanpo'}mm-active{/if}"><a href="{$_url}laporan/po/">Laporan PO</a></li> 
                            {/if}
						</ul>
					</li> -->
					{/if}

					{*<li class="{if $_sysfrm_menu eq 'n'}mm-active{/if}">
						<a href="#"><i class="fa fa-database"></i> <span class="nav-label">n</span><span class="fa arrow"></span></a>
						<ul class="nav-second-level">
							<li class="{if $_sysfrm_menu2 eq 'panjar-list'}mm-active{/if}"><a href="{$_url}panjar/list/">Daftar Bayar Panjar</a></li>
							<li class="{if $_sysfrm_menu2 eq 'panjar-add'}mm-active{/if}"><a href="{$_url}panjar/add/">Tambah Panjar</a></li>
							<li class="{if $_sysfrm_menu2 eq 'bayar-list'}mm-active{/if}"><a href="{$_url}bayar/list/">Daftar n</a></li>
							<li class="{if $_sysfrm_menu2 eq 'bayar-add'}mm-active{/if}"><a href="{$_url}bayar/add/">Tambah n</a></li>
						</ul>
					</li>*}

                    {*{$nav2}
                    {if $_c['accounting'] eq '1'}
                        <li class="{if $_sysfrm_menu eq 'transactions'}mm-active{/if}">
                            <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Financial</span><span class="fa arrow"></span></a>
                            <ul class="nav-second-level">
                                <li><a href="{$_url}transactions/deposit/">{$_L['New Deposit']}</a></li>
                                <li><a href="{$_url}transactions/expense/">{$_L['New Expense']}</a></li>
                                <li><a href="{$_url}transactions/transfer/">{$_L['Transfer']}</a></li>
                                <li><a href="{$_url}transactions/list/">{$_L['View Transactions']}</a></li>
                                <li><a href="{$_url}generate/balance-sheet/">{$_L['Balance Sheet']}</a></li>
                            </ul>
                        </li>
                    {/if}


                    {$nav4}
                    {if $_c['accounting'] eq '1'}
                        <li class="{if $_sysfrm_menu eq 'accounts'}mm-active{/if}">
                            <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">{$_L['Bank n Cash']}</span><span class="fa arrow"></span></a>
                            <ul class="nav-second-level">
                                <li><a href="{$_url}accounts/add/">{$_L['New Account']}</a></li>

                                <li><a href="{$_url}accounts/list/">{$_L['List Accounts']}</a></li>
                                <li><a href="{$_url}accounts/balances/">{$_L['Account_Balances']}</a></li>

                            </ul>
                        </li>
                    {/if}

                    {$nav6}*}


					{*<li class="{if $_sysfrm_menu eq 'reports'}mm-active{/if}">
						<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">{$_L['Reports']} </span><span class="fa arrow"></span></a>
						<ul class="nav-second-level">
							<li class="{if $_sysfrm_menu1 eq 'lapjual'}mm-active{/if}"><a href="{$_url}reports/penjualan/">Laporan Penjualan</a></li>
							<li class="{if $_sysfrm_menu1 eq 'lappiu'}mm-active{/if}"><a href="{$_url}reports/piutang/">Laporan Piutang</a></li>
							<li class="{if $_sysfrm_menu1 eq 'arcard'}mm-active{/if}"><a href="{$_url}reports/arcard/">Kartu Piutang</a></li>
						</ul>
					</li>*}

                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                    <img class="logo" src="{$app_url}sysfrm/uploads/system/logo.png" alt="Logo">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right hidden-xs">



<!--
                        <li>
                            <form class="navbar-form full-width" method="post" action="{$_url}contacts/list/">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="{$_L['Search Customers']}...">
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
                                            <strong>{$_L['Please Wait']}...</strong> <br> <br>
                                            <img class="text-center" src="sysfrm/uploads/system/download.gif" alt="Loading....">

                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
-->

                        <li class="dropdown navbar-user">

                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                                {if $user['img'] eq 'gravatar'}
                                    <img src="http://www.gravatar.com/avatar/{($user['username'])|md5}?s=200" class="img-circle" alt="{$user['fullname']}">
                                {elseif $user['img'] eq ''}
                                    <img src="ui/lib/imgs/default-user-avatar.png" alt="">
                                {else}
                                    <img src="{$user['img']}" class="img-circle" alt="{$user['fullname']}">
                                {/if}

                                <span class="hidden-xs">{$_L['Welcome']} {$user['fullname']}</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="{$_url1}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>
                                <li><a href="{$_url1}settings/change-password/">{$_L['Change Password']}</a></li>
                                <li class="divider"></li>
                                <li><a href="{$_url1}logout/">{$_L['Logout']}</a></li>

                            </ul>
                        </li>

                    </ul>

                </nav>
            </div>

            <div class="row wrapper white-bg page-heading">
                <div class="col-lg-12">
                    <h2 style="color: #2F4050; font-size: 16px; font-weight: 400; margin-top: 18px"><b>{$ncomp}</b> - {$_st} </h2>

                </div>

            </div>

			<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
            <div class="wrapper wrapper-content">
                {if isset($notify)}
                {$notify}
{/if}