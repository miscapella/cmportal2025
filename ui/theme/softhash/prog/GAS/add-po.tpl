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
				<h3>TAMBAH PURCHASE ORDER</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
<!--
                <div class="ibox-tools">
					<a href="{$_url}pembelian/list-pr/" class="btn btn-primary btn-sm">Daftar PR</a>
				</div>
-->
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
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal PO</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="supplier">Supplier <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="supplier" name="supplier">
                            {$opt_supplier}
                        </select>
                    </div>
                </div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-9">
						<select name="priority" id="priority" class="form-control">
							<option value="">Pilih Kepentingan</option>
							<option value="RENDAH">RENDAH</option>
							<option value="MENENGAH">MENENGAH</option>
							<option value="TINGGI">TINGGI</option>
						</select>
					</div>
				</div><br>
				<!-- <div class="form-group"><label class="col-lg-3 control-label" for="ppn">Ppn <span style="color: red;">*</span></label>
					<div class="col-lg-9"><input type="number" id="ppn" name="ppn" class="form-control" value="0"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="exclude_ppn">Exclude Ppn</label>
					<div class="col-lg-9"><input type="checkbox" id="exclude_ppn" name="exclude_ppn" style="vertical-align: middle;"></div>
				</div><br> -->
				<div class="form-group"><label class="col-lg-3 control-label" for="bayar_pusat">Bayar di pusat </label>
					<div class="col-lg-9"><input type="checkbox" id="bayar_pusat" name="bayar_pusat" style="vertical-align: middle;"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="lokasi_pengiriman">Lokasi Pengiriman</label>
					<div class="col-lg-9"><input type="text" id="lokasi_pengiriman" name="lokasi_pengiriman" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="syarat_pembayaran">Syarat Pembayaran</label>
					<div class="col-lg-9"><input type="text" id="syarat_pembayaran" name="syarat_pembayaran" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="catatan">Catatan</label>
					<div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control"></div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="{$d['kd_inventaris']}">
				<div class="form-group">
					<label class="col-lg-2 control-label" for="total">Harga Total</label>
					<div class="col-lg-3">
						<input type="text" id="total" name="total" class="form-control" style="background-color: #f7f7f7; cursor: default;" value="Rp 0" disabled>
					</div><br>
				</div>
			</div>
			<div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<table class="table table-bordered table-hover sys_table" id="table-po">
						<thead>
						<tr>
							<th style="width:3%">#</th>
							<th style="width:13%">No. PR</th>
							<th style="width:17%">Nama Barang</th>
							<th style="width:10%">Harga</th>
							<th style="width:5%">PPN</th>
							<th style="width:10%">Harga Setelah PPN</th>
							<th style="width:10%"><span style="color: red;">*</span> Quantity</th>
							<!-- <th style="width:14%" colspan="2">Garansi</th> -->
							<th style="width:32%">Keterangan</th>
						</tr>
						</thead>
						<tbody class="sys_tables">
						<div style="display:none" name="opt" id="opt">{$clist}</div>
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