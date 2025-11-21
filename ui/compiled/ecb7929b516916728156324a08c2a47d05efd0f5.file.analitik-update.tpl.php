<?php /* Smarty version Smarty-3.1.13, created on 2025-04-11 10:27:48
         compiled from "ui\theme\softhash\prog\HRD\analitik-update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141520410167f741d78d3334-22699570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecb7929b516916728156324a08c2a47d05efd0f5' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\analitik-update.tpl',
      1 => 1744342064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141520410167f741d78d3334-22699570',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67f741d7903340_22418596',
  'variables' => 
  array (
    '_url' => 0,
    'excel' => 0,
    'title' => 0,
    'cols' => 0,
    'col' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67f741d7903340_22418596')) {function content_67f741d7903340_22418596($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
analitik/masterdata/" class="btn btn-primary btn-xs">Master Data</a>
                    </div>
                </div>
                <form class="form-horizontal" id="rformanalitik">
                    <div class="ibox-content" id="ibox_form">
                        <div class="alert alert-danger" id="eanalitik">
                            <span></span>
                        </div>
                        <div class="col-lg-12">
                            <h1 class="text-center">Update Master Data</h1>
                        </div>
                        <?php  $_smarty_tpl->tpl_vars['cols'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cols']->_loop = false;
 $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['excel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cols']->key => $_smarty_tpl->tpl_vars['cols']->value){
$_smarty_tpl->tpl_vars['cols']->_loop = true;
 $_smarty_tpl->tpl_vars['title']->value = $_smarty_tpl->tpl_vars['cols']->key;
?>
                            <section class="form-group">
                                <label class="col-lg-3 control-label" for="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['title']->value,' ','_');?>
"><span style="color: red;">*</span> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</label>
                                <div class="col-lg-9">
                                    <div>
                                        <input type="file" id="file-<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['title']->value,' ','_');?>
" name="file-<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['title']->value,' ','_');?>
" class="files">
                                        <input type="text" id="sfile-<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['title']->value,' ','_');?>
" name="sfile-<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['title']->value,' ','_');?>
" style="display: none;">
                                    </div>
                                    <ul style="margin-top: 8px;">
                                        <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cols']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
                                            <li><?php echo $_smarty_tpl->tpl_vars['col']->value;?>
</li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </section>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>