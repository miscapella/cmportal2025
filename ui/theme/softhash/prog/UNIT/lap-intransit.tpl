{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Stock Intransit</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}laporan/laporan-intransit/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="date" id="periode"name="periode"class="form-control"value="{$today}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ekspedisi" class="col-sm-4 control-label">Ekspedisi</label>
                        <div class="col-sm-8">
                        <select name="ekspedisi" id="ekspedisi" class="form-control">
                            <option value="SEMUA">SEMUA</option>
                           {$ekspedisi}
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}
