{include file="sections/header.tpl"}

{if $msg neq ''}
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">×</button>
	<i class="fa-fw fa fa-check"></i>
	{$msg}
</div>
{/if}

{if _auth2('ADD-PRODUKTIVITAS-BENGKEL', $user['id'])}
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="{$_url}produktivitas-bengkel/add/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Tambah Cabang</a>
    </div>
</div>
{/if}

<br>

<div class="panel panel-default">
    <div class="card-body panel-body">
        {if _auth2('SHOW-SEMUA-PRODUKTIVITAS-BENGKEL', $user['id'])}
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3" style="text-align: right;">
                <a href="{$_url}produktivitas-bengkel/semua/" class="btn btn-primary btn-xs"><i class="fa fa-book"></i> Data Semua Cabang</a>
            </div>
		</div>
        {/if}
        <br />
        <div class="row">
            <div class="col-md-12">
                <table id="datatable-cabang" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="36%">Nama Cabang</th>
                            <th width="36%">Work Location</th>
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