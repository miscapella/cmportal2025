<?php /* Smarty version Smarty-3.1.13, created on 2023-08-07 11:14:55
         compiled from "ui\theme\softhash\prog\KEBUN\list-itemstock-supplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176861979764bfb77c9ac3c0-87614034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94386d7a03b8845145a50032fb02a46d51586fa9' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-itemstock-supplier.tpl',
      1 => 1691381517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176861979764bfb77c9ac3c0-87614034',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bfb77ca06161_46078967',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    '_L' => 0,
    'opt' => 0,
    'e' => 0,
    'tg' => 0,
    'r' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bfb77ca06161_46078967')) {function content_64bfb77ca06161_46078967($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DATA ITEM STOCK: <b><?php echo $_smarty_tpl->tpl_vars['d']->value['nama_item'];?>
</b></h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list/" class="btn btn-primary btn-sm">Daftar Item Stock</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Supplier</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kode_item" id="kode_item" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_item'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>Kode Supplier</th>
							<th>Supplier</th>
							<th>Bidang</th>
							<th>Tanggal Mulai Kerjasama</th>
							<th>Status</th>
							<th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</div>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
									<select name="kode_supplier[]" class="kode_supplier" id="kode_supplier" disabled>
										<option value="">Pilih Supplier</option>
										<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_supplier']==$_smarty_tpl->tpl_vars['r']->value['kode_supplier']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['kode_supplier'];?>
</option>
										<?php } ?>
									</select>
								</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nama_supplier'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['bidang'];?>
</td>
								<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ds']->value['tgl_mulai_kerjasama'],"%d %b %Y");?>
</td>
								<td style="text-transform: uppercase" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
" class="status"><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>
								
								<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
							</tr>
						<?php } ?>
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