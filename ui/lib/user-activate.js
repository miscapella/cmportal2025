$(document).ready(function () {
    var _url = $("#_url").val();
    $('#datatable').DataTable({
        "order": [],
        "pagingType": "full_numbers",
        "pageLength": 15,
        "scrollX": false,
        "processing": true,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "serverSide" : true,
        "ajax": {
            'url' : _url + "serverside/user-activate/",
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
	$(document).on('click', '.cactive', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk mengaktifkan user ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "settings/users-active/" + id;
           }
        });
    });
    $('#supervisor').select2();
	$('#golongan').select2();
    $('#department').select2();
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

