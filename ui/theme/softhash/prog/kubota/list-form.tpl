{include file="sections/header.tpl"}
	<div class="row">
		<div class="ibox">
			<div class="ibox-title">
				<h5>Daftar Form Stock</h5>
			</div>
		</div>
	</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{$_url}formstock/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
								<select id="filter" name="filter">
									<option value="no_cetak">No. Cetak</option>
									<option value="no_transaksi">No. Transaksi</option>
								</select>&nbsp;&nbsp;
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Filter No. Cetak ..."/ style="margin-top:5px">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">{$_L['Search']}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="{$_url}formstock/add/" class="btn btn-success btn-block" style="margin-top:5px"><i class="fa fa-plus"></i> Tambah Form</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

{if $cari neq ''}
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
<h3>{$jfilter} : {$cari}</h3>
            </div>
        </div>

    </div>
</div>
{/if}

<div class="row">

    {if ($_c['contact_set_view_mode']) eq 'tbl'}

    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>No. Cetak</th>
                        <th>No. Transaksi</th>
                        <th>Tgl Transaksi</th>
                        <th>Status</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="nourut" value=1}
					{assign var="flag" value=0}
                    {foreach $d as $ds}

                        <tr>
							<td>{$nourut}</td>
							<td>{$ds['no_cetak']}</td>
                            <td>{$ds['no_transaksi']}</td>
                            <td>{$ds['tgl_transaksi']}</td>
                            <td>{$ds['status']}</td>
                            <td class="text-right">
                                <a href="delete/kode/{$ds['kode']}/" class="btn btn-danger btn-xs cdelete" id="{$ds['kode']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                            </td>
                        </tr>
                        {assign var="nourut" value=$nourut+1}
						{assign var="flag" value=$flag+1}
                    {/foreach}
					{if $flag eq 0}
						<tr>
							<td colspan='6'><b>Tidak ada data</b></td>
						</tr>
					{/if}
                    </tbody>
                </table>

                </div>
            </div>
        </div>


        {else}

        {foreach $d as $ds}
            <div class="col-md-3 sdiv">
                <!-- CONTACT ITEM -->
                <div class="panel panel-default">
                    <div class="panel-body profile">
                        <div class="profile-image">
                            {if $ds['img'] eq 'gravatar'}
                                <img src="http://www.gravatar.com/avatar/{($ds['email'])|md5}?s=200" class="img-thumbnail img-responsive" alt="{$ds['fname']} {$ds['lname']}">
                            {elseif $ds['img'] eq ''}
                                <img src="{$app_url}sysfrm/uploads/system/profile-icon.png" class="img-thumbnail img-responsive" alt="{$ds['fname']} {$ds['lname']}">
                            {else}
                                <img src="{$ds['img']}" class="img-thumbnail img-responsive" alt="{$ds['account']}">
                            {/if}
                        </div>
                        <div class="profile-data">

                            <div class="profile-data-name">{$ds['account']}</div>

                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="contact-info">

                            <p><small>{$_L['Email']}</small><br/>{if $ds['email'] neq ''}{$ds['email']} {else} {$_L['n_a']} {/if}</p>

                            <p>
                                <a href="{$_url}contacts/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> {$_L['View']}</a>

                                <a href="delete/crm-user/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        {/foreach}

    {/if}

</div>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}