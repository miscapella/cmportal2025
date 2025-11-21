$(document).ready(function () {
    var _url = $("#_url").val();
    // $('#program').val("awal");
    $('#datatable').DataTable({
        "order": [],
        "pagingType": "full_numbers",
        "pageLength": 25,
        "scrollX": false,
        "processing": true,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "serverSide" : true,
        "ajax": {
            'url' : _url + "serverside/users/",
            'type' : 'POST',
        },
    });
	$('#department').on('change',function (e) {
		var _url = $("#_url").val();
		var dept = $(this).val();
		$.post(_url + 'settings/render-dept/', {
			dept: dept,
		})
		.done(function (data) {
           var obj = jQuery.parseJSON(data);
			$('#supervisor').html(obj.opt);
		})
	});
	$(document).on('click', '.cdisable', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk disable user ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "settings/users-disable/" + id;
           }
        });
    });
    $('#supervisor').select2();
	$('#golongan').select2();
    $('#department').select2();
    $('#cabang').select2();
    $('#bagian').select2();
    $('#user_type').select2();
	$('#department').on('change',function (e) {
		var _url = $("#_url").val();
		var dept = $(this).val();
		$.post(_url + 'settings/render-dept/', {
			dept: dept,
		})
		.done(function (data) {
            var obj = jQuery.parseJSON(data);
			$('#atasan').val(obj);
		})
	});
});

