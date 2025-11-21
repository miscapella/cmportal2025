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
{if $cd != 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>UR Menunggu Approval</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 18%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
						<th style="width: 20%">Dibuat Oleh</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 20%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut} </td>
                            <td>{$ds['no_mintabarang']}</td>
                            <td>{date( $_c['df'], strtotime($ds['tanggal']))}</td>
                            <td>{$ds['dibuat_nama']}</td>
                            <td>{$ds['status']}</td>
                            <td class="text-right">
                                <a href="{$_url}permintaanbarang/detail-ur-aprv/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Approval</a>
                                
                            </td>
                        </tr>
                        {assign var="nourut" value=$nourut+1}
                    {/foreach}
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
{/if}



{if $cd == 0 and $ce == 0 and $cf == 0 and $cg == 0}
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