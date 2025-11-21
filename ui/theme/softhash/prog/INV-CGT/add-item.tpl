{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <div class="ibox-tools">
            <a
              href="{$_url}inventaris/detail/{$inv_id}"
              class="btn btn-primary btn-xs"
              >Daftar Item</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>
          <form class="form-horizontal" id="rformitem">
            <div class="col-lg-12">
              <h1 class="text-center">Detail Item</h1>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_item"
                >Nama Item <span style="color: red">*</span></label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_item"
                  name="nama_item"
                  class="form-control"
                  style="text-transform: uppercase"
                  placeholder="Nama Item"
                />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="ada_komponen"
                >Terdapat Komponen</label
              >
              <div class="col-lg-8">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="ada_komponen"
                  name="ada_komponen"
                  value="Y"
                />
              </div>
            </div>
            <!-- Hidden Input -->
            <input
              type="hidden"
              id="id_inventaris"
              name="id_inventaris"
              value="{$inv_id}"
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
