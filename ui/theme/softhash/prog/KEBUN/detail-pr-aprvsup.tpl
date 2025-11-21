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
			<div class="panel-body {if $d['priority'] eq 'URGENT'}red-bg{else}blue-bg{/if}">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE REQUISITION</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}pembelian/list-pr-aprv/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-9"><input type="text" id="no_pr" name="no_pr" class="form-control" value="{$d['no_pr']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="{$d['priority']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pembelian">Pembelian</label>
					<div class="col-lg-9"><input type="text" id="pembelian" name="pembelian" class="form-control" value="{$d['pembelian']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="{$d['status']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5">{$d['pesan']}</textarea>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
					    <a class="btn btn-primary btn-xs" id="approvesup">APPROVE</a>
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
                <div>
                <div class="form-group">
                    PURCHASE REQUISITION ITEM #{$nourut}
				</div><br>
                {assign var="nama_bagian" value=""}
                {if $ds['line'] eq 'STOCK'}
                    {assign var="nama_bagian" value="STOCK"}
                {else}
                    {foreach $tg as $r}
                        {if $ds['line'] eq $r['kode_kategori']}
                            {assign var="nama_bagian" value="{$r['nama_kategori']}"}
                        {/if}
                    {/foreach}
                {/if}
                <td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan[]" class="form-control" value="{$ds['keperluan']}" disabled>
				</div><br>
                <div class="form-group"><label class="col-lg-2 control-label" for="line">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-bagian col-lg-9" value="{$ds['line']}">{$nama_bagian}</a>
				</div><br>
                {assign var="nama_item" value=""}
                {foreach $tg1 as $r1}
                    {if $ds['kode_item'] eq $r1['kode_item']}
                        {assign var="nama_item" value="{$r1['nama_item']}"}
                    {/if}
                {/foreach}
                <div class="form-group" ><label class="col-lg-2 control-label" for="nama_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="col-lg-9 detail-itemstock" value="{$ds['kode_item']}">{$nama_item}</a>
                    <input class="col-lg-9" type="text" id="item" name="item[]" class="form-control" value="{$ds['kode_item']}" style="display: none;">
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req" name="qty_req[]" class="form-control" value="{$ds['qty_req']}"><span class="amount">{$ds['qty_req']}</span> {$satuan}</div>
				</div><br>
                {assign var=tglSplit value="-"|explode:$ds['tgl_diperlukan']}
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" value="{$tglSplit[2]}-{$tglSplit[1]}-{$tglSplit[0]}" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keterangan" name="keterangan" class="form-control" value="{$ds['keterangan']}" disabled>
				</div><br>
                <div class="form-group">
                    PILIHAN SUPPLIER
				</div><br>
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
                        {assign var="contact1" value="{$r3['nama_contact']}"}
                        {assign var="lama_bayar1" value="{$r3['lama_bayar']}"}
                    {/if}
                    {if $ds['kode_supplier2'] eq $r3['kode_supplier']}
                        {assign var="nama_supplier2" value="{$r3['nama_supplier']}"}
                        {assign var="contact2" value="{$r3['nama_contact']}"}
                        {assign var="lama_bayar2" value="{$r3['lama_bayar']}"}
                    {/if}
                    {if $ds['kode_supplier3'] eq $r3['kode_supplier']}
                        {assign var="nama_supplier3" value="{$r3['nama_supplier']}"}
                        {assign var="contact3" value="{$r3['nama_contact']}"}
                        {assign var="lama_bayar3" value="{$r3['lama_bayar']}"}
                    {/if}
                {/foreach}
                <div class="form-group">
                    <div class="form-group col-lg-4 {if $ds['supplierpilihan'] eq $ds['kode_supplier1']} supplierpilihan {/if}" style="border-right: 1px solid #e7eaec;">
                        <div class="row">
                            <input type="radio" name="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan[]" class="cekbox col-lg-12" {if $ds['supplierpilihan'] eq $ds['kode_supplier1']} checked {/if} value="{$ds['kode_supplier1']}">
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="supplier1">Supplier 1</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="supplier1" name="supplier1" class="form-control" value="{$ds['kode_supplier1']}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="nama_supplier1">Nama</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="nama_supplier1" name="nama_supplier1" class="form-control" value="{$nama_supplier1}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="contact1">Contact</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="contact1" name="contact1" class="form-control" value="{$contact1}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="lama_bayar1">Lama Bayar</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="lama_bayar1" name="lama_bayar1" class="form-control" value="{$lama_bayar1}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="harga1">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga1" name="harga1" class="form-control" value="{$ds['harga1']}" disabled>
                        </div>
                        <!-- <div class="row">
                            <label class="col-lg-3 control-label" for="harga_k1">Harga (k)</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga_k1" name="harga_k1" class="form-control" value="{$harga_kecil1}" disabled>
                        </div> -->
                        <div class="row">
                            <label class="col-lg-3 control-label" for="keterangan_supplier1">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" id="keterangan_supplier1" name="keterangan_supplier1" class="form-control" value="{$ds['keterangan_supplier1']}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="file_supplier1">File</label><span class="col-lg-1" style="text-align: right">:</span><div class="col-lg-8">
                                {if $ds['file_supplier1'] neq ''}
                                    {assign var="filename" value=$ds['file_supplier1']}
                                    {assign var="shortname" value=$filename|truncate:20:"...":true}
                                    <a href="uploads/KEBUN/{$filename}" target="_blank" title="{$filename}" style="text-decoration: none;">
                                        <i class="fa fa-file"></i> {$shortname}
                                    </a>
                                {/if}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 {if $ds['supplierpilihan'] eq $ds['kode_supplier2']} supplierpilihan {/if}" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" name="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan[]" class="cekbox col-lg-12" {if $ds['supplierpilihan'] eq $ds['kode_supplier2']} checked {/if} value="{$ds['kode_supplier2']}">
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="supplier2">Supplier 2</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="supplier2" name="supplier2" class="form-control" value="{$ds['kode_supplier2']}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="nama_supplier2">Nama</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="nama_supplier2" name="nama_supplier2" class="form-control" value="{$nama_supplier2}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="contact2">Contact</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="contact2" name="contact2" class="form-control" value="{$contact2}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="lama_bayar2">Lama Bayar</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="lama_bayar2" name="lama_bayar2" class="form-control" value="{$lama_bayar2}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="harga2">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga2" name="harga2" class="form-control" value="{$ds['harga2']}" disabled>
                        </div>
                        <!-- <div class="row">
                            <label class="col-lg-3 control-label" for="harga_k2">Harga (k)</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga_k2" name="harga_k2" class="form-control" value="{$harga_kecil2}" disabled>
                        </div> -->
                        <div class="row">
                            <label class="col-lg-3 control-label" for="keterangan_supplier2">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" id="keterangan_supplier2" name="keterangan_supplier2" class="form-control" value="{$ds['keterangan_supplier2']}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="file_supplier2">File</label><span class="col-lg-1" style="text-align: right">:</span><div class="col-lg-8">
                                {if $ds['file_supplier2'] neq ''}
                                    {assign var="filename" value=$ds['file_supplier2']}
                                    {assign var="shortname" value=$filename|truncate:20:"...":true}
                                    <a href="uploads/KEBUN/{$filename}" target="_blank" title="{$filename}" style="text-decoration: none;">
                                        <i class="fa fa-file"></i> {$shortname}
                                    </a>
                                {/if}
                                </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 {if $ds['supplierpilihan'] eq $ds['kode_supplier3']} supplierpilihan {/if}">
                        <div class="row">
                            <input type="radio" name="{$ds["keperluan"]}{$ds["kode_item"]}supplierpilihan[]" class="cekbox col-lg-12" {if $ds['supplierpilihan'] eq $ds['kode_supplier3']} checked {/if} value="{$ds['kode_supplier3']}">
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="supplier3">Supplier 3</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="supplier3" name="supplier3" class="form-control" value="{$ds['kode_supplier3']}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="nama_supplier3">Nama</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="nama_supplier3" name="nama_supplier3" class="form-control" value="{$nama_supplier3}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="contact3">Contact</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="contact3" name="contact3" class="form-control" value="{$contact3}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="lama_bayar3">Lama Bayar</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 " type="text" id="lama_bayar3" name="lama_bayar3" class="form-control" value="{$lama_bayar3}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="harga3">Harga</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga3" name="harga3" class="form-control" value="{$ds['harga3']}" disabled>
                        </div>
                        <!-- <div class="row">
                            <label class="col-lg-3 control-label" for="harga_k3">Harga (k)</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8 amount" type="text" id="harga_k3" name="harga_k3" class="form-control" value="{$harga_kecil3}" disabled>
                        </div> -->
                        <div class="row">
                            <label class="col-lg-3 control-label" for="keterangan_supplier3">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" id="keterangan_supplier3" name="keterangan_supplier3" class="form-control" value="{$ds['keterangan_supplier3']}" disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label" for="file_supplier3">File</label><span class="col-lg-1" style="text-align: right">:</span><div class="col-lg-8">
                                {if $ds['file_supplier3'] neq ''}
                                    {assign var="filename" value=$ds['file_supplier3']}
                                    {assign var="shortname" value=$filename|truncate:20:"...":true}
                                    <a href="uploads/KEBUN/{$filename}" target="_blank" title="{$filename}" style="text-decoration: none;">
                                        <i class="fa fa-file"></i> {$shortname}
                                    </a>
                                {/if}
                                </div>
                        </div>
                    </div>
				</div>
                <div class="row"></div><br>
                <hr><hr>
            </div>
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