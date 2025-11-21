<?php /* Smarty version Smarty-3.1.13, created on 2023-11-15 09:16:06
         compiled from "ui\theme\softhash\prog\FORM\list-response.tpl" */ ?>
<?php /*%%SmartyHeaderCode:798536594645afc0cee68a9-72473276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '542aa1b7d72614a5d9ad6608f27207c3d86b4686' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\list-response.tpl',
      1 => 1700014563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '798536594645afc0cee68a9-72473276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_645afc0cf30de1_70739974',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_645afc0cf30de1_70739974')) {function content_645afc0cf30de1_70739974($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 18%;">Kode Form</th>
                        <th style="width: 50%;">Nama Form</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 20%;" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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