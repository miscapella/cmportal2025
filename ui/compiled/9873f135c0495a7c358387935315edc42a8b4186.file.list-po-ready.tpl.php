<?php /* Smarty version Smarty-3.1.13, created on 2023-01-26 14:52:57
         compiled from "ui\theme\softhash\prog\GAS\list-po-ready.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208068026863d23159405705-75611230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9873f135c0495a7c358387935315edc42a8b4186' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-po-ready.tpl',
      1 => 1674719573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208068026863d23159405705-75611230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'cd' => 0,
    '_L' => 0,
    'd' => 0,
    'nourut' => 0,
    'ds' => 0,
    '_c' => 0,
    '_url' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63d2315946c974_71689754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63d2315946c974_71689754')) {function content_63d2315946c974_71689754($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
               <h2>PURCHASE ORDER READY</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">No. PO</th>
                        <th style="width: 20%">Tgl PO</th>
						<th style="width: 20%">Dibuat Oleh</th>
                        <th style="width: 20%">Status</th>
                        <th class="text-right" style="width: 20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_po'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_po']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['posisi'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-po/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/edit-po/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Pilih Supplier</a>
                                <a href="delete/pembelian/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
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
                <h2>Tidak ada purchase order</h2>
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