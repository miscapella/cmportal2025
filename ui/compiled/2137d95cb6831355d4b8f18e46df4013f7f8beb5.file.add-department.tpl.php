<?php /* Smarty version Smarty-3.1.13, created on 2023-06-19 09:43:51
         compiled from "ui\theme\softhash\add-department.tpl" */ ?>
<?php /*%%SmartyHeaderCode:987277227648fc0e71bc7f4-48770474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2137d95cb6831355d4b8f18e46df4013f7f8beb5' => 
    array (
      0 => 'ui\\theme\\softhash\\add-department.tpl',
      1 => 1687142627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987277227648fc0e71bc7f4-48770474',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_648fc0e71f2073_75445700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_648fc0e71f2073_75445700')) {function content_648fc0e71f2073_75445700($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Unit Usaha</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_dept">Kode Unit Usaha</label>
                        <div class="col-lg-9"><input type="text" id="kode_dept" name="kode_dept" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_dept">Nama Unit Usaha</label>
                        <div class="col-lg-9"><input type="text" id="nama_dept" name="nama_dept" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="atasan">Atasan</label>
                        <div class="col-lg-9"><input type="text" id="atasan" name="atasan" class="form-control"></div>
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