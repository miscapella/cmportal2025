$(document).ready(function () {
    var _url = $("#_url").val();

    $(document).on('click','.btnrefresh', function(e)
    {   
        e.preventDefault();
        if ($('#cbstatus').val()=='Approved'){
        window.location.href = _url + "permintaanbarang/list-mintabarang-approved/";}
    
        else if ($('#cbstatus').val()=='Reject') {
            window.location.href = _url + "permintaanbarang/list-mintabarang-rejected/";}
        
        else if ($('#cbstatus').val()=='Pending') {
            window.location.href = _url + "permintaanbarang/list-mintabarang-pending/";}
        else
        {window.location.href = _url + "permintaanbarang/list-mintabarang/";}
     }
)


    $('#list-mintabarang').DataTable({
        "order": [2,'desc'],
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
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-mintabarang/",
			'type' : 'POST',
		},
    });

    $('#list-mintabarang-pending').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-mintabarang-pending/",
			'type' : 'POST',
		},
    })

    $('#list-mintabarang-approved').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-mintabarang-approved/",
			'type' : 'POST',
		},
    })

    $('#list-mintabarang-rejected').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-mintabarang-rejected/",
			'type' : 'POST',
		},
    })

	$(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        var id = this.id;				
        bootbox.confirm('Apakah anda yakin untuk menghapus material request ini? ', function(result) {
           if(result){
               var _url = $("#_url").val();
			   
               window.location.href = _url + "delete/mintabarang/" + id;

           } 		   
        });
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



    
});