<?php /* Smarty version Smarty-3.1.13, created on 2024-08-29 15:46:09
         compiled from "ui\theme\softhash\prog\GAS\list-mintabarang-cancelled-pribadi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66563568066d035511d6b80-78603800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a94ea03c1ac5c718fcaa3fd31606a9a43dab432' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-mintabarang-cancelled-pribadi.tpl',
      1 => 1724921153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66563568066d035511d6b80-78603800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66d0355120b4c9_44787815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66d0355120b4c9_44787815')) {function content_66d0355120b4c9_44787815($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
               <h2>DAFTAR USER REQUEST CANCELLED</h2>
                <table id="list-mintabarang-cancelled" class="table table-bordered table-hover sys_table">
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