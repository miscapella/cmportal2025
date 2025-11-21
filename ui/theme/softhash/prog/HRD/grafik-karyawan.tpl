{include file="sections/header.tpl"}

<script>
	const _data = {$data};
	const _boilerplate = {$boilerplate};
</script>

<div class="row" style="position: sticky; top: 50px; z-index: 50;">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-12"><h3>{$headerTitle} - <span class="tdate">{$dataDate}</span></h3></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="grafik" style="display: flex; flex-direction: column; gap: 64px;"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="chart-table-detail" tabindex="-1" role="dialog" aria-labelledby="chartDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="chart-table" class="table table-bordered table-hover sys_table">
                    <thead>
						<th width="3%">#</th>
						<th width="16%">Employee Id</th>
						<th width="28%">Employee Name</th>
						<th width="15%">Terminated</th>
						<th width="16%">Years In Service</th>
						<th width="10%">Grade</th>
						<th width="12%">{$_L['Manage']}</th>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="chart-table-cuti-detail" tabindex="-1" role="dialog" aria-labelledby="chartDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<table id="chart-table-cuti" class="table table-bordered table-hover sys_table">
                    <thead>
						<th width="3%">#</th>
						<th width="12%">Employee Id</th>
						<th width="24%">Employee Name</th>
						<th width="10%">Terminated</th>
						<th width="18%">Request Date</th>
						<th width="11%">Request Status</th>
						<th width="15%">Number of Working Applied</th>
						<th width="7%">{$_L['Manage']}</th>
                    </thead>
                    <tbody></tbody>
                </table>
			</div>
		</div>
	</div>
</div>

{include file="sections/footer.tpl"}