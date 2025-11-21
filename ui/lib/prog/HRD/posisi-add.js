$(document).ready(function () {
    const _url = $('#_url').val();

    $('#emsg').hide();

    $('#submit').click(function (e) {
        e.preventDefault();

        $('#ibox_form').block({ message: null });
		$(this).attr('disabled', 'disabled');

		const formData = new FormData($('#rformposisi')[0]);

		$.ajax({
			url: _url + 'posisi/add-post/',
			type: 'POST',
			data: formData,
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.status === 1) {
					window.location = _url + 'posisi/list/Posisi baru berhasil ditambahkan!';
				} else if (response.status === 2) {
					const body = $('html, body');
					body.animate({scrollTop:0}, '1000', 'swing');

					$('#submit').removeAttr('disabled');
					$('#ibox_form').unblock();
					$('#emsgbody').html(response.message);
					$('#emsg').show('slow');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
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