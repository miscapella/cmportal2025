<?php /* Smarty version Smarty-3.1.13, created on 2024-09-10 10:36:48
         compiled from "ui\theme\softhash\prog\GAS\penerimaan-ur.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146056270566dfbed02203f9-27582442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52094073dd4c787da3fc641b61c921e4414af0ef' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\penerimaan-ur.tpl',
      1 => 1725939272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146056270566dfbed02203f9-27582442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66dfbed0281324_28751761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66dfbed0281324_28751761')) {function content_66dfbed0281324_28751761($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <h2>Penerimaan UR</h2>
                <table id="penerimaan-ur" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
                        <th style="width: 30%">Dibuat Oleh</th>
                        <th style="width: 22%">Departemen</th>
                        <th class="text-right" style="width: 15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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