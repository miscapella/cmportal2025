<?php /* Smarty version Smarty-3.1.13, created on 2023-12-04 10:18:18
         compiled from "ui\theme\softhash\prog\UNIT\lap-gudang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104115177763870f32b7a172-79856920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8386042954c69023730a9f2ebbd274fee78d411d' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\lap-gudang.tpl',
      1 => 1701659897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104115177763870f32b7a172-79856920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63870f32baeb43_43410886',
  'variables' => 
  array (
    '_url' => 0,
    'today' => 0,
    'kode_tipe' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63870f32baeb43_43410886')) {function content_63870f32baeb43_43410886($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Stock Gudang</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/laporan-gudang/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="date" id="periode"name="periode"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_tipe" class="col-sm-4 control-label">TYPE</label>
                        <div class="col-sm-8">
                        <select name="kode_tipe" id="kode_tipe" class="form-control">
                            <option value="SEMUA">SEMUA</option>
                           <?php echo $_smarty_tpl->tpl_vars['kode_tipe']->value;?>

                        </select>
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