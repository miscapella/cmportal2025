<?php /* Smarty version Smarty-3.1.13, created on 2024-02-05 08:39:16
         compiled from "ui\theme\softhash\prog\GAS\edit-pr-supplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76163960763f6ddf91b3384-09662658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cae3f880eddf01e88193c6e0902673141a4d2bc3' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-pr-supplier.tpl',
      1 => 1702011295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76163960763f6ddf91b3384-09662658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63f6ddf9270f89_59791025',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'idate' => 0,
    'clist' => 0,
    'e' => 0,
    'nourut' => 0,
    'ds' => 0,
    'tg2' => 0,
    'r2' => 0,
    'nama_line' => 0,
    'tg1' => 0,
    'r1' => 0,
    'nama_item' => 0,
    'tg3' => 0,
    'r3' => 0,
    'tg4' => 0,
    'r4' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63f6ddf9270f89_59791025')) {function content_63f6ddf9270f89_59791025($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DETAIL PURCHASE REQUISITION</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr1-pending/" class="btn btn-primary btn-sm">Daftar PR</a>
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
            <div class="ibox-content" id="ibox_form">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-9"><input type="text" id="no_pr" name="no_pr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_pr'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group" style="margin-bottom:40px"><label class="col-lg-3 control-label" for="pembelian">Jenis Pembelian <span style="color: red;">*</span> </label>
					<div class="col-lg-9">
						<select class="form-control" id="pembelian" name="pembelian">
							<option value="">Pilih Pembelian</option>
                            <option value="bukan lokal" <?php if ($_smarty_tpl->tpl_vars['d']->value['pembelian']=='bukan lokal'){?>selected<?php }?>>Bukan Lokal</option>
							<option value="lokal" <?php if ($_smarty_tpl->tpl_vars['d']->value['pembelian']=='lokal'){?>selected<?php }?>>Lokal</option>
                        </select>
					</div>
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
							<th style="width:2%">#</th>
							<th>Keperluan</th>
							<th>Bagian</th>
							<th>Item Stock</th>
							<th>Qty Req</th>
							<th>Tgl Diperlukan</th>
							<th>Keterangan Pembelian</th>
							<th><span style="color: red;">*</span> Supplier 1</th>
							<th><span style="color: red;">*</span> Harga Supplier 1</th>
							<th>Keterangan Supplier 1</th>
							<th>File Supplier 1</th>
							<th>Supplier 2</th>
							<th>Harga Supplier 2</th>
							<th>Keterangan Supplier 2</th>
							<th>File Supplier 2</th>
							<th>Supplier 3</th>
							<th>Harga Supplier 3</th>
							<th>Keterangan Supplier 3</th>
							<th>File Supplier 3</th>
							<th><span style="color: red;">*</span> Supplier Pilihan</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</div>
						<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
							<tr>
								<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
								<td style="vertical-align: middle;"><input type="text" name="keperluan[]" class="keperluan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" readonly></td>
								<td style="display: none;"><input type="text" name="kode_item[]" class="kode_item" readonly value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
"></td>
								<?php $_smarty_tpl->tpl_vars["nama_line"] = new Smarty_variable('', null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['r2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r2']->key => $_smarty_tpl->tpl_vars['r2']->value){
$_smarty_tpl->tpl_vars['r2']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['line']==$_smarty_tpl->tpl_vars['r2']->value['kode_kategori']){?>
										<?php $_smarty_tpl->tpl_vars["nama_line"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r2']->value['nama_kategori']), null, 0);?>
									<?php }?>
								<?php } ?>
								<?php if ($_smarty_tpl->tpl_vars['nama_line']->value==''){?>
									<?php $_smarty_tpl->tpl_vars["nama_line"] = new Smarty_variable("STOCK", null, 0);?>
								<?php }?>
								<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['bagian'];?>
"></td>
								<td style="display:none;"><input type="text" name="main[]" class="main" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['main'];?>
"></td>
								<td style="display:none;"><input type="text" name="sub[]" class="sub" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['sub'];?>
"></td>
								<td style="display:none;"><input type="text" name="line[]" class="line" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
"></td>
								<td style="vertical-align: middle;"><a href="#" class="detail-bagian" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_line']->value;?>
</a></td>
								<td style="display:none;"><input type="text" name="item[]" class="item" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
" readonly></td>
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
								<td style="vertical-align: middle;"><a href="#" class="detail-itemstock" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_item']->value;?>
</a></td>
								<td style="vertical-align: middle;"><input type="text" name="qty[]" class="qty amount" value=<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
></td>
								<td style="vertical-align: middle;"><input type="text" name="diperlukan[]" class="diperlukan tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value=<?php if ($_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']!=''){?><?php echo date('d-m-Y',strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan']));?>
<?php }else{ ?>""<?php }?>></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan'];?>
"></td>
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
                                        <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_supplier2']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_supplier2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['kode_supplier3']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?>
                                        <?php $_smarty_tpl->tpl_vars["nama_supplier3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['contact']), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_bayar']), null, 0);?>
                                    <?php }?>
                                <?php } ?>
								<td style="vertical-align: middle;">
									<select name="kode_supplier1[]" class="kode_supplier" style="width: 200px;">
                                        <option value="">Pilih Supplier 1</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_item']==$_smarty_tpl->tpl_vars['ds']->value['kode_item']){?>
									            <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier1']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r4']->value['nama_supplier'];?>
</option>
									        <?php }?>
										<?php } ?>
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga1[]" class="harga amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga1'];?>
"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier1[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier1'];?>
"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_supplier1" name="sfile_supplier1[]" class="files">
									<input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_supplier1" name="file_supplier1[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
" style="display: none;">
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier1']!=''){?>
										<a href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier1'];?>
</a>
									<?php }else{ ?>
										<a>Tidak ada file</a>
									<?php }?>
								</td>
								<td style="vertical-align: middle;">
									<select name="kode_supplier2[]" class="kode_supplier" style="width: 200px;">
										<option value="">Pilih Supplier 2</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_item']==$_smarty_tpl->tpl_vars['ds']->value['kode_item']){?>
									            <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier2']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r4']->value['nama_supplier'];?>
</option>
									        <?php }?>
										<?php } ?>
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga2[]" class="harga amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga2'];?>
" ></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier2[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier2'];?>
"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_supplier2" name="sfile_supplier2[]" class="files">
									<input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_supplier2" name="file_supplier2[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
" style="display: none;">
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier2']!=''){?>
										<a href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier2'];?>
</a>
									<?php }else{ ?>
										<a>Tidak ada file</a>
									<?php }?>
								</td>
								<td style="vertical-align: middle;">
									<select name="kode_supplier3[]" class="kode_supplier"  style="width: 200px;">
										<option value="">Pilih Supplier 3</option>
									    <?php  $_smarty_tpl->tpl_vars['r4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r4']->key => $_smarty_tpl->tpl_vars['r4']->value){
$_smarty_tpl->tpl_vars['r4']->_loop = true;
?>
									        <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_item']==$_smarty_tpl->tpl_vars['ds']->value['kode_item']){?>
									            <option value="<?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
" <?php if ($_smarty_tpl->tpl_vars['r4']->value['kode_supplier']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier3']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r4']->value['kode_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r4']->value['nama_supplier'];?>
</option>
									        <?php }?>
										<?php } ?>
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga3[]" class="harga amount" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga3'];?>
"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier3[]" class="keterangan" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_supplier3'];?>
"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_supplier3" name="sfile_supplier3[]" class="files">
									<input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
file_supplier3" name="file_supplier3[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
" style="display: none;">
									<?php if ($_smarty_tpl->tpl_vars['ds']->value['file_supplier3']!=''){?>
										<a href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_supplier3'];?>
</a>
									<?php }else{ ?>
										<a>Tidak ada file</a>
									<?php }?>
								</td>
								<td style="vertical-align: middle;">
								    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan1[]" class="cekbox" value="supplier1" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier1']&&$_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan1[]"> Supplier 1</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan2[]" class="cekbox" value="supplier2" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier2']&&$_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan2[]"> Supplier 2</label><br>
									<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan[]" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan3[]" class="cekbox" value="supplier3" <?php if ($_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kode_supplier3']&&$_smarty_tpl->tpl_vars['ds']->value['supplierpilihan']!=''){?> checked <?php }?>> <label style="font-weight: normal" for="<?php echo $_smarty_tpl->tpl_vars['ds']->value["keperluan"];?>
<?php echo $_smarty_tpl->tpl_vars['ds']->value["kode_item"];?>
supplierpilihan3[]"> Supplier 3</label>
								</td>
							</tr>
				        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
						<?php } ?>
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