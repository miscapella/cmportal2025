<?php /* Smarty version Smarty-3.1.13, created on 2022-10-31 16:01:26
         compiled from "ui\theme\softhash\otoritas-group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1131242832635f8ee68da5c0-88305060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8204a7804e112a0304dfd63dd31976789783c9fe' => 
    array (
      0 => 'ui\\theme\\softhash\\otoritas-group.tpl',
      1 => 1643777090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1131242832635f8ee68da5c0-88305060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
    'd' => 0,
    'nourut' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_635f8ee69961d7_94887378',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_635f8ee69961d7_94887378')) {function content_635f8ee69961d7_94887378($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas-group/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="kode_group" id="kode_group" class="form-control" placeholder="Cari Kode Group..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/add-otoritas-group/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Group Otoritas</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Group Otoritas</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <th style="width: 5%">#</th>
                    <th>Kode Group</th>
                    <th>Program</th>
                    <th style="width: 20%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_group'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['program'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/group-oto/<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_group'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Otoritas</a>
                                <a href="delete/otoritas-group/<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_group'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_group'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                    <?php } ?>
                </table>
            </div>
			<div class="ibox">
				<div class="ibox-content">
					<?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

				</div>
			</div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>