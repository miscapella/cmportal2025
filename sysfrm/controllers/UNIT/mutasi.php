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
    $myCtrl = 'mutasi';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'data');
$ui->assign('_sysfrm_menu2', 'listmutasi');
$ui->assign('_title', 'Mutasi Mobil - '. $config['CompanyName']);
$ui->assign('_st', 'Mutasi Mobil');
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

function getNoConfirm() {
    $bulan = date('m');
    $tahun = date('Y');
    $d = ORM::for_table('data_mutasimbl')->raw_query('select count(*) as count from data_mutasimbl where year(tgl_confirm) ='.$tahun.' and month(tgl_confirm) =' .$bulan)->find_one();
    $nomor = (int)$d['count'] + 1;
    $nomors = sprintf("%04d", $nomor);
    $hasil = "CONF/A01/" . $tahun . "/" . $bulan . "/" . $nomors;
    return $hasil;
}

switch ($action) {
  case 'list':
    Event::trigger('mutasi/list/');
    _auth1('MUTASI-LIST',$user['id']);
    $msg = $routes[3];

    // Clean duplicate data and move to data_mutasimbld
    $duplicate = ORM::for_table('data_mutasimbl')->raw_query('SELECT NO_CHASSIS, NO_ENGINE, COUNT(*) AS DUPLICATECOUNT 
    FROM data_mutasimbl 
    WHERE (KODE_SUMBER LIKE "G1001" OR  KODE_TUJUAN LIKE "G1001")  AND TGL_CONFIRM IS NULL
    GROUP BY NO_CHASSIS, NO_ENGINE 
    HAVING COUNT(*) > 1;')->find_many();
    if ($duplicate) {
      foreach($duplicate as $row) {
        $no_chassis = $row['NO_CHASSIS'];
        $no_engine = $row['NO_ENGINE'];
        $old_duplicated = ORM::for_table('data_mutasimbl')->raw_query('SELECT *
        FROM (
            SELECT *, ROW_NUMBER() OVER (PARTITION BY NO_CHASSIS, NO_ENGINE ORDER BY NO_BAST DESC) AS RowNum
            FROM data_mutasimbl
            WHERE NO_CHASSIS LIKE :no_chassis AND NO_ENGINE LIKE :no_engine AND KODE_SUMBER LIKE "G1001"
        ) AS Subquery
        WHERE RowNum > 1
        ORDER BY NO_BAST DESC;', ['no_chassis' => $no_chassis, 'no_engine' => $no_engine])->find_many();
        if ($old_duplicated) {
          foreach($old_duplicated as $row) {
            $chk = ORM::for_table('data_mutasimbld')->where('NO_BAST', $row['NO_BAST'])->find_one();
            if (!$chk) {
              ORM::get_db()->beginTransaction();
              try {
                $d = ORM::for_table('data_mutasimbld')->create();
                foreach ($row->as_array() as $column => $value) {
                  if ($column !== 'RowNum' && $column !== 'id') {
                    $d->$column = $value;
                  }
                }
                $d->save();
                ORM::get_db()->commit();
                $row->delete();
              }
              catch(PDOException $ex) {
                  ORM::get_db()->rollBack();
                  throw $ex;
              }
            }
          }
        }
      }
    }
    
    $ui->assign('msg',$msg);
    $ui->assign('_sysfrm_menu1', 'mutasi');
    $ui->assign('_sysfrm_menu2', 'listmutasi');
    $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'list-mutasi','modal','btn-top/btn-top')));
    $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
    $ui->display($spath.'list-mutasi.tpl');
    break;

  case 'list-batal-konfirmasi-mutasi':
    Event::trigger('mutasi/list-batal-konfirmasi-mutasi');
    _auth1('MUTASI-LIST',$user['id']);
    $msg = $routes[3];
    $ui->assign('msg',$msg);
    $ui->assign('_sysfrm_menu1', 'mutasi');
    $ui->assign('_sysfrm_menu2', 'listbatalkonfirmasimutasi');
    $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'list-batal-konfirmasi-mutasi','modal','btn-top/btn-top')));
    $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
    $ui->display($spath.'history-mutasi-mobil.tpl');
    break;

  case 'mutasi-konfirmasi':
    Event::trigger('mutasi/mutasi-konfirmasi/');
    _auth1('MUTASI-KONFIRMASI',$user['id']);
    $cid = $routes['3'];
    $today = date('Y-m-d');    
    $d = ORM::for_table('data_mutasimbl')->where('id', $cid)->find_one();
    $e = ORM::for_table('data_stock')->where(array('NO_CHASSIS' => $d['NO_CHASSIS'], 'NO_ENGINE' => $d['NO_ENGINE']))->order_by_desc('TGL_BAST')->find_one();
    $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
    $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'mutasi-konfirmasi','modal','btn-top/btn-top')));
    $ui->assign('today', $today);
    $ui->assign('d',$d);
    $ui->assign('e',$e);
    $ui->display($spath.'mutasi-konfirmasi.tpl');
    break;

  case 'mutasi-batal-konfirmasi':
    Event::trigger('mutasi/mutasi-batal-konfirmasi/');
    _auth1('MUTASI-BATAL-KONFIRMASI',$user['id']);      
    $cid = $routes['3'];
    $d = ORM::for_table('data_mutasimbl')->where('id', $cid)->find_one();
    $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
    $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'mutasi-batal-konfirmasi','modal','btn-top/btn-top')));
    $ui->assign('d',$d);
    $ui->display($spath.'mutasi-batal-konfirmasi.tpl');
    break;

  case 'konfirmasi':
    Event::trigger('mutasi/konfirmasi/');
    _auth1('MUTASI-KONFIRMASI',$user['id']);
    $today_time = date('Y-m-d H:i:s');
    $cid = _post('chassis');
    $engine = _post('engine');
    $sumber = _post('sumber');
    $tujuan = _post('tujuan');
    $d = ORM::for_table('data_mutasimbl')->where(array('NO_CHASSIS' => $cid, 'NO_ENGINE' => $engine, 'KODE_SUMBER' => $sumber, 'KODE_TUJUAN' => $tujuan))->find_one();
    $kode_tujuan = $d['KODE_TUJUAN'];
    $no_chassis = $d['NO_CHASSIS'];
    $no_engine = $d['NO_ENGINE'];

    if($d){
      $diterima = _post('diterima');
      $catatan = _post('catatan');
      $msg = '';

      if($diterima == ''){
        $msg .= 'Diterima tidak boleh kosong <br>';
      }
      $x = ORM::for_table('data_stock')->where(array('NO_CHASSIS' => $cid, 'NO_ENGINE' => $engine))->find_one();
      if(!$x) {
        $msg .= 'No Chassis ini tidak ditemukan pada tabel data_stock <br>';
      }
      $y = ORM::for_table('data_belimobil')->where(array('NO_CHASSIS' => $cid, 'NO_ENGINE' => $engine))->find_one();
      if(!$y) {
        $msg .= 'No Chassis ini tidak ditemukan pada tabel data_belimobil <br>';
      }
      if($d['TGL_CONFIRM']) {
        $msg .= 'Tanggal Confirm telah terisi, tidak dapat melakukan konfirmasi';
      }
      if($msg == ''){
        ORM::get_db()->beginTransaction();
        try {
          
          $d = ORM::for_table('data_mutasimbl')->where(array('NO_CHASSIS' => $cid, 'NO_ENGINE' => $engine, 'KODE_TUJUAN' => $tujuan))->find_one();
          if($d['NOCONFIRM'] == NULL or $d['NOCONFIRM'] == ''){
              $d->NOCONFIRM = getNoConfirm();
          }
          $no_bast = $d['NO_BAST'];
          $tgl_bast = $d['TGL_BAST'];
          $d->DITERIMA = $diterima;
          $d->TGL_CONFIRM = date('Y-m-d H:i:s');
          $d->CONFIRMBY = $nama_user;
          $d->EXPORT_DATE = NULL;
          $d->save();
          
          if ($sumber === "G1001") {
            ORM::for_table('data_stock')->raw_execute("update data_stock set KODE_TPT='$kode_tujuan', NO_BAST='$no_bast', TGL_BAST='$tgl_bast', TGL_CONFIRM_KELUAR='$today_time', CONFIRMKELUARBY='$nama_user', KET_KELUAR='$catatan', EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
          } else {
            ORM::for_table('data_stock')->raw_execute("update data_stock set KODE_TPT='$kode_tujuan', NO_BAST='$no_bast', TGL_BAST='$tgl_bast', TGL_CONFIRM_KELUAR=NULL, TGL_KELUAR=NULL, EXPORT_DATE=NULL, CONFIRMTERIMABY='$nama_user', KET_KELUAR='$catatan' where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
          }
          
          ORM::for_table('data_belimobil')->raw_execute("update data_belimobil set POSISI='$kode_tujuan', EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
          ORM::get_db()->commit();
          // $_SESSION['ntype']='s'; 
          // $_SESSION['notify']='Berhasil Konfirmasi';
          // echo '<script>window.location = "'.U.$myCtrl.'/cetak/'.$d['id'].''.'"</script>';
          echo $d['id'];
        }
        catch(PDOException $ex) {
          ORM::get_db()->rollBack();
          throw $ex;
        }
      }
      else{
        echo $msg;
      }
    }
    else{
        r2(U.$myCtrl.'/list', 'e', 'Mutasi tersebut tidak ditemukan');
    }
    break;
        
  case 'batal':
    Event::trigger('mutasi/batal/');
    _auth1('MUTASI-BATAL-KONFIRMASI',$user['id']);
    $cid = _post('chassis');
    $engine = _post('engine');
    $sumber = _post('sumber');
    $tujuan = _post('tujuan');
    $d = ORM::for_table('data_mutasimbl')->where(array('NO_CHASSIS' => $cid, 'NO_ENGINE' => $engine, 'KODE_SUMBER' => $sumber, 'KODE_TUJUAN' => $tujuan))->find_one();
    $kode_sumber = $d['KODE_SUMBER'];
    $no_chassis = $d['NO_CHASSIS'];
    $no_engine = $d['NO_ENGINE'];
    if($d){
      $alasanBatal = _post('alasanbatal');
      $msg = '';
      if($alasanBatal == ''){
        $msg .= 'Alasan Batal tidak boleh kosong <br>';
      }
      $x = ORM::for_table('data_stock')->where('NO_CHASSIS', $cid)->find_one();
      if(!$x) {
        $msg .= 'No Chassis ini tidak ditemukan pada tabel data_stock <br>';
      }
      $y = ORM::for_table('data_belimobil')->where('NO_CHASSIS', $cid)->find_one();
      if(!$y) {
        $msg .= 'No Chassis ini tidak ditemukan pada tabel data_belimobil <br>';
      }
      if(!$d['TGL_CONFIRM']) {
        $msg .= 'Tanggal Confirm belum terisi, tidak dapat melakukan batal konfirmasi';
      }
      if($msg == ''){
        ORM::get_db()->beginTransaction();
        try {
          $d = ORM::for_table('data_mutasimbl')->where('NO_CHASSIS', $cid)->find_one();
          $d->ALASANBATAL = $alasanBatal;
          $d->TGL_BTLCONFIRM = date('Y-m-d H:i:s');
          $d->BATAL_CONFIRMBY = $nama_user;
          $d->DITERIMA = NULL;
          $d->TGL_CONFIRM = NULL;
          $d->CONFIRMBY = NULL;
          $d->EXPORT_DATE = NULL;
          $d->save();
          
          ORM::for_table('data_stock')->raw_execute("update data_stock set KODE_TPT='G1001', TGL_CONFIRM_KELUAR= NULL, CONFIRMKELUARBY=NULL, KET_KELUAR=NULL, EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
          
          ORM::for_table('data_belimobil')->raw_execute("update data_belimobil set POSISI='$kode_sumber', EXPORT_DATE=NULL where NO_CHASSIS='$no_chassis' and NO_ENGINE='$no_engine'");
          
          ORM::get_db()->commit();
          // $_SESSION['ntype']='s'; 
          // $_SESSION['notify']='Berhasil Batal Konfirmasi';
          // echo '<script>window.location = "'.U.$myCtrl.'/list'.'"</script>';
          echo $d['id'];
        }
        catch(PDOException $ex) {
          ORM::get_db()->rollBack();
          throw $ex;
        }
      }
      else{
        echo $msg;
      }
    }
    else{
      r2(U.$myCtrl.'/list', 'e', 'Mutasi tersebut tidak ditemukan');
    }
    break;
    
  case 'info':
    Event::trigger('mutasi/info/');
    _auth1('MUTASI-INFO',$user['id']);
    $cid = $routes['3'];
    $d = ORM::for_table('data_mutasimbl')->find_one($cid);
    if($d){
      $ui->assign('_sysfrm_menu1', 'mutasi');
      $ui->assign('_sysfrm_menu2', 'listmutasi');
      $ui->assign('d',$d);
      $ui->assign('cid',$cid);
      $ui->assign('xheader', Asset::css('s2/css/select2.min'));
      $ui->assign('xjq', '
        $("#country").select2({
        theme: "bootstrap"
        });');
      $ui->display($spath.'info-mutasi.tpl');
    }
    break;
        
  case 'cetak':
    _auth1('MUTASI-CETAK',$user['id']);
    $cid = $routes['3'];
    $today = date('l / d F Y');
    $today_time = date('d-M-Y - H:i:s');
    $d = ORM::for_table('data_mutasimbl')->find_one($cid);
    $e = ORM::for_table('daftar_lokasi')->where('KODE_LOKASI', $d["KODE_SUMBER"])->find_one();
    $e2 = ORM::for_table('daftar_lokasi')->where('KODE_LOKASI', $d["KODE_TUJUAN"])->find_one();
    $f = ORM::for_table('daftar_tipemobil')->where('KODE_DO', $d["KODE_TYPE"])->find_one();
    $g = ORM::for_table('data_belimobil')->where('NO_CHASSIS', $d["NO_CHASSIS"])->find_one();
    $title = 'SURAT KELUAR';
    $print = '
            <div class="cetak-mutasi">
                <table style="width:100%;">
                  <tr>
                    <th style="text-align:left;"><img class="mutasi-logo" src="sysfrm/uploads/system/logo_pt_capella_medan.png" alt="Logo"> </th>
                    <th style="text-align:right;">NO. KONFIRMASI : '. $d["NOCONFIRM"] .'</th>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-transform:uppercase;">'. $d["KODE_SUMBER"] .' - '. $e["NAMA_LOKASI"] .'</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-transform:uppercase;">'. $e["ALAMAT"] .'</td>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align:center; border-bottom: 2px solid black;">SURAT KELUAR</th>
                  </tr>
                </table>
                <table style="width:100%; border-bottom: 2px solid black; padding-bottom: 5px;">
                  <tr>
                    <th style="text-align:left; width:25%;"><p style="border-bottom: 1px solid black;">JADWAL KELUAR UNIT</p></th>
                  </tr>
                  <tr>
                    <td>HARI / TANGGAL</td>
                    <td style="text-transform:uppercase;">: '. $today .'</td>
                  </tr>
                  <tr>
                    <td>MEREK KENDARAAN</td>
                    <td style="text-transform:uppercase;">: '. $f["MEREK"] .'</td>
                  </tr>
                  <tr>
                    <td>JENIS / TYPE</td>
                    <td style="text-transform:uppercase;">: '. $f["KATEGORI"] .' / '. $f["NAMA_DO"] .'</td>
                  </tr>
                  <tr>
                    <td>NO. CHASSIS</td>
                    <td style="text-transform:uppercase;">: '. $d["NO_CHASSIS"] .'</td>
                  </tr>
                  <tr>
                    <td>NO. ENGINE</td>
                    <td style="text-transform:uppercase;">: '. $d["NO_ENGINE"] .'</td>
                  </tr>
                  <tr>
                    <td>WARNA</td>
                    <td style="text-transform:uppercase;">: '. $g["WARNA"] .'</td>
                  </tr>
                  <tr>
                    <td>TUJUAN</td>
                    <td style="text-transform:uppercase;">: '. $d["KODE_TUJUAN"] .' - '. $e2["NAMA_LOKASI"] .'</td>
                  </tr>
                  <tr>
                    <td>PERLENGKAPAN</td>
                    <td>: <span>___</span> LENGKAP <span>___</span> TIDAK LENGKAP (__________________________________________________)</td>
                  </tr>
                </table>
                <table style="width:100%; border-bottom: 2px solid black; padding-bottom: 2px;">
                  <tr>
                    <th style="text-align:left;"><p style="border-bottom: 1px solid black;">UNIT KELUAR DARI GUDANG</p></th>
                  </tr>
                  <tr>
                    <td>NB : DIISI OLEH SATPAM</td>
                  </tr>
                  <tr>
                    <td>HARI ___________________________</td>
                    <td>TGL _________________</td>
                    <td>JAM KELUAR __________</td>
                    <td>NO PLAT SEMENTARA ____________</td>
                  </tr>
                </table>
                <table style="width:100%; margin-top: 10px;">
                  <tr>
                    <td style="text-align:center;">Diserahkan Oleh,</td>
                    <td style="text-align:center;">Diterima Oleh,</td>
                    <td style="text-align:center;">Diketahui Oleh,</td>
                  </tr>
                  <tr >
                    <td style="height:50px"></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">*)____________</td>
                    <td style="text-align:center;">*)____________</td>
                    <td style="text-align:center;">*)____________</td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">Gudang</td>
                    <td style="text-align:center;">SUPIR/PDI</td>
                    <td style="text-align:center;">SATPAM</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-size: 10px;">*)Mohon untuk dapat menuliskan nama dikolom yang telah disediakan dan menandatangani dokumen ini.</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-size: 10px;">Dicetak Oleh : '. $nama_user .' - '. $today_time .'</td>
                  </tr>
                </table>
            </div>
            <br>
            <div class="cetak-mutasi">
                <table style="width:100%;">
                  <tr>
                    <th style="text-align:left;"><img class="mutasi-logo" src="sysfrm/uploads/system/logo_pt_capella_medan.png" alt="Logo"> </th>
                    <th style="text-align:right;">NO. KONFIRMASI : '. $d["NOCONFIRM"] .'</th>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-transform:uppercase;">'. $d["KODE_SUMBER"] .' - '. $e["NAMA_LOKASI"] .'</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-transform:uppercase;">'. $e["ALAMAT"] .'</td>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align:center; border-bottom: 2px solid black;">SURAT KELUAR</th>
                  </tr>
                </table>
                <table style="width:100%; border-bottom: 2px solid black; padding-bottom: 5px;">
                  <tr>
                    <th style="text-align:left; width:25%;"><p style="border-bottom: 1px solid black;">JADWAL KELUAR UNIT</p></th>
                  </tr>
                  <tr>
                    <td>HARI / TANGGAL</td>
                    <td style="text-transform:uppercase;">: '. $today .'</td>
                  </tr>
                  <tr>
                    <td>MEREK KENDARAAN</td>
                    <td style="text-transform:uppercase;">: '. $f["MEREK"] .'</td>
                  </tr>
                  <tr>
                    <td>JENIS / TYPE</td>
                    <td style="text-transform:uppercase;">: '. $f["KATEGORI"] .' / '. $f["NAMA_DO"] .'</td>
                  </tr>
                  <tr>
                    <td>NO. CHASSIS</td>
                    <td style="text-transform:uppercase;">: '. $d["NO_CHASSIS"] .'</td>
                  </tr>
                  <tr>
                    <td>NO. ENGINE</td>
                    <td style="text-transform:uppercase;">: '. $d["NO_ENGINE"] .'</td>
                  </tr>
                  <tr>
                    <td>WARNA</td>
                    <td style="text-transform:uppercase;">: '. $g["WARNA"] .'</td>
                  </tr>
                  <tr>
                    <td>TUJUAN</td>
                    <td style="text-transform:uppercase;">: '. $d["KODE_TUJUAN"] .' - '. $e2["NAMA_LOKASI"] .'</td>
                  </tr>
                  <tr>
                    <td>PERLENGKAPAN</td>
                    <td>: <span>___</span> LENGKAP <span>___</span> TIDAK LENGKAP (__________________________________________________)</td>
                  </tr>
                </table>
                <table style="width:100%; border-bottom: 2px solid black; padding-bottom: 2px;">
                  <tr>
                    <th style="text-align:left;"><p style="border-bottom: 1px solid black;">UNIT KELUAR DARI GUDANG</p></th>
                  </tr>
                  <tr>
                    <td>NB : DIISI OLEH SATPAM</td>
                  </tr>
                  <tr>
                    <td>HARI ___________________________</td>
                    <td>TGL _________________</td>
                    <td>JAM KELUAR __________</td>
                    <td>NO PLAT SEMENTARA ____________</td>
                  </tr>
                </table>
                <table style="width:100%; margin-top: 10px;">
                  <tr>
                    <td style="text-align:center;">Diserahkan Oleh,</td>
                    <td style="text-align:center;">Diterima Oleh,</td>
                    <td style="text-align:center;">Diketahui Oleh,</td>
                  </tr>
                  <tr >
                    <td style="height:50px"></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">*)____________</td>
                    <td style="text-align:center;">*)____________</td>
                    <td style="text-align:center;">*)____________</td>
                  </tr>
                  <tr>
                    <td style="text-align:center;">Gudang</td>
                    <td style="text-align:center;">SUPIR/PDI</td>
                    <td style="text-align:center;">SATPAM</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-size: 10px;">*)Mohon untuk dapat menuliskan nama dikolom yang telah disediakan dan menandatangani dokumen ini.</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-size: 10px;">Dicetak Oleh : '. $nama_user .' - '. $today_time .'</td>
                  </tr>
                </table>
            </div>
        ';
        _mpdf($title, $print);
        $ui->assign('d',$d);
        $ui->display($spath.'cetak-mutasi.tpl');
        break;

  case 'render-konfirmasi':
    $kode = _post('kode');
    if($kode <> '') {
      $y = ORM::for_table('data_mutasimbl')->find_one($kode);
      if($y) {
        $data = array(
          'NO_CHASSIS'=>	$y['NO_CHASSIS'],
          'NO_ENGINE'=>	$y['NO_ENGINE'],
          'KODE_TUJUAN'=> $y['KODE_TUJUAN']);
        echo json_encode($data);
      } else {
        $data = array(
          'NO_CHASSIS'	=>	'',
          'NO_ENGINE'	=>	'',
          'KODE_TUJUAN'=> '');
        echo json_encode($data);
      }
    } else {
      $data = array(
        'NO_CHASSIS'	=>	'',
        'NO_ENGINE'	=>	'',
        'KODE_TUJUAN'=> '');
      echo json_encode($data);
    }
    break;

  case 'history-mutasi-mobil':
      _auth1('HISTORY-MUTASI-MOBIL',$user['id']);
      $ui->assign('_sysfrm_menu1', 'mutasi');
      $ui->assign('_sysfrm_menu2', 'history-mutasi-mobil');
      $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','modal','btn-top/btn-top')));
      $ui->assign('xfooter', Asset::js(array('numeric','s2/js/select2.min','dp/dist/datepicker.min','s2/js/i18n/'.lan(),$spath.'history-mutasi-mobil','modal','btn-top/btn-top')));
      $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
      $ui->display($spath.'history-mutasi-mobil.tpl');


    break;

  default:
    echo 'action not defined';
}