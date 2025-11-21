$(document).ready(function () {
	$('#emsg').hide();
	let _url = $("#_url").val();

	$('.currency').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999, suffix: ' USD'});

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

	// $('#idate').datepicker({ 
	// 	changeMonth: true, 
	// 	changeYear: true, 
	// 	format: 'dd-mm-yyyy',
	// 	autoclose:true,
	// 	todayHighlight:true,
	// 	//endDate: new Date(new Date().setDate(new Date().getDate()))
	// }).css({"cursor":"pointer", "background":"white"});

	$('.pilihan').on('mousedown', function() {
		$(this).data('wasChecked', $(this).is(':checked'));
	});

	$(".pilihan").on('click', function (e) {
		e.preventDefault();
		let radio = $(this);
		if (!radio.data('wasChecked')) {
			$('.pilihan').prop('disabled', true);
			$('.submitbtn').prop('disabled', true);
			radio.hide();
			radio.siblings('.gif-container').show();

			let $data = new FormData();
			$data.append('cid', radio.closest('.form-container').find('input[name="cid[]"]').val());
			$data.append('supplier', radio.val());

			$.ajax({
				url: _url + 'persetujuan/ganti-supplier/',
				type: 'POST',
				data: $data,
				cache: false,
				processData: false,
				contentType: false,
				success: function(data, textStatus, jqXHR)
				{
					let obj = jQuery.parseJSON(data);
					$('.pilihan').prop('disabled', false);
					$('.submitbtn').prop('disabled', false);
					radio.show();
					radio.siblings('.gif-container').hide();

					if ($.isNumeric(obj.dataval)) {
						$("#total_harga").val(Intl.NumberFormat('id-ID', {
							style: 'currency',
							currency: 'IDR',
							maximumFractionDigits: 0,
							minimumFractionDigits: 0,
						}).format(obj.total_harga));
						$("#total_harga_netto").val(Intl.NumberFormat('id-ID', {
							style: 'currency',
							currency: 'IDR',
							maximumFractionDigits: 0,
							minimumFractionDigits: 0,
						}).format(obj.total_harga_netto));
						radio.closest('.form-container').find('.supplierpilihan').removeClass('supplierpilihan');
						radio.closest('.form-container').find('.supplierpilihan').removeClass('supplierpilihan');
						radio.closest('.form-container-1').addClass('supplierpilihan');
						radio.prop('checked', true);
					}
					else {
						let body = $("html, body");
						body.animate({scrollTop:0}, '50', 'swing');
						$("#emsg").attr('style',  'background-color:#e46f61');
						$("#emsgbody").html(obj.msg);
						$("#emsg").show('slow');
						jQuery('#emsgbody').animate({
							scrollTop: jQuery('#emsg').scrollTop()-150
						}, 500);
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
			var template = '<table style="width:100%"><tr><td><b>Detail Supplier</b><td></tr><tr><tr><td style="width:30%">Kode Supplier</td>';
			template += `<td>: ${kode}</td></tr>`;
			template += '<tr><td>Nama Supplier</td>';
			template += `<td>: ${obj.nama}</td></tr>`;
			template += '<tr><td>Bidang</td>';
			template += `<td>: ${obj.bidang}</td></tr>`;
			template += '<tr><td>Asal</td>';
			template += `<td>: ${obj.asal_supplier}</td></tr>`;
			template += '<tr><td>Telepon Toko</td>';
			template += `<td>: ${obj.telp_toko}</td></tr>`;
			template += '<tr><td>HP Toko</td>';
			template += `<td>: ${obj.hp_toko}</td></tr>`;
			template += '<tr><td>Email</td>';
			template += `<td>: ${obj.email}</td></tr>`;
			template += '<tr><td>Website</td>';
			template += `<td>: <a href="${obj.website}">${obj.website}</a></td></tr>`;
			template += '<tr><td>Tanggal Mulai Kerjasama</td>';
			template += `<td>: ${obj.tgl_mulai_kerjasama}</td></tr>`;
			template += '<tr><td>Lama Pembayaran</td>';
			template += `<td>: ${obj.lama_pembayaran}</td></tr>`;
			template += '<tr><td>Rekomendasi Dari</td>';
			template += `<td>: ${obj.rekomendasi_dari}</td></tr>`;
			template += '<tr><td>Nib</td>';
			template += `<td>: ${obj.nib}</td></tr>`;
			template += '<tr><td>File Nib</td>';
			template += `<td>: ${obj.file_nib}</td></tr>`;
			template += '<tr><td>Npwp</td>';
			template += `<td>: ${obj.npwp}</td></tr>`;
			template += '<tr><td>File Npwp</td>';
			template += `<td>: ${obj.file_npwp}</td></tr>`;
			template += '<tr><td>File Kontrak</td>';
			template += `<td>: ${obj.file_kontrak}</td></tr>`;

			template += '<tr><td>.</td></tr><tr><td><b>Detail Alamat</b><td>';
			template += '<tr><td>Negara</td>';
			template += `<td>: ${obj.negara}</td></tr>`;
			template += '<tr><td>Provinsi</td>';
			template += `<td>: ${obj.provinsi}</td></tr>`;
			template += '<tr><td>Kota</td>';
			template += `<td>: ${obj.kota}</td></tr>`;
			template += '<tr><td>Kelurahan</td>';
			template += `<td>: ${obj.kelurahan}</td></tr>`;
			template += '<tr><td>Kecamatan</td>';
			template += `<td>: ${obj.kecamatan}</td></tr>`;
			template += '<tr><td>Kotamadya</td>';
			template += `<td>: ${obj.kotamadya}</td></tr>`;
			template += '<tr><td>RT/RW</td>';
			template += `<td>: ${obj.rtrw}</td></tr>`;
			template += '<tr><td>Alamat</td>';
			template += `<td>: ${obj.Alamat}</td></tr>`;
			template += '<tr><td>Nomor Gedung</td>';
			template += `<td>: ${obj.nomor_gedung}</td></tr>`;
			template += '<tr><td>Kode Pos</td>';
			template += `<td>: ${obj.kode_pos}</td></tr>`;
			template += '<tr><td>Maps</td>';
			template += `<td>: <a href="${obj.maps}">${obj.maps}</a></td></tr>`;

			template += '<tr><td>.</td></tr><tr><td><b>Detail Contact</b><td>';
			template += '<tr><td>Nama</td>';
			template += `<td>: ${obj.nama_pemilik}</td></tr>`;
			template += '<tr><td>Nomor Hp</td>';
			template += `<td>: ${obj.hp_pemilik}</td></tr>`;
			template += '<tr><td>Nik KTP</td>';
			template += `<td>: ${obj.nik_ktp}</td></tr>`;
			template += '<tr><td>File KTP</td>';
			template += `<td>: ${obj.file_ktp}</td></tr>`;
			template += '<tr><td>Nama Contact</td>';
			template += `<td>: ${obj.nama_contact}</td></tr>`;
			template += '<tr><td>Hp Contact</td>';
			template += `<td>: ${obj.hp_contact}</td></tr>`;
			template += '<tr><td>Nama Emergency</td>';
			template += `<td>: ${obj.nama_emergency}</td></tr>`;
			template += '<tr><td>Hp Emergency</td>';
			template += `<td>: ${obj.hp_emergency}</td></tr>`;

			template += '<tr><td>.</td></tr><tr><td><b>Detail Rekening</b><td>';
			template += '<tr><td>Bank</td>';
			template += `<td>: ${obj.bank}</td></tr>`;
			template += '<tr><td>Nomor Rekening</td>';
			template += `<td>: ${obj.no_rekening}</td></tr>`;
			template += '<tr><td>Nama Rekening</td>';
			template += `<td>: ${obj.an_rekening}</td></tr>`;
			template += '<tr><td>File Rekening</td>';
			template += `<td>: ${obj.file_rekening}</td></tr>`;

			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
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

	// $(".detail-inventaris").click(function (e) {
	// 	e.preventDefault();
	// 	var _url = $("#_url").val();
	// 	var kode = $(this).attr('value');
	// 	var xx = new Intl.NumberFormat('de-DE');
	// 	$.post(_url + 'inventaris/render-detail-inventaris/', {
	// 		kode: kode,
	// 	})
	// 	.done(function (data) {
	// 		var obj = jQuery.parseJSON(data);
	// 		var template = '<table style="width:100%"><tr><td style="width:30%">Kode Inventaris</td>';
	// 		template += '<td>: '+ kode +'</td></tr>';
	// 		template += '<tr><td>Nama Inventaris</td>';
	// 		template += '<td>: '+ obj.nama +'</td></tr>';
	// 		template += '<tr><td>Kode Kategori</td>';
	// 		template += '<td>: '+ obj.kdkategori +'</td></tr>';
	// 		template += '<tr><td>Merk</td>';
	// 		template += '<td>: '+ obj.merk +'</td></tr>';
	// 		template += '<tr><td>Tipe</td>';
	// 		template += '<td>: '+ obj.tipe +'</td></tr>';
	// 		template += '<tr><td>Satuan</td>';
	// 		template += '<td>: '+ obj.satuan +'</td></tr>';
	// 		template += '<tr><td>Spesifikasi</td>';
	// 		template += '<td>: '+ obj.spesifikasi +'</td></tr>';
	// 		template += '<tr><td>Quantity Min</td>';
	// 		template += '<td>: '+ obj.qtymin.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</td></tr>';
	// 		template += '<tr><td>Quantity Max</td>';
	// 		template += '<td>: '+ obj.qtymax.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</td></tr>';
	// 		bootbox.alert(template, function () {
	// 			console.log('This was logged in the callback!');
	// 		});
	// 	});
		
	// });

    $(document).on('change', '.kd_inventaris', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $(this).closest('tr').find(".kd_item");
		$.post(_url + 'persetujuan/render-inv_item/', {
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

	$("#approve").on('click', function (e) {
        e.preventDefault();
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
        
		var $data = new FormData();
		$data.append('no_pr', $('#no_pr').val());
		$data.append('pesan', $('#pesan').val());
		console.log($data);

		bootbox.confirm('Klik OK Untuk APPROVE', function(result) {
			if(result){
				bootbox.dialog({
					message:
					  '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false,
				});

				$.ajax({
					url: _url + 'persetujuan/persetujuan-pr1-aprv/',
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
									window.location = _url + 'persetujuan/persetujuan-pr/';
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
    
	$("#approvesup").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var kd_inventaris = [];
		var kd_item = [];
		var supplierpilihan = [];
		$.each($("input[name='chk[]']:checked"), function(){
			var kode = $(this).closest('div').find("input[name='kd_item[]']").val();
			kode = kode.replace(" ","");
            var kode1 = $(this).closest('div').find("input[name='kd_inventaris[]']").val();
			kode1 = kode1.replace(" ","");
			kd_item.push($(this).closest('div').find("input[name='kd_item[]']").val());
			kd_inventaris.push($(this).closest('div').find("input[name='kd_inventaris[]']").val());

			supplierpilihan.push($(this).closest('div').find("input[name='"+kode1+kode+"supplierpilihan[]']:checked").val());
		});

		var $data = new FormData();
		$data.append('no_pr', $('#no_pr').val());
        $data.append('pesan', $('#pesan').val());
		$data.append('kd_inventaris', kd_inventaris);
		$data.append('kd_item', kd_item);
		$data.append('supplierpilihan', supplierpilihan);
		bootbox.confirm('Klik OK Untuk APPROVE', function(result) {
			if(result){
				$.ajax({
					url: _url + 'persetujuan/detail-pr-approvesup/',
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
									window.location = _url + 'persetujuan/list-pr-aprv/';
								}
							});
						}
						else {
							$('#approvesup').removeAttr('disabled');
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
				$('#approvesup').removeAttr('disabled');
			}
		});
    });

    $("#reject").on('click', function (e) {
        e.preventDefault();
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
        
		var $data = new FormData();
		$data.append('no_pr', $('#no_pr').val());
        $data.append('pesan', $('#pesan').val());
		bootbox.confirm('Klik OK Untuk REJECT', function(result) {
			if(result){
				$.ajax({
					url: _url + 'persetujuan/persetujuan-pr1-reject/',
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
									window.location = _url + 'persetujuan/persetujuan-pr/';
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