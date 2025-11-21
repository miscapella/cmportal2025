<?php /* Smarty version Smarty-3.1.13, created on 2023-08-08 08:33:46
         compiled from "ui\theme\softhash\prog\KEBUN\list-itemstock-submit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63780148464bfb778e26574-10438539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be8c056036d11106b4a00edb57117638da503f2a' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-itemstock-submit.tpl',
      1 => 1691408734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63780148464bfb778e26574-10438539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bfb779569dc9_10503601',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'opt' => 0,
    'e' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bfb779569dc9_10503601')) {function content_64bfb779569dc9_10503601($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
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
				<h3>DAFTAR PENGAJUAN PERSETUJUAN SUPPLIER PADA ITEM STOCK</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list/" class="btn btn-primary btn-sm">Daftar Item Stock</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li>Nama Item Stock : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['nama_item'];?>
</b></li>
                   <li>&nbsp;</li>
                   <li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
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
					<input type="hidden" name="kode_item" id="kode_item" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_item'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>#</th>
							<th>Kode Supplier</th>
							<th>Supplier</th>
							<th>Bidang</th>
							<th>Tanggal Mulai Kerjasama</th>
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
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked"></td>
								<input type="hidden" id="kode_supplier[]" name="kode_supplier[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
">
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nama_supplier'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['bidang'];?>
</td>
								<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ds']->value['tgl_mulai_kerjasama'],"%d %b %Y");?>
</td>
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