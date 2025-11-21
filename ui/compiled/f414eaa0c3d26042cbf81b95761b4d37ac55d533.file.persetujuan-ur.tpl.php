<?php /* Smarty version Smarty-3.1.13, created on 2024-09-10 09:49:34
         compiled from "ui\theme\softhash\prog\GAS\persetujuan-ur.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82949957166dfafdd1b9129-58408718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f414eaa0c3d26042cbf81b95761b4d37ac55d533' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\persetujuan-ur.tpl',
      1 => 1725936356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82949957166dfafdd1b9129-58408718',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66dfafdd1f1864_45390378',
  'variables' => 
  array (
    'msg' => 0,
    'user' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66dfafdd1f1864_45390378')) {function content_66dfafdd1f1864_45390378($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <h2>Persetujuan UR</h2>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['kode_dept']=='SDH'){?>
                <table id="persetujuan-ur-sdh" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
                        <th style="width: 30%">Dibuat Oleh</th>
                        <th style="width: 22%">Departemen</th>
                        <th class="text-right" style="width: 15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <?php }else{ ?>
                <table id="persetujuan-ur" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 15%">No. UR</th>
                        <th style="width: 15%">Tgl UR</th>
                        <th style="width: 52%">Dibuat Oleh</th>
                        <th class="text-right" style="width: 15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <?php }?>
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