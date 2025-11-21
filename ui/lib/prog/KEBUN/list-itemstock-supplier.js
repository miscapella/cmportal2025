$(document).ready(function () {
	$('.kode_supplier').select2({
		theme: "bootstrap",
	});
	$('#emsg').hide();
    $('#add').on('click', function(){
		var opt = $('#opt').html();
		var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><select name="kode_supplier[]" class="kode_supplier" id="kode_supplier">'+opt+'</select></td>';
		clist += '<td><input type="text" name="nama[]" class="nama" readonly></td>';
		clist += '<td><input type="text" name="bidang[]" class="bidang" readonly></td>';
		clist += '<td><input type="text" name="tgl_mulai_kerjasama[]" class="tgl_mulai_kerjasama" readonly></td>';
		clist += '<td><input type="text" name="status[]" value="Pending" readonly><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>';
		clist += '<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>';
		$(".sys_table").find('tbody')
			.append(clist);
		$('.kode_supplier').select2({
			theme: "bootstrap",
		});
		
    });

    $(document).on('click', '.hapus', function(e) {
		var kode_item = $('#kode_item').val();
		var kode = $(this).closest('tr').find('.kode_supplier').val();
		var _url = $("#_url").val();
		var posisi = $(this).closest('tr');
		var baru = $(this).closest('tr').find('.baru').val();
		if(baru == 'baru') {
			posisi.fadeOut(300, function(){
				posisi.remove();
			});
		} else {
			bootbox.confirm('Apakah anda yakin untuk menghapus supplier ini?', function(result) {
				if(result){
					$.post(_url + 'itemstock/hapus-supplier/', {
						kode: kode,
						kode_item: kode_item,
					})
					.done(function (data) {
						if ($.isNumeric(data)) {
							posisi.fadeOut(300, function(){
								posisi.remove();
							});
						} else {
							bootbox.alert({
								message: 'Kesalahan dalam menghapus data Item Stock - Supplier',
								backdrop: true,
								timeout : 2000,
								callback: function(){ 
									window.location.reload();
								}
							});
						}
					});
				}
			});
		}
    });

    $(document).on('change', '.kode_supplier', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var nama = $(this).closest('tr').find(".nama");
		var bidang = $(this).closest('tr').find(".bidang");
		var tgl_mulai_kerjasama = $(this).closest('tr').find(".tgl_mulai_kerjasama");
		$.post(_url + 'itemstock/render-supplier/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			nama.val(obj.nama);
			bidang.val(obj.bidang);
			tgl_mulai_kerjasama.val(obj.tgl_mulai_kerjasama);
		});
    });

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		var _url = $("#_url").val();

		var kode_supplier = [];
		$.each($("input[name='chk[]']:checked"), function(){
			kode_supplier.push($(this).closest('tr').find("select[name='kode_supplier[]'] option").filter(':selected').val());
		});
		var $data = new FormData();
		$data.append('kode_supplier', kode_supplier);
		$data.append('kode_item', $('#kode_item').val());
		bootbox.confirm('Apakah anda yakin untuk mengupdate itemstock ini?', function(result) {
			
			if(result){
				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});
				$.ajax({
					url: _url + 'itemstock/supplier-post/',
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
							if(obj.dataval == 12) {
								snap.pay(obj.snapToken);
							}
							var body = $("html, body");
							bootbox.alert({
								message: obj.msg,
								backdrop: true,
								timeout : 2000,
								callback: function(){ 
									window.location.reload();
								}
							});
						}
						else {
							$("#submit").prop('disabled',false);
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
			}
		});
    });
});