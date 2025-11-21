<?php
_auth();
$action = $routes['2'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());

switch ($action) {
	case 'search-itemstock':
		Event::trigger("itemstock/search-itemstock/");
		$param = $_POST['q'];
		if ($param != "") {
			$text = "Text: " . $param;
			$query = "%" . $param . "%";
			$data = ORM::for_table("daftar_itemstock")->table_alias("a")->select("a.nm_item")->select("a.kd_item")->where("a.active", "Y")->where_raw('(`nm_item` LIKE ? OR `kd_item` LIKE ?)', array($query, $query))->limit(25)->find_many();
			$json = array();
			if ($data) {
				foreach ($data as $eachdata) {
					$text = $eachdata['kd_item'] . " - " . $eachdata['nm_item'];
					$s = array("id" => $eachdata['kd_item'], "text" => $text);
					array_push($json, $s);
				}
				$result = array("results" => $json);
				header("Content-Type: application/json");
				$jsonResult = json_encode($result, JSON_PRETTY_PRINT);
				echo $jsonResult;
			}
		}
		break;

		// case 'list-mintabarang':
		// $columns = array('id','no_mintabarang','unit_kerja','nomor','tanggal','approval','status');
		// $whereArr = array('no_mintabarang','unit_kerja','nomor','tanggal');
		// $userId = $user['id'];
		// $userDept = $user['kode_dept'];
		// $atasan = ORM::for_table("daftar_department", "dblogin")->where("atasan", $user["username"])->find_one();
		// $ga_admin = ORM::for_table('daftar_approval')->where("setting", "GA_ADMIN")->find_one();
		// if ($user["user_type"] == "Admin") {
		// 	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval, status FROM mintabarang_master";
		// } else if ($user["username"] == $ga_admin["approval"]) {
		// 	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval, status FROM mintabarang_master WHERE tahap = 3";
		// } else if ($atasan) {
		// 	if ($user["kode_dept"] == "SDH") {
		// 		$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval, status FROM mintabarang_master WHERE (tahap = 2) OR (tahap > 2 AND disetujui_gas_oleh != '')";
		// 	} else {
		// 		$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval, status FROM mintabarang_master WHERE kode_dept = '$userDept'";
		// 	}
		// } else {
		// 	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval, status FROM mintabarang_master WHERE dibuat_oleh = $userId";
		// }
		// // if ($user["user_type"] == "Admin") {
		// // 	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval FROM mintabarang_master";
		// // } else if ($atasan) {
		// // 	if ($user["kode_dept"] == "GAS") {
		// // 		$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval FROM mintabarang_master WHERE tahap = 3";
		// // 	} else if ($user["kode_dept"] == "SDH") {
		// // 		$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval FROM mintabarang_master WHERE (tahap = 2) OR (tahap > 2 AND disetujui_gas_oleh != '')";
		// // 	} else {
		// // 		$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval FROM mintabarang_master WHERE kode_dept = '$userDept'";
		// // 	}
		// // } else {
		// // 	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, approval FROM mintabarang_master WHERE dibuat_oleh = $userId";
		// // }
		// $show = array(
		// 	'[no_mintabarang]',
		// 	'[tanggal]',
		// 	'[unit_kerja]',
		// 	'[nomor]',
		// 	'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 	'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 	'<div class="text-right">
		// 	<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 	<a class="btn btn-warning btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
		// 	<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Hapus"><i class="fa fa-trash"></i></a>
		// 	</div>'
		// );
		// loadTable($conn, $columns, $sql, $whereArr, $show);
		// break;

		// case 'list-mintabarang':
		// 	$columns = array('id','no_mintabarang','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT id, no_mintabarang, tanggal, nomor, approval, status FROM mintabarang_master WHERE dibuat_oleh = $userId";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-success btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		<a class="btn btn-primary btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
		// 		<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Cancel">X</a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

	case 'list-mintabarang':
		$userId = $user['id'];
		$temp = ORM::for_table('mintabarang_master')
			->where('dibuat_oleh', $userId)
			->order_by_desc('id')
			->find_many();
		$otoritas_edit = ORM::for_table('daftar_otoritas_user', 'dblogin')->where('user_id', $userId)->where('kode_oto', 'EDIT-UR')->find_one();
		$boleh_edit = false;
		if ($otoritas_edit == true || $user['user_type'] == 'Admin') {
			$boleh_edit = true;
		}
		$data = [];
		foreach ($temp as $index => $eachData) {
			array_push($data, [$index + 1, $eachData['no_mintabarang'], $eachData['tanggal'], $eachData['approval'], $eachData['id'], $eachData['tahap'], $boleh_edit]);
		}
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		break;

	case 'list-mintabarang-departemen':
		$kode_dept = $user['kode_dept'];
		$temp = ORM::for_table('mintabarang_master')
			->where('kode_dept', $kode_dept)
			->order_by_desc('id')
			->find_many();
		$data = [];
		foreach ($temp as $index => $eachData) {
			array_push($data, [$index + 1, $eachData['no_mintabarang'], $eachData['tanggal'], $eachData['dibuat_nama'], $eachData['approval'], $eachData['id']]);
		}
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		break;

	case 'list-mintabarang-servicehead':
		$temp = ORM::for_table('cmportal_gas.mintabarang_master')
			->select('cmportal_gas.mintabarang_master.*')
			->select('cmportal_gas.mintabarang_master.id', 'mintabarang_id')
			->select('cmportal.daftar_department.nama_dept')
			->join('cmportal.daftar_department', ['cmportal.daftar_department.kode_dept', '=', 'cmportal_gas.mintabarang_master.kode_dept'])
			->where_raw('tahap = 2 OR disetujui_service_oleh <> ""')
			->order_by_desc('cmportal_gas.mintabarang_master.id')
			->find_many();
		$data = [];
		foreach ($temp as $index => $eachData) {
			array_push($data, [$index + 1, $eachData['no_mintabarang'], $eachData['tanggal'], $eachData['dibuat_nama'], $eachData['nama_dept'], $eachData['approval'], $eachData['mintabarang_id']]);
		}
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		break;

	case 'list-mintabarang-gaadmin':
		$temp = ORM::for_table('cmportal_gas.mintabarang_master')
			->select('cmportal_gas.mintabarang_master.*')
			->select('cmportal_gas.mintabarang_master.id', 'mintabarang_id')
			->select('cmportal.daftar_department.nama_dept')
			->join('cmportal.daftar_department', ['cmportal.daftar_department.kode_dept', '=', 'cmportal_gas.mintabarang_master.kode_dept'])
			->where('tahap', 3)
			->order_by_desc('cmportal_gas.mintabarang_master.id')
			->find_many();
		$data = [];
		foreach ($temp as $index => $eachData) {
			array_push($data, [$index + 1, $eachData['no_mintabarang'], $eachData['tanggal'], $eachData['dibuat_nama'], $eachData['nama_dept'], $eachData['approval'], $eachData['mintabarang_id']]);
		}
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		break;

		// case 'administrator-list-mintabarang':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				mm.dibuat_oleh <> $userId
		// 	";

		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'dept-list-mintabarang':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, nomor, approval, status FROM mintabarang_master WHERE kode_dept = '$userDept' AND dibuat_oleh <> $userId";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'service-head-list-mintabarang':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				(mm.tahap = 2  OR (mm.tahap > 2 AND mm.disetujui_service_oleh <> '')) AND
		// 				mm.dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'gaadmin-list-mintabarang':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				mm.tahap = 3 AND
		// 				mm.dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'list-mintabarang-pending':
		// 	$columns = array('id','no_mintabarang','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT id, no_mintabarang, tanggal, nomor, approval, status FROM mintabarang_master WHERE dibuat_oleh = $userId AND approval = 'PENDING'";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		<a class="btn btn-warning btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
		// 		<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Cancel">X</a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'administrator-list-mintabarang-pending':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				mm.dibuat_oleh <> $userId AND
		// 				approval = 'PENDING'
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'dept-list-mintabarang-pending':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, nomor, approval, status FROM mintabarang_master WHERE kode_dept = '$userDept' AND approval = 'PENDING' AND dibuat_oleh <> $userId";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'service-head-list-mintabarang-pending':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				(tahap = 2  OR (tahap > 2 AND disetujui_service_oleh <> '')) AND
		// 				approval = 'PENDING'
		// 				AND dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'gaadmin-list-mintabarang-pending':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				tahap = 3 AND
		// 				approval = 'PENDING' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'list-mintabarang-approved':
		// 	$columns = array('id','no_mintabarang','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT id, no_mintabarang, tanggal, nomor, approval, status FROM mintabarang_master WHERE dibuat_oleh = $userId AND approval = 'APPROVED'";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'administrator-list-mintabarang-approved':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				dibuat_oleh <> $userId AND
		// 				approval = 'APPROVED'
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'dept-list-mintabarang-approved':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, nomor, approval, status FROM mintabarang_master WHERE kode_dept = '$userDept' AND approval = 'APPROVED' AND dibuat_oleh <> $userId";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'service-head-list-mintabarang-approved':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				approval = 'APPROVED' AND
		// 				disetujui_service_oleh <> '' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'gaadmin-list-mintabarang-approved':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				approval = 'APPROVED' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'list-mintabarang-rejected':
		// 	$columns = array('id','no_mintabarang','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT id, no_mintabarang, tanggal, nomor, approval, status FROM mintabarang_master WHERE dibuat_oleh = $userId AND approval = 'REJECTED'";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'administrator-list-mintabarang-rejected':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				approval = 'REJECTED' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'dept-list-mintabarang-rejected':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, nomor, approval, status FROM mintabarang_master WHERE kode_dept = '$userDept' AND approval = 'REJECTED' AND dibuat_oleh <> $userId";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'service-head-list-mintabarang-rejected':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				(tahap = 2 OR (tahap > 2 AND disetujui_service_oleh <> '')) AND
		// 				approval = 'REJECTED' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'gaadmin-list-mintabarang-rejected':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				tahap = 3 AND
		// 				approval = 'REJECTED' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'list-mintabarang-cancelled':
		// 	$columns = array('id','no_mintabarang','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$sql = "SELECT id, no_mintabarang, tanggal, nomor, approval, status FROM mintabarang_master WHERE dibuat_oleh = $userId AND approval = 'CANCEL'";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'administrator-list-mintabarang-cancelled':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				approval = 'CANCEL' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'dept-list-mintabarang-cancelled':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','tanggal','nomor','approval','status');
		// 	$whereArr = array('no_mintabarang','tanggal','nomor');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, nomor, approval, status FROM mintabarang_master WHERE kode_dept = '$userDept' AND approval = 'CANCEL' AND dibuat_oleh <> $userId";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'service-head-list-mintabarang-cancelled':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				disetujui_service_oleh <> '' AND
		// 				approval = 'CANCEL' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

		// case 'gaadmin-list-mintabarang-cancelled':
		// 	$columns = array('id','no_mintabarang','dibuat_nama','nama_dept','tanggal','nomor','approval','status');
		// 	$whereArr = array('mm.no_mintabarang','mm.dibuat_nama','dd.nama_dept','mm.tanggal','mm.nomor','mm.approval','mm.status');
		// 	$userId = $user['id'];
		// 	$userDept = $user['kode_dept'];
		// 	$sql = "SELECT
		// 				mm.id AS id,
		// 				mm.no_mintabarang AS no_mintabarang,
		// 				mm.dibuat_nama AS dibuat_nama,
		// 				dd.nama_dept AS nama_dept,
		// 				mm.tanggal AS tanggal,
		// 				mm.nomor AS nomor,
		// 				mm.approval AS approval,
		// 				mm.status AS status
		// 			FROM
		// 				cmportal_gas.mintabarang_master mm
		// 			INNER JOIN
		// 				cmportal.daftar_department dd
		// 			ON
		// 				mm.kode_dept = dd.kode_dept
		// 			WHERE
		// 				tahap = 3 AND
		// 				approval = 'CANCEL' AND
		// 				dibuat_oleh <> $userId
		// 	";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[dibuat_nama]',
		// 		'[nama_dept]',
		// 		'[tanggal]',
		// 		'[nomor]',
		// 		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[approval]</span></div>',
		// 		'<div class="text-center"><span class="status_pr btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

	case 'search-supplier';
		$param = $_POST['q'];
		if ($param != "") {
			$text = "Text: " . $param;
			$query = "%" . $param . "%";
			$data = ORM::for_table("daftar_supplier")->where_raw('(`nama_supplier` LIKE ? OR `kode_supplier` LIKE ?)', array($query, $query))->limit(25)->find_many();
			// $data = ORM::for_table("daftar_supplier")->where_like('nama_supplier', '%ja%')->limit(25)->find_many();
			$json = array();
			if ($data) {
				foreach ($data as $eachData) {
					$text = $eachData['kode_supplier'] . " - " . $eachData['nama_supplier'];
					$s = array("id" => $eachData['kode_supplier'], "text" => $text);
					array_push($json, $s);
				}
				$result = array("results" => $json);
				header("Content-Type: application/json");
				$jsonResult = json_encode($result, JSON_PRETTY_PRINT);
				echo $jsonResult;
			}
		}
		break;

		// case 'list-mintabarang':
		// 	$columns = array('id','no_mintabarang','unit_kerja','nomor','tanggal','status','referensi');
		// 	$whereArr = array('no_mintabarang','unit_kerja','nomor','tanggal','referensi');
		// 	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal,status FROM mintabarang_master ";
		// 	$show = array(
		// 		'[no_mintabarang]',
		// 		'[tanggal]',
		// 		'[unit_kerja]',
		// 		'[nomor]',
		// 		'[status]',
		// 		'<div class="text-right">
		// 		<a class="btn btn-primary btn-xs"><i class="fa fa-book"></i>Detail</a>
		// 		<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i>Hapus</a>
		// 		</div>',
		// 		'[referensi]'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;


	case 'load-itemstock':
		Event::trigger('itemstock/load-itemstock/');
		$columns = array('id', 'kd_item', 'nm_item', 'active');
		$whereArr = array('kd_item', 'nm_item', 'active');
		$sql = "SELECT id, kd_item, nm_item, active FROM daftar_itemstock";
		$show = array(
			'[kd_item]',
			'[nm_item]',
			'<div class="text-center"><span class="btn btn-primary btn-xs status">[active]</span></div>',
			'<div class="text-right">
				<a href="[url]itemstock/edit/[id]/" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
				<a class="btn btn-danger btn-sm cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-jenisusaha':
		Event::trigger('supplier/load-jenisusaha/');
		$columns = array('id', 'kode_usaha', 'nama_usaha');
		$whereArr = array('kode_usaha', 'nama_usaha');
		$sql = "SELECT id, kode_usaha, nama_usaha FROM daftar_jenis_usaha";
		$show = array(
			'[kode_usaha]',
			'[nama_usaha]',
			'<div class="text-right">
			<a href="[url]jenisusaha/edit/[id]/" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<!--<a class="btn btn-danger btn-sm cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>-->
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-supplier':
		Event::trigger('supplier/load-supplier/');
		$columns = array('id', 'kode_supplier', 'nama_supplier', 'bidang', 'tgl_mulai_kerjasama', 'active');
		$whereArr = array('kode_supplier', 'nama_supplier', 'bidang', 'tgl_mulai_kerjasama', 'active');
		$sql = "SELECT id, nama_supplier, kode_supplier, bidang, tgl_mulai_kerjasama, active FROM daftar_supplier WHERE hidden = 0";
		$show = array(
			'[kode_supplier]',
			'[nama_supplier]',
			'[bidang]',
			'[tgl_mulai_kerjasama]',
			'<div class="text-center"><span class="btn btn-primary btn-xs status">[active]</span></div>',
			'<div class="text-right">
			<a href="[url]supplier/edit/[id]/" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a class="btn btn-danger btn-sm cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spmk-pending':
		Event::trigger('pembelian/load-spmk-pending/');
		$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('PENDING','REVISI') AND posisi = 'SPMK'";
		$show = array(
			'[tgl_spmk]',
			'[no_spmk]',
			'[dibuat_nama]',
			'[priority]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spmk-approved':
		Event::trigger('pembelian/load-spmk-approved/');
		$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('APPROVE') AND posisi = 'SPMK'";
		$show = array(
			'[tgl_spmk]',
			'[no_spmk]',
			'[dibuat_nama]',
			'[priority]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/kontraktor-spmk/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Pilih Kontraktor</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spmk-rejected':
		Event::trigger('pembelian/load-spmk-rejected/');
		$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('REJECT') AND posisi = 'SPMK'";
		$show = array(
			'[tgl_spmk]',
			'[no_spmk]',
			'[dibuat_nama]',
			'[priority]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spnk-pending':
		Event::trigger('pembelian/load-spnk-pending/');
		$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('PENDING','REVISI') AND posisi = 'SPNK'";
		$show = array(
			'[tgl_spmk]',
			'[no_spmk]',
			'[dibuat_nama]',
			'[priority]',
			'<span class="statusktr btn btn-primary btn-xs" value="[status]">[status]</span>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spnk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spnk-approved':
		Event::trigger('pembelian/load-spnk-approved/');
		$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('APPROVE') AND posisi = 'SPNK'";
		$show = array(
			'[tgl_spmk]',
			'[no_spmk]',
			'[dibuat_nama]',
			'[priority]',
			'<span class="statusktr btn btn-primary btn-xs" value="[status]">[status]</span>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spnk-rejected':
		Event::trigger('pembelian/load-spnk-rejected/');
		$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
		$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('REJECT') AND posisi = 'SPNK'";
		$show = array(
			'[tgl_spmk]',
			'[no_spmk]',
			'[dibuat_nama]',
			'[priority]',
			'<span class="statusktr btn btn-primary btn-xs" value="[status]">[status]</span>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk-supplier/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-pr':
		Event::trigger('pembelian/load-pr/');
		$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'status', 'posisi');
		$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'status', 'posisi');
		$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master ";
		$show = array(
			'[tgl_pr]',
			'[no_pr]',
			'[dibuat_nama]',
			'[posisi]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

		// case 'load-pr-pending':
		// 	Event::trigger('pembelian/load-pr-pending/');
		// 	$columns = array('id','tgl_pr','no_pr','dibuat_nama','status','nama_dept');
		// 	$whereArr = array('a.tgl_pr','a.no_pr','a.dibuat_nama','a.status','c.nama_dept');
		// 	// $sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master WHERE status IN ('PENDING','REVISI') AND posisi = 'PR'";
		// 	$sql = "SELECT a.id, a.tgl_pr, a.no_pr, a.dibuat_nama, a.status, a.posisi, c.nama_dept FROM cmportal_gas.pr_master a inner join cmportal.sys_users b on a.dibuat_oleh=b.id inner join cmportal.daftar_department c on b.kode_dept=c.kode_dept WHERE a.status IN ('PENDING','REVISI') AND a.posisi = 'PR'";
		// 	$show = array(
		// 		'[no_pr]',
		// 		'[tgl_pr]',
		// 		'[nama_dept]',
		// 		'[dibuat_nama]',
		// 		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[status]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
		// 		<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
		// 		</div>'
		// 	);
		// 	// <a href="[url]pembelian/edit-pr/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

	case 'load-pr-aprv':
		Event::trigger('persetujuan/load-pr-aprv/');

		$it_dept_head = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'EDP')->find_one();
		if ($user['username'] === $it_dept_head['atasan']) {
			$sql = "SELECT id, no_pr, tgl_pr, total_harga FROM pr_master WHERE tahap = 1 AND status = 'PENDING'";
		} else {
			$ga_spv = ORM::for_table('daftar_approval')->where('setting', 'GA_SPV')->find_one();
			if ($user['username'] === $ga_spv['approval']) {
				$sql = "SELECT id, no_pr, tgl_pr, total_harga FROM pr_master WHERE tahap = 2 AND status = 'PENDING'";
			} else {
				$ga_dept_head = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'GAS')->find_one();
				if ($user['username'] === $ga_dept_head['atasan']) {
					$sql = "SELECT id, no_pr, tgl_pr, total_harga FROM pr_master WHERE tahap = 3 AND status = 'PENDING'";
				} else {
					$service_head = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', 'SDH')->find_one();
					if ($user['username'] === $service_head['atasan']) {
						$sql = "SELECT id, no_pr, tgl_pr, total_harga FROM pr_master WHERE (tahap = 4 OR tahap = 6) AND status = 'PENDING'";
					} else {
						$username = $user['username'];
						$sql = "SELECT id, no_pr, tgl_pr, total_harga FROM pr_master WHERE tahap = 5 AND dir_pilihan = '$username' AND status = 'PENDING'";
					}
				}
			}
		}

		$columns = array('id', 'no_pr', 'tgl_pr', 'total_harga');
		$whereArr = array('no_pr', 'tgl_pr', 'total_harga');
		$show = array(
			'[no_pr]',
			'[tgl_pr]',
			'[total_harga]',
			'<div class="text-right">
			<a href="[url]persetujuan/persetujuan-pr1/[id]/" class="btn btn-success btn-xs capproval" id="uid[id]" title="Detail Approval"><i class="fa fa-book"></i> Detail Approval</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-pr-sup-pending':
		Event::trigger('pembelian/load-pr-pending/');
		$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master WHERE status IN ('PENDING','REVISI') AND posisi = 'PR1'";
		$show = array(
			'[tgl_pr]',
			'[no_pr]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>

			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		// <a href="[url]pembelian/edit-pr-supplier/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-pr-approved':
		Event::trigger('pembelian/load-pr-approved/');
		$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master WHERE status IN ('APPROVE') AND posisi = 'PR'";
		$show = array(
			'[tgl_pr]',
			'[no_pr]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]laporan/print-pr/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			</div>'
		);
		// <a href="[url]pembelian/supplier-pr/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Pilih Supplier</a> 
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-pr-sup-approved':
		Event::trigger('pembelian/load-pr-approved/');
		$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master WHERE status IN ('APPROVE') AND posisi = 'PR1'";
		$show = array(
			'[tgl_pr]',
			'[no_pr]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]laporan/print-pr/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-pr-rejected':
		Event::trigger('pembelian/load-pr-rejected/');
		$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master WHERE status IN ('REJECT') AND posisi = 'PR'";
		$show = array(
			'[tgl_pr]',
			'[no_pr]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-danger btn-xs" style="background-color: #FF7F7F; border-color: #FF7F7F" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/revisi-pr/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a href="[url]delete/pr/[id]/" class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);

		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-pr-sup-rejected':
		Event::trigger('pembelian/load-pr-rejected/');
		$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, status, posisi FROM pr_master WHERE status IN ('REJECT') AND posisi = 'PR1'";
		$show = array(
			'[tgl_pr]',
			'[no_pr]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-pr-supplier/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a href="[url]delete/pr/[id]/" class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

		// case 'load-po':
		// 	Event::trigger('pembelian/load-po/');
		// 	$columns = array('id','tgl_po','no_po','dibuat_nama','status');
		// 	$whereArr = array('tgl_po','no_po','dibuat_nama','status');
		// 	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, status FROM po_master ";
		// 	$show = array(
		// 		'[tgl_po]',
		// 		'[no_po]',
		// 		'[dibuat_nama]',
		// 		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
		// 		'<div class="text-right">
		// 		<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
		// 		</div>'
		// 	);
		// 	loadTable($conn, $columns, $sql, $whereArr, $show);
		// 	break;

	case 'load-po-pending':
		Event::trigger('pembelian/load-po-pending/');
		$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'status');
		$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_po, no_po, dibuat_nama, status FROM po_master WHERE status IN ('PENDING','REVISI') ";
		$show = array(
			'[tgl_po]',
			'[no_po]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-po/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-po-approved':
		Event::trigger('pembelian/load-po-approved/');
		$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'status');
		$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_po, no_po, dibuat_nama, status FROM po_master WHERE status IN ('APPROVE') ";
		$show = array(
			'[tgl_po]',
			'[no_po]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]laporan/print-po/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-po-rejected':
		Event::trigger('pembelian/load-po-rejected/');
		$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'status');
		$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_po, no_po, dibuat_nama, status FROM po_master WHERE status IN ('REJECT') ";
		$show = array(
			'[tgl_po]',
			'[no_po]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-po/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a href="delete/pembelian/[id]/" class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-spbi':
		Event::trigger('pembelian/load-spbi/');
		$columns = array('id', 'tgl_spbi', 'no_spbi', 'no_po', 'dibuat_nama', 'status');
		$whereArr = array('tgl_spbi', 'no_spbi', 'no_po', 'dibuat_nama', 'status');
		$sql = "SELECT id, tgl_spbi, no_spbi, no_po, dibuat_nama, status FROM spbi_master ";
		$show = array(
			'[tgl_spbi]',
			'[no_spbi]',
			'[no_po]',
			'[dibuat_nama]',
			'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[status]">[status]</span></div>',
			'<div class="text-right">
			<a href="[url]laporan/print-spbi/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'list-ur-aprv':
		// Event::trigger('persetujuan/load-ur-aprv/');
		$x = ORM::for_table('sys_users', 'dblogin')->find_one($user["id"]);
		$otoritas = ORM::for_table('daftar_department', 'dblogin')->where("kode_dept", $x["kode_dept"])->find_one();
		$ga_admin = ORM::for_table('daftar_approval')->where("setting", "GA_ADMIN")->find_one();
		$columns = array('id', 'no_mintabarang', 'tanggal', 'dibuat_nama', 'approval');
		$whereArr = array('no_mintabarang', 'tanggal', 'dibuat_nama', 'approval');
		$userDept = $user['kode_dept'];
		if ($user["user_type"] == "Admin") {
			$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, approval FROM mintabarang_master WHERE
				approval = 'PENDING'";
		} else {
			$bengkel = ORM::for_table('daftar_department', 'dblogin')->where_raw("nama_dept LIKE '%Bengkel%'")->find_many();
			$kode_bengkel = array();
			foreach ($bengkel as $b) {
				array_push($kode_bengkel, $b->kode_dept);
			}
			if ($user["username"] == $ga_admin["approval"]) {
				$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, approval FROM mintabarang_master WHERE
					approval = 'PENDING' AND tahap = 3";
			} else if ($userDept == 'SDH') {
				$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, approval FROM mintabarang_master WHERE
					approval = 'PENDING' AND tahap = 2";
			} else {
				$sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, approval FROM mintabarang_master WHERE
					approval = 'PENDING' AND tahap = 1 AND kode_dept = '$userDept'";
			}
		}
		// $sql = "SELECT id, no_mintabarang, dibuat_nama, tanggal, approval FROM mintabarang_master";
		$show = array(
			'[no_mintabarang]',
			'[tanggal]',
			'[dibuat_nama]',
			'[approval]',
			'<div class="text-right">
				<a href="[url]permintaanbarang/detail-ur-aprv/[id]/" class="btn btn-success btn-xs cdetail" id="uid[id]" title="Detail Approval"><i class="fa fa-book"></i>Detail Approval</a>
				</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-persetujuan-ur':
		Event::trigger('persetujuan/load-persetujuan-ur/');

		$kode_dept = $user['kode_dept'];
		$columns = array('id', 'no_mintabarang', 'tanggal', 'dibuat_nama');
		$whereArr = array('no_mintabarang', 'tanggal', 'dibuat_nama');
		$sql = "SELECT id, no_mintabarang, tanggal, dibuat_nama FROM mintabarang_master WHERE kode_dept = '$kode_dept' AND tahap = 1 AND approval = 'PENDING'";
		$show = array(
			'[no_mintabarang]',
			'[tanggal]',
			'[dibuat_nama]',
			'<div class="text-right">
			<a href="[url]persetujuan/persetujuan-ur1/[id]/" class="btn btn-success btn-xs capproval" id="uid[id]" title="Detail Approval"><i class="fa fa-book"></i> Detail Approval</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-persetujuan-ur-sdh':
		Event::trigger('persetujuan/load-persetujuan-ur-sdh/');

		$columns = array('id', 'no_mintabarang', 'tanggal', 'dibuat_nama', 'nama_dept');
		$whereArr = array('mm.no_mintabarang', 'mm.tanggal', 'mm.dibuat_nama', 'dd.nama_dept');
		$sql = "SELECT
					mm.id AS id,
					mm.no_mintabarang AS no_mintabarang,
					mm.tanggal AS tanggal,
					mm.dibuat_nama AS dibuat_nama,
					dd.nama_dept AS nama_dept
				FROM
					cmportal_gas.mintabarang_master mm
				INNER JOIN
					cmportal.daftar_department dd
				ON
					mm.kode_dept = dd.kode_dept
				WHERE
					mm.tahap = 2 AND approval = 'PENDING'
		";
		$show = array(
			'[no_mintabarang]',
			'[tanggal]',
			'[dibuat_nama]',
			'[nama_dept]',
			'<div class="text-right">
			<a href="[url]persetujuan/persetujuan-ur1/[id]/" class="btn btn-success btn-xs capproval" id="uid[id]" title="Detail Approval"><i class="fa fa-book"></i> Detail Approval</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-penerimaan-ur':
		Event::trigger('persetujuan/load-penerimaan-ur/');

		$columns = array('id', 'no_mintabarang', 'tanggal', 'dibuat_nama', 'nama_dept');
		$whereArr = array('mm.no_mintabarang', 'mm.tanggal', 'mm.dibuat_nama', 'dd.nama_dept');
		$sql = "SELECT
					mm.id AS id,
					mm.no_mintabarang AS no_mintabarang,
					mm.tanggal AS tanggal,
					mm.dibuat_nama AS dibuat_nama,
					dd.nama_dept AS nama_dept
				FROM
					cmportal_gas.mintabarang_master mm
				INNER JOIN
					cmportal.daftar_department dd
				ON
					mm.kode_dept = dd.kode_dept
				WHERE
					mm.tahap = 3 AND approval = 'PENDING'
		";
		$show = array(
			'[no_mintabarang]',
			'[tanggal]',
			'[dibuat_nama]',
			'[nama_dept]',
			'<div class="text-right">
			<a href="[url]persetujuan/penerimaan-ur1/[id]/" class="btn btn-success btn-xs cpenerimaan" id="uid[id]" title="Detail Penerimaan"><i class="fa fa-book"></i> Detail Penerimaan</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load_ur':
		Event::trigger('permintaanbarang/load-ur/');

		$kode = _post('kode');
		$x = ORM::for_table('mintabarang_detail')->where('no_mintabarang', $kode)->where_raw('sisa > 0')->find_many();
		$barang = [];
		foreach ($x as $data) {
			array_push($barang, [$data['no_mintabarang'], $data['namabarang'], $data['keperluan'], $data['sisa'], $data['tgl_diperlukan'], $data['id']]);
		}
		echo json_encode($barang);
		break;

	case 'load_pr':
		Event::trigger('permintaan/load-pr/');

		$x = ORM::for_table('pr_master')->order_by_desc('id')->find_many();
		$barang = [];
		foreach ($x as $index => $data) {
			array_push($barang, [$index + 1, $data['no_pr'], $data['tgl_pr'], $data['status'], $data['id']]);
		}
		echo json_encode($barang, JSON_UNESCAPED_UNICODE);
		break;

	case 'load-po1':
		Event::trigger('pembelian/load-po1/');

		$columns = array('id', 'no_po', 'tgl_po', 'nama_supplier', 'total_harga', 'status_bayar', 'priority');
		$whereArr = array('pm.no_po', 'pm.tgl_po', 'ds.nama_supplier', 'pm.total_harga', 'pm.tgl_lunas', 'pm.priority');
		$sql = "SELECT
						pm.id AS id,
						pm.no_po AS no_po,
						pm.tgl_po AS tgl_po,
						ds.nama_supplier AS nama_supplier,
						pm.total_harga AS total_harga,
						pm.priority AS priority,
						pm.tgl_lunas AS tgl_lunas,
						CASE 
							WHEN pm.tgl_lunas IS NULL THEN 'PO belum Lunas'
							ELSE pm.tgl_lunas
						END AS status_bayar
					FROM
						po_master pm
					INNER JOIN
						daftar_supplier ds
					ON
						pm.kd_supplier = ds.kode_supplier
		
			";

		$show = array(
			'[no_po]',
			'[tgl_po]',
			'[nama_supplier]',
			'[total_harga]',
			'[priority]',
			'[status_bayar]', // Tambahkan tanggal bayar ke kolom yang ditampilkan
			'<div class="text-right">
			<a href="[url]laporan/print-po/[id]/" class="print-po btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a class="pelunasan btn btn-warning btn-xs" value="[no_po]">Pembayaran</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	default:
		echo 'action not defined';
}
