<?php /* Smarty version Smarty-3.1.13, created on 2024-07-16 16:05:10
         compiled from "ui\theme\softhash\prog\INV-CGT\add-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10893303586694c8cf740112-03373782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a3d6b10be16f1f4803b4096c670e646749d171a' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\add-inventaris.tpl',
      1 => 1721119872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10893303586694c8cf740112-03373782',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6694c8cf773258_24057172',
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6694c8cf773258_24057172')) {function content_6694c8cf773258_24057172($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <div class="ibox-tools">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="btn btn-primary btn-xs"
              >Daftar Inventaris</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>
          <form class="form-horizontal" id="rforminventaris">
            <div class="col-lg-12">
              <h1 class="text-center">Detail Inventaris</h1>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_inventaris"
                >Nama Inventaris <span style="color: red">*</span></label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_inventaris"
                  name="nama_inventaris"
                  class="form-control"
                  style="text-transform: uppercase"
                  placeholder="Nama Inventaris"
                />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="dipakai_oleh"
                >Dipakai Oleh</label
              >
              <div class="col-lg-9">
                <select
                  name="dipakai_oleh"
                  id="dipakai_oleh"
                  class="form-control"
                >
                  <option value="">Pilih Karyawan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-3 col-lg-9">
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