<?php /* Smarty version Smarty-3.1.13, created on 2024-01-31 08:43:28
         compiled from "ui\theme\softhash\prog\GAS\list-pr-sup-approved.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16566792006596248a197bd9-44894093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '433f2fc1ed262cd559c116aabbd69f9aec4182e4' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-pr-sup-approved.tpl',
      1 => 1706665407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16566792006596248a197bd9-44894093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6596248a1c94b3_60621151',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6596248a1c94b3_60621151')) {function content_6596248a1c94b3_60621151($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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