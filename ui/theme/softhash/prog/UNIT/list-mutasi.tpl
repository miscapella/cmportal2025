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
<h1>{$duplicate}</h1>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <table id="datatable" class="table table-bordered table-hover sys_table">
          <thead>
          <tr>
            <th style="width: 2%">#</th>
            <th style="width: 13%">TGL BAST</th>
            <th style="width: 10%">NO BAST</th>
            <th style="width: 17%">NO CHASSIS</th>
            <th style="width: 10%">NO ENGINE</th>
            <th style="width: 10%">KODE SUMBER</th>
            <th style="width: 15%">KODE TUJUAN</th>
            <th class="text-right width: 25%">ACTION</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
			</div>
		</div>
	</div>
</div>
{include file="sections/footer.tpl"}