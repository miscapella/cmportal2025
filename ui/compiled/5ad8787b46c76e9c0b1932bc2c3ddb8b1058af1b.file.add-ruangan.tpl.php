<?php /* Smarty version Smarty-3.1.13, created on 2025-02-19 12:04:48
         compiled from "ui\theme\softhash\add-ruangan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192644366667b566704deab5-99650895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ad8787b46c76e9c0b1932bc2c3ddb8b1058af1b' => 
    array (
      0 => 'ui\\theme\\softhash\\add-ruangan.tpl',
      1 => 1739941460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192644366667b566704deab5-99650895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67b5667051c4f8_87609433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67b5667051c4f8_87609433')) {function content_67b5667051c4f8_87609433($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Ruangan</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_ruangan">Nama Ruangan</label>
                        <div class="col-lg-9"><input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi</label>
                        <div class="col-lg-9"><input type="text" id="lokasi" name="lokasi" class="form-control"></div>
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