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

<input type="hidden" id="print" value="{if _auth2('PRINT-PR',$user['id'])}y{else}n{/if}" class="form-control" />
<input type="hidden" id="cancel" value="{if _auth2('CANCEL-PR',$user['id'])}y{else}n{/if}" class="form-control" />

{if _auth2('ADD-PR',$user['id'])}
<div class="row">
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="{$_url}permintaan/add-pr/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Permintaan</a>
    </div>
</div>
<br>
{/if}

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               	<h2>DAFTAR PERMINTAAN</h2>
                <table id='list-permintaan' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%; vertical-align: middle;">#</th>
                        <th style="width: 25%; vertical-align: middle;">No. PR</th>
                        <th style="width: 25%; vertical-align: middle;">Tanggal</th>
                        <th style="width: 20%; vertical-align: middle;">
							<div class="header-container" style="display: flex; align-items: center; gap: 8px;">
								<span>Status</span>
								<select id="status-filter" style="width: 50%; padding: 0; line-height: 1.5;">
									<option value="">Semua</option>
									<option value="PENDING">Pending</option>
									<option value="APPROVE">Approved</option>
									<option value="REJECT">Rejected</option>
									<option value="CANCEL">Cancelled</option>
								</select>
							</div>
						</th>
                        <th class="text-right" style="width: 27%; vertical-align: middle;">{$_L['Manage']}</th>
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