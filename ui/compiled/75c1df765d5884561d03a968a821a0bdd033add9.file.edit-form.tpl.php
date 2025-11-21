<?php /* Smarty version Smarty-3.1.13, created on 2024-01-08 11:47:10
         compiled from "ui\theme\softhash\prog\FORM\edit-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169490215064464ea5ae3447-63110077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75c1df765d5884561d03a968a821a0bdd033add9' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\edit-form.tpl',
      1 => 1704689054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169490215064464ea5ae3447-63110077',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64464ea5b321a3_06214664',
  'variables' => 
  array (
    'msg' => 0,
    'd' => 0,
    'current' => 0,
    'e' => 0,
    'item' => 0,
    'tg' => 0,
    'items' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64464ea5b321a3_06214664')) {function content_64464ea5b321a3_06214664($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<?php $_smarty_tpl->tpl_vars["nomor"] = new Smarty_variable(1, null, 0);?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body" style="background-color: #ccc;">
				<h3 class="col-lg-11" style="text-align: center;"><b>EDIT FORM</b></h3>
				<button class="btn btn-primary col-lg-1" type="submit" id="save">Save</button>
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
				<div class="form-group"><label class="col-lg-3 control-label" for="kode">Kode Form </label>
					<div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode_form'];?>
" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="aktif">Status</label>
					<div class="col-lg-9">
						<select class="form-control" id="aktif" name="aktif">
							<option value="AKTIF" <?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='AKTIF'){?> selected <?php }?>>AKTIF</option>
							<option value="NONAKTIF" <?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='NONAKTIF'){?> selected <?php }?>>NONAKTIF</option>
						</select>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="form_title">Form Title </label>
					<div class="col-lg-9"><input type="text" id="form_title" name="form_title[]" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_form'];?>
"></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="form_description">Form Description </label>
					<div class="col-lg-9"><textarea type="text" id="form_description" name="form_description[]" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['d']->value['deskripsi'];?>
</textarea></div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->tpl_vars["current"] = new Smarty_variable(1, null, 0);?>
<div class="isi_form" name="opt_form" id="opt_form">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default isi_question" id="isi_question<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['section']==$_smarty_tpl->tpl_vars['current']->value+1){?>
			</div>
			<div class="panel-body text-center">
				<button class="btn btn-success btn-sm add_question" name="add_question" id="question<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
" title="Add Question"><i class="fa fa-plus"></i></button>
			</div>
		</div>
	</div>
	<?php $_smarty_tpl->tpl_vars["current"] = new Smarty_variable($_smarty_tpl->tpl_vars['current']->value+1, null, 0);?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body" style="background-color: #ccc;">
					<div class="col-md-1"></div>
					<h3 class="col-md-10" style="text-align: center;"><b>SECTION <?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</b></h3>
					<div class="col-md-1 text-right"><button class="btn btn-danger btn-sm hapus_section" name="delete_section" title="Delete Section"><i class="fa fa-times"></i></button></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<td style="vertical-align: middle;"><input type="checkbox" name="chks[]" class="cekbox" checked="checked" style="display:none"></td>
					<div style="display: none;"><input type="number" id="section" name="section[]" class="form-control" value=<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
></div>
					<div class="form-group"><label class="col-lg-3 control-label" for="form_title">Section Title </label>
						<div class="col-lg-9"><input type="text" id="form_title" name="form_title[]" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pertanyaan'];?>
"></div>
					</div><br>
					<div class="form-group"><label class="col-lg-3 control-label" for="form_description">Section Description </label>
						<div class="col-lg-9"><textarea type="text" id="form_description" name="form_description[]" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['item']->value['deskripsi'];?>
</textarea></div>
					</div><br>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default isi_question" id="isi_question<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
">
	<?php }else{ ?>
				<div class="panel-body">
					<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
					<div style="display: none;"><input type="number" id="question_number" name="question_number[]" class="form-control" value=<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
></div>
					<div class="form-group"><label class="col-lg-2 control-label text-right" for="pertanyaan">Question</label>
						<div class="col-lg-6"><input type="text" id="pertanyaan" name="pertanyaan[]" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pertanyaan'];?>
">
						</div>
						<div class="col-lg-3"><select name="tipe_data[]" class="tipe_data" id="tipe_data">
							<option value="string" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='string'){?> selected<?php }?>>STRING</option>
            				<option value="datetime" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='datetime'){?> selected<?php }?>>DATETIME</option>
							<option value="date" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='date'){?> selected<?php }?>>DATE</option>
							<option value="statement" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='statement'){?> selected<?php }?>>STATEMENT</option>
							<option value="time" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='time'){?> selected<?php }?>>TIME</option>
            				<option value="file" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='file'){?> selected<?php }?>>FILE</option>
            				<option value="14harikerja" <?php if ($_smarty_tpl->tpl_vars['item']->value['tipe']=='14harikerja'){?> selected<?php }?>>14 HARI KERJA</option>
							<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tg']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['items']->value['kode'];?>
" <?php if ($_smarty_tpl->tpl_vars['items']->value['kode']==$_smarty_tpl->tpl_vars['item']->value['tipe']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['items']->value['kode'];?>
 - <?php echo $_smarty_tpl->tpl_vars['items']->value['nama'];?>
</option>
							<?php } ?>
						</select>
						</div>
						<div class="col-lg-1 text-right"><button class="btn btn-danger btn-sm hapus" name="delete_question" title="Delete Question"><i class="fa fa-times"></i></button></div>
					</div><br>
					<div class="form-group"><label class="col-lg-2 control-label text-right" for="keterangan">Description</label>
						<div class="col-lg-10"><textarea type="text" id="keterangan" name="keterangan[]" class="form-control" rows="2"><?php echo $_smarty_tpl->tpl_vars['item']->value['deskripsi'];?>
</textarea>
						</div>
					</div>
				</div>
			
	<?php }?>
	<?php } ?>
			</div>
			<div class="panel-body text-center">
				<button class="btn btn-success btn-sm add_question" name="add_question" id="question<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
" title="Add Question"><i class="fa fa-plus"></i></button>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<div class="panel-body text-center">
	<button class="btn btn-danger btn-sm" name="add_section" id="add_section" title="Add Section"><i class="fa fa-plus"></i> Add New Section</button>
</div>

<input type="number" name="section_number" id="section_number" style="display:none" value=<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>