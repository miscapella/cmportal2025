<?php /* Smarty version Smarty-3.1.13, created on 2023-10-25 14:41:48
         compiled from "ui\theme\softhash\prog\KEBUN\list-itemstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106080314464be28953349f7-85617989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd36d304e84760e1747b9b444e9d4d264db2350d' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-itemstock.tpl',
      1 => 1698208457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106080314464be28953349f7-85617989',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64be28953b8bb8_47797848',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64be28953b8bb8_47797848')) {function content_64be28953b8bb8_47797848($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
            <div class="card-body panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="40%">Nama ItemStock</th>
                        <th width="10%">Satuan Item</th>
                        <th width="15%">Jumlah per Satuan</th>
                        <th width="5%">Aktif</th>
                        <th width="27%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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