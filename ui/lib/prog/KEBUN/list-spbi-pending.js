$(document).ready(function () {
    var _url = $("#_url").val();
    $('#datatablespbipending').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spbi-pending/",
			'type' : 'POST',
		},
    });
});