<?php /* Smarty version Smarty-3.1.13, created on 2023-02-22 09:43:40
         compiled from "ui\theme\softhash\prog\GAS\list-pr-done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128732174463f580e1a295c7-20960672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90a14edaa32d752cdfe0ee74686b17ac543fa072' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-pr-done.tpl',
      1 => 1677033812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128732174463f580e1a295c7-20960672',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63f580e1a77de9_20438480',
  'variables' => 
  array (
    'msg' => 0,
    'cf' => 0,
    '_L' => 0,
    'f' => 0,
    'nourut' => 0,
    'fs' => 0,
    '_c' => 0,
    '_url' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63f580e1a77de9_20438480')) {function content_63f580e1a77de9_20438480($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['cf']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE REQUISITION DONE</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">No. PR</th>
                        <th style="width: 20%">Tgl PR</th>
						<th style="width: 20%">Dibuat Oleh</th>
                        <th style="width: 20%">Status</th>
                        <th class="text-right" style="width: 20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['fs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fs']->key => $_smarty_tpl->tpl_vars['fs']->value){
$_smarty_tpl->tpl_vars['fs']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['no_pr'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['fs']->value['tgl_pr']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['posisi'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-pr/<?php echo $_smarty_tpl->tpl_vars['fs']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
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
                <h2>Tidak ada purchase requisition yang di approve</h2>
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