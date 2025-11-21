<?php

/**
 * Laporan Service Controller
 * Handles service reports functionality
 */

if (!isset($myCtrl)) {
    $myCtrl = 'analisis';
}
_auth();

$ui->assign('_sysfrm_menu', 'analisis');
$ui->assign('_sysfrm_menu1', 'laporan-service');
$ui->assign('_title', 'Laporan Service - '. $config['CompanyName']);
$ui->assign('_st', 'Laporan Service');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user   = User::_info();
$ui->assign('user', $user);
$spath  = 'prog/' . $_SESSION['menu'] . '/';

switch ($action) {
    case 'customer-service':
        // Get year ranges for defaults
        $current_year = date('Y');
        $ui->assign('current_year', $current_year);
        
        // Handle form submission
        if ($_POST) {
            $tahun_service_from = $_POST['tahun_service_from'] ?? ($current_year - 7);
            $tahun_service_to = $_POST['tahun_service_to'] ?? $current_year;
            $tahun_kendaraan_from = $_POST['tahun_kendaraan_from'] ?? ($current_year - 7);
            $tahun_kendaraan_to = $_POST['tahun_kendaraan_to'] ?? $current_year;
            
            // Build the cross-reference data using ORM
            $customers = ORM::for_table('daftar_customer')
                ->where_not_null('tgl_service')
                ->where_not_equal('tgl_service', '0000-00-00')
                ->where_gte('tahun_kendaraan', $tahun_kendaraan_from)
                ->where_lte('tahun_kendaraan', $tahun_kendaraan_to)
                ->where_raw("YEAR(tgl_service) BETWEEN $tahun_service_from AND $tahun_service_to")
                ->find_array();
            
            $raw_data = [];
            
            foreach ($customers as $customer) {
                $tahun_kendaraan_asli = $customer['tahun_kendaraan'];
                $tahun_service = date('Y', strtotime($customer['tgl_service']));
                
                // Skip data outside the selected range
                if ($tahun_kendaraan_asli < $tahun_kendaraan_from || $tahun_kendaraan_asli > $tahun_kendaraan_to) {
                    continue;
                }
                
                // Group years below 2017 into "<2017" but only if they're within range
                if ($tahun_kendaraan_asli < 2017 && $tahun_kendaraan_from < 2017) {
                    $tahun_kendaraan = '<2017';
                } else {
                    $tahun_kendaraan = $tahun_kendaraan_asli;
                }
                
                if (!isset($raw_data[$tahun_kendaraan])) {
                    $raw_data[$tahun_kendaraan] = [];
                }
                if (!isset($raw_data[$tahun_kendaraan][$tahun_service])) {
                    $raw_data[$tahun_kendaraan][$tahun_service] = 0;
                }
                $raw_data[$tahun_kendaraan][$tahun_service]++;
            }
            
            // Create year ranges
            $tahun_service_range = range($tahun_service_from, $tahun_service_to);
            
            // Create kendaraan range with <2017 at the beginning
            $tahun_kendaraan_range = [];
            if ($tahun_kendaraan_from < 2017) {
                $tahun_kendaraan_range[] = '<2017';
            }
            for ($year = max(2017, $tahun_kendaraan_from); $year <= $tahun_kendaraan_to; $year++) {
                $tahun_kendaraan_range[] = $year;
            }
            
            // Build complete matrix
            $matrix_data = [];
            foreach ($tahun_kendaraan_range as $tk) {
                $matrix_data[$tk] = [];
                foreach ($tahun_service_range as $ts) {
                    $matrix_data[$tk][$ts] = isset($raw_data[$tk][$ts]) ? $raw_data[$tk][$ts] : 0;
                }
            }
            
            // Calculate totals
            $total_per_tahun_kendaraan = [];
            $total_per_tahun_service = [];
            $grand_total = 0;
            
            foreach ($matrix_data as $tk => $services) {
                $total_per_tahun_kendaraan[$tk] = array_sum($services);
                $grand_total += $total_per_tahun_kendaraan[$tk];
                
                foreach ($services as $ts => $count) {
                    if (!isset($total_per_tahun_service[$ts])) {
                        $total_per_tahun_service[$ts] = 0;
                    }
                    $total_per_tahun_service[$ts] += $count;
                }
            }
            
            $ui->assign('matrix_data', $matrix_data);
            $ui->assign('tahun_service_range', $tahun_service_range);
            $ui->assign('tahun_kendaraan_range', $tahun_kendaraan_range);
            $ui->assign('total_per_tahun_kendaraan', $total_per_tahun_kendaraan);
            $ui->assign('total_per_tahun_service', $total_per_tahun_service);
            $ui->assign('grand_total', $grand_total);
            $ui->assign('show_results', true);
            
            // Store filter values for display
            $ui->assign('filter_tahun_service_from', $tahun_service_from);
            $ui->assign('filter_tahun_service_to', $tahun_service_to);
            $ui->assign('filter_tahun_kendaraan_from', $tahun_kendaraan_from);
            $ui->assign('filter_tahun_kendaraan_to', $tahun_kendaraan_to);
        }
        
        $ui->display($spath . 'laporan-customer-service.tpl');
        break;
        
    case 'export-customer-service':
        if ($_POST) {
            $tahun_service_from = $_POST['tahun_service_from'] ?? (date('Y') - 7);
            $tahun_service_to = $_POST['tahun_service_to'] ?? date('Y');
            $tahun_kendaraan_from = $_POST['tahun_kendaraan_from'] ?? (date('Y') - 7);
            $tahun_kendaraan_to = $_POST['tahun_kendaraan_to'] ?? date('Y');
            
            // Same query as above using ORM
            $customers = ORM::for_table('daftar_customer')
                ->where_not_null('tgl_service')
                ->where_not_equal('tgl_service', '0000-00-00')
                ->where_gte('tahun_kendaraan', $tahun_kendaraan_from)
                ->where_lte('tahun_kendaraan', $tahun_kendaraan_to)
                ->where_raw("YEAR(tgl_service) BETWEEN $tahun_service_from AND $tahun_service_to")
                ->find_array();
            
            $raw_data = [];
            
            foreach ($customers as $customer) {
                $tahun_kendaraan_asli = $customer['tahun_kendaraan'];
                $tahun_service = date('Y', strtotime($customer['tgl_service']));
                
                // Skip data outside the selected range
                if ($tahun_kendaraan_asli < $tahun_kendaraan_from || $tahun_kendaraan_asli > $tahun_kendaraan_to) {
                    continue;
                }
                
                // Group years below 2017 into "<2017" but only if they're within range
                if ($tahun_kendaraan_asli < 2017 && $tahun_kendaraan_from < 2017) {
                    $tahun_kendaraan = '<2017';
                } else {
                    $tahun_kendaraan = $tahun_kendaraan_asli;
                }
                
                if (!isset($raw_data[$tahun_kendaraan])) {
                    $raw_data[$tahun_kendaraan] = [];
                }
                if (!isset($raw_data[$tahun_kendaraan][$tahun_service])) {
                    $raw_data[$tahun_kendaraan][$tahun_service] = 0;
                }
                $raw_data[$tahun_kendaraan][$tahun_service]++;
            }
            
            // Create ranges and matrix
            $tahun_service_range = range($tahun_service_from, $tahun_service_to);
            
            // Create kendaraan range with <2017 at the beginning
            $tahun_kendaraan_range = [];
            if ($tahun_kendaraan_from < 2017) {
                $tahun_kendaraan_range[] = '<2017';
            }
            for ($year = max(2017, $tahun_kendaraan_from); $year <= $tahun_kendaraan_to; $year++) {
                $tahun_kendaraan_range[] = $year;
            }
            
            $matrix_data = [];
            foreach ($tahun_kendaraan_range as $tk) {
                $matrix_data[$tk] = [];
                foreach ($tahun_service_range as $ts) {
                    $matrix_data[$tk][$ts] = isset($raw_data[$tk][$ts]) ? $raw_data[$tk][$ts] : 0;
                }
            }
            
            // Set headers for Excel download
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="CUSTOMER_SERVICE_' . $tahun_service_from . '_' . $tahun_service_to . '.xls"');
            header('Pragma: no-cache');
            header('Expires: 0');
            
            // Start Excel output
            echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
            echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="ProgId" content="Excel.Sheet"><meta name="Generator" content="Microsoft Excel 11"></head>';
            echo '<body>';
            
            // Title
            echo '<table border="1" cellpadding="2" cellspacing="0">';
            echo '<tr><td colspan="' . (count($tahun_service_range) + 2) . '" style="font-weight:bold; text-align:center; font-size:14px;">CUSTOMER SERVICE ' . $tahun_service_from . ' - ' . $tahun_service_to . '</td></tr>';
            
            // Headers
            echo '<tr style="background-color:#f0f0f0; font-weight:bold;">';
            echo '<td style="text-align:center;">TAHUN<br>KENDARAAN</td>';
            echo '<td colspan="' . count($tahun_service_range) . '" style="text-align:center;">TAHUN SERVICE</td>';
            echo '<td style="text-align:center;">TOTAL</td>';
            echo '</tr>';
            
            // Sub headers (years)
            echo '<tr style="background-color:#f0f0f0; font-weight:bold;">';
            echo '<td></td>';
            foreach ($tahun_service_range as $ts) {
                echo '<td style="text-align:center;">' . $ts . '</td>';
            }
            echo '<td></td>';
            echo '</tr>';
            
            // Data rows
            foreach ($tahun_kendaraan_range as $tk) {
                echo '<tr>';
                echo '<td style="font-weight:bold; text-align:center;">' . $tk . '</td>';
                $row_total = 0;
                foreach ($tahun_service_range as $ts) {
                    $value = $matrix_data[$tk][$ts];
                    $row_total += $value;
                    if ($value > 0) {
                        echo '<td style="text-align:center;">' . number_format($value) . '</td>';
                    } else {
                        echo '<td style="text-align:center;"></td>';
                    }
                }
                echo '<td style="text-align:center; font-weight:bold;">' . number_format($row_total) . '</td>';
                echo '</tr>';
            }
            
            // Total row
            echo '<tr style="background-color:#e8f5e8; font-weight:bold;">';
            echo '<td style="text-align:center;">TOTAL</td>';
            $grand_total = 0;
            foreach ($tahun_service_range as $ts) {
                $col_total = 0;
                foreach ($tahun_kendaraan_range as $tk) {
                    $col_total += $matrix_data[$tk][$ts];
                }
                $grand_total += $col_total;
                echo '<td style="text-align:center;">' . number_format($col_total) . '</td>';
            }
            echo '<td style="text-align:center;">' . number_format($grand_total) . '</td>';
            echo '</tr>';
            
            echo '</table>';
            echo '</body></html>';
            
            exit;
        }
        break;
        
    case '':
    default:
        // Get today's date for default value
        $today = date('Y-m-d');
        $ui->assign('today', $today);
        
        // Get tipe kendaraan options
        $tipe_kendaraan_options = '';
        $tipe_kendaraan = ORM::for_table('daftar_tipe_kendaraan')->find_many();
        foreach ($tipe_kendaraan as $tipe) {
            $tipe_kendaraan_options .= '<option value="' . $tipe->merek . '">' . $tipe->nama_tipe_mobil . '</option>';
        }
        $ui->assign('kode_tipe', $tipe_kendaraan_options);
        
        // Handle form submission
        if ($_POST) {
            $periode = $_POST['periode'] ?? '';
            $kode_tipe = $_POST['kode_tipe'] ?? 'SEMUA';
            $status_service = $_POST['status_service'] ?? 'SEMUA';
            
            // Build query using ORM
            $query = ORM::for_table('daftar_customer');
            
            // Add filters
            if (!empty($periode)) {
                $query = $query->where_raw("DATE(tgl_service) = '$periode'");
            }
            
            if ($kode_tipe != 'SEMUA') {
                $query = $query->where('tipe_kendaraan', $kode_tipe);
            }
            
            $customers = $query->order_by_desc('tgl_service')->find_array();
            
            $laporan_data = [];
            $total_biaya = 0;
            
            // Get tipe kendaraan names
            $tipe_names = [];
            $tipe_list = ORM::for_table('daftar_tipe_kendaraan')->find_array();
            foreach ($tipe_list as $tipe) {
                $tipe_names[$tipe['merek']] = $tipe['nama_tipe_mobil'];
            }
            
            foreach ($customers as $customer) {
                $row = [
                    'id' => $customer['id'],
                    'customer_name' => $customer['customer_name'],
                    'no_polisi' => $customer['no_polisi'],
                    'tipe_kendaraan' => $customer['tipe_kendaraan'],
                    'tgl_service' => $customer['tgl_service'],
                    'status_service' => 'SELESAI',
                    'keluhan' => $customer['keluhan'] ?? '',
                    'biaya_service' => 0,
                    'nama_tipe' => isset($tipe_names[$customer['tipe_kendaraan']]) ? $tipe_names[$customer['tipe_kendaraan']] : $customer['tipe_kendaraan']
                ];
                $laporan_data[] = $row;
                $total_biaya += floatval($row['biaya_service']);
            }
            
            $ui->assign('laporan_data', $laporan_data);
            $ui->assign('total_biaya', $total_biaya);
            $ui->assign('periode_filter', $periode);
            $ui->assign('tipe_filter', $kode_tipe);
            $ui->assign('status_filter', $status_service);
            $ui->assign('show_results', true);
        }
        
        $ui->display($spath . 'laporan-service.tpl');
        break;
        
    case 'export':
        // Export functionality (optional)
        if ($_POST) {
            $periode = $_POST['periode'] ?? '';
            $kode_tipe = $_POST['kode_tipe'] ?? 'SEMUA';
            $status_service = $_POST['status_service'] ?? 'SEMUA';
            
            // Same query as above for export using ORM
            $query = ORM::for_table('daftar_customer');
            
            if (!empty($periode)) {
                $query = $query->where_raw("DATE(tgl_service) = '$periode'");
            }
            
            if ($kode_tipe != 'SEMUA') {
                $query = $query->where('tipe_kendaraan', $kode_tipe);
            }
            
            $customers = $query->order_by_desc('tgl_service')->find_array();
            
            // Get tipe kendaraan names
            $tipe_names = [];
            $tipe_list = ORM::for_table('daftar_tipe_kendaraan')->find_array();
            foreach ($tipe_list as $tipe) {
                $tipe_names[$tipe['merek']] = $tipe['nama_tipe_mobil'];
            }
            
            // Set headers for CSV download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="laporan_service_' . date('Y-m-d') . '.csv"');
            
            $output = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($output, [
                'No',
                'Nama Customer',
                'No Polisi',
                'Tipe Kendaraan',
                'Tanggal Service',
                'Status Service',
                'Keluhan',
                'Biaya Service'
            ]);
            
            // Execute query and output data
            $no = 1;
            
            foreach ($customers as $customer) {
                fputcsv($output, [
                    $no++,
                    $customer['customer_name'],
                    $customer['no_polisi'],
                    isset($tipe_names[$customer['tipe_kendaraan']]) ? $tipe_names[$customer['tipe_kendaraan']] : $customer['tipe_kendaraan'],
                    $customer['tgl_service'],
                    'SELESAI',
                    $customer['keluhan'] ?? '',
                    '0'
                ]);
            }
            
            fclose($output);
            exit;
        }
        break;
}
