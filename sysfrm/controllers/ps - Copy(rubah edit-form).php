<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
_auth();
$ui->assign('_sysfrm_menu', 'ps');
$ui->assign('_title', $_L['Products n Services'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Products n Services']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
switch ($action) {

    case 'modal-list':

        $d = ORM::for_table('sys_items')->order_by_asc('name')->find_many();

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
		
				  <td class="price">'.$price.'</td>
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

        $d1 = ORM::for_table('sys_items')->where('type','Service')->order_by_asc('name')->find_many();

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
				   $price = number_format($ds['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
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


    case 'p-new':
        $ui->assign('type','Product');
        $ui->assign('xheader', Asset::css(array('sn/summernote','sn/summernote-bs3','modal')));
        $ui->assign('xfooter', Asset::js(array('numeric','jslib/add-ps','modal')));
        $ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');

        $max = ORM::for_table('sys_items')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);
        $ui->display('add-ps.tpl');



        break;


    case 's-new':


        $ui->assign('type','Service');
        $ui->assign('xfooter', Asset::js(array('numeric','jslib/add-ps')));

        $ui->assign('xjq', '$(\'.amount\').autoNumeric(\'init\');');

        $max = ORM::for_table('sys_items')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);
        $ui->display('add-ps.tpl');



        break;


    case 'add-post':
        Event::trigger('ps/add-post/');

		$code = _post('code');
        $name = _post('name');
        $sales_price = _post('sales_price');
        $sales_price = Finance::amount_fix($sales_price);
        $item_number = _post('item_number');
		$unit = _post('unit');
		$shape = _post('shape');
		$pack = _post('pack');
        $description = _post('description');
        $type = _post('type');

        $msg = '';

        if($code == '') {
			$msg .= $_L['Item Code is required'].' <br>';
		}
		else {
			$x = ORM::for_table('sys_items')->where('code',$code)->find_one();
			if($x) {
				if($type=='Product')
					$msg .= 'Kode Produk tersebut telah ada ! <br>';
				else
					$msg .= 'Kode Bahan tersebut telah ada ! <br>';
			}
		}
		if($name == ''){
            $msg .= $_L['Item Name is required'].' <br>';
        }
       if(!is_numeric($sales_price)){
           $sales_price = '0.00';
       }


        if($msg == ''){
            $d = ORM::for_table('sys_items')->create();
			$d->code = $code;
            $d->name = $name;
            $d->sales_price = $sales_price;
            $d->item_number = $item_number;
            $d->description = $description;
            $d->type = $type;
//others
            $d->unit = $unit;
			$d->shape = $shape;
			$d->pack = $pack;
            $d->e = '';
            $d->save();

//add komposisi bahan

            $sid = $d['id'];
			$savecode = $d['code'];
			$code1 = $_POST['code1'];
			$name1 = $_POST['name1'];
			$qty=$_POST['qty'];
			$unit1=$_POST['unit1'];
            $i = '0';
            foreach ($name1 as $item) {
                $sqty = $qty[$i];
                $sqty = Finance::amount_fix($sqty);
                $sunit = $unit1[$i];
				$scode= $code1[$i];
                $d = ORM::for_table('sys_items_detail')->create();
				$d-> id = $sid;
                $d->code = $scode;
                $d->name = $item;
                $d->qty = $sqty;
                $d->unit = $sunit;

                $d->save();
                $i++;
            }


            _msglog('s',$_L['Item Added Successfully']);

            echo 'Berhasil Simpan Kode Produk : '.$savecode;
        }
        else{
            echo $msg;
        }
        break;


    case 'view':
//        $id  = $routes['2'];
//        $d = ORM::for_table('sys_items')->find_one($id);
//        if($d){
//
//            //find all activity for this user
//            $ac = ORM::for_table('sys_activity')->where('cid',$id)->limit(20)->order_by_desc('id')->find_many();
//            $ui->assign('ac',$ac);
//            $ui->assign('countries',Countries::all($d['country']));
//
//            $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
//
//');
//            $ui->assign('xfooter', '
//<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js">
//<script type="text/javascript" src="' . $_theme . '/lib/profile.js">
//
//');
//
//            $ui->assign('xjq', '
// $("#country").select2();
//
// ');
//            $ui->assign('d',$d);
//            $ui->display('ps-view.tpl');
//
//        }
//        else{
//         //   r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
//
//        }

        break;




    case 'p-list':
        $paginator = Paginator::bootstrap('sys_items','type','Product');
        $d = ORM::for_table('sys_items')->where('type','Product')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Product');
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>

');
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
		<script type="text/javascript" src="' . $_theme . '/lib/ps-list.js"></script>');
        $ui->display('ps-list.tpl');
        break;

    case 's-list':

        $paginator = Paginator::bootstrap('sys_items','type','Service');
        $d = ORM::for_table('sys_items')->where('type','Service')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Service');
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


    case 'edit-post':
        $msg = '';
        $id = _post('id');
        $price = _post('price');
        $price = Finance::amount_fix($price);
        $code = _post('code');
        $name = _post('name');
        $item_number = _post('item_number');
        $unit = _post('unit');
        $shape = _post('shape');
        $pack = _post('pack');
        $description = _post('description');
        if($name == ''){
            $msg .= 'Name is Required <br>';
        }
        if(!is_numeric($price)){
            $msg .= 'Invalid Sales Price <br>';
        }
		

        if($msg == ''){
            $d = ORM::for_table('sys_items')->find_one($id);
//                echo $d->id();
            if($d){
            	$d->code = $code;
                $d->name = $name;
//                $d->item_number = $item_number;
                $d->unit = $unit;
                $d->shape = $shape;
                $d->pack = $pack;
                $d->sales_price = $price;

				if($d['type']=='Service')
	                $d->description = $description;

                $d->save();
//                echo $d->id();
				$savecode = $d['code'];
				$code1 = $_POST['code1'];
				$name1 = $_POST['name1'];
				$qty=$_POST['qty'];
				$unit1=$_POST['unit1'];
                $i = '0';
		        $x = ORM::for_table('sys_items_detail')->where('id',$id)->delete_many();
                foreach ($name1 as $item) {
                    $sqty = $qty[$i];
                    $sqty = Finance::amount_fix($sqty);
                    $sunit = $unit1[$i];
                    $scode= $code1[$i];
                    $d = ORM::for_table('sys_items_detail')->create();
                    $d-> id = $id;
                    $d->code = $scode;
                    $d->name = $item;
                    $d->qty = $sqty;
                    $d->unit = $sunit;
    
                    $d->save();
                    $i++;
                }

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
        $d = ORM::for_table('sys_items')->find_one($id);
        if($d){
			//Detail
            $items = ORM::for_table('sys_items_detail')->where('id', $d['id'])->order_by_asc('name')->find_many();
            $ui->assign('items', $items);

            $price = number_format(($d['sales_price']),2,$config['dec_point'],$config['thousands_sep']);
			$type = $d['type'];
            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>'.$_L['Edit'].'</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="edit_form" method="post">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$d['code'].'" name="code" id="code">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">'.$_L['Name'].'</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$d['name'].'" name="name" id="name">
    </div>
  </div>
  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'; if($type=='Product') echo $_L['Price']; else echo 'Harga Beli'; echo '</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="price" value="'.$price.'" id="price">
      <input type="hidden" name="id" id="id" value="'.$d['id'].'">
    </div>
  </div>
<!--  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'.$_L['Item Number'].'</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="item_number" value="'.$d['item_number'].'" id="item_number">
      <input type="hidden" name="id" value="'.$d['id'].'">
    </div>
  </div>
-->  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'.$_L['Unit'].'</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="unit" value="'.$d['unit'].'" id="unit">
      <input type="hidden" name="id" value="'.$d['id'].'">
    </div>
  </div>
  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'.$_L['Shape'].'</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="shape" value="'.$d['shape'].'" id="shape">
      <input type="hidden" name="id" value="'.$d['id'].'">
    </div>
  </div>
  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'.$_L['Pack'].'</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="pack" value="'.$d['pack'].'" id="pack">
      <input type="hidden" name="id" value="'.$d['id'].'">
    </div>
  </div>';
 if($type=='Service') {
    echo '<div class="form-group">
    <label for="name" class="col-sm-2 control-label">'.'Fungsi'
	//$_L['Description']
	.'</label>
    <div class="col-sm-10">
      <textarea id="description" name="description" class="form-control" rows="3">'.$d['description'].'</textarea>
    </div>
  </div>';
 }
 if($type=='Product') {
	 echo "
	<table class='table invoice-table' id='invoice_items'>
		<thead>
		<tr>
			<th width='10%'>Kode</th>
			<th width='50%'>Nama Item</th>
			<th width='15%'>Qty</th>
			<th width='20%'>Satuan</th>

		</tr>
		</thead>
		<tbody>";
	foreach ($items as $item) {
		echo "
		<tr>
			<td><input type='text' class='form-control item_name' name='code1[]' id='code1' value='$item[code]' disabled=disabled></td>
			<td><input type='text' class='form-control item_name' name='name1[]' id='name1' value='$item[name]'></td>
			<td><input type='text' class='form-control qty' value='$item[qty]' name='qty[]' id='qty'></td>
			<td><input type='text' class='form-control item_price' name='unit1[]' value='$item[unit]'></td>
		</tr>";
	}
	echo "</tbody></table>
	<button type='button' class='btn btn-primary' id='item-add'><i class='fa fa-search'></i>Tambah Bahan</button>
		<button type='button' class='btn btn-danger' id='item-remove'><i class='fa fa-minus-circle'></i>Hapus</button>

					<br><br>";
 }
echo '</form>

</div>
<div class="modal-footer">

	<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
	<button id="update" class="btn btn-primary">'.$_L['Update'].'</button>
</div>';
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