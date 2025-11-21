<?php /* Smarty version Smarty-3.1.13, created on 2024-05-16 08:00:55
         compiled from "ui\theme\softhash\prog\KEBUN\list-spmk-rejected.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2054446215651e6532d8aa30-32244201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2d181e53ccb1588600c82843cf420e3c2d8f6fb' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-spmk-rejected.tpl',
      1 => 1715821254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2054446215651e6532d8aa30-32244201',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_651e6532de3129_05831499',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651e6532de3129_05831499')) {function content_651e6532de3129_05831499($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <h2>SURAT PERMINTAAN KERJA REJECTED</h2>
        <table
          id="datatablespmkrejected"
          class="table table-bordered table-hover sys_table"
        >
          <thead>
            <tr>
              <th style="width: 2%">#</th>
              <th style="width: 15%">Tgl SPmK</th>
              <th style="width: 13%">No. SPmK</th>
              <th style="width: 15%">Dibuat Oleh</th>
              <th style="width: 15%">Tingkat Kepentingan</th>
              <th style="width: 15%">Status</th>
              <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <h2>SURAT PERMINTAAN KERJA BIDDING REJECTED</h2>
        <table
          id="datatablespmksuprejected"
          class="table table-bordered table-hover sys_table"
        >
          <thead>
            <tr>
              <th style="width: 2%">#</th>
              <th style="width: 15%">Tgl SPmK</th>
              <th style="width: 13%">No. SPmK</th>
              <th style="width: 15%">Dibuat Oleh</th>
              <th style="width: 15%">Tingkat Kepentingan</th>
              <th style="width: 15%">Status</th>
              <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
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