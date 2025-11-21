$(document).ready(function () {
    let _url = $("#_url").val();

    $('#penerimaan-ur').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-penerimaan-ur/",
			'type' : 'POST'
		},
    });
});