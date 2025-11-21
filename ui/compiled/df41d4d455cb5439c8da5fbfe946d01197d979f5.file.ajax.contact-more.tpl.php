<?php /* Smarty version Smarty-3.1.13, created on 2023-03-14 14:04:50
         compiled from "ui\theme\softhash\prog\KUBOTA\ajax.contact-more.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105858485464101c92bc0913-97139155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df41d4d455cb5439c8da5fbfe946d01197d979f5' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\ajax.contact-more.tpl',
      1 => 1433239480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105858485464101c92bc0913-97139155',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64101c92c661e8_93406146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64101c92c661e8_93406146')) {function content_64101c92c661e8_93406146($_smarty_tpl) {?><div id="croppic"></div>

<button type="button" id="cropContainerHeaderButton" class="btn btn-info"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upload Picture'];?>
</button>
<button type="button" id="opt_gravatar" class="btn btn-info"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Use Gravatar'];?>
</button>
<button type="button" id="no_image" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['_L']->value['No Image'];?>
</button>
<div class="mt-lg"> </div>
<form class="form-horizontal">

    <div class="form-group"><label class="col-lg-2 control-label" for="picture"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Picture'];?>
</label>

        <div class="col-lg-10"><input type="text" id="picture" readonly name="picture" class="form-control picture"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['img'];?>
" autocomplete="off">

        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" for="facebook"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Facebook Profile'];?>
</label>

        <div class="col-lg-10"><input type="text" id="facebook" name="facebook" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['facebook'];?>
" autocomplete="off">

        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" for="google"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Google Plus Profile'];?>
</label>

        <div class="col-lg-10"><input type="text" id="google" name="google" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['google'];?>
" autocomplete="off">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="linkedin"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Linkedin Profile'];?>
</label>

        <div class="col-lg-10"><input type="text" id="linkedin" name="linkedin" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['linkedin'];?>
" class="form-control" autocomplete="off">

        </div>
    </div>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">

            <button class="btn btn-primary" type="submit" id="more_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
        </div>
    </div>
</form><?php }} ?>