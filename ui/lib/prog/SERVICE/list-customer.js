$(document).ready(function () {
    var _url = $("#_url").val();
    $('#datatable').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-customer/",
			'type' : 'POST'
		},
    });
	$('.dataTables_processing').css({"display": "block", "z-index": 10000 });
    
    $(document).on('click', '.cdelete', function(e) {
		e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk menghapus data karyawan ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/karyawan/" + id;
           }
        });
   	});
});