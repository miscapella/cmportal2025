<?php /* Smarty version Smarty-3.1.13, created on 2023-11-07 13:31:30
         compiled from "ui\theme\softhash\prog\UNIT\mutasi-batal-konfirmasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1399554304654863b57b07e2-21849162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c62577c35882e6cc002eda7815469ac40373e773' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\mutasi-batal-konfirmasi.tpl',
      1 => 1699338684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1399554304654863b57b07e2-21849162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_654863b57ffe91_39488361',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_654863b57ffe91_39488361')) {function content_654863b57ffe91_39488361($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Batal Konfirmasi Mutasi Mobil</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
mutasi/list" class="btn btn-primary btn-xs">Back</a>
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
                    <div class="form-group"><label class="col-lg-3 control-label" for="alasanbatal">ALASAN BATAL</label>
                        <div class="col-lg-9"><input type="text" id="alasanbatal"name="alasanbatal"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ALASANBATAL'];?>
" <?php if (!$_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>disabled<?php }?>></div>
                    </div>
                    <?php if (!$_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>
                    <div class="form-group"><label class="col-lg-3 control-label" for="tgl_batal_confirm">TANGGAL BATAL KONFIRMASI</label>
                        <div class="col-lg-9"><input type="text" id="tgl_batal_confirm"name="tgl_batal_confirm"class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['TGL_BTLCONFIRM'];?>
" disabled></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="batal_confirm_by">BATAL KONFIRMASI OLEH</label>
                        <div class="col-lg-9"><input type="text" id="batal_confirm_by"name="batal_confirm_by"class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['BATAL_CONFIRMBY'];?>
" disabled></div>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-danger" type="submit" id="submit" <?php if (!$_smarty_tpl->tpl_vars['d']->value['TGL_CONFIRM']){?>disabled<?php }?>><i class="fa fa-check"></i> Batal Konfirmasi</button>
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