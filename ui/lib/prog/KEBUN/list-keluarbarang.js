$(document).ready(function () {
    var _url = $("#_url").val();
   
	$(document).on('click', '.cdelete', function(e) {
		e.preventDefault();
        var id = this.id;				
		bootbox.confirm('Apakah anda yakin untuk menghapus data pengeluaran barang ini? ', function(result) {
			if(result){
				var _url = $("#_url").val();
				
				window.location.href = _url + "delete/keluarbarang/" + id;
 
			} 		   
		 });
 
	});

	$(document).on('click', '.cdetail', function(e) {
		e.preventDefault();
        var id = this.id;				
        var _url = $("#_url").val();		
        window.location.href = _url + "pengeluaranbarang/detail-kb/" + id;		
	});
	
	$('#keluar-barang').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/keluar-barang/",
			'type' : 'POST',
		},
    })

 


    
});