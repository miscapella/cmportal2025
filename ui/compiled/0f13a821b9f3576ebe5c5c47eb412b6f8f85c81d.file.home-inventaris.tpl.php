<?php /* Smarty version Smarty-3.1.13, created on 2024-07-24 15:24:56
         compiled from "ui\theme\softhash\prog\INV-CGT\home-inventaris.tpl" */ ?>
<?php /*%%SmartyHeaderCode:790049733669637ebbe5439-97245747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f13a821b9f3576ebe5c5c47eb412b6f8f85c81d' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\home-inventaris.tpl',
      1 => 1721809493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '790049733669637ebbe5439-97245747',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_669637ebc12d23_03374111',
  'variables' => 
  array (
    'check_redirect' => 0,
    'msg' => 0,
    '_url' => 0,
    'nama_inventaris' => 0,
    'id_inventaris' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_669637ebc12d23_03374111')) {function content_669637ebc12d23_03374111($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- Error -->
<?php if ($_smarty_tpl->tpl_vars['check_redirect']->value!=''){?>
<div class="alert alert-danger" id="emsg">
  <span id="emsgbody"><?php echo $_smarty_tpl->tpl_vars['check_redirect']->value;?>
</span>
</div>
<?php }?>

<!-- Success -->
<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in" id="alertberhasil">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title" style="height: auto">
          <!-- <div class="ibox-tools"> -->
          <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="btn btn-primary btn-xs"
              >Daftar Inventaris</a
            > -->
          <h1 class="text-center"><?php echo $_smarty_tpl->tpl_vars['nama_inventaris']->value;?>
</h1>
          <!-- </div> -->
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="form-horizontal">
            <div class="alert alert-danger" id="emsg">
              <span id="emsgbody"></span>
            </div>
            <div class="form-group">
              <div class="col-lg-12 w-100">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/form-pelaporan/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
" class="btn btn-primary btn-block btn-lg">
                  <i class="fa fa-file"></i> Tambah Form Pelaporan
                </a>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 w-100">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form/list/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
" class="btn btn-info btn-block btn-lg">
                  <i class="fa fa-list-ol"></i> Cek status form
                </a>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 w-100">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/detail/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
"
                  ><button class="btn btn-success btn-block btn-lg">
                    <i class="fa fa-book"></i> Detail Inventaris
                  </button></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }} ?>