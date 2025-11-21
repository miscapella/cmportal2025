<?php /* Smarty version Smarty-3.1.13, created on 2025-05-27 16:12:40
         compiled from "ui\theme\softhash\prog\HRD\posisi-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:773248587682d5dfa1275f3-88106754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6096ec42726eebed4f8c023c24b330189e749776' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\posisi-detail.tpl',
      1 => 1748337158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '773248587682d5dfa1275f3-88106754',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682d5dfa1559e4_27238822',
  'variables' => 
  array (
    '_url' => 0,
    'posisi' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682d5dfa1559e4_27238822')) {function content_682d5dfa1559e4_27238822($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Detail Posisi</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_id">Position Id</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_id" name="position_id" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['position_id'];?>
" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_title">Position Title</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_title" name="position_title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['title'];?>
" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_grade">Position Grade</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_grade" name="position_grade" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['grade'];?>
" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_level">Position Level</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_level" name="position_level" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['level'];?>
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