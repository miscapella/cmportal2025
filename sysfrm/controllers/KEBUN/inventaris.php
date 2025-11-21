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
    $myCtrl = 'inventaris';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'data');
$ui->assign('_sysfrm_menu2', 'listinventaris');
$ui->assign('_title', 'Data Inventaris - '. $config['CompanyName']);
$ui->assign('_st', 'Data Inventaris');
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
    case 'list':

        Event::trigger('inventaris/list/');

		_auth1('INVENTARIS-LIST',$user['id']);
        $name = _post('name');
        $ui->assign('name',$name);
		$msg = $routes['3'];
        if($name != ''){
            $paginator = Paginator::bootstrap('daftar_inventaris','nm_inventaris','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('daftar_inventaris')->where_like('nm_inventaris','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('kd_inventaris')->find_many();
        }
        else{
            $paginator = Paginator::bootstrap('daftar_inventaris','','','','','','','','','50','');
            $d = ORM::for_table('daftar_inventaris')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('kd_inventaris')->find_many();
        }

        $ui->assign('d',$d);
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu1', 'listinventaris');
		$ui->assign('_sysfrm_menu2', 'listinventaris');
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', Asset::js(array($spath.'list-inventaris')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-inventaris.tpl');

        break;

    case 'add':

        Event::trigger('inventaris/add/');

		_auth1('INVENTARIS-ADD',$user['id']);
		$clist = '<option value="">Pilih Kategori</option>';
        $d = ORM::for_table('daftar_kategori')->where('active','Y')->order_by_asc('kd_kategori')->find_many();
        if($d){
			foreach ($d as $r) {
				$clist .= '<option value="'.$r['kd_kategori'].'">'.$r['kd_kategori'].' - '.$r['nm_kategori'].'</option>';
			}
		}

        $ui->assign('options',$clist);
		$ui->assign('_sysfrm_menu1', 'listinventaris');
		$ui->assign('_sysfrm_menu2', 'listinventaris');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-inventaris','dp/dist/datepicker.min','btn-top/btn-top','numeric')));


        $ui->display($spath.'add-inventaris.tpl');

        break;

     case 'add-post':

        Event::trigger('inventaris/add-post/');

        $nama = _post('nama');
        $kategori = _post('kategori');
        $merk = _post('merk');
        $tipe = _post('tipe');
        $satuan = _post('satuan');
		$qty = Finance::amount_fix(_post('qty'));
		$qty1 = Finance::amount_fix(_post('qty1'));
        $spesifikasi = _post('spesifikasi');

        if($nama == ''){
            $msg .= 'Nama Inventaris tidak boleh kosong.';
        }

        $chk = ORM::for_table('daftar_inventaris')->where('kd_inventaris',$kode)->find_one();
        if($chk){
            $msg .= 'Kode Inventaris tersebut sudah ada <br>';
        }

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_inventaris')->raw_query('select * from daftar_inventaris order by kd_inventaris desc')->find_one();
				if($chk) {
					$no = ++$chk['kd_inventaris'];
				} else {
					$no = 'INVENTARIS/00001';
				}
				$d = ORM::for_table('daftar_inventaris')->create();

				$d->kd_inventaris = $no;
				$d->nm_inventaris = $nama;
                $d->kd_kategori = $kategori;
                $d->merk = $merk;
                $d->tipe = $tipe;
                $d->satuan = $satuan;
                $d->qty_min = $qty;
                $d->qty_max = $qty1;
                $d->spesifikasi = $spesifikasi;
				$d->active = 'Y';
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Data Inventaris : '.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('inventaris/add-post/_on_finished');
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

     case 'edit':

        Event::trigger('inventaris/edit/');

		_auth1('INVENTARIS-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_inventaris')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$clist = '<option value="">Pilih Kategori</option>';
			$e = ORM::for_table('daftar_kategori')->where('active','Y')->order_by_asc('kd_kategori')->find_many();
			if($e){
				foreach ($e as $r) {
					$clist .= '<option value="'.$r['kd_kategori'].'"'.($r['kd_kategori'] == $d['kd_kategori'] ? ' selected="selected" ' : '').'>'.$r['kd_kategori'].' - '.$r['nm_kategori'].'</option>';
				}
			}

			$ui->assign('options',$clist);

			$ui->assign('_sysfrm_menu1', 'listinventaris');
			$ui->assign('_sysfrm_menu2', 'listinventaris');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-inventaris','dp/dist/datepicker.min','numeric')));
            $ui->display($spath.'edit-inventaris.tpl');
        }

        break;

    case 'edit-post':

        Event::trigger('inventaris/edit-post/');


        $id = _post('cid');
		$nama = _post('nama');
		$kategori = _post('kategori');
		$merk = _post('merk');
		$tipe = _post('tipe');
		$satuan = _post('satuan');
		$qty = Finance::amount_fix(_post('qty'));
		$qty1 = Finance::amount_fix(_post('qty1'));
		$spesifikasi = _post('spesifikasi');
		$aktif = _post('aktif');
		$msg = '';
		if($nama == '') {
			$msg .= 'Nama Inventaris tidak boleh kosong';
		}

        $d = ORM::for_table('daftar_inventaris')->find_one($id);
        $kode = $d['kd_inventaris'];
        if($d){

            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('daftar_inventaris')->find_one($id);
					$d->nm_inventaris = $nama;
					$d->kd_kategori = $kategori;
					$d->merk = $merk;
					$d->tipe = $tipe;
					$d->satuan = $satuan;
					$d->qty_min = $qty;
					$d->qty_max = $qty1;
					$d->spesifikasi = $spesifikasi;
					if($aktif == 'y') {
						$d->active = 'Y';
					} else {
						$d->active = 'N';
					}
					$d->edit_by = $user['id'];
					$d->edit_date = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Data Inventaris : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
					Event::trigger('inventaris/add-post/_on_finished');
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
            r2(U.'inventaris/list', 'e', 'Perusahaan tersebut tidak ditemukan');
        }

        break;

     case 'itemstock':

        Event::trigger('inventaris/itemstock/');

		_auth1('INVENTARIS-ITEMSTOCK',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_inventaris')->find_one($cid);
        if($d){
			$e = ORM::for_table('daftar_inventaris_itemstock')->table_alias("a")->select("a.*")->select("b.merk")->select("b.tipe")->select("b.spesifikasi")->left_outer_join("daftar_itemstock",array("a.kd_item","=","b.kd_item"),"b")->where('a.kd_inventaris',$d['kd_inventaris'])->find_many();
			$clist = '';
			$clist = '<option value="">Pilih ItemStock</option>';
			$tg = ORM::for_table('daftar_itemstock')->order_by_asc('kd_item')->where('active','Y')->find_many();
				
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_item'].'">'.$r['kd_item'].' - '.$r['nm_item'].'</option>';
			}

			$ui->assign('opt',$clist);
            $ui->assign('d',$d);
            $ui->assign('e',$e);
            $ui->assign('tg',$tg);
            $ui->assign('cid',$cid);

			$ui->assign('_sysfrm_menu1', 'listinventaris');
			$ui->assign('_sysfrm_menu2', 'listinventaris');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-inventaris-itemstock','numeric')));
			$ui->display($spath.'list-inventaris-itemstock.tpl');
		}

        break;

    case 'itemstock-post':
        $kd_inventaris = _post('kd_inventaris');
		$kd_item = explode(',', _post('kd_item'));;
		// $aktif = explode(',', _post('aktif'));;
		
		sort($kd_item);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($kd_item as $code) {
			if($cek == $code) {
				$flag = true;
				break;
			} else
				$flag = false;
			$cek = $code;
		}
		if($flag)
			$error .= 'Ada Kode Item Stock double';
		
		if($error == '') {
			ORM::get_db()->beginTransaction();
			try {
				$i=0;
				foreach($kd_item as $code) {
					// $saktif = $aktif[$i];
					$e = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$kd_inventaris)->where('kd_item',$code)->find_one();
					if($e) {
						$f = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$kd_inventaris)->where('kd_item',$code)->find_one();
						$f->edit_by = $user['id'];
						$f->edit_date = date('Y-m-d H:i:s');
					} else {
						$f = ORM::for_table('daftar_inventaris_itemstock')->create();
						$f->kd_inventaris = $kd_inventaris;
						$f->kd_item = $code;
						$f->add_by = $user['id'];
						$f->add_date = date('Y-m-d H:i:s');
                        $f->status = 'pending';
					}
					
					$f->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Tambah Inventaris - Item Stock : '.$kd_inventaris,$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
						'dataval'		=>	1);
				echo json_encode($data);
				Event::trigger('inventaris/itemstock/_on_finished');
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

  case 'add-mobil':

        Event::trigger('inventaris/add/');

		_auth1('INVENTARIS-ADD',$user['id']);
        $ui->assign('options',Dealer::all('',''));

		$ui->assign('_sysfrm_menu1', 'listinventarismobil');
		$ui->assign('_sysfrm_menu2', 'listinventarismobil');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-inventaris-mobil','dp/dist/datepicker.min')));

        $ui->display($spath.'add-inventaris-mobil.tpl');

        break;

    case 'edit-mobil':

        Event::trigger('inventaris/edit/');

		_auth1('INVENTARIS-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('inventaris_mobil')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
            $ui->assign('time',time());
			if($d['TGL_STNK'] <> null)
				$ui->assign('tglstnk', date('d-m-Y',strtotime($d['TGL_STNK'])));
			else
				$ui->assign('tglstnk', null);
			if($d['TGL_PAJAK'] <> null)
				$ui->assign('tglpajak', date('d-m-Y',strtotime($d['TGL_PAJAK'])));
			else
				$ui->assign('tglpajak', null);
			$ui->assign('options',Dealer::all('',$d['CABANG']));

			$ui->assign('_sysfrm_menu1', 'listinventarismobil');
			$ui->assign('_sysfrm_menu2', 'listinventarismobil');
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','lightbox/lightbox.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-inventaris-mobil','dp/dist/datepicker.min','lightbox/lightbox.min')));
            $ui->display($spath.'edit-inventaris-mobil.tpl');
        }

        break;

    case 'add-mobil-post':

        Event::trigger('inventaris/add-post/');

        $nopolisi = strtoupper(_post('nopolisi'));
        $pemakai = _post('pemakai');
        $cabang = _post('cabang');
		if(_post('tglstnk') <> null)
			$tglstnk = date("Y-m-d",strtotime(_post('tglstnk')));
		else
			$tglstnk = null;
		if(_post('tglpajak') <> null)
			$tglpajak = date("Y-m-d",strtotime(_post('tglpajak')));
		else
			$tglpajak = null;
        $nochassis = _post('nochassis');
        $noengine = _post('noengine');
        $nostnk = _post('nostnk');
        $merk = _post('merk');
        $tipemobil = _post('tipemobil');
        $warna = _post('warna');
        $thnkenderaan = _post('thnkenderaan');
		$ftstnk = _post('ftstnk');
		$ftpajak = _post('ftpajak');
		$bpkb = _post('bpkb');
		$tdepan = _post('tdepan');
		$tsamping_kanan = _post('tsamping_kanan');
		$tsamping_kiri = _post('tsamping_kiri');
		$tbelakang = _post('tbelakang');
		$interior1 = _post('interior1');
		$interior2 = _post('interior2');
        if($nopolisi == ''){
            $msg .= 'Nomor Polisi Tidak Boleh Kosong. <br>';
        } else {
			$chk = ORM::for_table('inventaris_mobil')->where('NO_POLISI',$nopolisi)->find_one();
			if($chk){
				$msg .= 'Nomor Polisi Sudah ada <br>';
			}
		}
		if($cabang == '')
			$msg .= 'Belum memilih Cabang ! <br>';

		$validextentions = array("jpeg", "jpg", "png","gif","bmp");
		$max_file_size = 2048000;
		if(isset($_FILES['ftstnk']['name']) & $_FILES['ftstnk']['name']<>'') {
			$temporary = explode(".", $_FILES["ftstnk"]["name"]);
			$ftstnk_ext = end($temporary);
			if(!in_array($ftstnk_ext, $validextentions)) {
				$msg .= 'Foto STNK harus berupa file images <br>';
			}
			if ($_FILES["ftstnk"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto STNK - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['ftpajak']['name']) & $_FILES['ftpajak']['name']<>'') {
			$temporary = explode(".", $_FILES["ftpajak"]["name"]);
			$ftpajak_ext = end($temporary);
			if(!in_array($ftpajak_ext, $validextentions)) {
				$msg .= 'Foto Pajak harus berupa file images <br>';
			}
			if ($_FILES["ftpajak"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Pajak - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['bpkb']['name']) & $_FILES['bpkb']['name']<>'') {
			$temporary = explode(".", $_FILES["bpkb"]["name"]);
			$bpkb_ext = end($temporary);
			if(!in_array($bpkb_ext, $validextentions)) {
				$msg .= 'Foto BPKB harus berupa file images <br>';
			}
			if ($_FILES["bpkb"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto BPKB - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['tdepan']['name']) & $_FILES['tdepan']['name']<>'') {
			$temporary = explode(".", $_FILES["tdepan"]["name"]);
			$tdepan_ext = end($temporary);
			if(!in_array($tdepan_ext, $validextentions)) {
				$msg .= 'Foto Tampak Depan harus berupa file images <br>';
			}
			if ($_FILES["tdepan"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Tampak Depan - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['tsamping_kanan']['name']) & $_FILES['tsamping_kanan']['name']<>'') {
			$temporary = explode(".", $_FILES["tsamping_kanan"]["name"]);
			$tsamping_kanan_ext = end($temporary);
			if(!in_array($tsamping_kanan_ext, $validextentions)) {
				$msg .= 'Foto Samping Kanan harus berupa file images <br>';
			}
			if ($_FILES["tsamping_kanan"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Samping Kanan - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['tsamping_kiri']['name']) & $_FILES['tsamping_kiri']['name']<>'') {
			$temporary = explode(".", $_FILES["tsamping_kiri"]["name"]);
			$tsamping_kiri_ext = end($temporary);
			if(!in_array($tsamping_kiri_ext, $validextentions)) {
				$msg .= 'Foto Samping Kiri harus berupa file images <br>';
			}
			if ($_FILES["tsamping_kiri"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Samping Kiri - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['tbelakang']['name']) & $_FILES['tbelakang']['name']<>'') {
			$temporary = explode(".", $_FILES["tbelakang"]["name"]);
			$tbelakang_ext = end($temporary);
			if(!in_array($tbelakang_ext, $validextentions)) {
				$msg .= 'Foto Tampak Belakang harus berupa file images <br>';
			}
			if ($_FILES["tbelakang"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Tampak Belakang - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['interior1']['name']) & $_FILES['interior1']['name']<>'') {
			$temporary = explode(".", $_FILES["interior1"]["name"]);
			$interior1_ext = end($temporary);
			if(!in_array($interior1_ext, $validextentions)) {
				$msg .= 'Foto Interior 1 harus berupa file images <br>';
			}
			if ($_FILES["interior1"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Interior 1 - File size Max 2MB <br>';
			}
		}
		if(isset($_FILES['interior2']['name']) & $_FILES['interior2']['name']<>'') {
			$temporary = explode(".", $_FILES["interior2"]["name"]);
			$interior2_ext = end($temporary);
			if(!in_array($interior2_ext, $validextentions)) {
				$msg .= 'Foto Interior 2 harus berupa file images <br>';
			}
			if ($_FILES["interior2"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
				$msg .= 'Foto Interior 2 - File size Max 2MB <br>';
			}
		}

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$spath = 'uploads/GAS/Inventaris/';
				$file_ftstnk = '';
				$file_ftpajak = '';
				$file_bpkb = '';
				$file_tdepan = '';
				$file_tsamping_kanan = '';
				$file_tsamping_kiri = '';
				$file_tbelakang = '';
				$file_interior1 = '';
				$file_interior2 = '';
				if(isset($_FILES['ftstnk']['name']) & $_FILES['ftstnk']['name']<>'') {
					$file_ftstnk = $spath.str_replace('-','',$nopolisi).'-STNK.'.$ftstnk_ext;
					move_uploaded_file($_FILES["ftstnk"]["tmp_name"], $file_ftstnk);
					$image = new Image();
					$image->source_path = $file_ftstnk;
					$image->target_path = $file_ftstnk;
				}
				if(isset($_FILES['ftpajak']['name']) & $_FILES['ftpajak']['name']<>'') {
					$file_ftpajak = $spath.str_replace('-','',$nopolisi).'-PAJAK.'.$ftpajak_ext;
					move_uploaded_file($_FILES["ftpajak"]["tmp_name"], $file_ftpajak);
					$image = new Image();
					$image->source_path = $file_ftpajak;
					$image->target_path = $file_ftpajak;
				}
				if(isset($_FILES['bpkb']['name']) & $_FILES['bpkb']['name']<>'') {
					$file_bpkb = $spath.str_replace('-','',$nopolisi).'-BPKB.'.$bpkb_ext;
					move_uploaded_file($_FILES["bpkb"]["tmp_name"], $file_bpkb);
					$image = new Image();
					$image->source_path = $file_bpkb;
					$image->target_path = $file_bpkb;
				}
				if(isset($_FILES['tdepan']['name']) & $_FILES['tdepan']['name']<>'') {
					$file_tdepan = $spath.str_replace('-','',$nopolisi).'-TDEPAN.'.$tdepan_ext;
					move_uploaded_file($_FILES["tdepan"]["tmp_name"], $file_tdepan);
					$image = new Image();
					$image->source_path = $file_tdepan;
					$image->target_path = $file_tdepan;
				}
				if(isset($_FILES['tsamping_kanan']['name']) & $_FILES['tsamping_kanan']['name']<>'') {
					$file_tsamping_kanan = $spath.str_replace('-','',$nopolisi).'-SAMPING_KANAN.'.$tsamping_kanan_ext;
					move_uploaded_file($_FILES["tsamping_kanan"]["tmp_name"], $file_tsamping_kanan);
					$image = new Image();
					$image->source_path = $file_tsamping_kanan;
					$image->target_path = $file_tsamping_kanan;
				}
				if(isset($_FILES['tsamping_kiri']['name']) & $_FILES['tsamping_kiri']['name']<>'') {
					$file_tsamping_kiri = $spath.str_replace('-','',$nopolisi).'-SAMPING_KIRI.'.$tsamping_kiri_ext;
					move_uploaded_file($_FILES["tsamping_kiri"]["tmp_name"], $file_tsamping_kiri);
					$image = new Image();
					$image->source_path = $file_tsamping_kiri;
					$image->target_path = $file_tsamping_kiri;
				}
				if(isset($_FILES['tbelakang']['name']) & $_FILES['tbelakang']['name']<>'') {
					$file_tbelakang = $spath.str_replace('-','',$nopolisi).'-BELAKANG.'.$tbelakang_ext;
					move_uploaded_file($_FILES["tbelakang"]["tmp_name"], $file_tbelakang);
					$image = new Image();
					$image->source_path = $file_tbelakang;
					$image->target_path = $file_tbelakang;
				}
				if(isset($_FILES['interior1']['name']) & $_FILES['interior1']['name']<>'') {
					$file_interior1 = $spath.str_replace('-','',$nopolisi).'-INTERIOR1.'.$interior1_ext;
					move_uploaded_file($_FILES["interior1"]["tmp_name"], $file_interior1);
					$image = new Image();
					$image->source_path = $file_interior1;
					$image->target_path = $file_interior1;
				}
				if(isset($_FILES['interior2']['name']) & $_FILES['interior2']['name']<>'') {
					$file_interior2 = $spath.str_replace('-','',$nopolisi).'-INTERIOR2.'.$interior2_ext;
					move_uploaded_file($_FILES["interior2"]["tmp_name"], $file_interior2);
					$image = new Image();
					$image->source_path = $file_interior2;
					$image->target_path = $file_interior2;
				}

				$d = ORM::for_table('inventaris_mobil')->create();
				$d->NO_POLISI = $nopolisi;
				$d->PEMAKAI = $pemakai;
				$d->CABANG = $cabang;
				$d->TGL_STNK = $tglstnk;
				$d->TGL_PAJAK = $tglpajak;
				$d->NO_CHASSIS = $nochassis;
				$d->NO_ENGINE = $noengine;
                $d->NO_STNK = $nostnk;
				$d->MERK = $merk;
				$d->TIPE_MOBIL = $tipemobil;
				$d->WARNA = $warna;
				$d->THN_BUAT = $thnkenderaan;
				$d->FT_STNK = $file_ftstnk;
				$d->FT_PAJAK = $file_ftpajak;
				$d->FT_BPKB = $file_bpkb;
				$d->FT_DEPAN = $file_tdepan;
				$d->FT_SAMPING_KANAN = $file_tsamping_kanan;
				$d->FT_SAMPING_KIRI = $file_tsamping_kiri;
				$d->FT_BELAKANG = $file_tbelakang;
				$d->FT_INTERIOR_DEPAN = $file_interior1;
				$d->FT_INTERIOR_BELAKANG = $file_interior2;
				$d->ADD_BY = $user['id'];
				$d->ADD_DATE = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log('Tambah Mobil Inventaris'.$nopolisi.' [CID: '.$cid.']',$user['fullname'],$user['id']);
				Event::trigger('inventaris/add-post/_on_finished');
				echo $cid;
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
        }
        else{
            echo $msg;
        }
        break;

    case 'list-mobil':

        Event::trigger('inventaris/list-mobil/');

		_auth1('INVENTARIS-LIST-MOBIL',$user['id']);
            $name = _post('name');
			$ui->assign('name',$name);
			$msg = $routes['3'];
			if($name != ''){
				$paginator = Paginator::bootstrap('inventaris_mobil','pemakai','%'.$name.'%','','','','','','','50','');
				$d = ORM::for_table('inventaris_mobil')->where_like('NO_POLISI','%'.$nopolisi.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
			}
			else{
				$paginator = Paginator::bootstrap('inventaris_mobil','','','','','','','','','50','');
				$d = ORM::for_table('inventaris_mobil')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('NO_POLISI')->find_many();
			}

			$ui->assign('d',$d);
			$ui->assign('msg',$msg);
			$ui->assign('paginator',$paginator);
			$ui->assign('_sysfrm_menu1', 'listinventarismobil');
			$ui->assign('_sysfrm_menu2', 'listinventarismobil');
			$ui->assign('xfooter', Asset::js(array($spath.'list-inventaris-mobil')));
			$ui->assign('jsvar', '
				_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
				 ');
			$ui->display($spath.'list-inventaris-mobil.tpl');

        break;


    case 'edit-mobil-post':

        Event::trigger('inventaris/edit-post/');


        $id = _post('cid');
        $d = ORM::for_table('inventaris_mobil')->find_one($id);
        if($d){
			$nopolisi = $d['NO_POLISI'];
            $pemakai = _post('pemakai');
			$cabang = _post('cabang');
			if(_post('tglstnk') <> null and _post('tglstnk') <> '')
				$tglstnk = date("Y-m-d",strtotime(_post('tglstnk')));
			else
				$tglstnk = null;
			if(_post('tglpajak') <> null and _post('tglpajak') <> '')
				$tglpajak = date("Y-m-d",strtotime(_post('tglpajak')));
			else
				$tglpajak = null;
			$nochassis = _post('nochassis');
			$noengine = _post('noengine');
			$nostnk = _post('nostnk');
			$merk = _post('merk');
			$tipemobil = _post('tipemobil');
			$warna = _post('warna');
			$thnkenderaan = _post('thnkenderaan');
			$ftstnk = _post('ftstnk');
			$ftpajak = _post('ftpajak');
			$bpkb = _post('bpkb');
			$tdepan = _post('tdepan');
			$tsamping_kanan = _post('tsamping_kanan');
			$tsamping_kiri = _post('tsamping_kiri');
			$tbelakang = _post('tbelakang');
			$interior1 = _post('interior1');
			$interior2 = _post('interior2');
            $cabang = _post('cabang');
            $msg = '';

			if($cabang == '')
				$msg .= 'Belum memilih Cabang ! <br>';

			$validextentions = array("jpeg", "jpg", "png","gif","bmp");
			$max_file_size = 2048000;
			if(isset($_FILES['ftstnk']['name']) & $_FILES['ftstnk']['name']<>'') {
				$temporary = explode(".", $_FILES["ftstnk"]["name"]);
				$ftstnk_ext = end($temporary);
				if(!in_array($ftstnk_ext, $validextentions)) {
					$msg .= 'Foto STNK harus berupa file images <br>';
				}
				if ($_FILES["ftstnk"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto STNK - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['ftpajak']['name']) & $_FILES['ftpajak']['name']<>'') {
				$temporary = explode(".", $_FILES["ftpajak"]["name"]);
				$ftpajak_ext = end($temporary);
				if(!in_array($ftpajak_ext, $validextentions)) {
					$msg .= 'Foto Pajak harus berupa file images <br>';
				}
				if ($_FILES["ftpajak"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Pajak - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['bpkb']['name']) & $_FILES['bpkb']['name']<>'') {
				$temporary = explode(".", $_FILES["bpkb"]["name"]);
				$bpkb_ext = end($temporary);
				if(!in_array($bpkb_ext, $validextentions)) {
					$msg .= 'Foto BPKB harus berupa file images <br>';
				}
				if ($_FILES["bpkb"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto BPKB - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['tdepan']['name']) & $_FILES['tdepan']['name']<>'') {
				$temporary = explode(".", $_FILES["tdepan"]["name"]);
				$tdepan_ext = end($temporary);
				if(!in_array($tdepan_ext, $validextentions)) {
					$msg .= 'Foto Tampak Depan harus berupa file images <br>';
				}
				if ($_FILES["tdepan"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Tampak Depan - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['tsamping_kanan']['name']) & $_FILES['tsamping_kanan']['name']<>'') {
				$temporary = explode(".", $_FILES["tsamping_kanan"]["name"]);
				$tsamping_kanan_ext = end($temporary);
				if(!in_array($tsamping_kanan_ext, $validextentions)) {
					$msg .= 'Foto Samping Kanan harus berupa file images <br>';
				}
				if ($_FILES["tsamping_kanan"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Samping Kanan - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['tsamping_kiri']['name']) & $_FILES['tsamping_kiri']['name']<>'') {
				$temporary = explode(".", $_FILES["tsamping_kiri"]["name"]);
				$tsamping_kiri_ext = end($temporary);
				if(!in_array($tsamping_kiri_ext, $validextentions)) {
					$msg .= 'Foto Samping Kiri harus berupa file images <br>';
				}
				if ($_FILES["tsamping_kiri"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Samping Kiri - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['tbelakang']['name']) & $_FILES['tbelakang']['name']<>'') {
				$temporary = explode(".", $_FILES["tbelakang"]["name"]);
				$tbelakang_ext = end($temporary);
				if(!in_array($tbelakang_ext, $validextentions)) {
					$msg .= 'Foto Tampak Belakang harus berupa file images <br>';
				}
				if ($_FILES["tbelakang"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Tampak Belakang - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['interior1']['name']) & $_FILES['interior1']['name']<>'') {
				$temporary = explode(".", $_FILES["interior1"]["name"]);
				$interior1_ext = end($temporary);
				if(!in_array($interior1_ext, $validextentions)) {
					$msg .= 'Foto Interior 1 harus berupa file images <br>';
				}
				if ($_FILES["interior1"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Interior 1 - File size Max 2MB <br>';
				}
			}
			if(isset($_FILES['interior2']['name']) & $_FILES['interior2']['name']<>'') {
				$temporary = explode(".", $_FILES["interior2"]["name"]);
				$interior2_ext = end($temporary);
				if(!in_array($interior2_ext, $validextentions)) {
					$msg .= 'Foto Interior 2 harus berupa file images <br>';
				}
				if ($_FILES["interior2"]["size"] > $max_file_size) { //approx. 100kb files can be uploaded
					$msg .= 'Foto Interior 2 - File size Max 2MB <br>';
				}
			}

            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$spath = 'uploads/GAS/Inventaris/';
					$file_ftstnk = '';
					$file_ftpajak = '';
					$file_bpkb = '';
					$file_tdepan = '';
					$file_tsamping_kanan = '';
					$file_tsamping_kiri = '';
					$file_tbelakang = '';
					$file_interior1 = '';
					$file_interior2 = '';
					if(isset($_FILES['ftstnk']['name']) & $_FILES['ftstnk']['name']<>'') {
						$file_ftstnk = $spath.str_replace('-','',$nopolisi).'-STNK.'.$ftstnk_ext;
						move_uploaded_file($_FILES["ftstnk"]["tmp_name"], $file_ftstnk);
						$image = new Image();
						$image->source_path = $file_ftstnk;
						$image->target_path = $file_ftstnk;
					}
					if(isset($_FILES['ftpajak']['name']) & $_FILES['ftpajak']['name']<>'') {
						$file_ftpajak = $spath.str_replace('-','',$nopolisi).'-PAJAK.'.$ftpajak_ext;
						move_uploaded_file($_FILES["ftpajak"]["tmp_name"], $file_ftpajak);
						$image = new Image();
						$image->source_path = $file_ftpajak;
						$image->target_path = $file_ftpajak;
					}
					if(isset($_FILES['bpkb']['name']) & $_FILES['bpkb']['name']<>'') {
						$file_bpkb = $spath.str_replace('-','',$nopolisi).'-BPKB.'.$bpkb_ext;
						move_uploaded_file($_FILES["bpkb"]["tmp_name"], $file_bpkb);
						$image = new Image();
						$image->source_path = $file_bpkb;
						$image->target_path = $file_bpkb;
					}
					if(isset($_FILES['tdepan']['name']) & $_FILES['tdepan']['name']<>'') {
						$file_tdepan = $spath.str_replace('-','',$nopolisi).'-TDEPAN.'.$tdepan_ext;
						move_uploaded_file($_FILES["tdepan"]["tmp_name"], $file_tdepan);
						$image = new Image();
						$image->source_path = $file_tdepan;
						$image->target_path = $file_tdepan;
					}
					if(isset($_FILES['tsamping_kanan']['name']) & $_FILES['tsamping_kanan']['name']<>'') {
						$file_tsamping_kanan = $spath.str_replace('-','',$nopolisi).'-SAMPING_KANAN.'.$tsamping_kanan_ext;
						move_uploaded_file($_FILES["tsamping_kanan"]["tmp_name"], $file_tsamping_kanan);
						$image = new Image();
						$image->source_path = $file_tsamping_kanan;
						$image->target_path = $file_tsamping_kanan;
					}
					if(isset($_FILES['tsamping_kiri']['name']) & $_FILES['tsamping_kiri']['name']<>'') {
						$file_tsamping_kiri = $spath.str_replace('-','',$nopolisi).'-SAMPING_KIRI.'.$tsamping_kiri_ext;
						move_uploaded_file($_FILES["tsamping_kiri"]["tmp_name"], $file_tsamping_kiri);
						$image = new Image();
						$image->source_path = $file_tsamping_kiri;
						$image->target_path = $file_tsamping_kiri;
					}
					if(isset($_FILES['tbelakang']['name']) & $_FILES['tbelakang']['name']<>'') {
						$file_tbelakang = $spath.str_replace('-','',$nopolisi).'-BELAKANG.'.$tbelakang_ext;
						move_uploaded_file($_FILES["tbelakang"]["tmp_name"], $file_tbelakang);
						$image = new Image();
						$image->source_path = $file_tbelakang;
						$image->target_path = $file_tbelakang;
					}
					if(isset($_FILES['interior1']['name']) & $_FILES['interior1']['name']<>'') {
						$file_interior1 = $spath.str_replace('-','',$nopolisi).'-INTERIOR1.'.$interior1_ext;
						move_uploaded_file($_FILES["interior1"]["tmp_name"], $file_interior1);
						$image = new Image();
						$image->source_path = $file_interior1;
						$image->target_path = $file_interior1;
					}
					if(isset($_FILES['interior2']['name']) & $_FILES['interior2']['name']<>'') {
						$file_interior2 = $spath.str_replace('-','',$nopolisi).'-INTERIOR2.'.$interior2_ext;
						move_uploaded_file($_FILES["interior2"]["tmp_name"], $file_interior2);
						$image = new Image();
						$image->source_path = $file_interior2;
						$image->target_path = $file_interior2;
					}

					$d = ORM::for_table('inventaris_mobil')->find_one($id);
					$d->PEMAKAI = $pemakai;
					$d->CABANG = $cabang;
					$d->TGL_STNK = $tglstnk;
					$d->TGL_PAJAK = $tglpajak;
					$d->NO_CHASSIS = $nochassis;
					$d->NO_ENGINE = $noengine;
					$d->NO_STNK = $nostnk;
					$d->MERK = $merk;
					$d->TIPE_MOBIL = $tipemobil;
					$d->WARNA = $warna;
					$d->THN_BUAT = $thnkenderaan;
					if($file_ftstnk <> '') {
						if(file_exists($d['FT_STNK']) & $d['FT_STNK'] <> $file_ftstnk )
							unlink($d['FT_STNK']);
						$d->FT_STNK = $file_ftstnk;
					}
					if($file_ftpajak <> '') {
						if(file_exists($d['FT_PAJAK']) & $d['FT_PAJAK'] <> $file_ftpajak )
							unlink($d['FT_PAJAK']);
						$d->FT_PAJAK = $file_ftpajak;
					}
					if($file_bpkb <> '') {
						if(file_exists($d['FT_BPKB']) & $d['FT_BPKB'] <> $file_bpkb )
							unlink($d['FT_BPKB']);
						$d->FT_BPKB = $file_bpkb;
					}
					if($file_tdepan <> '') {
						if(file_exists($d['FT_DEPAN']) & $d['FT_DEPAN'] <> $file_tdepan )
							unlink($d['FT_DEPAN']);
						$d->FT_DEPAN = $file_tdepan;
					}
					if($file_tsamping_kanan <> '') {
						if(file_exists($d['FT_SAMPING_KANAN']) & $d['FT_SAMPING_KANAN'] <> $file_tsamping_kanan )
							unlink($d['FT_SAMPING_KANAN']);
						$d->FT_SAMPING_KANAN = $file_tsamping_kanan;
					}
					if($file_tsamping_kiri <> '') {
						if(file_exists($d['FT_SAMPING_KIRI']) & $d['FT_SAMPING_KIRI'] <> $file_tsamping_kiri )
							unlink($d['FT_SAMPING_KIRI']);
						$d->FT_SAMPING_KIRI = $file_tsamping_kiri;
					}
					if($file_tbelakang <> '') {
						if(file_exists($d['FT_BELAKANG']) & $d['FT_BELAKANG'] <> $file_tbelakang )
							unlink($d['FT_BELAKANG']);
						$d->FT_BELAKANG = $file_tbelakang;
					}
					if($file_interior1 <> '') {
						if(file_exists($d['FT_INTERIOR_DEPAN']) & $d['FT_INTERIOR_DEPAN'] <> $file_interior1 )
							unlink($d['FT_INTERIOR_DEPAN']);
						$d->FT_INTERIOR_DEPAN = $file_interior1;
					}
					if($file_interior2 <> '') {
						if(file_exists($d['FT_INTERIOR_BELAKANG']) & $d['FT_INTERIOR_BELAKANG'] <> $file_interior2 )
							unlink($d['FT_INTERIOR_BELAKANG']);
						$d->FT_INTERIOR_BELAKANG = $file_interior2;
					}
					$d->EDIT_BY = $user['id'];
					$d->EDIT_DATE = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log('Edit Mobil Inventaris'.$nopolisi.' [CID: '.$id.']',$user['fullname'],$user['id']);
					echo $id;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			}
			else{
				echo $msg;
			}
        }
        else{
            //r2(U.'list', 'e', 'Mobil Inventaris tersebut tidak ditemukan');
            $msg = 'Mobil Inventaris tersebut tidak ditemukan';
        }


        break;
    case 'delete':

        Event::trigger('inventaris/delete/');


		_auth1('INVENTARIS-DEL',$user['id']);
        $id = $routes['3'];
        $d = ORM::for_table('inventaris_mobil')->find_one($id);
        if($d){
            $d->delete();
            r2(U.'inventaris/list/', 's', 'Berhasil menghapus Inventaris Mobil');
        }

        break;

    case 'delpic':

        Event::trigger('inventaris/delpic/');

		_auth1('INVENTARIS-DEL',$user['id']);
        $id = _post('id');
        $id1 = _post('id1');
        $tag = _post('tag');
		if(file_exists($tag))
			unlink($tag);
		$tmp=ORM::raw_execute('update inventaris_mobil set '.$id1.'="" where id="'.$id.'"');

        break;

    case 'render-address':

        Event::trigger('compnay/render-address/');

        $cid = _post('cid');
        $d = ORM::for_table('inventaris_mobil')->find_one($cid);
        $d->NO_POLISI = $d['nopolisi'];
        $d->PEMAKAI = $d['pemakai'];
        $d->NO_STNK = $d['nostnk'];
        $d->NO_CHASSIS = $d['nochassis'];
        $d->NO_ENGINE = $d['noengine'];
        $d->TIPE_MOBIL = $d['tipemobil'];
        $d->WARNA = $d['warna'];
        $d->TGL_STNK = $d['tglstnk'];
        $d->TGL_SERVICE_TERAKHIR = $d['tglservice'];
        $d->CABANG = $d['cabang'];

     case 'list-submit':

        Event::trigger('inventaris/list/');

		_auth1('INVENTARIS-SUBMIT',$user['id']);
        $cid = $routes['3'];
		$msg = $routes['4'];
		$paginator = Paginator::bootstrap('daftar_inventaris_itemstock','id',$cid,'','','','','','','50','');
		$d = ORM::for_table('daftar_inventaris')->find_one($cid);
		if($d) {
			$e = ORM::for_table('daftar_inventaris_itemstock')->table_alias("a")->select("a.*")->select('b.nm_item')->select("b.merk")->select("b.tipe")->select("b.spesifikasi")->left_outer_join("daftar_itemstock",array("a.kd_item","=","b.kd_item"),"b")->where('a.kd_inventaris',$d['kd_inventaris'])->where("a.submit_by",0)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('a.kd_item')->find_many();

			$ui->assign('d',$d);
			$ui->assign('e',$e);
			$ui->assign('msg',$msg);
			$ui->assign('paginator',$paginator);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-inventaris-submit','numeric')));
			$ui->assign('jsvar', '
	_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	 ');
			$ui->display($spath.'list-inventaris-submit.tpl');
		}

        break;
    
    case 'submit-post':
        $kd_inventaris = _post('kd_inventaris');
		$kd_item = explode(',', _post('kd_item'));;
		
		sort($kd_item);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($kd_item as $code) {
			if($cek == $code and $code<>'') {
				$flag = true;
				break;
			} else
				$flag = false;
			$cek = $code;
		}
		if($flag)
			$error .= 'Ada Kode Item double';
		
		if($error == '') {
			ORM::get_db()->beginTransaction();
			try {
				$i=0;
				foreach($kd_item as $code) {
					$e = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$kd_inventaris)->where('kd_item',$code)->find_one();
					$e->submit_by = $user['id'];
					$e->submit_date = date('Y-m-d H:i:s');
					$e->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Pengajuan Inventaris - Item Stock : '.$kd_inventaris,$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
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

	case 'list-approve':

        Event::trigger('inventaris/list-approve/');

		_auth1('INVENTARIS-APPROVE',$user['id']);
		$msg = $routes['3'];
		$e = ORM::for_table('daftar_inventaris_itemstock')->table_alias("a")->select("a.*")->select("c.nm_inventaris")->select("b.nm_item")->select("b.satuan")->select("b.jumlah_per_satuan")->select("b.satuan_harga")->left_outer_join("daftar_itemstock",array("a.kd_item","=","b.kd_item"),"b")->left_outer_join("daftar_inventaris",array("a.kd_inventaris","=","c.kd_inventaris"),"c")->where_not_equal("a.submit_by",0)->where_equal("a.approve_by",0)->order_by_asc('a.kd_item')->find_many();

		$ui->assign('e',$e);
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'listpersetujuaninv');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-inventaris-approve','numeric')));
		$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
		$ui->display($spath.'list-inventaris-approve.tpl');

        break;

    case 'approve-post':
        $kd_inventaris = explode(',', _post('kd_inventaris'));
		$kd_item = explode(',', _post('kd_item'));
		$status = explode(',', _post('status'));
		
//		sort($kd_inventaris);
		$cek = '';
		$i = 0;
		$flag = false;
		$error = '';
//		foreach($kd_inventaris as $item) {
//			if($cek == $item.$kd_item[$i]) {
//				$flag = true;
//				break;
//			} else
//				$flag = false;
//			$cek = $item.$kd_item[$i];
//			$i++;
//		}
		if($flag)
			$error .= 'Ada Data yang double';
		
		if($error == '') {
			ORM::get_db()->beginTransaction();
			try {
				$i=0;
				foreach($kd_inventaris as $code) {
					$sstatus = $status[$i];
					$e = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$code)->where('kd_item',$kd_item[$i])->find_one();
					if($sstatus <> 'pending') {
						$e->approve_by = $user['id'];
						$e->approve_date = date('Y-m-d H:i:s');
					}
					$e->status = $sstatus;
					$e->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Persetujuan Inventaris - Item Stock',$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
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

 	case 'render-itemstock':
        $kode = _post('kode');
		if($kode <> '') {
			$y = ORM::for_table('daftar_itemstock')->where('kode_item',$kode)->find_one();
			if($y) {
				$data = array(
						'nama_item'		=>	$y['nama_item'],
						'merk'			=>	$y['merk'],
						'tipe'			=>	$y['tipe'],
						'satuan'		=>	$y['satuan'],
						'spesifikasi'	=>	$y['spesifikasi']);
				echo json_encode($data);
			} else {
				$data = array(
						'nama_item'		=>	'',
						'merk'			=>	'',
						'tipe'			=>	'',
						'satuan'		=>	'',
						'spesifikasi'	=>	'');
				echo json_encode($data);
			}
		} else {
			$data = array(
					'nama_item'		=>	'',
					'merk'			=>	'',
					'tipe'			=>	'',
					'satuan'		=>	'',
					'spesifikasi'	=>	'');
			echo json_encode($data);
		}
		
        break;

		case 'render-detail-inventaris':

			$kode = _post('kode');
			if($kode <> '') {
				$y = ORM::for_table('daftar_inventaris')->where('kd_inventaris',$kode)->find_one();
				if($y) {
					$data = array(
							'nama'=>	$y['nm_inventaris'],
							'merk'	 =>	$y['merk'],
							'kdkategori'	 =>	$y['kd_kategori'],
							'satuan' =>	$y['satuan'],
							'tipe' =>	$y['tipe'],
							'spesifikasi' => $y['spesifikasi'],
							'qtymin' =>	$y['qty_min'],
							'qtymax' =>	$y['qty_max']);
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
						'kdkategori'	=>	'');
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
					'kdkategori'	=>	'');
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
						'jumlahpersatuan' =>	$y['jumlah_per_satuan'],
						'tempa' => $y['tempa']);
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
					'jumlahpersatuan'	=>	'',
					'tempa' => '');
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
				'jumlahpersatuan'	=>	'',
				'tempa' => '');
			echo json_encode($data);
		}
		break;

	case 'hapus-itemstock':

        $kode = _post('kode');
        $kd_inventaris = _post('kd_inventaris');
		if($kode <> '') {
			$y = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$kd_inventaris)->where('kd_item',$kode)->find_one();
			if($y) {
				$z = ORM::for_table('daftar_inventaris_itemstock')->where('kd_inventaris',$kd_inventaris)->where('kd_item',$kode)->delete_many();
                _log1('Hapus Inventaris - Item Stock : '.$kd_inventaris,$user['username'],$user['id']);
				echo 1;
			} else echo 'a';
		} else echo 'a';
		
        break;
  default:
        echo 'action not defined';
}