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
				<h3>FORM SETTING</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}form/list/" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Back</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li>Kode Form : <b>{$d['kode_form']}</b></li>
                   <li>Nama Form : <b>{$d['nama_form']}</b></li>
                   <li>&nbsp;</li>
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Setting</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kode_form" id="kode_form" value="{$d['kode_form']}">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
                            <th>Section</th>
                            <th>Question</th>
							<th>Value</th>
							<th>Target</th>
							<th class="text-right">{$_L['Manage']}</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$clist}</div>
						{foreach $e as $ds}
                            <tr>
                                <td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
                                    <select name="section[]" class="section" id="section">
                                        <option value={$ds['start']|@floor}>Section {$ds['start']|@floor}</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="question[]" class="question" id="question">
                                        {foreach $f as $fs}
                                            {if $fs['section'] eq $ds['start']}
                                                <option value="{$ds['start']}">{$fs['pertanyaan']}</option>
                                            {/if}
                                        {/foreach}
                                    </select></td>
                                <td>
                                    <select name="value[]" class="value" id="value">
                                        <option value="{$ds['value']}">{$ds['value']}</option>
                                    </select></td>
                                <td>
                                    <select name="target[]" class="target" id="target">
                                        <option value={$ds['target']|@floor}>Section {$ds['target']|@floor}</option>
                                    </select></td>							
                                <td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
                            </tr>
						{/foreach}
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