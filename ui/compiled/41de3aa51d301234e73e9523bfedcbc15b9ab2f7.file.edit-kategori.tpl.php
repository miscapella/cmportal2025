<?php /* Smarty version Smarty-3.1.13, created on 2023-01-30 11:52:53
         compiled from "ui\theme\softhash\prog\GAS\edit-kategori.tpl" */ ?>
<?php /*%%SmartyHeaderCode:812578105632554f771c745-29515929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41de3aa51d301234e73e9523bfedcbc15b9ab2f7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-kategori.tpl',
      1 => 1675054337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '812578105632554f771c745-29515929',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_632554f774f014_24331428',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'opt_induk' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_632554f774f014_24331428')) {function content_632554f774f014_24331428($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Kategori</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/list/" class="btn btn-primary btn-xs">Daftar Kategori</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode">Kode Kategori</label>
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_kategori'];?>
">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Nama Kategori</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nm_kategori'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="keterangan">Keterangan</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="keterangan" name="keterangan" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['keterangan'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="induk">Induk Kategori</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="induk" name="induk" <?php if ($_smarty_tpl->tpl_vars['d']->value['parent']=='Y'){?> checked value="y" <?php }else{ ?> value="n" <?php }?>>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_induk">Kategori Induk</label>
                        <div class="col-lg-9">
							<select class="form-control" id="kode_induk" name="kode_induk">
								<?php echo $_smarty_tpl->tpl_vars['opt_induk']->value;?>

							</select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="induk">Aktif</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="aktif" name="aktif" value="y" <?php if ($_smarty_tpl->tpl_vars['d']->value['active']=='Y'){?> checked <?php }?>>
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