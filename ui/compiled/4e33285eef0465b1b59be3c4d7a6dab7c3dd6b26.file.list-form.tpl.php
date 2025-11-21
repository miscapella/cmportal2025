<?php /* Smarty version Smarty-3.1.13, created on 2024-07-24 16:30:54
         compiled from "ui\theme\softhash\prog\INV-CGT\list-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118273143566a0c69a2472e9-34799072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e33285eef0465b1b59be3c4d7a6dab7c3dd6b26' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\list-form.tpl',
      1 => 1721813453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118273143566a0c69a2472e9-34799072',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66a0c69a2803d8_99021279',
  'variables' => 
  array (
    'msg' => 0,
    'id_inventaris' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66a0c69a2803d8_99021279')) {function content_66a0c69a2803d8_99021279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">
    ×
  </button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<input type="hidden" id="id_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
" />
<div class="row">
  <div class="col-md-9">
    <div class="hexagon-container3">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="hexagon3">Inventaris</a>
    </div>
  </div>
  <div class="col-md-3">
    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Inventaris</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="card-body panel-body">
        <table id="datatable" class="table table-bordered table-hover sys_table">
          <thead>
            <tr>
              <th width="3%">#</th>
              <th width="25%">Kode Form</th>
              <th width="25%">Tgl Pengajuan</th>
              <th width="25%">Status</th>
              <th width="15%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>