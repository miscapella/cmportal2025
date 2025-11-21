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
    $myCtrl = 'panjar';
}
_auth();
$ui->assign('_sysfrm_menu', 'pembayaran');
$ui->assign('_title', 'Daftar Pembayaran Panjar - '. $config['CompanyName']);
$ui->assign('_st', 'Panjar');
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'add':

        Event::trigger('panjar/add/');
		_auth1('PANJAR-ADD',$user['id']);

		$ui->assign('_sysfrm_menu1', 'panjar');
		$ui->assign('_sysfrm_menu2', 'panjar-add');
        $d = ORM::for_table('data_pesanan')->raw_query('select * from data_pesanan where isnull(tgl_lunas_panjar) order by no_pesan')->find_many();
        $e = ORM::for_table('form_stock')->raw_query('select * from form_stock where isnull(no_transaksi) order by no_cetak')->find_many();
        $ui->assign('c', $c);
        $ui->assign('d', $d);
        $ui->assign('e', $e);
        $ui->assign('idate', date('d-m-Y'));
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'add-panjar','modal','btn-top/btn-top','terbilang')));
        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
 ');



        $ui->display($spath.'add-panjar.tpl');






        break;

    case 'render-panjar':

        Event::trigger('panjar/render-panjar/');

        $id = _post('id');
        $d = ORM::for_table('data_pesanan')->find_one($id);
		if($d) {
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
			$data = array(
					'id_cust'		=>	$c['id'],
					'no_pesan'		=>	$d['no_pesan'],
					'account'		=>	$c['account'],
					'adrs'			=>	$adrs,
					'tpanjar'		=>	$d['panjar'],
					'tbayar'		=>	$d['bayar'],
					'sisa'			=>	$d['panjar']-$d['bayar']);
			echo json_encode($data);
		} else {
			$data = array(
					'id_cust'		=>	'',
					'no_pesan'		=>	'',
					'account'		=>	'',
					'adrs'			=>	'',
					'tpanjar'		=>	0,
					'tbayar'		=>	0,
					'sisa'			=>	0);
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

        Event::trigger('panjar/add-post/');

        $cid = _post('cid');
        $cid1 = _post('cid1');
		$tgl = date("Y-m-d",strtotime(_post('idate')));
		$bl = date('n',strtotime(_post('idate')));
		$th = date('Y',strtotime(_post('idate')));
		$jumlah = Finance::amount_fix(_post('jumlah'));
		$sisa = Finance::amount_fix(_post('sisa'));
		$no_pesan = _post('no_pesan');

        $msg = '';

        if($cid == ''){
            $msg .= 'Belum mengisi No. Pesan <br>';
        }
        if($cid1 == ''){
            $msg .= 'Belum mengisi No. Cetak <br>';
        }
		
		if($jumlah <= 0)
			$msg .= 'Belum mengisi Nilai Pembayaran <br>';

		$cek = ORM::for_table('bayar_pesan')->where('no_cetak',$cid1)->find_one();
		if($cek) {
			$msg .= 'No. Cetak tersebut telah ada <br>';
		}

        if($msg == ''){
			$chk = ORM::for_table('bayar_pesan')->raw_query('select * from bayar_pesan where month(tgl_kw)='.$bl.' and year(tgl_kw)='.$th.' order by no_pjr desc')->find_one();
			if($chk) {
				$no = ++$chk['no_pjr'];
			} else {
				$no = 'BPS/'.date('m',strtotime($tgl)).'/'.$th.'/0001';
			}

			try
			{
			ORM::get_db()->beginTransaction();
				$d = ORM::for_table('bayar_pesan')->create();

				$d->no_pjr = $no;
				$d->tgl_kw = $tgl;
				$d->id_cust = _post('id_cust');
				$d->no_pesan = $no_pesan;
				$d->no_cetak = $cid1;
				$d->jumlah = $jumlah;
				$d->add_by = $user['id'];
				$d->add_date = date('Ymd');
				$d->save();
				$cid = 1;
				if($sisa-$jumlah <= 0)
					ORM::for_table('data_pesanan')->raw_execute("update data_pesanan set bayar=bayar+$jumlah,tgl_lunas_panjar='$tgl' where no_pesan='$no_pesan'");
				else
					ORM::for_table('data_pesanan')->raw_execute("update data_pesanan set bayar=bayar+$jumlah where no_pesan='$no_pesan'");
					
				ORM::for_table('form_stock')->raw_execute("update form_stock set no_transaksi='$no_pesan',tgl_transaksi='$tgl',status='PAKAI' where no_cetak='$cid1'");
				ORM::get_db()->commit();
				_log1('Data Panjar : '.$no,$user['username'],$user['id']);

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

        Event::trigger('panjar/list/');
		_auth1('PANJAR-LIST',$user['id']);

        $ui->assign('_st', 'Daftar Panjar');

        $name = _post('name');
        $filter = _post('filter');
        if($name != ''){
			$paginator = Paginator1::bootstrap('bayar_pesan','ORM::for_table(bayar_pesan)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_pesanan",array("a.no_pesan","=","c.no_pesan"),"c")->where_like("'.$filter.'","%"'.$name.'"%")->order_by_desc("no_pjr")->find_many()',20);
			$d=ORM::for_table(bayar_pesan)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("c.no_jual")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_pesanan",array("a.no_pesan","=","c.no_pesan"),"c")->where_like($filter,'%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pjr')->find_many();
			$ui->assign('cari',$name);
			if($filter == 'no_pesan') {
				$ui->assign('jfilter','Filter No. Pesan');
			} else {
				$ui->assign('jfilter','Filter Nama');
			}
        }
        else{
			$paginator = Paginator1::bootstrap('bayar_pesan','ORM::for_table(bayar_pesan)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_pesanan",array("a.no_pesan","=","c.no_pesan"),"c")->order_by_desc("no_pjr")->find_many()',20);
			$d=ORM::for_table(bayar_pesan)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("c.no_jual")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->join("data_pesanan",array("a.no_pesan","=","c.no_pesan"),"c")->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('no_pjr')->find_many();
		}

        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'panjar');
		$ui->assign('_sysfrm_menu2', 'panjar-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('btn-top/btn-top',$spath.'list-panjar'))
);
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-panjar.tpl');

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