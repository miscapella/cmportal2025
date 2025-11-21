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

_auth();
$ui->assign('_sysfrm_menu', 'accounts');
$ui->assign('_title', $_L['Delete'].'- '. $config['NamaKaryawan']);
$action = $routes['2'];
$user = User::_info();

switch ($action) {
	case 'karyawan':
		_auth1('KARYAWAN-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('daftar_karyawan')->find_one($id);
        $kode = $d['emp_id'];
        if($d){
			$d->delete();
			_log1('Hapus Data Karyawan : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'karyawan/list','s','Berhasil menghapus Data Karyawan');
        }
        else{
            r2(U.'karyawan/list','e','Data Karyawan tidak ditemukan');
        }
		break;

	case 'departemen':
		_auth1('DEPARTEMEN-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('daftar_departemen')->find_one($id);
		$kode = $d['dep_id'];
		if($d){
			$d->delete();
			_log1('Hapus Data Departemen : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'departemen/list','s','Berhasil menghapus Data Departemen');
		}
		else{
			r2(U.'departemen/list','e','Data Departemen tidak ditemukan');
		}
		break;

	case 'jabatan':
		_auth1('JABATAN-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('daftar_jabatan')->find_one($id);
		$kode = $d['id_jabatan'];
		if($d){
			$d->delete();
			_log1('Hapus Data Jabatan : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'jabatan/list','s','Berhasil menghapus Data Jabatan');
		}
		else{
			r2(U.'jabatan/list','e','Data Jabatan tidak ditemukan');
		}
		break;

	case 'organisasi':
		_auth1('ORGANISASI-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('struktur_organisasi')->find_one($id);
        $kode = $d['id_posisi'];
        if($d){
			deleteOrganisasi($d);
			_log1('Hapus Data Organisasi : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'struktur-organisasi/list','s','Berhasil menghapus Data Organisasi');
        }
        else{
            r2(U.'struktur-organisasi/list','e','Data Organisasi tidak ditemukan');
        }
		break;

	default:
        echo 'action not defined';
}

function deleteOrganisasi($data) {
    $children = ORM::for_table('struktur_organisasi')->where('parent_id_posisi', $data['id_posisi'])->find_one();

    if($children) {
        $children = ORM::for_table('struktur_organisasi')->where('parent_id_posisi', $data['id_posisi'])->find_many();
        foreach($children as $child) {
            deleteOrganisasi($child);
        }
	}

	$data->delete();
}