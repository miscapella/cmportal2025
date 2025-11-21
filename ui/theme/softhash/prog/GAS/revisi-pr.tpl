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
				<h3>REVISI PURCHASE REQUISITION</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}pembelian/list-pr-reject/" class="btn btn-primary btn-sm">Daftar PR</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
            <div class="ibox-content" id="ibox_form">
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="no_pr">No. PR Awal</label>
					<div class="col-lg-4"><input type="text" id="no_pr" name="no_pr" class="form-control" value="{$d['no_pr']}" disabled></div>
					
					<label class="col-lg-2 control-label" for="no_revisi" style="text-align: right">No. PR Revisi</label>
					<div class="col-lg-4"><input type="text" id="no_revisi" name="no_revisi" class="form-control" value="{$no_revisi}" disabled></div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="priority">Kepentingan Awal</label>
					<div class="col-lg-4">
						<select name="priority" id="priority" class="form-control" disabled>
							<option value="RENDAH" {if $d['priority'] eq 'RENDAH'}selected{/if}>RENDAH</option>
							<option value="MENENGAH" {if $d['priority'] eq 'MENENGAH'}selected{/if}>MENENGAH</option>
							<option value="TINGGI" {if $d['priority'] eq 'TINGGI'}selected{/if}>TINGGI</option>
						</select>
					</div>
					<label class="col-lg-2 control-label" for="priority_revisi" style="text-align: right">Kepentingan Revisi</label>
					<div class="col-lg-4">
						<select name="priority_revisi" id="priority_revisi" class="form-control">
							<option value="RENDAH" {if $d['priority'] eq 'RENDAH'}selected{/if}>RENDAH</option>
							<option value="MENENGAH" {if $d['priority'] eq 'MENENGAH'}selected{/if}>MENENGAH</option>
							<option value="TINGGI" {if $d['priority'] eq 'TINGGI'}selected{/if}>TINGGI</option>
						</select>
					</div>
				</div><br>
				<div class="form-group">
				    <label class="col-lg-2 control-label" for="tgl_pr">Tanggal PR Awal</label>
					<div class="col-lg-4"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
					
					<label class="col-lg-2 control-label" for="tgl_revisi" style="text-align: right">Tanggal PR Revisi</label>
					<div class="col-lg-4"><input type="text" id="idates" name="idates" class="form-control" value="{$idates}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group" style="margin-bottom:40px">
				    <label class="col-lg-2 control-label" for="pesan">Pesan</label>
					<div class="col-lg-4"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5" disabled>{$d['pesan']}</textarea></div>
					<label class="col-lg-2 control-label" for="ket_revisi" style="text-align: right">Keterangan Revisi</label>
					<div class="col-lg-4"><textarea type="text" id="ket_revisi" name="ket_revisi" class="form-control" rows="5"></textarea></div>
				</div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="{$d['kd_inventaris']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th><span style="color: red;">*</span> Keperluan</th>
							<th><span style="color: red;">*</span> Item Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
							<th>Satuan</th>
							<th><span style="color: red;">*</span> Qty Req</th>
							<th>Stock</th>
							<th><span style="color: red;">*</span> Tgl Diperlukan</th>
							<th>Keterangan</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$clist}</div>
						{foreach $e as $ds}
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
								<td>
									<select name="kd_inventaris[]" class="kd_inventaris" id="kd_inventaris">
										<option value="">Pilih Inventaris</option>
										<option value="STOCK" {if $ds['kd_inventaris'] eq 'STOCK'} selected {/if}>STOCK</option>
										{foreach $tg as $r}
											<option value="{$r['kd_inventaris']}" {if $ds['kd_inventaris'] eq $r['kd_inventaris']} selected {/if}>{$r['nm_inventaris']}</option>
										{/foreach}
									</select>
								</td>
								<td>
									<select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item">
										<option>Pilih Item Stock</option>
										{if $ds['kd_inventaris'] eq 'STOCK'}
											{foreach $tg1 as $r1}
												<option value="{$r1['kd_item']}" {if $ds['kd_item'] eq $r1['kd_item']} selected {/if}>{$r1['nm_item']}</option>
											{/foreach}
										{else}
											{foreach $tg2 as $r2}
											    {if $ds['kd_inventaris'] eq $r2['kd_inventaris']}
												<option value="{$r2['kd_item']}" {if $ds['kd_item'] eq $r2['kd_item']} selected {/if}>{$r2['nm_item']}</option>
												{/if}
											{/foreach}
										{/if}
									</select>
								</td>
								{assign var="merk" value=""}
								{assign var="tipe" value=""}
								{assign var="spesifikasi" value=""}
								{assign var="satuan" value=""}
								{foreach $tg1 as $r1}
									{if $ds['kd_item'] eq $r1['kd_item']}
										{assign var="merk" value="{$r1['merk']}"}
										{assign var="tipe" value="{$r1['tipe']}"}
										{assign var="spesifikasi" value="{$r1['spesifikasi']}"}
										{assign var="satuan" value="{$r1['satuan']}"}
									{/if}
								{/foreach}
								<td><input style="background-color: #ccc"  type="text" name="merk[]" class="merk" readonly value="{$merk}"></td>
								<td><input style="background-color: #ccc"  type="text" name="tipe[]" class="tipe" readonly value="{$tipe}"></td>
								<td><input style="background-color: #ccc"  type="text" name="spesifikasi[]" class="spesifikasi" readonly value="{$spesifikasi}"></td>
								<td><input style="background-color: #ccc"  type="text" name="satuan[]" class="satuan" readonly value="{$satuan}"></td>
								<td><input type="text" name="qty_req[]" class="qty_req amount" value="{$ds['qty_req']}"></td>
								<td><input style="background-color: #ccc"  type="text" name="qty_balance[]" class="qty_balance amount" value="{$ds['qty_stock']}" readonly><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>
								<td><input type="text" name="tgl[]" class="tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value={if $ds['tgl_diperlukan'] neq ''}{date('d-m-Y', strtotime($ds['tgl_diperlukan']))}{else}""{/if}></td>
								<td><input type="text" name="keterangan[]" class="keterangan" value="{$ds['keperluan']}"></td>
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