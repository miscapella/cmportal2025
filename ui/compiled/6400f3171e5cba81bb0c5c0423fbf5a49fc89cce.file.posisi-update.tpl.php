<?php /* Smarty version Smarty-3.1.13, created on 2025-05-27 16:13:21
         compiled from "ui\theme\softhash\prog\HRD\posisi-update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1124665890682d7b9c7d76b3-67678165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6400f3171e5cba81bb0c5c0423fbf5a49fc89cce' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\posisi-update.tpl',
      1 => 1748337199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1124665890682d7b9c7d76b3-67678165',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682d7b9c804906_18217167',
  'variables' => 
  array (
    '_url' => 0,
    'cols' => 0,
    'col' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682d7b9c804906_18217167')) {function content_682d7b9c804906_18217167($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
posisi/list/" class="btn btn-primary btn-xs">Daftar Posisi</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" id="rformposisi">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Perbarui Posisi</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position"><span style="color: red;">*</span> Position</label>
                            <div class="col-lg-9">
                                <div>
                                    <input type="file" id="position" name="position" class="files">
                                    <input type="text" id="sposition" name="sposition" style="display: none;">
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
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>