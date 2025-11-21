{include file="sections/header.tpl"}

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="{$_url}book_zoom/pinjaman/">
					<div class="form-group">
						<div class="col-md-8">
						</div>
						<div class="col-md-4">
							<a href="{$_url}book_zoom/addPinjaman/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Pinjaman</a>
<!--							<a href="{$_url}book_zoom/kirimemail" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Kirim Email</a>-->
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                {if $d}
                    {foreach $d as $ds}
                        {if $tanggal_sementara eq changeFormat($ds['tanggal_meeting'])}
                            <div class="body-zoom row">
                                <div class="col-md-2">{rangeMeeting($ds['tanggal_meeting'], $ds['durasi'])}</div>
                                <div class="col-md-3">
                                    Oleh : {namaBooking($ds['user_id'])}
                                </div>
                                <div class="col-md-5">
                                    {$ds['pinjaman']}
                                </div>
                                <div class="col-md-1">
                                    {if (($ds['user_id'] eq $user_id) || (_auth2('GET-ZOOM-LINK',$user_id)) ) &&  ($ds['subjek'] eq 'Pinjam Barang Inventaris')}
                                    <a href="{$_url}book_zoom/cancelPinjaman/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="{$ds['id']}">
                                    <i class="fa fa-trash"></i> Cancel</a>
                                    {/if}
                                </div>
                                <div class="col-md-1"><span class="status-zoom" style="background-color: {if ($ds['status']) eq 'PEND'} #ffc107 {elseif ($ds['status']) eq 'DONE'} #28a745 {elseif ($ds['status']) eq 'READY'} #007bff {else} #dc3545 {/if}">{$ds['status']}</span></div>
                            </div>
                        {else}
                            {$tanggal_sementara = changeFormat($ds['tanggal_meeting'])}
                            <div class="header-zoom">
                                {if cekTanggal($ds['tanggal_meeting']) eq 1}
                                    Today
                                {elseif cekTanggal($ds['tanggal_meeting']) eq 2}
                                    Tomorrow
                                {else}
                                    {changeFormat($ds['tanggal_meeting'])}
                                {/if}
                            </div>
                            <div class="body-zoom row">
                                <div class="col-md-2">{rangeMeeting($ds['tanggal_meeting'], $ds['durasi'])}</div>
                                <div class="col-md-3">
                                    Oleh : {namaBooking($ds['user_id'])}
                                </div>
                                <div class="col-md-5">
                                    {$ds['pinjaman']}
                                </div>
                                <div class="col-md-1">
                                    {if ($ds['user_id'] eq $user_id) || (_auth2('GET-ZOOM-LINK',$user_id) ) && ($ds['subjek'] eq 'Pinjam Barang Inventaris')}
                                    <a href="{$_url}book_zoom/cancelPinjaman/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="{$ds['id']}"><i class="fa fa-trash"></i> Cancel</a>
                                    {/if}
                                </div>
                                <div class="col-md-1"><span class="status-zoom" style="background-color: {if ($ds['status']) eq 'PEND'} #ffc107 {elseif ($ds['status']) eq 'DONE'} #28a745 {elseif ($ds['status']) eq 'READY'} #007bff {else} #dc3545 {/if}">{$ds['status']}</span></div>
                            </div>
                        {/if}
                    {/foreach}
                {else}
                    Tidak Ada Pinjaman
                {/if}
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