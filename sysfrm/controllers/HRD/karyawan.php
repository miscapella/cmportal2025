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
$ui->assign('_sysfrm_menu1', 'karyawan-list');
$ui->assign('_title', 'List Karyawan - '. $config['CompanyName']);
$ui->assign('_st', 'List Karyawan');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user   = User::_info();
$ui->assign('user', $user);
$spath  = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

$excel = [
    'Employee Personal Information'            => [ 'Employee Id', 'Employee Name', 'Citizenship', 'Gender', 'Marital Status', 'Date of Birth', 'Religion', 'Blood Type', 'User Id', 'Employee Category', 'BPJS Kesehatan Join Date', 'Kelas Rawat', 'First Join Date', 'Ready for Cross Company' ],
    'Employee Working Information'             => [ 'Employee Id', 'First Join Date', 'Employee Status', 'Employment Type', 'Contract Category', 'Years in Service', 'Position Id', 'Grade', 'Work Location' ],
    'Query - Employee Education'               => [ 'Employee Id', 'Education Level Name', 'Education Field Name' ],
    'Terminated Employee Personal Information' => [ 'Employee Id', 'Employee Name', 'Citizenship', 'Gender', 'Marital Status', 'Date of Birth', 'Religion', 'Blood Type', 'User Id', 'Employee Category', 'BPJS Kesehatan Join Date', 'Kelas Rawat', 'First Join Date' ],
    'Terminated Employee Working Information'  => [ 'Employee Id', 'First Join Date', 'Employee Status', 'Employment Type', 'Contract Category', 'Years in Service', 'Position Id', 'Grade', 'Work Location', 'Termination Date' ],
    'Leave Request'                            => [ 'Employee Id', 'Request Date', 'Request Status', 'Leave Type', 'Leave From', 'Leave Time From', 'Leave To', 'Leave Time To', 'Number of Working Applied', 'Reports to Work on', 'Working Time', 'Reason', 'Note' ],
];

switch ($action) {

    case 'list':
        Event::trigger('karyawan/list/');
		_auth1('SHOW-MASTERDATA-KARYAWAN', $user['id']);

        $dataDate = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();

        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'karyawan-list', 'btn-top/btn-top')));
        $ui->display($spath . 'karyawan-list.tpl');
        break;

    case 'detail':
        Event::trigger('karyawan/detail/');
		_auth1('SHOW-MASTERDATA-KARYAWAN', $user['id']);

        $id       = $routes['3'];
        $dataDate = ORM::for_table('sys_appconfig')->where('setting', 'daftar_karyawan_date')->find_one();
        $employee = ORM::for_table('daftar_karyawan')->where('id', $id)->find_one();
        $cuti     = ORM::for_table('daftar_cuti')->where('id_karyawan', $id)->find_array();

        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('employee', $employee);
        $ui->assign('cuti', json_encode($cuti));
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'karyawan-detail', 'btn-top/btn-top')));
        $ui->display($spath . 'karyawan-detail.tpl');
        break;

    case 'update':
        Event::trigger('karyawan/update/');
		_auth1('UPDATE-MASTERDATA-KARYAWAN', $user['id']);

        $ui->assign('excel', $excel);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'karyawan-update', 'btn-top/btn-top')));
        $ui->display($spath . 'karyawan-update.tpl');
        break;

    case 'update-post':
        Event::trigger('karyawan/update-post/');
		_auth1('UPDATE-MASTERDATA-KARYAWAN', $user['id']);

        $data = json_decode(_post('data'), true);

        $error = '';
        foreach ($excel as $key => $value) {
            if (!$data[$key]) $error .= "Invalid $key. <br>";
        }

        if ($error) {
            $response = [ 'status' => 2, 'error' => $error ];
            echo json_encode($response);
            exit;
        }

        $employees = [];
        $leaves = [];

        foreach ($data['Employee Personal Information'] as $employeePersonalInfo) {
            $employeeId = $employeePersonalInfo['Employee Id'];
            unset($employeePersonalInfo['Employee Id']);
            $employees[$employeeId] = array_merge($employeePersonalInfo, [ 'Terminated' => false ]);
        }

        foreach ($data['Employee Working Information'] as $employeeWorkingInfo) {
            $employeeId = $employeeWorkingInfo['Employee Id'];
            if ($employees[$employeeId]) $employees[$employeeId] = array_merge($employees[$employeeId], $employeeWorkingInfo);
        }

        foreach ($data['Query - Employee Education'] as $employeeEducation) {
            $employeeId = $employeeEducation['Employee Id'];
            if ($employees[$employeeId]) $employees[$employeeId] = array_merge($employees[$employeeId], $employeeEducation);
        }

        foreach ($data['Terminated Employee Personal Information'] as $terminatedEmployeePersonalInfo) {
            $employeeId = $terminatedEmployeePersonalInfo['Employee Id'];
            unset($terminatedEmployeePersonalInfo['Employee Id']);
            $employees[$employeeId] = array_merge($terminatedEmployeePersonalInfo, [ 'Terminated' => true ]);
        }

        foreach ($data['Terminated Employee Working Information'] as $terminatedEmployeeWorkingInfo) {
            $employeeId = $terminatedEmployeeWorkingInfo['Employee Id'];
            if ($employees[$employeeId]) $employees[$employeeId] = array_merge($employees[$employeeId], $terminatedEmployeeWorkingInfo);
        }

        foreach ($data['Leave Request'] as $leave) {
            $employeeId = $leave['Employee Id'];
            if ($employees[$employeeId]) {
                if (!$leaves[$employeeId]) $leaves[$employeeId] = [];
                unset($leave['Employee Id']);
                array_push($leaves[$employeeId], $leave);
            }
        }

        try {
            ORM::get_db()->beginTransaction();
            ORM::get_db()->exec('DELETE FROM daftar_karyawan');
            ORM::get_db()->exec('DELETE FROM daftar_cuti');
            ORM::get_db()->exec('UPDATE sys_appconfig SET value = "' . date('Y-m-d') . '" WHERE setting = "daftar_karyawan_date"');

            foreach ($employees as $employeeId => $data) {
                $employee                           = ORM::for_table('daftar_karyawan')->create();
                $employee->employee_id              = $employeeId;
                $employee->employee_name            = $data['Employee Name'];
                $employee->position_id              = $data['Position Id'];
                $employee->terminated               = $data['Terminated'];
                $employee->termination_date         = $data['Termination Date'] ? DateTime::createFromFormat('d M Y', $data['Termination Date'])->format('Y-m-d') : null;
                $employee->citizenship              = $data['Citizenship'];
                $employee->gender                   = $data['Gender'];
                $employee->marital_status           = $data['Marital Status'];
                $employee->date_of_birth            = $data['Date of Birth'] ? DateTime::createFromFormat('d M Y', $data['Date of Birth'])->format('Y-m-d') : null;
                $employee->religion                 = $data['Religion'];
                $employee->blood_type               = $data['Blood Type'];
                $employee->employee_category        = $data['Employee Category'];
                $employee->bpjs_kesehatan_join_date = $data['BPJS Kesehatan Join Date'] ? DateTime::createFromFormat('d M Y', $data['BPJS Kesehatan Join Date'])->format('Y-m-d') : null;
                $employee->kelas_rawat              = $data['Kelas Rawat'];
                $employee->first_join_date          = $data['First Join Date'] ? DateTime::createFromFormat('d M Y', $data['First Join Date'])->format('Y-m-d') : null;
                $employee->ready_for_cross_company  = $data['Ready for Cross Company'] ?? false;
                $employee->employee_status          = $data['Employee Status'];
                $employee->employment_type          = $data['Employment Type'];
                $employee->contract_category        = $data['Contract Category'];
                $employee->years_in_service         = $data['Years in Service'];
                $employee->grade                    = $data['Grade'];
                $employee->work_location            = $data['Work Location'];
                $employee->education_level_name     = $data['Education Level Name'];
                $employee->education_field_name     = $data['Education Field Name'];
                $employee->save();

                $idKaryawan = $employee->id();
                foreach ($leaves[$employeeId] as $leaveData) {
                    $leave                            = ORM::for_table('daftar_cuti')->create();
                    $leave->id_karyawan               = $idKaryawan;
                    $leave->request_date              = $leaveData['Request Date'] ? DateTime::createFromFormat('d M Y', $leaveData['Request Date'])->format('Y-m-d') : null;
                    $leave->request_status            = $leaveData['Request Status'];
                    $leave->leave_type                = $leaveData['Leave Type'];
                    $leave->leave_from                = $leaveData['Leave From'] ? DateTime::createFromFormat('d M Y', $leaveData['Leave From'])->format('Y-m-d') : null;
                    $leave->leave_time_from           = $leaveData['Leave Time From'];
                    $leave->leave_to                  = $leaveData['Leave To'] ? DateTime::createFromFormat('d M Y', $leaveData['Leave To'])->format('Y-m-d') : null;
                    $leave->leave_time_to             = $leaveData['Leave Time To'];
                    $leave->number_of_working_applied = $leaveData['Number of Working Applied'];
                    $leave->reports_to_work_on        = $leaveData['Reports to Work on'] ? DateTime::createFromFormat('d M Y', $leaveData['Reports to Work on'])->format('Y-m-d') : null;
                    $leave->working_time              = $leaveData['Working Time'];
                    $leave->reason                    = $leaveData['Reason'];
                    $leave->note                      = $leaveData['Note'];
                    $leave->save();
                }
            }

            ORM::get_db()->commit();

            _log1('Update Data Karyawan', $user['username'], $user['id']);
            Event::trigger('karyawan/update-post/_on_finished');

            echo json_encode([ 'status' => 1, 'msg' => 'Data Karyawan berhasil diperbarui!', 'data' => $leaves ]);
        } catch (PDOException $ex) {
            ORM::get_db()->rollBack();

            $response = [
                'status' => 3,
                'error' => 'Terjadi kesalahan. Silahkan dicoba lagi.',
            ];

            echo json_encode($response);
        }

        break;

    case 'upload-file':
        $filename  = $_FILES['file']['name'];
        $graphType = $_POST['graphType'];

        if (isset($filename) && isset($graphType)) {
            $tmpPath            = $_FILES['file']['tmp_name'];
            $extension          = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $allowed_extensions = array('xlsx', 'xls');
            $response           = [ 'type' => $graphType ];

            if(in_array($extension, $allowed_extensions)) {
                try {
                    if (!$excel[$graphType]) throw new Error('Tipe analitik tidak diketahui');

                    $spreadsheet = IOFactory::load($tmpPath);
                    $worksheet   = $spreadsheet->getSheet(0);
                    $data        = $worksheet->toArray();

                    $result      = processSpreadsheet($data, $graphType);
                    $response    = array_merge($response, $result);
                } catch (Throwable $error) {
                    $response['status'] = 3;
                    $response['error']  = 'Error membaca file Excel: ' . $error->getMessage();
                }
            } else {
                $response['status'] = 0;
            }

            echo json_encode($response);
            exit;
        }

        echo 0;
        break;

    default:
        echo 'action not defined';

}

function processSpreadsheet($data, $type) {
    global $excel;

    $index   = array_reduce($excel[$type], fn($acc, $key) => $acc + [ $key => -1 ], []);
    $result  = [ 'status' => 2, 'column' => $index ];
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
            $result['status'] = 2;
            $result['column'] = $index;
            break;
        } else {
            if ($result['status'] !== 1) $result = [ 'status' => 1, 'data' => [] ];

            $rowData = [];
            foreach ($excel[$type] as $col) {
                $value = $d[$index[$col]];
                $rowData[$col] = $value;
            }

            array_push($result['data'], $rowData);
        }
    }

    return $result;
}
