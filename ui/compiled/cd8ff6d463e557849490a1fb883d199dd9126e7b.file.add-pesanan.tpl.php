<?php /* Smarty version Smarty-3.1.13, created on 2023-03-14 14:03:26
         compiled from "ui\theme\softhash\prog\KUBOTA\add-pesanan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56755838964101c3e1f27f8-24447295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd8ff6d463e557849490a1fb883d199dd9126e7b' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\add-pesanan.tpl',
      1 => 1563445185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56755838964101c3e1f27f8-24447295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    'c' => 0,
    'cs' => 0,
    'p_cid' => 0,
    'extra_fields' => 0,
    '_c' => 0,
    'idate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64101c3e29da32_91215372',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64101c3e29da32_91215372')) {function content_64101c3e29da32_91215372($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Tambah Pesanan
                </h5>

            </div>
            <div class="ibox-content" id="ibox_form">
                <form id="invform" method="post">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="alert alert-danger" id="emsg">
                                <span id="emsgbody"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="cid" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</label>

                                        <div class="col-sm-9">
                                            <select id="cid" name="cid" class="form-control">
                                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Contact'];?>
...</option>
                                                <?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['c']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['p_cid']->value==($_smarty_tpl->tpl_vars['cs']->value['id'])){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value['phone']!=''){?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
<?php }?> <?php if ($_smarty_tpl->tpl_vars['cs']->value['email']!=''){?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];?>
<?php }?></option>
                                                <?php } ?>

                                            </select>
                                            <span class="help-block"><a href="#"
                                                                        id="contact_add">| <?php echo $_smarty_tpl->tpl_vars['_L']->value['Or Add New Customer'];?>
</a> </span>
                                        </div>
                                    </div>

                                    <?php echo $_smarty_tpl->tpl_vars['extra_fields']->value;?>


                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                                        <div class="col-sm-9">
                                            <textarea id="address" readonly class="form-control" rows="5" placeholder="Pilih Customer"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-3 control-label">Merk</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="merk" name="merk" value="KUBOTA">

                                        </div>
                                    </div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="type">Type</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="type" name="type" placeholder="Isi Type Kenderaan">
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="tahun">Tahun Buat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun Pembuatan">
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="warna">Warna</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="warna" name="warna" placeholder="Isi Warna Kenderaan">
                                        </div>
									</div>
									<div class="form-group">
										<label for="amount" class="col-sm-3 control-label">Harga OTR</label>
										<div class="col-sm-9">
											<input type="text" class="form-control amount" id="harga"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="harga" value=0 style="text-align:right">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="panjar">panjar</label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control amount" id="panjar"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="panjar" value=0 style="text-align:right">
                                        </div>
									</div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-4 control-label">Tgl Pesan</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="dd-mm-yyyy" data-auto-close="true"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <textarea class="form-control" name="notes" id="notes" rows="3"
                                  placeholder="Keterangan Tambahan ..."></textarea>
                        <br><br>
                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Simpan Pesanan
                            </button>
                        </div>


                    </div>
                </form>





            </div>
        </div>
    </div>

</div>



<input type="hidden" id="_lan_btn_save" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
">

<input type="hidden" id="_lan_no_results_found" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No results found'];?>
">

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>