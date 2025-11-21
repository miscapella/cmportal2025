{include file="sections/header.tpl"}
<div class="row animated fadeInDown" style="width:100%;overflow:auto">
    <div class="col-lg-12" id="sysfrm_ajaxrender" style="width:150%">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h2>KARTU PIUTANG</h2>
                {*<input type="hidden" name="iid" value="{$d['id']}" id="iid">*}
            </div>
            <div class="ibox-content">

                <div class="invoice">
                    <header class="clearfix">
                        <div class="row">
                            <div class="col-sm-6 mt-md">
                                <h2 class="h2 mt-none mb-sm text-dark text-bold">No. Jual : {$e['no_jual']}</h2>
                            </div>
                            <div class="col-sm-6 text-right mt-md mb-md">
                                <address class="ib mr-xlg">
                                    {$_c['caddress']}
                                </address>
                                <div class="ib">
                                    <img src="sysfrm/uploads/system/logo.png" alt="Logo">
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="bill-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bill-to">
                                    <p class="h5 mb-xs text-dark text-semibold"><strong>{$_L['Invoiced To']}:</strong></p>
                                    <address>
                                        {if $f['company'] neq ''}
                                            {$f['company']}
                                            <br>
                                           {$_L['ATTN']}: {$f['account']}
                                            <br>
                                            {else}
                                            {$f['account']}
                                            <br>
                                        {/if}

                                        {$f['address']} <br>
                                        {$f['city']} <br>
                                        {$f['state']} - {$f['zip']} <br>
                                        {$f['country']}
                                        <br>
                                        <strong>{$_L['Phone']}:</strong> {$f['phone']}
                                        <br>
                                        <strong>{$_L['Email']}:</strong> {$f['email']}
                                    </address>
                                </div>
								<p class="mb-none">
									<span class="text-dark">Type : </span>
									<span class="value">{$e['type_mobil']}</span>
								</p>
								<p class="mb-none">
									<span class="text-dark">Tahun Buat : </span>
									<span class="value">{$e['thn_buat']}</span>
								</p>
								<p class="mb-none">
									<span class="text-dark">Warna : </span>
									<span class="value">{$e['warna']}</span>
								</p>
                            </div>
                            <div class="col-md-6">
                                <div class="bill-data text-right">
									<p class="mb-none">
										<span class="text-dark">No. Bast : </span>
										<span class="value">{$e['no_bast']}</span>
									</p>
									<p class="mb-none">
										<span class="text-dark">No. Faktur : </span>
										<span class="value">{$e['no_faktur']}</span>
									</p>
                                    <p class="mb-none">
                                        <span class="text-dark" style="text-transform:uppercase"><b>{$e['cara']}</b></span>
										{if $e['cara']=='kredit'}
											<span style="text-transform:uppercase"> : {$e['lama']} bulan</span>
										{/if}
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark">Tanggal Bast:</span>
                                        <span class="value">{date( $_c['df'], strtotime($e['tgl_cetakbast']))}</span>
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark">{$_L['Due Date']} I:</span>
                                        <span class="value">{date( $_c['df'], strtotime($e['tgl_jto']))}</span>
                                    </p>
									<br>
                                    <h2> Harga Kosong: {$_c['currency_code']} {number_format($e['harga_kosong'],0,$_c['dec_point'],$_c['thousands_sep'])} </h2>
									<h2> Biaya Surat: {$_c['currency_code']} {number_format($d['credit'],0,$_c['dec_point'],$_c['thousands_sep'])} </h2>
									<h2> Discount: {$_c['currency_code']} {number_format($e['discount'],0,$_c['dec_point'],$_c['thousands_sep'])} </h2>
									<h2> Panjar: {$_c['currency_code']} {number_format($e['panjar'],0,$_c['dec_point'],$_c['thousands_sep'])} </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table invoice-items table-condensed table-bordered">
                            <thead>
                            <tr class="h5 text-dark">
                                <th id="cell-id" class="text-semibold">Tgl</th>
                                <th id="cell-item" class="text-semibold">Tgl Jto</th>
                                <th id="cell-item" class="text-semibold">Keterangan</th>
                                <th id="cell-price" class="text-center text-semibold">Angsuran</th>
                                <th id="cell-qty" class="text-right text-semibold">Debet Pokok</th>
                                <th id="cell-qty" class="text-right text-semibold">Debet Bunga</th>
                                <th id="cell-qty" class="text-right text-semibold">Kredit Pokok</th>
                                <th id="cell-qty" class="text-right text-semibold">Kredit Bunga</th>
                                <th id="cell-qty" class="text-right text-semibold">Lain Pokok</th>
                                <th id="cell-qty" class="text-right text-semibold">Lain Bunga</th>
                                <th id="cell-total" class="text-right text-semibold">Saldo Akhir Pokok</th>
                                <th id="cell-total" class="text-right text-semibold">Saldo Akhir Bunga</th>
                                <th id="cell-total" class="text-right text-semibold">Saldo Akhir</th>
                            </tr>
                            </thead>
                            <tbody>

							{assign "t_debp" 0}
							{assign "t_debb" 0}
							{assign "t_krep" 0}
							{assign "t_kreb" 0}
							{assign "t_lp" 0}
							{assign "t_lb" 0}
                            {foreach $d as $item}
                                <tr>
                                    <td class="text-semibold text-dark">{date( $_c['df'], strtotime($item['tgl']))}</td>
                                    <td class="text-semibold text-dark">{if $item['tgl_jto'] neq null}{date( $_c['df'], strtotime($item['tgl_jto']))}{/if}</td>
                                    <td class="text-semibold text-dark">{$item['keterangan']}</td>
                                    <td class="text-right">{if $item['angs_ke'] neq 0}{$_c['currency_code']} {number_format($item['angsuran'],0,$_c['dec_point'],$_c['thousands_sep'])}{/if}</td>
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['debet_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
									{if $item['byr_denda'] > 0}
										<td class="text-right">{$_c['currency_code']} {number_format($item['debet_bunga']+$item['byr_denda'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
									{else}
										<td class="text-right">{$_c['currency_code']} {number_format($item['debet_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
									{/if}
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['kredit_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['kredit_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['lain_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
									{if $item['byr_denda'] > 0}
										<td class="text-right">{$_c['currency_code']} {number_format($item['lain_bunga']+$item['byr_denda'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
									{else}
										<td class="text-right">{$_c['currency_code']} {number_format($item['lain_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
									{/if}
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['akhir_pokok'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['akhir_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    <td class="text-right">{$_c['currency_code']} {number_format($item['akhir_pokok']+$item['akhir_bunga'],0,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                </tr>
								{assign "t_debp" $t_debp+$item['debet_pokok']}
								{assign "t_debb" $t_debb+$item['debet_bunga']+$item['byr_denda']}
								{assign "t_krep" $t_krep+$item['kredit_pokok']}
								{assign "t_kreb" $t_kreb+$item['kredit_bunga']}
								{assign "t_lp" $t_lp+$item['lain_pokok']}
								{assign "t_lb" $t_lb+$item['lain_bunga']+$item['byr_denda']}
                            {/foreach}
							<tr>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4" class="text-center" style="background-color:#e6e6e6"><b>Grand Total</b></td>
								<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_debp,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
								<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_debb,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
								<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_krep,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
								<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_kreb,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
								<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_lp,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
								<td class="text-right" style="background-color:#e6e6e6">{$_c['currency_code']} {number_format($t_lb,0,$_c['dec_point'],$_c['thousands_sep'])}</td>
								<td colspan="3" class="text-center" style="background-color:#e6e6e6">&nbsp;</td>
							</tr>

                            </tbody>
                        </table>
                    </div>
                </div>

   {if ($trs_c neq '')}
       <h3>{$_L['Related Transactions']}</h3>
       <table class="table table-bordered sys_table">
           <th>{$_L['Date']}</th>
           <th>{$_L['Account']}</th>


           <th class="text-right">{$_L['Amount']}</th>

           <th>{$_L['Description']}</th>




           {foreach $trs as $tr}
               <tr class="{if $tr['cr'] eq '0.00'}warning {else}info{/if}">
                   <td>{date( $_c['df'], strtotime($tr['date']))}</td>
                   <td>{$tr['account']}</td>


                   <td class="text-right">{number_format($tr['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                   <td>{$tr['description']}</td>




               </tr>
           {/foreach}



       </table>
   {/if}

                {if ($d['notes']) neq ''}
                    <div class="well m-t">
                        {$d['notes']}
                    </div>
                {/if}

                {if ($emls_c neq '')}
                    <hr>
                    <h3>{$_L['Related Emails']}</h3>
                    <table class="table table-bordered sys_table">
                        <th width="20%">{$_L['Date']}</th>
                        <th>{$_L['Subject']}</th>







                        {foreach $emls as $eml}
                            <tr>
                                <td>{date( $_c['df'], strtotime($eml['date']))}</td>
                                <td>{$eml['subject']}</td>
                            </tr>
                        {/foreach}



                    </table>
                {/if}



            </div>


        </div>
    </div>
</div>

<input type="hidden" id="_lan_msg_confirm" value="{$_L['are_you_sure']}">


{include file="sections/footer.tpl"}