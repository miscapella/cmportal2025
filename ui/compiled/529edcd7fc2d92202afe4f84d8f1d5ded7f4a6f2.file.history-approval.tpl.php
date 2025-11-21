<?php /* Smarty version Smarty-3.1.13, created on 2024-05-22 13:29:53
         compiled from "ui\theme\softhash\prog\FORM\history-approval.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1864674255664d90d8d802d6-73813114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '529edcd7fc2d92202afe4f84d8f1d5ded7f4a6f2' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\history-approval.tpl',
      1 => 1716359392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1864674255664d90d8d802d6-73813114',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_664d90d8e13154_09350241',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    'nourut' => 0,
    'i' => 0,
    'date' => 0,
    'e' => 0,
    'form' => 0,
    'es' => 0,
    'respondent' => 0,
    'status' => 0,
    'ds' => 0,
    'stat' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_664d90d8e13154_09350241')) {function content_664d90d8e13154_09350241($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <table id="datatable-history-approval"  class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 15%;">Tanggal</th>
                        <th style="width: 20%;">Nama Form</th>
                        <th style="width: 25%;">Respondent</th>
                        <th style="width: 18%;">Details</th>
                        <th class="text-right">Status</th>
                    </tr>
                    </thead>
                    <!-- <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['date']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</td>
                            <td>
                            <?php  $_smarty_tpl->tpl_vars['es'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['es']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['es']->key => $_smarty_tpl->tpl_vars['es']->value){
$_smarty_tpl->tpl_vars['es']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['form']->value[$_smarty_tpl->tpl_vars['i']->value]==$_smarty_tpl->tpl_vars['es']->value['kode_form']){?>
                                    <?php echo $_smarty_tpl->tpl_vars['es']->value['nama_form'];?>

                                <?php }?>
                            <?php } ?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['respondent']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</td>
                            <td class="text-center"><span class="btn <?php if ($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['i']->value]=='Rejected'){?>btn-danger<?php }elseif($_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['i']->value]=='Approved'){?>btn-primary<?php }else{ ?>btn-warning<?php }?> btn-xs" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</span></td>
                            <td class="text-center">
                                <a href="#" class="details" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value;?>
"><u>Details</u></a>
                            </td>
                            <td class="text-center"><span class="status btn <?php if ($_smarty_tpl->tpl_vars['stat']->value[$_smarty_tpl->tpl_vars['i']->value]=='Rejected'){?>btn-danger<?php }elseif($_smarty_tpl->tpl_vars['stat']->value[$_smarty_tpl->tpl_vars['i']->value]=='Approved'){?>btn-primary<?php }else{ ?>btn-warning<?php }?> btn-xs" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['stat']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</span></td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                    <?php } ?>
                    </tbody> -->
                </table>
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