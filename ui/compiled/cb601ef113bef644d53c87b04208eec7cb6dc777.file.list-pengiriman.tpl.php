<?php /* Smarty version Smarty-3.1.13, created on 2024-03-07 17:07:13
         compiled from "ui\theme\softhash\prog\KEBUN\list-pengiriman.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178989473665d562e64a4284-67197458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb601ef113bef644d53c87b04208eec7cb6dc777' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-pengiriman.tpl',
      1 => 1709806029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178989473665d562e64a4284-67197458',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65d562e65005f2_44590243',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65d562e65005f2_44590243')) {function content_65d562e65005f2_44590243($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
viapengiriman/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Via Pengiriman</a>			
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
                        <th width="20%">Kode Via</th>
                        <th width="45%">Nama Pengiriman</th>
                        <th width="5%">Resi</th>
                        <th width="27%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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