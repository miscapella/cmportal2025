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
		<a href="{$_url}karyawan/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Karyawan</a>			
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
                        <th width="10%">Id Karyawan</th>
                        <th width="20%">Nama Karyawan</th>
                        <th width="10%">Jenis Kelamin</th>
                        <th width="8%">Departemen</th>
                        <th width="17%">Nama Jabatan</th>
                        <th width="20%">Lokasi Kantor</th>
                        <th width="12%" class="text-right">{$_L['Manage']}</th>
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