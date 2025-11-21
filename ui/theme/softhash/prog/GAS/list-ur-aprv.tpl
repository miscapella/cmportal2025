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
<h1>{$test}</h1>
{if $atasan == $user["username"] || $user["user_type"] == "Admin" || $ga_admin}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>UR Menunggu Approval</h2>
                <table id="list-minta-barang-master" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 18%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
						<th style="width: 20%">Dibuat Oleh</th>
                        <th style="width: 15%">Approval</th>
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
{else}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Tidak ada User Request untuk di approve</h2>
			</div>
		</div>
	</div>
</div>
{/if}


<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}