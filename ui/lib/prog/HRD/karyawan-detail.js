$(document).ready(function () {
    scrollToCuti();

    const date = $('.tdate').text();
    const fdate = formatDate(date);
    $('.tdate').text(fdate);

    $('.date').each(function(_, e) {
        const date = $(e).val();
        if (date) {
            const fdate = formatDate(date);
            $(e).val(fdate);
        }
    });

    const cutiId = getCutiParams();
    const tableData = createTableData();
    const displayStart = getDisplayStart(cutiId, tableData);

    $('#datatable').DataTable({
        displayStart: displayStart,
        pagingType: 'full_numbers',
		pageLength: 10,
		scrollX: true,
		processing: true,
		lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        data: tableData,
		serverSide: false,
        createdRow: function(row, data, dataIndex) {
            const fdate = formatDate(data[1]);
            const status = data[2];
            let btnColor;

            if (status === 'Cancelled') btnColor = 'btn-warning';
            else if (status === 'Rejected') btnColor = 'btn-danger';
            else if (status === 'Partially Approved') btnColor = 'btn-info';
            else if (status === 'Approved') btnColor = 'btn-primary';
            else if (status === 'MassLeave') btnColor = 'btn-success';
            else btnColor = 'btn-info';

            $('td:eq(1)', row).html(`<span class="date">${fdate}</span>`);
            $('td:eq(2)', row).html(`<div class="text-center"><span class="btn btn-xs ${btnColor}">${status}</span></div>`);
            $('td:eq(5)', row).html(`<div class="text-right"><span id="cuti-detail-${data[5]}" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-book"></i></span></div>`);
        },
        rowCallback: function (row, data, index) {
            $('td:eq(0)', row).html(index + 1);
            if (data[0] == cutiId) $(row).addClass('highlight-row');
        },
    });

    // Load cuti detail
    $(document).on('click', '[id^="cuti-detail-"]', function() {
        const id = $(this).attr('id').split('-')[2];
        const data = _cuti.find((cuti) => cuti.id === id);

        if (data) {
            const rows = $('#cuti-modal-body form').children();

            rows.each((_, row) => {
                const input = $(row).find('div input, div textarea');
                const id = input.attr('id');
                const value = data[id];

                const isDate = input.hasClass('date');
                const isDateTime = input.hasClass('datetime');
                const isDateTime2 = input.hasClass('datetime2');

                if (value === null) {
                    input.val('-');
                } else if (isDate) {
                    input.val(formatDate(value));
                } else if (isDateTime) {
                    const tempId = id.split('_');
                    tempId.splice(1, 0, 'time');
                    const id2 = tempId.join('_');

                    const value2 = data[id2];
                    input.val(`${formatDate(value)} (${value2})`);
                } else if (isDateTime2) {
                    const value2 = data['working_time'];
                    input.val(`${formatDate(value)} (${value2})`);
                } else {
                    input.val(value);
                }
            });

            $('#cuti-modal').modal('show');
        }
    });

    function formatDate(time) {
        return new Date(time).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
    }

    function scrollToCuti() {
        if (window.location.hash.startsWith('#cuti')) {
            const target = $('#cuti');
            if (target.length) $('html, body').animate({ scrollTop: target.offset().top - 100 }, 500);
        }
    }

    function getCutiParams() {
        const hash = window.location.hash;
        const queryString = hash.split('?')[1];
        if (!queryString) return null;

        const params = new URLSearchParams(queryString);
        const cutiId = params.get('id');

        if (isNaN(Number(cutiId))) return null;

        return +cutiId;
    }

    function createTableData() {
        const tableData = [];

        _cuti.forEach((cuti) => {
            tableData.push([ cuti.id, cuti.request_date, cuti.request_status, cuti.leave_type, cuti.number_of_working_applied, cuti.id ]);
        });

        return tableData;
    }

    function getDisplayStart(cutiId, tableData) {
        if (cutiId === null) return 0;

        const index = tableData.findIndex((cuti) => cuti[0] == cutiId);
        return index === -1 ? 0 : Math.floor(index / 10) * 10;
    }
});