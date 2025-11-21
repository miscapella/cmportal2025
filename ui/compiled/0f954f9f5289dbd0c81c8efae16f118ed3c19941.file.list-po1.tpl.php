<?php /* Smarty version Smarty-3.1.13, created on 2024-12-23 11:48:51
         compiled from "ui\theme\softhash\prog\GAS\list-po1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25076986766e14d7c991682-35932714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f954f9f5289dbd0c81c8efae16f118ed3c19941' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-po1.tpl',
      1 => 1734929329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25076986766e14d7c991682-35932714',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66e14d7c9d13a9_49231897',
  'variables' => 
  array (
    'msg' => 0,
    'user' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66e14d7c9d13a9_49231897')) {function content_66e14d7c9d13a9_49231897($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<?php if (_auth2('PRINT-PO',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<input type="hidden" id="print-po" value="y"/>
<?php }else{ ?>
<input type="hidden" id="print-po" value="n"/>
<?php }?>

<div class="row">
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/add-po/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah PO</a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>PURCHASE ORDER</h2>
                <table id="datatable-po" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
						<th style="width: 15%">No. PO</th>
                        <th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Supplier</th>
                        <!--<th style="width: 15%">Tingkat Kepentingan</th>-->
                        <th style="width: 15%">Total Harga</th>
                        <th style="width: 10%">Kepentingan</th> 
                        <th style="width: 20%">Tanggal Pelunasan</th>
                        <th class="text-right" style="width: 18%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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