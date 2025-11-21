<?php /* Smarty version Smarty-3.1.13, created on 2024-08-29 09:10:14
         compiled from "ui\theme\softhash\prog\GAS\edit-jenis-usaha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1347033367659516b69a4de9-47352520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc6961d2962637cfc040dc6a039ef04c8151e36f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-jenis-usaha.tpl',
      1 => 1724833309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1347033367659516b69a4de9-47352520',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_659516b69f94c2_32037152',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_659516b69f94c2_32037152')) {function content_659516b69f94c2_32037152($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Jenis Usaha</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
jenisusaha/list/" class="btn btn-primary btn-xs">Daftar Jenis Usaha</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformsupplier" autocomplete="off" spellcheck="false">
                    <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
					<div class="col-lg-12"><h1 class="text-center">Detail Jenis Usaha</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_usaha"><span style="color: red;">*</span> Nama Usaha</label>
                        <div class="col-lg-9"><input type="text" id="nama_usaha" name="nama_usaha" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_usaha'];?>
">
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