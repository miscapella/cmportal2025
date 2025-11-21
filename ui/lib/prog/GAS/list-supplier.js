$(document).ready(function () {
    var _url = $("#_url").val();

    $('#datatable').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusValue = $(data[5]).find('.status').text();
            if( statusValue == "Y" ) {
                $(row).find('.status').text("Aktif");
            } else if (statusValue == "N") {
                $(row).find('.status').text("Nonaktif");
                $(row).find('.status').removeClass('btn-primary').addClass('btn-danger');
            }

            const dateCell = $(row).find('td').eq(4);
            const dateValue = data[4];
            if (dateValue === "30-11--0001") dateCell.text("-");
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-supplier/",
			'type' : 'POST',
		},
    });
	// $('.dataTables_processing').css({"display": "block", "z-index": 10000 });

    $(document).on('click', '.cdelete', function(e) {
		e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk menghapus data supplier ini?', function(result) {
           if(result){
               window.location.href = _url + "delete/supplier/" + id;
           }
        });
   	});
});