<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:11:47
         compiled from "ui\theme\softhash\prog\KUBOTA\add-contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20827096156358a573805ca0-98457274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '283e5175430d3b36c3aa6f15df0cf13391d38e74' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\add-contact.tpl',
      1 => 1563354748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20827096156358a573805ca0-98457274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    'religion' => 0,
    'countries' => 0,
    'fs' => 0,
    'f' => 0,
    'fo' => 0,
    'tags' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a5738bf622_17679831',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a5738bf622_17679831')) {function content_6358a5738bf622_17679831($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Contact'];?>
</h5>

            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                    <div class="form-group"><label class="col-lg-3 control-label" for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="account" name="account" class="form-control">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="company"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="company" name="company" class="form-control">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="email" name="email" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="id_no">No. KTP</label>

                        <div class="col-lg-9"><input type="text" id="id_no" name="id_no" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="agama">Agama</label>

                        <div class="col-lg-9">

                            <select name="agama" id="agama" class="form-control">
                                <option value="">Pilih Agama</option>
                               <?php echo $_smarty_tpl->tpl_vars['religion']->value;?>

                            </select>

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="phone" name="phone" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="address" name="address" class="form-control">

                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="city" name="city" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="state"><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="state" name="state" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
 </label>

                        <div class="col-lg-9"><input type="text" id="zip" name="zip" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</label>

                        <div class="col-lg-9">

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
                        <div class="form-group"><label class="col-lg-3 control-label" for="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value['fieldname'];?>
</label>
                        <?php if (($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='text'){?>


                                <div class="col-lg-9">
                                    <input type="text" id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                                    <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                    <?php }?>

                                </div>

                        <?php }elseif(($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='password'){?>

                            <div class="col-lg-9">
                                <input type="password" id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                <?php }?>
                            </div>

                        <?php }elseif(($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='dropdown'){?>
                            <div class="col-lg-9">
                                <select id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control">
                                    <?php  $_smarty_tpl->tpl_vars['fo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fo']->_loop = false;
 $_from = explode(',',$_smarty_tpl->tpl_vars['f']->value['fieldoptions']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fo']->key => $_smarty_tpl->tpl_vars['fo']->value){
$_smarty_tpl->tpl_vars['fo']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['fo']->value;?>
</option>
                                    <?php } ?>
                                </select>
                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                <?php }?>
                            </div>


                        <?php }elseif(($_smarty_tpl->tpl_vars['f']->value['fieldtype'])=='textarea'){?>

                            <div class="col-lg-9">
                                <textarea id="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" name="cf<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
" class="form-control" rows="3"></textarea>
                                <?php if (($_smarty_tpl->tpl_vars['f']->value['description'])!=''){?>
                                    <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</span>
                                <?php }?>
                            </div>

                        <?php }else{ ?>
                        <?php }?>
                        </div>
                    <?php } ?>

                    <div class="form-group"><label class="col-lg-3 control-label" for="tags"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tags'];?>
</label>

                        <div class="col-lg-9">
                            
                            <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                                <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['text'];?>
</option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>