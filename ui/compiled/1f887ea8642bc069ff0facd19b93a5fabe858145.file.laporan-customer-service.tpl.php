<?php /* Smarty version Smarty-3.1.13, created on 2025-11-21 09:49:10
         compiled from "ui\theme\softhash\prog\SERVICE\laporan-customer-service.tpl" */ ?>
<?php /*%%SmartyHeaderCode:972129368691adfabdfe6e0-97187223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f887ea8642bc069ff0facd19b93a5fabe858145' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\laporan-customer-service.tpl',
      1 => 1763693348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '972129368691adfabdfe6e0-97187223',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_691adfac05a502_57097110',
  'variables' => 
  array (
    '_url' => 0,
    'filter_tahun_service_from' => 0,
    'current_year' => 0,
    'filter_tahun_service_to' => 0,
    'filter_tahun_kendaraan_from' => 0,
    'filter_tahun_kendaraan_to' => 0,
    'show_results' => 0,
    'tahun_service_range' => 0,
    'ts' => 0,
    'tahun_kendaraan_range' => 0,
    'tk' => 0,
    'matrix_data' => 0,
    'total_per_tahun_kendaraan' => 0,
    'total_per_tahun_service' => 0,
    'grand_total' => 0,
    'sorted_years' => 0,
    'year' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_691adfac05a502_57097110')) {function content_691adfac05a502_57097110($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header_service.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Customer Service - Matrix Tahun Kendaraan vs Tahun Service</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/customer-service/" id="rform">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tahun Service</label>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_service_from" class="form-control" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['filter_tahun_service_from']->value)){?><?php echo $_smarty_tpl->tpl_vars['filter_tahun_service_from']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['current_year']->value-8;?>
<?php }?>" 
                                           placeholder="Dari" min="2000" max="2030">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_service_to" class="form-control" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['filter_tahun_service_to']->value)){?><?php echo $_smarty_tpl->tpl_vars['filter_tahun_service_to']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['current_year']->value;?>
<?php }?>" 
                                           placeholder="Hingga" min="2000" max="2030">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tahun Kendaraan</label>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_kendaraan_from" class="form-control" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['filter_tahun_kendaraan_from']->value)){?><?php echo $_smarty_tpl->tpl_vars['filter_tahun_kendaraan_from']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['current_year']->value-8;?>
<?php }?>" 
                                           placeholder="Dari" min="1990" max="2030">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_kendaraan_to" class="form-control" 
                                           value="<?php if (isset($_smarty_tpl->tpl_vars['filter_tahun_kendaraan_to']->value)){?><?php echo $_smarty_tpl->tpl_vars['filter_tahun_kendaraan_to']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['current_year']->value;?>
<?php }?>" 
                                           placeholder="Hingga" min="1990" max="2030">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit">Generate Report</button>
                            <?php if (isset($_smarty_tpl->tpl_vars['show_results']->value)&&$_smarty_tpl->tpl_vars['show_results']->value){?>
                            <button class="btn btn-success" type="submit" formaction="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/export-customer-service/">Export Excel</button>
                            <?php }?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['show_results']->value)&&$_smarty_tpl->tpl_vars['show_results']->value){?>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Customer Service Matrix (<?php echo $_smarty_tpl->tpl_vars['filter_tahun_service_from']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['filter_tahun_service_to']->value;?>
)</h5>
                <div class="ibox-tools">
                    <small>Tahun Kendaraan: <?php echo $_smarty_tpl->tpl_vars['filter_tahun_kendaraan_from']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['filter_tahun_kendaraan_to']->value;?>
</small>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-bordered" style="font-size: 12px; background-color: white;">
                        <thead>
                            <tr style="background-color: #f5f5f5; color: black;">
                                <th rowspan="2" class="text-center" style="vertical-align: middle; border: 1px solid #333; font-weight: bold;">TAHUN<br>KENDARAAN</th>
                                <th colspan="<?php echo count($_smarty_tpl->tpl_vars['tahun_service_range']->value);?>
" class="text-center" style="border: 1px solid #333; font-weight: bold;">TAHUN SERVICE</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle; border: 1px solid #333; font-weight: bold;">TOTAL</th>
                            </tr>
                            <tr style="background-color: #f5f5f5; color: black;">
                                <?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tahun_service_range']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
$_smarty_tpl->tpl_vars['ts']->_loop = true;
?>
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['ts']->value;?>
</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['tk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tahun_kendaraan_range']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tk']->key => $_smarty_tpl->tpl_vars['tk']->value){
$_smarty_tpl->tpl_vars['tk']->_loop = true;
?>
                            <tr style="background-color: white;">
                                <td class="text-center" style="border: 1px solid #333; font-weight: bold; color: black;"><?php echo $_smarty_tpl->tpl_vars['tk']->value;?>
</td>
                                <?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tahun_service_range']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
$_smarty_tpl->tpl_vars['ts']->_loop = true;
?>
                                <td class="text-center" style="border: 1px solid #333; color: black;">
                                    <?php if ($_smarty_tpl->tpl_vars['matrix_data']->value[$_smarty_tpl->tpl_vars['tk']->value][$_smarty_tpl->tpl_vars['ts']->value]>0){?>
                                        <strong><?php echo number_format($_smarty_tpl->tpl_vars['matrix_data']->value[$_smarty_tpl->tpl_vars['tk']->value][$_smarty_tpl->tpl_vars['ts']->value]);?>
</strong>
                                    <?php }else{ ?>
                                        -
                                    <?php }?>
                                </td>
                                <?php } ?>
                                <td class="text-center" style="border: 1px solid #333; background-color: #f9f9f9; color: black;">
                                    <strong><?php echo number_format($_smarty_tpl->tpl_vars['total_per_tahun_kendaraan']->value[$_smarty_tpl->tpl_vars['tk']->value]);?>
</strong>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #e8f5e8; color: black;">
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;">TOTAL</th>
                                <?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tahun_service_range']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
$_smarty_tpl->tpl_vars['ts']->_loop = true;
?>
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;"><?php echo number_format($_smarty_tpl->tpl_vars['total_per_tahun_service']->value[$_smarty_tpl->tpl_vars['ts']->value]);?>
</th>
                                <?php } ?>
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;"><?php echo number_format($_smarty_tpl->tpl_vars['grand_total']->value);?>
</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4>Summary Statistics</h4>
                            </div>
                            <div class="panel-body">
                                <p><strong>Total Records:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['grand_total']->value);?>
</p>
                                <p><strong>Tahun Service Range:</strong> <?php echo $_smarty_tpl->tpl_vars['filter_tahun_service_from']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['filter_tahun_service_to']->value;?>
</p>
                                <p><strong>Tahun Kendaraan Range:</strong> <?php echo $_smarty_tpl->tpl_vars['filter_tahun_kendaraan_from']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['filter_tahun_kendaraan_to']->value;?>
</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4>Top Service Years</h4>
                            </div>
                            <div class="panel-body">
                                <?php $_smarty_tpl->tpl_vars["sorted_years"] = new Smarty_variable($_smarty_tpl->tpl_vars['total_per_tahun_service']->value, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['count']->_loop = false;
 $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sorted_years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['count']->key => $_smarty_tpl->tpl_vars['count']->value){
$_smarty_tpl->tpl_vars['count']->_loop = true;
 $_smarty_tpl->tpl_vars['year']->value = $_smarty_tpl->tpl_vars['count']->key;
?>
                                <p><strong><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['count']->value);?>
 services</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>