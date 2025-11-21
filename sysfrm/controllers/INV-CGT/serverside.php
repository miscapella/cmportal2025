<?php
_auth();
$action = $routes['2'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());
$user = User::_info();

switch ($action) {

case 'load-inventaris':
	Event::trigger('inventaris/load-inventaris/');
	$columns = array('id', 'kode_inventaris', 'nama_inventaris', 'dipakai_oleh_nama');
	$whereArr = array('kode_inventaris', 'nama_inventaris', 'dipakai_oleh_nama');
	$sql = "SELECT id, kode_inventaris, nama_inventaris,
                   CASE
                       WHEN dipakai_oleh_nama IS NULL OR dipakai_oleh_nama = '' THEN '-'
                       ELSE dipakai_oleh_nama
                   END AS dipakai_oleh_nama
            FROM daftar_inventaris";
	$show = array(
		'[kode_inventaris]',
		'[nama_inventaris]',
		'[dipakai_oleh_nama]',
		'<div class="text-right">
			<a href="[url]qrcode/cetak/[id]/" target="_blank" class="btn btn-primary btn-xs" title="Cetak QR"><i class="fa fa-qrcode"></i> Cetak QR</a>
			<a href="[url]inventaris/detail/[id]/" class="btn btn-success btn-xs" title="Detail"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]inventaris/edit/[id]/" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i> Delete</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-item':
	Event::trigger('inventaris/load-item/');
	$columns = array('id', 'kode_item', 'nama_item');
	$whereArr = array('kode_item', 'nama_item');

	$inv_id = intval($_POST['inv_id']);
	$sql = "SELECT di.id, di.kode_item, di.nama_item, di.kode_inventaris, di.ada_komponen
						FROM daftar_item di
						INNER JOIN daftar_inventaris dv ON di.kode_inventaris = dv.kode_inventaris
						WHERE dv.id = $inv_id";
	$show = array(
		'[kode_item]',
		'[nama_item]',
		'[ada_komponen]',
		'<div class="text-right">
				<a href="[url]inventaris/detail-item/' . $inv_id . '/[id]/" class="btn btn-success btn-xs" title="Detail"><i class="fa fa-book"></i> Detail</a>
				<a href="[url]inventaris/edit/[id]/" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
				<a class="btn btn-danger btn-xs cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i> Delete</a>
				<button class="btn btn-info btn-xs" title="Pergantian" data-toggle="modal" data-target="#pergantianModal" data-kode-barang="[kode_item]" data-nama-barang="[nama_item]"><i class="fa fa-exchange"></i> Pergantian</button>
				<button class="btn btn-info btn-xs" title="Perbaikan" data-toggle="modal" data-target="#perbaikanModal" data-kode-barang="[kode_item]"><i class="fa fa-wrench"></i> Perbaikan</button>
				<a href="[url]inventaris/history/[id]/" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-history"></i> History</a>
				</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-komponen':
	Event::trigger('inventaris/load-komponen');
	$columns = array('id', 'kode_komponen', 'nama_komponen');
	$whereArr = array('kode_komponen', 'nama_komponen');

	$id_item = intval($_POST['id_item']);
	$sql = "SELECT dk.id, dk.kode_komponen, dk.nama_komponen, dk.kode_item
						FROM daftar_komponen dk
						INNER JOIN daftar_item di ON dk.kode_item = di.kode_item
						WHERE di.id = $id_item";
	$show = array(
		'[kode_komponen]',
		'[nama_komponen]',
		'<div class="text-right">
				<!--<a href="[url]inventaris/edit/[id]/" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i> Pembelian</a>-->
				<button class="btn btn-info btn-xs" title="Pergantian" data-toggle="modal" data-target="#pergantianModal" data-kode-barang="[kode_komponen]" data-nama-barang="[nama_komponen]"><i class="fa fa-exchange"></i> Pergantian</button>
				<button class="btn btn-info btn-xs" title="Perbaikan" data-toggle="modal" data-target="#perbaikanModal" data-kode-barang="[kode_komponen]"><i class="fa fa-wrench"></i> Perbaikan</button>
				</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'search-karyawan':
	$param = $_POST['q'];
	$json = array("results" => array());

	if ($param != "") {
		$text = "Text: " . $param;
		$query = "%" . $param . "%";
		$data = ORM::for_table("sys_users", "dblogin")
			->table_alias("a")
			->select("a.fullname")
			->select("a.id")
			->where_raw('(`fullname` LIKE ?)', array($query))
			->limit(25)
			->find_many();

		if ($data) {
			foreach ($data as $eachdata) {
				$text = $eachdata['fullname'];
				$s = array("id" => $eachdata['id'] . "-" . $eachdata['fullname'], "text" => $text);
				array_push($json['results'], $s);
			}
		}
	}

	header("Content-Type: application/json");
	echo json_encode($json, JSON_PRETTY_PRINT);
	break;

case 'load-komponen-by-kodeitem':
	$kode_item = _post('kode_item');
	$ada_komponen = false;

	$opt = '<option value="">Pilih Komponen</option>';
	$komponen_record = ORM::for_table('daftar_komponen')->where('kode_item', $kode_item)->find_many();

	foreach ($komponen_record as $komponen) {
		$opt .= '<option value="' . $komponen['kode_komponen'] . '|'. $komponen['nama_komponen'] .'">' . $komponen['nama_komponen'] . '</option>';
		$ada_komponen = true;
	}

	$data = array(
		'opt' => $opt,
		'ada_komponen' => $ada_komponen,
	);
	echo json_encode($data);
	break;

case 'load-form-pelaporan':
	Event::trigger('inventaris/load-form-pelaporan');
	$columns = array('id', 'kode_form', 'tgl_pelaporan', 'status');
	$whereArr = array('kode_form', 'tgl_pelaporan', 'status');

	$id_inventaris = intval($_POST['id_inventaris']);
	$sql = "SELECT fp.id, fp.kode_form, fp.kode_inventaris, fp.tgl_pelaporan, fp.status
						FROM form_pelaporan fp
						INNER JOIN daftar_inventaris di ON fp.kode_inventaris = di.kode_inventaris
						WHERE di.id = $id_inventaris";
	$show = array(
		'[kode_form]',
		'[tgl_pelaporan]',
		'[status]',
		'<div class="text-right">
				<a href="[url]inventaris/edit/[id]/" class="btn btn-success btn-xs" title="Detail"><i class="fa fa-book"></i> Detail</a>
				</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

default:
	echo 'action not defined';
}