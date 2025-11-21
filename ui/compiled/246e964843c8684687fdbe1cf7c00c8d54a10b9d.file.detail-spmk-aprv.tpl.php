<?php /* Smarty version Smarty-3.1.13, created on 2024-04-17 08:51:40
         compiled from "ui\theme\softhash\prog\KEBUN\detail-spmk-aprv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1940804524651e6d4707bc90-11299138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '246e964843c8684687fdbe1cf7c00c8d54a10b9d' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\detail-spmk-aprv.tpl',
      1 => 1713318698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1940804524651e6d4707bc90-11299138',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_651e6d47156174_29876012',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'e' => 0,
    'nourut' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651e6d47156174_29876012')) {function content_651e6d47156174_29876012($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			    <div class="col-lg-6"><h3>DETAIL SURAT PERMINTAAN KERJA</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-spmk-aprv/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPmK</label>
					<div class="col-lg-9"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_spmk'];?>
" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spmk">Tanggal SPmK</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['status'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
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
                <?php if ($_smarty_tpl->tpl_vars['d']->value['disurvey_nama']!=''){?>
				<div class="form-group"><label class="col-lg-3 control-label" for="disurvey">Disurvey Oleh</label>
					<div class="col-lg-5"><input type="text" id="disurvey" name="disurvey" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disurvey_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disurvey_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisurvey">Tanggal Disurvey</label>
                    <div class="col-lg-2"><input type="text" id="tgldisurvey" name="tgldisurvey" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disurvey_tgl'];?>
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
					    <a class="btn btn-primary btn-xs" id="approve">APPROVE</a>
					    <a class="btn btn-danger btn-xs" id="reject">REJECT</a>
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
                    SERVIS #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>

				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="spesifikasi">Spesifikasi</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="spesifikasi" name="spesifikasi" class="form-control"><?php echo $_smarty_tpl->tpl_vars['ds']->value['spesifikasi'];?>
</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="block">Block</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="block" name="block" class="form-control"><?php echo $_smarty_tpl->tpl_vars['ds']->value['block'];?>
</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="ha">Ha</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="ha" name="ha" class="form-control"><?php echo $_smarty_tpl->tpl_vars['ds']->value['ha'];?>
</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="pkk">PKK</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="pkk" name="pkk" class="form-control"><?php echo $_smarty_tpl->tpl_vars['ds']->value['pkk'];?>
</div>
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