{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Display Panjar
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
                                        <label for="cid" class="col-sm-3 control-label">No. Pesan</label>

                                        <div class="col-sm-9">
											<label class="form-control">{$d['no_pesan']}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-3 control-label">Nama</label>

                                        <div class="col-sm-9">
											<label class="form-control">{$account}</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cid" class="col-sm-3 control-label">No. Cetak</label>

                                        <div class="col-sm-4">
											<label class="form-control">{$d['no_cetak']}</label>
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="amount" class="col-sm-3 control-label">Panjar</label>
										<div class="col-sm-9">
											<label class="form-control amount" data-a-sign="{$_c['currency_code']}" data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" style="text-align:right">{$panjar}</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="panjar">Jumlah Bayar</label>
                                        <div class="col-sm-9">
											<label class="form-control amount" data-a-sign="{$_c['currency_code']}" data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" style="text-align:right" id="jumlah">{$d['jumlah']}</label>
                                        </div>
									</div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-3 control-label">Tgl Kwitansi</label>

                                        <div class="col-sm-9">
											<label class="form-control">{$idate}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-3 control-label">{$_L['Address']}</label>

                                        <div class="col-sm-9">
                                            <textarea id="address" readonly class="form-control" rows="5" placeholder="Pilih No. Pesan"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <textarea class="form-control" name="terbilang" id="terbilang" rows="3"
                                  placeholder="Terbilang ..." readonly></textarea>
                        <br><br>
                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="{$_c['dec_point']}">
                            <input type="hidden" id="cid" name="cid" value="{$cid}">
                            <input type="hidden" id="jlh" value="{$d['jumlah']}">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-circle-left"></i> Back
                            </button>
                        </div>


                    </div>
                </form>





            </div>
        </div>
    </div>

</div>

{* lan variables *}

<input type="hidden" id="_lan_btn_save" value="{$_L['Save']}">

<input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">

{include file="sections/footer.tpl"}