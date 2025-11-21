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
				<form class="form-horizontal" method="post" action="{$_url}pembelian/list-pr/">
					<div class="form-group">
						<div class="col-md-8">
							<!-- <div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor PR..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div> -->
						</div>
						<div class="col-md-4">
							<a href="{$_url}pembelian/add-pr/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah PR</a>
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
               <h2>PURCHASE REQUISITION</h2>
                <table id="datatablepr" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
						<th style="width: 15%">Tgl PR</th>
                        <th style="width: 13%">No. PR</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 10%">Posisi</th>
                        <th style="width: 10%">Status</th>
                        <th class="text-right" style="width: 20%">{$_L['Manage']}</th>
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