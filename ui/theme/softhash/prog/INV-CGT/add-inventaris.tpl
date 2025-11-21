{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <div class="ibox-tools">
            <a href="{$_url}inventaris/list/" class="btn btn-primary btn-xs"
              >Daftar Inventaris</a
            >
          </div>
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="alert alert-danger" id="emsg">
            <span id="emsgbody"></span>
          </div>
          <form class="form-horizontal" id="rforminventaris">
            <div class="col-lg-12">
              <h1 class="text-center">Detail Inventaris</h1>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="nama_inventaris"
                >Nama Inventaris <span style="color: red">*</span></label
              >
              <div class="col-lg-9">
                <input
                  type="text"
                  id="nama_inventaris"
                  name="nama_inventaris"
                  class="form-control"
                  style="text-transform: uppercase"
                  placeholder="Nama Inventaris"
                />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label" for="dipakai_oleh"
                >Dipakai Oleh</label
              >
              <div class="col-lg-9">
                <select
                  name="dipakai_oleh"
                  id="dipakai_oleh"
                  class="form-control"
                >
                  <option value="">Pilih Karyawan</option>
                </select>
              </div>
            </div>
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
