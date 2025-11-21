<?php /* Smarty version Smarty-3.1.13, created on 2025-03-27 13:58:52
         compiled from "ui\theme\softhash\prog\KEBUN\list-pr-sup-approved.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149261187653f558eaec385-68103705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe48abe0d75550eb3fc306499a918e6091140ba3' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-pr-sup-approved.tpl',
      1 => 1743058617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149261187653f558eaec385-68103705',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_653f558eb4a299_34951483',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_653f558eb4a299_34951483')) {function content_653f558eb4a299_34951483($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
               <h2>PURCHASE REQUISITION SUPPLIER APPROVED</h2>
                <table id="datatableprsupapproved" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">Tgl PR</th>
                        <th style="width: 13%">No. PR</th>
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