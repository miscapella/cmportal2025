{include file="sections/header.tpl"}
{if $msg neq ''}
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">
    ×
  </button>
  <i class="fa-fw fa fa-check"></i>
  {$msg}
</div>
{/if}
<input type="hidden" id="id_inventaris" value="{$id_inventaris}" />
<div class="row">
  <div class="col-md-9">
    <div class="hexagon-container3">
      <a href="{$_url}inventaris/list/" class="hexagon3">Inventaris</a>
    </div>
  </div>
  <div class="col-md-3">
    <a href="{$_url}inventaris/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Inventaris</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="card-body panel-body">
        <table id="datatable" class="table table-bordered table-hover sys_table">
          <thead>
            <tr>
              <th width="3%">#</th>
              <th width="25%">Kode Form</th>
              <th width="25%">Tgl Pengajuan</th>
              <th width="25%">Status</th>
              <th width="15%" class="text-right">{$_L['Manage']}</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{include file="sections/footer.tpl"}