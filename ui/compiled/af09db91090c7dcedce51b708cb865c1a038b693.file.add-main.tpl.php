<?php /* Smarty version Smarty-3.1.13, created on 2023-08-08 11:38:29
         compiled from "ui\theme\softhash\prog\KEBUN\add-main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125290440964bf29225b4a31-78123016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af09db91090c7dcedce51b708cb865c1a038b693' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-main.tpl',
      1 => 1691469495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125290440964bf29225b4a31-78123016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bf2922601219_71810218',
  'variables' => 
  array (
    '_url' => 0,
    'parent' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bf2922601219_71810218')) {function content_64bf2922601219_71810218($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Bagian</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/main/<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
" class="btn btn-primary btn-xs">Back</a>
				</div>

            </div>
            <div class="ibox-content" id="ibox_form">
                <input type="text" id="parent" name="parent" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
" style="display: none;">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <input type="text" id="parents" name="parents" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
" style="display: none;">
                    <div class="form-group"><label class="col-lg-3 control-label" for="bagian">Bagian</label>
                        <div class="col-lg-9"><input type="text" id="bagian" name="bagian" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_kategori'];?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Main Data</label>
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