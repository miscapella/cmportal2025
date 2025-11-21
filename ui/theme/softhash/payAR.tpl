{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Penerimaan Piutang</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform" method="post">
						<div class="form-group">
							<label for="subject" class="col-sm-2 control-label">{$_L['Account']}</label>
							<div class="col-sm-10">
							   <select id="account" name="account">
									<option value="">{$_L['Choose an Account']}</option>
									{$a_opt}
								</select>
							</div>
						</div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="name">No. Faktur</label>
                            <div class="col-lg-10">
                                <select id="cid" name="cid" class="form-control">
                                    <option value="">Pilih No. Faktur...</option>
                                    {foreach $c as $cs}
                                        <option value="{$cs['id']}">{$cs['invoicenum']} - {$cs['account']}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>

						<div class="form-group">
							<label for="date" class="col-sm-2 control-label">{$_L['Date']}</label>
							<div class="col-sm-10">
								<input type="text" class="form-control datepicker"  value="{date('d-m-Y')}" name="date" id="date" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">
							</div>
						</div>

						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">{$_L['Description']}</label>
							<div class="col-sm-10">
							  <input type="text" id="description" name="description" class="form-control" value="Pembayaran Penjualan, INV : #">
							</div>
						</div>
						
						<div class="form-group">
							<label for="amount" class="col-sm-2 control-label">{$_L['Amount']}</label>
							<div class="col-sm-10">
								<input type="text" class="form-control amount" id="amount"  data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" name="amount">
							</div>
						</div>
						
						<div class="form-group">
							<label for="cats" class="col-sm-2 control-label">{$_L['Category']}</label>
							<div class="col-sm-10">
								<select id="cats" name="cats">
									<option value="Uncategorized">{$_L['Uncategorized']}</option>
									{$cats_opt}
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="payer_name" class="col-sm-2 control-label">{$_L['Payer']}</label>
							<div class="col-sm-10">
								<input type="text" id="payer_name" name="payer_name" class="form-control" disabled>
							</div>
						</div>

						<div class="form-group">
							<label for="subject" class="col-sm-2 control-label">{$_L['Method']}</label>
							<div class="col-sm-10">
								<select id="pmethod" name="pmethod">
									<option value="">{$_L['Select Payment Method']}</option>
									{$pms_opt}
								</select>
							</div>
						</idv>

						<div class="form-group">
							<div style="margin-left:15px">
								<button class="btn btn-sm btn-primary" type="submit" id="submit">{$_L['Save']}</button>
							</div>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}