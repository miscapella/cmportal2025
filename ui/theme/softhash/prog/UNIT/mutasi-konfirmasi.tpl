{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mutasi Konfirmasi</h5>
				<div class="ibox-tools">
					<a href="{$_url}mutasi/list/" class="btn btn-primary btn-xs">Back</a>
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
                    <div class="form-group"><label class="col-lg-3 control-label" for="chassis">NO CHASSIS</label>
                        <div class="col-lg-9"><input type="text" id="chassis"name="chassis"class="form-control"value="{$d['NO_CHASSIS']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="engine">NO ENGINE</label>
                        <div class="col-lg-9"><input type="text" id="engine"name="engine"class="form-control"value="{$d['NO_ENGINE']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="sumber">KODE SUMBER</label>
                        <div class="col-lg-9"><input type="text" id="sumber"name="sumber"class="form-control"value="{$d['KODE_SUMBER']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tujuan">KODE TUJUAN</label>
                        <div class="col-lg-9"><input type="text" id="tujuan"name="tujuan"class="form-control"value="{$d['KODE_TUJUAN']}" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="diterima">DITERIMA</label>
                        <div class="col-lg-9"><input type="text" id="diterima"name="diterima"class="form-control" value="{$d['DITERIMA']}" {if $d['TGL_CONFIRM']}disabled{/if}></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="catatan">CATATAN KELUAR UNIT</label>
                        <div class="col-lg-9"><input type="text" id="catatan"name="catatan"class="form-control" value="{$e['KET_KELUAR']}" {if $d['TGL_CONFIRM']}disabled{/if}></div>
                    </div>
                    {if $d['TGL_CONFIRM']}
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm">TANGGAL KONFIRMASI</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm"name="tgl_confirm"class="form-control" value="{$d['TGL_CONFIRM']|date_format:'%d-%m-%Y'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="confirm_by">KONFIRMASI OLEH</label>
                        <div class="col-lg-9"><input type="text" id="confirm_by"name="confirm_by"class="form-control" value="{$d['CONFIRMBY']}" disabled></div>
                    </div>
                    {/if}
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-warning" type="submit" id="submit" {if $d['TGL_CONFIRM']}disabled{/if}><i class="fa fa-check"></i> Konfirmasi</button>
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