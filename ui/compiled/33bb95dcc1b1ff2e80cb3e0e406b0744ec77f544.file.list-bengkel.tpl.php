<?php /* Smarty version Smarty-3.1.13, created on 2023-02-01 09:21:20
         compiled from "ui\theme\softhash\prog\GAS\list-bengkel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146219629630727613b61d5-89430481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33bb95dcc1b1ff2e80cb3e0e406b0744ec77f544' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-bengkel.tpl',
      1 => 1671520122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146219629630727613b61d5-89430481',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_630727614071a1_64978006',
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
    'name' => 0,
    'd' => 0,
    'ds' => 0,
    'nourut' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_630727614071a1_64978006')) {function content_630727614071a1_64978006($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/listbengkel/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search by Name'];?>
..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Mobil Inventaris</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter by Tags'];?>
</h3>
                <ul class="tag-list" style="padding: 0">
                   <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/listbengkel/<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
/"><i class="fa fa-tag"></i> <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Polisi</th>
                        <th>Pemakai</th>
						<th>Tipe Mobil</th>
                        <th>Cabang</th>
                        <th>Tanggal STNK</th>
                        <th>Tanggal Service Terakhir</th>
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
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</a> </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['NO_POLISI'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['PEMAKAI'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['TIPE_MOBIL'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['CABANG'];?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['TGL_STNK']!=null){?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['TGL_STNK'];?>
 <?php }else{ ?> - <?php }?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['TGL_SERVICE_TERAKHIR']!=null){?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['TGL_SERVICE_TERAKHIR'];?>
 <?php }else{ ?> - <?php }?>
                            </td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>

                                <a href="delete/inventaris/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
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