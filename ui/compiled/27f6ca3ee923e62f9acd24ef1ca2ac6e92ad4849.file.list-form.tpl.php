<?php /* Smarty version Smarty-3.1.13, created on 2023-11-14 14:54:41
         compiled from "ui\theme\softhash\prog\FORM\list-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200727370464463cdfc74cf4-18073050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27f6ca3ee923e62f9acd24ef1ca2ac6e92ad4849' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\list-form.tpl',
      1 => 1699948475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200727370464463cdfc74cf4-18073050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_64463cdfcc4692_67146842',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64463cdfcc4692_67146842')) {function content_64463cdfcc4692_67146842($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
					<div class="form-group">
						<div class="col-md-8">
							
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Form</a>
						</div>
					</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">KODE FORM</th>
                        <th style="width: 50%">NAMA FORM</th>
                        <th style="width: 15%">STATUS</th>
                        <th class="text-right" style="width: 18%">MANAGE</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>