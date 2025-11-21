<?php /* Smarty version Smarty-3.1.13, created on 2024-09-04 08:43:10
         compiled from "ui\theme\softhash\prog\GAS\list-mintabarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197647673366d0386b4ee0b1-13874500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c896ffab07529cb6516463200c58e9a4140c72b6' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-mintabarang.tpl',
      1 => 1725414189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197647673366d0386b4ee0b1-13874500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66d0386b522739_69653027',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'administrator' => 0,
    'dept_head' => 0,
    'service_head' => 0,
    'ga_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66d0386b522739_69653027')) {function content_66d0386b522739_69653027($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<!-- <div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-mintabarang/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor UR..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div> -->
<div class="row">
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Buat User Request</a>
    </div>
</div>
<br>

<!-- <?php if ($_smarty_tpl->tpl_vars['administrator']->value){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>ADMINISTRATOR - DAFTAR USER REQUEST</h2>
				<table id='administrator-list-mintabarang' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
						<th style="width: 13%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['dept_head']->value){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2><?php echo $_smarty_tpl->tpl_vars['dept_head']->value['nama_dept'];?>
 - DAFTAR USER REQUEST</h2>
				<table id='dept-list-mintabarang' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 23%">Dibuat Oleh</th>
						<th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
						<th style="width: 20%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['service_head']->value){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>SERVICE HEAD - DAFTAR USER REQUEST</h2>
				<table id='service-head-list-mintabarang' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
						<th style="width: 13%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ga_admin']->value){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>GA ADMIN - DAFTAR USER REQUEST</h2>
				<table id='gaadmin-list-mintabarang' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
						<th style="width: 13%">Nomor</th>
						<th style="width: 10%">Status UR</th>
						<th style="width: 10%">Status PR</th>
						<th class="text-right" style="width: 5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
<?php }?> -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               	<h2>DAFTAR USER REQUEST</h2>
                <table id='list-mintabarang' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%; vertical-align: middle;">#</th>
                        <th style="width: 29%; vertical-align: middle;">No. Request</th>
                        <th style="width: 28%; vertical-align: middle;">Tanggal</th>
						<!-- <th style="width: 15%; vertical-align: middle;">Unit Kerja</th> -->
                        <!-- <th style="width: 15%; vertical-align: middle;">Nomor</th> -->
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
						<!-- <th style="width: 10%; vertical-align: middle;">Status PR</th> -->
                        <th class="text-right" style="width: 15%; vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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