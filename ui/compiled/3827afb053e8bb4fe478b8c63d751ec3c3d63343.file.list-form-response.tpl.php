<?php /* Smarty version Smarty-3.1.13, created on 2024-05-22 16:38:38
         compiled from "ui\theme\softhash\prog\FORM\list-form-response.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18402785626459aa4ddd6a60-59937021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3827afb053e8bb4fe478b8c63d751ec3c3d63343' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\list-form-response.tpl',
      1 => 1716370277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18402785626459aa4ddd6a60-59937021',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6459aa4de18857_84161480',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'form' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6459aa4de18857_84161480')) {function content_6459aa4de18857_84161480($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h1 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['form']->value['kode_form'];?>
 - <?php echo $_smarty_tpl->tpl_vars['form']->value['nama_form'];?>
</h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <input type="hidden" name="kode_form" id="kode_form" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kode_form'];?>
">
                <table id="datatable-response" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;text-align: center;">#</th>
                        <th style="width: 10%;text-align: center;">Request Id</th>
                        <th style="width: 15%;text-align: center;">Request Date</th>
                        <th style="width: 25%;text-align: center;">Respondent Name</th>
                        <th style="width: 20%;text-align: center;">Unit Usaha</th>
                        <th style="width: 10%;text-align: center;">Status</th>
                        <th style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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