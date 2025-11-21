<?php
// ***************************************************************************
// **                                                                       **
// ** Email : fortunate@fortunateshop.com                                   **
// ** Website : www.fortunateshop.com                                       **
// ** Copyright (c) Taniwan. All Rights Reserved                            **
// **                                                                       **
// ***************************************************************************
// **                                                                       **
// ** This software is furnished under a license and may be used and copied **
// ** only  in  accordance  with  the  terms  of such  license and with the **
// ** inclusion of the above copyright notice.                              **
// **                                                                       **
// ***************************************************************************

if(!isset($myCtrl)){
    $myCtrl = 'karyawan';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'listkaryawan');
$ui->assign('_title', 'Daftar Karyawan - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Karyawan');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

switch ($action) {
    case 'add':
        Event::trigger('karyawan/add/');
		_auth1('KARYAWAN-ADD',$user['id']);

        $departemen = '';
        $tg = ORM::for_table('daftar_departemen')->order_by_asc('dep_id')->find_many();
        foreach ($tg as $r) {
            $departemen .= '<option value="'.$r['dep_id'].'">'.$r['dep_id'].' - '.$r['dep_name'].'</option>';
        }

        $id_supervisor = '<option value="" id="id-sup-none" selected>--- Pilih Supervisor ---</option>';
        $nama_supervisor = '<option value="" id="nama-sup-none" selected>Nama Supervisor</option>';
        $eg = ORM::for_table('daftar_karyawan')->order_by_asc('nama_karyawan')->find_many();
        foreach($eg as $e) {
            $id_supervisor .= '<option value="'.$e['id_karyawan'].'" id="id-sup-'.$e['id'].'">'.$e['id_karyawan'].'</option>';
            $nama_supervisor .= '<option value="'.$e['nama_karyawan'].'" id="nama-sup-'.$e['id'].'">'.$e['nama_karyawan'].'</option>';
        }

        $kode_organisasi = '<option value="" id="id-org-none" selected>--- Pilih Organisasi ---</option>';
        $nama_organisasi = '<option value="" id="nama-org-none" selected>Nama Organisasi</option>';
        $og = ORM::for_table('struktur_organisasi')->order_by_asc('nama_internal')->find_many();
        foreach($og as $o) {
            $kode_organisasi .= '<option value="'.$o['id_posisi'].'" id="id-org-'.$o['id'].'">'.$o['id_posisi'].'</option>';
            $nama_organisasi .= '<option value="'.$o['nama_internal'].'" id="nama-org-'.$o['id'].'">'.$o['nama_internal'].'</option>';
        }

        $id_jabatan = '<option value="" id="id-jab-none" selected>--- Pilih Jabatan ---</option>';
        $nama_jabatan = '<option value="" id="nama-jab-none" selected>Nama Jabatan</option>';
        $yg = ORM::for_table('daftar_jabatan')->order_by_asc('id_jabatan')->find_many();
        foreach ($yg as $j) {
            $id_jabatan .= '<option value="'.$j['id_jabatan'].'" id="id-jab-'.$j['id'].'">'.$j['id_jabatan'].'</option>';
            $nama_jabatan .= '<option value="'.$j['nama_jabatan'].'" id="nama-jab-'.$j['id'].'">'.$j['nama_jabatan'].'</option>';
        }

        $ui->assign('departemen', $departemen);
        $ui->assign('id_supervisor', $id_supervisor);
        $ui->assign('nama_supervisor', $nama_supervisor);
        $ui->assign('kode_organisasi', $kode_organisasi);
        $ui->assign('nama_organisasi', $nama_organisasi);
        $ui->assign('id_jabatan', $id_jabatan);
        $ui->assign('nama_jabatan', $nama_jabatan);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top','nav-bar/style', 'number/spin-box')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-karyawan','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-karyawan.tpl');
        break;

    case 'add-post':
        Event::trigger('karyawan/add-post/');

        $nama_depan = _post('nama_depan');
        $nama_tengah = _post('nama_tengah');
        $nama_belakang = _post('nama_belakang');
        $gambar = _post('sgambar');
        $no_ktp = _post('no_ktp');
        $departemen = _post('departemen');
        $tempat_lahir = _post('tempat_lahir');
        $tgl_lahir = _post('tgl_lahir');
        $jenis_kelamin = _post('jenis_kelamin');
        $status_pernikahan = _post('status_pernikahan');
        $agama = _post('agama');
        $golongan_darah = _post('golongan_darah');
        $kewarganegaraan = _post('kewarganegaraan');
        $no_telepon = _post('no_telepon');
        $email = _post('email');
        $no_asuransi = _post('no_asuransi');
        $tgl_masuk_asuransi = _post('tgl_masuk_asuransi');
        $no_bpjs_kesehatan = _post('no_bpjs_kesehatan');
        $tgl_masuk_bpjs_kesehatan = _post('tgl_masuk_bpjs_kesehatan');
        $kode_faskes = _post('kode_faskes');
        $nama_faskes = _post('nama_faskes');
        $kelas_rawat = _post('kelas_rawat');
        $kode_tk = _post('kode_tk');
        $kesediaan_bepergian = _post('kesediaan_bepergian') == "on" ? "Bersedia" : "Tidak Bersedia";
        $kode_perusahaan_supervisor = _post('kode_perusahaan_supervisor');
        $id_supervisor = _post('id_supervisor');
        $nama_supervisor = _post('nama_supervisor');
        $kategori_karyawan = _post('kategori_karyawan');
        $status_karyawan = _post('status_karyawan');
        $masa_percobaan = _post('masa_percobaan');
        $tipe_karyawan = _post('tipe_karyawan');
        $tipe_remunerasi = _post('tipe_remunerasi');
        $no_kartu_absen = _post('no_kartu_absen');
        $tgl_bergabung = _post('tgl_bergabung');
        $nilai = _post('nilai');
        $kode_organisasi = _post('kode_organisasi');
        $nama_organisasi = _post('nama_organisasi');
        $id_jabatan = _post('id_jabatan');
        $nama_jabatan = _post('nama_jabatan');
        $lokasi_kantor = _post('lokasi_kantor');
        $catatan = _post('catatan');
        $lokasi_kerja = _post('lokasi_kerja');
        $no_npwp = _post('no_npwp');
        $tgl_pendaftaran_npwp = _post('tgl_pendaftaran_npwp');
        $lewati_gaji_pokok = _post('lewati_gaji_pokok') == "on" ? "Lewati" : "Jangan Lewati";
        $gaji_pokok = _post('gaji_pokok');
        $mata_uang = _post('mata_uang');
        $per = _post('per');
        $satuan_gaji_pokok = _post('satuan_gaji_pokok');
        $proses_metode = _post('proses_metode');
        $frekuensi_pembayaran = _post('frekuensi_pembayaran');
        $templat_upah = _post('templat_upah');
        $ketergantungan_gaji_diperbolehkan = _post('ketergantungan_gaji_diperbolehkan') == "on" ? "Diperbolehkan" : "Tidak Diperbolehkan";

        $msg = '';
        if($nama_depan == ''){
            $msg .= 'Nama Depan tidak boleh kosong. <br>';
        }
        if($no_ktp == ''){
            $msg .= 'No KTP tidak boleh kosong. <br>';
        }
        if($departemen == ''){
            $msg .= 'Departemen tidak boleh kosong. <br>';
        }
        if($tempat_lahir == ''){
            $msg .= 'Tempat Lahir tidak boleh kosong. <br>';
        }
        if(!$tgl_lahir){
            $msg .= 'Tanggal Lahir tidak boleh kosong. <br>';
        }
        if($jenis_kelamin == ''){
            $msg .= 'Jenis Kelamin tidak boleh kosong. <br>';
        }
        if($status_pernikahan == ''){
            $msg .= 'Status Pernikahan tidak boleh kosong. <br>';
        }
        if($agama == ''){
            $msg .= 'Agama tidak boleh kosong. <br>';
        }
        if($status_karyawan == ''){
            $msg .= 'Status Karyawan tidak boleh kosong. <br>';
        }
        if($tipe_remunerasi == ''){
            $msg .= 'Tipe Remunerasi tidak boleh kosong. <br>';
        }
        if(!$tgl_bergabung){
            $msg .= 'Tanggal Bergabung tidak boleh kosong. <br>';
        }
        if($lewati_gaji_pokok == "Jangan Lewati"){
            if($gaji_pokok == '') {
                $msg .= 'Gaji Pokok tidak boleh kosong. <br>';
            }
            if($mata_uang == '') {
                $msg .= 'Mata Uang tidak boleh kosong. <br>';
            }
            if($satuan_gaji_pokok == '') {
                $msg .= 'Satuan Gaji Pokok tidak boleh kosong. <br>';
            }
            if($proses_metode == '') {
                $msg .= 'Proses Metode tidak boleh kosong. <br>';
            }
            if($frekuensi_pembayaran == '') {
                $msg .= 'Frekuensi Pembayaran tidak boleh kosong. <br>';
            }
            if($templat_upah == '') {
                $msg .= 'Templat Upah tidak boleh kosong. <br>';
            }
        }

        $chk = ORM::for_table('daftar_karyawan')->where('no_ktp',$no_ktp)->find_one();
        if($chk){
            $msg .= 'Karyawan tersebut sudah ada <br>';
        }
        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_karyawan')->create();
                $id = ORM::for_table('daftar_karyawan')->order_by_desc('id')->find_one();
                
                if(substr($id['id_karyawan'],2,4) == (string)date("Y")) {
                    $d->id_karyawan = ("0") . (string)($id['id_karyawan'] + 1);
                } else {
                    $d->id_karyawan = "01" . (string)date("Y") . "0001";
                }
                
                $d->nama_karyawan = preg_replace('/\s+/', ' ', trim($nama_depan) . " " . trim($nama_tengah) . " " . trim($nama_belakang));
                $d->nama_depan = preg_replace('/\s+/', ' ', trim($nama_depan));
                $d->nama_tengah = preg_replace('/\s+/', ' ', trim($nama_tengah));
                $d->nama_belakang = preg_replace('/\s+/', ' ', trim($nama_belakang));
                $d->dibuat_oleh = $user['fullname'];
                $d->id_pengguna = $no_ktp;
                $d->gambar = $gambar;
                $d->no_ktp = $no_ktp;
                $d->departemen = $departemen;
                $d->tempat_lahir = $tempat_lahir;
                $d->tgl_lahir = $tgl_lahir;
                $d->jenis_kelamin = $jenis_kelamin;
                $d->status_pernikahan = $status_pernikahan;
                $d->agama = $agama;
                $d->golongan_darah = $golongan_darah;
                $d->kewarganegaraan = $kewarganegaraan;
                $d->no_telepon = $no_telepon;
                $d->email = $email;
                $d->no_asuransi = $no_asuransi;
                $d->tgl_masuk_asuransi = $tgl_masuk_asuransi;
                $d->no_bpjs_kesehatan = $no_bpjs_kesehatan;
                $d->tgl_masuk_bpjs_kesehatan = $tgl_masuk_bpjs_kesehatan;
                $d->kode_faskes = $kode_faskes;
                $d->nama_faskes = $nama_faskes;
                $d->kelas_rawat = $kelas_rawat;
                $d->kode_tk = $kode_tk;
                $d->kesediaan_bepergian = $kesediaan_bepergian;
                $d->kode_perusahaan_supervisor = $kode_perusahaan_supervisor;
                $d->id_supervisor = $id_supervisor;
                $d->nama_supervisor = $nama_supervisor;
                $d->kategori_karyawan = $kategori_karyawan;
                $d->status_karyawan = $status_karyawan;
                $d->masa_percobaan = $masa_percobaan;
                $d->tipe_karyawan = $tipe_karyawan;
                $d->tipe_remunerasi = $tipe_remunerasi;
                $d->no_kartu_absen = $no_kartu_absen;
                $d->tgl_bergabung = $tgl_bergabung;
                $d->nilai = $nilai;
                $d->kode_organisasi = $kode_organisasi;
                $d->nama_organisasi = $nama_organisasi;
                $d->id_jabatan = $id_jabatan;
                $d->nama_jabatan = $nama_jabatan;
                $d->lokasi_kantor = $lokasi_kantor;
                $d->catatan = $catatan;
                $d->lokasi_kerja = $lokasi_kerja;
                $d->no_npwp = $no_npwp;
                $d->tgl_pendaftaran_npwp = $tgl_pendaftaran_npwp;
                $d->lewati_gaji_pokok = $lewati_gaji_pokok;
                if($lewati_gaji_pokok == "Jangan Lewati") {
                    $d->gaji_pokok = $gaji_pokok;
                    $d->mata_uang = $mata_uang;
                    $d->per = $per;
                    $d->satuan_gaji_pokok = $satuan_gaji_pokok;
                    $d->proses_metode = $proses_metode;
                    $d->frekuensi_pembayaran = $frekuensi_pembayaran;
                    $d->templat_upah = $templat_upah;
                }
                $d->ketergantungan_gaji_diperbolehkan = $ketergantungan_gaji_diperbolehkan;

                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Karyawan : '.$person_id.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('karyawan/add-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            echo $msg;
        }
        break;

    case 'list':
        Event::trigger('karyawan/list/');
		_auth1('KARYAWAN-LIST',$user['id']);
        $msg = $routes['3'];
        $d = ORM::for_table('daftar_karyawan')->find_many();
        $ui->assign('d',$d);
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-karyawan','dp/dist/datepicker.min','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-karyawan.tpl');
        break;

    case 'edit':
        Event::trigger('karyawan/edit/');

		_auth1('KARYAWAN-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_karyawan')->find_one($cid);
        
        if($d){
            $departemen = '';
            $tg = ORM::for_table('daftar_departemen')->order_by_asc('dep_id')->find_many();
            foreach ($tg as $r) {
                if($d['departemen'] == $r['dep_id']) {
                    $departemen .= '<option value="'.$r['dep_id'].'" selected>'.$r['dep_id'].' - '.$r['dep_name'].'</option>';
                } else {
                    $departemen .= '<option value="'.$r['dep_id'].'">'.$r['dep_id'].' - '.$r['dep_name'].'</option>';
                }
            }
        
            $id_supervisor = '<option value="" id="id-sup-none">--- Pilih Supervisor ---</option>';
            $nama_supervisor = '<option value="" id="nama-sup-none">Nama Supervisor</option>';
            $eg = ORM::for_table('daftar_karyawan')->order_by_asc('nama_karyawan')->find_many();
            foreach($eg as $e) {
                if($d['id'] != $e['id'] && $d['id_karyawan'] != $e['id_supervisor']) {
                    if($d['id_supervisor'] == $e['id_karyawan']) {
                        $id_supervisor .= '<option value="'.$e['id_karyawan'].'" id="id-sup-'.$e['id'].'" selected>'.$e['id_karyawan'].'</option>';
                        $nama_supervisor .= '<option value="'.$e['nama_karyawan'].'" id="nama-sup-'.$e['id'].'" selected>'.$e['nama_karyawan'].'</option>';
                    } else {
                        $id_supervisor .= '<option value="'.$e['id_karyawan'].'" id="id-sup-'.$e['id'].'">'.$e['id_karyawan'].'</option>';
                        $nama_supervisor .= '<option value="'.$e['nama_karyawan'].'" id="nama-sup-'.$e['id'].'">'.$e['nama_karyawan'].'</option>';
                    }
                }
            }
        
            $kode_organisasi = '<option value="" id="id-org-none">--- Pilih Organisasi ---</option>';
            $nama_organisasi = '<option value="" id="nama-org-none">Nama Organisasi</option>';
            $og = ORM::for_table('struktur_organisasi')->order_by_asc('nama_internal')->find_many();
            foreach($og as $o) {
                if($d['kode_organisasi'] == $o['id_posisi']) {
                    $kode_organisasi .= '<option value="'.$o['id_posisi'].'" id="id-org-'.$o['id'].'" selected>'.$o['id_posisi'].'</option>';
                    $nama_organisasi .= '<option value="'.$o['nama_internal'].'" id="nama-org-'.$o['id'].'" selected>'.$o['nama_internal'].'</option>';
                } else {
                    $kode_organisasi .= '<option value="'.$o['id_posisi'].'" id="id-org-'.$o['id'].'">'.$o['id_posisi'].'</option>';
                    $nama_organisasi .= '<option value="'.$o['nama_internal'].'" id="nama-org-'.$o['id'].'">'.$o['nama_internal'].'</option>';
                }
            }
        
            $id_jabatan = '<option value="" id="id-jab-none">--- Pilih Jabatan ---</option>';
            $nama_jabatan = '<option value="" id="nama-jab-none">Nama Jabatan</option>';
            $yg = ORM::for_table('daftar_jabatan')->order_by_asc('id_jabatan')->find_many();
            foreach ($yg as $j) {
                if($d['id_jabatan'] == $j['id_jabatan']) {
                    $id_jabatan .= '<option value="'.$j['id_jabatan'].'" id="id-jab-'.$j['id'].'" selected>'.$j['id_jabatan'].'</option>';
                    $nama_jabatan .= '<option value="'.$j['nama_jabatan'].'" id="nama-jab-'.$j['id'].'" selected>'.$j['nama_jabatan'].'</option>';
                } else {
                    $id_jabatan .= '<option value="'.$j['id_jabatan'].'" id="id-jab-'.$j['id'].'">'.$j['id_jabatan'].'</option>';
                    $nama_jabatan .= '<option value="'.$j['nama_jabatan'].'" id="nama-jab-'.$j['id'].'">'.$j['nama_jabatan'].'</option>';
                }
            }

            $ui->assign('departemen', $departemen);
            $ui->assign('id_supervisor', $id_supervisor);
            $ui->assign('nama_supervisor', $nama_supervisor);
            $ui->assign('kode_organisasi', $kode_organisasi);
            $ui->assign('nama_organisasi', $nama_organisasi);
            $ui->assign('id_jabatan', $id_jabatan);
            $ui->assign('nama_jabatan', $nama_jabatan);
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','nav-bar/style')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-karyawan','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-karyawan.tpl');
        }
        break;

    case 'edit-post':
        Event::trigger('karyawan/edit-post/');
        $id = _post('cid');
        $nama_depan = _post('nama_depan');
        $nama_tengah = _post('nama_tengah');
        $nama_belakang = _post('nama_belakang');
        $gambar = _post('sgambar');
        $no_ktp = _post('no_ktp');
        $departemen = _post('departemen');
        $tempat_lahir = _post('tempat_lahir');
        $tgl_lahir = _post('tgl_lahir');
        $jenis_kelamin = _post('jenis_kelamin');
        $status_pernikahan = _post('status_pernikahan');
        $agama = _post('agama');
        $golongan_darah = _post('golongan_darah');
        $kewarganegaraan = _post('kewarganegaraan');
        $no_telepon = _post('no_telepon');
        $email = _post('email');
        $no_asuransi = _post('no_asuransi');
        $tgl_masuk_asuransi = _post('tgl_masuk_asuransi');
        $no_bpjs_kesehatan = _post('no_bpjs_kesehatan');
        $tgl_masuk_bpjs_kesehatan = _post('tgl_masuk_bpjs_kesehatan');
        $kode_faskes = _post('kode_faskes');
        $nama_faskes = _post('nama_faskes');
        $kelas_rawat = _post('kelas_rawat');
        $kode_tk = _post('kode_tk');
        $kesediaan_bepergian = _post('kesediaan_bepergian') == "on" ? "Bersedia" : "Tidak Bersedia";
        $kode_perusahaan_supervisor = _post('kode_perusahaan_supervisor');
        $id_supervisor = _post('id_supervisor');
        $nama_supervisor = _post('nama_supervisor');
        $kategori_karyawan = _post('kategori_karyawan');
        $status_karyawan = _post('status_karyawan');
        $masa_percobaan = _post('masa_percobaan');
        $tipe_karyawan = _post('tipe_karyawan');
        $tipe_remunerasi = _post('tipe_remunerasi');
        $no_kartu_absen = _post('no_kartu_absen');
        $tgl_bergabung = _post('tgl_bergabung');
        $nilai = _post('nilai');
        $kode_organisasi = _post('kode_organisasi');
        $nama_organisasi = _post('nama_organisasi');
        $id_jabatan = _post('id_jabatan');
        $nama_jabatan = _post('nama_jabatan');
        $lokasi_kantor = _post('lokasi_kantor');
        $catatan = _post('catatan');
        $lokasi_kerja = _post('lokasi_kerja');
        $no_npwp = _post('no_npwp');
        $tgl_pendaftaran_npwp = _post('tgl_pendaftaran_npwp');
        $lewati_gaji_pokok = _post('lewati_gaji_pokok') == "on" ? "Lewati" : "Jangan Lewati";
        $gaji_pokok = _post('gaji_pokok');
        $mata_uang = _post('mata_uang');
        $per = _post('per');
        $satuan_gaji_pokok = _post('satuan_gaji_pokok');
        $proses_metode = _post('proses_metode');
        $frekuensi_pembayaran = _post('frekuensi_pembayaran');
        $templat_upah = _post('templat_upah');
        $ketergantungan_gaji_diperbolehkan = _post('ketergantungan_gaji_diperbolehkan') == "on" ? "Diperbolehkan" : "Tidak Diperbolehkan";

        $msg = '';
        if($nama_depan == ''){
            $msg .= 'Nama Depan tidak boleh kosong. <br>';
        }
        if($no_ktp == ''){
            $msg .= 'No KTP tidak boleh kosong. <br>';
        }
        if($departemen == ''){
            $msg .= 'Departemen tidak boleh kosong. <br>';
        }
        if($tempat_lahir == ''){
            $msg .= 'Tempat Lahir tidak boleh kosong. <br>';
        }
        if(!$tgl_lahir){
            $msg .= 'Tanggal Lahir tidak boleh kosong. <br>';
        }
        if($jenis_kelamin == ''){
            $msg .= 'Jenis Kelamin tidak boleh kosong. <br>';
        }
        if($status_pernikahan == ''){
            $msg .= 'Status Pernikahan tidak boleh kosong. <br>';
        }
        if($agama == ''){
            $msg .= 'Agama tidak boleh kosong. <br>';
        }
        if($status_karyawan == ''){
            $msg .= 'Status Karyawan tidak boleh kosong. <br>';
        }
        if($tipe_remunerasi == ''){
            $msg .= 'Tipe Remunerasi tidak boleh kosong. <br>';
        }
        if(!$tgl_bergabung){
            $msg .= 'Tanggal Bergabung tidak boleh kosong. <br>';
        }
        if($lewati_gaji_pokok == "Jangan Lewati"){
            if($gaji_pokok == '') {
                $msg .= 'Gaji Pokok tidak boleh kosong. <br>';
            }
            if($mata_uang == '') {
                $msg .= 'Mata Uang tidak boleh kosong. <br>';
            }
            if($satuan_gaji_pokok == '') {
                $msg .= 'Satuan Gaji Pokok tidak boleh kosong. <br>';
            }
            if($proses_metode == '') {
                $msg .= 'Proses Metode tidak boleh kosong. <br>';
            }
            if($frekuensi_pembayaran == '') {
                $msg .= 'Frekuensi Pembayaran tidak boleh kosong. <br>';
            }
            if($templat_upah == '') {
                $msg .= 'Templat Upah tidak boleh kosong. <br>';
            }
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_karyawan')->find_one($id);

                $d->nama_karyawan = preg_replace('/\s+/', ' ', trim($nama_depan) . " " . trim($nama_tengah) . " " . trim($nama_belakang));
                $d->nama_depan = preg_replace('/\s+/', ' ', trim($nama_depan));
                $d->nama_tengah = preg_replace('/\s+/', ' ', trim($nama_tengah));
                $d->nama_belakang = preg_replace('/\s+/', ' ', trim($nama_belakang));
                $d->id_pengguna = $no_ktp;
                $d->gambar = $gambar;
                $d->no_ktp = $no_ktp;
                $d->departemen = $departemen;
                $d->tempat_lahir = $tempat_lahir;
                $d->tgl_lahir = $tgl_lahir;
                $d->jenis_kelamin = $jenis_kelamin;
                $d->status_pernikahan = $status_pernikahan;
                $d->agama = $agama;
                $d->golongan_darah = $golongan_darah;
                $d->kewarganegaraan = $kewarganegaraan;
                $d->no_telepon = $no_telepon;
                $d->email = $email;
                $d->no_asuransi = $no_asuransi;
                $d->tgl_masuk_asuransi = $tgl_masuk_asuransi;
                $d->no_bpjs_kesehatan = $no_bpjs_kesehatan;
                $d->tgl_masuk_bpjs_kesehatan = $tgl_masuk_bpjs_kesehatan;
                $d->kode_faskes = $kode_faskes;
                $d->nama_faskes = $nama_faskes;
                $d->kelas_rawat = $kelas_rawat;
                $d->kode_tk = $kode_tk;
                $d->kesediaan_bepergian = $kesediaan_bepergian;
                $d->kode_perusahaan_supervisor = $kode_perusahaan_supervisor;
                $d->id_supervisor = $id_supervisor;
                $d->nama_supervisor = $nama_supervisor;
                $d->kategori_karyawan = $kategori_karyawan;
                $d->status_karyawan = $status_karyawan;
                $d->masa_percobaan = $masa_percobaan;
                $d->tipe_karyawan = $tipe_karyawan;
                $d->tipe_remunerasi = $tipe_remunerasi;
                $d->no_kartu_absen = $no_kartu_absen;
                $d->tgl_bergabung = $tgl_bergabung;
                $d->nilai = $nilai;
                $d->kode_organisasi = $kode_organisasi;
                $d->nama_organisasi = $nama_organisasi;
                $d->id_jabatan = $id_jabatan;
                $d->nama_jabatan = $nama_jabatan;
                $d->lokasi_kantor = $lokasi_kantor;
                $d->catatan = $catatan;
                $d->lokasi_kerja = $lokasi_kerja;
                $d->no_npwp = $no_npwp;
                $d->tgl_pendaftaran_npwp = $tgl_pendaftaran_npwp;
                $d->lewati_gaji_pokok = $lewati_gaji_pokok;
                if($lewati_gaji_pokok == "Jangan Lewati") {
                    $d->gaji_pokok = $gaji_pokok;
                    $d->mata_uang = $mata_uang;
                    $d->per = $per;
                    $d->satuan_gaji_pokok = $satuan_gaji_pokok;
                    $d->proses_metode = $proses_metode;
                    $d->frekuensi_pembayaran = $frekuensi_pembayaran;
                    $d->templat_upah = $templat_upah;
                }
                $d->ketergantungan_gaji_diperbolehkan = $ketergantungan_gaji_diperbolehkan;
                $d->save();

                ORM::get_db()->commit();
				_log1('Edit Data Karyawan : '.$emp_id.' [CID: '.$id.']',$user['username'],$user['id']);
                Event::trigger('karyawan/edit-post/_on_finished');
                echo $id;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            echo $msg;
        }
        break;
    
    case 'upload-file':
        if(isset($_FILES['file']['name'])){
            $filename = $_FILES['file']['name'];
            $timestamp = time();
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $allowed_extensions = array("jpg","jpeg","png","pdf","xlsx","xls");
            $response = array();
            $status = 0;
            if(in_array(strtolower($extension), $allowed_extensions)) {
                $new_filename = $timestamp . '.' . $extension;
                $location = "uploads/KARYAWAN/" . $new_filename;
                if (file_exists($location)) {
                    $status = 2;
                } else {
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
                        $status = 1; 
                        $response['path'] = $location;
                        $response['extension'] = $extension;
                    }
                }
            }
            $response['status'] = $status;
            $response['filename'] = $new_filename;
            echo json_encode($response);
            exit;
        }
        echo 0;
        break;

    default:
        echo 'action not defined';
}