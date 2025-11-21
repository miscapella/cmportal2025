<?php /* Smarty version Smarty-3.1.13, created on 2023-09-29 09:58:55
         compiled from "ui\theme\softhash\prog\KEBUN\edit-spmk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89059083565162ef559df44-54815497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7129caaa24327c240e0dd2a9e8eeae227d86c476' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\edit-spmk.tpl',
      1 => 1695956290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89059083565162ef559df44-54815497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65162ef5e6d406_98286564',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    'idate' => 0,
    'clist' => 0,
    'e' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65162ef5e6d406_98286564')) {function content_65162ef5e6d406_98286564($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>EDIT SURAT PERMINTAAN KERJA</h3>
				<div class="alert alert-danger" id="emsg" style="display: none;">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
					<li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Servis</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
				 </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPmK</label>
					<div class="col-lg-3"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_spmk'];?>
" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_smpk">Tanggal SPmK</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-3">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>selected<?php }?>>URGENT</option>
							<option value="TIDAK URGENT" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TIDAK URGENT'){?>selected<?php }?>>TIDAK URGENT</option>
						</select>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi</label>
					<div class="col-lg-3"><input type="text" id="divisi" name="divisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['divisi'];?>
">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan</label>
					<div class="col-lg-3"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['jenis_pekerjaan'];?>
">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi Kebun</label>
					<div class="col-lg-3"><input type="text" id="lokasi" name="lokasi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi'];?>
">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
					<div class="col-lg-3"><input type="text" id="afdeling" name="afdeling" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['afdeling'];?>
">
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
							<th style="width:58%">Keterangan / Rincian Spesifikasi</th>
                            <th>Block</th>
                            <th>Ha</th>
                            <th>PKK</th>
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
								<td><input type="text" name="spesifikasi[]" class="spesifikasi" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['spesifikasi'];?>
"></td>
								<td><input type="text" name="block[]" class="block" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['block'];?>
"></td>
								<td><input type="text" name="ha[]" class="ha" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['ha'];?>
"></td>
								<td><input type="text" name="pkk[]" class="pkk" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['pkk'];?>
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
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>