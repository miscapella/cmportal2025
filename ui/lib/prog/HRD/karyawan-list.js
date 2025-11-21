$(document).ready(function () {
    const _url = $('#_url').val();

    $('.tdate').each(function(_, e) {
        const date = $(e).text();
        const fdate = formattedDate(date);
        $(e).text(fdate);
    });

    $('#datatable-karyawan').DataTable({
        order: [],
        pagingType: 'full_numbers',
		pageLength: 10,
		scrollX: true,
		processing: true,
		lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
		serverSide : true,
        ajax: {
			url : _url + 'serverside/load-active-karyawan/',
			type : 'POST',
		},
    });

    $('#datatable-ex-karyawan').DataTable({
        order: [],
        pagingType: 'full_numbers',
		pageLength: 10,
		scrollX: true,
		processing: true,
		lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
		serverSide : true,
        ajax: {
			url : _url + 'serverside/load-terminated-karyawan/',
			type : 'POST',
		},
        columnDefs: [
            {
                targets: 5,
                render: function (data, type, row) {
                    const months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des' ];

                    const parts = data.split('-');
                    const day = parts[0];
                    const month = months[parseInt(parts[1], 10) - 1];
                    const year = parts[2];

                    const formatted = `${day} ${month} ${year}`;
                    return formatted;
                }
            }
        ]
    });
});

function formattedDate(time) {
    return new Date(time).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
}
