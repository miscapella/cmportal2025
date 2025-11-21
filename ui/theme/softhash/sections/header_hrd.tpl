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
                    <li {if $_sysfrm_menu eq 'dashboard'}class="mm-active"{/if}><a href="{$_url}{$_c['redirect_url']}/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>

                    {if _auth2('SHOW-MASTERDATA-KARYAWAN', $user['id']) || _auth2('SHOW-MASTERDATA-POSISI', $user['id'])}
                    <li class="{if $_sysfrm_menu eq 'masterdata'}mm-active{/if}">
                        <a class="has-arrow" href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Master Data</span></a>
                        <ul class="nav-second-level">
                            {if _auth2('SHOW-MASTERDATA-KARYAWAN', $user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'karyawan-list'}mm-active{/if}"><a href="{$_url}karyawan/list/">List Karyawan</a></li>
                            {/if}
                            {if _auth2('SHOW-MASTERDATA-POSISI', $user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'posisi-list'}mm-active{/if}"><a href="{$_url}posisi/list/">List Posisi</a></li>
                            {/if}
                            {if _auth2('SHOW-MASTERDATA-CABANG', $user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'cabang-list'}mm-active{/if}"><a href="{$_url}cabang/list/">List Cabang</a></li>
                            {/if}
                        </ul>
					</li>
                    {/if}

                    {if _auth2('SHOW-GRAFIK-KARYAWAN', $user['id']) || _auth2('SHOW-PRODUKTIVITAS-BENGKEL', $user['id']) || _auth2('SHOW-PRODUKTIVITAS-MARKETING', $user['id'])}
                    <li class="{if $_sysfrm_menu eq 'analisis'}mm-active{/if}">
                        <a class="has-arrow" href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Analisis</span></a>
                        <ul class="nav-second-level">
                            {if _auth2('SHOW-GRAFIK-KARYAWAN', $user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'grafik-karyawan'}mm-active{/if}">
								<a href="#" class="has-arrow">Grafik Karyawan</a>
								<ul class="nav-third-level">
                                    <li class="{if $_sysfrm_menu2 eq 'profil-distribusi-karyawan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/profil-distribusi-karyawan/">Profil Distribusi Karyawan</a></li>
									<li class="{if $_sysfrm_menu2 eq 'rekapitulasi-cuti-karyawan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/rekapitulasi-cuti-karyawan/">Rekapitulasi Cuti Karyawan</a></li>
									<li class="{if $_sysfrm_menu2 eq 'demografi-karyawan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/demografi-karyawan/">Demografi Karyawan</a></li>
									<li class="{if $_sysfrm_menu2 eq 'status-karyawan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/status-karyawan/">Status Karyawan</a></li>
									<li class="{if $_sysfrm_menu2 eq 'pendidikan-karyawan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/pendidikan-karyawan/">Pendidikan Karyawan</a></li>
									<li class="{if $_sysfrm_menu2 eq 'terminated-karyawan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/terminated-karyawan/">Terminated Karyawan</a></li>
									<li class="{if $_sysfrm_menu2 eq 'bpjs-kesehatan'}mm-active{/if}"><a href="{$_url}grafik-karyawan/bpjs-kesehatan/">BPJS Kesehatan</a></li>
								</ul>
							</li>
                            {/if}
                            {if _auth2('SHOW-PRODUKTIVITAS-BENGKEL', $user['id']) || _auth2('SHOW-PRODUKTIVITAS-MARKETING', $user['id'])}
							<li class="{if $_sysfrm_menu1 eq 'produktivitas'}mm-active{/if}">
								<a href="#" class="has-arrow">Produktivitas</a>
								<ul class="nav-third-level">
                                    <li class="{if $_sysfrm_menu2 eq 'produktivitas-bengkel'}mm-active{/if}"><a href="{$_url}produktivitas-bengkel/list/">Bengkel</a></li>
                                    <li class="{if $_sysfrm_menu2 eq 'produktivitas-marketing'}mm-active{/if}"><a href="{$_url}produktivitas-marketing/list/">Marketing</a></li>
								</ul>
							</li>
                            {/if}
                        </ul>
					</li>
                    {/if}
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