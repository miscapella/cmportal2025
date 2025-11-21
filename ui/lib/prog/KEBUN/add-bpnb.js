$(document).ready(function () {
	$('#emsg').hide();
	$('#spbi').select2({
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
   
    $(document).on('change', '#spbi', function(e) {
        var kode = $(this).val();
        var supplier = $("#nama_supplier");
        if(kode != ''){
            var _url = $("#_url").val();            
            $.post(_url + 'penerimaan/render-bpnb/', {
                kode: kode,
            })
            .done(function (data) {
                var obj = jQuery.parseJSON(data);
                var opt = $('#opt').html();
                supplier.val(obj.nama_supplier);
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
    });

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
        var no_pr = [];
		var kode_item = [];
		$.each($("input[name='chk[]']:checked"), function(){
			no_pr.push($(this).closest('tr').find("input[name='no_pr[]']").val());
			kode_item.push($(this).closest('tr').find("select[name='kode_item[]'] option").filter(':selected').val());
		});
		var $data = new FormData();
		$data.append('no_pr', no_pr);
		$data.append('kode_item', kode_item);
		$data.append('idate', $('#idate').val());
        $data.append('pesan', $('#pesan').val());
        $data.append('spbi', $('#spbi').val());
		console.log($('#sfile_bpnb').val());
		$data.append('sfile_bpnb', $('#sfile_bpnb').val());
		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'penerimaan/add-post/',
					type: 'POST',
					data: $data,
					cache: false,
					processData: false,
					contentType: false,
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
									window.location = _url + 'penerimaan/list/Berhasil Menambahkan BPnB';
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
					}
				});
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });
});