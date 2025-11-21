$(document).ready(function () {
    let _url = $("#_url").val();

    $('#persetujuan-pr').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-aprv/",
			'type' : 'POST',
		},
		"createdRow": function(row, data, dataIndex) {
			if (data[3]) {
				let numberString = data[3].toString();
    			let formattedString = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
				$('td:eq(3)', row).html(`Rp ${formattedString}`);
			} else {
				$('td:eq(3)', row).html('Rp 0');
			}
		}
    });
});