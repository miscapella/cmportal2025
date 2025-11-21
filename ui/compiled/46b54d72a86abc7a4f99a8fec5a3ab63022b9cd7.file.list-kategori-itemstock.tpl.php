<?php /* Smarty version Smarty-3.1.13, created on 2023-12-12 13:50:14
         compiled from "ui\theme\softhash\prog\KEBUN\list-kategori-itemstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1446579159655c2564712a59-86095217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46b54d72a86abc7a4f99a8fec5a3ab63022b9cd7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-kategori-itemstock.tpl',
      1 => 1702363810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1446579159655c2564712a59-86095217',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_655c2564757341_58679822',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_L' => 0,
    'tes' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_655c2564757341_58679822')) {function content_655c2564757341_58679822($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DATA <b><?php echo $_smarty_tpl->tpl_vars['d']->value['nama_kategori'];?>
</b></h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Item Stock</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kode_kategori" id="kode_kategori" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_kategori'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>Item Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
							<th>Aktif</th>
							<th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
						</tr>
						</thead>
						<tbody>
						<?php echo $_smarty_tpl->tpl_vars['tes']->value;?>

						</tbody>
					</table>
				</form>
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