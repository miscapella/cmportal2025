{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Mobil Inventaris</h5>
                <div class="ibox-tools">
					<a href="{$_url}inventaris/list-mobil" class="btn btn-primary btn-xs">List Mobil Inventaris</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">Nomor Polisi <font style="font-size:20px;color:red">*</font></label>
                        <div class="col-lg-9"><input type="text" id="nopolisi" name="nopolisi" class="form-control" style="text-transform:uppercase" value="{$d['NO_POLISI']}" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="pemakai">Di Pakai Oleh</label>
                        <div class="col-lg-9"><input type="text" id="pemakai" name="pemakai" class="form-control" value="{$d['PEMAKAI']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tglstnk">Tanggal STNK</label>
						<div class="col-lg-9"><input type="text" id="tglstnk" name="tglstnk" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value={if $tglstnk neq null}{$tglstnk}{/if}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tglpajak">Tanggal Pajak</label>
						<div class="col-lg-9"><input type="text" id="tglpajak" name="tglpajak" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value={if $tglpajak neq null}{$tglpajak}{/if}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="cabang">Cabang <font style="font-size:20px;color:red">*</font></label>
						<div class="col-lg-9">
							<select class="form-control" id="cabang" name="cabang">
								{$options}
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
									<div class="col-lg-9"><input type="text" id="nochassis" name="nochassis" class="form-control" value="{$d['NO_CHASSIS']}">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="noengine">Nomor Engine</label>
									<div class="col-lg-9"><input type="text" id="noengine" name="noengine" class="form-control" value="{$d['NO_ENGINE']}">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="nostnk">Nomor STNK</label>
									<div class="col-lg-9"><input type="text" id="nostnk" name="nostnk" class="form-control" value="{$d['NO_STNK']}">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk Mobil</label>
									<div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" value="{$d['MERK']}">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tipemobil">Tipe Mobil</label>
									<div class="col-lg-9"><input type="text" id="tipemobil" name="tipemobil" class="form-control" value="{$d['TIPE_MOBIL']}">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="warna">Warna</label>
									<div class="col-lg-9"><input type="text" id="warna" name="warna" class="form-control" value="{$d['WARNA']}">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="thnkenderaan">Tahun Kenderaan</label>
									<div class="col-lg-9"><input type="text" id="thnkenderaan" name="thnkenderaan" class="form-control" value="{$d['THN_BUAT']}">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabB">
							<div class="wrapper-content">
								<div class="form-group"><label class="col-lg-3 control-label" for="ftstnk">Nota STNK</label>
									<div class="col-lg-9">
										{if $d['FT_STNK'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_STNK']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_STNK']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_STNK']}" id="FT_STNK"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="ftstnk" name="ftstnk" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="ftstnk" name="ftstnk" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="ftpajak">Nota Pajak</label>
									<div class="col-lg-9">
										{if $d['FT_PAJAK'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_PAJAK']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_PAJAK']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_PAJAK']}" id="FT_PAJAK"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="ftpajak" name="ftpajak" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="ftpajak" name="ftpajak" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="bpkb">BPKB</label>
									<div class="col-lg-9">
										{if $d['FT_BPKB'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_BPKB']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_BPKB']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_BPKB']}" id="FT_BPKB"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="bpkb" name="bpkb" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="bpkb" name="bpkb" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tdepan">Tampak Depan</label>
									<div class="col-lg-9">
										{if $d['FT_DEPAN'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_DEPAN']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_DEPAN']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_DEPAN']}" id="FT_DEPAN"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tdepan" name="tdepan" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="tdepan" name="tdepan" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tsamping_kanan">Tampak Samping Kanan</label>
									<div class="col-lg-9">
										{if $d['FT_SAMPING_KANAN'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_SAMPING_KANAN']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_SAMPING_KANAN']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_SAMPING_KANAN']}" id="FT_SAMPING_KANAN"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tsamping_kanan" name="tsamping_kanan" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="tsamping_kanan" name="tsamping_kanan" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tsamping_kiri">Tampak Samping Kiri</label>
									<div class="col-lg-9">
										{if $d['FT_SAMPING_KIRI'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_SAMPING_KIRI']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_SAMPING_KIRI']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_SAMPING_KIRI']}" id="FT_SAMPING_KIRI"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tsamping_kiri" name="tsamping_kiri" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="tsamping_kiri" name="tsamping_kiri" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tbelakang">Tampak Belakang</label>
									<div class="col-lg-9">
										{if $d['FT_BELAKANG'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_BELAKANG']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_BELAKANG']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_BELAKANG']}" id="FT_BELAKANG"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="tbelakang" name="tbelakang" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="tbelakang" name="tbelakang" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="interior1">Interior Depan</label>
									<div class="col-lg-9">
										{if $d['FT_INTERIOR_DEPAN'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_INTERIOR_DEPAN']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_INTERIOR_DEPAN']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_INTERIOR_DEPAN']}" id="FT_INTERIOR_DEPAN"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="interior1" name="interior1" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="interior1" name="interior1" class="form-control" autocomplete="off">
										{/if}
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="interior2">Interior Belakang</label>
									<div class="col-lg-9">
										{if $d['FT_INTERIOR_BELAKANG'] neq ''}
											<div class="form-group">
												<div class="col-lg-3"><a href="{$d['FT_INTERIOR_BELAKANG']}" data-lightbox="photos"><img class="img-fluid" style="height:60px;width:120px" src="{$d['FT_INTERIOR_BELAKANG']}?t={$time}"></a></div>
												<div class="col-lg-1 delpic" tag="{$d['FT_INTERIOR_BELAKANG']}" id="FT_INTERIOR_BELAKANG"><a href="#"><img src="{$_theme}/img/drop.png"></a></div>
												<div class="foto col-lg-8"><input type="file" id="interior2" name="interior2" class="form-control" autocomplete="off"></div>
											</div>
										{else}
											<input type="file" id="interior2" name="interior2" class="form-control" autocomplete="off">
										{/if}
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
                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}