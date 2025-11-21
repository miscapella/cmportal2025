<?php /* Smarty version Smarty-3.1.13, created on 2025-05-21 09:28:47
         compiled from "ui\theme\softhash\prog\HRD\masterdata-karyawan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:344550821682d3a5f123e53-81813110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b34c8fc7a33ef98026bc386d501685a0eca02a1' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\masterdata-karyawan.tpl',
      1 => 1744703589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '344550821682d3a5f123e53-81813110',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'dataDate' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_682d3a5f155566_12015433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_682d3a5f155566_12015433')) {function content_682d3a5f155566_12015433($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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