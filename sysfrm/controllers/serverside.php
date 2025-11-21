<?php
_auth();
$action = $routes['1'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("Connection failed: " . mysqli_connect_error());

switch($action){
	case 'users':
		Event::trigger('settings/users/');
		$columns = array('id','username','fullname','atasan','emp_id');
		$whereArr = array('username','fullname','atasan','emp_id');
		$sql = "SELECT sys_users.id, sys_users.username, sys_users.fullname, daftar_department.atasan, sys_users.emp_id FROM sys_users INNER JOIN daftar_department ON sys_users.kode_dept = daftar_department.kode_dept WHERE sys_users.status = 'Active'";
		$show = array(
			'[username]',
			'[fullname]',
			'[atasan]',
			'[emp_id]',
			'<div class="text-center">
			<a href="[url]settings/users-edit/[id]/" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
            <a id="[id]" class="btn btn-xs btn-danger cdisable"><i class="fa fa-times"></i> Disable</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

	case 'user-activate':
		Event::trigger('settings/user-activate/');
		$columns = array('id','username','fullname','atasan','emp_id');
		$whereArr = array('username','fullname','atasan','emp_id');
		$sql = "SELECT sys_users.id, sys_users.username, sys_users.fullname, daftar_department.atasan, sys_users.emp_id FROM sys_users INNER JOIN daftar_department ON sys_users.kode_dept = daftar_department.kode_dept WHERE sys_users.status = 'Inactive'";
		$show = array(
			'[username]',
			'[fullname]',
			'[atasan]',
			'[emp_id]',
			'<div class="text-center">
			<a id="[id]" class="btn btn-xs btn-success cactive"><i class="fa fa-check"></i> Aktifasi</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;	
	
	case 'otoritas-user':
		Event::trigger('settings/otoritas-user/');
		$columns = array('id','username','fullname','supervisor','emp_id');
		$whereArr = array('username','fullname','supervisor','emp_id');
		$sql = "SELECT id, username, fullname, supervisor, emp_id FROM sys_users ";
		$show = array(
			'[username]',
			'[fullname]',
			'[supervisor]',
			'[emp_id]',
			'<div class="text-center">
			<a href="[url]settings/users-oto/[id]/" class="btn btn-xs btn-primary">
				<i class="fa fa-book"></i> Otoritas
			</a>
			</div>'
		);

		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;	
		
        
    default:
        echo 'action not defined';
}