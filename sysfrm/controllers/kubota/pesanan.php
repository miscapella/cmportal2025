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
    $myCtrl = 'pesanan';
}
_auth();
$ui->assign('_sysfrm_menu', 'transaksi');
$ui->assign('_title', 'Daftar Pesanan - '. $config['CompanyName']);
$ui->assign('_st', 'Pesanan');
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

        Event::trigger('pesanan/add/');
		_auth1('PESANAN-ADD',$user['id']);

		$ui->assign('_sysfrm_menu1', 'pesanan');
		$ui->assign('_sysfrm_menu2', 'pesanan-add');
        $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->select('phone')->where('code','Customer')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);
        $ui->assign('idate', date('d-m-Y'));
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'add-pesanan','modal','btn-top/btn-top')));
        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
 ');



        $ui->display($spath.'add-pesanan.tpl');






        break;

    case 'edit':

        Event::trigger('pesanan/edit/');
		_auth1('PESANAN-EDIT',$user['id']);

        $id = $routes['2'];
		$ui->assign('_sysfrm_menu1', 'pesanan');
		$ui->assign('_sysfrm_menu2', 'pesanan-list');
        $d = ORM::for_table('data_pesanan')->find_one($id);
        if ($d) {
			$c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->select('phone')->where('code','Customer')->order_by_asc('account')->find_many();
			$ui->assign('c', $c);
			$ui->assign('d', $d);
			$ui->assign('p_cid', $d['id_cust']);
			$ui->assign('idate', date('d-m-Y',strtotime($d['tgl_pesan'])));
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'edit-pesanan','modal','btn-top/btn-top')));
			$ui->assign('xjq', '
				 $(\'.amount\').autoNumeric(\'init\');
				 ');

						$ui->assign('jsvar', '
				_L[\'Working\'] = \''.$_L['Working'].'\';
				 ');



			$ui->display($spath.'edit-pesanan.tpl');
        }
        else{

        }


        break;

    case 'view':

        Event::trigger('pesanan/view/');
		_auth1('PESANAN-VIEW',$user['id']);

        $id = $routes['2'];
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

        Event::trigger('pesanan/add-post/');

        Event::trigger('pesanan/add-post/_on_start');

        $cid = _post('cid');
		$tgl = date("Y-m-d",strtotime(_post('idate')));
		$bl = date('n',strtotime(_post('idate')));
		$th = date('Y',strtotime(_post('idate')));
		$harga = Finance::amount_fix(_post('harga'));
		$panjar = Finance::amount_fix(_post('panjar'));

        $msg = '';

//check if tag is already exisit



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
			$chk = ORM::for_table('data_pesanan')->raw_query('select * from data_pesanan where month(tgl_pesan)='.$bl.' and year(tgl_pesan)='.$th.' order by no_pesan desc')->find_one();
			if($chk) {
				$no = ++$chk['no_pesan'];
			} else {
				$no = 'PSN/'.date('m',strtotime($tgl)).'/'.$th.'/0001';
			}
			$c = ORM::for_table('crm_accounts')->find_one($cid);
			if($c) {
				$account = $c['account'];
				$alamat = $c['address'];
			}
			else {
				$account = '';
				$alamat = '';
			}

            $d = ORM::for_table('data_pesanan')->create();

            $d->no_pesan = $no;
			$d->tgl_pesan = $tgl;
            $d->id_cust = $cid;
            $d->account = $account;
            $d->address = $alamat;
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
            _log1('Data Pesanan : '.$no,$user['username'],$user['id']);

            //

            Event::trigger('pesanan/add-post/_on_finished');
//            echo $cid;
			$data = array(
					'msg'			=>  'Data berhasil ditambahkan',
					'dataval'		=>	$cid);
			echo json_encode($data);
        }
        else{
//			echo $msg;
			$data = array( 'msg' => $msg);
            echo json_encode($data);
        }
        break;

    case 'list':

        Event::trigger('pesanan/list/');
		_auth1('PESANAN-LIST',$user['id']);

        $ui->assign('_st', 'Daftar Pesanan');

        $name = _post('name');
        $filter = _post('filter');
        //find all tags
        if($name != ''){
			$paginator = Paginator1::bootstrap('data_pesanan','ORM::for_table(data_pesanan)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->where_like("'.$filter.'","%"'.$name.'"%")->order_by_desc("tgl_pesan")->order_by_desc("no_pesan")->find_many()',20);
			$d=ORM::for_table(data_pesanan)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("b.phone")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->where_like($filter,'%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc("tgl_pesan")->order_by_desc("no_pesan")->find_many();
			$ui->assign('cari',$name);
			if($filter == 'no_pesan') {
				$ui->assign('jfilter','Filter No. Pesan');
			} else {
				$ui->assign('jfilter','Filter Nama');
			}
        }
        else{
			$paginator = Paginator1::bootstrap('data_pesanan','ORM::for_table(data_pesanan)->table_alias("a")->select("a.*")->select("b.account")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->order_by_desc("tgl_pesan")->order_by_desc("no_pesan")->find_many()',20);
			$d=ORM::for_table(data_pesanan)->table_alias("a")->select("a.*")->select("b.account")->select("b.address")->select("b.phone")->join("crm_accounts",array("a.id_cust","=","b.id"),"b")->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc("tgl_pesan")->order_by_desc("no_pesan")->find_many();
		}

        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'pesanan');
		$ui->assign('_sysfrm_menu2', 'pesanan-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('btn-top/btn-top',$spath.'list-pesanan'))
);
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-pesanan.tpl');

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
					$c = ORM::for_table('crm_accounts')->find_one($cid);
					if($c) {
						$account = $c['account'];
						$alamat = $c['address'];
					}
					else {
						$account = '';
						$alamat = '';
					}

					$d->tgl_pesan = $tgl;
					$d->id_cust = $cid;
					$d->account = $account;
					$d->address = $alamat;
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

        Event::trigger('pesanan/delete/');
		_auth1('PESANAN-DEL',$user['id']);


		$id = $routes['2'];
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

    default:
        echo 'action not defined';
}