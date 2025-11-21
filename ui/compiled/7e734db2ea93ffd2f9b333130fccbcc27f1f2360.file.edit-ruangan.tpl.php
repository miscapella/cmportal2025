<?php /* Smarty version Smarty-3.1.13, created on 2025-02-19 12:25:48
         compiled from "ui\theme\softhash\edit-ruangan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138677191367b56a41b1f923-28837132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e734db2ea93ffd2f9b333130fccbcc27f1f2360' => 
    array (
      0 => 'ui\\theme\\softhash\\edit-ruangan.tpl',
      1 => 1739942687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138677191367b56a41b1f923-28837132',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67b56a41b57b46_18670389',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67b56a41b57b46_18670389')) {function content_67b56a41b57b46_18670389($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-8">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Edit Ruangan</h5>
          <div class="ibox-tools">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ruangan/list" class="btn btn-primary btn-xs"
              >List Ruangan</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>

          <form class="form-horizontal" id="rform">
            <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" />
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_ruangan"
                >Nama Ruangan</label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_ruangan"
                  name="nama_ruangan"
                  class="form-control"
                  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_ruangan'];?>
"
                />
              </div>
            </div>
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
                />
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit" id="submit">
                  <i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>

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