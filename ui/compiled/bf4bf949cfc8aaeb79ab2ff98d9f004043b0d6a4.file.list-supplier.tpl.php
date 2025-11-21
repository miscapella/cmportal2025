<?php /* Smarty version Smarty-3.1.13, created on 2024-08-28 14:52:45
         compiled from "ui\theme\softhash\prog\GAS\list-supplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162827740364b9eb3416a977-12383720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf4bf949cfc8aaeb79ab2ff98d9f004043b0d6a4' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-supplier.tpl',
      1 => 1724831564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162827740364b9eb3416a977-12383720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64b9eb341dbc16_65177234',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64b9eb341dbc16_65177234')) {function content_64b9eb341dbc16_65177234($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<div class="row">
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
supplier/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Supplier</a>			
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="15%">Kode Supplier</th>
                        <th width="28%">Nama Supplier</th>
                        <th width="17%">Jenis Usaha</th>
                        <th width="15%">Tgl Mulai Kerjasama</th>
                        <th width="7%">Aktif</th>
                        <th width="15%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>