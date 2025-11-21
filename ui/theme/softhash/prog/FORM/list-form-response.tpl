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
	<div class="col-md-12 text-right">
		<a href="{$_url}response/list-form/" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Back</a>
    </div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h1 style="text-align: center;">{$form['kode_form']} - {$form['nama_form']}</h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <input type="hidden" name="kode_form" id="kode_form" value="{$form['kode_form']}">
                <table id="datatable-response" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;text-align: center;">#</th>
                        <th style="width: 10%;text-align: center;">Request Id</th>
                        <th style="width: 15%;text-align: center;">Request Date</th>
                        <th style="width: 25%;text-align: center;">Respondent Name</th>
                        <th style="width: 20%;text-align: center;">Unit Usaha</th>
                        <th style="width: 10%;text-align: center;">Status</th>
                        <th style="text-align: center;">{$_L['Manage']}</th>
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