<?php /* Smarty version Smarty-3.1.13, created on 2022-12-15 14:49:23
         compiled from "ui\theme\softhash\edit-company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1686327373639ad183bd7a61-38985374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e175136d8bfaab8148d4596f3d6517a989178a0' => 
    array (
      0 => 'ui\\theme\\softhash\\edit-company.tpl',
      1 => 1656904708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1686327373639ad183bd7a61-38985374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
    'cid' => 0,
    'd' => 0,
    'countries' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_639ad183c300e7_85623263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_639ad183c300e7_85623263')) {function content_639ad183c300e7_85623263($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Perusahaan</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
company/list" class="btn btn-primary btn-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Company'];?>
</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

					<input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <div class="form-group"><label class="col-lg-3 control-label" for="company">Nama Perusahaan</label>

                        <div class="col-lg-9"><input type="text" id="company" name="company" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['company'];?>
">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="address" name="address" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['address'];?>
">

                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="city" name="city" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="zip"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
 </label>

                        <div class="col-lg-9"><input type="text" id="zip" name="zip" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['zip'];?>
">

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