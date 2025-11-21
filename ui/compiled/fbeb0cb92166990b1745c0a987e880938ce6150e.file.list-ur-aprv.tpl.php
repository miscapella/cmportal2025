<?php /* Smarty version Smarty-3.1.13, created on 2024-02-19 16:40:19
         compiled from "ui\theme\softhash\prog\KEBUN\list-ur-aprv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114872392265bc9c087c0a03-73618586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbeb0cb92166990b1745c0a987e880938ce6150e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-ur-aprv.tpl',
      1 => 1708335591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114872392265bc9c087c0a03-73618586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65bc9c08944330_09105682',
  'variables' => 
  array (
    'msg' => 0,
    'test' => 0,
    'cd' => 0,
    '_L' => 0,
    'd' => 0,
    'nourut' => 0,
    'ds' => 0,
    '_c' => 0,
    '_url' => 0,
    'ce' => 0,
    'cf' => 0,
    'cg' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65bc9c08944330_09105682')) {function content_65bc9c08944330_09105682($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<h1><?php echo $_smarty_tpl->tpl_vars['test']->value;?>
</h1>
<?php if ($_smarty_tpl->tpl_vars['cd']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>UR Menunggu Approval</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 18%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
						<th style="width: 20%">Dibuat Oleh</th>
                        <th style="width: 15%">Status</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_mintabarang'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['tanggal']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/detail-ur-aprv/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Approval</a>
                                
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
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['cd']->value==0&&$_smarty_tpl->tpl_vars['ce']->value==0&&$_smarty_tpl->tpl_vars['cf']->value==0&&$_smarty_tpl->tpl_vars['cg']->value==0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Tidak ada User Request untuk di approve</h2>
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