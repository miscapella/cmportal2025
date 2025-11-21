
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tambah Gudang</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="{$_url}gudang/add-post">
                    <div class="form-group">
                        <label for="account">Kode Gudang</label>
                        <input type="text" class="form-control" id="kode" name="kode">
                    </div>
                    <div class="form-group">
                        <label for="description">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                </form>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
