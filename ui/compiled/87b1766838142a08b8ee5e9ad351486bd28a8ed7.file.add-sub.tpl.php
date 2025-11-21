<?php /* Smarty version Smarty-3.1.13, created on 2023-08-08 11:38:37
         compiled from "ui\theme\softhash\prog\KEBUN\add-sub.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109032748464bf38fd6ad3d8-55778695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87b1766838142a08b8ee5e9ad351486bd28a8ed7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-sub.tpl',
      1 => 1691469507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109032748464bf38fd6ad3d8-55778695',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bf38fd703475_77774540',
  'variables' => 
  array (
    '_url' => 0,
    'parent' => 0,
    'main' => 0,
    'd' => 0,
    'e' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bf38fd703475_77774540')) {function content_64bf38fd703475_77774540($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Bagian</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/sub/<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['main']->value;?>
" class="btn btn-primary btn-xs">Back</a>
				</div>

            </div>
            <div class="ibox-content" id="ibox_form">
                <input type="text" id="parent" name="parent" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
" style="display: none;">
                <input type="text" id="main" name="main" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['main']->value;?>
" style="display: none;">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <input type="text" id="mains" name="mains" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['main']->value;?>
" style="display: none;">
                    <div class="form-group"><label class="col-lg-3 control-label" for="bagian">Bagian</label>
                        <div class="col-lg-9"><input type="text" id="bagian" name="bagian" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_kategori'];?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="main">Main Data</label>
                        <div class="col-lg-9"><input type="text" id="main" name="main" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['nama_kategori'];?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Sub Data</label>
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