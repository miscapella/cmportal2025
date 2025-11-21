<?php /* Smarty version Smarty-3.1.13, created on 2023-11-16 14:12:33
         compiled from "ui\theme\softhash\prog\FORM\list-response-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9421437946461d71909c045-88227920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '205e05c10ac28ae0a7ca8571f21471b945e1edd1' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\list-response-detail.tpl',
      1 => 1700118751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9421437946461d71909c045-88227920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6461d7190f7a93_83034568',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'form' => 0,
    'count' => 0,
    'hasil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6461d7190f7a93_83034568')) {function content_6461d7190f7a93_83034568($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	<div class="col-md-12 text-right">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
response/list-form/" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Back</a>
    </div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
                <div class="col-md-12">
                    <h1 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['form']->value['kode_form'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['nama_form'];?>
</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="kode_form" id="kode_form" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kode_form'];?>
">
        <input type="hidden" name="count" id="count" value="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow-x: scroll;">
                <table id="datatable-response-detail" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap; width: 2%;">#</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Kode Form</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Employee Id</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Respondent</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Unit Usaha</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Tanggal</th>
                        <th style="text-align: center; vertical-align: middle;white-space: nowrap;">Status</th>
                        <?php echo $_smarty_tpl->tpl_vars['hasil']->value;?>

                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>