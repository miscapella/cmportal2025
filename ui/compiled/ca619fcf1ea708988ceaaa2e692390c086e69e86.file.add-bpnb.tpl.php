<?php /* Smarty version Smarty-3.1.13, created on 2024-03-12 16:16:54
         compiled from "ui\theme\softhash\prog\KEBUN\add-bpnb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47517779364c0ab342f6c01-75618274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca619fcf1ea708988ceaaa2e692390c086e69e86' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-bpnb.tpl',
      1 => 1710235011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47517779364c0ab342f6c01-75618274',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64c0ab34368550_18085411',
  'variables' => 
  array (
    'msg' => 0,
    'idate' => 0,
    'opt_spbi' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64c0ab34368550_18085411')) {function content_64c0ab34368550_18085411($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH BUKTI PENERIMAAN BARANG</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-primary btn-sm" name="save" id="save">Terima</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_bpnb">Tanggal BPnB</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="spbi">No. SPBI <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="spbi" name="spbi">
                            <?php echo $_smarty_tpl->tpl_vars['opt_spbi']->value;?>

                        </select>
                    </div>
                </div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="nama_supplier">Supplier</label>
					<div class="col-lg-9"><input type="text" id="nama_supplier" name="nama_supplier" class="form-control" disabled></div>
				</div><br><br>
				<div class="form-group">
					<label class="col-lg-3 control-label" for="file_bpnb">Bukti Penerimaan<span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="file" id="file_bpnb" name="file_bpnb" class="files">
						<input type="text" id="sfile_bpnb" name="sfile_bpnb" style="display: none;">
					</div>
				</div>
				<br><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Keterangan BPnB</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"></textarea>
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
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">NO</th>
							<th style="width:20%">NOMOR PO</th>
                            <th style="width:20%">NOMOR PR</th>
							<th style="width:20%">NAMA BARANG</th>
							<th style="width:20%">Quantity</th>
                            <th style="width:20%">Satuan</th>
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