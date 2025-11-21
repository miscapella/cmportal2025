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
				<h3>DAFTAR PENGAJUAN PERSETUJUAN SUPPLIER PADA ITEM STOCK</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}itemstock/list/" class="btn btn-primary btn-sm">Daftar Item Stock</a>
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
					<input type="hidden" name="kd_item" id="kd_item" value="{$d['kd_item']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>#</th>
							<th>Item Stock</th>
							<th>Supplier</th>
							<th>Bagian</th>
							<th>Contact Person</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$opt}</div>
						{assign var="nourut" value=1}
						{foreach $e as $ds}
							<tr>
								<input type="hidden" id="kd_item[]" name="kd_item[]" value="{$ds["kd_item"]}">
								<input type="hidden" id="kd_supplier[]" name="kd_supplier[]" value="{$ds["kd_supplier"]}">
								<td style="vertical-align:middle;">{$nourut}</td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-itemstock" value="{$ds['kd_item']}"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">{$ds['nm_item']}</a></td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-supplier" value="{$ds['kd_supplier']}">{$ds['nm_supplier']}</a></td>
								<td style="vertical-align:middle;">{$ds['bagian']}</td>
								<td style="vertical-align:middle;">{$ds['contact']}</td>
								<td>
                                    <input type="radio" name="{$ds["kd_item"]}{$ds["kd_supplier"]}status[]" class="cekbox" id="{$ds["kd_item"]}{$ds["kd_supplier"]}pending" {if $ds['status'] eq 'pending'} checked {/if} value="pending"><label style="font-weight: normal" for="{$ds["kd_item"]}{$ds["kd_supplier"]}pending"> Pending</label><br>
									<input type="radio" name="{$ds["kd_item"]}{$ds["kd_supplier"]}status[]" class="cekbox" id="{$ds["kd_item"]}{$ds["kd_supplier"]}aktif" {if $ds['status'] eq 'aktif'} checked {/if} value="aktif"><label style="font-weight: normal" for="{$ds["kd_item"]}{$ds["kd_supplier"]}aktif"> Aktif</label><br>
									<input type="radio" name="{$ds["kd_item"]}{$ds["kd_supplier"]}status[]" class="cekbox" id="{$ds["kd_item"]}{$ds["kd_supplier"]}nonaktif" {if $ds['status'] eq 'nonaktif'} checked {/if} value="nonaktif"><label style="font-weight: normal" for="{$ds["kd_item"]}{$ds["kd_supplier"]}nonaktif"> Non Aktif</label>
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