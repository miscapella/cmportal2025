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

{if $cd != 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>PO Menunggu Approval</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">Tgl PO</th>
                        <th style="width: 13%">No. PO</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr {if $ds['priority'] eq 'URGENT'}style="background-color:#ffc9bb;"{/if}>
                            <td>{$nourut} </td>
                            <td>{$ds['no_po']}</td>
                            <td>{date( $_c['df'], strtotime($ds['tgl_po']))}</td>
                            <td>{$ds['dibuat_nama']}</td>
                            <td>{$ds['priority']}</td>
                            <td>{$ds['status']}</td>
                            <td class="text-right">
                                <a href="{$_url}pembelian/detail-po-aprv/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Approval</a>
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

{if $ce != 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>PO yang telah di revisi</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. PO</th>
                        <th style="width: 15%">Tgl PO</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 20%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $e as $es}
                        <tr {if $es['priority'] eq 'URGENT'}style="background-color:#ffc9bb;"{/if}>
                            <td>{$nourut} </td>
                            <td>{$es['no_po']}</td>
                            <td>{date( $_c['df'], strtotime($es['tgl_po']))}</td>
                            <td>{$es['dibuat_nama']}</td>
                            <td>{$es['priority']}</td>
                            <td>{$es['status']}</td>
                            <td class="text-right">
                                <a href="{$_url}pembelian/detail-po-aprv/{$es['id']}/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Revisi</a>
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

{if $cd == 0 and $ce == 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Tidak ada purchase order untuk di approve</h2>
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