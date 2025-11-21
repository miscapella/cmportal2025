{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Type</h5>
                <div class="ibox-tools">
					<a href="{$_url}datatype/list/" class="btn btn-primary btn-xs"><i class="fa fa-reply"></i> Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="kode">Data Type Code</label>
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" value="{$d['kode']}" readonly>
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="nama">Data Type Name</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="{$d['nama']}">
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="tipe">Type</label>
                        <div class="col-lg-9">
							<select class="form-control" id="tipe" name="tipe">
								<option value="">Choose Type</option>
                                <option value="radiobutton" {if $d['tipe'] eq 'radiobutton'} selected {/if}>Radio Button</option>
                                <option value="checkbox" {if $d['tipe'] eq 'checkbox'} selected {/if}>Checkbox</option>
                                <option value="dropdown" {if $d['tipe'] eq 'dropdown'} selected {/if}>Dropdown</option>
							</select>
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="keterangan">Description</label>
						<div class="col-lg-9"><textarea type="text" id="keterangan" name="keterangan" class="form-control" rows="3">{$d['deskripsi']}</textarea>
						</div>
					</div><br><br><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="aktif">Status</label>
                        <div class="col-lg-9">
							<select class="form-control" id="aktif" name="aktif">
                                <option value="AKTIF" {if $d['status'] eq 'AKTIF'} selected {/if}>AKTIF</option>
                                <option value="NONAKTIF" {if $d['status'] eq 'NONAKTIF'} selected {/if}>NONAKTIF</option>
							</select>
                        </div>
                    </div><br>
                    <div id="option-group">
                        {foreach $e as $ds}
                        <div class="form-group">
                            <td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
                            <label class="col-lg-3 control-label text-right" for="option">Option</label>
                            <div class="col-lg-8">
                                <input type="text" id="option" name="option[]" class="form-control" value="{$ds}">
                            </div>
                            <div class="col-lg-1 text-right">
                                <button class="btn btn-danger btn-sm hapus" name="delete_option" title="Delete Option"><i class="fa fa-times"></i></button>
                            </div><br>
                        </div>
                        {/foreach}
                    </div>
                    <div class="col-lg-offset-3 form-group text-center">
                        <button class="btn btn-success btn-sm" name="opsi" id="opsi"><i class="fa fa-plus"></i> Add Option</button>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-danger" type="submit" id="save"><i class="fa fa-check"></i> Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}