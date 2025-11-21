{include file="sections/header.tpl"}

<div class="modal fade" id="addPRModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header bg-primary">
		  <h5 class="modal-title" id="exampleModalLabel">TAMBAH PURCHASE REQUISITION</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <form class="form-horizontal" id="rform">
			<div class="alert alert-danger" id="emsgModal">
				<a href="#"><i class="fal fa-times" style="float:right" id="closeMsgModal"></i></a>
				<span id="emsgModalbody"></span>
			</div>
			<div class="form-group">
			    <label for="keperluanModal" class="col-form-label">KEPERLUAN <span style="color: red;">*</span></label>
			    <select name="keperluanModal" class="form-control keperluanModal" id="keperluanModal" required>
					{$clist}
				</select>
			</div>
			<div class="form-group">
				<label for="bagianModal" class="col-form-label">BAGIAN <span style="color: red;">*</span></label>
				<select name="bagianModal" class="form-control bagianModal" id="bagianModal">
					<option value="">Pilih Bagian</option>
				</select>
			</div>
			<div class="form-group">
				<label for="mainModal" class="col-form-label">MAIN DATA <span style="color: red;">*</span></label>
				<select name="mainModal" class="form-control mainModal" id="mainModal">
					<option value="">Pilih Main Data</option>
				</select>
			</div>
			<div class="form-group">
				<label for="subModal" class="col-form-label">BAGIAN SUB <span style="color: red;">*</span></label>
				<select name="subModal" class="form-control subModal" id="subModal">
					<option value="">Pilih Sub Data</option>
				</select>
			</div>
			<div class="form-group">
				<label for="lineModal" class="col-form-label">BAGIAN LINE <span style="color: red;">*</span></label>
				<select name="lineModal" class="form-control lineModal" id="lineModal">
					<option value="">Pilih Line Data</option>
				</select>
			</div>
			<input name="namaBagianModal" type="text" class="form-control" id="namaBagianModal" style="display: none;">
			<div class="form-group">
				<label for="itemModal" class="col-form-label">ITEM STOCK <span style="color: red;">*</span></label>
				<select name="itemModal" class="form-control itemModal" id="itemModal">
					<option value="">Pilih Item Stock</option>
				</select>
			</div>
			<input name="namaItemModal" type="text" class="form-control" id="namaItemModal" style="display: none;">
			<div class="form-group">
			  <label for="merkModal" class="col-form-label">MERK</label>
			  <input name="merkModal" type="text" class="form-control" id="merkModal" readonly>
			</div>
			<div class="form-group">
				<label for="tipeModal" class="col-form-label">TIPE</label>
				<input name="tipeModal" type="text" class="form-control" id="tipeModal" readonly>
			</div>
			<div class="form-group">
				<label for="spesifikasiModal" class="col-form-label">SPESIFIKASI</label>
				<input name="spesifikasiModal" type="text" class="form-control" id="spesifikasiModal" readonly>
			</div>
			<div class="form-group">
				<label for="satuanModal" class="col-form-label">SATUAN</label>
				<input name="satuanModal" type="text" class="form-control" id="satuanModal" readonly>
			</div>
			<div class="form-group">
				<label for="qtyModal" class="col-form-label">QTY REQUEST <span style="color: red;">*</span></label>
				<input name="qtyModal" type="number" class="form-control amount" id="qtyModal" value=0>
			</div>
			<div class="form-group">
				<label for="diperlukanModal" class="col-form-label">TANGGAL DIPERLUKAN <span style="color: red;">*</span></label>
				<input name="diperlukanModal" type="text" placeholder="dd-mm-yyyy" class="form-control tgl" id="diperlukanModal">
			</div>
			<div class="form-group">
				<label for="keteranganModal" class="col-form-label">KETERANGAN PEMBELIAN</label>
				<input name="keteranganModal" type="text" placeholder="Keterangan Pembelian" class="form-control" id="keteranganModal">
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			  <button type="button" id="submitAddPR" class="btn btn-success">Add</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
</div>
<div class="alert alert-danger" id="emsg">
	<span id="emsgbody"></span>
</div>
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
				<h3>EDIT PURCHASE REQUISITION</h3>
				<div class="alert alert-danger" id="emsg" style="display: none;">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addPRModal"  name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr">No. PR</label>
					<div class="col-lg-3"><input type="text" id="no_pr" name="no_pr" class="form-control" value="{$d['no_pr']}" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="no_pr_fisik">No. PR Fisik</label>
					<div class="col-lg-3"><input type="text" id="no_pr_fisik" name="no_pr_fisik" class="form-control" value="{$d['no_pr_fisik']}" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PR</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-3">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="URGENT" {if $d['priority'] eq 'URGENT'}selected{/if}>URGENT</option>
							<option value="TIDAK URGENT" {if $d['priority'] eq 'TIDAK URGENT'}selected{/if}>TIDAK URGENT</option>
						</select>
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
							<th>Keperluan</th>
							<th>Bagian</th>
							<th>Item Stock</th>
							<th>Qty Req</th>
							<th>Tgl Diperlukan</th>
							<th>Keterangan Pembelian</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$clist}</div>
						{foreach $e as $ds}
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
								<td><input type="text" name="keperluan[]" class="keperluan" value="{$ds['keperluan']}" readonly></td>
								{assign var="nama_line" value=""}
								{foreach $tg2 as $r2}
									{if $ds['line'] eq $r2['kode_kategori']}
										{assign var="nama_line" value="{$r2['nama_kategori']}"}
									{/if}
								{/foreach}
								{if $nama_line eq ''}
									{assign var="nama_line" value="STOCK"}
								{/if}
								<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="{$ds['bagian']}"></td>
								<td style="display:none;"><input type="text" name="main[]" class="main" value="{$ds['main']}"></td>
								<td style="display:none;"><input type="text" name="sub[]" class="sub" value="{$ds['sub']}"></td>
								<td style="display:none;"><input type="text" name="line[]" class="line" value="{$ds['line']}"></td>
								<td><a href="#" class="detail-bagian" value="{$ds['line']}">{$nama_line}</a></td>
								<td style="display:none;"><input type="text" name="item[]" class="item" value="{$ds['kode_item']}" readonly></td>
								{assign var="nama_item" value=""}
								{foreach $tg1 as $r1}
									{if $ds['kode_item'] eq $r1['kode_item']}
										{assign var="nama_item" value="{$r1['nama_item']}"}
									{/if}
								{/foreach}
								<td><a href="#" class="detail-itemstock" value="{$ds['kode_item']}">{$nama_item}</a></td>
								<td><input type="text" name="qty[]" class="qty amount" value={$ds['qty_req']}><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>
								<td><input type="text" name="diperlukan[]" class="diperlukan tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value={if $ds['tgl_diperlukan'] neq ''}{date('d-m-Y', strtotime($ds['tgl_diperlukan']))}{else}""{/if}></td>
								<td><input type="text" name="keterangan[]" class="keterangan" value="{$ds['keterangan']}"></td>
							</tr>
						{/foreach}
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
{include file="sections/footer.tpl"}