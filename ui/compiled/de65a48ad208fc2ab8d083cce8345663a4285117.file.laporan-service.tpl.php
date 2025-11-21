<?php /* Smarty version Smarty-3.1.13, created on 2025-11-17 15:41:08
         compiled from "ui\theme\softhash\prog\SERVICE\laporan-service.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1793585566691add73cd97c5-42735609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de65a48ad208fc2ab8d083cce8345663a4285117' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\laporan-service.tpl',
      1 => 1763368862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1793585566691add73cd97c5-42735609',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_691add73d2fbd3_42875264',
  'variables' => 
  array (
    '_url' => 0,
    'today' => 0,
    'kode_tipe' => 0,
    'show_results' => 0,
    'periode_filter' => 0,
    'tipe_filter' => 0,
    'status_filter' => 0,
    'laporan_data' => 0,
    'index' => 0,
    'data' => 0,
    'total_biaya' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_691add73d2fbd3_42875264')) {function content_691add73d2fbd3_42875264($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header_service.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <h4><i class="fa fa-info-circle"></i> Pilih Jenis Laporan</h4>
            <p>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/" class="btn btn-primary">
                    <i class="fa fa-list"></i> Laporan Service Harian
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/customer-service/" class="btn btn-success">
                    <i class="fa fa-table"></i> Laporan Customer Service Matrix
                </a>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Service Harian</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="date" id="periode" name="periode" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_tipe" class="col-sm-4 control-label">Tipe Kendaraan</label>
                        <div class="col-sm-8">
                            <select name="kode_tipe" id="kode_tipe" class="form-control">
                                <option value="SEMUA">SEMUA</option>
                                <?php echo $_smarty_tpl->tpl_vars['kode_tipe']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status_service" class="col-sm-4 control-label">Status Service</label>
                        <div class="col-sm-8">
                            <select name="status_service" id="status_service" class="form-control">
                                <option value="SEMUA">SEMUA</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PROGRESS">PROGRESS</option>
                                <option value="SELESAI">SELESAI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary" type="submit">Display</button>
                            <?php if (isset($_smarty_tpl->tpl_vars['show_results']->value)&&$_smarty_tpl->tpl_vars['show_results']->value){?>
                            <button class="btn btn-success" type="submit" formaction="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
laporan-service/export/">Export CSV</button>
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
                <h5>Hasil Laporan Service</h5>
                <div class="ibox-tools">
                    <small>Periode: <?php echo $_smarty_tpl->tpl_vars['periode_filter']->value;?>
 | Tipe: <?php echo $_smarty_tpl->tpl_vars['tipe_filter']->value;?>
 | Status: <?php echo $_smarty_tpl->tpl_vars['status_filter']->value;?>
</small>
                </div>
            </div>
            <div class="ibox-content">
                <?php if (count($_smarty_tpl->tpl_vars['laporan_data']->value)>0){?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>No Polisi</th>
                                <th>Tipe Kendaraan</th>
                                <th>Tanggal Service</th>
                                <th>Status</th>
                                <th>Keluhan</th>
                                <th>Biaya Service</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['laporan_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['customer_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['no_polisi'];?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['data']->value['nama_tipe']){?><?php echo $_smarty_tpl->tpl_vars['data']->value['nama_tipe'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['tipe_kendaraan'];?>
<?php }?></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['tgl_service'];?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['status_service']=='SELESAI'){?>
                                        <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['data']->value['status_service'];?>
</span>
                                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['status_service']=='PROGRESS'){?>
                                        <span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['data']->value['status_service'];?>
</span>
                                    <?php }else{ ?>
                                        <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['data']->value['status_service'];?>
</span>
                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['keluhan'];?>
</td>
                                <td class="text-right">Rp <?php echo number_format($_smarty_tpl->tpl_vars['data']->value['biaya_service'],0,",",".");?>
</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-info">
                                <th colspan="7" class="text-right">Total Biaya Service:</th>
                                <th class="text-right">Rp <?php echo number_format($_smarty_tpl->tpl_vars['total_biaya']->value,0,",",".");?>
</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php }else{ ?>
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle"></i> Tidak ada data service ditemukan untuk kriteria yang dipilih.
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>