<?php /* Smarty version Smarty-3.1.13, created on 2024-09-11 16:30:40
         compiled from "ui\theme\softhash\prog\GAS\penerimaan-ur1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127225324166dfbfab647838-59867595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a2b963c7fcad74c48bee94c5a917aeff012d3da' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\penerimaan-ur1.tpl',
      1 => 1726046209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127225324166dfbfab647838-59867595',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66dfbfab704e88_60526184',
  'variables' => 
  array (
    'msg' => 0,
    'cid' => 0,
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
    'satuan' => 0,
    'tglSplit' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66dfbfab704e88_60526184')) {function content_66dfbfab704e88_60526184($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<input type="hidden" id="idtpl" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" class="form-control" />

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>red-bg<?php }else{ ?>blue-bg<?php }?>">
			    <div class="col-lg-6"><h3>DETAIL USER REQUEST</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
persetujuan/penerimaan-ur/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_mintabarang">No. UR</label>
					<div class="col-lg-9"><input type="text" id="no_mintabarang" name="no_mintabarang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_mintabarang'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal UR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div>
				<div class="form-group"><label class="col-lg-3 control-label" for="dibuat_nama">Dibuat Oleh</label>
					<div class="col-lg-9"><input type="text" id="dibuat_nama" name="dibuat_nama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['dibuat_nama'];?>
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
            <div class="panel-body detail-pr-input" style="overflow:auto;white-space:nowrap;">
                <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                <div class="form-group">
                    USER REQUEST ITEM #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>

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
                <!-- <div class="form-group"><label class="col-lg-2 control-label" for="line">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-bagian col-lg-9" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
"><?php echo $_smarty_tpl->tpl_vars['nama_bagian']->value;?>
</a>
				</div><br>  -->
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
				<div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">Nama Barang</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="namabarangModal name="namabarangModal" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['namabarang'];?>
" disabled>
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
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<!-- <div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled></div>
				</div><br> -->
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br><br><br><br><br>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_atasan_oleh']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui-atasan">Disetujui Atasan Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui-atasan" name="disetujui-atasan" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_atasan_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_atasan_oleh'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui-atasan">Tanggal Atasan Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui-atasan" name="tgldisetujui-atasan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_atasan_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_service_oleh']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui-service">Disetujui Service Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui-service" name="disetujui-service" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_service_oleh']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_service_oleh'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui-service">Tanggal Service Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui-service" name="tgldisetujui-service" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_service_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_gas_oleh']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui-gas">Disetujui Gas Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui-gas" name="disetujui-gas" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_gas_oleh']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_gas_oleh'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui-gas">Tanggal Gas Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui-gas" name="tgldisetujui-gas" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_gas_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['d']->value['ditolak_oleh']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<?php }?>
               <div class="form-group"><label class="col-lg-3 control-label">Penerimaan</label>
					<div class="col-lg-9" style="margin-top: 5px;">
						<a class="btn btn-primary btn-xs" id="receive">RECEIVE</a>
					    <a class="btn btn-danger btn-xs" id="reject">REJECT</a>
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