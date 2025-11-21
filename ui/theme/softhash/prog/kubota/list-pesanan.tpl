{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{$_url}pesanan/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
								<select id="filter" name="filter">
									<option value="no_pesan">No. Pesan</option>
									<option value="b.account">Nama</option>
								</select>&nbsp;&nbsp;
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Filter No. Pesan ..."/ style="margin-top:5px">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">{$_L['Search']}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="{$_url}pesanan/add/" class="btn btn-success btn-block" style="margin-top:5px"><i class="fa fa-plus"></i> Tambah Pesanan</a>

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
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>No. Pesan</th>
                        <th>Customer</th>
                        <th>Alamat</th>
                        <th>{$_L['Phone']}</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="flag" value=0}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['no_pesan']}</td>
                            <td>{$ds['account']}</td>
                            <td>{$ds['address']}</td>
                            <td>{$ds['phone']}</td>
                            <td class="text-right">
								{if $ds['no_jual'] eq null}
									<a href="{$_url}pesanan/edit/{$ds['id']}/" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
								{/if}
                                <a href="{$_url}pesanan/view/{$ds['id']|replace:'/':'_'}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> {$_L['View']}</a>
                                <a href="pesanan/delete/{$ds['no_pesan']|replace:'/':'_'}/" class="btn btn-danger btn-xs cdelete" id="{$ds['no_pesan']|replace:'/':'_'}"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                            </td>
                        </tr>
                        {assign var="flag" value=$nourut+1}
                    {/foreach}
					{if $flag eq 0}
						<tr>
							<td colspan='5'><b>Tidak ada data</b></td>
						</tr>
					{/if}
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