<?php /* Smarty version Smarty-3.1.13, created on 2023-11-10 14:19:27
         compiled from "ui\theme\softhash\prog\UNIT\info-mutasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151080482663354cfc86d361-95733790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56db5fef7a2607d8a9d0ade73744a8ecb42d0591' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\info-mutasi.tpl',
      1 => 1699600760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151080482663354cfc86d361-95733790',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63354cfc8de1c4_03804174',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63354cfc8de1c4_03804174')) {function content_63354cfc8de1c4_03804174($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Info Mutasi</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
mutasi/list" class="btn btn-primary btn-xs">Back</a>
					
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form class="form-horizontal" id="rform">
                    <div class="form-group"><label class="col-lg-3 control-label" for="NO_BAST" >NO_BAST</label>
                        <div class="col-lg-9"><input type="text" id="NO_BAST" name="NO_BAST" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_BAST'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_bast">TGL_BAST</label>
                        <div class="col-lg-9"><input type="text" id="tgl_bast" name="tgl_bast" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_BAST'],'%d-%m-%Y %H:%M:%S');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_chassis">NO_CHASSIS</label>
                        <div class="col-lg-9"><input type="text" id="no_chassis"name="no_chassis"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_CHASSIS'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_engine">NO_ENGINE</label>
                        <div class="col-lg-9"><input type="text" id="no_engine"name="no_engine"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_ENGINE'];?>
" disabled></div>
                    </div> 
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_type">KODE_TYPE</label>
                        <div class="col-lg-9"><input type="text" id="kode_type"name="kode_type"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_TYPE'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_sumber">KODE_SUMBER</label>
                        <div class="col-lg-9"><input type="text" id="kode_sumber"name="kode_sumber"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_SUMBER'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_tujuan">KODE_TUJUAN</label>
                        <div class="col-lg-9"><input type="text" id="kode_tujuan"name="kode_tujuan"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_TUJUAN'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="keterangan">KETERANGAN</label>
                        <div class="col-lg-9"><input type="text" id="keterangan"name="keterangan"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KETERANGAN'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="asuransi">ASURANSI</label>
                        <div class="col-lg-9"><input type="text" id="asuransi"name="asuransi"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ASURANSI'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="operator">OPERATOR</label>
                        <div class="col-lg-9"><input type="text" id="operator"name="operator"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['OPERATOR'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="angkats">ANGKATS</label>
                        <div class="col-lg-9"><input type="text" id="angkats"name="angkats"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ANGKATS'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="TGLINPUT">TGLINPUT</label>
                        <div class="col-lg-9"><input type="text" id="TGLINPUT"name="TGLINPUT"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGLINPUT'],'%d-%m-%Y %H:%M:%S');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ADDDATE">ADDDATE</label>
                        <div class="col-lg-9"><input type="text" id="ADDDATE"name="ADDDATE"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['ADDDATE'],'%d-%m-%Y %H:%M:%S');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="addby">ADDBY</label>
                        <div class="col-lg-9"><input type="text" id="addby"name="addby"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ADDBY'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="editdate">EDITDATE</label>
                        <div class="col-lg-9"><input type="text" id="editdate"name="editdate"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['EDITDATE'],'%d-%m-%Y %H:%M:%S');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="editby">EDITBY</label>
                        <div class="col-lg-9"><input type="text" id="editby"name="editby"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['EDITBY'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="strlokasi">STRLOKASI</label>
                        <div class="col-lg-9"><input type="text" id="strlokasi"name="strlokasi"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['STRLOKASI'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="no_urut_beli">NO_URUT_BELI</label>
                        <div class="col-lg-9"><input type="text" id="no_urut_beli"name="no_urut_beli"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_URUT_BELI'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="diketahui">DIKETAHUI</label>
                        <div class="col-lg-9"><input type="text" id="diketahui"name="diketahui"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['DIKETAHUI'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm">TGL_CONFIRM</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm"name="tgl_confirm"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM'],'%d-%m-%Y %H:%M:%S');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="confirmby">CONFIRMBY</label>
                        <div class="col-lg-9"><input type="text" id="confirmby"name="confirmby"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['CONFIRMBY'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_btlconfirm">TGL_BTLCONFIRM</label>
                        <div class="col-lg-9"><input type="text" id="tgl_btlconfirm"name="tgl_btlconfirm"class="form-control"value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_BTLCONFIRM'],'%d-%m-%Y %H:%M:%S');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="batal_confirmby">BATAL_CONFIRMBY</label>
                        <div class="col-lg-9"><input type="text" id="batal_confirmby"name="batal_confirmby"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['BATAL_CONFIRMBY'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="alasanbatal">ALASANBATAL</label>
                        <div class="col-lg-9"><input type="text" id="alasanbatal"name="alasanbatal"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ALASANBATAL'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="diterima">DITERIMA</label>
                        <div class="col-lg-9"><input type="text" id="diterima"name="diterima"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['DITERIMA'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="noconfirm">NOCONFIRM</label>
                        <div class="col-lg-9"><input type="text" id="noconfirm"name="noconfirm"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NOCONFIRM'];?>
" disabled></div>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>