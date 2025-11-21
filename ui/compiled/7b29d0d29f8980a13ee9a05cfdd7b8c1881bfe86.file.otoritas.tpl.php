<?php /* Smarty version Smarty-3.1.13, created on 2022-10-31 16:01:04
         compiled from "ui\theme\softhash\otoritas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:633438635635f8ed090afe4-59028635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b29d0d29f8980a13ee9a05cfdd7b8c1881bfe86' => 
    array (
      0 => 'ui\\theme\\softhash\\otoritas.tpl',
      1 => 1642390354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '633438635635f8ed090afe4-59028635',
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
  'unifunc' => 'content_635f8ed0a18964_74662777',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_635f8ed0a18964_74662777')) {function content_635f8ed0a18964_74662777($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/otoritas/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="kode_oto" id="kode_oto" class="form-control" placeholder="Cari Kode Otoritas..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/add-otoritas/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Otoritas</a>
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
                <h5>Daftar Otoritas</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <th>#</th>
                    <th>Kode Otoritas</th>
                    <th>Program</th>
                    <th>Keterangan</th>
                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kode_oto'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['program'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['ket_oto'];?>
</td>
                            <td class="text-right">
                                <a href="delete/otoritas/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
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