<?php /* Smarty version Smarty-3.1.13, created on 2024-11-06 15:38:02
         compiled from "ui\theme\softhash\prog\FORM\history-input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127511284664b4f1bf7688a2-08924385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05e15396f9364b4f378198e3edae0197185ecb89' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\history-input.tpl',
      1 => 1730879874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127511284664b4f1bf7688a2-08924385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64b4f1bf7b8276_26577800',
  'variables' => 
  array (
    'msg' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64b4f1bf7b8276_26577800')) {function content_64b4f1bf7b8276_26577800($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <table id="datatable-history-input" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 15%;">Tanggal</th>
                        <th style="width: 40%;">Nama Form</th>
                        <th style="width: 20%;">Details</th>
                        <th class="text-right">Status</th>
                        <th style="width: 10%;" class="text-right">Manage</th>
                    </tr>
                    </thead>
                    
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