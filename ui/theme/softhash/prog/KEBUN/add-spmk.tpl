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
			<div class="panel-body">
				<h3>TAMBAH SURAT PERMINTAAN KERJA</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Servis</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spmk">Tanggal SPmK</label>
					<div class="col-lg-9"><input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span></label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="URGENT">URGENT</option>
							<option value="TIDAK URGENT">TIDAK URGENT</option>
						</select>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="divisi" name="divisi" class="form-control" value="{$divisi}">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="{$jenis_pekerjaan}">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi Kebun <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="lokasi" name="lokasi" class="form-control" value="{$lokasi}">
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="text" id="afdeling" name="afdeling" class="form-control" value="{$afdeling}">
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th style="width:58%">Keterangan / Rincian Spesifikasi <span style="color: red;">*</span></th>
                            <th>Block <span style="color: red;">*</span></th>
                            <th>Ha <span style="color: red;">*</span></th>
                            <th>PKK <span style="color: red;">*</span></th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$clist}</div>
						</tbody>
					</table>
				</form>
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