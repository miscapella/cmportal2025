{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Kategori</h5>
                <div class="ibox-tools">
					<a class="btn btn-primary btn-xs back">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Nama</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="{$d['nama_kategori']}">
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