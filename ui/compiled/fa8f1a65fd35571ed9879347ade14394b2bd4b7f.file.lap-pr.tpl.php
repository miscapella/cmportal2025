<?php /* Smarty version Smarty-3.1.13, created on 2023-03-24 15:16:40
         compiled from "ui\theme\softhash\prog\GAS\lap-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90295040641d5c68553f26-16549299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa8f1a65fd35571ed9879347ade14394b2bd4b7f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\lap-pr.tpl',
      1 => 1679645601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90295040641d5c68553f26-16549299',
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
  'unifunc' => 'content_641d5c685a9039_16422891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_641d5c685a9039_16422891')) {function content_641d5c685a9039_16422891($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan PR</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan/laporan-pr/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="text" id="periode"name="periode"class="form-control"value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" readonly>
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