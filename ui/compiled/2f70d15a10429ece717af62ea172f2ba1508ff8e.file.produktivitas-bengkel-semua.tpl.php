<?php /* Smarty version Smarty-3.1.13, created on 2025-08-13 15:47:44
         compiled from "ui\theme\softhash\prog\HRD\produktivitas-bengkel-semua.tpl" */ ?>
<?php /*%%SmartyHeaderCode:911973169683d083a96e861-82828846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f70d15a10429ece717af62ea172f2ba1508ff8e' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\produktivitas-bengkel-semua.tpl',
      1 => 1755074851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '911973169683d083a96e861-82828846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_683d083a99be36_70931678',
  'variables' => 
  array (
    'semuaCabang' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_683d083a99be36_70931678')) {function content_683d083a99be36_70931678($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
produktivitas-bengkel/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Unit Entry Semua Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_semua-cat">Kategori</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_unit_entry_semua-tipe" name="grafik_unit_entry_semua-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_unit_entry_semua-dari" name="grafik_unit_entry_semua-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_unit_entry_semua-hingga" name="grafik_unit_entry_semua-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_unit_entry_semua-cat" name="grafik_unit_entry_semua-cat" class="form-control" style="width: 100%;">
                                            <option value="daihatsu" selected>Daihatsu</option>
                                            <option value="udt">UD Trucks</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_unit_entry_semua" style="margin-top: 32px;"></canvas>
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