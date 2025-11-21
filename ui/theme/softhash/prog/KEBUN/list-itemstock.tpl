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
    <div class="col-md-9">		
    </div>
	<div class="col-md-3">
		<a href="{$_url}itemstock/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Item Stock</a>			
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="40%">Nama ItemStock</th>
                        <th width="10%">Satuan Item</th>
                        <th width="15%">Jumlah per Satuan</th>
                        <th width="5%">Aktif</th>
                        <th width="27%" class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
{include file="sections/footer.tpl"}