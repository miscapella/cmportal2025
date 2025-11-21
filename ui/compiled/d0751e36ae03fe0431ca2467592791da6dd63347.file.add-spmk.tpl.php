<?php /* Smarty version Smarty-3.1.13, created on 2024-04-17 08:39:33
         compiled from "ui\theme\softhash\prog\KEBUN\add-spmk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41792327865090144aa5147-48768855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0751e36ae03fe0431ca2467592791da6dd63347' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-spmk.tpl',
      1 => 1713317972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41792327865090144aa5147-48768855',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65090144adbca2_26755066',
  'variables' => 
  array (
    'msg' => 0,
    'idate' => 0,
    'divisi' => 0,
    'jenis_pekerjaan' => 0,
    'lokasi' => 0,
    'afdeling' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65090144adbca2_26755066')) {function content_65090144adbca2_26755066($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH SURAT PERMINTAAN KERJA</h3>
				<div class="alert alert-danger" id="emsg">
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
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spmk">Tanggal SPmK</label>
					<div class="col-lg-9"><input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span></label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="URGENT">URGENT</option>
							<option value="TIDAK URGENT">TIDAK URGENT</option>
						</select>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="divisi" name="divisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['divisi']->value;?>
">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['jenis_pekerjaan']->value;?>
">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi Kebun <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="lokasi" name="lokasi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['lokasi']->value;?>
">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="afdeling" name="afdeling" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['afdeling']->value;?>
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
							<th style="width:58%">Keterangan / Rincian Spesifikasi <span style="color: red;">*</span></th>
                            <th>Block <span style="color: red;">*</span></th>
                            <th>Ha <span style="color: red;">*</span></th>
                            <th>PKK <span style="color: red;">*</span></th>
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