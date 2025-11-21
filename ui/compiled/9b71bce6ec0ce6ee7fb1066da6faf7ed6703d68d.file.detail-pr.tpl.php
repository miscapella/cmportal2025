<?php /* Smarty version Smarty-3.1.13, created on 2023-12-26 08:52:03
         compiled from "ui\theme\softhash\prog\KEBUN\detail-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32119410564bfba77837db0-47177852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b71bce6ec0ce6ee7fb1066da6faf7ed6703d68d' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\detail-pr.tpl',
      1 => 1703555522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32119410564bfba77837db0-47177852',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bfba77969e69_34666491',
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
    'nama_bagian' => 0,
    'tg1' => 0,
    'r1' => 0,
    'nama_item' => 0,
    'satuan' => 0,
    'tglSplit' => 0,
    'tg3' => 0,
    'r3' => 0,
    'nama_supplier1' => 0,
    'contact1' => 0,
    'lama_bayar1' => 0,
    'nama_supplier2' => 0,
    'contact2' => 0,
    'lama_bayar2' => 0,
    'nama_supplier3' => 0,
    'contact3' => 0,
    'lama_bayar3' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bfba77969e69_34666491')) {function content_64bfba77969e69_34666491($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<div class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>red-bg<?php }else{ ?>blue-bg<?php }?>">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE REQUISITION</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-<?php echo strtolower($_smarty_tpl->tpl_vars['d']->value['posisi']);?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='REVISI'){?>-pending<?php }elseif($_smarty_tpl->tpl_vars['d']->value['status']=='CANCEL'){?><?php }else{ ?>-<?php echo strtolower($_smarty_tpl->tpl_vars['d']->value['status']);?>
<?php }?>/" class="btn btn-primary btn-sm">Back</a></div>
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
                <div class="form-group"><label class="col-lg-3 control-label" for="no_pr_fisik">No. PR Fisik</label>
					<div class="col-lg-9"><input type="text" id="no_pr_fisik" name="no_pr_fisik" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr_fisik'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled></div>
				</div><br>
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
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5" disabled><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br><br><br><br><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="dibuat">Dibuat Oleh</label>
					<div class="col-lg-9"><input type="text" id="dibuat" name="dibuat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['dibuat_nama'];?>
" disabled></div>
				</div><br>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='REJECT'){?>
                <div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <?php }elseif($_smarty_tpl->tpl_vars['d']->value['posisi']=='PR1'){?>
                <div class="form-group"><label class="col-lg-3 control-label" for="sup_disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="sup_disetujui" name="sup_disetujui" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['sup_disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['sup_disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglsup_disetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tglsup_disetujui" name="tglsup_disetujui" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['sup_disetujui_tgl'];?>
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
				</div><br>
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
                <?php $_smarty_tpl->tpl_vars["nama_bagian"] = new Smarty_variable('', null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['line']=='STOCK'){?>
                    <?php $_smarty_tpl->tpl_vars["nama_bagian"] = new Smarty_variable("STOCK", null, 0);?>
                <?php }else{ ?>
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['line']==$_smarty_tpl->tpl_vars['r']->value['kode_kategori']){?>
                            <?php $_smarty_tpl->tpl_vars["nama_bagian"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r']->value['nama_kategori']), null, 0);?>
                        <?php }?>
                    <?php } ?>
                <?php }?>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" disabled>
				</div><br>
                <div class="form-group"><label class="col-lg-2 control-label" for="line">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-bagian col-lg-9" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_bagian']->value;?>
</a>
				</div><br>
                <?php $_smarty_tpl->tpl_vars["nama_item"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r1']->key => $_smarty_tpl->tpl_vars['r1']->value){
$_smarty_tpl->tpl_vars['r1']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_item']==$_smarty_tpl->tpl_vars['r1']->value['kode_item']){?>
                        <?php $_smarty_tpl->tpl_vars["nama_item"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r1']->value['nama_item']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group" ><label class="col-lg-2 control-label" for="nama_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="col-lg-9 detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_item']->value;?>
</a>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control"><span class="amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
</div>
				</div><br>
                <?php $_smarty_tpl->tpl_vars['tglSplit'] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']), null, 0);?>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" value="<?php echo $_smarty_tpl->tpl_vars['tglSplit']->value[2];?>
-<?php echo $_smarty_tpl->tpl_vars['tglSplit']->value[1];?>
-<?php echo $_smarty_tpl->tpl_vars['tglSplit']->value[0];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
" disabled>
				</div><hr><hr>
                <?php if ($_smarty_tpl->tpl_vars['d']->value['posisi']=='PR1'){?>
                <div class="form-group">
                    PILIHAN SUPPLIER
				</div><br>
                <?php $_smarty_tpl->tpl_vars["nama_supplier1"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["nama_supplier2"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["nama_supplier3"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable('', null, 0);?>
                <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable('', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['r3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r3']->key => $_smarty_tpl->tpl_vars['r3']->value){
$_smarty_tpl->tpl_vars['r3']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_supplier1']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["nama_supplier1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_contact']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_pembayaran']), null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_supplier2']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["nama_supplier2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_contact']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_pembayaran']), null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_supplier3']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                        <?php $_smarty_tpl->tpl_vars["nama_supplier3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_contact']), null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_pembayaran']), null, 0);?>
                    <?php }?>
                <?php } ?>
                <div class="form-group">
                    <div class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier1']){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec;">
                        <div class="row">
                            <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan[]" class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier1']){?> checked <?php }?> value="supplier1" disabled>
                            
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="supplier1">Supplier 1</label><span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier1'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier1'];?>
</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="nama_supplier1">Nama</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="nama_supplier1" name="nama_supplier1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nama_supplier1']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="contact1">Contact</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="contact1" name="contact1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['contact1']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="lama_bayar1">Lama Bayar</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="lama_bayar1" name="lama_bayar1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['lama_bayar1']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="harga1">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga1" name="harga1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga1'];?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="keterangan_supplier1">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" id="keterangan_supplier1" name="keterangan_supplier1" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier1'];?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="file_supplier1">File</label><span class="col-lg-1" style="text-align: right">:</span><div class="col-lg-8">
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier1']!=''){?>
                            <a href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
</a>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier2']){?> supplierpilihan <?php }?>" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan[]" class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier2']){?> checked <?php }?> value="supplier2" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="supplier2">Supplier 2</label><span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier2'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier2'];?>
</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="nama_supplier2">Nama</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="nama_supplier2" name="nama_supplier2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nama_supplier2']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="contact2">Contact</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="contact2" name="contact2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['contact2']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="lama_bayar2">Lama Bayar</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="lama_bayar2" name="lama_bayar2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['lama_bayar2']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="harga2">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga2" name="harga2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga2'];?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="keterangan_supplier2">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" id="keterangan_supplier2" name="keterangan_supplier2" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier2'];?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="file_supplier2">File</label><span class="col-lg-1" style="text-align: right">:</span><div class="col-lg-8">
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier2']!=''){?>
                            <a href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
</a>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier3']){?> supplierpilihan <?php }?>">
                        <div class="row">
                            <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan[]" class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier3']){?> checked <?php }?> value="supplier3" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="supplier3">Supplier 3</label><span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier3'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_supplier3'];?>
</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="nama_supplier3">Nama</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="nama_supplier3" name="nama_supplier3" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nama_supplier3']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="contact3">Contact</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="contact3" name="contact3" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['contact3']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="lama_bayar3">Lama Bayar</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="lama_bayar3" name="lama_bayar3" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['lama_bayar3']->value;?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="harga3">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga3" name="harga3" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga3'];?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="keterangan_supplier3">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" id="keterangan_supplier3" name="keterangan_supplier3" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier3'];?>
" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="file_supplier3">File</label><span class="col-lg-1" style="text-align: right">:</span><div class="col-lg-8">
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier3']!=''){?>
                            <a href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
</a>
                            <?php }?>
                            </div>
                        </div>
                    </div>
				</div>
                <div class="row"></div><br>
                <hr><hr>
                <?php }?>
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