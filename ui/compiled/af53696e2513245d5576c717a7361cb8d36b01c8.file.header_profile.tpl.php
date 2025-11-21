<?php /* Smarty version Smarty-3.1.13, created on 2022-11-16 22:09:08
         compiled from "ui\theme\softhash\sections\header_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5823358206374fd140962a4-91418793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af53696e2513245d5576c717a7361cb8d36b01c8' => 
    array (
      0 => 'ui\\theme\\softhash\\sections\\header_profile.tpl',
      1 => 1657162864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5823358206374fd140962a4-91418793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_url' => 0,
    'user' => 0,
    '_L' => 0,
    '_url1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6374fd140af943_08724769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6374fd140af943_08724769')) {function content_6374fd140af943_08724769($_smarty_tpl) {?><li class="nav-header" style="background: url(<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/user-info.jpg) no-repeat;">
	<div class="dropdown profile-element"> <span style="max-width: 64px;margin-left:auto;margin-right:auto;display:block;padding-bottom:10px">

<?php if ($_smarty_tpl->tpl_vars['user']->value['img']=='gravatar'){?>
<img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['username']));?>
?s=64" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
			<?php }elseif($_smarty_tpl->tpl_vars['user']->value['img']==''){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png"  class="img-circle" style="max-width: 64px;" alt="">
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-circle" style="max-width: 64px;margin-left:auto;margin-right:auto;display:block" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
<?php }?>
		 </span>
		<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
		<span class="clear profile-text"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
</strong>
		 </span> <span class="text-muted text-xs block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['My Account'];?>
 <b class="caret"></b></span> </span> </a>
		<ul class="dropdown-menu animated fadeIn m-t-xs">
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>

			<li class="divider"></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>
		</ul>
	</div>
</li>
<?php }} ?>