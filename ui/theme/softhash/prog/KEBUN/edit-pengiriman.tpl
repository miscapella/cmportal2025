{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Supplier</h5>
                <div class="ibox-tools">
					<a href="{$_url}viapengiriman/list/" class="btn btn-primary btn-xs">Daftar Pengiriman</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformsupplier">
                    <input type="hidden" name="cid" id="cid" value="{$cid}">
					<div class="col-lg-12"><h1 class="text-center">Detail Pengiriman</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_via"><span style="color: red;">*</span> Kode Supplier</label>
                        <div class="col-lg-9"><input type="text" id="kode_via" name="kode_via" class="form-control" style="text-transform:uppercase" value="{$d['kode_via']}" >
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_pengiriman"><span style="color: red;">*</span> Nama Supplier</label>
                        <div class="col-lg-9"><input type="text" id="nama_pengiriman" name="nama_pengiriman" class="form-control" style="text-transform:uppercase" value="{$d['nama_pengiriman']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="resi">Dengan Resi</label>
                        <div class="col-lg-8"><input class="form-check-input" type="checkbox" id="resi" name="resi" value="Y" {if $d['resi'] eq 'Y'} checked {/if}>
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