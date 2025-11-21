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
                    <li {if $_sysfrm_menu eq 'dashboard'}class="active"{/if}><a href="{$_url}{$_c['redirect_url']}/"><i class="fa fa-th-large"></i> <span class="nav-label">{$_L['Dashboard']}</span></a></li>
                    
                    {if _auth2('SHOW-MASTER-DATA',$user['id'])}
                        <li class="{if $_sysfrm_menu eq 'data'}mm-active{/if}">
                            <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Master Data</span><span class="fa arrow"></span></a>
                            <ul class="nav-second-level">
                                {if _auth2('SHOW-COMPANY',$user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'company'}mm-active{/if}">
                                    <a href="{$_url}company/list/">List {$_L['Company']}</a>
                                </li>
                                {/if}
                                <li class="{if $_sysfrm_menu1 eq 'department'}mm-active{/if}">
                                    <a href="{$_url}department/list/">List Unit Usaha</a>
                                </li>
                                {if _auth2('SHOW-RUANGAN', $user['id'])}
                                <li class="{if $_sysfrm_menu1 eq 'ruangan'}mm-active{/if}">
                                    <a href="{$_url}ruangan/list/">List Ruangan</a>
                                </li>
                                {/if}
                            </ul>
                        </li>
                    {/if}
                    <li class="{if $_sysfrm_menu eq 'book_zoom'}mm-active{/if}">
                        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Booking </span><span class="fa arrow"></span></a>
                        <ul class="nav-second-level">
                            <li class="{if $_sysfrm_menu1 eq 'listbook_zoom'}mm-active{/if}"><a href="{$_url}book_zoom/list/">List Booking Zoom</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'listbook_alat'}mm-active{/if}"><a href="{$_url}book_zoom/pinjaman/">List Barang Pinjaman</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'listbook_room'}mm-active{/if}"><a href="{$_url}book_room/list/">List Booking Room | Hall</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'historybook_zoom'}mm-active{/if}"><a href="{$_url}book_zoom/history/">My Booking History</a></li>
                        </ul>
                    </li>
<!--
                    <li class="{if $_sysfrm_menu eq 'form_memo'}mm-active{/if}">
                        <a href="#"><i class="fa fa-paperclip"></i> <span class="nav-label">Form Memo </span><span class="fa arrow"></span></a>
                        <ul class="nav-second-level">
                            <li class="{if $_sysfrm_menu1 eq 'listmemo'}mm-active{/if}"><a href="{$_url}form_memo/list/">Inbox</a></li>
                            <li class="{if $_sysfrm_menu1 eq 'sentmemo'}mm-active{/if}"><a href="{$_url}form_memo/sent/">Sent</a></li>
                        </ul>
                    </li>
-->
                    <li class="{if $_sysfrm_menu eq 'my_account'}mm-active{/if}">
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">{$_L['My Account']} </span><span class="fa arrow"></span></a>
                        <ul class="nav-second-level">

                            <li><a href="{$_url}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>
                            
                            <li><a href="{$_url}settings/change-password/">{$_L['Change Password']}</a></li>
                            
                            <li><a href="{$_url}logout/">{$_L['Logout']}</a></li>
                        </ul>
                    </li>
                      
                    
                    {if ($user['username']) eq 'admin@fortunateshop.com'}
                        <li class="{if $_sysfrm_menu eq 'util'}mm-active{/if}">
                            <a href="#"><i class="fa fa-bars"></i> <span class="nav-label">{$_L['Utilities']} </span><span class="fa arrow"></span></a>
                            <ul class="nav-second-level">
                                <li><a href="{$_url}util/activity/">{$_L['Activity Log']}</a></li>
								{if ($user['id']) eq 1}
									<li><a href="{$_url}util/sent-emails/">{$_L['Email Message Log']}</a></li>
									<li><a href="{$_url}util/dbstatus/">{$_L['Database Status']}</a></li>
									<li><a href="{$_url}util/cronlogs/">{$_L['CRON Log']}</a></li>
								{/if}
                            </ul>
                        </li>
                    {/if}
					{if _auth2('SHOW-SETTINGS',$user['id'])}
						<li class="{if $_sysfrm_menu eq 'settings'}mm-active{/if}">
							<a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">{$_L['Settings']} </span><span class="fa arrow"></span></a>
							<ul class="nav-second-level">
								<li><a href="{$_url}settings/app/">{$_L['General Settings']}</a></li>
								<li class="{if $_sysfrm_menu1 eq 'manageuser'}mm-active{/if}"><a href="{$_url}settings/users/">{$_L['Manage Users']}</a></li>
								<li class="{if $_sysfrm_menu1 eq 'aktivasiuser'}mm-active{/if}"><a href="{$_url}settings/user-activate/">Aktivasi Users</a></li>
								{if _auth2('SHOW-MANAGE-OTORITAS',$user['id'])}
								<li class="{if $_sysfrm_menu1 eq 'otoritas'}mm-active{/if}"><a href="#">Manage Otoritas <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li class="{if $_sysfrm_menu2 eq 'listotoritas'}mm-active{/if}"><a href="{$_url}settings/otoritas/">Daftar Otoritas</a></li>
										<li class="{if $_sysfrm_menu2 eq 'groupotoritas'}mm-active{/if}"><a href="{$_url}settings/otoritas-group/">Group Otoritas</a></li>
										<li class="{if $_sysfrm_menu2 eq 'otoritasuser'}mm-active{/if}"><a href="{$_url}settings/otoritas-user/">Otoritas User</a></li>
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

                    <a href="#"><img class="logo" src="{$app_url}sysfrm/uploads/system/logo.png" alt="Logo"></a>
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right hidden-xs">

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
                                <li><a href="{$_url}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>
                                <li><a href="{$_url}settings/change-password/">{$_L['Change Password']}</a></li>
                                <li class="divider"></li>
                                <li><a href="{$_url}logout/">{$_L['Logout']}</a></li>

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

<!--			<button onclick="topFunction()" id="myBtn" title="Go to top"></button>-->
			{if isset($news_flash)}
				<div style="background-color:white;color:{$color_text};font-weight:normal;font-family:calibri;height:35px;margin-top:10px;font-size:22px;padding:2px 10px 2px">
					<marquee onmouseover="this.stop();" onmouseout="this.start();" direction="left" align="center">{$news_flash}</marquee>
				</div>
			{/if}
            <div class="wrapper wrapper-content">
                {if isset($notify)}
                {$notify}
{/if}