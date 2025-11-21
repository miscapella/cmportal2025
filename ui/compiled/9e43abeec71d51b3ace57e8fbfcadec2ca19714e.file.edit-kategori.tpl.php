<?php /* Smarty version Smarty-3.1.13, created on 2023-08-08 11:40:04
         compiled from "ui\theme\softhash\prog\KEBUN\edit-kategori.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120405557364be3f2a98aee8-71834599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e43abeec71d51b3ace57e8fbfcadec2ca19714e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\edit-kategori.tpl',
      1 => 1691469574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120405557364be3f2a98aee8-71834599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64be3f2af3d7e1_50535749',
  'variables' => 
  array (
    'cid' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64be3f2af3d7e1_50535749')) {function content_64be3f2af3d7e1_50535749($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Kategori</h5>
                <div class="ibox-tools">
					<a class="btn btn-primary btn-xs back">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Nama</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_kategori'];?>
">
                        </div>
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