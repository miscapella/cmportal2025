<?php /* Smarty version Smarty-3.1.13, created on 2024-07-24 12:31:55
         compiled from "ui\theme\softhash\prog\KEBUN\add-mintabarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:777197429658a62885ca551-73225864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4ae32b5f6f98273f5a05693dab1225eb4326717' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-mintabarang.tpl',
      1 => 1721798485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '777197429658a62885ca551-73225864',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_658a628860d371_11184351',
  'variables' => 
  array (
    'event_mrs' => 0,
    'id' => 0,
    'clist' => 0,
    'msg' => 0,
    'idate' => 0,
    '_url' => 0,
    'es' => 0,
    'e' => 0,
    'clist_detail' => 0,
    'clist_edit' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_658a628860d371_11184351')) {function content_658a628860d371_11184351($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<input type="hidden" id="event_mrs" value="<?php echo $_smarty_tpl->tpl_vars['event_mrs']->value;?>
" class="form-control" />
<input type="hidden" id="idtpl" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="form-control" />

<div class="modal fade" id="addMintaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header bg-primary">
		  <h5 class="modal-title" id="exampleModalLabel">TAMBAH ITEM MR</h5>		  		  
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
				<label for="qtyModal" class="col-form-label">QTY Permintaan <span style="color: red;">*</span></label>
				<input name="qtyModal" type="number" class="form-control amount" id="qtyModal" value=0>
			</div>
			<div class="form-group">
				<label for="diperlukanModal" class="col-form-label">TANGGAL DIPERLUKAN <span style="color: red;">*</span></label>
				<input name="diperlukanModal" type="text" placeholder="dd-mm-yyyy" class="form-control tgl" id="diperlukanModal">
			</div>
			<div class="form-group">
				<label for="keteranganModal" class="col-form-label">KETERANGAN PERMINTAAN</label>
				<input name="keteranganModal" type="text" placeholder="Keterangan permintaan" class="form-control" id="keteranganModal">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" id="submitAddMintaBarang" class="btn btn-success">Add</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
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

<?php if ($_smarty_tpl->tpl_vars['event_mrs']->value=="tambah"){?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>TAMBAH UR</h3>
					<div class="alert alert-danger" id="emsg">
						<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
						<span id="emsgbody"></span>
					</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMintaModal"  name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" placeholder="Unit Kerja"/>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor"/>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div>

            </div>
        </div>
    </div>
</div>


<?php }elseif($_smarty_tpl->tpl_vars['event_mrs']->value=="detail"||$_smarty_tpl->tpl_vars['event_mrs']->value=="keluarbarang"){?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL UR</h3></div>
				<?php if ($_smarty_tpl->tpl_vars['event_mrs']->value=="keluarbarang"){?>
					<div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/list-ur-approved" class="btn btn-primary btn-sm">Back</a></div>
				<?php }else{ ?>
					<div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-mintabarang" class="btn btn-primary btn-sm">Back</a></div>	
				<?php }?>
				
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['unit_kerja'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['nomor'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['es']->value['tanggal'],'%d-%m-%Y');?>
" data-auto-close="true" disabled>
					</div>
				</div>

            </div>
        </div>
    </div>
</div>


<?php }else{ ?> 
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>EDIT UR</h3>
			
				<ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMintaModal"  name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
    	        </ul>
			</div>			
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>					
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['unit_kerja'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['nomor'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['es']->value['tanggal'],'%d-%m-%Y');?>
" data-auto-close="true" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php }?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<!-- <input type="hidden" name="kd_inventaris" id="kd_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['kd_inventaris'];?>
">-->
					<table id='table-add-mr' class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th><span style="color: red;">*</span> Keperluan</th>
							<th>Bagian</th>
							<th><span style="color: red;">*</span> Item Stock</th>
							<th><span style="color: red;">*</span> Qty Req</th>
							<th><span style="color: red;">*</span> Tanggal Diperlukan</th>
							<th>Keterangan Permintaan</th>
						</tr>
						</thead>
						<tbody>
							<?php if ($_smarty_tpl->tpl_vars['event_mrs']->value=="detail"||$_smarty_tpl->tpl_vars['event_mrs']->value=="keluarbarang"){?>
								<?php echo $_smarty_tpl->tpl_vars['clist_detail']->value;?>

							<?php }elseif($_smarty_tpl->tpl_vars['event_mrs']->value=="edit"){?>
								<?php echo $_smarty_tpl->tpl_vars['clist_edit']->value;?>

							<?php }?>
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