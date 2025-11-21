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
        <div class="hexagon-container">
            <a href="{$_url}kategori/list/" class="hexagon">Bagian</a>
        </div>
        <div class="hexagon-container4" style="margin-left: -15px;">
            <a href="{$_url}kategori/main/{$parent}/" class="hexagon4" style="font-size: 0.8vw; line-height: 1; width: 70%;">{$nama_parent}</a>
        </div>
        <div class="hexagon-container4" style="margin-left: -15px;">
            <a href="{$_url}kategori/sub/{$parent}/{$main}/" class="hexagon4" style="font-size: 0.8vw; line-height: 1; width: 70%;">{$nama_sub}</a>
        </div>
        <div class="hexagon-container2" style="margin-left: -15px;">
            <a href="{$_url}kategori/line/{$parent}/{$main}/{$line}/" class="hexagon2" style="font-size: 0.8vw; line-height: 1; width: 70%;">{$nama_bagian}</a>
        </div>
    </div>
    <div class="col-md-3">
        <a href="{$_url}kategori/addline/{$parent}/{$main}/{$line}" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Data</a>
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
                        <th>Line Data</th>
                        <th style="width: 30%;" class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td><a href="{$_url}contacts/view/{$ds['id']}/">{$nourut}</a> </td>
                            <td>{$ds['nama_kategori']}</td>
                            <td class="text-right">
                                <a href="{$_url}kategori/itemstock/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i> Item Stock</a>
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