<?php /* Smarty version Smarty-3.1.13, created on 2024-06-19 09:21:02
         compiled from "ui\theme\softhash\prog\KEBUN\add-spnk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20281829826670e3f9cf5412-74549111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5677d513dae178ed7fe83b14bc6a09746fe6c33' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-spnk.tpl',
      1 => 1718763661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20281829826670e3f9cf5412-74549111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6670e3f9cf7780_26925416',
  'variables' => 
  array (
    'msg' => 0,
    'idate' => 0,
    'opt_kontraktor' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6670e3f9cf7780_26925416')) {function content_6670e3f9cf7780_26925416($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH SURAT PERINTAH KERJA</h3>
				<div class="alert alert-danger" id="emsg">
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
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal SPnK</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="kontraktor">Kontraktor <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="kontraktor" name="kontraktor">
                            <?php echo $_smarty_tpl->tpl_vars['opt_kontraktor']->value;?>

                        </select>
                    </div>
                </div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="TIDAK URGENT">TIDAK URGENT</option>
							<option value="URGENT">URGENT</option>
						</select>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn</label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="0"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="alamat">Alamat</label>
					<div class="col-lg-9"><input type="text" id="alamat" name="alamat" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="no_kontrak">No Kontrak</label>
					<div class="col-lg-9"><input type="text" id="no_kontrak" name="no_kontrak" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="catatan">Catatan</label>
					<div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control"></div>
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
							<th style="width:10%">No. SPmK</th>
							<th style="width:10%">Divisi</th>
							<th style="width:10%">Jenis Pekerjaan</th>
							<th style="width:10%">Lokasi Kebun</th>
							<th style="width:10%">Afdeling</th>
							<th style="width:10%">Spesifikasi</th>
							<th style="width:10%">Block</th>
							<th style="width:10%">Ha</th>
							<th style="width:10%">PKK</th>
						</tr>
						</thead>
						<tbody class="sys_tables">
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