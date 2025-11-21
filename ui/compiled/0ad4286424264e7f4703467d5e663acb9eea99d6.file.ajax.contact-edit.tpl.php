<?php /* Smarty version Smarty-3.1.13, created on 2023-03-14 14:04:40
         compiled from "ui\theme\softhash\prog\KUBOTA\ajax.contact-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2038202964101c88077f01-71821978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ad4286424264e7f4703467d5e663acb9eea99d6' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\ajax.contact-edit.tpl',
      1 => 1563354853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2038202964101c88077f01-71821978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    'd' => 0,
    'religion' => 0,
    'countries' => 0,
    'fs' => 0,
    'f' => 0,
    'fo' => 0,
    'tags' => 0,
    'tag' => 0,
    'dtags' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64101c88131168_71764298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64101c88131168_71764298')) {function content_64101c88131168_71764298($_smarty_tpl) {?>
<form class="form-horizontal" id="rform">

    <div class="form-group"><label class="col-lg-2 control-label" for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account Name'];?>
</label>

        <div class="col-lg-10"><input type="text" id="account" name="account" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
">

        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" for="company"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</label>

        <div class="col-lg-10"><input type="text" id="company" name="company" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['company'];?>
">

        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" for="id_no">No. KTP</label>

        <div class="col-lg-10"><input type="text" id="id_no" name="id_no" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_no'];?>
">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="edit_email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

        <div class="col-lg-10"><input type="text" id="edit_email" name="edit_email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
">

        </div>
    </div>
	<div class="form-group"><label class="col-lg-2 control-label" for="agama">Agama</label>

		<div class="col-lg-10">

			<select name="agama" id="agama" class="form-control">
				<option value="">Pilih Agama</option>
			   <?php echo $_smarty_tpl->tpl_vars['religion']->value;?>

			</select>

		</div>
	</div>
    <div class="form-group"><label class="col-lg-2 control-label" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

        <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

        <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['address'];?>
">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

        <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>

        <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['state'];?>
">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
 </label>

        <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['zip'];?>
">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>

        <div class="col-lg-10">

            <select name="country" id="country" class="form-control">
                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

            </select>

        </div>
    </div>
    <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
        <div class="form-group"><label class="col-lg-2 control-label" for="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value['fieldname'];?>
</label>
            <?php if (($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='text'){?>


                <div class="col-lg-10">
                    <input type="text" id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control" value="<?php if (get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id'])!=''){?> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id']);?>
<?php }?>">
                    <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                    <?php }?>

                </div>

            <?php }elseif(($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='password'){?>

                <div class="col-lg-10">
                    <input type="password" id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control" value="<?php if (get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id'])!=''){?> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id']);?>
<?php }?>">
                    <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                    <?php }?>
                </div>

            <?php }elseif(($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='dropdown'){?>
                <div class="col-lg-10">
                    <select id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['fo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fo']->_loop = false;
 $_from = explode(',',$_smarty_tpl->tpl_vars['f']->value['fieldoptions']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fo']->key => $_smarty_tpl->tpl_vars['fo']->value){
$_smarty_tpl->tpl_vars['fo']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
" <?php if (get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id'])==$_smarty_tpl->tpl_vars['fo']->value){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
</option>
                        <?php } ?>
                    </select>
                    <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                    <?php }?>
                </div>


            <?php }elseif(($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='textarea'){?>

                <div class="col-lg-10">
                    <textarea id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control" rows="3"><?php if (get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id'])!=''){?> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['f']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id']);?>
<?php }?></textarea>
                    <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                    <?php }?>
                </div>

            <?php }else{ ?>
            <?php }?>
        </div>
    <?php } ?>
    <div class="form-group"><label class="col-lg-2 control-label" for="tags"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tags'];?>
</label>

        <div class="col-lg-10">

            
            <select name="tags[]" id="tags"  class="form-control" multiple="multiple">
                <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['tag']->value['text'],$_smarty_tpl->tpl_vars['dtags']->value)){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
</option>
                <?php } ?>

            </select>

        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">

            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
        </div>
    </div>
    <input type="hidden" name="fcid" id="fcid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
</form><?php }} ?>