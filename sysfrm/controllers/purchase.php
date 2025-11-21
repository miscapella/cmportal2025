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
$ui->assign('_sysfrm_menu', 'purchase');
$ui->assign('_st', 'Faktur Pembelian');
$ui->assign('_title', 'Pembelian - ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);


switch ($action) {
    case 'add':
//find all clients.

        Event::trigger('purchase/add/');

        $extra_fields = '';
        $extra_jq = '';

        Event::trigger('add_purchase');

        $ui->assign('extra_fields', $extra_fields);

        if (isset($routes['2']) AND ($routes['2'] == 'recurring')) {
            $recurring = true;
        } else {
            $recurring = false;
        }


        $ui->assign('recurring', $recurring);



        if (isset($routes['3']) AND ($routes['3'] != '')) {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->where('code','Supplier')->find_one($p_cid);
            if ($p_d) {
                $ui->assign('p_cid', $p_cid);
            }
        } else {
            $ui->assign('p_cid', '');
        }

        $ui->assign('_st', 'Tambah Faktur Pembelian');
        $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->where('code','Supplier')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);

        $t = ORM::for_table('sys_tax')->find_many();
        $ui->assign('t', $t);

        $ui->assign('idate', date('d-m-Y'));


		$js_file = 'purchase';
		$tpl_file = 'add-purchase.tpl';

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal','dp/dist/datepicker.min','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal',$js_file)));


        $ui->assign('xjq', '



 '.
            $extra_jq);





        $ui->display($tpl_file);


        break;


    case 'edit':

        Event::trigger('purchase/edit/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_purchase')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();
            $ui->assign('items', $items);
//find the user
            $a = ORM::for_table('crm_accounts')->where('code','Supplier')->find_one($d['userid']);
            $ui->assign('a', $a);
            $ui->assign('d', $d);
            $ui->assign('_st', 'Edit Faktur Pembelian');
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->where('code','Supplier')->find_many();
            $ui->assign('c', $c);

            $t = ORM::for_table('sys_tax')->find_many();
            $ui->assign('t', $t);

//default idate ddate
            $ui->assign('idate', date('d-m-Y'));

                $js_file = 'edit-purchase-v2';
                $tpl_file = 'edit-purchase.tpl';

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


     case 'stock':

        Event::trigger('purchase/stock/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_purchase')->find_one($id);
        if ($d) {

            $ui->assign('i', $d);
            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();
            $ui->assign('items', $items);
            $t = ORM::for_table('sys_gudang')->order_by_asc('id')->find_many();
            $ui->assign('t', $t);
//find the user
            $ui->assign('_st', 'Penerimaan Pembelian');
//default idate ddate
            $ui->assign('idate', date('d-m-Y'));
            $ui->assign('tgl', date('d-m-Y', strtotime($d['date'])));

                $js_file = 'stock-purchase';
                $tpl_file = 'stock-purchase.tpl';

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

   case 'view':

        Event::trigger('purchase/view/');

        $id = $routes['2'];
        $d = ORM::for_table('sys_purchase')->find_one($id);
        if ($d) {

            //find all activity for this user
            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();
            $ui->assign('items', $items);
            //find related transactions
            $trs_c = ORM::for_table('sys_transactions')->where('iid', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('iid', $id)->order_by_desc('id')->find_many();


            $ui->assign('trs', $trs);
            $ui->assign('trs_c', $trs_c);

            $emls_c = ORM::for_table('sys_email_logs')->where('iid', $id)->count();

            $emls = ORM::for_table('sys_email_logs')->where('iid', $id)->order_by_desc('id')->find_many();


            $ui->assign('emls', $emls);
            $ui->assign('emls_c', $emls_c);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a', $a);
            $ui->assign('d', $d);

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

            $ui->assign('i_due', $i_due);


            //find all custom fields

            $cf = ORM::for_table('crm_customfields')->where('showinvoice','Yes')->order_by_asc('id')->find_many();
            $ui->assign('cf',$cf);


            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','sn/summernote','sn/summernote-bs3','modal','sn/summernote-sysfrm')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal','sn/summernote.min','jslib/purchase-view')));

            $x_html = '';

            Event::trigger('view_purchase');


            $ui->assign('x_html',$x_html);

            $ui->display('purchase-view.tpl');

        } else {
            r2(U . 'purchase/list', 'e', 'No. Invoice tersebut tidak ada');
        }

        break;

    case 'add-post':

        Event::trigger('purchase/add-post/');


        $cid = _post('cid');
		$batch = $_POST['batch'];
		$qty = $_POST['qty'];
        //find user with cid
        $u = ORM::for_table('crm_accounts')->find_one($cid);

		$msg = '';
        if ($cid == '') {
            $msg .= 'Pilih Supplier <br> ';
        }

        $notes = _post('notes');


        if (isset($_POST['amount'])) {
            $amount = $_POST['amount'];
        } else {
            $msg .= $_L['at_least_one_item_required'].' <br> ';
        }

		$idate = date('Y-m-d', strtotime(_post('idate')));
        $its = strtotime($idate);
        $duedate = _post('duedate');
        $dd = '';
        if ($duedate == 'due_on_receipt') {
            $dd = $idate;
        } elseif ($duedate == 'days3') {
            $dd = date('Y-m-d', strtotime('+3 days', $its));

        } elseif ($duedate == 'days5') {
            $dd = date('Y-m-d', strtotime('+5 days', $its));
        } elseif ($duedate == 'days7') {
            $dd = date('Y-m-d', strtotime('+7 days', $its));
        } elseif ($duedate == 'days10') {
            $dd = date('Y-m-d', strtotime('+10 days', $its));
        } elseif ($duedate == 'days15') {
            $dd = date('Y-m-d', strtotime('+15 days', $its));
        } elseif ($duedate == 'days30') {
            $dd = date('Y-m-d', strtotime('+30 days', $its));
        } elseif ($duedate == 'days45') {
            $dd = date('Y-m-d', strtotime('+45 days', $its));
        } elseif ($duedate == 'days60') {
            $dd = date('Y-m-d', strtotime('+60 days', $its));
        } else {

            $msg .= 'Invalid Date <br> ';

        }
        if (!$dd) {
            $msg .= 'Date Parsing Error <br> ';
        }
		
		$errbatch= 0;
		foreach($batch as $value) {
			$value= strtoupper($value);
			if(empty($value))
				$errbatch = 1;
			else {
	            $x = ORM::for_table('sys_purchaseitems')->where('batch_number',$value)->find_one();
				if($x)
					$msg .= 'No. Batch <b>'.$value.'</b> telah ada <br> ';
			}
		}
		if($errbatch==1) {
            $msg .= 'No. Batch ada yang kosong <br> ';
		}

        $repeat = _post('repeat');
        $nd = date('Y-m-d',strtotime($idate));
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
            }

            $taxed_amount = 0.00;

            foreach ($amount as $samount) {
                $samount = Finance::amount_fix($samount);
                $a[$i] = $samount;
                /* @since v 2.0 */
                $sqty = $qty[$i];

                $sqty = Finance::amount_fix($sqty);

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

             //   $taxval += $a_tax;




                $i++;
            }


            //Create No. Faktur Beli
//			$invoicenum = _post('invoicenum');
			$bl=date('n',strtotime(_post('idate')));
			$th=date('Y',strtotime(_post('idate')));
			$query = ORM::for_table('sys_purchase')->raw_query("SELECT * FROM sys_purchase where month(date)=$bl and year(date)=$th order by invoicenum desc")->find_one();
			if($query) {
				$invoicenum = ++$query['invoicenum'];
			} else {
				$invoicenum = 'PBL/'.date('m',strtotime(_post('idate'))).'/'.date('Y',strtotime(_post('idate'))).'/0001';
			}
            $cn = ''; //_post('cn');

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

            $actual_taxed_amount = $taxed_amount - $actual_discount;

            if($actual_taxed_amount > 0){
                $taxval = ($actual_taxed_amount * $taxrate) / 100;

            }




            if (($taxed_type != 'individual') AND ($tax != '')) {

                $taxval = ($fTotal * $taxrate) / 100;


            }


            $fTotal = $fTotal + $taxval;


            //

            $vtoken = _raid(10);
            $ptoken = _raid(10);
            $d = ORM::for_table('sys_purchase')->create();
            $d->userid = $cid;
            $d->account = $u['account'];
            $d->date = $idate;
            $d->duedate = $dd;
            $d->subtotal = $sTotal;
            $d->discount_type = $discount_type;
            $d->discount_value = $discount_value;
            $d->discount = $actual_discount;
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
            //others
            $d->invoicenum = $invoicenum;
            $d->cn = $cn;
            $d->tax2 = '0.00';
            $d->taxrate2 = '0.00';
            $d->paymentmethod = '';
            //
            $d->save();
            
            //Simpan Detail
            $invoiceid = $d->id();
            $description = $_POST['desc'];
			$code = $_POST['code'];

            $i = '0';

            foreach ($description as $item) {
                $samount = $a[$i];
                /* @since v 2.0 */
                $sqty = $qty[$i];
				$scode = $code[$i];
				$sbatch = strtoupper($batch[$i]);
                $sqty = Finance::amount_fix($sqty);
                $samount = Finance::amount_fix($samount);
                $ltotal = ($samount) * ($sqty);
				$x = ORM::for_table('sys_barang')->where('code',$scode)->find_one();
                $d = ORM::for_table('sys_purchaseitems')->create();
                $d->invoiceid = $invoiceid;
				$d->type = $x['type'];
                $d->userid = $cid;
                $d->description = $item;
				$d->batch_number = $sbatch;
                $d->qty = $sqty;
                $d->amount = $samount;
                $d->total = $ltotal;

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
                $d->itemcode = $scode;
                $d->taxamount = '0.00';
                $d->duedate = $dd;
                $d->paymentmethod = '';
                $d->notes = '';

                $d->save();
 
//Disable sisa stock pada tabel barang
// 				$z = ORM::for_table('sys_barang')->where('code',$scode)->find_one();
//				if($z) {
//					$cqty = $z['item_number'] + $sqty;
//					$z->item_number = $cqty;
//					$z->save();
//				}

                $i++;
            }

            Event::trigger('add_purchase_posted');

            echo $invoiceid;

        } else {
            echo $msg;
        }


        break;

    case 'list':

        Event::trigger('purchase/list/');

        $ui->assign('xfooter', Asset::js(array('numeric')));
        $paginator = Paginator::bootstrap('sys_purchase');
        $d = ORM::for_table('sys_purchase')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
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
				   window.location.href = _url + "delete/purchase/" + id;
			   }
			});
		});
		$(".filter").hide();


 ');
        $ui->display('list-purchase.tpl');
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

        Event::trigger('purchase/edit-post/');

        $cid = _post('cid');
        $iid = _post('iid');
		$batch = $_POST['batch'];
		$qty = $_POST['qty'];
        //find user with cid
        $u = ORM::for_table('crm_accounts')->find_one($cid);

        $msg = '';
        if ($cid == '') {
            $msg .= 'Pilih Supplier <br> ';
        }

        $notes = _post('notes');


        if (isset($_POST['amount'])) {
            $amount = $_POST['amount'];
        } else {
            $msg .= $_L['at_least_one_item_required'].' <br> ';
        }



		$idate = date('Y-m-d', strtotime(_post('idate')));
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

		$errbatch= 0;
		foreach($batch as $value) {
			$value= strtoupper($value);
			if(empty($value))
				$errbatch = 1;
			else {
	            $x = ORM::for_table('sys_stock')->where('batch_number',$value)->find_one();
				if($x)
					$msg .= 'No. Batch <b>'.$value.'</b> telah ada <br> ';
			}
		}
		if($errbatch==1) {
            $msg .= 'No. Batch ada yang kosong <br> ';
		}

        if ($msg == '') {

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



            $d = ORM::for_table('sys_purchase')->find_one($iid);
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
                $d->save();

                $invoiceid = $iid;
                $description = $_POST['desc'];
				$code = $_POST['code'];

                $i = '0';
// first delete all related items
//                $x = ORM::for_table('sys_purchaseitems')->where('invoiceid', $iid)->find_many();
//				foreach($x as $y) {
//					$z = ORM::for_table('sys_barang')->where('code',$y['code'])->find_one();
//					if($z) {
//						$cqty = $z['item_number'] - $y['qty'];
//						$z->item_number = $cqty;
//						$z->save();
//					}
//				}
                $x = ORM::for_table('sys_purchaseitems')->where('invoiceid', $iid)->delete_many();
                foreach ($description as $item) {

                    $samount = $a[$i];
                    /* @since v 2.0 */
                    $sqty = $qty[$i];
					$scode = $code[$i];
					$sbatch = strtoupper($batch[$i]);
                    $sqty = Finance::amount_fix($sqty);
                    $samount = Finance::amount_fix($samount);
                    $ltotal = ($samount) * ($sqty);
					$x = ORM::for_table('sys_barang')->where('code',$scode)->find_one();
                    $d = ORM::for_table('sys_purchaseitems')->create();
                    $d->invoiceid = $invoiceid;
					$d->type = $x['type'];
                    $d->userid = $cid;
					$d->batch_number = $sbatch;
                    $d->description = $item;
                    $d->qty = $sqty;
                    $d->amount = $samount;
                    $d->total = $ltotal;

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
                    $d->itemcode = $scode;
                    $d->taxamount = '0.00';
                    $d->duedate = $duedate;
                    $d->paymentmethod = '';
                    $d->notes = '';
                    $d->save();
                    $i++;
                }

                echo $invoiceid;
            } else {

                // invoice not found
				$msg .= 'Invoice tidak ditemukan <br>';
            }

        } else {
            echo $msg;
        }

        break;

    case 'stock-post':

        Event::trigger('purchase/stock-post/');

		$idate = date('Y-m-d', strtotime(_post('idate')));
		$tid = $_POST['tid'];
		$iid = $_POST['iid'];
		$batch = $_POST['batch'];
        $msg = '';

		$errinv= 0;
		foreach($tid as $value) {
			if(empty($value))
				$errinv = 1;
		}
		if($errinv==1) {
            $msg .= 'Kode Gudang ada yang belum diisi <br> ';
		}

        if ($msg == '') {

			$d = ORM::for_table('sys_purchase')->find_one($iid);
            if ($d) {
				try {
					$d->tgl_terima = $idate;
					$d->save();
	
					$description = $_POST['desc'];
					$code = $_POST['code'];
	
					$i = '0';
	// first delete all related items
					foreach ($description as $item) {
	
						$stid = $tid[$i];
						$scode = $code[$i];
						$sbatch = $batch[$i];
						$sqty = $qty[$i];
						$d = ORM::for_table('sys_purchaseitems')->where('batch_number',$sbatch)->find_one();
						$d->tgl_terima = $idate;
						$d->id_gudang = $stid;
	
						$d->save();
						
						$x = ORM::for_table('sys_barang')->where('code',$scode)->find_one();
						$e = ORM::for_table('sys_stock')->create();
						$e->batch_number = $sbatch;
						$e->code = $scode;
						$e->name = $item;
						$e->unit = $x['unit'];
						$e->item_number = $sqty;
						$e->hpp = $d['total']/$d['qty'];
						$e->shape = $x['shape'];
						$e->pack = $x['pack'];
						$e->type = $x['type'];
						$e->id_gudang = $stid;
						$e->add_date = $idate;
						$e->save();
						
						//Table LapStock
						$g = ORM::for_table('lapstock')->where('code',$scode)->order_by_desc('id')->find_one();
						if($g)
							$saldo=$g['saldo'];
						else
							$saldo=0;
						$f = ORM::for_table('lapstock')->create();
						$f->date = $idate;
						$f->type_acc = 'Debet';
						$f->batch_number = $sbatch;
						$f->code = $scode;
						$f->name = $item;
						$f->unit = $x['unit'];
						$f->debet = $d['qty'];
						$f->saldo = $saldo + $d['qty'];
						$f->shape = $x['shape'];
						$f->pack = $x['pack'];
						$f->type = $x['type'];
						$f->id_gudang = $stid;
						$f->save();
						
						$i++;
					}
	
					echo $iid;
				}
				catch(PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
            } else {

                // invoice not found
				$msg .= 'Invoice tidak ditemukan <br>';
            }

        } else {
            echo $msg;
        }

        break;

    case 'delete':

        Event::trigger('purchase/delete/');

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