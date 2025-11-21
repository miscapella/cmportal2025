<?php /* Smarty version Smarty-3.1.13, created on 2024-07-22 10:32:02
         compiled from "ui\theme\softhash\prog\INV-CGT\form-pelaporan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1975388923669dd2913e62d9-06664133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14fc60e02e04f321a9263d7b22010303a41f4c5b' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\form-pelaporan.tpl',
      1 => 1721619121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1975388923669dd2913e62d9-06664133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_669dd2914230a7_45988769',
  'variables' => 
  array (
    'msg' => 0,
    'cid' => 0,
    'd' => 0,
    'inventaris_record' => 0,
    'item_record' => 0,
    'item' => 0,
    'pilih' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_669dd2914230a7_45988769')) {function content_669dd2914230a7_45988769($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<input type="hidden" id="id_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
<div class="section" id="section1">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body" style="background-color: #ccc">
          <input
            style="display: none"
            type="text"
            id="kode"
            class="form-control"
            value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_form'];?>
"
          />
          <h3 style="text-align: center">
            <b>Form Pelaporan <?php echo $_smarty_tpl->tpl_vars['inventaris_record']->value['nama_inventaris'];?>
</b>
          </h3>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="alert alert-danger emsg" id="emsg">
        <a href="#"
          ><i class="fa fa-times" style="float: right" id="closeMsg1"></i
        ></a>
        <span id="emsgbody"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <pre style="all: unset; white-space: pre-wrap"><?php echo $_smarty_tpl->tpl_vars['d']->value['deskripsi'];?>
</pre>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <form id="formpelaporan" class="panel-body form-zoom" style="margin: 0">
          <div class="form-group">
            <label class="control-label label-pertanyaan" for="item_select"
              >Pilih Item</label
            ><br />
            <select
              name="item_select"
              id="item_select"
            >
              <option value="">Pilih Item</option>
              <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_record']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['kode_item'];?>
|<?php echo $_smarty_tpl->tpl_vars['item']->value['nama_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nama_item'];?>
</option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="control-label label-pertanyaan"
              >Pilih Komponen?</label
            >
            <br />
            <pre style="all: unset; white-space: pre-wrap">(centang jika ingin melaporkan komponen item yang dipilih)</pre
            >
            <br />
            <input
              id="komponen_check_box"
              type="checkbox"
              name="komponen_check_box"
              value="<?php echo $_smarty_tpl->tpl_vars['pilih']->value;?>
"
              disabled
            /><label style="font-weight: normal"> <?php echo $_smarty_tpl->tpl_vars['pilih']->value;?>
</label><br />
          </div>
          <div
            class="form-group"
            style="display: none"
            id="form-group-komponen"
          >
            <label class="control-label label-pertanyaan" for="jawaban"
              >Pilih Komponen</label
            ><br />
            <select
              name="komponen_select"
              id="komponen_select"
            >
              <option value="">Pilih Komponen</option>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label label-pertanyaan" for="jawaban"
              >Rincian Permasalahan</label
            ><br />
            <textarea
              name="detail_permasalahan"
              id="detail_permasalahan"
              class="form-control"
              rows="5"
              style="resize: none; width: 100%"
            ></textarea>
          </div>
          <!-- Hidden Input -->
          <input type="hidden" id="inventaris" name="inventaris" value="<?php echo $_smarty_tpl->tpl_vars['inventaris_record']->value['kode_inventaris'];?>
|<?php echo $_smarty_tpl->tpl_vars['inventaris_record']->value['nama_inventaris'];?>
">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <button class="btn btn-danger" type="submit" id="submit">Submit</button>
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