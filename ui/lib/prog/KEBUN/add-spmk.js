$(document).ready(function () {
	$('#emsg').hide();
    $('#priority').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
	}).css({"cursor":"pointer", "background":"white"});

	$(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
    });

    $('#add').on('click', function(){
		var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
		clist += '<td><input style="width:100%;" type="text" name="spesifikasi[]" class="spesifikasi"></td>';
        clist += '<td><input style="width:100%;" type="text" name="block[]" class="block"></td>';
        clist += '<td><input style="width:100%;" type="text" name="ha[]" class="ha"></td>';
        clist += '<td><input style="width:100%;" type="text" name="pkk[]" class="pkk"></td>';
		$(".sys_table").find('tbody')
			.append(clist);
    });

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
		var spesifikasi = [];
		var block = [];
		var ha = [];
		var pkk = [];
		$.each($("input[name='chk[]']:checked"), function(){
			spesifikasi.push($(this).closest('tr').find("input[name='spesifikasi[]']").val());
			block.push($(this).closest('tr').find("input[name='block[]']").val());
			ha.push($(this).closest('tr').find("input[name='ha[]']").val());
			pkk.push($(this).closest('tr').find("input[name='pkk[]']").val());
		});
		var $data = new FormData();
		$data.append('spesifikasi', spesifikasi);
		$data.append('block', block);
		$data.append('ha', ha);
		$data.append('pkk', pkk);
		$data.append('idate', $('#idate').val());
		$data.append('no_spmk', $('#no_spmk').val());
		$data.append('priority', $('#priority').val());
		$data.append('divisi', $('#divisi').val());
		$data.append('jenis_pekerjaan', $('#jenis_pekerjaan').val());
		$data.append('lokasi', $('#lokasi').val());
		$data.append('afdeling', $('#afdeling').val());
		bootbox.confirm('Apakah anda yakin untuk membuat SPmK ?', function(result) {
			if(result){
				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});
				$.ajax({
					url: _url + 'pembelian/add-spmk-post/',
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
									window.location = _url + 'pembelian/list-spmk-pending/SPmK Berhasil Ditambahkan';
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
							bootbox.hideAll()
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