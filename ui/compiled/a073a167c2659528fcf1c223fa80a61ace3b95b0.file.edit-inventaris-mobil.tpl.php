<?php /* Smarty version Smarty-3.1.13, created on 2022-11-03 16:38:16
         compiled from "ui\theme\softhash\prog\GAS\edit-inventaris-mobil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109826481463638c08d219e7-34680442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a073a167c2659528fcf1c223fa80a61ace3b95b0' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-inventaris-mobil.tpl',
      1 => 1663236678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109826481463638c08d219e7-34680442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'tglstnk' => 0,
    'tglpajak' => 0,
    'options' => 0,
    'time' => 0,
    '_theme' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63638c08db3b26_11106971',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63638c08db3b26_11106971')) {function content_63638c08db3b26_11106971($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Mobil Inventaris</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list" class="btn btn-primary btn-xs">List Mobil Inventaris</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">Nomor Polisi <font style="font-size:20px;color:red">*</font></label>
                        <div class="col-lg-9"><input type="text" id="nopolisi" name="nopolisi" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_POLISI'];?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="pemakai">Di Pakai Oleh</label>
                        <div class="col-lg-9"><input type="text" id="pemakai" name="pemakai" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['PEMAKAI'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tglstnk">Tanggal STNK</label>
						<div class="col-lg-9"><input type="text" id="tglstnk" name="tglstnk" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value=<?php if ($_smarty_tpl->tpl_vars['tglstnk']->value!=null){?><?php echo $_smarty_tpl->tpl_vars['tglstnk']->value;?>
<?php }?>>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tglpajak">Tanggal Pajak</label>
						<div class="col-lg-9"><input type="text" id="tglpajak" name="tglpajak" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value=<?php if ($_smarty_tpl->tpl_vars['tglpajak']->value!=null){?><?php echo $_smarty_tpl->tpl_vars['tglpajak']->value;?>
<?php }?>>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="cabang">Cabang <font style="font-size:20px;color:red">*</font></label>
						<div class="col-lg-9">
							<select class="form-control" id="cabang" name="cabang">
								<?php echo $_smarty_tpl->tpl_vars['options']->value;?>

							</select>
                        </div>
                    </div>
					<div class="nav-tabs-wrapper">
						<ul class="nav nav-tabs dragscroll horizontal">
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabA">Data Kenderaan</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabB">Foto Kenderaan</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabC">Data Transaksi</a></li>
						</ul>
					</div>

					<span class="nav-tabs-wrapper-border" role="presentation"></span>

					<div class="tab-content">
						<div class="tab-pane fade" id="tabA"> <!--in active-->
							<div class="wrapper-content">
								<div class="form-group"><label class="col-lg-3 control-label" for="nochassis">Nomor Chassis</label>
									<div class="col-lg-9"><input type="text" id="nochassis" name="nochassis" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_CHASSIS'];?>
">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="noengine">Nomor Engine</label>
									<div class="col-lg-9"><input type="text" id="noengine" name="noengine" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_ENGINE'];?>
">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="nostnk">Nomor STNK</label>
									<div class="col-lg-9"><input type="text" id="nostnk" name="nostnk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_STNK'];?>
">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk Mobil</label>
									<div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['MERK'];?>
">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tipemobil">Tipe Mobil</label>
									<div class="col-lg-9"><input type="text" id="tipemobil" name="tipemobil" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['TIPE_MOBIL'];?>
">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="warna">Warna</label>
									<div class="col-lg-9"><input type="text" id="warna" name="warna" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['WARNA'];?>
">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="thnkenderaan">Tahun Kenderaan</label>
									<div class="col-lg-9"><input type="text" id="thnkenderaan" name="thnkenderaan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['THN_BUAT'];?>
">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabB">
							<div class="wrapper-content">
								<div class="form-group"><label class="col-lg-3 control-label" for="ftstnk">Nota STNK</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_STNK']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_STNK'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_STNK'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_STNK'];?>
" id="FT_STNK"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="ftstnk" name="ftstnk" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="ftstnk" name="ftstnk" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="ftpajak">Nota Pajak</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_PAJAK']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_PAJAK'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_PAJAK'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_PAJAK'];?>
" id="FT_PAJAK"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="ftpajak" name="ftpajak" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="ftpajak" name="ftpajak" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="bpkb">BPKB</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_BPKB']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_BPKB'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_BPKB'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_BPKB'];?>
" id="FT_BPKB"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="bpkb" name="bpkb" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="bpkb" name="bpkb" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tdepan">Tampak Depan</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_DEPAN']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_DEPAN'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_DEPAN'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_DEPAN'];?>
" id="FT_DEPAN"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tdepan" name="tdepan" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="tdepan" name="tdepan" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tsamping_kanan">Tampak Samping Kanan</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KANAN']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KANAN'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KANAN'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KANAN'];?>
" id="FT_SAMPING_KANAN"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tsamping_kanan" name="tsamping_kanan" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="tsamping_kanan" name="tsamping_kanan" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tsamping_kiri">Tampak Samping Kiri</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KIRI']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KIRI'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KIRI'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_SAMPING_KIRI'];?>
" id="FT_SAMPING_KIRI"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tsamping_kiri" name="tsamping_kiri" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="tsamping_kiri" name="tsamping_kiri" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tbelakang">Tampak Belakang</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_BELAKANG']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_BELAKANG'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_BELAKANG'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_BELAKANG'];?>
" id="FT_BELAKANG"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tbelakang" name="tbelakang" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="tbelakang" name="tbelakang" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="interior1">Interior Depan</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_DEPAN']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_DEPAN'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_DEPAN'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_DEPAN'];?>
" id="FT_INTERIOR_DEPAN"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="interior1" name="interior1" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="interior1" name="interior1" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="interior2">Interior Belakang</label>
									<div class="col-lg-9">
										<?php if ($_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_BELAKANG']!=''){?>
											<div class="form-group">
												<div class="col-lg-3"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_BELAKANG'];?>
" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_BELAKANG'];?>
?t=<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"></a></div>
												<div class="col-lg-1 delpic" tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['FT_INTERIOR_BELAKANG'];?>
" id="FT_INTERIOR_BELAKANG"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="interior2" name="interior2" class="form-control" autocomplete="off"></div>
											</div>
										<?php }else{ ?>
											<input type="file" id="interior2" name="interior2" class="form-control" autocomplete="off">
										<?php }?>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabC">
							<div class="wrapper-content">
								<div class="form-group"><label class="col-lg-3 control-label" for="tglservice">Tanggal Service Terakhir</label>
									<div class="col-lg-9"><input type="text" id="tglservice" name="tglservice" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="nopol1">Nomor Polisi Lama</label>
									<div class="col-lg-9"><input type="text" id="nopol1" name="nopol1" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="bystnk">By. Perpanjang STNK</label>
									<div class="col-lg-9"><input type="text" id="bystnk" name="bystnk" class="form-control text-right" readonly>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="bypajak">By. Perpanjang Pajak</label>
									<div class="col-lg-9"><input type="text" id="bypajak" name="bypajak" class="form-control text-right" readonly>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="denda">Denda STNK</label>
									<div class="col-lg-9"><input type="text" id="denda" name="denda" class="form-control text-right" readonly>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="byurus">By. Pengurusan Pihak Ketiga</label>
									<div class="col-lg-9"><input type="text" id="byurus" name="byurus" class="form-control text-right" readonly>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="total">Total Biaya</label>
									<div class="col-lg-9"><input type="text" id="total" name="total" class="form-control text-right" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="form-group" style="margin-top:20px">
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