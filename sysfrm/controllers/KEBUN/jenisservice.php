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

if(!isset($myCtrl)){
    $myCtrl = 'jenisservice';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_title', 'Jenis Service - '. $config['CompanyName']);
$ui->assign('_st', 'Jenis Service');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');


switch ($action) {
    case 'add':

        Event::trigger('jenisservice/add/');

		_auth1('INVENTARIS-ADD',$user['id']);
        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']


//        $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="ui/lib/s2/css/select2.min.css"/>
//');
		$ui->assign('_sysfrm_menu1', 'company');
		$ui->assign('_sysfrm_menu2', 'addcompany');
        $ui->assign('idate', date('d-m-Y'));
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-inventaris','dp/dist/datepicker.min','btn-top/btn-top')));
        //$tags = Tags::get_all('Company');
        // $ui->assign('xjq', '
 // $("#country").select2({
 // theme: "bootstrap"
 // });
 // ');



        $ui->display($spath.'add-inventaris.tpl');






        break;

    case 'edit':

        Event::trigger('inventaris/edit/');

		_auth1('INVENTARIS-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('inventaris_mobil')->find_one($cid);
        if($d){
			$ui->assign('_sysfrm_menu1', 'company');
			$ui->assign('_sysfrm_menu2', 'listinventaris');
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('tglstnk', date('d-m-Y',strtotime($d['TGL_STNK'])));
			$ui->assign('tglservice', date('d-m-Y',strtotime($d['TGL_SERVICE_TERAKHIR'])));

			$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-inventaris','dp/dist/datepicker.min')));
            $ui->display($spath.'edit-inventaris.tpl');
        }

        break;

    case 'add-post':

        Event::trigger('inventaris/add-post/');

        $nopolisi = _post('nopolisi');
        $pemakai = _post('pemakai');
        $nostnk = _post('nostnk');
        $nochassis = _post('nochassis');
        $noengine = _post('noengine');
        $tipemobil = _post('tipemobil');
        $warna = _post('warna');
		if(_post('tglstnk') <> null)
			$tglstnk = date("Y-m-d",strtotime(_post('tglstnk')));
		else
			$tglstnk = null;
		if(_post('tglservice') <> null)
			$tglservice = date("Y-m-d",strtotime(_post('tglservice')));
		else
			$tglservice = null;
        $cabang = _post('cabang');

//check if tag is already exisit



        if($nopolisi == ''){
            $msg .= 'Nomor Polisi Tidak Boleh Kosong.';
        }


//check account is already exist
        $chk = ORM::for_table('inventaris_mobil')->where('NO_POLISI',$nopolisi)->find_one();
        if($chk){
            $msg .= 'Nomor Polisi Sudah ada <br>';
        }

        if($msg == ''){

			ORM::get_db()->beginTransaction();
			try {
				$d = ORM::for_table('inventaris_mobil')->create();

				$d->NO_POLISI = strtoupper($nopolisi);
				$d->PEMAKAI = $pemakai;
                $d->NO_STNK = $nostnk;
				$d->NO_CHASSIS = $nochassis;
				$d->NO_ENGINE = $noengine;
				$d->TIPE_MOBIL = $tipemobil;
				$d->WARNA = $warna;
				$d->TGL_STNK = $tglstnk;
				$d->TGL_SERVICE_TERAKHIR = $tglservice;
				$d->CABANG = $cabang;
				$d->ADD_BY = $user['id'];
				$d->ADD_DATE = date('Y-m-d H:i:s');

				//
				$d->save();
				$cid = $d->id();
				ORM::get_db()->commit();
			}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
			}
            _log('Tambah Mobil Inventaris'.$nopolisi.' [CID: '.$cid.']','Admin',$user['id']);

            Event::trigger('inventaris/add-post/_on_finished');
            echo $cid;
        }
        else{
            echo $msg;
        }
        break;

    case 'list':

        Event::trigger('inventaris/list/');

		_auth1('INVENTARIS-LIST',$user['id']);
            $name = _post('name');
			$ui->assign('_sysfrm_menu1', 'data');
			$ui->assign('_sysfrm_menu2', 'jenisservice');
        $ui->assign('name',$name);
        if($name != ''){
            $paginator = Paginator::bootstrap('inventaris_mobil','pemakai','%'.$name.'%','','','','','','','50','');
            $d = ORM::for_table('inventaris_mobil')->where_like('NO_POLISI','%'.$nopolisi.'%')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        }
        else{
            $paginator = Paginator::bootstrap('inventaris_mobil','','','','','','','','','50','');
            $d = ORM::for_table('inventaris_mobil')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_asc('NO_POLISI')->find_many();
        }

        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->assign('xfooter', Asset::js(array($spath.'list-inventaris')));
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $ui->display($spath.'list-inventaris.tpl');

        break;


    case 'edit-post':

        Event::trigger('inventaris/edit-post/');


        $id = _post('cid');
        $d = ORM::for_table('inventaris_mobil')->find_one($id);
        if($d){
            $pemakai = _post('pemakai');
            $nostnk = _post('nostnk');
            $nochassis = _post('nochassis');
            $noengine = _post('noengine');
            $tipemobil = _post('tipemobil');
            $warna = _post('warna');
            $tglstnk = date("Y-m-d",strtotime(_post('tglstnk')));
		    $tglservice = date("Y-m-d",strtotime(_post('tglservice')));
            $cabang = _post('cabang');
            $msg = '';


            //check email already exist
			if($nopolisi != ''){
				if($nopolisi != ($d['NO_POLISI'])){
					$f = ORM::for_table('inventaris_mobil')->where('NO_POLISI',$nopolisi)->find_one();

					if($f){
						$msg .= 'Nomor Polisi Sudah ada <br>';
					}
				}
            }

            if($msg == ''){


                $d = ORM::for_table('inventaris_mobil')->find_one($id);
				$d->PEMAKAI = $pemakai;
                $d->NO_STNK = $nostnk;
				$d->NO_CHASSIS = $nochassis;
				$d->NO_ENGINE = $noengine;
				$d->TIPE_MOBIL = $tipemobil;
				$d->WARNA = $warna;
				$d->TGL_STNK = $tglstnk;
				$d->TGL_SERVICE_TERAKHIR = $tglservice;
				$d->CABANG = $cabang;
                $d->save();

                echo $id;
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.'list', 'e', 'Mobil Inventaris tersebut tidak ditemukan');
        }


        break;
    case 'delete':

        Event::trigger('inventaris/delete/');


		_auth1('INVENTARIS-DEL',$user['id']);
        $id = $routes['3'];
        $d = ORM::for_table('inventaris_mobil')->find_one($id);
        if($d){
            $d->delete();
            r2(U.'list/', 's', 'Berhasil menghapus Inventaris Mobil');
        }

        break;

    case 'render-address':

        Event::trigger('compnay/render-address/');

        $cid = _post('cid');
        $d = ORM::for_table('inventaris_mobil')->find_one($cid);
        $d->NO_POLISI = $d['nopolisi'];
        $d->PEMAKAI = $d['pemakai'];
        $d->NO_STNK = $d['nostnk'];
        $d->NO_CHASSIS = $d['nochassis'];
        $d->NO_ENGINE = $d['noengine'];
        $d->TIPE_MOBIL = $d['tipemobil'];
        $d->WARNA = $d['warna'];
        $d->TGL_STNK = $d['tglstnk'];
        $d->TGL_SERVICE_TERAKHIR = $d['tglservice'];
        $d->CABANG = $d['cabang'];

    default:
        echo 'action not defined';
}