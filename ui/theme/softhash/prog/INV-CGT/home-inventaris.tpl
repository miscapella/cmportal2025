{include file="sections/header.tpl"}
<!-- Error -->
{if $check_redirect != ""}
<div class="alert alert-danger" id="emsg">
  <span id="emsgbody">{$check_redirect}</span>
</div>
{/if}

<!-- Success -->
{if $msg neq ''}
<div class="alert alert-success fade in" id="alertberhasil">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  {$msg}
</div>
{/if}
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title" style="height: auto">
          <!-- <div class="ibox-tools"> -->
          <!-- <a href="{$_url}inventaris/list/" class="btn btn-primary btn-xs"
              >Daftar Inventaris</a
            > -->
          <h1 class="text-center">{$nama_inventaris}</h1>
          <!-- </div> -->
        </div>
        <div class="ibox-content" id="ibox_form">
          <div class="form-horizontal">
            <div class="alert alert-danger" id="emsg">
              <span id="emsgbody"></span>
            </div>
            <div class="form-group">
              <div class="col-lg-12 w-100">
                <a href="{$_url}inventaris/form-pelaporan/{$id_inventaris}" class="btn btn-primary btn-block btn-lg">
                  <i class="fa fa-file"></i> Tambah Form Pelaporan
                </a>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 w-100">
                <a href="{$_url}form/list/{$id_inventaris}" class="btn btn-info btn-block btn-lg">
                  <i class="fa fa-list-ol"></i> Cek status form
                </a>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 w-100">
                <a href="{$_url}inventaris/detail/{$id_inventaris}"
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
  {include file="sections/footer.tpl"}
</div>
