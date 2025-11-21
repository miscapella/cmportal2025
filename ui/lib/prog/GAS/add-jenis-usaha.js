function escapeRegExp(string) {
	return string.replace(/[.^$*+?()[{|\\]/g, "\\$&"); // $& means the whole matched string
}

function replaceAll(str, find, replace) {
	return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

$(document).ready(function () {
    // $(".progress").hide();
    var _url = $("#_url").val();
    $("#emsg").hide();

    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        // var _url = $("#_url").val();
		var form_data = new FormData($('#rformjenisusaha')[0]);
		$.ajax({
			url: _url + 'jenisusaha/add-post/',
			type: 'POST',
			data: form_data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR)
			{
				// var sbutton = $("#submit");
				// var _url = $("#_url").val();
				if ($.isNumeric(data)) {
					window.location = _url + 'jenisusaha/list/Jenis Usaha Baru Berhasil Ditambahkan!';
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
				//location.reload();
			}
		});
    });
});