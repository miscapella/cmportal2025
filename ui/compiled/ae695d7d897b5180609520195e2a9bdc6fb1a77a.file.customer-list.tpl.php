<?php /* Smarty version Smarty-3.1.13, created on 2025-11-20 15:54:06
         compiled from "ui\theme\softhash\prog\SERVICE\customer-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180730068468edc99f98d705-49061508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae695d7d897b5180609520195e2a9bdc6fb1a77a' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\customer-list.tpl',
      1 => 1763628826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180730068468edc99f98d705-49061508',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_68edc99f9d5ac5_42023766',
  'variables' => 
  array (
    '_url' => 0,
    'user' => 0,
    'merekList' => 0,
    'mrk' => 0,
    'kategoriList' => 0,
    'kat' => 0,
    'cabangList' => 0,
    'cbg' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_68edc99f9d5ac5_42023766')) {function content_68edc99f9d5ac5_42023766($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<input type="hidden" id="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">

<?php if (_auth2('UPDATE-MASTERDATA-CUSTOMER',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/update/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Perbarui Data Customer</a>
    </div>
</div>
<?php }?>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h3>Filter</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Merek</label>
                            <div id="flt_merek_group" style="max-height:30vh; overflow:auto; border:1px solid #ddd; padding:8px; border-radius:4px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-merek" value="" checked> Semua Merek
                                </label>
                                <?php  $_smarty_tpl->tpl_vars['mrk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mrk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['merekList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mrk']->key => $_smarty_tpl->tpl_vars['mrk']->value){
$_smarty_tpl->tpl_vars['mrk']->_loop = true;
?>
                                    <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                        <input type="checkbox" class="chk-merek" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mrk']->value, ENT_QUOTES, 'UTF-8', true);?>
"> <?php echo $_smarty_tpl->tpl_vars['mrk']->value;?>

                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Tipe Kendaraan</label>
                            <div id="flt_tipe_kendaraan_group" style="max-height:none; overflow:visible; word-break:break-word; white-space:normal; border:1px solid #ddd; padding:8px; border-radius:4px; -webkit-column-count:2; -moz-column-count:2; column-count:2; -webkit-column-gap:16px; -moz-column-gap:16px; column-gap:16px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-tipe" value="" checked> Semua Kategori
                                </label>
                                <?php  $_smarty_tpl->tpl_vars['kat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['kategoriList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kat']->key => $_smarty_tpl->tpl_vars['kat']->value){
$_smarty_tpl->tpl_vars['kat']->_loop = true;
?>
                                    <label class="checkbox-inline" style="display:block; margin-bottom:6px; break-inside:avoid; -webkit-column-break-inside:avoid; -moz-column-break-inside:avoid;">
                                        <input type="checkbox" class="chk-tipe" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kat']->value, ENT_QUOTES, 'UTF-8', true);?>
"> <?php echo $_smarty_tpl->tpl_vars['kat']->value;?>

                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Lengkap/Tidak Lengkap</label>
                            <div id="flt_complete_group" style="max-height:30vh; overflow:auto; border:1px solid #ddd; padding:8px; border-radius:4px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-complete" value="" checked> Semua
                                </label>
                              
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-complete" value="incomplete"> Tidak Lengkap
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Cabang</label>
                            <div id="flt_cabang_group" style="max-height:30vh; overflow:auto; border:1px solid #ddd; padding:8px; border-radius:4px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-cabang" value="" checked> Semua Cabang
                                </label>
                                <?php  $_smarty_tpl->tpl_vars['cbg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cbg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cabangList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cbg']->key => $_smarty_tpl->tpl_vars['cbg']->value){
$_smarty_tpl->tpl_vars['cbg']->_loop = true;
?>
                                    <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                        <input type="checkbox" class="chk-cabang" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cbg']->value, ENT_QUOTES, 'UTF-8', true);?>
"> <?php echo $_smarty_tpl->tpl_vars['cbg']->value;?>

                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_unit_year_from">Tahun Kendaraan (From)</label>
                            <input type="number" id="flt_unit_year_from" class="form-control" min="1900" max="2100" placeholder="e.g. 2015">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_unit_year_to">Tahun Kendaraan (To)</label>
                            <input type="number" id="flt_unit_year_to" class="form-control" min="1900" max="2100" placeholder="e.g. 2024">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_service_year_from">Service Year (From)</label>
                            <input type="number" id="flt_service_year_from" class="form-control" min="1900" max="2100" placeholder="e.g. 2023">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_service_year_to">Service Year (To)</label>
                            <input type="number" id="flt_service_year_to" class="form-control" min="1900" max="2100" placeholder="e.g. 2025">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <label>&nbsp;</label>
                        <div class="form-group">
                            <!-- <button id="btn-apply-filter" class="btn btn-primary"><i class="fa fa-filter"></i> Terapkan</button> -->
                            <button type="button" id="btn-reset-filter" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
                            <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/export-active-filtered/" id="btn-export-active" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Active (Filtered)</a> -->
                            <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/export-nonactive-filtered/" id="btn-export-nonactive" class="btn btn-warning"><i class="fa fa-file-excel-o"></i> Export Non-Active (Filtered)</a> -->
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/export-all-active/" class="btn btn-info"><i class="fa fa-download"></i> Export All Active</a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customer/export-all-nonactive/" class="btn btn-primary"><i class="fa fa-download"></i> Export All Non-Active</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Active Customers <small>(Total: <span id="count-active">0</span>)</small></h1>
                <div class="mb-10">
                    <button type="button" id="btn-export-active-table" class="btn btn-outline-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Tabel (Active)</button>
                </div>
                <br>
                <table id="datatable-customer" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="15%">Customer Name</th>
                            <th width="5%">Cabang</th>
                            <th width="15%">No Chassis</th>
                            <th width="10%">Mobile Phone</th>
                            <th width="20%">Tipe Kendaraan</th>
                            <th width="10%">Tahun Kendaraan</th>
                            <th width="10%">KM Kendaraan</th>
                            <th width="12%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Non-Active Customers <small>(Total: <span id="count-nonactive">0</span>)</small></h1>
                <div class="mb-10">
                    <button type="button" id="btn-export-nonactive-table" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-excel-o"></i> Export Tabel (Non-Active)</button>
                </div>
                <br>
                <table id="datatable-nonactive-customer" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="15%">Customer Name</th>
                            <th width="5%">Cabang</th>
                            <th width="15%">No Chassis</th>
                            <th width="10%">Mobile Phone</th>
                            <th width="20%">Tipe Kendaraan</th>
                            <th width="10%">Tahun Kendaraan</th>
                            <th width="10%">KM Kendaraan</th>
                            <th width="12%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>