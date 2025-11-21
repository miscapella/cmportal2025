<?php /* Smarty version Smarty-3.1.13, created on 2025-07-22 08:17:10
         compiled from "ui\theme\softhash\prog\HRD\cabang-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:354257937682d9ba3a63e01-91792412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0934d967f393baba38177614cc20dafac1c80623' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\cabang-list.tpl',
      1 => 1753147023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '354257937682d9ba3a63e01-91792412',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682d9ba3a99334_71828968',
  'variables' => 
  array (
    'msg' => 0,
    'user' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682d9ba3a99334_71828968')) {function content_682d9ba3a99334_71828968($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">×</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<?php if (_auth2('UPDATE-MASTERDATA-CABANG',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cabang/add/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Tambah Cabang</a>
    </div>
</div>
<?php }?>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <table id="datatable-cabang" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="30%">Branch Name</th>
                            <th width="42%">Work Location</th>
                            <th width="25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>