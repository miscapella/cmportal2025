<?php /* Smarty version Smarty-3.1.13, created on 2023-11-09 11:00:14
         compiled from "ui\theme\softhash\users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1584041397654b4de6840c78-74590054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '036dd806538c6c28467d541dcfc13003fec4fd0f' => 
    array (
      0 => 'ui\\theme\\softhash\\users.tpl',
      1 => 1699502411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1584041397654b4de6840c78-74590054',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_654b4de6896c07_03650281',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_654b4de6896c07_03650281')) {function content_654b4de6896c07_03650281($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                        <th style="width: 2%">#</th>
                        <th style="width: 25%">Email</th>
                        <th style="width: 20%">Fullname</th>
                        <th style="width: 25%">Supervisor</th>
                        <th style="width: 13%">Employee ID</th>
                        <th class="text-right" style="width:15%">Manage</th>
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