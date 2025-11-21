<?php /* Smarty version Smarty-3.1.13, created on 2025-01-13 15:08:20
         compiled from "ui\theme\softhash\prog\GAS\detail-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203038932764129465d21030-08029715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '454e2b1014490c5d6dd102b48104b126c32e3dd7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\detail-pr.tpl',
      1 => 1736755698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203038932764129465d21030-08029715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64129465e3b570_98525620',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'e' => 0,
    'nourut' => 0,
    'ds' => 0,
    'tg' => 0,
    'r' => 0,
    'nm_inventaris' => 0,
    'tg1' => 0,
    'r1' => 0,
    'nm_item' => 0,
    'merk' => 0,
    'satuan' => 0,
    'tg3' => 0,
    'r3' => 0,
    'supplier1' => 0,
    'email1' => 0,
    'bidangsupplier1' => 0,
    'supplier2' => 0,
    'email2' => 0,
    'bidangsupplier2' => 0,
    'supplier3' => 0,
    'email3' => 0,
    'bidangsupplier3' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64129465e3b570_98525620')) {function content_64129465e3b570_98525620($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			    <div class="col-lg-6"><h3>DETAIL PURCHASE REQUISITION</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaan/list-pr/" class="btn btn-success btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-9"><input type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <!--<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled></div>
				</div><br>-->
                <?php if ($_smarty_tpl->tpl_vars['d']->value['posisi']=='PR1'){?>
                <div class="form-group"><label class="col-lg-3 control-label" for="pembelian">Pembelian</label>
					<div class="col-lg-9"><input type="text" id="pembelian" name="pembelian" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pembelian'];?>
" disabled></div>
				</div><br>
                <?php }?>
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['status'];?>
" disabled></div>
				</div><br>
                <!-- <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5" disabled><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br><br><br><br><br>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['ditolak_nama']!=''){?>
                <div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <?php }else{ ?>
                <div class="form-group"><label class="col-lg-3 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-5"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-5"><input type="text" id="diketahui" name="diketahui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br> -->
                <?php }?>
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
                    PURCHASE REQUISITION ITEM #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>

				</div><br>
                <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable('', null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['keperluan']=='STOCK'){?>
                    <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("STOCK", null, 0);?>
                <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['keperluan']=='PENGADAAN'){?>
                    <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("PENGADAAN", null, 0);?>
                <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['keperluan']=='PERGANTIAN'){?>
                    <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("PERGANTIAN", null, 0);?>
                <?php }else{ ?>
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['keperluan']==$_smarty_tpl->tpl_vars['r']->value['keperluan']){?>
                            <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r']->value['nm_inventaris']), null, 0);?>
                        <?php }?>
                    <?php } ?>
                <?php }?>
                <!-- <div class="form-group"><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-inventaris col-lg-9" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_inventaris']->value;?>
</a>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nm_inventaris']->value;?>
" disabled>
				</div><br> -->
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item" name="kd_item" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
" disabled>
				</div><br> -->
                <?php $_smarty_tpl->tpl_vars["nm_item"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["merk"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?>
                        <?php $_smarty_tpl->tpl_vars["nm_item"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['nm_item']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["merk"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['merk']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="nm_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<!-- <input class="col-lg-9 detail-itemstock" type="text" id="nm_item" name="nm_item" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
" disabled> -->
                    <a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
</a>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
" disabled>
				</div><br> -->
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control"><span><?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock" name="qty_stock" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_stock'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
" disabled>
				</div><hr><hr>
                <div class="form-group">PILIHAN SUPPLIER</div>
                <br />
                <?php $_smarty_tpl->tpl_vars["supplier1"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["bidangsupplier1"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["supplier2"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["bidangsupplier2"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["supplier3"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["bidangsupplier3"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r3']->key => $_smarty_tpl->tpl_vars['r3']->value){
$_smarty_tpl->tpl_vars['r3']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_supplier1']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["supplier1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["bidangsupplier1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['bidang']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["email1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['email']), null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_supplier2']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["supplier2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["bidangsupplier2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['bidang']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["email2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['email']), null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_supplier3']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["supplier3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["bidangsupplier3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['bidang']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["email3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['email']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group">
                    <div class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='1'){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='1'){?> checked <?php }?> disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 1</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_supplier1'];?>
"><?php echo $_smarty_tpl->tpl_vars['supplier1']->value;?>
</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Email</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['email1']->value;?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">File</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier1']){?>
                                <a href="uploads/GAS/PR_SUPPLIER/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
" class="col-lg-8 file-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
">Lihat File</a>
                            <?php }else{ ?>
                                <input class="col-lg-8" type="text" value="" disabled/>
                            <?php }?>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Bidang</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['bidangsupplier1']->value;?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga1'];?>
" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8"><input class="currency" type="text" value="<?php if ($_smarty_tpl->tpl_vars['ds']->value['exclude_ppn1']){?>Exclude<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ds']->value['ppn1'];?>
%<?php }?>" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga + Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga_ppn1'];?>
" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Keterangan</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier1'];?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Garansi</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php if ($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier1']==0&&$_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier1']==0){?>TIDAK ADA<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier1']==0){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier1'];?>
 Hari<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier1']==0){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier1'];?>
 Bulan<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier1'];?>
 Bulan <?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier1'];?>
 Hari<?php }?>" disabled/>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='2'){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='2'){?> checked <?php }?> disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 2</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_supplier2'];?>
"><?php echo $_smarty_tpl->tpl_vars['supplier2']->value;?>
</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Email</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['email2']->value;?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">File</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier2']){?>
                                <a href="uploads/GAS/PR_SUPPLIER/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
" class="col-lg-8 file-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
">Lihat File</a>
                            <?php }else{ ?>
                                <input class="col-lg-8" type="text" value="" disabled/>
                            <?php }?>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Bidang</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['bidangsupplier2']->value;?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga2'];?>
" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8"><input class="currency" type="text" value="<?php if ($_smarty_tpl->tpl_vars['ds']->value['exclude_ppn2']){?>Exclude<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ds']->value['ppn2'];?>
%<?php }?>" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga + Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga_ppn2'];?>
" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Keterangan</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier2'];?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Garansi</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php if ($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier2']==0&&$_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier2']==0){?>TIDAK ADA<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier2']==0){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier2'];?>
 Hari<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier2']==0){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier2'];?>
 Bulan<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier2'];?>
 Bulan <?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier2'];?>
 Hari<?php }?>" disabled/>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='3'){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='3'){?> checked <?php }?> disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 3</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_supplier3'];?>
"><?php echo $_smarty_tpl->tpl_vars['supplier3']->value;?>
</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Email</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['email3']->value;?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">File</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier3']){?>
                                <a href="uploads/GAS/PR_SUPPLIER/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
" class="col-lg-8 file-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
">Lihat File</a>
                            <?php }else{ ?>
                                <input class="col-lg-8" type="text" value="" disabled/>
                            <?php }?>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Bidang</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['bidangsupplier3']->value;?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga3'];?>
" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8"><input class="currency" type="text" value="<?php if ($_smarty_tpl->tpl_vars['ds']->value['exclude_ppn3']){?>Exclude<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ds']->value['ppn3'];?>
%<?php }?>" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga + Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga_ppn3'];?>
" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Keterangan</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier3'];?>
" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Garansi</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="<?php if ($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier3']==0&&$_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier3']==0){?>TIDAK ADA<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier3']==0){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier3'];?>
 Hari<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier3']==0){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier3'];?>
 Bulan<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_bulan_supplier3'];?>
 Bulan <?php echo $_smarty_tpl->tpl_vars['ds']->value['garansi_hari_supplier3'];?>
 Hari<?php }?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
                <br />
                <hr />
                <hr />
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