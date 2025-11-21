<?php /* Smarty version Smarty-3.1.13, created on 2023-03-23 10:14:34
         compiled from "ui\theme\softhash\prog\GAS\add-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107537581763032ae7bc5624-86523736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2337fdff9e06b711a9f5be2f06d6b34b53ed4fa' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\add-inventaris.tpl',
      1 => 1679541272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107537581763032ae7bc5624-86523736',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63032ae7bebd48_67699560',
  'variables' => 
  array (
    '_url' => 0,
    'options' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63032ae7bebd48_67699560')) {function content_63032ae7bebd48_67699560($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Inventaris</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="btn btn-primary btn-xs">Daftar Inventaris</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
                    

                    <div class="form-group"><label class="col-lg-3 control-label" for="nama"><span style="color: red;">*</span> Nama Inventaris</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control">
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
                        <div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe">Tipe</label>
                        <div class="col-lg-9"><input type="text" id="tipe" name="tipe" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuan">Satuan</label>
                        <div class="col-lg-9"><input type="text" id="satuan" name="satuan" class="form-control">
                        </div>
                    </div>
<!--
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty">Min Qty</label>
                        <div class="col-lg-9"><input type="number" id="qty" name="qty" class="form-control" value=0>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty1">Max Qty</label>
                        <div class="col-lg-9"><input type="number" id="qty1" name="qty1" class="form-control" value=0>
                        </div>
                    </div>
-->
                    <div class="form-group"><label class="col-lg-3 control-label" for="spesifikasi">Spesifikasi</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="spesifikasi" name="spesifikasi" rows="5"></textarea>
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