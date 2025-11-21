{include file="sections/header.tpl"}
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        <div class="form-group">History Perbaikan #1</div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tanggal</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="24 Juli 2024" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tipe</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Perbaikan" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Detail</label><span class="col-lg-1" style="text-align: right">:</span>
            <div class="col-lg-9">
              <textarea class="form-control" rows="5" disabled>Tes</textarea>
            </div>
          </div><br>
            <!-- <div class="form-group"><label class="col-lg-2 control-label" for="line">Bagian</label><span class="col-lg-1" style="text-align: right">:</span>
            <a href="#" class="detail-bagian col-lg-9" value="{$ds['line']}">Tes</a>
          </div><br> -->
        <hr>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div
        class="panel-body detail-pr-input"
        style="overflow: auto; white-space: nowrap"
      >
        <div class="form-group">History Perbaikan #2</div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tanggal</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="21 Juli 2024" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Tipe</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Pergantian" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Barang Lama</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Mouse" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Barang Baru</label><span class="col-lg-1" style="text-align: right">:</span>
            <input class="col-lg-9" type="text" id="keperluan" name="keperluan" class="form-control" value="Sepeda" disabled>
          </div><br>
          <div class="form-group" ><label class="col-lg-2 control-label" for="keperluan">Detail</label><span class="col-lg-1" style="text-align: right">:</span>
            <div class="col-lg-9">
              <textarea class="form-control" rows="5" disabled>Yang lama sudah rusak</textarea>
            </div>
          </div><br>
        <hr>
      </div>
    </div>
  </div>
</div>
{include file="sections/footer.tpl"}