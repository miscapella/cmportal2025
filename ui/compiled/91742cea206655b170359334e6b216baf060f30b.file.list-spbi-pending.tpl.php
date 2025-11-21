<?php /* Smarty version Smarty-3.1.13, created on 2023-12-14 09:18:55
         compiled from "ui\theme\softhash\prog\KEBUN\list-spbi-pending.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1891392618657957b31b95e3-22644925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91742cea206655b170359334e6b216baf060f30b' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-spbi-pending.tpl',
      1 => 1702520314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1891392618657957b31b95e3-22644925',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_657957b3213778_57792188',
  'variables' => 
  array (
    'msg' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_657957b3213778_57792188')) {function content_657957b3213778_57792188($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
               <h2>SURAT PENGANTARAN BARANG INTERN PENDING</h2>
                <table id="datatablespbipending" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">Tgl PO</th>
                        <th style="width: 13%">No. PO</th>
						<th style="width: 15%">Supplier</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th class="text-right" style="width: 20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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