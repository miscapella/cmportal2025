{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Bagian</h5>
                <div class="ibox-tools">
					<a href="{$_url}kategori/main/{$parent}" class="btn btn-primary btn-xs">Back</a>
				</div>

            </div>
            <div class="ibox-content" id="ibox_form">
                <input type="text" id="parent" name="parent" class="form-control" value="{$parent}" style="display: none;">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <input type="text" id="parents" name="parents" class="form-control" value="{$parent}" style="display: none;">
                    <div class="form-group"><label class="col-lg-3 control-label" for="bagian">Bagian</label>
                        <div class="col-lg-9"><input type="text" id="bagian" name="bagian" class="form-control" value="{$d['nama_kategori']}" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Main Data</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control">
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