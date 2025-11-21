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
				<h3>FORM APPROVAL</h3>
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
                   <li><button class="btn btn-success btn-sm" name="add" id="addLevel"><i class="fa fa-plus"></i> Tambah Level</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body level" style="overflow:auto;white-space:nowrap;">
				<input type="hidden" name="kode_form" id="kode_form" value="{$d['kode_form']}">
				<div style="display:none" name="kondisi" id="kondisi">{$kondisi}</div>
				<div style="display:none" name="opt" id="opt">{$opt}</div>
				{if $esize neq 0}
				{assign var="current" value=1}
				{else}
				{assign var="current" value=0}
				{/if}				
				{foreach $e as $ds}
				{if $ds['urutan'] eq $current+1}
					</tbody>
				</table>
				{assign var="current" value=$current+1}
				{/if}
				{if $ds['urutan'] eq $current}
				<table class="table table-bordered table-hover sys_table" id="isi_case{floor($ds['urutan'])}">
					<thead>
					<tr>
						<th style="width: 5%; text-align: center;">Level</th>
						<th style="width: 35%; text-align: center;">Kondisi</th>
						<th style="width: 25%; text-align: center;">Value</th>
						<th style="width: 25%; text-align: center;">Approval</th>
						<th class="width: 10%; text-right">Manage</th>
					</tr>
					</thead>
					<tbody>
						<tr><td style="text-align:center"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">{$current}</td>
							<td style="display:none"><input type="number" id="case_number" name="case_number[]" class="form-control" value='{$current}'></td>
							<td><select name="condition[]" class="condition" id="condition"><option value="default">Default</option></select></td>
							<td><select name="value[]" class="value" id="value"><option value="default">Default</option></select></td>
							<td><select name="target[]" class="target" id="target">
								<option value="">Pilih Target</option>
								<option value="manager" {if $ds['kepada'] eq 'manager'}selected{/if}>Atasan Langsung</option>
								<option value="supervisor" {if $ds['kepada'] eq 'supervisor'}selected{/if}>Atasan Langsung Berikutnya</option>
								{foreach $tg as $tgs}
									<option value="{$tgs['username']}" {if $tgs['username'] eq $ds['kepada']}selected{/if}>{$tgs['username']}</option>
								{/foreach}
							</select></td>
							<td class="text-right"><button type="button" class="btn addCase btn-primary btn-sm" id="case{floor($ds['urutan'])}"><i class="fa fa-plus"></i> Tambah Case</button> <button type="button" class="btn btn-danger hapus_level btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
						</tr>
				{else}
						<tr><td style="text-align:center"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">Case</td>
							<td style="display:none"><input type="number" id="case_number" name="case_number[]" class="form-control" value='{$current}'></td>
							<td>
								<select name="condition[]" class="condition" id="condition">
									<option value="">Pilih Kondisi</option>
									<option value="golongan" {if $ds['kondisi'] eq 'golongan'}selected{/if}>Tingkatan</option>
									{foreach $f as $fs}
									<option value="{$fs['section']}" {if $ds['kondisi'] eq $fs['section']}selected{/if}>Section {floor($fs['section'])} - {$fs['pertanyaan']}</option>
									{/foreach}
								</select>
							</td>
							<td>
								<select name="value[]" class="value" id="value">
									<option value="">Pilih Value</option>
									<option value="{$ds['value']}" selected>{$ds['value']}</option>
								</select>
							</td>
							<td><select name="target[]" class="target" id="target">
								<option value="">Pilih Target</option>
								{for $foo=1 to 10}
								<option value="{$foo}" {if $ds['kepada'] eq $foo}selected{/if}>Approval Level {$foo}</option>
								{/for}
								<option value="manager" {if $ds['kepada'] eq 'manager'}selected{/if}>Atasan Langsung</option>
								<option value="supervisor" {if $ds['kepada'] eq 'supervisor'}selected{/if}>Atasan Langsung Berikutnya</option>
								{foreach $tg as $tgs}
									<option value="{$tgs['username']}" {if $tgs['username'] eq $ds['kepada']}selected{/if}>{$tgs['username']}</option>
								{/foreach}
							</select></td>
							<td class="text-right"><button type="button" class="btn btn-danger hapus_level btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
						</tr>
				{/if}
				{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<input type="number" name="level_number" id="level_number" style="display:none" value={$current}>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}
