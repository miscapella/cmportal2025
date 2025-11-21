$(document).ready(function () {

//	$('#department').on('change',function (e) {
//		var _url = $("#_url").val();
//		var department = $(this).val();
//		$.post(_url + 'login/department/', {
//			department: department
//
//		})
//		.done(function (data) {
//			$('#atasan').val(data);
//		})
//	});
     $('#department').on('change',function (e) {
        
		var _url = $("#_url").val();
		var dept = $(this).val();
		$.post(_url + 'login/render-dept/', {
			dept: dept,
		})
		.done(function (data) {
            
            var obj = jQuery.parseJSON(data);
			$('#atasan').val(obj);
		})
	});
});