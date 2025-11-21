<?php /* Smarty version Smarty-3.1.13, created on 2023-11-02 14:58:56
         compiled from "ui\theme\softhash\prog\UNIT\list-penerimaan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:931988680654356a249d602-59398847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a9536b6255ad4f19e32c554ed1069ed316e2fbb' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\list-penerimaan.tpl',
      1 => 1698911934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '931988680654356a249d602-59398847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_654356a24d92b0_63472949',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_654356a24d92b0_63472949')) {function content_654356a24d92b0_63472949($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">NO CHASSIS</th>
                        <th style="width: 13%">NO ENGINE</th>
                        <th style="width: 15%">EXPEDISI</th>
                        <th style="width: 15%">KAPAL</th>
                        <th style="width: 15%">TGL BERANGKAT</th>
                        <th style="width: 15%">KODE TYPE</th>
                        <th class="text-right" style="width: 10%">ACTION</th>
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