<?php /* Smarty version Smarty-3.1.13, created on 2022-08-24 14:48:14
         compiled from "ui\theme\softhash\list-memo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16293554026305d7be36f0e2-45538952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c32c26ca929c80180220481dda1bc757cda17de2' => 
    array (
      0 => 'ui\\theme\\softhash\\list-memo.tpl',
      1 => 1652238775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16293554026305d7be36f0e2-45538952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6305d7be3a7ab6_16472192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6305d7be3a7ab6_16472192')) {function content_6305d7be3a7ab6_16472192($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form_memo/list/">
					<div class="form-group">
					    <div class="col-md-8">
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form_memo/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Kirim</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>