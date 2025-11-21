<?php /* Smarty version Smarty-3.1.13, created on 2023-11-03 14:16:03
         compiled from "ui\theme\softhash\add-company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2114517463637f264b2f10c9-09512480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '416418fbc558c032f8f8fb9c68fa662895c58c37' => 
    array (
      0 => 'ui\\theme\\softhash\\add-company.tpl',
      1 => 1698995269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2114517463637f264b2f10c9-09512480',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_637f264b339260_94279699',
  'variables' => 
  array (
    '_L' => 0,
    'countries' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637f264b339260_94279699')) {function content_637f264b339260_94279699($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Company'];?>
</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">
                    
                    <div class="form-group"><label class="col-lg-3 control-label" for="company">Nama Perusahaan</label>

                        <div class="col-lg-9"><input type="text" id="company" name="company" class="form-control">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</label>

                        <div class="col-lg-9"><input type="text" id="email" name="email" class="form-control">

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