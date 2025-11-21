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
                        <a href="{$_url}produktivitas-marketing/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Penjualan Semua Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-4" for="grafik_penjualan_semua-tipe">Tipe Waktu</label>
                                    <label class="col-lg-4" for="grafik_penjualan_semua-dari">Dari</label>
                                    <label class="col-lg-4" for="grafik_penjualan_semua-hingga">Hingga</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select id="grafik_penjualan_semua-tipe" name="grafik_penjualan_semua-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_penjualan_semua-dari" name="grafik_penjualan_semua-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_penjualan_semua-hingga" name="grafik_penjualan_semua-hingga" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_penjualan_semua" style="margin-top: 32px;"></canvas>
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