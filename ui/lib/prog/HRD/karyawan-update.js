$(document).ready(function () {
	const _url = $('#_url').val();
    let _data = {};
    $('#ekaryawan').hide();

    // Upload file
    $(document).on('change', '.files', function() {
        const id = $(this).attr('id');
        const graphType = getGraphType(id);
        const ul = $(this).closest('div').siblings('ul');
        const lis = ul.children();

        const fd = new FormData();
		const files = $(this)[0].files;

        if (files.length) {
            fd.append('file', files[0]);
            fd.append('graphType', graphType);

            $.ajax({
                url: _url + 'karyawan/upload-file/',
                type: 'post',
                data: fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 1) {
                        _data[response.type] = response.data;
                        lis.each((_, li) => {
                            const text = $(li).text().trim();
                            const html = text + ' <i class="fa fa-check" style="color: green;"></i>';
                            $(li).html(html);
                        });
                    } else if (response.status === 2) {
                        delete _data[response.type];

                        lis.each((_, li) => {
                            const text = $(li).text().trim();
                            const html = response.column[text] === -1
                                ? text + ' <i class="fa fa-times" style="color: red;"></i>'
                                : text + ' <i class="fa fa-check" style="color: green;"></i>';
                            $(li).html(html);
                        });
                    } else if (response.status === 3) {
                        delete _data[response.type];

                        bootbox.alert({
                            message: response.error,
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
                    } else {
                        delete _data[response.type];

                        bootbox.alert({
                            message: 'File gagal di upload. Sistem hanya menerima format .xlsx .xls',
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
            delete _data[graphType];

            lis.each((_, li) => {
                const text = $(li).text().trim();
                const html = text + ' <i class="fa fa-times" style="color: red;"></i>';
                $(li).html(html);
            });

            alert('Please select a file.');
        }
   	});

    // Submit form
    $('#submit').on('click', function(e) {
        e.preventDefault();
        document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$(this).attr('disabled', 'disabled');

        const fd = new FormData();
        fd.append('data', JSON.stringify(_data));

        bootbox.confirm('Apakah anda yakin untuk memperbarui data karyawan? <br><span style="color: red;">NB : Seluruh data akan diperbarui mengikuti file terbaru.</span>', function(result) {
			if (result) {
                $('#ekaryawan').hide();

				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});

				$.ajax({
					url: _url + 'karyawan/update-post/',
					type: 'POST',
					data: fd,
					dataType: 'json',
					contentType: false,
					processData: false,
					success: function(response) {
                        if (response.status === 1) {
                            bootbox.hideAll();
							bootbox.alert({
								message: response.msg,
								backdrop: true,
								timeout : 2000,
								callback: function() {
									window.location = _url + 'karyawan/list';
								},
							});
                        } else if (response.status === 2) {
                            $('#submit').removeAttr('disabled');
                            const body = $('html, body');
							body.animate({ scrollTop: 0 }, '50', 'swing');

                            $('#ekaryawan').html(response.error);
                            $('#ekaryawan').show();

                            jQuery('#ekaryawan').animate({
                                scrollTop: jQuery('#ekaryawan').scrollTop() - 150,
                            }, 500);
                            bootbox.hideAll();
                        } else {
                            $('#submit').removeAttr('disabled');
                            bootbox.hideAll();
                            bootbox.alert({
                                message: response.error,
                                backdrop: true,
                                timeout : 2000,
                                callback: function() {},
                                className: 'custom-alert-red',
                            });
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
						location.reload();
					}
				});
			} else {
				$('#submit').removeAttr('disabled');
			}
		});
    });

    function getGraphType(id) {
        const idType = id.split('-').slice(1).join('-');
        const splitType = idType.split('_');
        const type = splitType.map((type) => type[0].toUpperCase() + type.slice(1).toLowerCase());
        return type.join(' ');
    }
});
