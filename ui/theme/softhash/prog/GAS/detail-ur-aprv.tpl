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

<input type="hidden" id="idtpl" value="{$cid}" class="form-control" />

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body {if $d['priority'] eq 'URGENT'}red-bg{else}blue-bg{/if}">
			    <div class="col-lg-6"><h3>DETAIL USER REQUEST</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}permintaanbarang/list-ur-aprv/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_mintabarang">No. UR</label>
					<div class="col-lg-9"><input type="text" id="no_mintabarang" name="no_mintabarang" class="form-control" value="{$d['no_mintabarang']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal UR</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div>
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
                    USER REQUEST ITEM #{$nourut}
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="{$ds['keperluan']}" disabled>
				</div><br>
                <!-- <div class="form-group"><label class="col-lg-2 control-label" for="line">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-bagian col-lg-9" value="{$ds['line']}">{$nama_bagian}</a>
				</div><br>  -->
                {assign var="nama_item" value=""}
                {foreach $tg1 as $r1}
                    {if $ds['kode_item'] eq $r1['kode_item']}
                        {assign var="nama_item" value="{$r1['nama_item']}"}
                    {/if}
                {/foreach}
				<div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">Nama Barang</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="namabarangModal name="namabarangModal" class="form-control" value="{$ds['namabarang']}" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req" name="qty_req" class="form-control"><span class="amount">{$ds['qty_req']}</span> {$satuan}</div>
				</div><br>
                {assign var=tglSplit value="-"|explode:$ds['tgl_diperlukan']}
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan" name="tgl_diperlukan" value="{$tglSplit[2]}-{$tglSplit[1]}-{$tglSplit[0]}" disabled>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="keterangan">keterangan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keterangan" name="keterangan" class="form-control" value="{$ds['keterangan']}" disabled>
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
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<!-- <div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan</label>
					<div class="col-lg-9"><input type="text" id="priority" name="priority" class="form-control" value="{$d['priority']}" disabled></div>
				</div><br> -->
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5">{$d['pesan']}</textarea>
					</div>
				</div><br><br><br><br><br>
				{if $d['disetujui_atasan_oleh'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui-atasan">Disetujui Atasan Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui-atasan" name="disetujui-atasan" class="form-control" value="{if $d['disetujui_atasan_nama'] neq ''}{$d['disetujui_atasan_oleh']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui-atasan">Tanggal Atasan Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui-atasan" name="tgldisetujui-atasan" class="form-control" value="{$d['disetujui_atasan_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['disetujui_service_oleh'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui-service">Disetujui Service Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui-service" name="disetujui-service" class="form-control" value="{if $d['disetujui_service_oleh'] neq ''}{$d['disetujui_service_oleh']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui-service">Tanggal Service Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui-service" name="tgldisetujui-service" class="form-control" value="{$d['disetujui_service_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['disetujui_gas_oleh'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui-gas">Disetujui Gas Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui-gas" name="disetujui-gas" class="form-control" value="{if $d['disetujui_gas_oleh'] neq ''}{$d['disetujui_gas_oleh']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui-gas">Tanggal Gas Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui-gas" name="tgldisetujui-gas" class="form-control" value="{$d['disetujui_gas_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['ditolak_oleh'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="{$d['ditolak_nama']}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="{$d['ditolak_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
               <div class="form-group"><label class="col-lg-3 control-label">Approval</label>
					<div class="col-lg-9" style="margin-top: 5px;">
						{if $f['approval'] == $user['username']}
							<a class="btn btn-primary btn-xs" id="approve">RECEIVE</a>
						{else}
							<a class="btn btn-primary btn-xs" id="approve">APPROVE</a>
						{/if}
					    <a class="btn btn-danger btn-xs" id="reject">REJECT</a>
					</div>
				</div><br>
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