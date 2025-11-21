<?php /* Smarty version Smarty-3.1.13, created on 2023-06-19 09:45:02
         compiled from "ui\theme\softhash\edit-department.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1987828798630d6c9c5c2603-20770997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd754c1c67a5b8f16cad1b14950048d0307986e1f' => 
    array (
      0 => 'ui\\theme\\softhash\\edit-department.tpl',
      1 => 1687142701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1987828798630d6c9c5c2603-20770997',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_630d6c9c61a8f7_36617203',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_630d6c9c61a8f7_36617203')) {function content_630d6c9c61a8f7_36617203($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Department</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
department/list" class="btn btn-primary btn-xs">List Unit Usaha</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_dept">Kode Unit Usaha</label>
                        <div class="col-lg-9"><input type="text" id="kode_dept" name="kode_dept" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_dept'];?>
"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_dept">Nama Unit Usaha</label>
                        <div class="col-lg-9"><input type="text" id="nama_dept" name="nama_dept" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_dept'];?>
"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="atasan">Atasan</label>
                        <div class="col-lg-9"><input type="text" id="atasan" name="atasan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['atasan'];?>
"></div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
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