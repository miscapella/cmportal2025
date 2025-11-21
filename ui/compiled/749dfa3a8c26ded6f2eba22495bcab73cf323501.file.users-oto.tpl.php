<?php /* Smarty version Smarty-3.1.13, created on 2023-11-09 16:54:01
         compiled from "ui\theme\softhash\users-oto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1569399487635f8f360e8fd2-75686669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749dfa3a8c26ded6f2eba22495bcab73cf323501' => 
    array (
      0 => 'ui\\theme\\softhash\\users-oto.tpl',
      1 => 1699523632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1569399487635f8f360e8fd2-75686669',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_635f8f36197a39_22526789',
  'variables' => 
  array (
    'username' => 0,
    '_url' => 0,
    'id' => 0,
    'group' => 0,
    'd' => 0,
    'ds' => 0,
    'e' => 0,
    'es' => 0,
    'nourut' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_635f8f36197a39_22526789')) {function content_635f8f36197a39_22526789($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Otoritas - User : <b><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</b></h5>
            </div>
            
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-oto/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" name="tambahoto">
                    <div class="col-md-11" style="padding: 0; width: 300px;">
                        <select name="otoritas_group" id="otoritas_group" class="form-control">
                            <option value="">Contain</option>
                            <option value="semua">ALL</option>
                            <option value="user">Daftar Otoritas User</option>
                            <?php echo $_smarty_tpl->tpl_vars['group']->value;?>

                        </select>
                    </div>
                </form>
				<div class="ibox-tools col-md-1">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas-user" class="btn btn-primary"><i class="fa fa-reply"></i> Back</a>
				</div>
                <br><br>
				<div class="alert alert-danger" id="emsg">
					<span id="emsgbody"></span>
				</div>
				
                <table class="table table-striped table-bordered" id="isi_oto">
					<thead>
						<th width="5%"><input type="checkbox" id="select_all" name="select_all"></th>
						<th width="5%">No.</th>
						<th width="20%">Kode Otoritas</th>
						<th width="20%">Program</th>
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
<!--					<button class="btn btn-sm btn-primary" type="submit" id="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>-->
				</div>
			</div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>