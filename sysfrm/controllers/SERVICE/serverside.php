<?php
require_once 'sysfrm/lib/phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

_auth();
$action = $routes['2'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());
$user = User::_info();

$months = [
	'01' => 'Jan',
	'02' => 'Feb',
	'03' => 'Mar',
	'04' => 'Apr',
	'05' => 'Mei',
	'06' => 'Jun',
	'07' => 'Jul',
	'08' => 'Agu',
	'09' => 'Sep',
	'10' => 'Okt',
	'11' => 'Nov',
	'12' => 'Des',
];

switch($action){

	case 'load-active-customer':
		Event::trigger('customer/load-active-customer/');
		// customer name, no chassis, mobile phone, tipe kendaraan, tahun kendaraan, km kendaraan
		$columns = array('a.id', 'a.customer_name','a.kode_dept', 'a.equipment_no', 'a.mobile', 'a.tipe_kendaraan', 'a.tahun_kendaraan', 'a.km_kendaraan');
		$whereArr = array('a.customer_name', 'a.kode_dept', 'a.equipment_no', 'a.mobile', 'a.tipe_kendaraan', 'a.tahun_kendaraan', 'a.km_kendaraan');
		$sql = "
			SELECT a.id, a.customer_name, a.kode_dept, a.equipment_no, a.mobile, a.tipe_kendaraan, a.tahun_kendaraan, a.km_kendaraan
			FROM daftar_customer AS a
			LEFT JOIN (
				SELECT equipment_no, MAX(id) AS max_id
				FROM daftar_customer
				WHERE equipment_no IS NOT NULL AND equipment_no <> ''
				GROUP BY equipment_no
			) AS max_eq ON a.equipment_no = max_eq.equipment_no AND a.id = max_eq.max_id
			LEFT JOIN daftar_tipe_kendaraan AS t ON (a.tipe_kendaraan = t.nama_tipe_mobil OR a.tipe_kendaraan = t.kategori)
			WHERE (
				(a.equipment_no IS NULL OR a.equipment_no = '')
				OR max_eq.max_id IS NOT NULL
			)
			AND a.tgl_service >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
		";

		// Optional filters from request
		$params = $_REQUEST;
		$flt = '';
		// Multiple kategori support via CSV `tipe_kendaraan_multi`; fallback to single `tipe_kendaraan`
		$multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
		if ($multi !== '') {
			$parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$special = false;
				$norm = [];
				foreach ($parts as $p) {
					if (strcasecmp($p, 'Tidak Terkategori') === 0) { $special = true; continue; }
					$norm[] = "'" . mysqli_real_escape_string($conn, $p) . "'";
				}
				$clause = [];
				if (!empty($norm)) { 
					$in = implode(',', $norm);
					$clause[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))';
				}
				if ($special) {
					$clause[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))";
				}
				if (!empty($clause)) { $flt .= ' AND (' . implode(' OR ', $clause) . ')'; }
			}
		} else if (!empty($params['tipe_kendaraan'])) {
			$tipe = mysqli_real_escape_string($conn, trim($params['tipe_kendaraan']));
			$flt .= " AND (a.tipe_kendaraan = '$tipe' OR t.kategori = '$tipe')";
		}

		// Filter by merek via join
		$merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
		if ($merekMulti !== '') {
			$parts = array_filter(array_map('trim', explode(',', $merekMulti)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$in = [];
				foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
				$flt .= ' AND (t.merek IN (' . implode(',', $in) . '))';
			}
		}

		// Cabang filter (kode_dept)
		$cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
		if ($cabangMulti !== '') {
			$parts = array_filter(array_map('trim', explode(',', $cabangMulti)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$in = [];
				foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
				$flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')';
			}
		}

		// Cabang filter (kode_dept)
		$cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
		if ($cabangMulti !== '') {
			$parts = array_filter(array_map('trim', explode(',', $cabangMulti)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$in = [];
				foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
				$flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')';
			}
		}

		// Cabang filter (kode_dept)
		$cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
		if ($cabangMulti !== '') {
			$parts = array_filter(array_map('trim', explode(',', $cabangMulti)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$in = [];
				foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
				$flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')';
			}
		}
		        // Cabang filter (kode_dept)
        $cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
        if ($cabangMulti !== '') {
            $parts = array_filter(array_map('trim', explode(',', $cabangMulti)), function($v){ return $v !== ''; });
            if (!empty($parts)) {
                $in = [];
                foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
                $flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')';
            }
        }
        // Completeness filter (any of phone fields is present and not '0')
        $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';
        if ($completeMulti !== '') {
            $parts = array_filter(array_map('trim', explode(',', $completeMulti)), function($v){ return $v !== ''; });
            if (!empty($parts)) {
                $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))";
                $clause = [];
                foreach ($parts as $p) {
                    if (strcasecmp($p, 'complete') === 0) { $clause[] = $cond; }
                    if (strcasecmp($p, 'incomplete') === 0) { $clause[] = '(NOT ' . $cond . ')'; }
                }
                if (!empty($clause)) { $flt .= ' AND (' . implode(' OR ', $clause) . ')'; }
            }
        }
		        // Filter by Merek (map via master: a.tipe_kendaraan IN (SELECT kategori ...))
        $merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
        if ($merekMulti !== '') {
            $parts = array_filter(array_map('trim', explode(',', $merekMulti)), function($v){ return $v !== ''; });
            if (!empty($parts)) {
                $in = [];
                foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
                $flt .= ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))';
            }
        }

        // Unit Year range: unit_year_from, unit_year_to (integer year)
        $uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
        $uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
		if ($uyFrom && $uyTo) {
			if ($uyTo < $uyFrom) { $tmp = $uyFrom; $uyFrom = $uyTo; $uyTo = $tmp; }
			$flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo";
		} elseif ($uyFrom) {
			$flt .= " AND a.tahun_kendaraan >= $uyFrom";
		} elseif ($uyTo) {
			$flt .= " AND a.tahun_kendaraan <= $uyTo";
		}

		// Service Year range: service_year_from, service_year_to (integer year)
		$syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
		$syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
		if ($syFrom && $syTo) {
			if ($syTo < $syFrom) { $tmp = $syFrom; $syFrom = $syTo; $syTo = $tmp; }
			$flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo";
		} elseif ($syFrom) {
			$flt .= " AND YEAR(a.tgl_service) >= $syFrom";
		} elseif ($syTo) {
			$flt .= " AND YEAR(a.tgl_service) <= $syTo";
		}

		if ($flt !== '') { $sql .= $flt; }
		$show = array(
			'[[index]]',
			'[customer_name]',
			'[kode_dept]',
			'[equipment_no]',
			'[mobile]',
			'[tipe_kendaraan]',
			'[tahun_kendaraan]',
			'[km_kendaraan]',
			'<div class="text-right">
				<a href="[url]customer/detail/[id]/" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-book"></i></a>
			</div>'
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'export-active-filtered':
		Event::trigger('customer/export-active-filtered/');
		while (ob_get_level() > 0) { ob_end_clean(); }

		$date = new DateTime();
		$filename = 'Active-Customers-' . $date->format('mY') . '.xlsx';
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

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

		$result = mysqli_query($conn, $sql) or die('Query Error: '.mysqli_error($conn));
		
		// Collect data and calculate statistics
		$dataRows = [];
		$totalCount = 0;
		$completeCount = 0;
		$incompleteCount = 0;
		$minUnitYear = null;
		$maxUnitYear = null;
		
		while ($row = mysqli_fetch_assoc($result)) {
			$dataRows[] = $row;
			$totalCount++;
			
			// Check if complete (at least one contact field has value)
			$hasContact = (
				($row['home'] && $row['home'] !== '' && $row['home'] !== '0') ||
				($row['office'] && $row['office'] !== '' && $row['office'] !== '0') ||
				($row['mobile'] && $row['mobile'] !== '' && $row['mobile'] !== '0') ||
				($row['cp_phone'] && $row['cp_phone'] !== '' && $row['cp_phone'] !== '0') ||
				($row['dm_phone'] && $row['dm_phone'] !== '' && $row['dm_phone'] !== '0')
			);
			
			if ($hasContact) {
				$completeCount++;
			} else {
				$incompleteCount++;
			}
			
			// Track unit year range
			if ($row['tahun_kendaraan'] && $row['tahun_kendaraan'] > 0) {
				if ($minUnitYear === null || $row['tahun_kendaraan'] < $minUnitYear) {
					$minUnitYear = $row['tahun_kendaraan'];
				}
				if ($maxUnitYear === null || $row['tahun_kendaraan'] > $maxUnitYear) {
					$maxUnitYear = $row['tahun_kendaraan'];
				}
			}
		}
		
		// Add summary information in first 5 rows
		$sheet->setCellValue('A1', 'All Data');
		$sheet->setCellValue('B1', $totalCount);
		
		$sheet->setCellValue('A2', 'Unit Type');
		$unitTypeRange = ($minUnitYear && $maxUnitYear) ? "$minUnitYear - $maxUnitYear" : '';
		$sheet->setCellValue('B2', $unitTypeRange);
		
		$sheet->setCellValue('C1', 'Lengkap');
		$sheet->setCellValue('D1', $completeCount);
		
		$sheet->setCellValue('A3', 'Unit Year');
		$unitYearRange = ($minUnitYear && $maxUnitYear) ? "$minUnitYear - $maxUnitYear" : '';
		$sheet->setCellValue('B3', $unitYearRange);
		
		$sheet->setCellValue('C2', 'Tidak Lengkap');
		$sheet->setCellValue('D2', $incompleteCount);
		
		// Add headers at row 6
		$headers = ['id','customer_name','alamat','nama_sa','equipment_no','no_polisi','home','office','mobile','cp_name','cp_phone','dm_name','dm_phone','tipe_kendaraan','tgl_service','tgl_selesai','tahun_kendaraan','km_kendaraan','tgl_delivery','customer_receive_car','job_type','kode_dept','upload_date','import_date'];
		$sheet->fromArray($headers, NULL, 'A6');
		$sheet->getStyle('A6:X6')->getFont()->setBold(true);
		$sheet->getStyle('A6:X6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');
		
		// Add data starting from row 7
		$rowNumber = 7;
		foreach ($dataRows as $row) {
			$sheet->setCellValue('A'.$rowNumber, $row['id']);
			$sheet->setCellValue('B'.$rowNumber, $row['customer_name']);
			$sheet->setCellValue('C'.$rowNumber, $row['alamat']);
			$sheet->setCellValue('D'.$rowNumber, $row['nama_sa']);
			$sheet->setCellValue('E'.$rowNumber, $row['equipment_no']);
			$sheet->setCellValue('F'.$rowNumber, $row['no_polisi']);
			$sheet->setCellValue('G'.$rowNumber, $row['home']);
			$sheet->setCellValue('H'.$rowNumber, $row['office']);
			$sheet->setCellValue('I'.$rowNumber, $row['mobile']);
			$sheet->setCellValue('J'.$rowNumber, $row['cp_name']);
			$sheet->setCellValue('K'.$rowNumber, $row['cp_phone']);
			$sheet->setCellValue('L'.$rowNumber, $row['dm_name']);
			$sheet->setCellValue('M'.$rowNumber, $row['dm_phone']);
			$sheet->setCellValue('N'.$rowNumber, $row['tipe_kendaraan']);
			$sheet->setCellValue('O'.$rowNumber, ($row['tgl_service'] && $row['tgl_service']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_service'])):'');
			$sheet->setCellValue('P'.$rowNumber, ($row['tgl_selesai'] && $row['tgl_selesai']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_selesai'])):'');
			$sheet->setCellValue('Q'.$rowNumber, $row['tahun_kendaraan']);
			$sheet->setCellValue('R'.$rowNumber, $row['km_kendaraan']);
			$sheet->setCellValue('S'.$rowNumber, ($row['tgl_delivery'] && $row['tgl_delivery']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_delivery'])):'');
			$sheet->setCellValue('T'.$rowNumber, ($row['customer_receive_car'] && $row['customer_receive_car']!='0000-00-00')?date('d/m/Y',strtotime($row['customer_receive_car'])):'');
			$sheet->setCellValue('U'.$rowNumber, $row['job_type']);
			$sheet->setCellValue('V'.$rowNumber, $row['kode_dept']);
			$sheet->setCellValue('W'.$rowNumber, ($row['upload_date'] && $row['upload_date']!='0000-00-00')?date('d/m/Y',strtotime($row['upload_date'])):'');
			$sheet->setCellValue('X'.$rowNumber, ($row['import_date'] && $row['import_date']!='0000-00-00')?date('d/m/Y',strtotime($row['import_date'])):'');
			$rowNumber++;
		}
		foreach (range('A','X') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }
		if (!headers_sent()) {
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Cache-Control: max-age=0');
		}
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
		break;

	case 'export-active-customer':
		Event::trigger('customer/export-active-customer/');
		
		// Clear any output buffers
		if (ob_get_level()) {
			ob_end_clean();
		}
		
		// Get current date for filename
		$date = new DateTime();
		$filename = 'Active-Customers-' . $date->format('mY') . '.xlsx';
		
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		// Build the query (same as load-active-customer but get all fields)
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
		";
		
		// Apply filters (same as in load-active-customer)
		$params = $_REQUEST;
		$flt = '';
		
		// Apply tipe_kendaraan_multi filter
		$multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
		if ($multi !== '') {
			$parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$special = false;
				$norm = [];
				foreach ($parts as $p) {
					if (strcasecmp($p, 'Tidak Terkategori') === 0) { $special = true; continue; }
					$norm[] = "'" . mysqli_real_escape_string($conn, $p) . "'";
				}
				$clause = [];
				if (!empty($norm)) { 
					$in = implode(',', $norm);
					$clause[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))';
				}
				if ($special) {
					$clause[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))";
				}
				if (!empty($clause)) { $flt .= ' AND (' . implode(' OR ', $clause) . ')'; }
			}
		}
		
		// Apply cabang_multi filter
		$cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
		if ($cabangMulti !== '') {
			$parts = array_filter(array_map('trim', explode(',', $cabangMulti)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$in = "'" . implode("','", array_map(function($v) use ($conn) { 
					return mysqli_real_escape_string($conn, $v); 
				}, $parts)) . "'";
				$flt .= " AND a.kode_dept IN ($in)";
			}
		}
		
		// Apply year filters
		$uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
		$uyTo = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
		if ($uyFrom && $uyTo) {
			if ($uyTo < $uyFrom) { $tmp = $uyFrom; $uyFrom = $uyTo; $uyTo = $tmp; }
			$flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo";
		} elseif ($uyFrom) {
			$flt .= " AND a.tahun_kendaraan >= $uyFrom";
		} elseif ($uyTo) {
			$flt .= " AND a.tahun_kendaraan <= $uyTo";
		}
		
		$syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
		$syTo = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
		if ($syFrom && $syTo) {
			if ($syTo < $syFrom) { $tmp = $syFrom; $syFrom = $syTo; $syTo = $tmp; }
			$flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo";
		} elseif ($syFrom) {
			$flt .= " AND YEAR(a.tgl_service) >= $syFrom";
		} elseif ($syTo) {
			$flt .= " AND YEAR(a.tgl_service) <= $syTo";
		}
		
		// Apply all filters
		if ($flt !== '') { 
			$sql .= " $flt ";
		}
		
		// Order by customer name
		$sql .= " ORDER BY a.customer_name ASC";
		
		// Execute query
		$result = mysqli_query($conn, $sql);
		
		if (!$result) {
			die('Query Error: ' . mysqli_error($conn));
		}
		
		// Collect data and calculate statistics
		$dataRows = [];
		$totalCount = 0;
		$completeCount = 0;
		$incompleteCount = 0;
		$minUnitYear = null;
		$maxUnitYear = null;
		
		while ($row = mysqli_fetch_assoc($result)) {
			$dataRows[] = $row;
			$totalCount++;
			
			// Check if complete (at least one contact field has value)
			$hasContact = (
				($row['home'] && $row['home'] !== '' && $row['home'] !== '0') ||
				($row['office'] && $row['office'] !== '' && $row['office'] !== '0') ||
				($row['mobile'] && $row['mobile'] !== '' && $row['mobile'] !== '0') ||
				($row['cp_phone'] && $row['cp_phone'] !== '' && $row['cp_phone'] !== '0') ||
				($row['dm_phone'] && $row['dm_phone'] !== '' && $row['dm_phone'] !== '0')
			);
			
			if ($hasContact) {
				$completeCount++;
			} else {
				$incompleteCount++;
			}
			
			// Track unit year range
			if ($row['tahun_kendaraan'] && $row['tahun_kendaraan'] > 0) {
				if ($minUnitYear === null || $row['tahun_kendaraan'] < $minUnitYear) {
					$minUnitYear = $row['tahun_kendaraan'];
				}
				if ($maxUnitYear === null || $row['tahun_kendaraan'] > $maxUnitYear) {
					$maxUnitYear = $row['tahun_kendaraan'];
				}
			}
		}
		
		// Add summary information in first 5 rows
		$sheet->setCellValue('A1', 'All Data');
		$sheet->setCellValue('B1', $totalCount);
		
		$sheet->setCellValue('A2', 'Unit Type');
		$unitTypeRange = ($minUnitYear && $maxUnitYear) ? "$minUnitYear - $maxUnitYear" : '';
		$sheet->setCellValue('B2', $unitTypeRange);
		
		$sheet->setCellValue('C1', 'Lengkap');
		$sheet->setCellValue('D1', $completeCount);
		
		$sheet->setCellValue('A3', 'Unit Year');
		$unitYearRange = ($minUnitYear && $maxUnitYear) ? "$minUnitYear - $maxUnitYear" : '';
		$sheet->setCellValue('B3', $unitYearRange);
		
		$sheet->setCellValue('C2', 'Tidak Lengkap');
		$sheet->setCellValue('D2', $incompleteCount);
		
		// Add headers at row 6
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
		
		// Add data starting from row 7
		$rowNumber = 7;
		foreach ($dataRows as $row) {
			$sheet->setCellValue('A' . $rowNumber, $row['id']);
			$sheet->setCellValue('B' . $rowNumber, $row['customer_name']);
			$sheet->setCellValue('C' . $rowNumber, $row['alamat']);
			$sheet->setCellValue('D' . $rowNumber, $row['nama_sa']);
			$sheet->setCellValue('E' . $rowNumber, $row['equipment_no']);
			$sheet->setCellValue('F' . $rowNumber, $row['no_polisi']);
			$sheet->setCellValue('G' . $rowNumber, $row['home']);
			$sheet->setCellValue('H' . $rowNumber, $row['office']);
			$sheet->setCellValue('I' . $rowNumber, $row['mobile']);
			$sheet->setCellValue('J' . $rowNumber, $row['cp_name']);
			$sheet->setCellValue('K' . $rowNumber, $row['cp_phone']);
			$sheet->setCellValue('L' . $rowNumber, $row['dm_name']);
			$sheet->setCellValue('M' . $rowNumber, $row['dm_phone']);
			$sheet->setCellValue('N' . $rowNumber, $row['tipe_kendaraan']);
			$sheet->setCellValue('O' . $rowNumber, $row['tgl_service'] && $row['tgl_service'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_service'])) : '');
			$sheet->setCellValue('P' . $rowNumber, $row['tgl_selesai'] && $row['tgl_selesai'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_selesai'])) : '');
			$sheet->setCellValue('Q' . $rowNumber, $row['tahun_kendaraan']);
			$sheet->setCellValue('R' . $rowNumber, $row['km_kendaraan']);
			$sheet->setCellValue('S' . $rowNumber, $row['tgl_delivery'] && $row['tgl_delivery'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_delivery'])) : '');
			$sheet->setCellValue('T' . $rowNumber, $row['customer_receive_car'] && $row['customer_receive_car'] != '0000-00-00' ? date('d/m/Y', strtotime($row['customer_receive_car'])) : '');
			$sheet->setCellValue('U' . $rowNumber, $row['job_type']);
			$sheet->setCellValue('V' . $rowNumber, $row['kode_dept']);
			$sheet->setCellValue('W' . $rowNumber, $row['upload_date'] && $row['upload_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['upload_date'])) : '');
			$sheet->setCellValue('X' . $rowNumber, $row['import_date'] && $row['import_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['import_date'])) : '');
			
			$rowNumber++;
		}
		
		// Auto-size columns
		foreach (range('A', 'X') as $col) {
			$sheet->getColumnDimension($col)->setAutoSize(true);
		}
		
		// Set headers for download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');
		
		// Save to php output
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
		break;

	case 'export-nonactive-customer':
		Event::trigger('customer/export-nonactive-customer/');
		
		// Clear any output buffers
		if (ob_get_level()) {
			ob_end_clean();
		}
		
		// Get current date for filename
		$date = new DateTime();
		$filename = 'Non-Active-Customers-' . $date->format('mY') . '.xlsx';
		
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		// Add headers based on the database structure
		$headers = [
			'id', 'customer_name', 'alamat', 'nama_sa', 'equipment_no', 'no_polisi',
			'home', 'office', 'mobile', 'cp_name', 'cp_phone', 'dm_name', 'dm_phone',
			'tipe_kendaraan', 'tgl_service', 'tgl_selesai', 'tahun_kendaraan',
			'km_kendaraan', 'tgl_delivery', 'customer_receive_car', 'job_type', 'kode_dept',
			'upload_date', 'import_date'
		];
		
		// Set headers with styling
		$sheet->fromArray($headers, NULL, 'A1');
		$sheet->getStyle('A1:X1')->getFont()->setBold(true);
		$sheet->getStyle('A1:X1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');
		
		// Build the query (same as load-nonactive-customer but get all fields)
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
		";
		
		// Apply filters (same as in load-nonactive-customer)
		$params = $_REQUEST;
		$flt = '';
		
		// Apply tipe_kendaraan_multi filter
		$multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
		if ($multi !== '') {
			$parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$special = false;
				$norm = [];
				foreach ($parts as $p) {
					if (strcasecmp($p, 'Tidak Terkategori') === 0) { $special = true; continue; }
					$norm[] = "'" . mysqli_real_escape_string($conn, $p) . "'";
				}
				$clause = [];
				if (!empty($norm)) { 
					$in = implode(',', $norm);
					$clause[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))';
				}
				if ($special) {
					$clause[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))";
				}
				if (!empty($clause)) { $flt .= ' AND (' . implode(' OR ', $clause) . ')'; }
			}
		}
		
		// Apply cabang_multi filter
		$cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
		if ($cabangMulti !== '') {
			$parts = array_filter(array_map('trim', explode(',', $cabangMulti)), function($v){ return $v !== ''; });
			if (!empty($parts)) {
				$in = "'" . implode("','", array_map(function($v) use ($conn) { 
					return mysqli_real_escape_string($conn, $v); 
				}, $parts)) . "'";
				$flt .= " AND a.kode_dept IN ($in)";
			}
		}
		
		// Apply year filters
		$uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
		$uyTo = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
		if ($uyFrom && $uyTo) {
			if ($uyTo < $uyFrom) { $tmp = $uyFrom; $uyFrom = $uyTo; $uyTo = $tmp; }
			$flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo";
		} elseif ($uyFrom) {
			$flt .= " AND a.tahun_kendaraan >= $uyFrom";
		} elseif ($uyTo) {
			$flt .= " AND a.tahun_kendaraan <= $uyTo";
		}
		
		$syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
		$syTo = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
		if ($syFrom && $syTo) {
			if ($syTo < $syFrom) { $tmp = $syFrom; $syFrom = $syTo; $syTo = $tmp; }
			$flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo";
		} elseif ($syFrom) {
			$flt .= " AND YEAR(a.tgl_service) >= $syFrom";
		} elseif ($syTo) {
			$flt .= " AND YEAR(a.tgl_service) <= $syTo";
		}
		
		// Apply all filters
		if ($flt !== '') { 
			$sql .= " $flt ";
		}
		
		// Order by customer name
		$sql .= " ORDER BY a.customer_name ASC";
		
		// Execute query
		$result = mysqli_query($conn, $sql);
		
		if (!$result) {
			die('Query Error: ' . mysqli_error($conn));
		}
		
		$rowNumber = 2; // Start from row 2 (after headers)
		
		// Add data rows
		while ($row = mysqli_fetch_assoc($result)) {
			$sheet->setCellValue('A' . $rowNumber, $row['id']);
			$sheet->setCellValue('B' . $rowNumber, $row['customer_name']);
			$sheet->setCellValue('C' . $rowNumber, $row['alamat']);
			$sheet->setCellValue('D' . $rowNumber, $row['nama_sa']);
			$sheet->setCellValue('E' . $rowNumber, $row['equipment_no']);
			$sheet->setCellValue('F' . $rowNumber, $row['no_polisi']);
			$sheet->setCellValue('G' . $rowNumber, $row['home']);
			$sheet->setCellValue('H' . $rowNumber, $row['office']);
			$sheet->setCellValue('I' . $rowNumber, $row['mobile']);
			$sheet->setCellValue('J' . $rowNumber, $row['cp_name']);
			$sheet->setCellValue('K' . $rowNumber, $row['cp_phone']);
			$sheet->setCellValue('L' . $rowNumber, $row['dm_name']);
			$sheet->setCellValue('M' . $rowNumber, $row['dm_phone']);
			$sheet->setCellValue('N' . $rowNumber, $row['tipe_kendaraan']);
			$sheet->setCellValue('O' . $rowNumber, $row['tgl_service'] && $row['tgl_service'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_service'])) : '');
			$sheet->setCellValue('P' . $rowNumber, $row['tgl_selesai'] && $row['tgl_selesai'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_selesai'])) : '');
			$sheet->setCellValue('Q' . $rowNumber, $row['tahun_kendaraan']);
			$sheet->setCellValue('R' . $rowNumber, $row['km_kendaraan']);
			$sheet->setCellValue('S' . $rowNumber, $row['tgl_delivery'] && $row['tgl_delivery'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_delivery'])) : '');
			$sheet->setCellValue('T' . $rowNumber, $row['customer_receive_car'] && $row['customer_receive_car'] != '0000-00-00' ? date('d/m/Y', strtotime($row['customer_receive_car'])) : '');
			$sheet->setCellValue('U' . $rowNumber, $row['job_type']);
			$sheet->setCellValue('V' . $rowNumber, $row['kode_dept']);
			$sheet->setCellValue('W' . $rowNumber, $row['upload_date'] && $row['upload_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['upload_date'])) : '');
			$sheet->setCellValue('X' . $rowNumber, $row['import_date'] && $row['import_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['import_date'])) : '');
			
			$rowNumber++;
		}
		
		// Auto-size columns
		foreach (range('A', 'X') as $col) {
			$sheet->getColumnDimension($col)->setAutoSize(true);
		}
		
		// Set headers for download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');
		
		// Save to php output
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
		break;

	case 'export-all-active-customer':
		Event::trigger('customer/export-all-active-customer/');
		
		// Clear any output buffers
		if (ob_get_level()) {
			ob_end_clean();
		}
		
		// Get current date for filename
		$date = new DateTime();
		$filename = 'All-Active-Customers-' . $date->format('mY') . '.xlsx';
		
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		// Add headers based on the database structure
		$headers = [
			'id', 'customer_name', 'alamat', 'nama_sa', 'equipment_no', 'no_polisi',
			'home', 'office', 'mobile', 'cp_name', 'cp_phone', 'dm_name', 'dm_phone',
			'tipe_kendaraan', 'tgl_service', 'tgl_selesai', 'tahun_kendaraan',
			'km_kendaraan', 'tgl_delivery', 'customer_receive_car', 'job_type', 'kode_dept',
			'upload_date', 'import_date'
		];
		
		// Build the query WITHOUT filters
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
		
		// Execute query
		$result = mysqli_query($conn, $sql);
		
		if (!$result) {
			die('Query Error: ' . mysqli_error($conn));
		}
		
		// Collect data and calculate statistics
		$dataRows = [];
		$totalCount = 0;
		$completeCount = 0;
		$incompleteCount = 0;
		$minUnitYear = null;
		$maxUnitYear = null;
		$minServiceYear = null;
		$maxServiceYear = null;
		
		while ($row = mysqli_fetch_assoc($result)) {
			$dataRows[] = $row;
			$totalCount++;
			
			// Check if complete
			$hasContact = (
				($row['home'] && $row['home'] !== '' && $row['home'] !== '0') ||
				($row['office'] && $row['office'] !== '' && $row['office'] !== '0') ||
				($row['mobile'] && $row['mobile'] !== '' && $row['mobile'] !== '0') ||
				($row['cp_phone'] && $row['cp_phone'] !== '' && $row['cp_phone'] !== '0') ||
				($row['dm_phone'] && $row['dm_phone'] !== '' && $row['dm_phone'] !== '0')
			);
			if ($hasContact) $completeCount++; else $incompleteCount++;
			
			// Track unit year range
			if ($row['tahun_kendaraan'] && $row['tahun_kendaraan'] > 0) {
				if ($minUnitYear === null || $row['tahun_kendaraan'] < $minUnitYear) $minUnitYear = $row['tahun_kendaraan'];
				if ($maxUnitYear === null || $row['tahun_kendaraan'] > $maxUnitYear) $maxUnitYear = $row['tahun_kendaraan'];
			}
			
			// Track service year range
			if ($row['tgl_service'] && $row['tgl_service'] != '0000-00-00') {
				$serviceYear = (int)date('Y', strtotime($row['tgl_service']));
				if ($minServiceYear === null || $serviceYear < $minServiceYear) $minServiceYear = $serviceYear;
				if ($maxServiceYear === null || $serviceYear > $maxServiceYear) $maxServiceYear = $serviceYear;
			}
		}
		
		// Add summary info
		$sheet->setCellValue('A1', 'Total Data'); $sheet->setCellValue('B1', $totalCount);
		$sheet->setCellValue('D1', 'Service Year'); 
		$sheet->setCellValue('E1', ($minServiceYear && $maxServiceYear) ? "$minServiceYear - $maxServiceYear" : '-');
		$sheet->setCellValue('G1', 'Lengkap'); $sheet->setCellValue('H1', $completeCount);
		$sheet->setCellValue('D2', 'Unit Year'); 
		$sheet->setCellValue('E2', ($minUnitYear && $maxUnitYear) ? "$minUnitYear - $maxUnitYear" : '-');
		$sheet->setCellValue('G2', 'Tidak Lengkap'); $sheet->setCellValue('H2', $incompleteCount);
		$sheet->getStyle('A1:H2')->getFont()->setBold(true);
		$sheet->getStyle('A1:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9EAD3');
		
		// Add headers at row 6
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
		
		// Add data starting from row 7
		$rowNumber = 7;
		foreach ($dataRows as $row) {
			$sheet->setCellValue('A' . $rowNumber, $row['id']);
			$sheet->setCellValue('B' . $rowNumber, $row['customer_name']);
			$sheet->setCellValue('C' . $rowNumber, $row['alamat']);
			$sheet->setCellValue('D' . $rowNumber, $row['nama_sa']);
			$sheet->setCellValue('E' . $rowNumber, $row['equipment_no']);
			$sheet->setCellValue('F' . $rowNumber, $row['no_polisi']);
			$sheet->setCellValue('G' . $rowNumber, $row['home']);
			$sheet->setCellValue('H' . $rowNumber, $row['office']);
			$sheet->setCellValue('I' . $rowNumber, $row['mobile']);
			$sheet->setCellValue('J' . $rowNumber, $row['cp_name']);
			$sheet->setCellValue('K' . $rowNumber, $row['cp_phone']);
			$sheet->setCellValue('L' . $rowNumber, $row['dm_name']);
			$sheet->setCellValue('M' . $rowNumber, $row['dm_phone']);
			$sheet->setCellValue('N' . $rowNumber, $row['tipe_kendaraan']);
			$sheet->setCellValue('O' . $rowNumber, $row['tgl_service'] && $row['tgl_service'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_service'])) : '');
			$sheet->setCellValue('P' . $rowNumber, $row['tgl_selesai'] && $row['tgl_selesai'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_selesai'])) : '');
			$sheet->setCellValue('Q' . $rowNumber, $row['tahun_kendaraan']);
			$sheet->setCellValue('R' . $rowNumber, $row['km_kendaraan']);
			$sheet->setCellValue('S' . $rowNumber, $row['tgl_delivery'] && $row['tgl_delivery'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_delivery'])) : '');
			$sheet->setCellValue('T' . $rowNumber, $row['customer_receive_car'] && $row['customer_receive_car'] != '0000-00-00' ? date('d/m/Y', strtotime($row['customer_receive_car'])) : '');
			$sheet->setCellValue('U' . $rowNumber, $row['job_type']);
			$sheet->setCellValue('V' . $rowNumber, $row['kode_dept']);
			$sheet->setCellValue('W' . $rowNumber, $row['upload_date'] && $row['upload_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['upload_date'])) : '');
			$sheet->setCellValue('X' . $rowNumber, $row['import_date'] && $row['import_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['import_date'])) : '');
			
			$rowNumber++;
		}
		
		// Auto-size columns
		foreach (range('A', 'X') as $col) {
			$sheet->getColumnDimension($col)->setAutoSize(true);
		}
		
		// Set headers for download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');
		
		// Save to php output
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
		break;

	case 'export-all-nonactive-customer':
		Event::trigger('customer/export-all-nonactive-customer/');
		
		// Clear any output buffers
		if (ob_get_level()) {
			ob_end_clean();
		}
		
		// Get current date for filename
		$date = new DateTime();
		$filename = 'All-Non-Active-Customers-' . $date->format('mY') . '.xlsx';
		
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		// Add headers based on the database structure
		$headers = [
			'id', 'customer_name', 'alamat', 'nama_sa', 'equipment_no', 'no_polisi',
			'home', 'office', 'mobile', 'cp_name', 'cp_phone', 'dm_name', 'dm_phone',
			'tipe_kendaraan', 'tgl_service', 'tgl_selesai', 'tahun_kendaraan',
			'km_kendaraan', 'tgl_delivery', 'customer_receive_car', 'job_type', 'kode_dept',
			'upload_date', 'import_date'
		];
		
		// Build the query WITHOUT filters
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
		
		// Execute query
		$result = mysqli_query($conn, $sql);
		
		if (!$result) {
			die('Query Error: ' . mysqli_error($conn));
		}
		
		// Collect data and calculate statistics
		$dataRows = [];
		$totalCount = 0;
		$completeCount = 0;
		$incompleteCount = 0;
		$minUnitYear = null;
		$maxUnitYear = null;
		$minServiceYear = null;
		$maxServiceYear = null;
		
		while ($row = mysqli_fetch_assoc($result)) {
			$dataRows[] = $row;
			$totalCount++;
			
			// Check if complete
			$hasContact = (
				($row['home'] && $row['home'] !== '' && $row['home'] !== '0') ||
				($row['office'] && $row['office'] !== '' && $row['office'] !== '0') ||
				($row['mobile'] && $row['mobile'] !== '' && $row['mobile'] !== '0') ||
				($row['cp_phone'] && $row['cp_phone'] !== '' && $row['cp_phone'] !== '0') ||
				($row['dm_phone'] && $row['dm_phone'] !== '' && $row['dm_phone'] !== '0')
			);
			if ($hasContact) $completeCount++; else $incompleteCount++;
			
			// Track unit year range
			if ($row['tahun_kendaraan'] && $row['tahun_kendaraan'] > 0) {
				if ($minUnitYear === null || $row['tahun_kendaraan'] < $minUnitYear) $minUnitYear = $row['tahun_kendaraan'];
				if ($maxUnitYear === null || $row['tahun_kendaraan'] > $maxUnitYear) $maxUnitYear = $row['tahun_kendaraan'];
			}
			
			// Track service year range
			if ($row['tgl_service'] && $row['tgl_service'] != '0000-00-00') {
				$serviceYear = (int)date('Y', strtotime($row['tgl_service']));
				if ($minServiceYear === null || $serviceYear < $minServiceYear) $minServiceYear = $serviceYear;
				if ($maxServiceYear === null || $serviceYear > $maxServiceYear) $maxServiceYear = $serviceYear;
			}
		}
		
		// Add summary info
		$sheet->setCellValue('A1', 'Total Data'); $sheet->setCellValue('B1', $totalCount);
		$sheet->setCellValue('D1', 'Service Year'); 
		$sheet->setCellValue('E1', ($minServiceYear && $maxServiceYear) ? "$minServiceYear - $maxServiceYear" : '-');
		$sheet->setCellValue('G1', 'Lengkap'); $sheet->setCellValue('H1', $completeCount);
		$sheet->setCellValue('D2', 'Unit Year'); 
		$sheet->setCellValue('E2', ($minUnitYear && $maxUnitYear) ? "$minUnitYear - $maxUnitYear" : '-');
		$sheet->setCellValue('G2', 'Tidak Lengkap'); $sheet->setCellValue('H2', $incompleteCount);
		$sheet->getStyle('A1:H2')->getFont()->setBold(true);
		$sheet->getStyle('A1:H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9EAD3');
		
		// Add headers at row 6
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
		
		// Add data starting from row 7
		$rowNumber = 7;
		foreach ($dataRows as $row) {
			$sheet->setCellValue('A' . $rowNumber, $row['id']);
			$sheet->setCellValue('B' . $rowNumber, $row['customer_name']);
			$sheet->setCellValue('C' . $rowNumber, $row['alamat']);
			$sheet->setCellValue('D' . $rowNumber, $row['nama_sa']);
			$sheet->setCellValue('E' . $rowNumber, $row['equipment_no']);
			$sheet->setCellValue('F' . $rowNumber, $row['no_polisi']);
			$sheet->setCellValue('G' . $rowNumber, $row['home']);
			$sheet->setCellValue('H' . $rowNumber, $row['office']);
			$sheet->setCellValue('I' . $rowNumber, $row['mobile']);
			$sheet->setCellValue('J' . $rowNumber, $row['cp_name']);
			$sheet->setCellValue('K' . $rowNumber, $row['cp_phone']);
			$sheet->setCellValue('L' . $rowNumber, $row['dm_name']);
			$sheet->setCellValue('M' . $rowNumber, $row['dm_phone']);
			$sheet->setCellValue('N' . $rowNumber, $row['tipe_kendaraan']);
			$sheet->setCellValue('O' . $rowNumber, $row['tgl_service'] && $row['tgl_service'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_service'])) : '');
			$sheet->setCellValue('P' . $rowNumber, $row['tgl_selesai'] && $row['tgl_selesai'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_selesai'])) : '');
			$sheet->setCellValue('Q' . $rowNumber, $row['tahun_kendaraan']);
			$sheet->setCellValue('R' . $rowNumber, $row['km_kendaraan']);
			$sheet->setCellValue('S' . $rowNumber, $row['tgl_delivery'] && $row['tgl_delivery'] != '0000-00-00' ? date('d/m/Y', strtotime($row['tgl_delivery'])) : '');
			$sheet->setCellValue('T' . $rowNumber, $row['customer_receive_car'] && $row['customer_receive_car'] != '0000-00-00' ? date('d/m/Y', strtotime($row['customer_receive_car'])) : '');
			$sheet->setCellValue('U' . $rowNumber, $row['job_type']);
			$sheet->setCellValue('V' . $rowNumber, $row['kode_dept']);
			$sheet->setCellValue('W' . $rowNumber, $row['upload_date'] && $row['upload_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['upload_date'])) : '');
			$sheet->setCellValue('X' . $rowNumber, $row['import_date'] && $row['import_date'] != '0000-00-00' ? date('d/m/Y', strtotime($row['import_date'])) : '');
			
			$rowNumber++;
		}
		
		// Auto-size columns
		foreach (range('A', 'X') as $col) {
			$sheet->getColumnDimension($col)->setAutoSize(true);
		}
		
		// Set headers for download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');
		
		// Save to php output
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
		break;

	case 'load-customer-filter-counts':
		Event::trigger('customer/load-customer-filter-counts/');
		$params = $_REQUEST;

		        // Build base selection that picks the latest row per equipment_no (same logic used by datatable queries)
        $baseSqlCommon = "
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
        ";
        $baseSqlActive = $baseSqlCommon . " AND a.tgl_service >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)";
        $baseSqlNonAct = $baseSqlCommon . " AND a.tgl_service <= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)";

        // Unified base that includes both Active and Non-Active customers
        $baseSql = "
            FROM (
                SELECT a.* $baseSqlActive
                UNION ALL
                SELECT a.* $baseSqlNonAct
            ) AS a
            WHERE 1=1
        ";

		// Common year filters
		$uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
		$uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
		$syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
		$syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;

		$fltCommon = '';
		if ($uyFrom && $uyTo) {
			if ($uyTo < $uyFrom) { $tmp = $uyFrom; $uyFrom = $uyTo; $uyTo = $tmp; }
			$fltCommon .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo";
		} elseif ($uyFrom) {
			$fltCommon .= " AND a.tahun_kendaraan >= $uyFrom";
		} elseif ($uyTo) {
			$fltCommon .= " AND a.tahun_kendaraan <= $uyTo";
		}
		if ($syFrom && $syTo) {
			if ($syTo < $syFrom) { $tmp = $syFrom; $syFrom = $syTo; $syTo = $tmp; }
			$fltCommon .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo";
		} elseif ($syFrom) {
			$fltCommon .= " AND YEAR(a.tgl_service) >= $syFrom";
		} elseif ($syTo) {
			$fltCommon .= " AND YEAR(a.tgl_service) <= $syTo";
		}

		// Selected filters (AND across all widgets)
        $kategoriMulti = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
        $merekMulti    = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
        $cabangMulti   = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
        $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';

        // Normalize 'Semua' tokens and local labels so they don't act as filters
        $stripAllTokens = function(array $parts){
            $bad = ['semua','semua merek','semua kategori','semua cabang','semua lengkap','semua kelengkapan','all'];
            $out = [];
            foreach ($parts as $v) {
                $vv = trim((string)$v);
                if ($vv === '') continue;
                $lc = mb_strtolower($vv);
                if (in_array($lc, $bad, true)) continue;
                $out[] = $vv;
            }
            return $out;
        };
        if ($kategoriMulti !== '') {
            $p = array_map('trim', explode(',', $kategoriMulti));
            $p = $stripAllTokens($p);
            $kategoriMulti = implode(',', $p);
        }
        if ($merekMulti !== '') {
            $p = array_map('trim', explode(',', $merekMulti));
            $p = $stripAllTokens($p);
            $merekMulti = implode(',', $p);
        }
        if ($cabangMulti !== '') {
            $p = array_map('trim', explode(',', $cabangMulti));
            $p = $stripAllTokens($p);
            $cabangMulti = implode(',', $p);
        }
        if ($completeMulti !== '') {
            $p = array_map('trim', explode(',', $completeMulti));
            // map localized labels
            $mapped = [];
            foreach ($p as $v) {
                $vv = trim($v);
                if ($vv === '') continue;
                $lc = mb_strtolower($vv);
                if (in_array($lc, ['semua','semua lengkap','semua kelengkapan','all'], true)) continue;
                if ($lc === 'lengkap') { $mapped[] = 'complete'; continue; }
                if ($lc === 'tidak lengkap' || $lc === 'tidak_lengkap') { $mapped[] = 'incomplete'; continue; }
                $mapped[] = $vv;
            }
            $completeMulti = implode(',', $mapped);
        }

        // Helper builders for each filter component
        $buildKategoriClause = function($csv) use ($conn) {
            if ($csv === '') return '';
            $parts = array_filter(array_map('trim', explode(',', $csv)), function($v){ return $v !== ''; });
            if (empty($parts)) return '';
            $special = false; $norm = [];
            foreach ($parts as $p) { if (strcasecmp($p, 'Tidak Terkategori') === 0) { $special = true; } else { $norm[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; } }
            $cc = [];
            if (!empty($norm)) { $in = implode(',', $norm); $cc[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))'; }
            if ($special) { $cc[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))"; }
            return !empty($cc) ? ' AND (' . implode(' OR ', $cc) . ')' : '';
        };
        $buildMerekClause = function($csv) use ($conn) {
            if ($csv === '') return '';
            $parts = array_filter(array_map('trim', explode(',', $csv)), function($v){ return $v !== ''; });
            if (empty($parts)) return '';
            $in = [];
            foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
            return ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))';
        };
        $buildCabangClause = function($csv) use ($conn) {
            if ($csv === '') return '';
            $parts = array_filter(array_map('trim', explode(',', $csv)), function($v){ return $v !== ''; });
            if (empty($parts)) return '';
            $in = [];
            foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
            return ' AND TRIM(a.kode_dept) IN (' . implode(',', $in) . ')';
        };
        $buildCompleteClause = function($csv) {
            if ($csv === '') return '';
            $parts = array_filter(array_map('trim', explode(',', $csv)), function($v){ return $v !== ''; });
            if (empty($parts)) return '';
            $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))";
            $clause = [];
            foreach ($parts as $p) { if (strcasecmp($p, 'complete') === 0) { $clause[] = $cond; } if (strcasecmp($p, 'incomplete') === 0) { $clause[] = '(NOT ' . $cond . ')'; } }
            return !empty($clause) ? ' AND (' . implode(' OR ', $clause) . ')' : '';
        };

        // Filters per widget
        $fltExceptKategori   = $fltCommon . $buildMerekClause($merekMulti) . $buildCabangClause($cabangMulti) . $buildCompleteClause($completeMulti);
        $fltExceptMerek      = $fltCommon . $buildKategoriClause($kategoriMulti) . $buildCabangClause($cabangMulti) . $buildCompleteClause($completeMulti);
        $fltExceptCabang     = $fltCommon . $buildKategoriClause($kategoriMulti) . $buildMerekClause($merekMulti) . $buildCompleteClause($completeMulti);
        $fltForCompleteness  = $fltCommon . $buildKategoriClause($kategoriMulti) . $buildMerekClause($merekMulti) . $buildCabangClause($cabangMulti);
        $fltTotal            = $fltForCompleteness; // grand total excludes completeness only

        // Query kategori counts with 'Tidak Terkategori' bucket, honoring merek + cabang + completeness + years (ignore kategori selections)
        $sqlKat = "SELECT 
            COALESCE(tmap.kategori, 'Tidak Terkategori') AS kategori,
            COUNT(*) AS n
        FROM (SELECT a.tipe_kendaraan, a.kode_dept, a.home, a.office, a.mobile, a.cp_phone, a.dm_phone $baseSql";
        if ($fltExceptKategori !== '') { $sqlKat .= $fltExceptKategori; }
        $sqlKat .= ") AS x
        LEFT JOIN (
            SELECT k, MIN(kategori) AS kategori, MIN(merek) AS merek FROM (
                SELECT tr.k, tr.kategori, tr.merek, tr.prio FROM (
                    SELECT kategori, merek, kategori AS k, 1 AS prio FROM daftar_tipe_kendaraan
                    UNION ALL
                    SELECT kategori, merek, nama_tipe_mobil AS k, 2 AS prio FROM daftar_tipe_kendaraan
                ) AS tr
                INNER JOIN (
                    SELECT k, MIN(prio) AS prio FROM (
                        SELECT kategori AS k, 1 AS prio FROM daftar_tipe_kendaraan
                        UNION ALL
                        SELECT nama_tipe_mobil AS k, 2 AS prio FROM daftar_tipe_kendaraan
                    ) t2 GROUP BY k
                ) pick ON pick.k = tr.k AND pick.prio = tr.prio
            ) chosen
            GROUP BY k
        ) AS tmap ON tmap.k = x.tipe_kendaraan
        GROUP BY COALESCE(tmap.kategori, 'Tidak Terkategori')";
        $qKat = mysqli_query($conn, $sqlKat) or die('database error: '. mysqli_error($conn));
        $kategori = [];
        while ($r = mysqli_fetch_assoc($qKat)) {
            $kategori[$r['kategori'] ?? ''] = (int)$r['n'];
        }

        // Query merek counts
        $sqlMrk = "SELECT 
            COALESCE(tmap.merek, 'Tidak Terkategori') AS merek, 
            COUNT(*) AS n 
        FROM (SELECT a.tipe_kendaraan, a.kode_dept, a.home, a.office, a.mobile, a.cp_phone, a.dm_phone $baseSql";
        if ($fltExceptMerek !== '') { $sqlMrk .= $fltExceptMerek; }
        $sqlMrk .= ") AS x 
        LEFT JOIN (
            SELECT k, MIN(kategori) AS kategori, MIN(merek) AS merek FROM (
                SELECT tr.k, tr.kategori, tr.merek, tr.prio FROM (
                    SELECT kategori, merek, kategori AS k, 1 AS prio FROM daftar_tipe_kendaraan
                    UNION ALL
                    SELECT kategori, merek, nama_tipe_mobil AS k, 2 AS prio FROM daftar_tipe_kendaraan
                ) AS tr
                INNER JOIN (
                    SELECT k, MIN(prio) AS prio FROM (
                        SELECT kategori AS k, 1 AS prio FROM daftar_tipe_kendaraan
                        UNION ALL
                        SELECT nama_tipe_mobil AS k, 2 AS prio FROM daftar_tipe_kendaraan
                    ) t2 GROUP BY k
                ) pick ON pick.k = tr.k AND pick.prio = tr.prio
            ) chosen
            GROUP BY k
        ) AS tmap ON tmap.k = x.tipe_kendaraan 
        GROUP BY COALESCE(tmap.merek, 'Tidak Terkategori')";
        $qMrk = mysqli_query($conn, $sqlMrk) or die('database error: '. mysqli_error($conn));
        $merek = [];
        while ($r = mysqli_fetch_assoc($qMrk)) {
            $merek[$r['merek'] ?? ''] = (int)$r['n'];
        }

        // Cabang counts
        $sqlCab = "SELECT COALESCE(a.kode_dept, '-') AS cabang, COUNT(*) AS n FROM (SELECT a.kode_dept, a.tipe_kendaraan, a.home, a.office, a.mobile, a.cp_phone, a.dm_phone $baseSql";
        if ($fltExceptCabang !== '') { $sqlCab .= $fltExceptCabang; }
        $sqlCab .= ") AS a GROUP BY COALESCE(a.kode_dept, '-')";
        $qCab = mysqli_query($conn, $sqlCab) or die('database error: '. mysqli_error($conn));
        $cabang = [];
        while ($r = mysqli_fetch_assoc($qCab)) { $cabang[$r['cabang']] = (int)$r['n']; }

        // Completeness counts using distinct unit key to avoid duplicates
        $condComp = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))";
        $sqlComp = "SELECT CASE WHEN t.has_contact = 1 THEN 'complete' ELSE 'incomplete' END AS cstat, COUNT(*) AS n
                    FROM (
                        SELECT DISTINCT COALESCE(NULLIF(TRIM(a.equipment_no), ''), CONCAT('ID:', a.id)) AS ukey,
                                CASE WHEN $condComp THEN 1 ELSE 0 END AS has_contact
                        FROM (SELECT a.id, a.equipment_no, a.kode_dept, a.home, a.office, a.mobile, a.cp_phone, a.dm_phone, a.tipe_kendaraan $baseSql";
        if ($fltForCompleteness !== '') { $sqlComp .= $fltForCompleteness; }
        $sqlComp .= ") a
                    ) t
                    GROUP BY cstat";
        $qComp = mysqli_query($conn, $sqlComp) or die('database error: '. mysqli_error($conn));
        $complete = [];
        while ($r = mysqli_fetch_assoc($qComp)) { $complete[$r['cstat']] = (int)$r['n']; }
        $complete['all'] = (int)(($complete['complete'] ?? 0) + ($complete['incomplete'] ?? 0));

        // Compute unified total from the same base + filters using distinct unit key
        $sqlTotal = "SELECT COUNT(*) AS n FROM (
                        SELECT DISTINCT COALESCE(NULLIF(TRIM(a.equipment_no), ''), CONCAT('ID:', a.id)) AS ukey
                        $baseSql";
        if ($fltTotal !== '') { $sqlTotal .= $fltTotal; }
        $sqlTotal .= ") t";
        $qTot = mysqli_query($conn, $sqlTotal) or die('database error: '. mysqli_error($conn));
        $rowTot = mysqli_fetch_assoc($qTot);
        $grandTotal = (int)($rowTot['n'] ?? 0);

        // Use the unified total (exclude completeness) for all widget 'Semua' totals
        $totalKategori = $grandTotal;
        $totalMerek = $grandTotal;
        $totalCabang = $grandTotal;

        if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
        echo json_encode([ 'kategori' => $kategori, 'merek' => $merek, 'cabang' => $cabang, 'complete' => $complete, 'total_kategori' => $totalKategori, 'total_merek' => $totalMerek, 'total_cabang' => $totalCabang ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;

	case 'load-nonactive-customer':
		Event::trigger('customer/load-nonactive-customer/');
		$columns = array('a.id', 'a.customer_name','a.kode_dept', 'a.equipment_no', 'a.mobile', 'a.tipe_kendaraan', 'a.tahun_kendaraan', 'a.km_kendaraan');
		$whereArr = array('a.customer_name', 'a.kode_dept', 'a.equipment_no', 'a.mobile', 'a.tipe_kendaraan', 'a.tahun_kendaraan', 'a.km_kendaraan');
		$sql = "
			SELECT a.id, a.customer_name, a.kode_dept, a.equipment_no, a.mobile, a.tipe_kendaraan, a.tahun_kendaraan, a.km_kendaraan
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
            AND (
                a.tgl_service IS NULL
                OR a.tgl_service = '0000-00-00'
                OR a.tgl_service <= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)
            )
        ";

        // Optional filters from request
        $params = $_REQUEST;
        $flt = '';
        // Multiple kategori support via CSV `tipe_kendaraan_multi`; fallback to single `tipe_kendaraan`
        $multi = isset($params['tipe_kendaraan_multi']) ? trim((string)$params['tipe_kendaraan_multi']) : '';
        if ($multi !== '') {
            $parts = array_filter(array_map('trim', explode(',', $multi)), function($v){ return $v !== ''; });
            if (!empty($parts)) {
                $special = false;
                $norm = [];
                foreach ($parts as $p) {
                    if (strcasecmp($p, 'Tidak Terkategori') === 0) { $special = true; continue; }
                    $norm[] = "'" . mysqli_real_escape_string($conn, $p) . "'";
                }
                $clause = [];
                if (!empty($norm)) { $in = implode(',', $norm); $clause[] = '(a.tipe_kendaraan IN (' . $in . ') OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE kategori IN (' . $in . ')))'; }
                if ($special) { $clause[] = "(a.tipe_kendaraan IS NULL OR a.tipe_kendaraan = '' OR (a.tipe_kendaraan NOT IN (SELECT kategori FROM daftar_tipe_kendaraan) AND a.tipe_kendaraan NOT IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan)))"; }
                if (!empty($clause)) { $flt .= ' AND (' . implode(' OR ', $clause) . ')'; }
            }
        } else if (!empty($params['tipe_kendaraan'])) {
            $tipe = mysqli_real_escape_string($conn, trim($params['tipe_kendaraan']));
            $flt .= " AND (a.tipe_kendaraan = '$tipe' OR EXISTS (SELECT 1 FROM daftar_tipe_kendaraan t WHERE t.nama_tipe_mobil = a.tipe_kendaraan AND t.kategori = '$tipe'))";
        }

        // Cabang filter (kode_dept) — apply for non-active table
        $cabangMulti = isset($params['cabang_multi']) ? trim((string)$params['cabang_multi']) : '';
        if ($cabangMulti !== '') {
            $parts = array_filter(
                array_map('trim', explode(',', $cabangMulti)),
                function($v){ return $v !== '' && strcasecmp($v, 'Semua') !== 0 && strcasecmp($v, 'Semua Cabang') !== 0; }
            );
            if (!empty($parts)) {
                $in = [];
                foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; }
                $flt .= ' AND a.kode_dept IN (' . implode(',', $in) . ')';
            }
        }

        // Filter by Merek (map via master: a.tipe_kendaraan IN (SELECT kategori ...))
        $merekMulti = isset($params['merek_multi']) ? trim((string)$params['merek_multi']) : '';
        if ($merekMulti !== '') {
            $parts = array_filter(array_map('trim', explode(',', $merekMulti)), function($v){ return $v !== ''; });
            if (!empty($parts)) { $in = []; foreach ($parts as $p) { $in[] = "'" . mysqli_real_escape_string($conn, $p) . "'"; } $flt .= ' AND (a.tipe_kendaraan IN (SELECT kategori FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')) OR a.tipe_kendaraan IN (SELECT nama_tipe_mobil FROM daftar_tipe_kendaraan WHERE merek IN (' . implode(',', $in) . ')))'; }
        }

        // Completeness filter (any of phone fields is present and not '0')
        $completeMulti = isset($params['complete_multi']) ? trim((string)$params['complete_multi']) : '';
        if ($completeMulti !== '') {
            $parts = array_filter(array_map('trim', explode(',', $completeMulti)), function($v){ return $v !== ''; });
            if (!empty($parts)) {
                $cond = "((a.home IS NOT NULL AND a.home <> '' AND a.home <> '0') OR (a.office IS NOT NULL AND a.office <> '' AND a.office <> '0') OR (a.mobile IS NOT NULL AND a.mobile <> '' AND a.mobile <> '0') OR (a.cp_phone IS NOT NULL AND a.cp_phone <> '' AND a.cp_phone <> '0') OR (a.dm_phone IS NOT NULL AND a.dm_phone <> '' AND a.dm_phone <> '0'))";
                $clause = [];
                foreach ($parts as $p) {
                    if (strcasecmp($p, 'complete') === 0) { $clause[] = $cond; }
                    if (strcasecmp($p, 'incomplete') === 0) { $clause[] = '(NOT ' . $cond . ')'; }
                }
                if (!empty($clause)) { $flt .= ' AND (' . implode(' OR ', $clause) . ')'; }
            }
        }

        // Unit Year range: unit_year_from, unit_year_to (integer year)
        $uyFrom = isset($params['unit_year_from']) ? (int)$params['unit_year_from'] : 0;
        $uyTo   = isset($params['unit_year_to']) ? (int)$params['unit_year_to'] : 0;
        if ($uyFrom && $uyTo) {
            if ($uyTo < $uyFrom) { $tmp = $uyFrom; $uyFrom = $uyTo; $uyTo = $tmp; }
            $flt .= " AND a.tahun_kendaraan BETWEEN $uyFrom AND $uyTo";
        } elseif ($uyFrom) {
            $flt .= " AND a.tahun_kendaraan >= $uyFrom";
        } elseif ($uyTo) {
            $flt .= " AND a.tahun_kendaraan <= $uyTo";
        }

        // Service Year range: service_year_from, service_year_to (integer year)
        $syFrom = isset($params['service_year_from']) ? (int)$params['service_year_from'] : 0;
        $syTo   = isset($params['service_year_to']) ? (int)$params['service_year_to'] : 0;
        if ($syFrom && $syTo) {
            if ($syTo < $syFrom) { $tmp = $syFrom; $syFrom = $syTo; $syTo = $tmp; }
            $flt .= " AND YEAR(a.tgl_service) BETWEEN $syFrom AND $syTo";
        } elseif ($syFrom) {
            $flt .= " AND YEAR(a.tgl_service) >= $syFrom";
        } elseif ($syTo) {
            $flt .= " AND YEAR(a.tgl_service) <= $syTo";
        }

        if ($flt !== '') { $sql .= $flt; }
        $show = array(
            '[[index]]',
            '[customer_name]',
            '[kode_dept]',
            '[equipment_no]',
            '[mobile]',
            '[tipe_kendaraan]',
            '[tahun_kendaraan]',
            '[km_kendaraan]',
            '<div class="text-right">
                <a href="[url]customer/detail/[id]/" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-book"></i></a>
            </div>'
        );
        loadTableFixed($conn, $columns, $sql, $whereArr, $show);
        break;

    case 'export-active-filtered':
        Event::trigger('customer/export-active-filtered/');
        _auth1('SHOW-MASTERDATA-CUSTOMER', $user['id']);
        while (ob_get_level() > 0) { ob_end_clean(); }
        $date = new DateTime();
        $filename = 'Active-Customers-' . $date->format('mY') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $headers = ['id','customer_name','alamat','nama_sa','equipment_no','no_polisi','home','office','mobile','cp_name','cp_phone','dm_name','dm_phone','tipe_kendaraan','tgl_service','tgl_selesai','tahun_kendaraan','km_kendaraan','tgl_delivery','customer_receive_car','job_type','kode_dept','upload_date','import_date'];
        $sheet->fromArray($headers, NULL, 'A1');
        $sheet->getStyle('A1:X1')->getFont()->setBold(true);
        $sheet->getStyle('A1:X1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');
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
        $result = mysqli_query($conn, $sql) or die('Query Error: '.mysqli_error($conn));
        $rowNumber = 2;
        while ($row = mysqli_fetch_assoc($result)) {
            $sheet->setCellValue('A'.$rowNumber, $row['id']);
            $sheet->setCellValue('B'.$rowNumber, $row['customer_name']);
            $sheet->setCellValue('C'.$rowNumber, $row['alamat']);
            $sheet->setCellValue('D'.$rowNumber, $row['nama_sa']);
            $sheet->setCellValue('E'.$rowNumber, $row['equipment_no']);
            $sheet->setCellValue('F'.$rowNumber, $row['no_polisi']);
            $sheet->setCellValue('G'.$rowNumber, $row['home']);
            $sheet->setCellValue('H'.$rowNumber, $row['office']);
            $sheet->setCellValue('I'.$rowNumber, $row['mobile']);
            $sheet->setCellValue('J'.$rowNumber, $row['cp_name']);
            $sheet->setCellValue('K'.$rowNumber, $row['cp_phone']);
            $sheet->setCellValue('L'.$rowNumber, $row['dm_name']);
            $sheet->setCellValue('M'.$rowNumber, $row['dm_phone']);
            $sheet->setCellValue('N'.$rowNumber, $row['tipe_kendaraan']);
            $sheet->setCellValue('O'.$rowNumber, ($row['tgl_service'] && $row['tgl_service']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_service'])):'');
            $sheet->setCellValue('P'.$rowNumber, ($row['tgl_selesai'] && $row['tgl_selesai']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_selesai'])):'');
            $sheet->setCellValue('Q'.$rowNumber, $row['tahun_kendaraan']);
            $sheet->setCellValue('R'.$rowNumber, $row['km_kendaraan']);
            $sheet->setCellValue('S'.$rowNumber, ($row['tgl_delivery'] && $row['tgl_delivery']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_delivery'])):'');
            $sheet->setCellValue('T'.$rowNumber, ($row['customer_receive_car'] && $row['customer_receive_car']!='0000-00-00')?date('d/m/Y',strtotime($row['customer_receive_car'])):'');
            $sheet->setCellValue('U'.$rowNumber, $row['job_type']);
            $sheet->setCellValue('V'.$rowNumber, $row['kode_dept']);
            $sheet->setCellValue('W'.$rowNumber, ($row['upload_date'] && $row['upload_date']!='0000-00-00')?date('d/m/Y',strtotime($row['upload_date'])):'');
            $sheet->setCellValue('X'.$rowNumber, ($row['import_date'] && $row['import_date']!='0000-00-00')?date('d/m/Y',strtotime($row['import_date'])):'');
            $rowNumber++;
        }
        foreach (range('A','X') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }
        if (!headers_sent()) {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
        break;
    
    case 'export-nonactive-filtered':
        Event::trigger('customer/export-nonactive-filtered/');
        while (ob_get_level() > 0) { ob_end_clean(); }
        $date = new DateTime();
        $filename = 'Non-Active-Customers-' . $date->format('mY') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $headers = ['id','customer_name','alamat','nama_sa','equipment_no','no_polisi','home','office','mobile','cp_name','cp_phone','dm_name','dm_phone','tipe_kendaraan','tgl_service','tgl_selesai','tahun_kendaraan','km_kendaraan','tgl_delivery','customer_receive_car','job_type','kode_dept','upload_date','import_date'];
        $sheet->fromArray($headers, NULL, 'A1');
        $sheet->getStyle('A1:X1')->getFont()->setBold(true);
        $sheet->getStyle('A1:X1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD9D9D9');
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
        $rowNumber = 2;
        while ($row = mysqli_fetch_assoc($result)) {
            $sheet->setCellValue('A'.$rowNumber, $row['id']);
            $sheet->setCellValue('B'.$rowNumber, $row['customer_name']);
            $sheet->setCellValue('C'.$rowNumber, $row['alamat']);
            $sheet->setCellValue('D'.$rowNumber, $row['nama_sa']);
            $sheet->setCellValue('E'.$rowNumber, $row['equipment_no']);
            $sheet->setCellValue('F'.$rowNumber, $row['no_polisi']);
            $sheet->setCellValue('G'.$rowNumber, $row['home']);
            $sheet->setCellValue('H'.$rowNumber, $row['office']);
            $sheet->setCellValue('I'.$rowNumber, $row['mobile']);
            $sheet->setCellValue('J'.$rowNumber, $row['cp_name']);
            $sheet->setCellValue('K'.$rowNumber, $row['cp_phone']);
            $sheet->setCellValue('L'.$rowNumber, $row['dm_name']);
            $sheet->setCellValue('M'.$rowNumber, $row['dm_phone']);
            $sheet->setCellValue('N'.$rowNumber, $row['tipe_kendaraan']);
            $sheet->setCellValue('O'.$rowNumber, ($row['tgl_service'] && $row['tgl_service']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_service'])):'');
            $sheet->setCellValue('P'.$rowNumber, ($row['tgl_selesai'] && $row['tgl_selesai']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_selesai'])):'');
            $sheet->setCellValue('Q'.$rowNumber, $row['tahun_kendaraan']);
            $sheet->setCellValue('R'.$rowNumber, $row['km_kendaraan']);
            $sheet->setCellValue('S'.$rowNumber, ($row['tgl_delivery'] && $row['tgl_delivery']!='0000-00-00')?date('d/m/Y',strtotime($row['tgl_delivery'])):'');
            $sheet->setCellValue('T'.$rowNumber, ($row['customer_receive_car'] && $row['customer_receive_car']!='0000-00-00')?date('d/m/Y',strtotime($row['customer_receive_car'])):'');
            $sheet->setCellValue('U'.$rowNumber, $row['job_type']);
            $sheet->setCellValue('V'.$rowNumber, $row['kode_dept']);
            $sheet->setCellValue('W'.$rowNumber, ($row['upload_date'] && $row['upload_date']!='0000-00-00')?date('d/m/Y',strtotime($row['upload_date'])):'');
            $sheet->setCellValue('X'.$rowNumber, ($row['import_date'] && $row['import_date']!='0000-00-00')?date('d/m/Y',strtotime($row['import_date'])):'');
            $rowNumber++;
        }
        foreach (range('A','X') as $col) { $sheet->getColumnDimension($col)->setAutoSize(true); }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
        break;
	case 'load-service-history':
		Event::trigger('customer/load-service-history/');
		$params   = $_REQUEST;
		$equipRaw = isset($params['equipment_no']) ? trim($params['equipment_no']) : '';
		$equip    = mysqli_real_escape_string($conn, $equipRaw);
		$rows     = [];

		if ($equip !== '') {
			$sql = "
				SELECT 
					id,
					tgl_service,
					job_type,
					kode_dept AS cabang,
					nama_sa,
					tgl_selesai,
					km_kendaraan,
					tgl_delivery,
					customer_receive_car
				FROM cmportal_service
				WHERE equipment_no = '$equip'
				ORDER BY 
					CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN 1 ELSE 0 END,
					tgl_service DESC,
					id DESC
			";
			$q = @mysqli_query($conn, $sql);
			if ($q === false) {
				// Fallback to daftar_customer if cmportal_service or some columns are unavailable
				$sql = "
					SELECT 
						id,
						tgl_service,
						job_type,
						kode_dept AS cabang,
						nama_sa,
						tgl_selesai,
						km_kendaraan,
						tgl_delivery,
						customer_receive_car
					FROM daftar_customer
					WHERE equipment_no = '$equip'
					ORDER BY 
						CASE WHEN tgl_service IS NULL OR tgl_service = '0000-00-00' THEN 1 ELSE 0 END,
						tgl_service DESC,
						id DESC
				";
				$q = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
			}

			while ($r = mysqli_fetch_assoc($q)) {
				$rows[] = [
					'',
					$r['tgl_service'] ?? null,
					$r['job_type'] ?? '',
					$r['cabang'] ?? '',
					$r['nama_sa'] ?? '',
					$r['tgl_selesai'] ?? null,
					$r['km_kendaraan'] ?? null,
					$r['tgl_delivery'] ?? null,
					$r['customer_receive_car'] ?? null,
				];
			}
		}

		if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
		echo json_encode([ 'data' => $rows ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		exit;

	case 'load-cabang':
		Event::trigger('cabang/load-cabang/');

		$showDetail = _auth2('SHOW-MASTERDATA-CABANG', $user['id']);
		$showEdit   = _auth2('UPDATE-MASTERDATA-CABANG', $user['id']);
		$showDelete = _auth2('DELETE-MASTERDATA-CABANG', $user['id']);

		$actions = '';
		if ($showDetail) $actions .= '<a href="[url]cabang/detail/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>    ';
		if ($showEdit) $actions .= '<a href="[url]cabang/edit/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>    ';
		if ($showDelete) $actions .= '<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Hapus</a>    ';

		$columns = array('id', 'branch_name', 'work_location');
		$whereArr = array('branch_name', 'work_location');
		$sql = "SELECT id, branch_name, work_location FROM daftar_cabang";
		$show = array(
			'[[index]]',
			'[branch_name]',
			'[work_location]',
			"<div class='text-right'>$actions</div>"
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-cabang-bengkel':
		Event::trigger('produktivitas-bengkel/load-cabang-bengkel/');

		$showDetail = _auth2('SHOW-PRODUKTIVITAS-BENGKEL', $user['id']);
		$showEdit   = _auth2('EDIT-PRODUKTIVITAS-BENGKEL', $user['id']);
		$showDelete = _auth2('DELETE-PRODUKTIVITAS-BENGKEL', $user['id']);

		$actions = '';
		if ($showDetail) $actions .= ' <a href="[url]produktivitas-bengkel/detail/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>';
		if ($showEdit) $actions .= ' <a href="[url]produktivitas-bengkel/edit/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>';
		if ($showDelete) $actions .= ' <a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Hapus</a>';

		$columns = array('id', 'branch_name', 'work_location');
		$whereArr = array('branch_name', 'work_location');
		$sql = "SELECT daftar_cabang_bengkel.id AS id, branch_name, work_location FROM daftar_cabang_bengkel INNER JOIN daftar_cabang ON daftar_cabang.id = daftar_cabang_bengkel.cabang_id";
		$show = array(
			'[[index]]',
			'[branch_name]',
			'[work_location]',
			"<div class='text-right'>$actions</div>"
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-grafik-unit-entry-semua':
		Event::trigger('produktivitas-bengkel/load-grafik-unit-entry-semua/');

		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];
		$isUdt  = $params['category'] === 'udt' ? '1' : '0';

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					b.branch_name AS cabang,
					COALESCE(c.unit_entry, 0) AS unit_entry
				FROM daftar_cabang_bengkel AS a
				CROSS JOIN ($unions) AS nums
				INNER JOIN daftar_cabang AS b ON b.id = a.cabang_id
				LEFT JOIN produktivitas_bengkel_unit_entry AS c ON c.cabang_bengkel_id = a.id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				WHERE a.is_udt = $isUdt
				ORDER BY cabang, periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					b.branch_name AS cabang,
					COALESCE((
						SELECT SUM(c.unit_entry)
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = a.id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS unit_entry
				FROM daftar_cabang_bengkel AS a
				CROSS JOIN ($unions) AS nums
				INNER JOIN daftar_cabang AS b ON b.id = a.cabang_id
				WHERE a.is_udt = $isUdt
				ORDER BY cabang, periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$data   = [];
		$avg    = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;

			if (!$data[$row['cabang']]) $data[$row['cabang']] = [];
			$data[$row['cabang']][] = $row['unit_entry'];

			if (!$avg[$periode]) $avg[$periode] = 0;
			$avg[$periode] += $row['unit_entry'];
		}

		$labels   = array_unique($labels);
		$datasets = [];
		$average  = array_map(function($total) use ($data) {
			return round($total / count($data), 2);
		}, $avg);

		foreach ($data as $key => $value) {
			$datasets[] = [
				'type'  => 'bar',
				'label' => $key,
				'data'  => $value,
			];
		}

		$datasets[] = [
			'type'  => 'line',
			'label' => 'Avg. Unit Entry',
			'data'  => $average,
			'order' => 99,
		];

		loadChart($labels, $datasets);
		break;

	case 'fetch-bengkel':
		Event::trigger('produktivitas-bengkel/fetch-bengkel/');
		$id = $routes[3];
        fetchBengkel($id);
		echo json_encode('');
		break;

	case 'load-bengkel-position':
		Event::trigger('produktivitas-bengkel/load-bengkel-position/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];

		$columns = array('checked', 'id', 'position_id', 'title');
		$whereArr = array('position_id', 'title');
		$sql = "SELECT id, position_id, title, CASE WHEN EXISTS (SELECT 1 FROM produktivitas_bengkel_position WHERE produktivitas_bengkel_position.cabang_bengkel_id = $id AND produktivitas_bengkel_position.posisi = '$type' AND produktivitas_bengkel_position.posisi_id = daftar_posisi.id) THEN 'checked' ELSE '' END AS checked FROM daftar_posisi";
		$show = array(
			'<input type="checkbox" id="position-uid[id]" [checked]>',
			'[[index]]',
			'[position_id]',
			'[title]'
		);

		$showDetail = _auth2('SHOW-MASTERDATA-POSISI', $user['id']);
		if ($showDetail) {
			array_push($show, '
				<div class="text-right">
					<a href="[url]posisi/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
				</div>
			');
		}

		loadTableFixed($conn, $columns, $sql, $whereArr, $show, true);
		break;

	case 'load-bengkel-unitentry':
		Event::trigger('produktivitas-bengkel/load-bengkel-unitentry/');

		$id = (int) $routes[3];

		$columns = array('periode', 'periode', 'target_unit_entry', 'unit_entry', 'target_unit_entry_per_hari', 'kebutuhan_mekanik', 'mekanik_plan', 'mekanik_actual', 'kebutuhan_karu', 'karu_plan', 'karu_actual', 'sa_plan', 'sa_actual', 'human_plan', 'human_actual');
		$whereArr = array('periode', 'target_unit_entry', 'unit_entry', 'target_unit_entry_per_hari', 'kebutuhan_mekanik', 'mekanik_plan', 'mekanik_actual', 'kebutuhan_karu', 'karu_plan', 'karu_actual', 'sa_plan', 'sa_actual', 'human_plan', 'human_actual');
		$sql = "
			SELECT * FROM (
				SELECT
					a.id,
					a.periode,
					a.target_unit_entry,
					a.target_unit_entry_per_hari,
					a.unit_entry,
					a.unit_entry_per_hari,
					a.kebutuhan_mekanik,
					a.mekanik_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'mekanik'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS mekanik_actual,
					a.kebutuhan_karu,
					a.karu_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'karu'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS karu_actual,
					a.kebutuhan_sa,
					a.sa_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'sa'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS sa_actual,
					a.human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						WHERE d.work_location = c.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
							OR
							(d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
						)
						AND (
							(b.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(b.is_udt = 0 AND (d.employee_category = 'BENGKEL' OR d.employee_category = '29'))
						)
					) AS human_actual
				FROM produktivitas_bengkel_unit_entry AS a
				INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
    			INNER JOIN daftar_cabang AS c ON c.id = b.cabang_id
				WHERE a.cabang_bengkel_id = $id
			) AS sub
		";
		$show = array(
			'[[index]]',
			'[periode]',
			'[target_unit_entry]',
			'[target_unit_entry_per_hari]',
			'[unit_entry]',
			'[unit_entry_per_hari]',
			'[kebutuhan_mekanik]',
			'{{kebutuhan_mekanik,mekanik_plan}}',
			'<a id="mekanikunitentry[id]" data-type="mekanik" data-toggle="modal" data-target="#list-employee">{{kebutuhan_mekanik,mekanik_actual}}</a>',
			'[kebutuhan_karu]',
			'{{kebutuhan_karu,karu_plan}}',
			'<a id="karuunitentry[id]" data-type="karu" data-toggle="modal" data-target="#list-employee">{{kebutuhan_karu,karu_actual}}</a>',
			'[kebutuhan_sa]',
			'{{kebutuhan_sa,sa_plan}}',
			'<a id="saunitentry[id]" data-type="sa" data-toggle="modal" data-target="#list-employee">{{kebutuhan_sa,sa_actual}}</a>',
			'[human_plan]',
			'<a id="humanunitentry[id]" data-type="human" data-toggle="modal" data-target="#list-employee">{{human_plan,human_actual}}</a>',
		);

		loadTableFixed($conn, $columns, $sql, $whereArr, $show, true);
		break;

	case 'load-bengkel-unitentry-employee':
		Event::trigger('produktivitas-bengkel/load-bengkel-unitentry-employee/');

		$showDetail = _auth2('SHOW-MASTERDATA-customer', $user['id']);

		$id      = (int) $routes[3];
		$params  = $_REQUEST;
		$periode = $params['periode'];
		$type    = $params['type'];

		$columns = array('a.id', 'a.customer_name', 'a.equipment_no', 'a.position_id', 'c.title', 'a.terminated');
		$whereArr = array('a.customer_name', 'a.equipment_no', 'a.position_id', 'c.title', 'a.terminated');

		if ($type === 'human') {
			$sql = "
				SELECT
					a.id,
					a.customer_name,
					a.equipment_no,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_customer AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN daftar_cabang_bengkel AS c on c.id = $id
				INNER JOIN daftar_cabang AS d ON d.id = c.cabang_id
				WHERE d.work_location = a.work_location
				AND (
					(a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
					OR
					(a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.tahun_kendaraan, '%Y-%m-01'))
				)
				AND (
					(c.is_udt = 1 AND a.position_id LIKE '%UDT%')
					OR
					(c.is_udt = 0 AND (a.employee_category = 'BENGKEL' OR a.employee_category = '29'))
				)
			";
		} else {
			$sql = "
				SELECT
					a.id,
					a.customer_name,
					a.equipment_no,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_customer AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN produktivitas_bengkel_position AS c ON c.cabang_bengkel_id = $id AND c.posisi_id = b.id AND c.posisi = '$type'
				WHERE (a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
				OR (a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.tahun_kendaraan, '%Y-%m-01'))
			";
		}

		$show = array(
			'[[index]]',
			'[customer_name]',
			'[equipment_no]',
			'[position_id]',
			'[title]',
			'[terminated]'
		);

		if ($showDetail) {
			array_push($show, '<div class="text-right">
				<a href="[url]customer/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
			</div>');
		}

		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-grafik-unit-entry-bengkel':
		Event::trigger('produktivitas-bengkel/load-grafik-unit-entry-bengkel/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];
		$avg    = $params['avg'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					COALESCE(c.target_unit_entry, 0) AS target_unit_entry,
					COALESCE(c.unit_entry, 0) AS unit_entry
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_bengkel_unit_entry AS c ON c.cabang_bengkel_id = $id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					COALESCE(SUM(c.target_unit_entry), 0) AS target_unit_entry,
					COALESCE(SUM(c.unit_entry), 0) AS unit_entry
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_bengkel_unit_entry AS c ON c.cabang_bengkel_id = $id
				AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
				GROUP BY periode
				ORDER BY periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$data   = [];
		$target = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;
			$target[] = $row['target_unit_entry'];
			$data[]   = $row['unit_entry'];
		}

		$average = formatAverage($data, $avg);

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Target Unit Entry',
				'data'  => $target,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'Unit Entry',
				'data'  => $data,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Avg. Unit Entry',
				'data'  => $average,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets);
		break;

	case 'load-grafik-kebutuhan-mekanik':
		Event::trigger('produktivitas-bengkel/load-grafik-kebutuhan-mekanik/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];
		$avg    = $params['avg'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					(
						SELECT mekanik_plan
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					) AS mekanik_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'mekanik'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01'))
						OR (d.terminated = 1 AND DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS mekanik_actual,
					COALESCE((
						SELECT a.kebutuhan_mekanik
						FROM produktivitas_bengkel_unit_entry AS a
						INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
						WHERE b.id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS kebutuhan_mekanik
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT ROUND(SUM(mekanik_plan) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS mekanik_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'mekanik'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
						OR (d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.tahun_kendaraan))
					) AS mekanik_actual,
					COALESCE((
						SELECT ROUND(SUM(a.kebutuhan_mekanik) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS a
						INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
						WHERE b.id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS kebutuhan_mekanik
				FROM ($unions) AS nums
				ORDER BY periode
			";
		}

		$query    = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels   = [];
		$plan     = [];
		$actual   = [];
		$manpower = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[]   = $periode;
			$plan[]     = $row['mekanik_plan'];
			$actual[]   = $row['mekanik_actual'];
			$manpower[] = $row['kebutuhan_mekanik'];
		}

		$manpowerAvg = formatAverage($manpower, $avg);

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Mekanik Plan',
				'data'  => $plan,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'Mekanik Actual',
				'data'  => $actual,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Avg. Kebutuhan Manpower',
				'data'  => $manpowerAvg,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets);
		break;

	case 'load-grafik-kebutuhan-karu':
		Event::trigger('produktivitas-bengkel/load-grafik-kebutuhan-karu/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];
		$avg    = $params['avg'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					(
						SELECT karu_plan
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					) AS karu_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'karu'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01'))
						OR (d.terminated = 1 AND DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS karu_actual,
					COALESCE((
						SELECT a.kebutuhan_karu
						FROM produktivitas_bengkel_unit_entry AS a
						INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
						WHERE b.id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS kebutuhan_karu
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT ROUND(SUM(karu_plan) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS karu_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'karu'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
						OR (d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.tahun_kendaraan))
					) AS karu_actual,
					COALESCE((
						SELECT ROUND(SUM(a.kebutuhan_karu) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS a
						INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
						WHERE b.id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS kebutuhan_karu
				FROM ($unions) AS nums
				ORDER BY periode
			";
		}

		$query    = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels   = [];
		$plan     = [];
		$actual   = [];
		$manpower = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[]   = $periode;
			$plan[]     = $row['karu_plan'];
			$actual[]   = $row['karu_actual'];
			$manpower[] = $row['kebutuhan_karu'];
		}

		$manpowerAvg = formatAverage($manpower, $avg);

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Chief Mechanic Plan',
				'data'  => $plan,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'Chief Mechanic Actual',
				'data'  => $actual,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Avg. Kebutuhan Manpower',
				'data'  => $manpowerAvg,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets);
		break;

	case 'load-grafik-kebutuhan-sa':
		Event::trigger('produktivitas-bengkel/load-grafik-kebutuhan-sa/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];
		$avg    = $params['avg'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					(
						SELECT sa_plan
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					) AS sa_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'sa'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01'))
						OR (d.terminated = 1 AND DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS sa_actual,
					COALESCE((
						SELECT a.kebutuhan_sa
						FROM produktivitas_bengkel_unit_entry AS a
						INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
						WHERE b.id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS kebutuhan_sa
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT ROUND(SUM(sa_plan) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS sa_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'sa'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
						OR (d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.tahun_kendaraan))
					) AS sa_actual,
					COALESCE((
						SELECT ROUND(SUM(a.kebutuhan_sa) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS a
						INNER JOIN daftar_cabang_bengkel AS b ON b.id = a.cabang_bengkel_id
						WHERE b.id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS kebutuhan_sa
				FROM ($unions) AS nums
				ORDER BY periode
			";
		}

		$query    = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels   = [];
		$plan     = [];
		$actual   = [];
		$manpower = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[]   = $periode;
			$plan[]     = $row['sa_plan'];
			$actual[]   = $row['sa_actual'];
			$manpower[] = $row['kebutuhan_sa'];
		}

		$manpowerAvg = formatAverage($manpower, $avg);

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Service Advisor Plan',
				'data'  => $plan,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'Service Advisor Actual',
				'data'  => $actual,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Avg. Kebutuhan Manpower',
				'data'  => $manpowerAvg,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets);
		break;

	case 'load-grafik-kebutuhan-human-bengkel':
		Event::trigger('produktivitas-bengkel/load-grafik-kebutuhan-human-bengkel/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					COALESCE(c.human_plan, 0) AS human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_cabang_bengkel AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id
						WHERE d.work_location = f.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= periode)
							OR
							(d.terminated = 1 AND periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'BENGKEL' OR d.employee_category = '29'))
						)
					) AS human_actual,
					COALESCE(c.unit_entry, 0) AS unit_entry
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_bengkel_unit_entry AS c ON c.cabang_bengkel_id = $id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					COALESCE(SUM(c.human_plan) / 12, 0) AS human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_cabang_bengkel AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id AND d.work_location = f.work_location
						WHERE (
							(d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
							OR
							(d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.tahun_kendaraan))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'BENGKEL' OR d.employee_category = '29'))
						)
					) AS human_actual,
					COALESCE(SUM(c.unit_entry), 0) AS unit_entry
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_bengkel_unit_entry AS c ON c.cabang_bengkel_id = $id
				AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
				GROUP BY periode
				ORDER BY periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$plan   = [];
		$actual = [];
		$prod   = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;
			$plan[]   = $row['human_plan'];
			$actual[] = $row['human_actual'];
			$prod[]   = round($row['unit_entry'] / $row['human_actual'], 2);
		}

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'SDM Plan',
				'data'  => $plan,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'SDM Actual',
				'data'  => $actual,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Produktivitas SDM',
				'data'  => $prod,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets);
		break;

	case 'load-cabang-marketing':
		Event::trigger('produktivitas-marketing/load-cabang-marketing/');

		$showDetail = _auth2('SHOW-PRODUKTIVITAS-MARKETING', $user['id']);
		$showEdit   = _auth2('EDIT-PRODUKTIVITAS-MARKETING', $user['id']);
		$showDelete = _auth2('DELETE-PRODUKTIVITAS-MARKETING', $user['id']);

		$actions = '';
		if ($showDetail) $actions .= ' <a href="[url]produktivitas-marketing/detail/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>';
		if ($showEdit) $actions .= ' <a href="[url]produktivitas-marketing/edit/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>';
		if ($showDelete) $actions .= ' <a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Hapus</a>';

		$columns = array('id', 'branch_name', 'work_location');
		$whereArr = array('branch_name', 'work_location');
		$sql = "SELECT daftar_cabang_marketing.id AS id, branch_name, work_location FROM daftar_cabang_marketing INNER JOIN daftar_cabang ON daftar_cabang.id = daftar_cabang_marketing.cabang_id";
		$show = array(
			'[[index]]',
			'[branch_name]',
			'[work_location]',
			"<div class='text-right'>$actions</div>"
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-grafik-penjualan-semua':
		Event::trigger('produktivitas-bengkel/load-grafik-penjualan-semua/');

		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					b.branch_name AS cabang,
					COALESCE(c.productivity, 0) AS productivity
				FROM daftar_cabang_marketing AS a
				CROSS JOIN ($unions) AS nums
				INNER JOIN daftar_cabang AS b ON b.id = a.cabang_id
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = a.id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				ORDER BY cabang, periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					b.branch_name AS cabang,
					COALESCE(SUM(c.productivity), 0) AS productivity
				FROM daftar_cabang_marketing AS a
				CROSS JOIN ($unions) AS nums
				INNER JOIN daftar_cabang AS b ON b.id = a.cabang_id
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = a.id
				AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
				GROUP BY cabang, periode
				ORDER BY cabang, periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$data   = [];
		$avg    = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;

			if (!$data[$row['cabang']]) $data[$row['cabang']] = [];
			$data[$row['cabang']][] = $row['productivity'];

			if (!$avg[$periode]) $avg[$periode] = 0;
			$avg[$periode] += $row['productivity'];
		}

		$labels   = array_unique($labels);
		$datasets = [];
		$average  = array_map(function($total) use ($data) {
			return round($total / count($data), 2);
		}, $avg);

		foreach ($data as $key => $value) {
			$datasets[] = [
				'type'  => 'bar',
				'label' => $key,
				'data'  => $value,
			];
		}

		$datasets[] = [
			'type'  => 'line',
			'label' => 'Avg. Penjualan',
			'data'  => $average,
			'order' => 99,
		];

		loadChart($labels, $datasets);
		break;

	case 'fetch-mitra':
		Event::trigger('produktivitas-marketing/fetch-mitra/');
		$id = $routes[3];
        fetchMitra($id);
		echo json_encode('');
		break;

	case 'fetch-marketing':
		Event::trigger('produktivitas-marketing/fetch-marketing/');
		$id = $routes[3];
        fetchMarketing($id);
		echo json_encode('');
		break;

	case 'load-marketing-position':
		Event::trigger('produktivitas-marketing/load-marketing-position/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		// $type   = $params['type'];

		$columns = array('checked', 'id', 'position_id', 'title');
		$whereArr = array('position_id', 'title');
		$sql = "SELECT id, position_id, title, CASE WHEN EXISTS (SELECT 1 FROM produktivitas_marketing_position WHERE produktivitas_marketing_position.cabang_marketing_id = $id AND produktivitas_marketing_position.posisi_id = daftar_posisi.id) THEN 'checked' ELSE '' END AS checked FROM daftar_posisi";
		$show = array(
			'<input type="checkbox" id="position-uid[id]" [checked]>',
			'[[index]]',
			'[position_id]',
			'[title]'
		);

		$showDetail = _auth2('SHOW-MASTERDATA-POSISI', $user['id']);
		if ($showDetail) {
			array_push($show, '
				<div class="text-right">
					<a href="[url]posisi/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
				</div>
			');
		}

		loadTableFixed($conn, $columns, $sql, $whereArr, $show, true);
		break;

	case 'load-marketing-sales':
		Event::trigger('produktivitas-marketing/load-marketing-sales/');

		$id = (int) $routes[3];

		$columns = array('periode', 'periode', 'target_productivity', 'productivity', 'sales_plan', 'sales_force', 'sales_mitra', 'human_plan', 'human_actual');
		$whereArr = array('periode', 'target_productivity', 'productivity', 'sales_plan', 'sales_force', 'sales_mitra', 'human_plan', 'human_actual');
		$sql = "
			SELECT * FROM (
				SELECT
					a.id,
					a.periode,
					a.target_productivity,
					a.productivity,
					a.sales_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_marketing_position AS f ON f.cabang_marketing_id = $id AND f.posisi_id = e.id AND f.posisi = 'sales'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS sales_force,
					(
						SELECT COUNT(*)
						FROM daftar_mitra AS d
						WHERE d.cabang_marketing_id = $id
						AND (
							(d.tanggal_bergabung IS NULL AND d.tanggal_keluar IS NULL AND d.keterangan = 'Aktif')
							OR
							(d.tanggal_bergabung IS NULL AND a.periode <= DATE_FORMAT(d.tanggal_keluar, '%Y-%m-01'))
							OR
							(a.periode >= DATE_FORMAT(d.tanggal_bergabung, '%Y-%m-01') AND d.tanggal_keluar IS NULL AND d.keterangan = 'Aktif')
							OR
							(a.periode BETWEEN DATE_FORMAT(d.tanggal_bergabung, '%Y-%m-01') AND DATE_FORMAT(d.tanggal_keluar, '%Y-%m-01'))
						)
					) as sales_mitra,
					a.human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						WHERE d.work_location = c.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
							OR
							(d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
						)
						AND (
							(b.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(b.is_udt = 0 AND (d.employee_category = 'CABANG' OR d.employee_category = 'UNIT' OR d.employee_category = '26' OR d.employee_category = '28'))
						)
					) AS human_actual
				FROM produktivitas_marketing_sales AS a
				INNER JOIN daftar_cabang_marketing AS b ON b.id = a.cabang_marketing_id
    			INNER JOIN daftar_cabang AS c ON c.id = b.cabang_id
				WHERE a.cabang_marketing_id = $id
			) AS sub
		";
		$show = array(
			'[[index]]',
			'[periode]',
			'[target_productivity]',
			'[productivity]',
			'[sales_plan]',
			'<a id="salessales[id]" data-type="sales" data-toggle="modal" data-target="#list-employee">{{sales_plan,sales_force}}</a>',
			'<a id="mitrasales[id]" data-type="mitra" data-toggle="modal" data-target="#list-mitra" style="color: #676A6C; text-decoration: underline;">[sales_mitra]</a>',
			'[human_plan]',
			'<a id="humansales[id]" data-type="human" data-toggle="modal" data-target="#list-employee">{{human_plan,human_actual}}</a>',
		);

		loadTableFixed($conn, $columns, $sql, $whereArr, $show, true);
		break;

	case 'load-marketing-selected-position':
		Event::trigger('produktivitas-marketing/load-marketing-selected-position/');

		$id = (int) $routes[3];
		$showDetail = _auth2('SHOW-MASTERDATA-POSISI', $user['id']);

		$columns = array('b.id', 'b.position_id', 'b.title');
		$whereArr = array('b.position_id', 'b.title');
		$sql = "SELECT a.cabang_marketing_id, a.posisi_id, b.id, b.position_id, b.title FROM produktivitas_marketing_position AS a INNER JOIN daftar_posisi AS b ON a.posisi_id = b.id WHERE a.cabang_marketing_id = $id";
		$show = array(
			'[[index]]',
			'[position_id]',
			'[title]'
		);

		if ($showDetail) {
			array_push($show, '
				<div class="text-right">
					<a href="[url]posisi/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
				</div>
			');
		}

		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-marketing-sales-employee':
		Event::trigger('produktivitas-marketing/load-marketing-sales-employee/');

		$showDetail = _auth2('SHOW-MASTERDATA-customer', $user['id']);

		$id      = (int) $routes[3];
		$params  = $_REQUEST;
		$periode = $params['periode'];
		$type    = $params['type'];

		$columns = array('a.id', 'a.customer_name', 'a.equipment_no', 'a.position_id', 'c.title', 'a.terminated');
		$whereArr = array('a.customer_name', 'a.equipment_no', 'a.position_id', 'c.title', 'a.terminated');

		if ($type === 'human') {
			$sql = "
				SELECT
					a.id,
					a.customer_name,
					a.equipment_no,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_customer AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN daftar_cabang_marketing AS c on c.id = $id
				INNER JOIN daftar_cabang AS d ON d.id = c.cabang_id
				WHERE d.work_location = a.work_location
				AND (
					(a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
					OR
					(a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.tahun_kendaraan, '%Y-%m-01'))
				)
				AND (
					(c.is_udt = 1 AND a.position_id LIKE '%UDT%')
					OR
					(c.is_udt = 0 AND (a.employee_category = 'CABANG' OR a.employee_category = 'UNIT' OR a.employee_category = '26' OR a.employee_category = '28'))
				)
			";
		} else {
			$sql = "
				SELECT
					a.id,
					a.customer_name,
					a.equipment_no,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_customer AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN produktivitas_marketing_position AS c ON c.cabang_marketing_id = $id AND c.posisi_id = b.id
				WHERE (a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
				OR (a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.tahun_kendaraan, '%Y-%m-01'))
			";
		}

		$show = array(
			'[[index]]',
			'[customer_name]',
			'[equipment_no]',
			'[position_id]',
			'[title]',
			'[terminated]'
		);

		if ($showDetail) {
			array_push($show, '<div class="text-right">
				<a href="[url]customer/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
			</div>');
		}

		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-marketing-sales-mitra':
		Event::trigger('produktivitas-marketing/load-marketing-sales-mitra/');

		$id      = (int) $routes[3];
		$params  = $_REQUEST;
		$periode = $params['periode'];

		$columns = array('id', 'nama_sales_force', 'tanggal_bergabung', 'tanggal_keluar', 'keterangan');
		$whereArr = array('nama_sales_force', 'tanggal_bergabung', 'tanggal_keluar', 'keterangan');

		$sql = "
			SELECT
				nama_sales_force,
				tanggal_bergabung,
				tanggal_keluar,
				keterangan
			FROM daftar_mitra
			WHERE cabang_marketing_id = $id
			AND (
				(tanggal_bergabung IS NULL AND tanggal_keluar IS NULL AND keterangan = 'Aktif')
				OR
				(tanggal_bergabung IS NULL AND '$periode' <= DATE_FORMAT(tanggal_keluar, '%Y-%m-01'))
				OR
				('$periode' >= DATE_FORMAT(tanggal_bergabung, '%Y-%m-01') AND tanggal_keluar IS NULL AND keterangan = 'Aktif')
				OR
				('$periode' BETWEEN DATE_FORMAT(tanggal_bergabung, '%Y-%m-01') AND DATE_FORMAT(tanggal_keluar, '%Y-%m-01'))
			)
		";

		$show = array(
			'[[index]]',
			'[nama_sales_force]',
			'[tanggal_bergabung]',
			'[tanggal_keluar]',
			'[keterangan]',
		);

		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-grafik-penjualan-marketing':
		Event::trigger('produktivitas-marketing/load-grafik-penjualan-marketing/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];
		$avg    = $params['avg'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					COALESCE(c.target_productivity, 0) AS target_productivity,
					COALESCE(c.productivity, 0) AS productivity
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = $id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					COALESCE(SUM(c.target_productivity), 0) AS target_productivity,
					COALESCE(SUM(c.productivity), 0) AS productivity
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = $id
				AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
				GROUP BY periode
				ORDER BY periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$data   = [];
		$target = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;
			$target[] = $row['target_productivity'];
			$data[]   = $row['productivity'];
		}

		$average = formatAverage($data, $avg);

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Target Penjualan',
				'data'  => $target,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'Penjualan',
				'data'  => $data,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Avg. Penjualan',
				'data'  => $average,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets);
		break;

	case 'load-grafik-kebutuhan-salesman':
		Event::trigger('produktivitas-marketing/load-grafik-kebutuhan-salesman/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					(
						SELECT sales_plan
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					) AS sales_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_marketing_position AS f ON f.cabang_marketing_id = $id AND f.posisi_id = e.id AND f.posisi = 'sales'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= periode)
						OR (d.terminated = 1 AND periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
					) AS sales_force,
					(
						SELECT COUNT(*)
						FROM daftar_mitra AS d
						WHERE d.cabang_marketing_id = $id
						AND (
							(d.tanggal_bergabung IS NULL AND d.tanggal_keluar IS NULL AND d.keterangan = 'Aktif')
							OR
							(d.tanggal_bergabung IS NULL AND periode <= DATE_FORMAT(d.tanggal_keluar, '%Y-%m-01'))
							OR
							(periode >= DATE_FORMAT(d.tanggal_bergabung, '%Y-%m-01') AND d.tanggal_keluar IS NULL AND d.keterangan = 'Aktif')
							OR
							(periode BETWEEN DATE_FORMAT(d.tanggal_bergabung, '%Y-%m-01') AND DATE_FORMAT(d.tanggal_keluar, '%Y-%m-01'))
						)
					) as sales_mitra,
					COALESCE(c.productivity, 0) AS productivity
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = $id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT ROUND(SUM(sales_plan) / 12, 2)
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS sales_plan,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_marketing_position AS f ON f.cabang_marketing_id = $id AND f.posisi_id = e.id AND f.posisi = 'sales'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= periode)
						OR (d.terminated = 1 AND periode BETWEEN YEAR(d.first_join_date) AND YEAR(d.tahun_kendaraan))
					) AS sales_force,
					(
						SELECT COUNT(*)
						FROM daftar_mitra AS d
						WHERE d.cabang_marketing_id = $id
						AND (
							(d.tanggal_bergabung IS NULL AND d.tanggal_keluar IS NULL AND d.keterangan = 'Aktif')
							OR
							(d.tanggal_bergabung IS NULL AND periode <= YEAR(d.tanggal_keluar))
							OR
							(periode >= YEAR(d.tanggal_bergabung) AND d.tanggal_keluar IS NULL AND d.keterangan = 'Aktif')
							OR
							(periode BETWEEN YEAR(d.tanggal_bergabung) AND YEAR(d.tanggal_keluar))
						)
					) as sales_mitra,
					COALESCE(SUM(c.productivity), 0) AS productivity
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = $id
				AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
				GROUP BY periode
				ORDER BY periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$plan   = [];
		$actual = [];
		$mitra  = [];
		$sales  = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;
			$plan[]   = $row['sales_plan'];
			$actual[] = $row['sales_force'];
			$mitra[]  = $row['sales_mitra'];
			$sales[]  = $row['productivity'];
		}

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Sales MPP',
				'data'  => $plan,
				'color' => 'rgba(54, 162, 235, 0.5)',
      			'stack' => 'Stack 0',
			],
			[
				'type'  => 'bar',
				'label' => 'Sales Force',
				'data'  => $actual,
				'color' => 'rgba(0, 98, 204, 0.5)',
      			'stack' => 'Stack 1',
			],
			[
				'type'  => 'bar',
				'label' => 'Sales Mitra',
				'data'  => $mitra,
				'color' => 'rgba(0, 34, 173, 0.5)',
      			'stack' => 'Stack 1',
			],
			[
				'type'  => 'line',
				'label' => 'Penjualan',
				'data'  => $sales,
				'color' => '#007ACC',
				'order' => 99,
			],
		];

		loadChart($labels, $datasets, true);
		break;

	case 'load-grafik-kebutuhan-human-marketing':
		Event::trigger('produktivitas-marketing/load-grafik-kebutuhan-human-marketing/');

		$id     = (int) $routes[3];
		$params = $_REQUEST;
		$type   = $params['type'];
		$from   = $params['from'];
		$to     = $params['to'];

		if ($type === 'month') {
			$fromDate = "$from-01";
			$toDate   = "$to-01";

			if ($toDate < $fromDate) {
				[ $fromDate, $toDate ] = [ $toDate, $fromDate ];
			}

			[ $fromYear, $fromMonth ] = explode('-', $fromDate);
			[ $toYear, $toMonth ]     = explode('-', $toDate);

			$periode = ((int) $toYear - (int) $fromYear) * 12 + (int) $toMonth - (int) $fromMonth;
		} else {
			if ($to < $from) {
				[ $from, $to ] = [ $to, $from ];
			}

			$periode = (int) $to - (int) $from;
		}

		$unionParts = [];
		for ($i = 0; $i <= $periode; $i ++) {
			$unionParts[] = "SELECT $i AS n";
		}
		$unions = implode(" UNION ALL ", $unionParts);

		if ($type === 'month') {
			$sql = "
				SELECT
					DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') AS periode,
					COALESCE(c.human_plan, 0) AS human_mpp,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_cabang_marketing AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id
						WHERE d.work_location = f.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= periode)
							OR
							(d.terminated = 1 AND periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.tahun_kendaraan, '%Y-%m-01'))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'CABANG' OR d.employee_category = 'UNIT' OR d.employee_category = '26' OR d.employee_category = '28'))
						)
					) AS human_actual,
					COALESCE(c.productivity, 0) AS penjualan
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = $id
				AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					COALESCE(SUM(c.human_plan) / 12, 0) AS human_mpp,
					(
						SELECT COUNT(*)
						FROM daftar_customer AS d
						INNER JOIN daftar_cabang_marketing AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id AND d.work_location = f.work_location
						WHERE (
							(d.terminated = 0 AND YEAR(d.first_join_date) <= periode)
							OR
							(d.terminated = 1 AND periode BETWEEN YEAR(d.first_join_date) AND YEAR(d.tahun_kendaraan))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'CABANG' OR d.employee_category = 'UNIT' OR d.employee_category = '26' OR d.employee_category = '28'))
						)
					) AS human_actual,
					COALESCE(SUM(c.productivity), 0) AS penjualan
				FROM ($unions) AS nums
				LEFT JOIN produktivitas_marketing_sales AS c ON c.cabang_marketing_id = $id
				AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
				GROUP BY periode
				ORDER BY periode
			";
		}

		$query  = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels = [];
		$plan   = [];
		$actual = [];
		$prod   = [];
		$prodd  = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[] = $periode;
			$plan[]   = $row['human_mpp'];
			$actual[] = $row['human_actual'];
			$prod[]   = $row['penjualan'];
			$prodd[]  = round($row['penjualan'] / $row['human_actual'], 2);
		}

		$datasets = [
			[
				'type'  => 'bar',
				'label' => 'Human MPP',
				'data'  => $plan,
				'color' => 'rgba(54, 162, 235, 0.5)',
			],
			[
				'type'  => 'bar',
				'label' => 'Human Actual',
				'data'  => $actual,
				'color' => 'rgba(0, 98, 204, 0.5)',
			],
			[
				'type'  => 'line',
				'label' => 'Penjualan',
				'data'  => $prod,
				'color' => '#3399FF',
			],
			[
				'type'  => 'line',
				'label' => 'Human Productivity',
				'data'  => $prodd,
				'color' => '#007ACC',
			],
		];

		loadChart($labels, $datasets);
		break;

	default:
        echo 'action not defined';
}

function loadTableFixed($conn, $columns, $sql, $whereArr, $show, $forceWhere = false) {
	$params = $totalRecords = $data = $data1 = array();
	$params = $_REQUEST;
	$where = $sqlTot = $sqlRec = "";
	if( !empty($params['search']['value']) ) {
		if ($forceWhere || !strpos($sql, "WHERE")) {
			$where .= " WHERE ( ";
		} else {
			$where .= " AND ( ";
		}
		foreach($whereArr as $item){
			if($item == $whereArr[0]) $where .= $item." LIKE '%".$params['search']['value']."%' ";
			else $where .= " OR ".$item." LIKE '%".$params['search']['value']."%' ";
		}
		$where .=" )";
	}
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	if(isset($where) && $where != '') {
		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	if($params['order'][0] <> '' && $columns[$params['order'][0]['column']])
		$sOrder = $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir'];
	else
		$sOrder = $columns[0]."  ".$params['order'][0]['dir'];
	$sqlRec .=  " ORDER BY ". $sOrder."  LIMIT ".$params['start']." ,".$params['length'];
	$temp = "";
	foreach($columns as $item){
		$temp .= $item;
	}

	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));
	$totalRecords = mysqli_num_rows($queryTot);
	$queryRecords = mysqli_query($conn, $sqlRec) or die('database error: '. mysqli_error($conn));
	$nourut = 1;
	while( $row = mysqli_fetch_array($queryRecords) ) {
		foreach($show as $item) {
			$data1[] = $item === '[[index]]'
			? $nourut
			: (preg_match('/\{\{(\w+),(\w+)\}\}/', $item, $_)
				? replaceCurlyBracketWithIfArray($row, $item)
				: replaceBracketsWithArray($row, $item));
		}
		array_push($data, $data1);
		unset($data1);
		$data1 = array();
		$nourut++;
	}
	$json_data = array(
			"draw"            => intval($params['draw']),
			"recordsTotal"    => intval($totalRecords),
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data
			);
	echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
}

function replaceCurlyBracketWithIfArray($array, $string) {
	return preg_replace_callback('/\{\{(\w+),(\w+)\}\}/', function($match) use ($array) {
		$key1 = $match[1];
    	$key2 = $match[2];

		if (isset($array[$key1]) && isset($array[$key2])) {
			if ($array[$key1] > $array[$key2]) {
				return '<span style="color: #FF6347; text-decoration: underline;">' . htmlspecialchars($array[$key2]) . '</span>';
			} else if ($array[$key1] < $array[$key2]) {
				return '<span style="color: #428BCA; text-decoration: underline;">' . htmlspecialchars($array[$key2]) . '</span>';
			} else {
				return '<span style="color: #676A6C; text-decoration: underline;">' . htmlspecialchars($array[$key2]) . '</span>';
			}
		} else {
			if(!$array[$key2]){
                return '';
            }
            return $match[0];
		}
    }, $string);
}

function loadChart($labels, $datasets, $stacked = false) {
	$datasets = array_map(function ($data) use ($stacked) {
		$dataset = [
			'type'            => $data['type'],
			'label'           => $data['label'],
			'data'            => $data['data'],
			'fill'            => false,
			'tension'         => 0.1,
			'backgroundColor' => $data['color'],
			'borderColor'     => $data['color'],
		];

		if ($stacked) {
			$dataset['stack'] = $data['stack'];
		}

		return $dataset;
	}, $datasets);

	$chart = [
		'data'    => [
			'labels'   => $labels,
			'datasets' => $datasets,
		],
		'options' => [
			'responsive' => true,
			'plugins'    => [
				'title'      => [ 'display' => false ],
				'legend'     => [
					'display' => true,
					'labels'  => [ 'font' => 12 ],
				],
				'datalabels' => [
					'font'            => [ 'size' => 12, 'weight' => 'bold' ],
					'anchor'          => 'end',
					'align'           => 'bottom',
					'textStrokeColor' => '#fff',
					'textStrokeWidth' => 4,
				],
			],
		],
	];

	if ($stacked) {
		$chart['options']['scales'] = [
			'x' => [ 'stacked' => true ],
			'y' => [ 'stacked' => true ],
		];

		$chart['options']['interaction'] = [
			'intersect' => false,
		];
	}

	echo json_encode($chart);
}

function fetchBengkel($id) {
	global $months;

	$cabang = ORM::for_table('daftar_cabang_bengkel')
		->select_many('daftar_cabang_bengkel.*', 'daftar_cabang.branch_name', 'daftar_cabang.work_location')
		->join('daftar_cabang', [ 'daftar_cabang_bengkel.cabang_id', '=', 'daftar_cabang.id' ])
		->find_one($id);

	$oldData = ORM::for_table('produktivitas_bengkel_unit_entry')->where('cabang_bengkel_id', $id)->find_many();
	$oldData->delete();

	if (!$cabang) return;

	if (preg_match('/^https:\/\/docs\.google\.com\/spreadsheets\/d\/([a-zA-Z0-9_-]+)(\/.*)?$/', $cabang['link_spreadsheet'], $match)) {
		$spreadsheetId = $match[1];
		$branchName    = $cabang['branch_name'];
		$sheetName     = urlencode($branchName);
		$url           = "https://docs.google.com/spreadsheets/d/$spreadsheetId/gviz/tq?tqx=out:json&sheet=$sheetName";
		$response      = file_get_contents($url);

		if (preg_match('/google\.visualization\.Query\.setResponse\((.*)\);/s', $response, $matches)) {
			$jsonText = $matches[1];
			$data     = json_decode($jsonText, true);

			$start = new DateTime('2025-01-01');
			$now   = new DateTime();
			$now->modify('first day of this month');

			$validMonths = [];
			while ($start <= $now) {
				$monthKey = $start->format('m');
				$year     = $start->format('Y');
				$validMonths[] = $months[$monthKey] . ' ' . $year;
				$start->modify('+1 month');
			}

			$index = [
				'Bulan'              => -1,
				'Tahun'              => -1,
				'Target UE'          => -1,
				'Target UE/Hari'     => -1,
				'Actual Unit Entry'  => -1,
				'Actual UE/Hari'     => -1,
				'Kebutuhan Mechanic' => -1,
				'Mechanic MPP'       => -1,
				'Kebutuhan KARU'     => -1,
				'KARU MPP'           => -1,
				'Kebutuhan SA'       => -1,
				'SA MPP'             => -1,
				'Human MPP'          => -1,
			];

			foreach ($data['table']['cols'] as $i => $d) {
				$monthLabel = "$branchName Bulan";
				if ($index['Bulan'] === -1 && ($d['label'] == $monthLabel || strpos($d['label'], 'Bulan') !== false)) {
					$index['Bulan'] = $i;
				} else if (array_key_exists($d['label'], $index)) {
					$index[$d['label']] = $i;
				}
			}

			if (in_array(-1, $index, true)) return;

			$pData = [];
			foreach ($data['table']['rows'] as $d) {
				$rowData = [];
				foreach ($index as $column => $row) {
					$rowData[$column] = $d['c'][$row]['v'];
				}

				$rowDataMonth = $rowData['Bulan'];
				$rowDataYear  = $rowData['Tahun'];
				$period       = "$rowDataMonth $rowDataYear";

				if (in_array($period, $validMonths)) $pData[] = $rowData;
			}

			try {
				ORM::get_db()->beginTransaction();

				foreach ($pData as $d) {
					$monthMap = array_flip($months);
					$tahun    = $d['Tahun'];
					$bulan    = $monthMap[$d['Bulan']];

					$newData = ORM::for_table('produktivitas_bengkel_unit_entry')->create();
					$newData->cabang_bengkel_id          = (int) $id;
					$newData->periode                    = "$tahun-$bulan-01";
					$newData->target_unit_entry          = (int) $d['Target UE'];
					$newData->target_unit_entry_per_hari = $d['Target UE/Hari'];
					$newData->unit_entry                 = (int) $d['Actual Unit Entry'];
					$newData->unit_entry_per_hari        = $d['Actual UE/Hari'];
					$newData->kebutuhan_mekanik         = $d['Kebutuhan Mechanic'];
					$newData->mekanik_plan               = (int) $d['Mechanic MPP'];
					$newData->kebutuhan_karu             = $d['Kebutuhan KARU'];
					$newData->karu_plan                  = (int) $d['KARU MPP'];
					$newData->kebutuhan_sa               = $d['Kebutuhan SA'];
					$newData->sa_plan                    = (int) $d['SA MPP'];
					$newData->human_plan                 = (int) $d['Human MPP'];
					$newData->save();
				}

				ORM::get_db()->commit();
			} catch (PDOException $ex) {}
		}
	}
}

function fetchMitra($id) {
	$cabang = ORM::for_table('daftar_cabang_marketing')
		->select_many('daftar_cabang_marketing.*', 'daftar_cabang.branch_name', 'daftar_cabang.work_location')
		->join('daftar_cabang', [ 'daftar_cabang_marketing.cabang_id', '=', 'daftar_cabang.id' ])
		->find_one($id);

	$oldData = ORM::for_table('daftar_mitra')->where('cabang_marketing_id', $id)->find_many();
	$oldData->delete();

	if (!$cabang) return;

	if (preg_match('/^https:\/\/docs\.google\.com\/spreadsheets\/d\/([a-zA-Z0-9_-]+)(\/.*)?$/', $cabang['link_spreadsheet_mitra'], $match)) {
		$spreadsheetId = $match[1];
		$url           = "https://docs.google.com/spreadsheets/d/$spreadsheetId/gviz/tq?tqx=out:json&sheet=";

		$startYear   = 2025;
		$currentYear = (int)date('Y');
		$years       = range($startYear, $currentYear);
		$yearStrings = array_map('strval', $years);

		$mitra = [];

		foreach ($yearStrings as $year) {
			$response = file_get_contents($url . $year);

			if (preg_match('/google\.visualization\.Query\.setResponse\((.*)\);/s', $response, $matches)) {
				$jsonText = $matches[1];
				$data     = json_decode($jsonText, true);

				$header  = false;
				$skipped = false;
				$index   = [
					'NAMA SALES FORCE'  => 2,
					'STATUS customer'   => 5,
					'TANGGAL BERGABUNG' => 8,
					'TANGGAL KELUAR'    => 9,
					'KETERANGAN'        => 11,
				];

				foreach ($data['table']['rows'] as $d) {
					if (!$header) {
						if ($d['c'][$index['NAMA SALES FORCE']]['v'] === 'NAMA SALES FORCE') {
							$header = true;
						}
					} else if ($skipped) {
						$rowData = [];
						foreach ($index as $column => $row) {
							if ($column === 'TANGGAL BERGABUNG' || $column === 'TANGGAL KELUAR') $rowData[$column] = $d['c'][$row]['f'] ?? $d['c'][$row]['v'];
							else $rowData[$column] = $d['c'][$row]['v'];
						}

						if ($rowData['NAMA SALES FORCE'] && $rowData['STATUS customer'] === 'Mitra Kerja') $mitra[] = $rowData;
					} else {
						$skipped = true;
					}
				}
			}
		}

		try {
            ORM::get_db()->beginTransaction();

			foreach ($mitra as $m) {
				$newMitra = ORM::for_table('daftar_mitra')->create();
				$newMitra->cabang_marketing_id = $id;
				$newMitra->nama_sales_force    = $m['NAMA SALES FORCE'];
				$newMitra->tanggal_bergabung   = formatSpreadsheetDate($m['TANGGAL BERGABUNG']);
				$newMitra->tanggal_keluar      = formatSpreadsheetDate($m['TANGGAL KELUAR']);
				$newMitra->keterangan          = formatValue($m['KETERANGAN']);
				$newMitra->save();
			}

            ORM::get_db()->commit();
        } catch (PDOException $ex) {}
	}
}

function fetchMarketing($id) {
	global $months;

	$cabang = ORM::for_table('daftar_cabang_marketing')
		->select_many('daftar_cabang_marketing.*', 'daftar_cabang.branch_name', 'daftar_cabang.work_location')
		->join('daftar_cabang', [ 'daftar_cabang_marketing.cabang_id', '=', 'daftar_cabang.id' ])
		->find_one($id);

	$oldData = ORM::for_table('produktivitas_marketing_sales')->where('cabang_marketing_id', $id)->find_many();
	$oldData->delete();

	if (!$cabang) return;

	if (preg_match('/^https:\/\/docs\.google\.com\/spreadsheets\/d\/([a-zA-Z0-9_-]+)(\/.*)?$/', $cabang['link_spreadsheet'], $match)) {
		$spreadsheetId = $match[1];
		$branchName    = $cabang['branch_name'];
		$sheetName     = urlencode($branchName);
		$url           = "https://docs.google.com/spreadsheets/d/$spreadsheetId/gviz/tq?tqx=out:json&sheet=$sheetName";
		$response      = file_get_contents($url);

		if (preg_match('/google\.visualization\.Query\.setResponse\((.*)\);/s', $response, $matches)) {
			$jsonText = $matches[1];
			$data     = json_decode($jsonText, true);

			$start = new DateTime('2025-01-01');
			$now   = new DateTime();
			$now->modify('first day of this month');

			$validMonths = [];
			while ($start <= $now) {
				$monthKey = $start->format('m');
				$year     = $start->format('Y');
				$validMonths[] = $months[$monthKey] . ' ' . $year;
				$start->modify('+1 month');
			}

			$index = [
				'Bulan'        => -1,
				'Tahun'        => -1,
				'Target Prod.' => -1,
				'Productivity' => -1,
				'Sales MPP'    => -1,
				'Human MPP'    => -1,
			];

			foreach ($data['table']['cols'] as $i => $d) {
				$monthLabel = "$branchName Bulan";
				if ($index['Bulan'] === -1 && ($d['label'] == $monthLabel || strpos($d['label'], 'Bulan') !== false)) {
					$index['Bulan'] = $i;
				} else if (array_key_exists($d['label'], $index)) {
					$index[$d['label']] = $i;
				}
			}

			if (in_array(-1, $index, true)) return;

			$pData = [];
			foreach ($data['table']['rows'] as $d) {
				$rowData = [];
				foreach ($index as $column => $row) {
					$rowData[$column] = $d['c'][$row]['v'];
				}

				$rowDataMonth = $rowData['Bulan'];
				$rowDataYear  = $rowData['Tahun'];
				$period       = "$rowDataMonth $rowDataYear";

				if (in_array($period, $validMonths)) $pData[] = $rowData;
			}

			try {
				ORM::get_db()->beginTransaction();

				foreach ($pData as $d) {
					$monthMap = array_flip($months);
					$tahun    = $d['Tahun'];
					$bulan    = $monthMap[$d['Bulan']];

					$newData = ORM::for_table('produktivitas_marketing_sales')->create();
					$newData->cabang_marketing_id = (int) $id;
					$newData->periode             = "$tahun-$bulan-01";
					$newData->target_productivity = (int) $d['Target Prod.'];
					$newData->productivity        = (int) $d['Productivity'];
					$newData->sales_plan          = (int) $d['Sales MPP'];
					$newData->human_plan          = (int) $d['Human MPP'];
					$newData->save();
				}

				ORM::get_db()->commit();
			} catch (PDOException $ex) {}
		}
	}
}

function formatAverage($data, $size) {
	$result = [];
	for ($i = 0; $i < count($data); $i ++) {
		if ($i < $size - 1) {
			$result[] = null;
		} else {
			$sum = 0;
			for ($j = $i - $size + 1; $j <= $i; $j++) {
				$sum += $data[$j];
			}
			$result[] = round($sum / $size, 2);
		}
	}
	return $result;
}

function formatValue($value) {
	if (!$value) return null;
	if ($value === '-') return null;
	return $value;
}

function formatSpreadsheetDate($date) {
	$dt1 = DateTime::createFromFormat('d.m.Y', $date);
	$dt2 = DateTime::createFromFormat('d/m/Y', $date);
	return $dt1 ? $dt1->format('Y-m-d') : $dt2 ? $dt2->format('Y-m-d') : null;

}
