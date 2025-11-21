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
$ui->assign('_title', $_L['Delete'].'- '. $config['CompanyName']);
$action = $routes['2'];
$user = User::_info();
switch ($action) {
    case 'datatype':
		_auth1('DATATYPE-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('daftar_datatype')->find_one($id);
		if($d){
			$d->delete();
            _log1('Hapus Data Type [CID: '.$id.']',$user['username'],$user['id']);
            r2(U.'datatype/list','s','Berhasil menghapus Data Type');
		}
		else{
			r2(U.'datatype/list','e','Data Type Tidak Ditemukan');
		}
		break;
	
	case 'form':
		_auth1('FORM-DEL',$user['id']);
		$id = $routes['3'];
		$id = str_replace('uid','',$id);
		$d = ORM::for_table('form_master')->find_one($id);
		if($d){
			$e = ORM::for_table('form_detail')->where('kode_form', $d['kode_form'])->find_many();
			$f = ORM::for_table('daftar_setting')->where('kode_form', $d['kode_form'])->find_many();
			$g = ORM::for_table('daftar_response')->where('kode_form', $d['kode_form'])->find_many();
			$h = ORM::for_table('daftar_approval')->where('kode_form', $d['kode_form'])->find_many();
			$d->delete();
			$e->delete();
			$f->delete();
			$g->delete();
			$h->delete();
			_log1('Hapus Data Form [CID: '.$id.']',$user['username'],$user['id']);
			r2(U.'form/list','s','Berhasil menghapus Data Form');
		}
		else{
			r2(U.'form/list','e','Data Type Tidak Ditemukan');
		}
		break;  
    
	default:
        echo 'action not defined';
}