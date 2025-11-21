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
               <h2>SURAT PENGANTAR BARANG INTERN</h2>
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">Tgl SPBI</th>
                        <th style="width: 15%">No. SPBI</th>
                        <th style="width: 15%">No. PO</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%">{$_L['Manage']}</th>
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