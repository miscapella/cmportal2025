{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Mobil Inventaris</h5>
				<div class="ibox-tools">
					<a href="{$_url}service/list" class="btn btn-primary btn-xs">List Mobil Service</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                <div class="form-group"><label class="col-lg-3 control-label" for="tipemobil">Tipe Mobil</label>

                <div class="col-lg-9"><input type="text" id="tipemobil" name="tipemobil" class="form-control" value="{$d['TIPE_MOBIL']}">

                </div>
                </div>

                <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">Nomor Polisi</label>

                <div class="col-lg-9"><input type="text" id="nopolisi" name="nopolisi" class="form-control" disabled="true" value="{$d['NO_POLISI']}">

                </div>
                </div>
                <div class="form-group"><label class="col-lg-3 control-label" for="pemilik">Pemilik</label>

                <div class="col-lg-9"><input type="text" id="pemilik" name="pemilik" class="form-control" disabled="true" value="{$d['PEMILIK']}">

                </div>
                </div>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenisservice">Jenis Service</label>

                <div class="col-lg-9"><input type="text" id="jenisservice" name="jenisservice" class="form-control" value="{$d['JENIS']}">

                </div>
                </div>


                <div class="form-group"><label class="col-lg-3 control-label" for="biaya">Estimasi Biaya</label>

                <div class="col-lg-9"><input type="text" id="biaya" name="biaya" class="form-control" value="{$d['BIAYA']}">

                </div>
                </div>

                <div class="form-group"><label class="col-lg-3 control-label" for="tglservice">Tanggal Service Terakhir</label>
                <div class="col-lg-9"><input type="text" id="tglservice" name="tglservice" class="form-control" value="{$tglservice}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">
                
                </div>
                </div>

                <div class="form-group"><label class="col-lg-3 control-label" for="cabang">Cabang</label>

                <div class="col-lg-9"><input type="text" id="cabang" name="cabang" class="form-control" value="{$d['CABANG']}">

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