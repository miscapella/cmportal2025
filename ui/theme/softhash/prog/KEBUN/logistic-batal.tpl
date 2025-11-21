{include file="sections/header.tpl"}

<input type="hidden" id="idtpl" value="{$id}" class="form-control" />

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
				<div class="col-lg-6"><h3>LOGISTIK BATAL UR</h3></div>
    			<div class="col-lg-6" style="text-align: right"><a href="{$_url}pengeluaranbarang/list-ur-approved" class="btn btn-primary btn-sm">Back</a></div>				
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" value="{$es['unit_kerja']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="{$es['nomor']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="{$es['tanggal']|date_format:'%d-%m-%Y'}" data-auto-close="true" disabled>
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
                <form class="form-horizontal" id="rform">
					<table id='table-add-mr' class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th>Keperluan</th>
							<th>Bagian</th>
							<th>Item Stock</th>
							<th>Qty Reject</th>
							<th>Tanggal Diperlukan</th>
							<th>Keterangan Permintaan</th>
						</tr>
						</thead>
						<tbody>
								{$clist}
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="pesan">Alasan Dibatalkan</label>
					<div class="col-lg-10"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"></textarea>
					</div>
				</div>
                <div class="col-lg-12" style="text-align: right">
                    <br>                    
                    <button type="button" class="btn btn-primary btn-sm" id="btnsimpan">Simpan</button>
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