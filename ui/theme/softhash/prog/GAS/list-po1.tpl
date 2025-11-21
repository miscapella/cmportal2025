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

{if _auth2('PRINT-PO',$user['id'])}
<input type="hidden" id="print-po" value="y"/>
{else}
<input type="hidden" id="print-po" value="n"/>
{/if}

<div class="row">
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="{$_url}pembelian/add-po/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah PO</a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE ORDER</h2>
                <table id="datatable-po" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
						<th style="width: 15%">No. PO</th>
                        <th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Supplier</th>
                        <!--<th style="width: 15%">Tingkat Kepentingan</th>-->
                        <th style="width: 15%">Total Harga</th>
                        <th style="width: 10%">Kepentingan</th> 
                        <th style="width: 20%">Tanggal Pelunasan</th>
                        <th class="text-right" style="width: 18%">{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>
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