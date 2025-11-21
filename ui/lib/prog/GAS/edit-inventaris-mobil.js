$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();

    //
	$('#tglstnk').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

	$('#tglpajak').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

	$('INPUT[type="file"]').change(function () {
        var val = $(this).val().toLowerCase(),
            regex = new RegExp("(.*?)\.(jpg|jpeg|png|bmp|gif)$");

        if (!(regex.test(val))) {
            $(this).val('');
            alert('File yang diterima : JPG, JPEG, PNG, GIF dan BMP');
        }
	});

    $('#cabang').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
	});
    $(".delpic").click(function (e) {
		var tag = this.getAttribute("tag");
		var id = $('#cid').val();
		var id1 = this.getAttribute('id');
		$(this).closest('div.form-group').find("div.col-lg-3").remove(); 
		$(this).closest('div.form-group').find("div.foto").removeClass('col-lg-8');
		$(this).closest('div.form-group').find("div.foto").addClass('col-lg-12');
		$(this).closest('div.form-group').find("div.col-lg-1").remove();
		$.post(_url + 'inventaris/delpic/', {
			tag: tag,
			id: id,
			id1: id1
		})
		.done(function (data) {})
		.fail(function(xhr, status, error) {
			alert(xhr.responseText);
		});
	});
	
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
//		var file_data = $('#ftstnk').prop('files')[0];   
		var form_data = new FormData($('#rform')[0]);                  
//		form_data.append('ftstnk', file_data);
		$.ajax({
			url: _url + 'inventaris/edit-mobil-post/',
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
					window.location = _url + 'inventaris/list-mobil/Berhasil Simpan ! ('+data+')';
				}
				else {
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