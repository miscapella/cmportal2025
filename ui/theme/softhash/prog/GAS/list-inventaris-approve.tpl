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
				<h3>DAFTAR PENGAJUAN PERSETUJUAN ITEM STOCK PADA INVENTARIS</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}inventaris/list/" class="btn btn-primary btn-sm">Daftar Inventaris</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="{$d['kd_inventaris']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>#</th>
							<th>Inventaris</th>
							<th>Item Stock</th>
							<th>Satuan Item</th>
							<th>Jumlah per Satuan</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$opt}</div>
						{assign var="nourut" value=1}
						{foreach $e as $ds}
							<tr>
								<input type="hidden" id="kd_inventaris[]" name="kd_inventaris[]" value="{$ds["kd_inventaris"]}">
								<input type="hidden" id="kd_item[]" name="kd_item[]" value="{$ds["kd_item"]}">
								<td style="vertical-align:middle;">{$nourut}</td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-inventaris" value="{$ds['kd_inventaris']}"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">{$ds['nm_inventaris']}</a></td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-itemstock" value="{$ds['kd_item']}">{$ds['nm_item']}</a></td>
								<td style="vertical-align:middle;">{$ds['satuan']}</td>
								<td style="vertical-align:middle;"><span class="desimal">{$ds['jumlah_per_satuan']}</span> / {$ds['satuan_harga']}</td>
								<td>
									<input type="radio" name="{$ds["kd_inventaris"]}{$ds["kd_item"]}status[]" class="cekbox" id="{$ds["kd_inventaris"]}{$ds["kd_item"]}pending" {if $ds['status'] eq 'pending'} checked {/if} value="pending"> <label style="font-weight: normal" for="{$ds["kd_inventaris"]}{$ds["kd_item"]}pending"> Pending</label><br>
									<input type="radio" name="{$ds["kd_inventaris"]}{$ds["kd_item"]}status[]" class="cekbox" id="{$ds["kd_inventaris"]}{$ds["kd_item"]}aktif" {if $ds['status'] eq 'aktif'} checked {/if} value="aktif"><label style="font-weight: normal" for="{$ds["kd_inventaris"]}{$ds["kd_item"]}aktif"> Aktif</label><br>
									<input type="radio" name="{$ds["kd_inventaris"]}{$ds["kd_item"]}status[]" class="cekbox" id="{$ds["kd_inventaris"]}{$ds["kd_item"]}nonaktif" {if $ds['status'] eq 'nonaktif'} checked {/if} value="nonaktif"><label style="font-weight: normal" for="{$ds["kd_inventaris"]}{$ds["kd_item"]}nonaktif"> Non Aktif</label>
								</td>
							</tr>
							{assign var="nourut" value=$nourut+1}
						{/foreach}
						</tbody>
					</table>
				</form>
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