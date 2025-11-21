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
            <h4>LAPORAN PENJUALAN<br><br> per Periode : {$tdate}</h4>
            <table class="table table-condensed table-bordered" style="background: #ffffff;">
                <th width="8%" style="background-color:#99b3ff">{$_L['Date']}</th>
                <th width="12%" style="background-color:#99b3ff">Nama</th>
                <th width="23%" style="background-color:#99b3ff">Alamat</th>
                <th width="12%" style="background-color:#99b3ff">No. Bast</th>
                <th width="11%" style="background-color:#99b3ff">No.Serial</th>
                <th width="11%" style="background-color:#99b3ff">No.Engine</th>
                <th width="10%" style="background-color:#99b3ff">Faktur</th>
                <th width="13%" class="text-right" style="background-color:#99b3ff">Nilai (Rp)</th>

				{assign "t_tot" 0}
                {foreach $d as $ds}
                    <tr>
                        <td>{date( $_c['df'], strtotime($ds['tgl_jual']))}</td>
                        <td>{$ds['account']}</td>
                        <td>{$ds['address']}</td>
                        <td>{$ds['no_bast']}</td>
                        <td>{$ds['no_chassis']}</td>
                        <td>{$ds['no_engine']}</td>
                        <td>{$ds['no_faktur']}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['total'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                    </tr>
					{assign "t_tot" $t_tot+$ds['total']}
                {/foreach}
				<tr>
					<td colspan="7" class="text-center" style="background-color:#e6e6e6"><b>Grand Total</b></td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_tot,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
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