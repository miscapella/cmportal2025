<?php
_auth();
$action = $routes['2'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());

switch($action){
	case 'list-batal-konfirmasi-mutasi':
		Event::trigger('mutasi/list-batal-konfirmasi-mutasi');
		$columns = array('TGL_CONFIRM','id','NO_CHASSIS','NO_ENGINE','KODE_SUMBER','KODE_TUJUAN');
		$whereArr = array('TGL_CONFIRM','NO_CHASSIS','NO_ENGINE','KODE_SUMBER','KODE_TUJUAN');
		$sql = "SELECT id, NO_CHASSIS, NO_ENGINE, TGL_CONFIRM, NO_BAST, KODE_SUMBER, KODE_TUJUAN FROM data_mutasimbl WHERE TGL_CONFIRM IS NOT NULL AND KODE_SUMBER LIKE 'G1001' ";
		$show = array(
            '[TGL_CONFIRM]',
            '[NO_BAST]',
			'[NO_CHASSIS]',
			'[NO_ENGINE]',
			'[KODE_SUMBER]',
            '[KODE_TUJUAN]',
			'<div class="text-right">
			    <a href="[url]mutasi/info/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Info</a>
                <a href="[url]mutasi/mutasi-batal-konfirmasi/[id]/" class="btn btn-danger btn-xs" value="[id]"><i class="fa fa-check"></i> Batal Konfirmasi</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;



	case 'history-penerimaan':
		Event::trigger('penerimaan/history/');
		$columns = array('TGLINPUT','id','NO_CHASSIS','NO_ENGINE','EXPEDISI', 'NAMA_DO');
		$whereArr = array('data_stock.TGLINPUT','data_stock.NO_CHASSIS','data_stock.NO_ENGINE','data_intransit.EXPEDISI', 'daftar_tipemobil.NAMA_DO');
		$sql = "
		SELECT data_stock.id, data_stock.TGLINPUT, data_stock.NO_CHASSIS, data_stock.NO_ENGINE, data_intransit.EXPEDISI,  data_stock.KODE_TYPE, daftar_tipemobil.NAMA_DO
		FROM ((data_stock 
		INNER JOIN data_intransit 
		ON data_intransit.NO_CHASSIS = data_stock.NO_CHASSIS AND data_intransit.NO_ENGINE = data_stock.NO_ENGINE)
		INNER JOIN daftar_tipemobil ON data_stock.KODE_TYPE =  daftar_tipemobil.KODE_DO) 
		WHERE data_stock.TGL_SAMPAI IS NOT NULL ";
		$show = array(
			'[TGLINPUT]',
			'[NO_CHASSIS]',
			'[NO_ENGINE]',
			'[EXPEDISI]',
			'[NAMA_DO]',
			'<div class="text-center">
			<a href="[url]penerimaan/info-penerimaan/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Info</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'load-penerimaan-unit':
		Event::trigger('penerimaan/load-penerimaan-unit/');
		$columns = array('TGL_BERANGKAT','id','NO_CHASSIS','NO_ENGINE','EXPEDISI','KAPAL', 'KODE_TYPE');
		$whereArr = array('TGL_BERANGKAT','NO_CHASSIS','NO_ENGINE','EXPEDISI','KAPAL', 'KODE_TYPE');
		$sql = "SELECT id, NO_CHASSIS, NO_ENGINE, EXPEDISI, KAPAL, TGL_BERANGKAT, KODE_TYPE FROM data_intransit WHERE TGL_SAMPAI IS NULL";
		$show = array(
			'[NO_CHASSIS]',
			'[NO_ENGINE]',
			'[EXPEDISI]',
			'[KAPAL]',
            '[TGL_BERANGKAT]',
            '[KODE_TYPE]',
			'<div class="text-center">
			<a href="[url]penerimaan/add/[NO_CHASSIS]/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Terima</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

    case 'load-mutasi':
		Event::trigger('mutasi/load-mutasi/');
		$columns = array('TGL_BAST','id','NO_CHASSIS','NO_ENGINE','KODE_SUMBER','KODE_TUJUAN');
		$whereArr = array('TGL_BAST','NO_CHASSIS','NO_ENGINE','KODE_SUMBER','KODE_TUJUAN');
		$sql = "SELECT id, NO_CHASSIS, NO_ENGINE, TGL_BAST, NO_BAST, KODE_SUMBER, KODE_TUJUAN FROM data_mutasimbl WHERE TGL_CONFIRM IS NULL AND (KODE_SUMBER LIKE 'G1001' OR KODE_TUJUAN LIKE 'G1001')";
		$show = array(
			'[TGL_BAST]',
			'[NO_BAST]',	
			'[NO_CHASSIS]',
			'[NO_ENGINE]',
			'[KODE_SUMBER]',
            '[KODE_TUJUAN]',
			'<div class="text-right">
			    <a href="[url]mutasi/info/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Info</a>
                <a href="[url]mutasi/mutasi-konfirmasi/[id]/" class="buttonKonfirmasi btn btn-warning btn-xs" value="[id]"><i class="fa fa-check"></i> Konfirmasi</a>
               
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

    default:
        echo 'action not defined';
}