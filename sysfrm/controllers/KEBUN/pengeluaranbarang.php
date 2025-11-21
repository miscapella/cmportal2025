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
    $myCtrl = 'Pengeluaran Barang';
}
_auth();
$ui->assign('_sysfrm_menu', 'Logistic');
$ui->assign('_title', 'Logistic - '. $config['CompanyName']);
$ui->assign('_st', 'Logistic');
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
    case 'reject-post':                
        $no_ur = $_POST['_id'];
        $pesan = $_POST['pesan'];
        $e = ORM::for_table('mintabarang_master')->where("id",$no_ur)->find_one();

        if ($e){
            ORM::get_db()->beginTransaction();
        
            try {
                $f = ORM::for_table('mintabarang_detail')->where("id",$no_ur)->find_many();
                foreach ($data as $row)  {
                    $f['qty_logistic_reject']=$item['qty_req']-$item['qty_dipenuhi']-$item['qty_dipenuhi_cabang'];
                    $f['status']='DIBATALKAN LOGISTIK';
                    $f->save();
                }

                $e['alasan_logistic_reject']=$pesan;
                $e['status']='DIBATALKAN LOGISTIK';
                $e->save();

                ORM::get_db()->commit();

                $msg = array(
                    'msg'			=>  'No penerimaan barang '.$no_ur.' telah berhasil dibatalkan',
                    'dataval'		=>	1);
                echo json_encode($msg);

            }
        
            catch(PDOException $ex) {        
                ORM::get_db()->rollBack();				
                echo "Error: " . $ex->getMessage();}            

        }
        

        break;




    case 'batal':		
		Event::trigger('pengeluaranbarang/batal/');		
		_auth1('UR-Log-Reject',$user['id']);		
		$id = $routes['3'];		
		$id = str_replace('uid','',$id);		
		$e = ORM::for_table('mintabarang_master')->where("id",$id)->find_one();
		$d = ORM::for_table('mintabarang_detail')
			->table_alias("a")
			->select_many("a.keperluan", "a.bagian", "a.kode_item", "a.qty_req","a.qty_dipenuhi","qty_dipenuhi_cabang","qty_logistic_reject","a.tgl_diperlukan", "a.keterangan")
			->left_outer_join("daftar_itemstock", array("a.kode_item", "=", "b.kode_item"), "b")
			->select("b.nama_item")
			->left_outer_join("daftar_kategori", array("a.bagian","=","c.kode_kategori"),"c")
			->select("c.nama_kategori")
			->where("a.no_mintabarang",$e->no_mintabarang)
			->find_many();
			$clist="";
		$nomor=1;	
		foreach ($d as $item) {
            $qty_reject=$item['qty_req'] - ($item["qty_dipenuhi"] + $item['qty_dipenuhi_cabang']);
			$tgl_diperlukan=date("d-m-Y", strtotime($item->tgl_diperlukan));
			$clist.="<tr><td>$nomor</td>";
			$clist.="<td>$item->keperluan</td>";
			$clist.="<td>$item->nama_kategori</td>";
			$clist.="<td>$item->nama_item</td>";
			$clist.="<td>$qty_reject</td>";
			$clist.="<td>$tgl_diperlukan</td>";
			$clist.="<td>$item->keterangan</td></tr>";
			$nomor+=1;
		};

		$ui->assign('id',$id);
        $ui->assign('es',$e);
		$ui->assign('ds',$d);
        $ui->assign('clist',$clist);
		$ui->assign('_sysfrm_menu1', 'List UR Approved'); 		
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'logistic-reject','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'logistic-batal.tpl');

	
		break;

    case 'detail-mb':		
		Event::trigger('pengeluaranbarang/detail-mb/');		
		_auth1('UR-DETAIL',$user['id']);		
		$event_mr="keluarbarang";
		$id=$routes['3'];		
		$id = str_replace('uid','',$id);		
		$e = ORM::for_table('mintabarang_master')->where("id",$id)->find_one();
		$d = ORM::for_table('mintabarang_detail')
			->table_alias("a")
			->select_many("a.keperluan", "a.bagian", "a.kode_item", "a.qty_req", "a.tgl_diperlukan", "a.keterangan")
			->left_outer_join("daftar_itemstock", array("a.kode_item", "=", "b.kode_item"), "b")
			->select("b.nama_item")
			->left_outer_join("daftar_kategori", array("a.bagian","=","c.kode_kategori"),"c")
			->select("c.nama_kategori")
			->where("a.no_mintabarang",$e->no_mintabarang)
			->find_many();
			$clist="";
		$nomor=1;	
		foreach ($d as $item) {
			$tgl_diperlukan=date("d-m-Y", strtotime($item->tgl_diperlukan));
			$clist.="<tr><td>$nomor</td>";
			$clist.="<td>$item->keperluan</td>";
			$clist.="<td>$item->nama_kategori</td>";
			$clist.="<td>$item->nama_item</td>";
			$clist.="<td>$item->qty_req</td>";
			$clist.="<td>$tgl_diperlukan</td>";
			$clist.="<td>$item->keterangan</td></tr>";
			$nomor+=1;
		};

		$ui->assign('clist_detail',$clist);
		$ui->assign('event_mrs',$event_mr);
		$ui->assign('es',$e);
		$ui->assign('ds',$d);
		$ui->assign('_sysfrm_menu1', 'List UR Approved'); 
		$ui->display($spath.'add-mintabarang.tpl');
	
		break;

    case 'detail-kb':
        _auth1('KB-DETAIL',$user['id']);		
		$event_kb="detail";
        $no_keluarbarang='';		
		$id=$routes['3'];		
		$id = str_replace('uid','',$id);
        $d = ORM::for_table('keluarbarang_master')->find_one($cid);
        if ($d) $no_keluarbarang=$d['no_keluarbarang'];
        $e = ORM::for_table('keluarbarang_detail')
             ->table_alias('a')
             ->select('a.*')
             ->select('nama_item')             
             ->join('daftar_itemstock',array('a.kode_item','=','b.kode_item'),'b')
             ->where('no_keluarbarang',$d['no_keluarbarang'])->find_many();
        $nomor=1;
        foreach ($e as $item) {            
            $clist.="<tr><td>$nomor</td>";
            $clist.="<td>".$item['kode_item']."</td>";
            $clist.="<td>".$item['nama_item']."</td>";
            $clist.="<td>".$item['qty']."</td>";
            $clist.="<td>".$item['no_mintabarang']."</td>";
            $nomor++;
        }


        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-keluarbarang','dp/dist/datepicker.min','btn-top/btn-top','numeric')));        
        $ui->assign('clist_detail',$clist);
        $ui->assign('event_kbs', $event_kb);
        $ui->assign('es',$d);
        $ui->display($spath.'add-keluarbarang.tpl');

    
        break;

    case 'simpan':
        _auth1('add-ur',$user['id']);        
		Event::trigger('pengeluaranbarang/simpan/'); 

        $data = json_decode($_POST['data'], true);

        $pesan="";

        foreach ($data as $row) {
            if($row['qty'] == '')	$pesan = $pesan .$row['kode_item']. ' belum diisi Qty dipenuhi<br>';
            if($row['qty'] == 0)	$pesan = $pesan .$row['kode_item']. ' qty dipenuhi harus lebih besar dari  nol<br>';
            if($row['qty_on_hand']<$row['qty_req']) {
                if($row['qty_on_hand']<$row['qty']) $pesan = $pesan .$row['kode_item']. ' qty dipenuhi harus lebih kecil atau sama dengan '.$row["qty_on_hand"].'<br>';
            }
            else {   
                if($row['qty_req']<$row['qty']) $pesan = $pesan .$row['kode_item']. ' qty dipenuhi harus lebih kecil atau sama dengan '.$row["qty_req"].'<br>';
            };
                
        }

        if ($pesan<>""){
            $msg = array(
				'msg'			=>  $pesan,
				'dataval'		=>	'a');
				echo json_encode($msg);
        }

        else
        {
        ORM::get_db()->beginTransaction();

        try {
            $bl=date('n');
			$th=date('Y');
			$chk = ORM::for_table('keluarbarang_master')->raw_query('select * from keluarbarang_master where month(tanggal)='.$bl.' and year(tanggal)='.$th.' order by no_keluarbarang desc')->find_one();
			if($chk) {
				$no = ++$chk['no_keluarbarang'];
			} else {
				$no = 'KB/'.$th.'/'.date('m').'/0001';
			};

            $e = ORM::for_table('keluarbarang_master')->create();
            $e['no_keluarbarang']=$no;
            $e['tanggal']=date('Y-m-d');
            $e['dibuat_oleh']=$user['id'];
            $e['dibuat_nama']=$user['username'];
            $e['dibuat_tgl']=date('Y-m-d');
            $e->save();

            $no_mintabarang='';
            $no_mintabarang1=array();

            foreach ($data as $row) {                
                $kode_item=$row['kode_item'];
                $dpp=0;
                $hpp=0;
                $qty_awal=0;
                
                if ($no_mintabarang!=$row['no_mintabarang']) {
                    $no_mintabarang=$row['no_mintabarang'];
                    $no_mintabarang1[]=$row['no_mintabarang'];
                };              
                
                $kartu = ORM::for_table('kartustock')->where('kode_item',$kode_item)->order_by_desc('id')->find_one();
                if($kartu){
                    $dpp=$kartu['avg_dpp'];
                    $hpp=$kartu['avg_hpp'];
                    $qty_awal=$kartu['qty_sisa'];
                };

                $kartu = ORM::for_table('kartustock')->create();
                $kartu['no_tran']=$no;
                $kartu['kode_item']=$kode_item;
                $kartu['qty_awal']=$qty_awal;
                $kartu['qty_in']=0;
                $kartu['qty_out']=$row['qty'];
                $kartu['qty_sisa']=$qty_awal-$row['qty'];
                $kartu['hpp']=$hpp;
                $kartu['dpp']=$dpp;
                $kartu['avg_dpp']=$dpp;
                $kartu['avg_hpp']=$hpp;
                $kartu['no_referensi']='';
                $kartu['jenis_tran']='Keluar Barang';
                $kartu['keterangan']='';
                $kartu->save();

                $d = ORM::for_table('keluarbarang_detail')->create();
                $d['no_keluarbarang']=$no;
                $d['kode_item']=$kode_item;
                $d['qty']=$row['qty'];
                $d['dpp']=$dpp;
                $d['hpp']=$hpp;
                $d['no_mintabarang']=$row['no_mintabarang'];
                $d->save();

                $d = ORM::for_table('mintabarang_detail')->where('no_mintabarang',$row['no_mintabarang'])->where('kode_item',$kode_item)->find_one();
                if ($d) {
                        if ($d['qty_req'] == $d['qty_dipenuhi'] + $row['qty']) {
                            $d['status'] = 'SELESAI';
                        }
                        $d['qty_dipenuhi'] = $d['qty_dipenuhi'] + $row['qty'];
                        $d->save();
                    }
                
                $d = ORM::for_table('daftar_itemstock')->where('kode_item',$kode_item)->find_one();
                if ($d) {                    
                    $d['qty_on_hand']=$d['qty_on_hand']-$row['qty'];
                    $d->save();                    
                };
            }
            
            foreach ($no_mintabarang1 as $dataminta){                
                $d = ORM::for_table('mintabarang_detail')->where('no_mintabarang',$dataminta)->where_not_equal('status','SELESAI')->find_one();
                if (!$d){                                
                    $e = ORM::for_table('mintabarang_master')->where('no_mintabarang',$dataminta)->find_one();
                    $e['status']='SELESAI';
                    $e->save();
                }
            }

            ORM::get_db()->commit();
            $msg = array(
				'msg'			=>  'No pengeluaran barang '.$no.' telah berhasil disimpan',
				'dataval'		=>	1);
				echo json_encode($msg);
            }

        catch(PDOException $ex) {
				ORM::get_db()->rollBack();				
				echo "Error: " . $ex->getMessage();}            
        break;

        }


    case 'add-ur':
        _auth1('add-ur',$user['id']);        
		Event::trigger('pengeluaranbarang/add-ur/'); 
        $nomor_ur = _post('nomor_ur');
        $clist_item="";
        
        if($nomor_ur<>"") {
            $p = ORM::for_table('mintabarang_master')
                ->table_alias('a')
                ->inner_join('mintabarang_detail',array('a.no_mintabarang','=','b.no_mintabarang'),'b')
                ->inner_join('daftar_itemstock',array('b.kode_item','=','c.kode_item'),'c')
                ->select_many('a.no_mintabarang','b.kode_item','nama_item','qty_req','qty_dipenuhi','qty_dipenuhi_cabang','qty_on_hand')
                ->where('b.no_mintabarang',$nomor_ur)
                ->where_raw('(qty_req-qty_dipenuhi-qty_dipenuhi_cabang) > ?',array(0))
                ->find_many();
            
            
            if ($p){                
                foreach ($p as $item) {
                    $qtyreq=$item['qty_req']-$item['qty_dipenuhi']-$item['qty_dipenuhi_cabang'];
                    $clist_item .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
                    $clist_item .= '<td style="display:none"><label class="control-label">'.$item->kode_item.'</label></td>';
                    $clist_item .= '<td><label class="control-label">'.$item->nama_item.'</label></td>';
                    $clist_item .= '<td><label class="control-label">'.$qtyreq.'</label></td>';
                    $clist_item .= '<td><label class="control-label">'.$item->qty_on_hand.'</label></td>';
                    $clist_item .= '<td><input type="text" class="qty" value="0"></td>';
                    $clist_item .= '<td><label class="control-label">'.$item->no_mintabarang.'</label></td></tr>';                
                };
                echo($clist_item);
            }

            else {
                echo "tdk ada di database no: ".$nomor_ur;            }
            }                  
                           
        break;

    case 'add-keluarbarang':        
        _auth1('add-keluarbarang',$user['id']);        
		Event::trigger('pengeluaranbarang/add-keluarbarang/');       
        $clist = '<option value="">Pilih Nomor UR</option>';
        $r = ORM::for_table('mintabarang_master')->where('status', 'APPROVED')->order_by_desc('no_mintabarang')->find_many();        
        foreach ($r as $y)
        {
            $clist .= '<option value="'.$y->no_mintabarang.'">'.$y->no_mintabarang.'</option>';
        }
        $clist_item="";

        $ui->assign('clist', $clist);
        $ui->assign('clist_item', $clist_item);         		
        $ui->assign('_sysfrm_menu1', 'Keluar Barang');        
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-keluarbarang','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
 		$ui->display($spath.'add-keluarbarang.tpl');        
        break;

    case 'list-ur-approved':
		_auth1('LR-LIST',$user['id']);
		Event::trigger('pengeluaranbarang/list-ur-approved/');
		$ui->assign('_sysfrm_menu1', 'List UR Approved');        
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-ur-approved','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
 		$ui->display($spath.'list-ur-approved.tpl');
        break;

    case 'list-keluarbarang':
        _auth1('list-keluarbarang',$user['id']);
		Event::trigger('pengeluaranbarang/list-keluarbarang/');
		$ui->assign('_sysfrm_menu1', 'Keluar Barang');        
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-keluarbarang','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
 		$ui->display($spath.'list-keluarbarang.tpl');        
        break;





   default:
        echo 'action not defined';
}