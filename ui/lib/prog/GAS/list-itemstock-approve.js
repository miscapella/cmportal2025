$(document).ready(function () {
	$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	$('.desimal').autoNumeric('init',{mDec:2, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	$('#emsg').hide();
    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
        //item_remove.hide();
    });

	$(".detail-itemstock").click(function (e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		var xx = new Intl.NumberFormat('de-DE');
		$.post(_url + 'itemstock/render-detail-itemstock/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			var template = '<table style="width:100%"><tr><td style="width:30%">Kode Item Stock</td>';
			template += '<td>: '+ kode +'</td></tr>';
			template += '<tr><td>Nama Item Stock</td>';
			template += '<td>: '+ obj.nama +'</td></tr>';
			template += '<tr><td>Merk</td>';
			template += '<td>: '+ obj.merk +'</td></tr>';
			template += '<tr><td>Tipe</td>';
			template += '<td>: '+ obj.tipe +'</td></tr>';
			template += '<tr><td>Satuan</td>';
			template += '<td>: '+ obj.satuan +'</td></tr>';
			template += '<tr><td>Spesifikasi</td>';
			template += '<td>: '+ obj.spesifikasi +'</td></tr>';
			template += '<tr><td>Quantity Min</td>';
			template += '<td>: '+ obj.qtymin.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</td></tr>';
			template += '<tr><td>Quantity Max</td>';
			template += '<td>: '+ obj.qtymax.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</td></tr>';
			template += '<tr><td>Jumlah per Satuan</td>';
			template += '<td>: '+ xx.format(obj.jumlahpersatuan) + ' / ' + obj.satuanharga + '</td></tr>';
			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
		});
		
	});

	$(".detail-supplier").click(function (e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		var xx = new Intl.NumberFormat('de-DE');
		$.post(_url + 'itemstock/render-detail-supplier/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			var template = '<table style="width:100%"><tr><td style="width:30%">Kode Supplier</td>';
			template += '<td>: '+ kode +'</td></tr>';
			template += '<tr><td>Nama Supplier</td>';
			template += '<td>: '+ obj.nama +'</td></tr>';
			template += '<tr><td>Bagian</td>';
			template += '<td>: '+ obj.bagian +'</td></tr>';
			template += '<tr><td>Alamat</td>';
			template += '<td>: '+ obj.alamat +'</td></tr>';
			template += '<tr><td>Kota</td>';
			template += '<td>: '+ obj.kota +'</td></tr>';
			template += '<tr><td>Telepon</td>';
			template += '<td>: '+ obj.phone +'</td></tr>';
			template += '<tr><td>No HP</td>';
			template += '<td>: '+ obj.nohp +'</td></tr>';
			template += '<tr><td>Contact Person</td>';
			template += '<td>: '+ obj.contact +'</td></tr>';
			template += '<tr><td>Email</td>';
			template += '<td>: '+ obj.email +'</td></tr>';
			template += '<tr><td>Website</td>';
			template += '<td>: '+ obj.website + '</td></tr>';
			template += '<tr><td>Tanggal Kerjasama</td>';
			template += '<td>: '+ obj.tglkerjasama +'</td></tr>';
			template += '<tr><td>Lama Bayar</td>';
			template += '<td>: '+ obj.lamabayar +' Hari</td></tr>';
			template += '<tr><td>Rekomendasi Dari</td>';
			template += '<td>: '+ obj.rekomendasi +'</td></tr>';
			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
		});
		
	});

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		//$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var kd_item = [];
		var kd_supplier = [];
		var status = [];
		$.each($("input[name='chk[]']:checked"), function(){
			var kode = $(this).closest('tr').find("input[name='kd_supplier[]']").val();
            var kode1 = $(this).closest('tr').find("input[name='kd_item[]']").val();
			kd_item.push($(this).closest('tr').find("input[name='kd_item[]']").val());
			kd_supplier.push($(this).closest('tr').find("input[name='kd_supplier[]']").val());
			status.push($(this).closest('tr').find("input[name='"+kode1+kode+"status[]']:checked").val());
		});
		var $data = new FormData();
		$data.append('kd_supplier', kd_supplier);
		$data.append('status', status);
		$data.append('kd_item', kd_item);
		bootbox.confirm('Klik OK Untuk Simpan', function(result) {
			if(result){
				$.ajax({
					url: _url + 'itemstock/approve-post/',
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
						//location.reload();
					}
				});
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });
});