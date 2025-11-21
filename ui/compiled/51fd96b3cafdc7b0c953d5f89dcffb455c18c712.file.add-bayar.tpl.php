<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:26
         compiled from "ui\theme\softhash\prog\KUBOTA\add-bayar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3032222686358a59a7863e6-74716382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51fd96b3cafdc7b0c953d5f89dcffb455c18c712' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\add-bayar.tpl',
      1 => 1565164977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3032222686358a59a7863e6-74716382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'd' => 0,
    'ds' => 0,
    'e' => 0,
    'es' => 0,
    'idate' => 0,
    '_L' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a59a813103_65455616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a59a813103_65455616')) {function content_6358a59a813103_65455616($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Tambah Pembayaran Angsuran
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
                                        <label for="cid" class="col-sm-4 control-label">No. Jual</label>

                                        <div class="col-sm-8">
                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">Pilih No. Jual...</option>
                                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_jual'];?>
</option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-4 control-label">Nama</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Pilih No. Jual" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cid" class="col-sm-4 control-label">No. Cetak</label>

                                        <div class="col-sm-4">
                                            <select id="cid1" name="cid1" class="form-control">
                                                <option value="">Pilih No. Cetak...</option>
                                                <?php  $_smarty_tpl->tpl_vars['es'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['es']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['es']->key => $_smarty_tpl->tpl_vars['es']->value){
$_smarty_tpl->tpl_vars['es']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['es']->value['no_cetak'];?>
"><?php echo $_smarty_tpl->tpl_vars['es']->value['no_cetak'];?>
</option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-4 control-label">Tgl Kwitansi</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="dd-mm-yyyy" data-auto-close="true"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-4 control-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                                        <div class="col-sm-8">
                                            <textarea id="address" readonly class="form-control" rows="5" placeholder="Pilih No. Pesan"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="panel panel-success">
								<div class="panel-heading">Angsuran, Tunggakkan dan Denda</div>
								<div class="panel-body">
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label" id='tangs' name='tangs'>Angsuran</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="angsuran"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="angsuran" value=0 style="text-align:right" readonly>
												</div>
											</div>
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">Jlh Tunggak</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="tunggak"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="tunggak" value=0 style="text-align:right" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label" for="panjar">Total Piutang</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="piutang"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="piutang" value=0 style="text-align:right" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">Jlh Denda</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="tdenda"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="tdenda" value=0 style="text-align:right" readonly>
												</div>
											</div>
										</div>
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">&nbsp;</label>
												<div class="col-sm-8">&nbsp;</div>
											</div>
										</div>
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">Total All Piutang</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="tpiutang"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="tpiutang" value=0 style="text-align:right" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="panel panel-primary">
								<div class="panel-heading">Pembayaran</div>
								<div class="panel-body">
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-4 control-label" for="panjar">Jumlah Bayar</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="jumlah"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="jumlah" value=0 style="text-align:right">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-4 control-label" for="panjar">Jumlah Bayar Denda</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="jumlah1"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="jumlah1" value=0 style="text-align:right">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="panel panel-warning">
								<div class="panel-heading">Total Pembayaran</div>
								<div class="panel-body">
									<div class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-4 control-label" for="panjar">Total Bayar</label>
											<div class="col-sm-8">
												<input type="text" class="form-control amount" id="total"  data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3" name="total" value=0 style="text-align:right" readonly>
											</div>
										</div>
									</div>
									<textarea class="form-control" name="terbilang" id="terbilang" rows="3"
											  placeholder="Terbilang ..." readonly></textarea>
								</div>
							</div>
						</div>

                        <br><br>
                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
">
                            <input type="hidden" id="id_cust" name="id_cust">
                            <input type="hidden" id="no_jual" name="no_jual">
                            
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Simpan
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