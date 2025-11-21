<?php /* Smarty version Smarty-3.1.13, created on 2023-08-07 10:50:41
         compiled from "ui\theme\softhash\prog\KEBUN\add-itemstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83404253364be3795bf3b59-90184267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '065ae1dce12c6cbccc72055d96c4e7bd9fe82b85' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-itemstock.tpl',
      1 => 1691380239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83404253364be3795bf3b59-90184267',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64be3795c6fd74_74428621',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64be3795c6fd74_74428621')) {function content_64be3795c6fd74_74428621($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list/" class="btn btn-primary btn-xs">Daftar Item Stock</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
                    <div class="col-lg-12"><h1 class="text-center">Detail Item</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama"><span style="color: red;">*</span> Nama Item Stock</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Item Stock">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk</label>
                        <div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" placeholder="Merk Item Stock">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe">Tipe</label>
                        <div class="col-lg-9"><input type="text" id="tipe" name="tipe" class="form-control" placeholder="Tipe Item Stock">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="spesifikasi">Spesifikasi</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="spesifikasi" name="spesifikasi" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Satuan</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuan"><span style="color: red;">*</span> Satuan Item</label>
                        <div class="col-lg-9"><input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan Item Stock">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuanharga"><span style="color: red;">*</span> Satuan Kecil</label>
                        <div class="col-lg-9"><input type="text" id="satuanharga" name="satuanharga" class="form-control" placeholder="Satuan Kecil Item Stock">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="jumlahsatuan"><span style="color: red;">*</span> Jumlah Satuan Kecil</label>
                        <div class="col-lg-9"><input type="text" id="jumlahsatuan" name="jumlahsatuan" class="form-control desimal" value=0>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty">Min Qty</label>
                        <div class="col-lg-9"><input type="text" id="qty" name="qty" class="form-control amount" value=0>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty1">Max Qty</label>
                        <div class="col-lg-9"><input type="text" id="qty1" name="qty1" class="form-control amount" value=0>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="reorder">Reorder Time (Hari)</label>
                        <div class="col-lg-9"><input type="number" id="reorder" name="reorder" class="form-control" value=0>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tempa">Barang Tempa</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="tempa" name="tempa" value="y" <?php if ($_smarty_tpl->tpl_vars['d']->value['tempa']=='Y'){?> checked <?php }?>>
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