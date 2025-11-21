{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{$paginator['found']} {$_L['Records']}. {if $paginator['found'] > 0}{$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}.{/if}</h5>
        <div class="ibox-tools">
            <!--<a href="{$_url}invoices/list-recurring/" class="btn btn-info btn-xs"><i class="fa fa-repeat"></i> {$_L['Manage Recurring Invoices']}</a>-->
            <a href="{$_url}purchase/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> {$_L['Add Invoice']}</a>

        </div>
    </div>
	{*<div class="ibox-content">
					<div class="form-group">
		<a href="{$_url}purchase/stock/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Terima</a>
		</div>
		<div class="row filter">
			<div class="col-md-16">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="cid" class="col-sm-2 control-label">Supplier</label>

						<div class="col-sm-10">
							<select id="cid" name="cid" class="form-control">
								<option value="">Pilih Supplier...</option>
								{foreach $c as $cs}
									<option value="{$cs['id']}"
											{if $p_cid eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
								{/foreach}

							</select>
							<span class="help-block"><a href="#"
														id="contact_add">| Atau Tambah Supplier</a> </span>
						</div>
					</div>
                                    <div class="form-group">
                                        <label for="inputPassword3"
                                               class="col-sm-2 control-label">{$_L['Address']}</label>

                                        <div class="col-sm-10">
                                            <textarea id="address" readonly class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
				</div>
			</div>
		</div>
	</div>*}
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th>#Inv Num.</th>
                <th>{$_L['Account']}</th>
                <th>{$_L['Amount']}</th>
                <th>{$_L['Invoice Date']}</th>
                <th>{$_L['Due Date']}</th>
                <th>{$_L['Status']}</th>
                <th>Tgl Terima</th>
                <th class="text-right">{$_L['Manage']}</th>
            </tr>
            </thead>
            <tbody>

            {foreach $d as $ds}
                <tr>
                    <td><a href="{$_url}purchase/view/{$ds['id']}/">{$ds['invoicenum']}<!--{if $ds['cn'] neq ''} {$ds['cn']} {else} {$ds['id']} {/if}--></a> </td>
                    <td><a href="{$_url}supplier/view/{$ds['userid']}/">{$ds['account']}</a> </td>
                    <td class="amount" data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" align="right">{$ds['total']}</td>
                    <td align="center">{date( $_c['df'], strtotime($ds['date']))}</td>
                    <td align="center">{date( $_c['df'], strtotime($ds['duedate']))}</td>
                    <td>
                       {ib_lan_get_line($ds['status'])}

                    </td>
                    <td align="center">{if $ds['tgl_terima'] neq Null} {date( $_c['df'], strtotime($ds['tgl_terima']))} {/if}</td>
                    <td class="text-right">
                        <a href="{$_url}purchase/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> {$_L['View']}</a>
                    	{if $ds['tgl_terima'] eq Null}
                            <a href="{$_url}purchase/stock/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Terima</a>
                            <a href="{$_url}purchase/edit/{$ds['id']}/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                            <a href="#" class="btn btn-danger btn-xs cdelete" id="iid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                        {/if}
                    </td>
                </tr>
            {/foreach}

            </tbody>
        </table>
{$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}