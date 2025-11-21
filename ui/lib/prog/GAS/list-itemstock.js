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
            const statusValue = $(data[3]).find('.status').text();
            if( statusValue == "Y" ) {
                $(row).find('.status').text("Aktif");
            } else if (statusValue == "N") {
                $(row).find('.status').text("Nonaktif");
                $(row).find('.status').removeClass('btn-primary').addClass('btn-danger');
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-itemstock/",
			'type' : 'POST',
		},
    });

    $(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Yakin untuk menghapus Item Stock ?', function(result) {
           if(result){
               window.location.href = _url + "delete/itemstock/" + id;
           }
        });
    });
});