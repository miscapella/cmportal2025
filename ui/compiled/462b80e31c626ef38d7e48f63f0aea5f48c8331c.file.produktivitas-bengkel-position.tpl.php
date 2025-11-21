<?php /* Smarty version Smarty-3.1.13, created on 2025-05-23 14:13:18
         compiled from "ui\theme\softhash\prog\HRD\produktivitas-bengkel-position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2087004651682ff21a6b66c1-63324184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '462b80e31c626ef38d7e48f63f0aea5f48c8331c' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\produktivitas-bengkel-position.tpl',
      1 => 1747984397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2087004651682ff21a6b66c1-63324184',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682ff21a70b8e9_82857157',
  'variables' => 
  array (
    '_url' => 0,
    'cabang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682ff21a70b8e9_82857157')) {function content_682ff21a70b8e9_82857157($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-bengkel/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <input type="hidden" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cabang']->value['id'];?>
">
                    <table id="datatable-position" class="table table-bordered table-hover sys_table">
                        <thead>
                            <tr>
                                <th width="3%" style="background: transparent;"><input type="checkbox" id="all"></th>
                                <th width="3%">#</th>
                                <th width="35%">Position Id</th>
                                <th width="59%">Position Title</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>