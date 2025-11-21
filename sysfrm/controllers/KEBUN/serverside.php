<?php
_auth();
$action = $routes['2'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());
$user = User::_info();

function filterdept($user_dept) {
	$sysusers = ORM::for_table('sys_users', 'dblogin')->select('id')->where('kode_dept', $user_dept)->find_many();
	$userIds = array_map(function ($user) {
		return $user->id;
	}, $sysusers);

	$escapedUserIds = array_map(function ($userId) {
		return "'" . $userId . "'";
	}, $userIds);

	$inCondition = implode(', ', $escapedUserIds);
	return $inCondition;
}

switch ($action) {

case 'keluar-barang':
	$columns = array('id', 'no_keluarbarang', 'tanggal', 'fullname');
	$whereArr = array('a.no_keluarbarang', 'a.tanggal', 'b.fullname');
	$userId = $user['id'];
	$sql = "SELECT a.id, a.no_keluarbarang, a.tanggal, b.fullname FROM keluarbarang_master a left join cmportal.sys_users b on a.dibuat_oleh=b.id where a.status='' ";
	$show = array(
		'[no_keluarbarang]',
		'[tanggal]',
		'[fullname]',
		'<div class="text-right">
			<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
			<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Hapus"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);

	break;

case 'search-itemstock':
	$param = $_POST['q'];
	if ($param != "") {
		$text = "Text: " . $param;
		$query = "%" . $param . "%";
		$data = ORM::for_table("daftar_itemstock")->table_alias("a")->select("a.nama_item")->select("a.kode_item")->where("a.active", "Y")->where_raw('(`nama_item` LIKE ? OR `kode_item` LIKE ?)', array($query, $query))->limit(25)->find_many();
		$json = array();
		if ($data) {
			foreach ($data as $eachdata) {
				$text = $eachdata['kode_item'] . " - " . $eachdata['nama_item'];
				$s = array("id" => $eachdata['kode_item'], "text" => $text);
				array_push($json, $s);
			}
			$testing = array("results" => $json);
			header("Content-Type: application/json");
			$jsonResult = json_encode($testing, JSON_PRETTY_PRINT);
			echo $jsonResult;
		}
	}
	break;

case 'list-mintabarang':
	$columns = array('id', 'no_mintabarang', 'unit_kerja', 'nomor', 'tanggal', 'status');
	$whereArr = array('no_mintabarang', 'unit_kerja', 'nomor', 'tanggal');
	$userId = $user['id'];
	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, status FROM mintabarang_master WHERE dibuat_oleh=$userId";
	$show = array(
		'[no_mintabarang]',
		'[tanggal]',
		'[unit_kerja]',
		'[nomor]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
			<a class="btn btn-warning btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Hapus"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'list-mintabarang-pending':
	$columns = array('id', 'no_mintabarang', 'unit_kerja', 'nomor', 'tanggal', 'status');
	$whereArr = array('no_mintabarang', 'unit_kerja', 'nomor', 'tanggal');
	$userId = $user['id'];
	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, status FROM mintabarang_master WHERE status LIKE 'PENDING' AND dibuat_oleh=$userId";
	$show = array(
		'[no_mintabarang]',
		'[tanggal]',
		'[unit_kerja]',
		'[nomor]',
		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
			<a class="btn btn-warning btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Hapus"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'list-mintabarang-approved':
	$columns = array('id', 'no_mintabarang', 'unit_kerja', 'nomor', 'tanggal', 'status');
	$whereArr = array('no_mintabarang', 'unit_kerja', 'nomor', 'tanggal');
	$userId = $user['id'];
	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, status FROM mintabarang_master WHERE status LIKE 'APPROVED' AND dibuat_oleh=$userId";
	$show = array(
		'[no_mintabarang]',
		'[tanggal]',
		'[unit_kerja]',
		'[nomor]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
			<a class="btn btn-warning btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Hapus"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'list-mintabarang-rejected':
	$columns = array('id', 'no_mintabarang', 'unit_kerja', 'nomor', 'tanggal', 'status');
	$whereArr = array('no_mintabarang', 'unit_kerja', 'nomor', 'tanggal');
	$userId = $user['id'];
	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, status FROM mintabarang_master WHERE status LIKE 'REJECT' AND dibuat_oleh=$userId";
	$show = array(
		'[no_mintabarang]',
		'[tanggal]',
		'[unit_kerja]',
		'[nomor]',
		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
				<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
				<a class="btn btn-warning btn-sm cedit" id="uid[id]" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
				<a class="btn btn-danger btn-sm cdelete" id="uid[id]" title="Hapus"><i class="fa fa-trash"></i></a>
				</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

//add by Ramiro 21/02/2024 09:32
case 'list-pengeluaranbarang':
	$columns = array('id', 'no_mintabarang', 'unit_kerja', 'nomor', 'tanggal', 'status');
	$whereArr = array('no_mintabarang', 'unit_kerja', 'nomor', 'tanggal');
	$sql = "SELECT id, no_mintabarang, unit_kerja, nomor, tanggal, status FROM mintabarang_master WHERE status LIKE 'APPROVED'";
	$show = array(
		'[no_mintabarang]',
		'[tanggal]',
		'[unit_kerja]',
		'[nomor]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a class="btn btn-primary btn-sm cdetail" id="uid[id]" title="Detail"><i class="fa fa-book"></i></a>
			<a class="btn btn-danger btn-sm creject" id="uid[id]" title="Batal"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-itemstock':
	Event::trigger('itemstock/load-itemstock/');
	$columns = array('id', 'nama_item', 'satuan', 'jumlah_per_satuan', 'satuan_harga', 'active');
	$whereArr = array('nama_item', 'satuan', 'jumlah_per_satuan', 'satuan_harga', 'active');
	$sql = "SELECT id, nama_item, satuan, jumlah_per_satuan, satuan_harga, active FROM daftar_itemstock ";
	$show = array(
		'[nama_item]',
		'[satuan]',
		'[jumlah_per_satuan] / [satuan_harga]',
		'[active]',
		'<div class="text-right">
			<a href="[url]itemstock/edit/[id]/" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a href="[url]itemstock/supplier/[id]/" class="btn btn-warning btn-sm" title="Supplier"><i class="fa fa-user"></i></a>
			<a class="btn btn-danger btn-sm cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-supplier':
	Event::trigger('supplier/load-supplier/');
	$columns = array('id', 'kode_supplier', 'nama_supplier', 'bidang', 'komoditas','tgl_mulai_kerjasama', 'active');
	$whereArr = array('kode_supplier', 'nama_supplier', 'bidang', 'komoditas','tgl_mulai_kerjasama', 'active');
	$sql = "SELECT id, nama_supplier, kode_supplier, bidang, komoditas, tgl_mulai_kerjasama, active FROM daftar_supplier WHERE hidden = 0";
	$show = array(
		'[kode_supplier]',
		'[nama_supplier]',
		'[bidang]',
		'[komoditas]',
		'[tgl_mulai_kerjasama]',
		'[active]',
		'<div class="text-right">
			<a href="[url]supplier/edit/[id]/" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a class="btn btn-danger btn-sm cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

// Added by Ramiro 21/02/2024
case 'load-pengiriman':
	Event::trigger('viapengiriman/load-pengiriman/');
	$columns = array('id', 'kode_via', 'nama_pengiriman, resi');
	$whereArr = array('kode_via', 'nama_pengiriman, resi');
	$sql = "SELECT id, nama_pengiriman, kode_via, resi FROM daftar_via_pengiriman ";
	$show = array(
		'[kode_via]',
		'[nama_pengiriman]',
		'[resi]',
		'<div class="text-right">
			<a href="[url]viapengiriman/edit/[id]/" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
			<a class="btn btn-danger btn-sm cdelete" title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>
			</div>',
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
		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-spmk-bidding-pending':
	Event::trigger('pembelian/load-spmk-pending/');
	$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
	$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('PENDING','REVISI') AND posisi = 'SPMK1'";
	$show = array(
		'[tgl_spmk]',
		'[no_spmk]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="statusbidding btn btn-warning btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			</div>',
		// '<div class="text-right">
		// <a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
		// <a href="[url]pembelian/edit-spmk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
		// <a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
		// </div>'
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
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/kontraktor-spmk/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Pilih Kontraktor</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-spmk-bidding-approved':
	Event::trigger('pembelian/load-spmk-bidding-approved/');
	$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
	$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('APPROVE') AND posisi = 'SPMK1'";
	$show = array(
		'[tgl_spmk]',
		'[no_spmk]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="statusbidding btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/add-spnk/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Buat SPnK</a>
			</div>',
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
		'<div class="text-center"><span class="status btn btn-primary btn-xs" style="background-color: #FF7F7F; border-color: #FF7F7F" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-spmk-sup-rejected':
	Event::trigger('pembelian/load-spmk-rejected/');
	$columns = array('id', 'tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_spmk', 'no_spmk', 'dibuat_nama', 'priority', 'status');
	$sql = "SELECT id, tgl_spmk, no_spmk, dibuat_nama, priority, status, posisi FROM spmk_master WHERE status IN ('REJECT') AND posisi = 'SPMK1'";
	$show = array(
		'[tgl_spmk]',
		'[no_spmk]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="statusbidding btn btn-primary btn-xs" style="background-color: #FF7F7F; border-color: #FF7F7F" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk-kontraktor/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
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
		'<span class="statusktr btn btn-primary btn-xs" value="[id]">[status]</span>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spnk/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
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
		'<span class="statusktr btn btn-primary btn-xs" value="[id]">[status]</span>',
		'<div class="text-right">
		<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
		
		</div>',
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
		'<span class="statusktr btn btn-primary btn-xs" value="[id]">[status]</span>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-spmk/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-spmk-supplier/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr':
	Event::trigger('pembelian/load-pr/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status', 'posisi');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status', 'posisi');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'[posisi]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr-pending':
	Event::trigger('pembelian/load-pr-pending/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('PENDING', 'REVISI') AND posisi = 'PR'";
	// } else {
	// 	$condition = filterdept($user_dept);
	// $sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('PENDING', 'REVISI') AND posisi = 'PR' AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-pr/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr-sup-pending':
	Event::trigger('pembelian/load-pr-pending/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('PENDING','REVISI') AND posisi = 'PR1'";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('PENDING','REVISI') AND posisi = 'PR1' AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-pr-supplier/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr-approved':
	Event::trigger('pembelian/load-pr-approved/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('APPROVE') AND posisi = 'PR'";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('APPROVE') AND posisi = 'PR' AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/supplier-pr/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Pilih Supplier</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr-sup-approved':
	Event::trigger('pembelian/load-pr-approved/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('APPROVE') AND posisi = 'PR1'";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('APPROVE') AND posisi = 'PR1' AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]laporan/print-pr/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr-rejected':
	Event::trigger('pembelian/load-pr-rejected/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('REJECT') AND posisi = 'PR'";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('REJECT') AND posisi = 'PR' AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" style="background-color: #FF7F7F; border-color: #FF7F7F" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/revisi-pr/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a href="[url]delete/pr/[id]/" class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-pr-sup-rejected':
	Event::trigger('pembelian/load-pr-rejected/');
	$columns = array('id', 'tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_pr', 'no_pr', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept = "PNK") {
	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('REJECT') AND posisi = 'PR1'";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_pr, no_pr, dibuat_nama, priority, status, posisi FROM pr_master WHERE status IN ('REJECT') AND posisi = 'PR1' AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_pr]',
		'[no_pr]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" style="background-color: #FF7F7F; border-color: #FF7F7F" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-pr/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-pr-supplier/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a href="[url]delete/pr/[id]/" class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-po':
	Event::trigger('pembelian/load-po/');
	$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_po]',
		'[no_po]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-po-pending':
	Event::trigger('pembelian/load-po-pending/');
	$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE status IN ('PENDING','REVISI')";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE status IN ('PENDING','REVISI') AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_po]',
		'[no_po]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-warning btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-po/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
			<a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-po-approved':
	Event::trigger('pembelian/load-po-approved/');
	$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE status IN ('APPROVE')";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE status IN ('APPROVE') AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_po]',
		'[no_po]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]laporan/print-po/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

case 'load-po-rejected':
	Event::trigger('pembelian/load-po-rejected/');
	$columns = array('id', 'tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	$whereArr = array('tgl_po', 'no_po', 'dibuat_nama', 'priority', 'status');
	// $user_dept = $user['kode_dept'];
	// if ($user_dept == "PNK") {
	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE status IN ('REJECT')";
	// } else {
	// 	$condition = filterdept($user_dept);
	// 	$sql = "SELECT id, tgl_po, no_po, dibuat_nama, priority, status FROM po_master WHERE status IN ('REJECT') AND dibuat_oleh IN ($condition)";
	// }
	$show = array(
		'[tgl_po]',
		'[no_po]',
		'[dibuat_nama]',
		'[priority]',
		'<div class="text-center"><span class="status btn btn-danger btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]pembelian/detail-po/[id]/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
			<a href="[url]pembelian/edit-po/[id]/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
			<a href="delete/pembelian/[id]/" class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Cancel</a>
			</div>',
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
		'<div class="text-center"><span class="status btn btn-primary btn-xs" value="[id]">[status]</span></div>',
		'<div class="text-right">
			<a href="[url]laporan/print-spbi/[id]/" target="_blank" class="btn btn-primary btn-xs" id="uid[id]"><i class="fa fa-print"></i> Print</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

// Added by steven 13/12/2023
case 'load-spbi-pending':
	Event::trigger('pembelian/load-spbi-pending/');
	$columns = array('id', 'tgl_po', 'no_po', 'nama_supplier', 'dibuat_nama');
	$whereArr = array('po_master.tgl_po', 'po_master.no_po', 'daftar_supplier.nama_supplier', 'po_master.dibuat_nama');
	$sql = "SELECT po_master.id, po_master.tgl_po, po_master.no_po, daftar_supplier.nama_supplier, po_master.dibuat_nama, po_master.kode_supplier
		FROM (po_master
		INNER JOIN daftar_supplier
		ON daftar_supplier.kode_supplier LIKE CONVERT(po_master.kode_supplier USING utf32))
		WHERE po_master.status IN ('APPROVE')";
	$show = array(
		'[tgl_po]',
		'[no_po]',
		'[nama_supplier]',
		'[dibuat_nama]',
		'<div class="text-right">
				<a href="[url]pengiriman/add/[id]/" class="btn btn-success btn-xs" id="uid[id]"><i class="fa fa-plus"></i> Tambah SPBI</a>
			</div>',
	);
	loadTable($conn, $columns, $sql, $whereArr, $show);
	break;

default:
	echo 'action not defined';
}