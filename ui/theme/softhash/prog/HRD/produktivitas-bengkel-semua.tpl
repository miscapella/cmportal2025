{include file="sections/header.tpl"}

<script>
    const semuaCabang = {$semuaCabang};
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="{$_url}produktivitas-bengkel/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Unit Entry Semua Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-cat">Kategori</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_unit_entry_semua-tipe" name="grafik_unit_entry_semua-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_unit_entry_semua-dari" name="grafik_unit_entry_semua-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_unit_entry_semua-hingga" name="grafik_unit_entry_semua-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_unit_entry_semua-cat" name="grafik_unit_entry_semua-cat" class="form-control" style="width: 100%;">
                                            <option value="daihatsu" selected>Daihatsu</option>
                                            <option value="udt">UD Trucks</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_unit_entry_semua" style="margin-top: 32px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}