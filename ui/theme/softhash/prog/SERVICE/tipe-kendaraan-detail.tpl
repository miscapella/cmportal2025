{include file="sections/header.tpl"}

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Detail Tipe Kendaraan</h1>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nama Tipe Mobil</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{$item.nama_tipe_mobil|escape}" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Kategori</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{$item.kategori|escape}" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <a href="{$_url}tipe-kendaraan/list" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

{include file="sections/footer.tpl"}