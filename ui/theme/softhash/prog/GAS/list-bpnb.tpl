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
				<form class="form-horizontal" method="post" action="{$_url}penerimaan/list/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor BPnB..."/>
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
               <h2>BUKTI PENERIMAAN BARANG</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. BPNB</th>
                        <th style="width: 15%">Tgl BPNB</th>
                        <th style="width: 20%">Supplier</th>
						<th style="width: 15%">Diterima Oleh</th>
                        <th style="width: 10%">Status</th>
                        <th class="text-right" style="width: 25%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {assign var="kd_supplier" value=""}
                    {foreach $d as $ds}
                        {foreach $tg2 as $item}
                            {if $item['no_po'] eq $ds['no_po']}
                                {assign var="kd_supplier" value="{$item['kd_supplier']}"}
                            {/if}
                        {/foreach}
                        {foreach $tg as $item}
                            {if $item['kd_supplier'] eq $kd_supplier}
                                {assign var="nm_supplier" value="{$item['nm_supplier']}"}
                            {/if}
                        {/foreach}
                        <tr>
                            <td>{$nourut} </td>
                            <td>{$ds['no_bpnb']}</td>
                            <td>{date( $_c['df'], strtotime($ds['tgl_bpnb']))}</td>
                            <td>{$nm_supplier}</td>
                            <td>{$ds['diterima_nama']}</td>
                            <td>{$ds['status']}</td>
                            <td class="text-right">
                                <a href="{$_url}laporan/print-bpnb/{$ds['id']}/" class="btn btn-primary btn-xs" id="uid{$ds['id']}"><i class="fa fa-print"></i> Print</a>
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
                <h2>Tidak ada BPnB</h2>
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