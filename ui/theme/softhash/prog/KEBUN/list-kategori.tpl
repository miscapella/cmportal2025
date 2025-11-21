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
	<div class="col-md-9">
        <div class="hexagon-container3">
            <a href="{$_url}kategori/list/" class="hexagon3">Bagian</a>
        </div>
    </div>
    <div class="col-md-3">
        <a href="{$_url}kategori/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Bagian</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 65%;">Bagian</th>
                        <th style="width: 30%;" class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut}</td>
                            <td>{$ds['nama_kategori']}</td>
                            <td class="text-right">
                                <a href="{$_url}kategori/main/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i> Details</a>
                                <a href="{$_url}kategori/edit/{$ds['id']}/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> {$_L['Edit']}</a>
                                <a class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
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
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}