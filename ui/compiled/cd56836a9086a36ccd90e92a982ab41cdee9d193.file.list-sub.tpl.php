<?php /* Smarty version Smarty-3.1.13, created on 2023-12-18 10:31:01
         compiled from "ui\theme\softhash\prog\KEBUN\list-sub.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214106495064bf3673076815-95975858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd56836a9086a36ccd90e92a982ab41cdee9d193' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-sub.tpl',
      1 => 1702870249,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214106495064bf3673076815-95975858',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64bf36730d7e18_24271020',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'parent' => 0,
    'nama_parent' => 0,
    'sub' => 0,
    'nama_bagian' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'nourut' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64bf36730d7e18_24271020')) {function content_64bf36730d7e18_24271020($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	<div class="col-md-9">
        <div class="hexagon-container">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/list/" class="hexagon">Bagian</a>
        </div>
        <div class="hexagon-container4" style="margin-left: -15px;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/main/<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
/" class="hexagon4" style="font-size: 0.8vw; line-height: 1; width: 70%;"><?php echo $_smarty_tpl->tpl_vars['nama_parent']->value;?>
</a>
        </div>
        <div class="hexagon-container2" style="margin-left: -15px;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/sub/<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
/" class="hexagon2" style="font-size: 0.8vw; line-height: 1; width: 70%;"><?php echo $_smarty_tpl->tpl_vars['nama_bagian']->value;?>
</a>
        </div>
    </div>
    <div class="col-md-3">
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/addsub/<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Data</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Sub Data</th>
                        <th style="width: 30%;" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nama_kategori'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/line/<?php echo $_smarty_tpl->tpl_vars['parent']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i> Details</a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kategori/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                                <a class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
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