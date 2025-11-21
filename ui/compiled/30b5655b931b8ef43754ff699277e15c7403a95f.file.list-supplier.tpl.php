<?php /* Smarty version Smarty-3.1.13, created on 2024-10-21 11:38:12
         compiled from "ui\theme\softhash\prog\KEBUN\list-supplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1361901167657295c3ead897-53858781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30b5655b931b8ef43754ff699277e15c7403a95f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-supplier.tpl',
      1 => 1729485488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1361901167657295c3ead897-53858781',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_657295c3f0a547_88825199',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_657295c3f0a547_88825199')) {function content_657295c3f0a547_88825199($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                        <th width="10%">Kode Supplier</th>
                        <th width="25%">Nama Supplier</th>
                        <th width="10%">Bidang</th>
                        <th width="10%">Komoditas</th>
                        <th width="15%">Tgl Mulai Kerjasama</th>
                        <th width="5%">Aktif</th>
                        <th width="22%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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