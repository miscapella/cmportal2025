<?php /* Smarty version Smarty-3.1.13, created on 2024-02-05 08:28:00
         compiled from "ui\theme\softhash\prog\GAS\list-po.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14328306463c8b930625500-88572526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebae08e5cbc637d9c7ca1673b14cc59e0002db16' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-po.tpl',
      1 => 1706666279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14328306463c8b930625500-88572526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63c8b930677e75_77207055',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'cd' => 0,
    'd' => 0,
    'ds' => 0,
    'nourut' => 0,
    '_c' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63c8b930677e75_77207055')) {function content_63c8b930677e75_77207055($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor PO..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/add-po/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah PO</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['cd']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE ORDER</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. PR</th>
                        <th style="width: 15%">Tgl PR</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <!-- <th style="width: 15%">Tingkat Kepentingan</th> -->
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
                        <!-- <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['priority']=='TINGGI'){?>style="background-color:#ffc9bb;"<?php }elseif($_smarty_tpl->tpl_vars['ds']->value['priority']=='MENENGAH'){?>style="background-color:#f7f5bc;"<?php }?>> -->
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_po'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_po']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['priority'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-po/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='REJECT'||$_smarty_tpl->tpl_vars['ds']->value['status']=='PENDING'){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/edit-po/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i><?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='REJECT'){?> Revisi<?php }else{ ?> Edit<?php }?></a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']!='APPROVE'){?>
                                <a href="delete/po/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> Cancel</a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='APPROVE'){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/print-po/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-print"></i> Print</a>
                                <?php }?>
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