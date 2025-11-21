{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Item Stock</h5>
                <div class="ibox-tools">
					<a href="{$_url}itemstock/supplier/{$cid}/" class="btn btn-warning btn-xs"><i class="fa fa-user"></i> Supplier</a>
					<a href="{$_url}itemstock/list/" class="btn btn-primary btn-xs">Daftar Item Stock</a>
				</div>
                

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="col-lg-12"><h1 class="text-center">Detail Item</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama"><span style="color: red;">*</span> Nama Item Stock</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="{$d['nama_item']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merk">Merk</label>
                        <div class="col-lg-9"><input type="text" id="merk" name="merk" class="form-control" value="{$d['merk']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe">Tipe</label>
                        <div class="col-lg-9"><input type="text" id="tipe" name="tipe" class="form-control" value="{$d['tipe']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="spesifikasi">Spesifikasi</label>
                        <div class="col-lg-9"><textarea class="form-control ckeditor" id="spesifikasi" name="spesifikasi" rows="5">{$d['spesifikasi']}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Satuan</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuan"><span style="color: red;">*</span> Satuan Item</label>
                        <div class="col-lg-9"><input type="text" id="satuan" name="satuan" class="form-control" value="{$d['satuan']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="satuanharga"><span style="color: red;">*</span> Satuan Kecil</label>
                        <div class="col-lg-9"><input type="text" id="satuanharga" name="satuanharga" class="form-control" value="{$d['satuan_harga']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="jumlahsatuan"><span style="color: red;">*</span> Jumlah Satuan Kecil</label>
                        <div class="col-lg-9"><input type="text" id="jumlahsatuan" name="jumlahsatuan" class="form-control desimal" value={$d['jumlah_per_satuan']} placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty">Min Qty</label>
                        <div class="col-lg-9"><input type="text" id="qty" name="qty" class="form-control amount" value={$d['qty_min']}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="qty1">Max Qty</label>
                        <div class="col-lg-9"><input type="text" id="qty1" name="qty1" class="form-control amount" value={$d['qty_max']}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="reorder">Reorder Time (Hari)</label>
                        <div class="col-lg-9"><input type="number" id="reorder" name="reorder" class="form-control" value={$d['reorder_time']}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tempa">Barang Tempa</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="tempa" name="tempa" value="y" {if $d['tempa'] eq 'Y'} checked {/if}>
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