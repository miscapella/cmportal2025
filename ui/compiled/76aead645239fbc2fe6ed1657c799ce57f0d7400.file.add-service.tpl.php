<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 15:06:46
         compiled from "ui\theme\softhash\prog\GAS\add-service.tpl" */ ?>
<?php /*%%SmartyHeaderCode:261714103637c8316c33701-78503043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76aead645239fbc2fe6ed1657c799ce57f0d7400' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\add-service.tpl',
      1 => 1655966153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261714103637c8316c33701-78503043',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_637c8316c89ec3_83889762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637c8316c89ec3_83889762')) {function content_637c8316c89ec3_83889762($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
   
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Service</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                
                <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">No. Polisi</label>

                <div class="col-lg-4"><input type="text" id="nopolisi" name="nopolisi" class="form-control" maxlength="20" style="text-transform:uppercase" placeholder="">
                </div>
                <button type="submit" class="btn btn-sm btn-success" name="cari">Cari</button>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="tipemobil">Tipe Mobil</label>

                        <div class="col-lg-4"><input type="text" id="tipemobil" name="tipemobil" class="form-control" maxlength="20" style="text-transform:uppercase" placeholder="" disabled="true">

                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="pemilik">Pemilik</label>

                        <div class="col-lg-4"><input type="text" id="pemilik" name="pemilik" class="form-control" disabled="true">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="jenisservice">Jenis Service</label>

                        <div class="col-lg-4">
                            <select name="jlh" id="jlh" class="form-control">
								<option value="">Pilih</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="biaya">Estimasi Biaya</label>

                    <div class="col-lg-4"><input type="price" id="biaya" name="biaya" disabled="true" class="form-control">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="tglservice">Tanggal Service</label>

                    <div class="col-lg-4"><input type="text" id="tglservice" name="tglservice" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="cabang">Tempat Service</label>

                        <div class="col-lg-4"><input type="text" id="cabang" name="cabang" class="form-control">

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