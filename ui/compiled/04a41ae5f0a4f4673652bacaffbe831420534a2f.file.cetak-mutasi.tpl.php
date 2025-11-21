<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 15:07:37
         compiled from "ui\theme\softhash\prog\UNIT\cetak-mutasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7090835036371b6a29d7274-18758665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04a41ae5f0a4f4673652bacaffbe831420534a2f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\cetak-mutasi.tpl',
      1 => 1668678817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7090835036371b6a29d7274-18758665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6371b6a2a11839_82049624',
  'variables' => 
  array (
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6371b6a2a11839_82049624')) {function content_6371b6a2a11839_82049624($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="layout-cetak">
    <div class="body-cetak">
        <div class="row">
            <div class="col-lg-6">
                <img class="mutasi-logo" src="sysfrm/uploads/system/logo_pt_capella_medan.png" alt="Logo">
                <p><?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_SUMBER'];?>
 - </p>
                <p></p>
            </div>
            <div class="col-lg-6" style="text-align: right; font-weight: bold;">
                <p>NO. KONFIRMASI : <?php echo $_smarty_tpl->tpl_vars['d']->value['NOCONFIRM'];?>
</p>
            </div>
        </div>
        <div class="row">
            <p class="header-cetak">SURAT KELUAR</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>JADWAL KELUAR UNIT</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <p>HARI / TANGGAL</p>
                <p>MEREK KENDARAAN</p>
                <p>JENIS / TYPE</p>
                <p>NO. CHASSIS</p>
                <p>NO. ENGINE</p>
                <p>WARNA</p>
                <p>TUJUAN</p>
                <p>PERLENGKAPAN</p>
            </div>
            <div class="col-lg-9">
                <p>: <?php echo $_smarty_tpl->tpl_vars['d']->value['DIKETAHUI'];?>
</p>
                <p>: <?php echo $_smarty_tpl->tpl_vars['d']->value['DIKETAHUI'];?>
</p>
                <p>: <?php echo $_smarty_tpl->tpl_vars['d']->value['DIKETAHUI'];?>
 / <?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_TYPE'];?>
</p>
                <p>: <?php echo $_smarty_tpl->tpl_vars['d']->value['NO_CHASISS'];?>
</p>
                <p>: <?php echo $_smarty_tpl->tpl_vars['d']->value['NO_ENGINE'];?>
</p>
                <p>: <?php echo $_smarty_tpl->tpl_vars['d']->value['DIKETAHUI'];?>
</p>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>