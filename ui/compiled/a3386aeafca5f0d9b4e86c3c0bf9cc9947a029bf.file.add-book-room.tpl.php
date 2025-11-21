<?php /* Smarty version Smarty-3.1.13, created on 2025-02-19 14:42:48
         compiled from "ui\theme\softhash\add-book-room.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103129311967b43e7912ff94-00807052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3386aeafca5f0d9b4e86c3c0bf9cc9947a029bf' => 
    array (
      0 => 'ui\\theme\\softhash\\add-book-room.tpl',
      1 => 1739950965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103129311967b43e7912ff94-00807052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67b43e791804a0_25132499',
  'variables' => 
  array (
    'daftar_ruangan' => 0,
    'ruangan' => 0,
    'waktu' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67b43e791804a0_25132499')) {function content_67b43e791804a0_25132499($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h3>Booking Ruangan</h3>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>

          <form class="form-horizontal form-zoom" id="rform">
            <div class="form-group">
              <label class="control-label" for="tanggal_meeting"
                >Room | Hall</label
              >
              <div>
                <select id="ruangan" name="ruangan">
                  <option value="">Pilih Room | Hall</option>
                  <?php  $_smarty_tpl->tpl_vars['ruangan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ruangan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daftar_ruangan']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ruangan']->key => $_smarty_tpl->tpl_vars['ruangan']->value){
$_smarty_tpl->tpl_vars['ruangan']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['ruangan']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['ruangan']->value['nama_ruangan'];?>

                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="direksi"
                >Apakah direksi mengikuti meeting?</label
              ><br />
              <input type="radio" id="ikut" name="direksi" value="TRUE" />
              <label class="form-check-label" for="ikut">Ya</label><br />
              <input
                type="radio"
                id="tidak_ikut"
                name="direksi"
                value="FALSE"
              />
              <label class="form-check-label" for="tidak_ikut">Tidak</label>
            </div>
            <div class="form-group">
              <label class="control-label" for="tanggal_meeting"
                >Tanggal dan Waktu Meeting</label
              >
              <div class="row">
                <input
                  type="date"
                  id="tanggal_meeting"
                  name="tanggal_meeting"
                  class="form-control col-lg-6"
                  style="margin-left: 15px"
                  value=""
                />
                <select
                  id="waktu_meeting"
                  name="waktu_meeting"
                  class="col-lg-2"
                  style="margin-left: 15px"
                >
                  <option value="">Pilih Waktu</option>
                  <?php echo $_smarty_tpl->tpl_vars['waktu']->value;?>

                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="durasi"
                >Durasi Meeting (dalam Jam)</label
              >
              <input
                type="number"
                id="durasi"
                name="durasi"
                min="1"
                class="form-control"
                value=""
              />
            </div>
            <div class="form-group">
              <label class="control-label" for="durasi"
                >Jumlah Peserta dalam Ruangan (Orang)</label
              >
              <input
                type="number"
                id="jumlah_peserta"
                name="jumlah_peserta"
                min="1"
                class="form-control"
                value=""
              />
            </div>
            <div class="form-group">
              <label class="control-label" for="durasi">Keterangan</label>
              <input
                id="keterangan"
                name="keterangan"
                class="form-control"
                value=""
              />
            </div>

            <!-- <div class="form-group">
              <label class="control-label" for="pinjaman"
                >Pinjam inventaris barang IT</label
              ><br /> -->
            <!-- <input
                class="form-check-input"
                type="checkbox"
                id="laptop"
                name="pinjaman[]"
                value="laptop"
              />
              <label class="form-check-label" for="laptop">Laptop</label><br />
              <input
                class="form-check-input"
                type="checkbox"
                id="infocus"
                name="pinjaman[]"
                value="infocus"
              />
              <label class="form-check-label" for="infocus">Infocus</label
              ><br />
              <input
                class="form-check-input"
                type="checkbox"
                id="speaker"
                name="pinjaman[]"
                value="speaker"
              />
              <label class="form-check-label" for="speaker">Speaker</label
              ><br />
              <input
                class="form-check-input"
                type="checkbox"
                id="microphone"
                name="pinjaman[]"
                value="microphone"
              />
              <label class="form-check-label" for="microphone">Microphone</label
              ><br />
              <input
                class="form-check-input"
                type="checkbox"
                id="webcam"
                name="pinjaman[]"
                value="webcam"
              />
              <label class="form-check-label" for="webcam">Webcam</label><br />
              <input
                class="form-check-input"
                type="checkbox"
                id="tripod"
                name="pinjaman[]"
                value="tripod"
              />
              <label class="form-check-label" for="tripod">Tripod</label> -->
            <!-- <input class="form-check-input" type="checkbox" id="laptop-acer" name="pinjaman[]" value="laptop acer"> <label class="form-check-label" for="laptop-acer">Laptop Acer</label><br>
                        <input class="form-check-input" type="checkbox" id="laptop-hp" name="pinjaman[]" value="laptop hp"> <label class="form-check-label" for="laptop-hp">Laptop HP</label><br>
                        <input class="form-check-input" type="checkbox" id="infocus-a" name="pinjaman[]" value="infocus A"> <label class="form-check-label" for="infocus-1">Infocus A</label><br> -->
            <!-- <input class="form-check-input" type="checkbox" id="infocus-b" name="pinjaman[]" value="infocus B"> <label class="form-check-label" for="infocus-2">Infocus B</label><br> -->
            <!-- <input class="form-check-input" type="checkbox" id="speaker" name="pinjaman[]" value="speaker"> <label class="form-check-label" for="speaker">Speaker</label><br>
                        <input class="form-check-input" type="checkbox" id="microphone" name="pinjaman[]" value="microphone"> <label class="form-check-label" for="microphone">Microphone</label><br>
                        <input class="form-check-input" type="checkbox" id="webcam" name="pinjaman[]" value="webcam"> <label class="form-check-label" for="webcam">Webcam</label><br>
                        <input class="form-check-input" type="checkbox" id="tripod" name="pinjaman[]" value="tripod"> <label class="form-check-label" for="tripod">Tripod</label>
            </div> -->
            <button class="btn btn-primary" type="submit" id="submit">
              <i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>

            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>