<?php /* Smarty version Smarty-3.1.13, created on 2024-06-13 14:14:25
         compiled from "ui\theme\softhash\prog\KEBUN\add-spmk-kontraktor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:430159568652f589c0465b5-72412291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b32c4e2fd020965efcd0cb0d38ccbc42fde4c7c8' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-spmk-kontraktor.tpl',
      1 => 1718253140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '430159568652f589c0465b5-72412291',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_652f589c15c845_85690226',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'idate' => 0,
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
<?php if ($_valid && !is_callable('content_652f589c15c845_85690226')) {function content_652f589c15c845_85690226($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DETAIL SURAT PERMINTAAN KERJA</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-<?php echo strtolower($_smarty_tpl->tpl_vars['d']->value['posisi']);?>
-<?php echo strtolower($_smarty_tpl->tpl_vars['d']->value['status']);?>
/" class="btn btn-primary btn-sm">Daftar SPmK</a>
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
            <div class="ibox-content" id="ibox_form">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPmK</label>
					<div class="col-lg-9"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_spmk'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spmk">Tanggal SPmK</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi</label>
					<div class="col-lg-9"><input type="text" id="divisi" name="divisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['divisi'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan</label>
					<div class="col-lg-9"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['jenis_pekerjaan'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi</label>
					<div class="col-lg-9"><input type="text" id="lokasi" name="lokasi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
					<div class="col-lg-9"><input type="text" id="afdeling" name="afdeling" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['afdeling'];?>
" disabled></div>
				</div><br>
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
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor1']==$_smarty_tpl->tpl_vars['r3']->value['kode_kontraktor']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_kontraktor1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_kontraktor']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor2']==$_smarty_tpl->tpl_vars['r3']->value['kode_kontraktor']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_kontraktor2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_kontraktor']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor3']==$_smarty_tpl->tpl_vars['r3']->value['kode_kontraktor']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_kontraktor3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_kontraktor']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                <?php } ?>
								<td style="vertical-align: middle; display: none;"><input type="text" name="kontraktorid[]" class="kontraktorid" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" readonly></td>
								<td style="vertical-align: middle;">
									<select name="kode_kontraktor1[]" class="kode_kontraktor" style="width: 200px;">
                                        <option value="">Pilih kontraktor 1</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor1']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
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
									<select name="kode_kontraktor2[]" class="kode_kontraktor" style="width: 200px;">
										<option value="">Pilih kontraktor 2</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor2']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
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
									<select name="kode_kontraktor3[]" class="kode_kontraktor"  style="width: 200px;">
										<option value="">Pilih kontraktor 3</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor3']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
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
kontraktorpilihan1[]" class="cekbox" value="kontraktor1" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor1']&&$_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan1[]"> Kontraktor 1</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan2[]" class="cekbox" value="kontraktor2" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor2']&&$_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan2[]"> Kontraktor 2</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan3[]" class="cekbox" value="kontraktor3" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_kontraktor3']&&$_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
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