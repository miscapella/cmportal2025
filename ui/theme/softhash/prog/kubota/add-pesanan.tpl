{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
					Tambah Pesanan
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
                                        <label for="cid" class="col-sm-3 control-label">{$_L['Customer']}</label>

                                        <div class="col-sm-9">
                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">{$_L['Select Contact']}...</option>
                                                {foreach $c as $cs}
                                                    <option value="{$cs['id']}"
                                                            {if $p_cid eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['phone'] neq ''}- {$cs['phone']}{/if} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                                {/foreach}

                                            </select>
                                            <span class="help-block"><a href="#"
                                                                        id="contact_add">| {$_L['Or Add New Customer']}</a> </span>
                                        </div>
                                    </div>

                                    {$extra_fields}

                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-3 control-label">{$_L['Address']}</label>

                                        <div class="col-sm-9">
                                            <textarea id="address" readonly class="form-control" rows="5" placeholder="Pilih Customer"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-3 control-label">Merk</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="merk" name="merk" value="KUBOTA">

                                        </div>
                                    </div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="type">Type</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="type" name="type" placeholder="Isi Type Kenderaan">
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="tahun">Tahun Buat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun Pembuatan">
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="warna">Warna</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="warna" name="warna" placeholder="Isi Warna Kenderaan">
                                        </div>
									</div>
									<div class="form-group">
										<label for="amount" class="col-sm-3 control-label">Harga OTR</label>
										<div class="col-sm-9">
											<input type="text" class="form-control amount" id="harga"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="harga" value=0 style="text-align:right">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="panjar">panjar</label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control amount" id="panjar"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="panjar" value=0 style="text-align:right">
                                        </div>
									</div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-4 control-label">Tgl Pesan</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="dd-mm-yyyy" data-auto-close="true"
                                                   value="{$idate}">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <textarea class="form-control" name="notes" id="notes" rows="3"
                                  placeholder="Keterangan Tambahan ..."></textarea>
                        <br><br>
                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="{$_c['dec_point']}">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Simpan Pesanan
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