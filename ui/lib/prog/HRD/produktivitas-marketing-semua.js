$(document).ready(function () {
    const _url = $('#_url').val();
	let loaded = 0;

	semuaCabang.forEach(({ id }) => {
		$.ajax({
			url: _url + 'serverside/fetch-marketing/' + id,
			type: 'POST',
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			success: function() {
				if (++ loaded === semuaCabang.length) setupGrafik('grafik_penjualan_semua');
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
	});

	$('[id="grafik_penjualan_semua-tipe"]').change(function () {
		const grafik = $(this).attr('id').split('-')[0];
		setupGrafik(grafik);
	});

	$('[id="grafik_penjualan_semua-dari"], [id="grafik_penjualan_semua-hingga"]').change(function () {
		const grafik = $(this).attr('id').split('-')[0];
		loadGrafik(grafik);
	});

	function setupGrafik(id) {
		const type = $(`#${id}-tipe`).val();
		const fromId = `#${id}-dari`;
		const toId = `#${id}-hingga`;

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
		}

		loadGrafik(id);
	}

	function loadGrafik(gid) {
		const grafikId = `#${gid}`;
		const type = $(grafikId + '-tipe').val();
		const from = $(grafikId + '-dari').val();
		const to = $(grafikId + '-hingga').val();

		const ajaxUrl = 'serverside/load-' + gid.replaceAll('_', '-');

		$.ajax({
			url: _url + ajaxUrl,
			type: 'post',
			data: { type, from, to },
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
});