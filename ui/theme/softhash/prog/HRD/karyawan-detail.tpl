{include file="sections/header.tpl"}

<style>
	.highlight-row {
		background-color: #d0e7ff !important;
	}
</style>

<script>
    const _cuti = {$cuti};
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" style="position: sticky; top: 50px; z-index: 50;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body {if $employee['terminated'] eq 0}blue-bg{else}red-bg{/if}">
                    <div class="col-lg-6">
                        <h3>DETAIL {if $employee['terminated'] eq 1}TERMINATED{/if} KARYAWAN - <span class="tdate">{$dataDate}</span></h3>
                    </div>
                    <div class="col-lg-6" style="text-align: right"><a href="{$_url}karyawan/list/" class="btn btn-primary btn-sm">Back</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Personal Information</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Employee Id</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['employee_id']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Employee Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['employee_name']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date of Birth</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="{$employee['date_of_birth']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['gender']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Marital Status</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['marital_status']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Religion</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['religion']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Blood Type</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['blood_type']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Citizenship</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['citizenship']}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Working Information</h1>
                            </div>
                        </div>
                        {if $employee['terminated'] eq 1}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Termination Date</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control date" value="{$employee['termination_date']}" disabled>
                                </div>
                            </div>
                        {/if}
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First Join Date</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="{$employee['first_join_date']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Years in Service</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['years_in_service']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Position Id</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['position_id']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Grade</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['grade']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['work_location']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Employee Category</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['employee_category']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ready for Cross Company</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{if $employee['ready_for_cross_company'] == 0}No{else}Yes{/if}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Employee Status</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['employee_status']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Employment Type</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['employment_type']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contract Category</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['contract_category']}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Employee Education</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Level Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['education_level_name']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Field Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['education_field_name']}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">BPJS Kesehatan</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Join Date</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="{$employee['bpjs_kesehatan_join_date']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kelas Rawat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$employee['kelas_rawat']}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="cuti">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Histori Cuti</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <table id="datatable" class="table table-bordered table-hover sys_table">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="23%">Request Date</th>
                                            <th width="20%">Request Status</th>
                                            <th width="22%">Leave Type</th>
                                            <th width="23%">Number of Working Applied</th>
                                            <th width="15%">Manage</th>
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
</div>

<div class="modal fade" id="cuti-modal" tabindex="-1" role="dialog" aria-labelledby="cutiDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title" id="cutiDetailModalLabel">Detail Cuti</h5>
			</div>
			<div id="cuti-modal-body" class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Request Date</label>
                        <div class="col-lg-9">
                            <input id="request_date" type="text" class="form-control date" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Request Status</label>
                        <div class="col-lg-9">
                            <input id="request_status" type="text" class="form-control" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Leave Type</label>
                        <div class="col-lg-9">
                            <input id="leave_type" type="text" class="form-control" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Leave From</label>
                        <div class="col-lg-9">
                            <input id="leave_from" type="text" class="form-control datetime" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Leave To</label>
                        <div class="col-lg-9">
                            <input id="leave_to" type="text" class="form-control datetime" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Reports to Work on</label>
                        <div class="col-lg-9">
                            <input id="reports_to_work_on" type="text" class="form-control datetime2" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label text-wrap" style="white-space: normal;">Number of Working Applied</label>
                        <div class="col-lg-9">
                            <input id="number_of_working_applied" type="text" class="form-control" disabled style="background-color: transparent; cursor: default;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Reason</label>
                        <div class="col-lg-9">
                            <textarea id="reason" class="form-control" rows="3" disabled style="background-color: transparent; cursor: default; resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Note</label>
                        <div class="col-lg-9">
                            <textarea id="note" class="form-control" rows="3" disabled style="background-color: transparent; cursor: default; resize: none;"></textarea>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}