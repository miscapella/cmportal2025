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
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <table id='datatable-list-approval' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 20%;">Tanggal Request</th>
                        <th style="width: 20%;">Nama Form</th>
                        <th style="width: 20%;">Nama Respondent</th>
                        <th style="width: 10%;">Details</th>
                        <th class="text-right">{$_L['Manage']}</th>
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