{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Mobil Inventaris</h5>
                <div class="ibox-tools">
					<a href="{$_url}inventaris/listbengkel/" class="btn btn-primary btn-xs">List Mobil Inventaris</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
                    
                    <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">Nomor Polisi</label>

                        <div class="col-lg-9"><input type="text" id="nopolisi" name="nopolisi" class="form-control" style="text-transform:uppercase">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="pemakai">Di Pakai Oleh</label>

                        <div class="col-lg-9"><input type="text" id="pemakai" name="pemakai" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nostnk">Nomor STNK</label>

                        <div class="col-lg-9"><input type="text" id="nostnk" name="nostnk" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nochassis">Nomor Chassis</label>

                        <div class="col-lg-9"><input type="text" id="nochassis" name="nochassis" class="form-control">

                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="noengine">Nomor Engine</label>

                        <div class="col-lg-9"><input type="text" id="noengine" name="noengine" class="form-control">

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

                    <div class="form-group"><label class="col-lg-3 control-label" for="tglstnk">Tanggal STNK</label>

                    <div class="col-lg-9"><input type="text" id="tglstnk" name="tglstnk" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="tglservice">Tanggal Service Terakhir</label>

                    <div class="col-lg-9"><input type="text" id="tglservice" name="tglservice" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="cabang">Cabang</label>

                    <div class="col-lg-9"><input type="text" id="cabang" name="cabang" class="form-control">

                        </div>
                    </div>




                    <div class="form-group">
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