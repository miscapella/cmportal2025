<?php /* Smarty version Smarty-3.1.13, created on 2024-07-22 15:59:48
         compiled from "ui\theme\softhash\prog\KEBUN\list-mintabarang-pending.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29251056965bc8d68a0b2a7-21751846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b32429d0369617932976a653565c2b20708e44' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-mintabarang-pending.tpl',
      1 => 1721638775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29251056965bc8d68a0b2a7-21751846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65bc8d68a601a0_99289999',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65bc8d68a601a0_99289999')) {function content_65bc8d68a601a0_99289999($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-mintabarang/">
					<div class="form-group">						
						<label  class="control-label col-md-2" for="cbstatus">Status User Request :</label>
						<div class="col-md-2">
							<select class="form-control" id="cbstatus">
							<option value="All">All</option>
							<option value="Pending" selected>Pending</option>
							<option value="Approved">Approved</option>
							<option value="Reject">Reject</option>							
							</select>
						</div>
						<div class="col-md-2">
							<button class="btn btn-success btn-block btnrefresh"><i class="fa fa-refresh"></i>  Refresh</button>
						</div>
						<div class="col-md-3"></div>
						<div class="col-md-3">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
						</div>
					</div>
					
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR USER REQUEST PENDING</h2>
                <table id="list-mintabarang-pending" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">No. Request</th>
                        <th style="width: 13%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
                        <th style="width: 15%">Nomor</th>
                        <th style="width: 10%">Status</th>
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