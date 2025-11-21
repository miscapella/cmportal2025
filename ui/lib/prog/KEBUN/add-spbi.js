// Edit by steven 14/12/2023
function change_supplier(e) {
	var kode = $("#no_po").val();
        var supplier = $("#nama_supplier");
				var supplier2 = $("#nama_supplier2");
        if(kode != ''){
            var _url = $("#_url").val();
            var item = $(this).closest('tr').find(".kode_item");
            $.post(_url + 'pengiriman/render-spbi/', {
                kode: kode,
            })
            .done(function (data) {
                var obj = jQuery.parseJSON(data);
                var opt = $('#opt').html();
                supplier.val(obj.nama_supplier);
								supplier2.val(obj.nama_supplier);
                $(".sys_tables").find('tr')
                .remove();
                $(".sys_table").find('tbody')
                .append(obj.clist);
                $('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
                $('.kode_item').select2();
            });
        } else {
            $(".sys_tables").find('tr')
            .remove();
            supplier.val("");
        }
}

function show_resi_field() {
	const kode_via = $('#kode_via').val();
	const ada_resi = kode_via.substr(kode_via.length - 1);
	if (ada_resi === 'Y') {
		$("#no_resi_container").show();
	} else {
		$("#no_resi_container").hide();
	}
}

$(document).on('change', '.files', function(e) {
	var _url = $("#_url").val();
	var fd = new FormData();
	var files = $(this)[0].files;
	var elementId = "#s" + $(this).attr('id');
	if(files.length > 0 ){
		 fd.append('file',files[0]);
		 $.ajax({
			  url: _url + 'pengiriman/upload-file/',
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
						message: 'File gagal di upload. Sistem hanya menerima format .jpg .jpeg .png',
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


$(document).ready(function () {
	change_supplier();
	show_resi_field();
	$('#emsg').hide();
	$('#no_po').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('#kepada').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('#kode_via').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
    });
	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
	}).css({"cursor":"pointer", "background":"white"});
    
    $(document).on('change', '#no_po', change_supplier);

		// Show No Resi
		$(document).on('change', '#kode_via', show_resi_field);


	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var no_pr = [];
		var kode_item = [];
		var qty_req = [];
		var keterangan = [];
		$.each($("input[name='chk[]']:checked"), function(){
			no_pr.push($(this).closest('tr').find("input[name='no_pr[]']").val());
			kode_item.push($(this).closest('tr').find("select[name='kode_item[]'] option").filter(':selected').val());
			qty_req.push($(this).closest('tr').find("input[name='qty_req[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
		});
		var $data = new FormData();
		$data.append('no_pr', no_pr);
		$data.append('kode_item', kode_item);
		$data.append('qty_req', qty_req);
		$data.append('keterangan', keterangan);
		$data.append('sfile_spbi', $('#sfile_spbi').val());
		$data.append('idate', $('#idate').val());
		$data.append('kepada', $('#kepada').val());
        $data.append('pesan', $('#pesan').val());
        $data.append('no_po', $('#no_po').val());
		$data.append('no_resi', $('#no_resi').val());
		$data.append('kode_via', $('#kode_via').val().slice(0, -1));
		// console.log($('#kode_via').val())
		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'pengiriman/add-post/',
					type: 'POST',
					data: $data,
					cache: false,
					//dataType: 'json',
					processData: false, // Don't process the files
					contentType: false, // Set content type to false as jQuery will tell the server its a query string request
					success: function(data, textStatus, jqXHR)
					{
						var obj = jQuery.parseJSON(data);
						if ($.isNumeric(obj.dataval)) {
							$('.overlay').hide();
							var body = $("html, body");
							bootbox.alert({
								message: obj.msg,
								backdrop: true,
								timeout : 2000,
								callback: function(){ 
									window.location = _url + 'pengiriman/list/Berhasil Menambahkan SPBI';
								}
							});
						} else {
							$('#save').removeAttr('disabled');
							$('.overlay').hide();
							var body = $("html, body");
							body.animate({scrollTop:0}, '50', 'swing');
							$("#emsg").attr('style',  'background-color:#e46f61');
							$("#emsgbody").html(obj.msg);
							$("#emsg").show('slow');
							jQuery('#emsgbody').animate({
									scrollTop: jQuery('#emsg').scrollTop()-150
								}, 500);
							
							$("#emsg").delay(5200).fadeOut(500);
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
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });
});