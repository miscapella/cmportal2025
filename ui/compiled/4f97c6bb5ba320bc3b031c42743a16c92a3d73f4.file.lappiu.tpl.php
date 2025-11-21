<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:35
         compiled from "ui\theme\softhash\prog\KUBOTA\lappiu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6475490736358a5a3091d07-81931875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f97c6bb5ba320bc3b031c42743a16c92a3d73f4' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\lappiu.tpl',
      1 => 1565066506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6475490736358a5a3091d07-81931875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'tdate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a5a30e3537_17956950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a5a30e3537_17956950')) {function content_6358a5a30e3537_17956950($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Piutang</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/piutang-print" id="tform" role="form">
                    <div class="form-group">
                        <label for="tdate" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="<?php ob_start();?><?php echo date('m-Y',strtotime($_smarty_tpl->tpl_vars['tdate']->value));?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
" name="tdate" id="tdate" datepicker data-date-format="mm-yyyy" data-auto-close="true">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>