<?php /* Smarty version Smarty-3.1.13, created on 2023-07-25 09:32:07
         compiled from "ui\theme\softhash\prog\KEBUN\list-inventaris-itemstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46075204664bf342791f173-18167102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbde10454405a61b0d38d836fbaf91c4fbe592ed' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-inventaris-itemstock.tpl',
      1 => 1676947835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46075204664bf342791f173-18167102',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
    'opt' => 0,
    'e' => 0,
    'tg' => 0,
    'r' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bf3427986749_19711455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bf3427986749_19711455')) {function content_64bf3427986749_19711455($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>DATA INVENTARIS</h3>
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
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Item Stock</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
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
							<th>Item Stock</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Spesifikasi</th>
							<th>Status</th>
							<th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
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
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
									<select name="kd_item[]" class="kd_item" id="kd_item" disabled>
										<option value="">Pilih Item Stock</option>
										<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kd_item'];?>
" <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r']->value['kd_item']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['kd_item'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r']->value['nm_item'];?>
</option>
										<?php } ?>
									</select>
								</td>
<!--
								<td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
									<select name="kd_item[]" class="kd_item" id="kd_item">
									    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
									        <?php if ($_smarty_tpl->tpl_vars['ds']->value['kd_item']==$_smarty_tpl->tpl_vars['r']->value['kd_item']){?>
										        <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['kd_item'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['kd_item'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r']->value['nm_item'];?>
</option>
										    <?php }?>
										<?php } ?>
									</select>
								</td>
-->
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['merk'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['tipe'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['spesifikasi'];?>
</td>
								<td style="text-transform: uppercase" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
" class="status"><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>
								<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>
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