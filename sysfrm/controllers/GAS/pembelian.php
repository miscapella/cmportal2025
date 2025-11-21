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
    $myCtrl = 'pembelian';
}
_auth();
$ui->assign('_sysfrm_menu', 'Pembelian');
$ui->assign('_title', 'Pembelian - '. $config['CompanyName']);
$ui->assign('_st', 'Pembelian');
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
	case 'list-po':
		Event::trigger('pembelian/listpo/');
		_auth1('SHOW-PO',$user['id']);

		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu1', 'List PO');
		$ui->assign('xfooter', Asset::js(array($spath.'list-po')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-po1.tpl');
		break;

	case 'add-po':
		Event::trigger('pembelian/add-po/');
		_auth1('ADD-PO',$user['id']);

		$clist = '';
		$clist = '<option value="">Pilih Supplier</option>';
		$tg = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
		foreach ($tg as $r) {
			$clist .= '<option value="'.$r['kode_supplier'].'">'.$r['kode_supplier'].' - '.$r['nama_supplier'].'</option>';
		}

		$list_direksi = '<option value="">Pilih Direksi</option>';
		$dir = ORM::for_table('sys_users', 'dblogin')->where('kode_dept','DIR')->find_many();
		foreach ($dir as $j) {
			$list_direksi .= '<option value="'.$j['username'].'">'.$j['fullname'].'</option>';
		}

		$idate = date('d-m-Y');
		$ui->assign('opt_supplier',$clist);
		$ui->assign('list_direksi',$list_direksi);
		$ui->assign('idate',$idate);
		$ui->assign('_sysfrm_menu1', 'Buat PO');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
		$ui->display($spath.'add-po.tpl');
		break;

	case 'add-po-post':
		Event::trigger('pembelian/add-po-post/');
		_auth1('ADD-PO',$user['id']);

		$no_pr = explode(',', _post('no_pr'));
		$kd_item = explode(',', _post('kd_item'));
		$id = explode(',', _post('id'));
		$max = explode(',', _post('max'));
		$qty_req = explode(',', _post('qty_req'));
		// $garansi_bulan = explode(',', _post('garansi_bulan'));
		// $garansi_hari = explode(',', _post('garansi_hari'));
		$harga = explode(',', _post('harga'));
		$keterangan = explode(',', _post('keterangan'));
		$supplier = _post('supplier');
		$catatan = _post('catatan');
		$lokasi_pengiriman = _post('lokasi_pengiriman');
		$syarat_pembayaran = _post('syarat_pembayaran');
		$priority = _post('priority');
		$ppn = _post('ppn');
		$exclude_ppn = _post('exclude_ppn');
		$bayar_pusat = _post('bayar_pusat');

		$msg = '';
		if ($supplier == '') $msg .= 'Supplier wajib dipilih <br>';
		if ($priority == '') $msg .= 'Tingkat Kepentingan wajib dipilih <br>';
		// if ($exclude_ppn == 'false' && $ppn == 0) $msg .= 'Ppn wajib diisi <br>';
		for ($i = 0; $i < count($id); $i++) {
			if ($qty_req[$i] > $max[$i]) $msg .= 'PO '. strval($i + 1) . ' : Quantity melebihi permintaan (' . $max[$i] . ') <br />';
		}

		if ($msg == '') {
			ORM::get_db()->beginTransaction();
			try {
				$tgl_po = Validator::Date1(_post('idate'));
				$bl=date('n',strtotime($tgl_po));
				$th=date('Y', strtotime($tgl_po));
				$kode_cabang = $user['kode_cabang'];
				// $chk = ORM::for_table('po_master')->raw_query('select * from po_master where month(tgl_po)='.$bl.' and year(tgl_po)='.$th.' order by no_po desc')->find_one();
				$chk = ORM::for_table('po_master')
					->raw_query('select * from po_master where month(tgl_po) = ? and year(tgl_po) = ? and kode_cabang = ? order by no_po desc', [$bl, $th, $kode_cabang])
					->find_one();
				if($chk) {
					$no = ++$chk['no_po'];
				} else {
					$no = 'PO-' . $kode_cabang . '/' . $th . '/' . date('m', strtotime($tgl_po)) . '/0001';
				}
				$i = 0;
				$total = 0;
				$total_netto = 0;

				$all_pr = 	ORM::for_table('pr_detail')->where_in('no_pr', $no_pr)->find_many();

				foreach ($all_pr as $pr) {
					$total_netto += $pr['harga_pilihan_netto'];
				}

				foreach($no_pr as $code) {
					$snopr = $no_pr[$i];
					$skditem = $kd_item[$i];
					$sqty = str_replace(".", "", $qty_req[$i]);
					$sqty1 = str_replace(".", "", $harga[$i]);
					$sket = $keterangan[$i];

					$y = ORM::for_table('po_detail')->create();
					$y->no_po = $no;
					$y->no_pr = $snopr;
					$y->kd_item = $skditem;
					$y->qty_req = $sqty;
					// $y->garansi_bulan = $garansi_bulan[$i];
					// $y->garansi_hari = $garansi_hari[$i];
					$y->harga = $sqty1;
					$total_temp = (int)$sqty1 * (int)$sqty;
					$y->keterangan = $sket;
					$total += (int)$total_temp;
					$y->save();

					$z = ORM::for_table('pr_detail')->where('id', $id[$i])->find_one();
					$z->sisa -= $qty_req[$i];
					$z->save();

					$i++;
				}

				$d = ORM::for_table('po_master')->create();
				$d->no_po = $no;
				$d->tgl_po = $tgl_po;
				$d->kd_supplier = $supplier;
				$d->priority = $priority;
				$d->catatan = $catatan;
				$exclude_ppn == 'true' ? $d->exclude_ppn = 1 : $d->ppn = $ppn;
				$bayar_pusat == 'true' ? $d->bayar_pusat = 1 : $d->bayar_pusat = 0 ;
				$d->lokasi_pengiriman = $lokasi_pengiriman;
				$d->syarat_pembayaran = $syarat_pembayaran;
				$d->total_harga = $total;
				$d->total_netto = $total_netto;
				// $total_netto = (int)$total + ((int)$total*(int)$ppn/100);
				// $total_netto = 0;
				// for ($i = 0; $i < count($no_pr); $i++) {
				// 	$total_netto += (int)$harga[$i] * (int)$qty_req[$i] * (100 + $exclude_ppn[$i] == 'false' ? (int)$ppn[$i] : 0) / 100;
				// }
				// $d->total_netto = $total_netto;
				if ($total_netto >= 2000000) {
					$d->bayar_pusat = 1;
				} else {
					$d->bayar_pusat = 0; 
				}
				// $d->status = 'PENDING';
				$d->kode_cabang = $user['kode_cabang'];
				$d->status = 'APPROVE';
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');
				$d->save();

				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Data PO : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('pembelian/add-po-post/_on_finished');
				$data = array(
						'msg'			=>  'Berhasil Membuat PO. <br> No. PO : '.$no,
						'dataval'		=>	1);
				echo json_encode($data);
			} catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
		} else {
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
		}
		break;

	case 'detail-po':
		Event::trigger('pembelian/detail-po/');
		_auth1('SHOW-PO',$user['id']);

		$cid = $routes['3'];
		$d = ORM::for_table('po_master')->find_one($cid);
		if($d){
			$ui->assign('d',$d);
			$ui->assign('cid',$cid);

			// $e = ORM::for_table('po_detail')->where('no_po',$d['no_po'])->find_many();
			$e = ORM::for_table('po_detail')
				->join('pr_detail', 'po_detail.no_pr = pr_detail.no_pr AND po_detail.kd_item = pr_detail.kd_item')
				->where('po_detail.no_po', $d['no_po'])
				->select_many('po_detail.*', 'pr_detail.ppn1', 'pr_detail.ppn2', 'pr_detail.ppn3', 'pr_detail.harga_ppn1', 'pr_detail.harga_ppn2', 'pr_detail.harga_ppn3', 'pr_detail.supplierpilihan')
				->find_many();
				

			$tg = ORM::for_table('daftar_inventaris')->where('active','Y')->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Inventaris</option>';
			$clist .= '<option value="STOCK">STOCK</option>';
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_inventaris'].'">'.$r['kd_inventaris'].' - '.$r['nm_inventaris'].'</option>';
			}
			

			$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
			$tg2 = ORM::for_table('daftar_inventaris_itemstock')->find_many();
			$tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();

			$idate = date('d-m-Y', strtotime($d['tgl_po']));

			$ui->assign('e',$e);
			$ui->assign('tg',$tg);
			$ui->assign('clist',$clist);
			$ui->assign('tg1',$tg1);
			$ui->assign('tg2',$tg2);
			$ui->assign('tg3',$tg3);
			$ui->assign('total_netto', $d['total_netto']);
			$ui->assign('idate',$idate);
			$ui->assign('_sysfrm_menu1', 'List PO');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
			$ui->display($spath.'detail-po.tpl');
		} else r2 (U.'pembelian/list-po', 'e', 'PO tersebut tidak ditemukan');
		break;

	case 'render-inv_item':
		$kode = _post('kode');
		if($kode <> '') {
			if($kode == 'STOCK') {
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kd_item'].'">'.$r['nm_item'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt,
						'nama_bagian'	=>  'STOCK');
				echo json_encode($data);
			} else {
				$z = ORM::for_table('daftar_kategori')->where('kode_kategori', $kode)->find_one();
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori',$kode)->find_many();
				foreach($y as $r) {
					$x = ORM::for_table('daftar_itemstock')->where('kd_item',$r['kd_item'])->where('active','Y')->find_one();
					$opt .= '<option value="'.$r['kd_item'].'">'.$x['nm_item'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt,
						'nama_bagian'	=>  $z['nm_kategori']);
				echo json_encode($data);
			}
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Item Stock</option>',
					'nama_bagian'  => '');
			echo json_encode($data);
		}
		break;

	case 'render-po-supplier':
		$kode = _post('kode');
		if($kode <> '') {
		$x = ORM::for_table('pr_detail')
			->where_raw('sisa > 0')
			->where('status', 'PENDING')
			->where_any_is([
			['kd_supplier1' => $kode, 'supplierpilihan' => '1'],
			['kd_supplier2' => $kode, 'supplierpilihan' => '2'],
			['kd_supplier3' => $kode, 'supplierpilihan' => '3']
		])
    ->find_many();
			$clist = '';
			foreach($x as $item) {
				$y = ORM::for_table('daftar_itemstock')->where('kd_item', $item["kd_item"])->find_one();
				$ppn = [$item["exclude_ppn1"], $item["exclude_ppn2"], $item["exclude_ppn3"]][$item["supplierpilihan"] - 1]
				? "Exclude"
				: [$item["ppn1"], $item["ppn2"], $item["ppn3"]][$item["supplierpilihan"] - 1] . "%";
				$harga_ppn = [$item["exclude_ppn1"], $item["exclude_ppn2"], $item["exclude_ppn3"]][$item["supplierpilihan"] - 1]
				? $item["hargapilihan"]
				: [$item["harga_ppn1"], $item["harga_ppn2"], $item["harga_ppn3"]][$item["supplierpilihan"] - 1];
				$clist .= '<tr><td style="width: 3% ;vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none; background-color: #f7f7f7"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>
							<td style="width: 13% ;vertical-align: middle"><input type="text" name="no_pr[]" class="no_pr" value="'. $item["no_pr"] .'" style="width: 100%; background-color: transparent; border: none;" readonly>
							<input type="hidden" name="id_pr_detail[]" class="id_pr_detail" value="' . $item["id"] . '"/>
							<input type="hidden" name="max[]" class="max" value="' . $item["sisa"] . '"/></td>
							<td style="width: 20% ;vertical-align: middle"><input type="hidden" name="kd_item[]" class="kd_item" value="'. $item["kd_item"] .'">
							<input type="text" value="'. $y["nm_item"] .'" style="width: 100%; background-color: transparent; border: none;" readonly></td>
							<td style="width: 10% ;vertical-align: middle"><input type="text" name="harga[]" class="harga amount" value="'. $item["hargapilihan"] .'" style="width: 100%; background-color: transparent; border: none;" readonly></td>
							<td style="width: 10% ;vertical-align: middle"><input type="text" name="ppn[]" value="'. $ppn .'" style="width: 100%; background-color: transparent; border: none;" readonly></td>
							<td style="width: 10% ;vertical-align: middle"><input type="text" name="ppn[]" class="harga_ppn amount" value="'. $harga_ppn .'" style="width: 100%; background-color: transparent; border: none;" readonly></td>
							<td style="width: 10% ;vertical-align: middle"><input type="text" name="qty_req[]" class="qty_req" value='. $item["sisa"] .' style="width: 100%;"></td>
							<td style="width: 30% ;vertical-align: middle"><input type="text" name="keterangan[]" class="keterangan" style="width: 100%;"></td></tr>
				';
			};

			// <td style="width: 7% ;vertical-align: middle"><input type="number" name="garansi_bulan[]" class="garansi_bulan" placeholder="Bulan" min="0" style="width: 100%;"></td>
			// <td style="width: 7% ;vertical-align: middle"><input type="number" name="garansi_hari[]" class="garansi_hari" placeholder="Hari" min="0" style="width: 100%;"></td>

			$data = array(
					'clist'			=>	$clist);
			echo json_encode($data);
		} else {
			$data = array(
					'clist'	=>	'<option value="">Pilih Item Stock</option>');
			echo json_encode($data);
		}
		break;

	case 'render-status-pembayaran':
		$kode = _post('kode');
		if ($kode != '') {
			$y = ORM::for_table('po_bayar')->where('no_po', $kode)->find_one();
			if ($y) {
				$data = array(
					'tgl_bayar'=> $y['tgl_bayar'],
					'nilai_bayar'=> $y['nilai_bayar'],
					'no_po'=> $y['no_po']);
				echo json_encode($data);
			} else {
				$data = array(
					'tgl_bayar'=> '',
					'nilai_bayar'=> '',
					'no_po'=> '');
				echo json_encode($data);
			}
		} else {
			$data = array(
				'tgl_bayar'=> '',
				'nilai_bayar'=> '',
				'no_po'=> '');
			echo json_encode($data);
		}
		break;

   default:
        echo 'action not defined';
}