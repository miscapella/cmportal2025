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
		<a href="{$_url}permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
    </div>
</div>
<br>

{if $administrator}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>ADMINISTRATOR - DAFTAR USER REQUEST REJECTED</h2>
				<table id='administrator-list-mintabarang-rejected' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
						<th style="width: 13%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%">{$_L['Manage']}</th>
					</tr>
					</thead>
						<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{/if}

{if $dept_head}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>{$dept_head['nama_dept']} - DAFTAR USER REQUEST REJECTED</h2>
				<table id='dept-list-mintabarang-rejected' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 23%">Dibuat Oleh</th>
						<th style="width: 15%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
						<th style="width: 20%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%">{$_L['Manage']}</th>
					</tr>
					</thead>
						<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{/if}

{if $service_head}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>SERVICE HEAD - DAFTAR USER REQUEST REJECTED</h2>
				<table id='service-head-list-mintabarang-rejected' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
						<th style="width: 13%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%">{$_L['Manage']}</th>
					</tr>
					</thead>
						<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{/if}

{if $ga_admin}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>GA ADMIN - DAFTAR USER REQUEST REJECTED</h2>
				<table id='gaadmin-list-mintabarang-rejected' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
						<th style="width: 13%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%">{$_L['Manage']}</th>
					</tr>
					</thead>
						<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{/if}

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR USER REQUEST REJECTED</h2>
                <table id="list-mintabarang-rejected" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. Request</th>
                        <th style="width: 15%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
                        <th style="width: 15%">Nomor</th>
                        <th style="width: 15%">Status UR</th>
						<th style="width: 15%">Status PR</th>
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