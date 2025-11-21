<?php
require_once 'sysfrm/lib/phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

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

	case 'load-active-karyawan':
		Event::trigger('karyawan/load-active-karyawan/');
		$columns = array('id', 'employee_id', 'employee_name', 'years_in_service', 'grade');
		$whereArr = array('employee_id', 'employee_name', 'years_in_service', 'grade');
		$sql = "SELECT id, employee_id, employee_name, years_in_service, grade FROM daftar_karyawan WHERE daftar_karyawan.terminated = 0";
		$show = array(
			'[[index]]',
			'[employee_id]',
			'[employee_name]',
			'[years_in_service]',
			'[grade]',
			'<div class="text-right">
				<a href="[url]karyawan/detail/[id]/" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-book"></i></a>
			</div>'
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-terminated-karyawan':
		Event::trigger('karyawan/load-terminated-karyawan/');
		$columns = array('id', 'employee_id', 'employee_name', 'years_in_service', 'grade', 'termination_date');
		$whereArr = array('employee_id', 'employee_name', 'years_in_service', 'grade', 'termination_date');
		$sql = "SELECT id, employee_id, employee_name, years_in_service, grade, termination_date FROM daftar_karyawan WHERE daftar_karyawan.terminated = 1";
		$show = array(
			'[[index]]',
			'[employee_id]',
			'[employee_name]',
			'[years_in_service]',
			'[grade]',
			'[termination_date]',
			'<div class="text-right">
				<a href="[url]karyawan/detail/[id]/" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-book"></i></a>
			</div>'
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-posisi':
		Event::trigger('posisi/load-posisi/');

		$showDetail = _auth2('SHOW-MASTERDATA-POSISI', $user['id']);
		$showEdit   = _auth2('UPDATE-MASTERDATA-POSISI', $user['id']);
		$showDelete = _auth2('DELETE-MASTERDATA-POSISI', $user['id']);

		$actions = '';
		if ($showDetail) $actions .= '<a href="[url]posisi/detail/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>    ';
		if ($showEdit) $actions .= '<a href="[url]posisi/edit/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>    ';
		if ($showDelete) $actions .= '<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Hapus</a>    ';

		$columns = array('id', 'position_id', 'title');
		$whereArr = array('position_id', 'title');
		$sql = "SELECT id, position_id, title FROM daftar_posisi";
		$show = array(
			'[[index]]',
			'[position_id]',
			'[title]',
			"<div class='text-right'>$actions</div>"
		);
		loadTableFixed($conn, $columns, $sql, $whereArr, $show);
		break;

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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'mekanik'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
					) AS mekanik_actual,
					a.kebutuhan_karu,
					a.karu_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'karu'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
					) AS karu_actual,
					a.kebutuhan_sa,
					a.sa_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'sa'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
					) AS sa_actual,
					a.human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						WHERE d.work_location = c.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
							OR
							(d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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

		$showDetail = _auth2('SHOW-MASTERDATA-KARYAWAN', $user['id']);

		$id      = (int) $routes[3];
		$params  = $_REQUEST;
		$periode = $params['periode'];
		$type    = $params['type'];

		$columns = array('a.id', 'a.employee_id', 'a.employee_name', 'a.position_id', 'c.title', 'a.terminated');
		$whereArr = array('a.employee_id', 'a.employee_name', 'a.position_id', 'c.title', 'a.terminated');

		if ($type === 'human') {
			$sql = "
				SELECT
					a.id,
					a.employee_id,
					a.employee_name,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_karyawan AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN daftar_cabang_bengkel AS c on c.id = $id
				INNER JOIN daftar_cabang AS d ON d.id = c.cabang_id
				WHERE d.work_location = a.work_location
				AND (
					(a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
					OR
					(a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.termination_date, '%Y-%m-01'))
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
					a.employee_id,
					a.employee_name,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_karyawan AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN produktivitas_bengkel_position AS c ON c.cabang_bengkel_id = $id AND c.posisi_id = b.id AND c.posisi = '$type'
				WHERE (a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
				OR (a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.termination_date, '%Y-%m-01'))
			";
		}

		$show = array(
			'[[index]]',
			'[employee_id]',
			'[employee_name]',
			'[position_id]',
			'[title]',
			'[terminated]'
		);

		if ($showDetail) {
			array_push($show, '<div class="text-right">
				<a href="[url]karyawan/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
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
					COALESCE((
						SELECT target_unit_entry
						FROM produktivitas_bengkel_unit_entry AS a
						WHERE a.cabang_bengkel_id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS target_unit_entry,
					COALESCE((
						SELECT unit_entry
						FROM produktivitas_bengkel_unit_entry AS a
						WHERE a.cabang_bengkel_id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS unit_entry
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					COALESCE((
						SELECT SUM(target_unit_entry)
						FROM produktivitas_bengkel_unit_entry AS a
						WHERE a.cabang_bengkel_id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS target_unit_entry,
					COALESCE((
						SELECT SUM(unit_entry)
						FROM produktivitas_bengkel_unit_entry AS a
						WHERE a.cabang_bengkel_id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS unit_entry
				FROM ($unions) AS nums
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'mekanik'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01'))
						OR (d.terminated = 1 AND DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'mekanik'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
						OR (d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.termination_date))
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'karu'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01'))
						OR (d.terminated = 1 AND DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'karu'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
						OR (d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.termination_date))
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'sa'
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01'))
						OR (d.terminated = 1 AND DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01') BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_bengkel_position AS f ON f.cabang_bengkel_id = $id AND f.posisi_id = e.id AND f.posisi = 'sa'
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
						OR (d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.termination_date))
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
					COALESCE((
						SELECT human_plan
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_cabang_bengkel AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id
						WHERE d.work_location = f.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= periode)
							OR
							(d.terminated = 1 AND periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'BENGKEL' or d.employee_category = '29'))
						)
					) AS human_actual,
					COALESCE((
						SELECT unit_entry
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS unit_entry
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT ROUND(SUM(c.human_plan) / 12, 2)
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS human_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_cabang_bengkel AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id AND d.work_location = f.work_location
						WHERE (
							(d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
							OR
							(d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.termination_date))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'BENGKEL' OR d.employee_category = '29'))
						)
					) AS human_actual,
					(
						SELECT SUM(c.unit_entry)
						FROM produktivitas_bengkel_unit_entry AS c
						WHERE c.cabang_bengkel_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS unit_entry
				FROM ($unions) AS nums
				ORDER BY periode
			";
		}

		$query    = mysqli_query($conn, $sql) or die('database error: '. mysqli_error($conn));
		$labels   = [];
		$plan     = [];
		$actual   = [];
		$prod     = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$periode = $type === 'month'
				? $months[date('m', strtotime($row['periode']))] . ' ' . date('Y', strtotime($row['periode']))
				: $row['periode'];

			$labels[]   = $periode;
			$plan[]     = $row['human_plan'];
			$actual[]   = $row['human_actual'];
			$prod[]     = round($row['unit_entry'] / $row['human_actual'], 2);
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
					COALESCE((
						SELECT SUM(c.productivity)
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = a.id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS productivity
				FROM daftar_cabang_marketing AS a
				CROSS JOIN ($unions) AS nums
				INNER JOIN daftar_cabang AS b ON b.id = a.cabang_id
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
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_marketing_position AS f ON f.cabang_marketing_id = $id AND f.posisi_id = e.id
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
						OR (d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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
						FROM daftar_karyawan AS d
						WHERE d.work_location = c.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= a.periode)
							OR
							(d.terminated = 1 AND a.periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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

		$showDetail = _auth2('SHOW-MASTERDATA-KARYAWAN', $user['id']);

		$id      = (int) $routes[3];
		$params  = $_REQUEST;
		$periode = $params['periode'];
		$type    = $params['type'];

		$columns = array('a.id', 'a.employee_id', 'a.employee_name', 'a.position_id', 'c.title', 'a.terminated');
		$whereArr = array('a.employee_id', 'a.employee_name', 'a.position_id', 'c.title', 'a.terminated');

		if ($type === 'human') {
			$sql = "
				SELECT
					a.id,
					a.employee_id,
					a.employee_name,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_karyawan AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN daftar_cabang_marketing AS c on c.id = $id
				INNER JOIN daftar_cabang AS d ON d.id = c.cabang_id
				WHERE d.work_location = a.work_location
				AND (
					(a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
					OR
					(a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.termination_date, '%Y-%m-01'))
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
					a.employee_id,
					a.employee_name,
					a.position_id,
					b.title,
					a.terminated
				FROM daftar_karyawan AS a
				INNER JOIN daftar_posisi AS b ON b.position_id = a.position_id
				INNER JOIN produktivitas_marketing_position AS c ON c.cabang_marketing_id = $id AND c.posisi_id = b.id
				WHERE (a.terminated = 0 AND DATE_FORMAT(a.first_join_date, '%Y-%m-01') <= '$periode')
				OR (a.terminated = 1 AND '$periode' BETWEEN DATE_FORMAT(a.first_join_date, '%Y-%m-01') AND DATE_FORMAT(a.termination_date, '%Y-%m-01'))
			";
		}

		$show = array(
			'[[index]]',
			'[employee_id]',
			'[employee_name]',
			'[position_id]',
			'[title]',
			'[terminated]'
		);

		if ($showDetail) {
			array_push($show, '<div class="text-right">
				<a href="[url]karyawan/detail/[id]/" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-book"></i> Detail</a>
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
					COALESCE((
						SELECT target_productivity
						FROM produktivitas_marketing_sales AS a
						WHERE a.cabang_marketing_id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS target_productivity,
					COALESCE((
						SELECT productivity
						FROM produktivitas_marketing_sales AS a
						WHERE a.cabang_marketing_id = $id
						AND DATE_FORMAT(a.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS productivity
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					COALESCE((
						SELECT SUM(target_productivity)
						FROM produktivitas_marketing_sales AS a
						WHERE a.cabang_marketing_id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS target_productivity,
					COALESCE((
						SELECT SUM(productivity)
						FROM produktivitas_marketing_sales AS a
						WHERE a.cabang_marketing_id = $id
						AND YEAR(a.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					), 0) AS productivity
				FROM ($unions) AS nums
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
						SELECT productivity
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					) AS productivity,
					(
						SELECT sales_plan
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					) AS sales_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_marketing_position AS f ON f.cabang_marketing_id = $id AND f.posisi_id = e.id
						WHERE (d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= periode)
						OR (d.terminated = 1 AND periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
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
					) as sales_mitra
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT SUM(productivity)
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS productivity,
					(
						SELECT ROUND(SUM(sales_plan) / 12, 2)
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS sales_plan,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_posisi AS e ON e.position_id = d.position_id
						INNER JOIN produktivitas_marketing_position AS f ON f.cabang_marketing_id = $id AND f.posisi_id = e.id
						WHERE (d.terminated = 0 AND YEAR(d.first_join_date) <= periode)
						OR (d.terminated = 1 AND periode BETWEEN YEAR(d.first_join_date) AND YEAR(d.termination_date))
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
					) as sales_mitra
				FROM ($unions) AS nums
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
					COALESCE((
						SELECT human_plan
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND DATE_FORMAT(c.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS human_mpp,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_cabang_marketing AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id
						WHERE d.work_location = f.work_location
						AND (
							(d.terminated = 0 AND DATE_FORMAT(d.first_join_date, '%Y-%m-01') <= periode)
							OR
							(d.terminated = 1 AND periode BETWEEN DATE_FORMAT(d.first_join_date, '%Y-%m-01') AND DATE_FORMAT(d.termination_date, '%Y-%m-01'))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'CABANG' OR d.employee_category = 'UNIT' OR d.employee_category = '26' OR d.employee_category = '28'))
						)
					) AS human_actual,
					COALESCE((
						SELECT productivity
						FROM produktivitas_marketing_sales AS e
						WHERE e.cabang_marketing_id = $id
						AND DATE_FORMAT(e.periode, '%Y-%m-01') = DATE_FORMAT(DATE_ADD('$fromDate', INTERVAL nums.n MONTH), '%Y-%m-01')
					), 0) AS penjualan
				FROM ($unions) AS nums
				ORDER BY periode
			";
		} else {
			$sql = "
				SELECT
					YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) AS periode,
					(
						SELECT ROUND(SUM(c.human_plan) / 12, 2)
						FROM produktivitas_marketing_sales AS c
						WHERE c.cabang_marketing_id = $id
						AND YEAR(c.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS human_mpp,
					(
						SELECT COUNT(*)
						FROM daftar_karyawan AS d
						INNER JOIN daftar_cabang_marketing AS e ON e.id = $id
						INNER JOIN daftar_cabang AS f ON f.id = e.cabang_id AND d.work_location = f.work_location
						WHERE (
							(d.terminated = 0 AND YEAR(d.first_join_date) <= YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)))
							OR
							(d.terminated = 1 AND YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR)) BETWEEN YEAR(d.first_join_date) AND YEAR(d.termination_date))
						)
						AND (
							(e.is_udt = 1 AND d.position_id LIKE '%UDT%')
							OR
							(e.is_udt = 0 AND (d.employee_category = 'CABANG' OR d.employee_category = 'UNIT' OR d.employee_category = '26' OR d.employee_category = '28'))
						)
					) AS human_actual,
					(
						SELECT SUM(e.productivity)
						FROM produktivitas_marketing_sales AS e
						WHERE e.cabang_marketing_id = $id
						AND YEAR(e.periode) = YEAR(DATE_ADD('$from-01-01', INTERVAL nums.n YEAR))
					) AS penjualan
				FROM ($unions) AS nums
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
	$queryRecords = mysqli_query($conn, $sqlRec) or die($sqlRec);
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
					'STATUS KARYAWAN'   => 5,
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

						if ($rowData['NAMA SALES FORCE'] && $rowData['STATUS KARYAWAN'] === 'Mitra Kerja') $mitra[] = $rowData;
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
