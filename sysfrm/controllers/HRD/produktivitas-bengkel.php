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
    $myCtrl = 'analisis';
}
_auth();

$ui->assign('_sysfrm_menu', 'analisis');
$ui->assign('_sysfrm_menu1', 'produktivitas');
$ui->assign('_sysfrm_menu2', 'produktivitas-bengkel');
$ui->assign('_title', 'Produktivitas Bengkel - '. $config['CompanyName']);
$ui->assign('_st', 'Produktivitas Bengkel');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user   = User::_info();
$ui->assign('user', $user);
$spath  = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

switch ($action) {

    case 'list':
        Event::trigger('produktivitas-bengkel/list/');
		_auth1('SHOW-PRODUKTIVITAS-BENGKEL', $user['id']);

        $msg = $routes[3];

        $ui->assign('msg', $msg);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'produktivitas-bengkel-list', 'btn-top/btn-top')));
        $ui->display($spath . 'produktivitas-bengkel-list.tpl');
        break;

    case 'add':
        Event::trigger('produktivitas-bengkel/add/');
		_auth1('ADD-PRODUKTIVITAS-BENGKEL', $user['id']);

        $branches       = ORM::for_table('daftar_cabang')->order_by_asc('id')->find_many();
        $branchesSelect = '<option value="">--- Cabang ---</option>';
        $workLocations  = [];
        foreach ($branches as $branch) {
            $branchId                  = $branch['id'];
            $branchName                = $branch['branch_name'];
            $workLocations[$branchId]  = $branch['work_location'];
            $branchesSelect           .= "<option value='$branchId'>$branchName</option>";
        }

        $ui->assign('branchesSelect', $branchesSelect);
        $ui->assign('workLocations', json_encode($workLocations, true));
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top', 's2/css/select2.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'produktivitas-bengkel-add', 'btn-top/btn-top', 's2/js/select2.min')));
        $ui->display($spath . 'produktivitas-bengkel-add.tpl');
        break;

    case 'add-post':
        Event::trigger('produktivitas-bengkel/add-post/');
		_auth1('ADD-PRODUKTIVITAS-BENGKEL', $user['id']);

        $workLocationId  = _post('work_location');
        $spreadsheetLink = _post('spreadsheet_link');
        $isUDT           = _post('is_udt') === 'on';

        $msg = '';

        if (!$workLocationId) $msg .= 'Cabang wajib dipilih. <br>';
        else if (!ORM::for_table('daftar_cabang')->find_one($workLocationId)) $msg .= 'Cabang tidak valid. <br>';

        if (!$spreadsheetLink) $msg .= 'Link Spreadsheet tidak boleh kosong. <br>';
        else if (!preg_match('/^https:\/\/docs\.google\.com\/spreadsheets\/d\/([a-zA-Z0-9_-]+)(\/.*)?$/', $spreadsheetLink)) $msg .= 'Link Spreadsheet tidak valid. <br>';

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

            $cabang                        = ORM::for_table('daftar_cabang_bengkel')->create();
            $cabang->cabang_id             = $workLocationId;
            $cabang->link_spreadsheet      = $spreadsheetLink;
            $cabang->is_udt                = $isUDT;
            $cabang->save();

            ORM::get_db()->commit();

            $cid = $cabang->id;

            _log1("Tambah Data Cabang Bengkel [CID: $cid]", $user['username'], $user['id']);
            Event::trigger('produktivitas-bengkel/add-post/_on_finished');

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

    case 'semua':
        Event::trigger('produktivitas-bengkel/semua/');
		_auth1('SHOW-SEMUA-PRODUKTIVITAS-BENGKEL', $user['id']);

        $semuaCabang = ORM::for_table('daftar_cabang_bengkel')->select('id')->find_array();

        $ui->assign('semuaCabang', json_encode($semuaCabang));
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'produktivitas-bengkel-semua', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'produktivitas-bengkel-semua.tpl');
        break;

    case 'detail':
        Event::trigger('produktivitas-bengkel/detail/');
		_auth1('SHOW-PRODUKTIVITAS-BENGKEL', $user['id']);

        $id     = $routes[3];
        $cabang = ORM::for_table('daftar_cabang_bengkel')
            ->select_many('daftar_cabang_bengkel.*', 'daftar_cabang.branch_name', 'daftar_cabang.work_location')
            ->join('daftar_cabang', [ 'daftar_cabang_bengkel.cabang_id', '=', 'daftar_cabang.id' ])
            ->find_one($id);

        if (!$cabang) {
            r2(U . 'produktivitas-bengkel/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $ui->assign('cabang', $cabang);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'produktivitas-bengkel-detail', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'produktivitas-bengkel-detail.tpl');
        break;

    case 'position':
        Event::trigger('produktivitas-bengkel/position/');
		_auth1('SHOW-PRODUKTIVITAS-BENGKEL', $user['id']);

        $id     = $routes[3];
        $cabang = ORM::for_table('daftar_cabang_bengkel')->where('id', $id)->find_one();

        if (!$cabang) {
            r2(U . 'produktivitas-bengkel/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $ui->assign('cabang', $cabang);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'produktivitas-bengkel-position', 'btn-top/btn-top')));
        $ui->display($spath . 'produktivitas-bengkel-position.tpl');
        break;

    case 'position-post':
        Event::trigger('produktivitas-bengkel/position-post/');

        $id     = $routes[3];
        $cabang = ORM::for_table('daftar_cabang_bengkel')->where('id', $id)->find_one();

        if (!$cabang) {
            echo json_encode([ 'checked' => false ]);
            break;
        }

        $positionId = _post('positionId');
        $checked    = _post('checked');
        $type       = _post('type');

        if ($checked === 'true') {
            $positionExists = ORM::for_table('produktivitas_bengkel_position')->where('cabang_bengkel_id', $id)->where('posisi_id', $positionId)->find_one();
            if (!$positionExists) {
                $position                    = ORM::for_table('produktivitas_bengkel_position')->create();
                $position->cabang_bengkel_id = $id;
                $position->posisi            = $type;
                $position->posisi_id         = $positionId;
                $position->save();
            }

            echo json_encode([ 'checked' => true ]);
        } else {
            $position = ORM::for_table('produktivitas_bengkel_position')->where('cabang_bengkel_id', $id)->where('posisi_id', $positionId)->find_many();
            $position->delete();

            echo json_encode([ 'checked' => false ]);
        }

        break;

    case 'position-posts':
        Event::trigger('produktivitas-bengkel/position-posts/');

        $id     = $routes[3];
        $cabang = ORM::for_table('daftar_cabang_bengkel')->where('id', $id)->find_one();

        if (!$cabang) {
            echo json_encode([ 'checked' => false ]);
            break;
        }

        $positionIds = json_decode(_post('positionIds'));
        $checked     = _post('checked');
        $type        = _post('type');

        if ($checked === 'true') {
            ORM::get_db()->beginTransaction();

            foreach($positionIds as $positionId) {
                $positionExists = ORM::for_table('produktivitas_bengkel_position')->where('cabang_bengkel_id', $id)->where('posisi_id', $positionId)->find_one();
                if (!$positionExists) {
                    $position                    = ORM::for_table('produktivitas_bengkel_position')->create();
                    $position->cabang_bengkel_id = $id;
                    $position->posisi            = $type;
                    $position->posisi_id         = $positionId;
                    $position->save();
                }
            }

            ORM::get_db()->commit();

            echo json_encode([ 'checked' => true ]);
        } else {
            $position = ORM::for_table('produktivitas_bengkel_position')->where('cabang_bengkel_id', $id)->where_in('posisi_id', $positionIds)->find_many();
            $position->delete();

            echo json_encode([ 'checked' => false ]);
        }

        break;

    case 'edit':
        Event::trigger('produktivitas-bengkel/edit/');
		_auth1('EDIT-PRODUKTIVITAS-BENGKEL', $user['id']);

        $id     = $routes[3];
        $cabang = ORM::for_table('daftar_cabang_bengkel')->where('id', $id)->find_one();

        if (!$cabang) {
            r2(U . 'produktivitas-bengkel/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $branches             = ORM::for_table('daftar_cabang')->order_by_asc('id')->find_many();
        $branchesSelect       = '<option value="">--- Cabang ---</option>';
        $workLocations        = [];
        $selectedWorkLocation = '';
        foreach ($branches as $branch) {
            $branchId                  = $branch['id'];
            $branchName                = $branch['branch_name'];
            $workLocations[$branchId]  = $branch['work_location'];
            $selected                  = $cabang['cabang_id'] == $branchId ? 'selected' : '';
            $branchesSelect           .= "<option value='$branchId' $selected>$branchName</option>";
            if ($selected) $selectedWorkLocation = $branch['work_location'];
        }

        $ui->assign('cabang', $cabang);
        $ui->assign('branchesSelect', $branchesSelect);
        $ui->assign('workLocations', json_encode($workLocations, true));
        $ui->assign('selectedWorkLocation', $selectedWorkLocation);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top', 's2/css/select2.min')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'produktivitas-bengkel-edit', 'btn-top/btn-top', 's2/js/select2.min')));
        $ui->display($spath . 'produktivitas-bengkel-edit.tpl');
        break;

    case 'edit-post':
        Event::trigger('produktivitas-bengkel/edit-post/');
		_auth1('EDIT-PRODUKTIVITAS-BENGKEL', $user['id']);

        $id              = _post('cid');
        $workLocationId  = _post('work_location');
        $spreadsheetLink = _post('spreadsheet_link');
        $isUDT           = _post('is_udt') === 'on';

        $cabang = ORM::for_table('daftar_cabang_bengkel')->where('id', $id)->find_one();

        if (!$cabang) {
            $response = [
                'status' => 2,
                'message' => 'Data cabang tidak ditemukan',
            ];

            echo json_encode($response);
            break;
        }

        $msg = '';

        if (!$workLocationId) $msg .= 'Cabang wajib dipilih. <br>';
        else if (!ORM::for_table('daftar_cabang')->find_one($workLocationId)) $msg .= 'Cabang tidak valid. <br>';

        if (!$spreadsheetLink) $msg .= 'Link Spreadsheet tidak boleh kosong. <br>';
        else if (!preg_match('/^https:\/\/docs\.google\.com\/spreadsheets\/d\/([a-zA-Z0-9_-]+)(\/.*)?$/', $spreadsheetLink)) $msg .= 'Link Spreadsheet tidak valid. <br>';

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

            $cabang->cabang_id             = $workLocationId;
            $cabang->link_spreadsheet      = $spreadsheetLink;
            $cabang->is_udt                = $isUDT;
            $cabang->save();

            ORM::get_db()->commit();

            $cid = $cabang->id;

            _log1("Edit Data Cabang Bengkel [CID: $cid]", $user['username'], $user['id']);
            Event::trigger('produktivitas-bengkel/edit-post/_on_finished');

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
        Event::trigger('produktivitas-bengkel/delete/');
		_auth1('DELETE-PRODUKTIVITAS-BENGKEL', $user['id']);

        $uid = $routes[3];
        $id  = str_replace('uid', '', $uid);

        ORM::get_db()->beginTransaction();

        $cabang = ORM::for_table('daftar_cabang_bengkel')->where('id', $id)->find_one();

        if (!$cabang) {
            r2(U . 'produktivitas-bengkel/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $position  = ORM::for_table('produktivitas_bengkel_position')->where('cabang_bengkel_id', $id)->find_many();
        $unitEntry = ORM::for_table('produktivitas_bengkel_unit_entry')->where('cabang_bengkel_id', $id)->find_many();

        $cabang->delete();
        $position->delete();
        $unitEntry->delete();

        ORM::get_db()->commit();

        _log1("Hapus Data Cabang Bengkel [CID: $id]", $user['username'], $user['id']);
        r2(U . 'produktivitas-bengkel/list', 's', 'Berhasil menghapus data cabang');
        break;

    default:
        echo 'action not defined';

}

function isValidMonthYear($date) {
    $dateTime = DateTime::createFromFormat('Y-m-d', $date);
    return $dateTime && $dateTime->format('Y-m-d') === $date;
}