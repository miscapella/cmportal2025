<?php /* Smarty version Smarty-3.1.13, created on 2023-07-25 09:32:04
         compiled from "ui\theme\softhash\prog\KEBUN\list-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204858369764bf3424192a58-46454952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae7dba90e545ea9f1ddd68919b58604e3cf1fbfa' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-inventaris.tpl',
      1 => 1671520026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204858369764bf3424192a58-46454952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'name' => 0,
    'd' => 0,
    'nourut' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bf3424251419_86614219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bf3424251419_86614219')) {function content_64bf3424251419_86614219($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search by Name'];?>
 Inventaris..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Inventaris</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<!--
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter by Tags'];?>
</h3>
                <ul class="tag-list" style="padding: 0">
                   <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
/"><i class="fa fa-tag"></i> <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Inventaris</th>
                        <th>Nama Inventaris</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_inventaris'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nm_inventaris'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['kd_kategori'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['merk'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['tipe'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-sm" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/itemstock/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-warning btn-sm" title="Item Stock"><i class="fa fa-cogs"></i></a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list-submit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-sm" title="Pengajuan Persetujuan"><i class="fa fa-check-square-o"></i></a>
                                <a href="delete/inventaris/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-sm cdelete" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                    <?php } ?>
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