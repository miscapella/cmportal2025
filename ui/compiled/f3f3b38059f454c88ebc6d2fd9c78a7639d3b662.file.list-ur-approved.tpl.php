<?php /* Smarty version Smarty-3.1.13, created on 2024-10-16 14:05:21
         compiled from "ui\theme\softhash\prog\KEBUN\list-ur-approved.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25403926665d719e6b4b318-55065484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3f3b38059f454c88ebc6d2fd9c78a7639d3b662' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-ur-approved.tpl',
      1 => 1729062320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25403926665d719e6b4b318-55065484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65d719e6baa3a2_93247139',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65d719e6baa3a2_93247139')) {function content_65d719e6baa3a2_93247139($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
               <h2>DAFTAR USER REQUEST (UR)</h2>
                <table id="list-pengeluaranbarang" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">No. Request</th>
                        <th style="width: 13%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
                        <th style="width: 15%">Nomor</th>
                        <th style="width: 10%">Status</th>
                        <th class="text-right" style="width: 10%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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