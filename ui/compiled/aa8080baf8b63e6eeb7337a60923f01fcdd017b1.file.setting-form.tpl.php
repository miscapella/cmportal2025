<?php /* Smarty version Smarty-3.1.13, created on 2023-05-15 08:22:29
         compiled from "ui\theme\softhash\prog\FORM\setting-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14076593136448afdb12f344-04001318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa8080baf8b63e6eeb7337a60923f01fcdd017b1' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\setting-form.tpl',
      1 => 1684113748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14076593136448afdb12f344-04001318',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6448afdb1963b6_73405598',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
    'clist' => 0,
    'e' => 0,
    'ds' => 0,
    'f' => 0,
    'fs' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6448afdb1963b6_73405598')) {function content_6448afdb1963b6_73405598($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>FORM SETTING</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form/list/" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Back</a>
				</div>
                <ul style="padding: 0;list-style-type:none">
                   <li>Kode Form : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['kode_form'];?>
</b></li>
                   <li>Nama Form : <b><?php echo $_smarty_tpl->tpl_vars['d']->value['nama_form'];?>
</b></li>
                   <li>&nbsp;</li>
                   <li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Tambah Setting</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<input type="hidden" name="kode_form" id="kode_form" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_form'];?>
">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
                            <th>Section</th>
                            <th>Question</th>
							<th>Value</th>
							<th>Target</th>
							<th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</div>
						<?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                            <tr>
                                <td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">
                                    <select name="section[]" class="section" id="section">
                                        <option value=<?php echo floor($_smarty_tpl->tpl_vars['ds']->value['start']);?>
>Section <?php echo floor($_smarty_tpl->tpl_vars['ds']->value['start']);?>
</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="question[]" class="question" id="question">
                                        <?php  $_smarty_tpl->tpl_vars['fs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fs']->key => $_smarty_tpl->tpl_vars['fs']->value){
$_smarty_tpl->tpl_vars['fs']->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['fs']->value['section']==$_smarty_tpl->tpl_vars['ds']->value['start']){?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['start'];?>
"><?php echo $_smarty_tpl->tpl_vars['fs']->value['pertanyaan'];?>
</option>
                                            <?php }?>
                                        <?php } ?>
                                    </select></td>
                                <td>
                                    <select name="value[]" class="value" id="value">
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['value'];?>
</option>
                                    </select></td>
                                <td>
                                    <select name="target[]" class="target" id="target">
                                        <option value=<?php echo floor($_smarty_tpl->tpl_vars['ds']->value['target']);?>
>Section <?php echo floor($_smarty_tpl->tpl_vars['ds']->value['target']);?>
</option>
                                    </select></td>							
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