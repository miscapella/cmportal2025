<?php /* Smarty version Smarty-3.1.13, created on 2025-04-15 14:53:10
         compiled from "ui\theme\softhash\prog\HRD\analitik-masterdata.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167962028367f726c66b1d44-94715715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee1700501228c6f59310f3029f6dbc3a768a85da' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\analitik-masterdata.tpl',
      1 => 1744703589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167962028367f726c66b1d44-94715715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67f726c66de9c7_53041637',
  'variables' => 
  array (
    '_url' => 0,
    'dataDate' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67f726c66de9c7_53041637')) {function content_67f726c66de9c7_53041637($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
analitik/update/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Perbarui Master Data</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Employees - <span class="tdate"><?php echo $_smarty_tpl->tpl_vars['dataDate']->value;?>
</span></h1>
                <br>
                <table id="datatable-karyawan" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="20%">Employee Id</th>
                            <th width="30%">Employee Name</th>
                            <th width="20%">Years In Service</th>
                            <th width="15%">Grade</th>
                            <th width="12%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Terminated Employees - <span class="tdate"><?php echo $_smarty_tpl->tpl_vars['dataDate']->value;?>
</span></h1>
                <br>
                <table id="datatable-ex-karyawan" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="16%">Employee Id</th>
                            <th width="28%">Employee Name</th>
                            <th width="16%">Years In Service</th>
                            <th width="10%">Grade</th>
                            <th width="15%">Termination Date</th>
                            <th width="12%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>