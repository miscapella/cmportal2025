{include file="sections/header.tpl"}
<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>KARTU STOCK BAHAN BAKU : {$code} - {$name}<br> per Tgl {date( $_c['df'], strtotime($fdate))} s/d {date( $_c['df'], strtotime($tdate))}</h5>
        </div>
        <div class="ibox-content">

            <table class="table table-bordered sys_table">
                <th>{$_L['Date']}</th>
                <th>Batch Number</th>
                <th class="text-right">Debet</th>
                <th class="text-right">Kredit</th>
                <th class="text-right">Saldo</th>

                {foreach $d as $ds}
                    <tr>
                        <td>{date( $_c['df'], strtotime($ds['date']))}</td>
                        <td>{$ds['batch_number']}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['debet'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['kredit'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right"><span {if $ds['saldo'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['saldo'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>

                    </tr>
                {/foreach}



            </table>
            <div class="row">
                <div class="col-md-8">
                    &nbsp;
                </div>
                <div class="col-md-4" style="text-align: right"> <form class="form-horizontal" method="post" action="{$_url}export/kartustock-bahan" target="_blank">
                        <input type="hidden" name="fdate" value="{$fdate}">
                        <input type="hidden" name="tdate" value="{$tdate}">
                        <input type="hidden" name="stype" value="{$stype}">
                        <input type="hidden" name="code" value="{$code}">
                        <input type="hidden" name="name" value="{$name}">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-print"></i> {$_L['Export for Print']}</button>

                    </form></div>
                <!--<div class="col-md-2" style="text-align: right"> <form class="form-horizontal" method="post" action="{$_url}export/pdf">
                        <input type="hidden" name="fdate" value="{$fdate}">
                        <input type="hidden" name="tdate" value="{$tdate}">
                        <input type="hidden" name="stype" value="{$stype}">
                        <input type="hidden" name="account" value="{$account}">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> {$_L['Export to PDF']}</button>-->
                    </form></div>
            </div>
        </div>
    </div>



    <!-- Widget-2 end-->
</div>
 <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

{include file="sections/footer.tpl"}
