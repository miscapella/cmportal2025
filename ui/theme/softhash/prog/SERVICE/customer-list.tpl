{include file="sections/header.tpl"}

<input type="hidden" id="_url" value="{$_url}">

{if _auth2('UPDATE-MASTERDATA-CUSTOMER', $user['id'])}
<div class="row">
	<div class="col-md-9"></div>
    <div class="col-md-3">
		<a href="{$_url}customer/update/" class="btn btn-success btn-block"><i class="fa fa-edit"></i> Perbarui Data Customer</a>
    </div>
</div>
{/if}

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h3>Filter</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Merek</label>
                            <div id="flt_merek_group" style="max-height:30vh; overflow:auto; border:1px solid #ddd; padding:8px; border-radius:4px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-merek" value="" checked> Semua Merek
                                </label>
                                {foreach from=$merekList item=mrk}
                                    <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                        <input type="checkbox" class="chk-merek" value="{$mrk|escape}"> {$mrk}
                                    </label>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Tipe Kendaraan</label>
                            <div id="flt_tipe_kendaraan_group" style="max-height:none; overflow:visible; word-break:break-word; white-space:normal; border:1px solid #ddd; padding:8px; border-radius:4px; -webkit-column-count:2; -moz-column-count:2; column-count:2; -webkit-column-gap:16px; -moz-column-gap:16px; column-gap:16px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-tipe" value="" checked> Semua Kategori
                                </label>
                                {foreach from=$kategoriList item=kat}
                                    <label class="checkbox-inline" style="display:block; margin-bottom:6px; break-inside:avoid; -webkit-column-break-inside:avoid; -moz-column-break-inside:avoid;">
                                        <input type="checkbox" class="chk-tipe" value="{$kat|escape}"> {$kat}
                                    </label>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Lengkap/Tidak Lengkap</label>
                            <div id="flt_complete_group" style="max-height:30vh; overflow:auto; border:1px solid #ddd; padding:8px; border-radius:4px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-complete" value="" checked> Semua
                                </label>
                              
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-complete" value="incomplete"> Tidak Lengkap
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label>Cabang</label>
                            <div id="flt_cabang_group" style="max-height:30vh; overflow:auto; border:1px solid #ddd; padding:8px; border-radius:4px;">
                                <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                    <input type="checkbox" class="chk-cabang" value="" checked> Semua Cabang
                                </label>
                                {foreach from=$cabangList item=cbg}
                                    <label class="checkbox-inline" style="display:block; margin-bottom:6px;">
                                        <input type="checkbox" class="chk-cabang" value="{$cbg|escape}"> {$cbg}
                                    </label>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_unit_year_from">Tahun Kendaraan (From)</label>
                            <input type="number" id="flt_unit_year_from" class="form-control" min="1900" max="2100" placeholder="e.g. 2015">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_unit_year_to">Tahun Kendaraan (To)</label>
                            <input type="number" id="flt_unit_year_to" class="form-control" min="1900" max="2100" placeholder="e.g. 2024">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_service_year_from">Service Year (From)</label>
                            <input type="number" id="flt_service_year_from" class="form-control" min="1900" max="2100" placeholder="e.g. 2023">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="flt_service_year_to">Service Year (To)</label>
                            <input type="number" id="flt_service_year_to" class="form-control" min="1900" max="2100" placeholder="e.g. 2025">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <label>&nbsp;</label>
                        <div class="form-group">
                            <!-- <button id="btn-apply-filter" class="btn btn-primary"><i class="fa fa-filter"></i> Terapkan</button> -->
                            <button type="button" id="btn-reset-filter" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
                            <!-- <a href="{$_url}customer/export-active-filtered/" id="btn-export-active" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Active (Filtered)</a> -->
                            <!-- <a href="{$_url}customer/export-nonactive-filtered/" id="btn-export-nonactive" class="btn btn-warning"><i class="fa fa-file-excel-o"></i> Export Non-Active (Filtered)</a> -->
                            <a href="{$_url}customer/export-all-active/" class="btn btn-info"><i class="fa fa-download"></i> Export All Active</a>
                            <a href="{$_url}customer/export-all-nonactive/" class="btn btn-primary"><i class="fa fa-download"></i> Export All Non-Active</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Active Customers <small>(Total: <span id="count-active">0</span>)</small></h1>
                <div class="mb-10">
                    <button type="button" id="btn-export-active-table" class="btn btn-outline-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Tabel (Active)</button>
                </div>
                <br>
                <table id="datatable-customer" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="15%">Customer Name</th>
                            <th width="5%">Cabang</th>
                            <th width="15%">No Chassis</th>
                            <th width="10%">Mobile Phone</th>
                            <th width="20%">Tipe Kendaraan</th>
                            <th width="10%">Tahun Kendaraan</th>
                            <th width="10%">KM Kendaraan</th>
                            <th width="12%">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Non-Active Customers <small>(Total: <span id="count-nonactive">0</span>)</small></h1>
                <div class="mb-10">
                    <button type="button" id="btn-export-nonactive-table" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-excel-o"></i> Export Tabel (Non-Active)</button>
                </div>
                <br>
                <table id="datatable-nonactive-customer" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="15%">Customer Name</th>
                            <th width="5%">Cabang</th>
                            <th width="15%">No Chassis</th>
                            <th width="10%">Mobile Phone</th>
                            <th width="20%">Tipe Kendaraan</th>
                            <th width="10%">Tahun Kendaraan</th>
                            <th width="10%">KM Kendaraan</th>
                            <th width="12%">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>
{include file="sections/footer.tpl"}