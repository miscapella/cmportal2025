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
                    <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">Nomor Polisi <font style="font-size:20px;color:red">*</font></label>
                        <div class="col-lg-9"><input type="text" id="nopolisi" name="nopolisi" class="form-control" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="pemakai">Di Pakai Oleh</label>
                        <div class="col-lg-9"><input type="text" id="pemakai" name="pemakai" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tglstnk">Tanggal STNK</label>
						<div class="col-lg-9"><input type="text" id="tglstnk" name="tglstnk" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tglpajak">Tanggal Pajak</label>
						<div class="col-lg-9"><input type="text" id="tglpajak" name="tglpajak" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">
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
							{*<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabC">Data Transaksi</a></li>*}
						</ul>
					</div>

					<span class="nav-tabs-wrapper-border" role="presentation"></span>

					<div class="tab-content">
						<div class="tab-pane fade" id="tabA"> <!--in active-->
							<div class="wrapper-content">
								<div class="form-group"><label class="col-lg-3 control-label" for="nochassis">Nomor Chassis</label>
									<div class="col-lg-9"><input type="text" id="nochassis" name="nochassis" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="noengine">Nomor Engine</label>
									<div class="col-lg-9"><input type="text" id="noengine" name="noengine" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="nostnk">Nomor STNK</label>
									<div class="col-lg-9"><input type="text" id="nostnk" name="nostnk" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk Mobil</label>
									<div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tipemobil">Tipe Mobil</label>
									<div class="col-lg-9"><input type="text" id="tipemobil" name="tipemobil" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="warna">Warna</label>
									<div class="col-lg-9"><input type="text" id="warna" name="warna" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="thnkenderaan">Tahun Kenderaan</label>
									<div class="col-lg-9"><input type="text" id="thnkenderaan" name="thnkenderaan" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabB">
							<div class="wrapper-content">
								<div class="form-group"><label class="col-lg-3 control-label" for="ftstnk">Nota STNK</label>
									<div class="col-lg-9"><input type="file" id="ftstnk" name="ftstnk" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="ftpajak">Nota Pajak</label>
									<div class="col-lg-9"><input type="file" id="ftpajak" name="ftpajak" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="bpkb">BPKB</label>
									<div class="col-lg-9"><input type="file" id="bpkb" name="bpkb" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tdepan">Tampak Depan</label>
									<div class="col-lg-9"><input type="file" id="tdepan" name="tdepan" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tsamping1">Tampak Samping Kanan</label>
									<div class="col-lg-9"><input type="file" id="tsamping_kanan" name="tsamping_kanan" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tsamping2">Tampak Samping Kiri</label>
									<div class="col-lg-9"><input type="file" id="tsamping_kiri" name="tsamping_kiri" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="tbelakang">Tampak Belakang</label>
									<div class="col-lg-9"><input type="file" id="tbelakang" name="tbelakang" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="interior1">Interior Depan</label>
									<div class="col-lg-9"><input type="file" id="interior1" name="interior1" class="form-control">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-3 control-label" for="interior2">Interior Belakang</label>
									<div class="col-lg-9"><input type="file" id="interior2" name="interior2" class="form-control">
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