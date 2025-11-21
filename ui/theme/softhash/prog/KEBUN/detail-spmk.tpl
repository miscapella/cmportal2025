{include file="sections/header.tpl"} {if $msg neq ''}
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  {$msg}
</div>
{/if}

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body {if $d['priority'] eq 'URGENT'}red-bg{else}blue-bg{/if}"
      >
        <div class="col-lg-6"><h3>DETAIL SURAT PERMINTAAN KERJA</h3></div>
        <div class="col-lg-6" style="text-align: right">
          <a
            href="{$_url}pembelian/{if $d['status'] == 'PENDING' || $d['status'] == 'REVISI'}list-spmk-pending{elseif $d['status'] == 'APPROVE'}list-spmk-approve{elseif $d['status'] == 'REJECT'}list-spmk-reject{/if}/"
            class="btn btn-primary btn-sm"
            >Back</a
          >
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body detail-pr-head">
        <div class="form-group">
          <label class="col-lg-3 control-label" for="no_spmk">No. SPMK</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="no_spmk"
              name="no_spmk"
              class="form-control"
              value="{$d['no_spmk']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="tgl_spmk"
            >Tanggal SPMK</label
          >
          <div class="col-lg-9">
            <input
              type="text"
              id="idate"
              name="idate"
              class="form-control"
              value="{$idate}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="priority"
            >Tingkat Kepentingan</label
          >
          <div class="col-lg-9">
            <input
              type="text"
              id="priority"
              name="priority"
              class="form-control"
              value="{$d['priority']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="divisi">Divisi</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="divisi"
              name="divisi"
              class="form-control"
              value="{$d['divisi']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="jenis_pekerjaan"
            >Jenis Pekerjaan</label
          >
          <div class="col-lg-9">
            <input
              type="text"
              id="jenis_pekerjaan"
              name="jenis_pekerjaan"
              class="form-control"
              value="{$d['jenis_pekerjaan']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="lokasi">Lokasi</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="lokasi"
              name="lokasi"
              class="form-control"
              value="{$d['lokasi']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="afdeling"
              name="afdeling"
              class="form-control"
              value="{$d['afdeling']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="status">Status</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="status"
              name="status"
              class="form-control"
              value="{$d['status']}"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="pesan">Pesan</label>
          <div class="col-lg-9">
            <textarea
              type="text"
              id="pesan"
              name="pesan"
              class="form-control"
              rows="5"
              disabled
            >
{$d['pesan']}</textarea
            >
          </div>
        </div>
        <br /><br /><br /><br /><br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="dibuat">Dibuat Oleh</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="dibuat"
              name="dibuat"
              class="form-control"
              value="{$d['dibuat_nama']}"
              disabled
            />
          </div>
        </div>
        <br />
        {if $d['status'] eq 'REJECT'}
        <div class="form-group">
          <label class="col-lg-3 control-label" for="ditolak"
            >Ditolak Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="ditolak"
              name="ditolak"
              class="form-control"
              value="{$d['ditolak_nama']}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tglditolak"
            >Tanggal Ditolak</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tglditolak"
              name="tglditolak"
              class="form-control"
              value="{$d['ditolak_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        {else if $d['posisi'] eq 'SPNK'}
        <div class="form-group">
          <label class="col-lg-3 control-label" for="ktr_disetujui"
            >Disetujui Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="ktr_disetujui"
              name="ktr_disetujui"
              class="form-control"
              value="{if $d['ktr_disetujui_nama'] neq ''}{$d['ktr_disetujui_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label
            class="col-lg-2 control-label text-right"
            for="tglktr_disetujui"
            >Tanggal Disetujui</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tglktr_disetujui"
              name="tglktr_disetujui"
              class="form-control"
              value="{$d['ktr_disetujui_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        {else}
        <div class="form-group">
          <label class="col-lg-3 control-label" for="diperiksa"
            >Diperiksa Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="diperiksa"
              name="diperiksa"
              class="form-control"
              value="{if $d['diperiksa_nama'] neq ''}{$d['diperiksa_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldiperiksa"
            >Tanggal Diperiksa</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldiperiksa"
              name="tgldiperiksa"
              class="form-control"
              value="{$d['diperiksa_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disetujui"
            >Disetujui Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disetujui"
              name="disetujui"
              class="form-control"
              value="{if $d['disetujui_nama'] neq ''}{$d['disetujui_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisetujui"
            >Tanggal Disetujui</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisetujui"
              name="tgldisetujui"
              class="form-control"
              value="{$d['disetujui_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disurvey"
            >Disurvey Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disurvey"
              name="disurvey"
              class="form-control"
              value="{if $d['disurvey_nama'] neq ''}{$d['disurvey_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisurvey"
            >Tanggal Disurvey</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisurvey"
              name="tgldisurvey"
              class="form-control"
              value="{$d['disurvey_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="diketahui"
            >Diketahui Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="diketahui"
              name="diketahui"
              class="form-control"
              value="{if $d['diketahui_nama'] neq ''}{$d['diketahui_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldiketahui"
            >Tanggal Diketahui</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldiketahui"
              name="tgldiketahui"
              class="form-control"
              value="{$d['diketahui_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        {/if}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body detail-pr-head">
        <div class="form-group">Direksi & Asisten Direksi</div>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disetujuiadireksi"
            >Disetujui Oleh Asisten Direksi</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disetujuiadireksi"
              name="disetujuiadireksi"
              class="form-control"
              value="{if $d['ktr_disetujui_nama'] neq ''}{$d['ktr_disetujui_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisetujuiadireksi"
            >Tanggal Disetujui Asisten Direksi</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisetujuiadireksi"
              name="tgldisetujuiadireksi"
              class="form-control"
              value="{$d['ktr_disetujui_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disetujuidireksi"
            >Disetujui Oleh Direksi</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disetujuidireksi"
              name="disetujuidireksi"
              class="form-control"
              value="{if $d['ktr_disetujui_dir_nama'] neq ''}{$d['ktr_disetujui_dir_nama']}{else}Menunggu Approval{/if}"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisetujuidireksi"
            >Tanggal Disetujui Direksi</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisetujuidireksi"
              name="tgldisetujuidireksi"
              class="form-control"
              value="{$d['ktr_disetujui_dir_tgl']}"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        {assign var="nourut" value=1} {foreach $e as $ds}
        <div class="form-group">SERVIS #{$nourut}</div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="spesifikasi"
            >Spesifikasi</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="spesifikasi"
            name="spesifikasi"
            class="form-control"
          >
            {$ds['spesifikasi']}
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="block">Block</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="block"
            name="block"
            class="form-control"
          >
            {$ds['block']}
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="ha">Ha</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="ha"
            name="ha"
            class="form-control"
          >
            {$ds['ha']}
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="pkk">PKK</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="pkk"
            name="pkk"
            class="form-control"
          >
            {$ds['pkk']}
          </div>
        </div>
        <br />
        <hr />
        {if $d['posisi'] eq 'SPMK1'}
        <div class="form-group">PILIHAN KONTRAKTOR</div>
        <br />
        {assign var="nama_kontraktor1" value=""} {assign var="contact1"
        value=""} {assign var="lama_bayar1" value=""} {assign
        var="nama_kontraktor2" value=""} {assign var="contact2" value=""}
        {assign var="lama_bayar2" value=""} {assign var="nama_kontraktor3"
        value=""} {assign var="contact3" value=""} {assign var="lama_bayar3"
        value=""} {foreach $tg3 as $r3} {if $ds['kontraktor1'] eq
        $r3['kode_supplier']} {assign var="nama_kontraktor1"
        value="{$r3['nama_supplier']}"} {assign var="contact1"
        value="{$r3['nama_contact']}"} {assign var="lama_bayar1"
        value="{$r3['lama_pembayaran']}"} {/if} {if $ds['kontraktor2'] eq
        $r3['kode_supplier']} {assign var="nama_kontraktor2"
        value="{$r3['nama_supplier']}"} {assign var="contact2"
        value="{$r3['nama_contact']}"} {assign var="lama_bayar2"
        value="{$r3['lama_pembayaran']}"} {/if} {if $ds['kontraktor3'] eq
        $r3['kode_supplier']} {assign var="nama_kontraktor3"
        value="{$r3['nama_supplier']}"} {assign var="contact3"
        value="{$r3['nama_contact']}"} {assign var="lama_bayar3"
        value="{$r3['lama_pembayaran']}"} {/if} {/foreach}
        <div class="form-group">
          <div
            class="form-group col-lg-4 {if $ds['kontraktorpilihan'] eq $ds['kontraktor1']} supplierpilihan {/if}"
            style="border-right: 1px solid #e7eaec"
          >
            <div class="row">
              <input type="radio" name="{$ds["id"]}kontraktorpilihan[]"
              class="cekbox col-lg-12" {if $ds['kontraktorpilihan'] eq
              $ds['kontraktor1']} checked {/if} value="kontraktor1" disabled>
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="kontraktor1"
                >Kontraktor 1</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <a
                href="#"
                class="col-lg-8 detail-kontraktor"
                value="{$ds['kontraktor1']}"
                >{$ds['kontraktor1']}</a
              >
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="nama_kontraktor1"
                >Nama</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="nama_kontraktor1"
                name="nama_kontraktor1"
                class="form-control"
                value="{$nama_kontraktor1}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="contact1"
                >Contact</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="contact1"
                name="contact1"
                class="form-control"
                value="{$contact1}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="lama_bayar1"
                >Lama Bayar</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="lama_bayar1"
                name="lama_bayar1"
                class="form-control"
                value="{$lama_bayar1}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="harga1">Harga</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8 amount"
                type="text"
                id="harga1"
                name="harga1"
                class="form-control"
                value="{$ds['harga1']}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="keterangan_kontraktor1"
                >Keterangan</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="keterangan_kontraktor1"
                name="keterangan_kontraktor1"
                class="form-control"
                value="{$ds['keterangan_kontraktor1']}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="file_kontraktor1"
                >File</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <div class="col-lg-8">
                {if $ds['file_kontraktor1'] neq ''}
                <a
                  href="uploads/KEBUN/{$ds['file_kontraktor1']}"
                  target="_blank"
                  >{$ds['file_kontraktor1']}</a
                >
                {/if}
              </div>
            </div>
          </div>
          <div
            class="form-group col-lg-4 {if $ds['kontraktorpilihan'] eq $ds['kontraktor2']} supplierpilihan {/if}"
            style="border-right: 1px solid #e7eaec"
          >
            <div class="row">
              <input type="radio" name="{$ds["id"]}kontraktorpilihan[]"
              class="cekbox col-lg-12" {if $ds['kontraktorpilihan'] eq
              $ds['kontraktor2']} checked {/if} value="kontraktor2" disabled>
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="kontraktor2"
                >Kontraktor 2</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <a
                href="#"
                class="col-lg-8 detail-kontraktor"
                value="{$ds['kontraktor2']}"
                >{$ds['kontraktor2']}</a
              >
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="nama_kontraktor2"
                >Nama</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="nama_kontraktor2"
                name="nama_kontraktor2"
                class="form-control"
                value="{$nama_kontraktor2}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="contact2"
                >Contact</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="contact2"
                name="contact2"
                class="form-control"
                value="{$contact2}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="lama_bayar2"
                >Lama Bayar</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="lama_bayar2"
                name="lama_bayar2"
                class="form-control"
                value="{$lama_bayar2}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="harga2">Harga</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8 amount"
                type="text"
                id="harga2"
                name="harga2"
                class="form-control"
                value="{$ds['harga2']}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="keterangan_kontraktor2"
                >Keterangan</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="keterangan_kontraktor2"
                name="keterangan_kontraktor2"
                class="form-control"
                value="{$ds['keterangan_kontraktor2']}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="file_kontraktor2"
                >File</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <div class="col-lg-8">
                {if $ds['file_kontraktor2'] neq ''}
                <a
                  href="uploads/KEBUN/{$ds['file_kontraktor2']}"
                  target="_blank"
                  >{$ds['file_kontraktor2']}</a
                >
                {/if}
              </div>
            </div>
          </div>
          <div
            class="form-group col-lg-4 {if $ds['kontraktorpilihan'] eq $ds['kontraktor3']} supplierpilihan {/if}"
          >
            <div class="row">
              <input type="radio" name="{$ds["id"]}kontraktorpilihan[]"
              class="cekbox col-lg-12" {if $ds['kontraktorpilihan'] eq
              $ds['kontraktor3']} checked {/if} value="kontraktor3" disabled>
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="kontraktor3"
                >Kontraktor 3</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <a
                href="#"
                class="col-lg-8 detail-kontraktor"
                value="{$ds['kontraktor3']}"
                >{$ds['kontraktor3']}</a
              >
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="nama_kontraktor3"
                >Nama</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="nama_kontraktor3"
                name="nama_kontraktor3"
                class="form-control"
                value="{$nama_kontraktor3}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="contact3"
                >Contact</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="contact3"
                name="contact3"
                class="form-control"
                value="{$contact3}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="lama_bayar3"
                >Lama Bayar</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="lama_bayar3"
                name="lama_bayar3"
                class="form-control"
                value="{$lama_bayar3}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="harga3">Harga</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8 amount"
                type="text"
                id="harga3"
                name="harga3"
                class="form-control"
                value="{$ds['harga3']}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="keterangan_kontraktor3"
                >Keterangan</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="keterangan_kontraktor3"
                name="keterangan_kontraktor3"
                class="form-control"
                value="{$ds['keterangan_kontraktor3']}"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="file_kontraktor3"
                >File</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <div class="col-lg-8">
                {if $ds['file_kontraktor3'] neq ''}
                <a
                  href="uploads/KEBUN/{$ds['file_kontraktor3']}"
                  target="_blank"
                  >{$ds['file_kontraktor3']}</a
                >
                {/if}
              </div>
            </div>
          </div>
        </div>
        <div class="row"></div>
        <br />
        <hr />
        <hr />
        {/if} {assign var="nourut" value=$nourut+1} {/foreach}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">{$paginator['contents']}</div>
</div>
{include file="sections/footer.tpl"}
