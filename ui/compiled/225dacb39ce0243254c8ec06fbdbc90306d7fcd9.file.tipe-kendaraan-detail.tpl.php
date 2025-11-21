<?php /* Smarty version Smarty-3.1.13, created on 2025-11-03 15:17:21
         compiled from "ui\theme\softhash\prog\SERVICE\tipe-kendaraan-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26433036569086511d22d59-02541522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '225dacb39ce0243254c8ec06fbdbc90306d7fcd9' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\tipe-kendaraan-detail.tpl',
      1 => 1762157463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26433036569086511d22d59-02541522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_69086511d558a7_74029951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_69086511d558a7_74029951')) {function content_69086511d558a7_74029951($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Detail Tipe Kendaraan</h1>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nama Tipe Mobil</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['nama_tipe_mobil'], ENT_QUOTES, 'UTF-8', true);?>
" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Kategori</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['kategori'], ENT_QUOTES, 'UTF-8', true);?>
" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/list" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>