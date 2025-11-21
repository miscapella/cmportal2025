<?php /* Smarty version Smarty-3.1.13, created on 2025-07-22 08:23:57
         compiled from "ui\theme\softhash\prog\HRD\cabang-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1867422945682da0ffc58e82-29941112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eb2a507077ecca0fd14b571c617a45edc8128e3' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\cabang-detail.tpl',
      1 => 1753147430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1867422945682da0ffc58e82-29941112',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682da0ffcb52b5_46270971',
  'variables' => 
  array (
    '_url' => 0,
    'branch' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682da0ffcb52b5_46270971')) {function content_682da0ffcb52b5_46270971($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cabang/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Detail Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="branch_name">Branch Name</label>
                            <div class="col-lg-9">
                                <input type="text" id="branch_name" name="branch_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value['branch_name'];?>
" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location">Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" id="work_location" name="work_location" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value['work_location'];?>
" disabled style="background-color: transparent; cursor: default;">
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