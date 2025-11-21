<?php /* Smarty version Smarty-3.1.13, created on 2024-07-16 15:36:10
         compiled from "ui\theme\softhash\prog\INV-CGT\list-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1598660213669630395e4bc3-38839616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5065a71c1124239c973984f98b0b909b11649f50' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\list-inventaris.tpl',
      1 => 1721118969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1598660213669630395e4bc3-38839616',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66963039617924_10417104',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66963039617924_10417104')) {function content_66963039617924_10417104($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">
    ×
  </button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
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
              <th width="20%">Kode Inventaris</th>
              <th width="20%">Nama Inventaris</th>
              <th width="20%">Dipakai Oleh</th>
              <th width="30%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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