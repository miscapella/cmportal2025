$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();
	$('.kodetelp').select2({
		theme: "bootstrap",
	});
	$('#negara').select2({
		theme: "bootstrap",
	});

	$('.tgl').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		endDate: new Date(new Date().setDate(new Date().getDate()))
	})
//	.attr("readonly", "readonly")
	.css({"cursor":"pointer", "background":"white"});

	$(document).on('change', '.files', function(e) {
		var _url = $("#_url").val();
		var fd = new FormData();
		var files = $(this)[0].files;
		var elementId = "#s" + $(this).attr('id');
		// Check file selected or not
		if(files.length > 0 ){
			 fd.append('file',files[0]);
			 $.ajax({
				  url: _url + 'supplier/upload-file/',
				  type:'post',
				  data:fd,
				  dataType: 'json',
				  contentType: false,
				  processData: false,
				  success:function(response){
					   if(response.status == 1){
							var uploadedFileName = response.filename;
							$(elementId).val(uploadedFileName);
							bootbox.alert({
								message: 'File Berhasil di Upload ' + uploadedFileName,
								backdrop: true,
								timeout: 2000,
								callback: function(){}
							});
					   } else if(response.status == 2){
							bootbox.alert({
								message: 'Nama File telah ditemukan, mohon ganti nama file anda',
								backdrop: true,
								timeout : 2000,
								callback: function(){},
								className: 'custom-alert-red',
							});
					   }  else if (response.status == 3){
						bootbox.alert({
							message : 'Ukuran File Melebihi 5 MB',
							backdrop : true,
							timeout : 2000,
							callback: function(){},
							className: 'custom-alert-red',
						});
					 } else{
						bootbox.alert({
							message: 'File gagal di upload. Sistem hanya menerima format .jpg .jpeg .png .pdf .xlsx .xls',
							backdrop: true,
							timeout : 2000,
							callback: function(){},
							className: 'custom-alert-red',
						});
					   }
				  }
			 });
		}else{
			 alert("Please select a file.");
		}
   	});

	$(document).on('change', '#blocked', function(e) {
		if ($(this).prop('checked')) {
            // If checked, make the text input editable
            $('#alasan_blocked').prop('readonly', false);
        } else {
            // If unchecked, make the text input read-only
            $('#alasan_blocked').prop('readonly', true);
        }
   	});


	$(document).on('change', '#aktif', function(e) {
		if ($(this).prop('checked')) {
            // If checked, make the text input editable
            $('#alasan_non_aktif').prop('readonly', true);
        } else {
            // If unchecked, make the text input read-only
            $('#alasan_non_aktif').prop('readonly', false);
        }
   	});

	
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
		var form_data = new FormData($('#rformsupplier')[0]);                  
		$.ajax({
			url: _url + 'supplier/edit-post/',
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

					window.location = _url + 'supplier/list/Supplier Berhasil Diedit !';
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



	$("#submit1").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
		var form_data = new FormData($('#rformsupplier')[0]);                  
		$.ajax({
			url: _url + 'supplier/edit-post/',
			type: 'POST',
			data: form_data,
			cache: false,
//			dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
				var sbutton = $("#submit1");
				var _url = $("#_url").val();
				if ($.isNumeric(data)) {

					window.location = _url + 'supplier/list/Supplier Berhasil Diedit !';
				}
				else {
					$('#submit1').removeAttr('disabled');
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