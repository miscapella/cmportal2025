<?php /* Smarty version Smarty-3.1.13, created on 2023-03-31 14:43:50
         compiled from "ui\theme\softhash\prog\GAS\lap-po.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6173909163e1b556038bc7-64693992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '604d826ebe6c021accbcccfaa95ea697df0fcfc6' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\lap-po.tpl',
      1 => 1680248536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6173909163e1b556038bc7-64693992',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63e1b55607d375_18909931',
  'variables' => 
  array (
    '_url' => 0,
    'today' => 0,
    'opt_supplier' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63e1b55607d375_18909931')) {function content_63e1b55607d375_18909931($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan PO</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/laporan-po/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="text" id="periode"name="periode"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-4 control-label" for="supplier">Supplier</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="supplier" name="supplier">
                                <?php echo $_smarty_tpl->tpl_vars['opt_supplier']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                        <select name="status" id="status" class="form-control">
                            <option value="PENDING">PENDING</option>
                            <option value="APPROVE">APPROVE</option>
                            <option value="REJECT">REJECT</option>
                            <option value="CANCEL">CANCEL</option>
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