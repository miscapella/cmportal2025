<?php /* Smarty version Smarty-3.1.13, created on 2024-07-16 13:53:14
         compiled from "ui\theme\softhash\prog\INV-CGT\add-komponen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1367897843669618da14f345-72341349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed2d68abf61110a2560d010a5600da4a557dc69e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\add-komponen.tpl',
      1 => 1721112792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1367897843669618da14f345-72341349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'id_inventaris' => 0,
    'id_item' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_669618da1a56c4_39802125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_669618da1a56c4_39802125')) {function content_669618da1a56c4_39802125($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <div class="ibox-tools">
            <a
              href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/detail-item/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
"
              class="btn btn-primary btn-xs"
              >Daftar Komponen</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>
          <form class="form-horizontal" id="rformkomponen">
            <div class="col-lg-12">
              <h1 class="text-center">Detail Komponen</h1>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_komponen"
                >Nama Komponen <span style="color: red">*</span></label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_komponen"
                  name="nama_komponen"
                  class="form-control"
                  style="text-transform: uppercase"
                  placeholder="Nama Komponen"
                />
              </div>
            </div>
            <!-- Hidden Input -->
            <input
              type="hidden"
              id="id_inventaris"
              name="id_inventaris"
              value="<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
"
            />
            <input
              type="hidden"
              id="id_item"
              name="id_item"
              value="<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
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