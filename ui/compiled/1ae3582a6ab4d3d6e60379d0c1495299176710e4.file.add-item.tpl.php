<?php /* Smarty version Smarty-3.1.13, created on 2024-07-16 13:59:27
         compiled from "ui\theme\softhash\prog\INV-CGT\add-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5282654036695f557c51d04-41951560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ae3582a6ab4d3d6e60379d0c1495299176710e4' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\add-item.tpl',
      1 => 1721112783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5282654036695f557c51d04-41951560',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6695f557ca0b70_67292835',
  'variables' => 
  array (
    '_url' => 0,
    'inv_id' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6695f557ca0b70_67292835')) {function content_6695f557ca0b70_67292835($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <div class="ibox-tools">
            <a
              href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/detail/<?php echo $_smarty_tpl->tpl_vars['inv_id']->value;?>
"
              class="btn btn-primary btn-xs"
              >Daftar Item</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>
          <form class="form-horizontal" id="rformitem">
            <div class="col-lg-12">
              <h1 class="text-center">Detail Item</h1>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_item"
                >Nama Item <span style="color: red">*</span></label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_item"
                  name="nama_item"
                  class="form-control"
                  style="text-transform: uppercase"
                  placeholder="Nama Item"
                />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="ada_komponen"
                >Terdapat Komponen</label
              >
              <div class="col-lg-8">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="ada_komponen"
                  name="ada_komponen"
                  value="Y"
                />
              </div>
            </div>
            <!-- Hidden Input -->
            <input
              type="hidden"
              id="id_inventaris"
              name="id_inventaris"
              value="<?php echo $_smarty_tpl->tpl_vars['inv_id']->value;?>
"
            />
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