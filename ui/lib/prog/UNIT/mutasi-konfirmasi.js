$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();    
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
		var form_data = new FormData($('#rform')[0]);
		$.ajax({
			url: _url + 'mutasi/konfirmasi/',
			type: 'POST',
			data: form_data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR)
			{
				var sbutton = $("#submit");
				var _url = $("#_url").val();

				if ($.isNumeric(data)) {
					x = _url + 'mutasi/cetak/' + data + '/';
					window.open(x, "_blank");
					window.location = _url + 'mutasi/list' +'/';
				}
				else {
					$('#submit').removeAttr('disabled');
					$('#ibox_form').unblock();
					var body = $("html, body");
					body.animate({scrollTop:0}, '1000', 'swing');
					$("#emsgbody").html(data);
					$("#emsg").show("slow");
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				alert(msg);
			}
		});
    });
});