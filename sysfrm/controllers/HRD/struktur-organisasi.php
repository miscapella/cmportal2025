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
    $myCtrl = 'struktur-organisasi';
}
_auth();
$ui->assign('_sysfrm_menu', 'data');
$ui->assign('_sysfrm_menu1', 'struktur-organisasi');
$ui->assign('_title', 'Struktur Organisasi - '. $config['CompanyName']);
$ui->assign('_st', 'Struktur Organisasi');
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
        Event::trigger('struktur-organisasi/add/');
		_auth1('ORGANISASI-ADD',$user['id']);
        $id_posisi = "<option value='root' id='id-pos-root' selected>--- Buat Organisasi baru ---</option>";
        $nama_posisi = "<option value='root' id='nama-pos-root' selected>--- Buat Organisasi baru ---</option>";
        $tg = ORM::for_table('struktur_organisasi')->order_by_asc('nama_internal')->find_many();
        foreach ($tg as $r) {
            $id_posisi .= '<option value="'.$r['id_posisi'].'" id="id-pos-'.$r['id'].'">'.$r['id_posisi'].'</option>';
            $nama_posisi .= '<option value="'.$r['nama_internal'].'" id="nama-pos-'.$r['id'].'">'.$r['nama_internal'].'</option>';
        }
        $ui->assign("id_posisi", $id_posisi);
        $ui->assign("nama_posisi", $nama_posisi);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min','btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'add-organisasi','dp/dist/datepicker.min','btn-top/btn-top','numeric')));
        $ui->display($spath.'add-organisasi.tpl');
        break;
    
    case 'add-post':
        Event::trigger('struktur-organisasi/add-post/');

        $id_posisi = _post('id_posisi');
        $nama_internal = _post('nama_internal');
        $nama_eksternal = _post('nama_eksternal');
        $deskripsi = _post('deskripsi');
        $pekerjaan = _post('pekerjaan');
        $nama_pekerjaan = _post('nama_pekerjaan');
        $nilai_posisi = _post('nilai_posisi');
        $valid_dari = _post('valid_dari');
        $valid_sampai = _post('valid_sampai');
        $parent_id_posisi = _post('parent_id_posisi');
        $parent_nama_posisi = _post('parent_nama_posisi');
        $parent_valid_dari = _post('parent_valid_dari');
        $parent_valid_sampai = _post('parent_valid_sampai');

        $msg = '';
        if($id_posisi == ''){
            $msg .= 'Id Posisi tidak boleh kosong. <br>';
        }
        if($nama_internal == ''){
            $msg .= 'Nama internal tidak boleh kosong. <br>';
        }
        if(!$valid_dari){
            $msg .= 'Valid Dari tidak boleh kosong. <br>';
        }
        if(!$valid_sampai){
            $msg .= 'Valid Sampai tidak boleh kosong. <br>';
        }
        if($parent_id_posisi == ''){
            $msg .= 'Parent Id Posisi tidak boleh kosong. <br>';
        }
        if(!$parent_valid_dari){
            $msg .= 'Parent Valid Dari tidak boleh kosong. <br>';
        }
        if(!$parent_valid_sampai){
            $msg .= 'Parent Valid Sampai tidak boleh kosong. <br>';
        }

        $chk = ORM::for_table('struktur_organisasi')->where('id_posisi',$id_posisi)->find_one();
        if($chk){
            $msg .= 'Id Posisi tersebut sudah ada <br>';
        }
        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('struktur_organisasi')->create();
                $id = ORM::for_table('struktur_organisasi')->order_by_desc('id')->find_one();
                
                $d->id_posisi = $id_posisi;
                $d->nama_internal = $nama_internal;
                $d->nama_eksternal = $nama_eksternal;
                $d->deskripsi = $deskripsi;
                $d->pekerjaan = $pekerjaan;
                $d->nama_pekerjaan = $nama_pekerjaan;
                $d->nilai_posisi = $nilai_posisi;
                $d->level_posisi = checkLevel($parent_id_posisi);
                $d->valid_dari = $valid_dari;
                $d->valid_sampai = $valid_sampai;
                $d->parent_id_posisi = $parent_id_posisi;
                $d->parent_nama_posisi = $parent_nama_posisi;
                $d->parent_valid_dari = $parent_valid_dari;
                $d->parent_valid_sampai = $parent_valid_sampai;

                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Organisasi : '.$person_id.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('struktur-organisasi/add-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            echo $msg;
        }
        break;

    case "detail":
        Event::trigger('struktur-organisasi/detail/');
        _auth1('ORGANISASI-DETAIL',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('struktur_organisasi')->find_one($cid);
        if($d){
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
            $ui->assign('xheader', Asset::css(array()));
            $ui->assign('xfooter', Asset::js(array($spath.'detail-organisasi')));
            $ui->display($spath.'detail-organisasi.tpl');
        }
        break;

    case "edit":
        Event::trigger('stuktur-organisasi/edit/');

		_auth1('ORGANISASI-EDIT',$user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('struktur_organisasi')->find_one($cid);
        
        if($d){
            if($d['parent_id_posisi'] == "root") {
                $id_posisi = "<option value='root' id='id-pos-root' selected>Root</option>";
                $nama_posisi = "<option value='root' id='nama-pos-root' selected>Root</option>";
            } else {
                $id_posisi = "<option value='root' id='id-pos-root'>--- Buat Organisasi baru ---</option>";
                $nama_posisi = "<option value='root' id='nama-pos-root'>--- Buat Organisasi baru ---</option>";
            }

            $og = ORM::for_table('struktur_organisasi')->order_by_asc('nama_internal')->find_many();
            foreach($og as $o) {
                if($o['id'] != $cid) {
                    if($d['parent_id_posisi'] == $o['id_posisi']) {
                        $id_posisi .= '<option value="'.$o['id_posisi'].'" id="id-pos-'.$o['id'].'" selected>'.$o['id_posisi'].'</option>';
                        $nama_posisi .= '<option value="'.$o['nama_internal'].'" id="nama-pos-'.$o['id'].'" selected>'.$o['nama_internal'].'</option>';
                    } else {
                        $id_posisi .= '<option value="'.$o['id_posisi'].'" id="id-pos-'.$o['id'].'">'.$o['id_posisi'].'</option>';
                        $nama_posisi .= '<option value="'.$o['nama_internal'].'" id="nama-pos-'.$o['id'].'">'.$o['nama_internal'].'</option>';
                    }
                }
            }

            $ui->assign('id_posisi', $id_posisi);
            $ui->assign('nama_posisi', $nama_posisi);
            $ui->assign('d',$d);
            $ui->assign('cid',$cid);
			$ui->assign('xheader', Asset::css(array('s2/css/select2.min')));
			$ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),$spath.'edit-organisasi','numeric')));
            $ui->display($spath.'edit-organisasi.tpl');
        }
        break;

    case 'edit-post':
        Event::trigger('struktur-organisasi/edit-post/');

        $id = _post('cid');
        $id_posisi_before = _post('id_posisi_before');
        $id_posisi = _post('id_posisi');
        $nama_internal = _post('nama_internal');
        $nama_eksternal = _post('nama_eksternal');
        $deskripsi = _post('deskripsi');
        $pekerjaan = _post('pekerjaan');
        $nama_pekerjaan = _post('nama_pekerjaan');
        $nilai_posisi = _post('nilai_posisi');
        $level_posisi = _post('level_posisi');
        $valid_dari = _post('valid_dari');
        $valid_sampai = _post('valid_sampai');
        $parent_id_posisi = _post('parent_id_posisi');
        $parent_nama_posisi = _post('parent_nama_posisi');
        $parent_valid_dari = _post('parent_valid_dari');
        $parent_valid_sampai = _post('parent_valid_sampai');

        $msg = '';
        if($id_posisi == ''){
            $msg .= 'Id Posisi tidak boleh kosong. <br>';
        }
        if($nama_internal == ''){
            $msg .= 'Nama internal tidak boleh kosong. <br>';
        }
        if(!$valid_dari){
            $msg .= 'Valid Dari tidak boleh kosong. <br>';
        }
        if(!$valid_sampai){
            $msg .= 'Valid Sampai tidak boleh kosong. <br>';
        }
        if($parent_id_posisi == ''){
            $msg .= 'Parent Id Posisi tidak boleh kosong. <br>';
        }
        if(!$parent_valid_dari){
            $msg .= 'Parent Valid Dari tidak boleh kosong. <br>';
        }
        if(!$parent_valid_sampai){
            $msg .= 'Parent Valid Sampai tidak boleh kosong. <br>';
        }

        $parent = ORM::for_table('struktur_organisasi')->where('id_posisi',$id_posisi)->find_one();
        if(checkValidParent($parent_id_posisi, $parent)) {
            $msg .= 'Parent tidak boleh merupakan anakan dari posisi sendiri. <br>';
        }

        $chk = ORM::for_table('struktur_organisasi')->where('id_posisi',$id_posisi)->find_one();
        if($chk && $chk['id'] != $id){
            $msg .= 'Id Posisi tersebut sudah ada <br>';
        }
        if($msg == ''){
            ORM::get_db()->beginTransaction();
            try {
                $d = ORM::for_table('struktur_organisasi')->find_one($id);
                $parent = ORM::for_table('struktur_organisasi')->where('parent_id_posisi',$id_posisi_before)->find_many();
                foreach($parent as $p) {
                    $p->parent_id_posisi = $id_posisi;
                    $p->save();
                }
                
                $d->id_posisi = $id_posisi;
                $d->nama_internal = $nama_internal;
                $d->nama_eksternal = $nama_eksternal;
                $d->deskripsi = $deskripsi;
                $d->pekerjaan = $pekerjaan;
                $d->nama_pekerjaan = $nama_pekerjaan;
                $d->nilai_posisi = $nilai_posisi;
                $d->level_posisi = checkLevel($parent_id_posisi);
                $d->valid_dari = $valid_dari;
                $d->valid_sampai = $valid_sampai;
                $d->parent_id_posisi = $parent_id_posisi;
                $d->parent_nama_posisi = $parent_nama_posisi;
                $d->parent_valid_dari = $parent_valid_dari;
                $d->parent_valid_sampai = $parent_valid_sampai;

                $d->save();
                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Organisasi : '.$person_id.' [CID: '.$cid.']',$user['username'],$user['id']);

                Event::trigger('struktur-organisasi/edit-post/_on_finished');
                echo $cid;
            }
            catch(PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        }
        else{
            echo $msg;
        }
        break;

    case 'list':
        Event::trigger('struktur-organisasi/list/');
		_auth1('ORGANISASI-LIST',$user['id']);
        $msg = $routes['3'];
        $ui->assign('msg',$msg);
        $ui->assign('xheader', Asset::css(array('list/list')));
		$ui->assign('xfooter', Asset::js(array($spath.'struktur-organisasi')));
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';');
        $ui->display($spath.'struktur-organisasi.tpl');
        break;

    default:
        echo 'action not defined';
}

function checkValidParent($target, $data) {
    $error = "";

    if($data['id_posisi'] == $target) {
        $error .= "Error";
    } else {
        $children = ORM::for_table('struktur_organisasi')->where('parent_id_posisi',$data['id_posisi'])->find_one();
        if($children) {
            $children = ORM::for_table('struktur_organisasi')->where('parent_id_posisi',$data['id_posisi'])->find_many();
            foreach($children as $child) {
                $error .= checkValidParent($target, $child);
            }
        }
    }

    return $error;
}

function checkLevel($parent) {
    $level = 1;

    if($parent != "root") {
        $level ++;
        $parent_data = ORM::for_table('struktur_organisasi')->where('id_posisi',$parent)->find_one();

        while($parent_data['parent_id_posisi'] != "root") {
            $level++;
            $parent_data = ORM::for_table('struktur_organisasi')->where('id_posisi',$parent_data['parent_id_posisi'])->find_one();
        }
    }

    return $level;
}