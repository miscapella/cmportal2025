<?php /* Smarty version Smarty-3.1.13, created on 2024-07-24 15:54:02
         compiled from "ui\theme\softhash\prog\INV-CGT\history-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53172081766a0bfa9600f51-85531194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1e66dd45654314558a7a48ebcfddb972751bf9f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\history-inventaris.tpl',
      1 => 1721811237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53172081766a0bfa9600f51-85531194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66a0bfa96505b4_46944390',
  'variables' => 
  array (
    'ds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66a0bfa96505b4_46944390')) {function content_66a0bfa96505b4_46944390($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        <div class="form-group">History Perbaikan #1</div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tanggal</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="24 Juli 2024" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tipe</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Perbaikan" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Detail</label><span class="col-lg-1" style="text-align: right">:</span>
            <div class="col-lg-9">
              <textarea class="form-control" rows="5" disabled>Tes</textarea>
            </div>
          </div><br>
            <!-- <div class="form-group"><label class="col-lg-2 control-label" for="line">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
            <a href="#" class="detail-bagian col-lg-9" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['line'];?>
">Tes</a>
          </div><br> -->
        <hr>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        <div class="form-group">History Perbaikan #2</div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tanggal</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="21 Juli 2024" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tipe</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Pergantian" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Barang Lama</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Mouse" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Barang Baru</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Sepeda" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Detail</label><span class="col-lg-1" style="text-align: right">:</span>
            <div class="col-lg-9">
              <textarea class="form-control" rows="5" disabled>Yang lama sudah rusak</textarea>
            </div>
          </div><br>
        <hr>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>