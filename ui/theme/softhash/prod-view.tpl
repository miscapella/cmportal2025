{include file="sections/header.tpl"}
<div class="row animated fadeInDown">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="exampleInputEmail1">{$_L['Unique Invoice URL']}:</label>
            <input type="text" class="form-control" id="invoice_public_url" onClick="this.setSelectionRange(0, this.value.length)" value="{$_url}client/iview/{$d['id']}/token_{$d['vtoken']}">
        </div>
    </div>
    <div class="col-lg-12"  id="sysfrm_ajaxrender">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Hasil Produksi - {$d['batch_number']}</h5>
                <input type="hidden" name="iid" value="{$d['id']}" id="iid">
                {*<a href="{$_url}plugins/flmcs/init/add-new" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add New Service</a>*}

                {*<a href="{$_url}plugins/flmcs/init/sync" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Sync</a>*}

                <div class="btn-group  pull-right" role="group" aria-label="...">

                    <div class="btn-group" role="group">
                        <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-pdf-o"></i>
                            {$_L['PDF']}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{$_url}prod/pdf/{$d['id']}/view" target="_blank">{$_L['View PDF']}</a></li>
                            <li><a href="{$_url}prod/pdf/{$d['id']}/dl">{$_L['Download PDF']}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="ibox-content">
                <div class="invoice">
                    <header class="clearfix">
						<table border="1" width="100%" style="padding:100" class="table">
							<tbody>
								<tr>
									<td rowspan="4" width="30%" align="center" style="vertical-align: middle;!important">
										<img src="sysfrm/uploads/system/logo.png" alt="Logo">
									</td>
									<td width="30%" align="center">
										<strong><h4 class="text-dark text-bold">INSTRUKSI KERJA</h4></strong>
									</td>
									<td width="40%">
										No. Dokumen
									</td>
								</tr>
								<tr>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										<strong><h4 class="text-dark text-bold">PROSEDUR PENGOLAHAN INDUK</h4></strong>
									</td>
									<td>
										Terbitan : I/O
									</td>
								</tr>
								<tr>
									<td>
										Tanggal : {$tgl}
									</td>
								</tr>
								<tr>
									<td>
										Halaman
									</td>
								</tr>
							</tbody>
						</table>
						NO. PERMINTAAN BAHAN BAKU : &nbsp;{$d['no_minta']}<br>
						NO. PENIMBANGAN BAHAN BAKU : &nbsp;{$d['no_timbang']}
						<br>&nbsp;
						<table border="1" width="100%" style="padding:100" class="table">
							<tbody>
								<tr>
									<td width="10%" align="center" style="vertical-align: middle;!important">
										Kode Produk
									</td>
									<td width="10%" align="center">
										Nama Produk
									</td>
									<td width="10%" align="center">
										No. Batch
									</td>
									<td width="10%" align="center">
										Besar Batch
									</td>
									<td width="10%" align="center">
										Bentuk Sediaan
									</td>
									<td width="10%" align="center">
										Kemasan :
									</td>
									<td width="10%" align="center">
										Tgl. Pengolahan
									</td>
								</tr>
								<tr>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										<strong><h4 class="text-dark text-bold">{$d['code']}</h4></strong>
									</td>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										{$d['name']}
									</td>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										{$d['batch_number']}
									</td>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										{$d['target']}
									</td>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										{$d['shape']}
									</td>
									<td rowspan="3" align="center" style="vertical-align: middle;!important">
										{$d['pack']}
									</td>
									<td>
										{date( $_c['df'], strtotime($d['prod_date']))}
									</td>
								</tr>
								<tr>
									<td>
										Mulai : {date( 'H:m', strtotime($d['time_start']))}
									</td>
								</tr>
								<tr>
									<td>
										Selesai : {date( 'H:m', strtotime($d['time_stop']))}
									</td>
								</tr>
							</tbody>
						</table>
						<strong>I. KOMPOSISI :</strong>
                        <table class="table invoice-items">
                            <thead>
                            <tr class="h4 text-dark">
                                <th class="text-semibold">No.</th>
                                <th class="text-semibold">Kode Bahan</th>
                                <th class="text-semibold">Nama Bahan</th>
                                <th class="text-center text-semibold">Fungsi</th>
                                <th class="text-center text-semibold">%</th>
                            </tr>
                            </thead>
                            <tbody>
								{assign "i" 1}
								{foreach $e as $kp}
									<tr>
										<td>{$i}</td>
										<td>{$kp['code']}</td>
										<td class="text-semibold text-dark">{$kp['name']}</td>
										<td class="text-semibold text-dark">{$kp['description']}</td>
										<td class="text-center">{number_format($kp['persen'],2,$_c['dec_point'],$_c['thousands_sep'])} %</td>
									</tr>
									{assign "i" $i+1}
								{/foreach}
							</tbody>
						</table>
						<br>
						<strong>II. SPESIFIKASI :</strong>
						<p class="h5 mb-xs text-dark">{$d['spesifikasi']}</p>
						<br>
						<strong>III. PERALATAN :</strong>
						<p class="h5 mb-xs text-dark">{$d['peralatan']}</p>
						<br>
                    </header>
                    <div class="table-responsive">
						<strong>IV. PENIMBANGAN :</strong>
                        <table class="table invoice-items">
                            <thead>
                            <tr class="h4 text-dark">
                                <th class="text-semibold">Kode Bahan</th>
                                <th class="text-semibold">Nama Bahan</th>
                                <th class="text-semibold">No. Batch</th>
                                <th class="text-center text-semibold">Jlh Ditimbang</th>
                                <th class="text-center text-semibold">Ditimbang Oleh</th>
                                <th class="text-center text-semibold">Diperiksa Oleh</th>
                            </tr>
                            </thead>
                            <tbody>
								{foreach $items as $item}
									<tr>
										<td>{$item['code']}</td>
										<td class="text-semibold text-dark">{$item['name']}</td>
										<td class="text-semibold text-dark">{$item['batch']}</td>
										<td class="text-center text-dark">{$item['qty']} {$item['unit']}</td>
										<td class="text-center text-dark">{$item['penimbang']}</td>
										<td class="text-center text-dark">{$item['periksa_timbang']}</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
                    </div>
					<br>
					<strong>V. PROSEDUR PENGOLAHAN :</strong>
					<p class="h5 mb-xs text-dark">{$prosedur}</p>
					<br>
					<strong>VI. REKONSILIASI :</strong>
					<table class="table invoice-items" border="1">
						<thead>
						<tr class="h4 text-dark">
							<th class="text-semibold" width="54%">Rekonsiliasi hasil</th>
							<th class="text-semibold" width="23%">Diperiksa Oleh</th>
							<th class="text-semibold" width="23%">Disetujui Oleh</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Hasil teoritis : {$d['target']}</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Hasil Nyata : {$d['result']}</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Batas Penyimpang : {number_format((abs($d['result']-$d['target'])/$d['target'])*100,2,$_c['dec_point'],$_c['thousands_sep'])} %</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Bila hasil nyata diluar batas hasil tersebut diatas, lakukan "Penyelidikan terhadap kegagalan"</td>
							<td>Supervisor Pengolahan</td>
							<td>Ka Bag. Produksi</td>
						</tr>
						</tbody>
					</table>
					<div style="margin-top:100px;width:100%">
						<table border="0" width="100%" style="padding:100;" class="table table-borderless">
							<tr>
								<td width="33%">&nbsp</td>
								<td width="33%"></td>
								<td width="33%">Medan, {$tgl}</td>
							</tr>
							<tr>
								<td>Pemeriksaan</td>
								<td></td>
								<td>Peninjauan Catatan</td>
							</tr>
							<tr>
								<td>Proses Pengolahan</td>
								<td></td>
								<td>Pengolahan Batch</td>
							</tr>
							<tr>
								<td>&nbsp</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>&nbsp</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>&nbsp</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>&nbsp</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td><u>Supervisor Pengolahan</u></td>
								<td><u>Kabag Produksi</u></td>
								<td><u>Kabag Pengawasan Mutu</u></td>
							</tr>
							<tr>
								<td>Tanggal : {$tgl}</td>
								<td>Tanggal : {$tgl}</td>
								<td>Tanggal : {$tgl}</td>
							</tr>
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