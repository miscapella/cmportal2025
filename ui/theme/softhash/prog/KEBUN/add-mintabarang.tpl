{include file="sections/header.tpl"}

<input type="hidden" id="event_mrs" value="{$event_mrs}" class="form-control" />
<input type="hidden" id="idtpl" value="{$id}" class="form-control" />

<div class="modal fade" id="addMintaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header bg-primary">
		  <h5 class="modal-title" id="exampleModalLabel">TAMBAH ITEM MR</h5>		  		  
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
				<label for="qtyModal" class="col-form-label">QTY Permintaan <span style="color: red;">*</span></label>
				<input name="qtyModal" type="number" class="form-control amount" id="qtyModal" value=0>
			</div>
			<div class="form-group">
				<label for="diperlukanModal" class="col-form-label">TANGGAL DIPERLUKAN <span style="color: red;">*</span></label>
				<input name="diperlukanModal" type="text" placeholder="dd-mm-yyyy" class="form-control tgl" id="diperlukanModal">
			</div>
			<div class="form-group">
				<label for="keteranganModal" class="col-form-label">KETERANGAN PERMINTAAN</label>
				<input name="keteranganModal" type="text" placeholder="Keterangan permintaan" class="form-control" id="keteranganModal">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" id="submitAddMintaBarang" class="btn btn-success">Add</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
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

{if $event_mrs eq "tambah"}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>TAMBAH UR</h3>
					<div class="alert alert-danger" id="emsg">
						<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
						<span id="emsgbody"></span>
					</div>
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMintaModal"  name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" placeholder="Unit Kerja"/>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor"/>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div>

            </div>
        </div>
    </div>
</div>


{else if $event_mrs eq "detail" || $event_mrs eq "keluarbarang"}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL UR</h3></div>
				{if $event_mrs eq "keluarbarang"}
					<div class="col-lg-6" style="text-align: right"><a href="{$_url}pengeluaranbarang/list-ur-approved" class="btn btn-primary btn-sm">Back</a></div>
				{else}
					<div class="col-lg-6" style="text-align: right"><a href="{$_url}permintaanbarang/list-mintabarang" class="btn btn-primary btn-sm">Back</a></div>	
				{/if}
				
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" value="{$es['unit_kerja']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="{$es['nomor']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="{$es['tanggal']|date_format:'%d-%m-%Y'}" data-auto-close="true" disabled>
					</div>
				</div>

            </div>
        </div>
    </div>
</div>


{else} 
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>EDIT UR</h3>
			
				<ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMintaModal"  name="add" id="add"><i class="fa fa-plus"></i> Tambah Item</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
    	        </ul>
			</div>			
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>					
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" value="{$es['unit_kerja']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="{$es['nomor']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="{$es['tanggal']|date_format:'%d-%m-%Y'}" data-auto-close="true" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
{/if}


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<!-- <input type="hidden" name="kd_inventaris" id="kd_inventaris" value="{$e['kd_inventaris']}">-->
					<table id='table-add-mr' class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th><span style="color: red;">*</span> Keperluan</th>
							<th>Bagian</th>
							<th><span style="color: red;">*</span> Item Stock</th>
							<th><span style="color: red;">*</span> Qty Req</th>
							<th><span style="color: red;">*</span> Tanggal Diperlukan</th>
							<th>Keterangan Permintaan</th>
						</tr>
						</thead>
						<tbody>
							{if $event_mrs eq "detail" || $event_mrs eq "keluarbarang"}
								{$clist_detail}
							{else if $event_mrs eq "edit"}
								{$clist_edit}
							{/if}
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