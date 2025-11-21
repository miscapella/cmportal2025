{include file="sections/header.tpl"}

<!-- <div class="row">
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Persetujuan Item Stock</span>
                    <h3 class="font-bold">0</h3>
                    <a href="{$_url}itemstock/list-approve/" class="btn btn-success btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-th-list fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Persetujuan Inventaris</span>
                    <h3 class="font-bold">0</h3>
                    <a href="{$_url}inventaris/list-approve/" class="btn btn-success btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-file fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Purchase Requisition (PR)</span>
                    <h3 class="font-bold">0</h3>
                    <a href="{$_url}pembelian/list-pr-aprv/" class="btn btn-warning btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Purchase Order (PO)</span>
                    <h3 class="font-bold">0</h3>
                    <a href="{$_url}pembelian/list-po-aprv/" class="btn btn-warning btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="sort_4">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <h5>{$_L['Recent Invoices']}</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{$_L['Account']}</th>
                        <th>{$_L['Amount']}</th>
                        <th>{$_L['Invoice Date']}</th>
                        <th>{$_L['Due Date']}</th>
                        <th>{$_L['Status']}</th>
                        <th>{$_L['Type']}</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $invoices as $ds}
                        <tr>
                            <td><a href="{$_url}invoices/view/{$ds['id']}/">{$ds['invoicenum']}{if $ds['cn'] neq ''} {$ds['cn']} {else} {$ds['id']} {/if}</a> </td>
                            <td><a href="{$_url}contacts/view/{$ds['userid']}/">{$ds['account']}</a> </td>
                            <td class="amount" data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3">{$ds['total']}</td>
                            <td>{date( $_c['df'], strtotime($ds['date']))}</td>
                            <td>{date( $_c['df'], strtotime($ds['duedate']))}</td>
                            <td>
                                {ib_lan_get_line($ds['status'])}

                            </td>
                            <td>
                                {if $ds['r'] eq '0'}
                                    <span class="label label-success"><i class="fa fa-dot-circle-o"></i> {$_L['Onetime']}</span>
                                {else}
                                    <span class="label label-success"><i class="fa fa-repeat"></i> {$_L['Recurring']}</span>
                                {/if}
                            </td>
                            <td class="text-right">
                                <a href="{$_url}invoices/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> {$_L['View']}</a>
                                <a href="{$_url}invoices/edit/{$ds['id']}/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                            </td>
                        </tr>
                    {/foreach}

                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>

    <div class="row" id="sort_3">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Latest Income']}</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Date']}</th>
                        <th>{$_L['Description']}</th>
                        <th class="text-right">{$_L['Amount']}</th>
                        {foreach $inc as $incs}
                            <tr>
                                <td>{date( $_c['df'], strtotime($incs['date']))}</td>
                                <td><a href="{$_url}transactions/manage/{$incs['id']}/">{$incs['description']}</a> </td>
                                <td class="text-right">{$_c['currency_code']} {number_format($incs['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Latest Expense']}</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Date']}</th>
                        <th>{$_L['Description']}</th>
                        <th class="text-right">{$_L['Amount']}</th>
                        {foreach $exp as $exps}
                            <tr>
                                <td>{date( $_c['df'], strtotime($exps['date']))}</td>
                                <td><a href="{$_url}transactions/manage/{$exps['id']}/">{$exps['description']}</a> </td>
                                <td class="text-right">{$_c['currency_code']} {number_format($exps['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>

        </div>
    </div> -->

{include file="sections/footer.tpl"}