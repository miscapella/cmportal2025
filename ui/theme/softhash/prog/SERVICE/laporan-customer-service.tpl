{include file="sections/header_service.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Customer Service - Matrix Tahun Kendaraan vs Tahun Service</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}laporan-service/customer-service/" id="rform">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tahun Service</label>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_service_from" class="form-control" 
                                           value="{if isset($filter_tahun_service_from)}{$filter_tahun_service_from}{else}{$current_year - 8}{/if}" 
                                           placeholder="Dari" min="2000" max="2030">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_service_to" class="form-control" 
                                           value="{if isset($filter_tahun_service_to)}{$filter_tahun_service_to}{else}{$current_year}{/if}" 
                                           placeholder="Hingga" min="2000" max="2030">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tahun Kendaraan</label>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_kendaraan_from" class="form-control" 
                                           value="{if isset($filter_tahun_kendaraan_from)}{$filter_tahun_kendaraan_from}{else}{$current_year - 8}{/if}" 
                                           placeholder="Dari" min="1990" max="2030">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" name="tahun_kendaraan_to" class="form-control" 
                                           value="{if isset($filter_tahun_kendaraan_to)}{$filter_tahun_kendaraan_to}{else}{$current_year}{/if}" 
                                           placeholder="Hingga" min="1990" max="2030">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit">Generate Report</button>
                            {if isset($show_results) && $show_results}
                            <button class="btn btn-success" type="submit" formaction="{$_url}laporan-service/export-customer-service/">Export Excel</button>
                            {/if}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{if isset($show_results) && $show_results}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Customer Service Matrix ({$filter_tahun_service_from} - {$filter_tahun_service_to})</h5>
                <div class="ibox-tools">
                    <small>Tahun Kendaraan: {$filter_tahun_kendaraan_from} - {$filter_tahun_kendaraan_to}</small>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-bordered" style="font-size: 12px; background-color: white;">
                        <thead>
                            <tr style="background-color: #f5f5f5; color: black;">
                                <th rowspan="2" class="text-center" style="vertical-align: middle; border: 1px solid #333; font-weight: bold;">TAHUN<br>KENDARAAN</th>
                                <th colspan="{$tahun_service_range|@count}" class="text-center" style="border: 1px solid #333; font-weight: bold;">TAHUN SERVICE</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle; border: 1px solid #333; font-weight: bold;">TOTAL</th>
                            </tr>
                            <tr style="background-color: #f5f5f5; color: black;">
                                {foreach $tahun_service_range as $ts}
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;">{$ts}</th>
                                {/foreach}
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $tahun_kendaraan_range as $tk}
                            <tr style="background-color: white;">
                                <td class="text-center" style="border: 1px solid #333; font-weight: bold; color: black;">{$tk}</td>
                                {foreach $tahun_service_range as $ts}
                                <td class="text-center" style="border: 1px solid #333; color: black;">
                                    {if $matrix_data[$tk][$ts] > 0}
                                        <strong>{$matrix_data[$tk][$ts]|number_format}</strong>
                                    {else}
                                        -
                                    {/if}
                                </td>
                                {/foreach}
                                <td class="text-center" style="border: 1px solid #333; background-color: #f9f9f9; color: black;">
                                    <strong>{$total_per_tahun_kendaraan[$tk]|number_format}</strong>
                                </td>
                            </tr>
                            {/foreach}
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #e8f5e8; color: black;">
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;">TOTAL</th>
                                {foreach $tahun_service_range as $ts}
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;">{$total_per_tahun_service[$ts]|number_format}</th>
                                {/foreach}
                                <th class="text-center" style="border: 1px solid #333; font-weight: bold;">{$grand_total|number_format}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4>Summary Statistics</h4>
                            </div>
                            <div class="panel-body">
                                <p><strong>Total Records:</strong> {$grand_total|number_format}</p>
                                <p><strong>Tahun Service Range:</strong> {$filter_tahun_service_from} - {$filter_tahun_service_to}</p>
                                <p><strong>Tahun Kendaraan Range:</strong> {$filter_tahun_kendaraan_from} - {$filter_tahun_kendaraan_to}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4>Top Service Years</h4>
                            </div>
                            <div class="panel-body">
                                {assign var="sorted_years" value=$total_per_tahun_service}
                                {foreach $sorted_years as $year => $count}
                                <p><strong>{$year}:</strong> {$count|number_format} services</p>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{/if}

{include file="sections/footer.tpl"}
