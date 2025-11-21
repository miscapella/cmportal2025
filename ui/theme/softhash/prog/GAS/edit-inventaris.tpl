{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">



    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Inventaris</h5>
                <div class="ibox-tools">
					<a href="{$_url}inventaris/itemstock/{$cid}/" class="btn btn-warning btn-xs"><i class="fa fa-cogs"></i> Item Stock</a>
					<a href="{$_url}inventaris/list/" class="btn btn-primary btn-xs">Daftar Inventaris</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode">Kode Inventaris</label>
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" style="text-transform:uppercase" value="{$d['kd_inventaris']}" disabled>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="nama">Nama Inventaris</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="{$d['nm_inventaris']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kategori">Kategori</label>
                        <div class="col-lg-9">
							<select class="form-control" id="kategori" name="kategori">
								{$options}
							</select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk</label>
                        <div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" value="{$d['merk']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe">Tipe</label>
                        <div class="col-lg-9"><input type="text" id="tipe" name="tipe" class="form-control" value="{$d['tipe']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuan">Satuan</label>
                        <div class="col-lg-9"><input type="text" id="satuan" name="satuan" class="form-control" value="{$d['satuan']}">
                        </div>
                    </div>
<!--
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty">Min Qty</label>
                        <div class="col-lg-9"><input type="number" id="qty" name="qty" class="form-control" value={$d['qty_min']}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty1">Max Qty</label>
                        <div class="col-lg-9"><input type="number" id="qty1" name="qty1" class="form-control" value={$d['qty_max']}>
                        </div>
                    </div>
-->
                    <div class="form-group"><label class="col-lg-3 control-label" for="spesifikasi">Spesifikasi</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="spesifikasi" name="spesifikasi" rows="5">{$d['spesifikasi']}</textarea>
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