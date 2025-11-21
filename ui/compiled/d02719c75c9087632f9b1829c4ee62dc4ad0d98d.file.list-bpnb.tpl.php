<?php /* Smarty version Smarty-3.1.13, created on 2023-08-29 15:47:00
         compiled from "ui\theme\softhash\prog\KEBUN\list-bpnb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176448916064c0ab35e11a00-93811450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd02719c75c9087632f9b1829c4ee62dc4ad0d98d' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-bpnb.tpl',
      1 => 1693298819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176448916064c0ab35e11a00-93811450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64c0ab360193a7_67933368',
  'variables' => 
  array (
    'msg' => 0,
    'cd' => 0,
    '_L' => 0,
    'd' => 0,
    'tg2' => 0,
    'item' => 0,
    'ds' => 0,
    'tg' => 0,
    'kode_supplier' => 0,
    'nourut' => 0,
    '_c' => 0,
    'nama_supplier' => 0,
    '_url' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64c0ab360193a7_67933368')) {function content_64c0ab360193a7_67933368($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['cd']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>BUKTI PENERIMAAN BARANG</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. BPNB</th>
                        <th style="width: 15%">Tgl BPNB</th>
                        <th style="width: 20%">Supplier</th>
						<th style="width: 15%">Diterima Oleh</th>
                        <th style="width: 10%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["kode_supplier"] = new Smarty_variable('', null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['no_po']==$_smarty_tpl->tpl_vars['ds']->value['no_po']){?>
                                <?php $_smarty_tpl->tpl_vars["kode_supplier"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['item']->value['kode_supplier']), null, 0);?>
                            <?php }?>
                        <?php } ?>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['kode_supplier']==$_smarty_tpl->tpl_vars['kode_supplier']->value){?>
                                <?php $_smarty_tpl->tpl_vars["nama_supplier"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['item']->value['nama_supplier']), null, 0);?>
                            <?php }?>
                        <?php } ?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_bpnb'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_bpnb']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['nama_supplier']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['diterima_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/print-bpnb/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" target="_blank" class="btn btn-primary btn-xs" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-print"></i> Print</a>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                    <?php } ?>
                    </tbody>
                </table>
                
			</div>
		</div>
	</div>
</div>
<?php }else{ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Tidak ada BPnB</h2>
			</div>
		</div>
	</div>
</div>
<?php }?>

<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>