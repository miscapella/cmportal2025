{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        {if $type eq 'Product'}
                            {$_L['Edit Product']}
                            {elseif $type eq 'Service'}
                            {$_L['Edit Service']}
                            {else}
                            Komposisi
                        {/if}


                    </h5>
                    <div class="ibox-tools">
                       {if $type eq 'Product'}
                           <a href="{$_url}ps/b-list" class="btn btn-primary btn-xs">{$_L['List Products']}</a>

                       {/if}
                        {if $type eq 'Service'}
                            <a href="{$_url}ps/s-list" class="btn btn-primary btn-xs">{$_L['List Services']}</a>
                        {/if}
                       {if $type eq 'Komposisi'}
                           <a href="{$_url}ps/p-list" class="btn btn-primary btn-xs">Daftar Komposisi</a>

                       {/if}


                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

					<ul class="nav nav-pills">
					  <li class="active"><a data-toggle="tab" href="#home">Data Part</a></li>
					  <li><a data-toggle="tab" href="#menu1">Supplier QT</a></li>
					  <li><a data-toggle="tab" href="#menu2">Supplier PO</a></li>
					  <li><a data-toggle="tab" href="#menu3">Customer QT</a></li>
					  <li><a data-toggle="tab" href="#menu4">Customer PO</a></li>
					</ul>
					<div class='tab-content'>
						<div id='home' class="tab-pane fade in active">
							<br>
							<form class="form-horizontal" id="rform" method="post">

								<div class="form-group"><label class="col-lg-2 control-label" for="name">{if $type eq 'Service'} No. Equipment {else} SMC PN. {/if}</label>

									<div class="col-lg-10"><input type="text" id="code" name="code" class="form-control" autocomplete="off" value="{$d['code']}" disabled=disabled>

									</div>
								</div>

							   {if $type neq 'Komposisi'}
									{if $type eq 'Product'}
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Part NO</label>
											<div class="col-lg-10"><input type="text" id="no_part" name="no_part" class="form-control" value="{$d['no_part']}" autocomplete="off"></div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Name']} Part</label>
											<div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off" value="{$d['name']}"></div>
										</div>
									{else}
										<div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Name']} Equipment</label>
											<div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off" value="{$d['name']}"></div>
										</div>
									{/if}
			
									{*{if $type neq 'Service'}
										<div class="form-group"><label class="col-lg-2 control-label" for="sales_price">{if $type eq 'Product'} {$_L['Sales Price']} {else} Harga Beli {/if}</label>
				
											<div class="col-lg-10"><input type="text" id="sales_price" name="sales_price" class="form-control amount" autocomplete="off" data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3" value="{$price}" onClick="this.select();">
				
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Unit']}</label>
				
											<div class="col-lg-10"><input type="text" id="unit" name="unit" class="form-control" autocomplete="off" value="{$d['unit']}">
				
											</div>
										</div>
									{/if}*}
									{if $type eq 'Product'}
										<div class="form-group"><label class="col-lg-2 control-label" for="name">PCI No.</label>
											<div class="col-lg-10"><input type="text" id="pci_no" name="pci_no" class="form-control" autocomplete="off" value={$d['pci_no']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Equip No.</label>
											<div class="col-lg-10">
												<select name="equip_no" id="equip_no" class="form-control">
													<option value="">Pilih Equip No</option>
												   {$equip_data}
												</select>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Drawing No.</label>
											<div class="col-lg-10"><input type="text" id="draw_no" name="draw_no" class="form-control" autocomplete="off" value={$d['draw_no']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Unit</label>
											<div class="col-lg-10"><input type="text" id="satuan" name="satuan" class="form-control" autocomplete="off" value={$d['satuan']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">POS No.</label>
											<div class="col-lg-10"><input type="text" id="pos_no" name="pos_no" class="form-control" autocomplete="off" value={$d['pos_no']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Material</label>
											<div class="col-lg-10"><input type="text" id="material" name="material" class="form-control" autocomplete="off" value={$d['material']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Manufacture</label>
											<div class="col-lg-10"><input type="text" id="manufacture" name="manufacture" class="form-control" autocomplete="off" value={$d['manufacture']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Model</label>
											<div class="col-lg-10"><input type="text" id="model" name="model" class="form-control" autocomplete="off" value={$d['model']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">OD</label>
											<div class="col-lg-10"><input type="text" id="od" name="od" class="form-control" autocomplete="off" value={$d['od']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">ID</label>
											<div class="col-lg-10"><input type="text" id="id_data" name="id_data" class="form-control" autocomplete="off" value={$d['id_data']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">H/T</label>
											<div class="col-lg-10"><input type="text" id="ht" name="ht" class="form-control" autocomplete="off" value={$d['ht']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Berat</label>
											<div class="col-lg-10"><input type="text" id="berat" name="berat" class="form-control" autocomplete="off" value={$d['berat']}>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">Remark</label>
											<div class="col-lg-10"><textarea id="editor1" class="ckeditor" name="spek" rows="3">{$d['spesifikasi']}</textarea>
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">File QRCode</label>
											<div class="col-lg-10">
												{if {$d['qrcode']}<>""}
													<img class="logo" name="qrcode" id="qrcode" width="50px" height="50px" style="border:1px #A4A4A4 solid" src="uploads/qrcode/{$d['qrcode']}" alt="QRCode {$d['qrcode']}">
												{else}
													<a href="#" class="btn btn-info btn-xs generate" id="{$d['id']}"><i class="fa fa-plus"></i> Generate</a>
												{/if}
											</div>
										</div>
										<div class="form-group"><label class="col-lg-2 control-label" for="name">File Drawing</label>
											<div class="col-lg-10">
												{if {$d['gambar']}<>""}
													<p class="help-block"><a href="uploads/drawing/{$d['gambar']}" target="_blank">{$d['gambar']}</a></p>
													{*<img class="logo" name="gbr" id="gbr" width="600px" height="400px" src="uploads/drawing/{$d['gambar']}" alt="&nbsp;~ No Picture or File is Missing">*}
												{else}
													<img class="logo" name="gbr" id="gbr" width="150px" height="130px" style="border:1px #A4A4A4 solid" src="uploads/drawing/no-file.png" alt="&nbsp;~ No Picture or File is Missing">
												{/if}
												<input type="file" id="file" name="file" class="form-control" autocomplete="off">
												<p class="help-block">* Dikosongkan apabila tidak ada perubahan.</p>
											</div>
										</div>
									{/if}
									{if $type eq 'Service'}
									<div class="form-group"><label class="col-lg-2 control-label" for="description">Plant{*{$_L['Description']}*}</label>
			
										<div class="col-lg-10"><textarea id="description" class="form-control" rows="3">{$d['description']}</textarea>
			
										</div>
									</div>
									{/if}
								{*{else}
									<div class="form-group"><label class="col-lg-2 control-label" for="item_number">Target Produksi</label> 
			
										<div class="col-lg-10"><input type="text" id="item_number" name="item_number" class="form-control amount" autocomplete="off" value="{$d['target']}" disabled=disabled>
			
										</div>
									</div>*}
								{/if}

		{if $type neq 'Komposisi'}
		<input type="hidden" id="type" name="type" value="{$type}">
		{else}
		<input type="hidden" id="type" name="type" value="Komposisi">
		{/if}

		{if $type eq 'Komposisi'}
		<br>
							<div class="table-responsive m-t">
								<div><h3>BAHAN</h3></div>
								<table class="table invoice-table" id="invoice_items">
									<thead>
									<tr>
										<th width="10%">{$_L['Item Code']}</th>
										<th width="45%">{$_L['Item Name']}</th>
										<th width="10%">Persen (%)</th>
										<th width="10%">{$_L['Qty']}</th>
										<th width="20%">{$_L['Unit']}</th>

									</tr>
									</thead>
									<tbody>
										{foreach $items as $item } 
											<tr>
												<td><input type='text' class='form-control item_name' name='code1[]' id='code1' value="{$item['code']}" disabled=disabled></td>
												<td><input type='text' class='form-control item_name' name='name1[]' id='name1' value="{$item['name']}"></td>
												<td><input type='text' class='form-control persen' value="{$item['persen']}" name='persen[]' id='persen'></td>
												<td><input type='text' class='form-control qty' value="{$item['qty']}" name='qty[]' id='qty'></td>
												<td><input type='text' class='form-control item_price' name='unit1[]' value="{$item['unit']}"></td>
											</tr>
										{/foreach}
									</tbody>
								</table><br>
								{*<div><h3>KEMASAN</h3></div>
								<table class="table invoice-table" id="invoice_items1">
									<thead>
									<tr>
										<th width="10%">{$_L['Item Code']}</th>
										<th width="45%">{$_L['Item Name']}</th>
										<th width="10%">Persen (%)</th>
										<th width="10%">{$_L['Qty']}</th>
										<th width="20%">{$_L['Unit']}</th>

									</tr>
									</thead>
									<tbody>
										{foreach $items1 as $item1 } 
											<tr>
												<td><input type='text' class='form-control item_name' name='code1[]' id='code1' value="{$item1['code']}" disabled=disabled></td>
												<td><input type='text' class='form-control item_name' name='name1[]' id='name1' value="{$item1['name']}"></td>
												<td><input type='text' class='form-control persen' value="{$item1['persen']}" name='persen[]' id='persen'></td>
												<td><input type='text' class='form-control qty' value="{$item1['qty']}" name='qty[]' id='qty'></td>
												<td><input type='text' class='form-control item_price' name='unit1[]' value="{$item1['unit']}"></td>
											</tr>
										{/foreach}
									</tbody>
								</table>*}

							</div>
							<button type="button" class="btn btn-primary" id="item-add"><i
										class="fa fa-search"></i> {$_L['Add Service']}</button>
							{*<button type="button" class="btn btn-primary" id="item-add1"><i
										class="fa fa-search"></i> Tambah Kemasan</button>*}
							<button type="button" class="btn btn-danger" id="item-remove"><i
											class="fa fa-minus-circle"></i> {$_L['Delete']}</button>

							<br><br>
		{/if}
								<div class="form-group">
									<div style="margin-left:15px">
										<input type="hidden" name="id" id="id" value="{$d['id']}">
										<button class="btn btn-sm btn-primary" type="submit" id="submit">{$_L['Save']}</button>
									</div>
								</div>
							</form>
						</div>
						<div id="menu1" class="tab-pane fade">
							<br>
							<h3>Data Supplier QT ( 5 Transaksi Terakhir )</h3>
							<table class="table table-hover">
								<thead>
								<tr>
									<th width="15%">Tanggal</th>
									<th width="20%">No. Supp QT</th>
									<th width="40%">Supplier</th>
									<th width="25%" class='text-right'>Harga</th>
								</tr>
								</thead>
								<tbody>
									{foreach $d1 as $das1 } 
										<tr>
											<td>
											{if $das1['date_qt'] neq Null}
												{date( $_c['df'], strtotime($das1['date_qt']))}
											{/if}
											</td>
											<td><a href="{$_url}suppqt/view/{$das1['id']}/" target="_blank">{$das1['quotenum']}</a></td>
											<td>{$das1['account']}</td>
											<td class='text-right amount'>{$das1['amount']}</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
						<div id="menu2" class="tab-pane fade">
							<br>
							<h3>Data Supplier PO ( 5 Transaksi Terakhir )</h3>
							<table class="table table-hover">
								<thead>
								<tr>
									<th width="15%">Tanggal</th>
									<th width="20%">No. Supp PO</th>
									<th width="40%">Supplier</th>
									<th width="25%" class='text-right'>Harga</th>
								</tr>
								</thead>
								<tbody>
									{foreach $d2 as $das2 } 
										<tr>
											<td>{date( $_c['df'], strtotime($das2['date_po']))}</td>
											<td><a href="{$_url}supppo/view/{$das2['id']}/" target="_blank">{$das2['ordernum']}</a></td>
											<td>{$das2['account']}</td>
											<td class='text-right amount'>{$das2['amount']}</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
						<div id="menu3" class="tab-pane fade">
							<br>
							<h3>Data Customer QT ( 5 Transaksi Terakhir )</h3>
							<table class="table table-hover">
								<thead>
								<tr>
									<th width="15%">Tanggal</th>
									<th width="20%">No. Cust QT</th>
									<th width="40%">Customer</th>
									<th width="25%" class='text-right'>Harga</th>
								</tr>
								</thead>
								<tbody>
									{foreach $d3 as $das3 } 
										<tr>
											<td>{date( $_c['df'], strtotime($das3['date_qt']))}</td>
											<td><a href="{$_url}custqt/view/{$das3['id']}/" target="_blank">{$das3['custqtnum']}</a></td>
											<td>{$das3['account']}</td>
											<td class='text-right amount'>{$das3['amount_quote']}</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
						<div id="menu4" class="tab-pane fade">
							<br>
							<h3>Data Customer PO ( 5 Transaksi Terakhir )</h3>
							<table class="table table-hover">
								<thead>
								<tr>
									<th width="15%">Tanggal</th>
									<th width="20%">No. Cust QT</th>
									<th width="40%">Customer</th>
									<th width="25%" class='text-right'>Harga</th>
								</tr>
								</thead>
								<tbody>
									{foreach $d4 as $das4 } 
										<tr>
											<td>
											{if $das4['date_po'] neq Null}
												{date( $_c['df'], strtotime($das4['date_po']))}
											{/if}
											</td>
											<td><a href="{$_url}custpo/view/{$das4['id']}/" target="_blank">{$das4['custponum']}</a></td>
											<td>{$das4['account']}</td>
											<td class='text-right amount'>{$das4['amount']}</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>


</div>
{include file="sections/footer.tpl"}