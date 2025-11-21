<?php /* Smarty version Smarty-3.1.13, created on 2023-04-05 15:46:08
         compiled from "ui\theme\softhash\prog\GAS\edit-po.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213797879263ce360c217ee8-92022802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef8bbcf160c93a77b85073ca7c16d7dc641ad139' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-po.tpl',
      1 => 1680684344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213797879263ce360c217ee8-92022802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63ce360c29c903_83775995',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'idate' => 0,
    'namasupplier' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63ce360c29c903_83775995')) {function content_63ce360c29c903_83775995($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH PURCHASE ORDER</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>

                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-pending/" class="btn btn-primary btn-sm">Daftar PO</a>
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
				<div class="form-group"><label class="col-lg-3 control-label" for="no_po">NO PO</label>
					<div class="col-lg-9"><input type="text" id="no_po" name="no_po" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_po'];?>
" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PO</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="supplier">Supplier</label>
                    <div class="col-lg-9">
                        <select class="form-control" id="supplier" name="supplier">
                            <option value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_supplier'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['kd_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['namasupplier']->value;?>
</option>
							<option>Refresh</option>
                        </select>
                    </div>
                </div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="RENDAH" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='RENDAH'){?>selected<?php }?>>RENDAH</option>
							<option value="MENENGAH" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='MENENGAH'){?>selected<?php }?>>MENENGAH</option>
							<option value="TINGGI" <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TINGGI'){?>selected<?php }?>>TINGGI</option>
						</select>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn</label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ppn'];?>
"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="lokasi_pengiriman">Lokasi Pengiriman</label>
					<div class="col-lg-9"><input type="text" id="lokasi_pengiriman" name="lokasi_pengiriman" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi_pengiriman'];?>
"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="syarat_pembayaran">Syarat Pembayaran</label>
					<div class="col-lg-9"><input type="text" id="syarat_pembayaran" name="syarat_pembayaran" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['syarat_pembayaran'];?>
"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="catatan">Catatan</label>
					<div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['catatan'];?>
"></div>
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
					<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_inventaris'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th style="width:20%">No. PR</th>
							<th style="width:20%">Nama Barang</th>
							<th style="width:20%">Quantity</th>
							<th style="width:20%">Harga</th>
							<th style="width:20%">Keterangan</th>
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