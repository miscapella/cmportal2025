
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Pembelian</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="{$_url}reports/lapbeli-print" id="tform" role="form">
                    <div class="form-group">
                        <label for="fdate" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{date( 'm-Y', strtotime($tdate))}}" name="tdate" id="tdate" datepicker data-date-format="mm-yyyy" data-auto-close="true">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
