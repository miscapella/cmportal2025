<?php /* Smarty version Smarty-3.1.13, created on 2023-10-23 10:47:13
         compiled from "ui\theme\softhash\prog\KEBUN\edit-spnk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8595962886535dc56143166-85890080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de027e66f0b9137c2b7867bba0cdfe4e19716799' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\edit-spnk.tpl',
      1 => 1698032831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8595962886535dc56143166-85890080',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6535dc5621a327_57015277',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    'clist' => 0,
    'e' => 0,
    'nourut' => 0,
    'ds' => 0,
    'tg3' => 0,
    'r3' => 0,
    'r4' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6535dc5621a327_57015277')) {function content_6535dc5621a327_57015277($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>EDIT SURAT PERINTAH KERJA</h3>
				<div class="alert alert-danger" id="emsg" style="display: none;">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
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
				<div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPnK</label>
					<div class="col-lg-3"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_spmk'];?>
" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_smpk">Tanggal SPnK</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_spmk'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<!-- <div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-3">
						<select name="priority" id="priority" class="form-control" readonly>
							<option value="">Pilih Kepentingan</option>
							<option value="URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>selected<?php }?>>URGENT</option>
							<option value="TIDAK URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TIDAK URGENT'){?>selected<?php }?>>TIDAK URGENT</option>
						</select>
					</div>
				</div><br> -->
                <div class="form-group"><label class="col-lg-3 control-label" for="priority">Priority</label>
					<div class="col-lg-3"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" readonly>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi</label>
					<div class="col-lg-3"><input type="text" id="divisi" name="divisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['divisi'];?>
" readonly>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan</label>
					<div class="col-lg-3"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['jenis_pekerjaan'];?>
" readonly>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi Kebun</label>
					<div class="col-lg-3"><input type="text" id="lokasi" name="lokasi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi'];?>
" readonly>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
					<div class="col-lg-3"><input type="text" id="afdeling" name="afdeling" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['afdeling'];?>
" readonly>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th>Keterangan / Rincian  Spesifikasi</th>
							<th>Block</th>
							<th>Ha</th>
							<th>PKK</th>
							<th><span style="color: red;">*</span> Kontraktor 1</th>
							<th><span style="color: red;">*</span> Harga Kontraktor 1</th>
							<th>Keterangan Kontraktor 1</th>
							<th>File Kontraktor 1</th>
							<th>Kontraktor 2</th>
							<th>Harga Kontraktor 2</th>
							<th>Keterangan Kontraktor 2</th>
							<th>File Kontraktor 2</th>
							<th>Kontraktor 3</th>
							<th>Harga Kontraktor 3</th>
							<th>Keterangan Kontraktor 3</th>
							<th>File Kontraktor 3</th>
							<th><span style="color: red;">*</span> Kontraktor Pilihan</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</div>
						<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
							<tr>
								<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
								<td style="vertical-align: middle;"><input type="text" name="spesifikasi[]" class="spesifikasi" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['spesifikasi'];?>
" readonly></td>
                                <td style="vertical-align: middle;"><input type="text" name="block[]" class="block" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['block'];?>
" readonly></td>
                                <td style="vertical-align: middle;"><input type="text" name="ha[]" class="ha" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['ha'];?>
" readonly></td>
                                <td style="vertical-align: middle;"><input type="text" name="pkk[]" class="pkk" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['pkk'];?>
" readonly></td>
								<?php $_smarty_tpl->tpl_vars["nama_kontraktor1"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["nama_kontraktor2"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["nama_kontraktor3"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable('', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable('', null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['r3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r3']->key => $_smarty_tpl->tpl_vars['r3']->value){
$_smarty_tpl->tpl_vars['r3']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktor1']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_kontraktor1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktor2']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_kontraktor2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktor3']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_kontraktor3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                <?php } ?>
								<td style="vertical-align: middle; display: none;"><input type="text" name="kontraktorid[]" class="kontraktorid" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" readonly></td>
								<td style="vertical-align: middle;">
									<select name="kontraktor1[]" class="kontraktor" style="width: 200px;">
                                        <option value="">Pilih kontraktor 1</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor1']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r4']->value['nama_supplier'];?>
</option>
										<?php } ?>
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga1[]" class="harga amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga1'];?>
"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor1[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_kontraktor1'];?>
"></td>
								<td style="vertical-align: middle;"><input type="file" id="s<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_kontraktor1" name="sfile_kontraktor1[]" class="files"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_kontraktor1" name="file_kontraktor1[]" style="display: none;"></td>
								<td style="vertical-align: middle;">
									<select name="kontraktor2[]" class="kontraktor" style="width: 200px;">
										<option value="">Pilih kontraktor 2</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor2']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r4']->value['nama_supplier'];?>
</option>
										<?php } ?>
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga2[]" class="harga amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga2'];?>
" ></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor2[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_kontraktor2'];?>
"></td>
								<td style="vertical-align: middle;"><input type="file" id="s<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_kontraktor2" name="sfile_kontraktor2[]" class="files"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_kontraktor2" name="file_kontraktor2[]" style="display: none;"></td>
								<td style="vertical-align: middle;">
									<select name="kontraktor3[]" class="kontraktor"  style="width: 200px;">
										<option value="">Pilih kontraktor 3</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor3']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r4']->value['nama_supplier'];?>
</option>
										<?php } ?>
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga3[]" class="harga amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga3'];?>
"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor3[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_kontraktor3'];?>
"></td>
								<td style="vertical-align: middle;"><input type="file" id="s<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_kontraktor3" name="sfile_kontraktor3[]" class="files"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_kontraktor3" name="file_kontraktor3[]" style="display: none;"></td>
								<td style="vertical-align: middle;">
								    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan1[]" class="cekbox" value="kontraktor1" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor1']&&$_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan1[]"> Kontraktor 1</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan2[]" class="cekbox" value="kontraktor2" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor2']&&$_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan2[]"> Kontraktor 2</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan3[]" class="cekbox" value="kontraktor3" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor3']&&$_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan3[]"> Kontraktor 3</label>
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