{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Info Mutasi</h5>
				<div class="ibox-tools">
					<a href="{$_url}mutasi/list" class="btn btn-primary btn-xs">Back</a>
					
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form class="form-horizontal" id="rform">
                    <div class="form-group"><label class="col-lg-3 control-label" for="NO_BAST" >NO_BAST</label>
                        <div class="col-lg-9"><input type="text" id="NO_BAST" name="NO_BAST" class="form-control" value="{$d['NO_BAST']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_bast">TGL_BAST</label>
                        <div class="col-lg-9"><input type="text" id="tgl_bast" name="tgl_bast" class="form-control" value="{$d['TGL_BAST']|date_format:'%d-%m-%Y %H:%M:%S'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_chassis">NO_CHASSIS</label>
                        <div class="col-lg-9"><input type="text" id="no_chassis"name="no_chassis"class="form-control"value="{$d['NO_CHASSIS']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_engine">NO_ENGINE</label>
                        <div class="col-lg-9"><input type="text" id="no_engine"name="no_engine"class="form-control"value="{$d['NO_ENGINE']}" disabled></div>
                    </div> 
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_type">KODE_TYPE</label>
                        <div class="col-lg-9"><input type="text" id="kode_type"name="kode_type"class="form-control"value="{$d['KODE_TYPE']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_sumber">KODE_SUMBER</label>
                        <div class="col-lg-9"><input type="text" id="kode_sumber"name="kode_sumber"class="form-control"value="{$d['KODE_SUMBER']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_tujuan">KODE_TUJUAN</label>
                        <div class="col-lg-9"><input type="text" id="kode_tujuan"name="kode_tujuan"class="form-control"value="{$d['KODE_TUJUAN']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="keterangan">KETERANGAN</label>
                        <div class="col-lg-9"><input type="text" id="keterangan"name="keterangan"class="form-control"value="{$d['KETERANGAN']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="asuransi">ASURANSI</label>
                        <div class="col-lg-9"><input type="text" id="asuransi"name="asuransi"class="form-control"value="{$d['ASURANSI']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="operator">OPERATOR</label>
                        <div class="col-lg-9"><input type="text" id="operator"name="operator"class="form-control"value="{$d['OPERATOR']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="angkats">ANGKATS</label>
                        <div class="col-lg-9"><input type="text" id="angkats"name="angkats"class="form-control"value="{$d['ANGKATS']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="TGLINPUT">TGLINPUT</label>
                        <div class="col-lg-9"><input type="text" id="TGLINPUT"name="TGLINPUT"class="form-control"value="{$d['TGLINPUT']|date_format:'%d-%m-%Y %H:%M:%S'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ADDDATE">ADDDATE</label>
                        <div class="col-lg-9"><input type="text" id="ADDDATE"name="ADDDATE"class="form-control"value="{$d['ADDDATE']|date_format:'%d-%m-%Y %H:%M:%S'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="addby">ADDBY</label>
                        <div class="col-lg-9"><input type="text" id="addby"name="addby"class="form-control"value="{$d['ADDBY']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="editdate">EDITDATE</label>
                        <div class="col-lg-9"><input type="text" id="editdate"name="editdate"class="form-control"value="{$d['EDITDATE']|date_format:'%d-%m-%Y %H:%M:%S'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="editby">EDITBY</label>
                        <div class="col-lg-9"><input type="text" id="editby"name="editby"class="form-control"value="{$d['EDITBY']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="strlokasi">STRLOKASI</label>
                        <div class="col-lg-9"><input type="text" id="strlokasi"name="strlokasi"class="form-control"value="{$d['STRLOKASI']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_urut_beli">NO_URUT_BELI</label>
                        <div class="col-lg-9"><input type="text" id="no_urut_beli"name="no_urut_beli"class="form-control"value="{$d['NO_URUT_BELI']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="diketahui">DIKETAHUI</label>
                        <div class="col-lg-9"><input type="text" id="diketahui"name="diketahui"class="form-control"value="{$d['DIKETAHUI']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm">TGL_CONFIRM</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm"name="tgl_confirm"class="form-control"value="{$d['TGL_CONFIRM']|date_format:'%d-%m-%Y %H:%M:%S'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="confirmby">CONFIRMBY</label>
                        <div class="col-lg-9"><input type="text" id="confirmby"name="confirmby"class="form-control"value="{$d['CONFIRMBY']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_btlconfirm">TGL_BTLCONFIRM</label>
                        <div class="col-lg-9"><input type="text" id="tgl_btlconfirm"name="tgl_btlconfirm"class="form-control"value="{$d['TGL_BTLCONFIRM']|date_format:'%d-%m-%Y %H:%M:%S'}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="batal_confirmby">BATAL_CONFIRMBY</label>
                        <div class="col-lg-9"><input type="text" id="batal_confirmby"name="batal_confirmby"class="form-control"value="{$d['BATAL_CONFIRMBY']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alasanbatal">ALASANBATAL</label>
                        <div class="col-lg-9"><input type="text" id="alasanbatal"name="alasanbatal"class="form-control"value="{$d['ALASANBATAL']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="diterima">DITERIMA</label>
                        <div class="col-lg-9"><input type="text" id="diterima"name="diterima"class="form-control"value="{$d['DITERIMA']}" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="noconfirm">NOCONFIRM</label>
                        <div class="col-lg-9"><input type="text" id="noconfirm"name="noconfirm"class="form-control"value="{$d['NOCONFIRM']}" disabled></div>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}