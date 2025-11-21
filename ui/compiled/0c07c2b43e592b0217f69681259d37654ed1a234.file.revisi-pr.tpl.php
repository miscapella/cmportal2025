<?php /* Smarty version Smarty-3.1.13, created on 2023-08-22 10:51:06
         compiled from "ui\theme\softhash\prog\KEBUN\revisi-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186972428264e42ece7b0194-46775813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c07c2b43e592b0217f69681259d37654ed1a234' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\revisi-pr.tpl',
      1 => 1692676264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186972428264e42ece7b0194-46775813',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64e42ece8c5c00_71940890',
  'variables' => 
  array (
    'clist' => 0,
    'msg' => 0,
    'd' => 0,
    'no_revisi' => 0,
    'idate' => 0,
    'idates' => 0,
    'e' => 0,
    'ds' => 0,
    'tg2' => 0,
    'r2' => 0,
    'nama_line' => 0,
    'tg1' => 0,
    'r1' => 0,
    'nama_item' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64e42ece8c5c00_71940890')) {function content_64e42ece8c5c00_71940890($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="modal fade" id="addPRModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header bg-primary">
		  <h5 class="modal-title" id="exampleModalLabel">TAMBAH PURCHASE REQUISITION</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <form class="form-horizontal" id="rform">
			<div class="alert alert-danger" id="emsgModal">
				<a href="#"><i class="fal fa-times" style="float:right" id="closeMsgModal"></i></a>
				<span id="emsgModalbody"></span>
			</div>
			<div class="form-group">
			    <label for="keperluanModal" class="col-form-label">KEPERLUAN <span style="color: red;">*</span></label>
			    <select name="keperluanModal" class="form-control keperluanModal" id="keperluanModal" required>
					<?php echo $_smarty_tpl->tpl_vars['clist']->value;?>

				</select>
			</div>
			<div class="form-group">
				<label for="bagianModal" class="col-form-label">BAGIAN <span style="color: red;">*</span></label>
				<select name="bagianModal" class="form-control bagianModal" id="bagianModal">
					<option value="">Pilih Bagian</option>
				</select>
			</div>
			<div class="form-group">
				<label for="mainModal" class="col-form-label">MAIN DATA <span style="color: red;">*</span></label>
				<select name="mainModal" class="form-control mainModal" id="mainModal">
					<option value="">Pilih Main Data</option>
				</select>
			</div>
			<div class="form-group">
				<label for="subModal" class="col-form-label">BAGIAN SUB <span style="color: red;">*</span></label>
				<select name="subModal" class="form-control subModal" id="subModal">
					<option value="">Pilih Sub Data</option>
				</select>
			</div>
			<div class="form-group">
				<label for="lineModal" class="col-form-label">BAGIAN LINE <span style="color: red;">*</span></label>
				<select name="lineModal" class="form-control lineModal" id="lineModal">
					<option value="">Pilih Line Data</option>
				</select>
			</div>
			<input name="namaBagianModal" type="text" class="form-control" id="namaBagianModal" style="display: none;">
			<div class="form-group">
				<label for="itemModal" class="col-form-label">ITEM STOCK <span style="color: red;">*</span></label>
				<select name="itemModal" class="form-control itemModal" id="itemModal">
					<option value="">Pilih Item Stock</option>
				</select>
			</div>
			<input name="namaItemModal" type="text" class="form-control" id="namaItemModal" style="display: none;">
			<div class="form-group">
			  <label for="merkModal" class="col-form-label">MERK</label>
			  <input name="merkModal" type="text" class="form-control" id="merkModal" readonly>
			</div>
			<div class="form-group">
				<label for="tipeModal" class="col-form-label">TIPE</label>
				<input name="tipeModal" type="text" class="form-control" id="tipeModal" readonly>
			</div>
			<div class="form-group">
				<label for="spesifikasiModal" class="col-form-label">SPESIFIKASI</label>
				<input name="spesifikasiModal" type="text" class="form-control" id="spesifikasiModal" readonly>
			</div>
			<div class="form-group">
				<label for="satuanModal" class="col-form-label">SATUAN</label>
				<input name="satuanModal" type="text" class="form-control" id="satuanModal" readonly>
			</div>
			<div class="form-group">
				<label for="qtyModal" class="col-form-label">QTY REQUEST <span style="color: red;">*</span></label>
				<input name="qtyModal" type="number" class="form-control amount" id="qtyModal" value=0>
			</div>
			<div class="form-group">
				<label for="diperlukanModal" class="col-form-label">TANGGAL DIPERLUKAN <span style="color: red;">*</span></label>
				<input name="diperlukanModal" type="text" placeholder="dd-mm-yyyy" class="form-control tgl" id="diperlukanModal">
			</div>
			<div class="form-group">
				<label for="keteranganModal" class="col-form-label">KETERANGAN PEMBELIAN</label>
				<input name="keteranganModal" type="text" placeholder="Keterangan Pembelian" class="form-control" id="keteranganModal">
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			  <button type="button" id="submitAddPR" class="btn btn-success">Add</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
</div>
<div class="alert alert-danger" id="emsg">
	<span id="emsgbody"></span>
</div>
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
				<h3>REVISI PURCHASE REQUISITION</h3>
				<div class="alert alert-danger" id="emsg" style="display: none;">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addPRModal"  name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
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
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="no_pr">No. PR Awal</label>
					<div class="col-lg-4"><input type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr'];?>
" disabled></div>
					
					<label class="col-lg-2 control-label" for="no_revisi" style="text-align: right">No. PR Revisi</label>
					<div class="col-lg-4"><input type="text" id="no_revisi" name="no_revisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['no_revisi']->value;?>
" disabled></div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="priority">Kepentingan Awal</label>
					<div class="col-lg-4">
						<select name="priority" id="priority" class="form-control" disabled>
							<option value="URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>selected<?php }?>>URGENT</option>
							<option value="TIDAK URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TIDAK URGENT'){?>selected<?php }?>>TIDAK URGENT</option>
						</select>
					</div>
					<label class="col-lg-2 control-label" for="priority_revisi" style="text-align: right">Kepentingan Revisi</label>
					<div class="col-lg-4">
						<select name="priority_revisi" id="priority_revisi" class="form-control">
							<option value="URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>selected<?php }?>>URGENT</option>
							<option value="TIDAK URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TIDAK URGENT'){?>selected<?php }?>>TIDAK URGENT</option>
						</select>
					</div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="tgl_pr">Tanggal PR Awal</label>
					<div class="col-lg-4"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
					
					<label class="col-lg-2 control-label" for="tgl_revisi" style="text-align: right">Tanggal PR Revisi</label>
					<div class="col-lg-4"><input type="text" id="idates" name="idates" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idates']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group" style="margin-bottom:40px">
				    <label class="col-lg-2 control-label" for="pesan">Pesan</label>
					<div class="col-lg-4"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5" disabled><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea></div>
					<label class="col-lg-2 control-label" for="ket_revisi" style="text-align: right">Keterangan Revisi</label>
					<div class="col-lg-4"><textarea type="text" id="ket_revisi" name="ket_revisi" class="form-control" rows="5"></textarea></div>
				</div>
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
							<th>Keperluan</th>
							<th>Bagian</th>
							<th>Item Stock</th>
							<th>Qty Req</th>
							<th>Tgl Diperlukan</th>
							<th>Keterangan Pembelian</th>
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
								<td><input type="text" name="keperluan[]" class="keperluan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" readonly></td>
								<?php $_smarty_tpl->tpl_vars["nama_line"] = new Smarty_variable('', null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['r2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r2']->key => $_smarty_tpl->tpl_vars['r2']->value){
$_smarty_tpl->tpl_vars['r2']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['line']==$_smarty_tpl->tpl_vars['r2']->value['kode_kategori']){?>
										<?php $_smarty_tpl->tpl_vars["nama_line"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r2']->value['nama_kategori']), null, 0);?>
									<?php }?>
								<?php } ?>
								<?php if ($_smarty_tpl->tpl_vars['nama_line']->value==''){?>
									<?php $_smarty_tpl->tpl_vars["nama_line"] = new Smarty_variable("STOCK", null, 0);?>
								<?php }?>
								<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['bagian'];?>
"></td>
								<td style="display:none;"><input type="text" name="main[]" class="main" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['main'];?>
"></td>
								<td style="display:none;"><input type="text" name="sub[]" class="sub" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['sub'];?>
"></td>
								<td style="display:none;"><input type="text" name="line[]" class="line" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
"></td>
								<td><a href="#" class="detail-bagian" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_line']->value;?>
</a></td>
								<td style="display:none;"><input type="text" name="item[]" class="item" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
" readonly></td>
								<?php $_smarty_tpl->tpl_vars["nama_item"] = new Smarty_variable('', null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_item']==$_smarty_tpl->tpl_vars['r1']->value['kode_item']){?>
										<?php $_smarty_tpl->tpl_vars["nama_item"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['nama_item']), null, 0);?>
									<?php }?>
								<?php } ?>
								<td><a href="#" class="detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_item']->value;?>
</a></td>
								<td><input type="text" name="qty[]" class="qty amount" value=<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>
								<td><input type="text" name="diperlukan[]" class="diperlukan tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value=<?php if ($_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']!=''){?><?php echo date('d-m-Y',strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']));?>
<?php }else{ ?>""<?php }?>></td>
								<td><input type="text" name="keterangan[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
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