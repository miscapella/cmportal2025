<?php /* Smarty version Smarty-3.1.13, created on 2024-08-29 09:10:00
         compiled from "ui\theme\softhash\prog\GAS\edit-supplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73230295765a78dc3877d55-88642935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96967556d15f6d510f5b277e4c91ef2a9b3d0a89' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\edit-supplier.tpl',
      1 => 1724833337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73230295765a78dc3877d55-88642935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65a78dc3950e87_07505233',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'daftar_kode' => 0,
    'r' => 0,
    'etelp_toko' => 0,
    'ehp_toko' => 0,
    'ehp_pemilik' => 0,
    'ehp_contact' => 0,
    'ehp_emergency' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65a78dc3950e87_07505233')) {function content_65a78dc3950e87_07505233($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Supplier</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
supplier/list/" class="btn btn-primary btn-xs">Daftar Supplier</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformsupplier" autocomplete="off" spellcheck="false">
                    <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
					<div class="col-lg-12"><h1 class="text-center">Detail Supplier</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_supplier"><span style="color: red;">*</span> Kode Supplier</label>
                        <div class="col-lg-9"><input type="text" id="kode_supplier" name="kode_supplier" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_supplier'];?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_supplier"><span style="color: red;">*</span> Nama Supplier</label>
                        <div class="col-lg-9"><input type="text" id="nama_supplier" name="nama_supplier" class="form-control" style="text-transform:uppercase" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_supplier'];?>
">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="bidang"><span style="color: red;">*</span> Jenis Usaha</label>
                        <div class="col-lg-9"><input type="text" id="bidang" name="bidang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['bidang'];?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="asal"><span style="color: red;">*</span> Asal Supplier</label>
                        <div class="col-lg-9"><select class="form-control kodetelp" id="asal" name="asal">
                            <option value="lokal"<?php if ($_smarty_tpl->tpl_vars['d']->value['asal_supplier']=='lokal'){?> selected <?php }?>>Lokal</option>
                            <option value="bukan lokal"<?php if ($_smarty_tpl->tpl_vars['d']->value['asal_supplier']=='bukan lokal'){?> selected <?php }?>>Bukan Lokal</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label">Foto Toko</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['foto_toko']!=''){?>
                            <a href="uploads/GAS/supplier/<?php echo $_smarty_tpl->tpl_vars['d']->value['foto_toko'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="foto_toko">Change Foto Toko</label>
                        <div class="col-lg-3"><input type="file" id="foto_toko" name="foto_toko" class="files">
                            <p>Max 5 MB</p>
                            <input type="text" id="sfoto_toko" name="sfoto_toko" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['foto_toko'];?>
" style="display: none;">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <?php $_smarty_tpl->tpl_vars['etelp_toko'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['d']->value['telp_toko']), null, 0);?>
                        <label class="col-lg-3 control-label" for="telp_toko">Telepon Toko</label>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_telp_toko" name="kode_telp_toko">
                                <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_kode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['etelp_toko']->value[0];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==$_smarty_tpl->tpl_vars['r']->value['kode_telepon']){?> selected <?php }?>>+<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-1"><input type="text" id="area_telp_toko" name="area_telp_toko" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['etelp_toko']->value[1];?>
" placeholder="-">
                        </div>
                        <div class="col-lg-7"><input type="text" id="telp_toko" name="telp_toko" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['etelp_toko']->value[2];?>
" placeholder="-">
                        </div>
                    </div> -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="telp_toko">Telepon Toko</label>
                        <div class="col-lg-9"><input type="text" id="telp_toko" name="telp_toko" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['telp_toko'];?>
" class="form-control" placeholder="Nomor Telepon Toko">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <?php $_smarty_tpl->tpl_vars['ehp_toko'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['d']->value['hp_toko']), null, 0);?>
                        <label class="col-lg-3 control-label" for="hp_toko">Nomor HP Toko</label>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_hp_toko" name="kode_hp_toko">
                                <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_kode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ehp_toko']->value[0];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==$_smarty_tpl->tpl_vars['r']->value['kode_telepon']){?> selected <?php }?>>+<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-8"><input type="text" id="hp_toko" name="hp_toko" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ehp_toko']->value[1];?>
" placeholder="-">
                        </div>
                    </div> -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_toko">Nomor HP Toko</label>
                        <div class="col-lg-9"><input type="text" id="hp_toko" name="hp_toko" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['hp_toko'];?>
" class="form-control" placeholder="Nomor HP Toko">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="email">Email</label>
                        <div class="col-lg-9"><input type="text" id="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="website">Website</label>
                        <div class="col-lg-9"><input type="text" id="website" name="website" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['website'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_mulai_kerjasama">Tanggal Mulai Kerjasama</label>
                        <div class="col-lg-9"><input type="text" id="tgl_mulai_kerjasama" name="tgl_mulai_kerjasama" class="form-control tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['tgl_mulai_kerjasama'],'%d-%m-%Y');?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="lama_pembayaran">Lama Pembayaran (Hari)</label>
                        <div class="col-lg-9"><input type="number" id="lama_pembayaran" name="lama_pembayaran" class="form-control" value=<?php echo $_smarty_tpl->tpl_vars['d']->value['lama_pembayaran'];?>
>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="rekomendasi_dari">Rekomendasi Dari</label>
                        <div class="col-lg-9"><input type="text" id="rekomendasi_dari" name="rekomendasi_dari" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['rekomendasi_dari'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nib">NIB (Nomor Induk Berusaha)</label>
                        <div class="col-lg-9"><input type="text" id="nib" name="nib" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nib'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_nib">File NIB</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['file_nib']!=''){?>
                            <a href="uploads/GAS/supplier/<?php echo $_smarty_tpl->tpl_vars['d']->value['file_nib'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="file_nib">Change File NIB</label>
                        <div class="col-lg-3"><input type="file" id="file_nib" name="file_nib" class="files">
                            <p>Max 5 MB</p>
                            <input type="text" id="sfile_nib" name="sfile_nib" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['file_nib'];?>
" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="npwp">NPWP (Nomor Pokok Wajib Pajak)</label>
                        <div class="col-lg-9"><input type="text" id="npwp" name="npwp" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['npwp'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_npwp">File NPWP</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['file_npwp']!=''){?>
                            <a href="uploads/GAS/supplier/<?php echo $_smarty_tpl->tpl_vars['d']->value['file_npwp'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="file_npwp">Change File NPWP</label>
                        <div class="col-lg-3"><input type="file" id="file_npwp" name="file_npwp" class="files">
                            <p>Max 5 MB</p>
                            <input type="text" id="sfile_npwp" name="sfile_npwp" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['file_npwp'];?>
" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_kontrak">File Kontrak</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['file_kontrak']!=''){?>
                            <a href="uploads/GAS/supplier/<?php echo $_smarty_tpl->tpl_vars['d']->value['file_kontrak'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="file_kontrak">Change File Kontrak</label>
                        <div class="col-lg-3"><input type="file" id="file_kontrak" name="file_kontrak" class="files">
                            <p>Max 5 MB</p>
                            <input type="text" id="sfile_kontrak" name="sfile_kontrak" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['file_kontrak'];?>
" style="display: none;">
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Alamat</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="negara">Negara</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="negara" name="negara">
                                <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_kode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['d']->value['negara'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==$_smarty_tpl->tpl_vars['r']->value['negara']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="provinsi">Provinsi</label>
                        <div class="col-lg-3"><input type="text" id="provinsi" name="provinsi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['provinsi'];?>
" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="kota">Kota</label>
                        <div class="col-lg-4"><input type="text" id="kota" name="kota" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kota'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kelurahan">Kelurahan</label>
                        <div class="col-lg-3"><input type="text" id="kelurahan" name="kelurahan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kelurahan'];?>
" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="kecamatan">Kecamatan</label>
                        <div class="col-lg-4"><input type="text" id="kecamatan" name="kecamatan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kecamatan'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kotamadya">kotamadya / Kabupaten</label>
                        <div class="col-lg-3"><input type="text" id="kotamadya" name="kotamadya" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kotamadya'];?>
" placeholder="-">
                        </div>
                        <label class="col-lg-2 control-label" for="rtrw">RT / RW</label>
                        <div class="col-lg-4"><input type="text" id="rtrw" name="rtrw" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['rtrw'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alamat">Alamat</label>
                        <div class="col-lg-9"><input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['alamat'];?>
" placeholder="-">
                        </div>
                    </div>
                    <!-- <div class="form-group"><label class="col-lg-3 control-label" for="nomor_gedung">Nomor Gedung</label>
                        <div class="col-lg-3"><input type="text" id="nomor_gedung" name="nomor_gedung" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nomor_gedung'];?>
" placeholder="-">
                        </div> -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_pos">Kode Pos</label>
                        <div class="col-lg-4"><input type="text" id="kode_pos" name="kode_pos" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_pos'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="maps">Google Maps</label>
                        <div class="col-lg-9"><input type="text" id="maps" name="maps"  class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['maps'];?>
" placeholder="Link Google Maps">
                        </div>
                    </div>
                    <div class="col-lg-12"><h1 class="text-center">Detail Contact</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="file_ktp">File KTP</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['file_ktp']!=''){?>
                            <a href="uploads/GAS/supplier/<?php echo $_smarty_tpl->tpl_vars['d']->value['file_ktp'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="file_ktp">Change File KTP</label>
                        <div class="col-lg-3"><input type="file" id="file_ktp" name="file_ktp" class="files">
                            <p>Max 5 MB</p>
                            <input type="text" id="sfile_ktp" name="sfile_ktp" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['file_ktp'];?>
" style="display: none;">
                        </div>
                    </div>
                     <!-- Added By Elvies 11/12/2023 -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="nik_ktp">NIK KTP</label>
                        <div class="col-lg-9"><input type="text" id="nik_ktp" name="nik_ktp" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nik_ktp'];?>
" class="form-control" placeholder="NIK KTP">
                        </div>
                    </div>
                     <!-- Added By Elvies 11/12/2023 -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_pemilik">Nama Pemilik</label>
                        <div class="col-lg-9"><input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_pemilik'];?>
" placeholder="-">
                        </div>
                    </div>
                     <!-- Added By Elvies 11/12/2023 -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_pemilik">NO HP Pemilik</label>
                        <div class="col-lg-9"><input type="text" id="hp_pemilik" name="hp_pemilik" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['hp_pemilik'];?>
" placeholder="-">
                        </div>
                    </div>
                     <!-- Added By Elvies 11/12/2023 -->

                    <!-- <div class="form-group"><label class="col-lg-3 control-label" for="hp_pemilik">No HP Pemilik</label>
                        <?php $_smarty_tpl->tpl_vars['ehp_pemilik'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['d']->value['hp_pemilik']), null, 0);?>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_hp_pemilik" name="kode_hp_pemilik">
                                <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_kode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ehp_pemilik']->value[0];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==$_smarty_tpl->tpl_vars['r']->value['kode_telepon']){?> selected <?php }?>>+<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
)</option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <!-- <div class="col-lg-8"><input type="text" id="hp_pemilik" name="hp_pemilik" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ehp_pemilik']->value[1];?>
" placeholder="-">
                        </div>
                    </div> -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_contact">Nama Contact</label>
                        <div class="col-lg-9"><input type="text" id="nama_contact" name="nama_contact" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_contact'];?>
" placeholder="-">
                        </div>
                    </div>
                    <!-- Added By Elvies 11/12/2023 -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_contact">Hp Contact</label>
                        <div class="col-lg-9"><input type="text" id="hp_contact" name="hp_contact" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['hp_contact'];?>
" class="form-control" placeholder="HP Contact">
                        </div>
                    </div>
                    <!-- Added By Elvies 11/12/2023 -->

                    <!-- <div class="form-group"><label class="col-lg-3 control-label" for="hp_contact">No HP Contact</label>
                        <?php $_smarty_tpl->tpl_vars['ehp_contact'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['d']->value['hp_contact']), null, 0);?>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_hp_contact" name="kode_hp_contact">
                                <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_kode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ehp_contact']->value[0];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5==$_smarty_tpl->tpl_vars['r']->value['kode_telepon']){?> selected <?php }?>>+<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-8"><input type="text" id="hp_contact" name="hp_contact" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ehp_contact']->value[1];?>
" placeholder="-">
                        </div>
                    </div> -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_emergency">Nama Emergency Contact</label>
                        <div class="col-lg-9"><input type="text" id="nama_emergency" name="nama_emergency" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_emergency'];?>
" placeholder="-">
                        </div>
                    </div>
                    <!-- <div class="form-group"><label class="col-lg-3 control-label" for="hp_emergency">No HP Emergency</label>
                        <?php $_smarty_tpl->tpl_vars['ehp_emergency'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['d']->value['hp_emergency']), null, 0);?>
                        <div class="col-lg-1">
                            <select class="form-control kodetelp" id="kode_hp_emergency" name="kode_hp_emergency">
                                <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_kode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['ehp_emergency']->value[0];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6==$_smarty_tpl->tpl_vars['r']->value['kode_telepon']){?> selected <?php }?>>+<?php echo $_smarty_tpl->tpl_vars['r']->value['kode_telepon'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['negara'];?>
)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-8"><input type="text" id="hp_emergency" name="hp_emergency" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ehp_emergency']->value[1];?>
" placeholder="-">
                        </div>
                    </div> -->
                    <!-- Added By Elvies 11/12/2023 -->
                    <div class="form-group"><label class="col-lg-3 control-label" for="hp_emergency">Hp Emergency</label>
                        <div class="col-lg-9"><input type="text" id="hp_emergency" name="hp_emergency" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['hp_emergency'];?>
" class="form-control" placeholder="HP Emergency">
                        </div>
                    </div>
                    <!-- Added By Elvies 11/12/2023 -->
                    <div class="col-lg-12"><h1 class="text-center">Detail Rekening</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="bank">Nama Bank</label>
                        <div class="col-lg-9"><input type="text" id="bank" name="bank" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['bank'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_rekening">Nomor Rekening</label>
                        <div class="col-lg-9"><input type="text" id="no_rekening" name="no_rekening" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_rekening'];?>
" placeholder="-">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="an_rekening">Atas Nama Rekening</label>
                        <div class="col-lg-9"><input type="text" id="an_rekening" name="an_rekening" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['an_rekening'];?>
" placeholder="-">
                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="file_rekening">File Rekening</label>
                        <div class="col-lg-3">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['file_rekening']!=''){?>
                            <a href="uploads/GAS/supplier/<?php echo $_smarty_tpl->tpl_vars['d']->value['file_rekening'];?>
" target="_blank" class="form-control">Klik disini untuk membuka file</a>
                            <?php }else{ ?>
                            <a class="form-control">Tidak ada file</a>
                            <?php }?>
                        </div>
                        <label class="col-lg-2 control-label" for="file_rekening">Change File Rekening</label>
                        <div class="col-lg-3"><input type="file" id="file_rekening" name="file_rekening" class="files">
                            <p>Max 5 MB</p>
                            <input type="text" id="sfile_rekening" name="sfile_rekening" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['file_rekening'];?>
" style="display: none;">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="aktif">Aktif</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="aktif" name="aktif" value="Y" <?php if ($_smarty_tpl->tpl_vars['d']->value['active']=='Y'){?> checked <?php }?>>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alasan_non_aktif">Alasan Non  Aktif</label>
                        <div class="col-lg-9"><input type="text" id="alasan_non_aktif" name="alasan_non_aktif" class="form-control" placeholder="-"
                            value="<?php if ($_smarty_tpl->tpl_vars['d']->value['active']=='N'){?> <?php echo $_smarty_tpl->tpl_vars['d']->value['alasan_non_aktif'];?>
 <?php }?>"
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['active']=='Y'){?> readonly <?php }?>>
                        </div>
                    </div><br />
                    <div class="form-group"><label class="col-lg-3 control-label" for="blocked">Blacklist Supplier</label>
                        <div class="col-lg-9"><input class="form-check-input" type="checkbox" id="blocked" name="blocked" value="Y" <?php if ($_smarty_tpl->tpl_vars['d']->value['blocked']=='Y'){?> checked <?php }?>>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alasan_blocked">Alasan Blacklist</label>
                        <div class="col-lg-9"><input type="text" id="alasan_blocked" name="alasan_blocked" class="form-control" placeholder="-"
                            value="<?php if ($_smarty_tpl->tpl_vars['d']->value['blocked']=='Y'){?> <?php echo $_smarty_tpl->tpl_vars['d']->value['alasan_blocked'];?>
 <?php }?>"
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['blocked']=='N'){?> readonly <?php }?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>