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
				<h3>TAMBAH SURAT PERINTAH KERJA</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal SPnK</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="kontraktor">Kontraktor <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="kontraktor" name="kontraktor">
                            {$opt_kontraktor}
                        </select>
                    </div>
                </div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="TIDAK URGENT">TIDAK URGENT</option>
							<option value="URGENT">URGENT</option>
						</select>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn</label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="0"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="alamat">Alamat</label>
					<div class="col-lg-9"><input type="text" id="alamat" name="alamat" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="no_kontrak">No Kontrak</label>
					<div class="col-lg-9"><input type="text" id="no_kontrak" name="no_kontrak" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="catatan">Catatan</label>
					<div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control"></div>
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
							<th style="width:10%">No. SPmK</th>
							<th style="width:10%">Divisi</th>
							<th style="width:10%">Jenis Pekerjaan</th>
							<th style="width:10%">Lokasi Kebun</th>
							<th style="width:10%">Afdeling</th>
							<th style="width:10%">Spesifikasi</th>
							<th style="width:10%">Block</th>
							<th style="width:10%">Ha</th>
							<th style="width:10%">PKK</th>
						</tr>
						</thead>
						<tbody class="sys_tables">
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