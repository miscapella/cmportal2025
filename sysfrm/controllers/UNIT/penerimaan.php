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
    $myCtrl = 'penerimaan';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'data');
$ui->assign('_sysfrm_menu2', 'listpenerimaan');
$ui->assign('_title', 'Penerimaan - '. $config['CompanyName']);
$ui->assign('_st', 'Penerimaan Unit');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$username = $user["username"];
$nama_user = $user["fullname"];
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

switch ($action) {
    case 'info-penerimaan':
        Event::trigger('penerimaan/info-penerimaan/');
        _auth1('PENERIMAAN-LIST',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('data_stock')->find_one($cid);
        $e = ORM::for_table('daftar_tipemobil')->where('KODE_DO', $d["KODE_TYPE"])->find_one();
        if($d){
          $ui->assign('_sysfrm_menu1', 'penerimaan');
          $ui->assign('_sysfrm_menu2', 'historypenerimaan');
          $ui->assign('d',$d);
          $ui->assign('e',$e);
          $ui->assign('xheader', Asset::css('s2/css/select2.min'));
          $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'info-penerimaan')));
          $ui->assign('xjq', '
            $("#country").select2({
            theme: "bootstrap"
            });');
          $ui->display($spath.'info-penerimaan.tpl');
        }
        break;

    case 'history':
        Event::trigger('penerimaan/history/');
		_auth1('PENERIMAAN-LIST',$user['id']);
        $ui->assign('_sysfrm_menu1', 'penerimaan');
        $ui->assign('_sysfrm_menu2', 'historypenerimaan');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'history-penerimaan','modal','btn-top/btn-top')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'history-penerimaan.tpl');
        break;

    case 'list':
        Event::trigger('penerimaan/list/');
		_auth1('PENERIMAAN-LIST',$user['id']);
        $ui->assign('_sysfrm_menu1', 'penerimaan');
        $ui->assign('_sysfrm_menu2', 'listpenerimaan');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'list-penerimaan','modal','btn-top/btn-top')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'list-penerimaan.tpl');
        break;
        
    case 'add':
        Event::trigger('penerimaan/add/');
        _auth1('PENERIMAAN-ADD',$user['id']);
        $cid = $routes['3'];
        $today = date('Y-m-d');
        $d = ORM::for_table('data_intransit')->where('NO_CHASSIS', $cid)->find_one();
        $e = ORM::for_table('daftar_tipemobil')->where('KODE_DO', $d["KODE_TYPE"])->find_one();
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'add-penerimaan','modal','btn-top/btn-top')));
        $ui->assign('today', $today);
        $ui->assign('d',$d);
        $ui->assign('e',$e);
        $ui->display($spath.'add-penerimaan.tpl');
        break;
    
    case 'add-post':
        Event::trigger('penerimaan/add-post/');
        _auth1('PENERIMAAN-ADD',$user['id']);
        $tgl_sampai = _post('tgl_sampai');
        $no_chassis = _post('no_chassis');
        $no_engine = _post('no_engine');
        $kode_type = _post('kode_type');
        $aksesori = _post('aksesori');
        $ket_terima = _post('keterangan');
        $msg = '';
        if($tgl_sampai == ''){
            $msg .= 'Tanggal Sampai tidak boleh kosong <br>';
        }
        $x = ORM::for_table('data_intransit')->where(array('NO_CHASSIS' => $no_chassis,'NO_ENGINE' => $no_engine))->find_one();
        if($x) {
            $merek = $x["MEREK"];
            $kode_tpt = $x["KODE_TUJUAN"];
        } else {
            $msg .= 'No Chassis ini tidak ditemukan pada tabel data_intransit <br>';
        }
        
        $y = ORM::for_table('data_belimobil')->where(array('NO_CHASSIS' => $no_chassis,'NO_ENGINE' => $no_engine))->find_one();
        if($y) {
            $warna = $y["WARNA"];
            $no_faktur = $y["NO_FAKTUR"];
            $thn_buat = $y["TAHUN_BUAT"];
        } else {
            $msg .= 'No Chassis ini tidak ditemukan pada tabel data_belimobil <br>';
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try
			{
                $d = ORM::for_table('data_stock')->create();
                $d->NO_CHASSIS = $no_chassis;
                $d->NO_ENGINE = $no_engine;
                $d->KODE_TYPE = $kode_type;
                $d->WARNA = $warna;
                $d->MEREK = $merek;
                $d->KODE_TPT = $kode_tpt;
                $d->TGL_SAMPAI = $tgl_sampai;
                $d->NO_FAKTUR = $no_faktur;
                $d->AKSESORI = $aksesori;
                $d->TGLINPUT = date('Y-m-d H:i:s');
                $d->THN_BUAT = $thn_buat;
                $d->TGL_CONFIRM_TERIMA = $tgl_sampai;
                $d->CONFIRMTERIMABY = $nama_user;
                $d->KET_TERIMA = $ket_terima;
                $d->EXPORT_DATE = NULL;
                $d->save();
                ORM::for_table('data_intransit')->raw_execute("update data_intransit set TGL_SAMPAI='$tgl_sampai', EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
                
                if($kode_tpt == 'A3101') {
                    ORM::for_table('data_belimobil')->raw_execute("update data_belimobil set TGL_SAMPAI='$tgl_sampai', POSISI='STOCK', EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
                } else {
                    ORM::for_table('data_belimobil')->raw_execute("update data_belimobil set TGL_SAMPAI='$tgl_sampai', POSISI='$kode_tpt', EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
                }
                
                ORM::get_db()->commit();
                $cid = $d->id();
                _log('Tambah Penerimaan Mobil ',$username, $user['id']);
                $_SESSION['ntype']='s' ; $_SESSION['notify']='Penerimaan Unit Dengan NO CHASSIS = '.$no_chassis.' dan NO ENGINE = '.$no_engine.' Berhasil Dilakukan';
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
            }
        }
        else{
            echo $msg;
        }
        break;
        
    default:
        echo 'action not defined';
}