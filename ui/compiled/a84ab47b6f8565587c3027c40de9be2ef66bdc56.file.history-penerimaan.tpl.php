<?php /* Smarty version Smarty-3.1.13, created on 2023-11-08 11:31:16
         compiled from "ui\theme\softhash\prog\UNIT\history-penerimaan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13451192416549e7dc9a9681-07862337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a84ab47b6f8565587c3027c40de9be2ef66bdc56' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\history-penerimaan.tpl',
      1 => 1699417874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13451192416549e7dc9a9681-07862337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6549e7dc9daa89_98007103',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6549e7dc9daa89_98007103')) {function content_6549e7dc9daa89_98007103($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">TANGGAL INPUT</th>
                        <th style="width: 15%">NO CHASSIS</th>
                        <th style="width: 15%">NO ENGINE</th>
                        <th style="width: 20%">EKSPEDISI</th>
                        <th style="width: 20%">NAMA TYPE</th>
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