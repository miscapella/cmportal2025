{include file="sections/header.tpl"}
{if $msg neq ''}
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	{$msg}
</div>
{/if}

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>DETAIL PURCHASE REQUISITION</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}pembelian/list-pr1-pending/" class="btn btn-primary btn-sm">Daftar PR</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
            <div class="ibox-content" id="ibox_form">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-9"><input type="text" id="no_pr" name="no_pr" class="form-control" value="{$d['no_pr']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group" style="margin-bottom:40px"><label class="col-lg-3 control-label" for="pembelian">Jenis Pembelian <span style="color: red;">*</span> </label>
					<div class="col-lg-9">
						<select class="form-control" id="pembelian" name="pembelian">
							<option value="">Pilih Pembelian</option>
                            <option value="bukan lokal" {if $d['pembelian'] eq 'bukan lokal'}selected{/if}>Bukan Lokal</option>
							<option value="lokal" {if $d['pembelian'] eq 'lokal'}selected{/if}>Lokal</option>
                        </select>
					</div>
				</div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th>Keperluan</th>
							<th>Bagian</th>
							<th>Item Stock</th>
							<th>Qty Req</th>
							<th>Tgl Diperlukan</th>
							<th>Keterangan Pembelian</th>
							<th><span style="color: red;">*</span> Supplier 1</th>
							<th><span style="color: red;">*</span> Harga Supplier 1</th>
							<th>Keterangan Supplier 1</th>
							<th>File Supplier 1</th>
							<th>Supplier 2</th>
							<th>Harga Supplier 2</th>
							<th>Keterangan Supplier 2</th>
							<th>File Supplier 2</th>
							<th>Supplier 3</th>
							<th>Harga Supplier 3</th>
							<th>Keterangan Supplier 3</th>
							<th>File Supplier 3</th>
							<th><span style="color: red;">*</span> Supplier Pilihan</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$clist}</div>
						{assign var="nourut" value=1}
						{foreach $e as $ds}
							<tr>
								<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">{$nourut}</td>
								<td style="vertical-align: middle;"><input type="text" name="keperluan[]" class="keperluan" value="{$ds['keperluan']}" readonly></td>
								<td style="display: none;"><input type="text" name="kode_item[]" class="kode_item" readonly value="{$ds['kode_item']}"></td>
								{assign var="nama_line" value=""}
								{foreach $tg2 as $r2}
									{if $ds['line'] eq $r2['kode_kategori']}
										{assign var="nama_line" value="{$r2['nama_kategori']}"}
									{/if}
								{/foreach}
								{if $nama_line eq ''}
									{assign var="nama_line" value="STOCK"}
								{/if}
								<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="{$ds['bagian']}"></td>
								<td style="display:none;"><input type="text" name="main[]" class="main" value="{$ds['main']}"></td>
								<td style="display:none;"><input type="text" name="sub[]" class="sub" value="{$ds['sub']}"></td>
								<td style="display:none;"><input type="text" name="line[]" class="line" value="{$ds['line']}"></td>
								<td style="vertical-align: middle;"><a href="#" class="detail-bagian" value="{$ds['line']}">{$nama_line}</a></td>
								<td style="display:none;"><input type="text" name="item[]" class="item" value="{$ds['kode_item']}" readonly></td>
								{assign var="nama_item" value=""}
								{foreach $tg1 as $r1}
									{if $ds['kode_item'] eq $r1['kode_item']}
										{assign var="nama_item" value="{$r1['nama_item']}"}
									{/if}
								{/foreach}
								<td style="vertical-align: middle;"><a href="#" class="detail-itemstock" value="{$ds['kode_item']}">{$nama_item}</a></td>
								<td style="vertical-align: middle;"><input type="text" name="qty[]" class="qty amount" value={$ds['qty_req']}></td>
								<td style="vertical-align: middle;"><input type="text" name="diperlukan[]" class="diperlukan tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value={if $ds['tgl_diperlukan'] neq ''}{date('d-m-Y', strtotime($ds['tgl_diperlukan']))}{else}""{/if}></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan[]" class="keterangan" value="{$ds['keterangan']}"></td>
								{assign var="nama_supplier1" value=""}
                                {assign var="contact1" value=""}
                                {assign var="lama_bayar1" value=""}
                                {assign var="nama_supplier2" value=""}
                                {assign var="contact2" value=""}
                                {assign var="lama_bayar2" value=""}
                                {assign var="nama_supplier3" value=""}
                                {assign var="contact3" value=""}
                                {assign var="lama_bayar3" value=""}
                                {foreach $tg3 as $r3}
                                    {if $ds['kode_supplier1'] eq $r3['kode_supplier']}
                                        {assign var="nama_supplier1" value="{$r3['nama_supplier']}"}
                                        {assign var="contact1" value="{$r3['contact']}"}
                                        {assign var="lama_bayar1" value="{$r3['lama_bayar']}"}
                                    {/if}
                                    {if $ds['kode_supplier2'] eq $r3['kode_supplier']}
                                        {assign var="nama_supplier2" value="{$r3['nama_supplier']}"}
                                        {assign var="contact2" value="{$r3['contact']}"}
                                        {assign var="lama_bayar2" value="{$r3['lama_bayar']}"}
                                    {/if}
                                    {if $ds['kode_supplier3'] eq $r3['kode_supplier']}
                                        {assign var="nama_supplier3" value="{$r3['nama_supplier']}"}
                                        {assign var="contact3" value="{$r3['contact']}"}
                                        {assign var="lama_bayar3" value="{$r3['lama_bayar']}"}
                                    {/if}
                                {/foreach}
								<td style="vertical-align: middle;">
									<select name="kode_supplier1[]" class="kode_supplier" style="width: 200px;">
                                        <option value="">Pilih Supplier 1</option>
									    {foreach $tg4 as $r4}
									        {if $r4['kode_item'] eq $ds['kode_item']}
									            <option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kode_supplier1']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
									        {/if}
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga1[]" class="harga amount" value="{$ds['harga1']}"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier1[]" class="keterangan" value="{$ds['keterangan_supplier1']}"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s{$nourut}file_supplier1" name="sfile_supplier1[]" class="files">
									<input type="text" id="{$nourut}file_supplier1" name="file_supplier1[]" value="{$ds['file_supplier1']}" style="display: none;">
									{if $ds['file_supplier1'] neq ''}
										<a href="uploads/KEBUN/{$ds['file_supplier1']}" target="_blank">{$ds['file_supplier1']}</a>
									{else}
										<a>Tidak ada file</a>
									{/if}
								</td>
								<td style="vertical-align: middle;">
									<select name="kode_supplier2[]" class="kode_supplier" style="width: 200px;">
										<option value="">Pilih Supplier 2</option>
									    {foreach $tg4 as $r4}
									        {if $r4['kode_item'] eq $ds['kode_item']}
									            <option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kode_supplier2']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
									        {/if}
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga2[]" class="harga amount" value="{$ds['harga2']}" ></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier2[]" class="keterangan" value="{$ds['keterangan_supplier2']}"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s{$nourut}file_supplier2" name="sfile_supplier2[]" class="files">
									<input type="text" id="{$nourut}file_supplier2" name="file_supplier2[]" value="{$ds['file_supplier2']}" style="display: none;">
									{if $ds['file_supplier2'] neq ''}
										<a href="uploads/KEBUN/{$ds['file_supplier2']}" target="_blank">{$ds['file_supplier2']}</a>
									{else}
										<a>Tidak ada file</a>
									{/if}
								</td>
								<td style="vertical-align: middle;">
									<select name="kode_supplier3[]" class="kode_supplier"  style="width: 200px;">
										<option value="">Pilih Supplier 3</option>
									    {foreach $tg4 as $r4}
									        {if $r4['kode_item'] eq $ds['kode_item']}
									            <option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kode_supplier3']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
									        {/if}
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga3[]" class="harga amount" value="{$ds['harga3']}"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier3[]" class="keterangan" value="{$ds['keterangan_supplier3']}"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s{$nourut}file_supplier3" name="sfile_supplier3[]" class="files">
									<input type="text" id="{$nourut}file_supplier3" name="file_supplier3[]" value="{$ds['file_supplier3']}" style="display: none;">
									{if $ds['file_supplier3'] neq ''}
										<a href="uploads/KEBUN/{$ds['file_supplier3']}" target="_blank">{$ds['file_supplier3']}</a>
									{else}
										<a>Tidak ada file</a>
									{/if}
								</td>
								<td style="vertical-align: middle;">
								    <input type="radio" name="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan[]" id="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan1[]" class="cekbox" value="supplier1" {if $ds['supplierpilihan'] eq $ds['kode_supplier1'] and $ds['supplierpilihan'] neq '' } checked {/if}> <label style="font-weight: normal" for="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan1[]"> Supplier 1</label><br>
									<input type="radio" name="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan[]" id="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan2[]" class="cekbox" value="supplier2" {if $ds['supplierpilihan'] eq $ds['kode_supplier2'] and $ds['supplierpilihan'] neq ''} checked {/if}> <label style="font-weight: normal" for="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan2[]"> Supplier 2</label><br>
									<input type="radio" name="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan[]" id="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan3[]" class="cekbox" value="supplier3" {if $ds['supplierpilihan'] eq $ds['kode_supplier3'] and $ds['supplierpilihan'] neq ''} checked {/if}> <label style="font-weight: normal" for="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan3[]"> Supplier 3</label>
								</td>
							</tr>
				        {assign var="nourut" value=$nourut+1}
						{/foreach}
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}