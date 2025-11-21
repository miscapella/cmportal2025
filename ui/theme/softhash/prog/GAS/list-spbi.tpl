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
				<form class="form-horizontal" method="post" action="{$_url}pengiriman/list/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor SPBI..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
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
               <h2>SURAT PENGANTAR BARANG INTERN</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. SPBI</th>
                        <th style="width: 15%">Tgl SPBI</th>
                        <th style="width: 15%">No. PO</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut} </td>
                            <td>{$ds['no_spbi']}</td>
                            <td>{date( $_c['df'], strtotime($ds['tgl_spbi']))}</td>
                            <td>{$ds['no_po']}</td>
                            <td>{$ds['dibuat_nama']}</td>
                            <td>{$ds['status']}</td>
                            <td class="text-right">
                                <a href="{$_url}laporan/print-spbi/{$ds['id']}/" class="btn btn-primary btn-xs" id="uid{$ds['id']}"><i class="fa fa-print"></i> Print</a>
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
                <h2>Tidak ada SPBI</h2>
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