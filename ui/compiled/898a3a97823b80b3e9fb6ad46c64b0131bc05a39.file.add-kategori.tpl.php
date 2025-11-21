<?php /* Smarty version Smarty-3.1.13, created on 2023-07-24 20:13:28
         compiled from "ui\theme\softhash\prog\KEBUN\add-kategori.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121154426164be38d99f7f52-72982966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '898a3a97823b80b3e9fb6ad46c64b0131bc05a39' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-kategori.tpl',
      1 => 1690204365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121154426164be38d99f7f52-72982966',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64be38d9a9edf1_13629766',
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64be38d9a9edf1_13629766')) {function content_64be38d9a9edf1_13629766($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Bagian</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/list/" class="btn btn-primary btn-xs">Daftar Bagian</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama"><span style="color: red;">*</span> Bagian</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control">
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