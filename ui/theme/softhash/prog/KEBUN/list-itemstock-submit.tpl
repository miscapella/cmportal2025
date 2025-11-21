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
                   <li>Nama Item Stock : <b>{$d['nama_item']}</b></li>
                   <li>&nbsp;</li>
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
							<th>Kode Supplier</th>
							<th>Supplier</th>
							<th>Bidang</th>
							<th>Tanggal Mulai Kerjasama</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$opt}</div>
						{foreach $e as $ds}
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked"></td>
								<input type="hidden" id="kode_supplier[]" name="kode_supplier[]" value="{$ds["kode_supplier"]}">
								<td>{$ds['kode_supplier']}</td>
								<td>{$ds['nama_supplier']}</td>
								<td>{$ds['bidang']}</td>
								<td>{$ds['tgl_mulai_kerjasama']|date_format:"%d %b %Y"}</td>
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