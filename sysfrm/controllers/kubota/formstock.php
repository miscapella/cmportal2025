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
    $myCtrl = 'form';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Daftar Form');
$ui->assign('_st', 'Daftar Form');
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

        Event::trigger('form/add/');
		_auth1('FORM-ADD',$user['id']);

		$ui->assign('_sysfrm_menu1', 'formstock');
		$ui->assign('_sysfrm_menu2', 'form-add');

        // $fs = ORM::for_table('sys_kode')->where('ctype','crm')->order_by_asc('id')->find_many();
        // $ui->assign('fs',$fs);

        $ui->assign('xheader', Asset::css('s2/css/select2.min'));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-form')));
        $ui->assign('xjq', ' ');

        $ui->display($spath.'add-form.tpl');

        break;


    case 'add-post':

        Event::trigger('form/add-post/');

        $no = _post('nocetak');
        $jlh = _post('jlh');

        $msg = '';

        if($no == ''){
            $msg .= 'No. Cetak Awal tidak boleh kosong <br>';
        }
		for ($x = 0; $x < $jlh; $x++) {
			$cquery=ORM::for_table("form_stock")->where('no_cetak',$no)->find_one();
			if($cquery) {
				$msg .= 'Salah satu No. Cetak tersebut sudah pernah diinput !';
				break;
			}
			$no= ++$no;
		}

        if($msg == ''){
			$varResult=true;
			$no = strtoupper(_post('nocetak'));
			try
			{
				ORM::get_db()->beginTransaction();
				for ($x = 0; $x < $jlh; $x++) {
					$d = ORM::execute("INSERT INTO form_stock (no_cetak,add_by,add_date) VALUES('$no','".$user['id']."','".date('Ymd')."')");
					if($x < $jlh-1)
						$no= ++$no;
						
					if (!$d)
						$varResult=false;
				}
				ORM::get_db()->commit();
				if($varResult) {
					_log1('Tambah Form berhasil :'.strtoupper(_post('nocetak')).' s/d '.$no,$user['username'],$user['id']);
					echo 'Tambah Form berhasil :'.strtoupper(_post('nocetak')).' s/d '.$no;
				} else {
					_log1('Tambah Form sebagian berhasil :'.strtoupper(_post('nocetak')).' s/d '.$no,$user['username'],$user['id']);
					echo 'Tambah Form sebagian berhasil :'.strtoupper(_post('nocetak')).' s/d '.$no;
				}
 				}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		}
		else {
            echo $msg;
		}

        break;

    case 'list':

        Event::trigger('form/list/');
		_auth1('FORM-LIST',$user['id']);

        $ui->assign('_st', 'Daftar Form Stock');

        $name = _post('name');
        $filter = _post('filter');
        if($name != ''){
			$paginator = Paginator::bootstrap('form_stock',$filter,'%'.$name.'%','','','','','','',15);
			$d = ORM::for_table('form_stock')->where_like($filter,'%'.$name.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('status')->order_by_asc('no_cetak')->find_many();
			$ui->assign('cari',$name);
			if($filter == 'no_pesan') {
				$ui->assign('jfilter','Filter No. Pesan');
			} else {
				$ui->assign('jfilter','Filter Nama');
			}
		} else {
			$paginator = Paginator::bootstrap('form_stock','','','','','','','','',15);
			$d = ORM::for_table('form_stock')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('status')->order_by_asc('no_cetak')->find_many();
		}

        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'formstock');
		$ui->assign('_sysfrm_menu2', 'form-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', Asset::js(array($spath.'list-form.js')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-form.tpl');

        break;

    default:
        echo 'action not defined';
}