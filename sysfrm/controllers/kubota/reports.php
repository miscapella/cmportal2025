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
//it will handle all settings
_auth();
$ui->assign('_title', $_L['Reports'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Reports']);
$ui->assign('_sysfrm_menu', 'reports');
$ui->assign('_theme', $_theme);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
$fdate = date('01-m-Y');
$tdate = date('t-m-Y');
$spath = 'prog/'.$_SESSION['menu'].'/';

//first day of month
$first_day_month = date('Y-m-01');
//
$this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
$month_n = date('n');
$months = array (1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'Mei',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Okt',11=>'Nov',12=>'Des');

switch ($action) {
    case 'penjualan':

		$tdate = date('Y M');

        $ui->assign('tdate', $tdate);
		$ui->assign('_sysfrm_menu1', 'lapjual');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'])));
        $ui->assign('xjq', '');
        $ui->display($spath.'lapjual.tpl');


        break;

    case 'lapjual-print':

		$tdate = _post('tdate');
		$bl=substr($tdate,0,2);
		$th=substr($tdate,3,4);
		$d = ORM::for_table('data_penjualan')->raw_query("SELECT * FROM data_penjualan where month(tgl_jual)=$bl and year(tgl_jual)=$th order by no_jual");
		$x = $d->find_one();

        if($x) {
			echo "<script>window.location.href='".U."reports/penjualan';window.open('".U."reports/lapjual-print-s/".$tdate."')</script>";
		}
		else
			r2(U . 'reports/penjualan', 'e', 'Tidak ada Data !');
		break;
	
    case 'lapjual-print-s':

        if (isset($routes['3'])) {
			$tdate=$routes['3'];
			$bl=substr($tdate,0,2);
			$th=substr($tdate,3,4);
			$d = ORM::for_table('data_penjualan')->raw_query("SELECT * FROM data_penjualan where month(tgl_jual)=$bl and year(tgl_jual)=$th order by no_jual");
			$y = $d->find_many();
			$tablename = substr(uniqid(rand(), true),0,8);
			$tmp=ORM::raw_execute('CREATE TEMPORARY TABLE IF NOT EXISTS '.$tablename.' AS (SELECT * FROM tmp_lapjual)');
			
			foreach ($y as $item) {
				$total =$item['harga_kosong']+$item['by_surat']-$item['discount'];
				$tmp=ORM::raw_execute('insert into '.$tablename.' (id_cust,account,address,no_jual,no_bast,no_faktur,tgl_jual,tgl_jto,no_chassis,no_engine,cara,jenis,lama,harga_kosong,by_surat,discount,panjar,total,tgl_cetakbast) 
						values("'.$item['id_cust'].'","'.$item['account'].'","'.$item['address'].'","'.$item['no_jual'].'","'.$item['no_bast'].'","'.$item['no_faktur'].'","'.$item['tgl_jual'].'","'.$item['tgl_jto'].'","'.$item['no_chassis'].'","'.$item['no_engine'].'",
						"'.$item['cara'].'",'.$item['jenis'].','.$item['lama'].','.$item['harga_kosong'].','.$item['by_surat'].','.$item['discount'].','.$item['panjar'].','.$total.',"'.$item['tgl_cetakbast'].'")');
			}
			$tmp1=ORM::for_table($tablename)->find_many();
			$ui->assign('d',$tmp1);
			$ui->assign('tdate',$months[(int)$bl].' '.$th);

			$ui->display($spath.'lapjual-print.tpl');
		}
		break;

	case 'piutang':
        // $d = ORM::for_table('sys_barang')->where_any_is(array(array('type'=>'Service'),array('type'=>'Kemasan')))->find_many();
        // $ui->assign('d', $d);

		$tdate = date('Y M');
        $ui->assign('tdate', $tdate);
		$ui->assign('_sysfrm_menu1', 'lappiu');
		$ui->assign('flag',$flag);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'])));
        $ui->assign('xjq', '');

        $ui->display($spath.'lappiu.tpl');


        break;

    case 'piutang-print':

        $tdate = date('Y-m-d',strtotime('01-'._post('tdate')));
        $tdate1 = date('Y-m-t',strtotime('20-'._post('tdate')));
		$bl=substr($tdate,5,2);
		$th=substr($tdate,0,4);
		$d = ORM::for_table('ar_card')->raw_query("SELECT * FROM ar_card where tgl<='$tdate1' order by no_jual");
		$x = $d->find_one();

        if($x) {
			echo "<script>window.location.href='".U."reports/piutang';window.open('".U."reports/piutang-print-s/".$tdate."')</script>";
		}
		else
			r2(U . 'reports/piutang', 'e', $tdate);
		break;

    case 'piutang-print-s':

        if (isset($routes['3'])) {
			$tdate=$routes['3'];
			$bl=substr($tdate,5,2);
			$th=substr($tdate,0,4);
				
			$tablename = substr(uniqid(rand(), true),0,8);
			$tmp=ORM::raw_execute('CREATE TEMPORARY TABLE IF NOT EXISTS '.$tablename.' AS (SELECT * FROM tmp_lappiu)');

			//Proses Saldo Awal
			//$d = ORM::for_table('data_penjualan');
			$d = ORM::for_table('data_penjualan')->raw_query("SELECT * FROM data_penjualan where (tgl_lunas>='".$tdate."' or isnull(tgl_lunas)) and tgl_cetakbast<'".$tdate."' order by no_jual");
			$y = $d->find_many();
			
			$sum=0;
			foreach ($y as $item) {
				//cek pembayaran saldo awal
				$e = ORM::for_table('ar_card')->raw_query("SELECT * FROM ar_card where no_jual='".$item['no_jual']."' and tgl<'".$tdate."' order by no_urut desc")->find_one();
				if($e) {
					$awalp = $e['akhir_pokok'];
					$awalb = $e['akhir_bunga'];
				} else {
					$awalp = 0;
					$awalb = 0;
				}
				$tmp=ORM::raw_execute('insert into '.$tablename.' (id_cust,account,no_jual,tgl_jual,tgl_jto,no_chassis,no_engine,awal_pokok,awal_bunga) 
						values("'.$item['id_cust'].'","'.$item['account'].'","'.$item['no_jual'].'","'.$item['tgl_cetakbast'].'","'.$item['tgl_jto'].'","'.$item['no_chassis'].'","'.$item['no_engine'].'",'.$awalp.','.$awalb.')');

			}

			//Proses Debet
			$d = ORM::for_table('data_penjualan')->raw_query("SELECT * FROM data_penjualan where month(tgl_cetakbast)=".$bl." and year(tgl_cetakbast)=".$th." order by no_jual");
			$y = $d->find_many();
			
			foreach ($y as $item) {
				$e = ORM::for_table('ar_card')->raw_query("SELECT * FROM ar_card where no_jual='".$item['no_jual']."' and keterangan='PENJUALAN'")->find_one();
				if($e) {
					$debetp = $e['debet_pokok'];
				} else {
					$debetp = 0;
				}
				$e = ORM::for_table('ar_card')->raw_query("SELECT * FROM ar_card where no_jual='".$item['no_jual']."' and keterangan='BUNGA ANGSURAN'")->find_one();
				if($e) {
					$debetb = $e['debet_bunga'];
				} else {
					$debetb = 0;
				}
				$tmp=ORM::raw_execute('insert into '.$tablename.' (id_cust,account,no_jual,tgl_jual,tgl_jto,no_chassis,no_engine,debet_pokok,debet_bunga) 
						values("'.$item['id_cust'].'","'.$item['account'].'","'.$item['no_jual'].'","'.$item['tgl_cetakbast'].'","'.$item['tgl_jto'].'","'.$item['no_chassis'].'","'.$item['no_engine'].'",'.$debetp.','.$debetb.')');
			}

			//Proses Kredit
			$e = ORM::for_table('ar_card')->raw_query("SELECT distinct no_jual FROM ar_card where month(tgl)=".$bl." and year(tgl)=".$th.' order by no_jual')->find_many();
			foreach ($e as $e1) {
				//$f = ORM::for_table('ar_card')->raw_query("SELECT * FROM ar_card where month(tgl)=".$bl." and year(tgl)=".$th.' and no_jual="'.$e1['no_jual'].'" and left(no_transaksi,2)="BP"');
				$f = ORM::for_table('ar_card')->where_gte('tgl',date('Y-m-d',strtotime($th.'-'.$bl.'-01')))->where_lte('tgl',date('Y-m-t',strtotime($th.'-'.$bl.'-20')))->where('no_jual',$e1['no_jual']);
				$kreditp = $f->sum('kredit_pokok');
				$kreditb = $f->sum('kredit_bunga');
				//$kreditb = 0;
				
				$tmp=ORM::raw_execute('update '.$tablename.' set kredit_pokok='.$kreditp.',kredit_bunga='.$kreditb.' where no_jual="'.$e1['no_jual'].'"');
			}
			$q = ORM::for_table($tablename)->find_many();
			foreach ($q as $q1) {
				$q1->akhir_pokok = $q1['awal_pokok'] + $q1['debet_pokok'] - $q1['kredit_pokok'] - $q1['lain_pokok'];
				$q1->akhir_bunga = $q1['awal_bunga'] + $q1['debet_bunga'] - $q1['kredit_bunga'] - $q1['lain_bunga'];
				
				//cek tunggakkan
				$tunggak1=0;
				$tunggak2=0;
				$tunggak3=0;
				$s = ORM::for_table('ar_card')->where('no_jual',$q1['no_jual'])->where_lte('tgl',date('Y-m-t',strtotime($th.'-'.$bl.'-20')))->where_gt('angs_ke',0)->order_by_desc('no_urut')->find_one();
				if($s) {
					$cangs_ke = $s['angs_ke'];
					$cjlh_byr = $s['angsuran']-$s['kredit_pokok']-$s['kredit_bunga'];
					$cjto = $s['tgl_jto'];
				} else {
					$cangs_ke = 0;
					$cjlh_byr = 0;
					$cjto = null;
				}
				if($cjto <> null) {
					if($cjto<date('Y-m-t',strtotime($th.'-'.$bl.'-20'))) {
						$selisih_tgl =floor((strtotime(date('Y-m-t',strtotime($th.'-'.$bl.'-20'))) - strtotime($cjto))/(60*60*24));
						if($selisih_tgl <=30) {
							$tunggak1 += $cjlh_byr;
						} else if($selisih_tgl >30 and $selisih_tgl<= 60) {
							$tunggak2 += $cjlh_byr;
						} else
							$tunggak3 += $cjlh_byr;
					}
				}
				$t = ORM::for_table('amortisasi')->where('no_jual',$q1['no_jual'])->where_gt('angs_ke',$cangs_ke)->where_lte('tgl_jto',date('Y-m-t',strtotime($th.'-'.$bl.'-20')))->order_by_desc('angs_ke')->find_many();
				foreach ($t as $ts) {
					if($ts['tgl_jto']<date('Y-m-t',strtotime($th.'-'.$bl.'-20'))) {
						$selisih_tgl =floor((strtotime(date('Y-m-t',strtotime($th.'-'.$bl.'-20'))) - strtotime($ts['tgl_jto']))/(60*60*24));
						if($selisih_tgl <=30) {
							$tunggak1 += $ts['angsuran'];
						} else if($selisih_tgl >30 and $selisih_tgl<= 60) {
							$tunggak2 += $ts['angsuran'];
						} else
							$tunggak3 += $ts['angsuran'];
					} else{
						break;
					}
				}
				$q1->t1 = $tunggak1;
				$q1->t2 = $tunggak2;
				$q1->t3 = $tunggak3;
					
				$q1->save();
			}
			$tmp1=ORM::for_table($tablename)->find_many();
			$ui->assign('d',$tmp1);
			$ui->assign('tdate',$months[(int)$bl].' '.$th);

			$ui->display('lappiu-print.tpl');
		}

		break;

	case 'arcard':

		$ui->assign('_sysfrm_menu1', 'arcard');
        $d = ORM::for_table('data_penjualan')->raw_query('select * from data_penjualan where not isnull(tgl_cetakbast) order by no_jual')->find_many();
        $ui->assign('d', $d);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'arcard')));
        $ui->assign('xjq', '');

        $ui->display($spath.'arcard.tpl');


        break;

	case 'arcard-print':

		$no = _post('no');
		$ui->assign('_sysfrm_menu1', 'arcard');
        $d = ORM::for_table('ar_card')->where('no_jual',$no)->order_by_asc('no_urut')->find_many();
        $e = ORM::for_table('data_penjualan')->where('no_jual',$no)->find_one();
        $f = ORM::for_table('crm_accounts')->where('id',$e['id_cust'])->find_one();
        $ui->assign('d', $d);
        $ui->assign('e', $e);
        $ui->assign('f', $f);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'])));
        $ui->assign('xjq', '');

        $ui->display($spath.'arcard-print.tpl');


        break;

	case 'kartustok-bahan':

        $d = ORM::for_table('sys_barang')->where_any_is(array(array('type'=>'Service'),array('type'=>'Kemasan')))->find_many();
        $ui->assign('d', $d);

        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'])));
        $ui->assign('xjq', '
 $("#kode").select2();
$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('kartustok-bahan.tpl');


        break;

    case 'kartustok-bahan-view':

        $fdate = date('Y-m-d',strtotime(_post('fdate')));
        $tdate = date('Y-m-d',strtotime(_post('tdate')));
        $code = _post('kode');
		
        $stype = _post('stype');
        $d = ORM::for_table('sys_stock');
        $d->where('code', $code);
        $d->where_gte('add_date', $fdate);
        $d->where_lte('add_date', $tdate);
        $d->order_by_asc('id');
        $x =  $d->find_one();

        if($x) {
			$tablename = substr(uniqid(rand(), true),0,8);
			$tmp=ORM::raw_execute('CREATE TEMPORARY TABLE IF NOT EXISTS '.$tablename.' AS (SELECT * FROM tmp_kartustok)');
			
			//Proses Saldo Awal
			$saldo = ORM::for_table('lapstock')->where('code',$code)->where_lte('date',$fdate)->order_by_desc('date')->find_one();
			if($saldo) {
				$tmp=ORM::raw_execute('insert into '.$tablename.' (type_acc,date,batch_number,debet,kredit,saldo) 
						values("Saldo","'.$saldo['date'].'","Saldo Awal",0,0,'.$saldo['saldo'].')');
			}
			else {
				$tmp=ORM::raw_execute('insert into '.$tablename.' (type_acc,date,batch_number,debet,kredit,saldo) 
						values("Saldo","'.$fdate.'","Saldo Awal",0,0,0)');
			}
			
			//Proses Debet dan Kredit
			$query = ORM::for_table('lapstock')->where('code',$code)->where_gte('date',$fdate)->where_lte('date',$tdate)->find_many();
			foreach ($query as $q) {
				$tmp=ORM::raw_execute('insert into '.$tablename.' (type_acc,date,batch_number,debet,kredit,saldo) 
					values("'.$q['type_acc'].'","'.$q['date'].'","'.$q['batch_number'].'",'.$q['debet'].','.$q['kredit'].','.$q['saldo'].')');
			}
			$tmp1=ORM::for_table($tablename)->find_many();
			$a = ORM::for_table('sys_barang')->where('code',$code)->find_one();
			$ui->assign('d',$tmp1);
			$ui->assign('fdate',$fdate);
			$ui->assign('tdate',$tdate);
			$ui->assign('code',$code);
			$ui->assign('name',$a['name']);
	//        $ui->assign('account',$account);
	//        $ui->assign('stype',$stype);

			$ui->display('kartustok-bahan-view.tpl');
		}
		else
			r2(U . 'reports/kartustok-bahan', 'e', 'Tidak ada Data !');
	break;

	case 'statement':

        $d = ORM::for_table('sys_accounts')->find_many();
        $ui->assign('d', $d);

        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'])));
        $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $("#payer").select2();
$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display($spath.'statement.tpl');


        break;


    case 'statement-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $account = _post('account');
        $stype = _post('stype');
        $d = ORM::for_table('sys_transactions');
        $d->where('account', $account);
        if($stype == 'credit'){
            $d->where('dr', '0.00');
        }
        elseif($stype == 'debit'){
            $d->where('cr', '0.00');
        }
        else{

        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_asc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('account',$account);
        $ui->assign('stype',$stype);

        $ui->display($spath.'statement-view.tpl');
        break;

    case 'by-date':


        $d = ORM::for_table('sys_transactions')->where('date',$fdate)->order_by_desc('id')->find_many();
        $dr = ORM::for_table('sys_transactions')->where('date',$fdate)->sum('dr');
        if($dr == ''){
            $dr = '0.00';
        }
        $cr = ORM::for_table('sys_transactions')->where('date',$fdate)->sum('cr');
        if($cr == ''){
            $cr = '0.00';
        }
        $ui->assign('d',$d);
        $ui->assign('dr',$dr);
        $ui->assign('cr',$cr);


        $ui->assign('fdate', $fdate);

        if(Ib_I18n::get_code($config['language']) != 'en'){
            $dp_lan = '<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/locale/'.Ib_I18n::get_code($config['language']).'.js"></script>';
            // $x_lan = '$.fn.datepicker.defaults.language = \''.Ib_I18n::get_code($config['language']).'\';';
            $x_lan = '';
        }
        else{

            $dp_lan = '';
            $x_lan = '';
        }

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepaginator/bootstrap-datepaginator.min.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepaginator/bootstrap-datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/moment.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/bootstrap-datepicker.js"></script>
'.$dp_lan.'
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/bootstrap-datepaginator.min.js"></script>
');

        $mdf = Ib_Internal::get_moment_format($config['df']);
        $today = date('Y-m-d');

        $ui->assign('xjq', $x_lan. '

  $(\'#dpx\').datepaginator(
  {

    selectedDate: \''.$today.'\',
    selectedDateFormat:  \'YYYY-MM-DD\',
    textSelected:  "dddd<br/>'.$mdf.'"
}
  );
   $(\'#dpx\').on(\'selectedDateChanged\', function(event, date) {
  // Your logic goes here
 // alert(date);
 $( "#result" ).html( "<h3>'.$_L['Loading'].'.....</h3>" );
 $(\'#tdate\').text(moment(date).format("dddd, '.$mdf.'"));
 $.get( "?ng=ajax.date-summary/" + date, function( data ) {
     $( "#result" ).html( data );
     //alert(date);
     console.log(date);
 });
});



 ');
        $ui->display('reports-by-date.tpl');


        break;

    case 'income':


        $d = ORM::for_table('sys_transactions')->where('type','Income')->limit(20)->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->sum('cr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$fdate)->sum('cr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$fdate)->sum('cr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$fdate)->sum('cr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('fdate', $fdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('cr');
            $gstring .= '["'.ib_lan_get_line($mnth).'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '

  var data = [ '.$gstring.' ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

 ');
        $ui->display('reports-income.tpl');


        break;


    case 'expense':


        $d = ORM::for_table('sys_transactions')->where('type','Expense')->limit(20)->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->sum('dr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$fdate)->sum('dr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$fdate)->sum('dr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$fdate)->sum('dr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('fdate', $fdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('dr');
            $gstring .= '["'.ib_lan_get_line($mnth).'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '

  var data = [ '.$gstring.' ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

 ');
        $ui->display('reports-expense.tpl');


        break;


    case 'income-vs-expense':

        $ai = ORM::for_table('sys_transactions')->sum('cr');
        if($ai == ''){
            $ai = '0.00';
        }
        $ui->assign('ai',$ai);
        $mi = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$fdate)->sum('cr');
        if($mi == ''){
            $mi = '0.00';
        }
        $ui->assign('mi',$mi);

        $wi = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$fdate)->sum('cr');
        if($wi == ''){
            $wi = '0.00';
        }
        $ui->assign('wi',$wi);

        $m3i = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$fdate)->sum('cr');
        if($m3i == ''){
            $m3i = '0.00';
        }
        $ui->assign('m3i',$m3i);

        $ae = ORM::for_table('sys_transactions')->sum('dr');
        if($ae == ''){
            $ae = '0.00';
        }
        $ui->assign('ae',$ae);
        $me = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$fdate)->sum('dr');
        if($me == ''){
            $me = '0.00';
        }
        $ui->assign('me',$me);





        $ui->assign('fdate', $fdate);
        $aime = $ai-$ae;
        $ui->assign('aime', $aime);
        $mime = $mi-$me;
        $ui->assign('mime', $mime);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        $egstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('dr');
            if($cal == ''){
                $cal = '0';
            }
            $egstring .= '["'.$m.'",'.$cal.'], ';
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('cr');
            if($cal == ''){
                $cal = '0';
            }
            $gstring .= '["'.$m.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '



		var d1 = [ '.$gstring.' ];
		var d2 = [ '.$egstring.' ];



		$.plot("#placeholder", [{
			data: d1,
			lines: { show: true, fill: true }
		},  {
			data: d2,
			lines: { show: true, fill: true }
		}]);

 ');
        $ui->display('reports-income-vs-expense.tpl');


        break;

    case 'categories':

        $d = ORM::for_table('sys_cats')->find_many();
        $ui->assign('d', $d);

        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#cat").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('reports-categories.tpl');


        break;


    case 'category-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $cat = _post('cat');

        $d = ORM::for_table('sys_transactions');
        $d->where('category', $cat);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        $ui->display('report-common.tpl');
        break;

    case 'payees':

        $d = ORM::for_table('sys_payee')->find_many();
        $ui->assign('d', $d);

        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#payee").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('reports-payees.tpl');


        break;


    case 'payees-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $payee = _post('payee');

        $d = ORM::for_table('sys_transactions');
        $d->where('payee', $payee);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        $ui->display('report-common.tpl');
        break;

    case 'payers':

        $d = ORM::for_table('sys_payers')->find_many();
        $ui->assign('d', $d);

        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#payer").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('reports-payers.tpl');


        break;


    case 'payer-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $payer = _post('payer');

        $d = ORM::for_table('sys_transactions');
        $d->where('payer', $payer);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        $ui->display('report-common.tpl');
        break;





    case 'cats':

        $ui->assign('xheader', '
<link href="'.APP_URL.'/ui/lib/c3/c3.min.css" rel="stylesheet" type="text/css">
');

        $ui->assign('xfooter', '
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/d3.min.js"></script>
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/c3.min.js"></script>

');

        $ui->assign('xjq', '

var chart = c3.generate({
    bindto: \'#chart\',
    data: {
	columns: [

		[\''.$_L['Income'].'\', \'0\','.$d1i.','.$d2i.', '.$d3i.', '.$d4i.', '.$d5i.', '.$d6i.', '.$d7i.', '.$d8i.', '.$d9i.', '.$d10i.', '.$d11i.', '.$d12i.', '.$d13i.', '.$d14i.', '.$d15i.', '.$d16i.', '.$d17i.', '.$d18i.', '.$d19i.', '.$d20i.', '.$d21i.', '.$d22i.', '.$d23i.', '.$d24i.', '.$d25i.', '.$d26i.', '.$d27i.', '.$d28i.', '.$d29i.', '.$d30i.', '.$d31i.'],
		[\''.$_L['Expense'].'\', \'0\','.$d1e.','.$d2e.', '.$d3e.', '.$d4e.', '.$d5e.', '.$d6e.', '.$d7e.', '.$d8e.', '.$d9e.', '.$d10e.', '.$d11e.', '.$d12e.', '.$d13e.', '.$d14e.', '.$d15e.', '.$d16e.', '.$d17e.', '.$d18e.', '.$d19e.', '.$d20e.', '.$d21e.', '.$d22e.', '.$d23e.', '.$d24e.', '.$d25e.', '.$d26e.', '.$d27e.', '.$d28e.', '.$d29e.', '.$d30e.', '.$d31e.']
	],
        type: \'area-spline\',
         colors: {
            '.$_L['Income'].': \'#23c6c8\',
            '.$_L['Expense'].': \'#ed5565\'
        }
    }

});

var dchart = c3.generate({
    bindto: \'#dchart\',
    data: {
        columns: [
            [\''.$_L['Income'].'\', '.$mi.'],
            [\''.$_L['Expense'].'\', '.$me.'],
        ],
        type : \'donut\',
        colors: {
            '.$_L['Income'].': \'#23c6c8\',
            '.$_L['Expense'].': \'#ed5565\'
        }
    },
    donut: {
        title: "'.$_L['Income_Vs_Expense'].'"
    }
});

    $("#set_goal").click(function (e) {
        e.preventDefault();

        bootbox.prompt({
            title: "'.$_L['Set New Goal for Net Worth'].'",
            value: "'.$goal.'",
            buttons: {
        \'cancel\': {
            label: \''.$_L['Cancel'].'\'
        },
        \'confirm\': {
            label: \''.$_L['OK'].'\'
        }
    },
            callback: function(result) {
                if (result === null) {

                } else {
                   // alert(result);
                     $.post( "'.U.'settings/networth_goal/", { goal: result })
        .done(function( data ) {
            location.reload();
        });
                }
            }
        });

    });

 ');


        break;



    case 'filter':

        $ui->assign('xheader', Asset::css(array('dt/dataTables.bootstrap')));


        $ui->assign('xfooter', Asset::js(array('dt/jquery.uniform.min','s2/js/select2.min','dp/dist/datepicker.min','dt/jquery.dataTables.min','dt/datatable','dt/dataTables.bootstrap','m','tr_filter')));

        $ui->assign('xjq', '

TableAjax.init();


 ');

        $ui->display('tr_filter.tpl');


        break;

    default:
        echo 'action not defined';
}
