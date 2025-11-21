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
               <h2>SURAT PENGANTARAN BARANG INTERN PENDING</h2>
                <table id="datatablespbipending" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">Tgl PO</th>
                        <th style="width: 13%">No. PO</th>
						<th style="width: 15%">Supplier</th>
						<th style="width: 15%">Dibuat Oleh</th>
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