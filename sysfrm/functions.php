<?php

$user = User::_info();

function get_client_ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}



function _log($description,$type='',$userid='0'){
    $d = ORM::for_table('sys_logs','dblogin')->create();
    $d->date = date('Y-m-d H:i:s');
    $d->type = $type;
    $d->description = $description;
    $d->userid = $userid;
    $d->ip = $_SERVER["REMOTE_ADDR"];
    $d->save();

}

function _log1($description,$username='',$userid='0'){
    $d = ORM::for_table('sys_logs')->create();
    $d->date = date('Y-m-d H:i:s');
    $d->username = $username;
    $d->description = $description;
    $d->userid = $userid;
    $d->ip = $_SERVER["REMOTE_ADDR"];
    $d->save();

}


function _auth1($kode,$userid='0') {
	$d = ORM::for_table('sys_users','dblogin')->where('id',$userid)->find_one();
	if($d['user_type'] <> 'Admin') {
		$e = ORM::for_table('daftar_otoritas_user','dblogin')->where('kode_oto',$kode)->where('user_id',$userid)->count();
		if ($e <= 0 ) {
			r2(U."dashboard",'e','Tidak mempunyai otoritas !');
		}
	}
}
function _auth2($kode,$userid='0') {
	$d = ORM::for_table('sys_users','dblogin')->where('id',$userid)->find_one();
	if($d['user_type'] <> 'Admin') {
		$e = ORM::for_table('daftar_otoritas_user','dblogin')->where('kode_oto',$kode)->where('user_id',$userid)->count();
		if ($e <= 0 ) {
			return false;
		}
	}
    return true;
}

$nav0 = '';
$nav1 = '';
$nav2 = '';
$nav3 = '';
$nav4 = '';
$nav5 = '';
$nav6 = '';
$nav7 = '';
$nav8 = '';
$nav9 = '';
$nav10 = '';
function add_menu_admin($name,$link='#',$c='',$icon='leaf',$position='5',$submenu=array()){

    if($position == '0'){
        global $nav0;
        global $routes;
        $active = '';
        if((isset($routes['1'])) AND ($routes['1']) == $c){
            $active = 'active';
        }
        if(!empty($submenu)){
            $s = '';
            foreach($submenu as $menu){
                $s .= ' <li><a href="http://localhost/ibilling/ibilling/?ng=util/activity/">Activity Log</a></li>';
            }

            $nav0 .= '<li class="'.$active.'">
                    <a href="'.$link.'"><i class="fa fa-'.$icon.'"></i> <span class="nav-label">'.$name.' </span><span class="fa arrow"></span></a>

<ul class="nav nav-second-level">
'.$s.'
</ul>
</li>';

        }
        else{
            $nav0 .= '<li class="'.$active.'"><a href="'.U.'plugins/'.'"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>';
        }

    }

    if($position == '2'){
        global $nav2;
        global $routes;
        $active = '';
        if((isset($routes['0'])) AND ($routes['0']) == $c){
            $active = 'active';
        }
        if(!empty($submenu)){
            $s = '';
            foreach($submenu as $menu){
                $s .= ' <li><a href="'.$menu[1].'">'.$menu[0].'</a></li>';
            }

            $nav2 .= '<li class="'.$active.'">
                    <a href="'.$link.'"><i class="fa fa-'.$icon.'"></i> <span class="nav-label">'.$name.' </span><span class="fa arrow"></span></a>

<ul class="nav nav-second-level">
'.$s.'
</ul>
</li>';

        }
        else{
            $nav2 .= '<li class="'.$active.'"><a href="'.$link.'"><i class="fa fa-'.$icon.'"></i> <span class="nav-label">'.$name.'</span></a></li>';
        }

    }

    if($position == '5'){
        global $nav5;
        global $routes;
        $active = '';
        if((isset($routes['0'])) AND ($routes['0']) == $c){
            $active = 'active';
        }
        if(!empty($submenu)){
            $s = '';
            foreach($submenu as $menu){
                $s .= ' <li><a href="http://localhost/ibilling/ibilling/?ng=util/activity/">Activity Log</a></li>';
            }

            $nav5 .= '<li class="'.$active.'">
                    <a href="'.$link.'"><i class="fa fa-'.$icon.'"></i> <span class="nav-label">'.$name.' </span><span class="fa arrow"></span></a>

<ul class="nav nav-second-level">
'.$s.'
</ul>
</li>';

        }
        else{
            $nav5 .= '<li class="'.$active.'"><a href="'.$link.'"><i class="fa fa-'.$icon.'"></i> <span class="nav-label">'.$name.'</span></a></li>';
        }

    }




}

$sub_menu = array();
$sub_menu['settings'] = array();
$sub_menu['crm'] = array();

function add_sub_menu_admin($parent,$name,$link){
global $sub_menu;
    $sub_menu[$parent][] = '<li><a href="'.$link.'">'.$name.'</a></li>
';

}


function add_option($option, $value){

    $d = ORM::for_table('sys_appconfig','dblogin')->where('setting',$option)->find_one();
    if($d){
        return false;
    }
    else{
        //add option
        $c = ORM::for_table('sys_appconfig','dblogin')->create();
        $c->setting = $option;
        $c->value = $value;
        $c->save();
        return true;
    }

}


function get_option($option){
    $d = ORM::for_table('sys_appconfig','dblogin')->where('setting',$option)->find_one();
    if($d){
        return $d['value'];
    }
    else{
        return false;
    }
}

function update_option($option,$value){

    $d = ORM::for_table('sys_appconfig','dblogin')->where('setting',$option)->find_one();
    if($d){
        $d->value = $value;
        $d->save();
        return true;
    }
    else{
        return false;
    }

}

function delete_option($option){
    $d = ORM::for_table('sys_appconfig','dblogin')->where('setting',$option)->find_one();
    if($d){
       $d->delete();
        return true;
    }
    else{
        return false;
    }
}


function ib_die($msg=''){
    echo $msg;
    exit;
}

function ib_close(){
    exit;
}


function get_custom_field_value($fid,$rid){

    $d = ORM::for_table('crm_customfieldsvalues')->where('fieldid',$fid)->where('relid',$rid)->find_one();

    return $d['fvalue'];

}


function ib_pg_count(){
    $d = ORM::for_table('sys_pg','dblogin')->where('status','Active')->count();
    return $d;
}


function ib_add_field_value($fieldid,$relid,$fvalue){
    $d = ORM::for_table('crm_customfieldsvalues')->create();
    $d->fieldid = $fieldid;
    $d->relid = $relid;
    $d->fvalue = $fvalue;
    $d->save();
    return true;
}


// Date Related

function ib_today(){
    return true;
}

function ib_after_1_month($from = '', $format = 'mysql'){

    if($from == ''){
        $from = strtotime(date('Y-m-d'));
    }

    if($format == 'mysql'){
        $format = 'Y-m-d';
    }

    return date($format,strtotime('+1 month',$from));

}

function ib_lan_get_line($line){
    global $_L;
    return str_replace($line,$_L[$line],$line);
}

function d2($msg = 'I am here!'){

    if(is_array($msg)){
        foreach ($msg as $m){
            echo $m. ' |
';
        }
    }
    else{
        echo $msg;
    }

    exit;

}

function d2c( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

function lan(){
    global $config;
    return $config['language'];
}

function add_js($f=array(),$v=''){

    global $ui;
    global $pl_path;

    if($v == ''){
        $ver = '';
    }
    else{
        $ver = '?ver='.$v;
    }
    $gen = '';
    if(is_array($f)){
        foreach($f as $p){
            $gen .= '<script type="text/javascript" src="'.$pl_path.'js/'.$p.'.js'.$ver.'"></script>
        ';
        }

        $ui->assign('xfooter', $gen);

        return true;

    }

    return false;

}


function add_js_external($url=array()){



    $gen = '';
    if(is_array($url)){
        foreach($url as $u){
            $gen .= '<script type="text/javascript" src="'.$u.'.js"></script>
        ';
        }



        return $gen;

    }

    return false;

}

function set_tpl($path){
    global $ui;
    $ui->assign('tplheader', $path.'header');
    $ui->assign('tplfooter', $path.'footer');
}


function language_append($path){
    global $_L;
    $file = 'sysfrm/plugins/'.$path;
    include ($file);
}

function lan_register($path){

    $x = include $path;


    var_dump($x);
    exit;


}


function add_plugin_ui_header($header=''){
    global $plugin_ui_header;
    // $plugin_ui_header .= $header;
    array_push($plugin_ui_header,$header);
}

function i_close($msg = ''){
    echo $msg;
    exit;
}

function romanic_number($integer, $upcase = true) 
{ 
	$table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
	$return = ''; 
	while($integer > 0) 
	{ 
		foreach($table as $rom=>$arb) 
		{ 
			if($integer >= $arb) 
			{ 
				$integer -= $arb; 
				$return .= $rom; 
				break; 
			} 
		} 
	} 

	return $return; 
}
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai))." rupiah";
	} else {
		$hasil = trim(penyebut($nilai))." rupiah";
	}     		
	return $hasil;
}

function replaceBracketsWithArray($array, $string) {
    $string = str_replace('[url]', U, $string);
    $string = str_replace('[app_url]', APP_URL, $string);
    return preg_replace_callback('/\[(\w+)\]/', function($match) use ($array) {
        $key = $match[1];
        if (isset($array[$key])) {
            if (preg_match('/\d{4}-\d{2}-\d{2}/', $array[$key])) {
                $date = new DateTime($array[$key]);
                return $date->format('d-m-Y');
            } else {
                return $array[$key];
            }
        } else {
            if(!$array[$key]){
                return '';
            } 
            return $match[0];
        }
    }, $string);
}

function loadTable($conn, $columns, $sql, $whereArr, $show) {
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
		foreach($show as $item) {
			$data1[] = replaceBracketsWithArray($row, $item);
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