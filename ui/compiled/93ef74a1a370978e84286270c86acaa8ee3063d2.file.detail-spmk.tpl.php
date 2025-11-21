<?php /* Smarty version Smarty-3.1.13, created on 2024-07-03 09:11:38
         compiled from "ui\theme\softhash\prog\KEBUN\detail-spmk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:437180921651382e7ad9de6-16460620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ef74a1a370978e84286270c86acaa8ee3063d2' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\detail-spmk.tpl',
      1 => 1719972564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '437180921651382e7ad9de6-16460620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_651382e8470ab6_31212313',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_url' => 0,
    'idate' => 0,
    'e' => 0,
    'nourut' => 0,
    'ds' => 0,
    'tg3' => 0,
    'r3' => 0,
    'nama_kontraktor1' => 0,
    'contact1' => 0,
    'lama_bayar1' => 0,
    'nama_kontraktor2' => 0,
    'contact2' => 0,
    'lama_bayar2' => 0,
    'nama_kontraktor3' => 0,
    'contact3' => 0,
    'lama_bayar3' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651382e8470ab6_31212313')) {function content_651382e8470ab6_31212313($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body <?php if ($_smarty_tpl->tpl_vars['d']->value['priority']=='URGENT'){?>red-bg<?php }else{ ?>blue-bg<?php }?>"
      >
        <div class="col-lg-6"><h3>DETAIL SURAT PERMINTAAN KERJA</h3></div>
        <div class="col-lg-6" style="text-align: right">
          <a
            href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/<?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='PENDING'||$_smarty_tpl->tpl_vars['d']->value['status']=='REVISI'){?>list-spmk-pending<?php }elseif($_smarty_tpl->tpl_vars['d']->value['status']=='APPROVE'){?>list-spmk-approve<?php }elseif($_smarty_tpl->tpl_vars['d']->value['status']=='REJECT'){?>list-spmk-reject<?php }?>/"
            class="btn btn-primary btn-sm"
            >Back</a
          >
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body detail-pr-head">
        <div class="form-group">
          <label class="col-lg-3 control-label" for="no_spmk">No. SPMK</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="no_spmk"
              name="no_spmk"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['no_spmk'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="tgl_spmk"
            >Tanggal SPMK</label
          >
          <div class="col-lg-9">
            <input
              type="text"
              id="idate"
              name="idate"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="priority"
            >Tingkat Kepentingan</label
          >
          <div class="col-lg-9">
            <input
              type="text"
              id="priority"
              name="priority"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['priority'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="divisi">Divisi</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="divisi"
              name="divisi"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['divisi'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="jenis_pekerjaan"
            >Jenis Pekerjaan</label
          >
          <div class="col-lg-9">
            <input
              type="text"
              id="jenis_pekerjaan"
              name="jenis_pekerjaan"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['jenis_pekerjaan'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="lokasi">Lokasi</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="lokasi"
              name="lokasi"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['lokasi'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="afdeling"
              name="afdeling"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['afdeling'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="status">Status</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="status"
              name="status"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['status'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="pesan">Pesan</label>
          <div class="col-lg-9">
            <textarea
              type="text"
              id="pesan"
              name="pesan"
              class="form-control"
              rows="5"
              disabled
            >
<?php echo $_smarty_tpl->tpl_vars['d']->value['pesan'];?>
</textarea
            >
          </div>
        </div>
        <br /><br /><br /><br /><br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="dibuat">Dibuat Oleh</label>
          <div class="col-lg-9">
            <input
              type="text"
              id="dibuat"
              name="dibuat"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['dibuat_nama'];?>
"
              disabled
            />
          </div>
        </div>
        <br />
        <?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='REJECT'){?>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="ditolak"
            >Ditolak Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="ditolak"
              name="ditolak"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_nama'];?>
"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tglditolak"
            >Tanggal Ditolak</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tglditolak"
              name="tglditolak"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ditolak_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <?php }elseif($_smarty_tpl->tpl_vars['d']->value['posisi']=='SPNK'){?>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="ktr_disetujui"
            >Disetujui Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="ktr_disetujui"
              name="ktr_disetujui"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label
            class="col-lg-2 control-label text-right"
            for="tglktr_disetujui"
            >Tanggal Disetujui</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tglktr_disetujui"
              name="tglktr_disetujui"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <?php }else{ ?>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="diperiksa"
            >Diperiksa Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="diperiksa"
              name="diperiksa"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diperiksa_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldiperiksa"
            >Tanggal Diperiksa</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldiperiksa"
              name="tgldiperiksa"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diperiksa_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disetujui"
            >Disetujui Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disetujui"
              name="disetujui"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisetujui"
            >Tanggal Disetujui</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisetujui"
              name="tgldisetujui"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disetujui_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disurvey"
            >Disurvey Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disurvey"
              name="disurvey"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['disurvey_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['disurvey_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisurvey"
            >Tanggal Disurvey</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisurvey"
              name="tgldisurvey"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['disurvey_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-3 control-label" for="diketahui"
            >Diketahui Oleh</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="diketahui"
              name="diketahui"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['diketahui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldiketahui"
            >Tanggal Diketahui</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldiketahui"
              name="tgldiketahui"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['diketahui_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <br />
        <?php }?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body detail-pr-head">
        <div class="form-group">Direksi & Asisten Direksi</div>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disetujuiadireksi"
            >Disetujui Oleh Asisten Direksi</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disetujuiadireksi"
              name="disetujuiadireksi"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisetujuiadireksi"
            >Tanggal Disetujui Asisten Direksi</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisetujuiadireksi"
              name="tgldisetujuiadireksi"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label" for="disetujuidireksi"
            >Disetujui Oleh Direksi</label
          >
          <div class="col-lg-5">
            <input
              type="text"
              id="disetujuidireksi"
              name="disetujuidireksi"
              class="form-control"
              value="<?php if ($_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_dir_nama']!=''){?><?php echo $_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_dir_nama'];?>
<?php }else{ ?>Menunggu Approval<?php }?>"
              disabled
            />
          </div>
          <label class="col-lg-2 control-label text-right" for="tgldisetujuidireksi"
            >Tanggal Disetujui Direksi</label
          >
          <div class="col-lg-2">
            <input
              type="text"
              id="tgldisetujuidireksi"
              name="tgldisetujuidireksi"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ktr_disetujui_dir_tgl'];?>
"
              datepicker
              data-date-format="dd-mm-yyyy"
              data-auto-close="true"
              disabled
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?> <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
        <div class="form-group">SERVIS #<?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="spesifikasi"
            >Spesifikasi</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="spesifikasi"
            name="spesifikasi"
            class="form-control"
          >
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['spesifikasi'];?>

          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="block">Block</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="block"
            name="block"
            class="form-control"
          >
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['block'];?>

          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="ha">Ha</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="ha"
            name="ha"
            class="form-control"
          >
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['ha'];?>

          </div>
        </div>
        <br />
        <div class="form-group">
          <label class="col-lg-2 control-label" for="pkk">PKK</label
          ><span class="col-lg-1" style="text-align: right">:</span>
          <div
            class="col-lg-9"
            type="text"
            id="pkk"
            name="pkk"
            class="form-control"
          >
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['pkk'];?>

          </div>
        </div>
        <br />
        <hr />
        <?php if ($_smarty_tpl->tpl_vars['d']->value['posisi']=='SPMK1'){?>
        <div class="form-group">PILIHAN KONTRAKTOR</div>
        <br />
        <?php $_smarty_tpl->tpl_vars["nama_kontraktor1"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["nama_kontraktor2"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable('', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["nama_kontraktor3"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable('', null, 0);?> <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable('', null, 0);?> <?php  $_smarty_tpl->tpl_vars['r3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r3']->key => $_smarty_tpl->tpl_vars['r3']->value){
$_smarty_tpl->tpl_vars['r3']->_loop = true;
?> <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktor1']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?> <?php $_smarty_tpl->tpl_vars["nama_kontraktor1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?> <?php $_smarty_tpl->tpl_vars["contact1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_contact']), null, 0);?> <?php $_smarty_tpl->tpl_vars["lama_bayar1"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_pembayaran']), null, 0);?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktor2']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?> <?php $_smarty_tpl->tpl_vars["nama_kontraktor2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?> <?php $_smarty_tpl->tpl_vars["contact2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_contact']), null, 0);?> <?php $_smarty_tpl->tpl_vars["lama_bayar2"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_pembayaran']), null, 0);?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktor3']==$_smarty_tpl->tpl_vars['r3']->value['kode_supplier']){?> <?php $_smarty_tpl->tpl_vars["nama_kontraktor3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_supplier']), null, 0);?> <?php $_smarty_tpl->tpl_vars["contact3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['nama_contact']), null, 0);?> <?php $_smarty_tpl->tpl_vars["lama_bayar3"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['r3']->value['lama_pembayaran']), null, 0);?> <?php }?> <?php } ?>
        <div class="form-group">
          <div
            class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor1']){?> supplierpilihan <?php }?>"
            style="border-right: 1px solid #e7eaec"
          >
            <div class="row">
              <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]"
              class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor1']){?> checked <?php }?> value="kontraktor1" disabled>
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="kontraktor1"
                >Kontraktor 1</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <a
                href="#"
                class="col-lg-8 detail-kontraktor"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kontraktor1'];?>
"
                ><?php echo $_smarty_tpl->tpl_vars['ds']->value['kontraktor1'];?>
</a
              >
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="nama_kontraktor1"
                >Nama</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="nama_kontraktor1"
                name="nama_kontraktor1"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['nama_kontraktor1']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="contact1"
                >Contact</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="contact1"
                name="contact1"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['contact1']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="lama_bayar1"
                >Lama Bayar</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="lama_bayar1"
                name="lama_bayar1"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['lama_bayar1']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="harga1">Harga</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8 amount"
                type="text"
                id="harga1"
                name="harga1"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga1'];?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="keterangan_kontraktor1"
                >Keterangan</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="keterangan_kontraktor1"
                name="keterangan_kontraktor1"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_kontraktor1'];?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="file_kontraktor1"
                >File</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <div class="col-lg-8">
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_kontraktor1']!=''){?>
                <a
                  href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_kontraktor1'];?>
"
                  target="_blank"
                  ><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_kontraktor1'];?>
</a
                >
                <?php }?>
              </div>
            </div>
          </div>
          <div
            class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor2']){?> supplierpilihan <?php }?>"
            style="border-right: 1px solid #e7eaec"
          >
            <div class="row">
              <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]"
              class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor2']){?> checked <?php }?> value="kontraktor2" disabled>
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="kontraktor2"
                >Kontraktor 2</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <a
                href="#"
                class="col-lg-8 detail-kontraktor"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kontraktor2'];?>
"
                ><?php echo $_smarty_tpl->tpl_vars['ds']->value['kontraktor2'];?>
</a
              >
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="nama_kontraktor2"
                >Nama</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="nama_kontraktor2"
                name="nama_kontraktor2"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['nama_kontraktor2']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="contact2"
                >Contact</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="contact2"
                name="contact2"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['contact2']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="lama_bayar2"
                >Lama Bayar</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="lama_bayar2"
                name="lama_bayar2"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['lama_bayar2']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="harga2">Harga</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8 amount"
                type="text"
                id="harga2"
                name="harga2"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga2'];?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="keterangan_kontraktor2"
                >Keterangan</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="keterangan_kontraktor2"
                name="keterangan_kontraktor2"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_kontraktor2'];?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="file_kontraktor2"
                >File</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <div class="col-lg-8">
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_kontraktor2']!=''){?>
                <a
                  href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_kontraktor2'];?>
"
                  target="_blank"
                  ><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_kontraktor2'];?>
</a
                >
                <?php }?>
              </div>
            </div>
          </div>
          <div
            class="form-group col-lg-4 <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor3']){?> supplierpilihan <?php }?>"
          >
            <div class="row">
              <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ds']->value["id"];?>
kontraktorpilihan[]"
              class="cekbox col-lg-12" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kontraktorpilihan']==$_smarty_tpl->tpl_vars['ds']->value['kontraktor3']){?> checked <?php }?> value="kontraktor3" disabled>
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="kontraktor3"
                >Kontraktor 3</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <a
                href="#"
                class="col-lg-8 detail-kontraktor"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kontraktor3'];?>
"
                ><?php echo $_smarty_tpl->tpl_vars['ds']->value['kontraktor3'];?>
</a
              >
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="nama_kontraktor3"
                >Nama</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="nama_kontraktor3"
                name="nama_kontraktor3"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['nama_kontraktor3']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="contact3"
                >Contact</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="contact3"
                name="contact3"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['contact3']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="lama_bayar3"
                >Lama Bayar</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="lama_bayar3"
                name="lama_bayar3"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['lama_bayar3']->value;?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="harga3">Harga</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8 amount"
                type="text"
                id="harga3"
                name="harga3"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['harga3'];?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="keterangan_kontraktor3"
                >Keterangan</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <input
                class="col-lg-8"
                type="text"
                id="keterangan_kontraktor3"
                name="keterangan_kontraktor3"
                class="form-control"
                value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['keterangan_kontraktor3'];?>
"
                disabled
              />
            </div>
            <div class="row">
              <label class="col-lg-3 control-label" for="file_kontraktor3"
                >File</label
              ><span class="col-lg-1" style="text-align: right">:</span>
              <div class="col-lg-8">
                <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_kontraktor3']!=''){?>
                <a
                  href="uploads/KEBUN/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_kontraktor3'];?>
"
                  target="_blank"
                  ><?php echo $_smarty_tpl->tpl_vars['ds']->value['file_kontraktor3'];?>
</a
                >
                <?php }?>
              </div>
            </div>
          </div>
        </div>
        <div class="row"></div>
        <br />
        <hr />
        <hr />
        <?php }?> <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?> <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>