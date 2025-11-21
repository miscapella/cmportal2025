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
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL UR</h3></div>
				<div class="col-lg-6" style="text-align: right"><a href="{$_url}permintaanbarang/{$previous_uri}" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Status</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="{$es['approval']}" style="background-color: #f7f7f7;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #f7f7f7;" type="text" id="tgl" name="tgl" class="form-control" value="{$es['tanggal']|date_format:'%d-%m-%Y'}" data-auto-close="true" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform" autocomplete="off" spellcheck="false">
					<table id='table-add-mr' class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:3%">#</th>
							<th style="width:15%">Keperluan</th>
							<th style="width:25%">Nama Barang</th>
							<th style="width:7%">Qty Req</th>
							<th style="width:15%">Tanggal Diperlukan</th>
							<th style="width:35%">Keterangan Permintaan</th>
						</tr>
						</thead>
						<tbody>
							{$clist_detail}
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