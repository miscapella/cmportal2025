<?php /* Smarty version Smarty-3.1.13, created on 2023-05-29 08:30:04
         compiled from "ui\theme\softhash\prog\FORM\laporan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1960619734645c6dac4a38c7-05315947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d2dd9056722312b6ee7af8cc7e94eddb3d2eb7f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\laporan.tpl',
      1 => 1685323786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1960619734645c6dac4a38c7-05315947',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_645c6dac4f8f86_04997569',
  'variables' => 
  array (
    '_url' => 0,
    'opt' => 0,
    'today' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_645c6dac4f8f86_04997569')) {function content_645c6dac4f8f86_04997569($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Export</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
response/export/" id="rform">
                    <div class="form-group">
                        <label for="kode_form" class="col-sm-3 control-label">Form</label>
                        <div class="col-sm-9">
                        <select name="kode_form" id="kode_form" class="form-control">
                            <?php echo $_smarty_tpl->tpl_vars['opt']->value;?>

                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control">
                                <option value="excel">Excel</option>
                                <option value="csv">Csv</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dari" class="col-sm-3 control-label">Dari Tanggal</label>
                        <div class="col-sm-9">
                            <input type="text" id="dari" name="dari" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sampai" class="col-sm-3 control-label">Sampai Tanggal</label>
                        <div class="col-sm-9">
                            <input type="text" id="sampai" name="sampai" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary">Export</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>