<?php /* Smarty version Smarty-3.1.13, created on 2024-03-08 11:16:08
         compiled from "ui\theme\softhash\prog\KEBUN\add-pengiriman.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98858660265d57819677889-12976638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96d7871730f35fa1fb5397be2fab8ce3909b3fe8' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-pengiriman.tpl',
      1 => 1709871328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98858660265d57819677889-12976638',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65d578196a4426_88526993',
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65d578196a4426_88526993')) {function content_65d578196a4426_88526993($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
viapengiriman/list/" class="btn btn-primary btn-xs">Daftar Pengiriman</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformsupplier">
                    <div class="col-lg-12"><h1 class="text-center">Detail Pengiriman</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_via"><span style="color: red;">*</span> Kode Via</label>
                        <div class="col-lg-9"><input type="text" id="kode_via" name="kode_via" class="form-control" style="text-transform:uppercase" placeholder="Contoh : VPL">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_pengiriman"><span style="color: red;">*</span> Nama Pengiriman</label>
                        <div class="col-lg-9"><input type="text" id="nama_pengiriman" name="nama_pengiriman" class="form-control" style="text-transform:uppercase" placeholder="Contoh : Via Pengiriman Langsung">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="resi">Dengan Resi</label>
                        <div class="col-lg-8"><input class="form-check-input" type="checkbox" id="resi" name="resi" value="Y">
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