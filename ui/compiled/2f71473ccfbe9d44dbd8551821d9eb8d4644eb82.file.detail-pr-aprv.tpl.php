<?php /* Smarty version Smarty-3.1.13, created on 2025-01-23 10:48:00
         compiled from "ui\theme\softhash\prog\GAS\detail-pr-aprv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1032606530640ede09c135a7-75388726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f71473ccfbe9d44dbd8551821d9eb8d4644eb82' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\detail-pr-aprv.tpl',
      1 => 1737604079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1032606530640ede09c135a7-75388726',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_640ede09ce01f0_44946943',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'e' => 0,
    'nourut' => 0,
    'ds' => 0,
    'tg1' => 0,
    'r1' => 0,
    'kategori' => 0,
    'nm_item' => 0,
    'merk' => 0,
    'satuan' => 0,
    'tg3' => 0,
    'r3' => 0,
    'user' => 0,
    'supplier1' => 0,
    'bidangsupplier1' => 0,
    'supplier2' => 0,
    'bidangsupplier2' => 0,
    'supplier3' => 0,
    'bidangsupplier3' => 0,
    'n' => 0,
    'idates' => 0,
    'tg' => 0,
    'r' => 0,
    'nm_inventaris' => 0,
    'f' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_640ede09ce01f0_44946943')) {function content_640ede09ce01f0_44946943($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <div>
                    <div class="alert alert-danger" id="emsg">
                        <a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
                        <span id="emsgbody"></span>
                    </div>
                </div>
			    <div class="col-lg-6"><h3>DETAIL PURCHASE REQUISITION</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
persetujuan/persetujuan-pr/" class="btn btn-success btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['d']->value['status']!='REVISI'){?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-9"><input type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Total Harga</label>
					<div class="col-lg-9"><input type="text" class="form-control" id="total_harga" value="Rp <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['total_harga'],0,'','.');?>
" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Total Harga PPN</label>
					<div class="col-lg-9"><input type="text" class="form-control" id="total_harga_netto" value="Rp <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['total_harga_netto'],0,'','.');?>
" disabled>
					</div>
				</div><br>
				<!--<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled></div>
				</div><br> -->
                <!-- <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br><br><br><br><br>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-5"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-5"><input type="text" id="diketahui" name="diketahui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
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
				<?php if ($_smarty_tpl->tpl_vars['d']->value['ditolak_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
               <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
					    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-pr-approve/" class="btn btn-primary btn-xs" id="approve">APPROVE</a>
					    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-pr-reject/" class="btn btn-danger btn-xs" id="reject">REJECT</a>
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
                    PURCHASE REQUISITION ITEM #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>

				</div><br>
				<?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable('', null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['keperluan']=='STOCK'){?>
                    <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("STOCK", null, 0);?>
								<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['keperluan']=='PENGADAAN'){?>
										<?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("PENGADAAN", null, 0);?>
								<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['keperluan']=='PERGANTIAN'){?>
										<?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("PERGANTIAN", null, 0);?>
                <?php }?>
                <div class="form-group"><label class="col-lg-2 control-label" for="kd_inventaris">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<span class="detail-inventaris col-lg-9"><?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
</span>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item" name="kd_item" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
" disabled>
				</div><br> -->
                <?php $_smarty_tpl->tpl_vars["kategori"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["nm_item"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["merk"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r1']->value['kd_item']){?>
                        <?php $_smarty_tpl->tpl_vars["kategori"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['kategori']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["nm_item"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['nm_item']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["merk"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['merk']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["satuan"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['satuan']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group"><label class="col-lg-2 control-label" for="kd_inventaris">Kategori</label><span class="col-lg-1" style="text-align: right">:</span>
					<span class="detail-inventaris col-lg-9"><?php echo $_smarty_tpl->tpl_vars['kategori']->value;?>
</span>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="nm_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
</a>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
" disabled>
				</div><br> -->
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="satuan">Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="satuan" name="satuan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
" disabled>
				</div><br> -->
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control"><?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
 <?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
</div>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock" name="qty_stock" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_stock'];?>
" disabled>
				</div><br> -->
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
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
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_supplier2']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["supplier2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["bidangsupplier2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['bidang']), null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_supplier3']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["supplier3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["bidangsupplier3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['bidang']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group form-container">
                    <input type="hidden" name="cid[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                    <div class="form-group form-container-1 col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='1'){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="pilihan cekbox col-lg-12" value="1" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='1'){?> checked <?php }?> <?php if ($_smarty_tpl->tpl_vars['user']->value['kode_dept']!="GAS"){?> disabled <?php }?>>
                            <span class="col-lg-12 gif-container" style="width: 100%; text-align: center; display: none;"><img src="http://192.168.201.180/cmportal/ui/theme/softhash/img/loading-radio.gif" alt="GIF" style="width: 16px; height: 16px;"></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 1</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier"><?php echo $_smarty_tpl->tpl_vars['supplier1']->value;?>
</a>
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
                            <span class="col-lg-8"> <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['ppn1'];?>
%" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
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
                    <div class="form-group form-container-1 col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='2'){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="pilihan cekbox col-lg-12" value="2" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='2'){?> checked <?php }?> <?php if ($_smarty_tpl->tpl_vars['user']->value['kode_dept']!="GAS"){?> disabled <?php }?>>
                            <span class="col-lg-12 gif-container" style="width: 100%; text-align: center; display: none;"><img src="http://192.168.201.180/cmportal/ui/theme/softhash/img/loading-radio.gif" alt="GIF" style="width: 16px; height: 16px;"></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 2</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_supplier2'];?>
"><?php echo $_smarty_tpl->tpl_vars['supplier2']->value;?>
</a>
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
                            <span class="col-lg-8"> <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['ppn2'];?>
%" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
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
                    <div class="form-group form-container-1 col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='3'){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="pilihan cekbox col-lg-12" value="3" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']=='3'){?> checked <?php }?> <?php if ($_smarty_tpl->tpl_vars['user']->value['kode_dept']!="GAS"){?> disabled <?php }?>>
                            <span class="col-lg-12 gif-container" style="width: 100%; text-align: center; display: none;"><img src="http://192.168.201.180/cmportal/ui/theme/softhash/img/loading-radio.gif" alt="GIF" style="width: 16px; height: 16px;"></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 3</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_supplier3'];?>
"><?php echo $_smarty_tpl->tpl_vars['supplier3']->value;?>
</a>
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
                            <span class="col-lg-8"> <input class="currency" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['ppn3'];?>
%" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
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

<?php }else{ ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-4"><input type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr'];?>
" disabled></div>
					
					<label class="col-lg-2 control-label" for="no_pr_awal" style="text-align: right">No. PR Awal</label>
					<div class="col-lg-4"><input type="text" id="no_pr_awal" name="no_pr_awal" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['no_pr'];?>
" disabled></div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-4"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
					
					<label class="col-lg-2 control-label" for="tgl_awal" style="text-align: right">Tanggal PR Awal</label>
					<div class="col-lg-4"><input type="text" id="idates" name="idates" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idates']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<!-- <div class="form-group"> -->
				    <!-- <label class="col-lg-2 control-label" for="priority">Kepentingan</label>
					<div class="col-lg-4"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled></div>
					
					<label class="col-lg-2 control-label" for="priority_awal" style="text-align: right">Kepentingan Awal</label>
					<div class="col-lg-4"><input type="text" id="priority_awal" name="priority_awal" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['priority'];?>
" disabled></div> -->
				<!-- </div><br> -->
                <div class="form-group" style="margin-bottom:40px">
				    <label class="col-lg-2 control-label" for="ket_revisi">Keterangan Revisi</label>
					<div class="col-lg-4"><textarea type="text" id="ket_revisi" name="ket_revisi" class="form-control" rows="5" disabled><?php echo $_smarty_tpl->tpl_vars['d']->value['keterangan_revisi'];?>
</textarea></div>
					<label class="col-lg-2 control-label" for="pesan_awal" style="text-align: right">Pesan Awal</label>
					<div class="col-lg-4"><textarea type="text" id="pesan_awal" name="pesan_awal" class="form-control" rows="5" disabled><?php echo $_smarty_tpl->tpl_vars['n']->value['pesan'];?>
</textarea></div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
                <div class="form-group"><label class="col-lg-2 control-label" for="pesan">Pesan</label>
					<div class="col-lg-10"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br><br><br><br><br>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?>
				<div class="form-group"><label class="col-lg-2 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-6"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?>
				<div class="form-group"><label class="col-lg-2 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-6"><input type="text" id="diketahui" name="diketahui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?>
				<div class="form-group"><label class="col-lg-2 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-6"><input type="text" id="disetujui" name="disetujui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['ditolak_nama']!=''){?>
				<div class="form-group"><label class="col-lg-2 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-6"><input type="text" id="ditolak" name="ditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
               <div class="form-group"><label class="col-lg-2 control-label">Approval</label>
					<div class="col-lg-10" style="margin-top: 5px;">
					    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-pr-approve/" class="btn btn-primary btn-xs" id="approve">APPROVE</a>
					    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-pr-reject/" class="btn btn-danger btn-xs" id="reject">REJECT</a>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-input" style="overflow:auto;white-space:nowrap;">
                <h2>PURCHASE REQUISITION</h2>
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
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']=='STOCK'){?>
                    <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("STOCK", null, 0);?>
                <?php }else{ ?>
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']==$_smarty_tpl->tpl_vars['r']->value['kd_inventaris']){?>
                            <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r']->value['nm_inventaris']), null, 0);?>
                        <?php }?>
                    <?php } ?>
                <?php }?>
                <div class="form-group"><label class="col-lg-2 control-label" for="kd_inventaris">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="detail-inventaris col-lg-9" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_inventaris'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_inventaris']->value;?>
</a>
				</div><br>
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="nm_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
</a>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="satuan">Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="satuan" name="satuan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
" disabled>
				</div><br> -->
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock" name="qty_stock" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_stock'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
" disabled>
				</div><br>
                <hr>
                <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                <?php } ?>
			</div>
		</div>
	</div>
	<div class="col-md-6">
        <div class="panel panel-default">
            <div class="bg-danger panel-body detail-pr-input detail-pr-input-danger" style="overflow:auto;white-space:nowrap;">
                <h2>PURCHASE REQUISITION AWAL</h2>
                <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                <div class="form-group">
                    PURCHASE REQUISITION ITEM #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>

				</div><br>
				<?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable('', null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']=='STOCK'){?>
                    <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable("STOCK", null, 0);?>
                <?php }else{ ?>
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_inventaris']==$_smarty_tpl->tpl_vars['r']->value['kd_inventaris']){?>
                            <?php $_smarty_tpl->tpl_vars["nm_inventaris"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r']->value['nm_inventaris']), null, 0);?>
                        <?php }?>
                    <?php } ?>
                <?php }?>
                <div class="form-group"><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="detail-inventaris col-lg-9" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_inventaris'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_inventaris']->value;?>
</a>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item1">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item1" name="kd_item1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="nm_item1">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
</a>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="merk1">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk1" name="merk1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="satuan1">Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="satuan1" name="satuan1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
" disabled>
				</div><br> -->
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req1">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_req1" name="qty_req1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock1">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock1" name="qty_stock1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_stock'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan1">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan1" name="tgl_diperlukan1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan1">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan1" name="keperluan1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
" disabled>
				</div><br>
                <hr>
                <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                <?php } ?>
			</div>
		</div>
	</div>
</div>

<?php }?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-5"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-5"><input type="text" id="diketahui" name="diketahui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
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
				<?php if ($_smarty_tpl->tpl_vars['d']->value['ditolak_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br><br><br><br><br>
                <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
					    <button class="submitbtn btn btn-primary btn-xs" id="approve">APPROVE</button>
					    <button class="submitbtn btn btn-danger btn-xs" id="reject">REJECT</button>
					</div>
				</div><br>
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