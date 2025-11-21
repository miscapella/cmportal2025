<?php /* Smarty version Smarty-3.1.13, created on 2024-09-10 14:44:12
         compiled from "ui\theme\softhash\prog\GAS\list-pr1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129506693566dfd1d00ba301-97123935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8bfab4f19642ceb9d433387774f4f8b125320e7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\list-pr1.tpl',
      1 => 1725954220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129506693566dfd1d00ba301-97123935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66dfd1d00ef9b6_93899260',
  'variables' => 
  array (
    'msg' => 0,
    'user' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66dfd1d00ef9b6_93899260')) {function content_66dfd1d00ef9b6_93899260($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<input type="hidden" id="print" value="<?php if (_auth2('PRINT-PR',$_smarty_tpl->tpl_vars['user']->value['id'])){?>y<?php }else{ ?>n<?php }?>" class="form-control" />
<input type="hidden" id="cancel" value="<?php if (_auth2('CANCEL-PR',$_smarty_tpl->tpl_vars['user']->value['id'])){?>y<?php }else{ ?>n<?php }?>" class="form-control" />

<?php if (_auth2('ADD-PR',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<div class="row">
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaan/add-pr/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Permintaan</a>
    </div>
</div>
<br>
<?php }?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               	<h2>DAFTAR PERMINTAAN</h2>
                <table id='list-permintaan' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 3%; vertical-align: middle;">#</th>
                        <th style="width: 25%; vertical-align: middle;">No. PR</th>
                        <th style="width: 25%; vertical-align: middle;">Tanggal</th>
                        <th style="width: 20%; vertical-align: middle;">
							<div class="header-container" style="display: flex; align-items: center; gap: 8px;">
								<span>Status</span>
								<select id="status-filter" style="width: 50%; padding: 0; line-height: 1.5;">
									<option value="">Semua</option>
									<option value="PENDING">Pending</option>
									<option value="APPROVE">Approved</option>
									<option value="REJECT">Rejected</option>
									<option value="CANCEL">Cancelled</option>
								</select>
							</div>
						</th>
                        <th class="text-right" style="width: 27%; vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
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