<?php /* Smarty version Smarty-3.1.13, created on 2024-06-07 08:34:35
         compiled from "ui\theme\softhash\prog\KEBUN\list-spmk-aprv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273343076651e5bf28d0af1-17966161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ab6266a55fc653be0aafb54b11be9dcd4b4b7d2' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-spmk-aprv.tpl',
      1 => 1717484557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273343076651e5bf28d0af1-17966161',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_651e5bf2969276_12104610',
  'variables' => 
  array (
    'msg' => 0,
    'condition' => 0,
    'user_dept' => 0,
    'cd' => 0,
    '_L' => 0,
    'd' => 0,
    'ds' => 0,
    'nourut' => 0,
    '_c' => 0,
    '_url' => 0,
    'ce' => 0,
    'e' => 0,
    'es' => 0,
    'cf' => 0,
    'f' => 0,
    'fs' => 0,
    'cg' => 0,
    'g' => 0,
    'gs' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651e5bf2969276_12104610')) {function content_651e5bf2969276_12104610($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<h1><?php echo $_smarty_tpl->tpl_vars['condition']->value;?>
</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['user_dept']->value;?>
</h2>

<?php if ($_smarty_tpl->tpl_vars['cd']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>SPmK Menunggu Approval</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. SPmK</th>
                        <th style="width: 15%">Tgl SPmK</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
                        <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['priority']=='URGENT'){?>style="background-color:#ffc9bb;"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_spmk'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['tgl_spmk']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['priority'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-spmk-aprv/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Approval</a>
                                
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ce']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>SPmK yang telah di revisi</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. SPmK</th>
                        <th style="width: 15%">Tgl SPmK</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['es'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['es']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['es']->key => $_smarty_tpl->tpl_vars['es']->value){
$_smarty_tpl->tpl_vars['es']->_loop = true;
?>
                        <tr <?php if ($_smarty_tpl->tpl_vars['es']->value['priority']=='URGENT'){?>style="background-color:#ffc9bb;"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['no_spmk'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['es']->value['tgl_spmk']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['priority'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['es']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-spmk-aprv/<?php echo $_smarty_tpl->tpl_vars['es']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Revisi</a>
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['cf']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>SPmK Kontraktor Menunggu Approval</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. SPmK</th>
                        <th style="width: 15%">Tgl SPmK</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['fs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fs']->key => $_smarty_tpl->tpl_vars['fs']->value){
$_smarty_tpl->tpl_vars['fs']->_loop = true;
?>
                        <tr <?php if ($_smarty_tpl->tpl_vars['fs']->value['priority']=='URGENT'){?>style="background-color:#ffc9bb;"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['no_spmk'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['fs']->value['tgl_spmk']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['priority'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['fs']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-spmk-aprvsup/<?php echo $_smarty_tpl->tpl_vars['fs']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Approval</a>
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['cg']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>SPmK Kontraktor yang telah di revisi</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. SPmK</th>
                        <th style="width: 15%">Tgl SPmK</th>
						<th style="width: 15%">Dibuat Oleh</th>
                        <th style="width: 15%">Tingkat Kepentingan</th>
                        <th style="width: 15%">Status</th>
                        <th class="text-right" style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['gs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['g']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gs']->key => $_smarty_tpl->tpl_vars['gs']->value){
$_smarty_tpl->tpl_vars['gs']->_loop = true;
?>
                        <tr <?php if ($_smarty_tpl->tpl_vars['gs']->value['priority']=='URGENT'){?>style="background-color:#ffc9bb;"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['gs']->value['no_spmk'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['gs']->value['tgl_spmk']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['gs']->value['dibuat_nama'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['gs']->value['priority'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['gs']->value['status'];?>
</td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-spmk-aprvsup/<?php echo $_smarty_tpl->tpl_vars['gs']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Detail Revisi</a>
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['cd']->value==0&&$_smarty_tpl->tpl_vars['ce']->value==0&&$_smarty_tpl->tpl_vars['cf']->value==0&&$_smarty_tpl->tpl_vars['cg']->value==0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Tidak ada Surat Permintaan Kerja untuk di approve</h2>
			</div>
		</div>
	</div>
</div>
<?php }?>


<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>