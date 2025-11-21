<?php /* Smarty version Smarty-3.1.13, created on 2024-06-05 13:35:05
         compiled from "ui\theme\softhash\prog\HRD\add-departemen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80059092266600719212bc1-20525549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f56fb1c74a5ce0c05c6607e93b5d030d445ac7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\add-departemen.tpl',
      1 => 1717569302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80059092266600719212bc1-20525549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66600719261e61_26579878',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66600719261e61_26579878')) {function content_66600719261e61_26579878($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
departemen/list/" class="btn btn-primary btn-xs">Daftar Departemen</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformdepartemen">
                    <div class="col-lg-12"><h1 class="text-center">Detail Departemen</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_supplier"><span style="color: red;">*</span> Kode Departemen</label>
                        <div class="col-lg-9"><input type="text" id="kode_departemen" name="kode_departemen" class="form-control" style="text-transform:uppercase" placeholder="Kode Departemen">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_departemen"><span style="color: red;">*</span> Nama Departemen</label>
                        <div class="col-lg-9"><input type="text" id="nama_departemen" name="nama_departemen" class="form-control" style="text-transform:uppercase" placeholder="Nama Departemen">
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