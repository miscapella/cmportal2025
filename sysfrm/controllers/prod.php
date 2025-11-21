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
$ui->assign('_sysfrm_menu', 'production');
$ui->assign('_st', 'Produksi');
$ui->assign('_title', 'Produksi - ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);


switch ($action) {
    case 'modal-list':
//        if (isset($routes['3']) AND ($routes['3'] != '')) {
//			$scode=$routes['3'];
			$bn=$_GET['id'];
			$x = ORM::for_table('sys_prod')->where('batch_number',$bn)->find_one();
			if($x) {
				$scode = $x['code'];
				$starget = $x['target'];
				$y = ORM::for_table('sys_items')->where('code',$scode)->where('target',$starget)->find_one();
				$id = $y['id'];
				$d = ORM::for_table('sys_items_detail')->where('id',$id)->order_by_asc('code')->find_many();
	
			echo '
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>'.$_L['Services'].'</h3>
				</div>
				<div class="modal-body">
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Kode Bahan</label>
	
						<div class="col-lg-10">
							<select id="code" name="code" class="form-control" style="width:100%">
								<option value="">Pilih Kode Bahan...</option>';
								foreach($d as $ds) {
									echo '<option value="'.$ds["code"].'">'.$ds["code"].'</option>';
								}
							echo '</select>
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Nama Bahan</label>
	
						<div class="col-lg-10">
							<input type="text" disabled class="form-control item_name" name="nama" id="nama">
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">No. Batch</label>
						<div class="col-lg-10">
							<select id="batch" name="batch" class="form-control" style="width:100%">
								<option value="">Pilih Kode Bahan terlebih dahulu</option>
								</select>
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Quantity</label>
						<div class="col-lg-10">
							<input type="text" class="form-control item_name" name="qty" id="qty">
						</div>
					</div>
				</div>
	
			<div class="modal-footer">
	
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
				<button class="btn btn-primary update">Tambah</button>
			</div>';
			}
			else {
			echo '<div class="modal-footer">
				<span style="float:left;"><b>Pilih Nomor Batch terlebih dahulu !!</b></span>
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			</div>';
			}
//		}

        break;

    case 'modal-kemasan':
//        if (isset($routes['3']) AND ($routes['3'] != '')) {
//			$scode=$routes['3'];
			$bn=$_GET['id'];
			$x = ORM::for_table('sys_prod')->where('batch_number',$bn)->find_one();
			if($x) {
				$d = ORM::for_table('sys_stock')->where('type','Kemasan')->order_by_asc('code')->find_many();
	
			echo '
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Kemasan</h3>
				</div>
				<div class="modal-body">
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Kode Bahan</label>
	
						<div class="col-lg-10">
							<select id="code" name="code" class="form-control" style="width:100%">
								<option value="">Pilih Kode Bahan...</option>';
								foreach($d as $ds) {
									echo '<option value="'.$ds["code"].'">'.$ds["code"].'</option>';
								}
							echo '</select>
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Nama Bahan</label>
	
						<div class="col-lg-10">
							<input type="text" disabled class="form-control item_name" name="nama" id="nama">
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">No. Batch</label>
						<div class="col-lg-10">
							<select id="batch" name="batch" class="form-control" style="width:100%">
								<option value="">Pilih Kode Bahan terlebih dahulu</option>
								</select>
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Quantity</label>
						<div class="col-lg-10">
							<input type="text" class="form-control item_name" name="qty" id="qty">
						</div>
					</div>
				</div>
	
			<div class="modal-footer">
	
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
				<button class="btn btn-primary update">Tambah</button>
			</div>';
			}
			else {
			echo '<div class="modal-footer">
				<span style="float:left;"><b>Pilih Nomor Batch terlebih dahulu !!</b></span>
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			</div>';
			}
//		}

        break;

    case 'modal-plus':
		$bn=$_GET['id'];
		$btno=$_GET['nobatch'];
		$tr=$_GET['jtarget'];
		$e = ORM::for_table('sys_prod')->where('batch_number',$btno)->find_one();
		if($e) {
			$f = ORM::for_table('sys_items')->table_alias('a')->select('a.code')->select('b.qty')->join('sys_items_detail',array('a.id','=','b.id'),'b')->where('a.code',$e['code'] )->where('b.code',$bn)->find_one();
			if($f)
				$jtarget1=$f['qty'];
			else
				$jtarget1=0;
			$g = ORM::for_table('sys_prod_detail')->where('batch_number',$btno)->where('code',$bn)->sum(qty);
			$jtarget1=$jtarget1-$g;
		}
		$a = ORM::for_table('sys_stock')->where('code',$bn)->where_gt('item_number',0)->find_one();
		if($a) {
			$b = ORM::for_table('sys_stock')->where('code',$bn)->where_gt('item_number',0)->find_many();
	
			echo '
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>'.$bn.' - '.$a['name'].'</h3><br>'.$btno.'  (Target : '.$tr.') => Sisa : '.$jtarget1.'
				</div>
				<input type="hidden" id="modal_code" value="'.$bn.'" />
				<input type="hidden" id="modal_name" value="'.$a['name'].'" />
				<input type="hidden" id="modal_sisa" value="'.$jtarget1.'" />
				<div class="modal-body">
                    <div class="alert alert-danger" id="emsg1">
                        <span id="emsgbody1"></span>
                    </div>
					<div class="form-group"><label class="col-lg-2 control-label" for="name">No. Batch</label>
						<div class="col-lg-10">
							<select id="modal_batch" name="modal_batch" class="form-control" style="width:100%">
								<option value="">Pilih No.Batch ...</option>';
								foreach($b as $ds) {
									echo '<option value="'.$ds["batch_number"].'">'.$ds["batch_number"].'</option>';
								}
							echo '</select>
						</div>
					</div>
					&nbsp;
					<div class="form-group"><label class="col-lg-2 control-label" for="name">Quantity</label>
						<div class="col-lg-10">
							<input type="text" class="form-control item_name" name="modal_qty" id="modal_qty">
						</div>
					</div>
				</div>
	
			<div class="modal-footer">
	
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
				<button class="btn btn-primary update">Tambah</button>
			</div>';
		}
		else {
			echo '<div class="modal-footer">
				<span style="float:left;"><b>Tidak ada Stock !!</b></span>
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			</div>';
		}

        break;

    case 'view':

        Event::trigger('prod/view/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_prod')->table_alias('a')->select('a.*')->select('b.spesifikasi')->select('b.peralatan')->select('b.prosedur')->join('sys_barang',array('a.code','=','b.code'),'b')->find_one($id);
        if ($d) {
			if ($d['status']=='Close') {
				$ui->assign('d', $d);
				$ui->assign("nama",$d['pelaksana']);
				$ui->assign("nama1",$d['pemeriksa']);
				$prosedur=$d['prosedur'];
				$ui->assign('prosedur',$ui->fetch('string:'.$prosedur));
				
				$ui->assign('tgl',date('d M Y'));

				$e = ORM::for_table('sys_items_detail')->table_alias('a')->select('a.code')->select('a.name')->select('c.description')->select('c.description')->select('a.persen')->join('sys_items',array('a.id','=','b.id'),'b')->join('sys_barang',array('c.code','=','a.code'),'c')->where('b.code',$d['code'] )->find_many();
				$ui->assign('e', $e);

				//find all activity for this user
				$items = ORM::for_table('sys_prod_detail')->where('batch_number', $d['batch_number'])->order_by_asc('batch_number')->find_many();
				$ui->assign('items', $items);

				$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','sn/summernote','sn/summernote-bs3','modal','sn/summernote-sysfrm')));
				$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal','sn/summernote.min','jslib/invoice-view')));

				$x_html = '';

				Event::trigger('view_prod');


				$ui->assign('x_html',$x_html);

				$ui->display('prod-view.tpl');
			} else {
				r2(U . 'prod/list', 'e', 'Status Belum CLOSE');
			}
        } else {
            r2(U . 'prod/list', 'e', $_L['Account_Not_Found']);
        }

        break;

	case 'modal-view':
		$bn=$_GET['id'];
		$btno=$_GET['nobatch'];
		$tr=$_GET['jtarget'];
		$a = ORM::for_table('sys_prod_detail')->where('batch_number',$btno)->where('code',$bn)->find_one();
		if($a) {
			$b = ORM::for_table('sys_prod_detail')->where('batch_number',$btno)->where('code',$bn)->find_many();
	
			echo '
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>'.$bn.' - '.$a['name'].'</h3><br>'.$btno.'  (Target : '.$tr.')
				</div>
				<div class="modal-body">
                    <div class="table-responsive m-t">
                        <table class="table invoice-table" id="invoice_items">
                            <thead>
                            <tr>
                                <th width="30%">No. Batch Bahan</th>
                                <th width="10%">Qty</th>
								<th width="60%"></th>
                            </tr>
                            </thead>
                            <tbody>';
							foreach($b as $detail) {
								echo '<tr><td>'.$detail['batch'].'</td><td>'.$detail['qty'].'</td><td>&nbsp;</td></tr>';
							}
							echo '</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
		
					<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
				</div>';
		}
		else {
			echo '<div class="modal-footer">
				<span style="float:left;"><b>Belum pernah pengambilan Stock !!</b></span>
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			</div>';
		}

        break;

    case 'modal-hasil':
		$bn=$_GET['id'];
		$x = ORM::for_table('sys_prod')->where('id',$bn)->find_one();
		if($x) {
			$status=$x['status'];
			$iHasil = $x['result'];
			if($status == 'Close') {
				if($iHasil>0) {
					echo '<div class="modal-footer">
						<span style="float:left;"><b>Telah input Hasil !!</b></span>
						<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
					</div>';
				}
				else {
					echo '
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3>Input Hasil</h3>
						</div>
						<div class="modal-body">
							<div class="form-group"><label class="col-lg-2 control-label" for="name">Batch Number</label>
			
								<div class="col-lg-10">
									'.$x['batch_number'].'
								</div>
							</div>
							&nbsp;
							<div class="form-group"><label class="col-lg-2 control-label" for="name">Nama Produk</label>
			
								<div class="col-lg-10">
									'.$x['name'].'
								</div>
							</div>
							&nbsp;
							<div class="form-group"><label class="col-lg-2 control-label" for="name">Target</label>
			
								<div class="col-lg-10">
									'.$x['target'].'
								</div>
							</div>
							&nbsp;
							<div class="form-group"><label class="col-lg-2 control-label" for="name">Qty Hasil</label>
								<div class="col-lg-10">
									<input type="text" class="form-control item_name" name="qty" id="qty">
								</div>
							</div>
						</div>
						<input type="hidden" id="id" name="id" value="' . $bn . '">
			
						<div class="modal-footer">
				
							<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
							<button class="btn btn-primary update">Update</button>
						</div>';
				}
			}
			else {
			echo '<div class="modal-footer">
				<span style="float:left;"><b>Status masih OPEN !!</b></span>
				<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
			</div>';
			}
		}
		else {
		echo '<div class="modal-footer">
			<span style="float:left;"><b>Data tidak ditemukan !!</b></span>
			<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
		</div>';
		}

        break;

    case 'add':
//find all clients.

        Event::trigger('prod/add/');

        $extra_fields = '';
        $extra_jq = '';

        Event::trigger('add_prod');

        $ui->assign('extra_fields', $extra_fields);

        if (isset($routes['3']) AND ($routes['3'] != '')) {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->find_one($p_cid);
            if ($p_d) {
                $ui->assign('p_cid', $p_cid);
            }
        } else {
            $ui->assign('p_cid', '');
        }

        $ui->assign('_st', 'Tambah Batch');
//        $c = ORM::for_table('sys_items')->select('code')->select('name')->select('target')->order_by_asc('code')->find_many();
		$c = ORM::for_table('sys_items')->distinct()->select('code')->select('name')->order_by_asc('code')->find_many();
        $ui->assign('c', $c);

        $ui->assign('idate', date('d-m-Y'));


		$js_file = 'prod';
		$tpl_file = 'add-prod.tpl';

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));


        $ui->assign('xjq', '



 '.
            $extra_jq);





        $ui->display($tpl_file);


        break;


    case 'render-target':

        Event::trigger('prod/render-target/');

        $cid = _post('cid');
        $a = ORM::for_table('sys_items')->where('code',$cid)->order_by_asc('code')->find_many();
		$a_opt = '<option selected="selected" value="">Pilih Target Produksi...</option>';
		foreach ($a as $acs) {
			$a_opt .= '<option value="' . $acs['target'] . '">' . $acs['target'] . '</option>';
		}
		echo $a_opt;

        break;

    case 'render-target1':

        Event::trigger('prod/render-target1/');

        $cid = _post('cid');
		$a = ORM::for_table('sys_prod')->where('batch_number',$cid)->find_one();
		if($a) {
			echo $a['target'];
		}
		else
			echo 'Item not found !';

        break;

    case 'render-target2':

        Event::trigger('prod/render-target2/');

        $ccode = _post('ccode');
		$a = ORM::for_table('sys_barang')->where('code',$ccode)->find_one();
		if($a)
			echo $a['name'];
		else
			echo 'Item not found !';

        break;

    case 'render-target3':

        Event::trigger('prod/render-target3/');

        $ccode = _post('ccode');
		$a = ORM::for_table('sys_stock')->where('code',$ccode)->where_gt('item_number',0)->find_many();
		echo "alert('$ccode')";
		$hasil="<option value=''>Pilih No. Batch...</option>";
		if($a) {
			foreach($a as $as) {
				$hasil .= '<option>'.$as['batch_number'].'</option>';
			}
			echo $hasil;
		}
		else
			echo 'Item not found !';

        break;

	case 'render-select':
		$bn = _post('id');
		$x = ORM::for_table('sys_stock')->where('type','Kemasan')->find_many();
		if($x) {

		echo '<tr><td colspan=5 style=\'text-align:left\'><b>KEMASAN</b></td></tr>
		<tr> <td>
			<select id="code" name="code[]" class="form-control">
				<option value="">Pilih Kode Produk...</option>';
				foreach($x as $ds) {
					echo '<option value="'.$ds["code"].'">'.$ds["code"].'</option>';
				}
			echo '</select>
		</td> <td><input type="text" class="form-control item_name" id="nama" name="nama[]" readonly></td><td><input type="text" class="form-control name"  name="batch[]" id="batch" value=""></td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><button type="button" class="btn btn-success" id="btn-plus" value="'.$detail["code"].'" title="menambah batch bahan"><span class="glyphicon glyphicon-plus-sign"></span></button><button type="button" class="btn btn-info" id="btn-view" title="melihat detail batch" value="'.$detail["code"].'"><span class="glyphicon glyphicon-info-sign"></span></button></td></tr>';
		}
		break;
		
    case 'render-select1':
        $cid = _post('cid');
		$query='';
		$s = ORM::for_table('sys_prod')->where('batch_number',$cid)->find_one();
		if($s) {
			$y = ORM::for_table('sys_items')->where('code',$s['code'])->where('target',$s['target'])->find_one();
			$id = $y['id'];
			$d = ORM::for_table('sys_items_detail')->where('id',$id)->where('type','Service')->order_by_asc('code')->find_many();
			foreach($d as $detail) {
				$s = ORM::for_table('sys_prod_detail')->where('batch_number',$cid)->where('code',$detail['code'])->sum('qty');
				if($s == ''){
					$s = '0';
				}
				$query .='<tr class="item_name"> <td><input type="text" class="form-control item_name" id="code1" name="code1[]" value="'.$detail["code"].'" readonly ></td> <td><input type="text" class="form-control item_name" name="name1[]" value="'.$detail["name"].'" readonly></td> <td><input type="text" class="form-control item_name" name="qty1[]" id="qty1" value="'.$detail["qty"].'" readonly></td><td><input type="text" class="form-control item_name" name="qty2[]" id="qty'.$detail["code"].'" value="'.$s.'" readonly></td><td><button type="button" class="btn btn-success" id="btn-plus" value="'.$detail["code"].'" title="menambah batch bahan"><span class="glyphicon glyphicon-plus-sign"></span></button><button type="button" class="btn btn-info" id="btn-view" title="melihat detail batch" value="'.$detail["code"].'"><span class="glyphicon glyphicon-info-sign"></span></button></td></tr>';
			}
			echo $query;
		}
		break;
		
    case 'render-select1a':
        $cid = _post('cid');
		$query='';
		$s = ORM::for_table('sys_prod')->where('batch_number',$cid)->find_one();
		if($s) {
			$y = ORM::for_table('sys_items')->where('code',$s['code'])->where('target',$s['target'])->find_one();
			$id = $y['id'];
			$d = ORM::for_table('sys_items_detail')->where('id',$id)->where('type','Kemasan')->order_by_asc('code')->find_many();
			foreach($d as $detail) {
				$s = ORM::for_table('sys_prod_detail')->where('batch_number',$cid)->where('code',$detail['code'])->sum('qty');
				if($s == ''){
					$s = '0';
				}
				$query .='<tr class="item_name"> <td><input type="text" class="form-control item_name" id="code1" name="code1[]" value="'.$detail["code"].'" readonly ></td> <td><input type="text" class="form-control item_name" name="name1[]" value="'.$detail["name"].'" readonly></td> <td><input type="text" class="form-control item_name" name="qty1[]" id="qty1" value="'.$detail["qty"].'" readonly></td><td><input type="text" class="form-control item_name" name="qty2[]" id="qty'.$detail["code"].'" value="'.$s.'" readonly></td><td><button type="button" class="btn btn-success" id="btn-plus" value="'.$detail["code"].'" title="menambah batch bahan"><span class="glyphicon glyphicon-plus-sign"></span></button><button type="button" class="btn btn-info" id="btn-view" title="melihat detail batch" value="'.$detail["code"].'"><span class="glyphicon glyphicon-info-sign"></span></button></td></tr>';
			}
			echo $query;
		}
		break;

    case 'render-qty':
        Event::trigger('prod/render-qty/');

        $ccode = _post('ccode');
        $cqty = _post('cqty');
        $cbatch = _post('cbatch');
		$a = ORM::for_table('sys_stock')->where('code',$ccode)->where('batch_number',$cbatch)->find_one();
		if($a)
			if(intval($a['item_number'])>intval($cqty))
				echo $cqty;
			else
				echo $a['item_number'];
		else
			echo 'Item not found !';

        break;
	
	case 'addstock':
//find all clients.

        Event::trigger('prod/addstock/');

        $extra_fields = '';
        $extra_jq = '';

        Event::trigger('add_stock');

        $ui->assign('_st', 'Pengambilan Stock');
		$c = ORM::for_table('sys_prod')->select('batch_number')->select('code')->where('status','Open')->order_by_asc('batch_number')->find_many();
        $ui->assign('c', $c);

        $ui->assign('idate', date('d-m-Y'));


		$js_file = 'prod1';
		$tpl_file = 'add-prod-stock.tpl';

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));


        $ui->assign('xjq', '



 '.
            $extra_jq);





        $ui->display($tpl_file);


        break;

    case 'edit':

        Event::trigger('invoices/edit/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();
            $ui->assign('items', $items);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a', $a);
            $ui->assign('d', $d);
            $ui->assign('_st', $_L['Add Invoice']);
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->find_many();
            $ui->assign('c', $c);

            $t = ORM::for_table('sys_tax')->find_many();
            $ui->assign('t', $t);

//default idate ddate
            $ui->assign('idate', date('Y-m-d'));

            if($config['i_driver'] == 'default'){
                $js_file = 'edit-invoice-v2';
                $tpl_file = 'edit-invoice.tpl';
            }
            elseif($config['i_driver'] == 'v2'){
                $js_file = 'edit_invoice_v2n';
                $tpl_file = 'edit_invoice_v2.tpl';
            }
            else{
                $js_file = 'edit-invoice-v2';
                $tpl_file = 'edit-invoice.tpl';
            }

            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
            $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));

            $ui->assign('xjq', '



 ');

            $ui->display($tpl_file);

        } else {
            echo 'Invoice Not Found';
        }
//find all clients.


        break;

    case 'add-post':

        Event::trigger('prod/add-post/');

        $cid = _post('cid');
		$cta = _post('cta');
		$idate = date('Y-m-d', strtotime(_post('idate')));
		$no_minta = _post('no_minta');
		$no_timbang = _post('no_timbang');
		$pelaksana = _post('pelaksana');
		$pemeriksa = _post('pemeriksa');

        $msg = '';
        if ($cid == '') {
            $msg .= 'Pilih Produk <br> ';
        }
        if ($cta == '') {
            $msg .= 'Pilih Target Produksi <br> ';
        }
		if ($no_minta == '') {
            $msg .= 'Isi No Permintaan Bahan <br> ';
		}
		if ($no_timbang == '') {
            $msg .= 'Isi No Timbang <br> ';
		}
		if ($pelaksana == '') {
            $msg .= 'Isi Nama Pelaksana <br> ';
		}
		if ($pemeriksa == '') {
            $msg .= 'Isi Nama Pemeriksa <br> ';
		}
		$s = ORM::for_table('sys_prod')->where('code',$cid)->where('prod_date',$idate)->find_one();
		if($s)
            $msg .= 'Produk tersebut telah ada Produksi pada hari ini <br> ';
		

        if($msg == '') {
			$x = ORM::for_table('sys_barang')->where('code',$cid)->find_one();
			if($x) {
				$name = $x['name'];
				$unit = $x['unit'];
				$shape = $x['shape'];
				$pack = $x['pack'];
			}
			$d = ORM::for_table('sys_prod')->create();
			$batch_no = $cid.date('dmy',strtotime(_post('idate')));
			$d->batch_number = $batch_no;
			$d->code = $cid;
			$d->prod_date = $idate;
			$d->name = $name;
			$d->unit = $unit;
			$d->shape = $shape;
			$d->pack = $pack;
			$d->target = $cta;
			$d->no_minta = $no_minta;
			$d->no_timbang = $no_timbang;
			$d->pelaksana = $pelaksana;
			$d->pemeriksa = $pemeriksa;
			$d->added = date('Y-m-d');
            $d->save();

//			$y = ORM::for_table('sys_items')->where('code',$cid)->where('target',$cta)->find_one();
//			$id = $y['id'];
//			$d = ORM::for_table('sys_items_detail')->where('id',$id)->order_by_asc('code')->find_many();
//			foreach($d as $detail) {
//				$x = ORM::for_table('sys_prod_detail')->create();
//				$x->batch_number = $batch_no;
//				$x->code = $detail['code'];
//				$x->name = $detail['name'];
//				$x->unit = $detail['unit'];
//				$x->save();
//			}

            _msglog('s',$_L['Item Added Successfully']);
	        _log('Tambah Batch Produksi : '.$batch_no,'Admin',$user['id']);

            echo 'Berhasil Simpan Produksi : '.$batch_no;
		}
		else {
            echo $msg;
        }


        break;

    case 'add-post-stock':

        Event::trigger('prod/add-post-stock/');

        $cid = _post('cid');
		$idate = date('Y-m-d');
		$modal_code = _post('modal_code');
		$modal_name = _post('modal_name');
		$modal_batch = _post('modal_batch');
		$modal_qty = _post('modal_qty');
		$modal_sisa = _post('modal_sisa');
		$penimbang = _post('penimbang');
		$periksa_timbang = _post('periksa_timbang');

        $msg = '';

		if (empty($modal_batch))
            $msg .= 'Belum pilih No.Batch <br> ';
		
		$x = ORM::for_table('sys_prod_detail')->where('batch_number',$cid)->where('code',$modal_code)->where('batch',$modal_batch)->find_one();
		if($x)
            $msg .= 'Tidak berhasil update ! No. Batch tersebut sudah pernah di input <br> ';

		if($modal_qty<=0)
            $msg .= 'Kesalahan Input Qty <br> ';
		
		if($modal_sisa-$modal_qty<0)
			$msg .= 'Qty melebihi batas yang dibutuhkan <br>';

		if($penimbang=='')
			$msg .= 'Belum mengisi Nama Penimbang <br>';

		if($periksa_timbang=='')
			$msg .= 'Belum mengisi Nama Pemeriksa Timbangan <br>';

			if($msg == '') {
			//kembalikan stock
			try
			{
//				$x = ORM::for_table('sys_prod_detail')->where('batch_number',$cid)->find_many();
//				foreach ($x as $detail) {
//					$y = ORM::for_table('sys_stock')->where('code',$detail['code'])->where('batch_number',$detail['batch'])->find_one();
//					if($y) {
//						$cqty = $detail['qty'] + $y['item_number'];
//						$y->item_number = $cqty;
//						$y->save();
//					}
//					$z = ORM::for_table('sys_barang')->where('code',$detail['code'])->find_one();
//					if($z) {
//						$cqty = $detail['qty'] + $z['item_number'];
//						$z->item_number = $cqty;
//						$z->save();
//					}
//				}
//	        	$x = ORM::for_table('sys_prod_detail')->where('batch_number',$cid)->delete_many();
			// end
			
				$modal_qty = Finance::amount_fix($modal_qty);
				$d = ORM::for_table('sys_prod_detail')->create();
				$d-> batch_number = $cid;
				$d->code = $modal_code;
				$d->name = $modal_name;
				$d->qty = $modal_qty;
				$d->batch = $modal_batch;
				$d->penimbang = $penimbang;
				$d->periksa_timbang = $periksa_timbang;
				$d->added = $idate;

				//Update Tabel Stock
				$unit = '';
				$gudang = '';
				$e = ORM::for_table('sys_stock')->where('code',$modal_code)->where('batch_number',$modal_batch)->find_one();
				if($e) {
					$cqty= $e['item_number'] - $modal_qty;
					$unit = $e['unit'];
					$gudang = $e['id_gudang'];
					$e->item_number = $cqty;
					$e->save();
				}
				$d->unit = $unit;
				$d->save();
				
				//update Tabel LapStock
				$x = ORM::for_table('sys_barang')->where('code',$modal_code)->find_one();
				$g = ORM::for_table('lapstock')->where('code',$modal_code)->order_by_desc('id')->find_one();
				if($g)
					$saldo=$g['saldo'];
				else
					$saldo=0;
				$f = ORM::for_table('lapstock')->create();
				$f->date = $idate;
				$f->type_acc = 'Kredit';
				$f->batch_number = $modal_batch;
				$f->code = $modal_code;
				$f->name = $x['name'];
				$f->unit = $x['unit'];
				$f->kredit = $modal_qty;
				$f->saldo = $saldo - $modal_qty;
				$f->shape = $x['shape'];
				$f->pack = $x['pack'];
				$f->type = $x['type'];
				$f->id_gudang = $gudang;
				$f->save();
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}

            _msglog('s',$_L['Item Added Successfully']);
	        _log('Tambah Bahan untuk Batch Produksi : '.$cid,'Admin',$user['id']);

            echo 'Berhasil Menambah Batch pada Bahan Produksi : '.$modal_code;
		}
		else {
            echo $msg;
        }


        break;

    case 'add-hasil':

        Event::trigger('prod/add-hasil/');

        $cid = _post('cid');
		$idate = date('Y-m-d');
		$modal_qty = _post('modal_qty');

        $msg = '';

        if (intval($modal_qty) <= 0) {
            $msg .= 'Belum mengisi Qty Hasil, Data tidak tersimpan';
        }

        if($msg == '') {
			//kembalikan stock
			try
			{
				$modal_qty = Finance::amount_fix($modal_qty);
				$d = ORM::for_table('sys_prod')->where('id',$cid)->find_one();
				$saveqty = $d['result'];
				$d->result = $modal_qty;
				$d->result_date = $idate;
				$d->save();

				$z = ORM::for_table('sys_barang')->where('code',$d['code'])->find_one();
//				if($z) {
//					$cqty = $z['item_number'] - $saveqty + $modal_qty;
//					$z->item_number = $cqty;
//					$z->save();
//				}
//				$e = ORM::for_table('sys_stock')->where('code',$d['code'])->where('batch_number',$d['batch_number'])->delete_many();
				$e = ORM::for_table('sys_stock')->where('code',$d['code'])->where('batch_number',$d['batch_number'])->find_one();
				if(!$e) {
					$e = ORM::for_table('sys_stock')->create();
					$e->batch_number = $d['batch_number'];
					$e->code = $d['code'];
					$e->name = $d['name'];
					$e->unit = $z['unit'];
					$e->shape = $z['shape'];
					$e->pack = $z['pack'];
					$e->type = 'Product';
				}
				$e->item_number = $modal_qty;
				$e->add_date = $idate;
				$e->save();
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}

            _msglog('s',$_L['Item Added Successfully']);
	        _log('Tambah Produk untuk Batch Produksi : '.$d['code'],'Admin',$user['id']);

            echo 'Berhasil Menambah Produk dengan Batch Number : '.$d['batch_number'];
		}
		else {
            echo $msg;
        }


        break;

    case 'list':

        Event::trigger('prod/list/');

//        $ui->assign('xfooter', Asset::js(array('numeric')));
        $paginator = Paginator::bootstrap('sys_prod');
        $d = ORM::for_table('sys_prod')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('prod_date')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);

		$js_file = 'prod_list';

		$ui->assign('xheader', Asset::css(array('modal')));
		$ui->assign('xfooter', Asset::js(array('s2/js/i18n/'.lan(),'modal','numeric',$js_file)));

        $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/prod/" + id;
           }
        });
    });
 ');
        $ui->display('list-prod.tpl');
        break;

    case 'list-recurring':

        $d = ORM::for_table('sys_invoices')->where_not_equal('r', '0')->order_by_desc('id')->find_many();
        $ui->assign('d', $d);
        $ui->assign('xjq', '
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/invoice/" + id;
           }
        });
    });

     $(".cstop").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("Are you sure? This will prevent future invoice generation from this invoice.", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "invoices/stop_recurring/" + id;
           }
        });
    });

 ');
        $ui->display('list-recurring-invoices.tpl');
        break;

    case 'edit-post':

        Event::trigger('invoices/edit-post/');

        $cid = _post('cid');
        $iid = _post('iid');
        //find user with cid
        $u = ORM::for_table('crm_accounts')->find_one($cid);

        $msg = '';
        if ($cid == '') {
            $msg .= $_L['select_a_contact'].' <br> ';
        }

        $notes = _post('notes');


        if (isset($_POST['amount'])) {
            $amount = $_POST['amount'];
        } else {
            $msg .= $_L['at_least_one_item_required'].' <br> ';
        }



        $idate = _post('idate');
        $its = strtotime($idate);
        $duedate = _post('ddate');
        $repeat = _post('repeat');
        $nd = $idate;
        if ($repeat == '0') {
            $r = '0';
        } elseif ($repeat == 'week1') {
            $r = '+1 week';
            $nd = date('Y-m-d', strtotime('+1 week', $its));
        } elseif ($repeat == 'weeks2') {
            $r = '+2 weeks';
            $nd = date('Y-m-d', strtotime('+2 weeks', $its));
        } elseif ($repeat == 'month1') {


            $r = '+1 month';
            $nd = date('Y-m-d', strtotime('+1 month', $its));

        } elseif ($repeat == 'months2') {
            $r = '+2 months';
            $nd = date('Y-m-d', strtotime('+2 months', $its));
        } elseif ($repeat == 'months3') {
            $r = '+3 months';
            $nd = date('Y-m-d', strtotime('+3 months', $its));
        } elseif ($repeat == 'months6') {
            $r = '+6 months';
            $nd = date('Y-m-d', strtotime('+6 months', $its));
        } elseif ($repeat == 'year1') {
            $r = '+1 year';
            $nd = date('Y-m-d', strtotime('+1 year', $its));
        } elseif ($repeat == 'years2') {
            $r = '+2 years';
            $nd = date('Y-m-d', strtotime('+2 years', $its));
        } elseif ($repeat == 'years3') {
            $r = '+3 years';
            $nd = date('Y-m-d', strtotime('+3 years', $its));
        } else {
            $msg .= 'Date Parsing Error <br> ';
        }


        if ($msg == '') {


            $qty = $_POST['qty'];


            if(isset($_POST['taxed'])){
                $taxed = $_POST['taxed'];

            }
            else{
                $taxed = false;
            }

            $sTotal = '0';
            $taxTotal = '0';
            $i = '0';
            $a = array();

            $taxval = '0.00';
            $taxname = '';
            $taxrate = '0.00';
            $tax = _post('tid');
            $taxed_type = _post('taxed_type');
            if ($tax != '') {
                $dt = ORM::for_table('sys_tax')->find_one($tax);
                $taxrate = $dt['rate'];
                $taxname = $dt['name'];
                $taxtype = $dt['type'];
                //


            }


            $taxed_amount = 0.00;

            foreach ($amount as $samount) {
                $samount = Finance::amount_fix($samount);
                $a[$i] = $samount;
                /* @since v 2.0 */
                $sqty = $qty[$i];

                $sqty = Finance::amount_fix($sqty);
//                if (($config['dec_point']) == ',') {
//                    $samount = str_replace(',', '.', $samount);
//                    $sqty = str_replace(',', '.', $sqty);
//
//                }

                $sTotal += $samount * ($sqty);

                if($taxed){
                    $c_tax = $taxed[$i];
                }
                else{
                    $c_tax = 'No';
                }


                if($c_tax == 'Yes'){
                   // $a_tax = ($samount * $taxrate) / 100;
                    $taxed_amount += $sTotal;
                }
                else{
                    $a_tax = 0.00;
                }



                $i++;
            }


            $invoicenum = _post('invoicenum');
            $cn = _post('cn');


            $fTotal = $sTotal;



            // calculate discount

            $discount_amount = _post('discount_amount');
            $discount_type = _post('discount_type');
            $discount_value = '0.00';


            if($discount_amount == '0' OR $discount_amount == ''){
                $actual_discount = '0.00';
            }
            else{
                if($discount_type == 'f'){

                    $actual_discount = $discount_amount;
                    $discount_value = $discount_amount;

                }

                else{

                    $discount_type = 'p';
                    $actual_discount = ($sTotal * $discount_amount) / 100;
                    $discount_value = $discount_amount;

                }
            }


            $actual_discount = number_format((float)$actual_discount, 2, '.', '');



            $fTotal = $fTotal - $actual_discount;

            if($taxed_amount != 0.00){
                $taxval = ($taxed_amount * $taxrate) / 100;
            }




            if (($taxed_type != 'individual') AND ($tax != '')) {

                $taxval = ($fTotal * $taxrate) / 100;




            }




            $fTotal = $fTotal + $taxval;



            //

            // $vtoken = _raid(10);
            // $ptoken = _raid(10);
            $d = ORM::for_table('sys_invoices')->find_one($iid);
            if ($d) {
                $d->userid = $cid;
                $d->account = $u['account'];
                $d->date = $idate;
                $d->duedate = $duedate;
                $d->discount_type = $discount_type;
                $d->discount_value = $discount_value;
                $d->discount = $actual_discount;
                $d->subtotal = $sTotal;
                $d->total = $fTotal;
                $d->tax = $taxval;
                $d->taxname = $taxname;
                $d->taxrate = $taxrate;
                $d->notes = $notes;
                $d->r = $r;
                $d->nd = $nd;
                $d->invoicenum = $invoicenum;
                $d->cn = $cn;
                /*
                 * $d->userid = $cid;
            $d->account = $u['account'];
            $d->date = $idate;
            $d->duedate = $dd;
            $d->subtotal = $sTotal;
            $d->total = $fTotal;
            $d->tax = $taxval;
            $d->taxname = $taxname;
            $d->taxrate = $taxrate;
            $d->vtoken = $vtoken;
            $d->ptoken = $ptoken;
            $d->status = 'Unpaid';
            $d->notes = $notes;
            $d->r = $r;
            $d->nd = $nd;
                 */

                //  $d->status = 'Unpaid';
                $d->save();
                $invoiceid = $iid;
                $description = $_POST['desc'];

                // $taxed = $_POST['taxed'];
             //   $taxed = '0';
                $i = '0';
// first delete all related items
                $x = ORM::for_table('sys_invoiceitems')->where('invoiceid', $iid)->delete_many();
                foreach ($description as $item) {

                    $samount = $a[$i];
                    /* @since v 2.0 */
                    $sqty = $qty[$i];
                    $sqty = Finance::amount_fix($sqty);
                    $samount = Finance::amount_fix($samount);
                    $ltotal = ($samount) * ($sqty);
                    $d = ORM::for_table('sys_invoiceitems')->create();
                    $d->invoiceid = $invoiceid;
                    $d->userid = $cid;
                    $d->description = $item;
                    $d->qty = $sqty;
                    $d->amount = $samount;
                    $d->total = $ltotal;

//                    if (($taxed[$i]) == 'Yes') {
//                        $d->taxed = '1';
//                    } else {
//                        $d->taxed = '0';
//                    }


                    if($taxed){

                        if (($taxed[$i]) == 'Yes') {
                            $d->taxed = '1';
                        } else {
                            $d->taxed = '0';
                        }

                    }
                    else{
                        $d->taxed = '0';
                    }

                    //others
                    $d->type = '';
                    $d->relid = '0';
                    $d->itemcode = '';
                    $d->taxamount = '0.00';
                    $d->duedate = date('Y-m-d');
                    $d->paymentmethod = '';
                    $d->notes = '';
                    $d->save();
                    $i++;
                }

                echo $invoiceid;
            } else {

                // invoice not found
            }

        } else {
            echo $msg;
        }

        break;

    case 'delete':

        Event::trigger('prod/delete/');

        $id = $routes['2'];
        if ($_app_stage == 'Demo') {
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if ($d) {
            $d->delete();
            r2(U . 'prod/list', 's', $_L['account_delete_successful']);
        }

        break;

    case 'status':

        Event::trigger('prod/status/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_prod')->where('id',$id)->find_one();
        if ($d) {
			$result = $d['result_date'];
			if(is_null($result) || $result == '0000-00-00') {
				if($d['status']=='Open') {
					//Cek apakaah telah full input ambil bahan
					$flag=true;
					$e = ORM::for_table('sys_items')->table_alias('a')->select('b.code')->select('b.qty')->join('sys_items_detail',array('a.id','=','b.id'),'b')->where('a.code',$d['code'] )->find_many();
					foreach ($e as $acs) {
						if($e) {
							$jtarget=$acs['qty'];
							$f = ORM::for_table('sys_prod_detail')->where('batch_number',$d['batch_number'])->where('code',$acs['code'])->sum(qty);
							if($jtarget-$f>0)
								$flag=false;
						}
					}

					//Ganti Status
					if($flag) {
						$d->time_start = date('H:i:s');
						$d->status = 'Start';
					}
					else
						r2(U . 'prod/list', 'e', 'Input Bahan belum full !');
				}
				elseif($d['status'] == 'Start') {
					$d->time_stop = date('H:i:s');
					$d->status = 'Stop';
				}
				elseif($d['status'] == 'Stop')
					$d->status = 'Close';
				elseif($d['status'] == 'Close')
					$d->status = 'Open';
				
				$d->save();
			
				r2(U . 'prod/list', 's', 'Berhasil update Status');
			}
			else
				r2(U . 'prod/list', 'e', 'Sudah pernah input Hasil, tidak bisa ganti status');
        }

        break;

    case 'print':

        Event::trigger('invoices/print/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            //find all activity for this user
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();

//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

            require 'sysfrm/lib/invoices/render.php';

        } else {
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'pdf':

        Event::trigger('prod/pdf/');


        $id = $routes['2'];
        $d = ORM::for_table('sys_prod')->table_alias('a')->select('a.*')->select('b.spesifikasi')->select('b.peralatan')->select('b.prosedur')->join('sys_barang',array('a.code','=','b.code'),'b')->find_one($id);
        if ($d) {
			$prosedur=$d['prosedur'];
			$prosedur=str_replace('{$nama}',$d['pelaksana'],$prosedur);
			$prosedur=str_replace('{$nama1}',$d['pemeriksa'],$prosedur);
			
			$tgl=date('d M Y');

			$e = ORM::for_table('sys_items_detail')->table_alias('a')->select('a.code')->select('a.name')->select('c.description')->select('c.description')->select('a.persen')->join('sys_items',array('a.id','=','b.id'),'b')->join('sys_barang',array('c.code','=','a.code'),'c')->where('b.code',$d['code'] )->find_many();

            $items = ORM::for_table('sys_prod_detail')->where('batch_number', $d['batch_number'])->order_by_asc('batch_number')->find_many();

            define('_MPDF_PATH','sysfrm/lib/mpdf/');

            require('sysfrm/lib/mpdf/mpdf.php');

            $pdf_c = '';
            $ib_w_font = 'dejavusanscondensed';
            if($config['pdf_font'] == 'default'){
                $pdf_c = 'c';
                $ib_w_font = 'Helvetica';
            }

            $mpdf=new mPDF($pdf_c,'A4','','',20,15,15,25,10,10);
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle($config['CompanyName'].' - Batch Produksi');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText(ib_lan_get_line($d['status']));
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = $ib_w_font;
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            ob_start();

            require 'sysfrm/lib/batch_produksi.php';

            $html = ob_get_contents();


            ob_end_clean();

            $mpdf->WriteHTML($html);

            if (isset($routes['3']) AND ($routes['3'] == 'dl')) {
                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'D'); # D
            } else {
                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
            }
            // $mpdf->Output();



        }



        break;

    case 'markpaid':

        Event::trigger('invoices/markpaid/');

        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if ($d) {
            $d->status = 'Paid';
            $d->save();
            _msglog('s', 'Invoice marked as Paid');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;

    case 'markunpaid':

        Event::trigger('invoices/markunpaid/');

        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if ($d) {
            $d->status = 'Unpaid';
            $d->save();
            _msglog('s', 'Invoice marked as Un Paid');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;

    case 'markcancelled':

        Event::trigger('invoices/markcancelled/');


        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if ($d) {
            $d->status = 'Cancelled';
            $d->save();
            _msglog('s', 'Invoice marked as Cancelled');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;

    case 'markpartiallypaid':

        Event::trigger('invoices/markpartiallypaid/');


        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if ($d) {
            $d->status = 'Partially Paid';
            $d->save();
            _msglog('s', 'Invoice marked as Partially Paid');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;


    case 'add-payment':

        Event::trigger('invoices/add-payment/');

        $sid = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($sid);

        if ($d) {

            $itotal = $d['total'];
            $ic = $d['credit'];
            $np = $itotal - $ic;
            $a_opt = '';
            // <option value="{$ds['account']}">{$ds['account']}</option>
            $a = ORM::for_table('sys_accounts')->find_many();
            foreach ($a as $acs) {
                $a_opt .= '<option value="' . $acs['account'] . '">' . $acs['account'] . '</option>';
            }

            $pms_opt = '';
            // <option value="{$pm['name']}">{$pm['name']}</option>
            $pms = ORM::for_table('sys_pmethods')->find_many();
            foreach ($pms as $pm) {
                $pms_opt .= '<option value="' . $pm['name'] . '">' . $pm['name'] . '</option>';
            }

            $cats_opt = '';

            $cats = ORM::for_table('sys_cats')->where('type', 'Income')->order_by_asc('sorder')->find_many();

            foreach ($cats as $cat) {
                $cats_opt .= '<option value="' . $cat['name'] . '">' . $cat['name'] . '</option>';
            }


            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>'.$_L['Invoice'].' #' . $d['id'] . '</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="form_add_payment" method="post">
<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">'.$_L['Account'].'</label>
    <div class="col-sm-10">
       <select id="account" name="account">
                            <option value="">'.$_L['Choose an Account'].'</option>

' . $a_opt . '

                        </select>
    </div>
  </div>

<div class="form-group">
    <label for="date" class="col-sm-2 control-label">'.$_L['Date'].'</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker"  value="' . date('Y-m-d') . '" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
    </div>
  </div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">'.$_L['Description'].'</label>
    <div class="col-sm-10">
      <input type="text" id="description" name="description" class="form-control" value="'.$_L['Invoice'].' ' . $d['id'] . ' '.$_L['Payment'].'">
    </div>
  </div>
<div class="form-group">
    <label for="amount" class="col-sm-2 control-label">'.$_L['Amount'].'</label>
    <div class="col-sm-10">
      <input type="text" id="amount" name="amount" class="form-control amount"   data-a-sign="' . $config['currency_code'] . ' " data-a-dec="' . $config['dec_point'] . '" data-a-sep="' . $config['thousands_sep'] . '"
data-d-group="3" value="' . $np . '">
    </div>
  </div>
<div class="form-group">
    <label for="cats" class="col-sm-2 control-label">'.$_L['Category'].'</label>
    <div class="col-sm-10">
       <select id="cats" name="cats">
                             <option value="Uncategorized">'.$_L['Uncategorized'].'</option>

' . $cats_opt . '

                        </select>
    </div>
  </div>
  <div class="form-group">
    <label for="payer_name" class="col-sm-2 control-label">'.$_L['Payer'].'</label>
    <div class="col-sm-10">
      <input type="text" id="payer_name" name="payer_name" class="form-control" value="' . $d['account'] . '" disabled>
    </div>
  </div>

   <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">'.$_L['Method'].'</label>
    <div class="col-sm-10">
      <select id="pmethod" name="pmethod">
                                <option value="">'.$_L['Select Payment Method'].'</option>


                                ' . $pms_opt . '


                            </select>
    </div>
  </div>


</form>

</div>
<div class="modal-footer">
<input type="hidden" id="payer" name="payer" value="' . $d['userid'] . '">
	<button id="save_payment" class="btn btn-primary">'.$_L['Save'].'</button>

		<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
</div>';
        } else {
            exit('Invoice Not Found');
        }


        break;


    case 'mail_invoice_':

        Event::trigger('invoices/mail_invoice_/');

        $sid = $routes['2'];
        $etpl = $routes['3'];

        $d = ORM::for_table('sys_invoices')->find_one($sid);


        if ($d) {

            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

            $msg = Invoice::gen_email($sid,$etpl);



            if($msg){
                $subj = $msg['subject'];
                $message_o = $msg['body'];
                $email = $msg['email'];
                $name = $msg['name'];
            }
            else{
                $subj = '';
                $message_o = '';
                $email = '';
                $name = '';
            }




            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>Invoice #' . $d['id'] . '</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="email_form" method="post">


<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">'.$_L['To'].'</label>
    <div class="col-sm-10">
      <input type="text" id="toemail" name="toemail" class="form-control" value="' . $email . '">
    </div>
  </div>

    <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">'.$_L['Subject'].'</label>
    <div class="col-sm-10">
      <input type="text" id="subject" name="subject" class="form-control" value="' . $subj . '">
    </div>
  </div>

  <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">'.$_L['Message Body'].'</label>
    <div class="col-sm-10">
      <textarea class="form-control sysedit" rows="3" name="message" id="message">' . $message_o . '</textarea>
      <input type="hidden" id="toname" name="toname" value="' . $name . '">
      <input type="hidden" id="i_cid" name="i_cid" value="' . $a['id'] . '">
      <input type="hidden" id="i_iid" name="i_iid" value="' . $d['id'] . '">
    </div>
  </div>



</form>

</div>
<div class="modal-footer">
	<button id="send" class="btn btn-primary">'.$_L['Send'].'</button>

		<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
</div>';
        } else {
            exit('Invoice Not Found');
        }


        break;


    case 'send_email':

        Event::trigger('invoices/send_email/');

        $msg = '';
        $email = _post('toemail');
        $subject = _post('subject');
        $toname = _post('toname');
        $cid = _post('i_cid');
        $iid = _post('i_iid');
        $message = $_POST['message'];

        if (!Validator::Email($email)) {
            $msg .= 'Invalid Email <br>';
        }
        if ($subject == '') {
            $msg .= 'Subject is Required <br>';
        }

        if ($message == '') {
            $msg .= 'Message is Required <br>';
        }

        if ($msg == '') {

            //now send email

            Notify_Email::_send($toname, $email, $subject, $message, $cid, $iid);

            echo '<div class="alert alert-success fade in">Mail Sent!</div>';
        } else {
            echo '<div class="alert alert-danger fade in">' . $msg . '</div>';
        }


        break;

    case 'stop_recurring':

        Event::trigger('invoices/stop_recurring/');


        $id = $routes['2'];
        $id = str_replace('sid', '', $id);
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $d->r = '0';
            $d->save();
            r2(U . 'invoices/list-recurring', 's', 'Recurring Disabled for Invoice: ' . $id);

        } else {
            echo 'Invoice not found';
        }
        break;


    case 'add-payment-post':

        Event::trigger('invoices/add-payment-post/');

        $msg = '';
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $amount = Finance::amount_fix($amount);
        $payerid = _post('payer');
        $pmethod = _post('pmethod');
        if($payerid == ''){
            $payerid = '0';
        }
        $amount = str_replace($config['currency_code'], '', $amount);
        $amount = str_replace(',', '', $amount);
        if (!is_numeric($amount)) {
            $msg .= 'Invalid Amount' . '<br>';
        }
        $cat = _post('cats');
        $iid = _post('iid');


        if ($payerid == '') {
            $msg .= 'Payer Not Found' . '<br>';
        }
        $description = _post('description');
        $msg = '';
        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg .= 'Please choose an Account' . '<br>';
        }


        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        if ($msg == '') {

            //find the current balance for this account
            $a = ORM::for_table('sys_accounts')->where('account', $account)->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal + $amount;
            $a->balance = $nbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $account;
            $d->type = 'Income';
            $d->payerid = $payerid;

            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;


            $d->description = $description;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $nbal;
            $d->iid = $iid;


            //others
            $d->payer = '';
            $d->payee = '';
            $d->payeeid = '0';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            //


            $d->save();
            $tid = $d->id();
            _log('New Deposit: ' . $description . ' [TrID: ' . $tid . ' | Amount: ' . $amount . ']', 'Admin', $user['id']);
            _msglog('s', 'Transaction Added Successfully');
            //now work with invoice
            $i = ORM::for_table('sys_invoices')->find_one($iid);
            if ($i) {
                $pc = $i['credit'];
                $it = $i['total'];
                $dp = $it - $pc;
                if (($dp == $amount) OR (($dp < $amount))) {
                    $i->status = 'Paid';

                } else {

                    $i->status = 'Partially Paid';
                }
                $i->credit = $pc + $amount;
                $i->save();

            }
            echo $tid;
        } else {
            echo '<div class="alert alert-danger fade in">' . $msg . '</div>';
        }

        break;

    default:
        echo 'action not defined';
}