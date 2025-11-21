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

require_once 'sysfrm/lib/phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!isset($myCtrl)) {
    $myCtrl = 'masterdata';
}
_auth();

$ui->assign('_sysfrm_menu', 'masterdata');
$ui->assign('_sysfrm_menu1', 'tipe-kendaraan-list');
$ui->assign('_title', 'List Tipe Kendaraan - '. $config['CompanyName']);
$ui->assign('_st', 'List Tipe Kendaraan');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user   = User::_info();
$ui->assign('user', $user);
$spath  = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

$positionExcel = [ 'Position Id', 'Internal Title', 'Position Grade', 'Position Level' ];

switch ($action) {

    case 'list':
        Event::trigger('tipe-kendaraan/list/');
		_auth1('SHOW-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $items = ORM::for_table('daftar_tipe_kendaraan')->order_by_asc('nama_tipe_mobil')->find_many();
        $ui->assign('items', $items);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'tipe-kendaraan-list', 'btn-top/btn-top')));
        $ui->display($spath . 'tipe-kendaraan-list.tpl');
        break;

    case 'update':
        // not used for simple CRUD; redirect to list
        r2(U . 'tipe-kendaraan/list');
        break;

    case 'update-post':
        // not used for simple CRUD
        r2(U . 'tipe-kendaraan/list');
        break;

    case 'add':
        Event::trigger('tipe-kendaraan/add/');
		_auth1('UPDATE-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'tipe-kendaraan-add', 'btn-top/btn-top')));
        $ui->display($spath . 'tipe-kendaraan-add.tpl');
        break;

    case 'add-post':
        Event::trigger('tipe-kendaraan/add-post/');
		_auth1('UPDATE-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $namaTipe = _post('nama_tipe_mobil');
        $merek    = _post('merek');
        $kategori = _post('kategori');

        $msg = '';
        if (!$namaTipe) $msg .= 'Nama tipe mobil tidak boleh kosong. <br>';
        else if (strlen($namaTipe) > 100) $msg .= 'Nama tipe mobil tidak boleh melebihi 100 karakter. <br>';

        if ($merek && strlen($merek) > 100) $msg .= 'Merek tidak boleh melebihi 100 karakter. <br>';
        if ($merek && strlen($merek) > 100) $msg .= 'Merek tidak boleh melebihi 100 karakter. <br>';
        if ($kategori && strlen($kategori) > 100) $msg .= 'Kategori tidak boleh melebihi 100 karakter. <br>';

        if ($msg) {
            echo json_encode([ 'status' => 2, 'message' => $msg ]);
            break;
        }

        try {
            ORM::get_db()->beginTransaction();

            $exists = ORM::for_table('daftar_tipe_kendaraan')->where('nama_tipe_mobil', $namaTipe)->find_one();
            if ($exists) {
                echo json_encode([ 'status' => 2, 'message' => 'Nama tipe mobil sudah ada.' ]);
                ORM::get_db()->rollBack();
                break;
            }

            $row = ORM::for_table('daftar_tipe_kendaraan')->create();
            $row->nama_tipe_mobil = $namaTipe;
            $row->merek           = $merek;
            $row->kategori        = $kategori;
            $row->save();

            ORM::get_db()->commit();

            _log1("Tambah Data Tipe Kendaraan [CID: {$row->id}]", $user['username'], $user['id']);
            Event::trigger('tipe-kendaraan/add-post/_on_finished');
            echo json_encode([ 'status' => 1 ]);
        } catch (PDOException $ex) {
            ORM::get_db()->rollBack();
            echo json_encode([ 'status' => 2, 'message' => 'Terjadi kesalahan. Silahkan dicoba lagi.' ]);
        }

        break;

    case 'detail':
        Event::trigger('tipe-kendaraan/detail/');
		_auth1('SHOW-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $id   = $routes[3];
        $item = ORM::for_table('daftar_tipe_kendaraan')->where('id', $id)->find_one();

        if (!$item) {
            r2(U . 'tipe-kendaraan/list', 'e', 'Data Tipe Kendaraan tidak ditemukan');
            break;
        }

        $ui->assign('item', $item);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), 'btn-top/btn-top')));
        $ui->display($spath . 'tipe-kendaraan-detail.tpl');
        break;

    case 'edit':
        Event::trigger('tipe-kendaraan/edit/');
		_auth1('UPDATE-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $id   = $routes[3];
        $item = ORM::for_table('daftar_tipe_kendaraan')->where('id', $id)->find_one();

        if (!$item) {
            r2(U . 'tipe-kendaraan/list', 'e', 'Data Tipe Kendaraan tidak ditemukan');
            break;
        }

        $ui->assign('item', $item);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'tipe-kendaraan-edit', 'btn-top/btn-top')));
        $ui->display($spath . 'tipe-kendaraan-edit.tpl');
        break;

    case 'edit-post':
        Event::trigger('tipe-kendaraan/edit-post/');
		_auth1('UPDATE-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $id       = _post('cid');
        $namaTipe = _post('nama_tipe_mobil');
        $merek    = _post('merek');
        $kategori = _post('kategori');

        $item = ORM::for_table('daftar_tipe_kendaraan')->where('id', $id)->find_one();

        if (!$item) {
            echo json_encode([ 'status' => 2, 'message' => 'Data tipe kendaraan tidak ditemukan' ]);
            break;
        }

        $msg = '';
        if (!$namaTipe) $msg .= 'Nama tipe mobil tidak boleh kosong. <br>';
        else if (strlen($namaTipe) > 100) $msg .= 'Nama tipe mobil tidak boleh melebihi 100 karakter. <br>';
        if ($kategori && strlen($kategori) > 100) $msg .= 'Kategori tidak boleh melebihi 100 karakter. <br>';

        if ($msg) {
            echo json_encode([ 'status' => 2, 'message' => $msg ]);
            break;
        }

        try {
            ORM::get_db()->beginTransaction();

            $dup = ORM::for_table('daftar_tipe_kendaraan')->where('nama_tipe_mobil', $namaTipe)->where_not_equal('id', $id)->find_one();
            if ($dup) {
                echo json_encode([ 'status' => 2, 'message' => 'Nama tipe mobil sudah ada.' ]);
                ORM::get_db()->rollBack();
                break;
            }

            $item->nama_tipe_mobil = $namaTipe;
            $item->merek           = $merek;
            $item->kategori        = $kategori;
            $item->save();

            ORM::get_db()->commit();

            _log1("Edit Data Tipe Kendaraan [CID: {$item->id}]", $user['username'], $user['id']);
            Event::trigger('tipe-kendaraan/edit-post/_on_finished');
            echo json_encode([ 'status' => 1 ]);
        } catch (PDOException $ex) {
            ORM::get_db()->rollBack();
            echo json_encode([ 'status' => 2, 'message' => 'Terjadi kesalahan. Silahkan dicoba lagi.' ]);
        }

        break;

    case 'delete':
        Event::trigger('tipe-kendaraan/delete/');
		_auth1('DELETE-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        $uid = $routes[3];
        $id  = str_replace('uid', '', $uid);

        ORM::get_db()->beginTransaction();

        $item = ORM::for_table('daftar_tipe_kendaraan')->where('id', $id)->find_one();

        if (!$item) {
            r2(U . 'tipe-kendaraan/list', 'e', 'Data Tipe Kendaraan tidak ditemukan');
            break;
        }

        $item->delete();

        ORM::get_db()->commit();

        _log1("Hapus Data Tipe Kendaraan [CID: $id]", $user['username'], $user['id']);
        r2(U . 'tipe-kendaraan/list', 's', 'Berhasil menghapus data tipe kendaraan');
        break;

    case 'upload-file':
        // not used
        r2(U . 'tipe-kendaraan/list');
        break;

    case 'export':
        Event::trigger('tipe-kendaraan/export/');
        _auth1('SHOW-MASTERDATA-TIPE-KENDARAAN', $user['id']);

        try {
            // Fetch all data
            $items = ORM::for_table('daftar_tipe_kendaraan')->order_by_asc('id')->find_many();

            // Create new Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set headers
            $sheet->setCellValue('A1', 'id');
            $sheet->setCellValue('B1', 'merek');
            $sheet->setCellValue('C1', 'nama_tipe_mobil');
            $sheet->setCellValue('D1', 'kategori');

            // Fill data
            $row = 2;
            foreach ($items as $item) {
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $item->merek);
                $sheet->setCellValue('C' . $row, $item->nama_tipe_mobil);
                $sheet->setCellValue('D' . $row, $item->kategori);
                $row++;
            }

            // Auto-size columns
            foreach (range('A', 'D') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Set filename
            $filename = 'Data_Tipe_Kendaraan_' . date('Y-m-d_His') . '.xlsx';

            // Set headers for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Write file to output
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');

            _log1("Export Data Tipe Kendaraan", $user['username'], $user['id']);
            exit;
        } catch (Exception $ex) {
            r2(U . 'tipe-kendaraan/list', 'e', 'Terjadi kesalahan saat export data');
        }
        break;

    default:
        echo 'action not defined';

}
