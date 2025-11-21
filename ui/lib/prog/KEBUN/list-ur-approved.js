$(document).ready(function () {
    var _url = $("#_url").val();
   
    $('#list-pengeluaranbarang').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-pengeluaranbarang/",
			'type' : 'POST',
		},
    })


	$(document).on('click', '.cdetail', function(e) {
        e.preventDefault();
        var id = this.id;				
        var _url = $("#_url").val();
			   console.log("jalan");
        window.location.href = _url + "pengeluaranbarang/detail-mb/" + id;
	   
       });

    $(document).on('click', '.creject', function(e) {
        e.preventDefault();
        var id = this.id;				
        var _url = $("#_url").val();
			   
        window.location.href = _url + "pengeluaranbarang/batal/" + id;
	   
       });

       

});