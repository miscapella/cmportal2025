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
			<div class="panel-body {if $d['priority'] eq 'TIDAK URGENT'}blue-bg{else if $d['priority'] eq 'URGENT'}red-bg{/if}">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE ORDER</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}pembelian/list-po-aprv/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_po">No. PO</label>
					<div class="col-lg-9"><input type="text" id="no_po" name="no_po" class="form-control" value="{$d['no_po']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_po">Tanggal PO</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                {assign var="nama_supplier" value=""}
                {foreach $tg3 as $r3}
                    {if $d['kode_supplier'] eq $r3['kode_supplier']}
                        {assign var="nama_supplier" value="{$r3['nama_supplier']}"}
                    {/if}
                {/foreach}
                <div class="form-group"><label class="col-lg-3 control-label" for="kode_supplier">Supplier</label>
					<div class="col-lg-9">
						<a href="#" class="form-control detail-supplier" value="{$d['kode_supplier']}">{$d['kode_supplier']} - {$nama_supplier}</a>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="{$d['status']}" disabled></div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="lokasi_pengiriman">Lokasi Pengiriman</label>
					<div class="col-lg-9"><input type="text" id="lokasi_pengiriman" name="lokasi_pengiriman" class="form-control" value="{$d['lokasi_pengiriman']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="syarat_pembayaran">Syarat Pembayaran</label>
					<div class="col-lg-9"><input type="text" id="syarat_pembayaran" name="syarat_pembayaran" class="form-control" value="{$d['syarat_pembayaran']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="catatan">Catatan</label>
					<div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control" value="{$d['catatan']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="total_harga">Total Harga</label>
					<div class="col-lg-9"><input type="text" id="total_harga" name="total_harga" class="form-control amount" value="{$d['total_harga']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn</label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="{$d['ppn']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="total_netto">Total Netto</label>
					<div class="col-lg-9"><input type="text" id="total_netto" name="total_netto" class="form-control amount" value="{$d['total_netto']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5">{$d['pesan']}</textarea>
					</div>
                </div><br><br><br><br><br>
                {if $d['disetujui_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="{if $d['disetujui_nama'] neq ''}{$d['disetujui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="{$d['disetujui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
                <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
					    <a class="btn btn-primary btn-xs" id="approve">APPROVE</a>
					    <a class="btn btn-danger btn-xs" id="reject">REJECT</a>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-input" style="overflow:auto;white-space:nowrap;">
                {assign var="nourut" value=1}
                {foreach $e as $ds}
                <div class="form-group">
                    PURCHASE ORDER ITEM #{$nourut}
				</div><br>
                {assign var="nama_item" value=""}
                {assign var="satuan" value=""}
                {assign var="satuan_harga" value=""}
                {assign var="jumlah_per_satuan" value=""}
                {foreach $tg1 as $r1}
                    {if $ds['kode_item'] eq $r1['kode_item']}
                        {assign var="nama_item" value="{$r1['nama_item']}"}
                        {assign var="satuan" value="{$r1['satuan']}"}
                        {assign var="satuan_harga" value="{$r1['satuan_harga']}"}
                        {assign var="jumlah_per_satuan" value="{$r1['jumlah_per_satuan']}"}
                    {/if}
                {/foreach}
                <div class="form-group" >
                    <label class="col-lg-2 control-label" for="nama_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<a href="#" class="col-lg-9 detail-itemstock" value="{$ds['kode_item']}">{$nama_item}</a>			
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="qty_req">Quantity Req</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
                        <span class="amount">{$ds['qty_req']}</span><span> {$satuan}</span>
                    </div>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="qty_req">Jumlah per Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9">
                        <span class="desimal">{$jumlah_per_satuan}</span><span> / {$satuan_harga}</span>
                    </div>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="harga">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="harga" name="harga" class="form-control" value="{$ds['harga']}" disabled>
				</div><br>
                <div class="form-group" >
					<label class="col-lg-2 control-label" for="keterangan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9 amount" type="text" id="keterangan" name="keterangan" class="form-control" value="{$ds['keterangan']}" disabled>
				</div><br>
                <hr>
                {assign var="nourut" value=$nourut+1}
                {/foreach}
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