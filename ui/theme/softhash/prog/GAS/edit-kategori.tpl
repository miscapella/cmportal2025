{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Kategori</h5>
                <div class="ibox-tools">
					<a href="{$_url}kategori/list/" class="btn btn-primary btn-xs">Daftar Kategori</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode">Kode Kategori</label>
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" disabled="disabled" value="{$d['kd_kategori']}">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Nama Kategori</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="{$d['nm_kategori']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="keterangan">Keterangan</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="keterangan" name="keterangan" rows="5">{$d['keterangan']}</textarea>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="induk">Induk Kategori</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="induk" name="induk" {if $d['parent'] eq 'Y'} checked value="y" {else} value="n" {/if}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_induk">Kategori Induk</label>
                        <div class="col-lg-9">
							<select class="form-control" id="kode_induk" name="kode_induk">
								{$opt_induk}
							</select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="induk">Aktif</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="aktif" name="aktif" value="y" {if $d['active'] eq 'Y'} checked {/if}>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}