<?php /* Smarty version Smarty-3.1.13, created on 2022-08-31 14:53:26
         compiled from "ui\theme\softhash\change-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144157627630f1376cf4ef9-87647107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '123bbd47d14f1b1709ae294215437ce8195f1469' => 
    array (
      0 => 'ui\\theme\\softhash\\change-password.tpl',
      1 => 1649238072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144157627630f1376cf4ef9-87647107',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_630f1376d45b24_45900346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_630f1376d45b24_45900346')) {function content_630f1376d45b24_45900346($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</h5>

            </div>
            <div class="ibox-content">
                
                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password-post">
                    <div class="form-group">
                        <label for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Current Password'];?>
</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="npass"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Password'];?>
</label>
                        <input type="password" class="form-control" id="npass" name="npass">
                    </div>
                    <div class="form-group">
                        <label for="cnpass"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm New Password'];?>
</label>
                        <input type="password" class="form-control" id="cnpass" name="cnpass">
                    </div>




                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>