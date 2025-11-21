<?php /* Smarty version Smarty-3.1.13, created on 2023-04-06 09:24:59
         compiled from "ui\theme\softhash\prog\GAS\detail-po-aprv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85545837463d2440deb9078-66171804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37c63d0660fb1dc614b4066b6876139f2731a28a' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\detail-po-aprv.tpl',
      1 => 1680747897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85545837463d2440deb9078-66171804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63d2440e03e5c9_87781534',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'tg3' => 0,
    'r3' => 0,
    'nm_supplier' => 0,
    'e' => 0,
    'nourut' => 0,
    'tg1' => 0,
    'ds' => 0,
    'r1' => 0,
    'nm_item' => 0,
    'satuan' => 0,
    'jumlah_per_satuan' => 0,
    'satuan_harga' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63d2440e03e5c9_87781534')) {function content_63d2440e03e5c9_87781534($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
pembelian/list-po-aprv/" class="btn btn-success btn-sm">Back</a></div>
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
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['kd_supplier']==$_smarty_tpl->tpl_vars['r3']->value['kd_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["nm_supplier"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nm_supplier']), null, 0);?>
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
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['status'];?>
" disabled></div>
				</div><br>
                
                
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
                
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
                </div><br><br><br><br><br>
                <?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
                <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
					    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-po-approve/" class="btn btn-primary btn-xs" id="approve">APPROVE</a>
					    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-po-reject/" class="btn btn-danger btn-xs" id="reject">REJECT</a>
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
                    <?php }?>
                <?php } ?>
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
					<label class="col-lg-2 control-label" for="qty_req">Jumlah per Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
                        <span class="desimal"><?php echo $_smarty_tpl->tpl_vars['jumlah_per_satuan']->value;?>
</span><span> / <?php echo $_smarty_tpl->tpl_vars['satuan_harga']->value;?>
</span>
                    </div>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="harga">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga" name="harga" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga'];?>
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