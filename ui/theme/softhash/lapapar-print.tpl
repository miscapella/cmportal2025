<!DOCTYPE html>
<html>
<head>
    <!-- Title here -->
    <title>{$_title}</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->




    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{$app_url}sysfrm/uploads/icon/favicon.ico">

    <style type="text/css">
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
</head>


<body>
<div class="row">
    <div class="col-md-12">


        <div id="printable">
            <h4>{if isset($flag) and $flag == 1} LAPORAN HUTANG {else} LAPORAN PIUTANG {/if}<br><br> Dari Tanggal : {date( $_c['df'], strtotime($fdate))} s/d {date( $_c['df'], strtotime($tdate))}</h4>
            <table class="table table-condensed table-bordered" style="background: #ffffff;">
                <th width="8%" style="background-color:#99b3ff">{$_L['Date']}</th>
                <th width="15%" style="background-color:#99b3ff">Invoice Num</th>
                <th width="20%" style="background-color:#99b3ff">Account</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">Saldo Awal</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">Debet</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">Kredit</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">Lain</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">Saldo Akhir</th>

				{assign "t_awal" 0}
				{assign "t_debet" 0}
				{assign "t_kredit" 0}
				{assign "t_lain" 0}
				{assign "t_akhir" 0}
                {foreach $d as $ds}
                    <tr>
                        <td>{date( $_c['df'], strtotime($ds['date']))}</td>
                        <td>{$ds['id']}</td>
                        <td>{$ds['account']}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['saldo_awal'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['debet'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['kredit'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['lain'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['saldo_akhir'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                    </tr>
					{assign "t_awal" $t_awal+$ds['saldo_awal']}
					{assign "t_debet" $t_debet+$ds['debet']}
					{assign "t_kredit" $t_kredit+$ds['kredit']}
					{assign "t_lain" $t_lain+$ds['lain']}
					{assign "t_akhir" $t_akhir+$ds['saldo_akhir']}
                {/foreach}
				<tr>
					<td colspan="3" class="text-center" style="background-color:#e6e6e6"><b>Grand Total</b></td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_awal,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_debet,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_kredit,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_lain,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_akhir,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
				</tr>
            </table>
        </div>
        <button type="button" id="actprint" class="btn btn-default btn-sm no-print">{$_L['Click Here to Print']}</button>
    </div> <!-- Widget-1 end-->

    <!-- Widget-2 end-->
</div>
<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<!-- Bootstrap JS -->
<script src="{$_theme}/js/bootstrap.min.js"></script>
<!-- jQuery UI -->


<!-- Javascript for this page -->
{if isset($xfooter)}
    {$xfooter}
{/if}
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        $("#actprint").click(function() {
            window.print();
            return false;
        });

    });

</script>

</body>
</html>