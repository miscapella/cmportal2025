{include file="sections/header.tpl"}

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="{$_url}ruangan/list/">
					<div class="form-group">
						<div class="col-md-8">
						</div>
						<div class="col-md-4">
							<a href="{$_url}ruangan/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Ruangan</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Ruangan</th>
                        <th>Lokasi</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td><a href="{$_url}contacts/view/{$ds['id']}/">{$nourut}</a> </td>
                            <td>{$ds['nama_ruangan']}</td>
                            <td>{$ds['lokasi']}</td>
                            <td class="text-right">
                                <a href="{$_url}ruangan/edit/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> {$_L['Edit']}</a> 
                                <a href="delete/ruangan/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
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