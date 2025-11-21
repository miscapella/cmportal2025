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
                <table id="datatable" class="table table-bordered table-hover sys_table">
                <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 25%">Email</th>
                        <th style="width: 20%">Fullname</th>
                        <th style="width: 25%">Supervisor</th>
                        <th style="width: 13%">Employee ID</th>
                        <th class="text-right" style="width:15%">Manage</th>
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