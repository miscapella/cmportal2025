{include file="sections/header.tpl"}

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <form
          class="form-horizontal"
          method="post"
          action="{$_url}book_zoom/list/"
        >
          <div class="form-group">
            <div class="col-md-8"></div>
            <div class="col-md-4">
              <a href="{$_url}book_zoom/add/" class="btn btn-success btn-block"
                ><i class="fa fa-plus"></i> Book Meetings</a
              >
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
        {if $d} {foreach $d as $ds} {if $tanggal_sementara eq
        changeFormat($ds['tanggal_meeting'])}
        <div class="body-zoom row">
          <div class="col-md-2">
            {rangeMeeting($ds['tanggal_meeting'], $ds['durasi'])}
          </div>
          <div class="col-md-5">
            {$ds['subjek']}<br />
            <span class="pinjaman_zoom"
              >Oleh : {namaBooking($ds['user_id'])}</span
            >
            <!-- <span class="pinjaman_zoom"
              >Meeting ID : {namaBooking($ds['meeting_id'])}</span
            > -->
          </div>
          <div class="col-md-2 pinjaman_zoom">
            {if $ds['direksi'] eq 'TRUE'}Direksi mengikuti Meeting ini{/if}<br />
            {$ds['pinjaman']}
          </div>
          <div class="col-md-2">
            {if ($ds['user_id'] eq $user_id) ||
            (_auth2('GET-ZOOM-LINK',$user_id))}
            <a
              href="{$_url}book_zoom/edit/{$ds['id']}/"
              class="btn btn-primary btn-xs"
            >
              Get Link</a
            >
            <a
              href="{$_url}book_zoom/cancel/{$ds['id']}/"
              class="btn btn-danger btn-xs cdelete"
              id="{$ds['id']}"
              ><i class="fa fa-trash"></i> Cancel</a
            >
            {/if}
          </div>
          <div class="col-md-1">
            <span
              class="status-zoom"
              style="background-color: {if ($ds['status']) eq 'PEND'} #ffc107 {elseif ($ds['status']) eq 'DONE'} #28a745 {elseif ($ds['status']) eq 'READY'} #007bff {else} #dc3545 {/if}"
              >{$ds['status']}</span
            >
          </div>
        </div>
        {else} {$tanggal_sementara = changeFormat($ds['tanggal_meeting'])}
        <div class="header-zoom">
          {if cekTanggal($ds['tanggal_meeting']) eq 1} Today {elseif
          cekTanggal($ds['tanggal_meeting']) eq 2} Tomorrow {else}
          {changeFormat($ds['tanggal_meeting'])} {/if}
        </div>
        <div class="body-zoom row">
          <div class="col-md-2">
            {rangeMeeting($ds['tanggal_meeting'], $ds['durasi'])}
          </div>
          <div class="col-md-5">
            {$ds['subjek']}<br />
            <span class="pinjaman_zoom"
              >Oleh : {namaBooking($ds['user_id'])}</span
            >
          </div>
          <div class="col-md-2 pinjaman_zoom">
            {if $ds['direksi'] eq 'TRUE'}Direksi mengikuti Meeting ini{/if}<br />
            {$ds['pinjaman']}
          </div>
          <div class="col-md-2">
            {if ($ds['user_id'] eq $user_id) ||
            (_auth2('GET-ZOOM-LINK',$user_id))}
            <a
              href="{$_url}book_zoom/edit/{$ds['id']}/"
              class="btn btn-primary btn-xs"
            >
              Get Link</a
            >
            <a
              href="{$_url}book_zoom/cancel/{$ds['id']}/"
              class="btn btn-danger btn-xs cdelete"
              id="{$ds['id']}"
              ><i class="fa fa-trash"></i> Cancel</a
            >
            {/if}
          </div>
          <div class="col-md-1">
            <span
              class="status-zoom"
              style="background-color: {if ($ds['status']) eq 'PEND'} #ffc107 {elseif ($ds['status']) eq 'DONE'} #28a745 {elseif ($ds['status']) eq 'READY'} #007bff {else} #dc3545 {/if}"
              >{$ds['status']}</span
            >
          </div>
        </div>
        {/if} {/foreach} {else} Tidak Ada Meeting {/if}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">{$paginator['contents']}</div>
</div>
{include file="sections/footer.tpl"}
