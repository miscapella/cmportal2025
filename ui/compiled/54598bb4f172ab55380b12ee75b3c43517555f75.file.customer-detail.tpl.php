<?php /* Smarty version Smarty-3.1.13, created on 2025-10-30 14:41:31
         compiled from "ui\theme\softhash\prog\SERVICE\customer-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207479105769019123756325-83953142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54598bb4f172ab55380b12ee75b3c43517555f75' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\customer-detail.tpl',
      1 => 1761809700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207479105769019123756325-83953142',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_690191243a5dc3_27748749',
  'variables' => 
  array (
    'servis' => 0,
    '_url' => 0,
    'customer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_690191243a5dc3_27748749')) {function content_690191243a5dc3_27748749($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<style>
	.highlight-row {
		background-color: #d0e7ff !important;
	}
</style>

<script>
    // const _servis = <?php echo $_smarty_tpl->tpl_vars['servis']->value;?>
;
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" style="position: sticky; top: 50px; z-index: 50;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body blue-bg">
                    <div class="col-lg-6">
                        <h3>DETAIL CUSTOMER</h3>
                    </div>
                    <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/list/" class="btn btn-primary btn-sm">Back</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Personal Information</h1>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Customer Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['customer_name'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['alamat'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Equipment No.</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['equipment_no'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">No. Polisi</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['no_polisi'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tipe Kendaraan</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['tipe_kendaraan'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tahun Kendaraan</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['tahun_kendaraan'];?>
" disabled>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Contacts Information</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Home</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['home'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Office</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['office'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['mobile'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">CP Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['cp_name'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">CP Phone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['cp_phone'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">DM Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['dm_name'];?>
" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">DM Phone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['dm_phone'];?>
" disabled>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="row" id="servis">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Histori servis</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <table id="datatable" class="table table-bordered table-hover sys_table" data-equipment-no="<?php echo $_smarty_tpl->tpl_vars['customer']->value['equipment_no'];?>
">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="15%">Tanggal Servis</th>
                                            <th width="15%">Job Type</th>
                                            <th width="5%">Cabang</th>
                                            <th width="10%">Nama SA</th>
                                            <th width="15%">Tanggal Selesai</th>
                                            <th width="7%">KM</th>
                                            <th width="15%">Tanggal Delivery</th>
                                            <th width="15%">Customer Receive Car</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>