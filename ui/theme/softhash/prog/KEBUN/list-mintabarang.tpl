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
				<form class="form-horizontal" method="post" action="{$_url}permintaanbarang/list-mintabarang/">
					<div class="form-group">						
						<label  class="control-label col-md-2" for="cbstatus">Status User Request :</label>
						<div class="col-md-2">
							<select class="form-control" id="cbstatus">
							<option value="All" selected>All</option>
							<option value="Pending">Pending</option>
							<option value="Approved">Approved</option>
							<option value="Reject">Reject</option>							
							</select>
						</div>
						<div class="col-md-2">
							<button class="btn btn-success btn-block btnrefresh"><i class="fa fa-refresh"></i>  Refresh</button>
						</div>
						<div class="col-md-3"></div>
						<div class="col-md-3">
							<a href="{$_url}permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
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
               <h2>DAFTAR USER REQUEST</h2>
                <table id='list-mintabarang' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. Request</th>
                        <th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
                        <th style="width: 15%">Nomor</th>                        
                        <th style="width: 10%">Status</th>                                                
                        <th class="text-right" style="width: 15%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                     <tbody>
                    </tbody>
                </table>
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