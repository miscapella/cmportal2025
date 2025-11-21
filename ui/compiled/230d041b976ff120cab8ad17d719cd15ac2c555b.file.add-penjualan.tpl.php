<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 15:06:56
         compiled from "ui\theme\softhash\prog\KUBOTA\add-penjualan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1364574110637c8320a1b202-57571263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '230d041b976ff120cab8ad17d719cd15ac2c555b' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\add-penjualan.tpl',
      1 => 1563944530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1364574110637c8320a1b202-57571263',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'c' => 0,
    'cs' => 0,
    'p_cid' => 0,
    'extra_fields' => 0,
    'idate' => 0,
    '_c' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_637c8320ab0b56_55164488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637c8320ab0b56_55164488')) {function content_637c8320ab0b56_55164488($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Tambah Penjualan
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
                                        <label for="cid" class="col-sm-4 control-label">No. Pesan</label>

                                        <div class="col-sm-8">
                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">Pilih No. Pesan...</option>
                                                <?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['c']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['p_cid']->value==($_smarty_tpl->tpl_vars['cs']->value['id'])){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['no_pesan'];?>
</option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <?php echo $_smarty_tpl->tpl_vars['extra_fields']->value;?>


                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-4 control-label">Cara Pembayaran</label>

                                        <div class="col-sm-8">
                                            <label class="radio-inline"><input type="radio" id="optTunai" name="optbayar" value="tunai" checked> Tunai</label>
                                            <label class="radio-inline"><input type="radio" id="optKredit" name="optbayar" value="kredit"> Kredit</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-4 control-label">Jenis Kredit</label>

                                        <div class="col-sm-8">
                                            <select id="jenisk" name="jenisk" class="form-control">
                                                <option value="">Pilih Jenis Kredit...</option>
                                                <option value="3">Triwulan</option>
                                                <option value="4">Kuartal</option>
                                                <option value="6">Semester</option>
											</select>
                                        </div>
                                    </div>

									<div class="form-group">
										<label class="col-sm-4 control-label" for="type">Lama Kredit</label>
                                        <div class="col-sm-8">
                                            <select id="lama" name="lama" class="form-control">
                                                <option value="">Pilih Lama Kredit...</option>
                                                <option value="18">18 Bulan</option>
                                                <option value="24">24 Bulan</option>
											</select>
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="tahun">Jto Pertama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="idate1" name="idate1" datepicker
                                                   data-date-format="dd-mm-yyyy" data-auto-close="true"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
">
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
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Data Customer</a></li>
							<li><a data-toggle="tab" href="#menu1">Data Kenderaan</a></li>
							<li><a data-toggle="tab" href="#menu2">Harga - Harga</a></li>
						</ul>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<br>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Nama Customer</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="nama" name="nama" readonly>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Alamat</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="alamat" name="alamat" readonly>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">No. KTP</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="no_ktp" name="no_ktp" readonly>
			  </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="agama" name="agama" readonly>
				</div>
			</div>
			 <div class="form-group row">
			  <label class="col-sm-2 col-form-label">No. HP</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="no_hp" name="no_hp" readonly>
			  </div>
			</div>
			 <div class="form-group row">
			  <label class="col-sm-2 col-form-label">Email</label>
			  <div class="col-sm-8">
				<input type="text" class="form-control" id="email" name="email" readonly>
			  </div>
			</div>
		</div>
		<div id="menu1" class="tab-pane fade">
			<br>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">No.Chassis</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control chassis" id="chassis" name="chassis" placeholder="No. Rangka Kenderaan" style="text-transform:uppercase">
			  </div>
			  <span class="col-sm-4" id='chassis_status' style="height:auto"></span>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">No.Engine</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control chassis" id="engine" name="engine" placeholder="No. Mesin Kenderaan" style="text-transform:uppercase">
			  </div>
			  <span class="col-sm-4" id='engine_status' style="height:auto"></span>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Merk</label>
			  <div class="col-sm-4">
				<select class="form-control" id="merk" name="merk">
					<option value="">Pilih Merk</option>
					<option value="kubota">KUBOTA</option>
				</select>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Type</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control" id="type" name="type" placeholder="Type Kenderaan" style="text-transform:uppercase">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Tahun Buat</label>
			  <div class="col-sm-2">
				<input type="text" class="form-control" id="tbuat" name="tbuat" placeholder="Tahun Pembuatan">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Warna</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control" id="warna" name="warna" placeholder="Warna Kenderaan" style="text-transform:uppercase">
			  </div>
			</div>
		</div>
		<div id="menu2" class="tab-pane fade">
			<br>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Harga</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="harga" name="harga" readonly placeholder="Isi Harga Kosong Kenderaan" value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Biaya Surat</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="by_surat" name="by_surat" placeholder="Isi Baiya Surat" value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Discount</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="disc" name="disc" placeholder="Isi Discount" value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Harga On The Road</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="total" name="total" readonly value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Panjar</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="panjar" name="panjar" readonly placeholder="Isi Panjar" value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-2 col-form-label">Total Bayar Panjar</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="bayar" name="bayar" readonly placeholder="Isi Panjar" onkeypress="return isNumberKey(event)" value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			  <label class="col-sm-3 col-form-label">Sisa Panjar yang blm dibayar</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control amount" id="sisa" name="sisa" readonly placeholder="Isi Panjar" value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
			  </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Netto</label>
				<div class="col-sm-3">
					<input type="text" class="form-control amount" id="jumlah" name="jumlah" readonly value=0 style="text-align:right" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3">
				</div>
			</div>
		</div>
	</div>
                        <br><br>
                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
">
                            <input type="hidden" id="id_cust" name="id_cust">
                            <input type="hidden" id="no_pesan" name="no_pesan">
                            <input type="hidden" id="status" name="status">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Simpan Penjualan
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