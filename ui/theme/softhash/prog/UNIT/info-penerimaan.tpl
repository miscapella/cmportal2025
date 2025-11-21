{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Info Penerimaan</h5>
				<div class="ibox-tools">
					<a href="{$_url}penerimaan/history" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form class="form-horizontal" id="rform">
                    <div class="ibox-content">
                        
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
                    <div class="form-group"><label class="col-lg-3 control-label" for="warna">WARNA</label>
                        <div class="col-lg-9"><input type="text" id="warna"name="warna"class="form-control"value="{$d['WARNA']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merek">MEREK</label>
                        <div class="col-lg-9"><input type="text" id="merek"name="merek"class="form-control"value="{$d['MEREK']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_tpt">KODE_TPT</label>
                        <div class="col-lg-9"><input type="text" id="kode_tpt"name="kode_tpt"class="form-control"value="{$d['KODE_TPT']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_sampai">TGL_SAMPAI</label>
                        <div class="col-lg-9"><input type="text" id="tgl_sampai"name="tgl_sampai"class="form-control"value="{$d['TGL_SAMPAI']|date_format:'%d-%m-%Y %H:%M:%S'}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_faktur">NO_FAKTUR</label>
                        <div class="col-lg-9"><input type="text" id="no_faktur"name="no_faktur"class="form-control"value="{$d['NO_FAKTUR']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="aksesori">AKSESORI</label>
                        <div class="col-lg-9"><input type="text" id="aksesori"name="aksesori"class="form-control"value="{$d['AKSESORI']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="thn_buat">THN_BUAT</label>
                        <div class="col-lg-9"><input type="text" id="thn_buat"name="thn_buat"class="form-control"value="{$d['THN_BUAT']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_terima">TGL_CONFIRM_TERIMA</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_terima"name="tgl_confirm_terima"class="form-control"value="{$d['TGL_CONFIRM_TERIMA']|date_format:'%d-%m-%Y %H:%M:%S'}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_keluar">TGL_CONFIRM_KELUAR</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_keluar"name="tgl_confirm_keluar"class="form-control"value="{$d['TGL_CONFIRM_KELUAR']|date_format:'%d-%m-%Y %H:%M:%S'}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_terima">CONFIRMTERIMABY</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_terima"name="tgl_confirm_terima"class="form-control"value="{$d['CONFIRMTERIMABY']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_keluar">CONFIRMKELUARBY</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_keluar"name="tgl_confirm_keluar"class="form-control"value="{$d['CONFIRMKELUARBY']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ket_terima">KET_TERIMA</label>
                        <div class="col-lg-9"><input type="text" id="ket_terima"name="ket_terima"class="form-control"value="{$d['KET_TERIMA']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ket_keluar">KET_KELUAR</label>
                        <div class="col-lg-9"><input type="text" id="ket_keluar"name="ket_keluar"class="form-control"value="{$d['KET_KELUAR']}" readonly></div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
{include file="sections/footer.tpl"}