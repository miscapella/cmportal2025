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
$ui->assign('_title', $_L['Delete'].'- '. $config['CompanyName']);
$action = $routes['2'];
$user = User::_info();
switch ($action) {
	case 'mintabarang':
		_auth1('DEL-UR',$user['id']);

		$uri = $_SERVER['HTTP_REFERER'];
		$uri = rtrim($uri, '/');
		$uri = substr($uri, strrpos($uri, '/') + 1);
		if ($uri != "list-mintabarang" && $uri != "list-mintabarang-pending" && $uri != "list-mintabarang-approved" && $uri != "list-mintabarang-rejected" && $uri != "list-mintabarang-cancelled") {
			$uri = "list-mintabarang";
		}

		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('mintabarang_master')->find_one($id);
		$kode = $d['no_mintabarang'];
		$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $kode)->find_many();
		if($d){
			if($d['approval'] != 'PENDING') {
				r2(U.'permintaanbarang/' . $uri,'e','Hanya Permintaan Barang dengan Status PENDING yang dapat dibatalkan');
			} else if ($d['tahap'] != 1) {
				r2(U.'permintaanbarang/' . $uri,'e','Permintaan Barang tidak dapat dibatalkan karena sudah melewati tahap 1');
			} else {
				$d->approval= 'CANCEL';
				$d->save();

				foreach($e as $item) {
					$f = ORM::for_table('mintabarang_detail')->where('id', $item['id'])->find_one();
					$f->approval = 'CANCEL';
					$f->save();
				}
				//_log1('Batal Data Permintaan Barang : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'permintaanbarang/' . $uri,'s','Berhasil membatalkan permintaan barang');
			}
		}
		else{
			r2(U.'permintaanbarang/' . $uri,'e','Data Permintaan Barang Tidak Ditemukan '.$id);
		}
		break;

	case 'jenisusaha':
		_auth1('JENISUSAHA-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('daftar_jenis_usaha')->find_one($id);
        $kode = $d['kode_usaha'];
        if($d){
			// $e = ORM::for_table('daftar_itemstock_supplier')->where('kd_supplier', $kode)->find_one();
			// if($e){
			// 	r2(U.'supplier/list','e','Data Supplier '. $kode .' tidak dapat dihapus, karena sudah terdaftar pada ItemStock '. $e['kd_item']);
			// } else {
			// 	$d->delete();
			// 	_log1('Hapus Data Supplier : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			// 	r2(U.'supplier/list','s','Berhasil menghapus Data Supplier');
			// }
			$d->delete();
				_log1('Hapus Data Jenis Usaha : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'jenisusaha/list','s','Berhasil menghapus Data Jenis Usaha');
        }
        else{
            r2(U.'jenisusaha/list','e','Data Jenis Usaha tidak ditemukan');
        }
		break;

	case 'inventaris-mobil':
		_auth1('INVENTARIS-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		if($id <> $_SESSION['comp']) {
			$d = ORM::for_table('inventaris_mobil')->find_one($id);
			if($d){
				if(file_exists($d['FT_STNK']))
					unlink($d['FT_STNK']);
				if(file_exists($d['FT_PAJAK']))
					unlink($d['FT_PAJAK']);
				if(file_exists($d['FT_BPKB']))
					unlink($d['FT_BPKB']);
				if(file_exists($d['FT_DEPAN']))
					unlink($d['FT_DEPAN']);
				if(file_exists($d['FT_SAMPING_KANAN']))
					unlink($d['FT_SAMPING_KANAN']);
				if(file_exists($d['FT_SAMPING_KIRI']))
					unlink($d['FT_SAMPING_KIRI']);
				if(file_exists($d['FT_BELAKANG']))
					unlink($d['FT_BELAKANG']);
				if(file_exists($d['FT_INTERIOR_DEPAN']))
					unlink($d['FT_INTERIOR_DEPAN']);
				if(file_exists($d['FT_INTERIOR_BELAKANG']))
					unlink($d['FT_INTERIOR_BELAKANG']);
				$d->delete();
				_log('Hapus Mobil Inventaris '.$username,$user['username'],$user['id']);
				r2(U.'inventaris/list','s','Berhasil menghapus Inventaris Mobil');
	
			}
			else{
				echo 'Mobil Inventaris tidak ditemukan';
			}
		}
		else {
			r2(U.'inventaris/list','e','Tidak dapat menghapus Data Mobil Inventaris');
		}
		break;

	case 'kategori':
		_auth1('CATEGORY-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('daftar_kategori')->find_one($id);
        $kode = $d['kd_kategori'];
        $e = ORM::for_table('daftar_kategori_itemstock')->where('kd_kategori', $kode)->find_many();
        if($d){
            $d->delete();
            $e->delete();
            _log1('Hapus Kategori Stock : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
            r2(U.'kategori/list','s','Berhasil menghapus Kategori Stock');

        }
        else{
			r2(U.'kategori/list','e','Kategori Stock tidak ditemukan');
        }
		break;

	case 'itemstock':
		_auth1('ITEMSTOCK-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);

		if($id <> $_SESSION['comp']) {
			$d = ORM::for_table('daftar_itemstock')->find_one($id);
            // $e = ORM::for_table('daftar_itemstock_supplier')->where('kd_item', $d['kd_item'])->find_many();
			// $f = ORM::for_table('daftar_kategori_itemstock')->where('kd_item', $d['kd_item'])->find_one();
			// $g = ORM::for_table('daftar_inventaris_itemstock')->where('kd_item', $d['kd_item'])->find_one();
			$h = ORM::for_table('pr_detail')->where('kd_item', $d['kd_item'])->find_one();
			if($d){
				// if($f) {
				// 	r2(U.'itemstock/list','e','Tidak dapat menghapus Item Stock, karena sudah terdaftar pada kategori itemstock');
				// } else if($g) {
				// 	r2(U.'itemstock/list','e','Tidak dapat menghapus Item Stock, karena sudah terdaftar pada inventaris itemstock');
				// }
				if($h) {
					r2(U.'itemstock/list','e','Tidak dapat menghapus Item Stock, karena sudah terdaftar pada PR');
				} else {
					$d->delete();
					_log1('Hapus Item Stock [CID: '.$id.']',$user['username'],$user['id']);
					r2(U.'itemstock/list','s','Berhasil menghapus Item Stock');
				}
			}
			else{
				r2(U.'itemstock/list','e','Item Stock tidak ditemukan');
			}
		}
		else {
			r2(U.'itemstock/list','e','Tidak dapat menghapus Data Item Stock');
		}
		break;

    case 'inventaris':
		_auth1('INVENTARIS-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		
		$d = ORM::for_table('daftar_inventaris')->find_one($id);
		$kode = $d['kd_inventaris'];
		$e = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris', $d['kd_inventaris'])->find_many();
		if($d){
			$d->delete();
			$e->delete();
			_log1('Hapus Item Inventaris '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'inventaris/list','s','Berhasil menghapus Data Inventaris');

		}
		else{
			r2(U.'inventaris/list','e','Data Inventaris tidak ditemukan');
		}
		
		break;
        
	case 'supplier':
		_auth1('SUPPLIER-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('daftar_supplier')->find_one($id);
        $kode = $d['kode_supplier'];
        if($d){
			// $e = ORM::for_table('daftar_itemstock_supplier')->where('kd_supplier', $kode)->find_one();
			// if($e){
			// 	r2(U.'supplier/list','e','Data Supplier '. $kode .' tidak dapat dihapus, karena sudah terdaftar pada ItemStock '. $e['kd_item']);
			// } else {
			// 	$d->delete();
			// 	_log1('Hapus Data Supplier : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			// 	r2(U.'supplier/list','s','Berhasil menghapus Data Supplier');
			// }
			$d->hidden = 1;
			$d->save();

			_log1('Hapus Data PR : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'supplier/list','s','Berhasil menghapus Data Supplier');
        }
        else{
            r2(U.'supplier/list','e','Data Supplier tidak ditemukan');
        }
		break;
        
    case 'pr':
		_auth1('CANCEL-PR',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('pr_master')->find_one($id);
		$kode = $d['no_pr'];

		$e = ORM::for_table('pr_detail')->where('no_pr', $kode)->find_many();
		if ($d) {
			if ($d['status'] != 'PENDING') {
				r2(U.'permintaan/list-pr','e','Hanya PR dengan Status PENDING yang dapat dibatalkan');
			} else {
				$d->status = 'CANCEL';
				$d->save();
				foreach($e as $item) {
					$f = ORM::for_table('pr_detail')->where('no_pr', $item['no_pr'])->find_one();
					$f->status = 'CANCEL';
					$f->save();
				}
				_log1('Cancel Data PR : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'permintaan/list-pr','s','Berhasil membatalkan PR');
			}
		} else {
			r2(U.'permintaan/list-pr','e','Data PR Tidak Ditemukan sd'.$id);
		}
		break;
        
    case 'po':
		_auth1('PO-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('po_master')->find_one($id);
		if($d){
			if($d['status'] != 'PENDING' || $d['status'] != 'REJECT' || $d['status'] != 'REVISI') {
				r2(U.'pembelian/list-po-pending','e','Hanya PO dengan Status PENDING dan REJECT yang dapat dihapus');
			} else {
				$d->status = 'CANCEL';
				$d->save();
				_log1('Hapus Data PO : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'pembelian/list-po-pending','s','Berhasil menghapus Data PO');
			}
		}
		else{
			r2(U.'pembelian/list-po-pending','e','Data PO Tidak Ditemukan');
		}
		break;    
    
	default:
        echo 'action not defined';
}