<?php /* Smarty version Smarty-3.1.13, created on 2024-09-04 08:55:07
         compiled from "ui\theme\softhash\prog\GAS\list-mintabarang-departemen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18455375066d7bb74525c55-37737283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad5cfb44feb29c2086c76ee550fb61db508b5568' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-mintabarang-departemen.tpl',
      1 => 1725414821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18455375066d7bb74525c55-37737283',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66d7bb74579169_14214090',
  'variables' => 
  array (
    'msg' => 0,
    'department' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66d7bb74579169_14214090')) {function content_66d7bb74579169_14214090($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
            <div class="panel-body">
				<h2><?php echo $_smarty_tpl->tpl_vars['department']->value['nama_dept'];?>
 - DAFTAR USER REQUEST</h2>
				<table id='list-mintabarang' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 15%">Tanggal</th>
						<th style="width: 27%">Dibuat Oleh</th>
						<th style="width: 25%; vertical-align: middle;">
							<div class="header-container" style="display: flex; align-items: center; gap: 8px;">
								<span>Status</span>
								<select id="status-filter" style="width: 50%; padding: 0; line-height: 1.5;">
									<option value="">Semua</option>
									<option value="PENDING">Pending</option>
									<option value="APPROVED">Approved</option>
									<option value="REJECTED">Rejected</option>
									<option value="CANCEL">Cancelled</option>
								</select>
							</div>
						</th>
						<th class="text-right" style="width: 15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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