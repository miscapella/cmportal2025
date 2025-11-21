<?php
// ***************************************************************************
// **                                                                       **
// ** Email : fortunate@fortunateshop.com                                   **
// ** Website : www.fortunateshop.com                                       **
// ** Copyright (c) Taniwan. All Rights Reserved                            **
// **                                                                       **
// ***************************************************************************
// **                                                                       **
// ** This software is furnished under a license and may be used and copied **
// ** only  in  accordance  with  the  terms  of such  license and with the **
// ** inclusion of the above copyright notice.                              **
// **                                                                       **
// ***************************************************************************
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', $_L['Products n Services'].'- '. $config['CompanyName']);
$ui->assign('_st', 'Parts/ Equipment');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
switch ($action) {

    case 'modal-list':
	//untuk Add Produk pada penjualan

		$d = ORM::for_table('sys_stock')->table_alias('a')->select('a.*')->select('b.sales_price')->join('sys_barang',array('a.code','=','b.code'),'b')->where('a.type','Product' )->find_many();
//        $d = ORM::for_table('sys_stock')->where('type','Product')->order_by_asc('name')->find_many();

        echo '
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>'.$_L['Products n Services'].'</h3>
			</div>
			<div class="modal-body">

			<table class="table table-striped" id="items_table">
		      <thead>
		        <tr>
        		  <th width="10%">#</th>
		          <th width="20%">'.$_L['Item Code'].'</th>
        		  <th width="55%">'.$_L['Item Name'].'</th>
        		  <th width="55%">Batch Number</th>
        		  <th width="15%">'.$_L['Price'].'</th>
		        </tr>
		      </thead>
		      <tbody>
		';

				foreach($d as $ds){
				   $price = number_format($ds['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
					echo ' <tr>
				  <td><input type="checkbox" class="si"></td>
				  <td>'.$ds['code'].'</td>
				  <td>'.$ds['name'].'</td>
				  <td>'.$ds['batch_number'].'</td>
				  <td class="price">'.$ds['sales_price'].'</td>
				</tr>';
				}

        echo '
	      </tbody>
    	</table>

		</div>
		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			<button class="btn btn-primary update">'.$_L['Select'].'</button>
		</div>';

        break;

    case 'modal-list1':
	//Utk ambil Bahan

        $d1 = ORM::for_table('sys_barang')->where('type','Service')->order_by_asc('type')->order_by_asc('name')->find_many();

        echo '
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>'.$_L['Products n Services'].'</h3>
			</div>
			<div class="modal-body">

			<table class="table table-striped" id="items_table">
		      <thead>
		        <tr>
        		  <th width="10%">#</th>
		          <th width="20%">'.$_L['Item Code'].'</th>
        		  <th width="55%">'.$_L['Item Name'].'</th>
		
        		  <th width="15%">'.$_L['Unit'].'</th>
		        </tr>
		      </thead>
		      <tbody>
		';

				foreach($d1 as $ds1){
				   $price = number_format($ds1['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
					echo ' <tr>
				  <td><input type="checkbox" class="si"></td>
				  <td>'.$ds1['code'].'</td>
				  <td>'.$ds1['name'].'</td>
		
				  <td>'.$ds1['unit'].'</td>
				</tr>';
				}

        echo '
	      </tbody>
    	</table>

		</div>
		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			<button class="btn btn-primary update">'.$_L['Select'].'</button>
		</div>';

        break;

     case 'modal-list1a':

        $d1 = ORM::for_table('sys_barang')->where('type','Kemasan')->order_by_asc('type')->order_by_asc('name')->find_many();

        echo '
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>'.$_L['Products n Services'].'</h3>
			</div>
			<div class="modal-body">

			<table class="table table-striped" id="items_table1">
		      <thead>
		        <tr>
        		  <th width="10%">#</th>
		          <th width="20%">'.$_L['Item Code'].'</th>
        		  <th width="55%">'.$_L['Item Name'].'</th>
		
        		  <th width="15%">'.$_L['Unit'].'</th>
		        </tr>
		      </thead>
		      <tbody>
		';

				foreach($d1 as $ds1){
				   $price = number_format($ds1['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
					echo ' <tr>
				  <td><input type="checkbox" class="si"></td>
				  <td>'.$ds1['code'].'</td>
				  <td>'.$ds1['name'].'</td>
		
				  <td>'.$ds1['unit'].'</td>
				</tr>';
				}

        echo '
	      </tbody>
    	</table>

		</div>
		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			<button class="btn btn-primary update1">'.$_L['Select'].'</button>
		</div>';

        break;

   case 'modal-list2':

        $d1 = ORM::for_table('sys_barang')->where_not_equal('type','Product')->order_by_asc('type')->order_by_asc('name')->find_many();

        echo '
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>'.$_L['Products n Services'].'</h3>
			</div>
			<div class="modal-body">

			<table class="table table-striped" id="items_table">
		      <thead>
		        <tr>
        		  <th width="10%">#</th>
		          <th width="20%">'.$_L['Item Code'].'</th>
        		  <th width="55%">'.$_L['Item Name'].'</th>
		
        		  <th width="15%">Harga Beli</th>
		        </tr>
		      </thead>
		      <tbody>
		';

				foreach($d1 as $ds1){
				   $price = number_format($ds1['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
					echo ' <tr>
				  <td><input type="checkbox" class="si"></td>
				  <td>'.$ds1['code'].'</td>
				  <td>'.$ds1['name'].'</td>
		
				  <td>'.$ds1['sales_price'].'</td>
				</tr>';
				}

        echo '
	      </tbody>
    	</table>

		</div>
		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			<button class="btn btn-primary update">'.$_L['Select'].'</button>
		</div>';

        break;

    case 'modal-add':
        Event::trigger('ps/modal-add/');

        $e = ORM::for_table('sys_kode')->select('kode')->where('type','U')->order_by_asc('kode')->find_many();
		$kode_data = '';
		foreach ($e as $item1) {
			$kode_data .= '<option value="S'.$item1['kode'].'">S'.$item1['kode'].'</option>';
		}
		$ui->assign('kode_data', $kode_data);
        $f = ORM::for_table('sys_kode')->select('kode')->where('type','P')->order_by_asc('kode')->find_many();
		$plant_data = '';
		foreach ($f as $item2) {
			$plant_data .= '<option value="'.$item2['kode'].'">'.$item2['kode'].'</option>';
		}
		$ui->assign('plant_data', $plant_data);
        $g = ORM::for_table('sys_kode')->select('kode')->where('type','M')->order_by_asc('kode')->find_many();
		$mark_data = '';
		foreach ($g as $item3) {
			$mark_data .= '<option value="'.$item3['kode'].'">'.$item3['kode'].'</option>';
		}
		$ui->assign('mark_data', $mark_data);
        $ui->display('modal_add_ps.tpl');


		break;
	case 'p-new':
        $ui->assign('type','Komposisi');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 'p-new');
        $ui->assign('xheader', Asset::css(array('sn/summernote','sn/summernote-bs3','modal','s2/css/select2.min')));
        $ui->assign('xfooter', Asset::js(array('numeric','jslib/add-ps','modal','s2/js/select2.min')));
        $ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');
        $c = ORM::for_table('sys_barang')->select('code')->select('name')->select('unit')->where('type','Product')->order_by_asc('code')->find_many();
        $ui->assign('c', $c);

        $max = ORM::for_table('sys_items')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);
        $ui->display('add-ps.tpl');



        break;

    case 'b-new':
		_auth1('PARTS-ADD',$user['id']);
        $ui->assign('type','Product');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 'b-new');
        $ui->assign('xheader', Asset::css(array('sn/summernote','sn/summernote-bs3','modal','s2/css/select2.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('ckeditor/ckeditor','numeric','jslib/add-ps','modal','s2/js/select2.min','btn-top/btn-top')));
        $ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');
        $d = ORM::for_table('sys_barang')->select('code')->select('name')->where('type','Service')->order_by_asc('code')->find_many();
		$equip_data = '';
		foreach ($d as $item) {
			$equip_data .= '<option value="'.$item['code'].'">'.$item['code'].' ( '.$item['name'].' )</option>';
		}
		$ui->assign('equip_data', $equip_data);
        $e = ORM::for_table('sys_kode')->select('kode')->where('type','U')->order_by_asc('kode')->find_many();
		$kode_data = '';
		foreach ($e as $item1) {
			$kode_data .= '<option value="S'.$item1['kode'].'">S'.$item1['kode'].'</option>';
		}
		$ui->assign('kode_data', $kode_data);
        $f = ORM::for_table('sys_kode')->select('kode')->where('type','P')->order_by_asc('kode')->find_many();
		$plant_data = '';
		foreach ($f as $item2) {
			$plant_data .= '<option value="'.$item2['kode'].'">'.$item2['kode'].'</option>';
		}
		$ui->assign('plant_data', $plant_data);
        $g = ORM::for_table('sys_kode')->select('kode')->where('type','M')->order_by_asc('kode')->find_many();
		$mark_data = '';
		foreach ($g as $item3) {
			$mark_data .= '<option value="'.$item3['kode'].'">'.$item3['kode'].'</option>';
		}
		$ui->assign('mark_data', $mark_data);

        $max = ORM::for_table('sys_barang')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);
        $ui->display('add-ps.tpl');



        break;

    case 's-new':

		_auth1('EQUIPMENT-ADD',$user['id']);

        $ui->assign('type','Service');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 's-new');
        $ui->assign('xfooter', Asset::js(array('numeric','jslib/add-ps')));

        $ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');

//        $max = ORM::for_table('sys_barang')->max('id');
//        $nxt = $max+1;
//        $ui->assign('nxt',$nxt);
        $ui->display('add-ps.tpl');



        break;


    case 'kemasan-new':


        $ui->assign('type','Kemasan');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 'kemasan-new');
        $ui->assign('xfooter', Asset::js(array('numeric','jslib/add-kemasan')));

        $ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');

        $max = ORM::for_table('sys_barang')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);
        $ui->display('add-kemasan.tpl');



        break;

    case 'add-post1':
        Event::trigger('ps/add-post/');

		require_once 'sysfrm/lib/qrcode/qrlib.php';
		$errorCorrectionLevel = 'H'; //'L','M','Q','H'
		$matrixPointSize = 1; //1 - 10
		
		$code = _post('code');
        $name = _post('name');
        $equip_no = _post('equip_no');
        $draw_no = _post('draw_no');
        $part_no = _post('part_no');
        $satuan = _post('satuan');
 
		$msg = '';
        if($code == '') {
			$msg .= $_L['Item Code is required'].' <br>';
		} else {
			$e = ORM::for_table('sys_barang')->select('code')->where('type','Product')->order_by_desc(substr('code',-6))->find_one();
			if($e) {
				$code4=str_pad(substr($e['code'],-6)+1,6,"0",STR_PAD_LEFT);
			}
			else
				$code4='000001';

			$code .= $code4;
		}
		if($name == ''){
			$msg .= $_L['Item Name is required'].' <br>';
		}

        if($msg == ''){
			$d = ORM::for_table('sys_barang')->create();
		
			$d->code = $code;
			$d->name = $name;
			$d->equip_no = $equip_no;
			$d->draw_no	= $draw_no;
			$d->no_part	= $part_no;
			$d->satuan	= $satuan;
			$d->type = 'Product';
			$d->added = date('Y-m-d');
            $d->e = '';
			$filename = 'uploads/qrcode/'.$code.'.png';
			QRcode::png($code, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
			$d->qrcode = $code.'.png';
            $d->save();
			_log1('Add Master Part : '.$code,$user['username'],$user['id']);

 			$data = array(
					'msg'			=>  $msg,
					'item_code'		=>  $code,
					'item_name'		=>	$name,
					'item_draw'		=>	$draw_no,
					'item_unit'		=>	$satuan,
					'item_equip'	=>	$equip_no);
			echo json_encode($data);
       }
        else{
			$data = array( 'msg' => $msg);
            echo json_encode($data);
        }

		break;
    case 'add-post':
        Event::trigger('ps/add-post/');

		require_once 'sysfrm/lib/qrcode/qrlib.php';
		$errorCorrectionLevel = 'H'; //'L','M','Q','H'
		$matrixPointSize = 1; //1 - 10

		$code = _post('code');
        $no_part = _post('no_part');
        $name = _post('name');
        $sales_price = _post('sales_price');
        $sales_price = Finance::amount_fix($sales_price);
        $item_number = _post('item_number');
        $item_number = finance::amount_fix($item_number);
		$unit = _post('unit');
        $description = _post('description');
		$spek = _post('spek');
        $type = _post('type');
        $pci_no = _post('pci_no');
        $equip_no = _post('equip_no');
        $draw_no = _post('draw_no');
        $satuan = _post('satuan');
        $pos_no = _post('pos_no');
        $material = _post('material');
        $manufacture = _post('manufacture');
        $model = _post('model');
        $od = _post('od');
        $id_data = _post('id_data');
        $ht = _post('ht');
        $berat = _post('berat');

        $msg = '';
        if($pci_no == '') {
			$msg .= 'PCI No. harus diisi <br>';
		}
        if($code == '') {
			$msg .= $_L['Item Code is required'].' <br>';
		}
		else {
			if($type<>'Komposisi') {
				if($type=='Product') {
					$e = ORM::for_table('sys_barang')->select('code')->where('type','Product')->order_by_desc(substr('code',-6))->find_one();
					if($e) {
						$code4=str_pad(substr($e['code'],-6)+1,6,"0",STR_PAD_LEFT);
					}
					else
						$code4='000001';

					$code .= $code4;
				} else {
					$x = ORM::for_table('sys_barang')->where('code',$code)->find_one();
					if($x) {
						$msg .= 'No. Equipment tersebut telah ada ! <br>';
					}
				}
			}
			else {
				$x = ORM::for_table('sys_items')->where('code',$code)->find_one();
				if($x)
					$msg .= 'Assembly tersebut telah ada ! <br>';
			}
		}
		if($type=='Komposisi') {
			$x = ORM::for_table('sys_barang')->where('code',$code)->find_one();
			if($x) {
				$name = $x['name'];
			}
		}
		else {
			if($name == ''){
				$msg .= $_L['Item Name is required'].' <br>';
			}
		}
		
       if(!is_numeric($sales_price)){
           $sales_price = '0.00';
       }


        if($msg == ''){
			if($type=='Komposisi') {
	            $d = ORM::for_table('sys_items')->create();
				$d->code = $code;
				$d->name = $name;
				//$d->target = $item_number;
			}
			else {
				$file_name = '';
				
				$allowed = array ('application/pdf', 'application/DXF','application/dxf', 'application/dwg','application/DWG', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
				if (in_array($_FILES['file']['type'], $allowed)
					&& ($_FILES["file"]["size"] < 10000000)) { //approx. 100kb files can be uploaded
					
					$path = $_FILES['file']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$file_name = $code.'.'.$ext;
					move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/drawing/'.$file_name);
					//$image = new Image();
					//$image->source_path = 'uploads/drawing/tmp.jpg';
					//$image->target_path = 'uploads/drawing/'.$file_name;
					//$image->resize('0','40',ZEBRA_IMAGE_BOXED,'-1');

					//now delete the tmp image

					//unlink('uploads/drawing/tmp.jpg');
				}

				$d = ORM::for_table('sys_barang')->create();
			
				$d->code = $code;
				$d->no_part = $no_part;
				$d->name = $name;
				$d->sales_price = $sales_price;
				$d->pci_no	= $pci_no;
				$d->equip_no	= $equip_no;
				$d->draw_no		= $draw_no;
				$d->satuan		= $satuan;
				$d->pos_no		= $pos_no;
				$d->material	= $material;
				$d->manufacture	= $manufacture;
				$d->model		= $model;
				$d->od			= $od;
				$d->id_data		= $id_data;
				$d->ht			= $ht;
				$d->berat		= $berat;
				$d->gambar		= $file_name;
				if($type=='Service')
					$d->description = $description;
				
				if($type=='Product') {
					$d->spesifikasi = $spek;
				}
//others
				$d->unit = $unit;
			}
			if($type=='Komposisi')
				$d->type = 'Product';
			else
				$d->type = $type;
			$d->added = date('Y-m-d');
            $d->e = '';
			$filename = 'uploads/qrcode/'.$code.'.png';
			QRcode::png($code, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
			$d->qrcode = $code.'.png';
            $d->save();

//add komposisi bahan
			$savecode = $d['code'];
			if($type=='Komposisi') {
				$sid = $d['id'];
				$code1 = explode(',', _post('code1'));;
				$name1 = explode(',', _post('name1'));;
				$unit1 = explode(',', _post('unit1'));;
				$i = '0';
				foreach ($code1 as $item) {
					$sunit = $unit1[$i];
					$sname= $name1[$i];
					$d = ORM::for_table('sys_items_detail')->create();
					$d-> id = $sid;
					$d->code = $item;
					$d->name = $sname;
					$d->unit = $sunit;
	
					$d->save();
					$i++;
				}
			}

            _msglog('s',$_L['Item Added Successfully']);

			if($type=='Product') {
				_log1('Add Master Part : '.$savecode,$user['username'],$user['id']);
				echo 'Berhasil Simpan SMC PN : '.$savecode;
			}
			elseif($type=='Service') {
				_log1('Add Master Eqipment : '.$savecode,$user['username'],$user['id']);
				echo 'Berhasil Simpan No. Equipment : '.$savecode;
			}
			else {
				_log1('Add Master Assembly : '.$savecode,$user['username'],$user['id']);
				echo 'Berhasil Simpan Assembly : '.$savecode;
			}
        }
        else{
            echo $msg;
        }
        break;

    case 'add-kemasan':
        Event::trigger('ps/add-kemasan/');

		$code = _post('code');
        $name = _post('name');
        $sales_price = _post('sales_price');
        $sales_price = Finance::amount_fix($sales_price);
        $item_number = _post('item_number');
        $item_number = finance::amount_fix($item_number);
		$unit = _post('unit');
        $type = _post('type');

        $msg = '';

        if($code == '') {
			$msg .= $_L['Item Code is required'].' <br>';
		}
		else {
			$x = ORM::for_table('sys_barang')->where('code',$code)->where('type','Kemasan')->find_one();
			if($x) {
				$msg .= 'Kode Kemasan tersebut telah ada ! <br>';
			}
		}
		if($name == ''){
			$msg .= $_L['Item Name is required'].' <br>';
		}
		
       if(!is_numeric($sales_price)){
           $sales_price = '0.00';
       }

        if($msg == ''){
			$d = ORM::for_table('sys_barang')->create();
		
			$d->code = $code;
			$d->name = $name;
			$d->sales_price = $sales_price;
//			$d->item_number = $item_number;
//others
			$d->unit = $unit;
			$d->type = $type;
			$d->added = date('Y-m-d');
            $d->e = '';
            $d->save();

            _msglog('s',$_L['Item Added Successfully']);
			_log1('Add Master Kemasan : '.$savecode,$user['username'],$user['id']);

            echo 'Berhasil Simpan Kode Komposisi : '.$savecode;
        }
        else{
            echo $msg;
        }
        break;

    case 'p-list':
        $paginator = Paginator::bootstrap('sys_items','type','Product');
        $d = ORM::for_table('sys_items')->where('type','Product')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Komposisi');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 'p-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>

');
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
		<script type="text/javascript" src="' . $_theme . '/lib/ps-list.js"></script>');
        $ui->display('ps-list.tpl');
        break;

    case 'b-list':
		_auth1('PART-LIST',$user['id']);
        $paginator = Paginator::bootstrap('sys_barang','type','Product');
        $d = ORM::for_table('sys_barang')->where('type','Product')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Product');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 'b-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>

');
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
		<script type="text/javascript" src="' . $_theme . '/lib/ps-list.js"></script>');
        $ui->display('ps-list.tpl');
        break;


    case 's-list':

		_auth1('EQUIPMENT-LIST',$user['id']);
        $paginator = Paginator::bootstrap('sys_barang','type','Service');
        $d = ORM::for_table('sys_barang')->where('type','Service')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Service');
		$ui->assign('_sysfrm_menu1', 'ps');
		$ui->assign('_sysfrm_menu2', 's-list');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>

');
        $ui->assign('xfooter', '
                <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
				<script type="text/javascript" src="' . $_theme . '/lib/ps-list.js"></script>

');
        $ui->display('ps-list.tpl');
        break;

    case 'kemasan-list':

        $paginator = Paginator::bootstrap('sys_barang','type','Kemasan');
        $d = ORM::for_table('sys_barang')->where('type','Kemasan')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Kemasan');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>

');
        $ui->assign('xfooter', '
                <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
				<script type="text/javascript" src="' . $_theme . '/lib/kemasan-list.js"></script>

');
        $ui->display('kemasan-list.tpl');
        break;

    case 'edit-post':
        $msg = '';
        $id = _post('id');
        $price = _post('sales_price');
        $price = Finance::amount_fix($price);
        $code = _post('code');
        $no_part = _post('no_part');
        $name = _post('name');
        $item_number = _post('item_number');
        $unit = _post('unit');
        $pci_no = _post('pci_no');
        $equip_no = _post('equip_no');
        $draw_no = _post('draw_no');
        $satuan = _post('satuan');
        $pos_no = _post('pos_no');
        $material = _post('material');
        $manufacture = _post('manufacture');
        $model = _post('model');
        $od = _post('od');
        $id_data = _post('id_data');
        $ht = _post('ht');
        $berat = _post('berat');
		$description = _post('description');
		$spek = _post('spek');
		$type = _post('type');
		if($type=='Komposisi') {
			$x = ORM::for_table('sys_barang')->where('code',$code)->find_one();
			if($x) {
				$name = $x['name'];
			}
		}
		else {
			if($name == ''){
				$msg .= 'Name is Required <br>';
			}
			if(!is_numeric($price)){
				$msg .= 'Invalid Sales Price <br>';
			}
		}
		

        if($msg == ''){
			if($type=='Komposisi')
	            $d = ORM::for_table('sys_items')->find_one($id);
			else
	            $d = ORM::for_table('sys_barang')->find_one($id);
			
            if($d){
				if($type<>'Komposisi') {
					//delete file gambar lama
					if($_FILES['file']['name']<>"") {
						if(file_exists('uploads/drawing/'.$d['gambar']))
							unlink('uploads/drawing/'.$d['gambar']);
					}
					//upload gambar baru
					$file_name = '';
					$allowed = array ('application/pdf', 'application/DXF','application/dxf', 'application/dwg','application/DWG', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
					if (in_array($_FILES['file']['type'], $allowed)
						&& ($_FILES["file"]["size"] < 10000000)) { //approx. 100kb files can be uploaded
						
						$path = $_FILES['file']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);
						$file_name = $code.'.'.$ext;
						move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/drawing/'.$file_name);
						$d->gambar		= $file_name;
					}

					$d->no_part = $no_part;
					$d->name = $name;
					$d->unit = $unit;
					$d->sales_price = $price;
					$d->pci_no		= $pci_no;
					$d->equip_no	= $equip_no;
					$d->draw_no		= $draw_no;
					$d->satuan		= $satuan;
					$d->pos_no		= $pos_no;
					$d->material	= $material;
					$d->manufacture	= $manufacture;
					$d->model		= $model;
					$d->od			= $od;
					$d->id_data		= $id_data;
					$d->ht			= $ht;
					$d->berat		= $berat;
	
					if($type=='Service')
						$d->description = $description;
					
					if($type=='Product') {
						$d->spesifikasi = $spek;
					}
				}
                $d->save();
//                echo $d->id();
				$savecode = $d['code'];
				if($type=='Komposisi') {
					$code1 = explode(',', _post('code1'));;
					$name1 = explode(',', _post('name1'));;
					$unit1 = explode(',', _post('unit1'));;
					$i = '0';
					$x = ORM::for_table('sys_items_detail')->where('id',$id)->delete_many();
					foreach ($code1 as $item) {
						$sunit = $unit1[$i];
						$sname= $name1[$i];
						$d = ORM::for_table('sys_items_detail')->create();
						$d-> id = $id;
						$d->code = $item;
						$d->name = $sname;
						$d->unit = $sunit;
		
						$d->save();
						$i++;
					}
				}

				_log1('Update Master Part : '.$savecode,$user['username'],$user['id']);
				echo "Berhasil di update !";
            }
            else{
                echo 'Not Found';
            }


        }
        else{
            echo $msg;
        }


        break;
    case 'delete':
        $id = $routes['2'];
        if($_app_stage == 'Demo'){
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_accounts')->find_one($id);
        if($d){
            $d->delete();
            r2(U . 'accounts/list', 's', $_L['account_delete_successful']);
        }

        break;

    case 'edit-form':

		$id = $routes['2'];
		$id = str_replace('pid','',$id);
		$type= $routes['3'];
		require_once 'sysfrm/lib/qrcode/qrlib.php';
		$errorCorrectionLevel = 'H'; //'L','M','Q','H'
		$matrixPointSize = 1; //1 - 10
		if($type=='Komposisi') {
			$ui->assign('_sysfrm_menu1', 'ps');
			$ui->assign('_sysfrm_menu2', 'p-list');
			$d = ORM::for_table('sys_items')->find_one($id);
		}
		else {
			if($type =='Service') {
				_auth1('EQUIPMENT-EDIT',$user['id']);
				$ui->assign('_sysfrm_menu1', 'ps');
				$ui->assign('_sysfrm_menu2', 's-list');
			}
			else {
				_auth1('PART-EDIT',$user['id']);
				$ui->assign('_sysfrm_menu1', 'ps');
				$ui->assign('_sysfrm_menu2', 'b-list');
			}
			$d = ORM::for_table('sys_barang')->find_one($id);
		}

        if($d){
			if($d['qrcode']=='') {
				$filename = 'uploads/qrcode/'.$d['code'].'.png';
				QRcode::png($d['code'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
				$d->qrcode = $d['code'].'.png';
				$d->save();
			}
            $ui->assign('d', $d);
			if($type=='Komposisi') {
				//Detail
				$items = ORM::for_table('sys_items_detail')->where('id', $d['id'])->where('type','Service')->order_by_asc('name')->find_many();
				$ui->assign('items', $items);
				$items1 = ORM::for_table('sys_items_detail')->where('id', $d['id'])->where('type','Kemasan')->order_by_asc('name')->find_many();
				$ui->assign('items1', $items1);
			}

            $price = number_format(($d['sales_price']),2,$config['dec_point'],$config['thousands_sep']);
//			$type = $d['type'];

			$equip = ORM::for_table('sys_barang')->select('code')->select('name')->where('type','Service')->order_by_asc('code')->find_many();
			$equip_data = '';
			foreach ($equip as $item) {
				if ($item['code']==$d['equip_no'])
					$selec = ' selected="selected" ';
				else
					$selec = '';
				$equip_data .= '<option value="'.$item['code'].'"'.$selec.'>'.$item['code'].' ( '.$item['name'].' )</option>';
			}
			$ui->assign('equip_data', $equip_data);

			//Assign Data Transaksi
				//data Supp QT
			$d1 = ORM::for_table('sys_purchaseitems')->table_alias('a')->select('a.*')->select('b.*')->join('sys_purchase',array('a.invoiceid','=','b.id'),'b')->select('c.*')->join('sys_invoices',array('b.quotenum','=','c.suppqtnum'),'c')->where('a.code', $d['code'])->where_not_equal('b.quotenum','')->limit(5)->order_by_desc('b.date')->find_many();
			$ui->assign('d1', $d1);
				//data Supp PO
			$d2 = ORM::for_table('sys_purchaseorder')->table_alias('a')->select('a.*')->select('b.*')->join('sys_purchase',array('a.invoiceid','=','b.id'),'b')->select('c.*')->join('sys_invoices',array('b.ordernum','=','c.suppponum'),'c')->where('a.code', $d['code'])->where_not_equal('b.ordernum','')->limit(5)->order_by_desc('b.date')->find_many();
			$ui->assign('d2', $d2);
				//data Cust QT
			$d3 = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.*')->join('sys_invoices',array('a.invoiceid','=','b.id'),'b')->where('a.code', $d['code'])->where_not_equal('b.custqtnum','')->limit(5)->order_by_desc('b.date_qt')->find_many();
			$ui->assign('d3', $d3);
				//data Cust PO
			$d4 = ORM::for_table('sys_invoiceorder')->table_alias('a')->select('a.*')->select('b.*')->join('sys_invoices',array('a.invoiceid','=','b.id'),'b')->where('a.code', $d['code'])->where_not_equal('b.custponum','')->limit(5)->order_by_desc('b.date_po')->find_many();
			$ui->assign('d4', $d4);
			//end of data transaksi
			
			$ui->assign('type', $type);
			$ui->assign('price',$price);
			$ui->assign('xheader', Asset::css(array('sn/summernote','sn/summernote-bs3','modal')));
			$ui->assign('xfooter', Asset::js(array('ckeditor/ckeditor','numeric','jslib/edit-ps','modal')));
			$ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');
	        $ui->display('edit-ps.tpl');
        }
        else{
            echo 'not found';
        }



        break;



    case 'post':

        break;

    default:
        echo 'action not defined';
}