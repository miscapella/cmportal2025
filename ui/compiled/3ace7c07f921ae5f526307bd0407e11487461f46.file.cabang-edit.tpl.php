<?php /* Smarty version Smarty-3.1.13, created on 2025-07-22 08:25:36
         compiled from "ui\theme\softhash\prog\HRD\cabang-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1494630919682da2bf1ae511-71586708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ace7c07f921ae5f526307bd0407e11487461f46' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\cabang-edit.tpl',
      1 => 1753147533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1494630919682da2bf1ae511-71586708',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682da2bf20a4c0_15923581',
  'variables' => 
  array (
    '_url' => 0,
    'branch' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682da2bf20a4c0_15923581')) {function content_682da2bf20a4c0_15923581($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" id="rformcabang">
                        <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value['id'];?>
">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Edit Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="branch_name"><span style="color: red;">*</span> Branch Name</label>
                            <div class="col-lg-9">
                                <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Branch Name" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value['branch_name'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location"><span style="color: red;">*</span> Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" id="work_location" name="work_location" class="form-control" placeholder="Work Location" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value['work_location'];?>
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