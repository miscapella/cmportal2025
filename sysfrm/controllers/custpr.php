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
$ui->assign('_sysfrm_menu', 'invoices');
$ui->assign('_st', 'Customer Purchase');
$ui->assign('_title', 'Customer PR - ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);


switch ($action) {
    case 'add':
//find all clients.

		_auth1('CUSTPR-ADD',$user['id']);
        Event::trigger('custpr/add/');

        $extra_fields = '';
        $extra_jq = '';

        Event::trigger('add_custpr');


        if (isset($routes['2']) AND ($routes['2'] == 'recurring')) {
            $recurring = true;
        } else {
            $recurring = false;
        }

		$ui->assign('_sysfrm_menu1', 'list');
        $ui->assign('recurring', $recurring);

        if (isset($routes['3']) AND ($routes['3'] != '')) {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->where('code','Customer')->find_one($p_cid);
            if ($p_d) {
                $ui->assign('p_cid', $p_cid);
            }
        } else {
            $ui->assign('p_cid', '');
        }

        $ui->assign('_st', 'Tambah Customer PR');
        $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->where('code','Customer')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);

        $ui->assign('idate', date('d-m-Y'));
        $ui->assign('idate1', date('d-m-Y'));


		$js_file = 'custpr';
		$tpl_file = 'add-custpr.tpl';

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file,'btn-top/btn-top')));


        $ui->assign('xjq', '



 '.
            $extra_jq);





        $ui->display($tpl_file);


        break;


    case 'edit':

		_auth1('CUSTPR-EDIT',$user['id']);
        Event::trigger('custpr/edit/');

        $id = $routes['2'];
		$ui->assign('_sysfrm_menu1', 'list');
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
			$e = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.name')->select('b.satuan')->select('b.equip_no')->select('b.draw_no')->join('sys_barang',array('a.code','=','b.code'),'b')->where('a.invoiceid',$d['id'])->find_many();
			$ui->assign('j', $e);
			//find the user
            $a = ORM::for_table('crm_accounts')->where('code','Customer')->find_one($d['userid']);
            $ui->assign('a', $a);
            $ui->assign('d', $d);
            $ui->assign('_st', 'Edit Customer PR');
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->where('code','Customer')->find_many();
            $ui->assign('c', $c);


			//default idate ddate
            $ui->assign('idate', $d['date_pr']);

                $js_file = 'edit-custpr';
                $tpl_file = 'edit-custpr.tpl';

            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
            $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));

            $ui->assign('xjq', '

 ');
            $ui->display($tpl_file);

        } else {
            echo 'No. Customer PR Not Found';
        }
	break;
    
	case 'edit-draw':

		_auth1('CUSTPR-EDIT-DRAW',$user['id']);
        Event::trigger('custpr/edit-draw/');

        $id = $routes['2'];
		$ui->assign('_sysfrm_menu', 'engineering');
		$ui->assign('_sysfrm_menu1', 'list-draw');
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
			$e = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.name')->select('b.satuan')->select('b.equip_no')->select('b.draw_no')->join('sys_barang',array('a.code','=','b.code'),'b')->where('a.invoiceid',$d['id'])->find_many();
			$ui->assign('j', $e);
			//find the user
            $a = ORM::for_table('crm_accounts')->where('code','Customer')->find_one($d['userid']);
            $ui->assign('a', $a);
            $ui->assign('d', $d);
            $ui->assign('_st', 'Edit Customer PR');
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->where('code','Customer')->find_many();
            $ui->assign('c', $c);


			//default idate ddate
            $ui->assign('idate', $d['date_pr']);

                $js_file = 'edit-custpr';
                $tpl_file = 'edit-custpr-draw.tpl';

            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
            $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));

            $ui->assign('xjq', '

 ');
            $ui->display($tpl_file);

        } else {
            echo 'No. Customer PR Not Found';
        }
	break;

   case 'view':

		_auth1('CUSTPR-VIEW',$user['id']);
        Event::trigger('custpr/view/');

        $id = $routes['2'];
        $flag = $routes['3'];
		$loc = '';
		if($flag=='') {
			$ui->assign('_sysfrm_menu1', 'list');
			$loc = 'custpr/list';
		}
		elseif ($flag=='draw') {
			$ui->assign('_sysfrm_menu', 'engineering');
			$ui->assign('_sysfrm_menu1', 'list-draw');
			$loc = 'custpr/list-draw';
		}
		elseif ($flag=='apv') {
			$ui->assign('_sysfrm_menu', 'approval');
			$ui->assign('_sysfrm_menu1', 'list-apv');
			$loc = 'custpr/list-apv';
		}
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
			$e = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.name')->select('b.satuan')->select('b.equip_no')->select('b.draw_no')->join('sys_barang',array('a.code','=','b.code'),'b')->where('a.invoiceid',$d['id'])->find_many();
			$ui->assign('j', $e);
			$ui->assign('progress',$d['progress']);
			//find the user
            $a = ORM::for_table('crm_accounts')->where('code','Customer')->find_one($d['userid']);
            $ui->assign('a', $a);
            $ui->assign('d', $d);
            $ui->assign('_st', 'View Customer PR');
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->where('code','Customer')->find_many();
            $ui->assign('c', $c);


			//default idate ddate
            $ui->assign('idate', $d['date_pr']);

			$js_file = 'view-custpr';
			$tpl_file = 'view-custpr.tpl';

            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
            $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));

            $ui->assign('xjq', '
$("#submit").click(function (e) {
	    var _url = $("#_url").val();
        e.preventDefault();
        $("#ibox_form").block({ message: null });
		window.location = _url + "'.$loc.'";
    });


 ');

            $ui->display($tpl_file);

        } else {
            echo 'No. Customer PR Not Found';
        }
		break;

    case 'add-post':

        Event::trigger('custpr/add-post/');

		$custprnum = strtoupper(_post('custprnum'));
        $cid = _post('cid');
        //find user with cid
        $u = ORM::for_table('crm_accounts')->where('code','Customer')->find_one($cid);

		$msg = '';
        $x = ORM::for_table('sys_invoices')->where('custprnum',$custprnum)->count();
		if($x>0)
			$msg .= 'No. Customer PR tersebut telah ada <br> ';

		if ($cid == '') {
            $msg .= 'Pilih Customer <br> ';
        }


        $notes = _post('notes');
        $buyer = _post('buyer');
		$idate = date('Y-m-d', strtotime(_post('idate')));
        $its = strtotime($idate);
		$idate1 = date('Y-m-d', strtotime(_post('idate1')));
        $its1 = strtotime($idate1);
		//Data detail
		$code = explode(',', _post('code'));
		$qty = explode(',', _post('qty'));
		$unit = explode(',', _post('unit'));
		$price = explode(',', _post('price'));
		
        if ($msg == '') {
			$validextentions = array("pdf","jpg","jpeg");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			$file_name = '';
			if (($_FILES["file"]["size"] <= 10000000)//approx. 10mb files can be uploaded
				&& in_array($file_extension, $validextentions)){
//				$bl=date('n',strtotime(_post('idate')));
//				$th=date('Y',strtotime(_post('idate')));
//				$query = ORM::for_table('sys_invoices')->raw_query("SELECT * FROM sys_invoices where month(date_pr)=$bl and year(date_pr)=$th order by custprnum desc")->find_one();
//				if($query) {
//					$invoicenum = ++$query['custprnum'];
//				} else {
//					$invoicenum = 'CUSTPR/'.date('m',strtotime(_post('idate'))).'/'.date('Y',strtotime(_post('idate'))).'/0001';
//				}
				try
				{
					ORM::get_db()->beginTransaction();
					$invoicenum = $custprnum;
					$cn = ''; //_post('cn');
					$file_name = str_replace('/','_',$invoicenum);
					$file_name = str_replace('.','_',$file_name).'.'.$file_extension;
					move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/custpr/'.$file_name);

					//

					$vtoken = _raid(10);
					$ptoken = _raid(10);
					$d = ORM::for_table('sys_invoices')->create();
					$d->userid = $cid;
					$d->account = $u['account'];
					$d->progress = 1;
					$d->date_pr = $idate;
					$d->date_pr_close = $idate1;
					$d->vtoken = $vtoken;
					$d->ptoken = $ptoken;
					$d->status = 'Unpaid';
					$d->notes = $notes;
					$d->buyer = $buyer;
					$d->attach_custpr = $file_name;
					//others
					$d->custprnum = $invoicenum;
					$d->cn = $cn;
					$d->tax2 = '0.00';
					$d->taxrate2 = '0.00';
					$d->paymentmethod = '';
					//
					$d->save();
					
					//simpan detail
					$i = '0';
					foreach ($code as $item) {
						$sqty= $qty[$i];
						$sunit= $unit[$i];
						$sprice= $price[$i];
						$f = ORM::for_table('sys_invoiceitems')->create();
						$f->invoiceid = $d['id'];
						$f->code = $item;
						$f->qty_quote = $sqty;
						$f->unit = $sunit;
						$f->amount_quote = $sprice;
						$f->total = $sqty*$sprice;
		
						$f->save();
						$i++;
					}
					ORM::get_db()->commit();
					Event::trigger('add_custpr_posted');

					_log1('Add Customer PR : '.$invoicenum,$user['username'],$user['id']);
					echo $invoicenum;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			}
			else {
				if ($_FILES["file"]["size"] > 10000000){
					$msg .= 'Max Ukuran file 10MB <br>';
				}
				else $msg .= 'File attachment harus dalam bentuk PDF/ JPG <br> ';
				echo $msg;
			}

        } else {
            echo $msg;
        }


        break;

    case 'modal-cari':
		$kata = _post('kata');
		$_url = _post('_url');
        $d1 = ORM::for_table('sys_invoices')->where_raw('`progress` >= 1')->where_like('custprnum', "%$kata%")->order_by_asc('suppprnum')->order_by_desc('custprnum');
		$e = $d1->find_many();
		$f = $d1->count();
		echo '<table class="table table-bordered table-hover sys_table" id="items_table">
				<thead>
				<tr>
					<th>#PR No.</th>
					<th>Customer</th>
					<th>Buyer</th>
					<th>PR Date</th>
					<th>Supp PR No.</th>
					<th>SUPP PR Date</th>
					<th class="text-right">Manage</th>
				</tr>
				</thead>
				<tbody>';
		if($f > 0){
			foreach($e as $ds1){
				echo '<tr id="hasil-cari">
					<td>'.$ds1['custprnum'].'</td>
					<td><a href="'.$_url.'contacts/view/'.$ds1['userid'].'/">'.$ds1['account'].'</a> </td>
					<td>'.$ds1['buyer'].'</td>
					<td align="center">';
						if ($ds1['date_pr'] <> Null)
							echo date( $_c['df'], strtotime($ds1['date_pr']));
					echo '</td>
					<td>'.$ds1['suppprnum'].'</td>
					<td align="center">';
						if ($ds1['date_supppr'] <> Null)
							echo date( $_c['df'], strtotime($ds1['date_supppr']));
					echo '</td>
					<td class="text-right">';
						if($ds1['suppprnum'] == Null) {
							if($ds1['progress'] == 1) {
								echo '<a href="#" class="btn btn-success btn-xs capp" id="'.$ds1['id'].'"><i class="fa fa-check"></i> Process to Drawing</a>
								<a href="'.$_url.'custpr/edit/'.$ds1['id'].'/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
								<a href="#" class="btn btn-danger btn-xs cdelete" id="iid'.$ds1['id'].'"><i class="fa fa-trash"></i> Hapus</a>';
							} else {
								if($ds1['progress'] == 2) {
									echo '<a href="#" class="btn btn-danger btn-xs capp1" id="'.$ds1['id'].'"><i class="fa fa-check"></i> Cancel to Process Drawing</a>';
								}
								if($ds1['progress'] == 4) {
									echo '<a href="'.$_url.'supppr/add/'.$ds1['id'].'/" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Supp PR</a>';
								}
								if($ds1['progress'] == 23) {
									echo '<a href="'.$_url.'supppr/add/'.$ds1['id'].'/" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Invoice</a>';
								}
							}
						}
						echo ' <a href="'.$_url.'custpr/view/'.$ds1['id'].'/" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
					</td>
				</tr>';
			}
			echo '</tbody></table>';
		}
		else {
			echo '<tr>
					<td colspan="7"><b>Tidak ada data</b></td>
				</tr>';
		}
	break;
    
    case 'approve':
		_auth1('CUSTPR-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);
		$idate = date('Y-m-d');

		if($d){
			if($d['progress'] == 3) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=4,to_supppr='$idate' where id='$id'");

				r2(U.'custpr/list-apv','s', $type. ' Approved');
			} else {
				r2(U.'custpr/list-apv','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'custpr/list-apv','e', 'Not Found');
		}
    break;
    case 'capprove':
		_auth1('CUSTPR-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 4) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=3,to_supppr=null where id='$id'");

				r2(U.'custpr/list-apv','s', $type. ' Cancel Approved');
			} else {
				r2(U.'custpr/list-apv','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'custpr/list-apv','e', 'Not Found');
		}
    break;
    case 'apv-draw':
		_auth1('CUSTPR-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);
		$idate = date('Y-m-d');

		if($d){
			if($d['progress'] == 2) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=3,to_custpr_apv='$idate' where id='$id'");

				r2(U.'custpr/list-draw','s', $type. ' Process to Drawing Successfully');
			} else {
				r2(U.'custpr/list-draw','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'custpr/list-draw','e', 'Not Found');
		}
    break;

    case 'capv-draw':
		_auth1('CUSTPR-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 3) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=2,to_custpr_apv=null where id='$id'");

				r2(U.'custpr/list-draw','s', $type. ' Cancel Process to Drawing');
			} else {
				r2(U.'custpr/list-draw','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'custpr/list-draw','e', 'Not Found');
		}
    break;
    case 'draw':
		_auth1('CUSTPR-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);
		$idate = date('Y-m-d');

		if($d){
			if($d['progress'] == 1) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=2,to_draw='$idate' where id='$id'");

				r2(U.'custpr/list','s', 'Success update process to drawing');
			} else {
				r2(U.'custpr/list','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'custpr/list','e', 'Not Found');
		}
    break;

    case 'cdraw':
		_auth1('CUSTPR-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 2) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=1,to_draw=null where id='$id'");

				r2(U.'custpr/list','s', 'Cancel Proses Drawing');
			} else {
				r2(U.'custpr/list','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'custpr/list','e', 'Not Found');
		}
    break;

    case 'list':

        Event::trigger('custpr/list/');

		$ui->assign('_sysfrm_menu1', 'list');
        $ui->assign('xfooter', Asset::js(array('numeric','list-custpr')));
        //$paginator = Paginator::bootstrap('sys_invoices','progress','CustPR','progress', 'CustQT');
        $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= 1)\')->count()');
        //$d = ORM::for_table('sys_invoices')->where_raw('(`progress` = ? OR `progress` = ?)', array('CustPR', 'CustQT'))->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('custqtnum')->order_by_desc('custprnum')->find_many();
        $d = ORM::for_table('sys_invoices')->where_raw('`progress` >= 1')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('suppprnum')->order_by_desc('custprnum')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
		$(".cdelete").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "delete/custpr/" + id;
			   }
			});
		});
		$(".capp").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "custpr/draw/" + id;
			   }
			});
		});
		$(".capp1").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "custpr/cdraw/" + id;
			   }
			});
		});
		$(".filter").hide();


 ');
        $ui->display('list-custpr.tpl');
        break;
    
	case 'list-draw':

        Event::trigger('custpr/list-draw/');

		$ui->assign('_sysfrm_menu', 'engineering');
		$ui->assign('_sysfrm_menu1', 'list-draw');
		$ui->assign('_st', 'Customer Purchase - Drawing');
        $ui->assign('xfooter', Asset::js(array('numeric','list-custpr')));
        //$paginator = Paginator::bootstrap('sys_invoices','progress','CustPR','progress', 'CustQT');
        // $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= ? AND `progress` <= ?)\', array(2,3))->count()');
        // $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= ? AND `progress` <= ?)', array(2, 3))->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('suppprnum')->order_by_desc('custprnum')->find_many();
        $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= 2)\')->count()');
        $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= 2)')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('suppprnum')->order_by_desc('custprnum')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
		$(".capp").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "custpr/apv-draw/" + id;
			   }
			});
		});
		$(".capp1").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "custpr/capv-draw/" + id;
			   }
			});
		});
		$(".filter").hide();


 ');
        $ui->display('list-custpr-draw.tpl');
        break;
	case 'list-apv':

        Event::trigger('custpr/list-apv/');

		$ui->assign('_sysfrm_menu', 'approval');
		$ui->assign('_sysfrm_menu1', 'list-apv');
		$ui->assign('_st', 'Customer Purchase - Approval');
        $ui->assign('xfooter', Asset::js(array('numeric','list-custpr')));
        // $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= ? AND `progress` <= ?)\', array(3,4))->count()');
        // $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= ? AND `progress` <= ?)', array(3, 4))->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('suppprnum')->order_by_desc('custprnum')->find_many();
        $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= 3)\')->count()');
        $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= 3)')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('suppprnum')->order_by_desc('custprnum')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
		$(".capp").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "custpr/approve/" + id;
			   }
			});
		});
		$(".capp1").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "custpr/capprove/" + id;
			   }
			});
		});
		$(".filter").hide();


 ');
        $ui->display('list-custpr-apv.tpl');
        break;
    
    case 'list-recurring':

        $d = ORM::for_table('sys_purchase')->where_not_equal('r', '0')->order_by_desc('id')->find_many();
        $ui->assign('d', $d);
        $ui->assign('xjq', '
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/purchase/" + id;
           }
        });
    });

     $(".cstop").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("Are you sure? This will prevent future invoice generation from this invoice.", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "purchase/stop_recurring/" + id;
           }
        });
    });

 ');
        $ui->display('list-recurring-purchase.tpl');
        break;

    case 'edit-post':

        Event::trigger('custpr/edit-post/');

        $cid = _post('cid');
        $iid = _post('id');
        //find user with cid
        $u = ORM::for_table('crm_accounts')->where('code','Customer')->find_one($cid);

        $msg = '';
        if ($cid == '') {
            $msg .= 'Pilih Customer <br> ';
        }

        $notes = _post('notes');
        $buyer = _post('buyer');
		$idate = date('Y-m-d', strtotime(_post('idate')));
        $its = strtotime($idate);
		$idate1 = date('Y-m-d', strtotime(_post('idate1')));
        $its1 = strtotime($idate1);
		//Data detail
		$code = explode(',', _post('code'));
		$qty = explode(',', _post('qty'));
		$unit = explode(',', _post('unit'));
		$price = explode(',', _post('price'));

        if ($msg == '') {
			$d = ORM::for_table('sys_invoices')->find_one($iid);
            if ($d) {
				try
				{
					ORM::get_db()->beginTransaction();
					$d->userid = $cid;
					$d->account = $u['account'];
					$d->date_pr = $idate;
					$d->date_pr_close = $idate1;
					$d->notes = $notes;
					$d->buyer = $buyer;

					$file_name = '';
					$validextentions = array("pdf","jpg","jpeg");
					$temporary = explode(".", $_FILES["file"]["name"]);
					$file_extension = end($temporary);
					//($_FILES["file"]["type"] == "application/pdf")
					if (($_FILES["file"]["size"] <= 10000000)//approx. 10mb files can be uploaded
						&& in_array($file_extension, $validextentions)){

						if(file_exists('uploads/custpr/'.$d['attach_custpr']))
							unlink('uploads/custpr/'.$d['attach_custpr']);

						$file_name = str_replace('/','_',$d['custprnum']);
						$file_name = str_replace('.','_',$file_name).'.'.$file_extension;
						move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/custpr/'.$file_name);
						$d->attach_custpr = $file_name;
					}
					$d->save();

					//hapus data lama
					$x = ORM::for_table('sys_invoiceitems')->where('invoiceid',$d['id'])->delete_many();
					//simpan detail
					$i = '0';
					foreach ($code as $item) {
						$sqty= $qty[$i];
						$sunit= $unit[$i];
						$sprice= $price[$i];
						$f = ORM::for_table('sys_invoiceitems')->create();
						$f->invoiceid = $d['id'];
						$f->code = $item;
						$f->qty_quote = $sqty;
						$f->unit = $sunit;
						$f->amount_quote = $sprice;
						$f->total = $sqty*$sprice;
		
						$f->save();
						$i++;
					}

					ORM::get_db()->commit();

					_log1('Edit Customer PR : '.$d['custprnum'],$user['username'],$user['id']);
					echo $d['custprnum'];
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
            } else {

                // invoice not found
				$msg .= $iid.' <br>';
				$msg .= 'Invoice Customer Purchase tidak ditemukan <br>';
				echo $msg;
            }

        } else {
            echo $msg;
        }

        break;

    case 'delete':

        Event::trigger('custpr/delete/');

        $id = $routes['2'];
        if ($_app_stage == 'Demo') {
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if ($d) {
            $d->delete();
            r2(U . 'accounts/list', 's', $_L['account_delete_successful']);
        }

        break;


    case 'print':

        Event::trigger('purchase/print/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_purchase')->find_one($id);
        if ($d) {

            //find all activity for this user
            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();

//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

            require 'sysfrm/lib/purchase/render.php';

        } else {
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'pdf':

        Event::trigger('purchase/pdf/');


        $id = $routes['2'];


        $d = ORM::for_table('sys_purchase')->find_one($id);
        if ($d) {

            //find all activity for this user
            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();

            $trs_c = ORM::for_table('sys_transactions')->where('iid', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('iid', $id)->order_by_desc('id')->find_many();

//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];
            if($d['credit'] != '0.00'){
                $i_due = $i_total - $i_credit;
            }
            else{
                $i_due =  $d['total'];
            }

            $i_due = number_format($i_due,2,$config['dec_point'],$config['thousands_sep']);
            $cf = ORM::for_table('crm_customfields')->where('showinvoice', 'Yes')->order_by_asc('id')->find_many();
//            ob_start();
//            require 'sysfrm/lib/purchase/pdf-default.php';
//            $html = ob_get_contents();
//            ob_end_clean();
//            echo $html;
//            exit;
//            require('sysfrm/lib/tcpdf/config/lang/eng.php');
//            require('sysfrm/lib/tcpdf/tcpdf.php');
//            // create new PDF document
//            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//
//// set document information
//            $pdf->SetCreator('SysFrm');
//            $pdf->SetAuthor('sysfrm.com');
//            $pdf->SetTitle('invoice titla');
//            $pdf->SetSubject('invoice subject');
//
//            $pdf->SetPrintHeader(false);
//// set default header data
//            //   $pdf->SetHeaderData('', '', $title, "Generated on ".date('d/m/Y')." \nby ".$aadmin);
//
//// set header and footer fonts
//            //   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//            //   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
////$pdf->SetFont('freesans', '', 10);
//// set default monospaced font
//            //   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//
////set margins
////            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
////        //    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
////         //   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
////
//////set auto page breaks
////            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
////
//////set image scale factor
////            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//
////set some language-dependent strings
//            //  $pdf->setLanguageArray();
//
//// ---------------------------------------------------------
//
//// set font
//            $pdf->AddPage();
//            require 'sysfrm/lib/purchase/pdf-x1.php';
//
//            // $pdf->writeHTML($html, true, false, true, false, '');
//
//// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//
//// reset pointer to the last page
//            //   $pdf->lastPage();
//
//// ---------------------------------------------------------
//
////Close and output PDF document
//            if (isset($routes['3']) AND ($routes['3'] == 'dl')) {
//                $pdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'D'); # D
//            } else {
//                $pdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
//            }
//
//        } else {
//            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
//        }


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
            $mpdf->SetTitle($config['CompanyName'].' Invoice');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText(ib_lan_get_line($d['status']));
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = $ib_w_font;
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            ob_start();

            require 'sysfrm/lib/purchase/pdf-x2.php';

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

        Event::trigger('purchase/markpaid/');

        $iid = _post('iid');
        $d = ORM::for_table('sys_purchase')->find_one($iid);
        if ($d) {
            $d->status = 'Paid';
            $d->save();
            _msglog('s', 'Invoice marked as Paid');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;

    case 'markunpaid':

        Event::trigger('purchase/markunpaid/');

        $iid = _post('iid');
        $d = ORM::for_table('sys_purchase')->find_one($iid);
        if ($d) {
            $d->status = 'Unpaid';
            $d->save();
            _msglog('s', 'Invoice marked as Un Paid');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;

    case 'markcancelled':

        Event::trigger('purchase/markcancelled/');


        $iid = _post('iid');
        $d = ORM::for_table('sys_purchase')->find_one($iid);
        if ($d) {
            $d->status = 'Cancelled';
            $d->save();
            _msglog('s', 'Invoice marked as Cancelled');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;

    case 'markpartiallypaid':

        Event::trigger('purchase/markpartiallypaid/');


        $iid = _post('iid');
        $d = ORM::for_table('sys_purchase')->find_one($iid);
        if ($d) {
            $d->status = 'Partially Paid';
            $d->save();
            _msglog('s', 'Invoice marked as Partially Paid');
        } else {
            _msglog('e', 'Invoice not found');
        }
        break;


    case 'pay':
//find all clients.

        Event::trigger('purchase/pay/');

        $extra_fields = '';
        $extra_jq = '';

        $ui->assign('_st', 'Pembayaran Hutang');
		$c = ORM::for_table('sys_purchase')->select('id')->select('invoicenum')->select('account')->order_by_asc('date')->find_many();
        $ui->assign('c', $c);

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

        $ui->assign('idate', date('d-m-Y'));
		$ui->assign('a_opt',$a_opt);
		$ui->assign('pms_opt',$pms_opt);
		$ui->assign('cats_opt',$cats_opt);

		$js_file = 'payAP';
		$tpl_file = 'payAP.tpl';

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));


        $ui->assign('xjq', '



 '.
            $extra_jq);





        $ui->display($tpl_file);


        break;

    case 'render-target':

        Event::trigger('purchase/render-target/');

        $cid = _post('cid');
        $a = ORM::for_table('sys_purchase')->where('id',$cid)->find_one();
		if($a) {
			$data = array(
					'ketkw'		=>  'Pembayaran Pembelian, INV : #'.$a['invoicenum'],
					'nominal'	=>  $a['total']-$a['credit'],
					'account'	=>	$a['account']);
			echo json_encode($data);
		}

        break;

	case 'add-payment':

        Event::trigger('purchase/add-payment/');

        $sid = $routes['2'];
        $d = ORM::for_table('sys_purchase')->find_one($sid);

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
	<h3>'.$_L['Purchase'].' #' . $d['invoicenum'] . '</h3>
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
      <input type="text" class="form-control datepicker"  value="' . date('d-m-Y') . '" name="date" id="date" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">
    </div>
  </div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">'.$_L['Description'].'</label>
    <div class="col-sm-10">
      <input type="text" id="description" name="description" class="form-control" value="Pembayaran Pembelian, INV : #' . $d['invoicenum'] . '">
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


    case 'mail_purchase_':

        Event::trigger('purchase/mail_purchase_/');

        $sid = $routes['2'];
        $etpl = $routes['3'];

        $d = ORM::for_table('sys_purchase')->find_one($sid);


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

        Event::trigger('purchase/send_email/');

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

        Event::trigger('purchase/stop_recurring/');


        $id = $routes['2'];
        $id = str_replace('sid', '', $id);
        $d = ORM::for_table('sys_purchase')->find_one($id);
        if ($d) {

            $d->r = '0';
            $d->save();
            r2(U . 'purchase/list-recurring', 's', 'Recurring Disabled for Invoice: ' . $id);

        } else {
            echo 'Invoice not found';
        }
        break;


    case 'add-payment-post':

        Event::trigger('purchase/add-payment-post/');

        $msg = '';
        $account = _post('account');
        $date = date('Y-m-d', strtotime(_post('date')));
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
            $msg .= 'Belum memilih Akun' . '<br>';
        }


        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

		$a = ORM::for_table('sys_accounts')->where('account', $account)->find_one();
		$cbal = $a['balance'];
		$nbal = $cbal - $amount;
		if ($nbal < 0)
			$msg .= 'Saldo tidak mencukupi !<br>';

        if ($msg == '') {
			$a->balance = $nbal;
			$a->save();

            //find the current balance for this account
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $account;
            $d->type = 'Expense';
            $d->payerid = $payerid;

            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;


            $d->description = $description;
            $d->date = $date;
            $d->cr = $amount;
            $d->dr = '0.00';
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
            _log('New Expense: ' . $description . ' [TrID: ' . $tid . ' | Amount: ' . $amount . ']', 'Admin', $user['id']);
            _msglog('s', 'Transaction Added Successfully');
            //now work with invoice
            $i = ORM::for_table('sys_purchase')->find_one($iid);
            if ($i) {
                $pc = $i['credit'];
                $it = $i['total'];
                $dp = $it - $pc;
                if ($dp <= $amount) {
                    $i->status = 'Paid';
					$i->datepaid = $date;
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