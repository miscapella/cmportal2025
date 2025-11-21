<?php /* Smarty version Smarty-3.1.13, created on 2024-01-31 08:54:45
         compiled from "ui\theme\softhash\prog\GAS\list-pr-pending.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76105893063c7a45b37b3b3-29490245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd93eccbd1588f03d7c3ba5d8766e03c0ac66b67' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-pr-pending.tpl',
      1 => 1706665457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76105893063c7a45b37b3b3-29490245',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63c7a45b3c81e2_45089076',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63c7a45b3c81e2_45089076')) {function content_63c7a45b3c81e2_45089076($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
               <h2>PURCHASE REQUISITION PENDING</h2>
                <table id="datatableprpending" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">Tgl PR</th> 
                        <th style="width: 15%">No. PR</th>
                        <th style="width: 13%">Nama Cabang</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <!--<th style="width: 15%">Tingkat Kepentingan</th>-->
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