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
    $myCtrl = 'analitik';
}
_auth();

$ui->assign('_sysfrm_menu', 'analisis');
$ui->assign('_sysfrm_menu1', 'grafik-karyawan');
$ui->assign('_title', 'Grafik Karyawan - '. $config['CompanyName']);
$ui->assign('_st', 'Grafik Karyawan');
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

    case 'profil-distribusi-karyawan':
        Event::trigger('grafik-karyawan/profil-distribusi-karyawan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_karyawan')->find_array();
        $boilerplate = [
            'Status Karyawan'     => [ 'key' => 'employee_status',   'type' => 'basic' ],
            'Jenis Karyawan'      => [ 'key' => 'employment_type',   'type' => 'basic' ],
            'Masa Kerja Karyawan' => [ 'key' => 'years_in_service',  'type' => 'floor', 'sort' => true ],
            'Kontrak Karyawan'    => [ 'key' => 'contract_category', 'type' => 'basic' ],
            'Grade'               => [ 'key' => 'grade',             'type' => 'basic', 'sort' => true ],
            'Lokasi Kerja'        => [ 'key' => 'work_location',     'type' => 'basic' ],
        ];

        $ui->assign('_sysfrm_menu2', 'profil-distribusi-karyawan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'PROFIL DISTRIBUSI KARYAWAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'rekapitulasi-cuti-karyawan':
        Event::trigger('grafik-karyawan/rekapitulasi-cuti-karyawan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_cuti')
            ->join('daftar_karyawan', [ 'daftar_cuti.id_karyawan', '=', 'daftar_karyawan.id' ])
            ->select('daftar_cuti.*')
            ->select('daftar_karyawan.id', 'karyawan_id')
            ->select('daftar_karyawan.employee_id', 'employee_id')
            ->select('daftar_karyawan.employee_name', 'employee_name')
            ->select('daftar_karyawan.terminated', 'terminated')
            ->select('daftar_karyawan.termination_date', 'termination_date')
            ->select('daftar_karyawan.first_join_date', 'first_join_date')
            ->find_array();

        $boilerplate = [
            'Waktu Pengajuan Cuti'           => [ 'key' => 'request_date',              'type' => 'c-monthyear' ],
            'Status Pengajuan Cuti'          => [ 'key' => 'request_status',            'type' => 'c-basic' ],
            'Jenis Cuti Yang Diambil'        => [ 'key' => 'leave_type',                'type' => 'c-basic' ],
            'Jumlah Hari Cuti Yang Diajukan' => [ 'key' => 'number_of_working_applied', 'type' => 'c-basic',     'sort' => true ],
        ];

        $ui->assign('_sysfrm_menu2', 'rekapitulasi-cuti-karyawan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'REKAPITULASI CUTI KARYAWAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'demografi-karyawan':
        Event::trigger('grafik-karyawan/demografi-karyawan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_karyawan')->find_array();
        $boilerplate = [
            'Umur'              => [ 'key' => 'date_of_birth',  'type' => 'age',   'sort' => true ],
            'Gender'            => [ 'key' => 'gender',         'type' => 'basic' ],
            'Status Pernikahan' => [ 'key' => 'marital_status', 'type' => 'basic' ],
            'Agama'             => [ 'key' => 'religion',       'type' => 'basic' ],
            'Golongan Darah'    => [ 'key' => 'blood_type',     'type' => 'basic', 'sort' => [ 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-' ] ],
            'Kewarganegaraan'   => [ 'key' => 'citizenship',    'type' => 'basic' ],
        ];

        $ui->assign('_sysfrm_menu2', 'demografi-karyawan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'DEMOGRAFI KARYAWAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'status-karyawan':
        Event::trigger('grafik-karyawan/status-karyawan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_karyawan')->find_array();
        $boilerplate = [
            'Kategori Karyawan'            => [ 'key' => 'employee_category',       'type' => 'basic' ],
            'Jumlah Karyawan Masuk'        => [ 'key' => 'first_join_date',         'type' => 'a-monthyear' ],
            'Siap Untuk Lintas Perusahaan' => [ 'key' => 'ready_for_cross_company', 'type' => 'bool' ],
        ];

        $ui->assign('_sysfrm_menu2', 'status-karyawan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'STATUS KARYAWAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'pendidikan-karyawan':
        Event::trigger('grafik-karyawan/pendidikan-karyawan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_karyawan')->find_array();
        $boilerplate = [
            'Tingkat Edukasi' => [ 'key' => 'education_level_name', 'type' => 'basic', 'sort' => [ 'SD', 'SMP', 'SMK', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'MA' ] ],
            'Bidang Edukasi'  => [ 'key' => 'education_field_name', 'type' => 'basic' ],
        ];

        $ui->assign('_sysfrm_menu2', 'pendidikan-karyawan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'PENDIDIKAN KARYAWAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'terminated-karyawan':
        Event::trigger('grafik-karyawan/terminated-karyawan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_karyawan')->find_array();
        $boilerplate = [
            'Karyawan Yang Diberhentikan' => [ 'key' => 'termination_date', 'type' => 't-monthyear' ],
            'Status Karyawan'             => [ 'key' => 'employee_status',  'type' => 't-basic' ],
            'Jenis Karyawan'              => [ 'key' => 'employment_type',  'type' => 't-basic' ],
            'Masa Kerja Karyawan'         => [ 'key' => 'years_in_service', 'type' => 't-floor',     'sort' => true ],
            'Grade'                       => [ 'key' => 'grade',            'type' => 't-basic',     'sort' => true ],
            'Lokasi Kerja'                => [ 'key' => 'work_location',    'type' => 't-basic' ],
        ];

        $ui->assign('_sysfrm_menu2', 'terminated-karyawan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'TERMINATED KARYAWAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'bpjs-kesehatan':
        Event::trigger('grafik-karyawan/bpjs-kesehatan/');
		_auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $dataDate    = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $data        = ORM::for_table('daftar_karyawan')->find_array();
        $boilerplate = [
            'Waktu Masuk BPJS' => [ 'key' => 'bpjs_kesehatan_join_date', 'type' => 'a-monthyear' ],
            'Kelas Rawat'      => [ 'key' => 'kelas_rawat',              'type' => 'basic',     'sort' => true ],
        ];

        $ui->assign('_sysfrm_menu2', 'bpjs-kesehatan');
        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('data', json_encode($data, true));
        $ui->assign('boilerplate', json_encode($boilerplate, true));
        $ui->assign('headerTitle', 'BPJS KESEHATAN');
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'grafik-karyawan', 'btn-top/btn-top', 'chartjs/chart.umd', 'chartjs/datalabels/chartjs-plugin-datalabels.min')));
        $ui->display($spath . 'grafik-karyawan.tpl');
        break;

    case 'graph-settings':
        Event::trigger('grafik-karyawan/graph-settings/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $names = _post('names');
        $names = json_decode($names);

        $setting = ORM::for_table('chart_settings')->where_in('name', $names)->find_array();

        echo json_encode($setting);
        break;

    case 'change-mode':
        Event::trigger('grafik-karyawan/change-mode/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $name = _post('name');
        $mode = _post('mode');

        $setting = ORM::for_table('chart_settings')->where('name', $name)->find_one();

        if ($setting) {
            $prevMode = $setting->mode;
            $setting->mode = $mode;
            if ($prevMode === '1' && $prevMode !== $mode) $setting->chart = 'bar';
            $setting->save();
        }

        echo json_encode([ 'mode' => $setting->mode, 'chart' => $setting->chart ]);
        break;

    case 'change-chart':
        Event::trigger('grafik-karyawan/change-chart/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $name  = _post('name');
        $chart = _post('chart');

        $setting = ORM::for_table('chart_settings')->where('name', $name)->find_one();

        if ($setting) {
            $setting->chart = $chart;
            $setting->save();
        }

        break;

    case 'change-legend':
        Event::trigger('grafik-karyawan/change-legend/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $name   = _post('name');
        $legend = _post('legend');

        $setting = ORM::for_table('chart_settings')->where('name', $name)->find_one();

        if ($setting) {
            $setting->legend = $legend;
            $setting->save();
        }

        break;

    case 'change-percentage':
        Event::trigger('grafik-karyawan/change-percentage/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $name       = _post('name');
        $percentage = _post('percentage');

        $setting = ORM::for_table('chart_settings')->where('name', $name)->find_one();

        if ($setting) {
            $setting->percentage = $percentage === 'true' ? true : false;
            $setting->save();
        }

        break;

    case 'change-number':
        Event::trigger('grafik-karyawan/change-number/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $name   = _post('name');
        $number = _post('number');

        $setting = ORM::for_table('chart_settings')->where('name', $name)->find_one();

        if ($setting) {
            $setting->number = $number === 'true' ? true : false;
            $setting->save();
        }

        break;

    case 'change-hide':
        Event::trigger('grafik-karyawan/change-hide/');
        _auth1('SHOW-GRAFIK-KARYAWAN', $user['id']);

        $name = _post('name');
        $hide = _post('hide');

        $setting = ORM::for_table('chart_settings')->where('name', $name)->find_one();

        if ($setting) {
            $setting->hide = $hide === 'true' ? true : false;
            $setting->save();
        }

        break;

    default:
        echo 'action not defined';
}
