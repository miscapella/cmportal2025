<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:31
         compiled from "ui\theme\softhash\prog\KUBOTA\lapjual.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12150939296358a59fe2b978-96588588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '302a22032f73930ab86ffe8f10c215783141ebb2' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\lapjual.tpl',
      1 => 1513056134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12150939296358a59fe2b978-96588588',
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
  'unifunc' => 'content_6358a59fe7f1e7_88707214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a59fe7f1e7_88707214')) {function content_6358a59fe7f1e7_88707214($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Penjualan</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/lapjual-print" id="tform" role="form">
                    <div class="form-group">
                        <label for="fdate" class="col-sm-4 control-label">Periode</label>
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