<?php /* Smarty version Smarty-3.1.13, created on 2025-04-21 16:26:05
         compiled from "ui\theme\softhash\prog\GAS\add-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184086542766cc4460a1cec9-32537775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2d6150ee6aee942bc732478ec85fc95a09d735b' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\add-pr.tpl',
      1 => 1742547895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184086542766cc4460a1cec9-32537775',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66cc4460a73968_74152537',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'idate' => 0,
    'dirlist' => 0,
    'urlist' => 0,
    'd' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66cc4460a73968_74152537')) {function content_66cc4460a73968_74152537($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<div class="modal fade" id="add-itemstock-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header bg-primary">
		  <h5 class="modal-title" id="exampleModalLabel">TAMBAH ITEMSTOCK</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <form class="form-horizontal" id="mform" autocomplete="off" spellcheck="false">
			<div class="alert alert-danger" id="emsgModal">
				<a href="#"><i class="fal fa-times" style="float:right" id="closeMsgModal"></i></a>
				<span id="emsgModalbody"></span>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="nama"><span style="color: red;">*</span> Nama Item Stock</label>
				<input type="text" id="nama" name="nama" class="form-control">
			</div>
			<div class="form-group">
				<label class="col-form-label" for="merek">Merek</label>
				<input type="text" id="merek" name="merek" class="form-control">
			</div>
			<div class="form-group">
				<label class="col-form-label" for="tipe">Tipe</label>
				<input type="text" id="tipe" name="tipe" class="form-control">
			</div>
			<div class="form-group">
				<label class="col-form-label" for="kategori"><span style="color: red;">*</span> Kategori</label>
				<select name="kategori" class="form-control" id="kategori">
					<option value="">Pilih Kategori</option>
						<option value="Umum">Umum</option>
						<option value="IT">IT</option>
						<option value="Service">Service</option>
				</select>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="spesifikasi">Spesifikasi</label>
				<textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="reorder">Reorder Time (Hari)</label>
				<input type="number" id="reorder" name="reorder" class="form-control" value=0>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" id="submitAddItemstock" class="btn btn-success">Add</button>
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
				<h3>TAMBAH PURCHASE REQUISITION</h3>
<!--
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr/" class="btn btn-primary btn-sm">Daftar PR</a>
				</div>
-->
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
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-3">
						<input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div><br>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label" for="total">Harga Total</label>
					<div class="col-lg-3">
						<input type="text" id="total" name="total" class="form-control" style="background-color: #f7f7f7; cursor: default;" value="Rp 0" disabled>
					</div><br>
				</div>
				<div class="form-group direksi" style="display: none">
					<label class="col-lg-3 control-label" for="direksi">Pilih direksi approval <span style="color: red;">*</span></label>
					<div class="col-lg-3">
						<select class="form-control" id="direksi" name="direksi">
							<?php echo $_smarty_tpl->tpl_vars['dirlist']->value;?>

						</select>
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
					<div class="form-group">
                        <label class="col-lg-1 control-label" for="referensi_ur1">Referensi UR</label>
                        <div class="col-lg-3">
                            <select class="form-control rolegroup urlist" id="referensi_url" name="referensi_url"><?php echo $_smarty_tpl->tpl_vars['urlist']->value;?>
</select>
                        </div>
						<button class="btn btn-success btn-sm" name="add-ur" id="add-ur"><i class="fa fa-plus"></i> Tambah UR</button>
                    </div>
					<div class="form-group">
                        <label class="col-lg-2 control-label" for="add-itemstock" style="text-align: left;">Itemstock belum ada?</label>
						<button class="btn btn-success btn-sm" name="add-itemstock-ur" id="add-itemstock" data-toggle="modal" data-target="#add-itemstock-modal"><i class="fa fa-plus"></i> Tambah Itemstock</button>
                    </div>
					<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_inventaris'];?>
">
					<table class="table table-bordered table-hover sys_table" id="table-pr">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th>Nama Barang</th>
							<th><span style="color: red;">*</span> Keperluan</th>
							<th><span style="color: red;">*</span> Item Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
							<th><span style="color: red;">*</span> Qty Req</th>
							<th><span style="color: red;">*</span> Tgl Diperlukan</th>
							<th>Keterangan Pembelian</th>
							<th><span style="color: red;">*</span> Supplier 1</th>
							<!-- <th>
								<label for="ppn">Ppn Supplier 1<span style="color: red;">*</span></label>
								<input type="number" id="ppn1" name="ppn1" class="form-control" value="0" style="display: block; margin-top: 5px;">
								<label for="exclude_ppn" style="display: block; margin-top: 10px;">
								  <input type="checkbox" id="exclude_ppn1" name="exclude_ppn1" style="vertical-align: middle;"> Exclude Ppn
								</label>
							</th> -->
							<th><span style="color: red;">*</span> Ppn Supplier 1</th>
							<th><span style="color: red;">*</span> Harga Supplier 1</th>
							<th><span style="color: red;">*</span> Harga setelah PPN Supplier 1</th>	
							<th><span style="color: red;">*</span> Keterangan Supplier 1</th>
							<th><span style="color: red;">*</span> File Supplier 1</th>
							<th>Garansi 1</th>
							<th><span style="color: red;">*</span> Supplier 2</th>
							<!-- <th>
								<label for="ppn">Ppn Supplier 2<span style="color: red;">*</span></label>
								<input type="number" id="ppn2" name="ppn2" class="form-control" value="0" style="display: block; margin-top: 5px;">
								<label for="exclude_ppn" style="display: block; margin-top: 10px;">
								  <input type="checkbox" id="exclude_ppn2" name="exclude_ppn2" style="vertical-align: middle;"> Exclude Ppn
								</label>
							</th> -->
							<th><span style="color: red;">*</span> Ppn Supplier 2</th>
							<th><span style="color: red;">*</span> Harga Supplier 2</th>
							<th><span style="color: red;">*</span> Harga setelah PPN Supplier 2</th>
							<th><span style="color: red;">*</span> Keterangan Supplier 2</th>
							<th><span style="color: red;">*</span> File Supplier 2</th>
							<th>Garansi 2</th>
							<th><span style="color: red;">*</span> Supplier 3</th>
							<!-- <th>
								<label for="ppn">Ppn Supplier 3<span style="color: red;">*</span></label>
								<input type="number" id="ppn3" name="ppn3" class="form-control" value="0" style="display: block; margin-top: 5px;">
								<label for="exclude_ppn" style="display: block; margin-top: 10px;">
								  <input type="checkbox" id="exclude_ppn3" name="exclude_ppn3" style="vertical-align: middle;"> Exclude Ppn
								</label>
							</th> -->
							<th><span style="color: red;">*</span> Ppn Supplier 3</th>
							<th><span style="color: red;">*</span> Harga Supplier 3</th>
							<th><span style="color: red;">*</span> Harga setelah PPN Supplier 3</th>
							<th><span style="color: red;">*</span> Keterangan Supplier 3</th>
							<th><span style="color: red;">*</span> File Supplier 3</th>
							<th>Garansi 3</th>
							<th><span style="color: red;">*</span> Supplier Pilihan</th>
						</tr>
						</thead>
						<tbody>
							<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</div>
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