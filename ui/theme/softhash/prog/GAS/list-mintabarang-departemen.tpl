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
				<h2>{$department['nama_dept']} - DAFTAR USER REQUEST</h2>
				<table id='list-mintabarang' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 15%">Tanggal</th>
						<th style="width: 27%">Dibuat Oleh</th>
						<th style="width: 25%; vertical-align: middle;">
							<div class="header-container" style="display: flex; align-items: center; gap: 8px;">
								<span>Status</span>
								<select id="status-filter" style="width: 50%; padding: 0; line-height: 1.5;">
									<option value="">Semua</option>
									<option value="PENDING">Pending</option>
									<option value="APPROVED">Approved</option>
									<option value="REJECTED">Rejected</option>
									<option value="CANCEL">Cancelled</option>
								</select>
							</div>
						</th>
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