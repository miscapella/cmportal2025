<?php /* Smarty version Smarty-3.1.13, created on 2022-12-07 09:35:32
         compiled from "ui\theme\softhash\add-otoritas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:407045286638ffbf4e98bb5-09627079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2df012b2de289cb563d87650e926afbbee1971c6' => 
    array (
      0 => 'ui\\theme\\softhash\\add-otoritas.tpl',
      1 => 1642405205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '407045286638ffbf4e98bb5-09627079',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'program' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_638ffbf4ee7155_23899070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_638ffbf4ee7155_23899070')) {function content_638ffbf4ee7155_23899070($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Otoritas</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rform">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_oto">Kode Otoritas</label>
                        <div class="col-lg-9"><input type="text" id="kode_oto" name="kode_oto" class="form-control"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="program">Program</label>
                        <div class="col-lg-9">
                            <select name="program" id="program" class="form-control">
                                <option value="">Pilih Program</option>
                                <?php echo $_smarty_tpl->tpl_vars['program']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="ket_oto">Keterangan</label>
                        <div class="col-lg-9"><input type="text" id="ket_oto" name="ket_oto" class="form-control"></div>
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