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
    $myCtrl = 'itemstock';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'itemstock');
$ui->assign('_sysfrm_menu2', 'listitemstock');
$ui->assign('_title', 'Daftar Item Stock - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Stock');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$nama_user = $user["fullname"];
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'add':
        Event::trigger('itemstock/add/');
		_auth1('ITEMSTOCK-ADD',$user['id']);

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-itemstock','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-itemstock.tpl');
        break;

    case 'add-post':
        Event::trigger('itemstock/add-post/');
		_auth1('ITEMSTOCK-ADD',$user['id']);

        $nama = _post('nama');
        $merk = _post('merk');
        $tipe = _post('tipe');
		$kategori = _post('kategori');
        $spesifikasi = _post('spesifikasi');
        $reorder_time = intval(_post('reorder'));

		$msg = '';
        if($nama == ''){
            $msg .= 'Nama Item Stock tidak boleh kosong <br>';
        }
		if($kategori ==''){
			$msg .= 'Kategori tidak boleh kosong <br>';
		}
		if ($reorder_time < 0) {
			$msg .= 'Reorder Time tidak valid';
		}

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_itemstock')->raw_query('select * from daftar_itemstock order by kd_item desc')->find_one();
				if($chk) {
					$no = ++$chk['kd_item'];
				} else {
					$no = 'ITEMS/00001';
				}
				$d = ORM::for_table('daftar_itemstock')->create();

				$d->kd_item = $no;
				$d->nm_item = $nama;
                $d->merk = $merk;
                $d->tipe = $tipe;
				$d->kategori = $kategori;
                // $d->satuan = $satuan;
                // $d->qty_min = $qty;
                // $d->qty_max = $qty1;
                // $d->jumlah_per_satuan = $jumlahsatuan;
                // $d->satuan_harga = $satuanharga;
                $d->spesifikasi = $spesifikasi;
				$d->reorder_time = $reorder_time;
				$d->tempa = 'N';
				$d->active = 'Y';
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Item Stock :'.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('itemstock/add-post/_on_finished');
				echo $cid;
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
        } else {
            echo $msg;
        }
        break;

	case 'edit':
		Event::trigger('bengkel/edit/');
		_auth1('ITEMSTOCK-EDIT',$user['id']);

		$cid = $routes['3'];
		$d = ORM::for_table('daftar_itemstock')->find_one($cid);
		if($d){
			$ui->assign('d',$d);
			$ui->assign('cid',$cid);

			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-itemstock','dp/dist/datepicker.min','numeric')));
			$ui->display($spath.'edit-itemstock.tpl');
		}

		break;

    case 'edit-post':
        Event::trigger('itemstock/edit-post/');
		_auth1('ITEMSTOCK-EDIT',$user['id']);

        $id = _post('cid');
		$nama = _post('nama');
		$merk = _post('merk');
		$tipe = _post('tipe');
		$kategori = _post('kategori');
		// $satuan = _post('satuan');
		// $jumlahsatuan = str_replace(array(".", ","), array("", "."), _post('jumlahsatuan'));
		// $qty = str_replace(".", "", _post('qty'));
		// $qty1 = str_replace(".", "", _post('qty1'));
        // $satuanharga = _post('satuanharga');
		$spesifikasi = _post('spesifikasi');
		$reorder = _post('reorder');
		$aktif = _post('aktif');
		// $tempa = _post('tempa');
		if($nama == '') {
			$msg .= 'Nama Item Stock tidak boleh kosong';
		}
		if($kategori ==''){
			$msg .= 'Nama Kategori Tidak boleh kosong.<br>';
		}
        // if($satuan == ''){
        //     $msg .= 'Satuan Item Stock tidak boleh kosong.<br>';
        // }
        // if($jumlahsatuan == 0){
        //     $msg .= 'Jumlah Per Satuan Harga tidak boleh kosong.<br>';
        // }
        // if($satuanharga == ''){
        //     $msg .= 'Satuan Harga tidak boleh kosong.<br>';
        // }
        $d = ORM::for_table('daftar_itemstock')->find_one($id);
        $kode = $d['kd_item'];
        if($d){
            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d->nm_item = $nama;
					$d->merk = $merk;
					$d->tipe = $tipe;
					$d->kategori = $kategori;
					// $d->satuan = $satuan;
					// $d->qty_min = $qty;
					// $d->qty_max = $qty1;
					$d->spesifikasi = $spesifikasi;
					$d->reorder_time = $reorder;
                    // $d->satuan_harga = $satuanharga;
                    // $d->jumlah_per_satuan = $jumlahsatuan;
					// if($tempa == 'y') {
					// 	$d->tempa = 'Y';
					// } else {
					// 	$d->tempa = 'N';
					// }
					if($aktif == 'Y') {
						$d->active = 'Y';
					} else {
						$d->active = 'N';
					}

					$d->edit_by = $user['id'];
					$d->edit_date = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Item Stock : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
					Event::trigger('itemstock/add-post/_on_finished');
					echo $id;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
            } else {
                echo $msg;
            }

        }
        else{
            r2(U.'itemstock/list', 'e', 'Perusahaan tersebut tidak ditemukan');
        }

        break;

    case 'supplier':

        Event::trigger('itemstock/list/');

		_auth1('ITEMSTOCK-SUPPLIER',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_itemstock')->find_one($cid);
        if($d){
			$e = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nama_supplier")->select("b.alamat")->select("b.bidang")->select('b.nama_contact')->select('b.hp_contact')->left_outer_join("daftar_supplier",array("a.kd_supplier","=","b.kode_supplier"),"b")->where('a.kd_item',$d['kd_item'])->order_by_asc('a.kd_supplier')->find_many();
//			$e = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$d['kd_item'])->find_many();
			$clist = '';
			$clist = '<option value="">Pilih Supplier</option>';
			$tg = ORM::for_table('daftar_supplier')->order_by_asc('kode_supplier')->where('active','Y')->find_many();
				
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kode_supplier'].'">'.$r['kode_supplier'].'</option>';
			}

			$ui->assign('opt',$clist);
            $ui->assign('d',$d);
            $ui->assign('e',$e);
            $ui->assign('tg',$tg);
            $ui->assign('cid',$cid);

//			$ui->assign('paginator',$paginator);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-itemstock-supplier','numeric')));
			$ui->display($spath.'list-itemstock-supplier.tpl');
		}

        break;

    case 'supplier-post':
        $kd_item = _post('kode_item');
		$kd_supplier = explode(',', _post('kode_supplier'));
		// $hrg_beli = explode(',', _post('hrg_beli'));
		// $disc = explode(',', _post('disc'));
//		// $ppn = explode(',', _post('ppn'));
//        $status = explode(',', _post('status'));
		
		sort($kd_supplier);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($kd_supplier as $code) {
			if($cek == $code) {
				$flag = true;
				break;
			} else
				$flag = false;
			$cek = $code;
		}
		if($flag)
			$error .= 'Ada Kode Supplier double';
		
		if($error == '') {
			ORM::get_db()->beginTransaction();
			try {
				$i=0;
				foreach($kd_supplier as $code) {
					// $shrg = $hrg_beli[$i];
					// $sdisc = $disc[$i];
//					// $sppn = $ppn[$i];
//				    $sstatus = $status[$i];
					$e = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$kd_item)->where('kd_supplier',$code)->find_one();
					if($e) {
						$f = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$kd_item)->where('kd_supplier',$code)->find_one();
						$f->edit_by = $user['id'];
						$f->edit_date = date('Y-m-d H:i:s');
					} else {
						$f = ORM::for_table('daftar_itemstock_supplier')->create();
						$f->kd_item = $kd_item;
						$f->kd_supplier = $code;
						$f->add_by = $user['id'];
						$f->add_date = date('Y-m-d H:i:s');
                        $f->status = 'pending';
					}
					// $f->hrg_beli = $shrg;
					// $f->disc = $sdisc;
					// $f->ppn = $sppn;
					$f->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Edit Item Stock - Supplier : '.$kd_item,$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
						'dataval'		=>	1);
				echo json_encode($data);
				Event::trigger('itemstock/supplier/_on_finished');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
	//			throw $ex;
				$data = array( 'msg' => $ex);
				echo json_encode($data);
			}
		} else {
			$data = array( 'msg' => $error, 'dataval' => 'a');
			echo json_encode($data);
		}

		break;
		
    case 'list-submit':

        Event::trigger('itemstock/list/');

		_auth1('ITEMSTOCK-SUBMIT',$user['id']);
        $cid = $routes['3'];
		$msg = $routes['4'];
		$d = ORM::for_table('daftar_itemstock')->find_one($cid);
		if($d) {
			$e = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nm_supplier")->select("b.alamat")->select("b.contact")->select("b.phone")->left_outer_join("daftar_supplier",array("a.kd_supplier","=","b.kd_supplier"),"b")->where('a.kd_item',$d['kd_item'])->where("a.submit_by",0)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('a.kd_supplier')->find_many();

			$ui->assign('d',$d);
			$ui->assign('e',$e);
			$ui->assign('msg',$msg);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-itemstock-submit','numeric')));
			$ui->assign('jsvar', '
	_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	 ');
			$ui->display($spath.'list-itemstock-submit.tpl');
		}

        break;
    
    case 'submit-post':
        $kd_item = _post('kd_item');
		$kd_supplier = explode(',', _post('kd_supplier'));;
		
		sort($kd_supplier);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($kd_supplier as $code) {
			if($cek == $code and $code<>'') {
				$flag = true;
				break;
			} else
				$flag = false;
			$cek = $code;
		}
		if($flag)
			$error .= 'Ada Kode Supplier double';
		
		if($error == '') {
			ORM::get_db()->beginTransaction();
			try {
				$i=0;
				$supplier = '';
				foreach($kd_supplier as $code) {
					// $shrg = $hrg_beli[$i];
					// $sdisc = $disc[$i];
					// $sppn = $ppn[$i];
					// $saktif = $aktif[$i];

					$e = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$kd_item)->where('kd_supplier',$code)->find_one();
					$uid = $e['id'];
					$e->submit_by = $user['id'];
					$e->submit_date = date('Y-m-d H:i:s');
					$pin = generateRandomString(24);
					for ($xx = 0; $xx < 100; $xx++) {
						$cari = ORM::for_table('sys_users','dblogin')->where('pin',$pin)->find_one();
						if (!$cari) {
							break;
						} else {
							$pin = generateRandomString(24);
						}
					}
					$e->pin = $pin;
					$e->save();
					$i++;

					$f = ORM::for_table('daftar_supplier')->where('kd_supplier',$code)->find_one();
					$link = U.'itemstock/approve-itemstock-supplier/'.$uid.'/token_'.$pin;
					$supplier .= '
						<div style="padding:5px">
							Kode Supplier : '. $f["kd_supplier"] .' <br>
							Nama Supplier : '. $f["nm_supplier"] .' <br>
							Alamat : '. $f["alamat"] .' <br>
							Contact Person : '. $f["contact"] .'
						</div>
					';
				}

                $e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval ItemStock')->find_one();
                $f = ORM::for_table('daftar_itemstock')->where('kd_item', $kd_item)->find_one();
				$g = ORM::for_table('sys_appconfig')->where('setting', 'aproval_itemstock_supplier')->find_one();
                $subject = new Template($e['subject']);
                $subject->set('business_name', $config['CompanyName']);
                $subj = $subject->output();
                $message = new Template($e['message']);
                $message->set('business_name', $config['CompanyName']);
                $message->set('kd_item', $f['kd_item']);
                $message->set('nm_item', $f['nm_item']);
                $message->set('satuan', $f['satuan']);
                $message->set('jumlah_per_satuan', $f['jumlah_per_satuan']);
				$message->set('satuan_harga', $f['satuan_harga']);
				$message->set('supplier', $supplier);
				$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
                $message_o = $message->output();
                Notify_Email::_send($g['value'],$g['value'],$subj,$message_o);

				ORM::get_db()->commit();
				_log1('Pengajuan Item Stock - Supplier : '.$kd_item,$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
						'dataval'		=>	1);
				echo json_encode($data);
				Event::trigger('itemstock/submit/_on_finished');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
	//			throw $ex;
				$data = array( 'msg' => $ex);
				echo json_encode($data);
			}
		} else {
			$data = array( 'msg' => $error, 'dataval' => 'a');
			echo json_encode($data);
		}

		break;

	case 'list-approve':

        Event::trigger('itemstock/list-approve/');

		_auth1('ITEMSTOCK-APPROVE',$user['id']);
		$msg = $routes['3'];
		$e = ORM::for_table('daftar_itemstock_supplier')->table_alias("a")->select("a.*")->select("b.nm_supplier")->select("c.nm_item")->select("b.alamat")->select("b.contact")->select("b.bagian")->left_outer_join("daftar_supplier",array("a.kd_supplier","=","b.kd_supplier"),"b")->left_outer_join("daftar_itemstock",array("a.kd_item","=","c.kd_item"),"c")->where_not_equal("a.submit_by",0)->where_equal("a.approve_by",0)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('a.submit_date')->find_many();

		$ui->assign('e',$e);
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'listpersetujuan');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-itemstock-approve','numeric')));
		$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
		$ui->display($spath.'list-itemstock-approve.tpl');

        break;

    case 'approve-post':
        $kd_item = explode(',', _post('kd_item'));
		$kd_supplier = explode(',', _post('kd_supplier'));
		$status = explode(',', _post('status'));
//		echo "<script type='text/javascript'>alert('tes');</script>";
//		sort($kd_item);
		$cek = '';
		$i = 0;
		$flag = false;
		$error = '';
//		foreach($kd_item as $item) {
//			if($cek == $item.$kd_supplier[$i]) {
//				$flag = true;
//				break;
//			} else
//				$flag = false;
//			$cek = $item.$kd_supplier[$i];
//			$i++;
//		}
		if($flag)
			$error .= 'Ada Data yang double';
		
		if($error == '') {
			ORM::get_db()->beginTransaction();
			try {
				$i=0;
				foreach($kd_item as $code) {
					$sstatus = $status[$i];
                    
					$e = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$code)->where('kd_supplier',$kd_supplier[$i])->find_one();
                    $error .= $code;
                    $error .= $kd_supplier[$i];
					if($sstatus <> 'pending') {
						$e->approve_by = $user['id'];
						$e->approve_date = date('Y-m-d H:i:s');
					}
					$e->status = $sstatus;
					$e->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Persetujuan Item Stock - Supplier',$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Data Berhasil Diupdate',
						'dataval'		=>	1);
				echo json_encode($data);
				Event::trigger('itemstock/approve/_on_finished');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
	//			throw $ex;
				$data = array( 'msg' => $ex);
				echo json_encode($data);
			}
		} else {
			$data = array( 'msg' => $error, 'dataval' => 'a');
			echo json_encode($data);
		}

		break;

	case 'render-supplier':

        $kode = _post('kode');
		if($kode <> '') {
			$y = ORM::for_table('daftar_supplier')->where('kode_supplier',$kode)->find_one();
			if($y) {
				$data = array(
						'nama'		=>	$y['nama_supplier'],
						'alamat'	=>	$y['alamat'],
						'bidang' => $y['bidang'],
						'tgl_mulai_kerjasama' => $y['tgl_mulai_kerjasama'],
						'contact'	=>	$y['nama_contact'],
						'phone'		=>	$y['hp_contact']);
				echo json_encode($data);
			} else {
				$data = array(
						'nama'	=>	'',
						'alamat'	=>	'',
						'contact'	=>	'',
						'phone'		=>	'');
				echo json_encode($data);
			}
		} else {
			$data = array(
					'nama'	=>	'',
					'alamat'	=>	'',
					'contact'	=>	'',
					'phone'		=>	'');
			echo json_encode($data);
		}
		
    break;

	case 'render-detail-itemstock':

        $kode = _post('kode');
		if($kode <> '') {
			$y = ORM::for_table('daftar_itemstock')->where('kode_item',$kode)->find_one();
			if($y) {
				$data = array(
						'nama'=>	$y['nama_item'],
						'merk'	 =>	$y['merk'],
						'tipe'	 =>	$y['tipe'],
						'satuan' =>	$y['satuan'],
						'spesifikasi' =>	$y['spesifikasi'],
						'qtymin' => $y['qty_min'],
						'qtymax' =>	$y['qty_max'],
						'satuanharga' =>	$y['satuan_harga'],
						'jumlahpersatuan' =>	$y['jumlah_per_satuan']);
				echo json_encode($data);
			} else {
				$data = array(
					'nama'	=>	'',
					'merk'	=>	'',
					'tipe'	=>	'',
					'satuan'	=>	'',
					'spesifikasi'	=>	'',
					'qtymin'	=>	'',
					'qtymax'	=>	'',
					'satuanharga'	=>	'',
					'jumlahpersatuan'	=>	'');
				echo json_encode($data);
			}
		} else {
			$data = array(
				'nama'	=>	'',
				'merk'	=>	'',
				'tipe'	=>	'',
				'satuan'	=>	'',
				'spesifikasi'	=>	'',
				'qtymin'	=>	'',
				'qtymax'	=>	'',
				'satuanharga'	=>	'',
				'jumlahpersatuan'	=>	'');
			echo json_encode($data);
		}
		
    break;

case 'render-detail-supplier':

        $kode = _post('kode');
		if($kode <> '') {
			$y = ORM::for_table('daftar_supplier')->where('kode_supplier',$kode)->find_one();
			if($y) {
				$data = array(
						'nama'=>	$y['nama_supplier'],
						'bidang'	 =>	$y['bidang'],
						'asal_supplier'	 =>	$y['asal_supplier'],
						'foto_toko'	 =>	$y['foto_toko'],
						'telp_toko' =>	$y['telp_toko'],
						'hp_toko' =>	$y['hp_toko'],
						'email' =>	$y['email'],
						'website' => $y['website'],
						'tgl_mulai_kerjasama' =>	$y['tgl_mulai_kerjasama'],
						'lama_pembayaran' =>	$y['lama_pembayaran'],
						'rekomendasi_dari' =>	$y['rekomendasi_dari'],
						'nib' =>	$y['nib'],
						'file_nib' =>	$y['file_nib'],
						'npwp'	=>	$y['npwp'],
						'file_npwp'	=>	$y['file_npwp'],
						'file_kontrak'	=>	$y['file_kontrak'],
						'negara'	=>	$y['negara'],
						'provinsi'	=>	$y['provinsi'],
						'kota'	=>	$y['kota'],
						'kelurahan'	=>	$y['kelurahan'],
						'kecamatan'	=>	$y['kecamatan'],
						'kotamadya'	=>	$y['kotamadya'],
						'rtrw'	=>	$y['rtrw'],
						'alamat'	=>	$y['alamat'],
						'nomor_gedung'	=>	$y['nomor_gedung'],
						'kode_pos'	=>	$y['kode_pos'],
						'maps'	=>	$y['maps'],
						'file_ktp'	=>	$y['file_ktp'],
						'nik_ktp'	=>	$y['nik_ktp'],
						'nama_pemilik'	=>	$y['nama_pemilik'],
						'hp_pemilik'	=>	$y['hp_pemilik'],
						'nama_contact'	=>	$y['nama_contact'],
						'hp_contact'	=>	$y['hp_contact'],
						'nama_emergency'	=>	$y['nama_emergency'],
						'hp_emergency'	=>	$y['hp_emergency'],
						'bank'	=>	$y['bank'],
						'no_rekening'	=>	$y['no_rekening'],
						'an_rekening'	=>	$y['an_rekening'],
						'file_rekening'	=>	$y['file_rekening'],
						'active'	=>	$y['active'],
						'alasan_non_active'	=>	$y['alasan_non_active'],
						'blocked'	=>	$y['blocked'],
						'alasan_blocked'	=>	$y['alasan_blocked'],
						'blocked_by'	=>	$y['blocked_by'],
						'blocked_date'	=>	$y['blocked_date']
					);
				echo json_encode($data);
			} else {
				$data = array(
					'nama'	=>	'',
					'bidang'	=>	'',
					'asal_supplier'	=>	'',
					'foto_toko'	 =>	'',
					'telp_toko'	=>	'',
					'hp_toko'	=>	'',
					'email'	=>	'',
					'website'	=>	'',
					'tgl_mulai_kerjasama'	=>	'',
					'lama_pembayaran'	=>	'',
					'rekomendasi_dari'	=>	'',
					'nib'	=>	'',
					'file_nib'	=>	'',
					'npwp'	=>	'',
					'file_npwp'	=>	'',
					'file_kontrak'	=>	'',
					'negara'	=>	'',
					'provinsi'	=>	'',
					'kota'	=>	'',
					'kelurahan'	=>	'',
					'kecamatan'	=>	'',
					'kotamadya'	=>	'',
					'rtrw'	=>	'',
					'alamat'	=>	'',
					'nomor_gedung'	=>	'',
					'kode_pos'	=>	'',
					'maps'	=>	'',
					'file_ktp'	=>	'',
					'nik_ktp'	=>	'',
					'nama_pemilik'	=>	'',
					'hp_pemilik'	=>	'',
					'nama_contact'	=>	'',
					'hp_contact'	=>	'',
					'nama_emergency'	=>	'',
					'hp_emergency'	=>	'',
					'bank'	=>	'',
					'no_rekening'	=>	'',
					'an_rekening'	=>	'',
					'file_rekening'	=>	'',
					'active'	=>	'',
					'alasan_non_active'	=>	'',
					'blocked'	=>	'',
					'alasan_blocked'	=>	'',
					'blocked_by'	=>	'',
					'blocked_date'	=>	''
				);
				echo json_encode($data);
			}
		} else {
			$data = array(
				'nama'	=>	'',
				'bidang'	=>	'',
				'asal_supplier'	=>	'',
				'foto_toko'	 =>	'',
				'telp_toko'	=>	'',
				'hp_toko'	=>	'',
				'email'	=>	'',
				'website'	=>	'',
				'tgl_mulai_kerjasama'	=>	'',
				'lama_pembayaran'	=>	'',
				'rekomendasi_dari'	=>	'',
				'nib'	=>	'',
				'file_nib'	=>	'',
				'npwp'	=>	'',
				'file_npwp'	=>	'',
				'file_kontrak'	=>	'',
				'negara'	=>	'',
				'provinsi'	=>	'',
				'kota'	=>	'',
				'kelurahan'	=>	'',
				'kecamatan'	=>	'',
				'kotamadya'	=>	'',
				'rtrw'	=>	'',
				'alamat'	=>	'',
				'nomor_gedung'	=>	'',
				'kode_pos'	=>	'',
				'maps'	=>	'',
				'file_ktp'	=>	'',
				'nik_ktp'	=>	'',
				'nama_pemilik'	=>	'',
				'hp_pemilik'	=>	'',
				'nama_contact'	=>	'',
				'hp_contact'	=>	'',
				'nama_emergency'	=>	'',
				'hp_emergency'	=>	'',
				'bank'	=>	'',
				'no_rekening'	=>	'',
				'an_rekening'	=>	'',
				'file_rekening'	=>	'',
				'active'	=>	'',
				'alasan_non_active'	=>	'',
				'blocked'	=>	'',
				'alasan_blocked'	=>	'',
				'blocked_by'	=>	'',
				'blocked_date'	=>	''
			);
			echo json_encode($data);
		}
		
    break;

	// case 'approve-itemstock-supplier':
	// 	$v_uid = $routes['3'];
    //     $v_token = $routes['4'];
    //     $v_token = str_replace('token_','',$v_token);
        
	// 	$d = ORM::for_table('daftar_itemstock_supplier')->find_one($v_uid);
    //     if($d){
    //         $d_token = $d['pin'];
    //         if($v_token != $d_token){
    //             r2(U.'itemstock/list/','e','Invalid Activation Key');
    //         }
	// 		$d->approve_by = $user['id'];
	// 		$d->approve_date = date('Y-m-d H:i:s');
	// 		$d->status = 'aktif';
	// 		$d->pin = '';
	// 		$d->save();
			
    //         _msglog('s','Berhasil Melakukan Approval');
    //         r2(U.'itemstock/list/');

    //     } else {
	// 		r2(U.'itemstock/list/');
	// 	}
	// 	break;

	case 'hapus-supplier':

        $kode = _post('kode');
        $kd_item = _post('kode_item');
		if($kode <> '') {
			$y = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$kd_item)->where('kd_supplier',$kode)->find_one();
			if($y) {
				$z = ORM::for_table('daftar_itemstock_supplier')->where('kd_item',$kd_item)->where('kd_supplier',$kode)->delete_many();
				echo 1;
			} else echo 'a';
		} else echo 'a';
        break;

	case 'list':
		Event::trigger('itemstock/list/');
		_auth1('SHOW-ITEM-STOCK',$user['id']);

		$msg = $routes[3];
        $ui->assign('msg',$msg);
		$ui->assign('xfooter', Asset::js(array($spath.'list-itemstock','numeric')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\'; ');
		$ui->display($spath.'list-itemstock.tpl');
		break;

	default:
        echo 'action not defined';
}