<?php /* Smarty version Smarty-3.1.13, created on 2024-01-22 10:36:20
         compiled from "ui\theme\softhash\prog\FORM\add-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157728127464462b9fd28725-40921173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5298d30f369afcac8f11a84c3c1c5830e40c4a91' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\add-form.tpl',
      1 => 1704769437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157728127464462b9fd28725-40921173',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64462b9fd7c328_55886575',
  'variables' => 
  array (
    'msg' => 0,
    'opt_tipe' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64462b9fd7c328_55886575')) {function content_64462b9fd7c328_55886575($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<input type="number" name="section_number" id="section_number" style="display:none" value=1>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" style="background-color: #ccc;">
				<h3 class="col-lg-11" style="text-align: center;"><b>CREATE NEW FORM</b></h3>
				<button class="btn btn-primary col-lg-1" type="submit" id="save"><i class="fa fa-check"></i> Submit</button>
            </div>
        </div>
    </div>
	<div class="col-md-12">
	<div class="alert alert-danger" id="emsg">
		<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
		<span id="emsgbody"></span>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<td style="vertical-align: middle;"><input type="checkbox" name="chks[]" class="cekbox" checked="checked" style="display:none"></td>
				<div style="display:none"><input type="number" id="section" name="section[]" class="form-control" value=1></div>
				<div class="form-group"><label class="col-lg-3 control-label" for="form_title">Form Title </label>
					<div class="col-lg-9"><input type="text" id="form_title" name="form_title[]" class="form-control"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="form_description">Form Description </label>
					<div class="col-lg-9"><textarea type="text" id="form_description" name="form_description[]" class="form-control" rows="5"></textarea></div>
				</div><br>
            </div>
        </div>
    </div>
</div>
<div class="isi_form" name="opt_form" id="opt_form">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default isi_question" id="isi_question1">
				<div class="panel-body">
					<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
					<div style="display:none"><input type="number" id="question_number" name="question_number[]" class="form-control" value=1></div>
					<div class="form-group"><label class="col-lg-2 control-label text-right" for="pertanyaan">Question</label>
						<div class="col-lg-6"><input type="text" id="pertanyaan" name="pertanyaan[]" class="form-control">
						</div>
						<div class="col-lg-4"><select name="tipe_data[]" class="tipe_data" id="tipe_data">
							<?php echo $_smarty_tpl->tpl_vars['opt_tipe']->value;?>

						</select>
						</div>
					</div><br>
					<div class="form-group"><label class="col-lg-2 control-label text-right" for="keterangan">Description</label>
						<div class="col-lg-10"><textarea type="text" id="keterangan" name="keterangan[]" class="form-control" rows="2"></textarea>
						</div>
					</div>
				</div>
					
			</div>
			<div class="panel-body text-center">
				<button class="btn btn-success btn-sm add_question" name="add_question" id="question1" title="Add Question"><i class="fa fa-plus"></i></button>
			</div>
		</div>
		
	</div>
</div>
<br>
<br>
<div class="panel-body text-center">
	<button class="btn btn-danger btn-sm" name="add_section" id="add_section" title="Add Section"><i class="fa fa-plus"></i> Add New Section</button>
</div>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>