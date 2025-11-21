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
				<form class="form-horizontal" method="post" action="{$_url}inventaris/list/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="{$_L['Search by Name']} Inventaris..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="{$_url}inventaris/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Inventaris</a>
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
                   <li><a href="{$_url}inventaris/list/{$name}/"><i class="fa fa-tag"></i> {$name}</a></li>
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
                        <th>Kode Inventaris</th>
                        <th>Nama Inventaris</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut}</td>
                            <td>{$ds['kd_inventaris']}</td>
                            <td>{$ds['nm_inventaris']}</td>
                            <td>{$ds['kd_kategori']}</td>
                            <td>{$ds['merk']}</td>
                            <td>{$ds['tipe']}</td>
                            <td class="text-right">
                                <a href="{$_url}inventaris/edit/{$ds['id']}/" class="btn btn-primary btn-sm" title="{$_L['Edit']}"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{$_url}inventaris/itemstock/{$ds['id']}/" class="btn btn-warning btn-sm" title="Item Stock"><i class="fa fa-cogs"></i></a>
                                <a href="{$_url}inventaris/list-submit/{$ds['id']}/" class="btn btn-primary btn-sm" title="Pengajuan Persetujuan"><i class="fa fa-check-square-o"></i></a>
                                <a href="delete/inventaris/{$ds['id']}/" class="btn btn-danger btn-sm cdelete" title="{$_L['Delete']}" id="uid{$ds['id']}"><i class="fa fa-trash"></i></a>
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