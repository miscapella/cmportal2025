<?php /* Smarty version Smarty-3.1.13, created on 2025-08-13 13:52:47
         compiled from "ui\theme\softhash\prog\HRD\produktivitas-marketing-semua.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4178630686861f6213053c4-77618472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '380aba0c531c0c02bac294ec24fd5d9e11ecbdfe' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\produktivitas-marketing-semua.tpl',
      1 => 1755067888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4178630686861f6213053c4-77618472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6861f6213359a8_23253069',
  'variables' => 
  array (
    'semuaCabang' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6861f6213359a8_23253069')) {function content_6861f6213359a8_23253069($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
    const semuaCabang = <?php echo $_smarty_tpl->tpl_vars['semuaCabang']->value;?>
;
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
produktivitas-marketing/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Penjualan Semua Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-4" for="grafik_penjualan_semua-tipe">Tipe Waktu</label>
                                    <label class="col-lg-4" for="grafik_penjualan_semua-dari">Dari</label>
                                    <label class="col-lg-4" for="grafik_penjualan_semua-hingga">Hingga</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select id="grafik_penjualan_semua-tipe" name="grafik_penjualan_semua-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_penjualan_semua-dari" name="grafik_penjualan_semua-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_penjualan_semua-hingga" name="grafik_penjualan_semua-hingga" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_penjualan_semua" style="margin-top: 32px;"></canvas>
                                </div>
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