{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Tambah Panjar
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
                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">Pilih No. Pesan...</option>
                                                {foreach $d as $ds}
                                                    <option value="{$ds['id']}">{$ds['no_pesan']}</option>
                                                {/foreach}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-3 control-label">Nama</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Pilih No. Pesan" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cid" class="col-sm-3 control-label">No. Cetak</label>

                                        <div class="col-sm-4">
                                            <select id="cid1" name="cid1" class="form-control">
                                                <option value="">Pilih No. Pesan...</option>
                                                {foreach $e as $es}
                                                    <option value="{$es['no_cetak']}">{$es['no_cetak']}</option>
                                                {/foreach}

                                            </select>
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="amount" class="col-sm-3 control-label">Sisa</label>
										<div class="col-sm-9">
											<input type="text" class="form-control amount" id="sisa"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="sisa" value=0 style="text-align:right" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="panjar">Jumlah Bayar</label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control amount" id="jumlah"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="jumlah" value=0 style="text-align:right">
                                        </div>
									</div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-3 control-label">Tgl Panjar</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="dd-mm-yyyy" data-auto-close="true"
                                                   value="{$idate}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-3 control-label">{$_L['Address']}</label>

                                        <div class="col-sm-9">
                                            <textarea id="address" readonly class="form-control" rows="5" placeholder="Pilih No. Pesam"></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="amount" class="col-sm-3 control-label">Total Panjar</label>
										<div class="col-sm-9">
											<input type="text" class="form-control amount" id="tpanjar"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="tpanjar" value=0 style="text-align:right" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="panjar">Total Bayar</label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control amount" id="tbayar"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="tbayar" value=0 style="text-align:right" readonly>
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
                            <input type="hidden" id="id_cust" name="id_cust">
                            <input type="hidden" id="no_pesan" name="no_pesan">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Simpan
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