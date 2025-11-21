{include file="sections/header.tpl"}

{if $msg neq ''}
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">×</button>
	<i class="fa-fw fa fa-check"></i>
	{$msg}
</div>
{/if}

{if _auth2('UPDATE-MASTERDATA-POSISI', $user['id'])}
<div class="row">
	<div class="col-md-6"></div>
    <div class="col-md-3">
		<a href="{$_url}posisi/update/" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Perbarui Daftar Posisi</a>
    </div>
    <div class="col-md-3">
		<a href="{$_url}posisi/add/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Tambah Posisi</a>
    </div>
</div>
{/if}

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <table id="datatable-posisi" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="28%">Position Id</th>
                            <th width="44%">Position Title</th>
                            <th width="25%">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}