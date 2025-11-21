<?php /* Smarty version Smarty-3.1.13, created on 2022-10-31 16:01:31
         compiled from "ui\theme\softhash\group-oto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1946148125635f8eeba55b17-20719047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14b0da50ece8edeebc311bb0822ecd651f99857a' => 
    array (
      0 => 'ui\\theme\\softhash\\group-oto.tpl',
      1 => 1644567646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1946148125635f8eeba55b17-20719047',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'kode_group' => 0,
    '_url' => 0,
    'd' => 0,
    'ds' => 0,
    'e' => 0,
    'es' => 0,
    'nourut' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_635f8eebb6ea70_87051241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_635f8eebb6ea70_87051241')) {function content_635f8eebb6ea70_87051241($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Otoritas - Group : <b><?php echo $_smarty_tpl->tpl_vars['kode_group']->value;?>
</b></h5>
            </div>
			<form class="form-horizontal" id="rform" method="post">
            <div class="ibox-content">
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas-group" class="btn btn-primary"><i class="fa fa-reply"></i> Back</a>
				</div><br><br>
				<div class="alert alert-danger" id="emsg">
					<span id="emsgbody"></span>
				</div>
                <table class="table table-striped table-bordered">
					<thead>
						<th width="5%"><input type="checkbox" id="select_all" name="select_all"></th>
						<th width="5%">No.</th>
						<th width="20%">Kode Otoritas</th>
						<th width="20%">program</th>
						<th width="50%">Keterangan</th>
					</thead>
					<tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
							<td><input onchange="cekOto('<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_oto'];?>
')" type="checkbox" name="no" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_oto'];?>
" class="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_oto'];?>
" 
								<?php  $_smarty_tpl->tpl_vars['es'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['es']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['es']->key => $_smarty_tpl->tpl_vars['es']->value){
$_smarty_tpl->tpl_vars['es']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['es']->value['kode_oto']==$_smarty_tpl->tpl_vars['ds']->value['kode_oto']){?> checked <?php }?>
								<?php } ?>
							></td>
							<td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_oto'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['program'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['ket_oto'];?>
</td>
							<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                        </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
			<div class="ibox">
				
				<div class="ibox-content">
					<input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
					<input type="hidden" name="kode_group" id="kode_group" value="<?php echo $_smarty_tpl->tpl_vars['kode_group']->value;?>
">
				</div>
			</div>
			</form>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>