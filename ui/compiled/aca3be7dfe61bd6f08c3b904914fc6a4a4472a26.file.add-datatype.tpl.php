<?php /* Smarty version Smarty-3.1.13, created on 2023-05-15 08:18:54
         compiled from "ui\theme\softhash\prog\FORM\add-datatype.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5987136156445dc6f7f6ca8-61438445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aca3be7dfe61bd6f08c3b904914fc6a4a4472a26' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\add-datatype.tpl',
      1 => 1684113531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5987136156445dc6f7f6ca8-61438445',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6445dc6f846c62_73734793',
  'variables' => 
  array (
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6445dc6f846c62_73734793')) {function content_6445dc6f846c62_73734793($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Data Type</h5>
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
                        <div class="col-lg-9"><input type="text" id="kode" name="kode" class="form-control" style="text-transform:uppercase">
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="nama">Data Type Name</label>
                        <div class="col-lg-9"><input type="text" id="nama" name="nama" class="form-control">
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="tipe">Type</label>
                        <div class="col-lg-9">
							<select class="form-control" id="tipe" name="tipe">
								<option value="">Choose Type</option>
                                <option value="radiobutton">Radio Button</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="dropdown">Dropdown</option>
							</select>
                        </div>
                    </div><br>
                    <div class="form-group"><label class="col-lg-3 control-label text-right" for="keterangan">Description</label>
						<div class="col-lg-9"><textarea type="text" id="keterangan" name="keterangan" class="form-control" rows="3"></textarea>
						</div>
					</div><br><br><br>
                    <div id="option-group">
                        <div class="form-group">
                            <td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>
                            <label class="col-lg-3 control-label text-right" for="option">Option</label>
                            <div class="col-lg-9">
                                <input type="text" id="option" name="option[]" class="form-control">
                            </div><br>
                        </div>
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