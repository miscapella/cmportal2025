$(document).ready(function () {
    const _url = $('#_url').val();

    $('#datatable-cabang').DataTable({
        order: [],
        pagingType: 'full_numbers',
		pageLength: 10,
		scrollX: true,
		processing: true,
		lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
		serverSide : true,
        ajax: {
			url : _url + 'serverside/load-cabang/',
			type : 'POST',
		},
    });

    $(document).on('click', '.cdelete', function(e) {
		e.preventDefault();

        const uid = this.id;
        const id = uid.replace('uid', '');

        bootbox.confirm('Apakah anda yakin untuk menghapus data cabang ini?', function (result) {
            if (result) {
                window.location.href = _url + 'cabang/delete/' + id;
            }
        });
   	});
});
