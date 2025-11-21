<html>
<!--
Dynamically Auto Generated Page - Do Not Edit
================================================================
Software Name: iBilling - CRM, Accounting and Invoicing Software
Version: 3.3.0
Author: Sadia Sharmin
Website: http://www.ibilling.io/
Contact: sadiasharmin3139@gmail.com
Purchase: http://codecanyon.net/item/ibilling-accounting-and-billing-software/11021678?ref=SadiaSharmin
License: You must have a valid license purchased only from envato(the above link) in order to legally use this Software.
========================================================================================================================
-->
<head>

    <style>

        * { margin: 0; padding: 0; }
        body {
            font: 14px/1.4  dejavusanscondensed;
        }
        #page-wrap { width: 800px; margin: 0 auto; }

        table { border-collapse: collapse; }
        table td, table th { border: 1px solid black; padding: 5px; }

		.borderless td {border:0;}
		
        #customer { overflow: hidden; }

        #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; overflow: hidden; }

        #meta { margin-top: 1px; width: 100%; float: right; }
        #meta td { text-align: right;  }
        #meta td.meta-head { text-align: left; background: #eee; }
        #meta td textarea { width: 100%; height: 20px; text-align: right; }

        #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
        #items th { background: #eee; }
        #items textarea { width: 80px; height: 50px; }
        #items tr.item-row td {  vertical-align: top; }
        #items td.description { width: 300px; }
        #items td.item-name { width: 175px; }
        #items td.description textarea, #items td.item-name textarea { width: 100%; }
        #items td.total-line { border-right: 0; text-align: right; }
        #items td.total-value { border-left: 0; padding: 10px; }
        #items td.total-value textarea { height: 20px; background: none; }
        #items td.balance { background: #eee; }
        #items td.blank { border: 0; }

        #terms { text-align: center; margin: 20px 0 0 0; }
        #terms h5 { text-transform: uppercase; font: 13px <?php echo $config['pdf_font']; ?>; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
        #terms textarea { width: 100%; text-align: center;}

    </style>

</head>

<body style="font-family:dejavusanscondensed">

<div id="page-wrap">

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
								Tanggal : <?php echo $tgl; ?>
							</td>
						</tr>
						<tr>
							<td>
								Halaman
							</td>
						</tr>
					</tbody>
				</table><br>
				NO. PERMINTAAN BAHAN BAKU : &nbsp;<b><?php echo $d['no_minta']; ?></b><br>
				NO. PENIMBANGAN BAHAN BAKU : &nbsp;<b><?php echo $d['no_timbang']; ?></b>
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
								<strong><h4 class="text-dark text-bold"><?php echo $d['code']; ?></h4></strong>
							</td>
							<td rowspan="3" align="center" style="vertical-align: middle;!important">
								<?php echo $d['name']; ?>
							</td>
							<td rowspan="3" align="center" style="vertical-align: middle;!important">
								<?php echo $d['batch_number']; ?>
							</td>
							<td rowspan="3" align="center" style="vertical-align: middle;!important">
								<?php echo $d['target']; ?>
							</td>
							<td rowspan="3" align="center" style="vertical-align: middle;!important">
								<?php echo $d['shape']; ?>
							</td>
							<td rowspan="3" align="center" style="vertical-align: middle;!important">
								<?php echo $d['pack']; ?>
							</td>
							<td>
								<?php echo date( $_c['df'], strtotime($d['prod_date'])); ?>
							</td>
						</tr>
						<tr>
							<td>
								Mulai : <?php echo date( 'H:m', strtotime($d['time_start'])); ?>
							</td>
						</tr>
						<tr>
							<td>
								Selesai : <?php echo date( 'H:m', strtotime($d['time_stop'])); ?>
							</td>
						</tr>
					</tbody>
				</table><br>
				<strong>I. KOMPOSISI :</strong>
				<table class="table invoice-items" width="100%">
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
						<?php
							echo $i=1;
							foreach ($e as $kp) {
								echo '<tr>
								<td>'.$i.'</td>
								<td>'.$kp['code'].'</td>
								<td class="text-semibold text-dark">'.$kp['name'].'</td>
								<td class="text-semibold text-dark">'.$kp['description'].'</td>
								<td align="center">'.number_format($kp['persen'],2,$config['dec_point'],$config['thousands_sep']).' %</td>
								</tr>';
								$i++;
							}
						?>
					</tbody>
				</table>
				<br>
				<strong>II. SPESIFIKASI :</strong>
				<?php echo $d['spesifikasi']; ?>
				<br>
				<strong>III. PERALATAN :</strong>
				<?php echo $d['peralatan']; ?>
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
						<?php
						foreach ($items as $item) {
							echo '<tr>
								<td>'.$item['code'].'</td>
								<td class="text-semibold text-dark">'.$item['name'].'</td>
								<td class="text-semibold text-dark">'.$item['batch'].'</td>
								<td class="text-center text-dark">'.$item['qty'].' '.$item['unit'].'</td>
								<td class="text-center text-dark">'.$item['penimbang'].'</td>
								<td class="text-center text-dark">'.$item['periksa_timbang'].'</td>
							</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
			<br>
			<strong>V. PROSEDUR PENGOLAHAN :</strong>
			<?php echo $prosedur; ?>
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
					<td>Hasil teoritis : <?php echo $d['target']; ?></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Hasil Nyata : <?php echo $d['result']; ?></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Batas Penyimpang : <?php echo number_format((abs($d['result']-$d['target'])/$d['target'])*100,2,$_c['dec_point'],$_c['thousands_sep']); ?> %</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
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
				<table border="0" width="100%" cellspacing="0" cellpadding="0" class="borderless">
					<tr>
						<td width="33%">&nbsp;</td>
						<td width="33%"></td>
						<td width="33%">Medan, <?php echo $tgl; ?></td>
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
						<td>&nbsp;</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><u>Supervisor Pengolahan</u></td>
						<td><u>Kabag Produksi</u></td>
						<td><u>Kabag Pengawasan Mutu</u></td>
					</tr>
					<tr>
						<td>Tanggal : <?php echo $tgl; ?></td>
						<td>Tanggal : <?php echo $tgl; ?></td>
						<td>Tanggal : <?php echo $tgl; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</div>

</body>

</html>