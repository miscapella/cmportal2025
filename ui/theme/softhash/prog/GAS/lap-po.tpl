{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan PO</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}laporan/laporan-po/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="text" id="periode"name="periode"class="form-control"value="{$today}" readonly>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-4 control-label" for="supplier">Supplier</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="supplier" name="supplier">
                                {$opt_supplier}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                        <select name="status" id="status" class="form-control">
                            <option value="PENDING">PENDING</option>
                            <option value="APPROVE">APPROVE</option>
                            <option value="REJECT">REJECT</option>
                            <option value="CANCEL">CANCEL</option>
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
