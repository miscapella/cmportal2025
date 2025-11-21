<?php /* Smarty version Smarty-3.1.13, created on 2025-07-30 09:47:11
         compiled from "ui\theme\softhash\prog\HRD\produktivitas-bengkel-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1484874820682feab10edd76-79997872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e359a9156516288c73b5f23667f5836311b8ed9e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\produktivitas-bengkel-edit.tpl',
      1 => 1753843613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1484874820682feab10edd76-79997872',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682feab1148be1_41327337',
  'variables' => 
  array (
    '_url' => 0,
    'cabang' => 0,
    'branchesSelect' => 0,
    'workLocations' => 0,
    'selectedWorkLocation' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682feab1148be1_41327337')) {function content_682feab1148be1_41327337($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-bengkel/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" id="rformcabang">
                        <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cabang']->value['id'];?>
">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Edit Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location"><span style="color: red;">*</span> Cabang</label>
                            <div class="col-lg-9">
                                <select class="form-control rolegroup" id="work_location" name="work_location">
                                    <?php echo $_smarty_tpl->tpl_vars['branchesSelect']->value;?>

                                </select>
                            </div>
                        </div>
                        <script>
                            const workLocations = <?php echo $_smarty_tpl->tpl_vars['workLocations']->value;?>
;
                        </script>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location1">Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" id="work_location1" name="work_location1" class="form-control" placeholder="Work Location" disabled value="<?php echo $_smarty_tpl->tpl_vars['selectedWorkLocation']->value;?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="spreadsheet_link"><span style="color: red;">*</span> Link Spreadsheet (.xlsx)</label>
                            <div class="col-lg-9">
                                <input type="text" id="spreadsheet_link" name="spreadsheet_link" class="form-control" placeholder="Link Spreadsheet (.xlsx)" value="<?php echo $_smarty_tpl->tpl_vars['cabang']->value['link_spreadsheet'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="is_udt"> Cabang UDT</label>
                            <div class="col-lg-9">
                                <input type="checkbox" id="is_udt" name="is_udt" <?php if ($_smarty_tpl->tpl_vars['cabang']->value['is_udt']==1){?>checked<?php }?>>
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