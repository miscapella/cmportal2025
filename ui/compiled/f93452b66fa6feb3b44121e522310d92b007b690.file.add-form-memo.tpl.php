<?php /* Smarty version Smarty-3.1.13, created on 2022-08-24 14:48:20
         compiled from "ui\theme\softhash\add-form-memo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4985284666305d7c4d4e9a0-65381918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f93452b66fa6feb3b44121e522310d92b007b690' => 
    array (
      0 => 'ui\\theme\\softhash\\add-form-memo.tpl',
      1 => 1658205941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4985284666305d7c4d4e9a0-65381918',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6305d7c4d91de6_03077823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6305d7c4d91de6_03077823')) {function content_6305d7c4d91de6_03077823($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Memo</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form_memo/list" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
<!--
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
-->
                <form class="form-horizontal form-memo" id="rform">
					<div class="form-group">
                        <input type="text" id="nomor" name="nomor" class="form-control" placeholder="Nomor">
                        <input type="text" id="kepada" name="kepada" class="form-control" placeholder="Kepada">
                        <input type="text" id="subjek" name="subjek" class="form-control" placeholder="Subjek">
                        <textarea class="ckeditor" id="isi_memo" name="isi_memo" rows="10"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>