{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Penerimaan Intransit / Titipan Cabang</h5>
				<div class="ibox-tools">
					<a href="{$_url}penerimaan/list" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form class="form-horizontal" id="rform">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="alert alert-danger" id="emsg">
                                <span id="emsgbody"></span>
                            </div>
                        </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_sampai">TGL SAMPAI</label>
                        <div class="col-lg-9"><input type="date" id="tgl_sampai"name="tgl_sampai"class="form-control"value="{$today}" required></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_chassis">NO CHASSIS</label>
                        <div class="col-lg-9"><input type="text" id="no_chassis"name="no_chassis"class="form-control"value="{$d['NO_CHASSIS']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_engine">NO ENGINE</label>
                        <div class="col-lg-9"><input type="text" id="no_engine"name="no_engine"class="form-control"value="{$d['NO_ENGINE']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_type">TIPE MOBIL</label>
                        <div class="col-lg-3"><input type="text" id="kode_type"name="kode_type"class="form-control"value="{$d['KODE_TYPE']}" readonly></div>
                        <div class="col-lg-6"><input type="text" id="nama_do"name="nama_do"class="form-control"value="{$e['NAMA_DO']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="expedisi">NAMA EXPEDISI</label>
                        <div class="col-lg-9"><input type="text" id="expedisi"name="expedisi"class="form-control"value="{$d['EXPEDISI']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kapal">KAPAL</label>
                        <div class="col-lg-9"><input type="text" id="kapal"name="kapal"class="form-control"value="{$d['KAPAL']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_berangkat">TGL BERANGKAT</label>
                        <div class="col-lg-9"><input type="text" id="tgl_berangkat"name="tgl_berangkat"class="form-control"value="{$d['TGL_BERANGKAT']|date_format:'%d-%m-%Y %H:%M:%S'}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_berangkat">AKSESORI</label>
                        <div class="col-lg-9"><input type="text" id="aksesori"name="aksesori"class="form-control"value=""></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_berangkat">KETERANGAN</label>
                        <div class="col-lg-9"><input type="text" id="keterangan"name="keterangan"class="form-control"value=""></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> Update</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
{include file="sections/footer.tpl"}