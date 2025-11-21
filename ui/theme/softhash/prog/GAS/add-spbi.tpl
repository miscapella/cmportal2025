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
				<h3>TAMBAH SURAT PENGANTAR BARANG INTERN</h3>
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
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spbi">Tanggal SPBI</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="no_po">No PO <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="no_po" name="no_po">
                            {$opt_po}
                        </select>
                    </div>
                </div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="nm_supplier">Supplier</label>
					<div class="col-lg-9"><input type="text" id="nm_supplier" name="nm_supplier" class="form-control" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="kepada">Kepada <span style="color: red;">*</span></label>
					<div class="col-lg-9"><textarea type="text" id="kepada" name="kepada" class="form-control" rows="3"></textarea>
					</div>
				</div><br><br><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Keterangan SPBI</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"></textarea>
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
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th style="width:20%">No. PR</th>
							<th style="width:20%">Nama Barang</th>
							<th style="width:20%">Quantity</th>
                            <th style="width:20%">Satuan</th>
							<th style="width:20%">Keterangan</th>
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