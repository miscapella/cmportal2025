{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Jenis Usaha</h5>
                <div class="ibox-tools">
					<a href="{$_url}jenisusaha/list/" class="btn btn-primary btn-xs">Daftar Jenis Usaha</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformsupplier" autocomplete="off" spellcheck="false">
                    <input type="hidden" name="cid" id="cid" value="{$cid}">
					<div class="col-lg-12"><h1 class="text-center">Detail Jenis Usaha</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_usaha"><span style="color: red;">*</span> Nama Usaha</label>
                        <div class="col-lg-9"><input type="text" id="nama_usaha" name="nama_usaha" class="form-control" style="text-transform:uppercase" value="{$d['nama_usaha']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
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