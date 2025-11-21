<?php /* Smarty version Smarty-3.1.13, created on 2025-05-27 16:12:56
         compiled from "ui\theme\softhash\prog\HRD\posisi-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1090371610682d75893f7049-60042606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eea27d3694114d42c34671e4ad62c154142f87f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\posisi-edit.tpl',
      1 => 1748337173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1090371610682d75893f7049-60042606',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682d758942e7f1_14238274',
  'variables' => 
  array (
    '_url' => 0,
    'posisi' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682d758942e7f1_14238274')) {function content_682d758942e7f1_14238274($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
                        <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['id'];?>
">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Edit Posisi</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_id"><span style="color: red;">*</span> Position Id</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_id" name="position_id" class="form-control" placeholder="Position Id" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['position_id'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_title"><span style="color: red;">*</span> Position Title</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_title" name="position_title" class="form-control" placeholder="Position Title" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['title'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_grade">Position Grade</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_grade" name="position_grade" class="form-control" placeholder="Position Grade" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['grade'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_level">Position Level</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_level" name="position_level" class="form-control" placeholder="Position Level" value="<?php echo $_smarty_tpl->tpl_vars['posisi']->value['level'];?>
">
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