<?php /* Smarty version Smarty-3.1.13, created on 2023-03-14 14:04:37
         compiled from "ui\theme\softhash\prog\KUBOTA\ajax.contact-invoices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127700884664101c85256df2-78850187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '626f2238790c8bd3960d5fde64844f194988f345' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\ajax.contact-invoices.tpl',
      1 => 1513229426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127700884664101c85256df2-78850187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    'i' => 0,
    'is' => 0,
    '_c' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64101c852e92e5_54153332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64101c852e92e5_54153332')) {function content_64101c852e92e5_54153332($_smarty_tpl) {?><table class="table table-bordered table-hover sys_table">
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
        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
    </tr>
    </thead>
    <tbody>

    <?php  $_smarty_tpl->tpl_vars['is'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['is']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['i']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['is']->key => $_smarty_tpl->tpl_vars['is']->value){
$_smarty_tpl->tpl_vars['is']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['is']->value['invoicenum'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['is']->value['account'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['is']->value['total'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['is']->value['date']));?>
</td>
            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['is']->value['duedate']));?>
</td>
            <td><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['is']->value['status']);?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['is']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['is']->value['id'];?>
/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table><?php }} ?>