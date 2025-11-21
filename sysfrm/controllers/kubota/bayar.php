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
    $myCtrl = 'bayar';
}
_auth();
$ui->assign('_sysfrm_menu', 'pembayaran');
$ui->assign('_title', 'Daftar Pembayaran Angsuran - '. $config['CompanyName']);
$ui->assign('_st', 'Angsuran');
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
$spath = 'prog/'.$_SESSION['menu'].'/';
// $today = date('Ymd');
// $today1 = strtotime(date('Ymd'));
// $today = date('Ymd',strtotime('2019-06-01'));
// $today1 = strtotime('2019-03-01');

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'add':

        Event::trigger('bayar/add/');
		_auth1('BAYAR-ADD',$user['id']);

		$ui->assign('_sysfrm_menu1', 'bayar');
		$ui->assign('_sysfrm_menu2', 'bayar-add');
        $d = ORM::for_table('data_penjualan')->raw_query('select * from data_penjualan where isnull(tgl_lunas) and not isnull(tgl_cetakbast) order by no_jual')->find_many();
        $e = ORM::for_table('form_stock')->raw_query('select * from form_stock where isnull(no_transaksi) order by no_cetak')->find_many();
        $ui->assign('c', $c);
        $ui->assign('d', $d);
        $ui->assign('e', $e);
        $ui->assign('idate', date('d-m-Y'));
        //$ui->assign('idate1', date('d-m-Y',$today1));
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'add-bayar','modal','btn-top/btn-top','terbilang')));
        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
 ');



        $ui->display($spath.'add-bayar.tpl');






        break;

    case 'render-bayar':

        Event::trigger('bayar/render-bayar/');

        $id = _post('id');
		$angsuran = 0;
		$tangs = 'Angsuran';
		$tunggak = 0;
		$tdenda = 0;
		$msg = '';
		$today = date('Ymd',strtotime(_post('idate')));
		$today1 = strtotime(_post('idate'));
        $d = ORM::for_table('data_penjualan')->find_one($id);
		if($d) {
			$e = ORM::for_table('ar_card')->where('no_jual',$d['no_jual'])->order_by_desc('no_urut')->find_one();
			if($e) {
				if(floor(($today1 - strtotime($e['tgl']))/(60*60*24)) <0) {
					$msg='Tgl pembayaran lebih kecil dari tgl pembayaran terakhir !';
					$data = array(
							'msg'			=>	$msg,
							'id_cust'		=>	'',
							'no_jual'		=>	'',
							'account'		=>	'',
							'adrs'			=>	'',
							'angsuran'		=>	0,
							'tangs'			=>	'Angsuran',
							'tunggak'		=>	0,
							'tdenda'		=>	0,
							'tpiutang'		=>	0);
					echo json_encode($data);
				} else {
					$c = ORM::for_table('crm_accounts')->find_one($d['id_cust']);
					$address = $c['address'];
					$city = $c['city'];
					$state = $c['state'];
					$zip = $c['zip'];
					$country = $c['country'];
					$id_no = $c['id_no'];
					$adrs = "$address
$city
$state $zip
$country
No. KTP : $id_no
";
					$e = ORM::for_table('amortisasi')->raw_query('select * from amortisasi where no_jual="'.$d['no_jual'].'" and isnull(tgl_lunas) and tgl_jto>="'.$today.'" order by tgl_jto')->find_one();
					if($e) {
						$angsuran = $e['angsuran']-$e['jlh_bayar'];
						$tangs= 'Angs. '.romanic_number($e['angs_ke']).' ('.date('d-m-y',strtotime($e['tgl_jto'])).')';
						$tdenda += $e['total_denda'] - $e['jlh_byr_denda'];
					}
					$f = ORM::for_table('amortisasi')->raw_query('select * from amortisasi where no_jual="'.$d['no_jual'].'" and isnull(tgl_lunas) and tgl_jto<"'.$today.'" order by tgl_jto')->find_many();
					if($f) {
						foreach($f as $fs) {
							$tunggak += $fs['angsuran'] - $fs['jlh_bayar'];
							$tdenda += (floor(($today1 - strtotime($fs['tgl_jto']))/(60*60*24)) * ($fs['angsuran'] - $fs['jlh_bayar']) * 0.2 /100)-$fs['jlh_byr_denda'];
						}
					}
					$f = ORM::for_table('amortisasi')->raw_query('select * from amortisasi where no_jual="'.$d['no_jual'].'" and total_denda-jlh_byr_denda>0 and tgl_jto<"'.$today.'" order by tgl_jto')->find_many();
					if($f) {
						foreach($f as $fs) {
							$tdenda += $fs['total_denda']-$fs['jlh_byr_denda'];
						}
					}
					$g = ORM::for_table('amortisasi')->where('no_jual',$d['no_jual']);
					$saldo = $g->sum('angsuran');
					$saldo -= $g->sum('jlh_bayar');
					if($tdenda< 0)
						$tdenda = 0;
					$data = array(
							'msg'			=>	$msg,
							'id_cust'		=>	$c['id'],
							'no_jual'		=>	$d['no_jual'],
							'account'		=>	$c['account'],
							'adrs'			=>	$adrs,
							'angsuran'		=>	$angsuran,
							'tangs'			=>	$tangs,
							'tunggak'		=>	$tunggak,
							'tdenda'		=>	$tdenda,
							'tpiutang'		=>	$saldo);
					echo json_encode($data);
					
				}
			}
		} else {
			$data = array(
					'msg'			=>	'',
					'id_cust'		=>	'',
					'no_jual'		=>	'',
					'account'		=>	'',
					'adrs'			=>	'',
					'angsuran'		=>	0,
					'tangs'			=>	'Angsuran',
					'tunggak'		=>	0,
					'tdenda'		=>	0,
					'tpiutang'		=>	0);
			echo json_encode($data);
		}

        break;

    case 'view':

        Event::trigger('panjar/view/');
		_auth1('PANJAR-VIEW',$user['id']);

        $id = $routes['3'];
		$ui->assign('_sysfrm_menu1', 'panjar');
		$ui->assign('_sysfrm_menu2', 'panjar-list');
        $d = ORM::for_table('bayar_pesan')->find_one($id);
        if ($d) {
			$c = ORM::for_table('crm_accounts')->find_one($d['id_cust']);
			$e = ORM::for_table('data_pesanan')->where('no_pesan',$d['no_pesan'])->find_one();
			$ui->assign('account', $c['account']);
			$ui->assign('cid', $c['id']);
			$ui->assign('panjar', $e['panjar']);
			$ui->assign('bayar', $e['bayar']);
			$ui->assign('sisa', $e['panjar']-$e['bayar']);
			$ui->assign('d', $d);
			$ui->assign('idate', date('d-m-Y',strtotime($d['tgl_kw'])));
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'view-panjar','modal','btn-top/btn-top','terbilang')));
			$ui->assign('xjq', '
				 $(\'.amount\').autoNumeric(\'init\');
				 ');

						$ui->assign('jsvar', '
				_L[\'Working\'] = \''.$_L['Working'].'\';
				 ');



			$ui->display($spath.'view-panjar.tpl');
        }

        break;

    case 'add-post':

        Event::trigger('bayar/add-post/');

        $cid = _post('cid');
        $cid1 = _post('cid1');
		$tgl = date("Y-m-d",strtotime(_post('idate')));
		$bl=date('n',strtotime(_post('idate')));
		$th=date('Y',strtotime(_post('idate')));
		$piutang = Finance::amount_fix(_post('piutang'));
		$tdenda = Finance::amount_fix(_post('tdenda'));
		$jumlah = Finance::amount_fix(_post('jumlah'));
		$jumlah1 = Finance::amount_fix(_post('jumlah1'));
		$no_jual = _post('no_jual');

        $msg = '';

        if($cid == ''){
            $msg .= 'Belum mengisi No. Jual <br>';
        }
        if($cid1 == ''){
            $msg .= 'Belum mengisi No. Cetak <br>';
        }
		
		if($jumlah+$jumlah1 <= 0)
			$msg .= 'Belum mengisi Nilai Pembayaran Piutang <br>';

		$chk = ORM::for_table('bayar_angsuran')->where('no_cetak',$cid1)->find_one();
		if($chk) {
			$msg .= 'No. Cetak tersebut telah ada <br>';
		}

        if($msg == ''){
			$chk = ORM::for_table('bayar_angsuran')->raw_query('select * from bayar_angsuran where month(tgl_kw)='.$bl.' and year(tgl_kw)='.$th.' order by no_byr desc')->find_one();
			if($chk) {
				$no = ++$chk['no_byr'];
			} else {
				$no = 'BYR/'.date('m',strtotime($tgl)).'/'.$th.'/0001';
			}
			try
			{
			ORM::get_db()->beginTransaction();
				//Tambah ke tabel Bayar Angsuran
				$d = ORM::for_table('bayar_angsuran')->create();
				$d->no_byr = $no;
				$d->no_cetak = $cid1;
				$d->tgl_kw = $tgl;
				$d->id_cust = _post('id_cust');
				$d->no_jual = $no_jual;
				// $d->angsuran = $piutang;
				// $d->total_denda = $tdenda;
				$d->jlh_byr_angsuran = $jumlah;
				$d->jlh_byr_denda = $jumlah1;
				$d->add_by = $user['id'];
				$d->add_date = date('Ymd');
				$d->save();
				$cid = 1;
				
				if($jumlah >0) {
					//Update Tabel Amortisasi - Piutang
					$e = ORM::for_table('amortisasi')->raw_query('select * from amortisasi where no_jual="'.$no_jual.'" and isnull(tgl_lunas) order by tgl_jto')->find_many();
					$update_jumlah = $jumlah;
					foreach($e as $e1) {
						if(strtotime(_post('idate1')) > strtotime($e1['tgl_jto']))
							$hit_denda = floor((strtotime(_post('idate1')) - strtotime($e1['tgl_jto']))/(60*60*24)) * ($e1['angsuran'] - $e1['jlh_bayar']) * 0.2 /100;
						else
							$hit_denda = 0;


						//update nilai bayar piutang
						if($update_jumlah >= $e1['angsuran']-$e1['jlh_bayar']) {
							ORM::for_table('amortisasi')->raw_execute("update amortisasi set total_denda=total_denda+$hit_denda,jlh_bayar=angsuran,tgl_lunas='$tgl' where no_jual='$no_jual' and angs_ke=$e1[angs_ke]");

							//ambil saldo akhir bulan lalu
							$f = ORM::for_table('ar_card')->where('no_jual',$no_jual)->order_by_desc('no_urut')->find_one();
							if($f) {
								$jpokok = $e1['pokok'] - $f['kredit_pokok'];
								$jbunga = $e1['bunga'] - $f['kredit_bunga'];
								$sisa_pokok = $f['akhir_pokok']-$jpokok;
								$sisa_bunga = $f['akhir_bunga']-$jbunga;
							}
							else {
								$sisa_pokok = 0;
								$sisa_bunga = 0;
								$jpokok = 0;
								$jbunga = 0;
							}
							ORM::for_table('ar_card')->raw_execute("INSERT INTO ar_card (tgl,tgl_jto,angs_ke,angsuran,no_jual,no_transaksi,keterangan,no_cetak,kredit_pokok,kredit_bunga,akhir_pokok,akhir_bunga,denda,add_by,add_date)
								values('$tgl','$e1[tgl_jto]',$e1[angs_ke],$e1[angsuran],'$no_jual','$no','Angsuran ".romanic_number($e1['angs_ke'])."','$cid1',$jpokok,$jbunga,$sisa_pokok,$sisa_bunga,$hit_denda,'$user[id]','".date('Ymd')."')");
						}
						else {
							ORM::for_table('amortisasi')->raw_execute("update amortisasi set total_denda=total_denda+$hit_denda,jlh_bayar=jlh_bayar+$update_jumlah where no_jual='$no_jual' and angs_ke=$e1[angs_ke]");

							//ambil saldo akhir bulan lalu
							$f = ORM::for_table('ar_card')->where('no_jual',$no_jual)->order_by_desc('no_urut')->find_one();
							if($f) {
								if($update_jumlah >= $e1['pokok']) {
									$sisa_pokok = $f['akhir_pokok']-$e1['pokok'];
									$sisa_bunga = $f['akhir_bunga']-$update_jumlah+$e1['pokok'];
									$jpokok = $e1['pokok'];
									$jbunga = $update_jumlah - $e1['pokok'];
								} else {
									$sisa_pokok = $f['akhir_pokok']-$e1['pokok'];
									$sisa_bunga = $f['akhir_bunga']-$update_jumlah+$e1['pokok'];
									$jpokok = $update_jumlah;
									$jbunga = 0;
								}
							}
							else {
								$sisa_pokok = 0;
								$sisa_bunga = 0;
								$jpokok = 0;
								$jbunga = 0;
							}
							ORM::for_table('ar_card')->raw_execute("INSERT INTO ar_card (tgl,tgl_jto,angs_ke,angsuran,no_jual,no_transaksi,keterangan,no_cetak,kredit_pokok,kredit_bunga,akhir_pokok,akhir_bunga,denda,add_by,add_date)
								values('$tgl','$e1[tgl_jto]',$e1[angs_ke],$e1[angsuran],'$no_jual','$no','Angsuran ".romanic_number($e1['angs_ke'])."','$cid1',$jpokok,$jbunga,$sisa_pokok,$sisa_bunga,$hit_denda,'$user[id]','".date('Ymd')."')");
						}

						$update_jumlah -= $e1['angsuran']-$e1['jlh_bayar'];
						if($update_jumlah <= 0) {
							break;
						}
					}
				}
				if($jumlah1>0) {
					//Update Tabel Amortisasi - Denda
					$e = ORM::for_table('amortisasi')->raw_query('select * from amortisasi where no_jual="'.$no_jual.'" and total_denda-jlh_byr_denda>0 order by tgl_jto')->find_many();
					$update_denda = $jumlah1;
					foreach($e as $e1) {
						//update bayar denda
						if($update_denda >= $e1['total_denda']-$e1['jlh_byr_denda'])
							ORM::for_table('amortisasi')->raw_execute("update amortisasi set jlh_byr_denda=total_denda where no_jual='$no_jual' and angs_ke=$e1[angs_ke]");
						else
							ORM::for_table('amortisasi')->raw_execute("update amortisasi set jlh_byr_denda=jlh_byr_denda+$update_denda where no_jual='$no_jual' and angs_ke=$e1[angs_ke]");

						$update_denda -= $e1['total_denda']-$e1['jlh_byr_denda'];
						if($update_denda <= 0) {
							break;
						}
					}
					//update Tabel AR_Card - Denda
					// $e = ORM::for_table('ar_card')->raw_query('select * from ar_card where no_jual="'.$no_jual.'" and denda-byr_denda>0 order by no_urut')->find_many();
					$update_denda = $jumlah1;
					// foreach($e as $e1) {
						////update bayar denda
						// if($update_denda >= $e1['denda']-$e1['byr_denda'])
							// ORM::for_table('ar_card')->raw_execute("update ar_card set byr_denda=denda where no_jual='$no_jual' and no_urut=$e1[no_urut]");
						// else
							// ORM::for_table('ar_card')->raw_execute("update ar_card set byr_denda=byr_denda+$update_denda where no_jual='$no_jual' and no_urut=$e1[no_urut]");

						// $update_denda -= $e1['denda']-$e1['byr_denda'];
						// if($update_denda <= 0) {
							// break;
						// }
					// }
					$up = ORM::for_table('ar_card')->where('no_jual',$no_jual)->where('no_cetak',$cid1)->find_many();
					foreach ($up as $ups) {
						ORM::for_table('ar_card')->raw_execute("update ar_card set byr_denda=$update_denda where no_jual='$no_jual' and no_cetak='$cid1' and no_urut='$ups[no_urut]'");
						break;
					}
				}
				//Cek lunas semua - update tabel penjualan
				$h = ORM::for_table('ar_card')->where('no_jual',$no_jual)->order_by_desc('no_urut')->find_one();
				if($h) {
					if($h['akhir_pokok']+$h['akhir_bunga']<=0) {
						$i = ORM::for_table('amortisasi')->where('no_jual',$no_jual);
						$saldodenda = $i->sum('total_denda');
						$saldodenda -= $i->sum('jlh_byr_denda');
						if($saldodenda <=0)
							ORM::for_table('data_penjualan')->raw_execute("update data_penjualan set tgl_lunas='$tgl' where no_jual='$no_jual'");
					}
				}
				ORM::for_table('form_stock')->raw_execute("update form_stock set no_transaksi='$no',tgl_transaksi='$tgl',status='PAKAI' where no_cetak='$cid1'");
				ORM::get_db()->commit();
				_log1('Data Bayar Angsuran, No. Bayar : '.$no,$user['username'],$user['id']);

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

        Event::trigger('bayar/list/');
		_auth1('BAYAR-LIST',$user['id']);

        $ui->assign('_st', 'Daftar Pembayaran Angsuran');

        $name = _post('name');
        $filter = _post('filter');
        if($name != ''){
			$paginator = Paginator1::bootstrap('bayar_angsuran','ORM::for_table(bayar_angsuran)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_penjualan",array("a.no_jual","=","c.no_jual"),"c")->where_like("'.$filter.'","%"'.$name.'"%")->order_by_desc("no_byr")->find_many()',20);
			$d=ORM::for_table(bayar_angsuran)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("c.no_jual")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_penjualan",array("a.no_jual","=","c.no_jual"),"c")->where_like($filter,'%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc("no_byr")->find_many();
			$ui->assign('cari',$name);
			if($filter == 'no_pesan') {
				$ui->assign('jfilter','Filter No. Pesan');
			} else {
				$ui->assign('jfilter','Filter Nama');
			}
        }
        else{
			$paginator = Paginator1::bootstrap('bayar_angsuran','ORM::for_table(bayar_angsuran)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_penjualan",array("a.no_jual","=","c.no_jual"),"c")->order_by_desc("no_byr")->find_many()',20);
			$d=ORM::for_table(bayar_angsuran)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("c.no_jual")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_penjualan",array("a.no_jual","=","c.no_jual"),"c")->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc("no_byr")->find_many();
		}

        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'bayar');
		$ui->assign('_sysfrm_menu2', 'bayar-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','btn-top/btn-top',$spath.'list-bayar'))
);
		$ui->assign('xjq', '
			 $(\'.amount\').autoNumeric(\'init\');
			 ');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-bayar.tpl');

        break;


    case 'delete':

        Event::trigger('panjar/delete/');
		_auth1('PANJAR-DEL',$user['id']);


		$id = $routes['3'];
        $d = ORM::for_table('bayar_pesan')->find_one($id);
        if($d){
			$e = ORM::for_table('data_pesanan')->where('no_pesan',$d['no_pesan'])->find_one();
			if($e['no_jual'] <> null) {
				r2(U.'list/', 'e', 'No. Pesan tersebut telah terjadi penjualan');
			} else {
				try
				{
					ORM::get_db()->beginTransaction();
					$jumlah = $d['jumlah'];
					$no_pesan = $d['no_pesan'];
					$no_cetak = $d['no_cetak'];
					$tgl = date('Ymd');
					$userid = $user['id'];
					$d->tgl_batal = $tgl;
					$d->edit_by = $userid;
					$d->edit_date = $tgl;
					$d->save();
					ORM::for_table('data_pesanan')->raw_execute("update data_pesanan set bayar=bayar-$jumlah,tgl_lunas_panjar=null where no_pesan='$no_pesan'");
					ORM::for_table('form_stock')->raw_execute("update form_stock set status='BATAL',batal_by='$userid',batal_date='$tgl' where no_cetak='$no_cetak'");
					ORM::get_db()->commit();
					_log1('Batal Panjar: '.$d['no_pjr'],$user['username'],$user['id']);
					r2(U.'list/', 's', 'Batal Panjar berhasil');
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			}
        } else
			r2(U.'list/','e','Data Tidak ditemukan');

        break;

    default:
        echo 'action not defined';
}