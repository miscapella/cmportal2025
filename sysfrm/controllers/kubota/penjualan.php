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
    $myCtrl = 'penjualan';
}
_auth();
$ui->assign('_sysfrm_menu', 'transaksi');
$ui->assign('_title', 'Daftar Penjualan - '. $config['CompanyName']);
$ui->assign('_st', 'Penjualan');
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
$spath = 'prog/'.$_SESSION['menu'].'/';
$rate=3;

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'add':

        Event::trigger('penjualan/add/');
		_auth1('PENJUALAN-ADD',$user['id']);

		$ui->assign('_sysfrm_menu1', 'penjualan');
		$ui->assign('_sysfrm_menu2', 'penjualan-add');
		$c=ORM::for_table('data_pesanan')->raw_query('select * from data_pesanan where not isnull(tgl_lunas_panjar) and isnull(no_jual) order by no_pesan')->find_many();
        $ui->assign('c', $c);
        $ui->assign('idate', date('d-m-Y'));
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'add-penjualan','modal','btn-top/btn-top')));
        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
 ');



        $ui->display($spath.'add-penjualan.tpl');






        break;

    case 'render-pesan':
		$id = _post('cid');
		$d = ORM::for_table('data_pesanan')->find_one($id);
		if($d) {
			$e = ORM::for_table('crm_accounts')->find_one($d['id_cust']);
			$data = array(
					'id_cust'		=>  $d['id_cust'],
					'no_pesan'		=>  $d['no_pesan'],
					'nama_cust'		=>  $e['account'],
					'alamat'		=>  $e['address'],
					'no_ktp'		=>  $e['id_no'],
					'agama'			=>  $e['agama'],
					'no_hp'			=>  $e['phone'],
					'email'			=>  $e['email'],
					'merk'			=>	$d['merk'],
					'type'			=>	$d['type_mobil'],
					'thn_buat'		=>	$d['thn_buat'],
					'warna'			=>	$d['warna'],
					'harga'			=>	$d['harga'],
					'panjar'		=>	$d['panjar'],
					'bayar'			=>	$d['bayar']);
			echo json_encode($data);
		}
		break;
		
    case 'edit':

        Event::trigger('penjualan/edit/');
		_auth1('PENJUALAN-EDIT',$user['id']);

        $id = $routes['3'];
		$ui->assign('_sysfrm_menu1', 'penjualan');
		$ui->assign('_sysfrm_menu2', 'penjualan-list');
        $d = ORM::for_table('data_penjualan')->find_one($id);
        if ($d) {
			$c=ORM::for_table('data_pesanan')->raw_query('select * from data_pesanan where not isnull(tgl_lunas_panjar) and isnull(no_jual) order by no_pesan')->find_many();
			$ui->assign('c', $c);
			$ui->assign('d', $d);
			$ui->assign('p_cid', $d['no_pesan']);
			$ui->assign('idate', date('d-m-Y',strtotime($d['tgl_jual'])));
			$ui->assign('idate1', date('d-m-Y',strtotime($d['tgl_jto'])));
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'edit-penjualan','modal','btn-top/btn-top')));
			$ui->assign('xjq', '
				 $(\'.amount\').autoNumeric(\'init\');
				 ');

						$ui->assign('jsvar', '
				_L[\'Working\'] = \''.$_L['Working'].'\';
				 ');



			$ui->display($spath.'edit-penjualan.tpl');
        }
        else{

        }


        break;

    case 'view':

        Event::trigger('pesanan/view/');
		_auth1('PESANAN-VIEW',$user['id']);

        $id = $routes['3'];
		$ui->assign('_sysfrm_menu1', 'pesanan');
		$ui->assign('_sysfrm_menu2', 'pesanan-list');
        $d = ORM::for_table('data_pesanan')->find_one($id);
        if ($d) {
			$c = ORM::for_table('crm_accounts')->find_one($d['id_cust']);
			$ui->assign('account', $c['account']);
			$ui->assign('id_cust', $d['id_cust']);
			$ui->assign('d', $d);
			$ui->assign('idate', date('d-m-Y',strtotime($d['tgl_pesan'])));
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'view-pesanan','modal','btn-top/btn-top')));
			$ui->assign('xjq', '
				 $(\'.amount\').autoNumeric(\'init\');
				 ');

						$ui->assign('jsvar', '
				_L[\'Working\'] = \''.$_L['Working'].'\';
				 ');



			$ui->display($spath.'view-pesanan.tpl');
        }

        break;

    case 'add-post':

        Event::trigger('penjualan/add-post/');
		
		$cid = _post('cid');
		$tgl=date("Ymd",strtotime(_post('idate')));
		$bl=date('n',strtotime(_post('idate')));
		$th=date('Y',strtotime(_post('idate')));
		$idate1 = date('Ymd',strtotime(_post('idate1')));
		$harga=Finance::amount_fix($_POST['harga']);
		$by_surat=Finance::amount_fix($_POST['by_surat']);
		$disc=Finance::amount_fix($_POST['disc']);
		$panjar=Finance::amount_fix(_post('panjar'));
		$jumlah = Finance::amount_fix(_post('jumlah'));
		$total=$jumlah;
		$totPokok = 0;
		$totBunga = 0;
		$jenisk = _post('jenisk');
		$lama = _post('lama');
		$chassis = _post('chassis');
		$engine = _post('engine');
		$merk = _post('merk');
		$type = _post('type');
		$tbuat = _post('tbuat');
		$warna = _post('warna');
		$no_pesan = _post('no_pesan');
		$id_cust = _post('id_cust');
		$status = _post('status');
		if(_post('optbayar')=='tunai') {
			$cara = 'tunai';
			$jenisk = 0;
			$lama = 0;
		} else {
			$cara = 'kredit';
			if($idate < $tgl)
				$msg .= 'Kesalahan input Tgl Jatuh Tempo I <br>';
		}

        $msg = '';

        if($cid == '')
            $msg .= 'Belum mengisi No. Pesanan <br>';
		if($harga == 0)
			$msg .= 'Harga tidak boleh Nol <br>';
		if($chassis == '')
			$msg .= 'No. Chassis belum diisi <br>';
		if($engine == '')
			$msg .= 'No. Engine belum diisi <br>';
		if($status == 'tdk')
			$msg .= 'No. Chassis/ No. Engine telah ada <br>';
		if($merk == '')
			$msg .= 'Merk belum diisi <br>';
		if($type == '')
			$msg .= 'Type Mobil belum diisi <br>';
		if($tbuat == '')
			$msg .= 'Tahun Buat belum diisi <br>';
		if($warna == '')
			$msg .= 'Warna belum diisi <br>';
		if($jumlah <= 0)
			$msg .= 'Nilai Harga Penjualan harus lebih besar dari Nol <br>';

        if($msg == ''){
			$chk = ORM::for_table('data_penjualan')->raw_query('select * from data_penjualan where month(tgl_jual)='.$bl.' and year(tgl_jual)='.$th.' order by no_jual desc')->find_one();
			if($chk) {
				$no = ++$chk['no_jual'];
			} else {
				$no = 'PJL/'.date('m',strtotime($tgl)).'/'.$th.'/0001';
			}

			try
			{
				ORM::get_db()->beginTransaction();
				$c = ORM::for_table('crm_accounts')->find_one($id_cust);
				if($c) {
					$account = $c['account'];
					$alamat = $c['address'];
				}
				else {
					$account = '';
					$alamat = '';
				}
				
				$d = ORM::for_table('data_penjualan')->create();

				$d->no_jual = $no;
				$d->no_pesan = $no_pesan;
				$d->tgl_jual = $tgl;
				$d->id_cust = $id_cust;
				$d->account = $account;
				$d->address = $alamat;
				$d->no_chassis = strtoupper($chassis);
				$d->no_engine = strtoupper($engine);
				$d->merk = $merk;
				$d->type_mobil = $type;
				$d->thn_buat = $tbuat;
				$d->warna = $warna;
				$d->kondisi = 'baru';
				$d->cara = $cara;
				if($cara=='kredit')
					$d->tgl_jto = $idate1;
				$d->harga_kosong = $harga;
				$d->by_surat = $by_surat;
				$d->discount = $disc;
				$d->panjar = $panjar;
				$d->jenis = $jenisk;
				$d->lama = $lama;
				$d->add_by = $user['id'];
				$d->add_date = date('Ymd');
				$d->save();
				$cid = 1;
				
				//update Data Pesanan
				ORM::for_table('data_pesanan')->raw_execute("update data_pesanan set no_jual='$no',tgl_jual='$tgl' where no_pesan='$no_pesan'");
				
				ORM::get_db()->commit();
				_log1('Data Pejualan : '.$no,$user['username'],$user['id']);

				$data = array(
						'msg'			=>  'Data berhasil ditambahkan',
						'dataval'		=>	$cid);
				echo json_encode($data);
 			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
       }
        else{
//			echo $msg;
			$data = array( 'msg' => $msg);
            echo json_encode($data);
        }
        break;

    case 'list':

        Event::trigger('penjualan/list/');
		_auth1('PENJUALAN-LIST',$user['id']);

        $ui->assign('_st', 'Daftar Penjualan');

        $name = _post('name');
        $filter = _post('filter');
        //find all tags
        if($name != ''){
			$paginator = Paginator1::bootstrap('data_penjualan','ORM::for_table(data_penjualan)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->where_like("'.$filter.'","%"'.$name.'"%")->order_by_desc("tgl_jual")->order_by_desc("no_jual")->find_many()',20);
			$d=ORM::for_table(data_penjualan)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("b.phone")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->where_like($filter,'%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('tgl_jual')->order_by_desc("no_jual")->find_many();
			$ui->assign('cari',$name);
			if($filter == 'no_jual') {
				$ui->assign('jfilter','Filter No. Jual');
			} elseif($filter == 'no_pesan') {
				$ui->assign('jfilter','Filter No. Pesan');
			} elseif($filter == 'b.account') {
				$ui->assign('jfilter','Filter Nama');
			} elseif($filter == 'no_chassis') {
				$ui->assign('jfilter','Filter No. Chasssis');
			} else {
				$ui->assign('jfilter','Filter No. Engine');
			}
        }
        else{
			$paginator = Paginator1::bootstrap('data_penjualan','ORM::for_table(data_penjualan)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->order_by_desc("tgl_jual")->order_by_desc("no_jual")->find_many()',20);
			$d=ORM::for_table(data_penjualan)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("b.phone")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc("tgl_jual")->order_by_desc('no_jual')->find_many();
		}

        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'penjualan');
		$ui->assign('_sysfrm_menu2', 'penjualan-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('btn-top/btn-top',$spath.'list-penjualan'))
);
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-penjualan.tpl');

        break;


    case 'edit-post':

        Event::trigger('pesanan/edit-post/');


        $id = _post('fcid');
        $d = ORM::for_table('data_pesanan')->find_one($id);
        if($d){
			if($d['no_jual'] == '') {
				$cid = _post('cid');
				$tgl = date("Y-m-d",strtotime(_post('idate')));
				$bl = date('n',strtotime(_post('idate')));
				$th = date('Y',strtotime(_post('idate')));
				$harga = Finance::amount_fix(_post('harga'));
				$panjar = Finance::amount_fix(_post('panjar'));

				$msg = '';

				if($cid == ''){
					$msg .= 'Belum mengisi customer <br>';
				}
				
				if(_post('merk')== '')
					$msg .= 'Merk belum diisi <br>';
				if(_post('type')== '')
					$msg .= 'Type belum diisi <br>';
				if(_post('tahun')== '')
					$msg .= 'Tahun Pembuatan belum diisi <br>';
				if(_post('warna')== '')
					$msg .= 'Warna belum diisi <br>';
				if($harga == 0)
					$msg .= 'Harga tidak boleh Nol <br>';

				if($msg == ''){

					$d->tgl_pesan = $tgl;
					$d->id_cust = $cid;
					$d->merk = _post('merk');
					$d->type_mobil = _post('type');
					$d->thn_buat = _post('tahun');
					$d->warna = _post('warna');
					$d->kondisi = 'Baru';
					$d->harga = $harga;
					$d->panjar = $panjar;
					$d->keterangan = _post('notes');
					$d->add_by = $user['id'];
					$d->add_date = date('Ymd');
					$d->save();
					$cid = 1;
					_log1('Edit Data Pesanan : '.$d['no_pesan'],$user['username'],$user['id']);
					Event::trigger('pesanan/add-post/_on_finished');
		//            echo $cid;
					$data = array(
							'msg'			=>  'Data berhasil disimpan',
							'dataval'		=>	$cid);
					echo json_encode($data);
				} else {
					$data = array( 'msg' => $msg);
					echo json_encode($data);
				}
			} else {
				$data = array( 'msg' => 'Telah ada transaksi. Data tidak bisa diedit');
				echo json_encode($data);
			}
        }
        else{
			$data = array( 'msg' => 'No. Pesanan tidak ditemukan');
			echo json_encode($data);
        }

        break;
    case 'delete':

        Event::trigger('penjualan/delete/');
		_auth1('PENJUALAN-DEL',$user['id']);


		$id = $routes['3'];
		$id = str_replace('_','/',$id);
        $d = ORM::for_table('data_pesanan')->where('no_pesan',$id)->find_one();
        if($d){
			if($d['bayar'] > 0 or $d['no_jual']<> '') {
				r2(U.'list/', 'e', 'Telah ada transaksi pada pesanan tersebut');
			} else {
				$d->delete();
				_log1('Deleted Pesanan: '.$id,$user['username'],$user['id']);
				r2(U.'list/', 's', 'Pesanan Berhasil di hapus');
			}
        } else
			r2(U.'list/','e',$id);

        break;

    case 'cetak':

        Event::trigger('penjualan/bast/');
		_auth1('PENJUALAN-BAST',$user['id']);

		$id = $routes['3'];
		$bl=date('n');
		$th=date('Y');
		$chk = ORM::for_table('data_penjualan')->raw_query('select * from data_penjualan where year(tgl_jual)='.$th.' order by no_bast desc')->find_one();
		if($chk['no_bast'] <> '') {
			$no1 = substr($chk['no_bast'],0,3);
			$no2 = substr($chk['no_bast'],3);
			$no = str_pad(++$no1,3,"0",STR_PAD_LEFT) .$no2;
		} else {
			$no = '001/CM-KBT/'.romanic_number($bl).'/'.$th;
		}

		$d = ORM::for_table('data_penjualan')->find_one($id);
		if($d){
			try
			{
				ORM::get_db()->beginTransaction();
				$d->tgl_cetakbast = date('Ymd');
				$d->no_bast = $no;
				$d->save();

				//update Amortisasi
				$cara = $d['cara'];
				$jenisk = $d['jenis'];
				$lama = (int)$d['lama'];
				$no_pesan = $d['no_pesan'];
				$totPokok = 0;
				$totBunga = 0;
				$tgl=date('Ymd');
				$tgl_jto1 = $d['tgl_jto'];
				$panjar = $d['panjar'];
				$total = $d['harga_kosong']+$d['by_surat']-$d['discount']-$panjar;
				if($cara=='kredit') {
					$pokok1=(int) (100000*ceil((($total)/intval($lama))/100000));
					$pokok2=(int) ($total-($pokok1*(intval($lama)-1)));
					$lama1=1;
					$hitpokok=0;
					$hitung_pokok=0;
					$pokok=0;
					$sisa=$total;
					$bunga=0;
					$totPokok = $panjar;
					for ($x = 0; $x < $lama; $x++) {
						if($x+1<>$lama) {
							$hitpokok += $pokok1;
							$hitung_pokok = $pokok1;
							if($lama1==intval($jenisk)) {
								$pokok = $hitpokok;
								$hitpokok=0;
								$lama1=0;
							}
							else
								$pokok=0;
						}
						else {
							$hitung_pokok = $pokok2;
							$pokok=$hitpokok+$pokok2;
						}
						$sisa = $sisa-($x+1<>$lama ? $pokok1 : $pokok2);
						$bunga = ($sisa*$rate/100);
						$angsuran=$pokok+$bunga;
						$totPokok += $pokok;
						$totBunga += $bunga;
						$tgl_jto=date("Ymd", strtotime("+$x month", strtotime($tgl_jto1)));
						ORM::for_table('amortisasi')->raw_execute("insert into amortisasi (no_jual,angs_ke,tgl_jto,hitung_pokok,pokok,bunga,angsuran,sisa_pinjaman,add_by,add_date) 
							values ('$d[no_jual]',$x+1,'$tgl_jto',$hitung_pokok,$pokok,$bunga,$angsuran,$sisa,'$user[id]','".date('Ymd')."')");
						$lama1++;
					}
				} else {
					$totBunga = 0;
				}
				$totPokok = $total+$panjar;
				
				//update AR Card
				//update Nilai jual
				ORM::for_table('ar_card')->raw_execute("INSERT INTO ar_card (tgl,no_jual,no_transaksi,keterangan,debet_pokok,akhir_pokok,add_by,add_date)
					values('$tgl','$d[no_jual]','$d[no_jual]','PENJUALAN',$totPokok,$totPokok,'$user[id]','$tgl')");
				//update nilai pembayaran panjar
				$f = ORM::for_table('bayar_pesan')->raw_query('select * from bayar_pesan where no_pesan="'.$no_pesan.'" and isnull(tgl_batal) order by tgl_kw')->find_many();
				foreach($f as $fs){
					if($fs['tgl_kw']< $tgl)
						$tgl1 = $tgl;
					else
						$tgl1 = $fs['tgl_kw'];
					$totPokok = $totPokok - $fs['jumlah'];
					ORM::for_table('ar_card')->raw_execute("INSERT INTO ar_card (tgl,no_jual,no_transaksi,keterangan,no_cetak,kredit_pokok,akhir_pokok,add_by,add_date)
						values('$tgl1','$d[no_jual]','".$fs['no_pjr']."','B. PANJAR','".$fs['no_cetak']."',".$fs['jumlah'].",$totPokok,'$user[id]','".date('Ymd')."')");
				}
				ORM::for_table('ar_card')->raw_execute("INSERT INTO ar_card (tgl,no_jual,keterangan,debet_bunga,akhir_pokok,akhir_bunga,add_by,add_date)
					values('$tgl1','$d[no_jual]','BUNGA ANGSURAN',$totBunga,$totPokok,$totBunga,'$user[id]','$tgl')");

				ORM::get_db()->commit();

				_log1('Cetak Bast: '.$d['no_bast'],$user['username'],$user['id']);
				r2(U.'list','s', 'Cetak Bast Berhasil');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		} else
			r2(U.'list/','e',$id);

        break;
    case 'cetak1':

        Event::trigger('penjualan/bast/');
		_auth1('PENJUALAN-BAST',$user['id']);

		$id = $routes['3'];
		$d = ORM::for_table('data_penjualan')->find_one($id);
		if($d){
			$e = ORM::for_table('bayar_angsuran')->where('no_jual',$d['no_jual'])->sum('jlh_byr_angsuran');
			if($e <= 0) {
				try
				{
					ORM::get_db()->beginTransaction();
					$d->tgl_cetakbast = null;
					$d->no_bast = null;
					$d->save();

					ORM::for_table('ar_card')->raw_execute("delete from ar_card where no_jual='$d[no_jual]'");
					ORM::for_table('amortisasi')->raw_execute("delete from amortisasi where no_jual='$d[no_jual]'");
					ORM::get_db()->commit();

					_log1('Batal Cetak Bast: '.$d['no_bast'],$user['username'],$user['id']);
					r2(U.'list','s', 'Batal Cetak Bast');
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else {
				r2(U.'list/','e','Telah ada transaksi Pembayaran !');
			}
		} else
			r2(U.'list/','e',$id);

        break;
    case 'ctk-fkt':

        Event::trigger('penjualan/faktur/');
		_auth1('PENJUALAN-FAKTUR',$user['id']);

		$id = $routes['3'];
		$bl=date('n');
		$th=date('Y');
		$chk = ORM::for_table('data_penjualan')->raw_query('select * from data_penjualan where year(tgl_jual)='.$th.' order by no_faktur desc')->find_one();
		if($chk['no_faktur'] <> '') {
			$no1 = substr($chk['no_faktur'],0,3);
			$no2 = substr($chk['no_faktur'],3);
			$no = str_pad(++$no1,3,"0",STR_PAD_LEFT) .$no2;
		} else {
			$no = '001/KBT/'.date('m').'/'.$th;
		}

		$d = ORM::for_table('data_penjualan')->find_one($id);
		if($d){
			try
			{
				ORM::get_db()->beginTransaction();
				$d->tgl_faktur = date('Ymd');
				$d->no_faktur = $no;
				$d->save();

				ORM::get_db()->commit();

				_log1('Cetak Faktur: '.$d['no_faktur'],$user['username'],$user['id']);
				r2(U.'list','s', 'Cetak Faktur Berhasil');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		} else
			r2(U.'list/','e',$id);

        break;
    case 'ctk-fkt1':

        Event::trigger('penjualan/faktur/');
		_auth1('PENJUALAN-FAKTUR',$user['id']);

		$id = $routes['3'];
		$d = ORM::for_table('data_penjualan')->find_one($id);
		if($d){
			try
			{
				ORM::get_db()->beginTransaction();
				$d->tgl_faktur = null;
				$d->no_faktur = null;
				$d->save();

				ORM::get_db()->commit();

				_log1('Batal Cetak Faktur: '.$d['no_faktur'],$user['username'],$user['id']);
				r2(U.'list','s', 'Batal Cetak Faktur');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		} else
			r2(U.'list/','e',$id);

        break;

	case 'cekchseng':
		$chassis = $routes['3'];
		$engine = $routes['4'];
		$d = ORM::for_table('data_penjualan')->where('no_chassis',$chassis)->where('no_engine',$engine)->find_one();
		if($d)
			echo "<img src='".$_theme."/img/drop.png'>";
		else
			echo "<img src='".$_theme."/img/tick.gif'>";

		break;
   default:
        echo 'action not defined';
}