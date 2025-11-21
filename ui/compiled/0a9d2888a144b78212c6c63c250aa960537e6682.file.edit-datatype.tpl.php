<?php /* Smarty version Smarty-3.1.13, created on 2023-05-15 08:19:23
         compiled from "ui\theme\softhash\prog\FORM\edit-datatype.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2029019824644621595086f7-99036376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a9d2888a144b78212c6c63c250aa960537e6682' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\edit-datatype.tpl',
      1 => 1684113562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2029019824644621595086f7-99036376',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64462159557b91_11039509',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'e' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64462159557b91_11039509')) {function content_64462159557b91_11039509($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Data Type</h5>
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
datatype/list/" class="btn btn-primary btn-xs"><i class="fa fa-reply"></i> Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="kode">Data Type Code</label>
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['kode'];?>
" readonly>
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="nama">Data Type Name</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama'];?>
">
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="tipe">Type</label>
                        <div class="col-lg-9">
							<select class="form-control" id="tipe" name="tipe">
								<option value="">Choose Type</option>
                                <option value="radiobutton" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe']=='radiobutton'){?> selected <?php }?>>Radio Button</option>
                                <option value="checkbox" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe']=='checkbox'){?> selected <?php }?>>Checkbox</option>
                                <option value="dropdown" <?php if ($_smarty_tpl->tpl_vars['d']->value['tipe']=='dropdown'){?> selected <?php }?>>Dropdown</option>
							</select>
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="keterangan">Description</label>
						<div class="col-lg-9"><textarea type="text" id="keterangan" name="keterangan" class="form-control" rows="3"><?php echo $_smarty_tpl->tpl_vars['d']->value['deskripsi'];?>
</textarea>
						</div>
					</div><br><br><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="aktif">Status</label>
                        <div class="col-lg-9">
							<select class="form-control" id="aktif" name="aktif">
                                <option value="AKTIF" <?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='AKTIF'){?> selected <?php }?>>AKTIF</option>
                                <option value="NONAKTIF" <?php if ($_smarty_tpl->tpl_vars['d']->value['status']=='NONAKTIF'){?> selected <?php }?>>NONAKTIF</option>
							</select>
                        </div>
                    </div><br>
                    <div id="option-group">
                        <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['e']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <div class="form-group">
                            <td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
                            <label class="col-lg-3 control-label text-right" for="option">Option</label>
                            <div class="col-lg-8">
                                <input type="text" id="option" name="option[]" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value;?>
">
                            </div>
                            <div class="col-lg-1 text-right">
                                <button class="btn btn-danger btn-sm hapus" name="delete_option" title="Delete Option"><i class="fa fa-times"></i></button>
                            </div><br>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-offset-3 form-group text-center">
                        <button class="btn btn-success btn-sm" name="opsi" id="opsi"><i class="fa fa-plus"></i> Add Option</button>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-danger" type="submit" id="save"><i class="fa fa-check"></i> Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>