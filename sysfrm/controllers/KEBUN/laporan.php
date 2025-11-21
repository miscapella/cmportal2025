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
        $txtmsg='';
        $kode='PRINT-LAPORAN-PR-HARGA';
        $e = ORM::for_table('daftar_otoritas_user','dblogin')->where('kode_oto',$kode)->where('user_id',$userid)->count();
        if ($e > 0 ) {
          $txtmsg='<td class="" style="width:20%; text-align: center; font-weight: bold;">Harga</td>';
        }
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
                <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER 1</td>'
                .$txtmsg.
                '<td class="" style="width:10%; text-align: center; font-weight: bold;">HARGA 1</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER 2</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">HARGA 2</td>
                <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER 3</td>
                <td class="" style="width:10%; text-align: center; font-weight: bold;">HARGA 3</td>
                }
                
                <td class="" style="width:20%; text-align: center; font-weight: bold;">PILIHAN SUPPLIER</td>
              </tr>
              ';
          $e = ORM::for_table('pr_detail')->where('no_pr', $item["no_pr"])->find_many();
          $index = 1;
          foreach($e as $items) {
              $supp1 = ORM::for_table('daftar_supplier')->where('kode_supplier', $items["kode_supplier1"])->find_one();
              $supp2 = ORM::for_table('daftar_supplier')->where('kode_supplier', $items["kode_supplier2"])->find_one();
              $supp3 = ORM::for_table('daftar_supplier')->where('kode_supplier', $items["kode_supplier3"])->find_one();
              $supp = ORM::for_table('daftar_supplier')->where('kode_supplier', $items["supplierpilihan"])->find_one();
              $itemstock = ORM::for_table('daftar_itemstock')->where('kode_item', $items["kode_item"])->find_one();
              $namainventaris = '';
              if($items["keperluan"] == 'STOCK') {
                $namainventaris = 'STOCK';
              } else {
                $inventaris = ORM::for_table('daftar_kategori')->where('kode_kategori', $items["line"])->find_one();
                $namainventaris = $inventaris["nama_kategori"];
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
                  <td>'. $itemstock["nama_item"] .'</td>
                  <td style=" text-align: center;">'. $namainventaris .'</td>
                  <td style=" text-align: center;">'. number_format($items["qty_req"]) .'</td>
                  <td style=" text-align: center;">'. number_format($items["qty_stock"]) .'</td>
                  <td>'. $supp1["nama_supplier"] .'</td>
                  <td style=" text-align: right;">'. $hargasup1 .'</td>
                  <td>'. $supp2["nama_supplier"] .'</td>
                  <td style=" text-align: right;">'. $hargasup2 .'</td>
                  <td>'. $supp3["nama_supplier"] .'</td>
                  <td style=" text-align: right;">'. $hargasup3 .'</td>
                  <td>'. $supp["nama_supplier"] .'</td>
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
              <th style="text-align:left; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="13">NO PR : '. $item["no_pr"] .' '. changeFormat2($item["tgl_pr"]) .'</th>
            </tr>
            <tr class="tabel-isi">
              <td class="" style="width:5%; text-align: center; font-weight: bold;">NO</td>
              <td class="" style="width:20%; text-align: center; font-weight: bold;">ITEM</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">KEPERLUAN</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">QTY REQUEST</td>
              <td class="" style="width:20%; text-align: center; font-weight: bold;">SUPPLIER</td>
              <td class="" style="width:11%; text-align: center; font-weight: bold;">NO PO</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">TGL PO</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">PR to PO</td>
              <td class="" style="width:11%; text-align: center; font-weight: bold;">NO SPBI</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">TGL SPBI</td>
              <td class="" style="width:11%; text-align: center; font-weight: bold;">NO BPnB</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">TGL BPnB</td>
              <td class="" style="width:10%; text-align: center; font-weight: bold;">PR to BPnB</td>
              <td class="" style="width:15%; text-align: center; font-weight: bold;">STATUS</td>
            </tr>
            ';
        $e = ORM::for_table('pr_detail')->where('no_pr', $item["no_pr"])->find_many();
        $index = 1;
        foreach($e as $items) {
            $supp = ORM::for_table('daftar_supplier')->where('kode_supplier', $items["supplierpilihan"])->find_one();
            $itemstock = ORM::for_table('daftar_itemstock')->where('kode_item', $items["kode_item"])->find_one();
            $namainventaris = '';
            if($items["keperluan"] == 'STOCK') {
              $namainventaris = 'STOCK';
            } else {
              $inventaris = ORM::for_table('daftar_kategori')->where('kode_kategori', $items["line"])->find_one();
              $namainventaris = $inventaris["nama_kategori"];
            }
            $tglpr = new DateTime($item['tgl_pr']);
            $no_po = '-';
            $tgl_po = '-';
            $no_spbi = '-';
            $tgl_spbi = '-';
            $no_bpnb = '-';
            $tgl_bpnb = '-';
            $tgl_prtobpnb = '-';
            $tgl_prtopo = '-';
            if($items["status"] != 'PR'){
              $po = ORM::for_table('po_detail')->where('no_pr', $items["no_pr"])->where('kode_item', $items["kode_item"])->find_one();
              $pom = ORM::for_table('po_master')->where('no_po', $po["no_po"])->find_one();
              $no_po = $po["no_po"];
              $tgl_po = $pom["tgl_po"];
              $tglpo = new DateTime($pom["tgl_po"]);
              $tgl_prtopo = $tglpr -> diff($tglpo);
            }
            if($items["status"] == 'DIKIRIM' || $items["status"] == 'DITERIMA'){
              $spbi = ORM::for_table('spbi_detail')->where('no_pr', $items["no_pr"])->where('kode_item', $items["kode_item"])->find_one();
              $spbim = ORM::for_table('spbi_master')->where('no_spbi', $spbi["no_spbi"])->find_one();
              $no_spbi = $spbi["no_spbi"];
              $tgl_spbi = $spbim["tgl_spbi"];
              if($items["status"] == 'DITERIMA') {
                $no_bpnb = $spbim["no_bpnb"];
                $tgl_bpnb = $spbim["tgl_bpnb"];
                $tglbpnb = new DateTime($spbim["tgl_bpnb"]);
                $tgl_prtobpnb = $tglpr ->diff($tglbpnb);
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
                <td>'. $itemstock["nama_item"] .'</td>
                <td style=" text-align: center;">'. $namainventaris .'</td>
                <td style=" text-align: center;">'. number_format($items["qty_req"]) .'</td>
                <td style=" text-align: center;">'. $supp["nama_supplier"] .'</td>
                <td style=" text-align: center;">'. $no_po .'</td>
                <td style=" text-align: center;">'. $tgl_po .'</td>
                <td style=" text-align: center;">'. $tgl_prtopo->d .'</td>
                <td style=" text-align: center;">'. $no_spbi .'</td>
                <td style=" text-align: center;">'. $tgl_spbi .'</td>
                <td style=" text-align: center;">'. $no_bpnb .'</td>
                <td style=" text-align: center;">'. $tgl_bpnb .'</td>
                <td style=" text-align: center;">'. $tgl_prtobpnb->d .'</td>
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
			$clist .= '<option value="'.$r['kode_supplier'].'">'.$r['kode_supplier'].' - '.$r['nama_supplier'].'</option>';
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
      $nama_supplier = '';
      if($supplier != 'SEMUA'){
        $daftar_supplier = ORM::for_table('daftar_supplier')->where('kode_supplier', $supplier)->find_one();
        $nama_supplier = $daftar_supplier['nama_supplier'];
      }
      $print = '
          <div class="cetak-stock-gudang">
              <htmlpageheader name="MyHeader1">
                  <table style="width:100%;">
                    <tr>
                      <th class="header" style="text-align: center;">LAPORAN PO - '. $status .'<br>'. $nama_supplier .'</th>
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
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = 'PENDING' or status = 'REVISI' and kode_supplier = '". $supplier ."' order by tgl_po desc")->find_many();
        }
        
      } else {
        if($supplier == 'SEMUA') {
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = '". $status ."' order by tgl_po desc")->find_many();
        } else {
          $d = ORM::for_table('po_master')->raw_query("select * from po_master where status = '". $status ."' and kode_supplier = '". $supplier ."' order by tgl_po desc")->find_many();
        }
      }
      
      
      $print .= '<table autosize="1" class="tabel-isi" style="width:100%;">';
      
      $index = 1;
      $subtotal = 0;
      foreach($d as $item) {
          $supp = ORM::for_table('daftar_supplier')->where('kode_supplier', $item["kode_supplier"])->find_one();
          $jumlah = ORM::for_table('po_detail')->where('no_po', $item["no_po"])->count();
          if ($user['golongan'] > 1) {
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
              <td rowspan="'. $jumlah .'">'. $supp["nama_supplier"] .'</td>
          ';
          } else {
            $print .= '
            <tr class="tabel-isi" style="vertical-align: bottom;">
                <th style="text-align:left; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="5">NO PO : '. $item["no_po"] .' '. changeFormat2($item["tgl_po"]) .'</th>
            </tr>
            <tr class="">
              <td style=" text-align: center; font-weight: bold;">SUPPLIER</td>
              <td style=" text-align: center; font-weight: bold;">#</td>
              <td style=" text-align: center; font-weight: bold;">NO PR</td>
              <td style=" text-align: center; font-weight: bold;">ITEM</td>
              <td style=" text-align: center; font-weight: bold;">QTY</td>
            </tr>
            <tr class="tabel-isi">
              <td rowspan="'. $jumlah .'">'. $supp["nama_supplier"] .'</td>
          ';
          }
          $temp = 1;
          $e = ORM::for_table('po_detail')->where('no_po', $item["no_po"])->find_many();
          foreach($e as $items) {
            $itemstock = ORM::for_table('daftar_itemstock')->where('kode_item', $items["kode_item"])->find_one();
            $tanggal_diperlukan = changeFormat2($items["tgl_diperlukan"]);
            if($temp == 1) {
              if ($user['golongan'] > 1) {
              $print .= '
                  <td style=" text-align: center;">'. $temp .'</td>
                  <td>'. $items["no_pr"] .'</td>
                  <td>'. $itemstock["nama_item"] .'</td>
                  <td style="text-align: center; height: 25px;">'. number_format($items["qty_req"]) .'</td>
                  <td style="text-align: right;">'. number_format($items["harga"]) .'</td>
                  <td style="text-align: right;" rowspan="'. $jumlah .'">'. number_format($item["total_harga"]) .'</td>
                  <td style="text-align: center;" rowspan="'. $jumlah .'">'. number_format($item["ppn"]) .'%</td>
                  <td style="text-align: right;" rowspan="'. $jumlah .'">'. number_format($item["total_netto"]) .'</td>
                </tr>
              ';
              } else {
                $print .= '
                  <td style=" text-align: center;">'. $temp .'</td>
                  <td>'. $items["no_pr"] .'</td>
                  <td>'. $itemstock["nama_item"] .'</td>
                  <td style="text-align: center; height: 25px;">'. number_format($items["qty_req"]) .'</td>
                </tr>
              ';
              }
              $subtotal += $item["total_netto"];
            } else {
              $print .= '
                <tr class="tabel-isi">
                  <td style=" text-align: center;">'. $temp .'</td>
                  <td>'. $items["no_pr"] .'</td>
                  <td>'. $itemstock["nama_item"] .'</td>
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
          
      // Sanksi
      if ($user['golongan'] > 1) {
      $print .= '
          <tr class="tabel-isi" style="vertical-align: bottom;">
            <th style="text-align:right; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="9">Sub Total : '. number_format($subtotal) .'</th>
          </tr>
          </table>
          </div>
      ';
      } else {
        $print .= '
          <tr class="tabel-isi" style="vertical-align: bottom;">
            <th style="text-align:right; height: 40px; font-size: 15px; vertical-align: bottom;" colspan="5"></th>
          </tr>
          </table>
          </div>
      ';
      }
      _mpdf($title, $print, 'L');
      break;
  
  case 'print-po':
      _auth1('PRINT-PO-APPROVE',$user['id']);
      $cid = $routes['3'];
      $status = _post('status');
      
      $today_time = date('d-M-Y - H:i:s');
      $d = ORM::for_table('po_master')->find_one($cid);
      $e = ORM::for_table('po_detail')->where('no_po', $d["no_po"])->find_one();
      $f = ORM::for_table('daftar_supplier')->where('kode_supplier', $d["kode_supplier"])->find_one();
      $tanggal = changeFormat2($d["tgl_po"]);
      $title = 'LAPORAN PO';        
      $print = '
          <div class="cetak-pembelian">
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
                      <td style="font-size: 10px; text-align: left;">Dicetak Oleh : '. $nama_user .' / '. $today_time .'</td>
                    </tr>
                  </table>
              </htmlpagefooter>
              <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
              <sethtmlpagefooter name="MyFooter1" value="on" />
      ';
      
      $print .= '
          <br><br>
          
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
            <tr class="tabel-isi">
              <td style="width:45%; vertical-align: top;" rowspan="3">
                <u><b>Kepada (TO)</b></u> :<br>
                <span style="border: none;"> '. $f["nama_supplier"] .'</span><br>
                <span style="border: none;"> '. $f["nama_contact"] .' ('. $f["hp_contact"] .')</span><br>
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
              <td style="width:40%; text-align: center; background-color: #999999;"><u><b>NAMA</b></u><br><b>ITEM</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><u><b>JUMLAH</b></u><br><b>QUANTITY</b></td>
              <td style="width:10%; text-align: center; background-color: #999999;"><u><b>HARGA</b></u><br><b>UNIT</b></td>
              <td style="width:15%; text-align: center; background-color: #999999;"><u><b>TOTAL</b></u><br><b>AMOUNT</b></td>
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
          $h = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
          $qty = (int)$item["qty_req"];
          $harga = (int)$item["harga"];
          $no_pr = str_replace($item["no_pr"] . ', ', "", $no_pr);
          $no_pr .= $item["no_pr"] . ', ';

          $total_amount = $qty * $harga;
          $print .= '
            <tr class="tabel-isi">
              <td style="text-align: center;">'. $index .'</td>
              <td style="text-align: left;">'. $h["nama_item"] .'</td>
              <td style="text-align: center;">'. number_format($qty) .' '. $h["satuan"] .'</td>
              <td style="text-align: right;">'. number_format($harga) .'</td>
              <td style="text-align: right;">'. number_format($total_amount) .'</td>
              <td style="height:30px; text-align: center;">'. $item["keterangan"] .'</td>
            </tr>
            ';
          $index++;
      }
      $garis = str_repeat('&nbsp;',30);
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
                  <td style="text-align: left; font-size: 8px;"><b>PPN : '. $d["ppn"] .'%</b></td>
                  <td style="text-align: right;">'. number_format($total_ppn) .'</td>
                  <td style="height:20px; text-align: center;"></td>
                </tr>
                <tr class="tabel-isi">
                  <td style="text-align: left; font-size: 8px;"><b>TOTAL NETTO</b></td>
                  <td style="text-align: right;">'. number_format($total_netto) .'</td>
                  <td style="height:20px; text-align: center;"></td>
                </tr>
            </table>
            <table autosize="1" class="tabel-isi" style="width:100%;">
                <tr class="tabel-isi" style="border-bottom: 0;">
                  <td style="width:55%; text-align: left; vertical-align: top;">Catatan :<br>'. $d["catatan"] .'</td>
                  <td style="width:25%; text-align: center; border-right: 0;">Dibuat oleh,<br><br><br><br><span style="border-top: 1px solid black">'. $d["dibuat_nama"] .' (PURCHASING)</span></td>
                  <td style="height:50px; width:20%; text-align: center; border-left: 0;">Disetujui oleh,<br><br><br><br><span style="border-top: 1px solid black;" rowspan="2">'.$d["disetujui_nama"].'</span></td>
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
                  <td style="text-align: center; vertical-align: bottom; border-right: 0;">Disetujui oleh,<br><br><br><br><span style="border-top: 1px solid black;">'.$garis.'</span></td>
                  <td style="height:20px; text-align: center; border-left: 0;" rowspan="2"></td>
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
      _auth1('PRINT-PR-APPROVE',$user['id']);
      $cid = $routes['3'];
      $status = _post('status');
      
      $today_time = date('d-M-Y - H:i:s');
      $d = ORM::for_table('pr_master')->find_one($cid);
      $tanggal = changeFormat3($d["tgl_pr"]);
      $title = 'PRINT PR';
      $print = '
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
              <td style="width:53%; text-align: center; background-color: #999999;" colspan="6"><u><b>PERBANDINGAN HARGA DARI BEBERAPA SUPPLIER</b></u><br>PRICE COMPARISON</td>
            </tr>
            <tr class="tabel-isi">
              <td style="text-align: center; background-color: #999999;" colspan="2">SUPPLIER 1</td>
              <td style="text-align: center; background-color: #999999;" colspan="2">SUPPLIER 2</td>
              <td style="text-align: center; background-color: #999999;" colspan="2">SUPPLIER 3</td>
            </tr>
            <tr class="tabel-isi"  style="border-top: 0; border-bottom: 0;">
              <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
              <td style="text-align: center; background-color: #999999;">PRICE</td>
              <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
              <td style="text-align: center; background-color: #999999;">PRICE</td>
              <td style="text-align: center; background-color: #999999;">SUPPLIER NAME</td>
              <td style="text-align: center; background-color: #999999;">PRICE</td>
            </tr>
          ';
      $e = ORM::for_table('pr_detail')->where('no_pr', $d['no_pr'])->find_many();
      $index = 1;
      foreach($e as $item) {
          $e = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
          $f = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['kode_supplier1'])->find_one();
          $g = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['kode_supplier2'])->find_one();
          $h = ORM::for_table('daftar_supplier')->where('kode_supplier', $item['kode_supplier3'])->find_one();
          
          $qty = (int)$item["qty_req"];
          $qty_stock = (int)$item["qty_stock"];
          $harga1 = (int)$item["harga1"];
          $harga2 = (int)$item["harga2"];
          $harga3 = (int)$item["harga3"];
          
          $pilihan1 = '';
          $pilihan2 = '';
          $pilihan3 = '';
          
          if($item["supplierpilihan"] == $item['kode_supplier1']) {
              $pilihan1 = '<span style="font-family:helvetica">&#10004;</span>';
          } else if($item["supplierpilihan"] == $item['kode_supplier2']){
              $pilihan2 = '<span style="font-family:helvetica">&#10004;</span>';
          } else if($item["supplierpilihan"] == $item['kode_supplier3']){
              $pilihan3 = '<span style="font-family:helvetica">&#10004;</span>';
          }
          
          $x = ORM::for_table('daftar_kategori')->where('kode_kategori', $item['line'])->find_one();
          if($x) {
            $lines = $x['nama_kategori'];
          } else {
            $lines = 'STOCK';
          }
          $print .= '
            <tr class="tabel-isi">
              <td style="text-align: center; height: 30px;">'. $index .'</td>
              <td style="text-align: left;">'. $e["nama_item"] .'</td>
              <td style="text-align: center;">'. number_format($qty) .' '. $e["satuan"] .'</td>
              <td style="text-align: center;">'. $item["tgl_diperlukan"] .'</td>
              <td style="text-align: center;">'. $qty_stock .'</td>
              <td style="text-align: center;">Untuk '. $lines .'</td>
              <td style="text-align: center;">'. $f["nama_supplier"] . $pilihan1 .'</td>
              <td style="text-align: right;">'. number_format($harga1) . $pilihan1 .'</td>
              <td style="text-align: center;">'. $g["nama_supplier"] . $pilihan2 .'</td>
              <td style="text-align: right;">'. number_format($harga2) . $pilihan2 .'</td>
              <td style="text-align: center;">'. $h["nama_supplier"] . $pilihan3 .'</td>
              <td style="text-align: right;">'. number_format($harga3) . $pilihan3 .'</td>
            </tr>
            ';
          $index++;
      }
      $ppn = $total_harga * 0.11;
      $total_netto = $total_harga + $ppn;
      $garis = str_repeat('&nbsp;',30);
      $print .= '
                <tr class="tabel-isi">
                  <td style="text-align: center; background-color: #999999;" colspan="3"><u><b>BAGIAN PERMINTAAN</b></u><br>REQUEST SECTION</td>
                  <td style="text-align: left; vertical-align: top;" colspan="3" rowspan="2"><u><b>KETERANGAN :</b></u><br>REMARKS</td>
                  <td style="text-align: center; background-color: #999999;" colspan="3"><u><b>BAGIAN PEMBELIAN</b></u><br>PURCHASE SECTION</td>
                  <td style="text-align: left; vertical-align: top;" colspan="3" rowspan="2"><u><b>KETERANGAN :</b></u><br>REMARKS</td>
                </tr>
                <tr class="tabel-isi">
                  <td style="text-align: left; height: 80px; vertical-align: top;" colspan="3">
                      <p>Dibuat Oleh : '. $d["dibuat_nama"] .' / '. $d["dibuat_tgl"] .'</p>
                      <p>Diperiksa Oleh : '. $d["diperiksa_nama"] .' / '. $d["diperiksa_tgl"] .'</p>
                      <p>Diketahui Oleh : '. $d["diketahui_nama"] .' / '. $d["diketahui_tgl"] .'</p>
                      <p>Disetujui Oleh : '. $d["disetujui_nama"] .' / '. $d["disetujui_tgl"] .'</p>
                  </td>
                  <td style="text-align: left; height: 80px; vertical-align: top;" colspan="3">
                      <p>Dibuat Oleh : '. $d["sup_dibuat_nama"] .' / '. $d["sup_dibuat_tgl"] .'</p>
                      <p>Disetujui Oleh : '. $d["sup_disetujui_nama"] .' / '. $d["sup_disetujui_tgl"] .'</p>
                  </td>
                </tr>
            </table>
            ';
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
    $via = ORM::for_table('daftar_via_pengiriman')->where('kode_via',$d['kode_via'])->find_one();
    $kepada = ORM::for_table('sys_users', 'dblogin')->where('username', $d['kepada'])->find_one();
    $po = ORM::for_table('po_master')->where('no_po', $d['no_po'])->find_one();
    $supplier = ORM::for_table('daftar_supplier')->where('kode_supplier', $po['kode_supplier'])->find_one();
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
            <td style="width:20%; text-align: left;" rowspan="3">Kepada Yth.<br>'. $kepada['fullname'].'</td>
            <td style="width:60%; text-align: center;" rowspan="3"><b>SURAT PENGANTAR BARANG INTERN</b><br>(SPBI)</td>
            <td style="width:20%; text-align: left;" colspan="6">No. '. $d["no_spbi"] .'<br>Tanggal: '. $d["tgl_spbi"] .'</td>
          </tr>
        </table>
        <div style="font-size: 11px;">
          Supplier : '. $supplier["nama_supplier"] .'<br>
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
      $itemstock = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
      $pr = ORM::for_table('pr_master')->where('no_pr', $item['no_pr'])->find_one();
      $print .= '
          <tr class="tabel-isi">
            <td style="text-align: center;" height="30px;">'.$i.'</td>
            <td style="text-align: left;" colspan="2">'.$itemstock["nama_item"].'</td>
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
          <tr class="tabel-isi" >
            <td style="text-align: left;font-size: 8px;height: 50px;" colspan="2">'.$via['nama_pengiriman'].'<br> '.$d['no_resi'].'</td>
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
    // X:\uploads\KEBUN\1702023602.png
    $file_path = 'http://192.168.201.180/cmportal/uploads/KEBUN/';
    list($width, $height) = getimagesize($file_path.$d["file_spbi"]);
    $orientation = '';
    if($width > $height){
      $orientation = "Landscape";
      $print .= '
        </div>
        <br> 
        <div style="font-size: 11px;">
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
        <tr class="tabel-isi">
            <td style="text-align: center; colspan:2;"><b>Bukti Pengiriman</b></td>
            <td style=" text-align: center; colspan:2;"></td>
            
        </tr>
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;"><img src="'.$file_path.$d["file_spbi"].'" width="500" height="278"></td>
            <td style=" text-align: center;colspan:2;"></td>
        </tr>
          </table>
        </div>
        
    ';
    }else{
      $orientation = "Portrait";
      $print .= '
        </div>
        <br> 
        <div style="font-size: 11px;">
        <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;"><b>Bukti Pengiriman</b></td>
    
        </tr>
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;"><img src="'.$file_path.$d["file_spbi"].'" width="300" height="400"></td>
            
        </tr>

          </table>
        </div>
        <br><br>
        
    ';
    }   
    
    _mpdf($title, $print);
    break;
  
  case 'print-bpnb':
      _auth1('PRINT-BPNB',$user['id']);
      $cid = $routes['3'];
      $today_time = date('d-M-Y - H:i:s');
      $d = ORM::for_table('spbi_master')->find_one($cid);
      $po = ORM::for_table('po_master')->where('no_po', $d['no_po'])->find_one();
      $supplier = ORM::for_table('daftar_supplier')->where('kode_supplier', $po['kode_supplier'])->find_one();
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
              <td style="width:35%; text-align: left;">Nama Supplier : <u>'. $supplier["nama_supplier"].'</u></td>
              <td style="width:30%; text-align: center;"></td>
              <td style="width:35%; text-align: right;">Tanggal : <u>'. $d["tgl_spbi"] .'</u></td>
            </tr>
          </table>
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
            <tr class="tabel-isi">
              <td style="width:5%; text-align: center;"><b>NO</b></td>
              <td style="width:15%; text-align: center;"><b>TANGGAL PR</b></td>
              <td style="width:15%; text-align: center;"><b>NOMOR PR</b></td>
              <td style="width:40%; text-align: center;"><b>NAMA DAN SPESIFIKASI BARANG</b></td>
              <td style="width:10%; text-align: center;"><b>QTY</b></td>
              <td style="width:15%; text-align: center;"><b>SATUAN</b></td>
            </tr>
          ';
      $i = 1;
      $e = ORM::for_table('spbi_detail')->where('no_spbi', $d['no_spbi'])->find_many();
      foreach($e as $item) {
        $itemstock = ORM::for_table('daftar_itemstock')->where('kode_item', $item['kode_item'])->find_one();
        $pr = ORM::for_table('pr_master')->where('no_pr', $item['no_pr'])->find_one();
        // $d['no_po']
        // $po['tgl_po']
        $print .= '
            <tr class="tabel-isi">
              <td style="text-align: center;" height="30px;">'.$i.'</td>
              <td style="text-align: center;">'.$pr['tgl_pr'].'</td>
              <td style="text-align: center;">'.$item["no_pr"].'</td>
              <td style="text-align: center;">'.$itemstock["nama_item"].'</td>
              <td style="text-align: center;">'. number_format($item["qty"]) .'</td>
              <td style="text-align: center;">'. $itemstock["satuan"] .'</td>
            </tr>
        ';
        $i++;
      }
      $po = ORM::for_table('po_master')->where('no_po', $d['no_po'])->find_one();
      $print .= '
            <tr class="tabel-isi">
              <td style="text-align: left; vertical-align: top;" colspan="4" rowspan="4"><b><u>KETERANGAN</u></b><br>-Barang diterima harus sesuai spesifikasi dan kualitas & kuantitas sesuai permintaan<br>-Packaging diterima harus sesuai dengan packaging yang sebelumnya di approve/tanda tangan<br><br>'. $d["keterangan_bpnb"] .'<br><br><b>'. $d['no_po'] .' | '. $po['tgl_po'] .'</b></td>
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
      $file_path = 'http://192.168.201.180/cmportal/uploads/KEBUN/';
      list($width, $height) = getimagesize($file_path.$d["file_bpnb"]);
      list($width1, $height1) = getimagesize($file_path.$d["file_spbi"]);
      if ($width > $height) {
        $img_bpnb = '<img src="'.$file_path.$d["file_bpnb"].'"  width="500" height="278">';
      } else {
        $img_bpnb = '<img src="'.$file_path.$d["file_bpnb"].'" width="300" height="400">';
      }
      if ($width1 > $height1) {
        $img_spbi = '<img src="'.$file_path.$d["file_spbi"].'" width="500" height="278">';
      } else {
        $img_spbi = '<img src="'.$file_path.$d["file_spbi"].'" width="300" height="400">';
      }

    $orientation = '';
      if ($width < $height && $width1 < $height1) {
        $orientation = "Portrait";
      $print .= '
        </div>
        <br> 
        <div style="font-size: 11px;">
        <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;">Bukti Pengiriman</td>
             <td style=" text-align: center;colspan:2;"><b>Bukti Penerimaan</b></td>
        </tr>
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;"><img src="'.$file_path.$d["file_spbi"].'" width="300" height="400"></td>
             <td style=" text-align: center;colspan:2;"><img src="'.$file_path.$d["file_bpnb"].'" width="300" height="400"></td>
        </tr>

          </table>
        </div>
        <br><br>
        
    ';
      } else {
        $orientation = "Landscape";
      $print .= '
        </div>
        <br> 
        <div style="font-size: 11px;">
          <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
        <tr class="tabel-isi">
            <td style="text-align: center; colspan:2;">Bukti Pengiriman</td>
            <td style=" text-align: center; colspan:2;"></td>
            
        </tr>
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;">'. $img_spbi .'</td>
            <td style=" text-align: center;colspan:2;"></td>
        </tr>
         
        <tr class="tabel-isi">
            <td style="text-align: center; colspan:2;"><b><br> <br>Bukti Penerimaan</b></td>
            <td style=" text-align: center; colspan:2;"></td>
            
        </tr>
        <tr class="tabel-isi">
            <td style="text-align: center;colspan:2;">'. $img_bpnb .'</td>
            <td style=" text-align: center;colspan:2;"></td>
        </tr>
          </table>
        </div>
        ';
      }

    // if($width > $height){
    //   $orientation = "Landscape";
    //   $print .= '
    //     </div>
    //     <br> 
    //     <div style="font-size: 11px;">
    //       <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
    //     <tr class="tabel-isi">
    //         <td style="text-align: center; colspan:2;">Bukti Pengiriman</td>
    //         <td style=" text-align: center; colspan:2;"></td>
            
    //     </tr>
    //     <tr class="tabel-isi">
    //         <td style="text-align: center;colspan:2;"><img src="'.$file_path.$d["file_spbi"].'" width="498" height="278"></td>
    //         <td style=" text-align: center;colspan:2;"></td>
    //     </tr>
         
    //     <tr class="tabel-isi">
    //         <td style="text-align: center; colspan:2;"><b><br> <br>Bukti Penerimaan</b></td>
    //         <td style=" text-align: center; colspan:2;"></td>
            
    //     </tr>
    //     <tr class="tabel-isi">
    //         <td style="text-align: center;colspan:2;"><img src="'.$file_path.$d["file_bpnb"].'"  width="500" height="278"></td>
    //         <td style=" text-align: center;colspan:2;"></td>
    //     </tr>
    //       </table>
    //     </div>
        
    // ';
    // }else{
    //   $orientation = "Portrait";
    //   $print .= '
    //     </div>
    //     <br> 
    //     <div style="font-size: 11px;">
    //     <table autosize="1" class="tabel-isi" style="width:100%; margin-bottom:3px;">
    //     <tr class="tabel-isi">
    //         <td style="text-align: center;colspan:2;">Bukti Pengiriman</td>
    //          <td style=" text-align: center;colspan:2;"><b>Bukti Penerimaan</b></td>
    //     </tr>
    //     <tr class="tabel-isi">
    //         <td style="text-align: center;colspan:2;"><img src="'.$file_path.$d["file_spbi"].'" width="300" height="400"></td>
    //          <td style=" text-align: center;colspan:2;"><img src="'.$file_path.$d["file_bpnb"].'" width="300" height="400"></td>
    //     </tr>

    //       </table>
    //     </div>
    //     <br><br>
        
    // ';
    // }   
      _mpdf($title, $print);
      break;   
      
  default:
      echo 'action not defined';
}