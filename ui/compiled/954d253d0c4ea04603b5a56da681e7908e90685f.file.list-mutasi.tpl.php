<?php /* Smarty version Smarty-3.1.13, created on 2024-01-12 09:48:14
         compiled from "ui\theme\softhash\prog\UNIT\list-mutasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1074828876654859708de963-93102382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '954d253d0c4ea04603b5a56da681e7908e90685f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\list-mutasi.tpl',
      1 => 1705027690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1074828876654859708de963-93102382',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6548597090f567_72397138',
  'variables' => 
  array (
    'msg' => 0,
    'duplicate' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6548597090f567_72397138')) {function content_6548597090f567_72397138($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<h1><?php echo $_smarty_tpl->tpl_vars['duplicate']->value;?>
</h1>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <table id="datatable" class="table table-bordered table-hover sys_table">
          <thead>
          <tr>
            <th style="width: 2%">#</th>
            <th style="width: 13%">TGL BAST</th>
            <th style="width: 10%">NO BAST</th>
            <th style="width: 17%">NO CHASSIS</th>
            <th style="width: 10%">NO ENGINE</th>
            <th style="width: 10%">KODE SUMBER</th>
            <th style="width: 15%">KODE TUJUAN</th>
            <th class="text-right width: 25%">ACTION</th>
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