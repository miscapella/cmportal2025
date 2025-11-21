<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:37
         compiled from "ui\theme\softhash\prog\KUBOTA\arcard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18305060276358a5a54029e1-74142233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be467e7e0fc5dba91c80bdbeaff026198e0fdc5e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\arcard.tpl',
      1 => 1565083675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18305060276358a5a54029e1-74142233',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a5a5456ea9_92088594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a5a5456ea9_92088594')) {function content_6358a5a5456ea9_92088594($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Kartu Piutang</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/arcard-print" id="tform" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No. Jual &#11020; No. Serial &#11020; No. Engine</label>
                        <div class="col-sm-8">
							<select id="no" name="no" class="form-control">
								<option value="">Pilih No. Jual...</option>
								<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['no_jual'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_jual'];?>
 &#11020; <?php echo $_smarty_tpl->tpl_vars['ds']->value['no_chassis'];?>
 &#11020; <?php echo $_smarty_tpl->tpl_vars['ds']->value['no_engine'];?>
</option>
								<?php } ?>

							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>