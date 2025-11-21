<?php /* Smarty version Smarty-3.1.13, created on 2023-02-20 14:27:01
         compiled from "ui\theme\softhash\prog\GAS\edit-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6797445366306ef15bd69e6-01464541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e96a117fbf1d89a4d5f0e29c500603c1e405bd38' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-inventaris.tpl',
      1 => 1676878020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6797445366306ef15bd69e6-01464541',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6306ef15cec632_60133324',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'options' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6306ef15cec632_60133324')) {function content_6306ef15cec632_60133324($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Inventaris</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/itemstock/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
/" class="btn btn-warning btn-xs"><i class="fa fa-cogs"></i> Item Stock</a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="btn btn-primary btn-xs">Daftar Inventaris</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode">Kode Inventaris</label>
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_inventaris'];?>
" disabled>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Nama Inventaris</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nm_inventaris'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kategori">Kategori</label>
                        <div class="col-lg-9">
							<select class="form-control" id="kategori" name="kategori">
								<?php echo $_smarty_tpl->tpl_vars['options']->value;?>

							</select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk</label>
                        <div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['merk'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe">Tipe</label>
                        <div class="col-lg-9"><input type="text" id="tipe" name="tipe" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tipe'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuan">Satuan</label>
                        <div class="col-lg-9"><input type="text" id="satuan" name="satuan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['satuan'];?>
">
                        </div>
                    </div>
<!--
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty">Min Qty</label>
                        <div class="col-lg-9"><input type="number" id="qty" name="qty" class="form-control" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['qty_min'];?>
>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty1">Max Qty</label>
                        <div class="col-lg-9"><input type="number" id="qty1" name="qty1" class="form-control" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['qty_max'];?>
>
                        </div>
                    </div>
-->
                    <div class="form-group"><label class="col-lg-3 control-label" for="spesifikasi">Spesifikasi</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="spesifikasi" name="spesifikasi" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['spesifikasi'];?>
</textarea>
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