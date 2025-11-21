$(document).ready(function () {
	const _url = $('#_url').val();
    let _data = {};
    // Persisted period info from uploaded filename (MMYYYY)
    let _periodKey = '';
    let _periodDate = '';
    $('#ecustomer').hide();

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
                url: _url + 'customer/upload-file/',
                type: 'post',
                data: fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === 1) {
                        _data[response.type] = response.data;
                        // capture period metadata when available
                        if (response.period_key) _periodKey = response.period_key;
                        if (response.period_date) _periodDate = response.period_date;
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
        if (_periodKey) fd.append('period_key', _periodKey);
        if (_periodDate) fd.append('period_date', _periodDate);

        bootbox.confirm('Apakah anda yakin untuk memperbarui data customer? <br><span style="color: red;">NB : Seluruh data akan diperbarui mengikuti file terbaru.</span>', function(result) {
			if (result) {
                $('#ecustomer').hide();

                bootbox.dialog({
                    message: '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>',
                    closeButton: false
                });

				$.ajax({
					url: _url + 'customer/update-post/',
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
									window.location = _url + 'customer/list';
								},
							});
                        } else if (response.status === 2) {
                            $('#submit').removeAttr('disabled');
                            const body = $('html, body');
							body.animate({ scrollTop: 0 }, '50', 'swing');

                            $('#ecustomer').html(response.error);
                            $('#ecustomer').show();

                            jQuery('#ecustomer').animate({
                                scrollTop: jQuery('#ecustomer').scrollTop() - 150,
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
                        let msg;
                        if (jqXHR.status === 0) {
                            msg = 'Not connected. Please verify your network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found [404].';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (textStatus === 'parsererror') {
                            var body = (jqXHR && jqXHR.responseText) ? jqXHR.responseText.toString() : '';
                            var preview = body.length ? ('\nResponse preview:\n' + body.substring(0, 600)) : '';
                            msg = 'Requested JSON parse failed.' + preview;
                        } else if (textStatus === 'timeout') {
                            msg = 'Timeout error.';
                        } else if (textStatus === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        bootbox.hideAll();
                        bootbox.alert({
                            message: msg,
                            backdrop: true,
                            timeout: 3000,
                            className: 'custom-alert-red'
                        });
                        $('#submit').removeAttr('disabled');
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
