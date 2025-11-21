{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="{$_url}karyawan/list/" class="btn btn-primary btn-xs">Daftar Karyawan</a>
				</div>
            </div>
            <div class="navigation">
              <button class="nav-tab" id="karyawan-tab">Karyawan Baru</button>
              <button class="nav-tab" id="personal-tab">Informasi Personal</button>
              <button class="nav-tab" id="pekerjaan-tab">Informasi Pekerjaan</button>
              <button class="nav-tab" id="gaji-tab">Informasi Gaji</button>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformkaryawan">
                  <div id="karyawan-baru">
                    <input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="col-lg-12"><h1 class="text-center">Karyawan Baru</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="id_karyawan"> Id Karyawan</label>
                        <div class="col-lg-9"><input type="text" id="id_karyawan" name="id_karyawan" class="form-control" placeholder="Id Karyawan" disabled value="{$d['id_karyawan']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_karyawan"> Nama Karyawan</label>
                        <div class="col-lg-9"><input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" disabled value="{$d['nama_karyawan']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_depan"><span style="color: red;">*</span> Nama Depan</label>
                        <div class="col-lg-9"><input type="text" id="nama_depan" name="nama_depan" class="form-control" placeholder="Nama Depan" value="{$d['nama_depan']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_tengah"> Nama Tengah</label>
                      <div class="col-lg-9"><input type="text" id="nama_tengah" name="nama_tengah" class="form-control" placeholder="Nama Tengah" value="{$d['nama_tengah']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_belakang"> Nama Belakang</label>
                      <div class="col-lg-9"><input type="text" id="nama_belakang" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="{$d['nama_belakang']}">
                      </div>
                    </div>
                  </div>
                  <div id="info-personal">
                    <div class="col-lg-12"><h1 class="text-center">Informasi Personal</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="id_pengguna"> Id Pengguna</label>
                      <div class="col-lg-9"><input type="text" id="id_pengguna" name="id_pengguna" class="form-control" placeholder="Id Pengguna" disabled value="{$d['id_pengguna']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label">Gambar</label>
                        <div class="col-lg-3">
                            {if $d['gambar'] neq ''}
                            <a href="uploads/KARYAWAN/{$d['gambar']}" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            {else}
                            <a class="form-control">Tidak ada file</a>
                            {/if}
                        </div>
                        <label class="col-lg-2 control-label" for="gambar">Ganti Gambar</label>
                        <div class="col-lg-3"><input type="file" id="gambar" name="gambar" class="files">
                            <input type="text" id="sgambar" name="sgambar" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_ktp"><span style="color: red;">*</span> No KTP</label>
                      <div class="col-lg-9"><input type="number" id="no_ktp" name="no_ktp" class="form-control" placeholder="No KTP" value="{$d['no_ktp']}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="departemen"><span style="color: red;">*</span> Departemen</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="departemen" name="departemen" style="width: 100%">
                                {$departemen}
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tempat_lahir"><span style="color: red;">*</span> Tempat Lahir</label>
                      <div class="col-lg-9"><input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{$d['tempat_lahir']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_lahir"><span style="color: red;">*</span> Tanggal Lahir</label>
                      <div class="col-lg-9"><input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{$d['tgl_lahir']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="jenis_kelamin"><span style="color: red;">*</span> Jenis Kelamin</label>
                        <div class="col-lg-9"><select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{$d['jenis_kelamin']}">
                        <option value="Laki-laki" {if $d['jenis_kelamin'] == "Laki-laki"}selected{/if}>Laki-laki</option>
                        <option value="Perempuan" {if $d['jenis_kelamin'] == "Perempuan"}selected{/if}>Perempuan</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="status_pernikahan"><span style="color: red;">*</span> Status Pernikahan</label>
                      <div class="col-lg-9"><select class="form-control" id="status_pernikahan" name="status_pernikahan">
                      <option value="Lajang" {if $d['status_pernikahan'] == "Lajang"}selected{/if}>Lajang</option>
                      <option value="Menikah" {if $d['status_pernikahan'] == "Menikah"}selected{/if}>Menikah</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="agama"><span style="color: red;">*</span> Agama</label>
                      <div class="col-lg-9"><select class="form-control" id="agama" name="agama">
                      <option value="Islam" {if $d['agama'] == "Islam"}selected{/if}>Islam</option>
                      <option value="Kristen Protestan" {if $d['agama'] == "Kristen Protestan"}selected{/if}>Kristen Protestan</option>
                      <option value="Katolik" {if $d['agama'] == "Katolik"}selected{/if}>Katolik</option>
                      <option value="Buddha" {if $d['agama'] == "Buddha"}selected{/if}>Buddha</option>
                      <option value="Hindu" {if $d['agama'] == "Hindu"}selected{/if}>Hindu</option>
                      <option value="Khonghucu" {if $d['agama'] == "Khonghucu"}selected{/if}>Khonghucu</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="golongan_darah"> Golongan Darah</label>
                      <div class="col-lg-9"><input type="text" id="golongan_darah" name="golongan_darah" class="form-control" placeholder="Golongan Darah" value="{$d['golongan_darah']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kewarganegaraan"> Kewarganegaraan</label>
                      <div class="col-lg-9"><input type="text" id="kewarganegaraan" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan" value="{$d['kewarganegaraan']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_telepon"> No Telepon</label>
                      <div class="col-lg-9"><input type="text" id="no_telepon" name="no_telepon" class="form-control" placeholder="No Telepon" value="{$d['no_telepon']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="email"> Email</label>
                      <div class="col-lg-9"><input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{$d['email']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_asuransi"> No Asuransi</label>
                      <div class="col-lg-9"><input type="number" id="no_asuransi" name="no_asuransi" class="form-control" placeholder="No Asuransi" value="{$d['no_asuransi']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_masuk_asuransi"> Tanggal Masuk Asuransi</label>
                      <div class="col-lg-9"><input type="date" id="tgl_masuk_asuransi" name="tgl_masuk_asuransi" class="form-control" placeholder="Tanggal Masuk Asuransi" value="{$d['tgl_masuk_asuransi']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_bpjs_kesehatan"> No BPJS Kesehatan</label>
                      <div class="col-lg-9"><input type="number" id="no_bpjs_kesehatan" name="no_bpjs_kesehatan" class="form-control" placeholder="No BPJS Kesehatan" value="{$d['no_bpjs_kesehatan']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_masuk_bpjs_kesehatan"> Tanggal Masuk BPJS Kesehatan</label>
                      <div class="col-lg-9"><input type="date" id="tgl_masuk_bpjs_kesehatan" name="tgl_masuk_bpjs_kesehatan" class="form-control" placeholder="Tanggal Masuk BPJS Kesehatan" value="{$d['tgl_masuk_bpjs_kesehatan']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_faskes"> Kode Faskes</label>
                      <div class="col-lg-9"><input type="text" id="kode_faskes" name="kode_faskes" class="form-control" placeholder="Kode Faskes" value="{$d['kode_faskes']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_faskes"> Nama Faskes</label>
                      <div class="col-lg-9"><input type="text" id="nama_faskes" name="nama_faskes" class="form-control" placeholder="Nama Faskes" value="{$d['nama_faskes']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kelas_rawat"> Kelas Rawat</label>
                      <div class="col-lg-9"><input type="text" id="kelas_rawat" name="kelas_rawat" class="form-control" placeholder="Kelas Rawat" value="{$d['kelas_rawat']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_tk"> Kode TK</label>
                      <div class="col-lg-9"><input type="text" id="kode_tk" name="kode_tk" class="form-control" placeholder="Kode TK" value="{$d['kode_tk']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kesediaan_bepergian"> Kesediaan bepergian</label>
                      <div class="col-lg-9"><input type="checkbox" id="kesediaan_bepergian" name="kesediaan_bepergian" {if $d['kesediaan_bepergian'] == "Bersedia"}checked{/if}>
                      </div>
                    </div>
                  </div>
                  <div id="info-pekerjaan">
                    <div class="col-lg-12"><h1 class="text-center">Informasi Pekerjaan</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_perusahaan_supervisor"> Kode Perusahaan Supervisor</label>
                      <div class="col-lg-9"><input type="text" id="kode_perusahaan_supervisor" name="kode_perusahaan_supervisor" class="form-control" placeholder="Kode Perusahaan Supervisor" value="{$d['kode_perusahaan_supervisor']}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="id_supervisor"> Id Supervisor</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="id_supervisor" name="id_supervisor" style="width: 100%">
                                {$id_supervisor}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="nama_supervisor"> Nama Supervisor</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="nama_supervisor" name="nama_supervisor" style="width: 100%" disabled>
                                {$nama_supervisor}
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kategori_karyawan"> Kategori Karyawan</label>
                      <div class="col-lg-9"><select class="form-control" id="kategori_karyawan" name="kategori_karyawan">
                      <option value="">--- Pilih Kategori ---</option>
                      <option value="Kategori 1" {if $d['kategori_karyawan'] == "Kategori 1"}selected{/if}>Kategori 1</option>
                      <option value="Kategori 2" {if $d['kategori_karyawan'] == "Kategori 2"}selected{/if}>Kategori 2</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="status_karyawan"><span style="color: red;">*</span> Status Karyawan</label>
                      <div class="col-lg-9"><select class="form-control" id="status_karyawan" name="status_karyawan">
                      <option value="Aktif" {if $d['status_karyawan'] == "Aktif"}selected{/if}>Aktif</option>
                      <option value="Tidak Aktif" {if $d['status_karyawan'] == "Tidak Aktif"}selected{/if}>Tidak Aktif</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="masa_percobaan"> Masa Percobaan (Bulan)</label>
                      <div class="col-lg-9"><input type="number" id="masa_percobaan" name="masa_percobaan" class="form-control" placeholder="Percobaan" value="{$d['masa_percobaan']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe_karyawan"><span style="color: red;">*</span> Tipe Karyawan</label>
                      <div class="col-lg-9"><select class="form-control" id="tipe_karyawan" name="tipe_karyawan">
                        <option value="Permanen" {if $d['tipe_karyawan'] == "Permanen"}selected{/if}>Permanen</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe_remunerasi"><span style="color: red;">*</span> Tipe Remunerasi</label>
                      <div class="col-lg-9"><select class="form-control" id="tipe_remunerasi" name="tipe_remunerasi">
                      <option value="Mingguan" {if $d['tipe_remunerasi'] == "Mingguan"}selected{/if}>Mingguan</option>
                      <option value="Bulanan" {if $d['tipe_remunerasi'] == "Bulanan"}selected{/if}>Bulanan</option>
                      <option value="Tahunan" {if $d['tipe_remunerasi'] == "Tahunan"}selected{/if}>Tahunan</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_kartu_absen"> No Kartu Absen</label>
                      <div class="col-lg-9"><input type="number" id="no_kartu_absen" name="no_kartu_absen" class="form-control" placeholder="No Kartu Absen" value="{$d['no_kartu_absen']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_bergabung"><span style="color: red;">*</span> Tanggal bergabung</label>
                      <div class="col-lg-9"><input type="date" id="tgl_bergabung" name="tgl_bergabung" class="form-control" value="{$d['tgl_bergabung']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nilai"> Nilai</label>
                      <div class="col-lg-9"><input type="text" id="nilai" name="nilai" class="form-control" placeholder="Nilai" value="{$d['nilai']}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="kode_organisasi"> Kode Organisasi</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="kode_organisasi" name="kode_organisasi" style="width: 100%">
                                {$kode_organisasi}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="nama_organisasi"> Nama Organisasi</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="nama_organisasi" name="nama_organisasi" style="width: 100%" disabled>
                                {$nama_organisasi}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="id_jabatan"> Id Jabatan</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="id_jabatan" name="id_jabatan" style="width: 100%">
                                {$id_jabatan}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="nama_jabatan"> Nama Jabatan</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="nama_jabatan" name="nama_jabatan" disabled>
                                {$nama_jabatan}
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lokasi_kantor"> Lokasi Kantor</label>
                      <div class="col-lg-9"><input type="text" id="lokasi_kantor" name="lokasi_kantor" class="form-control" placeholder="Lokasi Kantor" value="{$d['lokasi_kantor']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="catatan"> Catatan</label>
                      <div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control" placeholder="Catatan" value="{$d['catatan']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lokasi_kerja"> Lokasi Kerja</label>
                      <div class="col-lg-9"><input type="text" id="lokasi_kerja" name="lokasi_kerja" class="form-control" placeholder="Lokasi Kerja" value="{$d['lokasi_kerja']}">
                      </div>
                    </div>
                  </div>
                  <div id="info-gaji">
                    <div class="col-lg-12"><h1 class="text-center">Informasi Gaji</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_npwp"> No NPWP</label>
                      <div class="col-lg-9"><input type="text" id="no_npwp" name="no_npwp" class="form-control" placeholder="No NPWP" value="{$d['no_npwp']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_pendaftaran_npwp"> Tanggal Pendaftaran NPWP</label>
                      <div class="col-lg-9"><input type="date" id="tgl_pendaftaran_npwp" name="tgl_pendaftaran_npwp" class="form-control" placeholder="Tanggal Pendaftaran NPWP" value="{$d['tgl_pendaftaran_npwp']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lewati_gaji_pokok"> Lewati Gaji Pokok</label>
                      <div class="col-lg-9"><input type="checkbox" id="lewati_gaji_pokok" name="lewati_gaji_pokok" {if $d['lewati_gaji_pokok'] == "Lewati"}checked{/if}>
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="gaji_pokok"><span style="color: red;">*</span> Gaji Pokok</label>
                      <div class="col-lg-9"><input type="text" id="gaji_pokok" name="gaji_pokok" class="form-control" placeholder="Gaji Pokok" value="{$d['gaji_pokok']}">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="mata_uang"><span style="color: red;">*</span> Mata Uang</label>
                      <div class="col-lg-9"><input type="text" id="mata_uang" name="mata_uang" class="form-control" placeholder="Mata Uang" value="{$d['mata_uang']}">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="per"> Per</label>
                      <div class="col-lg-9"><input type="text" id="per" name="per" class="form-control" placeholder="Per" value="{$d['per']}">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="satuan_gaji_pokok"><span style="color: red;">*</span> Satuan Gaji Pokok</label>
                      <div class="col-lg-9"><select class="form-control" id="satuan_gaji_pokok" name="satuan_gaji_pokok" value="{$d['satuan_gaji_pokok']}">
                      <option value="Minggu">Minggu</option>
                      <option value="Bulan" selected>Bulan</option>
                      <option value="Tahun">Tahun</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="kode_ptkp"><span style="color: red;">*</span> Kode PTKP</label>
                      <div class="col-lg-9"><select class="form-control" id="kode_ptkp" name="kode_ptkp" style="width: 100%">
                      <option value="TK/0" {if $d['kode_ptkp'] == "TK/0"}selected{/if}>TK/0</option>
                      <option value="TK/1" {if $d['kode_ptkp'] == "TK/1"}selected{/if}>TK/1</option>
                      <option value="TK/2" {if $d['kode_ptkp'] == "TK/2"}selected{/if}>TK/2</option>
                      <option value="TK/3" {if $d['kode_ptkp'] == "TK/3"}selected{/if}>TK/3</option>
                      <option value="K/0" {if $d['kode_ptkp'] == "K/0"}selected{/if}>K/0</option>
                      <option value="K/1" {if $d['kode_ptkp'] == "K/1"}selected{/if}>K/1</option>
                      <option value="K/2" {if $d['kode_ptkp'] == "K/2"}selected{/if}>K/2</option>
                      <option value="K/3" {if $d['kode_ptkp'] == "K/3"}selected{/if}>K/3</option>
                      <option value="K/I/0" {if $d['kode_ptkp'] == "K/I/0"}selected{/if}>K/I/0</option>
                      <option value="K/I/1" {if $d['kode_ptkp'] == "K/I/1"}selected{/if}>K/I/1</option>
                      <option value="K/I/2" {if $d['kode_ptkp'] == "K/I/2"}selected{/if}>K/I/2</option>
                      <option value="K/I/3" {if $d['kode_ptkp'] == "K/I/3"}selected{/if}>K/I/3</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="proses_metode"><span style="color: red;">*</span> Proses Metode</label>
                      <div class="col-lg-9"><input type="text" id="proses_metode" name="proses_metode" class="form-control" placeholder="Proses Metode" value="{$d['proses_metode']}">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="frekuensi_pembayaran"><span style="color: red;">*</span> Frekuensi Pembayaran</label>
                      <div class="col-lg-9"><input type="text" id="frekuensi_pembayaran" name="frekuensi_pembayaran" class="form-control" placeholder="Frekuensi Pembayaran" value="{$d['frekuensi_pembayaran']}">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="templat_upah"><span style="color: red;">*</span> Templat Upah</label>
                      <div class="col-lg-9"><input type="text" id="templat_upah" name="templat_upah" class="form-control" placeholder="Templat Upah" value="{$d['templat_upah']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ketergantungan_gaji_diperbolehkan"> Ketergantungan Gaji Diperbolehkan</label>
                      <div class="col-lg-9"><input type="checkbox" id="ketergantungan_gaji_diperbolehkan" name="ketergantungan_gaji_diperbolehkan" {if $d['ketergantungan_gaji_diperbolehkan'] == "Diperbolehkan"}checked{/if}>
                      </div>
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="tgl_dibuat"> Tanggal dibuat</label>
                      <div class="col-lg-9"><input type="text" id="tgl_dibuat" name="tgl_dibuat" class="form-control" placeholder="Tanggal dibuat" disabled value="{$d['tgl_dibuat']}">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="dibuat_oleh"> Dibuat oleh</label>
                      <div class="col-lg-9"><input type="text" id="dibuat_oleh" name="dibuat_oleh" class="form-control" placeholder="Dibuat oleh" disabled value="{$d['dibuat_oleh']}">
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