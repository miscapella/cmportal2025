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
					<input type="hidden" name="kode_item" id="kode_item" value="{$d['kode_item']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>#</th>
							<th>Item Stock</th>
							<th>Supplier</th>
							<th>Bidang</th>
							<th>Tanggal Mulai Kerjasama</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$opt}</div>
						{assign var="nourut" value=1}
						{foreach $e as $ds}
							<tr>
								<input type="hidden" id="kode_item[]" name="kode_item[]" value="{$ds["kode_item"]}">
								<input type="hidden" id="kode_supplier[]" name="kode_supplier[]" value="{$ds["kode_supplier"]}">
								<td style="vertical-align:middle;">{$nourut}</td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-itemstock" value="{$ds['kode_item']}"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">{$ds['nama_item']}</a></td>
								<td style="vertical-align:middle; font-weight: bold;"><a href="#" class="detail-supplier" value="{$ds['kode_supplier']}">{$ds['nama_supplier']}</a></td>
								<td style="vertical-align:middle;">{$ds['bidang']}</td>
								<td style="vertical-align:middle;">{$ds['tgl_mulai_kerjasama']}</td>
								<td>
                                    <input type="radio" name="{$ds["kode_item"]}{$ds["kode_supplier"]}status[]" class="cekbox" id="{$ds["kode_item"]}{$ds["kode_supplier"]}pending" {if $ds['status'] eq 'pending'} checked {/if} value="pending"><label style="font-weight: normal" for="{$ds["kode_item"]}{$ds["kode_supplier"]}pending"> Pending</label><br>
									<input type="radio" name="{$ds["kode_item"]}{$ds["kode_supplier"]}status[]" class="cekbox" id="{$ds["kode_item"]}{$ds["kode_supplier"]}aktif" {if $ds['status'] eq 'aktif'} checked {/if} value="aktif"><label style="font-weight: normal" for="{$ds["kode_item"]}{$ds["kode_supplier"]}aktif"> Aktif</label><br>
									<input type="radio" name="{$ds["kode_item"]}{$ds["kode_supplier"]}status[]" class="cekbox" id="{$ds["kode_item"]}{$ds["kode_supplier"]}nonaktif" {if $ds['status'] eq 'nonaktif'} checked {/if} value="nonaktif"><label style="font-weight: normal" for="{$ds["kode_item"]}{$ds["kode_supplier"]}nonaktif"> Non Aktif</label>
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