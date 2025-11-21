<?php /* Smarty version Smarty-3.1.13, created on 2024-06-04 08:33:29
         compiled from "ui\theme\softhash\prog\HRD\testing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1272385079665e6b06c14c51-03735279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26d9ce85d98a4c3ac4e0a70a5b56529a958afca' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\testing.tpl',
      1 => 1717464807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1272385079665e6b06c14c51-03735279',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_665e6b06c5dc27_66107496',
  'variables' => 
  array (
    'halo' => 0,
    'eachhalo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_665e6b06c5dc27_66107496')) {function content_665e6b06c5dc27_66107496($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["halo"] = new Smarty_variable(array("Hello","World"), null, 0);?>
<?php  $_smarty_tpl->tpl_vars['eachhalo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eachhalo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['halo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eachhalo']->key => $_smarty_tpl->tpl_vars['eachhalo']->value){
$_smarty_tpl->tpl_vars['eachhalo']->_loop = true;
?>
<h1><?php echo $_smarty_tpl->tpl_vars['eachhalo']->value;?>
</h1>
<?php } ?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>