<?php /* Smarty version Smarty-3.1.13, created on 2025-03-25 14:30:27
         compiled from "ui\theme\softhash\prog\HRD\edit-analitik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120737554667e259f3358b19-45740073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb4e5d5ff8a7ebd5d4d2586660f611ef93200212' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\edit-analitik.tpl',
      1 => 1742887827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120737554667e259f3358b19-45740073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67e259f33907e9_95403858',
  'variables' => 
  array (
    'panduan' => 0,
    '_L' => 0,
    '_url' => 0,
    'analitik' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67e259f33907e9_95403858')) {function content_67e259f33907e9_95403858($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
	const _panduan = <?php echo $_smarty_tpl->tpl_vars['panduan']->value;?>
;
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form class="form-horizontal" id="rformanalitik">
                    <div class="ibox-title">
                        <button class="btn btn-success" id="tambah"><i class="fa fa-plus"></i> Tambah Item</button>
                        <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                        <div class="ibox-tools">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
analitik/list/" class="btn btn-primary btn-xs">Daftar Analitik</a>
                        </div>
                    </div>
                    <div class="ibox-content" id="ibox_form">
                        <div class="alert alert-danger" id="eanalitik">
                            <span></span>
                        </div>
                        <div class="col-lg-12">
                            <h1 class="text-center">Detail Analitik</h1>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="nama_analitik"><span style="color: red;">*</span> Nama Analitik</label>
                            <div class="col-lg-9">
                                <input type="text" id="nama_analitik" name="nama_analitik" class="form-control" placeholder="Nama analitik" value="<?php echo $_smarty_tpl->tpl_vars['analitik']->value['name'];?>
">
                            </div>
                        </div>
                        <div id="analitik" style="margin-top: 64px; display: flex; flex-direction: column; gap: 64px;"></div>
                        <!-- <div class="form-group"><label class="col-lg-3 control-label" for="nama_departemen"><span style="color: red;">*</span> Nama Departemen</label>
                            <div class="col-lg-9"><input type="text" id="nama_departemen" name="nama_departemen" class="form-control" style="text-transform:uppercase" placeholder="Nama Departemen">
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>