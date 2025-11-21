$(document).ready(function () {
    const _url = $('#_url').val();
    const $table = $('#datatable');
    const equipmentNo = $table.data('equipment-no') || '';

    function formatDate(val) {
        if (!val || val === '0000-00-00') return '';
        return new Date(val).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
    }

    $('#datatable').DataTable({
        order: [],
        pagingType: 'full_numbers',
        pageLength: 10,
        scrollX: true,
        processing: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        serverSide: false,
        ajax: {
            url: _url + 'serverside/load-service-history/',
            type: 'POST',
            data: { equipment_no: equipmentNo },
            dataSrc: 'data'
        },
        columnDefs: [
            { targets: 0, orderable: false, searchable: false },
            { targets: 1, render: function (data) { return formatDate(data); } },
            { targets: 5, render: function (data) { return formatDate(data); } },
            { targets: 7, render: function (data) { return formatDate(data); } },
            { targets: 8, render: function (data) { return formatDate(data); } }
        ],
        rowCallback: function (row, data, index) {
            $('td:eq(0)', row).html(index + 1);
        }
    });
});