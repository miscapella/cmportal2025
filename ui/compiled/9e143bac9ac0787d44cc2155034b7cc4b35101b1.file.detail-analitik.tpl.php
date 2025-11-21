<?php /* Smarty version Smarty-3.1.13, created on 2025-03-26 13:21:08
         compiled from "ui\theme\softhash\prog\HRD\detail-analitik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128841404267e11f9ae90e95-16896193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e143bac9ac0787d44cc2155034b7cc4b35101b1' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\detail-analitik.tpl',
      1 => 1742970061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128841404267e11f9ae90e95-16896193',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67e11f9aeed532_29925178',
  'variables' => 
  array (
    'items' => 0,
    'grafik' => 0,
    'panduan' => 0,
    '_url' => 0,
    'analitik' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67e11f9aeed532_29925178')) {function content_67e11f9aeed532_29925178($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	const _items   = <?php echo $_smarty_tpl->tpl_vars['items']->value;?>
;
	const _grafik = <?php echo $_smarty_tpl->tpl_vars['grafik']->value;?>
;
	const _panduan = <?php echo $_smarty_tpl->tpl_vars['panduan']->value;?>
;
</script>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL ANALITIK</h3></div>
				<div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
analitik/list" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Analitik</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['analitik']->value['name'];?>
" style="background-color: #f7f7f7;" disabled>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-lg-3 control-label">Dibuat Oleh</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['analitik']->value['fullname'];?>
" style="background-color: #f7f7f7;" disabled>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-lg-3 control-label">Tanggal</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['analitik']->value['created_at'],'%d-%m-%Y');?>
" style="background-color: #f7f7f7;" data-auto-close="true" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div id="analitik"></div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>