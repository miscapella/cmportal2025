<?php /* Smarty version Smarty-3.1.13, created on 2024-05-22 11:37:07
         compiled from "ui\theme\softhash\prog\FORM\list-approval.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1622705191655341ec43bbb7-42055646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77366149534f60c0045f9406a68a0c7bb42edf02' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\list-approval.tpl',
      1 => 1716352528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1622705191655341ec43bbb7-42055646',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_655341ec4910c3_60312364',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_655341ec4910c3_60312364')) {function content_655341ec4910c3_60312364($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <table id='datatable-list-approval' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 20%;">Tanggal Request</th>
                        <th style="width: 20%;">Nama Form</th>
                        <th style="width: 20%;">Nama Respondent</th>
                        <th style="width: 10%;">Details</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>                                        
                    <tbody>					
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>