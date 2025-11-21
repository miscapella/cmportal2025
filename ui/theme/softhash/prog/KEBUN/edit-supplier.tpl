{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Supplier</h5>
                <div class="ibox-tools">
					<a href="{$_url}supplier/list/" class="btn btn-primary btn-xs">Daftar Supplier</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformsupplier">
                    <input type="hidden" name="cid" id="cid" value="{$cid}">
					<div class="col-lg-12"><h1 class="text-center">Detail Supplier</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_supplier"><span style="color: red;">*</span> Kode Supplier</label>
                        <div class="col-lg-9"><input type="text" id="kode_supplier" name="kode_supplier" class="form-control" style="text-transform:uppercase" value="{$d['kode_supplier']}" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_supplier"><span style="color: red;">*</span> Nama Supplier</label>
                        <div class="col-lg-9"><input type="text" id="nama_supplier" name="nama_supplier" class="form-control" style="text-transform:uppercase" value="{$d['nama_supplier']}">
                        </div>
                    </div>
                    <!-- <div class="form-group"><label class="col-lg-3 control-label" for="bidang"><span style="color: red;">*</span> Bidang</label>
                        <div class="col-lg-9"><input type="text" id="bidang" name="bidang" class="form-control" value="{$d['bidang']}">
                        </div>
                    </div> -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="bidang"><span style="color: red;">*</span>Bidang</label>
                        <div class="col-lg-3">
                            <select class="form-control" id="bidang" name="bidang">
                                {foreach $daftar_bidang as $s}
                                    <option value="{$s['nama_bidang']}" {if {$d['bidang']} eq $s['nama_bidang']} selected {/if}>{$s['nama_bidang']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="komoditas"><span style="color: red;">*</span> Komoditas</label>
                        <div class="col-lg-9"><input type="text" id="komoditas" name="komoditas" class="form-control" value="{$d['komoditas']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="asal"><span style="color: red;">*</span> Asal Supplier</label>
                        <div class="col-lg-9"><select class="form-control kodetelp" id="asal" name="asal">
                        <option value="lokal"{if $d['asal_supplier'] eq 'lokal'} selected {/if}>Lokal</option>
                        <option value="bukan lokal"{if $d['asal_supplier'] eq 'bukan lokal'} selected {/if}>Bukan Lokal</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label">Foto Toko</label>
                        <div class="col-lg-3">
                            {if $d['foto_toko'] neq ''}
                            <a href="uploads/KEBUN/{$d['foto_toko']}" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            {else}
                            <a class="form-control">Tidak ada file</a>
                            {/if}
                        </div>
                        <label class="col-lg-2 control-label" for="foto_toko">Change Foto Toko</label>
                        <div class="col-lg-3"><input type="file" id="foto_toko" name="foto_toko" class="files">
                            <input type="text" id="sfoto_toko" name="sfoto_toko" value="{$d['foto_toko']}" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group">
                        {assign var=etelp_toko value="|"|explode:$d['telp_toko']}
                        <label class="col-lg-3 control-label" for="telp_toko">Telepon Toko</label>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_telp_toko" name="kode_telp_toko">
                                {foreach $daftar_kode as $r}
                                    <option value="{$r['kode_telepon']}" {if {$etelp_toko[0]} eq $r['kode_telepon']} selected {/if}>+{$r['kode_telepon']} ({$r['negara']})</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-lg-1"><input type="text" id="area_telp_toko" name="area_telp_toko" class="form-control" value="{$etelp_toko[1]}" placeholder="-">
                        </div>
                        <div class="col-lg-7"><input type="text" id="telp_toko" name="telp_toko" class="form-control" value="{$etelp_toko[2]}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group">
                        {assign var=ehp_toko value="|"|explode:$d['hp_toko']}
                        <label class="col-lg-3 control-label" for="hp_toko">Nomor HP Toko</label>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_hp_toko" name="kode_hp_toko">
                                {foreach $daftar_kode as $r}
                                    <option value="{$r['kode_telepon']}" {if {$ehp_toko[0]} eq $r['kode_telepon']} selected {/if}>+{$r['kode_telepon']} ({$r['negara']})</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-lg-8"><input type="text" id="hp_toko" name="hp_toko" class="form-control" value="{$ehp_toko[1]}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="email">Email</label>
                        <div class="col-lg-9"><input type="text" id="email" name="email" class="form-control" value="{$d['email']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="website">Website</label>
                        <div class="col-lg-9"><input type="text" id="website" name="website" class="form-control" value="{$d['website']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_mulai_kerjasama">Tanggal Mulai Kerjasama</label>
                        <div class="col-lg-9"><input type="text" id="tgl_mulai_kerjasama" name="tgl_mulai_kerjasama" class="form-control tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="{$d['tgl_mulai_kerjasama']|date_format:'%d-%m-%Y'}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lama_pembayaran">Lama Pembayaran (Hari)</label>
                        <div class="col-lg-9"><input type="number" id="lama_pembayaran" name="lama_pembayaran" class="form-control" value={$d['lama_pembayaran']}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="rekomendasi_dari">Rekomendasi Dari</label>
                        <div class="col-lg-9"><input type="text" id="rekomendasi_dari" name="rekomendasi_dari" class="form-control" value="{$d['rekomendasi_dari']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nib">NIB (Nomor Induk Berusaha)</label>
                        <div class="col-lg-9"><input type="text" id="nib" name="nib" class="form-control" value="{$d['nib']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_nib">File NIB</label>
                        <div class="col-lg-3">
                            {if $d['file_nib'] neq ''}
                            <a href="uploads/KEBUN/{$d['file_nib']}" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            {else}
                            <a class="form-control">Tidak ada file</a>
                            {/if}
                        </div>
                        <label class="col-lg-2 control-label" for="file_nib">Change File NIB</label>
                        <div class="col-lg-3"><input type="file" id="file_nib" name="file_nib" class="files">
                            <input type="text" id="sfile_nib" name="sfile_nib" value="{$d['file_nib']}" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="npwp">NPWP (Nomor Pokok Wajib Pajak)</label>
                        <div class="col-lg-9"><input type="text" id="npwp" name="npwp" class="form-control" value="{$d['npwp']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_npwp">File NPWP</label>
                        <div class="col-lg-3">
                            {if $d['file_npwp'] neq ''}
                            <a href="uploads/KEBUN/{$d['file_npwp']}" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            {else}
                            <a class="form-control">Tidak ada file</a>
                            {/if}
                        </div>
                        <label class="col-lg-2 control-label" for="file_npwp">Change File NPWP</label>
                        <div class="col-lg-3"><input type="file" id="file_npwp" name="file_npwp" class="files">
                            <input type="text" id="sfile_npwp" name="sfile_npwp" value="{$d['file_npwp']}" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_kontrak">File Kontrak</label>
                        <div class="col-lg-3">
                            {if $d['file_kontrak'] neq ''}
                            <a href="uploads/KEBUN/{$d['file_kontrak']}" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            {else}
                            <a class="form-control">Tidak ada file</a>
                            {/if}
                        </div>
                        <label class="col-lg-2 control-label" for="file_kontrak">Change File Kontrak</label>
                        <div class="col-lg-3"><input type="file" id="file_kontrak" name="file_kontrak" class="files">
                            <input type="text" id="sfile_kontrak" name="sfile_kontrak" value="{$d['file_kontrak']}" style="display: none;">
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Alamat</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="negara">Negara</label>
                        <div class="col-lg-3">
                            <select class="form-control kodetelp" id="negara" name="negara">
                                {foreach $daftar_kode as $r}
                                    <option value="{$r['negara']}" {if {$d['negara']} eq $r['negara']} selected {/if}>{$r['negara']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="provinsi">Provinsi</label>
                        <div class="col-lg-3"><input type="text" id="provinsi" name="provinsi" class="form-control" value="{$d['provinsi']}" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="kota">Kota</label>
                        <div class="col-lg-4"><input type="text" id="kota" name="kota" class="form-control" value="{$d['kota']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kelurahan">Kelurahan</label>
                        <div class="col-lg-3"><input type="text" id="kelurahan" name="kelurahan" class="form-control" value="{$d['kelurahan']}" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="kecamatan">Kecamatan</label>
                        <div class="col-lg-4"><input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{$d['kecamatan']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kotamadya">kotamadya / Kabupaten</label>
                        <div class="col-lg-3"><input type="text" id="kotamadya" name="kotamadya" class="form-control" value="{$d['kotamadya']}" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="rtrw">RT / RW</label>
                        <div class="col-lg-4"><input type="text" id="rtrw" name="rtrw" class="form-control" value="{$d['rtrw']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alamat">Alamat</label>
                        <div class="col-lg-9"><input type="text" id="alamat" name="alamat" class="form-control" value="{$d['alamat']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nomor_gedung">Nomor Gedung</label>
                        <div class="col-lg-3"><input type="text" id="nomor_gedung" name="nomor_gedung" class="form-control" value="{$d['nomor_gedung']}" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="kode_pos">Kode Pos</label>
                        <div class="col-lg-4"><input type="text" id="kode_pos" name="kode_pos" class="form-control" value="{$d['kode_pos']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="link_maps">Link Google Map</label>
                        <div class="col-lg-9"><input type="text" id="link_maps" name="link_maps" class="form-control" value="{$d['link_maps']}" placeholder="-">
                        </div> 
                    <div class="col-lg-12"><h1 class="text-center">Detail Contact</h1></div>
                       
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="file_ktp">File KTP</label>
                        <div class="col-lg-3">
                            {if $d['file_ktp'] neq ''}
                            <a href="uploads/KEBUN/{$d['file_ktp']}" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            {else}
                            <a class="form-control">Tidak ada file</a>
                            {/if}
                        </div>
                        <label class="col-lg-3 control-label" for="file_ktp">Change File KTP</label>
                        <div class="col-lg-3"><input type="file" id="file_ktp" name="file_ktp" class="files">
                            <input type="text" id="sfile_ktp" name="sfile_ktp" value="{$d['file_ktp']}" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_pemilik">Nama Pemilik</label>
                        <div class="col-lg-8"><input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" value="{$d['nama_pemilik']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_pemilik">No HP Pemilik</label>
                        {assign var=ehp_pemilik value="|"|explode:$d['hp_pemilik']}
                        <div class="col-lg-2">
                            <select class="form-control kodetelp" id="kode_hp_pemilik" name="kode_hp_pemilik">
                                {foreach $daftar_kode as $r}
                                    <option value="{$r['kode_telepon']}" {if {$ehp_pemilik[0]} eq $r['kode_telepon']} selected {/if}>+{$r['kode_telepon']} ({$r['negara']})</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-lg-6"><input type="text" id="hp_pemilik" name="hp_pemilik" class="form-control" value="{$ehp_pemilik[1]}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_contact">Nama Contact</label>
                        <div class="col-lg-8"><input type="text" id="nama_contact" name="nama_contact" class="form-control" value="{$d['nama_contact']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_contact">No HP Contact</label>
                        {assign var=ehp_contact value="|"|explode:$d['hp_contact']}
                        <div class="col-lg-2">
                            <select class="form-control kodetelp" id="kode_hp_contact" name="kode_hp_contact">
                                {foreach $daftar_kode as $r}
                                    <option value="{$r['kode_telepon']}" {if {$ehp_contact[0]} eq $r['kode_telepon']} selected {/if}>+{$r['kode_telepon']} ({$r['negara']})</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-lg-6"><input type="text" id="hp_contact" name="hp_contact" class="form-control" value="{$ehp_contact[1]}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_emergency">Nama Emergency Contact</label>
                        <div class="col-lg-8"><input type="text" id="nama_emergency" name="nama_emergency" class="form-control" value="{$d['nama_emergency']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_emergency">No HP Emergency</label>
                        {assign var=ehp_emergency value="|"|explode:$d['hp_emergency']}
                        <div class="col-lg-2">
                            <select class="form-control kodetelp" id="kode_hp_emergency" name="kode_hp_emergency">
                                {foreach $daftar_kode as $r}
                                    <option value="{$r['kode_telepon']}" {if {$ehp_emergency[0]} eq $r['kode_telepon']} selected {/if}>+{$r['kode_telepon']} ({$r['negara']})</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-lg-6"><input type="text" id="hp_emergency" name="hp_emergency" class="form-control" value="{$ehp_emergency[1]}" placeholder="-">
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Rekening</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="bank">Nama Bank</label>
                        <div class="col-lg-8"><input type="text" id="bank" name="bank" class="form-control" value="{$d['bank']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_rekening">Nomor Rekening</label>
                        <div class="col-lg-8"><input type="text" id="no_rekening" name="no_rekening" class="form-control"  value="{$d['no_rekening']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="an_rekening">Atas Nama Rekening</label>
                        <div class="col-lg-8"><input type="text" id="an_rekening" name="an_rekening" class="form-control" value="{$d['an_rekening']}" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="aktif">Aktif</label>
                        <div class="col-lg-8"><input class="form-check-input" type="checkbox" id="aktif" name="aktif" value="y" {if $d['active'] eq 'Y'} checked {/if}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="blocked">Blacklist Supplier</label>
                        <div class="col-lg-8"><input class="form-check-input" type="checkbox" id="blocked" name="blocked" value="y" {if $d['blocked'] eq 'Y'} checked {/if}>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alasan_blocked">Alasan Blacklist</label>
                        <div class="col-lg-8"><input type="text" id="alasan_blocked" name="alasan_blocked" class="form-control" value="{$d['alasan_blocked']}" placeholder="-" readonly>
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