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
    $myCtrl = 'supplier';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'listsupplier');
$ui->assign('_title', 'Daftar Supplier - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Supplier');
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
        Event::trigger('supplier/add/');
		_auth1('SUPPLIER-ADD',$user['id']);

        $negara = '';
        $kode = '';
        $kode_usaha = '';
        $tg = ORM::for_table('daftar_kode_negara')->order_by_asc('negara')->find_many();
        foreach ($tg as $r) {
            if($r['negara'] == 'Indonesia'){
                $negara .= '<option value="'.$r['negara'].'" selected>'.$r['negara'].'</option>';
                $kode .= '<option value="'.$r['kode_telepon'].'" selected>+'.$r['kode_telepon'].' ('.$r['negara'].')</option>';
            }
            else{
                $negara .= '<option value="'.$r['negara'].'">'.$r['negara'].'</option>';
                $kode .= '<option value="'.$r['kode_telepon'].'">+'.$r['kode_telepon'].' ('.$r['negara'].')</option>';
            }
        }
        $daftar_usaha = ORM::for_table('daftar_jenis_usaha')->order_by_asc('kode_usaha')->find_many();
        foreach($daftar_usaha as $r) {
            // $c = str_replace("JENISUSAHA/", "", $r['kode_usaha']);
            $kode_usaha .= '<option value='.$r['kode_usaha'].'|'.$r['nama_usaha'].'>'.$r['nama_usaha'].'</option>';
        }
        $ui->assign('daftar_kode',$kode);
        $ui->assign('daftar_negara',$negara);
        $ui->assign('daftar_kode_usaha', $kode_usaha);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-supplier','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-supplier.tpl');
        break;

    case 'edit':
        Event::trigger('supplier/edit/');
		_auth1('SUPPLIER-EDIT',$user['id']);

        $cid = $routes['3'];
        $d = ORM::for_table('daftar_supplier')->find_one($cid);
        $kode = ORM::for_table('daftar_kode_negara')->order_by_asc('negara')->find_many();
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
            $ui->assign('daftar_kode',$kode);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-supplier','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-supplier.tpl');
        }
        break;

    case 'add-post':
        Event::trigger('supplier/add-post/');
		_auth1('SUPPLIER-ADD',$user['id']);

        // $kode_supplier = _post('kode_supplier');
        $nama_supplier = _post('nama_supplier');
        // JENISUSAHA/001
        $jenisusaha = _post('jenisusaha');
        $asal = _post('asal');
        $foto_toko = _post('sfoto_toko');
        // $kode_telp_toko = _post('kode_telp_toko');
        // $area_telp_toko = _post('area_telp_toko');
        $telp_toko = _post('telp_toko');
        // $kode_hp_toko = _post('kode_hp_toko');
        $hp_toko = _post('hp_toko');
        $email = _post('email');
        $website = _post('website');
        $tgl_mulai_kerjasama = Validator::Date1(_post('tgl_mulai_kerjasama'));
        $lama_pembayaran = Finance::amount_fix(_post('lama_pembayaran'));
        $rekomendasi_dari = _post('rekomendasi_dari');
        $nib = _post('nib');
        $file_nib = _post('sfile_nib');
        $npwp = _post('npwp');
        $file_npwp = _post('sfile_npwp');
        $file_kontrak = _post('sfile_kontrak');

        $negara = _post('negara');
        $provinsi = _post('provinsi');
        $kota = _post('kota');
        $kelurahan = _post('kelurahan');
        $kecamatan = _post('kecamatan');
        $kotamadya = _post('kotamadya');
        $rtrw = _post('rtrw');
        $alamat = _post('alamat');
        // $nomor_gedung = _post('nomor_gedung');
        $kode_pos = _post('kode_pos');
        $maps = _post('maps');

        $file_ktp = _post('sfile_ktp');
        $nik_ktp = _post('nik_ktp');
        $nama_pemilik = _post('nama_pemilik');
        $hp_pemilik = _post('hp_pemilik');
        $nama_contact = _post('nama_contact');
        $hp_contact = _post('hp_contact');
        $nama_emergency = _post('nama_emergency');
        $hp_emergency = _post('hp_emergency');

        $bank = _post('bank');
        $no_rekening = _post('no_rekening');
        $an_rekening = _post('an_rekening');
        $file_rekening = _post('sfile_rekening');
        // $kode_hp_pemilik = _post('kode_hp_pemilik');
        // $kode_hp_contact = _post('kode_hp_contact');
        // $kode_hp_emergency = _post('kode_hp_emergency');

        $msg = '';
        // if($kode_supplier == ''){
        //     $msg .= 'Kode Supplier tidak boleh kosong. <br>';
        // }
        if($nama_supplier == ''){
            $msg .= 'Nama Supplier tidak boleh kosong. <br>';
        }
        if($jenisusaha == ''){
            $msg .= 'Jenis Usaha tidak boleh kosong. <br>';
        }
        if($asal == ''){
            $msg .= 'Asal Supplier tidak boleh kosong. <br>';
        }

        // $chk = ORM::for_table('daftar_supplier')->where('kode_supplier',$kode_supplier)->find_one();
        // if($chk){
        //     $msg .= 'Kode Supplier tersebut sudah ada <br>';
        // }
        if($msg == ''){

            ORM::get_db()->beginTransaction();
            try {
                $kode_supplier = "";
                // $chk = ORM::for_table('daftar_jenis_usaha')->raw_query('SELECT SUBSTRING(kode_usaha, 1, 3) FROM daftar_jenis_usaha WHERE kode_usaha LIKE')
                $jenisusaha = explode('|', $jenisusaha);
                $kode_usaha = str_replace('JENISUSAHA/', '',$jenisusaha[0]);
                $nama_usaha = $jenisusaha[1];
                // $chk = ORM::for_table('daftar_itemstock')->raw_query('select * from daftar_itemstock order by kode_item desc')->find_one();
				// if($chk) {
				// 	$no = ++$chk['kode_item'];
				// } else {
				// 	$no = 'ITEMS/00001';
				// }
                $chk = ORM::for_table('daftar_supplier')->raw_query("select * from daftar_supplier where SUBSTRING(kode_supplier,1,3) LIKE '$kode_usaha' order by kode_supplier desc")->find_one();
                if($chk) {
                    $kode_supplier = ++$chk['kode_supplier'];
                } else {
                    $kode_supplier = $kode_usaha . '/0001';
                }
                $d = ORM::for_table('daftar_supplier')->create();
                $d->kode_supplier = $kode_supplier;
                $d->nama_supplier = strtoupper($nama_supplier);
                $d->bidang = $nama_usaha;
                $d->asal_supplier = $asal;
                $d->foto_toko = $foto_toko;
                // $stelp_toko = $kode_telp_toko .'|'. $area_telp_toko. '|' .$telp_toko;
                $d->telp_toko = $telp_toko;
                // $shp_toko = $kode_hp_toko .'|'. $hp_toko;
                $d->hp_toko = $hp_toko;
                $d->email = $email;
                $d->website = $website;
                if($tgl_mulai_kerjasama != 'Salah'){
                    $d->tgl_mulai_kerjasama = $tgl_mulai_kerjasama;
                }
                $d->lama_pembayaran = $lama_pembayaran;
                $d->rekomendasi_dari = $rekomendasi_dari;
                $d->nib = $nib;
                $d->file_nib = $file_nib;
                $d->npwp = $npwp;
                $d->file_npwp = $file_npwp;
                $d->file_kontrak = $file_kontrak;

                $d->negara = $negara;
                $d->provinsi = $provinsi;
                $d->kota = $kota;
                $d->kelurahan = $kelurahan;
                $d->kecamatan = $kecamatan;
                $d->kotamadya = $kotamadya;
                $d->rtrw = $rtrw;
                $d->alamat = $alamat;
                // $d->nomor_gedung = $nomor_gedung;
                $d->kode_pos = $kode_pos;
                $d->maps = $maps;

                $d->file_ktp = $file_ktp;
                $d->nik_ktp = $nik_ktp;
                $d->nama_pemilik = $nama_pemilik;
                $d->hp_pemilik = $hp_pemilik;
                $d->nama_contact = $nama_contact;
                $d->hp_contact = $hp_contact;
                $d->nama_emergency = $nama_emergency;
                $d->hp_emergency = $hp_emergency;

                $d->bank = $bank;
                $d->no_rekening = $no_rekening;
                $d->an_rekening = $an_rekening;
                $d->file_rekening = $file_rekening;

                $d->active = 'Y';
                $d->blocked = 'N';
                $d->add_by = $user['id'];
                $d->add_date = date('Y-m-d H:i:s');

                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Supplier : '.$kode_supplier.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('supplier/add-post/_on_finished');
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

    case 'edit-post':
        Event::trigger('supplier/edit-post/');
		_auth1('SUPPLIER-EDIT',$user['id']);

        $id = _post('cid');
        $nama_supplier = _post('nama_supplier');
        $asal = _post('asal');
        $foto_toko = _post('sfoto_toko');
        $telp_toko = _post('telp_toko');
        $hp_toko = _post('hp_toko');
        $email = _post('email');
        $website = _post('website');
        $tgl_mulai_kerjasama = Validator::Date1(_post('tgl_mulai_kerjasama'));
        $lama_pembayaran = Finance::amount_fix(_post('lama_pembayaran'));
        $rekomendasi_dari = _post('rekomendasi_dari');
        $nib = _post('nib');
        $file_nib = _post('sfile_nib');
        $npwp = _post('npwp');
        $file_npwp = _post('sfile_npwp');
        $file_kontrak = _post('sfile_kontrak');

        $negara = _post('negara');
        $provinsi = _post('provinsi');
        $kota = _post('kota');
        $kelurahan = _post('kelurahan');
        $kecamatan = _post('kecamatan');
        $kotamadya = _post('kotamadya');
        $rtrw = _post('rtrw');
        $alamat = _post('alamat');
        // $nomor_gedung = _post('nomor_gedung');
        $kode_pos = _post('kode_pos');
        $maps = _post('maps');

        $file_ktp = _post('sfile_ktp');
        $nik_ktp = _post('nik_ktp');
        $nama_pemilik = _post('nama_pemilik');
        $hp_pemilik = _post('hp_pemilik');
        $nama_contact = _post('nama_contact');
        $hp_contact = _post('hp_contact');
        $nama_emergency = _post('nama_emergency');
        $hp_emergency = _post('hp_emergency');

        $bank = _post('bank');
        $no_rekening = _post('no_rekening');
        $an_rekening = _post('an_rekening');
        $file_rekening = _post('sfile_rekening');

        $aktif = _post('aktif');
        $alasan_non_aktif = _post('alasan_non_aktif');

        $blocked = _post('blocked');
        $alasan_blocked = _post('alasan_blocked');

        $msg = '';

        if($nama_supplier == ''){
            $msg .= 'Nama Supplier tidak boleh kosong. <br>';
        }
        if($asal == ''){
            $msg .= 'Asal Supplier tidak boleh kosong. <br>';
        }
        if($blocked == 'Y'){
            if($alasan_blocked == ''){
                $msg .= 'Alasan Blacklist tidak boleh kosong. <br>';
            }
        }
        if($aktif == ''){
            if($alasan_non_aktif == ''){
                $msg .= 'Alasan Non Aktif tidak boleh kosong. <br>';
            }
        }

		$d = ORM::for_table('daftar_supplier')->find_one($id);
        if($d){
            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('daftar_supplier')->find_one($id);
                    $d->nama_supplier = strtoupper($nama_supplier);
                    $d->asal_supplier = $asal;
                    $d->foto_toko = $foto_toko;
                    $d->telp_toko = $telp_toko;
                    $d->hp_toko = $hp_toko;
                    $d->email = $email;
                    $d->website = $website;
                    if($tgl_mulai_kerjasama != 'Salah'){
                        $d->tgl_mulai_kerjasama = $tgl_mulai_kerjasama;
                    }
                    $d->lama_pembayaran = $lama_pembayaran;
                    $d->rekomendasi_dari = $rekomendasi_dari;
                    $d->nib = $nib;
                    $d->file_nib = $file_nib;
                    $d->npwp = $npwp;
                    $d->file_npwp = $file_npwp;
                    $d->file_kontrak = $file_kontrak;

                    $d->negara = $negara;
                    $d->provinsi = $provinsi;
                    $d->kota = $kota;
                    $d->kelurahan = $kelurahan;
                    $d->kecamatan = $kecamatan;
                    $d->kotamadya = $kotamadya;
                    $d->rtrw = $rtrw;
                    $d->alamat = $alamat;
                    $d->kode_pos = $kode_pos;
                    $d->maps = $maps;

                    $d->file_ktp = $file_ktp;
                    $d->nik_ktp = $nik_ktp;
                    $d->nama_pemilik = $nama_pemilik;
                    $d->hp_pemilik = $hp_pemilik;
                    $d->nama_contact = $nama_contact;
                    $d->hp_contact = $hp_contact;
                    $d->nama_emergency = $nama_emergency;
                    $d->hp_emergency = $hp_emergency;

                    $d->bank = $bank;
                    $d->no_rekening = $no_rekening;
                    $d->an_rekening = $an_rekening;
                    $d->file_rekening = $file_rekening;

                    if($blocked == 'Y'){
                        $d->blocked = 'Y';
                        $d->alasan_blocked = $alasan_blocked;
                        $d->blocked_by = $user['id'];
                        $d->blocked_date = date('Y-m-d H:i:s');
                        $d->active = 'N';
                    } else {
                        if($aktif == 'Y') {
                            $d->active = 'Y';
                        } else {
                            $d->active = 'N';
                            $d->alasan_non_aktif = $alasan_non_aktif;
                        }
						$d->blocked = 'N';
					}

					$d->edit_by = $user['id'];
					$d->edit_date = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Data Supplier : '.$kode_supplier.' [CID: '.$id.']',$user['username'],$user['id']);
                    Event::trigger('supplier/add-post/_on_finished');
                    echo $id;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else{
                echo $msg;
            }

        }
        else{
            r2(U.'supplier/list', 'e', 'Data Supplier tersebut tidak ditemukan');
        }
        break;

    case 'upload-file':
        if(isset($_FILES['file']['name'])){
            $filename = $_FILES['file']['name'];
            $timestamp = time();
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $allowed_extensions = array("jpg","jpeg","png","pdf","xlsx","xls");
            $maxsize = 1024 * 5120;
            $response = array();
            $status = 0;
            if(in_array($extension, $allowed_extensions)) {
                $new_filename = $timestamp . '.' . $extension;
                $location = "uploads/GAS/supplier/" . $new_filename;
                if (file_exists($location)) {
                    $status = 2;
                } else if ($_FILES['file']['size'] >= $maxsize){
                    $status = 3;
                    $response['max_size'] = $maxsize;
                }
                else {
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

    case 'list':
        Event::trigger('supplier/listsupplier/');
		_auth1('SHOW-SUPPLIER',$user['id']);
        $msg = $routes[3];
        $d = ORM::for_table('daftar_supplier')->find_many();
        $ui->assign('d',$d);
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-supplier','dp/dist/datepicker.min','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-supplier.tpl');
        break;

    default:
        echo 'action not defined';
}