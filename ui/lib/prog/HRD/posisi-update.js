$(document).ready(function () {
    const _url = $('#_url').val();
	let _data = [];

    $('#emsg').hide();

	$(document).on('change', '.files', function() {
        const ul = $(this).closest('div').siblings('ul');
        const lis = ul.children();

        const fd = new FormData();
		const files = $(this)[0].files;

        if (files.length) {
            fd.append('file', files[0]);

            $.ajax({
                url: _url + 'posisi/upload-file/',
                type: 'post',
                data: fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
					if (response.status === 1) {
						_data = response.data;

                        lis.each((_, li) => {
                            const text = $(li).text().trim();
                            const html = text + ' <i class="fa fa-check" style="color: green;"></i>';
                            $(li).html(html);
                        });
					} else if (response.status === 2) {
                        _data = [];

                        lis.each((_, li) => {
                            const text = $(li).text().trim();
                            const html = response.column[text] === -1
                                ? text + ' <i class="fa fa-times" style="color: red;"></i>'
                                : text + ' <i class="fa fa-check" style="color: green;"></i>';
                            $(li).html(html);
                        });
                    } else if (response.status === 3) {
						_data = [];

						bootbox.alert({
                            message: response.message,
                            backdrop: true,
                            timeout : 2000,
                            callback: function(){},
                            className: 'custom-alert-red',
                        });

						lis.each((_, li) => {
							const text = $(li).text().trim();
							const html = text + ' <i class="fa fa-times" style="color: red;"></i>';
							$(li).html(html);
						});
					}
                },
            });
        } else {
            _data = [];

            lis.each((_, li) => {
                const text = $(li).text().trim();
                const html = text + ' <i class="fa fa-times" style="color: red;"></i>';
                $(li).html(html);
            });

            alert('Please select a file.');
        }
   	});

    $('#submit').click(function (e) {
        e.preventDefault();

		bootbox.confirm('Apakah anda yakin untuk memperbarui data posisi? <br><span style="color: red;">NB : Seluruh data akan diperbarui mengikuti file terbaru.</span>', function (result) {
            if (result) {
                $('#ibox_form').block({ message: null });
				$(this).attr('disabled', 'disabled');

				const formData = new FormData();
				formData.append('data', JSON.stringify(_data));

				$.ajax({
					url: _url + 'posisi/update-post/',
					type: 'POST',
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response.status === 1) {
							window.location = _url + 'posisi/list/Posisi baru berhasil diperbarui!';
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
            }
        });
    });
});