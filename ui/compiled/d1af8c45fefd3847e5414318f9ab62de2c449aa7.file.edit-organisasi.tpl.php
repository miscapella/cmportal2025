<?php /* Smarty version Smarty-3.1.13, created on 2024-06-14 11:35:31
         compiled from "ui\theme\softhash\prog\HRD\edit-organisasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2033675125666abdeb43de41-34852223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1af8c45fefd3847e5414318f9ab62de2c449aa7' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\edit-organisasi.tpl',
      1 => 1718339324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2033675125666abdeb43de41-34852223',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_666abdeb48d7f3_58419886',
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'id_posisi' => 0,
    'nama_posisi' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_666abdeb48d7f3_58419886')) {function content_666abdeb48d7f3_58419886($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
struktur-organisasi/list/" class="btn btn-primary btn-xs">Struktur Organisasi</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformorganisasi">
                    <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
                    <input type="hidden" name="id_posisi_before" id="id_posisi_before" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_posisi'];?>
">
                    <div class="col-lg-12"><h1 class="text-center">Edit Organisasi</h1></div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="id_posisi"><span style="color: red;">*</span> Id Posisi</label>
                      <div class="col-lg-9"><input type="text" id="id_posisi" name="id_posisi" class="form-control" placeholder="Id Posisi" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id_posisi'];?>
">
                      </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nama_internal"><span style="color: red;">*</span> Nama Internal</label>
                    <div class="col-lg-9"><input type="text" id="nama_internal" name="nama_internal" class="form-control" placeholder="Nama Internal" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_internal'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nama_eksternal"> Nama Eksternal</label>
                    <div class="col-lg-9"><input type="text" id="nama_eksternal" name="nama_eksternal" class="form-control" placeholder="Nama Eksternal" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_eksternal'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="deskripsi"> Deskripsi</label>
                    <div class="col-lg-9"><input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['deskripsi'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="pekerjaan"> Pekerjaan</label>
                    <div class="col-lg-9"><input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pekerjaan'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nama_pekerjaan"> Nama Pekerjaan</label>
                    <div class="col-lg-9"><input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control" placeholder="Nama Pekerjaan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nama_pekerjaan'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nilai_posisi"> Nilai Posisi</label>
                    <div class="col-lg-9"><input type="text" id="nilai_posisi" name="nilai_posisi" class="form-control" placeholder="Nilai Posisi" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['nilai_posisi'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="valid_dari"><span style="color: red;">*</span> Valid Dari</label>
                    <div class="col-lg-9"><input type="date" id="valid_dari" name="valid_dari" class="form-control" placeholder="Valid Dari" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['valid_dari'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="valid_sampai"><span style="color: red;">*</span> Valid Sampai</label>
                    <div class="col-lg-9"><input type="date" id="valid_sampai" name="valid_sampai" class="form-control" placeholder="Valid Sampai" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['valid_sampai'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="parent_id_posisi"><span style="color: red;">*</span> Parent Id Posisi</label>
                    <div class="col-lg-9">
                      <select class="form-control" id="parent_id_posisi" name="parent_id_posisi">
                        <?php echo $_smarty_tpl->tpl_vars['id_posisi']->value;?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="parent_nama_posisi"> Parent Nama Posisi</label>
                    <div class="col-lg-9">
                      <select class="form-control" id="parent_nama_posisi" name="parent_nama_posisi" disabled>
                        <?php echo $_smarty_tpl->tpl_vars['nama_posisi']->value;?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="parent_valid_dari"><span style="color: red;">*</span> Parent Valid Dari</label>
                    <div class="col-lg-9"><input type="date" id="parent_valid_dari" name="parent_valid_dari" class="form-control" placeholder="Parent Valid Dari" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['parent_valid_dari'];?>
">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="parent_valid_sampai"><span style="color: red;">*</span> Parent Valid Sampai</label>
                    <div class="col-lg-9"><input type="date" id="parent_valid_sampai" name="parent_valid_sampai" class="form-control" placeholder="Parent Valid Sampai" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['parent_valid_sampai'];?>
">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
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