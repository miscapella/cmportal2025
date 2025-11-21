<?php /* Smarty version Smarty-3.1.13, created on 2023-01-24 13:27:17
         compiled from "ui\theme\softhash\prog\GAS\edit-po-v2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107920222963cf5ac35e7d70-88353581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b871d87059e8c101f61364651595d49d710834c3' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-po-v2.tpl',
      1 => 1674541607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107920222963cf5ac35e7d70-88353581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63cf5ac367aec5_72280436',
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
    'tg3' => 0,
    'r' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63cf5ac367aec5_72280436')) {function content_63cf5ac367aec5_72280436($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<div class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['posisi']=='PENDING'||$_smarty_tpl->tpl_vars['d']->value['posisi']=='REVISI'){?>yellow-bg<?php }elseif($_smarty_tpl->tpl_vars['d']->value['posisi']=='REJECT'){?>red-bg<?php }elseif($_smarty_tpl->tpl_vars['d']->value['posisi']=='APPROVE'){?>navy-bg<?php }?>">
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
                <div class="form-group"><label class="col-lg-3 control-label" for="posisi">Status</label>
					<div class="col-lg-9"><input type="text" id="posisi" name="posisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['posisi'];?>
" disabled></div>
				</div><br><br>
                <div class="form-group" style="text-align: right;">
                    <div class="col-lg-12"><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></div>
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
                <div class="form-group"><label class="col-lg-2 control-label" for="kd_inventaris">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_inventaris" name="kd_inventaris" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_inventaris'];?>
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item" name="kd_item" class="form-control kd_item" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
" readonly>
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
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['merk']->value;?>
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="satuan">Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="satuan" name="satuan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['satuan']->value;?>
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_req'];?>
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock" name="qty_stock" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['qty_stock'];?>
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_diperlukan'];?>
" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keperluan'];?>
" readonly>
				</div><br>
                <div class="form-group" >
                    <div class="col-lg-12"><button class="btn btn-danger btn-sm" name="tambahsupplier" id="tambahsupplier">Tambah Supplier</button></div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="kd_supplier">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<select name="kd_supplier1" class="kd_supplier" id="kd_supplier1">
                        <option value="">Pilih Supplier 1</option>
                        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kd_supplier'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['kd_supplier'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r']->value['nm_supplier'];?>
</option>
                        <?php } ?>
                    </select>
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