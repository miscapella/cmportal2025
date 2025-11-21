{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Form</h5>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                    <div class="form-group"><label class="col-lg-3 control-label" for="nocetak">No. Cetak Awal</label>

                        <div class="col-lg-4"><input type="text" id="nocetak" name="nocetak" class="form-control" maxlength="20" style="text-transform:uppercase" placeholder="No. Cetak Awal Blok">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="jlh">Jumlah 1 Blok</label>

                        <div class="col-lg-2">
                            <select name="jlh" id="jlh" class="form-control">
								<option value="">Pilih</option>
								<option value=1>1</option>
								<option value=50>50</option>
								<option value=100>100</option>
                            </select>

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