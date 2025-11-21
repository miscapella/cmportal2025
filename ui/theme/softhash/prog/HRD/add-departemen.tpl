{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="{$_url}departemen/list/" class="btn btn-primary btn-xs">Daftar Departemen</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformdepartemen">
                    <div class="col-lg-12"><h1 class="text-center">Detail Departemen</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_supplier"><span style="color: red;">*</span> Kode Departemen</label>
                        <div class="col-lg-9"><input type="text" id="kode_departemen" name="kode_departemen" class="form-control" style="text-transform:uppercase" placeholder="Kode Departemen">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_departemen"><span style="color: red;">*</span> Nama Departemen</label>
                        <div class="col-lg-9"><input type="text" id="nama_departemen" name="nama_departemen" class="form-control" style="text-transform:uppercase" placeholder="Nama Departemen">
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