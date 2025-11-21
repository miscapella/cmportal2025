<?php /* Smarty version Smarty-3.1.13, created on 2023-04-11 08:28:35
         compiled from "ui\theme\softhash\prog\GAS\add-spbi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215248823642e480a56c358-97901085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ff15eab5e7e9b25be32f71a50645d7d4a799307' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\add-spbi.tpl',
      1 => 1681176477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215248823642e480a56c358-97901085',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_642e480a5c6fc9_26931365',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'idate' => 0,
    'opt_po' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_642e480a5c6fc9_26931365')) {function content_642e480a5c6fc9_26931365($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH SURAT PENGANTAR BARANG INTERN</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
<!--
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/list-pr/" class="btn btn-primary btn-sm">Daftar PR</a>
				</div>
-->
                <ul style="padding: 0;list-style-type:none">
                   <li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_spbi">Tanggal SPBI</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="no_po">No PO <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="no_po" name="no_po">
                            <?php echo $_smarty_tpl->tpl_vars['opt_po']->value;?>

                        </select>
                    </div>
                </div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="nm_supplier">Supplier</label>
					<div class="col-lg-9"><input type="text" id="nm_supplier" name="nm_supplier" class="form-control" disabled></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="kepada">Kepada <span style="color: red;">*</span></label>
					<div class="col-lg-9"><textarea type="text" id="kepada" name="kepada" class="form-control" rows="3"></textarea>
					</div>
				</div><br><br><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Keterangan SPBI</label>
					<div class="col-lg-9"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"></textarea>
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
                <form class="form-horizontal" id="rform">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th style="width:20%">No. PR</th>
							<th style="width:20%">Nama Barang</th>
							<th style="width:20%">Quantity</th>
                            <th style="width:20%">Satuan</th>
							<th style="width:20%">Keterangan</th>
						</tr>
						</thead>
						<tbody class="sys_tables">
						<div style="display:none" name="opt" id="opt"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</div>
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