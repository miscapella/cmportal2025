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
                <h2>Persetujuan UR</h2>
                {if $user['kode_dept'] eq 'SDH'}
                <table id="persetujuan-ur-sdh" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
                        <th style="width: 30%">Dibuat Oleh</th>
                        <th style="width: 22%">Departemen</th>
                        <th class="text-right" style="width: 15%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {else}
                <table id="persetujuan-ur" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
                        <th style="width: 52%">Dibuat Oleh</th>
                        <th class="text-right" style="width: 15%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {/if}
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