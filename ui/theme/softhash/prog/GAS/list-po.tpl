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
				<form class="form-horizontal" method="post" action="{$_url}pembelian/list-po/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor PO..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="{$_url}pembelian/add-po/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah PO</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

{if $cd != 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE ORDER</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. PR</th>
                        <th style="width: 15%">Tgl PR</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <!-- <th style="width: 15%">Tingkat Kepentingan</th> -->
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <!-- <tr {if $ds['priority'] eq 'TINGGI'}style="background-color:#ffc9bb;"{else if $ds['priority'] eq 'MENENGAH'}style="background-color:#f7f5bc;"{/if}> -->
                            <td>{$nourut} </td>
                            <td>{$ds['no_po']}</td>
                            <td>{date( $_c['df'], strtotime($ds['tgl_po']))}</td>
                            <td>{$ds['dibuat_nama']}</td>
                            <td>{$ds['priority']}</td>
                            <td>{$ds['status']}</td>
                            <td class="text-right">
                                <a href="{$_url}pembelian/detail-po/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                                {if $ds['status'] eq 'REJECT' or $ds['status'] eq 'PENDING'}
                                <a href="{$_url}pembelian/edit-po/{$ds['id']}/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i>{if $ds['status'] eq 'REJECT'} Revisi{else} Edit{/if}</a>
                                {/if}
                                {if $ds['status'] neq 'APPROVE'}
                                <a href="delete/po/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> Cancel</a>
                                {/if}
                                {if $ds['status'] eq 'APPROVE'}
                                <a href="{$_url}laporan/print-po/{$ds['id']}/" class="btn btn-primary btn-xs" id="uid{$ds['id']}"><i class="fa fa-print"></i> Print</a>
                                {/if}
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
                <h2>Tidak ada purchase order</h2>
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