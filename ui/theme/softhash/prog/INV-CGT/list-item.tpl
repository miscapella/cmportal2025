{include file="sections/header.tpl"} {if $msg neq ''}
<div class="alert alert-success fade in" id="alertberhasil">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  {$msg}
</div>
{/if}
<input type="hidden" id="id_inventaris" value="{$id_inventaris}" />

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

{if $check_redirect != ""}
<div class="alert alert-danger" id="emsg">
  <span id="emsgbody">{$check_redirect}</span>
</div>
{/if}

<div class="row">
  <div class="col-md-9">
    <div class="hexagon-container">
      <a href="{$_url}inventaris/list/" class="hexagon">Inventaris</a>
    </div>
    <div class="hexagon-container2" style="margin-left: -15px">
      <a href="{$_url}inventaris/detail/{$id_inventaris}/" class="hexagon2"
        >{$nama_inventaris}</a
      >
    </div>
  </div>
  <div class="col-md-3">
    <a
      href="{$_url}inventaris/additem/{$id_inventaris}"
      class="btn btn-success btn-block"
      ><i class="fa fa-plus"></i> Tambah Item</a
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
              <th width="20%">Kode Item</th>
              <th width="25%">Nama Item</th>
              <th width="25%">Terdapat Komponen</th>
              <th width="20%" class="text-right">{$_L['Manage']}</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{include file="sections/footer.tpl"}
