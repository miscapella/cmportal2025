$(document).ready(function () {
    var _url = $("#_url").val();

    $('#list-mintabarang-rejected').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusPR = $(data[5]).find('.status_pr').text();
            if( statusPR == "CANCEL") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "PENDING") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusPR == "REJECTED") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "NOT CREATED" ) {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-info');
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-mintabarang-rejected/",
			'type' : 'POST',
		},
    });

    $('#administrator-list-mintabarang-rejected').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusPR = $(data[7]).find('.status_pr').text();
            if( statusPR == "CANCEL") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "PENDING") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusPR == "REJECTED") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "NOT CREATED" ) {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-info');
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/administrator-list-mintabarang-rejected/",
			'type' : 'POST',
		},
    });

    $('#dept-list-mintabarang-rejected').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusPR = $(data[6]).find('.status_pr').text();
            if( statusPR == "CANCEL") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "PENDING") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusPR == "REJECTED") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "NOT CREATED" ) {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-info');
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/dept-list-mintabarang-rejected/",
			'type' : 'POST',
		},
    });

    $('#service-head-list-mintabarang-rejected').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusPR = $(data[7]).find('.status_pr').text();
            if( statusPR == "CANCEL") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "PENDING") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusPR == "REJECTED") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "NOT CREATED" ) {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-info');
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/service-head-list-mintabarang-rejected/",
			'type' : 'POST',
		},
    });

    $('#gaadmin-list-mintabarang-rejected').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusPR = $(data[7]).find('.status_pr').text();
            if( statusPR == "CANCEL") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "PENDING") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusPR == "REJECTED") {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusPR == "NOT CREATED" ) {
                $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-info');
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/gaadmin-list-mintabarang-rejected/",
			'type' : 'POST',
		},
    });

	$(document).on('click', '.cdetail', function(e) {
        e.preventDefault();
        var id = this.id;
        var _url = $("#_url").val();
        window.location.href = _url + "permintaanbarang/detail-mb/" + id;
    });

    $(document).on('click', '.cedit', function(e) {
        e.preventDefault();
        var id = this.id;
        var _url = $("#_url").val();
        window.location.href = _url + "permintaanbarang/edit-mb/" + id;
    });

	$(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk menghapus material request ini? ', function(result) {
           if(result){
               window.location.href = _url + "delete/mintabarang/" + id;
           }
        });
    });
});