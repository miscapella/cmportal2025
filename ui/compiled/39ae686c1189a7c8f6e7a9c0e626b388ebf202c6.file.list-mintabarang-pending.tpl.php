<?php /* Smarty version Smarty-3.1.13, created on 2024-08-30 13:27:44
         compiled from "ui\theme\softhash\prog\GAS\list-mintabarang-pending.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23385453665e14505ab2072-23045969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39ae686c1189a7c8f6e7a9c0e626b388ebf202c6' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-mintabarang-pending.tpl',
      1 => 1724999219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23385453665e14505ab2072-23045969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_65e14505afd051_12088722',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'administrator' => 0,
    '_L' => 0,
    'dept_head' => 0,
    'service_head' => 0,
    'ga_admin' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65e14505afd051_12088722')) {function content_65e14505afd051_12088722($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
    </div>
</div>
<br>

<?php if ($_smarty_tpl->tpl_vars['administrator']->value){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
				<h2>ADMINISTRATOR - DAFTAR USER REQUEST PENDING</h2>
				<table id='administrator-list-mintabarang-pending' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
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
 - DAFTAR USER REQUEST PENDING</h2>
				<table id='dept-list-mintabarang-pending' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 23%">Dibuat Oleh</th>
						<th style="width: 15%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
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
				<h2>SERVICE HEAD - DAFTAR USER REQUEST PENDING</h2>
				<table id='service-head-list-mintabarang-pending' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
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
				<h2>GA ADMIN - DAFTAR USER REQUEST PENDING</h2>
				<table id='gaadmin-list-mintabarang-pending' class="table table-bordered table-hover sys_table">
					<thead>
					<tr>
						<th style="width: 3%">#</th>
						<th style="width: 15%">No. Request</th>
						<th style="width: 20%">Dibuat Oleh</th>
						<th style="width: 15%">Departemen</th>
						<th style="width: 10%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
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

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR USER REQUEST PENDING</h2>
                <table id="list-mintabarang-pending" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. Request</th>
                        <th style="width: 15%">Tanggal</th>
						<!-- <th style="width: 15%">Unit Kerja</th> -->
                        <th style="width: 15%">Nomor</th>
                        <th style="width: 15%">Status UR</th>
						<th style="width: 15%">Status PR</th>
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