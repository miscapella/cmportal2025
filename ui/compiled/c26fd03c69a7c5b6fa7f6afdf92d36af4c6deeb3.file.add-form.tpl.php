<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:10
         compiled from "ui\theme\softhash\prog\KUBOTA\add-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8242686256358a58a862b21-09194627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26fd03c69a7c5b6fa7f6afdf92d36af4c6deeb3' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\add-form.tpl',
      1 => 1641267303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8242686256358a58a862b21-09194627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a58a89a6b8_06014372',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a58a89a6b8_06014372')) {function content_6358a58a89a6b8_06014372($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Form</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                    <div class="form-group"><label class="col-lg-3 control-label" for="nocetak">No. Cetak Awal</label>

                        <div class="col-lg-4"><input type="text" id="nocetak" name="nocetak" class="form-control" maxlength="20" style="text-transform:uppercase" placeholder="No. Cetak Awal Blok">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="jlh">Jumlah 1 Blok</label>

                        <div class="col-lg-2">
                            <select name="jlh" id="jlh" class="form-control">
								<option value="">Pilih</option>
								<option value=1>1</option>
								<option value=50>50</option>
								<option value=100>100</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
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