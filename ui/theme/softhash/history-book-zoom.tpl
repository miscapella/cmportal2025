{include file="sections/header.tpl"}

<div class="row">
    <div class="col-md-12">
       <a href="{$_url}book_zoom/history-export/" class="btn btn-xs btn-danger">Export</a>
        <div class="panel panel-default">
            <div class="panel-body">
                {if $d}
                    {foreach $d as $ds}
                        {if $tanggal_sementara eq changeFormat($ds['tanggal_meeting'])}
                            <div class="body-zoom row">
                                <div class="col-md-2">{rangeMeeting($ds['tanggal_meeting'], $ds['durasi'])}</div>
                                <div class="col-md-5">
                                    {$ds['subjek']}<br>
                                    <span class="pinjaman_zoom">Oleh : {namaBooking($ds['user_id'])}</span>
                                </div>
                                <div class="col-md-2 pinjaman_zoom">
                                    {if $ds['direksi'] eq 'TRUE'}Direksi mengikuti Meeting ini{/if}<br>
                                    {$ds['pinjaman']}
                                </div>
                                <div class="col-md-2">
                                    
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
                                <div class="col-md-5">
                                    {$ds['subjek']}<br>
                                    <span class="pinjaman_zoom">Oleh : {namaBooking($ds['user_id'])}</span>
                                </div>
                                <div class="col-md-2 pinjaman_zoom">
                                    {if $ds['direksi'] eq 'TRUE'}Direksi mengikuti Meeting ini{/if}<br>
                                    {$ds['pinjaman']}
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-1"><span class="status-zoom" style="background-color: {if ($ds['status']) eq 'PEND'} #ffc107 {elseif ($ds['status']) eq 'DONE'} #28a745 {elseif ($ds['status']) eq 'READY'} #007bff {else} #dc3545 {/if}">{$ds['status']}</span></div>
                            </div>
                        {/if}
                    {/foreach}
                {else}
                    History kosong
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