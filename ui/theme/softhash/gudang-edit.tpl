{include file="sections/header.tpl"}
<div class="row">
    <div class="widget-1 col-md-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Gudang</h3>
            </div>
            <div class="panel-body">
                <form role="form" name="accadd" method="post" action="{$_url}gudang/edit-post">
                    <div class="form-group">
                        <label for="account">Kode Gudang</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="{$d['kode_gudang']}">
                    </div>
                    <div class="form-group">
                        <label for="description">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{$d['lokasi']}">
                    </div>


					<input type="hidden" name="id" value="{$d['id']}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                </form>
            </div>
        </div>
    </div> <!-- Widget-1 end-->

    <!-- Widget-2 end-->
</div>


{include file="sections/footer.tpl"}
