{include file="sections/header.tpl"}

{if _auth2('UPDATE-MASTERDATA-KARYAWAN', $user['id'])}
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="{$_url}karyawan/update/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Perbarui Daftar Karyawan</a>
    </div>
</div>
{/if}

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Employees - <span class="tdate">{$dataDate}</span></h1>
                <br>
                <table id="datatable-karyawan" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="20%">Employee Id</th>
                            <th width="30%">Employee Name</th>
                            <th width="20%">Years In Service</th>
                            <th width="15%">Grade</th>
                            <th width="12%">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Terminated Employees - <span class="tdate">{$dataDate}</span></h1>
                <br>
                <table id="datatable-ex-karyawan" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="16%">Employee Id</th>
                            <th width="28%">Employee Name</th>
                            <th width="16%">Years In Service</th>
                            <th width="10%">Grade</th>
                            <th width="15%">Termination Date</th>
                            <th width="12%">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
{include file="sections/footer.tpl"}