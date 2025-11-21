{include file="sections/header_service.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <h4><i class="fa fa-info-circle"></i> Pilih Jenis Laporan</h4>
            <p>
                <a href="{$_url}laporan-service/" class="btn btn-primary">
                    <i class="fa fa-list"></i> Laporan Service Harian
                </a>
                <a href="{$_url}laporan-service/customer-service/" class="btn btn-success">
                    <i class="fa fa-table"></i> Laporan Customer Service Matrix
                </a>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Laporan Service Harian</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}laporan-service/" id="rform">
                    <div class="form-group">
                        <label for="periode" class="col-sm-4 control-label">Periode</label>
                        <div class="col-sm-8">
                            <input type="date" id="periode" name="periode" class="form-control" value="{$today}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_tipe" class="col-sm-4 control-label">Tipe Kendaraan</label>
                        <div class="col-sm-8">
                            <select name="kode_tipe" id="kode_tipe" class="form-control">
                                <option value="SEMUA">SEMUA</option>
                                {$kode_tipe}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status_service" class="col-sm-4 control-label">Status Service</label>
                        <div class="col-sm-8">
                            <select name="status_service" id="status_service" class="form-control">
                                <option value="SEMUA">SEMUA</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PROGRESS">PROGRESS</option>
                                <option value="SELESAI">SELESAI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button class="btn btn-primary" type="submit">Display</button>
                            {if isset($show_results) && $show_results}
                            <button class="btn btn-success" type="submit" formaction="{$_url}laporan-service/export/">Export CSV</button>
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
                <h5>Hasil Laporan Service</h5>
                <div class="ibox-tools">
                    <small>Periode: {$periode_filter} | Tipe: {$tipe_filter} | Status: {$status_filter}</small>
                </div>
            </div>
            <div class="ibox-content">
                {if $laporan_data|@count > 0}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>No Polisi</th>
                                <th>Tipe Kendaraan</th>
                                <th>Tanggal Service</th>
                                <th>Status</th>
                                <th>Keluhan</th>
                                <th>Biaya Service</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $laporan_data as $index => $data}
                            <tr>
                                <td>{$index + 1}</td>
                                <td>{$data.customer_name}</td>
                                <td>{$data.no_polisi}</td>
                                <td>{if $data.nama_tipe}{$data.nama_tipe}{else}{$data.tipe_kendaraan}{/if}</td>
                                <td>{$data.tgl_service}</td>
                                <td>
                                    {if $data.status_service == 'SELESAI'}
                                        <span class="label label-success">{$data.status_service}</span>
                                    {elseif $data.status_service == 'PROGRESS'}
                                        <span class="label label-warning">{$data.status_service}</span>
                                    {else}
                                        <span class="label label-danger">{$data.status_service}</span>
                                    {/if}
                                </td>
                                <td>{$data.keluhan}</td>
                                <td class="text-right">Rp {$data.biaya_service|number_format:0:",":"."}</td>
                            </tr>
                            {/foreach}
                        </tbody>
                        <tfoot>
                            <tr class="bg-info">
                                <th colspan="7" class="text-right">Total Biaya Service:</th>
                                <th class="text-right">Rp {$total_biaya|number_format:0:",":"."}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {else}
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle"></i> Tidak ada data service ditemukan untuk kriteria yang dipilih.
                </div>
                {/if}
            </div>
        </div>
    </div>
</div>
{/if}

{include file="sections/footer.tpl"}