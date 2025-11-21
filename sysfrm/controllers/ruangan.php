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

if (!isset($myCtrl)) {
  $myCtrl = 'department';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Unit Usaha' . ' - ' . $config['CompanyName']);
$ui->assign('_st', "Unit Usaha");
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$username = $user["username"];

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

switch ($action) {
  case 'list':
    Event::trigger('ruangan/list/');

    _auth1('OPEN-RUANGAN', $user['id']);
    // $nama_dept = _post('nama_dept');
    $ui->assign('_sysfrm_menu1', 'ruangan');
    $ui->assign('_sysfrm_menu2', 'listruangan');
    // $ui->assign('nama_dept', $nama_dept);
    // if ($nama_dept != '') {
    //   $paginator = Paginator::bootstrap('daftar_department', 'kode_dept', '%' . $nama_dept . '%', '', '', '', '', '', '', '50', 'dblogin');
    //   $d = ORM::for_table('daftar_department', 'dblogin')->where_like('nama_dept', '%' . $nama_dept . '%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
    // } else {
    //   $paginator = Paginator::bootstrap('daftar_department', '', '', '', '', '', '', '', '', '50', 'dblogin');
    //   $d = ORM::for_table('daftar_department', 'dblogin')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('nama_dept')->find_many();
    // }

    $d = ORM::for_table('daftar_ruangan', 'dblogin')->find_many();

    $ui->assign('d', $d);
    // $ui->assign('paginator', $paginator);
    $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/list-ruangan.js"></script>');
    $ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
    $ui->display('list-ruangan.tpl');
    break;

  case 'add':
    Event::trigger('department/add/');
    _auth1('ADD-RUANGAN', $user['id']);
    $ui->assign('_sysfrm_menu1', 'ruangan');
    $ui->assign('_sysfrm_menu2', 'addruangan');
    $ui->assign('xheader', Asset::css('s2/css/select2.min'));
    $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), 'add-ruangan')));

    $ui->display('add-ruangan.tpl');
    break;

  case 'add-post':
    Event::trigger('department/add-post/');
    $nama_ruangan = _post('nama_ruangan');
    $lokasi = _post('lokasi');

    $msg = '';

    if ($nama_ruangan == '') {
      $msg .= 'Nama Ruangan tidak boleh kosong <br>';
    }
    $chk = ORM::for_table('daftar_ruangan', 'dblogin')->where('nama_ruangan', $nama_ruangan)->find_one();
    if ($chk) {
      $msg .= 'Nama Ruangan tersebut telah ada <br>';
    }

    if ($lokasi == '') {
      $msg .= 'Lokasi tidak boleh kosong <br>';
    }

    if ($msg == '') {
      ORM::get_db('dblogin')->beginTransaction();
      try {
        $d = ORM::for_table('daftar_ruangan', 'dblogin')->create();

        $d->nama_ruangan = $nama_ruangan;
        $d->lokasi = $lokasi;
        $d->save();

        ORM::get_db('dblogin')->commit();
        $cid = $d->id();
        _log('Tambah Ruangan' . $nama_ruangan . ' [CID: ' . $cid . ']', 'Admin', $user['id']);

        echo $cid;
      } catch (PDOException $ex) {
        ORM::get_db('dblogin')->rollBack();
        throw $ex;
      }
    } else {
      echo $msg;
    }
    break;

  case 'edit':
    Event::trigger('department/edit/');

    _auth1('EDIT-DEPARTMENT', $user['id']);
    $cid = $routes['2'];
    $d = ORM::for_table('daftar_ruangan', 'dblogin')->find_one($cid);
    if ($d) {
      $ui->assign('_sysfrm_menu1', 'ruangan');
      $ui->assign('_sysfrm_menu2', 'listruangan');
      $ui->assign('d', $d);
      $ui->assign('cid', $cid);
      $ui->assign('xheader', Asset::css('s2/css/select2.min'));
      $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), 'edit-ruangan')));
      // $tags = Tags::get_all('Department');
      $ui->assign('xjq', '
			 $("#country").select2({
			 theme: "bootstrap"
			 });
			 ');
      $ui->display('edit-ruangan.tpl');
    }
    break;

  case 'edit-post':
    Event::trigger('ruangan/edit-post/');

    $id = _post('cid');
    $d = ORM::for_table('daftar_ruangan', 'dblogin')->find_one($id);
    if ($d) {
      $nama_ruangan = _post('nama_ruangan');
      $lokasi = _post('lokasi');
      $msg = '';
      //check email already exist
      if ($nama_ruangan == '') {
        $msg .= 'Nama Ruangan tidak boleh kosong <br>';
      }
      $chk = ORM::for_table('daftar_ruangan', 'dblogin')
             ->where('nama_ruangan', $nama_ruangan)
             ->where_not_equal('id', $id)
             ->find_one();
      if ($chk) {
        $msg .= 'Nama Ruangan tersebut telah ada <br>';
      }
      if ($lokasi == '') {
        $msg .= 'Lokasi tidak boleh kosong <br>';
      }
      if ($msg == '') {
        ORM::get_db('dblogin')->beginTransaction();
        try {
          $d = ORM::for_table('daftar_ruangan', 'dblogin')->find_one($id);

          $d->nama_ruangan = $nama_ruangan;
          $d->lokasi = $lokasi;
          $d->updated_at = date('Y-m-d H:i:s');
          $d->save();
          ORM::get_db('dblogin')->commit();
          echo $id;
        } catch (PDOException $ex) {
          ORM::get_db('dblogin')->rollBack();
          throw $ex;
        }
      } else {
        echo $msg;
      }
    } else {
      r2(U . $myCtrl . '/list', 'e', 'Ruangan tersebut tidak ditemukan');
    }
    break;

  case 'delete':
    Event::trigger('ruangan/delete/');

    _auth1('DELETE-RUANGAN', $user['id']);
    $id = $routes['2'];
    $d = ORM::for_table('daftar_ruangan', 'dblogin')->find_one($id);
    if ($d) {
      $d->delete();
      r2(U . $myCtrl . '/list/', 's', 'Berhasil menghapus Ruangan');
    }

    break;
  default:
    echo 'action not defined';
}
