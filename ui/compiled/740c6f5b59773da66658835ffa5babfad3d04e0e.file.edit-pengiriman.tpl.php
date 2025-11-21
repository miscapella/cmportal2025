<?php /* Smarty version Smarty-3.1.13, created on 2024-03-07 17:00:33
         compiled from "ui\theme\softhash\prog\KEBUN\edit-pengiriman.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194566490665d57a2cf29090-01156342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '740c6f5b59773da66658835ffa5babfad3d04e0e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\edit-pengiriman.tpl',
      1 => 1709805625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194566490665d57a2cf29090-01156342',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65d57a2d02ad25_07560931',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65d57a2d02ad25_07560931')) {function content_65d57a2d02ad25_07560931($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Supplier</h5>
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
                    <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
					<div class="col-lg-12"><h1 class="text-center">Detail Pengiriman</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_via"><span style="color: red;">*</span> Kode Supplier</label>
                        <div class="col-lg-9"><input type="text" id="kode_via" name="kode_via" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_via'];?>
" >
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_pengiriman"><span style="color: red;">*</span> Nama Supplier</label>
                        <div class="col-lg-9"><input type="text" id="nama_pengiriman" name="nama_pengiriman" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_pengiriman'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="resi">Dengan Resi</label>
                        <div class="col-lg-8"><input class="form-check-input" type="checkbox" id="resi" name="resi" value="Y" <?php if ($_smarty_tpl->tpl_vars['d']->value['resi']=='Y'){?> checked <?php }?>>
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