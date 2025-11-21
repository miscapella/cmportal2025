<?php /* Smarty version Smarty-3.1.13, created on 2025-11-03 16:41:19
         compiled from "ui\theme\softhash\prog\SERVICE\tipe-kendaraan-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9981734690863d5d84ce9-43414203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9930cb6d254f5c02b8f9c3980c33e4397849262c' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\tipe-kendaraan-add.tpl',
      1 => 1762162065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9981734690863d5d84ce9-43414203',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_690863d5db3e11_30750093',
  'variables' => 
  array (
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_690863d5db3e11_30750093')) {function content_690863d5db3e11_30750093($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Tambah Tipe Kendaraan</h1>
                <form id="form-add">
                    <div class="form-group">
                        <label>Nama Tipe Mobil</label>
                        <input type="text" name="nama_tipe_mobil" class="form-control" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" name="merek" class="form-control" maxlength="100">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" maxlength="100">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/list" class="btn btn-default">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>