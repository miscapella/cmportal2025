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
    $myCtrl = 'datatype';
}
_auth();
$ui->assign('_sysfrm_menu', 'datatype');
$ui->assign('_title', 'Data Type - '. $config['CompanyName']);
$ui->assign('_st', 'Data Type');
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
    case 'list':
        Event::trigger('datatype/list/');
		_auth1('DATATYPE-LIST',$user['id']);
		$msg = $routes['3'];
		$ui->assign('msg',$msg);
        $ui->assign('_sysfrm_menu1', 'listdatatype');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'list-datatype','numeric')));
        $ui->display($spath.'list-datatype.tpl');
        break;

    case 'add':
        Event::trigger('datatype/add/');
        _auth1('DATATYPE-ADD',$user['id']);
        $ui->assign('_sysfrm_menu1', 'listdatatype');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-datatype','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-datatype.tpl');
        
        break;

    case 'add-post':
        Event::trigger('datatype/add-post/');
        $options = _post('options');
        $cek_options = explode(':::,', _post('options'));
        $kode = _post('kode');
        $kode .= ':' . $user['kode_dept'];
        $nama = _post('nama');
        $keterangan = _post('keterangan');
        $tipe = _post('tipe');
        $msg = '';
        $msg_item = '';
        $i = 0;
        $ii = 0;
        foreach($cek_options as $code) {
            if($cek_options[$i] == '')	$msg_item = 'Ada option yang masih kosong';
            if($code <> '') $ii++;
            $i++;
        }
        if($ii > 0) {
            if($msg_item <> '')
                $msg .= $msg_item.'<br>';
        } else $msg .= 'Belum memilih option<br>';

        if($kode == ''){
            $msg .= 'Data Type Code tidak boleh kosong<br>';
        }
        if($nama == ''){
            $msg .= 'Data Type Name tidak boleh kosong<br>';
        }
        if($tipe == ''){
            $msg .= 'Type tidak boleh kosong<br>';
        }
        $datatype = ORM::for_table('daftar_datatype')->find_many();
        foreach($datatype as $item) {
            if($kode == $item['kode']){
                $msg .= 'Kode Data Type sudah terdaftar';
                break;
            }
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_datatype')->create();
                $d->kode = strtoupper($kode);
                $d->nama = $nama;
                $d->tipe = $tipe;
                $d->deskripsi = $keterangan;
                $d->value = $options;
                $d->status = 'AKTIF';
                $d->add_by = $user['id'];
                $d->add_date = date('Y-m-d H:i:s');
                $d->save();

                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Type : '.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('datatype/add-post/_on_finished');
                $data = array(
                        'msg'			=>  'Berhasil Update. Data Type : '.strtoupper($kode),
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

    case 'edit':
        Event::trigger('datatype/edit/');

        _auth1('DATATYPE-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('daftar_datatype')->find_one($cid);
        if($d){
            $e = explode(',', $d['value']);

            $ui->assign('d',$d);
            $ui->assign('e',$e);
            $ui->assign('cid',$cid);
            $ui->assign('_sysfrm_menu1', 'listdatatype');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-datatype','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
            $ui->display($spath.'edit-datatype.tpl');
        } else r2(U.'datatype/list', 'e', 'Data Type tersebut tidak ditemukan');
        break;

    case 'edit-post':
        Event::trigger('datatype/edit-post/');
        $options = _post('options');
        $cek_options = explode(',', _post('options'));
        $kode = _post('kode');
        $nama = _post('nama');
        $keterangan = _post('keterangan');
        $tipe = _post('tipe');
        $aktif = _post('aktif');
        $msg = '';
        $msg_item = '';
        $i = 0;
        $ii = 0;
        foreach($cek_options as $code) {
            if($cek_options[$i] == '')	$msg_item = 'Ada option yang masih kosong';
            if($code <> '') $ii++;
            $i++;
        }
        if($ii > 0) {
            if($msg_item <> '')
                $msg .= $msg_item.'<br>';
        } else $msg .= 'Belum memilih option<br>';

        if($kode == ''){
            $msg .= 'Data Type Code tidak boleh kosong<br>';
        }
        if($nama == ''){
            $msg .= 'Data Type Name tidak boleh kosong<br>';
        }
        if($tipe == ''){
            $msg .= 'Type tidak boleh kosong<br>';
        }

        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('daftar_datatype')->where('kode', $kode)->find_one();
                $d->nama = $nama;
                $d->tipe = $tipe;
                $d->deskripsi = $keterangan;
                $d->value = $options;
                if($aktif == 'AKTIF') {
                    $d->status = 'AKTIF';
                } else {
                    $d->status = 'NONAKTIF';
                }
                
                $d->save();

                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Edit Data Type : '.strtoupper($kode).' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('datatype/edit-post/_on_finished');
                $data = array(
                        'msg'			=>  'Berhasil Update. Data Type : '.strtoupper($kode),
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

   default:
        echo 'action not defined';
}