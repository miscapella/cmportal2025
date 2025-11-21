{include file="sections/header.tpl"}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="{$_url}settings/otoritas/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="kode_oto" id="kode_oto" class="form-control" placeholder="Cari Kode Otoritas..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="{$_url}settings/add-otoritas/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Otoritas</a>
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
                <h5>Daftar Otoritas</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <th>#</th>
                    <th>Kode Otoritas</th>
                    <th>Program</th>
                    <th>Keterangan</th>
                    <th class="text-right">{$_L['Manage']}</th>
                    {assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut}</td>
                            <td>{$ds['kode_oto']}</td>
                            <td>{$ds['program']}</td>
                            <td>{$ds['ket_oto']}</td>
                            <td class="text-right">
                                <a href="delete/otoritas/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
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
