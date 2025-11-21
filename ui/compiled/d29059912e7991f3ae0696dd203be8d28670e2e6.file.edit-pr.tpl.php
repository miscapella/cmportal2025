<?php /* Smarty version Smarty-3.1.13, created on 2024-01-26 09:59:00
         compiled from "ui\theme\softhash\prog\GAS\edit-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26854650663a078845273c7-54766068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd29059912e7991f3ae0696dd203be8d28670e2e6' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-pr.tpl',
      1 => 1706237938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26854650663a078845273c7-54766068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63a07884552e19_17206279',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'idate' => 0,
    'clist' => 0,
    'e' => 0,
    'ds' => 0,
    'tg' => 0,
    'r' => 0,
    'tg1' => 0,
    'r1' => 0,
    'tg2' => 0,
    'r2' => 0,
    'merk' => 0,
    'tipe' => 0,
    'spesifikasi' => 0,
    'satuan' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63a07884552e19_17206279')) {function content_63a07884552e19_17206279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH PURCHASE REQUISITION</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-pending/" class="btn btn-primary btn-sm">Daftar PR</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
            <div class="ibox-content" id="ibox_form">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-9"><input type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<!--
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="RENDAH" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='RENDAH'){?>selected<?php }?>>RENDAH</option>
							<option value="MENENGAH" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='MENENGAH'){?>selected<?php }?>>MENENGAH</option>
							<option value="TINGGI" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TINGGI'){?>selected<?php }?>>TINGGI</option>
						</select>
					</div>
				</div>
				-->
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_inventaris'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th><span style="color: red;">*</span> Keperluan</th>
							<th><span style="color: red;">*</span> Item Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
							<th>Satuan</th>
							<th><span style="color: red;">*</span> Qty Req</th>
							<th>Stock</th>
							<th><span style="color: red;">*</span> Tgl Diperlukan</th>
							<th>Keterangan</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</div>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
								<td>
									<select name="kd_inventaris[]" class="kd_inventaris" id="kd_inventaris" disabled>
										<!-- <option value="">Pilih Inventaris</option>
										<option value="STOCK" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']=='STOCK'){?> selected <?php }?>>STOCK</option>
										<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kd_inventaris'];?>
" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']==$_smarty_tpl->tpl_vars['r']->value['kd_inventaris']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['nm_inventaris'];?>
</option>
										<?php } ?> -->
										<option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan']=='PENGADAAN' ? 'PENGADAAN BARU' : $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
</option>
									</select>
									<!-- <input type="text" style="background-color: #ccc" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" readonly value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
"> -->
								</td>
								<td>
									<select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item" disabled> -->
										<?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['r1']->value['kd_item'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['r1']->value['nm_item'];?>
</option>
										<?php }?>
									<?php } ?>
										<!-- <option>Pilih Item Stock</option>
										<?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']=='STOCK'){?>
											<?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['r1']->value['kd_item'];?>
" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['r1']->value['nm_item'];?>
</option>
											<?php } ?>
										<?php }else{ ?>
											<?php  $_smarty_tpl->tpl_vars['r2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r2']->key => $_smarty_tpl->tpl_vars['r2']->value){
$_smarty_tpl->tpl_vars['r2']->_loop = true;
?>
											    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']==$_smarty_tpl->tpl_vars['r2']->value['kd_inventaris']){?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['r2']->value['kd_item'];?>
" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r2']->value['kd_item']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['r2']->value['nm_item'];?>
</option>
												<?php }?>
											<?php } ?>
										<?php }?> -->
									</select>
									<!-- <?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?>
											<input type="text" style="background-color: #ccc" name="<?php echo $_smarty_tpl->tpl_vars['r1']->value['kd_item'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['r1']->value['kd_item'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['r1']->value['nm_item'];?>
" readonly>
										<?php }?>
									<?php } ?> -->
								</td>
								<?php $_smarty_tpl->tpl_vars["merk"] = new Smarty_variable('', null, 0);?>
								<?php $_smarty_tpl->tpl_vars["tipe"] = new Smarty_variable('', null, 0);?>
								<?php $_smarty_tpl->tpl_vars["spesifikasi"] = new Smarty_variable('', null, 0);?>
								<?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable('', null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?>
										<?php $_smarty_tpl->tpl_vars["merk"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['merk']), null, 0);?>
										<?php $_smarty_tpl->tpl_vars["tipe"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['tipe']), null, 0);?>
										<?php $_smarty_tpl->tpl_vars["spesifikasi"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['spesifikasi']), null, 0);?>
										<?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan']), null, 0);?>
									<?php }?>
								<?php } ?>
								<td><input style="background-color: #ccc"  type="text" name="merk[]" class="merk" readonly value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
"></td>
								<td><input style="background-color: #ccc" type="text" name="tipe[]" class="tipe" readonly value="<?php echo $_smarty_tpl->tpl_vars['tipe']->value;?>
"></td>
								<td><input style="background-color: #ccc" type="text" name="spesifikasi[]" class="spesifikasi" readonly value="<?php echo $_smarty_tpl->tpl_vars['spesifikasi']->value;?>
"></td>
								<td><input style="background-color: #ccc" type="text" name="satuan[]" class="satuan" readonly value="<?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
"></td>
								<td><input type="text" name="qty_req[]" class="qty_req amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
"></td>
								<td><input style="background-color: #ccc" type="text" name="qty_balance[]" class="qty_balance amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_stock'];?>
" readonly><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>
								<td><input type="text" style="cursor: pointer; background: white;" name="tgl[]" class="tgl" datepicker="" data-date-format="dd-mm-yyyy" data-auto-close="true" value=<?php if ($_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']!=''){?><?php echo date('d-m-Y',strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']));?>
<?php }else{ ?>""<?php }?>></td>
								<td><input type="text" name="keterangan[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
"></td>
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