<?php /* Smarty version Smarty-3.1.13, created on 2024-07-18 10:32:14
         compiled from "ui\theme\softhash\prog\INV-CGT\list-komponen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7415277566961489ae3862-22681162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4072535272fb7e9166c1837cdfc92d827a1ed400' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\INV-CGT\\list-komponen.tpl',
      1 => 1721273470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7415277566961489ae3862-22681162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66961489b21fb4_71511435',
  'variables' => 
  array (
    'msg' => 0,
    'id_inventaris' => 0,
    'id_item' => 0,
    '_url' => 0,
    'nama_inventaris' => 0,
    'nama_item' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66961489b21fb4_71511435')) {function content_66961489b21fb4_71511435($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<input type="hidden" id="id_inventaris" value="<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
" />
<input type="hidden" id="id_item" value="<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
" />

<div
  class="modal fade"
  id="perbaikanModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Perbaikan</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
          id="closePerbaikanModal"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="perbaikanModalForm">
          <div class="alert alert-danger" id="emsgModalPerbaikan">
            <a href="#"
              ><i
                class="fal fa-times"
                style="float: right"
                id="closeMsgModal"
              ></i
            ></a>
            <span id="emsgModalbody"></span>
          </div>
          <div class="form-group">
            <label for="keteranganPerbaikanModal" class="col-form-label"
              >DETAIL</label
            >
            <textarea
              name="keteranganModal"
              type="text"
              placeholder="Tuliskan Detail Perbaikan"
              class="form-control"
              id="keteranganPerbaikanModal"
              rows="5"
              style="resize: none"
            ></textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              id="cancelPerbaikanModal"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              id="submitPerbaikanModalForm"
              class="btn btn-success"
            >
              Submit
            </button>
          </div>
          <!-- Hidden Input -->
          <input
            type="hidden"
            id="kodeBarangPerbaikanModal"
            name="kode_barang"
          />
          <input
            type="hidden"
            id="tipePerbaikan"
            name="tipe"
            value="PERBAIKAN"
          />
        </form>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="pergantianModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Pergantian</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
          id="closePergantianModal"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="pergantianModalForm">
          <div class="alert alert-danger" id="emsgModalPergantian">
            <a href="#"
              ><i
                class="fal fa-times"
                style="float: right"
                id="closeMsgModal"
              ></i
            ></a>
            <span id="emsgModalbody"></span>
          </div>
          <div class="form-group">
            <label for="namaBarangLamaPergantianModal" class="col-form-label"
              >BARANG LAMA</label
            >
            <input
              name="namaBarangLamaModal"
              type="text"
              class="form-control"
              id="namaBarangLamaPergantianModal"
              readonly
            />
          </div>
          <div class="form-group">
            <label for="namaBarangBaruPergantianModal" class="col-form-label"
              >BARANG BARU</label
            >
            <input name="namaBarangBaruModal" type="text" class="form-control"
            id="namaBarangBaruPergantianModal" style="text-transform: uppercase">
          </div>
          <div class="form-group">
            <label for="alasanPergantianModal" class="col-form-label"
              >ALASAN PERGANTIAN</label
            >
            <input name="alasanPergantianModal" type="text" class="form-control"
            id="alasanPergantianModal">
          </div>
          <div class="form-group">
            <label for="keteranganPergantianModal" class="col-form-label"
              >DETAIL</label
            >
            <textarea
              name="keteranganModal"
              type="text"
              placeholder="Tuliskan Detail Pergantian"
              class="form-control"
              id="keteranganPergantianModal"
              rows="5"
              style="resize: none"
            ></textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              id="cancelPergantianModal"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              id="submitPergantianModalForm"
              class="btn btn-success"
            >
              Submit
            </button>
          </div>
          <!-- Hidden Input -->
          <input
            type="hidden"
            id="kodeBarangPergantianModal"
            name="kode_barang"
          />
          <input
            type="hidden"
            id="tipePergantian"
            name="tipe"
            value="PERGANTIAN"
          />
        </form>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-9">
    <div class="hexagon-container">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/list/" class="hexagon">Inventaris</a>
    </div>
    <div class="hexagon-container4" style="margin-left: -15px">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/detail/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
/" class="hexagon4"
        ><?php echo $_smarty_tpl->tpl_vars['nama_inventaris']->value;?>
</a
      >
    </div>
    <div class="hexagon-container2" style="margin-left: -15px">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/detail-item/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
/" class="hexagon2"
        ><?php echo $_smarty_tpl->tpl_vars['nama_item']->value;?>
</a
      >
    </div>
  </div>
  <div class="col-md-3">
    <a
      href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
inventaris/addkomponen/<?php echo $_smarty_tpl->tpl_vars['id_inventaris']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
"
      class="btn btn-success btn-block"
      ><i class="fa fa-plus"></i> Tambah Komponen</a
    >
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="card-body panel-body">
        <table
          id="datatable"
          class="table table-bordered table-hover sys_table"
        >
          <thead>
            <tr>
              <th width="3%">#</th>
              <th width="20%">Kode Komponen</th>
              <th width="25%">Nama Komponen</th>
              <th width="20%" class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>