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

if (!isset($myCtrl)) {
    $myCtrl = 'masterdata';
}
_auth();

$ui->assign('_sysfrm_menu', 'masterdata');
$ui->assign('_sysfrm_menu1', 'posisi-list');
$ui->assign('_title', 'List Posisi - '. $config['CompanyName']);
$ui->assign('_st', 'List Posisi');
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
        Event::trigger('posisi/list/');
		_auth1('SHOW-MASTERDATA-POSISI', $user['id']);

        $msg = $routes[3];

        $ui->assign('msg', $msg);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'posisi-list', 'btn-top/btn-top')));
        $ui->display($spath . 'posisi-list.tpl');
        break;

    case 'update':
        Event::trigger('posisi/update/');
		_auth1('UPDATE-MASTERDATA-POSISI', $user['id']);

        $ui->assign('cols', $positionExcel);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'posisi-update', 'btn-top/btn-top')));
        $ui->display($spath . 'posisi-update.tpl');
        break;

    case 'update-post':
        Event::trigger('posisi/update-post/');
		_auth1('UPDATE-MASTERDATA-POSISI', $user['id']);

        $data = json_decode(_post('data'), true);

        if (!count($data)) {
            $response = [
                'status' => 2,
                'message' => 'File harus diupload.',
            ];

            echo json_encode($response);
            break;
        }

        $positionIds = [];
        $emptyPositionId = '';
        $longPositionid = '';
        $duplicatePositionId = '';
        $emptyPositionTitle = '';
        $longPositionTitle = '';
        $longPositionGrade = '';
        $longPositionLevel = '';

        foreach ($data as $d) {
            if (!$d['Position Id']) $emptyPositionId = 'Terdapat Position Id yang kosong. <br>';
            if (strlen($d['Position Id']) > 30) $longPositionid = 'Terdapat Position Id yang melebihi 30 karakter. <br>';
            if (array_search($d['Position Id'], $positionIds) !== false) $duplicatePositionId = 'Terdapat Position Id yang duplikat. <br>';
            else array_push($positionIds, $d['Position Id']);

            if (!$d['Internal Title']) $emptyPositionTitle = 'Terdapat Position Title yang kosong. <br>';
            else if (strlen($d['Internal Title']) > 255) $longPositionTitle = 'Terdapat Position Title yang melebihi 255 karakter. <br>';

            if (strlen($d['Position Grade']) > 10) $longPositionGrade = 'Terdapat Position Grade yang melebihi 10 karakter. <br>';

            if (strlen($d['Position Level']) > 20) $longPositionLevel = 'Terdapat Position Level yang melebihi 20 karakter. <br>';
        }

        $error = $emptyPositionId . $longPositionid . $duplicatePositionId . $emptyPositionTitle . $longPositionTitle . $longPositionGrade . $longPositionLevel;

        if ($error) {
            $response = [
                'status' => 2,
                'message' => $error,
            ];

            echo json_encode($response);
            break;
        }

        try {
            ORM::get_db()->beginTransaction();

            $delete     = ORM::for_table('daftar_posisi')->where_not_in('position_id', $positionIds)->find_many();
            $deletedIds = [];

            foreach ($delete as $row) {
                $deletedIds[] = $row->id;
            }

            $delete->delete();

            if (!!count($deletedIds)) {
                $deleteProduktivitasBengkel = ORM::for_table('produktivitas_bengkel_position')->where_in('posisi_id', $deletedIds)->find_many();
                $deleteProduktivitasBengkel->delete();
            }

            foreach ($data as $d) {
                $position = ORM::for_table('daftar_posisi')->where('position_id', $d['Position Id'])->find_one();
                if (!$position) {
                    $position = ORM::for_table('daftar_posisi')->create();
                }

                $position->position_id = $d['Position Id'];
                $position->title       = $d['Internal Title'];
                $position->grade       = $d['Position Grade'];
                $position->level       = $d['Position Level'];
                $position->save();
            }

            ORM::get_db()->commit();

            _log1("Perbarui Data Posisi", $user['username'], $user['id']);
            Event::trigger('posisi/update-post/_on_finished');

            $response = [ 'status' => 1 ];
            echo json_encode($response);
        } catch (PDOException $ex) {
            ORM::get_db()->rollBack();

            $response = [
                'status' => 2,
                'message' => 'Terjadi kesalahan. Silahkan dicoba lagi.',
            ];

            echo json_encode($response);
        }

        break;

    case 'add':
        Event::trigger('posisi/add/');
		_auth1('UPDATE-MASTERDATA-POSISI', $user['id']);

        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'posisi-add', 'btn-top/btn-top')));
        $ui->display($spath . 'posisi-add.tpl');
        break;

    case 'add-post':
        Event::trigger('posisi/add-post/');
		_auth1('UPDATE-MASTERDATA-POSISI', $user['id']);

        $positionId    = _post('position_id');
        $positionTitle = _post('position_title');
        $positionGrade = _post('position_grade');
        $positionLevel = _post('position_level');

        $msg = '';

        if (!$positionId) $msg .= 'Position Id tidak boleh kosong. <br>';
        else if (strlen($positionId) > 30) $msg .= 'Position Id tidak boleh melebihi 30 karakter. <br>';
        else {
            $position = ORM::for_table('daftar_posisi')->where('position_id', $positionId)->find_one();
            if ($position) $msg .= 'Position Id tersebut sudah ada. <br>';
        }

        if (!$positionTitle) $msg .= 'Position Title tidak boleh kosong. <br>';
        else if (strlen($positionTitle) > 255) $msg .= 'Position Title tidak boleh melebihi 255 karakter. <br>';

        if (strlen($positionGrade) > 10) $msg .= 'Position Grade tidak boleh melebihi 10 karakter. <br>';

        if (strlen($positionLevel) > 20) $msg .= 'Position Level tidak boleh melebihi 20 karakter. <br>';

        if ($msg) {
            $response = [
                'status' => 2,
                'message' => $msg,
            ];

            echo json_encode($response);
            break;
        }

        try {
            ORM::get_db()->beginTransaction();

            $position              = ORM::for_table('daftar_posisi')->create();
            $position->position_id = $positionId;
            $position->title       = $positionTitle;
            $position->grade       = $positionGrade;
            $position->level       = $positionLevel;
            $position->save();

            ORM::get_db()->commit();

            $cid = $position->id;

            _log1("Tambah Data Posisi [CID: $cid]", $user['username'], $user['id']);
            Event::trigger('posisi/add-post/_on_finished');

            $response = [ 'status' => 1 ];
            echo json_encode($response);
        } catch (PDOException $ex) {
            ORM::get_db()->rollBack();

            $response = [
                'status' => 2,
                'message' => 'Terjadi kesalahan. Silahkan dicoba lagi.',
            ];

            echo json_encode($response);
        }

        break;

    case 'detail':
        Event::trigger('posisi/detail/');
		_auth1('SHOW-MASTERDATA-POSISI', $user['id']);

        $id       = $routes[3];
        $position = ORM::for_table('daftar_posisi')->where('id', $id)->find_one();

        if (!$position) {
            r2(U . 'posisi/list', 'e', 'Data posisi tidak ditemukan');
            break;
        }

        $ui->assign('posisi', $position);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), 'btn-top/btn-top')));
        $ui->display($spath . 'posisi-detail.tpl');
        break;

    case 'edit':
        Event::trigger('posisi/edit/');
		_auth1('UPDATE-MASTERDATA-POSISI', $user['id']);

        $id       = $routes[3];
        $position = ORM::for_table('daftar_posisi')->where('id', $id)->find_one();

        if (!$position) {
            r2(U . 'posisi/list', 'e', 'Data posisi tidak ditemukan');
            break;
        }

        $ui->assign('posisi', $position);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'posisi-edit', 'btn-top/btn-top')));
        $ui->display($spath . 'posisi-edit.tpl');
        break;

    case 'edit-post':
        Event::trigger('posisi/edit-post/');
		_auth1('UPDATE-MASTERDATA-POSISI', $user['id']);

        $id            = _post('cid');
        $positionId    = _post('position_id');
        $positionTitle = _post('position_title');
        $positionGrade = _post('position_grade');
        $positionLevel = _post('position_level');

        $position = ORM::for_table('daftar_posisi')->where('id', $id)->find_one();

        if (!$position) {
            $response = [
                'status' => 2,
                'message' => 'Data posisi tidak ditemukan',
            ];

            echo json_encode($response);
            break;
        }

        $msg = '';

        if (!$positionId) $msg .= 'Position Id tidak boleh kosong. <br>';
        else if (strlen($positionId) > 30) $msg .= 'Position Id tidak boleh melebihi 30 karakter. <br>';
        else {
            $otherPosition = ORM::for_table('daftar_posisi')->where('position_id', $positionId)->where_not_equal('id', $id)->find_one();
            if ($otherPosition) $msg .= 'Position Id tersebut sudah ada. <br>';
        }

        if (!$positionTitle) $msg .= 'Position Title tidak boleh kosong. <br>';
        else if (strlen($positionTitle) > 255) $msg .= 'Position Title tidak boleh melebihi 255 karakter. <br>';

        if (strlen($positionGrade) > 10) $msg .= 'Position Grade tidak boleh melebihi 10 karakter. <br>';

        if (strlen($positionLevel) > 20) $msg .= 'Position Level tidak boleh melebihi 20 karakter. <br>';

        if ($msg) {
            $response = [
                'status' => 2,
                'message' => $msg,
            ];

            echo json_encode($response);
            break;
        }

        try {
            ORM::get_db()->beginTransaction();

            $position->position_id = $positionId;
            $position->title       = $positionTitle;
            $position->grade       = $positionGrade;
            $position->level       = $positionLevel;
            $position->save();

            ORM::get_db()->commit();

            $cid = $position->id;

            _log1("Edit Data Posisi [CID: $cid]", $user['username'], $user['id']);
            Event::trigger('posisi/edit-post/_on_finished');

            $response = [ 'status' => 1 ];
            echo json_encode($response);
        } catch (PDOException $ex) {
            ORM::get_db()->rollBack();

            $response = [
                'status' => 2,
                'message' => 'Terjadi kesalahan. Silahkan dicoba lagi.',
            ];

            echo json_encode($response);
        }

        break;

    case 'delete':
        Event::trigger('posisi/delete/');
		_auth1('DELETE-MASTERDATA-POSISI', $user['id']);

        $uid = $routes[3];
        $id  = str_replace('uid', '', $uid);

        ORM::get_db()->beginTransaction();

        $position = ORM::for_table('daftar_posisi')->where('id', $id)->find_one();

        if (!$position) {
            r2(U . 'posisi/list', 'e', 'Data posisi tidak ditemukan');
            break;
        }

        $produktivitasBengkelPosition = ORM::for_table('produktivitas_bengkel_position')->where('posisi_id', $id)->find_many();

        $position->delete();
        $produktivitasBengkelPosition->delete();

        ORM::get_db()->commit();

        _log1("Hapus Data Posisi [CID: $id]", $user['username'], $user['id']);
        r2(U . 'posisi/list', 's', 'Berhasil menghapus data posisi');
        break;

    case 'upload-file':
        $filename  = $_FILES['file']['name'];

        if (!isset($filename)) {
            $response = [
                'status' => 3,
                'message' => 'Please select a file.',
            ];

            echo json_encode($response);
            break;
        }

        $tmpPath            = $_FILES['file']['tmp_name'];
        $extension          = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed_extensions = array('xlsx', 'xls');
        $response           = [ 'type' => $graphType ];

        if (!in_array($extension, $allowed_extensions)) {
            $response = [
                'status' => 3,
                'message' => 'File gagal di upload. Sistem hanya menerima format .xlsx .xls',
            ];

            echo json_encode($response);
            break;
        }

        try {
            $spreadsheet = IOFactory::load($tmpPath);
            $worksheet   = $spreadsheet->getSheet(0);
            $data        = $worksheet->toArray();

            $index   = array_reduce($positionExcel, fn($acc, $key) => $acc + [ $key => -1 ], []);
            $response  = [ 'status' => 2, 'column' => $index ];
            $header  = false;

            foreach ($data as $d) {
                if (!$header) {
                    foreach ($index as $column => $row) {
                        $foundIndex = array_search($column, $d);

                        if ($foundIndex !== false) {
                            $index[$column] = $foundIndex;
                            $header         = true;
                        }
                    }
                } else if (in_array(-1, $index, true)) {
                    $response['status'] = 2;
                    $response['column'] = $index;
                    break;
                } else {
                    if ($response['status'] !== 1) $response = [ 'status' => 1, 'data' => [] ];

                    $rowData = [];
                    foreach ($positionExcel as $col) {
                        $value = $d[$index[$col]];
                        $rowData[$col] = $value;
                    }

                    array_push($response['data'], $rowData);
                }
            }

            echo json_encode($response);
        } catch (Throwable $error) {
            $response = [
                'status' => 3,
                'message' => 'Error membaca file Excel. Silahkan dicoba lagi.',
            ];

            echo json_encode($response);
        }

        break;

    default:
        echo 'action not defined';

}
