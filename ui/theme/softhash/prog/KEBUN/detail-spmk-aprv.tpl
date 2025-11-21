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
			    <div class="col-lg-6"><h3>DETAIL SURAT PERMINTAAN KERJA</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}pembelian/list-spmk-aprv/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPmK</label>
					<div class="col-lg-9"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="{$d['no_spmk']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spmk">Tanggal SPmK</label>
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
				{if $d['disetujui_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disetujui">Disetujui Oleh</label>
					<div class="col-lg-5"><input type="text" id="disetujui" name="disetujui" class="form-control" value="{if $d['disetujui_nama'] neq ''}{$d['disetujui_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisetujui">Tanggal Disetujui</label>
                    <div class="col-lg-2"><input type="text" id="tgldisetujui" name="tgldisetujui" class="form-control" value="{$d['disetujui_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				{/if}
                {if $d['disurvey_nama'] neq ''}
				<div class="form-group"><label class="col-lg-3 control-label" for="disurvey">Disurvey Oleh</label>
					<div class="col-lg-5"><input type="text" id="disurvey" name="disurvey" class="form-control" value="{if $d['disurvey_nama'] neq ''}{$d['disurvey_nama']}{else}Menunggu Approval{/if}" disabled></div>
                    <label class="col-lg-2 control-label text-right" for="tgldisurvey">Tanggal Disurvey</label>
                    <div class="col-lg-2"><input type="text" id="tgldisurvey" name="tgldisurvey" class="form-control" value="{$d['disurvey_tgl']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
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
                    SERVIS #{$nourut}
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="spesifikasi">Spesifikasi</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="spesifikasi" name="spesifikasi" class="form-control">{$ds['spesifikasi']}</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="block">Block</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="block" name="block" class="form-control">{$ds['block']}</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="ha">Ha</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="ha" name="ha" class="form-control">{$ds['ha']}</div>
				</div><br>
                <div class="form-group" ><label class="col-lg-2 control-label" for="pkk">PKK</label><span class="col-lg-1" style="text-align: right">:</span>
                    <div class="col-lg-9" type="text" id="pkk" name="pkk" class="form-control">{$ds['pkk']}</div>
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