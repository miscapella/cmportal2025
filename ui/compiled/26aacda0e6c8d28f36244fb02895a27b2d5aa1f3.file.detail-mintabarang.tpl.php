<?php /* Smarty version Smarty-3.1.13, created on 2025-07-18 16:02:59
         compiled from "ui\theme\softhash\prog\GAS\detail-mintabarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72760264666d01622944180-57766087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26aacda0e6c8d28f36244fb02895a27b2d5aa1f3' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\detail-mintabarang.tpl',
      1 => 1748222642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72760264666d01622944180-57766087',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66d016229b71a0_83281811',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'previous_uri' => 0,
    'es' => 0,
    'clist_detail' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66d016229b71a0_83281811')) {function content_66d016229b71a0_83281811($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL UR</h3></div>
				<div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/<?php echo $_smarty_tpl->tpl_vars['previous_uri']->value;?>
" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Status</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['approval'];?>
" style="background-color: #f7f7f7;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #f7f7f7;" type="text" id="tgl" name="tgl" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['es']->value['tanggal'],'%d-%m-%Y');?>
" data-auto-close="true" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform" autocomplete="off" spellcheck="false">
					<table id='table-add-mr' class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:3%">#</th>
							<th style="width:15%">Keperluan</th>
							<th style="width:25%">Nama Barang</th>
							<th style="width:7%">Qty Req</th>
							<th style="width:15%">Tanggal Diperlukan</th>
							<th style="width:35%">Keterangan Permintaan</th>
						</tr>
						</thead>
						<tbody>
							<?php echo $_smarty_tpl->tpl_vars['clist_detail']->value;?>

						</tbody>
					</table>
				</form>
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