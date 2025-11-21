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
use PhpOffice\PhpSpreadsheet\Style\Fill;

if (!isset($myCtrl)) {
    $myCtrl = 'masterdata';
}
_auth();

$ui->assign('_sysfrm_menu', 'masterdata');
$ui->assign('_sysfrm_menu1', 'customer-list');
$ui->assign('_title', 'List Customer - '. $config['CompanyName']);
$ui->assign('_st', 'List Customer');
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
    'Customer Personal Information'            => [ 'Nama', 'Alamat', 'Nama SA', 'Equipment No', 'No. Polisi', 'Home', 'Office', 'Mobile', 'CP Name', 'CP Phone', 'DM Name', 'DM Phone', 'Tipe Kendaraan', 'Tgl. Service', 'Tgl. Selesai', 'Tahun Kendaraan', 'KM','Tgl. Delivery', 'Customer Receive Car', 'Job Type'],
    // 'Customer Working Information'             => [ 'Customer Id', 'First Join Date', 'Customer Status', 'Employment Type', 'Contract Category', 'Years in Service', 'Position Id', 'Grade', 'Work Location' ],
    // 'Query - Customer Education'               => [ 'Customer Id', 'Education Level Name', 'Education Field Name' ],
    // 'Terminated Customer Personal Information' => [ 'Customer Id', 'Customer Name', 'Citizenship', 'Gender', 'Marital Status', 'Date of Birth', 'Religion', 'Blood Type', 'User Id', 'Customer Category', 'BPJS Kesehatan Join Date', 'Kelas Rawat', 'First Join Date' ],
    // 'Terminated Customer Working Information'  => [ 'Customer Id', 'First Join Date', 'Customer Status', 'Employment Type', 'Contract Category', 'Years in Service', 'Position Id', 'Grade', 'Work Location', 'Termination Date' ],
    // 'Leave Request'                            => [ 'Customer Id', 'Request Date', 'Request Status', 'Leave Type', 'Leave From', 'Leave Time From', 'Leave To', 'Leave Time To', 'Number of Working Applied', 'Reports to Work on', 'Working Time', 'Reason', 'Note' ],
];

switch ($action) {

    case 'list':
        Event::trigger('customer/list/');
		_auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);

        $dataDate = ORM::for_table('sys_appconfig')->where('setting', 'daftar_customer_date')->find_one();

        // Load distinct kategori from master tipe kendaraan for filter options
        $kategoriRows = ORM::for_table('daftar_tipe_kendaraan')
            ->select('kategori')
            ->where_not_null('kategori')
            ->where_raw('kategori <> ""')
            ->group_by('kategori')
            ->order_by_asc('kategori')
            ->find_array();
        $kategoriList = [];
        if (is_array($kategoriRows)) {
            foreach ($kategoriRows as $r) {
                if (isset($r['kategori'])) { $kategoriList[] = $r['kategori']; }
            }
        }

        if (!in_array('Tidak Terkategori', $kategoriList, true)) {
            $kategoriList[] = 'Tidak Terkategori';
        }

        // Load distinct merek from master tipe kendaraan for filter options
        $merekRows = ORM::for_table('daftar_tipe_kendaraan')
            ->select('merek')
            ->where_not_null('merek')
            ->where_raw('merek <> ""')
            ->group_by('merek')
            ->order_by_asc('merek')
            ->find_array();
        $merekList = [];
        if (is_array($merekRows)) {
            foreach ($merekRows as $r) {
                if (isset($r['merek'])) { $merekList[] = $r['merek']; }
            }
        }
        if (!in_array('Tidak Terkategori', $merekList, true)) {
            $merekList[] = 'Tidak Terkategori';
        }

        // Load distinct cabang (kode_dept) for filter options
        $cabangRows = ORM::for_table('daftar_customer')
            ->select('kode_dept')
            ->where_not_null('kode_dept')
            ->where_raw('kode_dept <> ""')
            ->group_by('kode_dept')
            ->order_by_asc('kode_dept')
            ->find_array();
        $cabangList = [];
        if (is_array($cabangRows)) {
            foreach ($cabangRows as $r) {
                if (isset($r['kode_dept'])) { $cabangList[] = $r['kode_dept']; }
            }
        }

        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('kategoriList', $kategoriList);
        $ui->assign('merekList', $merekList);
        $ui->assign('cabangList', $cabangList);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'customer-list', 'btn-top/btn-top')));
        $ui->display($spath . 'customer-list.tpl');
        break;

    case 'detail':
        Event::trigger('customer/detail/');
		_auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);

        $id       = $routes['3'];
        $dataDate = ORM::for_table('sys_appconfig')->where('setting', 'daftar_customer_date')->find_one();
        $customer = ORM::for_table('daftar_customer')->where('id', $id)->find_one();

        $ui->assign('dataDate', $dataDate['value']);
        $ui->assign('customer', $customer);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'customer-detail', 'btn-top/btn-top')));
        $ui->display($spath . 'customer-detail.tpl');
        break;

    case 'update':
        Event::trigger('customer/update/');
		_auth1('UPDATE-MASTERDATA-CUSTOMER', $user['id']);

        $ui->assign('excel', $excel);
        $ui->assign('xheader', Asset::css(array('btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/' . lan(), $spath . 'customer-update', 'btn-top/btn-top')));
        $ui->display($spath . 'customer-update.tpl');
        break;

    case 'update-post':
        Event::trigger('customer/update-post/');
		_auth1('UPDATE-MASTERDATA-CUSTOMER', $user['id']);

        // Accept data from standard form field or raw JSON body (fallback for large payloads)
        $data = json_decode(_post('data'), true);
        // Accept period key/date sent from client
        $periodKey  = _post('period_key'); // expected MMYYYY from filename
        $periodDate = _post('period_date'); // optional YYYY-MM-01 derived server/client
        if (!$data) {
            $rawBody = @file_get_contents('php://input');
            if ($rawBody) {
                $decoded = json_decode($rawBody, true);
                if (isset($decoded['data']) && is_array($decoded['data'])) {
                    $data = $decoded['data'];
                }
                if (isset($decoded['period_key'])) $periodKey = $decoded['period_key'];
                if (isset($decoded['period_date'])) $periodDate = $decoded['period_date'];
            }
        }

        // Normalize incoming keys (trim/case-insensitive/underscore vs space)
        $normalizedData = [];
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $nk = is_string($k) ? trim($k) : $k;
                $normalizedData[$nk] = $v;
            }
        }

        $resolveKey = function($wantedKey) use ($normalizedData) {
            if (isset($normalizedData[$wantedKey])) return $wantedKey;
            $candidates = array_keys($normalizedData);
            $wantedLower = strtolower(str_replace(['_', '  '], [' ', ' '], trim($wantedKey)));
            foreach ($candidates as $cand) {
                if (!is_string($cand)) continue;
                $candLower = strtolower(str_replace(['_', '  '], [' ', ' '], trim($cand)));
                if ($candLower === $wantedLower) return $cand; // exact case-insensitive match
            }
            return null;
        };

        $error = '';
        foreach ($excel as $key => $_) {
            $resolved = $resolveKey($key);
            if ($resolved === null || empty($normalizedData[$resolved])) {
                $error .= "Invalid $key. <br>";
            }
        }

        // If only one dataset is provided, use it for the single expected section
        if ($error && count($excel) === 1 && is_array($normalizedData) && count($normalizedData) === 1) {
            $onlyExpected = array_key_first($excel);
            $onlyProvidedKey = array_key_first($normalizedData);
            $data = [ $onlyExpected => $normalizedData[$onlyProvidedKey] ];
            $error = '';
        } else {
            $data = $normalizedData;
        }

        if ($error) {
            send_json([ 'status' => 2, 'error' => $error ]);
        }

        // Validate kode_dept and period
        $kodeDept = isset($user['kode_dept']) ? trim((string)$user['kode_dept']) : '';
        if ($kodeDept === '') {
            send_json([ 'status' => 3, 'error' => 'Kode departemen pengguna tidak ditemukan.' ]);
        }

        // Derive periodDate from periodKey if not supplied: MMYYYY -> YYYY-MM-01
        $periodDate = trim((string)$periodDate);
        $periodKey  = trim((string)$periodKey);
        if ($periodDate === '' && preg_match('/^(0[1-9]|1[0-2])[0-9]{4}$/', $periodKey)) {
            $mm = substr($periodKey, 0, 2);
            $yy = substr($periodKey, 2, 4);
            $periodDate = $yy . '-' . $mm . '-01';
        }
        // Basic validation: accept YYYY-MM or YYYY-MM-01
        if ($periodDate === '' || (!preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $periodDate) && !preg_match('/^\d{4}-(0[1-9]|1[0-2])-01$/', $periodDate))) {
            send_json([ 'status' => 3, 'error' => 'Periode impor tidak valid. Pastikan nama file berbentuk MMYYYY.' ]);
        }
        // Normalize to a concrete DB date (YYYY-MM-01) for storage and comparison
        $uploadDateDb = preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $periodDate) ? ($periodDate . '-01') : $periodDate;

        $customers = [];
        $leaves = [];

        foreach ($data['Customer Personal Information'] as $row) {
            if (!is_array($row)) continue;
            // Skip empty lines (no name and no equipment number)
            $isEmpty = true;
            foreach (['Nama', 'Equipment No', 'No. Polisi'] as $probeKey) {
                if (!empty($row[$probeKey])) { $isEmpty = false; break; }
            }
            if ($isEmpty) continue;

            $customers[] = $row;
        }

        // foreach ($data['Customer Working Information'] as $CustomerWorkingInfo) {
        //     $CustomerId = $CustomerWorkingInfo['Customer Id'];
        //     if ($customers[$CustomerId]) $customers[$CustomerId] = array_merge($customers[$CustomerId], $CustomerWorkingInfo);
        // }

        // foreach ($data['Query - Customer Education'] as $CustomerEducation) {
        //     $CustomerId = $CustomerEducation['Customer Id'];
        //     if ($customers[$CustomerId]) $customers[$CustomerId] = array_merge($customers[$CustomerId], $CustomerEducation);
        // }

        // foreach ($data['Terminated Customer Personal Information'] as $terminatedCustomerPersonalInfo) {
        //     $CustomerId = $terminatedCustomerPersonalInfo['Customer Id'];
        //     unset($terminatedCustomerPersonalInfo['Customer Id']);
        //     $customers[$CustomerId] = array_merge($terminatedCustomerPersonalInfo, [ 'Terminated' => true ]);
        // }

        // foreach ($data['Terminated Customer Working Information'] as $terminatedCustomerWorkingInfo) {
        //     $CustomerId = $terminatedCustomerWorkingInfo['Customer Id'];
        //     if ($customers[$CustomerId]) $customers[$CustomerId] = array_merge($customers[$CustomerId], $terminatedCustomerWorkingInfo);
        // }

        // foreach ($data['Leave Request'] as $leave) {
        //     $CustomerId = $leave['Customer Id'];
        //     if ($customers[$CustomerId]) {
        //         if (!$leaves[$CustomerId]) $leaves[$CustomerId] = [];
        //         unset($leave['Customer Id']);
        //         array_push($leaves[$CustomerId], $leave);
        //     }
        // }

        // Guard: must have at least one valid row
        if (empty($customers)) {
            send_json([ 'status' => 2, 'error' => 'Tidak ada baris data yang valid untuk disimpan.' ]);
        }

        $rowErrors = [];
        try {
            ORM::get_db()->beginTransaction();
            // Hanya hapus data sesuai periode (dinormalisasi) dan kode_dept pengguna
            $existsStmt = ORM::get_db()->prepare('SELECT 1 FROM daftar_customer WHERE kode_dept = :kd AND upload_date = :udate LIMIT 1');
            $existsStmt->execute([':kd' => $kodeDept, ':udate' => $uploadDateDb]);
            $alreadyUploaded = (bool)$existsStmt->fetchColumn();
            if ($alreadyUploaded) {
                $stmt = ORM::get_db()->prepare('DELETE FROM daftar_customer WHERE kode_dept = :kd AND upload_date = :udate');
                $stmt->execute([':kd' => $kodeDept, ':udate' => $uploadDateDb]);
            }
            // ORM::get_db()->exec('DELETE FROM daftar_cuti');
            ORM::get_db()->exec('UPDATE sys_appconfig SET value = "' . date('Y-m-d') . '" WHERE setting = "daftar_customer_date"');

            foreach ($customers as $idx => $data) {
                try {
                    $Customer                       = ORM::for_table('daftar_customer')->create();
                    $Customer->customer_name        = $data['Nama'] ?? null;
                    $Customer->alamat               = $data['Alamat'] ?? null;
                    $Customer->nama_sa              = $data['Nama SA'] ?? null;
                    $Customer->equipment_no         = $data['Equipment No'] ?? null;
                    $Customer->no_polisi            = $data['No. Polisi'] ?? null;
                    $Customer->home                 = isset($data['Home']) ? preg_replace('/\D+/', '', (string)$data['Home']) : null;
                    $Customer->office               = isset($data['Office']) ? preg_replace('/\D+/', '', (string)$data['Office']) : null;
                    $Customer->mobile               = isset($data['Mobile']) ? preg_replace('/\D+/', '', (string)$data['Mobile']) : null;
                    $Customer->cp_name              = $data['CP Name'] ?? null;
                    $Customer->cp_phone             = $data['CP Phone'] ?? null;
                    $Customer->dm_name              = $data['DM Name'] ?? null;
                    $Customer->dm_phone             = $data['DM Phone'] ?? null;
                    $Customer->tipe_kendaraan       = $data['Tipe Kendaraan'] ?? null;
                    $Customer->tgl_service          = parseFlexibleDate($data['Tgl. Service'] ?? null);
                    $Customer->tgl_selesai          = parseFlexibleDate($data['Tgl. Selesai'] ?? null);
                    $Customer->tahun_kendaraan      = $data['Tahun Kendaraan'] ?? null;
                    $Customer->km_kendaraan         = is_numeric($data['KM'] ?? null) ? (int)$data['KM'] : ($data['KM'] ?? null);
                    $Customer->tgl_delivery         = parseFlexibleDate($data['Tgl. Delivery'] ?? null);
                    $Customer->customer_receive_car = parseFlexibleDate($data['Customer Receive Car'] ?? null);
                    $Customer->job_type             = $data['Job Type'] ?? null;
                    // Tambahan metadata impor
                    $Customer->kode_dept            = $user['kode_dept'];
                    $Customer->upload_date          = $uploadDateDb;
                    $Customer->import_date          = date('Y-m-d');
                    
                    $Customer->save();
                } catch (Throwable $rowEx) {
                    $rowErrors[] = 'Baris ' . ($idx + 1) . ': ' . $rowEx->getMessage();
                }
            }

            if (!empty($rowErrors)) {
                $pdo = ORM::get_db();
                if ($pdo && method_exists($pdo, 'inTransaction') && $pdo->inTransaction()) {
                    $pdo->rollBack();
                }
                $preview = implode('<br>', array_slice($rowErrors, 0, 5));
                send_json([
                    'status' => 3,
                    'error'  => 'Gagal menyimpan beberapa baris:<br>' . $preview . (count($rowErrors) > 5 ? '<br>... dan lainnya' : ''),
                ]);
            }

            ORM::get_db()->commit();

            _log1('Update Data customer', $user['username'], $user['id']);
            Event::trigger('customer/update-post/_on_finished');

            send_json([ 'status' => 1, 'msg' => 'Data customer berhasil diperbarui!', 'data' => $leaves ]);
        } catch (PDOException $ex) {
            $pdo = ORM::get_db();
            if ($pdo && method_exists($pdo, 'inTransaction') && $pdo->inTransaction()) {
                $pdo->rollBack();
            }
            send_json([
                'status' => 3,
                'error'  => 'DB Error: ' . $ex->getMessage(),
            ]);
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
                    // Parse period from filename (MMYYYY)
                    $base = pathinfo($filename, PATHINFO_FILENAME);
                    $base = preg_replace('/[^0-9]/', '', $base);
                    $period_key = null;
                    $period_date = null;
                    if (preg_match('/^(0[1-9]|1[0-2])[0-9]{4}$/', $base)) {
                        $mm = substr($base, 0, 2);
                        $yy = substr($base, 2, 4);
                        $period_key = $mm . $yy;
                        $period_date = $yy . '-' . $mm;
                    }

                    $response    = array_merge($response, $result, [
                        'period_key'  => $period_key,
                        'period_date' => $period_date,
                        'original_filename' => $filename,
                    ]);
                } catch (Throwable $error) {
                    $response['status'] = 3;
                    $response['error']  = 'Error membaca file Excel: ' . $error->getMessage();
                }
            } else {
                $response['status'] = 0;
            }

            send_json($response);
        }

        send_json([ 'status' => 0 ]);
        break;

    case 'export-all-active':
        Event::trigger('customer/export-all-active/');
        _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);

        try {
            // Fetch all active customer data
            $sql = "
                SELECT a.*
                FROM daftar_customer AS a
                LEFT JOIN (
                    SELECT 
                        equipment_no,
                        MAX(CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN NULL ELSE tgl_service END) AS max_tgl
                    FROM daftar_customer
                    WHERE equipment_no IS NOT NULL AND equipment_no <> ''
                    GROUP BY equipment_no
                ) AS m ON a.equipment_no = m.equipment_no
                WHERE (
                    (a.equipment_no IS NULL OR a.equipment_no = '')
                    OR (
                        (
                            (m.max_tgl IS NOT NULL AND a.tgl_service = m.max_tgl)
                            OR (m.max_tgl IS NULL AND a.id = (
                                SELECT MAX(x.id) FROM daftar_customer x WHERE x.equipment_no = a.equipment_no
                            ))
                        )
                        AND a.id = (
                            SELECT MAX(x.id) FROM daftar_customer x 
                            WHERE x.equipment_no = a.equipment_no
                            AND (
                                (m.max_tgl IS NOT NULL AND x.tgl_service = m.max_tgl)
                                OR (m.max_tgl IS NULL)
                            )
                        )
                    )
                )
                AND a.tgl_service >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
                ORDER BY a.customer_name ASC
            ";

            $items = ORM::for_table('daftar_customer')->raw_query($sql)->find_many();

            // Calculate summary statistics
            $totalData = count($items);
            $minServiceDate = null; $maxServiceDate = null;
            $minUnitYear = null; $maxUnitYear = null;
            $lengkapCount = 0; $tidakLengkapCount = 0;
            
            foreach ($items as $item) {
                // Service date range
                if ($item->tgl_service && $item->tgl_service != '0000-00-00') {
                    if (!$minServiceDate || $item->tgl_service < $minServiceDate) $minServiceDate = $item->tgl_service;
                    if (!$maxServiceDate || $item->tgl_service > $maxServiceDate) $maxServiceDate = $item->tgl_service;
                }
                // Unit year range
                if ($item->tahun_kendaraan && $item->tahun_kendaraan > 0) {
                    if (!$minUnitYear || $item->tahun_kendaraan < $minUnitYear) $minUnitYear = $item->tahun_kendaraan;
                    if (!$maxUnitYear || $item->tahun_kendaraan > $maxUnitYear) $maxUnitYear = $item->tahun_kendaraan;
                }
                // Complete/Incomplete count
                $isComplete = (($item->home && $item->home != '0') || ($item->office && $item->office != '0') || 
                               ($item->mobile && $item->mobile != '0') || ($item->cp_phone && $item->cp_phone != '0') || 
                               ($item->dm_phone && $item->dm_phone != '0'));
                if ($isComplete) $lengkapCount++; else $tidakLengkapCount++;
            }

            // Create new Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Summary info at top
            $sheet->setCellValue('A1', 'Total Data'); $sheet->setCellValue('B1', $totalData);
            $sheet->setCellValue('D1', 'Service Year'); 
            $sheet->setCellValue('E1', ($minServiceDate && $maxServiceDate) ? date('Y', strtotime($minServiceDate)) . ' - ' . date('Y', strtotime($maxServiceDate)) : '-');
            $sheet->setCellValue('G1', 'Lengkap'); 
            $sheet->setCellValue('H1', $lengkapCount);
            $sheet->setCellValue('D2', 'Unit Year'); 
            $sheet->setCellValue('E2', ($minUnitYear && $maxUnitYear) ? $minUnitYear . ' - ' . $maxUnitYear : '-');
            $sheet->setCellValue('G2', 'Tidak Lengkap'); 
            $sheet->setCellValue('H2', $tidakLengkapCount);
            $sheet->getStyle('A1:H2')->getFont()->setBold(true);
            $sheet->getStyle('A1:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9EAD3');

            // Set headers at row 6
            $headers = [
                'id', 'customer_name', 'alamat', 'nama_sa', 'equipment_no', 'no_polisi',
                'home', 'office', 'mobile', 'cp_name', 'cp_phone', 'dm_name', 'dm_phone',
                'tipe_kendaraan', 'tgl_service', 'tgl_selesai', 'tahun_kendaraan',
                'km_kendaraan', 'tgl_delivery', 'customer_receive_car', 'job_type', 'kode_dept',
                'upload_date', 'import_date'
            ];
            $sheet->fromArray($headers, NULL, 'A6');
            $sheet->getStyle('A6:X6')->getFont()->setBold(true);
            $sheet->getStyle('A6:X6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');

            // Fill data starting from row 7
            $row = 7;
            foreach ($items as $item) {
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $item->customer_name);
                $sheet->setCellValue('C' . $row, $item->alamat);
                $sheet->setCellValue('D' . $row, $item->nama_sa);
                $sheet->setCellValue('E' . $row, $item->equipment_no);
                $sheet->setCellValue('F' . $row, $item->no_polisi);
                $sheet->setCellValue('G' . $row, $item->home);
                $sheet->setCellValue('H' . $row, $item->office);
                $sheet->setCellValue('I' . $row, $item->mobile);
                $sheet->setCellValue('J' . $row, $item->cp_name);
                $sheet->setCellValue('K' . $row, $item->cp_phone);
                $sheet->setCellValue('L' . $row, $item->dm_name);
                $sheet->setCellValue('M' . $row, $item->dm_phone);
                $sheet->setCellValue('N' . $row, $item->tipe_kendaraan);
                $sheet->setCellValue('O' . $row, $item->tgl_service && $item->tgl_service != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_service)) : '');
                $sheet->setCellValue('P' . $row, $item->tgl_selesai && $item->tgl_selesai != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_selesai)) : '');
                $sheet->setCellValue('Q' . $row, $item->tahun_kendaraan);
                $sheet->setCellValue('R' . $row, $item->km_kendaraan);
                $sheet->setCellValue('S' . $row, $item->tgl_delivery && $item->tgl_delivery != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_delivery)) : '');
                $sheet->setCellValue('T' . $row, $item->customer_receive_car && $item->customer_receive_car != '0000-00-00' ? date('d/m/Y', strtotime($item->customer_receive_car)) : '');
                $sheet->setCellValue('U' . $row, $item->job_type);
                $sheet->setCellValue('V' . $row, $item->kode_dept);
                $sheet->setCellValue('W' . $row, $item->upload_date && $item->upload_date != '0000-00-00' ? date('d/m/Y', strtotime($item->upload_date)) : '');
                $sheet->setCellValue('X' . $row, $item->import_date && $item->import_date != '0000-00-00' ? date('d/m/Y', strtotime($item->import_date)) : '');
                $row++;
            }

            // Auto-size columns
            foreach (range('A', 'X') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Set filename
            $filename = 'All_Active_Customers_' . date('Y-m-d_His') . '.xlsx';

            // Set headers for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Write file to output
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');

            _log1("Export All Active Customers", $user['username'], $user['id']);
            exit;
        } catch (Exception $ex) {
            r2(U . 'customer/list', 'e', 'Terjadi kesalahan saat export data');
        }
        break;

        case 'export-active-filtered':
            Event::trigger('customer/export-active-filtered/');
            _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);
            while (ob_get_level() > 0) { ob_end_clean(); }

            try {
                $sql = "
                    SELECT a.*
                    FROM daftar_customer AS a
                    LEFT JOIN (
                        SELECT 
                            equipment_no,
                            MAX(CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN NULL ELSE tgl_service END) AS max_tgl
                        FROM daftar_customer
                        WHERE equipment_no IS NOT NULL AND equipment_no <> ''
                        GROUP BY equipment_no
                    ) AS m ON a.equipment_no = m.equipment_no
                    WHERE (
                        (a.equipment_no IS NULL OR a.equipment_no = '')
                        OR (
                            ((m.max_tgl IS NOT NULL AND a.tgl_service = m.max_tgl)
                             OR (m.max_tgl IS NULL AND a.id = (SELECT MAX(x.id) FROM daftar_customer x WHERE x.equipment_no = a.equipment_no)))
                            AND a.id = (
                                SELECT MAX(x.id) FROM daftar_customer x 
                                WHERE x.equipment_no = a.equipment_no
                                AND ((m.max_tgl IS NOT NULL AND x.tgl_service = m.max_tgl) OR (m.max_tgl IS NULL))
                            )
                        )
                    )
                    AND a.tgl_service >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
                ";

                $params = $_REQUEST; $flt = '';
                $multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
                if ($multi !== '') {
                    $parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
                    if (!empty($parts)) {
                        $special = false; $norm = [];
                        foreach ($parts as $p) { if (strcasecmp($p,'Tidak Terkategori')===0){$special=true;continue;} $norm[] = "'".mysqli_real_escape_string($db, $p)."'"; }
                        $cl = [];
                        if (!empty($norm)) { $in = implode(',', $norm); $cl[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))'; }
                        if ($special) { $cl[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))"; }
                        if (!empty($cl)) { $flt .= ' AND (' . implode(' OR ', $cl) . ')'; }
                    }
                }
                $merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
                if ($merekMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $merekMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($db,$p)."'"; } $flt .= ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))'; } }
                $cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
                if ($cabangMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $cabangMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($db,$p)."'"; } $flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')'; } }
                $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';
                if ($completeMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $completeMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))"; $cl=[]; foreach($parts as $p){ if (strcasecmp($p,'complete')===0){$cl[]=$cond;} if (strcasecmp($p,'incomplete')===0){$cl[]='(NOT '.$cond.')';} } if(!empty($cl)){ $flt .= ' AND (' . implode(' OR ', $cl) . ')'; } } }
                $uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
                $uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
                if ($uyFrom && $uyTo) { if ($uyTo < $uyFrom) { $t=$uyFrom; $uyFrom=$uyTo; $uyTo=$t; } $flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo"; }
                else if ($uyFrom) { $flt .= " AND a.tahun_kendaraan >= $uyFrom"; }
                else if ($uyTo) { $flt .= " AND a.tahun_kendaraan <= $uyTo"; }
                $syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
                $syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
                if ($syFrom && $syTo) { if ($syTo < $syFrom) { $t=$syFrom; $syFrom=$syTo; $syTo=$t; } $flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo"; }
                else if ($syFrom) { $flt .= " AND YEAR(a.tgl_service) >= $syFrom"; }
                else if ($syTo) { $flt .= " AND YEAR(a.tgl_service) <= $syTo"; }
                if ($flt !== '') { $sql .= ' ' . $flt; }
                $sql .= ' ORDER BY a.customer_name ASC';

                $items = ORM::for_table('daftar_customer')->raw_query($sql)->find_many();

                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $headers = ['id','customer_name','alamat','nama_sa','equipment_no','no_polisi','home','office','mobile','cp_name','cp_phone','dm_name','dm_phone','tipe_kendaraan','tgl_service','tgl_selesai','tahun_kendaraan','km_kendaraan','tgl_delivery','customer_receive_car','job_type','kode_dept','upload_date','import_date'];
                $sheet->fromArray($headers, NULL, 'A1');
                $sheet->getStyle('A1:X1')->getFont()->setBold(true);
                $sheet->getStyle('A1:X1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');

                $row = 2;
                foreach ($items as $item) {
                    $sheet->setCellValue('A' . $row, $item->id);
                    $sheet->setCellValue('B' . $row, $item->customer_name);
                    $sheet->setCellValue('C' . $row, $item->alamat);
                    $sheet->setCellValue('D' . $row, $item->nama_sa);
                    $sheet->setCellValue('E' . $row, $item->equipment_no);
                    $sheet->setCellValue('F' . $row, $item->no_polisi);
                    $sheet->setCellValue('G' . $row, $item->home);
                    $sheet->setCellValue('H' . $row, $item->office);
                    $sheet->setCellValue('I' . $row, $item->mobile);
                    $sheet->setCellValue('J' . $row, $item->cp_name);
                    $sheet->setCellValue('K' . $row, $item->cp_phone);
                    $sheet->setCellValue('L' . $row, $item->dm_name);
                    $sheet->setCellValue('M' . $row, $item->dm_phone);
                    $sheet->setCellValue('N' . $row, $item->tipe_kendaraan);
                    $sheet->setCellValue('O' . $row, $item->tgl_service && $item->tgl_service != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_service)) : '');
                    $sheet->setCellValue('P' . $row, $item->tgl_selesai && $item->tgl_selesai != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_selesai)) : '');
                    $sheet->setCellValue('Q' . $row, $item->tahun_kendaraan);
                    $sheet->setCellValue('R' . $row, $item->km_kendaraan);
                    $sheet->setCellValue('S' . $row, $item->tgl_delivery && $item->tgl_delivery != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_delivery)) : '');
                    $sheet->setCellValue('T' . $row, $item->customer_receive_car && $item->customer_receive_car != '0000-00-00' ? date('d/m/Y', strtotime($item->customer_receive_car)) : '');
                    $sheet->setCellValue('U' . $row, $item->job_type);
                    $sheet->setCellValue('V' . $row, $item->kode_dept);
                    $sheet->setCellValue('W' . $row, $item->upload_date && $item->upload_date != '0000-00-00' ? date('d/m/Y', strtotime($item->upload_date)) : '');
                    $sheet->setCellValue('X' . $row, $item->import_date && $item->import_date != '0000-00-00' ? date('d/m/Y', strtotime($item->import_date)) : '');
                    $row++;
                }
                foreach (range('A', 'X') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }

                $filename = 'Active-Customers-Filtered-' . date('Y-m-d_His') . '.xlsx';
                if (!headers_sent()) {
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="' . $filename . '"');
                    header('Cache-Control: max-age=0');
                }
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
                _log1("Export Active Customers (Filtered)", $user['username'], $user['id']);
                exit;
            } catch (Exception $ex) {
                r2(U . 'customer/list', 'e', 'Terjadi kesalahan saat export data');
            }
            break;

        case 'export-active-table':
            Event::trigger('customer/export-active-table/');
            _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);
            while (ob_get_level() > 0) { ob_end_clean(); }

            try {
                // Connect to database using mysqli (same as serverside.php)
                $conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());
                
                // Use EXACT same query as serverside DataTable
                $sql = "
                    SELECT a.*
                    FROM daftar_customer AS a
                    LEFT JOIN (
                        SELECT equipment_no,
                               MAX(CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN NULL ELSE tgl_service END) AS max_tgl
                        FROM daftar_customer
                        WHERE equipment_no IS NOT NULL AND equipment_no <> ''
                        GROUP BY equipment_no
                    ) AS m ON a.equipment_no = m.equipment_no
                    WHERE (
                        (a.equipment_no IS NULL OR a.equipment_no = '')
                        OR (
                            ((m.max_tgl IS NOT NULL AND a.tgl_service = m.max_tgl)
                             OR (m.max_tgl IS NULL AND a.id = (SELECT MAX(x.id) FROM daftar_customer x WHERE x.equipment_no = a.equipment_no)))
                            AND a.id = (
                                SELECT MAX(x.id) FROM daftar_customer x
                                WHERE x.equipment_no = a.equipment_no
                                  AND ((m.max_tgl IS NOT NULL AND x.tgl_service = m.max_tgl) OR (m.max_tgl IS NULL))
                            )
                        )
                    )
                    AND a.tgl_service >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
                ";

                $params = $_REQUEST; $flt = '';
                $multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
                if ($multi !== '') {
                    $parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
                    if (!empty($parts)) {
                        $special = false; $norm = [];
                        foreach ($parts as $p) { if (strcasecmp($p,'Tidak Terkategori')===0){$special=true;continue;} $norm[] = "'".mysqli_real_escape_string($conn,$p)."'"; }
                        $cl = [];
                        if (!empty($norm)) { $in = implode(',', $norm); $cl[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))'; }
                        if ($special) { $cl[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))"; }
                        if (!empty($cl)) { $flt .= ' AND (' . implode(' OR ', $cl) . ')'; }
                    }
                }
                $merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
                if ($merekMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $merekMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($conn,$p)."'"; } $flt .= ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))'; } }
                $cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
                if ($cabangMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $cabangMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($conn,$p)."'"; } $flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')'; } }
                $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';
                if ($completeMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $completeMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))"; $cl=[]; foreach($parts as $p){ if (strcasecmp($p,'complete')===0){$cl[]=$cond;} if (strcasecmp($p,'incomplete')===0){$cl[]='(NOT '.$cond.')';} } if(!empty($cl)){ $flt .= ' AND (' . implode(' OR ', $cl) . ')'; } } }
                $uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
                $uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
                if ($uyFrom && $uyTo) { if ($uyTo < $uyFrom) { $t=$uyFrom; $uyFrom=$uyTo; $uyTo=$t; } $flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo"; }
                else if ($uyFrom) { $flt .= " AND a.tahun_kendaraan >= $uyFrom"; }
                else if ($uyTo) { $flt .= " AND a.tahun_kendaraan <= $uyTo"; }
                $syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
                $syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
                if ($syFrom && $syTo) { if ($syTo < $syFrom) { $t=$syFrom; $syFrom=$syTo; $syTo=$t; } $flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo"; }
                else if ($syFrom) { $flt .= " AND YEAR(a.tgl_service) >= $syFrom"; }
                else if ($syTo) { $flt .= " AND YEAR(a.tgl_service) <= $syTo"; }
                if ($flt !== '') { $sql .= ' ' . $flt; }
                $sql .= ' ORDER BY a.customer_name ASC';

                error_log("=== EXPORT ACTIVE DEBUG ===");
                error_log("SQL: " . $sql);
                error_log("Filters: tipe=" . ($params['tipe_kendaraan_multi'] ?? 'none') . ", merek=" . ($params['merek_multi'] ?? 'none') . ", cabang=" . ($params['cabang_multi'] ?? 'none'));

                $result = mysqli_query($conn, $sql) or die('Query Error: '.mysqli_error($conn));
                $items = [];
                while ($row = mysqli_fetch_object($result)) {
                    $items[] = $row;
                }
                error_log("Query SUCCESS - Count: " . count($items));

                // Calculate summary statistics
                $totalData = count($items);
                $minServiceDate = null; $maxServiceDate = null;
                $minUnitYear = null; $maxUnitYear = null;
                $lengkapCount = 0; $tidakLengkapCount = 0;
                
                foreach ($items as $item) {
                    // Service date range
                    if ($item->tgl_service && $item->tgl_service != '0000-00-00') {
                        if (!$minServiceDate || $item->tgl_service < $minServiceDate) $minServiceDate = $item->tgl_service;
                        if (!$maxServiceDate || $item->tgl_service > $maxServiceDate) $maxServiceDate = $item->tgl_service;
                    }
                    // Unit year range
                    if ($item->tahun_kendaraan && $item->tahun_kendaraan > 0) {
                        if (!$minUnitYear || $item->tahun_kendaraan < $minUnitYear) $minUnitYear = $item->tahun_kendaraan;
                        if (!$maxUnitYear || $item->tahun_kendaraan > $maxUnitYear) $maxUnitYear = $item->tahun_kendaraan;
                    }
                    // Complete/Incomplete count
                    $isComplete = (($item->home && $item->home != '0') || ($item->office && $item->office != '0') || 
                                   ($item->mobile && $item->mobile != '0') || ($item->cp_phone && $item->cp_phone != '0') || 
                                   ($item->dm_phone && $item->dm_phone != '0'));
                    if ($isComplete) $lengkapCount++; else $tidakLengkapCount++;
                }

                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                
                // Summary info at top
                $sheet->setCellValue('A1', 'Total Data'); $sheet->setCellValue('B1', $totalData);
                $sheet->setCellValue('D1', 'Service Year'); 
                $sheet->setCellValue('E1', ($minServiceDate && $maxServiceDate) ? date('Y', strtotime($minServiceDate)) . ' - ' . date('Y', strtotime($maxServiceDate)) : '-');
                $sheet->setCellValue('G1', 'Lengkap'); 
                $sheet->setCellValue('H1', $lengkapCount);
                $sheet->setCellValue('D2', 'Unit Year'); 
                $sheet->setCellValue('E2', ($minUnitYear && $maxUnitYear) ? $minUnitYear . ' - ' . $maxUnitYear : '-');
                $sheet->setCellValue('G2', 'Tidak Lengkap'); 
                $sheet->setCellValue('H2', $tidakLengkapCount);
                $sheet->getStyle('A1:H2')->getFont()->setBold(true);
                $sheet->getStyle('A1:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9EAD3');
                
                // Group headers (start from row 4)
                $sheet->setCellValue('A4', 'No.');
                $sheet->setCellValue('B4', 'Nama');
                $sheet->setCellValue('C4', 'Equipment No');
                $sheet->setCellValue('D4', 'No. Polisi');
                $sheet->setCellValue('E4', 'Contact Number'); $sheet->mergeCells('E4:K4');
                $sheet->setCellValue('L4', 'Unit'); $sheet->mergeCells('L4:M4');
                $sheet->setCellValue('N4', 'Last Service'); $sheet->mergeCells('N4:O4');
                // Sub headers
                $sheet->setCellValue('E5', 'Home');
                $sheet->setCellValue('F5', 'Office');
                $sheet->setCellValue('G5', 'Mobile');
                $sheet->setCellValue('H5', 'CP Name');
                $sheet->setCellValue('I5', 'CP Phone');
                $sheet->setCellValue('J5', 'DM Name');
                $sheet->setCellValue('K5', 'DM Phone');
                $sheet->setCellValue('L5', 'Type');
                $sheet->setCellValue('M5', 'Year');
                $sheet->setCellValue('N5', 'Tgl');
                $sheet->setCellValue('O5', 'Cab');
                // Merge static headers
                $sheet->mergeCells('A4:A5');
                $sheet->mergeCells('B4:B5');
                $sheet->mergeCells('C4:C5');
                $sheet->mergeCells('D4:D5');
                // Style
                $sheet->getStyle('A4:O5')->getFont()->setBold(true);
                $sheet->getStyle('A4:O5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFF00');

                $row = 6; $no = 1;
                foreach ($items as $item) {
                    // Fallback using equipment_no or no_chassis
                    $fallback = null; $ekey = $item->equipment_no ?: ($item->no_chassis ?? null);
                    if ($ekey) {
                        $fallback = ORM::for_table('daftar_customer')->where('equipment_no', $ekey)->order_by_desc('id')->find_one();
                    }
                    $fv = function($primary, $field) use ($fallback) {
                        if ($primary !== null && $primary !== '' && $primary !== '0') return $primary;
                        if ($fallback && isset($fallback->$field)) return $fallback->$field;
                        return '';
                    };
                    $sheet->setCellValue('A'.$row, $no++);
                    $sheet->setCellValue('B'.$row, $fv($item->customer_name, 'customer_name'));
                    $sheet->setCellValue('C'.$row, $fv($item->equipment_no, 'equipment_no'));
                    $sheet->setCellValue('D'.$row, $fv($item->no_polisi, 'no_polisi'));
                    $sheet->setCellValue('E'.$row, $fv($item->home, 'home'));
                    $sheet->setCellValue('F'.$row, $fv($item->office, 'office'));
                    $sheet->setCellValue('G'.$row, $fv($item->mobile, 'mobile'));
                    $sheet->setCellValue('H'.$row, $fv($item->cp_name, 'cp_name'));
                    $sheet->setCellValue('I'.$row, $fv($item->cp_phone, 'cp_phone'));
                    $sheet->setCellValue('J'.$row, $fv($item->dm_name, 'dm_name'));
                    $sheet->setCellValue('K'.$row, $fv($item->dm_phone, 'dm_phone'));
                    $sheet->setCellValue('L'.$row, $fv($item->tipe_kendaraan, 'tipe_kendaraan'));
                    $sheet->setCellValue('M'.$row, $fv($item->tahun_kendaraan, 'tahun_kendaraan'));
                    $tgl = $fv($item->tgl_service, 'tgl_service');
                    $sheet->setCellValue('N'.$row, ($tgl && $tgl!='0000-00-00')?date('d/m/Y',strtotime($tgl)):'' );
                    $sheet->setCellValue('O'.$row, $fv($item->kode_dept, 'kode_dept'));
                    $row++;
                }
                foreach (range('A','O') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }

                $filename = 'Active-Customers-Table-' . date('Y-m-d_His') . '.xlsx';
                
                // Clear any previous output
                if (ob_get_length()) ob_clean();
                
                // Send headers
                if (!headers_sent()) {
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="' . $filename . '"');
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
                    header('Cache-Control: cache, must-revalidate');
                    header('Pragma: public');
                }
                
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
                exit;
            } catch (Throwable $e) {
                r2(U . 'customer/list', 'e', 'Gagal membuat laporan: ' . $e->getMessage());
            }
            break;

        case 'export-nonactive-table':
            Event::trigger('customer/export-nonactive-table/');
            _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);
            while (ob_get_level() > 0) { ob_end_clean(); }

            try {
                // Connect to database using mysqli (same as serverside.php)
                $conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());
                
                // Use EXACT same query as serverside DataTable
                $sql = "
                    SELECT a.*
                    FROM daftar_customer AS a
                    LEFT JOIN (
                        SELECT 
                            equipment_no,
                            MAX(CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN NULL ELSE tgl_service END) AS max_tgl
                        FROM daftar_customer
                        WHERE equipment_no IS NOT NULL AND equipment_no <> ''
                        GROUP BY equipment_no
                    ) AS m ON a.equipment_no = m.equipment_no
                    WHERE (
                        (a.equipment_no IS NULL OR a.equipment_no = '')
                        OR (
                            ((m.max_tgl IS NOT NULL AND a.tgl_service = m.max_tgl)
                             OR (m.max_tgl IS NULL AND a.id = (SELECT MAX(x.id) FROM daftar_customer x WHERE x.equipment_no = a.equipment_no)))
                            AND a.id = (
                                SELECT MAX(x.id) FROM daftar_customer x 
                                WHERE x.equipment_no = a.equipment_no
                                AND ((m.max_tgl IS NOT NULL AND x.tgl_service = m.max_tgl) OR (m.max_tgl IS NULL))
                            )
                        )
                    )
                    AND a.tgl_service <= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
                ";

                $params = $_REQUEST; $flt = '';
                $multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
                if ($multi !== '') {
                    $parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
                    if (!empty($parts)) {
                        $special = false; $norm = [];
                        foreach ($parts as $p) { if (strcasecmp($p,'Tidak Terkategori')===0){$special=true;continue;} $norm[] = "'".mysqli_real_escape_string($conn,$p)."'"; }
                        $cl = [];
                        if (!empty($norm)) { $in = implode(',', $norm); $cl[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))'; }
                        if ($special) { $cl[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))"; }
                        if (!empty($cl)) { $flt .= ' AND (' . implode(' OR ', $cl) . ')'; }
                    }
                }
                $merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
                if ($merekMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $merekMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($conn,$p)."'"; } $flt .= ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))'; } }
                $cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
                if ($cabangMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $cabangMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($conn,$p)."'"; } $flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')'; } }
                $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';
                if ($completeMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $completeMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))"; $cl=[]; foreach($parts as $p){ if (strcasecmp($p,'complete')===0){$cl[]=$cond;} if (strcasecmp($p,'incomplete')===0){$cl[]='(NOT '.$cond.')';} } if(!empty($cl)){ $flt .= ' AND (' . implode(' OR ', $cl) . ')'; } } }
                $uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
                $uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
                if ($uyFrom && $uyTo) { if ($uyTo < $uyFrom) { $t=$uyFrom; $uyFrom=$uyTo; $uyTo=$t; } $flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo"; }
                else if ($uyFrom) { $flt .= " AND a.tahun_kendaraan >= $uyFrom"; }
                else if ($uyTo) { $flt .= " AND a.tahun_kendaraan <= $uyTo"; }
                $syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
                $syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
                if ($syFrom && $syTo) { if ($syTo < $syFrom) { $t=$syFrom; $syFrom=$syTo; $syTo=$t; } $flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo"; }
                else if ($syFrom) { $flt .= " AND YEAR(a.tgl_service) >= $syFrom"; }
                else if ($syTo) { $flt .= " AND YEAR(a.tgl_service) <= $syTo"; }
                if ($flt !== '') { $sql .= ' ' . $flt; }
                $sql .= ' ORDER BY a.customer_name ASC';

                $result = mysqli_query($conn, $sql) or die('Query Error: '.mysqli_error($conn));
                $items = [];
                while ($row = mysqli_fetch_object($result)) {
                    $items[] = $row;
                }

                // Calculate summary statistics
                $totalData = count($items);
                $minServiceDate = null; $maxServiceDate = null;
                $minUnitYear = null; $maxUnitYear = null;
                $lengkapCount = 0; $tidakLengkapCount = 0;
                
                foreach ($items as $item) {
                    // Service date range
                    if ($item->tgl_service && $item->tgl_service != '0000-00-00') {
                        if (!$minServiceDate || $item->tgl_service < $minServiceDate) $minServiceDate = $item->tgl_service;
                        if (!$maxServiceDate || $item->tgl_service > $maxServiceDate) $maxServiceDate = $item->tgl_service;
                    }
                    // Unit year range
                    if ($item->tahun_kendaraan && $item->tahun_kendaraan > 0) {
                        if (!$minUnitYear || $item->tahun_kendaraan < $minUnitYear) $minUnitYear = $item->tahun_kendaraan;
                        if (!$maxUnitYear || $item->tahun_kendaraan > $maxUnitYear) $maxUnitYear = $item->tahun_kendaraan;
                    }
                    // Complete/Incomplete count
                    $isComplete = (($item->home && $item->home != '0') || ($item->office && $item->office != '0') || 
                                   ($item->mobile && $item->mobile != '0') || ($item->cp_phone && $item->cp_phone != '0') || 
                                   ($item->dm_phone && $item->dm_phone != '0'));
                    if ($isComplete) $lengkapCount++; else $tidakLengkapCount++;
                }

                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                
                // Summary info at top
                $sheet->setCellValue('A1', 'Total Data'); $sheet->setCellValue('B1', $totalData);
                $sheet->setCellValue('D1', 'Service Year'); 
                $sheet->setCellValue('E1', ($minServiceDate && $maxServiceDate) ? date('Y', strtotime($minServiceDate)) . ' - ' . date('Y', strtotime($maxServiceDate)) : '-');
                $sheet->setCellValue('G1', 'Lengkap'); 
                $sheet->setCellValue('H1', $lengkapCount);
                $sheet->setCellValue('D2', 'Unit Year'); 
                $sheet->setCellValue('E2', ($minUnitYear && $maxUnitYear) ? $minUnitYear . ' - ' . $maxUnitYear : '-');
                $sheet->setCellValue('G2', 'Tidak Lengkap'); 
                $sheet->setCellValue('H2', $tidakLengkapCount);
                $sheet->getStyle('A1:H2')->getFont()->setBold(true);
                $sheet->getStyle('A1:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9EAD3');
                
                // Group headers (start from row 4)
                $sheet->setCellValue('A4', 'No.');
                $sheet->setCellValue('B4', 'Nama');
                $sheet->setCellValue('C4', 'Equipment No');
                $sheet->setCellValue('D4', 'No. Polisi');
                $sheet->setCellValue('E4', 'Contact Number'); $sheet->mergeCells('E4:K4');
                $sheet->setCellValue('L4', 'Unit'); $sheet->mergeCells('L4:M4');
                $sheet->setCellValue('N4', 'Last Service'); $sheet->mergeCells('N4:O4');
                // Sub headers
                $sheet->setCellValue('E5', 'Home');
                $sheet->setCellValue('F5', 'Office');
                $sheet->setCellValue('G5', 'Mobile');
                $sheet->setCellValue('H5', 'CP Name');
                $sheet->setCellValue('I5', 'CP Phone');
                $sheet->setCellValue('J5', 'DM Name');
                $sheet->setCellValue('K5', 'DM Phone');
                $sheet->setCellValue('L5', 'Type');
                $sheet->setCellValue('M5', 'Year');
                $sheet->setCellValue('N5', 'Tgl');
                $sheet->setCellValue('O5', 'Cab');
                // Merge static headers
                $sheet->mergeCells('A4:A5');
                $sheet->mergeCells('B4:B5');
                $sheet->mergeCells('C4:C5');
                $sheet->mergeCells('D4:D5');
                // Style
                $sheet->getStyle('A4:O5')->getFont()->setBold(true);
                $sheet->getStyle('A4:O5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFF00');

                $row = 6; $no = 1;
                foreach ($items as $item) {
                    $fallback = null; $ekey = $item->equipment_no ?: ($item->no_chassis ?? null);
                    if ($ekey) { $fallback = ORM::for_table('daftar_customer')->where('equipment_no', $ekey)->order_by_desc('id')->find_one(); }
                    $fv = function($primary, $field) use ($fallback) { if ($primary !== null && $primary !== '' && $primary !== '0') return $primary; if ($fallback && isset($fallback->$field)) return $fallback->$field; return ''; };
                    $sheet->setCellValue('A'.$row, $no++);
                    $sheet->setCellValue('B'.$row, $fv($item->customer_name, 'customer_name'));
                    $sheet->setCellValue('C'.$row, $fv($item->equipment_no, 'equipment_no'));
                    $sheet->setCellValue('D'.$row, $fv($item->no_polisi, 'no_polisi'));
                    $sheet->setCellValue('E'.$row, $fv($item->home, 'home'));
                    $sheet->setCellValue('F'.$row, $fv($item->office, 'office'));
                    $sheet->setCellValue('G'.$row, $fv($item->mobile, 'mobile'));
                    $sheet->setCellValue('H'.$row, $fv($item->cp_name, 'cp_name'));
                    $sheet->setCellValue('I'.$row, $fv($item->cp_phone, 'cp_phone'));
                    $sheet->setCellValue('J'.$row, $fv($item->dm_name, 'dm_name'));
                    $sheet->setCellValue('K'.$row, $fv($item->dm_phone, 'dm_phone'));
                    $sheet->setCellValue('L'.$row, $fv($item->tipe_kendaraan, 'tipe_kendaraan'));
                    $sheet->setCellValue('M'.$row, $fv($item->tahun_kendaraan, 'tahun_kendaraan'));
                    $tgl = $fv($item->tgl_service, 'tgl_service');
                    $sheet->setCellValue('N'.$row, ($tgl && $tgl!='0000-00-00')?date('d/m/Y',strtotime($tgl)):'' );
                    $sheet->setCellValue('O'.$row, $fv($item->kode_dept, 'kode_dept'));
                    $row++;
                }
                foreach (range('A','O') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }

                $filename = 'Non-Active-Customers-Table-' . date('Y-m-d_His') . '.xlsx';
                
                // Clear any previous output
                if (ob_get_length()) ob_clean();
                
                // Send headers
                if (!headers_sent()) {
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="' . $filename . '"');
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
                    header('Cache-Control: cache, must-revalidate');
                    header('Pragma: public');
                }
                
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
                exit;
            } catch (Throwable $e) {
                r2(U . 'customer/list', 'e', 'Gagal membuat laporan: ' . $e->getMessage());
            }
            break;

        case 'export-nonactive-filtered':
            Event::trigger('customer/export-nonactive-filtered/');
            _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);
            while (ob_get_level() > 0) { ob_end_clean(); }

            try {
                $sql = "
                    SELECT a.*
                    FROM daftar_customer AS a
                    LEFT JOIN (
                        SELECT 
                            equipment_no,
                            MAX(CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN NULL ELSE tgl_service END) AS max_tgl
                        FROM daftar_customer
                        WHERE equipment_no IS NOT NULL AND equipment_no <> ''
                        GROUP BY equipment_no
                    ) AS m ON a.equipment_no = m.equipment_no
                    WHERE (
                        (a.equipment_no IS NULL OR a.equipment_no = '')
                        OR (
                            ((m.max_tgl IS NOT NULL AND a.tgl_service = m.max_tgl)
                             OR (m.max_tgl IS NULL AND a.id = (SELECT MAX(x.id) FROM daftar_customer x WHERE x.equipment_no = a.equipment_no)))
                            AND a.id = (
                                SELECT MAX(x.id) FROM daftar_customer x 
                                WHERE x.equipment_no = a.equipment_no
                                AND ((m.max_tgl IS NOT NULL AND x.tgl_service = m.max_tgl) OR (m.max_tgl IS NULL))
                            )
                        )
                    )
                    AND a.tgl_service <= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
                ";

                $params = $_REQUEST; $flt = '';
                $multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
                if ($multi !== '') {
                    $parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
                    if (!empty($parts)) {
                        $special = false; $norm = [];
                        foreach ($parts as $p) { if (strcasecmp($p,'Tidak Terkategori')===0){$special=true;continue;} $norm[] = "'".mysqli_real_escape_string($db, $p)."'"; }
                        $cl = [];
                        if (!empty($norm)) { $in = implode(',', $norm); $cl[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))'; }
                        if ($special) { $cl[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))"; }
                        if (!empty($cl)) { $flt .= ' AND (' . implode(' OR ', $cl) . ')'; }
                    }
                }
                $merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
                if ($merekMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $merekMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($db,$p)."'"; } $flt .= ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))'; } }
                $cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
                if ($cabangMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $cabangMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $in=[]; foreach($parts as $p){ $in[]="'".mysqli_real_escape_string($db,$p)."'"; } $flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')'; } }
                $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';
                if ($completeMulti !== '') { $parts = array_filter(array_map('trim', explode(',', $completeMulti)), fn($v)=>$v!==''); if (!empty($parts)) { $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))"; $cl=[]; foreach($parts as $p){ if (strcasecmp($p,'complete')===0){$cl[]=$cond;} if (strcasecmp($p,'incomplete')===0){$cl[]='(NOT '.$cond.')';} } if(!empty($cl)){ $flt .= ' AND (' . implode(' OR ', $cl) . ')'; } } }
                $uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
                $uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
                if ($uyFrom && $uyTo) { if ($uyTo < $uyFrom) { $t=$uyFrom; $uyFrom=$uyTo; $uyTo=$t; } $flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo"; }
                else if ($uyFrom) { $flt .= " AND a.tahun_kendaraan >= $uyFrom"; }
                else if ($uyTo) { $flt .= " AND a.tahun_kendaraan <= $uyTo"; }
                $syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
                $syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
                if ($syFrom && $syTo) { if ($syTo < $syFrom) { $t=$syFrom; $syFrom=$syTo; $syTo=$t; } $flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo"; }
                else if ($syFrom) { $flt .= " AND YEAR(a.tgl_service) >= $syFrom"; }
                else if ($syTo) { $flt .= " AND YEAR(a.tgl_service) <= $syTo"; }
                if ($flt !== '') { $sql .= ' ' . $flt; }
                $sql .= ' ORDER BY a.customer_name ASC';

                $items = ORM::for_table('daftar_customer')->raw_query($sql)->find_many();

                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $headers = ['id','customer_name','alamat','nama_sa','equipment_no','no_polisi','home','office','mobile','cp_name','cp_phone','dm_name','dm_phone','tipe_kendaraan','tgl_service','tgl_selesai','tahun_kendaraan','km_kendaraan','tgl_delivery','customer_receive_car','job_type','kode_dept','upload_date','import_date'];
                $sheet->fromArray($headers, NULL, 'A1');
                $sheet->getStyle('A1:X1')->getFont()->setBold(true);
                $sheet->getStyle('A1:X1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');

                $row = 2;
                foreach ($items as $item) {
                    $sheet->setCellValue('A' . $row, $item->id);
                    $sheet->setCellValue('B' . $row, $item->customer_name);
                    $sheet->setCellValue('C' . $row, $item->alamat);
                    $sheet->setCellValue('D' . $row, $item->nama_sa);
                    $sheet->setCellValue('E' . $row, $item->equipment_no);
                    $sheet->setCellValue('F' . $row, $item->no_polisi);
                    $sheet->setCellValue('G' . $row, $item->home);
                    $sheet->setCellValue('H' . $row, $item->office);
                    $sheet->setCellValue('I' . $row, $item->mobile);
                    $sheet->setCellValue('J' . $row, $item->cp_name);
                    $sheet->setCellValue('K' . $row, $item->cp_phone);
                    $sheet->setCellValue('L' . $row, $item->dm_name);
                    $sheet->setCellValue('M' . $row, $item->dm_phone);
                    $sheet->setCellValue('N' . $row, $item->tipe_kendaraan);
                    $sheet->setCellValue('O' . $row, $item->tgl_service && $item->tgl_service != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_service)) : '');
                    $sheet->setCellValue('P' . $row, $item->tgl_selesai && $item->tgl_selesai != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_selesai)) : '');
                    $sheet->setCellValue('Q' . $row, $item->tahun_kendaraan);
                    $sheet->setCellValue('R' . $row, $item->km_kendaraan);
                    $sheet->setCellValue('S' . $row, $item->tgl_delivery && $item->tgl_delivery != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_delivery)) : '');
                    $sheet->setCellValue('T' . $row, $item->customer_receive_car && $item->customer_receive_car != '0000-00-00' ? date('d/m/Y', strtotime($item->customer_receive_car)) : '');
                    $sheet->setCellValue('U' . $row, $item->job_type);
                    $sheet->setCellValue('V' . $row, $item->kode_dept);
                    $sheet->setCellValue('W' . $row, $item->upload_date && $item->upload_date != '0000-00-00' ? date('d/m/Y', strtotime($item->upload_date)) : '');
                    $sheet->setCellValue('X' . $row, $item->import_date && $item->import_date != '0000-00-00' ? date('d/m/Y', strtotime($item->import_date)) : '');
                    $row++;
                }
                foreach (range('A', 'X') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }

                $filename = 'Non-Active-Customers-Filtered-' . date('Y-m-d_His') . '.xlsx';
                if (!headers_sent()) {
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="' . $filename . '"');
                    header('Cache-Control: max-age=0');
                }
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
                _log1("Export Non-Active Customers (Filtered)", $user['username'], $user['id']);
                exit;
            } catch (Exception $ex) {
                r2(U . 'customer/list', 'e', 'Terjadi kesalahan saat export data');
            }
            break;

    case 'export-all-nonactive':
        Event::trigger('customer/export-all-nonactive/');
        _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);

        try {
            // Fetch all non-active customer data
            $sql = "
                SELECT a.*
                FROM daftar_customer AS a
                LEFT JOIN (
                    SELECT 
                        equipment_no,
                        MAX(CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN NULL ELSE tgl_service END) AS max_tgl
                    FROM daftar_customer
                    WHERE equipment_no IS NOT NULL AND equipment_no <> ''
                    GROUP BY equipment_no
                ) AS m ON a.equipment_no = m.equipment_no
                WHERE (
                    (a.equipment_no IS NULL OR a.equipment_no = '')
                    OR (
                        (
                            (m.max_tgl IS NOT NULL AND a.tgl_service = m.max_tgl)
                            OR (m.max_tgl IS NULL AND a.id = (
                                SELECT MAX(x.id) FROM daftar_customer x WHERE x.equipment_no = a.equipment_no
                            ))
                        )
                        AND a.id = (
                            SELECT MAX(x.id) FROM daftar_customer x 
                            WHERE x.equipment_no = a.equipment_no
                            AND (
                                (m.max_tgl IS NOT NULL AND x.tgl_service = m.max_tgl)
                                OR (m.max_tgl IS NULL)
                            )
                        )
                    )
                )
                AND a.tgl_service <= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
                ORDER BY a.customer_name ASC
            ";

            $items = ORM::for_table('daftar_customer')->raw_query($sql)->find_many();

            // Calculate summary statistics
            $totalData = count($items);
            $minServiceDate = null; $maxServiceDate = null;
            $minUnitYear = null; $maxUnitYear = null;
            $lengkapCount = 0; $tidakLengkapCount = 0;
            
            foreach ($items as $item) {
                // Service date range
                if ($item->tgl_service && $item->tgl_service != '0000-00-00') {
                    if (!$minServiceDate || $item->tgl_service < $minServiceDate) $minServiceDate = $item->tgl_service;
                    if (!$maxServiceDate || $item->tgl_service > $maxServiceDate) $maxServiceDate = $item->tgl_service;
                }
                // Unit year range
                if ($item->tahun_kendaraan && $item->tahun_kendaraan > 0) {
                    if (!$minUnitYear || $item->tahun_kendaraan < $minUnitYear) $minUnitYear = $item->tahun_kendaraan;
                    if (!$maxUnitYear || $item->tahun_kendaraan > $maxUnitYear) $maxUnitYear = $item->tahun_kendaraan;
                }
                // Complete/Incomplete count
                $isComplete = (($item->home && $item->home != '0') || ($item->office && $item->office != '0') || 
                               ($item->mobile && $item->mobile != '0') || ($item->cp_phone && $item->cp_phone != '0') || 
                               ($item->dm_phone && $item->dm_phone != '0'));
                if ($isComplete) $lengkapCount++; else $tidakLengkapCount++;
            }

            // Create new Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Summary info at top
            $sheet->setCellValue('A1', 'Total Data'); $sheet->setCellValue('B1', $totalData);
            $sheet->setCellValue('D1', 'Service Year'); 
            $sheet->setCellValue('E1', ($minServiceDate && $maxServiceDate) ? date('Y', strtotime($minServiceDate)) . ' - ' . date('Y', strtotime($maxServiceDate)) : '-');
            $sheet->setCellValue('G1', 'Lengkap'); 
            $sheet->setCellValue('H1', $lengkapCount);
            $sheet->setCellValue('D2', 'Unit Year'); 
            $sheet->setCellValue('E2', ($minUnitYear && $maxUnitYear) ? $minUnitYear . ' - ' . $maxUnitYear : '-');
            $sheet->setCellValue('G2', 'Tidak Lengkap'); 
            $sheet->setCellValue('H2', $tidakLengkapCount);
            $sheet->getStyle('A1:H2')->getFont()->setBold(true);
            $sheet->getStyle('A1:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9EAD3');

            // Set headers at row 6
            $headers = [
                'id', 'customer_name', 'alamat', 'nama_sa', 'equipment_no', 'no_polisi',
                'home', 'office', 'mobile', 'cp_name', 'cp_phone', 'dm_name', 'dm_phone',
                'tipe_kendaraan', 'tgl_service', 'tgl_selesai', 'tahun_kendaraan',
                'km_kendaraan', 'tgl_delivery', 'customer_receive_car', 'job_type', 'kode_dept',
                'upload_date', 'import_date'
            ];
            $sheet->fromArray($headers, NULL, 'A6');
            $sheet->getStyle('A6:X6')->getFont()->setBold(true);
            $sheet->getStyle('A6:X6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');

            // Fill data starting from row 7
            $row = 7;
            foreach ($items as $item) {
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $item->customer_name);
                $sheet->setCellValue('C' . $row, $item->alamat);
                $sheet->setCellValue('D' . $row, $item->nama_sa);
                $sheet->setCellValue('E' . $row, $item->equipment_no);
                $sheet->setCellValue('F' . $row, $item->no_polisi);
                $sheet->setCellValue('G' . $row, $item->home);
                $sheet->setCellValue('H' . $row, $item->office);
                $sheet->setCellValue('I' . $row, $item->mobile);
                $sheet->setCellValue('J' . $row, $item->cp_name);
                $sheet->setCellValue('K' . $row, $item->cp_phone);
                $sheet->setCellValue('L' . $row, $item->dm_name);
                $sheet->setCellValue('M' . $row, $item->dm_phone);
                $sheet->setCellValue('N' . $row, $item->tipe_kendaraan);
                $sheet->setCellValue('O' . $row, $item->tgl_service && $item->tgl_service != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_service)) : '');
                $sheet->setCellValue('P' . $row, $item->tgl_selesai && $item->tgl_selesai != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_selesai)) : '');
                $sheet->setCellValue('Q' . $row, $item->tahun_kendaraan);
                $sheet->setCellValue('R' . $row, $item->km_kendaraan);
                $sheet->setCellValue('S' . $row, $item->tgl_delivery && $item->tgl_delivery != '0000-00-00' ? date('d/m/Y', strtotime($item->tgl_delivery)) : '');
                $sheet->setCellValue('T' . $row, $item->customer_receive_car && $item->customer_receive_car != '0000-00-00' ? date('d/m/Y', strtotime($item->customer_receive_car)) : '');
                $sheet->setCellValue('U' . $row, $item->job_type);
                $sheet->setCellValue('V' . $row, $item->kode_dept);
                $sheet->setCellValue('W' . $row, $item->upload_date && $item->upload_date != '0000-00-00' ? date('d/m/Y', strtotime($item->upload_date)) : '');
                $sheet->setCellValue('X' . $row, $item->import_date && $item->import_date != '0000-00-00' ? date('d/m/Y', strtotime($item->import_date)) : '');
                $row++;
            }

            // Auto-size columns
            foreach (range('A', 'X') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Set filename
            $filename = 'All_Non_Active_Customers_' . date('Y-m-d_His') . '.xlsx';

            // Set headers for download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Write file to output
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');

            _log1("Export All Non-Active Customers", $user['username'], $user['id']);
            exit;
        } catch (Exception $ex) {
            r2(U . 'customer/list', 'e', 'Terjadi kesalahan saat export data');
        }
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
                // match by trimmed header text
                $foundIndex = false;
                foreach ($d as $i => $cell) {
                    if (trim((string)$cell) === trim((string)$column)) { $foundIndex = $i; break; }
                }

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
            // Skip empty rows (all mapped cells empty)
            $allEmpty = true;
            foreach ($excel[$type] as $col) {
                $value = $d[$index[$col]];
                if (trim((string)$value) !== '') { $allEmpty = false; break; }
            }
            if ($allEmpty) continue;

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

function parseFlexibleDate($value) {
    if ($value === null || $value === '') return null;

    // If numeric (Excel serial date)
    if (is_numeric($value)) {
        // Excel epoch starts at 1899-12-30 for PHPSpreadsheet default
        $unix = ((int)$value - 25569) * 86400; // 25569 = days between 1899-12-30 and 1970-01-01
        $date = gmdate('Y-m-d', $unix);
        return $date ?: null;
    }

    $value = trim((string)$value);
    $candidateFormats = [
        'd.m.Y', 'd.m.y', 'd M Y', 'd F Y', 'd-M-Y', 'd/F/Y', 'd/m/Y', 'd-m-Y', 'Y-m-d',
        'd/m/Y H:i:s', 'd-m-Y H:i:s', 'Y-m-d H:i:s', 'm/d/Y H:i:s', 'm-d-Y H:i:s'
    ];
    foreach ($candidateFormats as $fmt) {
        $dt = DateTime::createFromFormat($fmt, $value);
        if ($dt instanceof DateTime) {
            return $dt->format('Y-m-d');
        }
    }

    // Try strtotime as a fallback (handles many locale-neutral strings)
    $ts = strtotime($value);
    if ($ts !== false) {
        return date('Y-m-d', $ts);
    }

    return null;
}

// Unified JSON sender to avoid parse errors on client
function send_json($payload) {
    if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
    if (function_exists('ob_get_length') && ob_get_length()) { @ob_clean(); }
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}
