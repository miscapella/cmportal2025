<?php /* Smarty version Smarty-3.1.13, created on 2023-11-03 13:28:41
         compiled from "ui\theme\softhash\sections\header_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3283703196374fd140b7c69-33739251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09a4b1bd498017b2b86ed737bff280fd4efbdc50' => 
    array (
      0 => 'ui\\theme\\softhash\\sections\\header_menu.tpl',
      1 => 1698992858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3283703196374fd140b7c69-33739251',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6374fd140c40e1_81593481',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6374fd140c40e1_81593481')) {function content_6374fd140c40e1_81593481($_smarty_tpl) {?><li><div align="center" style="margin-top:5px;margin-bottom:5px">
	<select id="program" name="program" style="width:85%"  class="form-control">
		<option value="awal">Program Default</option>
		<?php echo $_SESSION['optMenu'];?>

	</select>
</div></li><?php }} ?>