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
            <h4>LAPORAN PEMBELIAN<br><br> per Periode : {$tdate}</h4>
            <table class="table table-condensed table-bordered" style="background: #ffffff;">
                <th width="8%" style="background-color:#99b3ff">{$_L['Date']}</th>
                <th width="15%" style="background-color:#99b3ff">Invoice Num</th>
                <th width="20%" style="background-color:#99b3ff">Account</th>
                <th width="8%" style="background-color:#99b3ff">Tgl Jto</th>
                <th width="14%" class="text-right" style="background-color:#99b3ff">Sub Total</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">Discount</th>
                <th width="10%" class="text-right" style="background-color:#99b3ff">PPn</th>
                <th width="14%" class="text-right" style="background-color:#99b3ff">Total</th>

				{assign "t_sub" 0}
				{assign "t_disc" 0}
				{assign "t_ppn" 0}
				{assign "t_tot" 0}
                {foreach $d as $ds}
                    <tr>
                        <td>{date( $_c['df'], strtotime($ds['date']))}</td>
                        <td>{$ds['invoicenum']}</td>
                        <td>{$ds['account']}</td>
                        <td>{date( $_c['df'], strtotime($ds['duedate']))}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['subtotal'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['discount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['tax'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['total'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                    </tr>
					{assign "t_sub" $t_sub+$ds['subtotal']}
					{assign "t_disc" $t_disc+$ds['discount']}
					{assign "t_ppn" $t_ppn+$ds['tax']}
					{assign "t_tot" $t_tot+$ds['total']}
                {/foreach}
				<tr>
					<td colspan="4" class="text-center" style="background-color:#e6e6e6"><b>Grand Total</b></td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_sub,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_disc,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_ppn,2,$_c['dec_point'],$_c['thousands_sep'])}</td>
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