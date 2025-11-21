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
	case 'keluarbarang':
		_auth1('KELUARBARANG-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);				
		$d = ORM::for_table('keluarbarang_master')->find_one($id);
		$kode = $d['no_keluarbarang'];

		ORM::get_db()->beginTransaction();
		
		try {
		$e = ORM::for_table('keluarbarang_detail')->where('no_keluarbarang', $kode)->find_many();
		foreach($e as $item) {
			//kartu stock
			$chk = ORM::for_table('kartustock')->raw_query('select * from kartustock where kode_item="'.$item["kode_item"].'" order by id desc')->find_one();
			if ($chk){				
				$g = ORM::for_table('kartustock')->create();
				$g['no_tran']=$item['no_keluarbarang'];
				$g['kode_item']=$item['kode_item'];
				$g['qty_awal']=$chk['qty_sisa'];
				$g['qty_in']=$item['qty'];
				$g['qty_sisa']=$chk['qty_sisa']+$item['qty'];
				$g['dpp']=$item['dpp'];
				$g['hpp']=$item['hpp'];
				$g['avg_dpp']=($item['qty']*$item['dpp']+$chk['qty_sisa']*$chk['avg_dpp'])/($item['qty']+$chk['qty_sisa']);
				$g['avg_hpp']=($item['qty']*$item['hpp']+$chk['qty_sisa']*$chk['avg_hpp'])/($item['qty']+$chk['qty_sisa']);
				$g['jenis_tran']='Batal Keluar Barang';
				$g->save();
			};
			
			//mintabarang_detail
			$chk = ORM::for_table('mintabarang_detail')
				   ->where('no_mintabarang', $item['no_mintabarang'])
				   ->where('kode_item', $item['kode_item'])->find_one();
			if ($chk){								
				$chk['qty_dipenuhi']=$chk['qty_dipenuhi']-$item['qty'];
				$chk['status']='APPROVED';
				$chk->save();				
			}

			//mintabarang_master
			$chk = ORM::for_table('mintabarang_master')
				   ->where('no_mintabarang', $item['no_mintabarang'])->find_one();
			if ($chk){
				$chk['status']='APPROVED';
				$chk->save();
			}	
			
			//keluarbarang_detail
			$chk = ORM::for_table('keluarbarang_detail')
				   ->where('no_keluarbarang', $kode)->find_many();
			if ($chk){
				foreach($chk as $item)	
					{					
					$item['status']='CANCEL';
					$item->save();}				
			}
			

			//daftar_itemstock
			$chk = ORM::for_table('daftar_itemstock')
				   ->where('kode_item', $item['kode_item'])->find_one();
			if ($chk){
				$chk['qty_on_hand']=$chk['qty_on_hand']+$item['qty'];
				$chk->save();
			}

            }

			//keluarbarang_master
			$chk = ORM::for_table('keluarbarang_master')
				   ->where('no_keluarbarang', $kode)->find_one();
			if ($chk){
				$chk['status']='CANCEL';
				$chk->save();
			}



			ORM::get_db()->commit();
            r2(U.'pengeluaranbarang/list-keluarbarang','s','Berhasil membatalkan permintaan barang');

		}

		catch(PDOException $ex) {
			ORM::get_db()->rollBack();				
			r2(U.'pengeluaranbarang/list-keluarbarang','s','gagal membatalkan permintaan barang');			
			echo "Error: " . $ex->getMessage();
		}            
		
		break;
		

	case 'mintabarang':
		_auth1('MINTABARANG-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);				
		$d = ORM::for_table('mintabarang_master')->find_one($id);
		$kode = $d['no_mintabarang'];
		$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $kode)->find_many();
		if($d){
			if($d['status'] != 'PENDING' && $d['status'] != 'REJECT') {
				r2(U.'permintaanbarang/list-mintabarang','e','Hanya Permintaan Barang dengan Status PENDING dan REJECT yang dapat dibatalkan');
			} else {
				$d->status= 'CANCEL';				
				$d->save();				

				foreach($e as $item) {
					$f = ORM::for_table('mintabarang_detail')->where('id', $item['id'])->find_one();
					$f->status = 'CANCEL';
					$f->save();
				}
				//_log1('Batal Data Permintaan Barang : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'permintaanbarang/list-mintabarang','s','Berhasil membatalkan permintaan barang');
			}
		}
		else{
			r2(U.'permintaanbarang/list-mintabarang','e','Data Permintaan Barang Tidak Ditemukan '.$id);
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
        $kode = $d['kode_kategori'];
        if($d){
			$chk = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_one();
			if($chk) {
				r2(U.'kategori/list','e','Data tidak dapat dihapus, hapus bagian dalam terlebih dahulu');
			} else {
				$e = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori', $kode)->find_many();
				$d->delete();
				$e->delete();
				_log1('Hapus Kategori : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'kategori/list','s','Berhasil menghapus Bagian');
			}
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
            $e = ORM::for_table('daftar_itemstock_supplier')->where('kode_item', $d['kode_item'])->find_many();
			$f = ORM::for_table('daftar_kategori_itemstock')->where('kode_item', $d['kode_item'])->find_one();
			$h = ORM::for_table('pr_detail')->where('kode_item', $d['kode_item'])->find_one();
			if($d){
				if($f) {
					r2(U.'itemstock/list','e','Tidak dapat menghapus Item Stock, karena sudah terdaftar pada kategori itemstock');
				} else if($h) {
					r2(U.'itemstock/list','e','Tidak dapat menghapus Item Stock, karena sudah terdaftar pada PR');
				} else {
					$d->delete();
					$e->delete();
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
			$e = ORM::for_table('daftar_itemstock_supplier')->where('kode_supplier', $kode)->find_one();
			if($e){
				r2(U.'supplier/list','e','Data Supplier '. $kode .' tidak dapat dihapus, karena sudah terdaftar pada ItemStock '. $e['kd_item']);
			} else {
				$d->hidden = 1;
				$d->save();
				_log1('Hapus Data Supplier : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'supplier/list','s','Berhasil menghapus Data Supplier');
			}
        }
        else{
            r2(U.'supplier/list','e','Data Supplier tidak ditemukan');
        }
		break;
	
	case 'pengiriman':
		_auth1('PENGIRIMAN-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('daftar_via_pengiriman')->find_one($id);
        $kode = $d['kode_via'];
        if($d){
				$d->delete();
				_log1('Hapus Data Pengiriman : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'viapengiriman/list','s','Berhasil menghapus Data Pengiriman');
        }
        else{
            r2(U.'viapengiriman/list','e','Data Pengiriman tidak ditemukan');
        }
		break;

	case 'spmk':
		_auth1('SPMK-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('spmk_master')->find_one($id);
		$kode = $d['no_spmk'];
		$e = ORM::for_table('spmk_detail')->where('no_spmk', $kode)->find_many();
		if($d){
			if ($d['status'] == 'PENDING' || $d['status'] == 'REVISI') {
				$url = 'pembelian/list-spmk-pending';
		} elseif ($d['status'] == 'REJECT') {
				$url = 'pembelian/list-spmk-reject';
		}
			if($d['status'] != 'PENDING' && $d['status'] != 'REJECT' && $d['status'] != 'REVISI') {
				r2(U.$url,'e','Hanya SPmK dengan Status PENDING dan REJECT yang dapat dibatalkan');
			} else {
				$d->status = 'CANCEL';
				$d->save();
				foreach($e as $item) {
					$f = ORM::for_table('spmk_detail')->where('no_spmk', $item['no_spmk'])->find_one();
					$f->status = 'CANCEL';
					$f->save();
				}
				_log1('Batal Data SPmK : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.$url,'s','Berhasil membatalkan SPmK');
			}
		}
		else{
			r2(U.$url,'e','Data SPmK Tidak Ditemukan sd'.$id);
		}
		break;
        
    case 'pr':
		_auth1('PR-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('pr_master')->find_one($id);
		$kode = $d['no_pr'];
		$e = ORM::for_table('pr_detail')->where('no_pr', $kode)->find_many();
		if($d){
			if($d['status'] != 'PENDING' && $d['status'] != 'REJECT' && $d['status'] != 'REVISI') {
				r2(U.'pembelian/list-pr-pending','e','Hanya PR dengan Status PENDING dan REJECT yang dapat dibatalkan');
			} else {
				$d->status = 'CANCEL';
				$d->save();
				foreach($e as $item) {
					$f = ORM::for_table('pr_detail')->where('no_pr', $item['no_pr'])->find_one();
					$f->status = 'CANCEL';
					$f->save();
				}
				_log1('Batal Data PR : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'pembelian/list-pr-pending','s','Berhasil membatalkan PR');
			}
		}
		else{
			r2(U.'pembelian/list-pr-pending','e','Data PR Tidak Ditemukan sd'.$id);
		}
		break;
        
    case 'po':
		_auth1('PO-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('po_master')->find_one($id);
		$kode = $d['no_po'];
		$e = ORM::for_table('po_detail')->where('no_po', $kode)->find_many();
		if($d){
			if($d['status'] != 'PENDING' && $d['status'] != 'REJECT' && $d['status'] != 'REVISI') {
				r2(U.'pembelian/list-po-pending','e','Hanya PO dengan Status PENDING dan REJECT yang dapat dihapus');
			} else {
				$d->status = 'CANCEL';
				$d->save();
				_log1('Cancel Data PO : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
				r2(U.'pembelian/list-po-pending','s','Berhasil Cancel Data PO');
			}
		}
		else{
			r2(U.'pembelian/list-po-pending','e','Data PO Tidak Ditemukan');
		}
		break;    
    
	default:
        echo 'action not defined';
}