<?php /* Smarty version Smarty-3.1.13, created on 2025-04-22 09:23:00
         compiled from "ui\theme\softhash\prog\HRD\profil-distribusi-karyawan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14534087226800ba92a821d2-13197447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dcb6a7080c94f06d2af7789a19fdd6bc40b0498' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\profil-distribusi-karyawan.tpl',
      1 => 1745288578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14534087226800ba92a821d2-13197447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6800ba92ac0bb5_23491682',
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
<?php if ($_valid && !is_callable('content_6800ba92ac0bb5_23491682')) {function content_6800ba92ac0bb5_23491682($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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

<div class="modal fade" id="chart-detail" tabindex="-1" role="dialog" aria-labelledby="chartDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
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

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>