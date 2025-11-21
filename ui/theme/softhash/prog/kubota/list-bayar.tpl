{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{$_url}bayar/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
								<select id="filter" name="filter">
									<option value="no_byr">No. Bayar</option>
									<option value="no_cetak">No. Cetak</option>
									<option value="no_jual">No. Jual</option>
									<option value="b.account">Nama</option>
								</select>&nbsp;&nbsp;
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Filter No. Bayar ..."/ style="margin-top:5px">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">{$_L['Search']}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="{$_url}bayar/add/" class="btn btn-success btn-block" style="margin-top:5px"><i class="fa fa-plus"></i> Tambah Pembayaran Angsuran</a>

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
                        <th>No. Bayar</th>
                        <th>No. Cetak</th>
                        <th>Tgl KW</th>
                        <th>No. Jual</th>
                        <th>Nama</th>
                        <th>Jumlah Bayar</th>
                        <th class="text-right">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
					{assign var="flag" value=0}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['no_byr']}</td>
                            <td>{$ds['no_cetak']}</td>
                            <td>{$ds['tgl_kw']}</td>
                            <td>{$ds['no_jual']}</td>
                            <td>{$ds['account']}</td>
                            <td class="amount" align="right">{$ds['jlh_byr_angsuran']+$ds['jlh_byr_denda']}</td>
                            <td class="text-right">
								{if $ds['tgl_batal'] neq null}
									<i class="fa fa-exclamation-circle" title='Telah Batal' style="color:red"></i>&nbsp;
								{/if}
								{if $ds['no_jual'] eq null and $ds['tgl_batal'] eq null}
									<a href="bayar/delete/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="{$ds['id']}"><i class="fa fa-remove"></i> Batal</a>
								{/if}
                                <a href="{$_url}bayar/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> {$_L['View']}</a>
                            </td>
                        </tr>
                        {assign var="flag" value=$nourut+1}
                    {/foreach}
					{if $flag eq 0}
						<tr>
							<td colspan='7'><b>Tidak ada data</b></td>
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