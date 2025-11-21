<?php /* Smarty version Smarty-3.1.13, created on 2024-08-29 15:09:26
         compiled from "ui\theme\softhash\prog\GAS\list-mintabarang-pending-pribadi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203103744766d02c9178b2c9-76745777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '967b61e60d8ae5b77d5fa5f60b28800bb88d0ee7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-mintabarang-pending-pribadi.tpl',
      1 => 1724918964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203103744766d02c9178b2c9-76745777',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66d02c917e3882_44663125',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66d02c917e3882_44663125')) {function content_66d02c917e3882_44663125($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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