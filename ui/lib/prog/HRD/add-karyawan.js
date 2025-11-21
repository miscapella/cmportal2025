function escapeRegExp(string) {
	return string.replace(/[.^$*+?()[{|\\]/g, "\\$&"); // $& means the whole matched string
}

function replaceAll(str, find, replace) {
	return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

function namaKaryawan() {
	$("#nama_karyawan").val(($("#nama_depan").val() + " " + $("#nama_tengah").val() + " " + $("#nama_belakang").val()).replace(/\s+/g, ' ').trim());
}

$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
	$("#karyawan-tab").addClass("selected");
	$("#info-personal").hide();
	$("#info-pekerjaan").hide();
	$("#info-gaji").hide();
    var _url = $("#_url").val();
	$('#departemen').select2({
		theme: "bootstrap",
	});
	$('#id_supervisor').select2({
		theme: "bootstrap",
		templateResult: function(data) {
			let id = $(data.element).attr('id');

			if(id) {
				id = id.replace("id-sup-", "nama-sup-");
			}

			if(id === "nama-sup-none") {
				return data.text;
			} else {
				return data.text + " - " + $(`#${id}`).text();
			}
		}
	});
	$("#id_supervisor").change(function() {
		const id = $(`#id_supervisor > option[value="${$(this).val()}"]`).attr("id").replace("id-sup-", "nama-sup-");
		$('#nama_supervisor').val($(`#${id}`).val()).trigger('change.select2');
	});
	$('#kode_organisasi').select2({
		theme: "bootstrap",
		templateResult: function(data) {
			let id = $(data.element).attr('id');

			if(id) {
				id = id.replace("id-org-", "nama-org-");
			}

			if(id === "nama-org-none") {
				return data.text;
			} else {
				return data.text + " - " + $(`#${id}`).text();
			}
		}
	});
	$("#kode_organisasi").change(function() {
		const id = $(`#kode_organisasi > option[value="${$(this).val()}"]`).attr("id").replace("id-org-", "nama-org-");
		$('#nama_organisasi').val($(`#${id}`).val()).trigger('change.select2');
	});
	$('#id_jabatan').select2({
		theme: "bootstrap",
		templateResult: function(data) {
			let id = $(data.element).attr('id');

			if(id) {
				id = id.replace("id-jab-", "nama-jab-");
			}

			if(id === "nama-jab-none") {
				return data.text;
			} else {
				return data.text + " - " + $(`#${id}`).text();
			}
		}
	});
	$("#id_jabatan").change(function() {
		const id = $(`#id_jabatan > option[value="${$(this).val()}"]`).attr("id").replace("id-jab-", "nama-jab-");
		console.log(id);
		$('#nama_jabatan').val($(`#${id}`).val()).trigger('change.select2');
	});
	$('#kode_ptkp').select2({
		theme: "bootstrap",
		templateResult: function(data) {
			switch(data.text) {
				case "TK/0":
					return `${data.text} - Tidak kawin dan tidak ada tanggungan`;
				case "TK/1":
					return `${data.text} - Tidak kawin dan 1 tanggungan`;
				case "TK/2":
					return `${data.text} - Tidak kawin dan 2 tanggungan`;
				case "TK/3":
					return `${data.text} - Tidak kawin dan 3 tanggungan`;
				case "K/0":
					return `${data.text} - Kawin dan tidak ada tanggungan`;
				case "K/1":
					return `${data.text} - Kawin dan 1 tanggungan`;
				case "K/2":
					return `${data.text} - Kawin dan 2 tanggungan`;
				case "K/3":
					return `${data.text} - Kawin dan 3 tanggungan`;
				case "K/I/0":
					return `${data.text} - Penghasilan suami dan istri digabung dan tidak ada tanggungan`;
				case "K/I/1":
					return `${data.text} - Penghasilan suami dan istri digabung dan 1 tanggungan`;
				case "K/I/2":
					return `${data.text} - Penghasilan suami dan istri digabung dan 2 tanggungan`;
				case "K/I/3":
					return `${data.text} - Penghasilan suami dan istri digabung dan 3 tanggungan`;
			}
		}
	});
    
	$('.tgl').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		endDate: new Date(new Date().setDate(new Date().getDate()))
	})
	.css({"cursor":"pointer", "background":"white"});

	$("#karyawan-tab").click(function() {
		$("#karyawan-tab").addClass("selected");
		$("#personal-tab").removeClass("selected");
		$("#pekerjaan-tab").removeClass("selected");
		$("#gaji-tab").removeClass("selected");
		$("#karyawan-baru").show();
		$("#info-personal").hide();
		$("#info-pekerjaan").hide();
		$("#info-gaji").hide();
	})

	$("#personal-tab").click(function() {
		$("#karyawan-tab").removeClass("selected");
		$("#personal-tab").addClass("selected");
		$("#pekerjaan-tab").removeClass("selected");
		$("#gaji-tab").removeClass("selected");
		$("#karyawan-baru").hide();
		$("#info-personal").show();
		$("#info-pekerjaan").hide();
		$("#info-gaji").hide();
	})

	$("#pekerjaan-tab").click(function() {
		$("#karyawan-tab").removeClass("selected");
		$("#personal-tab").removeClass("selected");
		$("#pekerjaan-tab").addClass("selected");
		$("#gaji-tab").removeClass("selected");
		$("#karyawan-baru").hide();
		$("#info-personal").hide();
		$("#info-pekerjaan").show();
		$("#info-gaji").hide();
	})

	$("#gaji-tab").click(function() {
		$("#karyawan-tab").removeClass("selected");
		$("#personal-tab").removeClass("selected");
		$("#pekerjaan-tab").removeClass("selected");
		$("#gaji-tab").addClass("selected");
		$("#karyawan-baru").hide();
		$("#info-personal").hide();
		$("#info-pekerjaan").hide();
		$("#info-gaji").show();
	})

	$("#nama_depan").on("input", namaKaryawan);
	$("#nama_tengah").on("input", namaKaryawan);
	$("#nama_belakang").on("input", namaKaryawan);

	$("#no_ktp").on("input", function() {
		$("#id_pengguna").val($("#no_ktp").val());
	});

	$("#lewati_gaji_pokok").click(function () {
        $(this).context.checked ? $(".gaji-pokok").hide() : $(".gaji-pokok").show();
    });
	
	$("#tgl_dibuat").val(moment().format("MM/DD/YYYY"));	

	$(document).on('change', '.files', function(e) {
		var _url = $("#_url").val();
		var fd = new FormData();
		var files = $(this)[0].files;
		var elementId = "#s" + $(this).attr('id');
		if(files.length > 0 ){
			 fd.append('file',files[0]);
			 $.ajax({
				  url: _url + 'karyawan/upload-file/',
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

    $("#submit").click(function (e) {
        e.preventDefault();
		$('#nama_supervisor').removeAttr('disabled');
		$('#nama_organisasi').removeAttr('disabled');
		$('#nama_jabatan').removeAttr('disabled');
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
		var form_data = new FormData($('#rformkaryawan')[0]);
		$.ajax({
			url: _url + 'karyawan/add-post/',
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
					window.location = _url + 'karyawan/list/Karyawan Baru Berhasil Ditambahkan!';
				}
				else {
					$('#submit').removeAttr('disabled');
					$('#ibox_form').unblock();
					var body = $("html, body");
					body.animate({scrollTop:0}, '1000', 'swing');
					$("#emsgbody").html(data);
					$("#emsg").show("slow");
					$('#nama_supervisor').attr('disabled', true);
					$('#nama_organisasi').attr('disabled', true);
					$('#nama_jabatan').attr('disabled', true);
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