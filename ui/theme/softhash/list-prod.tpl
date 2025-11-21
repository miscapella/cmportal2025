{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{$paginator['found']} {$_L['Records']}. {if $paginator['found'] > 0}{$_L['Page']} {$paginator['page']} {$_L['of']} {$paginator['lastpage']}.{/if}</h5>
        <div class="ibox-tools">
            <a href="{$_url}prod/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Batch</a>

        </div>
    </div>
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th>Batch Number</th>
                <th>Tanggal</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Target Produksi</th>
                <th>Hasil Produksi</th>
                <th class="text-right">{$_L['Manage']}</th>
            </tr>
            </thead>
            <tbody>

            {foreach $d as $ds}
                <tr>
                    <td><b>{$ds['batch_number']}</b> </td>
                    <td>{date( $_c['df'], strtotime($ds['prod_date']))}</td>
                    <td>{$ds['code']}</td>
                    <td>{$ds['name']}</td>
                    <td class="amount" style="text-align:right">{$ds['target']}</td>
                    <td class="amount" style="text-align:right">{$ds['result']}</td>
                    <td class="text-right">
                        <a href="{$_url}prod/status/{$ds['id']}/" class="btn 
								{if $ds['status'] eq 'Open'}
									btn-success
								{elseif $ds['status'] eq 'Start'}
									btn-danger
								{elseif $ds['status'] eq 'Stop'}
									btn-info
								{else}
									btn-warning
								{/if}
							btn-xs"><i class="fa 
								{if $ds['status'] eq 'Open'}
									fa-clock-o
								{elseif $ds['status'] eq 'Start'}
									fa-check
								{elseif $ds['status'] eq 'Stop'}
									fa-times
								{else}
									fa-crosshairs
								{/if}
							"></i> 
								{if $ds['status'] eq 'Open'}
									Start
								{elseif $ds['status'] eq 'Start'}
									Stop
								{elseif $ds['status'] eq 'Stop'}
									Close
								{else}
									Open
								{/if}
						</a>
                        <a href="#" class="btn btn-info btn-xs chasil" id="{$ds['id']}"><i class="fa fa-pencil"></i> Hasil</a>
                        <a href="{$_url}prod/view/{$ds['id']}/" class="btn btn-warning btn-xs cprint" id="{$ds['id']}"><i class="fa fa-print"></i> Print</a>
                        <a href="#" class="btn btn-danger btn-xs cdelete" id="{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                    </td>
                </tr>
            {/foreach}

            </tbody>
        </table>
{$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}