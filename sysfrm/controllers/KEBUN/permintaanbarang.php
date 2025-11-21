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
    $myCtrl = 'Permintaan Barang';
}
_auth();

$ui->assign('_title', 'User Request - '. $config['CompanyName']);
$ui->assign('_st', 'User Request');
$ui->assign('ncomp',$_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);
$spath = 'prog/'.$_SESSION['menu'].'/';

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');

function filterdept($user_dept) {
	$sysusers = ORM::for_table('sys_users', 'dblogin')->select('id')->where('kode_dept', $user_dept)->find_many();
	$array = array();
	foreach ($sysusers as $usersss) {
		array_push($array, $usersss->id);
	}
	return $array;
}


switch ($action) {
	case 'detail-ur-reject':
		Event::trigger('permintaanbarang/detail-ur-reject/');
		_auth1('UR-APRV1',$user['id']);
		$idphp=_post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		if ($d)
		{
			$nomor=$d->no_mintabarang;
			$d->status='REJECT';
			$d->ditolak_oleh=$user['id'];
			$d->ditolak_nama=$user['username'];
			$d->ditolak_tgl=date('Y-m-d');
			$d->save();
			ORM::get_db()->commit();
		
			$data = array(
				'msg'			=>  'Berhasil Reject No. '.$nomor,
				'dataval'		=>	1);
				echo json_encode($data);
		}
		else
		{
			$data = array(
					'msg'			=>  'tdk ada data '.$idphp,
					'dataval'		=>	1);
			echo json_encode($data);			
		}
	break;

	case 'detail-ur-aprv1':
		Event::trigger('permintaanbarang/detail-ur-aprv1/');
		_auth1('UR-APRV1',$user['id']);
		$idphp=_post('idphp');
		ORM::get_db()->beginTransaction();
		$d = ORM::for_table('mintabarang_master')->where('id', $idphp)->find_one();
		$x = ORM::for_table('sys_users', 'dblogin')->find_one($uid);
		if ($d)
		{
			$nomor=$d->no_mintabarang;
			$d->status='APPROVED';
			$d->disetujui_oleh=$user['id'];
			$d->disetujui_nama=$user['username'];
			$d->disetujui_tgl=date('Y-m-d');
			$d->save();
			ORM::get_db()->commit();

			$data = array(
				'msg'			=>  'Berhasil Approve No. '.$nomor,
				'dataval'		=>	1);
				echo json_encode($data);
		}
		else
		{
			$data = array(
					'msg'			=>  'tdk ada data '.$idphp,
					'dataval'		=>	1);
			echo json_encode($data);
		}
	break;




	case 'list-ur-aprv':
		Event::trigger('permintaanbarang/list-ur-aprv/');
		_auth1('UR-APRV',$user['id']);
		$msg = $routes['3'];
		$array = filterdept($user['kode_dept']);
		$d = ORM::for_table('mintabarang_master')->where('status', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		$e = ORM::for_table('mintabarang_master')->where('status', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->find_many();
		$cd = ORM::for_table('mintabarang_master')->where('status', 'PENDING')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		$ce = ORM::for_table('mintabarang_master')->where('status', 'REVISI')->where_in('dibuat_oleh', $array)->order_by_desc('no_mintabarang')->count();
		$ui->assign('d',$d);
		$ui->assign('e',$e);
		$ui->assign('cd',$cd);
		$ui->assign('ce',$ce);
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu2', 'user-request-approve');
		$ui->assign('xfooter');
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-ur-aprv.tpl');
		break;

	case 'detail-ur-aprv':
	Event::trigger('permintaanbarang/detail-ur-aprv/');
	_auth1('UR-DETAIL-APRV',$user['id']);
	$cid = $routes['3'];
	$d = ORM::for_table('mintabarang_master')->find_one($cid);
	if($d){
		$ui->assign('d',$d);
		$ui->assign('cid',$cid);
		$e = ORM::for_table('mintabarang_detail')->where('no_mintabarang',$d['no_mintabarang'])->find_many();
		$tg1 = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
		$tg3 = ORM::for_table('daftar_supplier')->where('active','Y')->find_many();
		$idate = date('d-m-Y', strtotime($d['tanggal']));
		$idates = date('d-m-Y', strtotime($n['tanggal']));
		$ui->assign('e',$e);
		$ui->assign('tg1',$tg1);
		$ui->assign('tg3',$tg3);
		$ui->assign('idate',$idate);
		$ui->assign('idates',$idates);
		$ui->assign('_sysfrm_menu2', 'user-request-approve');
		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
		$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'detail-ur-aprv','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
		$ui->display($spath.'detail-ur-aprv.tpl');
	} else r2(U.'permintaanbarang/list-ur-aprv', 'e', 'User request tersebut tidak ditemukan');
	break;

	case 'edit-mintabarang-post':
		Event::trigger('permintaanbarang/edit-mintabarang-post/');
		$keperluan = explode(',', _post('keperluan'));
		$item = explode(',', _post('item'));
		$bagian = explode(',', _post('bagian'));
		$main = explode(',', _post('main'));
		$sub = explode(',', _post('sub'));
		$line = explode(',', _post('line'));
		$qty = explode(',', _post('qty'));
		$diperlukan = explode(',', _post('diperlukan'));
		$keterangan = explode(',', _post('keterangan'));
		$id=_post('idjs');
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
		$msg_diperlukan = '';
		$i = 0;
		$ii = 0;
		foreach($keperluan as $code) {
			if($item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($diperlukan[$i] == '')	$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
			if($qty[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
			if($code <> '') $ii++;
			$i++;
		}
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
			if($msg_diperlukan <> '')
				$msg .= $msg_diperlukan.'<br>';
		} else $msg .= 'Belum ada data Request<br>';
		sort($item);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($item as $code) {
			if($cek == $code) {
				$flag = true;
				break;
			} else
				$flag = false;
				$cek = $code;
			}
		if($flag)
			$msg .= 'Ada Item Stock double<br>';
		
		
		$e = ORM::for_table('mintabarang_master')->where("id",$id)->find_one();
		$no_mintabarang=$e->no_mintabarang;
		$tgl=date("d-m-Y", strtotime($e->tanggal));
		$unitkerja=$e->unit_kerja;
		$nomor=$e->nomor;

		if($msg == ''){
			ORM::get_db()->beginTransaction();
			try {
				$d=orm::for_table('mintabarang_detail')->where_equal('no_mintabarang',$no_mintabarang)->delete_many();
											
				
				$i = 0;
				$isi = '';
				foreach($keperluan as $code) {
					$sitem = $item[$i];
					$sqty = str_replace(".", "", $qty[$i]);
					$sketerangan = $keterangan[$i];
					$sdiperlukan = $diperlukan[$i];
					$sbagian = $bagian[$i];
					$smain = $main[$i];
					$ssub = $sub[$i];
					$sline = $line[$i];
						
					$y = ORM::for_table('mintabarang_detail')->create();
					$y->no_mintabarang = $no_mintabarang;
					$y->kode_item = $sitem;
					$y->qty_req = $sqty;
					$y->status = 'PENDING';
					if(Validator::Date1($sdiperlukan) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
					else
						$y->tgl_diperlukan = null;
					$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
					$y->keterangan = $sketerangan;
					$y->bagian = $sbagian;
					$y->main = $smain;
					$y->sub = $ssub;
					$y->line = $sline;
					$y->save();
					$i++;
	
						$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
						$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
						$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
						$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
						$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
						$isi .= "<b>PERMINTAAN BARANG #". $i ."</b> <br>
								Keperluan : ". $code ." <br>";
						if($code == 'STOCK'){
							$isi .= "Bagian : STOCK <br>";
						} else {
							$isi .= "Bagian : ". $bagians['nama_kategori'] ." | ". $mains['nama_kategori'] ." > ". $subs['nama_kategori'] ." > ". $lines['nama_kategori'] ." <br>";
						}
						$isi .= "
								Item : ". $r['nama_item'] ." <br>
								Qty Request : ". number_format($sqty, 0, '', '.') ." <br>
								Tanggal Diperlukan : ". date('d-m-Y', strtotime($sdiperlukan)) ." <br>
								Keterangan : ". $sketerangan ." <br><br>
						";
					}
					$cid = $id;
					ORM::get_db()->commit();

					_log1('Edit Data UR : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);
	
					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval UR')->find_one();
					$to = ['capella.zoom@gmail.com'];
					$g = ORM::for_table('daftar_department','dblogin')->where('kode_dept', $user['kode_dept'])->find_many();
					if($g) $to = [];

					foreach($g as $gs) {
						$to = array_merge($to, explode('|', $gs['atasan']));
					}
					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('business_name', $config['CompanyName']);
					$message->set('isi', $isi);
					$message->set('no_ur', $no_mintabarang);
					$message->set('tgl_ur', $tgl);
					$message->set('unit_kerja', $unitkerja);
					$message->set('nomor', $nomor);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message_o = $message->output();
					
					foreach($to as $item){						
						Notify_Email::_send($item,$item,$subj,$message_o);
					}
									
					Event::trigger('permintaanbarang/edit-mintabarang-post/_on_finished');
					$data = array(
							'msg'			=>  'Berhasil Update. No. UR : '.$no_mintabarang,
							'dataval'		=>	1);
					echo json_encode($data);
										
				}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
		}
		else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
		}
		
		break;

	case 'edit-mb':
		Event::trigger('permintaanbarang/edit-mb/');		
		_auth1('UR-DETAIL',$user['id']);		
		$event_mr="edit";				
		$id=$routes['3'];		
		$id = str_replace('uid','',$id);		
		$e = ORM::for_table('mintabarang_master')->where("id",$id)->find_one();
		if ($e->status<>"PENDING") {
			r2(U.'permintaanbarang/list-mintabarang', 'e', 'Permintaan barang yang bisa diedit hanya status PENDING');
		}

		$d = ORM::for_table('mintabarang_detail')
			->table_alias("a")
			->select_many("a.keperluan", "a.bagian", "a.main", "a.sub", "a.line","a.kode_item", "a.qty_req", "a.tgl_diperlukan", "a.keterangan")
			->left_outer_join("daftar_itemstock", array("a.kode_item", "=", "b.kode_item"), "b")
			->select("b.nama_item")
			->left_outer_join("daftar_kategori", array("a.bagian","=","c.kode_kategori"),"c")
			->select("c.nama_kategori")
			->where("a.no_mintabarang",$e->no_mintabarang)
			->find_many();
		$clist="";	
		
		foreach ($d as $item) {
			$tgl_diperlukan=date("d-m-Y", strtotime($item->tgl_diperlukan));
			$clist .= '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
			$clist .= '<td><input type="text" name="keperluan[]" class="keperluan" value="'.$item->keperluan.'" readonly></td>';
			$clist .= '<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="'. $item->bagian.'"></td>';
			$clist .= '<td style="display:none;"><input type="text" name="main[]" class="main" value="'.$item->main.'"></td>';
			$clist .= '<td style="display:none;"><input type="text" name="sub[]" class="sub" value="'.$item->sub.'"></td>';
			$clist .= '<td style="display:none;"><input type="text" name="line[]" class="line" value="'.$item->line.'"></td>';
			$clist .= '<td><a href="#" class="detail-bagian" value="'.$item->nama_kategori.'">'.$item->nama_kategori.'</a></td>';
			$clist .= '<td style="display:none;"><input type="text" name="item[]" class="item" value="'.$item->kode_item.'" readonly></td>';
			$clist .= '<td><a href="#" class="detail-itemstock" value="'.$item->kode_item.'">'.$item->nama_item.'</a></td>';
			$clist .= '<td><input type="text" name="qty[]" class="qty amount" value='.$item->qty_req.'></td>';			
			$clist .= '<td><input type="text" name="diperlukan[]" class="diperlukan tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="'.$tgl_diperlukan.'"></td>';
			$clist .= '<td><input type="text" name="keterangan[]" class="keterangan" value="'.$item->keterangan.'"></td>';
		}

		$clist_opt = '';
		$clist_opt = '<option value="">Pilih Inventaris</option>';
		$clist_opt .= '<option value="STOCK">STOCK</option>';
		$clist_opt .= '<option value="DIRECT">DIRECT</option>';
		
		$ui->assign('id',$id);
		$ui->assign('clist',$clist_opt);
		$ui->assign('clist_edit',$clist);
		$ui->assign('event_mrs',$event_mr);
		$ui->assign('es',$e);
		$ui->assign('ds',$d);
		$ui->assign('_sysfrm_menu1', 'List UR'); 

		$ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-mintabarang','dp/dist/datepicker.min','btn-top/btn-top','numeric')));

		$ui->display($spath.'add-mintabarang.tpl');

		break;




	case 'detail-mb':		
		Event::trigger('permintaanbarang/detail-mb/');		
		_auth1('UR-DETAIL',$user['id']);		
		$event_mr="detail";		
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
		$ui->assign('_sysfrm_menu1', 'List UR'); 
		$ui->display($spath.'add-mintabarang.tpl');
	
		break;

	
	case 'list-mintabarang':
		_auth1('UR-LIST',$user['id']);
		Event::trigger('permintaanbarang/list-mintabarang/');
		$ui->assign('_sysfrm_menu1', 'List UR');        
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-mintabarang','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
 		$ui->display($spath.'List-mintabarang.tpl');
        break;

	case 'list-mintabarang-pending':
		Event::trigger('permintaanbarang/list-mintabarang-pending/');
		_auth1('UR-LIST-PENDING',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu1', 'UR Pending');
		$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-mintabarang-pending.tpl');
		break;

	case 'list-mintabarang-approved':
		Event::trigger('permintaanbarang/list-mintabarang-approved/');
		_auth1('UR-LIST-APPROVED',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu1', 'List UR');
		$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-mintabarang-approved.tpl');
		break;

	case 'list-mintabarang-rejected':
		Event::trigger('permintaanbarang/list-mintabarang-rejected/');
		_auth1('UR-LIST-REJECTED',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
		$ui->assign('_sysfrm_menu1', 'List UR');
		$ui->assign('xfooter', Asset::js(array($spath.'list-mintabarang')));
		$ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
		$ui->display($spath.'list-mintabarang-rejected.tpl');
		break;
    

    case 'add-mintabarang':
		$event_mr="tambah";
        Event::trigger('permintaanbarang/add-mintabarang/');

		_auth1('UR-ADD',$user['id']);

		$clist = '';
		$clist = '<option value="">Pilih Inventaris</option>';
		$clist .= '<option value="STOCK">STOCK</option>';
		$clist .= '<option value="DIRECT">DIRECT</option>';
		
		$idate = date('d-m-Y');
		$ui->assign('event_mrs',$event_mr);
		$ui->assign('clist',$clist);
		$ui->assign('idate',$idate);
        $ui->assign('_sysfrm_menu1', 'List UR');        
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-mintabarang','dp/dist/datepicker.min','btn-top/btn-top','numeric')));

        $ui->display($spath.'add-mintabarang.tpl');
        break;

	                
	case 'add-mintabarang-post':		
		Event::trigger('permintaanbarang/add-mintabarang-post/');
		$keperluan = explode(',', _post('keperluan'));
		$item = explode(',', _post('item'));
		$bagian = explode(',', _post('bagian'));
		$main = explode(',', _post('main'));
		$sub = explode(',', _post('sub'));
		$line = explode(',', _post('line'));
		$qty = explode(',', _post('qty'));
		$diperlukan = explode(',', _post('diperlukan'));
		$keterangan = explode(',', _post('keterangan'));
		$unitkerja = _post('unitkerja');
		$nomor = _post('nomor');
		$msg = '';
		$msg_item = '';
		$msg_qty = '';
		$msg_diperlukan = '';
		$i = 0;
		$ii = 0;
		foreach($keperluan as $code) {
			if($item[$i] == '')	$msg_item = 'Ada detail yang belum memilih Item Stock';
			if($diperlukan[$i] == '')	$msg_diperlukan = 'Ada detail yang belum memilih Tanggal Diperlukan';
			if($qty[$i] == 0)	$msg_qty = 'Ada detail yang belum mengisi Qty Req';
			if($code <> '') $ii++;
			$i++;
		}
		if($ii > 0) {
			if($msg_item <> '')
				$msg .= $msg_item.'<br>';
			if($msg_qty <> '')
				$msg .= $msg_qty.'<br>';
			if($msg_diperlukan <> '')
				$msg .= $msg_diperlukan.'<br>';
		} else $msg .= 'Belum ada data Request<br>';
		sort($item);
		$cek = '';
		$flag = false;
		$error = '';
		foreach($item as $code) {
			if($cek == $code) {
				$flag = true;
				break;
			} else
				$flag = false;
				$cek = $code;
			}
		if($flag)
			$msg .= 'Ada Item Stock double<br>';
			
		if($unitkerja == '') $msg .= 'Data Unit Kerja Wajib Diisi<br>';
		if($nomor == '') $msg .= 'Nomor Wajib Diisi<br>';
		if($msg == ''){
			ORM::get_db()->beginTransaction();
			try {
				$tgl = Validator::Date1(_post('tgl'));
				$bl=date('n',strtotime($tgl));
				$th=date('Y', strtotime($tgl));
				$chk = ORM::for_table('mintabarang_master')->raw_query('select * from mintabarang_master where month(tanggal)='.$bl.' and year(tanggal)='.$th.' order by no_mintabarang desc')->find_one();
				if($chk) {
					$no = ++$chk['no_mintabarang'];
				} else {
					$no = 'UR/'.$th.'/'.date('m',strtotime($tgl)).'/0001';
				}
				$d = ORM::for_table('mintabarang_master')->create();
				$d->no_mintabarang = $no;
				$d->unit_kerja=$unitkerja;
				$d->nomor = $nomor;
				$d->tanggal = $tgl;
				$d->dibuat_oleh = $user['id'];
				$d->dibuat_nama = $user['fullname'];
				$d->dibuat_tgl = date('Y-m-d H:i:s');				
				$d->status = 'PENDING';
				$d->save();
					
				$i = 0;
				$isi = '';
				foreach($keperluan as $code) {
					$sitem = $item[$i];
					$sqty = str_replace(".", "", $qty[$i]);
					$sketerangan = $keterangan[$i];
					$sdiperlukan = $diperlukan[$i];
					$sbagian = $bagian[$i];
					$smain = $main[$i];
					$ssub = $sub[$i];
					$sline = $line[$i];

					$y = ORM::for_table('mintabarang_detail')->create();
					$y->no_mintabarang = $no;
					$y->kode_item = $sitem;
					$y->qty_req = $sqty;
					$y->status = 'PENDING';
					if(Validator::Date1($sdiperlukan) <> 'Salah')
						$y->tgl_diperlukan = date('Y-m-d', strtotime($sdiperlukan));
					else
						$y->tgl_diperlukan = null;
						$y->keperluan = ($code == 'STOCK' ? 'STOCK' : $code);
						$y->keterangan = $sketerangan;
						$y->bagian = $sbagian;
						$y->main = $smain;
						$y->sub = $ssub;
						$y->line = $sline;
						$y->save();
						$i++;
	
						$r = ORM::for_table('daftar_itemstock')->where('kode_item', $sitem)->find_one();
						$bagians = ORM::for_table('daftar_kategori')->where('kode_kategori', $sbagian)->find_one();
						$mains = ORM::for_table('daftar_kategori')->where('kode_kategori', $smain)->find_one();
						$subs = ORM::for_table('daftar_kategori')->where('kode_kategori', $ssub)->find_one();
						$lines = ORM::for_table('daftar_kategori')->where('kode_kategori', $sline)->find_one();
						$isi .= "<b>PERMINTAAN BARANG #". $i ."</b> <br>
								Keperluan : ". $code ." <br>";
						if($code == 'STOCK'){
							$isi .= "Bagian : STOCK <br>";
						} else {
							$isi .= "Bagian : ". $bagians['nama_kategori'] ." | ". $mains['nama_kategori'] ." > ". $subs['nama_kategori'] ." > ". $lines['nama_kategori'] ." <br>";
						}
						$isi .= "
								Item : ". $r['nama_item'] ." <br>
								Qty Request : ". number_format($sqty, 0, '', '.') ." <br>
								Tanggal Diperlukan : ". date('Y-m-d', strtotime($sdiperlukan)) ." <br>
								Keterangan : ". $sketerangan ." <br><br>
						";
					}
					$cid = $d->id();
					ORM::get_db()->commit();



					_log1('Tambah Data UR : '.$no.' [CID: '.$cid.']',$user['username'],$user['id']);

					$e = ORM::for_table('sys_email_templates','dblogin')->where('tplname','Approval:Approval UR')->find_one();
					$to = ['capella.zoom@gmail.com'];
					$g = ORM::for_table('daftar_department','dblogin')->where('kode_dept', $user['kode_dept'])->find_many();
					if($g) $to = [];

					foreach($g as $gs) {
						$to = array_merge($to, explode('|', $gs['atasan']));
					}
					$subject = new Template($e['subject']);
					$subject->set('business_name', $config['CompanyName']);
					$subj = $subject->output();
					$message = new Template($e['message']);
					$message->set('business_name', $config['CompanyName']);
					$message->set('isi', $isi);
					$message->set('no_ur', $no);
					$message->set('tgl_ur', $tgl);
					$message->set('unit_kerja', $unitkerja);
					$message->set('nomor', $nomor);
					$message->set('program', 'https://sns.capellagroup.com/?ng=login/');
					$message_o = $message->output();
					
					foreach($to as $item){						
						Notify_Email::_send($item,$item,$subj,$message_o);
					}
									
					Event::trigger('permintaanbarang/add-mintabarang-post/_on_finished');
					$data = array(
							'msg'			=>  'Berhasil Update. No. UR : '.$no.$temp,
							'dataval'		=>	1);
					echo json_encode($data);
				}
			catch(PDOException $ex) {
				ORM::get_db()->rollBack();
				throw $ex;
				echo $ex;
			}
		}
		else{
			$data = array(
					'msg'			=>  $msg,
					'dataval'		=>	'a');
			echo json_encode($data);
		}
		break;






	case 'render-bagian':
		$kode = _post('kode');
		if($kode <> '') {
			if($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			} else {
				$opt = '<option value="">Pilih Bagian</option>';
				$y = ORM::for_table('daftar_kategori')->where('parent', 'Y')->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kode_kategori'].'">'.$r['nama_kategori'].'</option>';
					}
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			}
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Bagian</option>');
			echo json_encode($data);
		}
		break;		


	case 'render-main':
		$kode = _post('kode');
		if($kode <> '') {
			if($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			} else {
				$opt = '<option value="">Pilih Main Data</option>';
				$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kode_kategori'].'">'.$r['nama_kategori'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			}
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Main Data</option>');
			echo json_encode($data);
		}
			
		break;


	case 'render-sub':

		$kode = _post('kode');
		if($kode <> '') {
			if($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			} else {
				$opt = '<option value="">Pilih Sub Data</option>';
				$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kode_kategori'].'">'.$r['nama_kategori'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			}
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Sub Data</option>');
			echo json_encode($data);
		}
			
		break;
	
	case 'render-line':
		$kode = _post('kode');
		if($kode <> '') {
			if($kode == 'STOCK') {
				$opt = '<option value="STOCK">STOCK</option>';
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			} else {
					
				$opt = '<option value="">Pilih Line Data</option>';
				$y = ORM::for_table('daftar_kategori')->where('kode_kategori_parent', $kode)->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kode_kategori'].'">'.$r['nama_kategori'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt);
				echo json_encode($data);
			}
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Line Data</option>');
			echo json_encode($data);
		}
		break;


	case 'render-inv_item':
		$kode = _post('kode');
		if($kode <> '') {
			if($kode == 'STOCK') {
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_itemstock')->where('active','Y')->find_many();
				foreach($y as $r) {
					$opt .= '<option value="'.$r['kode_item'].'">'.$r['nama_item'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt,
						'nama_bagian'	=>  'STOCK');
				echo json_encode($data);
			} else {
				$z = ORM::for_table('daftar_kategori')->where('kode_kategori', $kode)->find_one();
				$opt = '<option value="">Pilih Item Stock</option>';
				$y = ORM::for_table('daftar_kategori_itemstock')->where('kode_kategori',$kode)->find_many();
				foreach($y as $r) {
					$x = ORM::for_table('daftar_itemstock')->where('kode_item',$r['kode_item'])->where('active','Y')->find_one();
					$opt .= '<option value="'.$r['kode_item'].'">'.$x['nama_item'].'</option>';
				}
				$data = array(
						'opt'			=>	$opt,
						'nama_bagian'	=>  $z['nama_kategori']);
				echo json_encode($data);
			}
		} else {
			$data = array(
					'opt'	=>	'<option value="">Pilih Item Stock</option>',
					'nama_bagian'  => '');
			echo json_encode($data);
		}
		break;
	
	case 'render-itemstock':
		$kode = _post('kode');
		if($kode <> '') {
			$y = ORM::for_table('daftar_itemstock')->where('kode_item',$kode)->find_one();
			if($y) {
				$data = array(
						'merk'			=>	$y['merk'],
						'tipe'			=>	$y['tipe'],
						'satuan'		=>	$y['satuan'],
						'spesifikasi'	=>	$y['spesifikasi'],
						'nama_item'		=>  $y['nama_item']);
				echo json_encode($data);
			} else {
				$data = array(
						'merk'			=>	'',
						'tipe'			=>	'',
						'satuan'		=>	'',
						'spesifikasi'	=>	'',
						'nama_item'		=>  '');
				echo json_encode($data);
			}
		} else {
			$data = array(
					'merk'			=>	'',
					'tipe'			=>	'',
					'satuan'		=>	'',
					'spesifikasi'	=>	'',
					'nama_item'		=>  '');
			echo json_encode($data);
		}
		break;






   default:
        echo 'action not defined';
}