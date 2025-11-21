$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();
	$('#parent_id_posisi').select2({
		theme: "bootstrap",
		templateResult: function(data) {
			let id = $(data.element).attr('id');

			if(id) {
				id = id.replace("id-pos-", "nama-pos-");
			}

			if(id === "nama-pos-root") {
				return data.text;
			} else {
				return data.text + " - " + $(`#${id}`).text();
			}
		}
	});

	$("#parent_id_posisi").change(function() {
		const id = $(`#parent_id_posisi > option[value="${$(this).val()}"]`).attr("id").replace("id-pos-", "nama-pos-");
		$('#parent_nama_posisi').val($(`#${id}`).val()).trigger('change.select2');
	});

	$("#submit").click(function (e) {
        e.preventDefault();
		$('#parent_nama_posisi').removeAttr('disabled');
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
		var form_data = new FormData($('#rformorganisasi')[0]);                  
		$.ajax({
			url: _url + 'struktur-organisasi/edit-post/',
			type: 'POST',
			data: form_data,
			cache: false,
//			dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
				var sbutton = $("#submit");
				var _url = $("#_url").val();
				if ($.isNumeric(data)) {

					window.location = _url + 'struktur-organisasi/list/Organisasi Berhasil Diedit !';
				}
				else {
					$('#submit').removeAttr('disabled');
					$('#ibox_form').unblock();
					var body = $("html, body");
					body.animate({scrollTop:0}, '1000', 'swing');
					$("#emsgbody").html(data);
					$("#emsg").show("slow");
					$('#parent_nama_posisi').attr('disabled', true);
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