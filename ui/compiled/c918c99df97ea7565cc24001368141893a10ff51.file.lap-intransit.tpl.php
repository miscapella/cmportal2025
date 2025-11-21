<?php /* Smarty version Smarty-3.1.13, created on 2023-12-04 11:09:41
         compiled from "ui\theme\softhash\prog\UNIT\lap-intransit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1206521009656d46ee7100c2-59371393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c918c99df97ea7565cc24001368141893a10ff51' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\lap-intransit.tpl',
      1 => 1701662979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1206521009656d46ee7100c2-59371393',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_656d46ee7666a7_66306535',
  'variables' => 
  array (
    '_url' => 0,
    'today' => 0,
    'ekspedisi' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_656d46ee7666a7_66306535')) {function content_656d46ee7666a7_66306535($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Stock Intransit</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/laporan-intransit/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="date" id="periode"name="periode"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ekspedisi" class="col-sm-4 control-label">Ekspedisi</label>
                        <div class="col-sm-8">
                        <select name="ekspedisi" id="ekspedisi" class="form-control">
                            <option value="SEMUA">SEMUA</option>
                           <?php echo $_smarty_tpl->tpl_vars['ekspedisi']->value;?>

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