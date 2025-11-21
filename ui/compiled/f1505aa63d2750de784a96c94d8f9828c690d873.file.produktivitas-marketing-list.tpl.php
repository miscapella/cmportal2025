<?php /* Smarty version Smarty-3.1.13, created on 2025-08-05 14:46:50
         compiled from "ui\theme\softhash\prog\HRD\produktivitas-marketing-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9683082216861ee895f3532-51553911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1505aa63d2750de784a96c94d8f9828c690d873' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\produktivitas-marketing-list.tpl',
      1 => 1754379607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9683082216861ee895f3532-51553911',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6861ee89650984_89734699',
  'variables' => 
  array (
    'msg' => 0,
    'user' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6861ee89650984_89734699')) {function content_6861ee89650984_89734699($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">×</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<?php if (_auth2('ADD-PRODUKTIVITAS-MARKETING',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-marketing/add/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Tambah Cabang</a>
    </div>
</div>
<?php }?>

<br>

<div class="panel panel-default">
    <div class="card-body panel-body">
        <?php if (_auth2('SHOW-SEMUA-PRODUKTIVITAS-MARKETING',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3" style="text-align: right;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-marketing/semua/" class="btn btn-primary btn-xs"><i class="fa fa-book"></i> Data Semua Cabang</a>
            </div>
		</div>
        <?php }?>
        <br />
        <div class="row">
            <div class="col-md-12">
                <table id="datatable-cabang" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="36%">Nama Cabang</th>
                            <th width="36%">Work Location</th>
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