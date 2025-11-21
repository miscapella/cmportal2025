<?php /* Smarty version Smarty-3.1.13, created on 2025-03-27 13:59:27
         compiled from "ui\theme\softhash\prog\KEBUN\list-po-rejected.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176895469264e7108e7a33e1-27672749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3dc17c82093f36dc4130f92cb5b9d9971d75976' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-po-rejected.tpl',
      1 => 1743058764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176895469264e7108e7a33e1-27672749',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64e7108e86fd46_91298739',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64e7108e86fd46_91298739')) {function content_64e7108e86fd46_91298739($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE ORDER REJECTED</h2>
                <table id="datatableporejected" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">Tgl PO</th>
                        <th style="width: 13%">No. PO</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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

<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>