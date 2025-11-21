<?php /* Smarty version Smarty-3.1.13, created on 2024-10-29 11:10:06
         compiled from "ui\theme\softhash\prog\KEBUN\list-itemstock-approve.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187521329164be28965a8069-48471229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c61d4a375688b6d399586926da603fdbe0d1bc0f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-itemstock-approve.tpl',
      1 => 1730174935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187521329164be28965a8069-48471229',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64be2896625d95_66726761',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'opt' => 0,
    'e' => 0,
    'ds' => 0,
    'nourut' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64be2896625d95_66726761')) {function content_64be2896625d95_66726761($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
							<th>Item Stock</th>
							<th>Supplier</th>
							<th>Bidang</th>
							<th>Tanggal Mulai Kerjasama</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</div>
						<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
							<tr>
								<input type="hidden" id="kode_item[]" name="kode_item[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
">
								<input type="hidden" id="kode_supplier[]" name="kode_supplier[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
">
								<td style="vertical-align:middle;"><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><?php echo $_smarty_tpl->tpl_vars['ds']->value['nama_item'];?>
</a></td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['nama_supplier'];?>
</a></td>
								<td style="vertical-align:middle;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['bidang'];?>
</td>
								<td style="vertical-align:middle;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_mulai_kerjasama'];?>
</td>
								<td>
                                    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
status[]" class="cekbox" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
pending" <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='pending'){?> checked <?php }?> value="pending"><label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
pending"> Pending</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
status[]" class="cekbox" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
aktif" <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='aktif'){?> checked <?php }?> value="aktif"><label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
aktif"> Aktif</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
status[]" class="cekbox" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
nonaktif" <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='nonaktif'){?> checked <?php }?> value="nonaktif"><label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_supplier"];?>
nonaktif"> Non Aktif</label>
								</td>
							</tr>
							<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
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