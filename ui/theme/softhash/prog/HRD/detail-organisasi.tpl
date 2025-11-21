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
			    <div class="col-lg-6"><h3>DETAIL ORGANISASI</h3></div>
			    <div class="col-lg-6" style="text-align: right"><a href="{$_url}struktur-organisasi/list/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body detail-pr-head">
        <!--
        <div class="form-group">
          <h1 class="col-lg-3" style="width: 100%">Level {$d['level_posisi']}</h1>
        </div>
        -->
				<div class="form-group"><label class="col-lg-3 control-label" for="id_posisi">Id Posisi</label>
					<div class="col-lg-9"><input type="text" id="id_posisi" name="id_posisi" class="form-control" value="{$d['id_posisi']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="nama_internal">Nama Internal</label>
					<div class="col-lg-9"><input type="text" id="nama_internal" name="nama_internal" class="form-control" value="{$d['nama_internal']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="nama_eksternal">Nama Eksternal</label>
					<div class="col-lg-9"><input type="text" id="nama_eksternal" name="nama_eksternal" class="form-control" value="{$d['nama_eksternal']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="deskripsi">Deskripsi</label>
					<div class="col-lg-9"><textarea type="text" id="deskripsi" name="deskripsi" class="form-control" rows="5" disabled>{$d['deskripsi']}</textarea>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="pekerjaan">Pekerjaan</label>
					<div class="col-lg-9"><input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{$d['pekerjaan']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="nama_pekerjaan">Nama Pekerjaan</label>
					<div class="col-lg-9"><input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control" value="{$d['nama_pekerjaan']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="nilai_posisi">Nilai Posisi</label>
					<div class="col-lg-9"><input type="text" id="nilai_posisi" name="nilai_posisi" class="form-control" value="{$d['nilai_posisi']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="level_posisi">Level Posisi</label>
					<div class="col-lg-9"><input type="text" id="level_posisi" name="level_posisi" class="form-control" value="{$d['level_posisi']}" disabled></div>
				</div><br>
        <div class="form-group"><label class="col-lg-3 control-label" for="valid_dari">Valid Dari</label>
					<div class="col-lg-9"><input type="text" id="valid_dari" name="valid_dari" class="form-control" value="{$d['valid_dari']}" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="valid_sampai">Valid Sampai</label>
					<div class="col-lg-9"><input type="text" id="valid_sampai" name="valid_sampai" class="form-control" value="{$d['valid_sampai']}" disabled>
					</div>
				</div><br>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <a href="{$_url}struktur-organisasi/edit/{$d['id']}/" class="btn btn-warning"><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        <div class="form-group">Parent</div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="parent_id_posisi"
            >Id Posisi</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="parent_id_posisi"
            name="parent_id_posisi"
            class="form-control"
          >
            {$d['parent_id_posisi']}
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="parent_nama_posisi">Nama Posisi</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="parent_nama_posisi"
            name="parent_nama_posisi"
            class="form-control"
          >
            {$d['parent_nama_posisi']}
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="parent_valid_dari">Valid Dari</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="date"
            id="parent_valid_dari"
            name="parent_valid_dari"
            class="form-control"
          >
            <p>{$d['parent_valid_dari']}</p>
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="parent_valid_sampai">Valid Sampai</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="date"
            id="parent_valid_sampai"
            name="parent_valid_sampai"
            class="form-control"
          >
            <p>{$d['parent_valid_sampai']}</p>
          </div>
        </div>
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