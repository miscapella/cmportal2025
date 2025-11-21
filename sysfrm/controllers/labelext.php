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
$ui->assign('_sysfrm_menu', 'engineering');
$ui->assign('_st', 'Received Supplier Purchase Order');
$ui->assign('_title', 'Supplier PO - ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);


switch ($action) {
    case 'add':
//find all clients.

		_auth1('LABELEXT-ADD',$user['id']);
        Event::trigger('labelext/add/');

        $extra_fields = '';
        $extra_jq = '';

		$ui->assign('_sysfrm_menu1', 'list-labelext');

        $ui->assign('_st', 'Tambah Label Eksternal');

        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
			$e = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.name')->select('b.satuan')->select('b.equip_no')->select('b.draw_no')->select('b.qrcode')->join('sys_barang',array('a.code','=','b.code'),'b')->where('a.invoiceid',$d['id'])->find_many();
			$ui->assign('j', $e);
			$js_file = 'labelext';
			$tpl_file = 'add-labelext.tpl';

			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor','btn-top/btn-top')));
			$ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file,'btn-top/btn-top')));


			$ui->assign('xjq', '
	 '.
				$extra_jq);





			$ui->display($tpl_file);
		}

        break;

    case 'modal-cari':
		$kata = _post('kata');
		$_url = _post('_url');
		$d1 = ORM::for_table('sys_invoices')->where_raw('`progress` >= 25')->where_like('suppponum', "%$kata%")->order_by_desc('invoicenum')->order_by_desc('suppponum');
		$e = $d1->find_many();
		$f = $d1->count();
		echo '<table class="table table-bordered table-hover sys_table" id="items_table">
				<thead>
				<tr>
					<th>#SUPPPO No.</th>
					<th>Supplier</th>
					<th>File Label</th>
					<th class="text-right">Manage</th>
				</tr>
				</thead>
				<tbody>';
		if($f > 0){
			foreach($e as $ds1){
				echo '<tr id="hasil-cari">
					<td>'.$ds1['suppponum'].'</td>
					<td><a href="'.$_url.'supplier/view/'.$ds1['suppid'].'/">'.$ds1['account_supp'].'</a> </td>
					<td>'.$ds1['filelabel'].'</td>
					<td class="text-right">';
						if($ds1['invoicenum'] == Null) {
							if ($ds1['progress']==25) {
								echo '<a href="?ng=labelext/add/'.$ds1['id'].'" class="btn btn-primary btn-xs btn-file" id="'.$ds1['id'].'"><i class="fa fa-check"></i> Upload File Label<input type="file" id="'.$ds1['id'].'" name="file"></a>
								<a href="?ng=labelext/add/'.$ds1['id'].'" class="btn btn-info btn-xs" id="'.$ds1['id'].'"><i class="fa fa-check"></i> Add Label Ext</a>
								<a href="#" class="btn btn-success btn-xs approve" id="iid'.$ds1['id'].'"><i class="fa fa-check"></i> Process to Approve</a>';
							} else {
								if ($ds1['progress']==26) {
									echo '<a href="#" class="btn btn-danger btn-xs capprove" id="'.$ds1['id'].'"><i class="fa fa-close"></i> Cancel Process to Approve</a>';
								}
								if ($ds1['progress']==27) {
									echo '<a href="#" class="btn btn-success btn-xs cert" id="'.$ds1['id'].'"><i class="fa fa-check"></i> Certificate</a>';
								}
								if ($ds1['progress']==28) {
									echo '<a href="#" class="btn btn-danger btn-xs cert1" id="'.$ds1['id'].'"><i class="fa fa-check"></i> Cancel Certificate</a>';
								}
							}
						}
						echo ' <a href="'.$_url.'labelext/view/'.$ds1['id'].'/" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
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

	case 'view':

		_auth1('ENGINEER-VIEW',$user['id']);
        Event::trigger('engineer/view/');

        $id = $routes['2'];
		$flag = $routes['3'];
		$loc = '';
		if($flag == '') {
			$ui->assign('_sysfrm_menu1', 'list-labelext');
			$loc = 'labelext/list';
		}
		else {
			$ui->assign('_sysfrm_menu', 'approval');
			$ui->assign('_sysfrm_menu1', 'list-labelext-apv');
			$loc = 'labelext/list-apv';
		}
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
			$ui->assign('progress',$d['progress']);
//find the user
			$e = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.name')->select('b.satuan')->select('b.equip_no')->select('b.draw_no')->select('b.qrcode')->join('sys_barang',array('a.code','=','b.code'),'b')->where('a.invoiceid',$d['id'])->find_many();
			$ui->assign('j', $e);
            $ui->assign('_st', 'View Supplier Purchase Order');
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->where('code','Customer')->where('id',$d['userid'])->find_one();
            $ui->assign('c', $c);


//default idate ddate
            $ui->assign('idate', $d['date_supppo']);

			$js_file = 'view-labelext';
			$tpl_file = 'view-labelext.tpl';

            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
            $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));

            $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
$("#submit").click(function (e) {
	    var _url = $("#_url").val();
        e.preventDefault();
        $("#ibox_form").block({ message: null });
		window.location = _url + "'.$loc.'";
    });
');

            $ui->display($tpl_file);

        } else {
            echo 'No. Supplier PO Not Found';
        }
//find all clients.


        break;

    case 'approve':
		_auth1('ENGI-RECEIVED',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);
		$date=date('Y-m-d');

		if($d){
			if($d['progress'] == 25) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=26,to_labelext_apv='$date' where id='$id'");

				r2(U.'labelext/list','s', $type. ' Process to Approve');
			} else {
				r2(U.'labelext/list','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'labelext/list','e', 'Not Found');
		}
    break;
    case 'apv':
		_auth1('ENGI-LBLEXT',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$date=date('Y-m-d');
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 26) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=27,labelext_apv='$date' where id='$id'");

				r2(U.'labelext/list-apv','s', $type. ' Approved');
			} else {
				r2(U.'labelext/list-apv','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'labelext/list-apv','e', 'Not Found');
		}
    break;
    case 'capv':
		_auth1('ENGI-LBLEXT',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 27) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=26,labelext_apv=null where id='$id'");

				r2(U.'labelext/list-apv','s', $type. ' Cancel Approve');
			} else {
				r2(U.'labelext/list-apv','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'labelext/list-apv','e', 'Not Found');
		}
    break;

    case 'cert':
		_auth1('ENGI-LBLEXT',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$date=date('Y-m-d');
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 27) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=28,to_cert='$date' where id='$id'");

				r2(U.'labelext/list','s', $type. ' Process to Certificate');
			} else {
				r2(U.'labelext/list','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'labelext/list','e', 'Not Found');
		}
    break;
    case 'cert1':
		_auth1('ENGI-LBLEXT',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 28) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=27,to_cert=null where id='$id'");

				r2(U.'labelext/list','s', $type. ' Cancel Process to Certificate');
			} else {
				r2(U.'labelext/list','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'labelext/list','e', 'Not Found');
		}
    break;

    case 'capprove':
		_auth1('SUPPPO-APPROVE',$user['id']);
		$id = $routes['2'];
		$id = str_replace('iid','',$id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if($d){
			if($d['progress'] == 26) {
                ORM::for_table('sys_invoices')->raw_execute("update sys_invoices set progress=25,to_labelext_apv=null where id='$id'");

				r2(U.'labelext/list','s', $type. ' Cancel Process to Approve');
			} else {
				r2(U.'labelext/list','e', 'Telah ada transaksi');
			}

		}
		else{
			r2(U.'labelext/list','e', 'Not Found');
		}
    break;

	case 'list':

        Event::trigger('labelext/list/');

		$ui->assign('_st', 'Labeling External');
		$ui->assign('_sysfrm_menu', 'engineering');
		$ui->assign('_sysfrm_menu1', 'list-labelext');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','list-labelext','btn-top/btn-top')));
        //$paginator = Paginator::bootstrap('sys_invoices','progress','CustPO','progress', 'Sales');
        // $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= ? and `progress` <= ?)\', array(25,28))->count()');
        // $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= ? and `progress` <= ?)', array(25,28))->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('invoicenum')->order_by_desc('custponum')->find_many();
        $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= 25)\')->count()');
        $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= 25)')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('invoicenum')->order_by_desc('suppponum')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
		$(".approve").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "labelext/approve/" + id;
			   }
			});
		});
		$(".capprove").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "labelext/capprove/" + id;
			   }
			});
		});
		$(".cert").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "labelext/cert/" + id;
			   }
			});
		});
		$(".cert1").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "labelext/cert1/" + id;
			   }
			});
		});
		$(".filter").hide();


 ');
        $ui->display('list-labelext.tpl');
        break;

	case 'list-apv':

        Event::trigger('labelext/list-apv/');

		$ui->assign('_st', 'Labeling External - Approval');
		$ui->assign('_sysfrm_menu', 'approval');
		$ui->assign('_sysfrm_menu1', 'list-labelext-apv');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','list-labelext','btn-top/btn-top')));
        //$paginator = Paginator::bootstrap('sys_invoices','progress','CustPO','progress', 'Sales');
        // $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= ? and `progress` <= ?)\', array(26,27))->count()');
        // $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= ? and `progress` <= ?)', array(26,27))->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('invoicenum')->order_by_desc('custponum')->find_many();
        $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(sys_invoices)->where_raw(\'(`progress` >= 26)\')->count()');
        $d = ORM::for_table('sys_invoices')->where_raw('(`progress` >= 26)')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('invoicenum')->order_by_desc('custponum')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
        $(\'.amount\').autoNumeric(\'init\');
		$(".apv").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "labelext/apv/" + id;
			   }
			});
		});
		$(".capv").click(function (e) {
			e.preventDefault();
			var id = this.id;
			bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
			   if(result){
				   var _url = $("#_url").val();
				   window.location.href = _url + "labelext/capv/" + id;
			   }
			});
		});
		$(".filter").hide();


 ');
        $ui->display('list-labelext-apv.tpl');
        break;

    case 'standart':
		$id = _post(id);
		$inv_id = _post(inv_id);
		try
		{
			ORM::get_db()->beginTransaction();
			$d = ORM::for_table('sys_invoiceitems')->where('invoiceid',$inv_id)->where('code',$id)->find_one();
			if($d) {
				$d->labelext = 'Standart';
				$d->save();
				ORM::get_db()->commit();

				_log1('Set Label External Standart, Inv ID: '.$inv_id.', Code : '.$id,$user['username'],$user['id']);
				echo 'set Label Ext : Standart';
			}
		}
		catch(PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
		}

		break;

    case 'upload':
		$id = _post(id);
		$inv_id = _post(inv_id);
		$validextentions = array("pdf","jpg","jpeg");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		$file_name = '';
		if (($_FILES["file"]["size"] <= 10000000)//approx. 10mb files can be uploaded
			&& in_array($file_extension, $validextentions)){
			try
			{
				ORM::get_db()->beginTransaction();
				$file_name = $inv_id.'_'.$id.'.'.$file_extension;
				if(file_exists('uploads/labelext/'.$d['labelext']))
					unlink('uploads/labelext/'.$d['labelext']);
				move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/labelext/'.$file_name);
				$d = ORM::for_table('sys_invoiceitems')->where('invoiceid',$inv_id)->where('code',$id)->find_one();
				if($d) {
					$d->labelext = $file_name;
					$d->save();
					ORM::get_db()->commit();

					_log1('Add Label External File : '.$file_name,$user['username'],$user['id']);
					echo $file_name;
				} else {
					echo 1;
				}
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		} else
			if ($_FILES["file"]["size"] > 10000000){
				echo 2;
			}
			else echo 3;

		break;

    case 'filelabel':
		$id = _post(id);
		$validextentions = array("pdf","xls","xlsx");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		$file_name = '';
		if (($_FILES["file"]["size"] <= 10000000)//approx. 10mb files can be uploaded
			&& in_array($file_extension, $validextentions)){
			try
			{
				ORM::get_db()->beginTransaction();
				$file_name = $id.'.'.$file_extension;
				if(file_exists('uploads/filelabel/'.$d['filelabel']))
					unlink('uploads/filelabel/'.$d['filelabel']);
				move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/filelabel/'.$file_name);
				$d = ORM::for_table('sys_invoices')->find_one($id);
				if($d) {
					$d->filelabel = $file_name;
					$d->save();
					ORM::get_db()->commit();

					_log1('Add File Label : '.$file_name,$user['username'],$user['id']);
					echo $file_name;
				} else {
					echo 1;
				}
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		} else
			if ($_FILES["file"]["size"] > 10000000){
				echo 2;
			}
			else echo 3;

		break;

    case 'hapus':
		$id = _post(id);
		$inv_id = _post(inv_id);
		$d = ORM::for_table('sys_invoiceitems')->where('invoiceid',$inv_id)->where('code',$id)->find_one();
		if($d) {
			$file_name = $d['labelext'];
			if(file_exists('uploads/labelext/'.$d['labelext']))
				unlink('uploads/labelext/'.$d['labelext']);
			try
			{
				ORM::get_db()->beginTransaction();

				$d->labelext = '';
				$d->save();
				ORM::get_db()->commit();

				_log1('Delete Label External File : '.$file_name,$user['username'],$user['id']);
				echo 'Berhasil hapus '.$file_name;
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
		}
		break;
    default:
        echo 'action not defined';
}