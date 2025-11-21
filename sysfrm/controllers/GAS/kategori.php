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
    $myCtrl = 'kategori';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'data');
$ui->assign('_sysfrm_menu2', 'listkategori');
$ui->assign('_title', 'Daftar Kategori - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Kategori');
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
    case 'add':

        Event::trigger('bengkel/add/');

		_auth1('CATEGORY-ADD',$user['id']);

		$clist = '';
		$clist = '<option value="">Pilih Kategori</option>';
		$tg = ORM::for_table('daftar_kategori')->where('parent','Y')->find_many();
			
		foreach ($tg as $r) {
			$clist .= '<option value="'.$r['kd_kategori'].'">'.$r['kd_kategori'].' - '.$r['nm_kategori'].'</option>';
		}
		$ui->assign('opt_induk',$clist);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-kategori','dp/dist/datepicker.min','btn-top/btn-top')));


        $ui->display($spath.'add-kategori.tpl');
        break;

    case 'edit':

        Event::trigger('bengkel/edit/');

		_auth1('CATEGORY-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_kategori')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);

			$clist = '';
			$clist = '<option value="">Pilih Kategori</option>';
			$tg = ORM::for_table('daftar_kategori')->where('parent','Y')->find_many();
				
			foreach ($tg as $r) {
				$clist .= '<option value="'.$r['kd_kategori'].'"'.($r['kd_kategori'] == $d['kd_kategori_parent'] ? ' selected="selected" ' : '').'>'.$r['kd_kategori'].' - '.$r['nm_kategori'].'</option>';
			}
			$ui->assign('opt_induk',$clist);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-kategori','dp/dist/datepicker.min')));
            $ui->display($spath.'edit-kategori.tpl');
        }

        break;

    case 'add-post':

        Event::trigger('bengkel/add-post/');

        $nama = _post('nama');
        $keterangan = _post('keterangan');
        $induk = _post('induk');
        $kode_induk = _post('kode_induk');

		if($nama == ''){
			$msg .= 'Nama Kategori harus di isi<br>';
		}

		if($induk != 'y') {
			if($kode_induk == '')
				$msg .= 'Kode Induk harus di isi';
		}
		
        $chk = ORM::for_table('daftar_kategori')->where('kd_kategori',$kode)->find_one();
        if($chk){
            $msg .= 'Kode Kategori tersebut sudah ada <br>';
        }

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_kategori')->raw_query('select * from daftar_kategori order by kd_kategori desc')->find_one();
				if($chk) {
					$no = ++$chk['kd_kategori'];
				} else {
					$no = 'CATEGORY/00001';
				}
				$d = ORM::for_table('daftar_kategori')->create();

				$d->kd_kategori = $no;
				$d->nm_kategori = $nama;
                $d->keterangan = $keterangan;
				if($induk == 'y') {
					$d->parent = 'Y';
					$d->kd_kategori_parent = '';
				} else {
					$d->parent = 'N';
					
                    $d->kd_kategori_parent = $kode_induk;
				}
				$d->active = 'Y';
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Kategori Stock :'.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

				Event::trigger('kategori/add-post/_on_finished');
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

    case 'list':

        Event::trigger('kategori/listkategori/');

		_auth1('CATEGORY-LIST',$user['id']);
		$name = _post('name');
		$msg = $routes['3'];
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator2::bootstrap('daftar_kategori','nm_kategori','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('daftar_kategori')->where_like('nm_kategori','%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }
        else{
            $paginator = Paginator2::bootstrap('daftar_kategori','','','','','','','','','50','');
            $d = ORM::for_table('daftar_kategori')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('kd_kategori')->find_many();
        }

        $ui->assign('d',$d);
		$ui->assign('msg',$msg);
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', Asset::js(array($spath.'list-kategori')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-kategori.tpl');

        break;


    case 'edit-post':

        Event::trigger('inventaris/edit-post/');


        $id = _post('cid');
		$nama = _post('nama');
		$keterangan = _post('keterangan');
		$induk = _post('induk');
		$kode_induk = _post('kode_induk');
		$aktif = _post('aktif');
		$msg = '';
        
		if($nama == '') {
			$msg .= 'Nama Kategori tidak boleh kosong';
		}
		
		if($induk != 'y') {
			if($kode_induk == '')
				$msg .= 'Kode Induk harus di isi';
		}

		$d = ORM::for_table('daftar_kategori')->find_one($id);
        $kode = $d['kd_kategori'];
        if($d){
            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('daftar_kategori')->find_one($id);
					$d->nm_kategori = $nama;
					$d->keterangan = $keterangan;
                    if($induk == 'y') {
					   $d->parent = 'Y';
					   $d->kd_kategori_parent = '';
                    } else {
                        $d->parent = 'N';
                        $d->kd_kategori_parent = $kode_induk;
                    }
					if($aktif == 'y') {
						$d->active = 'Y';
					} else {
						$d->active = 'N';
					}
					$d->edit_by = $user['id'];
					$d->edit_date = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Kategori Stock : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
					Event::trigger('kategori/add-post/_on_finished');
					echo $id;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else{
                echo $msg;
            }

        }
        else{
            r2(U.'kategori/list', 'e', 'Kategori Stock tersebut tidak ditemukan');
        }

        break;
     case 'itemstock':

        Event::trigger('kategori/list/');

		_auth1('CATEGORY-ITEMSTOCK',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_kategori')->find_one($cid);
        if($d){
//			$e = ORM::for_table('daftar_kategori_itemstock')->where('kd_kategori',$d['kd_kategori'])->find_many();
            $e = ORM::for_table('daftar_kategori_itemstock')->table_alias("a")->select("a.*")->select("b.merk")->select("b.tipe")->select("b.spesifikasi")->left_outer_join("daftar_itemstock",array("a.kd_item","=","b.kd_item"),"b")->where('a.kd_kategori',$d['kd_kategori'])->find_many();
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

//			$ui->assign('paginator',$paginator);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-kategori-itemstock','numeric')));
			$ui->display($spath.'list-kategori-itemstock.tpl');
		}

        break;

    case 'itemstock-post':
        $kd_kategori = _post('kd_kategori');
		$kd_item = explode(',', _post('kd_item'));;
		$aktif = explode(',', _post('aktif'));;
		
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
					$saktif = $aktif[$i];
					$e = ORM::for_table('daftar_kategori_itemstock')->where('kd_kategori',$kd_kategori)->where('kd_item',$code)->find_one();
					if($e) {
						$f = ORM::for_table('daftar_kategori_itemstock')->where('kd_kategori',$kd_kategori)->where('kd_item',$code)->find_one();
						$f->edit_by = $user['id'];
						$f->edit_date = date('Y-m-d H:i:s');
					} else {
						$f = ORM::for_table('daftar_kategori_itemstock')->create();
						$f->kd_kategori = $kd_kategori;
						$f->kd_item = $code;
						$f->add_by = $user['id'];
						$f->add_date = date('Y-m-d H:i:s');
					}
					$f->active = $saktif;
					$f->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Edit Kategori - Item Stock : '.$kd_kategori,$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
						'dataval'		=>	1);
				echo json_encode($data);
				Event::trigger('kategori/itemstock/_on_finished');
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
    case 'hapus-itemstock':
        $kode = _post('kode');
        $kd_kategori = _post('kd_kategori');
		if($kode <> '') {
			$y = ORM::for_table('daftar_kategori_itemstock')->where('kd_kategori',$kd_kategori)->where('kd_item',$kode)->find_one();
			if($y) {
				$z = ORM::for_table('daftar_kategori_itemstock')->where('kd_kategori',$kd_kategori)->where('kd_item',$kode)->delete_many();
				echo 1;
			} else echo 'a';
		} else echo 'a';
		
        break;
    
    case 'render-itemstock':

        $kode = _post('kode');
		if($kode <> '') {
			$y = ORM::for_table('daftar_itemstock')->where('kd_item',$kode)->find_one();
			if($y) {
				$x = ORM::for_table('stock')->where('kd_item',$kode)->order_by_desc('tgl')->find_one();
				if($x)
					$stock = $x['qty_balance'];
				else
					$stock = 0;
				$data = array(
						'nm_item'		=>	$y['nm_item'],
						'merk'			=>	$y['merk'],
						'tipe'			=>	$y['tipe'],
						'satuan'		=>	$y['satuan'],
						'spesifikasi'	=>	$y['spesifikasi'],
						'stock'			=>	$stock);
				echo json_encode($data);
			} else {
				$data = array(
						'nm_item'		=>	'',
						'merk'			=>	'',
						'tipe'			=>	'',
						'satuan'		=>	'',
						'stock'			=>	0,
						'spesifikasi'	=>	'');
				echo json_encode($data);
			}
		} else {
			$data = array(
					'nm_item'		=>	'',
					'merk'			=>	'',
					'tipe'			=>	'',
					'satuan'		=>	'',
					'stock'			=>	0,
					'spesifikasi'	=>	'');
			echo json_encode($data);
		}
		
        break;

    default:
        echo 'action not defined';
}