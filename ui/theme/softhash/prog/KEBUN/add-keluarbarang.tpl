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

{if $event_kbs eq "detail"}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL KELUAR BARANG</h3></div>
				<div class="col-lg-6" style="text-align: right"><a href="{$_url}pengeluaranbarang/list-keluarbarang" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">No Keluar barang</label>
					<div class="col-lg-3">
						<input type="text" id="no_keluarbarang" class="form-control" value="{$es['no_keluarbarang']}" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="Tanggal">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl"  class="form-control" value="{$es['tanggal']|date_format:'%d-%m-%Y'}" data-auto-close="true" disabled>
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
				<h3>TAMBAH PENGELUARAN BARANG</h3>
					<!-- <div class="alert alert-danger" id="emsg">
						<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg" ></i></a>
						<span id="emsgbody"></span>
					</div> -->
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor UR </label>
					<div class="col-lg-3">
						<select name="nomor_ur" class="form-control nomor_ur" id="nomor_ur">
							{$clist}
						</select>
					</div>
					
					<ul style="padding: 0;list-style-type:none">
						<li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Ambil Data UR</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
					 </ul>
	 
				</div><br>

            </div>
        </div>
    </div>
</div>
{/if}


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR PENGELUARAN BARANG</h2>
                <table id='list-mintabarang' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
						{if $event_kbs eq "detail"}
							<th style="width: 2%">#</th>
							<th style="width: 15%">Kode Item</th>
							<th style="width: 23%">Nama Item</th>
							<th style="width: 10%">Qty Dipenuhi</th>
							<th style="width: 15%">No. UR</th>					
						{else}
	                        <th style="width: 2%">#</th>
    	                    <th style="width: 23%">Nama Item</th>
        	                <th style="width: 15%">Qty Req</th>
							<th style="width: 15%">Qty On Hand</th>
							<th style="width: 15%">Qty Dipenuhi</th>
							<th style="width: 15%">No. UR</th>
						{/if}                        
                    </tr>
                    </thead>
                     <tbody>
						{if $event_kbs eq "detail"}			
							 {$clist_detail} 
						{/if}
						
                    </tbody>
                </table>
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