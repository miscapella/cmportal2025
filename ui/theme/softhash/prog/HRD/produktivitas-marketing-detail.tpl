{include file="sections/header.tpl"}

<div class="modal fade" id="list-position" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="datatable-position" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            {if _auth2('SHOW-MASTERDATA-POSISI', $user['id'])}
                            <th width="3%" style="background: transparent;"><input type="checkbox" id="position-all"></th>
                            <th width="3%">#</th>
                            <th width="30%">Position Id</th>
                            <th width="54%">Position Title</th>
                            <th width="10%">{$_L['Manage']}</th>
                            {else}
                            <th width="3%" style="background: transparent;"><input type="checkbox" id="position-all"></th>
                            <th width="3%">#</th>
                            <th width="35%">Position Id</th>
                            <th width="59%">Position Title</th>
                            {/if}
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="list-employee" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="datatable-employee" class="table table-bordered table-hover sys_table">
                    <thead>
                        {if _auth2('SHOW-MASTERDATA-KARYAWAN', $user['id'])}
						<th width="3%">#</th>
						<th width="14%">Employee Id</th>
						<th width="22%">Employee Name</th>
						<th width="15%">Position Id</th>
						<th width="26%">Position Title</th>
						<th width="10%">Terminated</th>
						<th width="10%">{$_L['Manage']}</th>
                        {else}
						<th width="3%">#</th>
						<th width="16%">Employee Id</th>
						<th width="25%">Employee Name</th>
						<th width="17%">Position Id</th>
						<th width="29%">Position Title</th>
						<th width="10%">Terminated</th>
                        {/if}
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="list-mitra" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="datatable-mitra" class="table table-bordered table-hover sys_table">
                    <thead>
						<th width="3%">#</th>
						<th width="35%">Nama Mitra</th>
						<th width="22%">Tanggal Bergabung</th>
						<th width="22%">Tanggal Keluar</th>
						<th width="18%">Keterangan</th>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" style="position: sticky; top: 50px; z-index: 50;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body blue-bg">
                    <div class="col-lg-6"><h3>{$cabang['branch_name']}</h3></div>
                    <div class="col-lg-6" style="text-align: right"><a href="{$_url}produktivitas-marketing/list" class="btn btn-primary btn-sm">Back</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" id="ibox_form">
                    <input type="hidden" id="cid" value="{$cabang['id']}">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Detail Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="branch_name">Cabang</label>
                            <div class="col-lg-9">
                                <input type="text" id="branch_name" name="branch_name" class="form-control" value="{$cabang['branch_name']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location">Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" id="work_location" name="work_location" class="form-control" value="{$cabang['work_location']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="link_spreadsheet">Link Spreadsheet</label>
                            <div class="col-lg-9">
                                <input type="text" id="link_spreadsheet" name="link_spreadsheet" class="form-control" value="{$cabang['link_spreadsheet']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="link_spreadsheet_mitra">Link Spreadsheet Mitra</label>
                            <div class="col-lg-9">
                                <input type="text" id="link_spreadsheet_mitra" name="link_spreadsheet_mitra" class="form-control" value="{$cabang['link_spreadsheet_mitra']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="is_udt"> Cabang UDT</label>
                            <div class="col-lg-9">
                                <input type="checkbox" id="is_udt" name="is_udt" {if $cabang['is_udt'] eq 1}checked{/if} disabled style="cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Daftar Posisi</label>
                            <div class="col-lg-9 d-flex gap-2">
                                <a class="btn btn-success" id="salesmanposisi" data-type="salesman" data-toggle="modal" data-target="#list-position">Salesman</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12" style="position: relative;">
                                <h1 class="text-center">Data Produktivitas</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <table id="datatable-sales" class="table table-bordered table-hover sys_table">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">Period</th>
                                            <th width="12%">Target Penjualan</th>
                                            <th width="12%">Penjualan</th>
                                            <th width="12%">Sales MPP</th>
                                            <th width="12%">Sales Force</th>
                                            <th width="12%">Sales Mitra</th>
                                            <th width="12%">Human MPP</th>
                                            <th width="12%">Human Actual</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Sales Productivity</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_penjualan_marketing-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_penjualan_marketing-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_penjualan_marketing-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_penjualan_marketing-avg">Rata Rata</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_penjualan_marketing-tipe" name="grafik_penjualan_marketing-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_penjualan_marketing-dari" name="grafik_penjualan_marketing-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_penjualan_marketing-hingga" name="grafik_penjualan_marketing-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_penjualan_marketing-avg" name="grafik_penjualan_marketing-avg" class="form-control" style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_penjualan_marketing" style="margin-top: 32px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Total Sales vs Total Salesman</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-4" for="grafik_kebutuhan_salesman-tipe">Tipe Waktu</label>
                                    <label class="col-lg-4" for="grafik_kebutuhan_salesman-dari">Dari</label>
                                    <label class="col-lg-4" for="grafik_kebutuhan_salesman-hingga">Hingga</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select id="grafik_kebutuhan_salesman-tipe" name="grafik_kebutuhan_salesman-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_kebutuhan_salesman-dari" name="grafik_kebutuhan_salesman-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_kebutuhan_salesman-hingga" name="grafik_kebutuhan_salesman-hingga" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_kebutuhan_salesman" style="margin-top: 32px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" id="ibox_form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Human Productivity</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-4" for="grafik_kebutuhan_human_marketing-tipe">Tipe Waktu</label>
                                    <label class="col-lg-4" for="grafik_kebutuhan_human_marketing-dari">Dari</label>
                                    <label class="col-lg-4" for="grafik_kebutuhan_human_marketing-hingga">Hingga</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select id="grafik_kebutuhan_human_marketing-tipe" name="grafik_kebutuhan_human_marketing-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_kebutuhan_human_marketing-dari" name="grafik_kebutuhan_human_marketing-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_kebutuhan_human_marketing-hingga" name="grafik_kebutuhan_human_marketing-hingga" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_kebutuhan_human_marketing" style="margin-top: 32px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}