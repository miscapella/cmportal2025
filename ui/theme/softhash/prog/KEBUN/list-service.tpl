{include file="sections/header.tpl"}

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="{$_url}service/list/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="{$_L['Search by Name']}..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary">{$_L['Search']}</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="{$_url}service/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Service Mobil Inventaris</a>
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
				<h3>{$_L['Filter by Tags']}</h3>
                <ul class="tag-list" style="padding: 0">
                   <li><a href="{$_url}service/list/{$name}/"><i class="fa fa-tag"></i> {$name}</a></li>
                </ul>
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
                        <th>Tipe Mobil</th>
                        <th>Nomor Polisi</th>
                        <th>Pemilik</th>
                        <th>Jenis Service</th>
                        <th>Estimasi Biaya</th>
                        <th>Tanggal Service</th>
                        <th>Cabang</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
                            <td><a href="{$_url}contacts/view/{$ds['id']}/">{$nourut}</a> </td>
                            <td>{$ds['TIPE_MOBIL']}</td>
                            <td>{$ds['NO_POLISI']}</td>
                            <td>{$ds['PEMILIK']}</td>
                            <td>{$ds['CABANG']}</td>
                            <td>
                                {$ds['TGL_STNK']}
                            </td>
                            <td>
                                {$ds['TGL_SERVICE_TERAKHIR']}
                            </td>
                            <td>
                                {$ds['CABANG']}
                            </td>
                            <td class="text-right">
                                <a href="{$_url}service/edit/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> {$_L['Edit']}</a>

                                <a href="delete/service/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
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