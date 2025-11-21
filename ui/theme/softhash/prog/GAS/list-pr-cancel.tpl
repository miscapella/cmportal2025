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
{if $cg != 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE REQUISITION CANCEL</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">No. PR</th>
                        <th style="width: 20%">Tgl PR</th>
						<th style="width: 20%">Dibuat Oleh</th>
                        <th style="width: 20%">Status</th>
                        <th class="text-right" style="width: 20%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $g as $gs}
                        <tr>
                            <td>{$nourut} </td>
                            <td>{$gs['no_pr']}</td>
                            <td>{date( $_c['df'], strtotime($gs['tgl_pr']))}</td>
                            <td>{$gs['dibuat_nama']}</td>
                            <td>{$gs['posisi']}</td>
                            <td class="text-right">
                                <a href="{$_url}pembelian/detail-pr/{$gs['id']}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
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
{else}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Tidak ada purchase requisition yang di cancel</h2>
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