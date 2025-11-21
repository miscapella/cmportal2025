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

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" style="position: sticky; top: 50px; z-index: 50;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body blue-bg">
                    <div class="col-lg-6"><h3>{$cabang['branch_name']}</h3></div>
                    <div class="col-lg-6" style="text-align: right"><a href="{$_url}produktivitas-bengkel/list" class="btn btn-primary btn-sm">Back</a></div>
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
                            <label class="col-lg-3 control-label" for="spreadsheet_link">Link Spreadsheet</label>
                            <div class="col-lg-9">
                                <input type="text" id="spreadsheet_link" name="spreadsheet_link" class="form-control" value="{$cabang['link_spreadsheet']}" disabled style="background-color: transparent; cursor: default;">
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
                                <a class="btn btn-success" id="mekanikposisi" data-type="mekanik" data-toggle="modal" data-target="#list-position">Mechanic</a>
				                <a class="btn btn-primary" id="karuposisi" data-type="karu" data-toggle="modal" data-target="#list-position">Chief Mechanic</a>
				                <a class="btn btn-info" id="saposisi" data-type="sa" data-toggle="modal" data-target="#list-position">Service Advisor</a>
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
                                <table id="datatable-unitentry" class="table table-bordered table-hover sys_table">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="7%">Periode</th>
                                            <th width="7%">Target UE</th>
                                            <th width="7%">Target UE/Hari</th>
                                            <th width="7%">Actual Unit Entry</th>
                                            <th width="7%">Actual UE/Hari</th>
                                            <th width="7%">Kebutuhan Mekanik</th>
                                            <th width="7%">Mekanik MPP</th>
                                            <th width="7%">Mekanik Actual</th>
                                            <th width="7%">Kebutuhan KARU</th>
                                            <th width="7%">KARU MPP</th>
                                            <th width="7%">KARU Actual</th>
                                            <th width="7%">Kebutuhan SA</th>
                                            <th width="7%">SA MPP</th>
                                            <th width="7%">SA Actual</th>
                                            <th width="7%">Human MPP</th>
                                            <th width="7%">Human Actual</th>
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
                                <h1 class="text-center">Unit Entry Target vs Actual</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_unit_entry_bengkel-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_bengkel-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_bengkel-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_unit_entry_bengkel-avg">Rata Rata</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_unit_entry_bengkel-tipe" name="grafik_unit_entry_bengkel-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_unit_entry_bengkel-dari" name="grafik_unit_entry_bengkel-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_unit_entry_bengkel-hingga" name="grafik_unit_entry_bengkel-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_unit_entry_bengkel-avg" name="grafik_unit_entry_bengkel-avg" class="form-control" style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_unit_entry_bengkel" style="margin-top: 32px;"></canvas>
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
                                <h1 class="text-center">Mechanic Plan vs Actual</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_kebutuhan_mekanik-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_mekanik-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_mekanik-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_mekanik-avg">Rata Rata Kebutuhan Manpower</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_kebutuhan_mekanik-tipe" name="grafik_kebutuhan_mekanik-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_kebutuhan_mekanik-dari" name="grafik_kebutuhan_mekanik-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_kebutuhan_mekanik-hingga" name="grafik_kebutuhan_mekanik-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_kebutuhan_mekanik-avg" name="grafik_kebutuhan_mekanik-avg" class="form-control" style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_kebutuhan_mekanik" style="margin-top: 32px;"></canvas>
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
                                <h1 class="text-center">Chief Mechanic Plan vs Actual</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_kebutuhan_karu-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_karu-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_karu-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_karu-avg">Rata Rata Kebutuhan Manpower</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_kebutuhan_karu-tipe" name="grafik_kebutuhan_karu-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_kebutuhan_karu-dari" name="grafik_kebutuhan_karu-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_kebutuhan_karu-hingga" name="grafik_kebutuhan_karu-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_kebutuhan_karu-avg" name="grafik_kebutuhan_karu-avg" class="form-control" style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_kebutuhan_karu" style="margin-top: 32px;"></canvas>
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
                                <h1 class="text-center">Service Advisor Plan vs Actual</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-lg-3" for="grafik_kebutuhan_sa-tipe">Tipe Waktu</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_sa-dari">Dari</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_sa-hingga">Hingga</label>
                                    <label class="col-lg-3" for="grafik_kebutuhan_sa-avg">Rata Rata Kebutuhan Manpower</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select id="grafik_kebutuhan_sa-tipe" name="grafik_kebutuhan_sa-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_kebutuhan_sa-dari" name="grafik_kebutuhan_sa-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="grafik_kebutuhan_sa-hingga" name="grafik_kebutuhan_sa-hingga" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="grafik_kebutuhan_sa-avg" name="grafik_kebutuhan_sa-avg" class="form-control" style="width: 100%;"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_kebutuhan_sa" style="margin-top: 32px;"></canvas>
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
                                    <label class="col-lg-4" for="grafik_kebutuhan_human_bengkel-tipe">Tipe Waktu</label>
                                    <label class="col-lg-4" for="grafik_kebutuhan_human_bengkel-dari">Dari</label>
                                    <label class="col-lg-4" for="grafik_kebutuhan_human_bengkel-hingga">Hingga</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select id="grafik_kebutuhan_human_bengkel-tipe" name="grafik_kebutuhan_human_bengkel-tipe" class="form-control" style="width: 100%;">
                                            <option value="month">Bulanan</option>
                                            <option value="year">Tahunan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_kebutuhan_human_bengkel-dari" name="grafik_kebutuhan_human_bengkel-dari" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <input id="grafik_kebutuhan_human_bengkel-hingga" name="grafik_kebutuhan_human_bengkel-hingga" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                                    <canvas id="grafik_kebutuhan_human_bengkel" style="margin-top: 32px;"></canvas>
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