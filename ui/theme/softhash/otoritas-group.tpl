{include file="sections/header.tpl"}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="{$_url}settings/otoritas-group/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="kode_group" id="kode_group" class="form-control" placeholder="Cari Kode Group..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="{$_url}settings/add-otoritas-group/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Group Otoritas</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Group Otoritas</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <th style="width: 5%">#</th>
                    <th>Kode Group</th>
                    <th>Program</th>
                    <th style="width: 20%" class="text-right">{$_L['Manage']}</th>
                    {assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut}</td>
                            <td>{$ds['kode_group']}</td>
                            <td>{$ds['program']}</td>
                            <td class="text-right">
                                <a href="{$_url}settings/group-oto/{$ds['kode_group']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Otoritas</a>
                                <a href="delete/otoritas-group/{$ds['kode_group']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['kode_group']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                            </td>
                        </tr>
                        {assign var="nourut" value=$nourut+1}
                    {/foreach}
                </table>
            </div>
			<div class="ibox">
				<div class="ibox-content">
					{$paginator['contents']}
				</div>
			</div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}
