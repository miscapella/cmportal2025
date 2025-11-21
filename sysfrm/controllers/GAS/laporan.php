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
$ui->assign('_title', 'Laporan - '. $config['CompanyName']);
$ui->assign('_st', 'Laporan');
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
  $tanggal = date('F Y', $tanggal_timestamp);
  return $tanggal;
}

function bulan($tanggal_waktu) {
  $tanggal_timestamp = strtotime($tanggal_waktu);
  $tanggal = date('m', $tanggal_timestamp);
  return $tanggal;
}

function tahun($tanggal_waktu) {
  $tanggal_timestamp = strtotime($tanggal_waktu);
  $tanggal = date('Y', $tanggal_timestamp);
  return $tanggal;
}

function changeFormat2($tanggal_waktu) {
  $tanggal_timestamp = strtotime($tanggal_waktu);
  $tanggal = date('d-M-Y', $tanggal_timestamp);
  return $tanggal;
}

function changeFormat3($tanggal_waktu) {
  $tanggal_timestamp = strtotime($tanggal_waktu);
  $tanggal = date('d F Y', $tanggal_timestamp);
  return $tanggal;
}

function changeFormat4($tanggal_waktu) {
  $tanggal_timestamp = strtotime($tanggal_waktu);
  $tanggal = date('Y-m-d', $tanggal_timestamp);
  return $tanggal;
}

switch ($action) {

  case 'pr':
    Event::trigger('laporan/pr/');
    _auth1('LAPORAN-PR',$user['id']);
    $today = date('d F Y');
    
    $ui->assign('today',$today);
    $ui->assign('_sysfrm_menu1', 'laporan');
    $ui->assign('_sysfrm_menu2', 'laporanpr');
    $ui->assign('xfooter', '<script type="text/javascript" src="' . $_theme . '/lib/lap-po.js"></script>');
    $ui->display($spath.'lap-pr.tpl');
    break;
  
  case 'laporan-pr':
      _auth1('PRINT-LAPORAN-PR',$user['id']);
      $cid = _post('periode');
      $bulan = bulan($cid);
      $tahun = tahun($cid);
      $status = _post('status');
      $tanggal = changeFormat($cid);
      $today_time = date('d-M-Y - H:i:s');
      $total = 0;
      $title = 'LAPORAN PR';
      $print = '
          <div class="cetak-stock-gudang">
              <htmlpageheader name="MyHeader1">
                  <table style="width:100%;">
                    <tr>
                      <th class="header" style="text-align: center;">LAPORAN PR - '. $status .'</th>
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
      if($status == 'PENDING') {
        $d = ORM::for_table('pr_master')->raw_query("select * from pr_master where status = 'PENDING' or status = 'REVISI' or (posisi = 'PR' and status = 'APPROVE') order by tgl_pr desc")->find_many();
      } else if($status == 'APPROVE') {
        $d = ORM::for_table('pr_master')->raw_query("select * from pr_master where status = '". $status ."' and posisi = 'PR1' order by tgl_pr desc")->find_many();
      } else {
        $d = ORM::for_table('pr_master')->raw_query("select * from pr_master where status = '". $status ."' order by tgl_pr desc")->find_many();
      }

      $print .= '<table autosize="1" class="tabel-isi" style="width:100%;">';
      foreach($d as $item) {
          $print .= '
              <tr class="tabel-isi" style="vertical-align: bottom;">
                <th style="text-align:left; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="12">NO PR : '. $item["no_pr"] .' '. changeFormat2($item["tgl_pr"]) .'</th>
              </tr>
              <tr class="tabel-isi">
                <td class="" style="width:5%; text-align: center; font-weight: bold;">NO</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">ITEM</td>
                <td class="" style="width:15%; text-align: center; font-weight: bold;">KEPERLUAN</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">QTY REQUEST</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">QTY STOCK</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER 1</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">HARGA 1</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER 2</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">HARGA 2</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER 3</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">HARGA 3</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">PILIHAN SUPPLIER</td>
              </tr>
              ';
          $e = ORM::for_table('pr_detail')->where('no_pr', $item["no_pr"])->find_many();
          $index = 1;
          foreach($e as $items) {
              $supp1 = ORM::for_table('daftar_supplier')->where('kd_supplier', $items["kd_supplier1"])->find_one();
              $supp2 = ORM::for_table('daftar_supplier')->where('kd_supplier', $items["kd_supplier2"])->find_one();
              $supp3 = ORM::for_table('daftar_supplier')->where('kd_supplier', $items["kd_supplier3"])->find_one();
              $supp = ORM::for_table('daftar_supplier')->where('kd_supplier', $items["supplierpilihan"])->find_one();
              $itemstock = ORM::for_table('daftar_itemstock')->where('kd_item', $items["kd_item"])->find_one();
              $namainventaris = '';
              if($items["kd_inventaris"] == 'STOCK') {
                $namainventaris = 'STOCK';
              } else {
                $inventaris = ORM::for_table('daftar_inventaris')->where('kd_inventaris', $items["kd_inventaris"])->find_one();
                $namainventaris = $inventaris["nm_inventaris"];
              }
              
              $hargasup1 = '';
              $hargasup2 = '';
              $hargasup3 = '';
              if($items["harga1"] != 0) {
                $hargasup1 = number_format($items["harga1"]);
              }
              if($items["harga2"] != 0) {
                $hargasup2 = number_format($items["harga2"]);
              }
              if($items["harga3"] != 0) {
                $hargasup3 = number_format($items["harga3"]);
              }
              $print .= '
                <tr class="">
                  <td style=" text-align: center; height: 25px;">'. $index .'</td>
                  <td>'. $itemstock["nm_item"] .'</td>
                  <td style=" text-align: center;">'. $namainventaris .'</td>
                  <td style=" text-align: center;">'. number_format($items["qty_req"]) .'</td>
                  <td style=" text-align: center;">'. number_format($items["qty_stock"]) .'</td>
                  <td>'. $supp1["nm_supplier"] .'</td>
                  <td style=" text-align: right;">'. $hargasup1 .'</td>
                  <td>'. $supp2["nm_supplier"] .'</td>
                  <td style=" text-align: right;">'. $hargasup2 .'</td>
                  <td>'. $supp3["nm_supplier"] .'</td>
                  <td style=" text-align: right;">'. $hargasup3 .'</td>
                  <td>'. $supp["nm_supplier"] .'</td>
                </tr>
                ';
              
              $index ++;
          }
          $index --;
          
          $total += $index;
      }
      $print .= '
          </table>
          </div>
      ';
      _mpdf($title, $print, 'L');
      break;

  case 'pemenuhanpr':
    Event::trigger('laporan/pemenuhanpr/');
    _auth1('LAPORAN-PEMENUHAN-PR',$user['id']);
    $today = date('d F Y');
    
    $ui->assign('today',$today);
    $ui->assign('_sysfrm_menu1', 'laporan');
    $ui->assign('_sysfrm_menu2', 'laporanpemenuhanpr');
    $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
    $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'lap-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
    $ui->display($spath.'lap-pemenuhan-pr.tpl');
    break;

  case 'laporan-pemenuhan-pr':
    _auth1('PRINT-LAPORAN-PEMENUHAN-PR',$user['id']);
    $dari = _post('dari');
    $sampai = _post('sampai');
    $tanggal_dari = changeFormat4($dari);
    $tanggal_sampai = changeFormat4($sampai);
    $today_time = date('d-M-Y - H:i:s');
    $total = 0;
    $title = 'LAPORAN PEMENUHAN PR';
    $print = '
        <div class="cetak-stock-gudang">
            <htmlpageheader name="MyHeader1">
                <table style="width:100%;">
                  <tr>
                    <th class="header" style="text-align: center;">LAPORAN PEMENUHAN PR</th>
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
    $d = ORM::for_table('pr_master')->raw_query("select * from pr_master where status = 'APPROVE' and posisi = 'PR1' and tgl_pr >= '". $tanggal_dari ."' and tgl_pr <= '". $tanggal_sampai ."' order by tgl_pr desc")->find_many();

    $print .= '<table autosize="1" class="tabel-isi" style="width:100%;">';
    foreach($d as $item) {
        $print .= '
            <tr class="tabel-isi" style="vertical-align: bottom;">
              <th style="text-align:left; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="12">NO PR : '. $item["no_pr"] .' '. changeFormat2($item["tgl_pr"]) .'</th>
            </tr>
            <tr class="tabel-isi">
              <td class="" style="width:5%; text-align: center; font-weight: bold;">NO</td>
              <td class="" style="width:20%; text-align: center; font-weight: bold;">ITEM</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">KEPERLUAN</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">QTY REQUEST</td>
              <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER</td>
              <td class="" style="width:11%; text-align: center; font-weight: bold;">NO PO</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">TGL PO</td>
              <td class="" style="width:11%; text-align: center; font-weight: bold;">NO SPBI</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">TGL SPBI</td>
              <td class="" style="width:11%; text-align: center; font-weight: bold;">NO BPnB</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">TGL BPnB</td>
              <td class="" style="width:15%; text-align: center; font-weight: bold;">STATUS</td>
            </tr>
            ';
        $e = ORM::for_table('pr_detail')->where('no_pr', $item["no_pr"])->find_many();
        $index = 1;
        foreach($e as $items) {
            $supp = ORM::for_table('daftar_supplier')->where('kd_supplier', $items["supplierpilihan"])->find_one();
            $itemstock = ORM::for_table('daftar_itemstock')->where('kd_item', $items["kd_item"])->find_one();
            $namainventaris = '';
            if($items["kd_inventaris"] == 'STOCK') {
              $namainventaris = 'STOCK';
            } else {
              $inventaris = ORM::for_table('daftar_inventaris')->where('kd_inventaris', $items["kd_inventaris"])->find_one();
              $namainventaris = $inventaris["nm_inventaris"];
            }

            $no_po = '-';
            $tgl_po = '-';
            $no_spbi = '-';
            $tgl_spbi = '-';
            $no_bpnb = '-';
            $tgl_bpnb = '-';
            if($items["status"] != 'PR'){
              $po = ORM::for_table('po_detail')->where('no_pr', $items["no_pr"])->where('kd_item', $items["kd_item"])->find_one();
              $pom = ORM::for_table('po_master')->where('no_po', $po["no_po"])->find_one();
              $no_po = $po["no_po"];
              $tgl_po = $pom["tgl_po"];
            }
            if($items["status"] == 'DIKIRIM' || $items["status"] == 'DITERIMA'){
              $spbi = ORM::for_table('spbi_detail')->where('no_pr', $items["no_pr"])->where('kd_item', $items["kd_item"])->find_one();
              $spbim = ORM::for_table('spbi_master')->where('no_spbi', $spbi["no_spbi"])->find_one();
              $no_spbi = $spbi["no_spbi"];
              $tgl_spbi = $spbim["tgl_spbi"];
              if($items["status"] == 'DITERIMA') {
                $no_bpnb = $spbim["no_bpnb"];
                $tgl_bpnb = $spbim["tgl_bpnb"];
              }
            }
            $status = '';
            if($items["status"] == 'PR') {
              $status = 'PR: APPROVE';
            } else if($items["status"] == 'DONE') {
              $status = 'PO: APPROVE';
            } else if($items["status"] == 'PO') {
              $status = 'PO: PENDING';
            } else if($items["status"] == 'DIKIRIM') {
              $status = 'SPBI: DIKIRIM';
            } else if($items["status"] == 'DITERIMA') {
              $status = 'BPnB: DITERIMA';
            }
            
            $print .= '
              <tr class="">
                <td style=" text-align: center; height: 25px;">'. $index .'</td>
                <td>'. $itemstock["nm_item"] .'</td>
                <td style=" text-align: center;">'. $namainventaris .'</td>
                <td style=" text-align: center;">'. number_format($items["qty_req"]) .'</td>
                <td style=" text-align: center;">'. $supp["nm_supplier"] .'</td>
                <td style=" text-align: center;">'. $no_po .'</td>
                <td style=" text-align: center;">'. $tgl_po .'</td>
                <td style=" text-align: center;">'. $no_spbi .'</td>
                <td style=" text-align: center;">'. $tgl_spbi .'</td>
                <td style=" text-align: center;">'. $no_bpnb .'</td>
                <td style=" text-align: center;">'. $tgl_bpnb .'</td>
                <td style=" text-align: center;">'. $status .'</td>
              </tr>
              ';
            
            $index ++;
        }
        $index --;
        
        $total += $index;
    }
    $print .= '
        </table>
        </div>
    ';
    _mpdf($title, $print, 'L');
    break;


  case 'po':
    Event::trigger('laporan/po/');
    _auth1('LAPORAN-PO',$user['id']);
    $today = date('d F Y');
    $clist = '<option value="SEMUA">SEMUA</option>';
		$tg = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
		foreach ($tg as $r) {
			$clist .= '<option value="'.$r['kd_supplier'].'">'.$r['kd_supplier'].' - '.$r['nm_supplier'].'</option>';
		}
		$ui->assign('opt_supplier',$clist);
    $ui->assign('today',$today);
    $ui->assign('_sysfrm_menu1', 'laporan');
    $ui->assign('_sysfrm_menu2', 'laporanpo');
    $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
    $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'lap-po','dp/dist/datepicker.min','btn-top/btn-top','numeric')));       
    $ui->display($spath.'lap-po.tpl');
    break;
  
  case 'laporan-po':
      _auth1('PRINT-LAPORAN-PO',$user['id']);
      $cid = _post('periode');
      $bulan = bulan($cid);
      $tahun = tahun($cid);
      $status = _post('status');
      $supplier = _post('supplier');
      $tanggal = changeFormat($cid);
      $today_time = date('d-M-Y - H:i:s');
      $total = 0;
      $title = 'LAPORAN PO';
      $nm_supplier = '';
      if($supplier != 'SEMUA'){
        $daftar_supplier = ORM::for_table('daftar_supplier')->where('kd_supplier', $supplier)->find_one();
        $nm_supplier = $daftar_supplier['nm_supplier'];
      }
      $print = '
          <div class="cetak-stock-gudang">
              <htmlpageheader name="MyHeader1">
                  <table style="width:100%;">
                    <tr>
                      <th class="header" style="text-align: center;">LAPORAN PO - '. $status .'<br>'. $nm_supplier .'</th>
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
      if($status == 'PENDING') {
        if($supplier == 'SEMUA') {
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = 'PENDING' or status = 'REVISI' order by tgl_po desc")->find_many();
        } else {
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = 'PENDING' or status = 'REVISI' and kd_supplier = '". $supplier ."' order by tgl_po desc")->find_many();
        }
        
      } else {
        if($supplier == 'SEMUA') {
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = '". $status ."' order by tgl_po desc")->find_many();
        } else {
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = '". $status ."' and kd_supplier = '". $supplier ."' order by tgl_po desc")->find_many();
        }
      }
      
      
      $print .= '<table autosize="1" class="tabel-isi" style="width:100%;">';
      
      $index = 1;
      foreach($d as $item) {
          $supp = ORM::for_table('daftar_supplier')->where('kd_supplier', $item["kd_supplier"])->find_one();
          $jumlah = ORM::for_table('po_detail')->where('no_po', $item["no_po"])->count();
          $print .= '
            <tr class="tabel-isi" style="vertical-align: bottom;">
                <th style="text-align:left; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="9">NO PO : '. $item["no_po"] .' '. changeFormat2($item["tgl_po"]) .'</th>
            </tr>
            <tr class="">
              <td style=" text-align: center; font-weight: bold; width: 20%">SUPPLIER</td>
              <td style=" text-align: center; font-weight: bold; width: 3%">#</td>
              <td style=" text-align: center; font-weight: bold;">NO PR</td>
              <td style=" text-align: center; font-weight: bold; width: 20%">ITEM</td>
              <td style=" text-align: center; font-weight: bold;">QTY</td>
              <td style="text-align: center; font-weight: bold;">HARGA</td>
              <td style="text-align: center; font-weight: bold;">TOTAL HARGA</td>
              <td style=" text-align: center; font-weight: bold;">PPN</td>
              <td style=" text-align: center; font-weight: bold;">TOTAL NETTO</td>
            </tr>
            <tr class="tabel-isi">
              <td rowspan="'. $jumlah .'">'. $supp["nm_supplier"] .'</td>
          ';
          $temp = 1;
          $e = ORM::for_table('po_detail')->where('no_po', $item["no_po"])->find_many();
          foreach($e as $items) {
            $itemstock = ORM::for_table('daftar_itemstock')->where('kd_item', $items["kd_item"])->find_one();
            $tanggal_diperlukan = changeFormat2($items["tgl_diperlukan"]);
            if($temp == 1) {
              $print .= '
                  <td style=" text-align: center;">'. $temp .'</td>
                  <td>'. $items["no_pr"] .'</td>
                  <td>'. $itemstock["nm_item"] .'</td>
                  <td style="text-align: center; height: 25px;">'. number_format($items["qty_req"]) .'</td>
                  <td style="text-align: right;">'. number_format($items["harga"]) .'</td>
                  <td style="text-align: right;" rowspan="'. $jumlah .'">'. number_format($item["total_harga"]) .'</td>
                  <td style="text-align: center;" rowspan="'. $jumlah .'">'. number_format($item["ppn"]) .'%</td>
                  <td style="text-align: right;" rowspan="'. $jumlah .'">'. number_format($item["total_netto"]) .'</td>
                </tr>
              ';
            } else {
              $print .= '
                <tr class="tabel-isi">
                  <td style=" text-align: center;">'. $temp .'</td>
                  <td>'. $items["no_pr"] .'</td>
                  <td>'. $itemstock["nm_item"] .'</td>
                  <td style="text-align: center; height: 25px;">'. number_format($items["qty_req"]) .'</td>
                  <td style="text-align: right;">'. number_format($items["harga"]) .'</td>
                </tr>
              ';
            }
            $temp++;
          }
          $index ++;
          $total += $index;
      }
          
      $print .= '
          </table>
          </div>
      ';
      _mpdf($title, $print, 'L');
      break;
  
  case 'print-po':
      _auth1('PRINT-PO',$user['id']);
      $cid = $routes['3'];
      $status = _post('status');
      $file_path = 'http://192.168.201.180/cmportal/ui/theme/softhash/img/CapellaWatermark3.png';
      $today_time = date('d-M-Y - H:i:s');
      
      $d = ORM::for_table('po_master')->find_one($cid);
      $url = 'http://192.168.201.180/cmportal/?ng=menu_GAS/pembelian/list-po/' . $d["id"];
      $e = ORM::for_table('po_detail')->where('no_po', $d["no_po"])->find_one();
      $c = ORM::for_table('pr_master')->where ('no_pr', $e["no_pr"])->find_one();
      $f = ORM::for_table('daftar_supplier')->where('kode_supplier', $d["kd_supplier"])->find_one();
      $tanggal = changeFormat2($d["tgl_po"]);
      $title = 'LAPORAN PO';

      $print = <<<EOD
          <div class="watermark" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background-image-opacity: 0.15;
          background-image: url('$file_path'); background-repeat: repeat; background-size: 197px 197px; background-position: 0 0; z-index: -1;">
          </div>
          <div class="cetak-pembelian" style="z-index: 1;">
              <htmlpageheader name="MyHeader1">
                  <table style="width:100%; ">
                    <tr>
                      <td style="width:20%;"></td>
                      <td style="width:60%; text-align:center;"><u><b>PESANAN PEMBELIAN</b></u><br>PURCHASE ORDER</td>
                      <td style="width:20%;"></td>
                    </tr>
                  </table>
              </htmlpageheader>
              <htmlpagefooter name="MyFooter1">
                  <table style="width:100%;">
                    <tr>
                      <td style="font-size: 10px; text-align: left;">Dicetak Oleh : $nama_user / $today_time</td>
                    </tr>
                  </table>
              </htmlpagefooter>
              <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
              <sethtmlpagefooter name="MyFooter1" value="on" />
      EOD;

      $print .= '
          <br><br>
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
            <tr class="tabel-isi">
              <td style="width:45%; vertical-align: top;" rowspan="3">
                <u><b>Kepada (TO)</b></u> :<br>
                <span style="border: none;"> '. $f["nm_supplier"] .'</span><br>
                <span style="border: none;"> '. $f["contact"] .' ('. $f["phone"] .')</span><br>
                <span style="border: none;">'. $f["alamat"] .'</span><br>
                <span style="border: none;">'. $f["kota"] .'</span>
              </td>
              <td style="width:20%; text-align: center; background-color: #999999;" rowspan="2"><u><b>No. PEMESANAN</u></b><br><b>PO. No.</b></td>
              <td style="width:15%; text-align: center; background-color: #999999;" rowspan="2"><u><b>Tgl. PESAN</u></b><br><b>ORDER DATE</b></td>
              <td style="width:20%; text-align: center; background-color: #999999;" colspan="2"><b>TANGGAL KIRIM</b></td>
            </tr>
            <tr class="tabel-isi">
              <td style="width:10%; text-align: center; background-color: #999999;"><b>BEGIN DLVR</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><b>LAST DLVR</b></td>
            </tr>
            <tr class="tabel-isi"  style="border-top: 0; border-bottom: 0;">
              <td style="text-align: center;">'. $d["no_po"] .'</td>
              <td style="text-align: center;">'. $tanggal.'</td>
              <td style="text-align: center;"></td>
              <td style="text-align: center;"></td>
            </tr>
          </table>
          <table autosize="1" class="tabel-isi" style="width:100%;">
            <tr class="tabel-isi">
              <td style="width:5%; text-align: center; background-color: #999999;"><u><b>NO</b></u><br><b>ITEM</b></td>
              <td style="width:35%; text-align: center; background-color: #999999;"><u><b>NAMA</b></u><br><b>ITEM</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><u><b>JUMLAH</b></u><br><b>QUANTITY</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><b>GARANSI</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><u><b>HARGA</b></u><br><b>UNIT</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><u><b>TOTAL</b></u><br><b>AMOUNT</b></td>
              <td style="width:20%; text-align: center; background-color: #999999;"><b>KETERANGAN</b></td>
            </tr>
          ';
      $g = ORM::for_table('po_detail')->where('no_po', $d['no_po'])->find_many();
      $total_harga = $d['total_harga'];
      $total_netto = $d['total_netto'];
      $ppn = $d['ppn'];
      $total_ppn = $total_harga * $ppn / 100;
      $index = 1;
      $no_pr = '';
      foreach($g as $item) {
          $h = ORM::for_table('daftar_itemstock')->where('kd_item', $item['kd_item'])->find_one();
          $qty = (int)$item["qty_req"];
          $harga = (int)$item["harga"];
          $no_pr = str_replace($item["no_pr"] . ', ', "", $no_pr);
          $no_pr .= $item["no_pr"] . ', ';

          if ($item['garansi_bulan'] || $item['garansi_hari']) {
            $garansi = '';
            if ($item['garansi_bulan']) $garansi .= strval($item['garansi_bulan']) . ' Bulan<br>';
            if ($item['garansi_hari']) $garansi .= strval($item['garansi_hari']) . ' Hari';
          } else {
            $garansi = 'Tidak ada';
          }

          $total_amount = $qty * $harga;
          $print .= '
            <tr class="tabel-isi">
              <td style="text-align: center;">'. $index .'</td>
              <td style="text-align: left;">'. $h["nm_item"] .'</td>
              <td style="text-align: center;">'. number_format($qty) .' '. $h["satuan"] .'</td>
              <td style="text-align: right;">'. $garansi .'</td>
              <td style="text-align: right;">'. number_format($harga) .'</td>
              <td style="text-align: right;">'. number_format($total_amount) .'</td>
              <td style="height:30px; text-align: center;">'. $item["keterangan"] .'</td>
            </tr>
            ';
          $index++;
      }
      $garis = str_repeat('&nbsp;',30);
      
      $ppn = $d["exclude_ppn"] == 1 ? '-' : ($d["ppn"] . '%');
      $print .= '
            </table>
            <table autosize="1" class="tabel-isi" style="width:100%;">
                <tr class="tabel-isi">
                  <td style="width:15%; text-align: center; background-color: #999999;"><u><b>NO. MPP</b></u><br><b>PR. NO.</b></td>
                  <td style="width:20%; text-align: center; background-color: #999999;"><u><b>Lokasi Pengiriman</b></u><br><b>Place Of Delivery</b></td>
                  <td style="width:20%; text-align: center; background-color: #999999;"><u><b>Syarat Pembayaran</b></u><br><b>Term of Payment</b></td>
                  <td style="width:10%; text-align: left; font-size: 8px;"><b>TOTAL</b></td>
                  <td style="width:15%; text-align: right;">'. number_format($total_harga) .'</td>
                  <td style="height:20px; width:20%; text-align: center;"></td>
                </tr>
                <tr class="tabel-isi">
                  <td style="text-align: center;" rowspan="2">'. $no_pr .'</td>
                  <td style="text-align: center;" rowspan="2">'. $d["lokasi_pengiriman"] .'</td>
                  <td style="text-align: center;" rowspan="2">'. $d["syarat_pembayaran"] .'</td>
                  <td style="text-align: left; font-size: 8px;"><b>TOTAL Harga Setelah PPN</b></td>
                  <td style="text-align: right;">'. number_format($total_netto) .'</td>
                  <td style="height:20px; text-align: center;"></td>
                  </tr>
                  <tr class="tabel-isi">
                  <td style="text-align: left; font-size: 8px;"><b>BAYAR DI PUSAT</b></td>
                  <td style="text-align: right;">'. ($d['bayar_pusat'] == 1 ? 'Ya' : 'Tidak') .'</td>
                  <td style="height:20px; text-align: center;"></td>
                  </tr>
            </table>
            <table autosize="1" class="tabel-isi" style="width:100%;">
                <tr class="tabel-isi" style="border-bottom: 0;">
                  <td style="width:55%; text-align: left; vertical-align: top;">Catatan :<br>'. $d["catatan"] .'</td>
                   <td style="text-align: left; height: 80px; vertical-align: top;" colspan="4">';

      
              $print .= '<p>Dibuat Oleh : ' . $d["dibuat_nama"] . ' / ' . $d["dibuat_tgl"] . '</p>';

              if (!empty($c["aprv_it_nama"])) {
                  $print .= '<p>Disetujui IT : ' . $c["aprv_it_nama"] . ' / ' . $c["aprv_it_tgl"] . '</p>';
              }

              if (!empty($c["aprv_mktsrv_nama"])) {
                  $print .= '<p>Disetujui Bengkel : ' . $c["aprv_mktsrv_nama"] . ' / ' . $c["aprv_mktsrv_tgl"] . '</p>';
              }

              $print .= '<p>DiSetujui GA SPV : ' . $c["aprv_ga_spv_nama"] . ' / ' . $c["aprv_ga_spv_tgl"] . '</p>';
              $print .= '<p>DiSetujui GA Head : ' . $c["aprv_ga_head_nama"] . ' / ' . $c["aprv_ga_head_tgl"] . '</p>';

              if (!empty($c["aprv_dir_nama"])) {
                $print .= '<p>Disetujui Direksi : ' . $c["aprv_dir_nama"] . ' / ' . $c["aprv_dir_tgl"] . '</p>';
              }

              $print .='
               </tr>
                <tr class="tabel-isi" style="border-top: 0; border-bottom: 0;">
                  <td style="text-align: left; font-size: 7px;">
                      <hr>
                      <span>a. Barang-barang yang dikirim harus sesuai dengan kualitas permintaan tersebut diatas.</span><br>
                      <span> All the goods must be supply as specifications above.</span><br>
                      <span>b. Jangka waktu pengiriman barang harus sesuai dengan yang tertera diatas.</span><br>
                      <span> Delivery time as schedule.</span><br>
                      <span>c. Jika tidak memenuhi salah satu dari ketentuan a dan/atau b, maka dapat dibatalkan tanpa ganti rugi.</span><br>
                      <span> We can cancelled the transactions without any compensations if you are not fulfill the above conditions.</span>
                      <hr>
                  </td>
                  <td style="text-align: center; font-size: 7px;" colspan="4">
                      <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=' . urlencode($url) . '" alt="QR Code" />
                  </td>
                </tr>
                <tr class="tabel-isi" style="border-top: 0;">
                  <td style="text-align: left;">1. PUTIH-SUPPLIER, 2. MERAH-ACCOUNTING HO, 3. BIRU-PURCHASING</td>
                </tr>
            </table>
            ';
      $print .= '
          </div>
      ';
      _mpdf($title, $print);
      break;

  case 'print-pr':
      // _auth1('PRINT-PR-APPROVE',$user['id']);
      _auth1('PRINT-PR',$user['id']);
      $file_path = 'http://192.168.201.180/cmportal/ui/theme/softhash/img/CapellaWatermark3.png';

      $cid = $routes['3'];
      $status = _post('status');
      
      $today_time = date('d-M-Y - H:i:s');
      $d = ORM::for_table('pr_master')->find_one($cid);
      $tanggal = changeFormat3($d["tgl_pr"]);
      $title = 'PRINT PR';

      $print = '
          <div class="watermark" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background-image-opacity: 0.15;
              background-image: url(' . $file_path .'); background-repeat: repeat; background-size: 197px 197px; background-position: 0 0; z-index: -1;">
          </div>
          <div class="cetak-pembelian">
              <htmlpageheader name="MyHeader1">
                  <table style="width:100%; ">
                    <tr>
                      <td style="width:20%; font-size: 13px; text-align:left; vertical-align: bottom;">Tanggal : <u>'. $tanggal .'</u></td>
                      <td style="width:60%; text-align:center;"><u><b>PERMINTAAN PEMBELIAN BARANG</b></u><br>PURCHASE REQUISITION</td>
                      <td style="width:20%; font-size: 13px; text-align:right;">No. '. $d["no_pr"] .'</td>
                    </tr>
                  </table>
              </htmlpageheader>
              <htmlpagefooter name="MyFooter1">
                  <table style="width:100%;">
                    <tr>
                      <td style="font-size: 10px; text-align: left;">Dicetak Oleh : '. $nama_user .' / '. $today_time .'</td>
                    </tr>
                  </table>
              </htmlpagefooter>
              <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
              <sethtmlpagefooter name="MyFooter1" value="on" />
      ';
      
      $print .= '
          
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
            <tr class="tabel-isi">
              <td style="width:3%; text-align: center; background-color: #999999;" rowspan="3"><u><b>No.</b></u><br>ITEM</td>
              <td style="width:20%; text-align: center; background-color: #999999;" rowspan="3"><u><b>NAMA BARANG</b></u><br>MATERIAL / SPECIFICATIONS</td>
              <td style="width:5%; text-align: center; background-color: #999999;" rowspan="3"><u><b>JUMLAH DIMINTA</b></u><br>QTY REQUESTED</td>
              <td style="width:7%; text-align: center; background-color: #999999;" rowspan="3"><u><b>TGL. DIPERLUKAN</b></u><br>DATE NEEDED</td>
              <td style="width:5%; text-align: center; background-color: #999999;" rowspan="3"><u><b>SISA STOCK</b></u><br>STOCK BALANCE</td>
              <td style="width:7%; text-align: center; background-color: #999999;" rowspan="3"><u><b>KEPERLUAN</b></u><br>PURPOSE</td>
              <td style="width:53%; text-align: center; background-color: #999999;" colspan="12"><u><b>PERBANDINGAN HARGA DARI BEBERAPA SUPPLIER</b></u><br>PRICE COMPARISON</td>
            </tr>
            <tr class="tabel-isi">
              <td style="text-align: center; background-color: #999999;" colspan="4">SUPPLIER 1</td>
              <td style="text-align: center; background-color: #999999;" colspan="4">SUPPLIER 2</td>
              <td style="text-align: center; background-color: #999999;" colspan="4">SUPPLIER 3</td>
            </tr>
            <tr class="tabel-isi"  style="border-top: 0; border-bottom: 0;">
              <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
              <td style="text-align: center; background-color: #999999;">PRICE</td>
              <td style="text-align: center; background-color: #999999;">PPN</td>
              <td style="text-align: center; background-color: #999999;">GARANSI</td>
              <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
              <td style="text-align: center; background-color: #999999;">PRICE</td>
              <td style="text-align: center; background-color: #999999;">PPN</td>
              <td style="text-align: center; background-color: #999999;">GARANSI</td>
              <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
              <td style="text-align: center; background-color: #999999;">PRICE</td>
              <td style="text-align: center; background-color: #999999;">PPN</td>
              <td style="text-align: center; background-color: #999999;">GARANSI</td>
            </tr>
          ';
      // $print .= '
      // <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
      //     <tr class="tabel-isi">
      //         <td style="width:3%; text-align: center; background-color: #999999;" rowspan="3"><u><b>No.</b></u><br>ITEM</td>
      //         <td style="width:20%; text-align: center; background-color: #999999;" rowspan="3"><u><b>NAMA BARANG</b></u><br>MATERIAL / SPECIFICATIONS</td>
      //         <td style="width:5%; text-align: center; background-color: #999999;" rowspan="3"><u><b>JUMLAH DIMINTA</b></u><br>QTY REQUESTED</td>
      //         <td style="width:7%; text-align: center; background-color: #999999;" rowspan="3"><u><b>TGL. DIPERLUKAN</b></u><br>DATE NEEDED</td>
      //         <td style="width:5%; text-align: center; background-color: #999999;" rowspan="3"><u><b>SISA STOCK</b></u><br>STOCK BALANCE</td>
      //         <td style="width:7%; text-align: center; background-color: #999999;" rowspan="3"><u><b>KEPERLUAN</b></u><br>PURPOSE</td>
      //         <td style="width:53%; text-align: center; background-color: #999999;" colspan="9"><u><b>PERBANDINGAN HARGA DARI BEBERAPA SUPPLIER</b></u><br>PRICE COMPARISON</td>
      //     </tr>
      //     <tr class="tabel-isi">
      //         <td style="text-align: center; background-color: #999999;" colspan="3">SUPPLIER 1</td>
      //         <td style="text-align: center; background-color: #999999;" colspan="3">SUPPLIER 2</td>
      //         <td style="text-align: center; background-color: #999999;" colspan="3">SUPPLIER 3</td>
      //     </tr>
      //     <tr class="tabel-isi" style="border-top: 0; border-bottom: 0;">
      //         <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
      //         <td style="text-align: center; background-color: #999999;">PRICE</td>
      //         <td style="text-align: center; background-color: #999999;">GARANSI</td>
      //         <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
      //         <td style="text-align: center; background-color: #999999;">PRICE</td>
      //         <td style="text-align: center; background-color: #999999;">GARANSI</td>
      //         <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
      //         <td style="text-align: center; background-color: #999999;">PRICE</td>
      //         <td style="text-align: center; background-color: #999999;">GARANSI</td>
      //     </tr>      
      // ';
      

      $e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
      $index = 1;
      $total1 = 0;
      $total2 = 0;
      $total3 = 0;
      foreach($e as $item) {
          $e = ORM::for_table('daftar_itemstock')->where('kd_item', $item['kd_item'])->find_one();
          $f = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['kd_supplier1'])->find_one();
          $g = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['kd_supplier2'])->find_one();
          $h = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['kd_supplier3'])->find_one();
        
          
          $qty = (int)$item["qty_req"];
          $qty_stock = (int)$item["qty_stock"];
          $harga1 = (int)$item["harga1"];
          $harga2 = (int)$item["harga2"];
          $harga3 = (int)$item["harga3"];
          $harga_ppn1 = (int)$item["harga_ppn1"];
          $harga_ppn2 = (int)$item["harga_ppn2"];
          $harga_ppn3 = (int)$item["harga_ppn3"];
          $ppn1 = (int)$item["ppn1"];
          $ppn2 = (int)$item["ppn2"];
          $ppn3 = (int)$item["ppn3"];

          
          $pilihan1 = '';
          $pilihan2 = '';
          $pilihan3 = '';
          
          if($item["supplierpilihan"] == $item['kd_supplier1']) {
              $pilihan1 = '<span style="font-family:helvetica">&#10004;</span>';
          } else if($item["supplierpilihan"] == $item['kd_supplier2']){
              $pilihan2 = '<span style="font-family:helvetica">&#10004;</span>';
          } else if($item["supplierpilihan"] == $item['kd_supplier3']){
              $pilihan3 = '<span style="font-family:helvetica">&#10004;</span>';
          }
          
          
          // if($item["keperluan"] == 'STOCK') {
          //     $keperluan = 'STOCK';
          // } else {
          //     $i = ORM::for_table('daftar_inventaris')->where('kd_inventaris', $item['kd_inventaris'])->find_one();
          //     $keperluan = $i["nm_inventaris"];
          // }
          // 
          
          // $print .= '
          //   <tr class="tabel-isi">
          //     <td style="text-align: center; height: 30px;">'. $index .'</td>
          //     <td style="text-align: left;">'. $e["nm_item"] .'</td>
          //     <td style="text-align: center;">'. number_format($qty) .' '. $e["satuan"] .'</td>
          //     <td style="text-align: center;">'. $item["tgl_diperlukan"] .'</td>
          //     <td style="text-align: center;">'. $qty_stock .'</td>
          //     <td style="text-align: center;">'. $item["keperluan"] .'</td>
          //     <td style="text-align: center;">'. $f["nama_supplier"] . $pilihan1 .'</td>
          //     <td style="text-align: right;">'. number_format($harga1) . $pilihan1 .'</td>
          //     <td style="text-align: right;">'. $item["garansi_bulan_supplier1"] . "BULAN ".$item["garansi_hari_supplier1"] ."HARI".'</td>
          //     <td style="text-align: center;">'. $g["nama_supplier"] . $pilihan2 .'</td>
          //     <td style="text-align: right;">'. number_format($harga2) . $pilihan2 .'</td>
          //       <td style="text-align: right;">'. $item["garansi_bulan_supplier2"] ."BULAN ".$item["garansi_hari_supplier2"] ."HARI".'</td>
          //     <td style="text-align: center;">'. $h["nama_supplier"] . $pilihan3 .'</td>
          //     <td style="text-align: right;">'. number_format($harga3) . $pilihan3 .'</td>
          //       <td style="text-align: right;">'. $item["garansi_bulan_supplier3"] ."BULAN ".$item["garansi_hari_supplier3"] ."HARI".'</td>
          //   </tr>
          //   ';
          $garansi_supplier1 = '';

            if (is_null($item["garansi_bulan_supplier1"]) && is_null($item["garansi_hari_supplier1"])) {
                // If both are null, show 'TIDAK ADA'
                $garansi_supplier1 = 'TIDAK ADA';
            } elseif (is_null($item["garansi_bulan_supplier1"])) {
                // If only the month is null, show the day value
                $garansi_supplier1 = $item["garansi_hari_supplier1"] . " HARI";
            } elseif (is_null($item["garansi_hari_supplier1"])) {
                // If only the day is null, show the month value
                $garansi_supplier1 = $item["garansi_bulan_supplier1"] . " BULAN";
            } else {
                // If both values are available, show both
                $garansi_supplier1 = $item["garansi_bulan_supplier1"] . " BULAN " . $item["garansi_hari_supplier1"] . " HARI";
            }

            $bulan1 = $item["garansi_bulan_supplier1"] ? $item["garansi_bulan_supplier1"] . ' Bulan ' : '';
            $hari1 = $item["garansi_hari_supplier1"] ? $item["garansi_hari_supplier1"] . ' hari ' : '';
            $garansi1 = $bulan1 || $hari1 ? $bulan1 . '<br>' . $hari1 : 'Tidak Ada';
            $bulan2 = $item["garansi_bulan_supplier2"] ? $item["garansi_bulan_supplier2"] . ' Bulan ' : '';
            $hari2 = $item["garansi_hari_supplier2"] ? $item["garansi_hari_supplier2"] . ' hari ' : '';
            $garansi2 = $bulan2 || $hari2 ? $bulan2 . '<br>' . $hari2 : 'Tidak Ada';
            $bulan3 = $item["garansi_bulan_supplier3"] ? $item["garansi_bulan_supplier3"] . ' Bulan ' : '';
            $hari3 = $item["garansi_hari_supplier3"] ? $item["garansi_hari_supplier3"] . ' hari ' : '';
            $garansi3 = $bulan3 || $hari3 ? $bulan3 . '<br>' . $hari3 : 'Tidak Ada';

            $print .= '
            <tr class="tabel-isi">
              <td style="text-align: center; height: 30px;">'. $index .'</td>
              <td style="text-align: left;">'. $e["nm_item"] .'</td>
              <td style="text-align: center;">'. number_format($qty) .' '. $e["satuan"] .'</td>
              <td style="text-align: center;">'. $item["tgl_diperlukan"] .'</td>
              <td style="text-align: center;">'. $qty_stock .'</td>
              <td style="text-align: center;">'. $item["keperluan"] .'</td>
              <td style="text-align: center;">'. $f["nama_supplier"] . $pilihan1 .'</td>
              <td style="text-align: right;">'. number_format($harga1) . $pilihan1 .'</td>
              <td style="text-align: right;">'. number_format($ppn1) . $pilihan1 .'</td>
              <td style="text-align: right;">'. $garansi1 .'</td> <!-- Modified part -->
              <td style="text-align: center;">'. $g["nama_supplier"] . $pilihan2 .'</td>
              <td style="text-align: right;">'. number_format($harga2) . $pilihan2 .'</td>
              <td style="text-align: right;">'. number_format($ppn2) . $pilihan2 .'</td>
              <td style="text-align: right;">'. $garansi2 .'</td>
              <td style="text-align: center;">'. $h["nama_supplier"] . $pilihan3 .'</td>
              <td style="text-align: right;">'. number_format($harga3) . $pilihan3 .'</td>
              <td style="text-align: right;">'. number_format($ppn3) . $pilihan3 .'</td>
              <td style="text-align: right;">'. $garansi3 .'</td>
            </tr>
            ';

          $index++;
          $total1 += $harga_ppn1;
          $total2 += $harga_ppn2;
          $total3 += $harga_ppn3;
          
      }

      $print .= '<tr>
                  <td>'.$SubTotal.'</td>;
                  <td>'.$SubTotal.'</td>;
                  <td>'.$SubTotal.'</td>;
                  <td>'.$SubTotal.'</td>;
                  <td>'.$SubTotal.'</td>;
                  <td>'.$SubTotal.'</td>;
                  <td>SubTotal Supplier 1</td>;
                  <td>'. number_format($total1) .'</td>
                  <td></td>
                  <td></td>
                  <td>SubTotal Supplier 2</td>;
                  <td>'. number_format($total2) .'</td>
                  <td></td>
                  <td></td>
                  <td>SubTotal Supplier 3</td>;
                  <td>'. number_format($total3) .'</td>
                  <td></td>
                  <td></td>
                  

                  </tr>';

      // $ppn = $total_harga * 0.11;
      // $total_netto = $total_harga + $ppn;
      // $garis = str_repeat('&nbsp;',30);
      // $print .= '
      //           <tr class="tabel-isi">
      //             <td style="text-align: center; background-color: #999999;" colspan="4"><u><b>Per</b></u><br>REQUEST SECTION</td>
      //             <td style="text-align: left; vertical-align: top;" colspan="8" rowspan="2"><u><b>KETERANGAN :</b></u><br>REMARKS</td>
      //           </tr>
      //           <tr class="tabel-isi">
      //             <td style="text-align: left; height: 80px; vertical-align: top;" colspan="4">
      //                 <p>Dibuat Oleh : '. $d["dibuat_nama"] .' / '. $d["dibuat_tgl"] .'</p>
      //                 <p>Disetujui 2 : '. $d["diperiksa_nama"] .' / '. $d["diperiksa_tgl"] .'</p>
      //                 <p>Disetujui 3 : '. $d["diketahui_nama"] .' / '. $d["diketahui_tgl"] .'</p>
      //                 <p>Disetujui 4 : '. $d["disetujui_nama"] .' / '. $d["disetujui_tgl"] .'</p>
      //             </td>
      //           </tr>
      //       </table>
      //       ';
      $print .= '
          <tr class="tabel-isi">
            <td style="text-align: center; background-color: #999999;" colspan="4"><u><b>Menyetujui</b></td>
            <td style="text-align: left; vertical-align: top;" colspan="15" rowspan="2"><u><b>KETERANGAN :</b></u><br>REMARKS</td>
          </tr>
          <tr class="tabel-isi">
            <td style="text-align: left; height: 80px; vertical-align: top;" colspan="4">';

      
              $print .= '<p>Dibuat Oleh : ' . $d["dibuat_nama"] . ' / ' . $d["dibuat_tgl"] . '</p>';

              if (!empty($d["aprv_it_nama"])) {
                  $print .= '<p>Disetujui IT : ' . $d["aprv_it_nama"] . ' / ' . $d["aprv_it_tgl"] . '</p>';
              }

          // if (!empty($d["bengkel_nama"])) {
          //     $print .= '<p>Disetujui Bengkel : ' . $d["bengkel_nama"] . ' / ' . $d["bengkel_tgl"] . '</p>';
          // }

              $print .= '<p>DiSetujui GA SPV : ' . $d["aprv_ga_spv_nama"] . ' / ' . $d["aprv_ga_spv_tgl"] . '</p>';
              $print .= '<p>DiSetujui GA Head : ' . $d["aprv_ga_head_nama"] . ' / ' . $d["aprv_ga_head_tgl"] . '</p>';

              if (!empty($d["aprv_dir_nama"])) {
                $print .= '<p>Disetujui Direksi : ' . $d["aprv_dir_nama"] . ' / ' . $d["aprv_dir_tgl"] . '</p>';
              }
      $print .= '</td>
      </tr>
      </table>';

      $print .= '
          </div>
      ';
      _mpdf($title, $print, 'L');
      break;    
      
  case 'print-spbi':
    _auth1('PRINT-SPBI',$user['id']);
    $cid = $routes['3'];
    
    $today_time = date('d-M-Y - H:i:s');
    $d = ORM::for_table('spbi_master')->find_one($cid);
    $po = ORM::for_table('po_master')->where('no_po', $d['no_po'])->find_one();
    $supplier = ORM::for_table('daftar_supplier')->where('kd_supplier', $po['kd_supplier'])->find_one();
    $tanggal = changeFormat3($d["tgl_spbi"]);
    $title = 'PRINT SPBI';
    $print = '
        <div class="cetak-pembelian">
            <htmlpageheader name="MyHeader1">
                
            </htmlpageheader>
            <htmlpagefooter name="MyFooter1">
                <table style="width:100%;">
                  <tr>
                    <td style="font-size: 10px; text-align: left;">Dicetak Oleh : '. $nama_user .' / '. $today_time .'</td>
                  </tr>
                </table>
            </htmlpagefooter>
            <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
            <sethtmlpagefooter name="MyFooter1" value="on" />
    ';
    
    $print .= '
        <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
          <tr class="tabel-isi">
            <td style="width:20%; text-align: left;" rowspan="3">Kepada Yth.<br>'. $d["kepada"].'</td>
            <td style="width:60%; text-align: center;" rowspan="3"><b>SURAT PENGANTAR BARANG INTERN</b><br>(SPBI)</td>
            <td style="width:20%; text-align: left;" colspan="6">No. '. $d["no_spbi"] .'<br>Tanggal: '. $d["tgl_spbi"] .'</td>
          </tr>
        </table>
        <div style="font-size: 11px;">
          Supplier : '. $supplier["nm_supplier"] .'<br>
          No. PO. : '. $d["no_po"] .'
        </div>
        <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
          <tr class="tabel-isi">
            <td style="width:5%; text-align: center;" rowspan="2"><b>No.</b></td>
            <td style="width:30%; text-align: center;" rowspan="2" colspan="2"><b>Nama Barang</b></td>
            <td style="width:20%; text-align: center;" colspan="2"><b>Quantity</b></td>
            <td style="width:10%; text-align: center;" rowspan="2"><b>STN</b></td>
            <td style="width:20%; text-align: center;" rowspan="2"><b>No. PR</b></td>
            <td style="width:15%; text-align: center;" rowspan="2"><b>Keterangan</b></td>
          </tr>
          <tr class="tabel-isi">
            <td style=" text-align: center;"><b>Kirim</b></td>
            <td style=" text-align: center;"><b>Terima</b></td>
          </tr>
        
        ';
    $i = 1;
    $e = ORM::for_table('spbi_detail')->where('no_spbi', $d['no_spbi'])->find_many();
    
    foreach($e as $item) {
      $itemstock = ORM::for_table('daftar_itemstock')->where('kd_item', $item['kd_item'])->find_one();
      $pr = ORM::for_table('pr_master')->where('no_pr', $item['no_pr'])->find_one();
      $print .= '
          <tr class="tabel-isi">
            <td style="text-align: center;" height="30px;">'.$i.'</td>
            <td style="text-align: left;" colspan="2">'.$itemstock["nm_item"].'</td>
            <td style="text-align: center;">'.number_format($item["qty"]).'</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;">'.$itemstock["satuan"].'</td>
            <td style="text-align: center;">'.$item["no_pr"].'</td>
            <td style="text-align: center;">Tgl PR. '. $pr["tgl_pr"] .' '. $item["keterangan"] .'</td>
          </tr>
      ';
      $i++;
    }

    $print .= '
          <tr class="tabel-isi">
            <td style="text-align: center;" colspan="2"></td>
            <td style=" text-align: center;"><b>Diketahui</b></td>
            <td style=" text-align: center;" colspan="3"><b>Penerima</b></td>
            <td style=" text-align: center;" ><b>Pembawa</b></td>
            <td style=" text-align: center;" ><b>Pengirim</b></td>
          </tr>
          <tr class="tabel-isi">
            <td style="text-align: left; height: 50px;" colspan="2"></td>
            <td style=" text-align: left;"></td>
            <td style=" text-align: left;" colspan="3"></td>
            <td style=" text-align: left;" ></td>
            <td style=" text-align: left;" ></td>
          </tr>
          <tr class="tabel-isi">
            <td style="text-align: left;" colspan="2"></td>
            <td style=" text-align: left;">Tgl.</td>
            <td style=" text-align: left;" colspan="3">Tgl.</td>
            <td style=" text-align: left;" >Tgl.</td>
            <td style=" text-align: left;" >Tgl.</td>
          </tr>
        </table>
    ';
    $print .= '
        </div>
    ';
    _mpdf($title, $print);
    break;
  
  case 'print-bpnb':
      _auth1('PRINT-BPNB',$user['id']);
      $cid = $routes['3'];
      
      $today_time = date('d-M-Y - H:i:s');
      $d = ORM::for_table('spbi_master')->find_one($cid);
      $po = ORM::for_table('po_master')->where('no_po', $d['no_po'])->find_one();
      $supplier = ORM::for_table('daftar_supplier')->where('kd_supplier', $po['kd_supplier'])->find_one();
      $tanggal = changeFormat3($d["tgl_bpnb"]);
      $title = 'PRINT BPNB';
      $print = '
          <div class="cetak-pembelian">
              <htmlpageheader name="MyHeader1">
                  
              </htmlpageheader>
              <htmlpagefooter name="MyFooter1">
                  <table style="width:100%;">
                    <tr>
                      <td style="font-size: 10px; text-align: left;">Dicetak Oleh : '. $nama_user .' / '. $today_time .'</td>
                    </tr>
                  </table>
              </htmlpagefooter>
              <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
              <sethtmlpagefooter name="MyFooter1" value="on" />
      ';
      
      $print .= '
          <table autosize="1" style="width:100%; margin-bottom:3px;">
            <tr>
              <td style="width:35%; text-align: left;"></td>
              <td style="width:30%; text-align: center;"><b><u>BUKTI PENERIMAAN BARANG</u></b><br>(B P n B)</td>
              <td style="width:35%; text-align: right;"></td>
            </tr>
            <tr>
              <td style="width:35%; text-align: left;"></td>
              <td style="width:30%; text-align: center;"></td>
              <td style="width:35%; text-align: right;">Nomor : <u>'. $d["no_spbi"] .'</u></td>
            </tr>
            <tr>
              <td style="width:35%; text-align: left;">Nama Supplier : <u>'. $supplier["nm_supplier"].'</u></td>
              <td style="width:30%; text-align: center;"></td>
              <td style="width:35%; text-align: right;">Tanggal : <u>'. $d["tgl_spbi"] .'</u></td>
            </tr>
          </table>
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
            <tr class="tabel-isi">
              <td style="width:5%; text-align: center;"><b>NO</b></td>
              <td style="width:15%; text-align: center;"><b>NOMOR PO</b></td>
              <td style="width:15%; text-align: center;"><b>NOMOR PR</b></td>
              <td style="width:40%; text-align: center;"><b>NAMA DAN SPESIFIKASI BARANG</b></td>
              <td style="width:10%; text-align: center;"><b>QTY</b></td>
              <td style="width:15%; text-align: center;"><b>SATUAN</b></td>
            </tr>
          ';
      $i = 1;
      $e = ORM::for_table('spbi_detail')->where('no_spbi', $d['no_spbi'])->find_many();
      
      foreach($e as $item) {
        $itemstock = ORM::for_table('daftar_itemstock')->where('kd_item', $item['kd_item'])->find_one();
        $pr = ORM::for_table('pr_master')->where('no_pr', $item['no_pr'])->find_one();
        $print .= '
            <tr class="tabel-isi">
              <td style="text-align: center;" height="30px;">'.$i.'</td>
              <td style="text-align: center;">'.$d['no_po'].'</td>
              <td style="text-align: center;">'.$item["no_pr"].'</td>
              <td style="text-align: center;">'.$itemstock["nm_item"].'</td>
              <td style="text-align: center;">'. number_format($item["qty"]) .'</td>
              <td style="text-align: center;">'. $itemstock["satuan"] .'</td>
            </tr>
        ';
        $i++;
      }
  
      $print .= '
            <tr class="tabel-isi">
              <td style="text-align: left; vertical-align: top;" colspan="4" rowspan="3"><b><u>KETERANGAN</u></b><br>'. $d["keterangan_bpnb"] .'</td>
              <td style="text-align: center;" colspan="2"><b><u>DITERIMA</u></b></td>
            </tr>
            <tr class="tabel-isi">
              <td style="text-align: left; height: 50px;" colspan="2"></td>
            </tr>
            <tr class="tabel-isi">
              <td style="text-align: center;" colspan="2">'. $nama_user .'</td>
            </tr>
          </table>
      ';
      $print .= '
          </div>
      ';
      _mpdf($title, $print);
      break;   
      
  default:
      echo 'action not defined';
}