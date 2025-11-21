<?php /* Smarty version Smarty-3.1.13, created on 2022-11-28 22:43:26
         compiled from "ui\theme\softhash\prog\GAS\list-inventaris-submit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14725054586384d0040a5223-80966151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd85cdb3d88bd08089507fe6a66cf725853e56d9a' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-inventaris-submit.tpl',
      1 => 1669650167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14725054586384d0040a5223-80966151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6384d0041d5f44_42132785',
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
<?php if ($_valid && !is_callable('content_6384d0041d5f44_42132785')) {function content_6384d0041d5f44_42132785($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DAFTAR PENGAJUAN PERSETUJUAN ITEM STOCK PADA INVENTARIS</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="btn btn-primary btn-sm">Daftar Inventaris</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li>Kode Inventaris : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['kd_inventaris'];?>
</b></li>
                   <li>Nama Inventaris : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['nm_inventaris'];?>
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
					<input type="hidden" name="kd_inventaris" id="kd_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kd_inventaris'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th>#</th>
							<th>Item Stock</th>
							<th>Nama Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
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
								<input type="hidden" id="kd_item[]" name="kd_item[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value["kd_item"];?>
">
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_item'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nm_item'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['merk'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['tipe'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['spesifikasi'];?>
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