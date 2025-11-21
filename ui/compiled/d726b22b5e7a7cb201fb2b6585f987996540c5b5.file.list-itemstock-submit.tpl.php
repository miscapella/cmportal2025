<?php /* Smarty version Smarty-3.1.13, created on 2022-11-22 14:00:03
         compiled from "ui\theme\softhash\prog\GAS\list-itemstock-submit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2052396577637500d34fc906-18835545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd726b22b5e7a7cb201fb2b6585f987996540c5b5' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-itemstock-submit.tpl',
      1 => 1669100402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2052396577637500d34fc906-18835545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_637500d3546387_67865467',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    'opt' => 0,
    'e' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637500d3546387_67865467')) {function content_637500d3546387_67865467($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DAFTAR PENGAJUAN PERSETUJUAN SUPPLIER PADA ITEM STOCK</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
itemstock/list/" class="btn btn-primary btn-sm">Daftar Item Stock</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li>Kode Item Stock : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['kd_item'];?>
</b></li>
                   <li>Nama Item Stock : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['nm_item'];?>
</b></li>
                   <li>&nbsp;</li>
                   <li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kd_item" id="kd_item" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_item'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>#</th>
							<th>Supplier</th>
							<th>Nama Supplier</th>
							<th>Alamat</th>
							<th>Contact Person</th>
							<th>Telp</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</div>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
							<tr>
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked"></td>
								<input type="hidden" id="kd_supplier[]" name="kd_supplier[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kd_supplier"];?>
">
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_supplier'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nm_supplier'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['alamat'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['contact'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['phone'];?>
</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</form>
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