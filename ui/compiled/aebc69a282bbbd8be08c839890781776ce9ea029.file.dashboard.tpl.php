<?php /* Smarty version Smarty-3.1.13, created on 2023-05-12 13:20:10
         compiled from "ui\theme\softhash\prog\FORM\dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11582050816458be303cc854-33240937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aebc69a282bbbd8be08c839890781776ce9ea029' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\dashboard.tpl',
      1 => 1683872408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11582050816458be303cc854-33240937',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6458be3049d232_39114764',
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
    'invoices' => 0,
    'ds' => 0,
    '_c' => 0,
    'inc' => 0,
    'incs' => 0,
    'exp' => 0,
    'exps' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6458be3049d232_39114764')) {function content_6458be3049d232_39114764($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- <div class="row">
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Persetujuan Item Stock</span>
                    <h3 class="font-bold">0</h3>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list-approve/" class="btn btn-success btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-th-list fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Persetujuan Inventaris</span>
                    <h3 class="font-bold">0</h3>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list-approve/" class="btn btn-success btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-file fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Purchase Requisition (PR)</span>
                    <h3 class="font-bold">0</h3>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr-aprv/" class="btn btn-warning btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg info-tile info-tile-alt tile-teal">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span>Purchase Order (PO)</span>
                    <h3 class="font-bold">0</h3>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-po-aprv/" class="btn btn-warning btn-xs">Daftar Persetujuan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="sort_4">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Recent Invoices'];?>
</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoicenum'];?>
<?php if ($_smarty_tpl->tpl_vars['ds']->value['cn']!=''){?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['cn'];?>
 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
 <?php }?></a> </td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['userid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</a> </td>
                            <td class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-d-group="3"><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['duedate']));?>
</td>
                            <td>
                                <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>


                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['r']=='0'){?>
                                    <span class="label label-success"><i class="fa fa-dot-circle-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Onetime'];?>
</span>
                                <?php }else{ ?>
                                    <span class="label label-success"><i class="fa fa-repeat"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Recurring'];?>
</span>
                                <?php }?>
                            </td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>

    <div class="row" id="sort_3">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest Income'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <?php  $_smarty_tpl->tpl_vars['incs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['incs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['incs']->key => $_smarty_tpl->tpl_vars['incs']->value){
$_smarty_tpl->tpl_vars['incs']->_loop = true;
?>
                            <tr>
                                <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['incs']->value['date']));?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['incs']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['incs']->value['description'];?>
</a> </td>
                                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['incs']->value['amount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                            </tr>
                        <?php } ?>



                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest Expense'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <?php  $_smarty_tpl->tpl_vars['exps'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['exps']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['exp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['exps']->key => $_smarty_tpl->tpl_vars['exps']->value){
$_smarty_tpl->tpl_vars['exps']->_loop = true;
?>
                            <tr>
                                <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['exps']->value['date']));?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['exps']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['exps']->value['description'];?>
</a> </td>
                                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['exps']->value['amount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                            </tr>
                        <?php } ?>



                    </table>
                </div>
            </div>

        </div>
    </div> -->

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>