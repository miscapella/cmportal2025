{include file="sections/header.tpl"}   
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Service</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                
                <div class="form-group"><label class="col-lg-3 control-label" for="nopolisi">No. Polisi</label>

                <div class="col-lg-4"><input type="text" id="nopolisi" name="nopolisi" class="form-control" maxlength="20" style="text-transform:uppercase" placeholder="">
                </div>
                <button type="submit" class="btn btn-sm btn-success" name="cari">Cari</button>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="tipemobil">Tipe Mobil</label>

                        <div class="col-lg-4"><input type="text" id="tipemobil" name="tipemobil" class="form-control" maxlength="20" style="text-transform:uppercase" placeholder="" disabled="true">

                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="pemilik">Pemilik</label>

                        <div class="col-lg-4"><input type="text" id="pemilik" name="pemilik" class="form-control" disabled="true">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="jenisservice">Jenis Service</label>

                        <div class="col-lg-4">
                            <select name="jlh" id="jlh" class="form-control">
								<option value="">Pilih</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="biaya">Estimasi Biaya</label>

                    <div class="col-lg-4"><input type="price" id="biaya" name="biaya" disabled="true" class="form-control">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="tglservice">Tanggal Service</label>

                    <div class="col-lg-4"><input type="text" id="tglservice" name="tglservice" class="form-control" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="cabang">Tempat Service</label>

                        <div class="col-lg-4"><input type="text" id="cabang" name="cabang" class="form-control">

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
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