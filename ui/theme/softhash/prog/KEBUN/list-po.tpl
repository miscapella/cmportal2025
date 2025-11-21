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
				<form class="form-horizontal" method="post" action="{$_url}pembelian/list-po/">
					<div class="form-group">
						<div class="col-md-8">
						</div>
						<div class="col-md-4">
							<a href="{$_url}pembelian/add-po/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah PO</a>
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
               <h2>PURCHASE ORDER</h2>
                <table id="datatablepo" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th style="width: 2%">#</th>
                            <th style="width: 13%">Tgl PO</th>
                            <th style="width: 15%">No. PO</th>
                            <th style="width: 15%">Dibuat Oleh</th>
                            <th style="width: 15%">Tingkat Kepentingan</th>
                            <th style="width: 10%">Status</th>
                            <th class="text-right" style="width: 30%">{$_L['Manage']}</th>
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