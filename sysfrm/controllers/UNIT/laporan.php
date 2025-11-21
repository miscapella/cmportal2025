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
    $myCtrl = 'laporan';
}
_auth();
$ui->assign('_sysfrm_menu', 'report');
$ui->assign('_sysfrm_menu1', 'report');
$ui->assign('_sysfrm_menu2', 'laporan');
// $ui->assign('_title', 'Laporan Gudang - '. $config['CompanyName']);
// $ui->assign('_st', 'Laporan Stock Gudang');
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

function changeFormat($tanggal_waktu) {
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('d F Y', $tanggal_timestamp);
    return $tanggal;
}

function changeFormat2($tanggal_waktu) {
    $tanggal_timestamp = strtotime($tanggal_waktu);
    $tanggal = date('d-M-Y', $tanggal_timestamp);
    return $tanggal;
}

switch ($action) {
    case 'gudang':
        Event::trigger('laporan/gudang/');
		_auth1('LAPORAN-GUDANG',$user['id']);
        $today = date('Y-m-d');
        $dd = ORM::for_table('daftar_tipemobil')->find_many();
		$ddlist = '';
		foreach($dd as $item) {
			$ddlist .= '<option value="'.$item["KODE_DO"].'">'.$item["KODE_DO"].'</option>';
		}
        $ui->assign('kode_tipe',$ddlist);
        $ui->assign('_title', 'Laporan Gudang - '. $config['CompanyName']);
        $ui->assign('_st', 'Laporan Stock Gudang');
        $ui->assign('today',$today);
        $ui->assign('_sysfrm_menu1', 'laporan');
        $ui->assign('_sysfrm_menu2', 'laporangudang');
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/lap-gudang.js"></script>');
        $ui->display($spath.'lap-gudang.tpl');
        break;
    
    case 'laporan-gudang':
        _auth1('PRINT-LAPORAN-GUDANG',$user['id']);
        $cid = _post('periode');
        $kode_tipe = _post('kode_tipe');
        $tanggal = changeFormat($cid);
        $today_time = date('d-M-Y - H:i:s');
        $total = 0;
        $title = 'LAPORAN STOCK GUDANG';        
        $print = '
            <div class="cetak-stock-gudang">
                <htmlpageheader name="MyHeader1">
                    <table style="width:100%;">
                      <tr>
                        <th class="header">PT. CAPELLA MEDAN </th>
                      </tr>
                      <tr>
                        <th class="header">LAPORAN STOCK GUDANG TANJUNG MULIA SAMPAI TANGGAL '. $tanggal .'</th>
                      </tr>
                    </table>
                </htmlpageheader>
                <htmlpagefooter name="MyFooter1">
                    <table style="width:100%;">
                      <tr>
                        <td style="font-size: 10px; text-align: left;">Dicetak Oleh : '. $nama_user .' / '. $today_time .'</td>
                        <td style="font-size: 10px; text-align: right;">Halaman : {PAGENO} / {nbpg}</td>
                      </tr>
                    </table>
                </htmlpagefooter>
                <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
                <sethtmlpagefooter name="MyFooter1" value="on" />
        ';
        $kode_tempat = 'G1001';
        if($kode_tipe == 'SEMUA') {
            $d = ORM::for_table('data_stock')->raw_query("select KODE_TYPE from data_stock where TGL_CONFIRM_TERIMA <= '". $cid ."' and kode_tpt = '". $kode_tempat ."' and TGL_CONFIRM_KELUAR is null and TGL_KELUAR is null and right(NO_CHASSIS,4) <> '/RTR' group by KODE_TYPE")->find_many();
        } else {
            $d = ORM::for_table('data_stock')->raw_query("select KODE_TYPE from data_stock where TGL_CONFIRM_TERIMA <= '". $cid ."' and kode_tpt = '". $kode_tempat ."' and TGL_CONFIRM_KELUAR is null and TGL_KELUAR is null and right(NO_CHASSIS,4) <> '/RTR' and KODE_TYPE = '". $kode_tipe ."' group by KODE_TYPE")->find_many();
        }
        
        foreach($d as $item) {
            $e = ORM::for_table('daftar_tipemobil')->where('KODE_DO', $item["KODE_TYPE"])->find_one();
            $print .= '
                <table style="width:100%;">
                  <tr>
                    <th style="text-align:left;">TYPE : '. $item["KODE_TYPE"] .' - '. $e["NAMA_DO"] .'</th>
                  </tr>
                </table>
                <table class="tabel-isi" style="width:100%;">
                  <tr class="tabel-isi">
                    <td style="width:3%;">NO</td>
                    <td style="width:17%;">NO. CHASSIS</td>
                    <td style="width:10%;">NO. ENGINE</td>
                    <td style="width:15%;">KODE TYPE</td>
                    <td style="width:25%;">NAMA TYPE</td>
                    <td style="width:20%;">WARNA</td>
                    <td style="width:10%;">TGL. TERIMA</td>
                  </tr>';
            $f = ORM::for_table('data_stock')->raw_query("select * from data_stock where TGL_CONFIRM_TERIMA <= '". $cid ."' and kode_tpt = '". $kode_tempat ."' and TGL_CONFIRM_KELUAR is null and TGL_KELUAR is null and right(NO_CHASSIS,4) <> '/RTR' and kode_type = '". $item["KODE_TYPE"] ."'")->find_many();
            $index = 1;
            foreach($f as $items) {
                $tanggal_terima = changeFormat2($items["TGL_CONFIRM_TERIMA"]);
                $print .= '
                  <tr>
                    <td>'. $index .'</td>
                    <td>'. $items["NO_CHASSIS"] .'</td>
                    <td>'. $items["NO_ENGINE"] .'</td>
                    <td>'. $items["KODE_TYPE"] .'</td>
                    <td>'. $e["NAMA_DO"] .'</td>
                    <td>'. $items["WARNA"] .'</td>
                    <td>'. $tanggal_terima .'</td>
                  </tr>
                ';
                $index ++;
            }
            $index --;
            $print .= '
                  <tr class="tabel-isi">
                    <th colspan="7">TOTAL TYPE : '. $item["KODE_TYPE"] .' - '. $e["NAMA_DO"] .' -> '. $index .'</th>
                  </tr>
                </table>
                <br>
            ';
            $total += $index;
        }
            
        $print .= '
            <table style="width:100%;">
                <tr>
                    <th>TOTAL KESELURUHAN UNIT - '. $total .' UNIT</th>
                </tr>
            </table>
            </div>
        ';
        _mpdf($title, $print, 'L');
        break;

    case 'intransit':
        Event::trigger('laporan/intransit/');
		_auth1('LAPORAN-GUDANG',$user['id']);
        $today = date('Y-m-d');
        $dd = ORM::for_table('data_intransit')->raw_query("SELECT DISTINCT EXPEDISI FROM data_intransit WHERE TGL_SAMPAI IS NULL AND TGL_BERANGKAT >= CURDATE() - INTERVAL 1 YEAR AND KODE_TUJUAN LIKE 'G1001'")->find_many();
		$ddlist = '';
		foreach($dd as $item) {
			$ddlist .= '<option value="'.$item["EXPEDISI"].'">'.$item["EXPEDISI"].'</option>';
		}
        $ui->assign('ekspedisi',$ddlist);
        $ui->assign('_title', 'Laporan Intransit - '. $config['CompanyName']);
        $ui->assign('_st', 'Laporan Stock Intransit');
        $ui->assign('today',$today);
        $ui->assign('_sysfrm_menu1', 'laporan');
        $ui->assign('_sysfrm_menu2', 'laporanintransit');
        $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/lap-gudang.js"></script>');
        $ui->display($spath.'lap-intransit.tpl');
        break;

    case 'laporan-intransit':
      _auth1('PRINT-LAPORAN-GUDANG',$user['id']);
      $cid = _post('periode');
      $ekspedisi = _post('ekspedisi');
      $tanggal = changeFormat($cid);
      $today_time = date('d-M-Y - H:i:s');
      $total = 0;
      $title = 'LAPORAN STOCK INTRANSIT';        
      $print = '
          <div class="cetak-stock-gudang">
              <htmlpageheader name="MyHeader1">
                  <table style="width:100%;">
                    <tr>
                      <th class="header">PT. CAPELLA MEDAN </th>
                    </tr>
                    <tr>
                      <th class="header">LAPORAN STOCK INTRANSIT SAMPAI TANGGAL '. $tanggal .'</th>
                    </tr>
                  </table>
              </htmlpageheader>
              <htmlpagefooter name="MyFooter1">
                  <table style="width:100%;">
                    <tr>
                      <td style="font-size: 10px; text-align: left;">Dicetak Oleh : '. $nama_user .' / '. $today_time .'</td>
                      <td style="font-size: 10px; text-align: right;">Halaman : {PAGENO} / {nbpg}</td>
                    </tr>
                  </table>
              </htmlpagefooter>
              <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
              <sethtmlpagefooter name="MyFooter1" value="on" />
      ';
      $kode_tempat = 'G1001';
      if($ekspedisi == 'SEMUA') {
          $d = ORM::for_table('data_intransit')->raw_query("SELECT EXPEDISI FROM data_intransit WHERE TGL_SAMPAI IS NULL AND TGL_BERANGKAT >= CURDATE() - INTERVAL 1 YEAR AND CAST(TGL_BERANGKAT as DATE) <= '$cid' AND KODE_TUJUAN LIKE '$kode_tempat' GROUP BY EXPEDISI")->find_many();
      } else {
          $d = ORM::for_table('data_intransit')->raw_query("SELECT EXPEDISI FROM data_intransit WHERE TGL_SAMPAI IS NULL AND TGL_BERANGKAT >= CURDATE() - INTERVAL 1 YEAR AND CAST(TGL_BERANGKAT as DATE) <= '$cid' AND KODE_TUJUAN LIKE '$kode_tempat' AND EXPEDISI LIKE '$ekspedisi' GROUP BY EXPEDISI")->find_many();
      }
      
      foreach($d as $item) {
          $print .= '
              <table style="width:100%;">
                <tr>
                  <th style="text-align:left;">EXPEDISI : '. $item['EXPEDISI'] . '</th>
                </tr>
              </table>
              <table class="tabel-isi" style="width:100%;">
                <tr class="tabel-isi">
                  <td style="width:3%;">NO</td>
                  <td style="width:12%;">NO URUT</td>
                  <td style="width:9%;">TGL DO</td>
                  <td style="width:10%;">NO. FAKTUR</td>
                  <td style="width:14%;">CHASSIS</td>
                  <td style="width:10%;">ENGINE</td>
                  <td style="width:17%;">TIPE</td>
                  <td style="width:15%;">WARNA</td>
                  <td style="width:10%;">TGL BERANGKAT</td>
                </tr>';
          $f = ORM::for_table('data_intransit')->raw_query("SELECT NO_CHASSIS, NO_ENGINE, TGL_BERANGKAT, KODE_TYPE, NO_URUT FROM data_intransit WHERE TGL_SAMPAI IS NULL AND TGL_BERANGKAT >= CURDATE() - INTERVAL 1 YEAR AND CAST(TGL_BERANGKAT as DATE) <= '$cid' AND KODE_TUJUAN LIKE '$kode_tempat' AND EXPEDISI LIKE '{$item['EXPEDISI']}'")->find_many();
          $index = 1;
          foreach($f as $items) {
            $data_mobil = ORM::for_table('data_belimobil')->raw_query("SELECT NO_FAKTUR, WARNA, TGL_FAKTUR FROM data_belimobil WHERE NO_CHASSIS LIKE '{$items['NO_CHASSIS']}' AND NO_ENGINE LIKE '{$items['NO_ENGINE']}'")->find_one();
            $nama_mobil = ORM::for_table('daftar_tipemobil')->raw_query("SELECT NAMA_DO FROM daftar_tipemobil WHERE KODE_DO LIKE '{$items['KODE_TYPE']}'")->find_one();
            $tgl_berangkat = changeFormat2($items['TGL_BERANGKAT']);
            $no_do = changeFormat2($data_mobil['TGL_FAKTUR']);
              $print .= '
                <tr>
                  <td>'. $index .'</td>
                  <td>'. $items['NO_URUT'] .'</td>
                  <td>'. $no_do .'</td>
                  <td>'. $data_mobil['NO_FAKTUR'] .'</td>
                  <td>'. $items['NO_CHASSIS'] .'</td>
                  <td>'. $items['NO_ENGINE'] .'</td>
                  <td>'. $nama_mobil['NAMA_DO'] .'</td>
                  <td>'. $data_mobil['WARNA'] .'</td>
                  <td>'. $tgl_berangkat .'</td>
                </tr>
              ';
              $index ++;
          }
          $index --;
          $print .= '
                <tr class="tabel-isi">
                  <th colspan="9">TOTAL EKSPEDISI : '. $item['EXPEDISI'] .' -> '. $index .'</th>
                </tr>
              </table>
              <br>
          ';
          $total += $index;
      }
          
      $print .= '
          <table style="width:100%;">
              <tr>
                  <th>TOTAL KESELURUHAN UNIT - '. $total .' UNIT</th>
              </tr>
          </table>
          </div>
      ';
      _mpdf($title, $print, 'L');
      break;

    default:
        echo 'action not defined';
}