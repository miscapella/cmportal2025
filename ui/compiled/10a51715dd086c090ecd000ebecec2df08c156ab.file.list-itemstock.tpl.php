<?php /* Smarty version Smarty-3.1.13, created on 2024-08-28 14:44:06
         compiled from "ui\theme\softhash\prog\GAS\list-itemstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126180909637500d0798062-76365462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10a51715dd086c090ecd000ebecec2df08c156ab' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-itemstock.tpl',
      1 => 1724831045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126180909637500d0798062-76365462',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_637500d08047a2_67993637',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637500d08047a2_67993637')) {function content_637500d08047a2_67993637($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
itemstock/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Item Stock</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="15%">Kode Barang</th>
                        <th width="60%">Nama Barang</th>
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