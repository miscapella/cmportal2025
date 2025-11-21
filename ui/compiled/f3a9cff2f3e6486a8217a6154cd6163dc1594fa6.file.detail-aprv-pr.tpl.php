<?php /* Smarty version Smarty-3.1.13, created on 2023-01-10 13:55:57
         compiled from "ui\theme\softhash\prog\GAS\detail-aprv-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15622058363b7ecc6790176-63930845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3a9cff2f3e6486a8217a6154cd6163dc1594fa6' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\detail-aprv-pr.tpl',
      1 => 1673333736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15622058363b7ecc6790176-63930845',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63b7ecc682db32_60913907',
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
    'nm_item' => 0,
    'merk' => 0,
    'satuan' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63b7ecc682db32_60913907')) {function content_63b7ecc682db32_60913907($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<div class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['posisi']=='PENDING'){?>yellow-bg<?php }elseif($_smarty_tpl->tpl_vars['d']->value['posisi']=='REJECT'){?>red-bg<?php }elseif($_smarty_tpl->tpl_vars['d']->value['posisi']=='APPROVE'){?>navy-bg<?php }?>">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE REQUISITION</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/pr-aprv/" class="btn btn-success btn-sm">Back</a></div>
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
                <div class="form-group"><label class="col-lg-3 control-label" for="posisi">Status</label>
					<div class="col-lg-9"><input type="text" id="posisi" name="posisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['posisi'];?>
" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea>
					</div>
				</div><br>
               <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
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
                <div class="form-group"><label class="col-lg-2 control-label" for="kd_inventaris">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_inventaris" name="kd_inventaris" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_inventaris'];?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item" name="kd_item" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
" disabled>
				</div><br>
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
					<input class="col-lg-9" type="text" id="nm_item" name="nm_item" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nm_item']->value;?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="satuan">Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="satuan" name="satuan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
" disabled>
				</div><br>
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
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
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