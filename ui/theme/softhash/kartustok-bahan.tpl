
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Kartu Stock Bahan Baku</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="{$_url}reports/kartustok-bahan-view" id="tform" role="form">
                    <div class="form-group">
                        <label for="description" class="col-sm-4 control-label">Kode Bahan Baku</label>
                        <div class="col-sm-8">
                            <select id="kode" name="kode">
                                <option value="">Pilih Kode Bahan</option>
                                {foreach $d as $ds}
                                    <option value="{$ds['code']}">{$ds['code']} - {$ds['name']}</option>
                                {/foreach}


                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="fdate" class="col-sm-4 control-label">{$_L['From Date']}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{date( $_c['df'], strtotime($fdate))}}" name="fdate" id="fdate" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tdate" class="col-sm-4 control-label">{$_L['To Date']}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  value="{{date( $_c['df'], strtotime($tdate))}}" name="tdate" id="tdate" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true">

                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="stype" class="col-sm-4 control-label">{$_L['Type']}</label>
                        <div class="col-sm-8">
                            <select id="stype" name="stype" class="form-control">
                                <option value="all" selected="selected">Semua</option>
                                <option value="credit">Keluar</option>
                                <option value="debit">Masuk</option>

                            </select>
                        </div>
                    </div>-->
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
