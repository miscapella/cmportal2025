<?php /* Smarty version Smarty-3.1.13, created on 2023-07-26 11:38:52
         compiled from "ui\theme\softhash\prog\KEBUN\lap-pemenuhan-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133299982464c0a35c007194-14005111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '235f4da170590bb08c212363c0ccc71eaaed3c57' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\lap-pemenuhan-pr.tpl',
      1 => 1685323740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133299982464c0a35c007194-14005111',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'today' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64c0a35c08d227_29965238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64c0a35c08d227_29965238')) {function content_64c0a35c08d227_29965238($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Pemenuhan PR</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/laporan-pemenuhan-pr/" id="rform">
                    <div class="form-group">
                        <label for="dari" class="col-sm-4 control-label">Dari Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" id="dari" name="dari" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sampai" class="col-sm-4 control-label">Sampai Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" id="sampai" name="sampai" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>