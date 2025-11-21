{include file="sections/header.tpl"}
<div class="layout-cetak">
    <div class="body-cetak">
        <div class="row">
            <div class="col-lg-6">
                <img class="mutasi-logo" src="sysfrm/uploads/system/logo_pt_capella_medan.png" alt="Logo">
                <p>{$d['KODE_SUMBER']} - </p>
                <p></p>
            </div>
            <div class="col-lg-6" style="text-align: right; font-weight: bold;">
                <p>NO. KONFIRMASI : {$d['NOCONFIRM']}</p>
            </div>
        </div>
        <div class="row">
            <p class="header-cetak">SURAT KELUAR</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>JADWAL KELUAR UNIT</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <p>HARI / TANGGAL</p>
                <p>MEREK KENDARAAN</p>
                <p>JENIS / TYPE</p>
                <p>NO. CHASSIS</p>
                <p>NO. ENGINE</p>
                <p>WARNA</p>
                <p>TUJUAN</p>
                <p>PERLENGKAPAN</p>
            </div>
            <div class="col-lg-9">
                <p>: {$d['DIKETAHUI']}</p>
                <p>: {$d['DIKETAHUI']}</p>
                <p>: {$d['DIKETAHUI']} / {$d['KODE_TYPE']}</p>
                <p>: {$d['NO_CHASISS']}</p>
                <p>: {$d['NO_ENGINE']}</p>
                <p>: {$d['DIKETAHUI']}</p>
            </div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}