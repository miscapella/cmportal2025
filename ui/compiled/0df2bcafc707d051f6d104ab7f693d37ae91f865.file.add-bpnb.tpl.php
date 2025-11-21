<?php /* Smarty version Smarty-3.1.13, created on 2023-04-11 15:09:29
         compiled from "ui\theme\softhash\prog\GAS\add-bpnb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1757071436434d4a7264a10-88139552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0df2bcafc707d051f6d104ab7f693d37ae91f865' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\GAS\\add-bpnb.tpl',
      1 => 1681200567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1757071436434d4a7264a10-88139552',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6434d4a72a5487_76506033',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    'idate' => 0,
    'opt_spbi' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6434d4a72a5487_76506033')) {function content_6434d4a72a5487_76506033($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<h3>TAMBAH BUKTI PENERIMAAN BARANG</h3>
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
                   <li><button class="btn btn-primary btn-sm" name="save" id="save">Terima</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_bpnb">Tanggal BPnB</label>
					<div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="spbi">No. SPBI <span style="color: red;">*</span></label>
                    <div class="col-lg-9">
                        <select class="form-control" id="spbi" name="spbi">
                            <?php echo $_smarty_tpl->tpl_vars['opt_spbi']->value;?>

                        </select>
                    </div>
                </div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="nm_supplier">Supplier</label>
					<div class="col-lg-9"><input type="text" id="nm_supplier" name="nm_supplier" class="form-control" disabled></div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="pesan">Keterangan BPnB</label>
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
							<th style="width:2%">NO</th>
							<th style="width:20%">NOMOR PO</th>
                            <th style="width:20%">NOMOR PR</th>
							<th style="width:20%">NAMA BARANG</th>
							<th style="width:20%">Quantity</th>
                            <th style="width:20%">Satuan</th>
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