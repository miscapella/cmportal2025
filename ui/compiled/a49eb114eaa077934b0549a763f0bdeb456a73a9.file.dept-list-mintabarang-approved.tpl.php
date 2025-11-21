<?php /* Smarty version Smarty-3.1.13, created on 2024-08-29 16:45:07
         compiled from "ui\theme\softhash\prog\GAS\dept-list-mintabarang-approved.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178993934466d03e7b99fad0-02898838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a49eb114eaa077934b0549a763f0bdeb456a73a9' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\dept-list-mintabarang-approved.tpl',
      1 => 1724924653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178993934466d03e7b99fad0-02898838',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66d03e7b9fda79_75345198',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66d03e7b9fda79_75345198')) {function content_66d03e7b9fda79_75345198($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <?php if ($_smarty_tpl->tpl_vars['d']->value){?>
               		<h2>DAFTAR USER REQUEST APPROVED - <?php echo $_smarty_tpl->tpl_vars['d']->value['nama_dept'];?>
</h2>
					<table id='list-mintabarang-approved' class="table table-bordered table-hover sys_table">
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
				<?php }else{ ?>
               		<h2>User Request tidak ditemukan</h2>
				<?php }?>
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