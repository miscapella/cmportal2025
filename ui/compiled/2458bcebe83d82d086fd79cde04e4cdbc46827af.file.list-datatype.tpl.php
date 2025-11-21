<?php /* Smarty version Smarty-3.1.13, created on 2023-11-14 09:14:11
         compiled from "ui\theme\softhash\prog\FORM\list-datatype.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150917327645b3ea6189303-02342370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2458bcebe83d82d086fd79cde04e4cdbc46827af' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\FORM\\list-datatype.tpl',
      1 => 1699927999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150917327645b3ea6189303-02342370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_645b3ea61ed333_18329356',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_645b3ea61ed333_18329356')) {function content_645b3ea61ed333_18329356($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
datatype/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Data Type</a>
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
                        <th style="width: 15%">KODE DATA TYPE</th>
                        <th style="width: 30%">NAMA DATA TYPE</th>
                        <th style="width: 20%">TIPE</th>
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
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>