{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="{$_url}struktur-organisasi/list/" class="btn btn-primary btn-xs">Struktur Organisasi</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformorganisasi">
                  <div class="col-lg-12"><h1 class="text-center">Organisasi Baru</h1></div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="id_posisi"><span style="color: red;">*</span> Id Posisi</label>
                      <div class="col-lg-9"><input type="text" id="id_posisi" name="id_posisi" class="form-control" placeholder="Id Posisi">
                      </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nama_internal"><span style="color: red;">*</span> Nama Internal</label>
                    <div class="col-lg-9"><input type="text" id="nama_internal" name="nama_internal" class="form-control" placeholder="Nama Internal">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nama_eksternal"> Nama Eksternal</label>
                    <div class="col-lg-9"><input type="text" id="nama_eksternal" name="nama_eksternal" class="form-control" placeholder="Nama Eksternal">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="deskripsi"> Deskripsi</label>
                    <div class="col-lg-9"><input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="pekerjaan"> Pekerjaan</label>
                    <div class="col-lg-9"><input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nama_pekerjaan"> Nama Pekerjaan</label>
                    <div class="col-lg-9"><input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control" placeholder="Nama Pekerjaan">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="nilai_posisi"> Nilai Posisi</label>
                    <div class="col-lg-9"><input type="text" id="nilai_posisi" name="nilai_posisi" class="form-control" placeholder="Nilai Posisi">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="valid_dari"><span style="color: red;">*</span> Valid Dari</label>
                    <div class="col-lg-9"><input type="date" id="valid_dari" name="valid_dari" class="form-control" placeholder="Valid Dari">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="valid_sampai"><span style="color: red;">*</span> Valid Sampai</label>
                    <div class="col-lg-9"><input type="date" id="valid_sampai" name="valid_sampai" class="form-control" placeholder="Valid Sampai">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="parent_id_posisi"><span style="color: red;">*</span> Parent Id Posisi</label>
                    <div class="col-lg-9">
                      <select class="form-control" id="parent_id_posisi" name="parent_id_posisi">
                        {$id_posisi}
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="parent_nama_posisi"> Parent Nama Posisi</label>
                    <div class="col-lg-9">
                      <select class="form-control" id="parent_nama_posisi" name="parent_nama_posisi" disabled>
                        {$nama_posisi}
                      </select>
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="parent_valid_dari"><span style="color: red;">*</span> Parent Valid Dari</label>
                    <div class="col-lg-9"><input type="date" id="parent_valid_dari" name="parent_valid_dari" class="form-control" placeholder="Parent Valid Dari">
                    </div>
                  </div>
                  <div class="form-group"><label class="col-lg-3 control-label" for="parent_valid_sampai"><span style="color: red;">*</span> Parent Valid Sampai</label>
                    <div class="col-lg-9"><input type="date" id="parent_valid_sampai" name="parent_valid_sampai" class="form-control" placeholder="Parent Valid Sampai">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                      <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}