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
{assign var="nomor" value=1}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" style="background-color: #ccc;">
				<h3 class="col-lg-11" style="text-align: center;"><b>EDIT FORM</b></h3>
				<button class="btn btn-primary col-lg-1" type="submit" id="save">Save</button>
            </div>
        </div>
    </div>
	<div class="col-md-12">
	<div class="alert alert-danger" id="emsg">
		<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
		<span id="emsgbody"></span>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<td style="vertical-align: middle;"><input type="checkbox" name="chks[]" class="cekbox" checked="checked" style="display:none"></td>
				<div style="display:none"><input type="number" id="section" name="section[]" class="form-control" value=1></div>
				<div class="form-group"><label class="col-lg-3 control-label" for="kode">Kode Form </label>
					<div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" value="{$d['kode_form']}" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="aktif">Status</label>
					<div class="col-lg-9">
						<select class="form-control" id="aktif" name="aktif">
							<option value="AKTIF" {if $d['status'] eq 'AKTIF'} selected {/if}>AKTIF</option>
							<option value="NONAKTIF" {if $d['status'] eq 'NONAKTIF'} selected {/if}>NONAKTIF</option>
						</select>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="form_title">Form Title </label>
					<div class="col-lg-9"><input type="text" id="form_title" name="form_title[]" class="form-control" value="{$d['nama_form']}"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="form_description">Form Description </label>
					<div class="col-lg-9"><textarea type="text" id="form_description" name="form_description[]" class="form-control" rows="5">{$d['deskripsi']}</textarea></div>
				</div><br>
            </div>
        </div>
    </div>
</div>

{assign var="current" value=1}
<div class="isi_form" name="opt_form" id="opt_form">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default isi_question" id="isi_question{$current}">
	{foreach $e as $item}
	{if $item['section'] eq $current+1}
			</div>
			<div class="panel-body text-center">
				<button class="btn btn-success btn-sm add_question" name="add_question" id="question{$current}" title="Add Question"><i class="fa fa-plus"></i></button>
			</div>
		</div>
	</div>
	{assign var="current" value=$current+1}
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body" style="background-color: #ccc;">
					<div class="col-md-1"></div>
					<h3 class="col-md-10" style="text-align: center;"><b>SECTION {$current}</b></h3>
					<div class="col-md-1 text-right"><button class="btn btn-danger btn-sm hapus_section" name="delete_section" title="Delete Section"><i class="fa fa-times"></i></button></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<td style="vertical-align: middle;"><input type="checkbox" name="chks[]" class="cekbox" checked="checked" style="display:none"></td>
					<div style="display: none;"><input type="number" id="section" name="section[]" class="form-control" value={$current}></div>
					<div class="form-group"><label class="col-lg-3 control-label" for="form_title">Section Title </label>
						<div class="col-lg-9"><input type="text" id="form_title" name="form_title[]" class="form-control" value="{$item['pertanyaan']}"></div>
					</div><br>
					<div class="form-group"><label class="col-lg-3 control-label" for="form_description">Section Description </label>
						<div class="col-lg-9"><textarea type="text" id="form_description" name="form_description[]" class="form-control" rows="5">{$item['deskripsi']}</textarea></div>
					</div><br>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default isi_question" id="isi_question{$current}">
	{else}
				<div class="panel-body">
					<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
					<div style="display: none;"><input type="number" id="question_number" name="question_number[]" class="form-control" value={$current}></div>
					<div class="form-group"><label class="col-lg-2 control-label text-right" for="pertanyaan">Question</label>
						<div class="col-lg-6"><input type="text" id="pertanyaan" name="pertanyaan[]" class="form-control" value="{$item['pertanyaan']}">
						</div>
						<div class="col-lg-3"><select name="tipe_data[]" class="tipe_data" id="tipe_data">
							<option value="string" {if $item['tipe'] eq 'string'} selected{/if}>STRING</option>
            				<option value="datetime" {if $item['tipe'] eq 'datetime'} selected{/if}>DATETIME</option>
							<option value="date" {if $item['tipe'] eq 'date'} selected{/if}>DATE</option>
							<option value="statement" {if $item['tipe'] eq 'statement'} selected{/if}>STATEMENT</option>
							<option value="time" {if $item['tipe'] eq 'time'} selected{/if}>TIME</option>
            				<option value="file" {if $item['tipe'] eq 'file'} selected{/if}>FILE</option>
            				<option value="14harikerja" {if $item['tipe'] eq '14harikerja'} selected{/if}>14 HARI KERJA</option>
							{foreach $tg as $items}
								<option value="{$items['kode']}" {if $items['kode'] eq $item['tipe']} selected{/if}>{$items['kode']} - {$items['nama']}</option>
							{/foreach}
						</select>
						</div>
						<div class="col-lg-1 text-right"><button class="btn btn-danger btn-sm hapus" name="delete_question" title="Delete Question"><i class="fa fa-times"></i></button></div>
					</div><br>
					<div class="form-group"><label class="col-lg-2 control-label text-right" for="keterangan">Description</label>
						<div class="col-lg-10"><textarea type="text" id="keterangan" name="keterangan[]" class="form-control" rows="2">{$item['deskripsi']}</textarea>
						</div>
					</div>
				</div>
			
	{/if}
	{/foreach}
			</div>
			<div class="panel-body text-center">
				<button class="btn btn-success btn-sm add_question" name="add_question" id="question{$current}" title="Add Question"><i class="fa fa-plus"></i></button>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<div class="panel-body text-center">
	<button class="btn btn-danger btn-sm" name="add_section" id="add_section" title="Add Section"><i class="fa fa-plus"></i> Add New Section</button>
</div>

<input type="number" name="section_number" id="section_number" style="display:none" value={$current}>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}