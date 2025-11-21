$(document).ready(function () {
	$('#emsg').hide();

	$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	$('.desimal').autoNumeric('init',{mDec:2, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	$('.kd_inventaris').select2();
	$('.kd_item').select2();
	$('.tgl').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

    $(document).on('change', '.kd_inventaris', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $(this).closest('tr').find(".kd_item");
		$.post(_url + 'pembelian/render-inv_item/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$("#kd_item").trigger("change");
		});
    });

    $(document).on('change', '.kd_item', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var nm_item = $(this).closest('tr').find(".nm_item");
		var merk = $(this).closest('tr').find(".merk");
		var satuan = $(this).closest('tr').find(".satuan");
		var qty_balance = $(this).closest('tr').find(".qty_balance");
		$.post(_url + 'inventaris/render-itemstock/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			nm_item.val(obj.nm_item);
			merk.val(obj.merk);
			satuan.val(obj.satuan);
			qty_balance.val(obj.stock);
		});
    });

	$(".detail-itemstock").click(function (e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		var xx = new Intl.NumberFormat('de-DE');
		$.post(_url + 'inventaris/render-detail-itemstock/', {
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
			template += '<tr><td>Jumlah Satuan Kecil</td>';
			template += '<td>: '+ xx.format(obj.jumlahpersatuan) + ' ' + obj.satuanharga + '</td></tr>';
			if(obj.tempa == 'Y') {
				$tempa = 'Barang Tempa';
			} else {
				$tempa = 'Bukan Barang Tempa';
			}
			template += '<tr><td>Jenis</td>';
			template += '<td>: '+ $tempa +'</td></tr>';
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
			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
		});
		
	});

	$("#approve").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
        
		var $data = new FormData();
		$data.append('no_po', $('#no_po').val());
        $data.append('pesan', $('#pesan').val());
		bootbox.confirm('Klik OK Untuk APPROVE', function(result) {
			if(result){
				$.ajax({
					url: _url + 'pembelian/detail-po-approve/',
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
									window.location = _url + 'pembelian/list-po-aprv/';
								}
							});
						}
						else {
							$('#approve').removeAttr('disabled');
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
				$('#approve').removeAttr('disabled');
			}
		});
    });
    
    $("#reject").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
        
		var $data = new FormData();
		$data.append('no_po', $('#no_po').val());
        $data.append('pesan', $('#pesan').val());

		bootbox.confirm('Klik OK Untuk REJECT', function(result) {
			if(result){
				$.ajax({
					url: _url + 'pembelian/detail-po-reject/',
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
									window.location = _url + 'pembelian/list-po-aprv/';
								}
							});
						}
						else {
							$('#reject').removeAttr('disabled');
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
				$('#reject').removeAttr('disabled');
			}
		});
    });
});