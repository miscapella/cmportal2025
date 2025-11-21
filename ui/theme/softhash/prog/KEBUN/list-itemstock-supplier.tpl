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
				<h3>DATA ITEM STOCK: <b>{$d['nama_item']}</b></h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}itemstock/list/" class="btn btn-primary btn-sm">Daftar Item Stock</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Supplier</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kode_item" id="kode_item" value="{$d['kode_item']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>Kode Supplier</th>
							<th>Supplier</th>
							<th>Bidang</th>
							<th>Tanggal Mulai Kerjasama</th>
							<th>Status</th>
							<th class="text-right">{$_L['Manage']}</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$opt}</div>
						{foreach $e as $ds}
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
									<select name="kode_supplier[]" class="kode_supplier" id="kode_supplier" disabled>
										<option value="">Pilih Supplier</option>
										{foreach $tg as $r}
											<option value="{$r['kode_supplier']}" {if $ds['kode_supplier'] eq $r['kode_supplier']} selected {/if}>{$r['kode_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td>{$ds['nama_supplier']}</td>
								<td>{$ds['bidang']}</td>
								<td>{$ds['tgl_mulai_kerjasama']|date_format:"%d %b %Y"}</td>
								<td style="text-transform: uppercase" value="{$ds['status']}" class="status">{$ds['status']}</td>
								
								<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
							</tr>
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