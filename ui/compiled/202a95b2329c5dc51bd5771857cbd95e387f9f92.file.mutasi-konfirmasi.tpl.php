<?php /* Smarty version Smarty-3.1.13, created on 2023-11-07 14:08:45
         compiled from "ui\theme\softhash\prog\UNIT\mutasi-konfirmasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43218071365486d7d6a9b33-52699889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '202a95b2329c5dc51bd5771857cbd95e387f9f92' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\mutasi-konfirmasi.tpl',
      1 => 1699340924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43218071365486d7d6a9b33-52699889',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65486d7d6e7327_79873869',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'e' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65486d7d6e7327_79873869')) {function content_65486d7d6e7327_79873869($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mutasi Konfirmasi</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
mutasi/list/" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <form class="form-horizontal" id="rform">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="alert alert-danger" id="emsg">
                                <span id="emsgbody"></span>
                            </div>
                        </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="chassis">NO CHASSIS</label>
                        <div class="col-lg-9"><input type="text" id="chassis"name="chassis"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_CHASSIS'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="engine">NO ENGINE</label>
                        <div class="col-lg-9"><input type="text" id="engine"name="engine"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['NO_ENGINE'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="sumber">KODE SUMBER</label>
                        <div class="col-lg-9"><input type="text" id="sumber"name="sumber"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_SUMBER'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tujuan">KODE TUJUAN</label>
                        <div class="col-lg-9"><input type="text" id="tujuan"name="tujuan"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['KODE_TUJUAN'];?>
" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="diterima">DITERIMA</label>
                        <div class="col-lg-9"><input type="text" id="diterima"name="diterima"class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['DITERIMA'];?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>disabled<?php }?>></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="catatan">CATATAN KELUAR UNIT</label>
                        <div class="col-lg-9"><input type="text" id="catatan"name="catatan"class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['KET_KELUAR'];?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>disabled<?php }?>></div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_confirm">TANGGAL KONFIRMASI</label>
                        <div class="col-lg-9"><input type="text" id="tgl_confirm"name="tgl_confirm"class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM'],'%d-%m-%Y');?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="confirm_by">KONFIRMASI OLEH</label>
                        <div class="col-lg-9"><input type="text" id="confirm_by"name="confirm_by"class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['CONFIRMBY'];?>
" disabled></div>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-warning" type="submit" id="submit" <?php if ($_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>disabled<?php }?>><i class="fa fa-check"></i> Konfirmasi</button>
                        </div>
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