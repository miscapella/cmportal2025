<?php /* Smarty version Smarty-3.1.13, created on 2023-11-16 16:24:30
         compiled from "ui\theme\softhash\prog\UNIT\info-penerimaan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1183305206654b003eaf6112-98673524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1402b9fea9b5e484d0c9f5c18aa4bd42cd31c2dd' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\info-penerimaan.tpl',
      1 => 1699600323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1183305206654b003eaf6112-98673524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_654b003ebed976_04959433',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'e' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_654b003ebed976_04959433')) {function content_654b003ebed976_04959433($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Info Penerimaan</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
penerimaan/history" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form class="form-horizontal" id="rform">
                    <div class="ibox-content">
                        
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_chassis">NO CHASSIS</label>
                        <div class="col-lg-9"><input type="text" id="no_chassis"name="no_chassis"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_CHASSIS'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_engine">NO ENGINE</label>
                        <div class="col-lg-9"><input type="text" id="no_engine"name="no_engine"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_ENGINE'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_type">TIPE MOBIL</label>
                        <div class="col-lg-3"><input type="text" id="kode_type"name="kode_type"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_TYPE'];?>
" readonly></div>
                        <div class="col-lg-6"><input type="text" id="nama_do"name="nama_do"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['e']->value['NAMA_DO'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="warna">WARNA</label>
                        <div class="col-lg-9"><input type="text" id="warna"name="warna"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['WARNA'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="merek">MEREK</label>
                        <div class="col-lg-9"><input type="text" id="merek"name="merek"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['MEREK'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_tpt">KODE_TPT</label>
                        <div class="col-lg-9"><input type="text" id="kode_tpt"name="kode_tpt"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_TPT'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_sampai">TGL_SAMPAI</label>
                        <div class="col-lg-9"><input type="text" id="tgl_sampai"name="tgl_sampai"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_SAMPAI'],'%d-%m-%Y %H:%M:%S');?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_faktur">NO_FAKTUR</label>
                        <div class="col-lg-9"><input type="text" id="no_faktur"name="no_faktur"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_FAKTUR'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="aksesori">AKSESORI</label>
                        <div class="col-lg-9"><input type="text" id="aksesori"name="aksesori"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['AKSESORI'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="thn_buat">THN_BUAT</label>
                        <div class="col-lg-9"><input type="text" id="thn_buat"name="thn_buat"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['THN_BUAT'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_terima">TGL_CONFIRM_TERIMA</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_terima"name="tgl_confirm_terima"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM_TERIMA'],'%d-%m-%Y %H:%M:%S');?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_keluar">TGL_CONFIRM_KELUAR</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_keluar"name="tgl_confirm_keluar"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM_KELUAR'],'%d-%m-%Y %H:%M:%S');?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_terima">CONFIRMTERIMABY</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_terima"name="tgl_confirm_terima"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['CONFIRMTERIMABY'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm_keluar">CONFIRMKELUARBY</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm_keluar"name="tgl_confirm_keluar"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['CONFIRMKELUARBY'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ket_terima">KET_TERIMA</label>
                        <div class="col-lg-9"><input type="text" id="ket_terima"name="ket_terima"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KET_TERIMA'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ket_keluar">KET_KELUAR</label>
                        <div class="col-lg-9"><input type="text" id="ket_keluar"name="ket_keluar"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KET_KELUAR'];?>
" readonly></div>
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