<?php
_auth();

$action = $routes['2'];
$conn = mysqli_connect($db_host, $db_user, $db_password, $_SESSION['dbname']) or die("Connection failed: " . mysqli_connect_error());

switch($action){
    case 'list-approval':        
        $columns = array('a.id','a.kode_form','a.nama_form','a.fullname');
        $whereArr = array('b.nama_form','a.fullname');
        $sql = "SELECT a.id, a.kode_form, b.nama_form, a.fullname,a.approve_key,a.approval_by,
        a.approval_status,a.reject_key,comment_key FROM daftar_response a inner join form_master b on a.kode_form=b.kode_form where a.status='In Progress'";
        // $show = array(
        //     '[nama_form]',
        //     '[fullname]',
        //     '<div class="text-center">
        //         <a href="#" class="detail" value="[id]" ><u>Details</u></a>
        //      </div>',
        //     '<div class="text-right">
        //     <a class="btn btn-success btn-xs btn-list-approve">Approve</a>
        //     <a class="btn btn-danger btn-xs">Reject</a>
        //     <a class="btn btn-primary btn-xs">With Comment</a>
		// 	</div>'

        // );
        // loadTable($conn, $columns, $sql, $whereArr, $show);
        
        $params = $totalRecords = $data = $data1 = array();
        $params = $_REQUEST;
        $where = $sqlTot = $sqlRec = "";
        if( !empty($params['search']['value']) ) {
            if (strpos($sql, "WHERE")) {
                $where .= " AND ( ";
            } else {
                $where .= " WHERE ( ";
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
        if($columns[$params['order'][1]['column']] <> '')
            $sOrder = ", ". $columns[$params['order'][1]['column']]."   ".$params['order'][1]['dir'];
        else
            $sOrder = '';
        $sqlRec .=  " ORDER BY ". $columns[0]."  ".$params['order'][0]['dir'].$sOrder."  LIMIT ".$params['start']." ,".$params['length'];
        $temp = "";
        foreach($columns as $item){
            $temp .= $item;
        }
        
        $queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));
        $totalRecords = mysqli_num_rows($queryTot);
        $queryRecords = mysqli_query($conn, $sqlRec) or die($sqlRec);
        $nourut = 1;
        $approve_msg = "'Apakah anda yakin untuk approve?'";
        $reject_msg="'Apakah anda yakin untuk reject?'";
        while ($row = mysqli_fetch_array($queryRecords) ) {
            $comment_key = explode(',' , $row['comment_key']);
            $reject_key = explode(',' , $row['reject_key']);
            $approve_key = explode(',' , $row['approve_key']);
            $approval_status = explode(',' , $row['approval_status']);
            $approve_by = explode(',' , $row['approval_by']);
            $nokey=0;
            foreach($approve_by as $itemby){                
                if($itemby == $user['username'] && $approval_status[$nokey] == 'In Progress'){
                    //$data1[] = $user['username'].' && '.$approve_key[$nokey];
                    $data1[]=$nourut;
                    $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['nama_form'] .'</td>';
                    $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['fullname'] .'</td>';
                    $data1[] ='<td> <div class="text-center">
                               <a href="#" class="detail" value="'.$row["id"].'"><u>Details</u></a>
                               </div></td>';
                    
                    $data1[]='<td><div class="text-right">                              
                              <a onclick="return confirm('. $approve_msg .')" href="'. $url .'?ng=form-api/approve-form/'. $row['id'] .'/token_'. $approve_key[$nokey] .'" target="_blank" class="btn btn-success btn-xs">Approve</a>
                              <a onclick="return confirm('.$reject_msg.')" href="'.$url.'?ng=form-api/reject-form/'.$row['id'].'/token_'.$reject_key[$nokey].'" target="_blank" class="btn btn-danger btn-xs">Reject</a>
                              <a <a href="'.$url.'?ng=form-api/comment-form/'.$row['id'].'/token_'.$comment_key[$nokey].'" target="_blank" class="btn btn-primary btn-xs">With Comment</a></div></td>';
                    array_push($data, $data1);
                    unset($data1);
                    $data1 = array();
                    $nourut++;
                    break;
                }
                $nokey++;
            }
        }
        $json_data = array(
                "draw"            => intval($params['draw']),   
                "recordsTotal"    => intval($totalRecords),  
                "recordsFiltered" => intval($totalRecords),
                "data"            => $data
                );
        echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
        break;

	case 'load-datatype':
		Event::trigger('datatype/list/');
		$columns = array('id','kode','nama','tipe','status');
		$whereArr = array('kode','nama','tipe','status');
		if($user['user_type'] == 'Admin') {
			$sql = "SELECT id, kode, nama, tipe, status FROM daftar_datatype ";
		} else {
			$sql = "SELECT id, kode, nama, tipe, status FROM daftar_datatype WHERE kode LIKE '%:". $user['kode_dept'] . "' ";
		}
		$show = array(
			'[kode]',
			'[nama]',
			'[tipe]',
			'[status]',
			'<div class="text-right">
            <a href="[url]datatype/edit/[id]/" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
            <a class="btn btn-danger btn-xs cdelete" id="uid[id]"><i class="fa fa-trash"></i> Delete</a>
			</div>'
		);
		loadTable($conn, $columns, $sql, $whereArr, $show);
		break;

    case 'list-form':
        Event::trigger('form/list/');
        $columns = array('id','kode_form','nama_form','status');
        $whereArr = array('kode_form','nama_form','status');
        if($user['user_type'] == 'Admin') {
            $sql = "SELECT id, kode_form, nama_form, status FROM form_master";
        } else {
            $sql = "SELECT id, kode_form, nama_form, status FROM form_master WHERE kode_form LIKE '%/". $user['kode_dept'] . "/%' ";
        }
        $show = array(
            '[kode_form]',
            '[nama_form]',
            '[status]',
            '<div class="text-right">
            <a href="[url]form/edit/[id]/" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
            <a href="[url]form/setting/[id]/" class="btn btn-primary btn-sm"  title="Setting"><i class="fa fa-cog"></i></a>
            <a href="[url]form/approval/[id]/" class="btn btn-success btn-sm"  title="Approval"><i class="fa fa-user"></i></a>
            <a class="btn btn-danger btn-sm cdelete " title="Delete" id="uid[id]"><i class="fa fa-trash"></i></a>
            </div>'
        );
        loadTable($conn, $columns, $sql, $whereArr, $show);
        break;

    case 'list-input-form':
        Event::trigger('form/list-input/');
        $columns = array('id','kode_form','nama_form');
        $whereArr = array('kode_form','nama_form');
        $sql = "SELECT id, kode_form, nama_form FROM form_master WHERE status = 'AKTIF' ";
        $show = array(
            '[kode_form]',
            '[nama_form]',
            '<div class="text-right">
            <td class="text-right">
            <a href="[url]form/add-input/[id]" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Pilih</a>
            </td>'
        );
        loadTable($conn, $columns, $sql, $whereArr, $show);
        break;

    case 'list-form-response':
        Event::trigger('response/list-form/');
        $columns = array('id','kode_form','nama_form','status');
        $whereArr = array('kode_form','nama_form','status');
        if($user['user_type'] == 'Admin') {
            $sql = "SELECT id, kode_form, nama_form, status FROM form_master";
        } else {
            $sql = "SELECT id, kode_form, nama_form, status FROM form_master WHERE kode_form LIKE '%/". $user['kode_dept'] . "/%' ";
        }
        $show = array(
            '[kode_form]',
            '[nama_form]',
            '[status]',
            '<div class="text-right">
            <a href="[url]response/list/[id]/" class="btn btn-success btn-sm" title="Response"><i class="fa fa-book"></i></a>
            <a href="[url]response/list-detail/[id]/" class="btn btn-primary btn-sm" title="Detail Response"><i class="fa fa-bar-chart-o"></i></a>
            </div>'
        );
        loadTable($conn, $columns, $sql, $whereArr, $show);
        break;

    case 'load-detail-response':
        Event::trigger('response/list/');
        $kode1 = $routes['3'];
        $kode2 = $routes['4'];
        $kode3 = $routes['5'];
        $columns = array('id','kode_form','fullname','add_date','department','status');
        $whereArr = array('kode_form','fullname','add_date','department','status');
        $sql = "SELECT id, kode_form, fullname, add_date, department, status FROM daftar_response WHERE kode_form = '". $kode1 . "/". $kode2 . "/". $kode3 . "' ";
        $show = array(
            '[id]',
            '[add_date]',
            '[fullname]',
            '[department]',
            '<div class="text-center">
                <span class="status btn btn-primary btn-xs" value="[id]">[status]</span>
            </div>',
            '<div class="text-center">
                <a class="detail" value="[id]"><u>Details</u></a>
            </div>'
        );
        loadTable($conn, $columns, $sql, $whereArr, $show);
        break;
    
    case 'history-approval':
        Event::trigger('approve/history/');
        $user = User::_info();
        $kode1 = $routes['3'];
        $kode2 = $routes['4'];
        $kode3 = $routes['5'];
        $columns = array('add_date', 'kode_form','fullname','status');
        $whereArr = array('add_date','kode_form','fullname','status');
        $sql = "SELECT id, add_date, kode_form, fullname, status FROM daftar_response WHERE status != 'In Progress'";
        $sql = "
		SELECT daftar_response.id, daftar_response.add_date, daftar_response.kode_form, daftar_response.approval_by, daftar_response.fullname,form_master.nama_form,  daftar_response.status
		FROM daftar_response 
		INNER JOIN form_master 
		ON form_master.kode_form = daftar_response.kode_form
        WHERE daftar_response.status != 'In Progress' AND approval_by LIKE '%" . $user["username"] . "%' ";

        $show = array(
            '[add_date]',
            '[nama_form]',
            '[fullname]',
            '<div class="text-center">
                <span class="status btn btn-primary btn-xs" value="[id]">[status]</span>
            </div>',
            '<div class="text-center">
                <a class="detail" value="[id]"><u>Details</u></a>
            </div>'
        );
        loadTable($conn, $columns, $sql, $whereArr, $show);
        break;
    
    case 'history-input':
        Event::trigger('form/history-input/');
        $columns = array('add_date', 'kode_form','status');
        $whereArr = array('add_date','kode_form','status');
        $sql = "SELECT id, add_date, kode_form,  status FROM daftar_response WHERE status != 'In Progress'";
        $sql = "
		SELECT daftar_response.id, daftar_response.add_date, daftar_response.kode_form, daftar_response.approval_by,form_master.nama_form,  daftar_response.status
		FROM daftar_response 
		INNER JOIN form_master 
		ON form_master.kode_form = daftar_response.kode_form
        WHERE daftar_response.status != 'In Progress' AND approval_by LIKE '%" . $user["username"] . "%' ";

        $show = array(
            '[add_date]',
            '[nama_form]',
            '<div class="text-center">
                <a class="detail" value="[id]"><u>Details</u></a>
            </div>',
            '<div class="text-center">
            <span class="status btn btn-primary btn-xs"  value="[id]">[status]</span>
            </div>'
        );
        loadTable($conn, $columns, $sql, $whereArr, $show);
        break;    
    
    case 'list-response-detail':
        Event::trigger('response/list-detail/');
        $kode1 = $routes['3'];
        $kode2 = $routes['4'];
        $kode3 = $routes['5'];
        $columns = array('id','kode_form','emp_id','fullname','department','add_date', 'status', 'value');
        $whereArr = array('kode_form','emp_id','fullname','department','add_date', 'status', 'value');
        $sql = "SELECT id, kode_form, emp_id, fullname, department, add_date, status, value FROM daftar_response WHERE kode_form = '". $kode1 . "/". $kode2 . "/". $kode3 . "' ";

        $params = $totalRecords = $data = $data1 = array();
        $params = $_REQUEST;
        $where = $sqlTot = $sqlRec = "";
        if( !empty($params['search']['value']) ) {
            if (strpos($sql, "WHERE")) {
                $where .= " AND ( ";
            } else {
                $where .= " WHERE ( ";
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
        if($columns[$params['order'][1]['column']] <> '')
            $sOrder = ", ". $columns[$params['order'][1]['column']]."   ".$params['order'][1]['dir'];
        else
            $sOrder = '';
        $sqlRec .=  " ORDER BY ". $columns[0]."  ".$params['order'][0]['dir'].$sOrder."  LIMIT ".$params['start']." ,".$params['length'];
        $temp = "";
        foreach($columns as $item){
            $temp .= $item;
        }
        
        $queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));
        $totalRecords = mysqli_num_rows($queryTot);
        $queryRecords = mysqli_query($conn, $sqlRec) or die($sqlRec);
        $nourut = 1;
        while( $row = mysqli_fetch_array($queryRecords) ) {
            $data1[] = $nourut;
            $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['kode_form'] .'</td>';
            $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['emp_id'] .'</td>';
            $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['fullname'] .'</td>';
            $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['department'] .'</td>';
            $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['add_date'] .'</td>';
            $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $row['status'] .'</td>';
            $jawaban = explode("|", $row['value']);
            foreach($jawaban as $item) {
                $link = explode("http://cmportal.capelladaihatsu.co.id/uploads/FORM/", $item);
                if(count($link) == 2) {
                    $pisah = str_replace("http://cmportal.capelladaihatsu.co.id/uploads/FORM/","",$item);
                    $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;"><a href="http://cmportal.capelladaihatsu.co.id/uploads/FORM/'. $pisah .'" target="_blank">'. $pisah .'</a></td>';
                } else {
                    $data1[] = '<td style="text-align: center; vertical-align: middle;white-space: nowrap;">'. $item .'</td>';
                }
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
        break;

    default:
        echo 'action not defined';
}