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
                <div class="col-md-12">
                    <h1 style="text-align: center;">{$form['kode_form']} - {$form['nama_form']}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="kode_form" id="kode_form" value="{$form['kode_form']}">
        <input type="hidden" name="count" id="count" value="{$count}">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow-x: scroll;">
                <table id="datatable-response-detail" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap; width: 2%;">#</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Kode Form</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Employee Id</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Respondent</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Unit Usaha</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Tanggal</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Status</th>
                        {$hasil}
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