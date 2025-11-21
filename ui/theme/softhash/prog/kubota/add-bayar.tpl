{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Tambah Pembayaran Angsuran
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
                                        <label for="cid" class="col-sm-4 control-label">No. Jual</label>

                                        <div class="col-sm-8">
                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">Pilih No. Jual...</option>
                                                {foreach $d as $ds}
                                                    <option value="{$ds['id']}">{$ds['no_jual']}</option>
                                                {/foreach}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-4 control-label">Nama</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Pilih No. Jual" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cid" class="col-sm-4 control-label">No. Cetak</label>

                                        <div class="col-sm-4">
                                            <select id="cid1" name="cid1" class="form-control">
                                                <option value="">Pilih No. Cetak...</option>
                                                {foreach $e as $es}
                                                    <option value="{$es['no_cetak']}">{$es['no_cetak']}</option>
                                                {/foreach}

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-4 control-label">Tgl Kwitansi</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="dd-mm-yyyy" data-auto-close="true"
                                                   value="{$idate}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-4 control-label">{$_L['Address']}</label>

                                        <div class="col-sm-8">
                                            <textarea id="address" readonly class="form-control" rows="5" placeholder="Pilih No. Pesan"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="panel panel-success">
								<div class="panel-heading">Angsuran, Tunggakkan dan Denda</div>
								<div class="panel-body">
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label" id='tangs' name='tangs'>Angsuran</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="angsuran"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="angsuran" value=0 style="text-align:right" readonly>
												</div>
											</div>
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">Jlh Tunggak</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="tunggak"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="tunggak" value=0 style="text-align:right" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label" for="panjar">Total Piutang</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="piutang"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="piutang" value=0 style="text-align:right" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">Jlh Denda</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="tdenda"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="tdenda" value=0 style="text-align:right" readonly>
												</div>
											</div>
										</div>
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">&nbsp;</label>
												<div class="col-sm-8">&nbsp;</div>
											</div>
										</div>
										<div class="form-horizontal">
											<div class="form-group">
												<label for="amount" class="col-sm-4 control-label">Total All Piutang</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="tpiutang"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="tpiutang" value=0 style="text-align:right" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="panel panel-primary">
								<div class="panel-heading">Pembayaran</div>
								<div class="panel-body">
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-4 control-label" for="panjar">Jumlah Bayar</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="jumlah"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="jumlah" value=0 style="text-align:right">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-4 control-label" for="panjar">Jumlah Bayar Denda</label>
												<div class="col-sm-8">
													<input type="text" class="form-control amount" id="jumlah1"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="jumlah1" value=0 style="text-align:right">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="panel panel-warning">
								<div class="panel-heading">Total Pembayaran</div>
								<div class="panel-body">
									<div class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-4 control-label" for="panjar">Total Bayar</label>
											<div class="col-sm-8">
												<input type="text" class="form-control amount" id="total"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="total" value=0 style="text-align:right" readonly>
											</div>
										</div>
									</div>
									<textarea class="form-control" name="terbilang" id="terbilang" rows="3"
											  placeholder="Terbilang ..." readonly></textarea>
								</div>
							</div>
						</div>

                        <br><br>
                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="{$_c['dec_point']}">
                            <input type="hidden" id="id_cust" name="id_cust">
                            <input type="hidden" id="no_jual" name="no_jual">
                            {*<input type="hidden" id="idate1" name="idate1" value="{$idate1}">*}
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