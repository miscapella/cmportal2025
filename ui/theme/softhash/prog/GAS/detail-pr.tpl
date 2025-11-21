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
			<div class="panel-body {if $d['priority'] eq 'MENENGAH'}yellow-bg{else if $d['priority'] eq 'TINGGI'}red-bg{/if}">
			    <div class="col-lg-6"><h3>DETAIL PURCHASE REQUISITION</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}permintaan/list-pr/" class="btn btn-success btn-sm">Back</a></div>
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
                <!--<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="{$d['priority']}" disabled></div>
				</div><br>-->
                {if $d['posisi'] eq 'PR1'}
                <div class="form-group"><label class="col-lg-3 control-label" for="pembelian">Pembelian</label>
					<div class="col-lg-9"><input type="text" id="pembelian" name="pembelian" class="form-control" value="{$d['pembelian']}" disabled></div>
				</div><br>
                {/if}
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="{$d['status']}" disabled></div>
				</div><br>
                <!-- <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5" disabled>{$d['pesan']}</textarea>
					</div>
				</div><br><br><br><br><br>
				{if $d['ditolak_nama'] neq ''}
                <div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="{$d['ditolak_nama']}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="{$d['ditolak_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                {else}
                <div class="form-group"><label class="col-lg-3 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-5"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="{if $d['diperiksa_nama'] neq ''}{$d['diperiksa_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="{$d['diperiksa_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-5"><input type="text" id="diketahui" name="diketahui" class="form-control" value="{if $d['diketahui_nama'] neq ''}{$d['diketahui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="{$d['diketahui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="{if $d['disetujui_nama'] neq ''}{$d['disetujui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="{$d['disetujui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br> -->
                {/if}
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
                    PURCHASE REQUISITION ITEM #{$nourut}
				</div><br>
                {assign var="nm_inventaris" value=""}
                {if $ds['keperluan'] eq 'STOCK'}
                    {assign var="nm_inventaris" value="STOCK"}
                {else if $ds['keperluan'] eq 'PENGADAAN'}
                    {assign var="nm_inventaris" value="PENGADAAN"}
                {else if $ds['keperluan'] eq 'PERGANTIAN'}
                    {assign var="nm_inventaris" value="PERGANTIAN"}
                {else}
                    {foreach $tg as $r}
                        {if $ds['keperluan'] eq $r['keperluan']}
                            {assign var="nm_inventaris" value="{$r['nm_inventaris']}"}
                        {/if}
                    {/foreach}
                {/if}
                <!-- <div class="form-group"><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-inventaris col-lg-9" value="{$ds['keperluan']}">{$nm_inventaris}</a>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="{$nm_inventaris}" disabled>
				</div><br> -->
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="kd_item">Item Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="kd_item" name="kd_item" class="form-control" value="{$ds['kd_item']}" disabled>
				</div><br> -->
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="{$ds['keperluan']}" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="nm_item">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
					<!-- <input class="col-lg-9 detail-itemstock" type="text" id="nm_item" name="nm_item" class="form-control" value="{$nm_item}" disabled> -->
                    <a href="#" class="col-lg-9 detail-itemstock" value="{$ds['kd_item']}">{$nm_item}</a>
				</div><br>
                <!-- <div class="form-group" ><label class="col-lg-2 control-label" for="merk">Merk</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="merk" name="merk" class="form-control" value="{$merk}" disabled>
				</div><br> -->
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control"><span>{$ds['qty_req']}</span> {$satuan}</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_stock">Stock</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="qty_stock" name="qty_stock" class="form-control" value="{$ds['qty_stock']}" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" class="form-control" value="{$ds['tgl_diperlukan']}" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">Keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keterangan" name="keterangan" class="form-control" value="{$ds['keterangan']}" disabled>
				</div><hr><hr>
                <div class="form-group">PILIHAN SUPPLIER</div>
                <br />
                {assign var="supplier1" value=""}
                {assign var="bidangsupplier1" value=""}
                {assign var="supplier2" value=""}
                {assign var="bidangsupplier2" value=""}
                {assign var="supplier3" value=""}
                {assign var="bidangsupplier3" value=""}
                {foreach $tg3 as $r3}
                    {if $ds['kd_supplier1'] eq $r3['kode_supplier']}
                        {assign var="supplier1" value="{$r3['nama_supplier']}"}
                        {assign var="bidangsupplier1" value="{$r3['bidang']}"}
                        {assign var="email1" value="{$r3['email']}"}
                    {/if}
                    {if $ds['kd_supplier2'] eq $r3['kode_supplier']}
                        {assign var="supplier2" value="{$r3['nama_supplier']}"}
                        {assign var="bidangsupplier2" value="{$r3['bidang']}"}
                        {assign var="email2" value="{$r3['email']}"}
                    {/if}
                    {if $ds['kd_supplier3'] eq $r3['kode_supplier']}
                        {assign var="supplier3" value="{$r3['nama_supplier']}"}
                        {assign var="bidangsupplier3" value="{$r3['bidang']}"}
                        {assign var="email3" value="{$r3['email']}"}
                    {/if}
                {/foreach}
                <div class="form-group">
                    <div class="form-group col-lg-4 {if $ds['supplierpilihan'] eq '1'} supplierpilihan {/if}" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" class="cekbox col-lg-12" {if $ds['supplierpilihan'] eq '1'} checked {/if} disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 1</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="{$ds['kd_supplier1']}">{$supplier1}</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Email</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$email1}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">File</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            {if $ds['file_supplier1']}
                                <a href="uploads/GAS/PR_SUPPLIER/{$ds['file_supplier1']}" class="col-lg-8 file-supplier" value="{$ds['file_supplier1']}">Lihat File</a>
                            {else}
                                <input class="col-lg-8" type="text" value="" disabled/>
                            {/if}
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Bidang</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$bidangsupplier1}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="{$ds['harga1']}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8"><input class="currency" type="text" value="{if $ds['exclude_ppn1']}Exclude{else}{$ds['ppn1']}%{/if}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga + Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="{$ds['harga_ppn1']}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Keterangan</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$ds['keterangan_supplier1']}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Garansi</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{strip}
                                {if $ds.garansi_bulan_supplier1 == 0 && $ds.garansi_hari_supplier1 == 0}
                                    TIDAK ADA
                                {elseif $ds.garansi_bulan_supplier1 == 0}
                                    {$ds.garansi_hari_supplier1} Hari
                                {elseif $ds.garansi_hari_supplier1 == 0}
                                    {$ds.garansi_bulan_supplier1} Bulan
                                {else}
                                    {$ds.garansi_bulan_supplier1} Bulan {$ds.garansi_hari_supplier1} Hari
                                {/if}
                            {/strip}" disabled/>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 {if $ds['supplierpilihan'] eq '2'} supplierpilihan {/if}" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" class="cekbox col-lg-12" {if $ds['supplierpilihan'] eq '2'} checked {/if} disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 2</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="{$ds['kd_supplier2']}">{$supplier2}</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Email</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$email2}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">File</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            {if $ds['file_supplier2']}
                                <a href="uploads/GAS/PR_SUPPLIER/{$ds['file_supplier2']}" class="col-lg-8 file-supplier" value="{$ds['file_supplier2']}">Lihat File</a>
                            {else}
                                <input class="col-lg-8" type="text" value="" disabled/>
                            {/if}
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Bidang</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$bidangsupplier2}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="{$ds['harga2']}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8"><input class="currency" type="text" value="{if $ds['exclude_ppn2']}Exclude{else}{$ds['ppn2']}%{/if}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga + Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="{$ds['harga_ppn2']}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Keterangan</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$ds['keterangan_supplier2']}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Garansi</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{strip}
                                {if $ds.garansi_bulan_supplier2 == 0 && $ds.garansi_hari_supplier2 == 0}
                                    TIDAK ADA
                                {elseif $ds.garansi_bulan_supplier2 == 0}
                                    {$ds.garansi_hari_supplier2} Hari
                                {elseif $ds.garansi_hari_supplier2 == 0}
                                    {$ds.garansi_bulan_supplier2} Bulan
                                {else}
                                    {$ds.garansi_bulan_supplier2} Bulan {$ds.garansi_hari_supplier2} Hari
                                {/if}
                            {/strip}" disabled/>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 {if $ds['supplierpilihan'] eq '3'} supplierpilihan {/if}" style="border-right: 1px solid #e7eaec">
                        <div class="row">
                            <input type="radio" class="cekbox col-lg-12" {if $ds['supplierpilihan'] eq '3'} checked {/if} disabled>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Supplier 3</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <a href="#" class="col-lg-8 detail-supplier" value="{$ds['kd_supplier3']}">{$supplier3}</a>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Email</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$email3}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">File</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            {if $ds['file_supplier3']}
                                <a href="uploads/GAS/PR_SUPPLIER/{$ds['file_supplier3']}" class="col-lg-8 file-supplier" value="{$ds['file_supplier3']}">Lihat File</a>
                            {else}
                                <input class="col-lg-8" type="text" value="" disabled/>
                            {/if}
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Bidang</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$bidangsupplier3}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="{$ds['harga3']}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8"><input class="currency" type="text" value="{if $ds['exclude_ppn3']}Exclude{else}{$ds['ppn3']}%{/if}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Harga + Ppn</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <span class="col-lg-8">Rp <input class="currency" type="text" value="{$ds['harga_ppn3']}" disabled/></span>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Keterangan</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{$ds['keterangan_supplier3']}" disabled/>
                        </div>
                        <div class="row">
                            <label class="col-lg-3 control-label">Garansi</label>
                            <span class="col-lg-1" style="text-align: right">:</span>
                            <input class="col-lg-8" type="text" value="{strip}
                                {if $ds.garansi_bulan_supplier3 == 0 && $ds.garansi_hari_supplier3 == 0}
                                    TIDAK ADA
                                {elseif $ds.garansi_bulan_supplier3 == 0}
                                    {$ds.garansi_hari_supplier3} Hari
                                {elseif $ds.garansi_hari_supplier3 == 0}
                                    {$ds.garansi_bulan_supplier3} Bulan
                                {else}
                                    {$ds.garansi_bulan_supplier3} Bulan {$ds.garansi_hari_supplier3} Hari
                                {/if}
                            {/strip}" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
                <br />
                <hr />
                <hr />
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