{include file="sections/header.tpl"} {if $msg neq ''}
<div class="alert alert-success fade in">
  <button class="close" data-dismiss="alert">×</button>
  <i class="fa-fw fa fa-check"></i>
  {$msg}
</div>
{/if}
<input type="hidden" id="id_inventaris" value="{$cid}">
<div class="section" id="section1">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body" style="background-color: #ccc">
          <input
            style="display: none"
            type="text"
            id="kode"
            class="form-control"
            value="{$d['kode_form']}"
          />
          <h3 style="text-align: center">
            <b>Form Pelaporan {$inventaris_record['nama_inventaris']}</b>
          </h3>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="alert alert-danger emsg" id="emsg">
        <a href="#"
          ><i class="fa fa-times" style="float: right" id="closeMsg1"></i
        ></a>
        <span id="emsgbody"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <pre style="all: unset; white-space: pre-wrap">{$d['deskripsi']}</pre>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <form id="formpelaporan" class="panel-body form-zoom" style="margin: 0">
          <div class="form-group">
            <label class="control-label label-pertanyaan" for="item_select"
              >Pilih Item</label
            ><br />
            <select
              name="item_select"
              id="item_select"
            >
              <option value="">Pilih Item</option>
              {foreach $item_record as $item}
              <option value="{$item['kode_item']}|{$item['nama_item']}">{$item['nama_item']}</option>
              {/foreach}
            </select>
          </div>
          <div class="form-group">
            <label for="" class="control-label label-pertanyaan"
              >Pilih Komponen?</label
            >
            <br />
            <pre style="all: unset; white-space: pre-wrap">(centang jika ingin melaporkan komponen item yang dipilih)</pre
            >
            <br />
            <input
              id="komponen_check_box"
              type="checkbox"
              name="komponen_check_box"
              value="{$pilih}"
              disabled
            /><label style="font-weight: normal"> {$pilih}</label><br />
          </div>
          <div
            class="form-group"
            style="display: none"
            id="form-group-komponen"
          >
            <label class="control-label label-pertanyaan" for="jawaban"
              >Pilih Komponen</label
            ><br />
            <select
              name="komponen_select"
              id="komponen_select"
            >
              <option value="">Pilih Komponen</option>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label label-pertanyaan" for="jawaban"
              >Rincian Permasalahan</label
            ><br />
            <textarea
              name="detail_permasalahan"
              id="detail_permasalahan"
              class="form-control"
              rows="5"
              style="resize: none; width: 100%"
            ></textarea>
          </div>
          <!-- Hidden Input -->
          <input type="hidden" id="inventaris" name="inventaris" value="{$inventaris_record['kode_inventaris']}|{$inventaris_record['nama_inventaris']}">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <button class="btn btn-danger" type="submit" id="submit">Submit</button>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">{$paginator['contents']}</div>
</div>
{include file="sections/footer.tpl"}
