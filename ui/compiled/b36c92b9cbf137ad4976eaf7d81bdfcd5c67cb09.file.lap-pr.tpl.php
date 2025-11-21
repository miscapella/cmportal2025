<?php /* Smarty version Smarty-3.1.13, created on 2023-08-29 15:48:21
         compiled from "ui\theme\softhash\prog\KEBUN\lap-pr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130403534964edb0d52410a1-88823873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b36c92b9cbf137ad4976eaf7d81bdfcd5c67cb09' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\lap-pr.tpl',
      1 => 1679645601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130403534964edb0d52410a1-88823873',
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
  'unifunc' => 'content_64edb0d52d85c7_16538837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64edb0d52d85c7_16538837')) {function content_64edb0d52d85c7_16538837($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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