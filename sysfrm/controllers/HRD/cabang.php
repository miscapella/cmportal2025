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
    $myCtrl = 'masterdata';
}
_auth();

$ui->assign('_sysfrm_menu', 'masterdata');
$ui->assign('_sysfrm_menu1', 'cabang-list');
$ui->assign('_title', 'List Cabang - '. $config['CompanyName']);
$ui->assign('_st', 'List Cabang');
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
        Event::trigger('cabang/list/');
		_auth1('SHOW-MASTERDATA-CABANG', $user['id']);

        $msg = $routes[3];

        $ui->assign('msg', $msg);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'cabang-list', 'btn-top/btn-top')));
        $ui->display($spath . 'cabang-list.tpl');
        break;

    case 'add':
        Event::trigger('cabang/add/');
		_auth1('UPDATE-MASTERDATA-CABANG', $user['id']);

        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'cabang-add', 'btn-top/btn-top')));
        $ui->display($spath . 'cabang-add.tpl');
        break;

    case 'add-post':
        Event::trigger('cabang/add-post/');
		_auth1('UPDATE-MASTERDATA-CABANG', $user['id']);

        $branchName   = _post('branch_name');
        $workLocation = _post('work_location');

        $msg = '';

        if (!$branchName) $msg .= 'Branch Name tidak boleh kosong. <br>';
        else if (strlen($branchName) > 255) $msg .= 'Branch Name tidak boleh melebihi 255 karakter. <br>';

        if (!$workLocation) $msg .= 'Work Location tidak boleh kosong. <br>';
        else if (strlen($workLocation) > 255) $msg .= 'Work Location tidak boleh melebihi 255 karakter. <br>';

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

            $branch                = ORM::for_table('daftar_cabang')->create();
            $branch->branch_name   = $branchName;
            $branch->work_location = $workLocation;
            $branch->save();

            ORM::get_db()->commit();

            $cid = $branch->id;

            _log1("Tambah Data Cabang [CID: $cid]", $user['username'], $user['id']);
            Event::trigger('cabang/add-post/_on_finished');

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
        Event::trigger('cabang/detail/');
		_auth1('SHOW-MASTERDATA-CABANG', $user['id']);

        $id     = $routes[3];
        $branch = ORM::for_table('daftar_cabang')->where('id', $id)->find_one();

        if (!$branch) {
            r2(U . 'cabang/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $ui->assign('branch', $branch);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), 'btn-top/btn-top')));
        $ui->display($spath . 'cabang-detail.tpl');
        break;

    case 'edit':
        Event::trigger('cabang/edit/');
		_auth1('UPDATE-MASTERDATA-CABANG', $user['id']);

        $id     = $routes[3];
        $branch = ORM::for_table('daftar_cabang')->where('id', $id)->find_one();

        if (!$branch) {
            r2(U . 'cabang/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $ui->assign('branch', $branch);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'cabang-edit', 'btn-top/btn-top')));
        $ui->display($spath . 'cabang-edit.tpl');
        break;

    case 'edit-post':
        Event::trigger('cabang/edit-post/');
		_auth1('UPDATE-MASTERDATA-CABANG', $user['id']);

        $id           = _post('cid');
        $branchName   = _post('branch_name');
        $workLocation = _post('work_location');

        $branch = ORM::for_table('daftar_cabang')->where('id', $id)->find_one();

        if (!$branch) {
            $response = [
                'status' => 2,
                'message' => 'Data cabang tidak ditemukan',
            ];

            echo json_encode($response);
            break;
        }

        $msg = '';

        if (!$branchName) $msg .= 'Branch Name tidak boleh kosong. <br>';
        else if (strlen($branchName) > 255) $msg .= 'Branch Name tidak boleh melebihi 255 karakter. <br>';

        if (!$workLocation) $msg .= 'Work Location tidak boleh kosong. <br>';
        else if (strlen($workLocation) > 255) $msg .= 'Work Location tidak boleh melebihi 255 karakter. <br>';

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

            $branch->branch_name   = $branchName;
            $branch->work_location = $workLocation;
            $branch->save();

            ORM::get_db()->commit();

            $cid = $branch->id;

            _log1("Edit Data Cabang [CID: $cid]", $user['username'], $user['id']);
            Event::trigger('cabang/edit-post/_on_finished');

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
        Event::trigger('cabang/delete/');
		_auth1('DELETE-MASTERDATA-CABANG', $user['id']);

        $uid = $routes[3];
        $id  = str_replace('uid', '', $uid);

        ORM::get_db()->beginTransaction();

        $branch = ORM::for_table('daftar_cabang')->where('id', $id)->find_one();

        if (!$branch) {
            r2(U . 'cabang/list', 'e', 'Data cabang tidak ditemukan');
            break;
        }

        $bengkelBranch    = ORM::for_table('daftar_cabang_bengkel')->where('cabang_id', $id)->find_many();
        $bengkelBranchIds = array_map(function($branch) {
            return $branch->id;
        }, iterator_to_array($bengkelBranch));
        $bengkelPosition    = ORM::for_table('produktivitas_bengkel_position')->where_in('cabang_bengkel_id', $bengkelBranchIds)->find_many();
        $bengkelUnitEntry   = ORM::for_table('produktivitas_bengkel_unit_entry')->where_in('cabang_bengkel_id', $bengkelBranchIds)->find_many();

        $marketingBranch    = ORM::for_table('daftar_cabang_marketing')->where('cabang_id', $id)->find_many();
        $marketingBranchIds = array_map(function($branch) {
            return $branch->id;
        }, iterator_to_array($marketingBranch));
        $marketingMitra     = ORM::for_table('daftar_mitra')->where_in('cabang_marketing_id', $marketingBranchIds)->find_many();
        $marketingPosition  = ORM::for_table('produktivitas_marketing_position')->where_in('cabang_marketing_id', $marketingBranchIds)->find_many();
        $marketingUnitEntry = ORM::for_table('produktivitas_marketing_sales')->where_in('cabang_marketing_id', $marketingBranchIds)->find_many();

        $branch->delete();
        $bengkelBranch->delete();
        $bengkelPosition->delete();
        $bengkelUnitEntry->delete();
        $marketingBranch->delete();
        $marketingPosition->delete();
        $marketingUnitEntry->delete();
        $marketingMitra->delete();

        ORM::get_db()->commit();

        _log1("Hapus Data Cabang [CID: $id]", $user['username'], $user['id']);
        r2(U . 'cabang/list', 's', 'Berhasil menghapus data cabang');
        break;

    default:
        echo 'action not defined';

}
