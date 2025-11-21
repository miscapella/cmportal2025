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
{if $d['status'] neq 'REVISI'}
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
                <div class="form-group"><label class="col-lg-3 control-label" for="status">Status</label>
					<div class="col-lg-9"><input type="text" id="status" name="status" class="form-control" value="{$d['status']}" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Pesan</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5">{$d['pesan']}</textarea>
					</div>
				</div><br><br><br><br><br>
				{if $d['diperiksa_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-5"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="{if $d['diperiksa_nama'] neq ''}{$d['diperiksa_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="{$d['diperiksa_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['diketahui_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-5"><input type="text" id="diketahui" name="diketahui" class="form-control" value="{if $d['diketahui_nama'] neq ''}{$d['diketahui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="{$d['diketahui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['disetujui_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="{if $d['disetujui_nama'] neq ''}{$d['disetujui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="{$d['disetujui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['ditolak_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-5"><input type="text" id="ditolak" name="ditolak" class="form-control" value="{$d['ditolak_nama']}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="{$d['ditolak_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="{$ds['keperluan']}" disabled>
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

{else}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-4"><input type="text" id="no_pr" name="no_pr" class="form-control" value="{$d['no_pr']}" disabled></div>
					
					<label class="col-lg-2 control-label" for="no_pr_awal" style="text-align: right">No. PR Awal</label>
					<div class="col-lg-4"><input type="text" id="no_pr_awal" name="no_pr_awal" class="form-control" value="{$n['no_pr']}" disabled></div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-4"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
					
					<label class="col-lg-2 control-label" for="tgl_awal" style="text-align: right">Tanggal PR Awal</label>
					<div class="col-lg-4"><input type="text" id="idates" name="idates" class="form-control" value="{$idates}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="priority">Kepentingan</label>
					<div class="col-lg-4"><input type="text" id="priority" name="priority" class="form-control" value="{$d['priority']}" disabled></div>
					
					<label class="col-lg-2 control-label" for="priority_awal" style="text-align: right">Kepentingan Awal</label>
					<div class="col-lg-4"><input type="text" id="priority_awal" name="priority_awal" class="form-control" value="{$n['priority']}" disabled></div>
				</div><br>
                <div class="form-group" style="margin-bottom:40px">
				    <label class="col-lg-2 control-label" for="ket_revisi">Keterangan Revisi</label>
					<div class="col-lg-4"><textarea type="text" id="ket_revisi" name="ket_revisi" class="form-control" rows="5" disabled>{$d['keterangan_revisi']}</textarea></div>
					<label class="col-lg-2 control-label" for="pesan_awal" style="text-align: right">Pesan Awal</label>
					<div class="col-lg-4"><textarea type="text" id="pesan_awal" name="pesan_awal" class="form-control" rows="5" disabled>{$n['pesan']}</textarea></div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
                <div class="form-group"><label class="col-lg-2 control-label" for="pesan">Pesan</label>
					<div class="col-lg-10"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5">{$d['pesan']}</textarea>
					</div>
				</div><br><br><br><br><br>
				{if $d['diperiksa_nama'] neq ''}
				<div class="form-group"><label class="col-lg-2 control-label" for="diperiksa">Diperiksa Oleh</label>
					<div class="col-lg-6"><input type="text" id="diperiksa" name="diperiksa" class="form-control" value="{if $d['diperiksa_nama'] neq ''}{$d['diperiksa_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiperiksa">Tanggal Diperiksa</label>
                    <div class="col-lg-2"><input type="text" id="tgldiperiksa" name="tgldiperiksa" class="form-control" value="{$d['diperiksa_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['diketahui_nama'] neq ''}
				<div class="form-group"><label class="col-lg-2 control-label" for="diketahui">Diketahui Oleh</label>
					<div class="col-lg-6"><input type="text" id="diketahui" name="diketahui" class="form-control" value="{if $d['diketahui_nama'] neq ''}{$d['diketahui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldiketahui">Tanggal Diketahui</label>
                    <div class="col-lg-2"><input type="text" id="tgldiketahui" name="tgldiketahui" class="form-control" value="{$d['diketahui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['disetujui_nama'] neq ''}
				<div class="form-group"><label class="col-lg-2 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-6"><input type="text" id="disetujui" name="disetujui" class="form-control" value="{if $d['disetujui_nama'] neq ''}{$d['disetujui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="{$d['disetujui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
				{if $d['ditolak_nama'] neq ''}
				<div class="form-group"><label class="col-lg-2 control-label" for="ditolak">Ditolak Oleh</label>
					<div class="col-lg-6"><input type="text" id="ditolak" name="ditolak" class="form-control" value="{$d['ditolak_nama']}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tglditolak">Tanggal Ditolak</label>
                    <div class="col-lg-2"><input type="text" id="tglditolak" name="tglditolak" class="form-control" value="{$d['ditolak_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
               <div class="form-group"><label class="col-lg-2 control-label">Approval</label>
					<div class="col-lg-10" style="margin-top: 5px;">
					    <a href="{$_url}pembelian/detail-pr-approve/" class="btn btn-primary btn-xs" id="approve">APPROVE</a>
					    <a href="{$_url}pembelian/detail-pr-reject/" class="btn btn-danger btn-xs" id="reject">REJECT</a>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-input" style="overflow:auto;white-space:nowrap;">
                <h2>PURCHASE REQUISITION</h2>
                {assign var="nourut" value=1}
                {foreach $e as $ds}
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="{$ds['keperluan']}" disabled>
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
	<div class="col-md-6">
        <div class="panel panel-default">
            <div class="bg-danger panel-body detail-pr-input detail-pr-input-danger" style="overflow:auto;white-space:nowrap;">
                <h2>PURCHASE REQUISITION AWAL</h2>
                {assign var="nourut" value=1}
                {foreach $f as $ds}
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
                <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan1">Keperluan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="keperluan1" name="keperluan1" class="form-control" value="{$ds['keperluan']}" disabled>
				</div><br>
                <div class="form-group"><label class="col-lg-2 control-label" for="line1">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="detail-bagian col-lg-9" value="{$ds['line']}">{$nama_bagian}</a>
				</div><br>
                {assign var="nama_item" value=""}
                {foreach $tg1 as $r1}
                    {if $ds['kode_item'] eq $r1['kode_item']}
                        {assign var="nama_item" value="{$r1['nama_item']}"}
                    {/if}
                {/foreach}
                <div class="form-group" ><label class="col-lg-2 control-label" for="nama_item1">Nama Item</label><span class="col-lg-1" style="text-align: right">:</span>
                    <a href="#" class="col-lg-9 detail-itemstock" value="{$ds['kode_item']}">{$nama_item}</a>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="qty_req1">Qty Req</label><span class="col-lg-1" style="text-align: right">:</span>
					<div class="col-lg-9" type="text" id="qty_req1" name="qty_req1" class="form-control"><span class="amount">{$ds['qty_req']}</span> {$satuan}</div>
				</div><br>
                {assign var=tglSplit value="-"|explode:$ds['tgl_diperlukan']}
                <div class="form-group" ><label class="col-lg-2 control-label" for="tgl_diperlukan1">Tgl Diperlukan</label><span class="col-lg-1" style="text-align: right">:</span>
					<input class="col-lg-9" type="text" id="tgl_diperlukan1" name="tgl_diperlukan1" value="{$tglSplit[2]}-{$tglSplit[1]}-{$tglSplit[0]}" disabled>
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

{/if}



<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}