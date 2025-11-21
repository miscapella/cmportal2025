<?php /* Smarty version Smarty-3.1.13, created on 2025-05-02 14:48:46
         compiled from "ui\theme\softhash\prog\HRD\analitik-grafik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134941883467ff28b27f78b0-57557881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4df202a7faa13d5653b3b64e87f2657acd28f0e9' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\analitik-grafik.tpl',
      1 => 1746172118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134941883467ff28b27f78b0-57557881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67ff28b293de88_07509557',
  'variables' => 
  array (
    'data' => 0,
    'boilerplate' => 0,
    'headerTitle' => 0,
    'dataDate' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67ff28b293de88_07509557')) {function content_67ff28b293de88_07509557($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	const _data = <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
;
	const _boilerplate = <?php echo $_smarty_tpl->tpl_vars['boilerplate']->value;?>
;
</script>

<div class="row" style="position: sticky; top: 50px; z-index: 50;">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-12"><h3><?php echo $_smarty_tpl->tpl_vars['headerTitle']->value;?>
 - <span class="tdate"><?php echo $_smarty_tpl->tpl_vars['dataDate']->value;?>
</span></h3></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="grafik" style="display: flex; flex-direction: column; gap: 64px;"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="chart-table-detail" tabindex="-1" role="dialog" aria-labelledby="chartDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="chart-table" class="table table-bordered table-hover sys_table">
                    <thead>
						<th width="3%">#</th>
						<th width="16%">Employee Id</th>
						<th width="28%">Employee Name</th>
						<th width="15%">Terminated</th>
						<th width="16%">Years In Service</th>
						<th width="10%">Grade</th>
						<th width="12%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="chart-table-cuti-detail" tabindex="-1" role="dialog" aria-labelledby="chartDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="chart-table-cuti" class="table table-bordered table-hover sys_table">
                    <thead>
						<th width="3%">#</th>
						<th width="12%">Employee Id</th>
						<th width="24%">Employee Name</th>
						<th width="10%">Terminated</th>
						<th width="18%">Request Date</th>
						<th width="11%">Request Status</th>
						<th width="15%">Number of Working Applied</th>
						<th width="7%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>