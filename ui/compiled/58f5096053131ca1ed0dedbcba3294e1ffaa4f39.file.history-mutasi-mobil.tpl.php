<?php /* Smarty version Smarty-3.1.13, created on 2023-12-28 08:45:36
         compiled from "ui\theme\softhash\prog\UNIT\history-mutasi-mobil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1833535014654b1521acfcc0-84891452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58f5096053131ca1ed0dedbcba3294e1ffaa4f39' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\UNIT\\history-mutasi-mobil.tpl',
      1 => 1703727934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1833535014654b1521acfcc0-84891452',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_654b1521b02a30_54717766',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_654b1521b02a30_54717766')) {function content_654b1521b02a30_54717766($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">TGL KONFIRMASI</th>
                        <th style="width: 10%">NO BAST</th>
                        <th style="width: 13%">NO CHASSIS</th>
                        <th style="width: 10%">NO ENGINE</th>
                        <th style="width: 10%">KODE SUMBER</th>
                        <th style="width: 10%">KODE TUJUAN</th>
                        <th class="text-right" style="width: 20%">ACTION</th>
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