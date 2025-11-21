{include file="sections/header.tpl"}

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Tambah Tipe Kendaraan</h1>
                <form id="form-add">
                    <div class="form-group">
                        <label>Nama Tipe Mobil</label>
                        <input type="text" name="nama_tipe_mobil" class="form-control" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" name="merek" class="form-control" maxlength="100">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" maxlength="100">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{$_url}tipe-kendaraan/list" class="btn btn-default">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}
