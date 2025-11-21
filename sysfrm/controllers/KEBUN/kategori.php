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
$ui->assign('_sysfrm_menu1', 'listkategori');
$ui->assign('_title', 'Daftar Bagian - '. $config['CompanyName']);
$ui->assign('_st', 'Daftar Bagian');
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
        Event::trigger('kategori/add/');
		_auth1('CATEGORY-ADD',$user['id']);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-kategori','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->display($spath.'add-kategori.tpl');
        break;

	case 'addmain':
		Event::trigger('kategori/add/');
		_auth1('CATEGORY-ADD',$user['id']);

		$cid = $routes['3'];
		$d = ORM::for_table('daftar_kategori')->find_one($cid);
		$ui->assign('parent', $cid);
		$ui->assign('d', $d);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-main','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->display($spath.'add-main.tpl');
		break;

	case 'addsub':
		Event::trigger('kategori/add/');
		_auth1('CATEGORY-ADD',$user['id']);

		$cid = $routes['3'];
		$main = $routes['4'];
		$d = ORM::for_table('daftar_kategori')->find_one($cid);
		$e = ORM::for_table('daftar_kategori')->find_one($main);
		$ui->assign('parent', $cid);
		$ui->assign('main', $main);
		$ui->assign('d', $d);
		$ui->assign('e', $e);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-sub','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->display($spath.'add-sub.tpl');
		break;

	case 'addline':
		Event::trigger('kategori/add/');
		_auth1('CATEGORY-ADD',$user['id']);

		$cid = $routes['3'];
		$main = $routes['4'];
		$sub = $routes['5'];
		$d = ORM::for_table('daftar_kategori')->find_one($cid);
		$e = ORM::for_table('daftar_kategori')->find_one($main);
		$f = ORM::for_table('daftar_kategori')->find_one($sub);
		$ui->assign('parent', $cid);
		$ui->assign('main', $main);
		$ui->assign('sub', $sub);
		$ui->assign('d', $d);
		$ui->assign('e', $e);
		$ui->assign('f', $f);
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-line','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->display($spath.'add-line.tpl');
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
				$clist .= '<option value="'.$r['kode_kategori'].'"'.($r['kode_kategori'] == $d['kode_kategori_parent'] ? ' selected="selected" ' : '').'>'.$r['kode_kategori'].' - '.$r['nama_kategori'].'</option>';
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
		if($nama == ''){
			$msg .= 'Bagian harus di isi<br>';
		}
        $chk = ORM::for_table('daftar_kategori')->where('nama_kategori',$nama)->find_one();
        if($chk){
            $msg .= 'Bagian tersebut sudah ada <br>';
        }

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_kategori')->raw_query('select * from daftar_kategori order by kode_kategori desc')->find_one();
				if($chk) {
					$no = ++$chk['kode_kategori'];
				} else {
					$no = 'CATEGORY/00001';
				}
				$d = ORM::for_table('daftar_kategori')->create();

				$d->kode_kategori = $no;
				$d->nama_kategori = $nama;
				$d->parent = 'Y';
				$d->kode_kategori_parent = '';
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Bagian Stock :'.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

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

	case 'addmain-post':
		Event::trigger('kategori/addmain-post/');
		$nama = _post('nama');
		$bagian = _post('parents');
		if($nama == ''){
			$msg .= 'Main Data harus di isi<br>';
		}
		$parent = ORM::for_table('daftar_kategori')->find_one($bagian);

		if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_kategori')->raw_query('select * from daftar_kategori order by kode_kategori desc')->find_one();
				if($chk) {
					$no = ++$chk['kode_kategori'];
				} else {
					$no = 'CATEGORY/00001';
				}
				$d = ORM::for_table('daftar_kategori')->create();

				$d->kode_kategori = $no;
				$d->nama_kategori = $nama;
				$d->parent = 'N';
				$d->kode_kategori_parent = $parent['kode_kategori'];
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Bagian Stock :'.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

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

	case 'addsub-post':
		Event::trigger('kategori/addsub-post/');
		$nama = _post('nama');
		$main = _post('mains');
		if($nama == ''){
			$msg .= 'Sub Data harus di isi<br>';
		}
		$parent = ORM::for_table('daftar_kategori')->find_one($main);

		if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_kategori')->raw_query('select * from daftar_kategori order by kode_kategori desc')->find_one();
				if($chk) {
					$no = ++$chk['kode_kategori'];
				} else {
					$no = 'CATEGORY/00001';
				}
				$d = ORM::for_table('daftar_kategori')->create();

				$d->kode_kategori = $no;
				$d->nama_kategori = $nama;
				$d->parent = 'N';
				$d->kode_kategori_parent = $parent['kode_kategori'];
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Sub Data :'.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

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

	case 'addline-post':
		Event::trigger('kategori/addline-post/');
		$nama = _post('nama');
		$sub = _post('subs');
		if($nama == ''){
			$msg .= 'Line Data harus di isi<br>';
		}
		$parent = ORM::for_table('daftar_kategori')->find_one($sub);

		if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$chk = ORM::for_table('daftar_kategori')->raw_query('select * from daftar_kategori order by kode_kategori desc')->find_one();
				if($chk) {
					$no = ++$chk['kode_kategori'];
				} else {
					$no = 'CATEGORY/00001';
				}
				$d = ORM::for_table('daftar_kategori')->create();

				$d->kode_kategori = $no;
				$d->nama_kategori = $nama;
				$d->parent = 'N';
				$d->kode_kategori_parent = $parent['kode_kategori'];
				$d->add_by = $user['id'];
				$d->add_date = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
				_log1('Tambah Line Data :'.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

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
        $d = ORM::for_table('daftar_kategori')->where('parent', 'Y')->order_by_asc('kode_kategori')->find_many();
        $ui->assign('d',$d);
		$ui->assign('msg',$msg);
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-kategori','numeric')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-kategori.tpl');
        break;

	case 'main':
		_auth1('CATEGORY-LIST',$user['id']);
		$cid = $routes['3'];
		$msg = $routes['4'];
		$bagian = ORM::for_table('daftar_kategori')->find_one($cid);
		$d = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $bagian['kode_kategori'])->order_by_asc('kode_kategori')->find_many();
		$ui->assign('d',$d);
		$ui->assign('parent',$cid);
		$ui->assign('nama_bagian', $bagian['nama_kategori']);
		$ui->assign('msg',$msg);
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-kategori','numeric')));
		$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	');
		$ui->display($spath.'list-main.tpl');
		break;

	case 'sub':
		_auth1('CATEGORY-LIST',$user['id']);
		$parent = $routes['3'];
		$cid = $routes['4'];
		$msg = $routes['5'];
		$bagian = ORM::for_table('daftar_kategori')->find_one($cid);
		$main = ORM::for_table('daftar_kategori')->find_one($parent);
		$d = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $bagian['kode_kategori'])->order_by_asc('kode_kategori')->find_many();
		$ui->assign('d',$d);
		$ui->assign('parent',$parent);
		$ui->assign('nama_parent',$main['nama_kategori']);
		$ui->assign('sub',$cid);
		$ui->assign('nama_bagian', $bagian['nama_kategori']);
		$ui->assign('msg',$msg);
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-kategori','numeric')));
		$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	');
		$ui->display($spath.'list-sub.tpl');
		break;

	case 'line':
		_auth1('CATEGORY-LIST',$user['id']);
		$parent = $routes['3'];
		$main = $routes['4'];
		$cid = $routes['5'];
		$msg = $routes['6'];
		$bagian = ORM::for_table('daftar_kategori')->find_one($cid);
		$mains = ORM::for_table('daftar_kategori')->find_one($parent);
		$subs = ORM::for_table('daftar_kategori')->find_one($main);
		$d = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $bagian['kode_kategori'])->order_by_asc('kode_kategori')->find_many();
		$ui->assign('d',$d);
		$ui->assign('parent',$parent);
		$ui->assign('main',$main);
		$ui->assign('line',$cid);
		$ui->assign('nama_parent', $mains['nama_kategori']);
		$ui->assign('nama_sub', $subs['nama_kategori']);
		$ui->assign('nama_bagian', $bagian['nama_kategori']);
		$ui->assign('msg',$msg);
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-kategori','numeric')));
		$ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
	');
		$ui->display($spath.'list-line.tpl');
		break;

    case 'edit-post':
        Event::trigger('inventaris/edit-post/');
        $id = _post('cid');
		$nama = _post('nama');
		$msg = '';
		if($nama == '') {
			$msg .= 'Bagian tidak boleh kosong';
		}
		$d = ORM::for_table('daftar_kategori')->find_one($id);
        $kode = $d['kode_kategori'];
        if($d){
            if($msg == ''){
				ORM::get_db()->beginTransaction();
				try {
					$d = ORM::for_table('daftar_kategori')->find_one($id);
					$d->nama_kategori = $nama;
					$d->edit_by = $user['id'];
					$d->edit_date = date('Y-m-d H:i:s');
					$d->save();

					ORM::get_db()->commit();
					_log1('Edit Bagian Stock : '.$kode.' [CID: '.$id.']',$user['username'],$user['id']);
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
            $e = ORM::for_table('daftar_kategori_itemstock')->table_alias("a")->select("a.*")->select("b.nama_item")->select("b.merk")->select("b.tipe")->select("b.spesifikasi")->left_outer_join("daftar_itemstock",array("a.kode_item","=","b.kode_item"),"b")->where('a.kode_kategori',$d['kode_kategori'])->find_many();
			$list_sudah_ada = '';
			if ($e) {
				foreach($e as $ds) {
					$is_active = $ds['active'] == "Y" ? "checked" : "";
					$list_sudah_ada .= '		
					<tr>
						<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
							<select name="kode_item[]" class="kode_item" id="kode_item" disabled>
								<option value="'.$ds['kode_item'].'" >'.$ds['kode_item'].' - '.$ds['nama_item'].'</option>
							</select>
						</td>
						<td>'.$ds['merk'].'</td>
						<td>'.$ds['tipe'].'</td>
						<td>'.$ds['spesifikasi'].'</td>
						<td><input type="checkbox" name="aktif[]" class="cekbox" '.$is_active.'></td>
						<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
					</tr>
					';
				}
			}
			$ui->assign('tes', $list_sudah_ada);
            $ui->assign('d',$d);
            $ui->assign('e',$e);
            $ui->assign('tg',$tg);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-kategori-itemstock','numeric')));
			$ui->display($spath.'list-kategori-itemstock.tpl');
		}
        break;		

    case 'itemstock-post':
        $kode_kategori = _post('kode_kategori');
		$kode_item = explode(',', _post('kode_item'));;
		$aktif = explode(',', _post('aktif'));;
		sort($kode_item);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($kode_item as $code) {
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
				foreach($kode_item as $code) {
					$saktif = $aktif[$i];
					$e = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori',$kode_kategori)->where('kode_item',$code)->find_one();
					if($e) {
						$f = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori',$kode_kategori)->where('kode_item',$code)->find_one();
						$f->edit_by = $user['id'];
						$f->edit_date = date('Y-m-d H:i:s');
					} else {
						$f = ORM::for_table('daftar_kategori_itemstock')->create();
						$f->kode_kategori = $kode_kategori;
						$f->kode_item = $code;
						$f->add_by = $user['id'];
						$f->add_date = date('Y-m-d H:i:s');
					}
					$f->active = $saktif;
					$f->save();

					$i++;
				}
				ORM::get_db()->commit();
				_log1('Edit Kategori - Item Stock : '.$kode_kategori,$user['username'],$user['id']);
				$data = array(
						'msg'			=>  'Berhasil Update',
						'dataval'		=>	1);
				echo json_encode($data);
				Event::trigger('kategori/itemstock/_on_finished');
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
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
        $kode_kategori = _post('kode_kategori');
		if($kode <> '') {
			$y = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori',$kode_kategori)->where('kode_item',$kode)->find_one();
			if($y) {
				$z = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori',$kode_kategori)->where('kode_item',$kode)->delete_many();
				echo 1;
			} else echo 'a';
		} else echo 'a';
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
						'spesifikasi'	=>	$y['spesifikasi'],
						'stock'			=>	$stock);
				echo json_encode($data);
			} else {
				$data = array(
						'nama_item'		=>	'',
						'merk'			=>	'',
						'tipe'			=>	'',
						'satuan'		=>	'',
						'stock'			=>	0,
						'spesifikasi'	=>	'');
				echo json_encode($data);
			}
		} else {
			$data = array(
					'nama_item'		=>	'',
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