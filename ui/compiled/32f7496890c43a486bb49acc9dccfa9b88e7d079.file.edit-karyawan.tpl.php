<?php /* Smarty version Smarty-3.1.13, created on 2024-06-13 15:36:38
         compiled from "ui\theme\softhash\prog\HRD\edit-karyawan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:318302173666aaa895f7ea8-56739659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32f7496890c43a486bb49acc9dccfa9b88e7d079' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\edit-karyawan.tpl',
      1 => 1718267524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318302173666aaa895f7ea8-56739659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_666aaa896846d9_76611447',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'departemen' => 0,
    'id_supervisor' => 0,
    'nama_supervisor' => 0,
    'kode_organisasi' => 0,
    'nama_organisasi' => 0,
    'id_jabatan' => 0,
    'nama_jabatan' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_666aaa896846d9_76611447')) {function content_666aaa896846d9_76611447($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
karyawan/list/" class="btn btn-primary btn-xs">Daftar Karyawan</a>
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
                    <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="col-lg-12"><h1 class="text-center">Karyawan Baru</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="id_karyawan"> Id Karyawan</label>
                        <div class="col-lg-9"><input type="text" id="id_karyawan" name="id_karyawan" class="form-control" placeholder="Id Karyawan" disabled value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_karyawan'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_karyawan"> Nama Karyawan</label>
                        <div class="col-lg-9"><input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" disabled value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_karyawan'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_depan"><span style="color: red;">*</span> Nama Depan</label>
                        <div class="col-lg-9"><input type="text" id="nama_depan" name="nama_depan" class="form-control" placeholder="Nama Depan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_depan'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_tengah"> Nama Tengah</label>
                      <div class="col-lg-9"><input type="text" id="nama_tengah" name="nama_tengah" class="form-control" placeholder="Nama Tengah" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_tengah'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_belakang"> Nama Belakang</label>
                      <div class="col-lg-9"><input type="text" id="nama_belakang" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_belakang'];?>
">
                      </div>
                    </div>
                  </div>
                  <div id="info-personal">
                    <div class="col-lg-12"><h1 class="text-center">Informasi Personal</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="id_pengguna"> Id Pengguna</label>
                      <div class="col-lg-9"><input type="text" id="id_pengguna" name="id_pengguna" class="form-control" placeholder="Id Pengguna" disabled value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_pengguna'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label">Gambar</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['gambar']!=''){?>
                            <a href="uploads/KARYAWAN/<?php echo $_smarty_tpl->tpl_vars['d']->value['gambar'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="gambar">Ganti Gambar</label>
                        <div class="col-lg-3"><input type="file" id="gambar" name="gambar" class="files">
                            <input type="text" id="sgambar" name="sgambar" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_ktp"><span style="color: red;">*</span> No KTP</label>
                      <div class="col-lg-9"><input type="number" id="no_ktp" name="no_ktp" class="form-control" placeholder="No KTP" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_ktp'];?>
">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="departemen"><span style="color: red;">*</span> Departemen</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="departemen" name="departemen" style="width: 100%">
                                <?php echo $_smarty_tpl->tpl_vars['departemen']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tempat_lahir"><span style="color: red;">*</span> Tempat Lahir</label>
                      <div class="col-lg-9"><input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tempat_lahir'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_lahir"><span style="color: red;">*</span> Tanggal Lahir</label>
                      <div class="col-lg-9"><input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_lahir'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="jenis_kelamin"><span style="color: red;">*</span> Jenis Kelamin</label>
                        <div class="col-lg-9"><select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['jenis_kelamin'];?>
">
                        <option value="Laki-laki" <?php if ($_smarty_tpl->tpl_vars['d']->value['jenis_kelamin']=="Laki-laki"){?>selected<?php }?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($_smarty_tpl->tpl_vars['d']->value['jenis_kelamin']=="Perempuan"){?>selected<?php }?>>Perempuan</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="status_pernikahan"><span style="color: red;">*</span> Status Pernikahan</label>
                      <div class="col-lg-9"><select class="form-control" id="status_pernikahan" name="status_pernikahan">
                      <option value="Lajang" <?php if ($_smarty_tpl->tpl_vars['d']->value['status_pernikahan']=="Lajang"){?>selected<?php }?>>Lajang</option>
                      <option value="Menikah" <?php if ($_smarty_tpl->tpl_vars['d']->value['status_pernikahan']=="Menikah"){?>selected<?php }?>>Menikah</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="agama"><span style="color: red;">*</span> Agama</label>
                      <div class="col-lg-9"><select class="form-control" id="agama" name="agama">
                      <option value="Islam" <?php if ($_smarty_tpl->tpl_vars['d']->value['agama']=="Islam"){?>selected<?php }?>>Islam</option>
                      <option value="Kristen Protestan" <?php if ($_smarty_tpl->tpl_vars['d']->value['agama']=="Kristen Protestan"){?>selected<?php }?>>Kristen Protestan</option>
                      <option value="Katolik" <?php if ($_smarty_tpl->tpl_vars['d']->value['agama']=="Katolik"){?>selected<?php }?>>Katolik</option>
                      <option value="Buddha" <?php if ($_smarty_tpl->tpl_vars['d']->value['agama']=="Buddha"){?>selected<?php }?>>Buddha</option>
                      <option value="Hindu" <?php if ($_smarty_tpl->tpl_vars['d']->value['agama']=="Hindu"){?>selected<?php }?>>Hindu</option>
                      <option value="Khonghucu" <?php if ($_smarty_tpl->tpl_vars['d']->value['agama']=="Khonghucu"){?>selected<?php }?>>Khonghucu</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="golongan_darah"> Golongan Darah</label>
                      <div class="col-lg-9"><input type="text" id="golongan_darah" name="golongan_darah" class="form-control" placeholder="Golongan Darah" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['golongan_darah'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kewarganegaraan"> Kewarganegaraan</label>
                      <div class="col-lg-9"><input type="text" id="kewarganegaraan" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kewarganegaraan'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_telepon"> No Telepon</label>
                      <div class="col-lg-9"><input type="text" id="no_telepon" name="no_telepon" class="form-control" placeholder="No Telepon" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_telepon'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="email"> Email</label>
                      <div class="col-lg-9"><input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_asuransi"> No Asuransi</label>
                      <div class="col-lg-9"><input type="number" id="no_asuransi" name="no_asuransi" class="form-control" placeholder="No Asuransi" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_asuransi'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_masuk_asuransi"> Tanggal Masuk Asuransi</label>
                      <div class="col-lg-9"><input type="date" id="tgl_masuk_asuransi" name="tgl_masuk_asuransi" class="form-control" placeholder="Tanggal Masuk Asuransi" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_masuk_asuransi'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_bpjs_kesehatan"> No BPJS Kesehatan</label>
                      <div class="col-lg-9"><input type="number" id="no_bpjs_kesehatan" name="no_bpjs_kesehatan" class="form-control" placeholder="No BPJS Kesehatan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_bpjs_kesehatan'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_masuk_bpjs_kesehatan"> Tanggal Masuk BPJS Kesehatan</label>
                      <div class="col-lg-9"><input type="date" id="tgl_masuk_bpjs_kesehatan" name="tgl_masuk_bpjs_kesehatan" class="form-control" placeholder="Tanggal Masuk BPJS Kesehatan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_masuk_bpjs_kesehatan'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_faskes"> Kode Faskes</label>
                      <div class="col-lg-9"><input type="text" id="kode_faskes" name="kode_faskes" class="form-control" placeholder="Kode Faskes" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_faskes'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_faskes"> Nama Faskes</label>
                      <div class="col-lg-9"><input type="text" id="nama_faskes" name="nama_faskes" class="form-control" placeholder="Nama Faskes" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_faskes'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kelas_rawat"> Kelas Rawat</label>
                      <div class="col-lg-9"><input type="text" id="kelas_rawat" name="kelas_rawat" class="form-control" placeholder="Kelas Rawat" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kelas_rawat'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_tk"> Kode TK</label>
                      <div class="col-lg-9"><input type="text" id="kode_tk" name="kode_tk" class="form-control" placeholder="Kode TK" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_tk'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kesediaan_bepergian"> Kesediaan bepergian</label>
                      <div class="col-lg-9"><input type="checkbox" id="kesediaan_bepergian" name="kesediaan_bepergian" <?php if ($_smarty_tpl->tpl_vars['d']->value['kesediaan_bepergian']=="Bersedia"){?>checked<?php }?>>
                      </div>
                    </div>
                  </div>
                  <div id="info-pekerjaan">
                    <div class="col-lg-12"><h1 class="text-center">Informasi Pekerjaan</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_perusahaan_supervisor"> Kode Perusahaan Supervisor</label>
                      <div class="col-lg-9"><input type="text" id="kode_perusahaan_supervisor" name="kode_perusahaan_supervisor" class="form-control" placeholder="Kode Perusahaan Supervisor" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_perusahaan_supervisor'];?>
">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="id_supervisor"> Id Supervisor</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="id_supervisor" name="id_supervisor" style="width: 100%">
                                <?php echo $_smarty_tpl->tpl_vars['id_supervisor']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="nama_supervisor"> Nama Supervisor</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="nama_supervisor" name="nama_supervisor" style="width: 100%" disabled>
                                <?php echo $_smarty_tpl->tpl_vars['nama_supervisor']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kategori_karyawan"> Kategori Karyawan</label>
                      <div class="col-lg-9"><select class="form-control" id="kategori_karyawan" name="kategori_karyawan">
                      <option value="">--- Pilih Kategori ---</option>
                      <option value="Kategori 1" <?php if ($_smarty_tpl->tpl_vars['d']->value['kategori_karyawan']=="Kategori 1"){?>selected<?php }?>>Kategori 1</option>
                      <option value="Kategori 2" <?php if ($_smarty_tpl->tpl_vars['d']->value['kategori_karyawan']=="Kategori 2"){?>selected<?php }?>>Kategori 2</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="status_karyawan"><span style="color: red;">*</span> Status Karyawan</label>
                      <div class="col-lg-9"><select class="form-control" id="status_karyawan" name="status_karyawan">
                      <option value="Aktif" <?php if ($_smarty_tpl->tpl_vars['d']->value['status_karyawan']=="Aktif"){?>selected<?php }?>>Aktif</option>
                      <option value="Tidak Aktif" <?php if ($_smarty_tpl->tpl_vars['d']->value['status_karyawan']=="Tidak Aktif"){?>selected<?php }?>>Tidak Aktif</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="masa_percobaan"> Masa Percobaan (Bulan)</label>
                      <div class="col-lg-9"><input type="number" id="masa_percobaan" name="masa_percobaan" class="form-control" placeholder="Percobaan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['masa_percobaan'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe_karyawan"><span style="color: red;">*</span> Tipe Karyawan</label>
                      <div class="col-lg-9"><select class="form-control" id="tipe_karyawan" name="tipe_karyawan">
                        <option value="Permanen" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe_karyawan']=="Permanen"){?>selected<?php }?>>Permanen</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tipe_remunerasi"><span style="color: red;">*</span> Tipe Remunerasi</label>
                      <div class="col-lg-9"><select class="form-control" id="tipe_remunerasi" name="tipe_remunerasi">
                      <option value="Mingguan" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe_remunerasi']=="Mingguan"){?>selected<?php }?>>Mingguan</option>
                      <option value="Bulanan" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe_remunerasi']=="Bulanan"){?>selected<?php }?>>Bulanan</option>
                      <option value="Tahunan" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe_remunerasi']=="Tahunan"){?>selected<?php }?>>Tahunan</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_kartu_absen"> No Kartu Absen</label>
                      <div class="col-lg-9"><input type="number" id="no_kartu_absen" name="no_kartu_absen" class="form-control" placeholder="No Kartu Absen" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_kartu_absen'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_bergabung"><span style="color: red;">*</span> Tanggal bergabung</label>
                      <div class="col-lg-9"><input type="date" id="tgl_bergabung" name="tgl_bergabung" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_bergabung'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nilai"> Nilai</label>
                      <div class="col-lg-9"><input type="text" id="nilai" name="nilai" class="form-control" placeholder="Nilai" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nilai'];?>
">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="kode_organisasi"> Kode Organisasi</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="kode_organisasi" name="kode_organisasi" style="width: 100%">
                                <?php echo $_smarty_tpl->tpl_vars['kode_organisasi']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="nama_organisasi"> Nama Organisasi</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="nama_organisasi" name="nama_organisasi" style="width: 100%" disabled>
                                <?php echo $_smarty_tpl->tpl_vars['nama_organisasi']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="id_jabatan"> Id Jabatan</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="id_jabatan" name="id_jabatan" style="width: 100%">
                                <?php echo $_smarty_tpl->tpl_vars['id_jabatan']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="nama_jabatan"> Nama Jabatan</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="nama_jabatan" name="nama_jabatan" disabled>
                                <?php echo $_smarty_tpl->tpl_vars['nama_jabatan']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lokasi_kantor"> Lokasi Kantor</label>
                      <div class="col-lg-9"><input type="text" id="lokasi_kantor" name="lokasi_kantor" class="form-control" placeholder="Lokasi Kantor" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi_kantor'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="catatan"> Catatan</label>
                      <div class="col-lg-9"><input type="text" id="catatan" name="catatan" class="form-control" placeholder="Catatan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['catatan'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lokasi_kerja"> Lokasi Kerja</label>
                      <div class="col-lg-9"><input type="text" id="lokasi_kerja" name="lokasi_kerja" class="form-control" placeholder="Lokasi Kerja" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi_kerja'];?>
">
                      </div>
                    </div>
                  </div>
                  <div id="info-gaji">
                    <div class="col-lg-12"><h1 class="text-center">Informasi Gaji</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_npwp"> No NPWP</label>
                      <div class="col-lg-9"><input type="text" id="no_npwp" name="no_npwp" class="form-control" placeholder="No NPWP" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_npwp'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_pendaftaran_npwp"> Tanggal Pendaftaran NPWP</label>
                      <div class="col-lg-9"><input type="date" id="tgl_pendaftaran_npwp" name="tgl_pendaftaran_npwp" class="form-control" placeholder="Tanggal Pendaftaran NPWP" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_pendaftaran_npwp'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lewati_gaji_pokok"> Lewati Gaji Pokok</label>
                      <div class="col-lg-9"><input type="checkbox" id="lewati_gaji_pokok" name="lewati_gaji_pokok" <?php if ($_smarty_tpl->tpl_vars['d']->value['lewati_gaji_pokok']=="Lewati"){?>checked<?php }?>>
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="gaji_pokok"><span style="color: red;">*</span> Gaji Pokok</label>
                      <div class="col-lg-9"><input type="text" id="gaji_pokok" name="gaji_pokok" class="form-control" placeholder="Gaji Pokok" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['gaji_pokok'];?>
">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="mata_uang"><span style="color: red;">*</span> Mata Uang</label>
                      <div class="col-lg-9"><input type="text" id="mata_uang" name="mata_uang" class="form-control" placeholder="Mata Uang" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['mata_uang'];?>
">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="per"> Per</label>
                      <div class="col-lg-9"><input type="text" id="per" name="per" class="form-control" placeholder="Per" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['per'];?>
">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="satuan_gaji_pokok"><span style="color: red;">*</span> Satuan Gaji Pokok</label>
                      <div class="col-lg-9"><select class="form-control" id="satuan_gaji_pokok" name="satuan_gaji_pokok" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['satuan_gaji_pokok'];?>
">
                      <option value="Minggu">Minggu</option>
                      <option value="Bulan" selected>Bulan</option>
                      <option value="Tahun">Tahun</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="kode_ptkp"><span style="color: red;">*</span> Kode PTKP</label>
                      <div class="col-lg-9"><select class="form-control" id="kode_ptkp" name="kode_ptkp" style="width: 100%">
                      <option value="TK/0" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="TK/0"){?>selected<?php }?>>TK/0</option>
                      <option value="TK/1" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="TK/1"){?>selected<?php }?>>TK/1</option>
                      <option value="TK/2" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="TK/2"){?>selected<?php }?>>TK/2</option>
                      <option value="TK/3" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="TK/3"){?>selected<?php }?>>TK/3</option>
                      <option value="K/0" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/0"){?>selected<?php }?>>K/0</option>
                      <option value="K/1" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/1"){?>selected<?php }?>>K/1</option>
                      <option value="K/2" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/2"){?>selected<?php }?>>K/2</option>
                      <option value="K/3" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/3"){?>selected<?php }?>>K/3</option>
                      <option value="K/I/0" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/I/0"){?>selected<?php }?>>K/I/0</option>
                      <option value="K/I/1" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/I/1"){?>selected<?php }?>>K/I/1</option>
                      <option value="K/I/2" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/I/2"){?>selected<?php }?>>K/I/2</option>
                      <option value="K/I/3" <?php if ($_smarty_tpl->tpl_vars['d']->value['kode_ptkp']=="K/I/3"){?>selected<?php }?>>K/I/3</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="proses_metode"><span style="color: red;">*</span> Proses Metode</label>
                      <div class="col-lg-9"><input type="text" id="proses_metode" name="proses_metode" class="form-control" placeholder="Proses Metode" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['proses_metode'];?>
">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="frekuensi_pembayaran"><span style="color: red;">*</span> Frekuensi Pembayaran</label>
                      <div class="col-lg-9"><input type="text" id="frekuensi_pembayaran" name="frekuensi_pembayaran" class="form-control" placeholder="Frekuensi Pembayaran" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['frekuensi_pembayaran'];?>
">
                      </div>
                    </div>
                    <div class="form-group gaji-pokok"><label class="col-lg-3 control-label" for="templat_upah"><span style="color: red;">*</span> Templat Upah</label>
                      <div class="col-lg-9"><input type="text" id="templat_upah" name="templat_upah" class="form-control" placeholder="Templat Upah" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['templat_upah'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ketergantungan_gaji_diperbolehkan"> Ketergantungan Gaji Diperbolehkan</label>
                      <div class="col-lg-9"><input type="checkbox" id="ketergantungan_gaji_diperbolehkan" name="ketergantungan_gaji_diperbolehkan" <?php if ($_smarty_tpl->tpl_vars['d']->value['ketergantungan_gaji_diperbolehkan']=="Diperbolehkan"){?>checked<?php }?>>
                      </div>
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="tgl_dibuat"> Tanggal dibuat</label>
                      <div class="col-lg-9"><input type="text" id="tgl_dibuat" name="tgl_dibuat" class="form-control" placeholder="Tanggal dibuat" disabled value="<?php echo $_smarty_tpl->tpl_vars['d']->value['tgl_dibuat'];?>
">
                      </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="dibuat_oleh"> Dibuat oleh</label>
                      <div class="col-lg-9"><input type="text" id="dibuat_oleh" name="dibuat_oleh" class="form-control" placeholder="Dibuat oleh" disabled value="<?php echo $_smarty_tpl->tpl_vars['d']->value['dibuat_oleh'];?>
">
                      </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                      <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>