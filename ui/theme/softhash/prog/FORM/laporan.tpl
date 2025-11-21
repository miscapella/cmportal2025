{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Export</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}response/export/" id="rform">
                    <div class="form-group">
                        <label for="kode_form" class="col-sm-3 control-label">Form</label>
                        <div class="col-sm-9">
                        <select name="kode_form" id="kode_form" class="form-control">
                            {$opt}
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control">
                                <option value="excel">Excel</option>
                                <option value="csv">Csv</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dari" class="col-sm-3 control-label">Dari Tanggal</label>
                        <div class="col-sm-9">
                            <input type="text" id="dari" name="dari" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="{$today}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sampai" class="col-sm-3 control-label">Sampai Tanggal</label>
                        <div class="col-sm-9">
                            <input type="text" id="sampai" name="sampai" class="form-control tgl"  datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="{$today}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary">Export</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}
