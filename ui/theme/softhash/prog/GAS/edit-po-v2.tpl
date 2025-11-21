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
			<div class="panel-body {if $d['posisi'] eq 'PENDING' or $d['posisi'] eq 'REVISI'}yellow-bg{else if $d['posisi'] eq 'REJECT'}red-bg{else if $d['posisi'] eq 'APPROVE'}navy-bg{/if}">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE ORDER</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}pembelian/list-po/" class="btn btn-success btn-sm">Back</a></div>
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
                <div class="form-group"><label class="col-lg-3 control-label" for="posisi">Status</label>
					<div class="col-lg-9"><input type="text" id="posisi" name="posisi" class="form-control" value="{$d['posisi']}" disabled></div>
				</div><br><br>
                <div class="form-group" style="text-align: right;">
                    <div class="col-lg-12"><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></div>
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
                <div class="form-group"><label class="col-lg-2 control-label" for="kd_inventaris">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_inventaris" name="kd_inventaris" class="form-control" value="{$ds['kd_inventaris']}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item" name="kd_item" class="form-control kd_item" value="{$ds['kd_item']}" readonly>
				</div><br>
                {assign var="nm_item" value=""}
                {assign var="merk" value=""}
                {assign var="satuan" value=""}
                {foreach $tg1 as $r1}
                    {if $ds['kd_item'] eq $r1['kd_item']}
                        {assign var="nm_item" value="{$r1['nm_item']}"}
                        {assign var="merk" value="{$r1['merk']}"}
                        {assign var="satuan" value="{$r1['satuan']}"}
                    {/if}
                {/foreach}
                <div class="form-group" ><label class="col-lg-2 control-label" for="nm_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="nm_item" name="nm_item" class="form-control" value="{$nm_item}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="{$merk}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="satuan">Satuan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="satuan" name="satuan" class="form-control" value="{$satuan}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control" value="{$ds['qty_req']}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock" name="qty_stock" class="form-control" value="{$ds['qty_stock']}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" class="form-control" value="{$ds['tgl_diperlukan']}" readonly>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="{$ds['keperluan']}" readonly>
				</div><br>
                <div class="form-group" >
                    <div class="col-lg-12"><button class="btn btn-danger btn-sm" name="tambahsupplier" id="tambahsupplier">Tambah Supplier</button></div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="kd_supplier">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<select name="kd_supplier1" class="kd_supplier" id="kd_supplier1">
                        <option value="">Pilih Supplier 1</option>
                        {foreach $tg3 as $r}
                            <option value="{$r['kd_supplier']}">{$r['kd_supplier']} - {$r['nm_supplier']}</option>
                        {/foreach}
                    </select>
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