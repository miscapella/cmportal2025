<?php /* Smarty version Smarty-3.1.13, created on 2025-11-04 16:47:29
         compiled from "ui\theme\softhash\prog\SERVICE\tipe-kendaraan-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7528125836908671d69a961-69992384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35fdcf2637cba625b11c28e46d6d7a8b8326a693' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\tipe-kendaraan-edit.tpl',
      1 => 1762162120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7528125836908671d69a961-69992384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6908671d6d3f59_54327180',
  'variables' => 
  array (
    'item' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6908671d6d3f59_54327180')) {function content_6908671d6d3f59_54327180($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Edit Tipe Kendaraan</h1>
                <form id="form-edit">
                    <input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <div class="form-group">
                        <label>Nama Tipe Mobil</label>
                        <input type="text" name="nama_tipe_mobil" class="form-control" maxlength="100" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nama_tipe_mobil'], ENT_QUOTES, 'UTF-8', true);?>
" required>
                    </div>
                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" name="merek" class="form-control" maxlength="100" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['merek'], ENT_QUOTES, 'UTF-8', true);?>
">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" maxlength="100" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['kategori'], ENT_QUOTES, 'UTF-8', true);?>
">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/list" class="btn btn-default">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>