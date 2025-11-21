<?php /* Smarty version Smarty-3.1.13, created on 2025-05-26 09:17:21
         compiled from "ui\theme\softhash\prog\HRD\posisi-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1096843308682d5163066f33-35257178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b7da322509c1916f01e5d41a07cae86b2b72aba' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\posisi-list.tpl',
      1 => 1748225822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1096843308682d5163066f33-35257178',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682d516309cf03_49350259',
  'variables' => 
  array (
    'msg' => 0,
    'user' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682d516309cf03_49350259')) {function content_682d516309cf03_49350259($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">×</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<?php if (_auth2('UPDATE-MASTERDATA-POSISI',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<div class="row">
	<div class="col-md-6"></div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
posisi/update/" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Perbarui Daftar Posisi</a>
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
posisi/add/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Tambah Posisi</a>
    </div>
</div>
<?php }?>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <table id="datatable-posisi" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="28%">Position Id</th>
                            <th width="44%">Position Title</th>
                            <th width="25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>