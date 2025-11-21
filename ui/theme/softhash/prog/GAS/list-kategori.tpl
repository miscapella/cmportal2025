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
				<form class="form-horizontal" method="post" action="{$_url}kategori/list/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="{$_L['Search by Name']} Kategori ..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="{$_url}kategori/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Kategori</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<!--
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>{$_L['Filter by Tags']}</h3>
                <ul class="tag-list" style="padding: 0">
                   <li><a href="{$_url}kategori/list/{$name}/"><i class="fa fa-tag"></i> {$name}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
						<th>Keterangan</th>
                        <th>Induk Kategori</th>
                        <th>Aktif</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td><a href="{$_url}contacts/view/{$ds['id']}/">{$nourut}</a> </td>
                            <td>{$ds['kd_kategori']}</td>
                            <td>{$ds['nm_kategori']}</td>
                            <td>{$ds['keterangan']}</td>
                            <td>{$ds['parent']}</td>
                            <td>{$ds['active']}</td>
                            <td class="text-right">
                                <a href="{$_url}kategori/edit/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> {$_L['Edit']}</a>
                                <a href="{$_url}kategori/itemstock/{$ds['id']}/" class="btn btn-warning btn-xs"><i class="fa fa-cogs"></i> Item Stock</a>
                                <a href="delete/kategori/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
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