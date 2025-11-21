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
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Inventory - '. $config['CompanyName']);
$ui->assign('_st', 'Gudang');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
switch ($action) {
    case 'add':
		$ui->assign('_sysfrm_menu1', 'gudang');
		$ui->assign('_sysfrm_menu2', 'addgudang');
        $ui->assign('xfooter', Asset::js(array('numeric')));
        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');
        $ui->display('gudang-add.tpl');
        break;

    case 'add-post':
        $kode = _post('kode');
        $lokasi = _post('lokasi');
        $msg = '';
//check with same name account is exist
        $d = ORM::for_table('sys_gudang')->where('kode_gudang',$kode)->find_one();
        if($d){
            $msg .= 'Kode Gudang tersebut telah ada<br>';
        }

        if($msg == ''){
            // Add Account
            $d = ORM::for_table('sys_gudang')->create();
            $d->kode_gudang = $kode;
            $d->lokasi = $lokasi;
            $d->save();
            r2(U . 'gudang/list', 's', 'Gudang berhasil di simpan');
        }
        else{
            r2(U . 'gudang/add', 'e', $msg);
        }
        break;

    case 'list':

        $d = ORM::for_table('sys_gudang')->find_many();
        $ui->assign('d',$d);
		$ui->assign('_sysfrm_menu1', 'gudang');
		$ui->assign('_sysfrm_menu2', 'listgudang');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/gudang.js"></script>
');
        $ui->display('gudang-manage.tpl');
        break;

    case 'edit':
        $id  = $routes['2'];
		$ui->assign('_sysfrm_menu1', 'gudang');
		$ui->assign('_sysfrm_menu2', 'listgudang');
        $d = ORM::for_table('sys_gudang')->find_one($id);
        if($d){

            $ui->assign('d',$d);
            $ui->display('gudang-edit.tpl');

        }
        else{
            r2(U . 'gudang/list', 'e', 'Gudang tidak ditemukan');
        }

        break;
    case 'edit-post':
        $kode = _post('kode');
        $lokasi = _post('lokasi');
        $id = _post('id');
        $msg = '';

        if($msg == ''){

            $d = ORM::for_table('sys_gudang')->find_one($id);
            if($d){
                $d->kode_gudang = $kode;
                $d->lokasi = $lokasi;

                $d->save();

                r2(U . 'gudang/list', 's', 'Gudang berhasil di-update');

            }
            else{
                r2(U . 'gudang/list', 'e', 'Gudang tidak ditemukan');
            }



        }
        else{
            r2(U . 'gudang/add', 'e', $msg);
        }

        break;
    case 'delete':
        $id = $routes['2'];
        $d = ORM::for_table('sys_gudang')->find_one($id);
        if($d){
            $d->delete();
            r2(U . 'gudang/list', 's', 'Gudang berhasil dihapus');
        }

        break;
    default:
        echo 'action not defined';
}