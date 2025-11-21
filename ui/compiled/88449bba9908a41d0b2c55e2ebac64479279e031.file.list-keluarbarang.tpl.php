<?php /* Smarty version Smarty-3.1.13, created on 2024-07-22 16:47:44
         compiled from "ui\theme\softhash\prog\KEBUN\list-keluarbarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1265776705662883e2df0426-04523596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88449bba9908a41d0b2c55e2ebac64479279e031' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-keluarbarang.tpl',
      1 => 1721641663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1265776705662883e2df0426-04523596',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_662883e33ab2c3_14181727',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_662883e33ab2c3_14181727')) {function content_662883e33ab2c3_14181727($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/list-keluarbarang/">
					<div class="form-group">
						<div class="col-md-3">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/add-keluarbarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR PENGELUARAN BARANG</h2>
                <table id="keluar-barang" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">No. Keluar Barang</th>
                        <th style="width: 13%">Tanggal</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th class="text-right" style="width: 5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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