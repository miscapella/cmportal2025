<?php /* Smarty version Smarty-3.1.13, created on 2023-08-07 10:52:00
         compiled from "ui\theme\softhash\prog\KEBUN\edit-itemstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4914156464bf68998c2880-55995633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e1d85b28cf576c15f2cb5a1065385d9e755924f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\edit-itemstock.tpl',
      1 => 1691380310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4914156464bf68998c2880-55995633',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bf6899951132_81927815',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bf6899951132_81927815')) {function content_64bf6899951132_81927815($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Item Stock</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/supplier/<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
/" class="btn btn-warning btn-xs"><i class="fa fa-user"></i> Supplier</a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list/" class="btn btn-primary btn-xs">Daftar Item Stock</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="col-lg-12"><h1 class="text-center">Detail Item</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama"><span style="color: red;">*</span> Nama Item Stock</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_item'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk</label>
                        <div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['merk'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe">Tipe</label>
                        <div class="col-lg-9"><input type="text" id="tipe" name="tipe" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tipe'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="spesifikasi">Spesifikasi</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="spesifikasi" name="spesifikasi" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['spesifikasi'];?>
</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Satuan</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuan"><span style="color: red;">*</span> Satuan Item</label>
                        <div class="col-lg-9"><input type="text" id="satuan" name="satuan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['satuan'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuanharga"><span style="color: red;">*</span> Satuan Kecil</label>
                        <div class="col-lg-9"><input type="text" id="satuanharga" name="satuanharga" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['satuan_harga'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="jumlahsatuan"><span style="color: red;">*</span> Jumlah Satuan Kecil</label>
                        <div class="col-lg-9"><input type="text" id="jumlahsatuan" name="jumlahsatuan" class="form-control desimal" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['jumlah_per_satuan'];?>
 placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty">Min Qty</label>
                        <div class="col-lg-9"><input type="text" id="qty" name="qty" class="form-control amount" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['qty_min'];?>
>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty1">Max Qty</label>
                        <div class="col-lg-9"><input type="text" id="qty1" name="qty1" class="form-control amount" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['qty_max'];?>
>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="reorder">Reorder Time (Hari)</label>
                        <div class="col-lg-9"><input type="number" id="reorder" name="reorder" class="form-control" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['reorder_time'];?>
>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tempa">Barang Tempa</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="tempa" name="tempa" value="y" <?php if ($_smarty_tpl->tpl_vars['d']->value['tempa']=='Y'){?> checked <?php }?>>
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