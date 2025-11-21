<?php /* Smarty version Smarty-3.1.13, created on 2024-09-10 16:17:43
         compiled from "ui\theme\softhash\prog\GAS\persetujuan-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42416046066dff4fb385492-17993408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a74aaa658a0586fa3f16d753260f52dc13ea94c' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\persetujuan-pr.tpl',
      1 => 1725959859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42416046066dff4fb385492-17993408',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66dff4fb4341f1_72346112',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66dff4fb4341f1_72346112')) {function content_66dff4fb4341f1_72346112($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <h2>Persetujuan PR</h2>
                <table id="persetujuan-pr" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. PR</th>
                        <th style="width: 15%">Tgl PR</th>
                        <th style="width: 52%">Total Harga</th>
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