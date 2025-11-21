$(document).ready(function () {
    var _url = $("#_url").val();

    $('#datatablepo').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"createdRow": function(row, data, dataIndex) {
            const statusValue = $(data[5]).find('.status').text();
            if( statusValue == "CANCEL" ) {       
                $(row).find('.status').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusValue == "PENDING") {
                $(row).find('.status').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusValue == "REJECT") {
                $(row).find('.status').css({"background-color": "#FF7F7F", "border-color": "#FF7F7F"});
            } else if (statusValue == "DIKIRIM") {
                $(row).find('.status').removeClass('btn-primary').addClass('btn-light');
			}
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-po/",
			'type' : 'POST',
		},
    });

    $('#datatablepopending').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-po-pending/",
			'type' : 'POST',
		},
    });

    $('#datatablepoapproved').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-po-approved/",
			'type' : 'POST',
		},
    });

    $('#datatableporejected').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-po-rejected/",
			'type' : 'POST',
		},
    });

	$('.dataTables_processing').css({"display": "block", "z-index": 10000 });

    $(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk membatalkan PO ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/po/" + id;
           }
        });
    });
});