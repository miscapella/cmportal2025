$(document).ready(function () {
    $('#program').on("change", function(e) {
			var data=$(this).val();
			var _url = $("#_url1").val();
			window.location = _url+"dashboard/menu/"+data;
				
		});
});