<?php /* Smarty version Smarty-3.1.13, created on 2023-12-07 14:51:52
         compiled from "ui\theme\softhash\prog\KEBUN\detail-po.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42425843364c0a2d316b638-17791710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02336172ff4eeb955d998384b370674150b1f295' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\detail-po.tpl',
      1 => 1701935510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42425843364c0a2d316b638-17791710',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64c0a2d329bfd9_15011422',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'tg3' => 0,
    'r3' => 0,
    'nama_supplier' => 0,
    'e' => 0,
    'nourut' => 0,
    'tg1' => 0,
    'ds' => 0,
    'r1' => 0,
    'nama_item' => 0,
    'satuan' => 0,
    'jumlah_per_satuan' => 0,
    'satuan_harga' => 0,
    'harga_kecil' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64c0a2d329bfd9_15011422')) {function content_64c0a2d329bfd9_15011422($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<div class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='TIDAK URGENT'){?>blue-bg<?php }elseif($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>red-bg<?php }?>">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE ORDER</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po<?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='PENDING'){?>-pending<?php }elseif($_smarty_tpl->tpl_vars['d']->value['status']=='REJECT'){?>-reject<?php }?>/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_po">No. PO</label>
					<div class="col-lg-9"><input type="text" id="no_po" name="no_po" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_po'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_po">Tanggal PO</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <?php $_smarty_tpl->tpl_vars["nama_supplier"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r3']->key => $_smarty_tpl->tpl_vars['r3']->value){
$_smarty_tpl->tpl_vars['r3']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_supplier']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["nama_supplier"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group"><label class="col-lg-3 control-label" for="kode_supplier">Supplier</label>
					<div class="col-lg-9">
						<a href="#" class="form-control detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_supplier'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['nama_supplier']->value;?>
</a>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="prioritas">Tingkat Kepentingan</label>
					<div class="col-lg-9">
						<input type="text" id="prioritas" name="prioritas" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="lokasi_pengiriman">Lokasi Pengiriman</label>
					<div class="col-lg-9"><input type="text" id="lokasi_pengiriman" name="lokasi_pengiriman" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi_pengiriman'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="syarat_pembayaran">Syarat Pembayaran</label>
					<div class="col-lg-9"><input type="text" id="syarat_pembayaran" name="syarat_pembayaran" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['syarat_pembayaran'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="catatan">Catatan</label>
					<div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['catatan'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="total_harga">Total Harga</label>
					<div class="col-lg-9"><input type="text" id="total_harga" name="total_harga" class="form-control amount" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['total_harga'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn</label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ppn'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="total_netto">Total Netto</label>
					<div class="col-lg-9"><input type="text" id="total_netto" name="total_netto" class="form-control amount" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['total_netto'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['status'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5" disabled><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
                </div><br><br><br><br><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui"><?php if ($_smarty_tpl->tpl_vars['d']->value['status']!='REJECT'){?>Disetujui<?php }else{ ?>Ditolak<?php }?> Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal <?php if ($_smarty_tpl->tpl_vars['d']->value['status']!='REJECT'){?>Disetujui<?php }else{ ?>Ditolak<?php }?></label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-input" style="overflow:auto;white-space:nowrap;">
                <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                <div class="form-group">
                    PURCHASE ORDER ITEM #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>

				</div><br>
                <?php $_smarty_tpl->tpl_vars["nama_item"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["satuan_harga"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["jumlah_per_satuan"] = new Smarty_variable('', null, 0);?>
				
                <?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_item']==$_smarty_tpl->tpl_vars['r1']->value['kode_item']){?>
                        <?php $_smarty_tpl->tpl_vars["nama_item"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['nama_item']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["satuan_harga"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan_harga']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["jumlah_per_satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['jumlah_per_satuan']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["harga_kecil"] = new Smarty_variable($_smarty_tpl->tpl_vars['ds']->value['harga']/$_smarty_tpl->tpl_vars['r1']->value['jumlah_per_satuan'], null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group" >
                    <label class="col-lg-2 control-label" for="nama_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_item']->value;?>
</a>			
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="qty_req">Quantity Req</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
                        <span class="amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
</span><span> <?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
</span>
                    </div>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="qty_req">Jumlah Satuan Kecil</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
                        <span class="desimal"><?php echo $_smarty_tpl->tpl_vars['jumlah_per_satuan']->value;?>
</span><span> <?php echo $_smarty_tpl->tpl_vars['satuan_harga']->value;?>
</span>
                    </div>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="harga">Harga Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga" name="harga" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga'];?>
" disabled>
				</div><br>
				
				<div class="form-group" >
					<label class="col-lg-2 control-label" for="harga_kecil">Harga Satuan Kecil</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga_kecil" name="harga_kecil" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['harga_kecil']->value;?>
" disabled>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="keterangan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
" disabled>
				</div><br>
                <hr>
                <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                <?php } ?>
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