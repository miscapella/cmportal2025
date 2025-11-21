{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Pemenuhan PR</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}laporan/laporan-pemenuhan-pr/" id="rform">
                    <div class="form-group">
                        <label for="dari" class="col-sm-4 control-label">Dari Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" id="dari" name="dari" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="{$today}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sampai" class="col-sm-4 control-label">Sampai Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" id="sampai" name="sampai" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="{$today}">
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
