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
		<a href="{$_url}supplier/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Supplier</a>			
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
                        <th width="10%">Kode Supplier</th>
                        <th width="25%">Nama Supplier</th>
                        <th width="10%">Bidang</th>
                        <th width="10%">Komoditas</th>
                        <th width="15%">Tgl Mulai Kerjasama</th>
                        <th width="5%">Aktif</th>
                        <th width="22%" class="text-right">{$_L['Manage']}</th>
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