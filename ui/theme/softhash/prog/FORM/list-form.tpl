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
					<div class="form-group">
						<div class="col-md-8">
							
						</div>
						<div class="col-md-4">
							<a href="{$_url}form/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Form</a>
						</div>
					</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">KODE FORM</th>
                        <th style="width: 50%">NAMA FORM</th>
                        <th style="width: 15%">STATUS</th>
                        <th class="text-right" style="width: 18%">MANAGE</th>
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