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
            <h4>LAPORAN PIUTANG<br><br> per Periode : {$tdate}</h4>
            <table class="table table-condensed table-bordered" style="background: #ffffff;width:2000px;overflow:scroll">
                <th width="2%" style="background-color:#99b3ff">No.</th>
                <th width="5%" style="background-color:#99b3ff">Tanggal</th>
                <th width="10%" style="background-color:#99b3ff">Nama</th>
                <th width="5%" style="background-color:#99b3ff">No.Jual</th>
                <th width="5%" style="background-color:#99b3ff">No.Serial</th>
                <th width="5%" style="background-color:#99b3ff">No.Engine</th>
                <th width="7%" class="text-right" style="background-color:#99b3ff">Saldo Awal</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">Debet Pokok</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">Debet Bunga</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">Kredit Pokok</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">Kredit Bunga</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">S.Akhir Pokok</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">S.Akhir Bunga</th>
                <th width="7%" class="text-right" style="background-color:#99b3ff">Saldo Akhir</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">T. <=30</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">T. 31-60</th>
                <th width="6%" class="text-right" style="background-color:#99b3ff">T. >60</th>

				{assign "nourut" 1}
				{assign "t_awal" 0}
				{assign "t_debp" 0}
				{assign "t_debb" 0}
				{assign "t_krep" 0}
				{assign "t_kreb" 0}
				{assign "t_akhp" 0}
				{assign "t_akhb" 0}
				{assign "t_tot" 0}
				{assign "t_t1" 0}
				{assign "t_t2" 0}
				{assign "t_t3" 0}
                {foreach $d as $ds}
                    <tr>
                        <td>{$nourut}</td>
						<td>{date( $_c['df'], strtotime($ds['tgl_jual']))}</td>
                        <td>{$ds['account']}</td>
                        <td>{$ds['no_jual']}</td>
                        <td>{$ds['no_chassis']}</td>
                        <td>{$ds['no_engine']}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['awal_pokok']+$ds['awal_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['debet_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['debet_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['kredit_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['kredit_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['akhir_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['akhir_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['akhir_pokok']+$ds['akhir_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['t1'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['t2'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['t3'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                    </tr>
					{assign "nourut" $nourut+1}
					{assign "t_awal" $t_awal+$ds['awal_pokok']+$ds['awal_bunga']}
					{assign "t_debp" $t_debp+$ds['debet_pokok']}
					{assign "t_debb" $t_debb+$ds['debet_bunga']}
					{assign "t_krep" $t_krep+$ds['kredit_pokok']}
					{assign "t_kreb" $t_kreb+$ds['kredit_bunga']}
					{assign "t_akhp" $t_akhp+$ds['akhir_pokok']}
					{assign "t_akhb" $t_akhb+$ds['akhir_bunga']}
					{assign "t_tot" $t_tot+$ds['akhir_pokok']+$ds['akhir_bunga']}
					{assign "t_t1" $t_t1+$ds['t1']}
					{assign "t_t2" $t_t2+$ds['t2']}
					{assign "t_t3" $t_t3+$ds['t3']}
                {/foreach}
				<tr>
					<td colspan="6" class="text-center" style="background-color:#e6e6e6"><b>Grand Total</b></td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_awal,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_debp,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_debb,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_krep,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_kreb,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_akhp,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_akhb,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_tot,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_t1,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_t2,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
					<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_t3,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
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