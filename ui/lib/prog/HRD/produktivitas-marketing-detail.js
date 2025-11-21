$(document).ready(function () {
    const _url = $('#_url').val();
    const id = $('#cid').val();

	let mitraFetched = false;
	let dataFetched = false;

	const positionTable = $('#datatable-position');
	let positionTableType;

	const employeeTable = $('#datatable-employee');
	let employeeTablePeriode;
	let employeeTableType;

	const mitraTable = $('#datatable-mitra');
	let mitraTablePeriode;

	const salesTable = $('#datatable-sales');

	$.ajax({
		url: _url + 'serverside/fetch-mitra/' + id,
		type: 'POST',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		success: function() {
			mitraFetched = true;
			loadGraphs();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			alert(msg);
		},
	});

	$.ajax({
		url: _url + 'serverside/fetch-marketing/' + id,
		type: 'POST',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		success: function() {
			dataFetched = true;
			loadGraphs();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			alert(msg);
		},
	});

	// setupGrafik('grafik_sales_marketing', 'grafik_produktivitas_mitra');
	// setupGrafik('grafik_produktivitas_marketing');
	// setupGrafik('grafik_produktivitas_sdm_marketing');

    $('#list-position').on('shown.bs.modal', function () {
        $('#datatable-position').DataTable().columns.adjust();
    });

	$('#list-employee').on('shown.bs.modal', function () {
        $('#datatable-employee').DataTable().columns.adjust();
    });

	$('#list-mitra').on('shown.bs.modal', function () {
        $('#datatable-mitra').DataTable().columns.adjust();
    });

	positionTable.on('draw', checkHandler);

	$('[id="grafik_penjualan_marketing-tipe"]').change(function () {
		const grafik = $(this).attr('id').split('-')[0];
		setupGrafik(grafik, true);
	});

	$('[id="grafik_kebutuhan_salesman-tipe"], [id="grafik_kebutuhan_human_marketing-tipe"]').change(function () {
		const grafik = $(this).attr('id').split('-')[0];
		setupGrafik(grafik, false);
	});

	$('[id="grafik_penjualan_marketing-dari"], [id="grafik_penjualan_marketing-hingga"], [id="grafik_penjualan_marketing-avg"]').change(function () {
		const grafik = $(this).attr('id').split('-')[0];
		loadGrafik(grafik, true);
	});

	$('[id="grafik_kebutuhan_salesman-dari"], [id="grafik_kebutuhan_salesman-hingga"], [id="grafik_kebutuhan_human_marketing-dari"], [id="grafik_kebutuhan_human_marketing-hingga"]').change(function () {
		const grafik = $(this).attr('id').split('-')[0];
		loadGrafik(grafik, false);
	});

	$('#position-all').click(function (e) {
        e.stopPropagation();
    });

	$('#position-all').change(function () {
        const checked = $(this).prop('checked');
        const rows = positionTable.DataTable().rows({ search: 'applied' }).nodes();

        const positionIds = [];

        $(rows).each(function () {
            const checkboxId = $(this).find('td:eq(0) input[type="checkbox"]').attr('id');
            positionIds.push(checkboxId.replace('position-uid', ''));
        });

        const fd = new FormData();
        fd.append('positionIds', JSON.stringify(positionIds));
        fd.append('checked', checked);
		fd.append('type', positionTableType);

        $.ajax({
            url: _url + 'produktivitas-marketing/position-posts/' + id,
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                $(rows).each(function () {
                    $(this).find('td:eq(0) input[type="checkbox"]').prop('checked', response.checked)
                });
				reset();
			},
        });
    });

	$(document).on('change', '[id^="position-uid"]', function() {
        const element = $(this);
        const positionId = element.attr('id').replace('position-uid', '');
        const checked = element.prop('checked');

        const fd = new FormData();
        fd.append('positionId', positionId);
        fd.append('checked', checked);
		fd.append('type', positionTableType);

        $.ajax({
            url: _url + 'produktivitas-marketing/position-post/' + id,
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
				element.prop('checked', response.checked);
                checkHandler();
				reset();
			},
        });
    });

	$(document).on('click', '[id="salesmanposisi"]', function () {
		$('#position-all').prop('checked', false);
		positionTableType = $(this).attr('data-type');
		loadPositionTable();
	});

	$(document).on('click', '[id^="salessales"], [id^="humansales"]', function () {
		const row = $(this).closest('tr');
		const rowData = salesTable.DataTable().row(row).data();

		const [ _, month, year ] = rowData[1].split('-');
		employeeTablePeriode = year + '-' + month + '-01';
		employeeTableType = $(this).attr('data-type');

		loadEmployeeTable();
	});

	$(document).on('click', '[id^="mitrasales"]', function () {
		const row = $(this).closest('tr');
		const rowData = salesTable.DataTable().row(row).data();

		const [ _, month, year ] = rowData[1].split('-');
		mitraTablePeriode = year + '-' + month + '-01';

		loadMitraTable();
	});

	function loadGraphs() {
		if (mitraFetched && dataFetched) reset();
	}

	function loadPositionTable() {
		if ($.fn.DataTable.isDataTable(positionTable)) {
			const table = positionTable.DataTable();
			table.search('')
				.order([])
				.page('first').draw('page')
				.ajax.reload();
		} else {
			positionTable.DataTable({
				order: [],
				pagingType: 'full_numbers',
				pageLength: 10,
				scrollX: true,
				processing: true,
				lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
				serverSide : true,
				ajax: {
					url : _url + 'serverside/load-marketing-position/' + id,
					type : 'POST',
					data: function (d) {
						d.type = positionTableType;
					},
				},
			});
		}
	}

	function loadEmployeeTable() {
		if ($.fn.DataTable.isDataTable(employeeTable)) {
			const table = employeeTable.DataTable();
			table.search('')
				.order([])
				.page('first').draw('page')
				.ajax.reload();
		} else {
			employeeTable.DataTable({
				order: [],
				pagingType: 'full_numbers',
				pageLength: 10,
				scrollX: true,
				processing: true,
				lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
				createdRow: function(row, data, dataIndex) {
					$('td:eq(5)', row).html(data[5] === '1' ? '<div class="text-center"><span class="btn btn-xs btn-danger">Terminated</span></div>' : '-');
				},
				serverSide : true,
				ajax: {
					url : _url + 'serverside/load-marketing-sales-employee/' + id,
					type : 'POST',
					data: function (d) {
						d.periode = employeeTablePeriode;
						d.type = employeeTableType;
					},
				},
			});
		}
	}

	function loadMitraTable() {
		if ($.fn.DataTable.isDataTable(mitraTable)) {
			const table = mitraTable.DataTable();
			table.search('')
				.order([])
				.page('first').draw('page')
				.ajax.reload();
		} else {
			mitraTable.DataTable({
				order: [],
				pagingType: 'full_numbers',
				pageLength: 10,
				scrollX: true,
				processing: true,
				lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
				createdRow: function(row, data, dataIndex) {
					$('td:eq(2)', row).html(formatDate(data[2]));
					$('td:eq(3)', row).html(formatDate(data[3]));
					$('td:eq(4)', row).html(data[4] === 'Aktif'
						? '<div class="text-center"><span class="btn btn-xs btn-primary">Aktif</span></div>'
						: data[4] === 'Resigned'
							? '<div class="text-center"><span class="btn btn-xs btn-danger">Resigned</span></div>'
							: data[4]
					);
				},
				serverSide : true,
				ajax: {
					url : _url + 'serverside/load-marketing-sales-mitra/' + id,
					type : 'POST',
					data: function (d) {
						d.periode = mitraTablePeriode;
					},
				},
			});
		}
	}

	function loadSalesTable() {
		if ($.fn.DataTable.isDataTable(salesTable)) {
			const table = salesTable.DataTable();
			table.search('')
				.order([])
				.page('first').draw('page')
				.ajax.reload();
		} else {
			salesTable.DataTable({
				order: [],
				pagingType: 'full_numbers',
				pageLength: 10,
				scrollX: true,
				processing: true,
				lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
				createdRow: function(row, data, dataIndex) {
					const periode = data[1];
					const [ _, month, year ] = periode.split('-');
					const options = { month: 'short', year: 'numeric' };
					const formattedDate = new Date(year, month - 1).toLocaleDateString('id-ID', options);
					$('td', row).eq(1).html(formattedDate);
				},
				serverSide : true,
				ajax: {
					url : _url + 'serverside/load-marketing-sales/' + id,
					type : 'POST',
				},
			});
		}
	}

	function checkHandler() {
        const rows = positionTable.DataTable().rows({ search: 'applied' }).nodes();
        let allChecked = !!$(rows).length;

        $(rows).each(function () {
            const checked = $(this).find('td:eq(0) input[type="checkbox"]').prop('checked');
            if (checked === false) allChecked = false;
        });

        $('#position-all').prop('checked', allChecked);
    }

	function setupGrafik(id, hasAvg) {
		const type = $(`#${id}-tipe`).val();
		const fromId = `#${id}-dari`;
		const toId = `#${id}-hingga`;
		const avgId = `#${id}-avg`;

		if (type === 'month') {
			const date = new Date();
			const year = date.getFullYear();
			const month = String(date.getMonth() + 1).padStart(2, '0');

			const min = '2025-01';
			const max = `${year}-${month}`;

			const lastYearYear = year - 1;
			const lastYearMonth = String((date.getMonth() + 2) % 12).padStart(2, '0');
			const lastYear = `${lastYearYear}-${lastYearMonth}`;
			const from = lastYear < min ? min : lastYear;

			$(fromId).attr('type', 'month');
			$(fromId).attr('min', min);
			$(fromId).attr('max', max);
			$(fromId).val(from);

			$(toId).attr('type', 'month');
			$(toId).attr('min', min);
			$(toId).attr('max', max);
			$(toId).val(max);

			if (hasAvg) {
				$(avgId).html('<option value="3" selected>3 Bulan</option><option value="6">6 Bulan</option>');
			}
		} else {
			const date = new Date();
			const year = date.getFullYear();

			const min = 2025;
			const max = year;

			const lastFiveYear = year - 4;
			const from = Math.max(min, lastFiveYear);

			$(fromId).attr('type', 'number');
			$(fromId).attr('min', min);
			$(fromId).attr('max', max);
			$(fromId).val(from);

			$(toId).attr('type', 'number');
			$(toId).attr('min', min);
			$(toId).attr('max', max);
			$(toId).val(max);

			if (hasAvg) {
				$(avgId).html('<option value="2" selected>2 Tahun</option><option value="3">3 Tahun</option><option value="4">4 Tahun</option><option value="5">5 Tahun</option>');
			}
		}

		loadGrafik(id, hasAvg);
	}

	function loadGrafik(gid, hasAvg) {
		const grafikId = `#${gid}`;
		const type = $(grafikId + '-tipe').val();
		const from = $(grafikId + '-dari').val();
		const to = $(grafikId + '-hingga').val();
		const avg = $(grafikId + '-avg').val();

		const ajaxUrl = 'serverside/load-' + gid.replaceAll('_', '-');

		$.ajax({
			url: _url + ajaxUrl + '/' + id,
			type: 'post',
			data: { type, from, to, ...(hasAvg ? { avg } : {}) },
			dataType: 'json',
			success: function (response) {
				const chart = Chart.getChart($(grafikId).get(0));
				if (chart) chart.destroy();

				response.options.plugins.datalabels.formatter = (value, _) => value;
				response.options.plugins.datalabels.align = (context) => context.dataset.type === 'line' ? 'center' : 'bottom';

				const ctx = $(grafikId).get(0).getContext('2d');
				new Chart(ctx, { ...response, plugins: [ ChartDataLabels ] });
			},
		});
	}

	function reset() {
		loadSalesTable();
		setupGrafik('grafik_penjualan_marketing', true);
		setupGrafik('grafik_kebutuhan_salesman', false);
		setupGrafik('grafik_kebutuhan_human_marketing', false);
	}
});

function formatDate(time) {
	if (!time || time === '') return '-';

	const [day, month, year] = time.split('-');
	const isoDate = `${year}-${month}-${day}`;

	const date = new Date(isoDate);
	if (isNaN(date)) return '-';

	return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
}