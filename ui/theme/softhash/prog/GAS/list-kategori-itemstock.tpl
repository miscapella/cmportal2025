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
				<h3>DATA KATEGORI</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}kategori/list/" class="btn btn-primary btn-sm">Daftar Kategori</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li>Kode Kategori : <b>{$d['kd_kategori']}</b></li>
                   <li>Nama Kategori : <b>{$d['nm_kategori']}</b></li>
                   <li>&nbsp;</li>
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Item Stock</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
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
					<input type="hidden" name="kd_kategori" id="kd_kategori" value="{$d['kd_kategori']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>Item Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
							<th>Aktif</th>
							<th class="text-right">{$_L['Manage']}</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$opt}</div>
						{foreach $e as $ds}
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
									<select name="kd_item[]" class="kd_item" id="kd_item">
										<option value="">Pilih Item Stock</option>
										{foreach $tg as $r}
											<option value="{$r['kd_item']}" {if $ds['kd_item'] eq $r['kd_item']} selected {/if}>{$r['kd_item']} - {$r['nm_item']}</option>
										{/foreach}
									</select>
								</td>
								<td>{$ds['merk']}</td>
								<td>{$ds['tipe']}</td>
								<td>{$ds['spesifikasi']}</td>
								<td><input type="checkbox" name="aktif[]" class="cekbox" {if $ds['active'] eq 'Y'} checked {/if}></td>
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