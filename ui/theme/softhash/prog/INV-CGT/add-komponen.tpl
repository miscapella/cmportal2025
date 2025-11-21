{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <div class="ibox-tools">
            <a
              href="{$_url}inventaris/detail-item/{$id_inventaris}/{$id_item}"
              class="btn btn-primary btn-xs"
              >Daftar Komponen</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>
          <form class="form-horizontal" id="rformkomponen">
            <div class="col-lg-12">
              <h1 class="text-center">Detail Komponen</h1>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_komponen"
                >Nama Komponen <span style="color: red">*</span></label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_komponen"
                  name="nama_komponen"
                  class="form-control"
                  style="text-transform: uppercase"
                  placeholder="Nama Komponen"
                />
              </div>
            </div>
            <!-- Hidden Input -->
            <input
              type="hidden"
              id="id_inventaris"
              name="id_inventaris"
              value="{$id_inventaris}"
            />
            <input
              type="hidden"
              id="id_item"
              name="id_item"
              value="{$id_item}"
            />
            <div class="form-group">
              <div class="col-lg-offset-3 col-lg-9">
                <button class="btn btn-primary" type="submit" id="submit">
                  <i class="fa fa-check"></i> {$_L['Save']}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
{include file="sections/footer.tpl"}
