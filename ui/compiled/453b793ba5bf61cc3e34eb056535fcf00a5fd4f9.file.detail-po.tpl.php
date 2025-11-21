<?php /* Smarty version Smarty-3.1.13, created on 2025-01-23 11:58:06
         compiled from "ui\theme\softhash\prog\GAS\detail-po.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77338926363d099bb782a39-62915219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '453b793ba5bf61cc3e34eb056535fcf00a5fd4f9' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\detail-po.tpl',
      1 => 1737608286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77338926363d099bb782a39-62915219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63d099bb811385_03484971',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'tg3' => 0,
    'r3' => 0,
    'nm_supplier' => 0,
    'total_netto' => 0,
    'e' => 0,
    'nourut' => 0,
    'tg1' => 0,
    'ds' => 0,
    'r1' => 0,
    'nm_item' => 0,
    'satuan' => 0,
    'jumlah_per_satuan' => 0,
    'satuan_harga' => 0,
    'ppn' => 0,
    'harga_ppn' => 0,
    'harga_kecil' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63d099bb811385_03484971')) {function content_63d099bb811385_03484971($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<div class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='MENENGAH'){?>yellow-bg<?php }elseif($_smarty_tpl->tpl_vars['d']->value['priority']=='TINGGI'){?>red-bg<?php }?>">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE ORDER</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po/" class="btn btn-success btn-sm">Back</a></div>
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
                <?php $_smarty_tpl->tpl_vars["nm_supplier"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r3']->key => $_smarty_tpl->tpl_vars['r3']->value){
$_smarty_tpl->tpl_vars['r3']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['kd_supplier']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["nm_supplier"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group"><label class="col-lg-3 control-label" for="kd_supplier">Supplier</label>
					<div class="col-lg-9">
						<!-- <input type="text" id="kd_supplier" name="kd_supplier" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['nm_supplier']->value;?>
" disabled> -->
						<a href="#" class="form-control detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_supplier'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['kd_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['nm_supplier']->value;?>
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
                <!-- <div class="form-group"><label class="col-lg-3 control-label" for="total_harga">Total Harga</label>
					<div class="col-lg-9"><input type="text" id="total_harga" name="total_harga" class="form-control amount" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['total_harga'];?>
" disabled></div>
				</div><br> -->
                <!-- <div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn</label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ppn'];?>
" disabled></div>
				</div><br> -->
				<!-- <div class="form-group"><label class="col-lg-3 control-label" for="bayar_pusat">Beli di cabang</label>
					<div class="col-lg-9"><input type="number" id="bayar_pusat" name="bayar_pusat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['bayar_pusat'];?>
" disabled></div>
				</div><br> -->
				<div class="form-group">
					<label class="col-lg-3 control-label" for="bayar_pusat">Beli di Cabang</label>
					<div class="col-lg-9">
						<input 
							type="text" 
							id="bayar_pusat" 
							name="bayar_pusat" 
							class="form-control" 
							value="<?php if ($_smarty_tpl->tpl_vars['d']->value['bayar_pusat']==1){?>Ya<?php }else{ ?>Tidak<?php }?>" 
							disabled
						/>
					</div>
				</div>
				<br>
				
                <div class="form-group">
					<label class="col-lg-3 control-label" for="total_netto">Grand Total</label>
					<div class="col-lg-9">
						<input type="text" id="total_netto" name="total_netto" class="form-control" value="<?php echo number_format($_smarty_tpl->tpl_vars['total_netto']->value,0,',','.');?>
" disabled>
					</div>
				</div>
                <!-- <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
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
				</div><br> -->
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
				<?php $_smarty_tpl->tpl_vars["nm_item"] = new Smarty_variable('', null, 0);?>
				<?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable('', null, 0);?>
				<?php $_smarty_tpl->tpl_vars["satuan_harga"] = new Smarty_variable('', null, 0);?>
				<?php $_smarty_tpl->tpl_vars["jumlah_per_satuan"] = new Smarty_variable('', null, 0);?>
				
				<?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?>
						<?php $_smarty_tpl->tpl_vars["nm_item"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['nm_item']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["satuan_harga"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan_harga']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["jumlah_per_satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['jumlah_per_satuan']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["harga_kecil"] = new Smarty_variable($_smarty_tpl->tpl_vars['ds']->value['harga']/$_smarty_tpl->tpl_vars['r1']->value['jumlah_per_satuan'], null, 0);?>
						<?php $_smarty_tpl->tpl_vars["ppn"] = new Smarty_variable(array($_smarty_tpl->tpl_vars['ds']->value['ppn1'],$_smarty_tpl->tpl_vars['ds']->value['ppn2'],$_smarty_tpl->tpl_vars['ds']->value['ppn3']), null, 0);?>
						<?php $_smarty_tpl->tpl_vars["harga_ppn"] = new Smarty_variable(array($_smarty_tpl->tpl_vars['ds']->value['harga_ppn1'],$_smarty_tpl->tpl_vars['ds']->value['harga_ppn2'],$_smarty_tpl->tpl_vars['ds']->value['harga_ppn3']), null, 0);?>
					<?php }?>
				<?php } ?>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="no_pr">No PR</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['no_pr'];?>
" disabled>
				</div><br>
                <div class="form-group" >
                    <label class="col-lg-2 control-label" for="nm_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<!-- <input class="col-lg-9" type="text" id="nm_item" name="nm_item" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
" disabled> -->
					<a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
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
					<label class="col-lg-2 control-label" for="garansi">Garansi</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
						<?php if ($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan']||$_smarty_tpl->tpl_vars['ds']->value['garansi_hari']){?>
							<?php if ($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan']){?>
								<span class="garansi"><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan'];?>
 Bulan</span>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['ds']->value['garansi_hari']){?>
								<span class="garansi"><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari'];?>
 Hari</span>
							<?php }?>
						<?php }else{ ?>
							<span class="garansi">Tidak ada</span>
						<?php }?>
                    </div>
				</div><br>
                <!-- <div class="form-group" >
					<label class="col-lg-2 control-label" for="qty_req">Jumlah Satuan Kecil</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
                        <span class="desimal"><?php echo $_smarty_tpl->tpl_vars['jumlah_per_satuan']->value;?>
</span><span> <?php echo $_smarty_tpl->tpl_vars['satuan_harga']->value;?>
</span>
                    </div>
				</div><br> -->
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="harga">Harga Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga" name="harga" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga'];?>
" disabled>
				</div><br>

				<div class="form-group" >
					<label class="col-lg-2 control-label" for="ppn">Ppn</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="ppn" name="ppn" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ppn']->value[$_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']-1];?>
%" disabled>
				</div><br>

				<div class="form-group" >
					<label class="col-lg-2 control-label" for="harga_ppn">Harga Setelah Ppn</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga_ppn" name="harga_ppn" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['harga_ppn']->value[$_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']-1];?>
" disabled>
				</div><br>

				<!-- <div class="form-group" >
					<label class="col-lg-2 control-label" for="harga_kecil">Harga Satuan Kecil</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga_kecil" name="harga_kecil" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['harga_kecil']->value;?>
" disabled>
				</div><br> -->
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