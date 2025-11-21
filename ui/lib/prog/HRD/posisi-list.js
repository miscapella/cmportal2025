$(document).ready(function () {
    const _url = $('#_url').val();

    $('#datatable-posisi').DataTable({
        order: [],
        pagingType: 'full_numbers',
		pageLength: 10,
		scrollX: true,
		processing: true,
		lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
		serverSide : true,
        ajax: {
			url : _url + 'serverside/load-posisi/',
			type : 'POST',
		},
    });

    $(document).on('click', '.cdelete', function(e) {
		e.preventDefault();

        const uid = this.id;
        const id = uid.replace('uid', '');

        bootbox.confirm('Apakah anda yakin untuk menghapus data posisi ini?', function (result) {
            if (result) {
                window.location.href = _url + 'posisi/delete/' + id;
            }
        });
   	});
});
