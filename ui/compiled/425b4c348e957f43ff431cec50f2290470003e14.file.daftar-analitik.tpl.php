<?php /* Smarty version Smarty-3.1.13, created on 2025-03-24 15:12:32
         compiled from "ui\theme\softhash\prog\HRD\daftar-analitik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18790684167dce1a32839d8-86493648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '425b4c348e957f43ff431cec50f2290470003e14' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\daftar-analitik.tpl',
      1 => 1742803951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18790684167dce1a32839d8-86493648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67dce1a32d2a94_73652477',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67dce1a32d2a94_73652477')) {function content_67dce1a32d2a94_73652477($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">×</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
analitik/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Analitik</a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="31%">Nama Analitik</th>
                        <th width="24%">Dibuat Oleh</th>
                        <th width="20%">Tanggal</th>
                        <th width="22%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>