$(document).ready(function () {
	$('#emsg').hide();
	$('#emsgModal').hide();

	$(document).on('click', '#add', function(e) {
		e.preventDefault();
		let rowCount = $("#table-add-mr tr").length;

		let clist = `<tr><td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a> ${rowCount}</td>`;
		clist += '<td style="vertical-align: middle"><select name="keperluan[]" class="form-control keperluan" style="width: 100%;" required>'
		clist += '<option value="">Pilih Inventaris</option>';
		clist += `<option value="STOCK">STOCK</option>`;
		clist += `<option value="PENGADAAN BARU">PENGADAAN BARU</option>`;
		clist += `<option value="PERGANTIAN">PERGANTIAN</option></select></td>`;
		clist += '<td style="vertical-align: middle"><input type="text" name="namabarang[]" class="namabarang" style="width: 100%;"></td>';
		clist += '<td style="vertical-align: middle"><input type="text" name="qty[]" class="qty" style="width: 100%;"></td>';
		clist += '<td style="vertical-align: middle"><input type="text" name="diperlukan[]" class="diperlukan tgl" style="width: 100%;"></td>';
		clist += '<td style="vertical-align: middle"><input type="text" name="keterangan[]" class="keterangan" style="width: 100%;"></td></tr>';

		$(".sys_table").find('tbody').append(clist);
		formatDate();
    });

	$('.tgl').datepicker({
		changeMonth: true,
		changeYear: true,
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true
	})
	.css({"cursor":"pointer", "background":"white"});

	$('.keperluanModal').select2({
		theme: "bootstrap",
		width: '100%',
		dropdownParent: $('#addMintaModal')
	});
	$('.bagianModal').select2({
		theme: "bootstrap",
		width: '100%',
		dropdownParent: $('#addMintaModal')
	});
	$('.mainModal').select2({
		theme: "bootstrap",
		width: '100%',
		dropdownParent: $('#addMintaModal')
	});
	$('.subModal').select2({
		theme: "bootstrap",
		width: '100%',
		dropdownParent: $('#addMintaModal')
	});
	$('.lineModal').select2({
		theme: "bootstrap",
		width: '100%',
		dropdownParent: $('#addMintaModal')
	});
	$('.itemModal').select2({
		theme: "bootstrap",
		width: '100%',
		dropdownParent: $('#addMintaModal')
	});
	$('#priority').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.desimal').autoNumeric('init',{mDec:2, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});

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
			reindexTable();
        });
    });

	function reindexTable() {
		$("#table-add-mr tr").each(function(index) {
			if (index > 0) {
				$(this).find("td:first").html(`<td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a> ${index}</td>`);
			}
		});
	}

    $(document).on('change', '.keperluanModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $("#bagianModal");
		$.post(_url + 'permintaanbarang/render-bagian/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$("#bagianModal").trigger("change");
		});
    });

	$(document).on('change', '.bagianModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $("#mainModal");
		$.post(_url + 'permintaanbarang/render-main/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$("#mainModal").trigger("change");
		});
    });

	$(document).on('change', '.mainModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $("#subModal");
		$.post(_url + 'permintaanbarang/render-sub/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$("#subModal").trigger("change");
		});
    });

	$(document).on('change', '.subModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $("#lineModal");
		$.post(_url + 'permintaanbarang/render-line/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$("#lineModal").trigger("change");
		});
    });

	$(document).on('change', '.lineModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $("#itemModal");
		var nama_bagian = $("#namaBagianModal");
		$.post(_url + 'permintaanbarang/render-inv_item/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			nama_bagian.val(obj.nama_bagian);
			item.html(obj.opt);
			$("#itemModal").trigger("change");
		});
    });

    $(document).on('change', '.itemModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var merk = $("#merkModal");
		var tipe = $("#tipeModal");
		var spesifikasi = $("#spesifikasiModal");
		var satuan = $("#satuanModal");
		var nama_item = $("#namaItemModal");
		$.post(_url + 'permintaanbarang/render-itemstock/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			merk.val(obj.merk);
			tipe.val(obj.tipe);
			spesifikasi.val(obj.spesifikasi);
			satuan.val(obj.satuan);
			nama_item.val(obj.nama_item);
		});
    });

	// $(document).on('click', '.detail-bagian', function(e) {
	// 	e.preventDefault();
	// 	var _url = $("#_url").val();
	// 	var kode = $(this).attr('value');
	// 	$.post(_url + 'permintaanbarang/render-detail-bagian/', {
	// 		kode: kode,
	// 	})
	// 	.done(function (data) {
	// 		var obj = jQuery.parseJSON(data);
	// 		var template = '<table style="width:100%"><tr><td><b>Detail Bagian</b><td></tr><tr><td style="width:30%">Bagian</td>';
	// 		template += '<td>: '+ obj.bagian +'</td></tr>';
	// 		template += '<tr><td>Main Data</td>';
	// 		template += '<td>: '+ obj.main +'</td></tr>';
	// 		template += '<tr><td>Sub Data</td>';
	// 		template += '<td>: '+ obj.sub +'</td></tr>';
	// 		template += '<tr><td>Line Data</td>';
	// 		template += '<td>: '+ obj.line +'</td></tr>';
	// 		bootbox.alert(template, function () {
	// 			console.log('This was logged in the callback!');
	// 		});
	// 	});
	// });

	// $(document).on('click', '.detail-itemstock', function(e) {
	// 	e.preventDefault();
	// 	var _url = $("#_url").val();
	// 	var kode = $(this).attr('value');
	// 	var xx = new Intl.NumberFormat('de-DE');
	// 	$.post(_url + 'itemstock/render-detail-itemstock/', {
	// 		kode: kode,
	// 	})
	// 	.done(function (data) {
	// 		var obj = jQuery.parseJSON(data);
	// 		var template = '<table style="width:100%"><tr><td><b>Detail Item Stock</b><td></tr><tr><td style="width:30%">Kode Item Stock</td>';
	// 		template += '<td>: '+ kode +'</td></tr>';
	// 		template += '<tr><td>Nama Item Stock</td>';
	// 		template += '<td>: '+ obj.nama +'</td></tr>';
	// 		template += '<tr><td>Merk</td>';
	// 		template += '<td>: '+ obj.merk +'</td></tr>';
	// 		template += '<tr><td>Tipe</td>';
	// 		template += '<td>: '+ obj.tipe +'</td></tr>';
	// 		template += '<tr><td>.</td></tr><tr><td><b>Detail Satuan</b><td>';
	// 		template += '<tr><td>Satuan</td>';
	// 		template += '<td>: '+ obj.satuan +'</td></tr>';
	// 		template += '<tr><td>Spesifikasi</td>';
	// 		template += '<td>: '+ obj.spesifikasi +'</td></tr>';
	// 		template += '<tr><td>Quantity Min</td>';
	// 		template += '<td>: '+ obj.qtymin.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</td></tr>';
	// 		template += '<tr><td>Quantity Max</td>';
	// 		template += '<td>: '+ obj.qtymax.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</td></tr>';
	// 		template += '<tr><td>Jumlah per Satuan</td>';
	// 		template += '<td>: '+ xx.format(obj.jumlahpersatuan) + ' / ' + obj.satuanharga + '</td></tr>';
	// 		template += '<tr><td>Reorder Time</td>';
	// 		template += '<td>: '+ obj.reorder +' Hari</td></tr>';
	// 		bootbox.alert(template, function () {
	// 			console.log('This was logged in the callback!');
	// 		});
	// 	});
	// });

	$(document).on('click', '#submitAddMintaBarang', function(e) {
		// var opt = $('#opt').html();
		var keperluan = $('#keperluanModal').val();
		// var bagian = $('#bagianModal').val();
		// var nama_bagian = $('#namaBagianModal').val();
		// var main = $('#mainModal').val();
		// var sub = $('#subModal').val();
		// var line = $('#lineModal').val();
		// var item = $('#itemModal').val();
		// var nama_item = $('#namaItemModal').val();
		var namabarang = $('#namabarangModal').val();
		var qty = parseInt($('#qtyModal').val());
		var diperlukan = $('#diperlukanModal').val();
		var keterangan = $('#keteranganModal').val();
		var error = '';

		if(keperluan == '')
			error += 'Keperluan Tidak Boleh Kosong <br>';
		if(namabarang == '')
			error += 'Nama Barang Tidak Boleh Kosong <br>';
		// if(bagian == '')
		// 	error += 'Bagian Tidak Boleh Kosong <br>';
		// if(main == '')
		// 	error += 'Main Data Tidak Boleh Kosong <br>';
		// if(sub == '')
		// 	error += 'Sub Data Tidak Boleh Kosong <br>';
		// if(line == '')
		// 	error += 'Line Data Tidak Boleh Kosong <br>';
		// if(item == '')
		// 	error += 'Item Stock Tidak Boleh Kosong <br>';
		if(typeof(parseInt(qty)) !== "number")
			error += 'Qty Request Harus Berupa Angka <br>';
		else if(qty == '' || qty == 0)
			error += 'Qty Request Tidak Boleh Kosong <br>';
		if(diperlukan == '')
			error += 'Tanggal Diperlukan Tidak Boleh Kosong <br>';
		if(keterangan == '')
			error += 'Keterangan Tidak Boleh Kosong <br>';

		if(error != ''){
			var body = $(".modal");
			body.animate({scrollTop:0}, '50', 'swing');
			$("#emsgModal").attr('style',  'background-color:#e46f61');
			$("#emsgModalbody").html(error);
			$("#emsgModal").show('slow');
			jQuery('#emsgModalbody').animate({
					scrollTop: jQuery('#emsgModal').scrollTop()-150
				}, 500);
			$("#emsgModal").delay(5200).fadeOut(500);
		} else {
			var clist = '<tr><td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
			clist += '<td style="vertical-align: middle"><select name="keperluan[]" class="form-control keperluan" value="' + keperluan + '" style="width: 100%;" required>'
			// clist += '<option value="">Pilih Inventaris</option>';
			clist += `<option value="STOCK" ${keperluan === "STOCK" ? "selected": ""}>STOCK</option>`;
			clist += `<option value="PENGADAAN BARU" ${keperluan === "PENGADAAN BARU" ? "selected": ""}>PENGADAAN BARU</option>`;
			clist += `<option value="PERGANTIAN" ${keperluan === "PERGANTIAN" ? "selected": ""}>PERGANTIAN</option></select></td>`;
			// clist += '<td><input type="text" name="keperluan[]" class="keperluan" value="'+ keperluan +'" style="width: 100%;"></td>';
			// clist += '<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="'+ bagian +'"></td>';
			// clist += '<td style="display:none;"><input type="text" name="main[]" class="main" value="'+ main +'"></td>';
			// clist += '<td style="display:none;"><input type="text" name="sub[]" class="sub" value="'+ sub +'"></td>';
			// clist += '<td style="display:none;"><input type="text" name="line[]" class="line" value="'+ line +'"></td>';
			// clist += '<td><a href="#" class="detail-bagian" value="'+ line +'">'+ nama_bagian +'</a></td>';
			// clist += '<td style="display:none;"><input type="text" name="item[]" class="item" value="'+ item +'" readonly></td>';
			// clist += '<td><a href="#" class="detail-itemstock" value="'+ item +'">'+ nama_item +'</a></td>';
			clist += '<td style="vertical-align: middle"><input type="text" name="namabarang[]" class="namabarang" value="'+ namabarang +'" style="width: 100%;"></td>';
			clist += '<td style="vertical-align: middle"><input type="text" name="qty[]" class="qty" value='+ qty +' style="width: 100%;"></td>';
			clist += '<td style="vertical-align: middle"><input type="text" name="diperlukan[]" class="diperlukan tgl" value="'+ diperlukan +'" style="width: 100%;"></td>';
			clist += '<td style="vertical-align: middle"><input type="text" name="keterangan[]" class="keterangan" value="'+ keterangan +'" style="width: 100%;"></td>';
			$(".sys_table").find('tbody')
				.append(clist);
			$("#addMintaModal").modal('hide');

			$('#keperluanModal').val("").trigger("change");
			$('#namabarangModal').val("");
			$('#qtyModal').val(0);
			$('#diperlukanModal').val("");
			$('#keteranganModal').val("");

			formatDate();

			// $('#qtyModal').val(0);
			// $('#diperlukanModal').val('');
			// $('#keteranganModal').val('');
			// $("#bagianModal").trigger("change");
			// var kode = '';
			// var _url = $("#_url").val();
			// var item = $("#bagianModal");
			// $.post(_url + 'permintaanbarang/render-bagian/', {
			// 	kode: kode,
			// })
			// .done(function (data) {
			// 	var obj = jQuery.parseJSON(data);
			// 	item.html(obj.opt);
			// 	$('#qtyModal').val(0);
			// 	$('#diperlukanModal').val('');
			// 	$('#keteranganModal').val('');
			// 	$("#bagianModal").trigger("change");
			// });
		}
	});

	$("#submit").click(function (e) {
		e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
		var keperluan = [];
		var namabarang = [];
		// var bagian = [];
		// var main = [];
		// var sub = [];
		// var line = [];
		// var item = [];
		var qty = [];
		var diperlukan = [];
		var keterangan = [];

		$.each($("input[name='chk[]']"), function(){
			keperluan.push($(this).closest('tr').find("select[name='keperluan[]'] option").filter(':selected').val());
			namabarang.push($(this).closest('tr').find("input[name='namabarang[]']").val());
			// item.push($(this).closest('tr').find("input[name='item[]']").val());
			// bagian.push($(this).closest('tr').find("input[name='bagian[]']").val());
			// main.push($(this).closest('tr').find("input[name='main[]']").val());
			// sub.push($(this).closest('tr').find("input[name='sub[]']").val());
			// line.push($(this).closest('tr').find("input[name='line[]']").val());
			qty.push(parseInt($(this).closest('tr').find("input[name='qty[]']").val()));
			diperlukan.push($(this).closest('tr').find("input[name='diperlukan[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
		});

		// var event_mrjs=$("#event_mrs").val();

		// if(event_mrjs=='edit'){
		// 	var $data = new FormData();
		// 	$data.append('keperluan', keperluan);
		// 	$data.append('qty', qty);
		// 	$data.append('item', item);
		// 	// $data.append('bagian', bagian);
		// 	$data.append('namabarang',namabarang);
		// 	// $data.append('main', main);
		// 	// $data.append('sub', sub);
		// 	// $data.append('line', line);
		// 	$data.append('diperlukan', diperlukan);
		// 	$data.append('keterangan', keterangan);
		// 	$data.append('idjs',$('#idtpl').val());

		// 	bootbox.confirm('Apakah anda yakin untuk menyimpan perubahan Permintaan Barang ?', function(result) {
		// 		if(result){
		// 			bootbox.dialog({
		// 				message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
		// 				closeButton: false
		// 			});
		// 			$.ajax({
		// 				url: _url + 'permintaanbarang/edit-mintabarang-post/',
		// 				type: 'POST',
		// 				data: $data,
		// 				cache: false,
		// 				processData: false,
		// 				contentType: false,
		// 				success: function(data, textStatus, jqXHR)
		// 				{
		// 					console.log("Berhasil1");
		// 					console.log(data);
		// 					var obj = jQuery.parseJSON(data);
		// 					console.log("Berhasil2");
		// 					if ($.isNumeric(obj.dataval)) {
		// 						$('.overlay').hide();
		// 						var body = $("html, body");
		// 						bootbox.alert({
		// 							message: obj.msg,
		// 							backdrop: true,
		// 							timeout : 2000,
		// 							callback: function(){
		// 								window.location = _url + 'permintaanbarang/list-mintabarang/Permintaan Barang Berhasil Ditambahkan';
		// 							}
		// 						});
		// 					} else {
		// 						$('#submit').removeAttr('disabled');
		// 						$('.overlay').hide();
		// 						var body = $("html, body");
		// 						body.animate({scrollTop:0}, '50', 'swing');
		// 						$("#emsg").attr('style',  'background-color:#e46f61');
		// 						$("#emsgbody").html(obj.msg);
		// 						$("#emsg").show('slow');
		// 						jQuery('#emsgbody').animate({
		// 								scrollTop: jQuery('#emsg').scrollTop()-150
		// 							}, 500);
		// 						$("#emsg").delay(5200).fadeOut(500);
		// 						bootbox.hideAll()
		// 					}
		// 				},
		// 				error: function(jqXHR, textStatus, errorThrown)
		// 				{
		// 					if (jqXHR.status === 0) {
		// 						msg = 'Not connect.\n Verify Network.';
		// 					} else if (jqXHR.status == 404) {
		// 						msg = 'Requested page not found. [404]';
		// 					} else if (jqXHR.status == 500) {
		// 						msg = 'Internal Server Error [500].';
		// 					} else if (exception === 'parsererror') {
		// 						msg = 'Requested JSON parse failed.';
		// 					} else if (exception === 'timeout') {
		// 						msg = 'Time out error.';
		// 					} else if (exception === 'abort') {
		// 						msg = 'Ajax request aborted.';
		// 					} else {
		// 						msg = 'Uncaught Error.\n' + jqXHR.responseText;
		// 					}
		// 					alert(msg);
		// 				}
		// 			});
		// 		} else {
		// 			$('#submit').removeAttr('disabled');
		// 		}
		// 	});
		// }
		// else {
			var $data = new FormData();
			$data.append('keperluan', keperluan);
			$data.append('namabarang', namabarang);
			$data.append('qty', qty);
			// $data.append('item', item);
			$data.append('diperlukan', diperlukan);
			$data.append('keterangan', keterangan);
			// $data.append('unitkerja', $('#unitkerja').val());
			// $data.append('nomor', $('#nomor').val());
			$data.append('tgl', $('#tgl').val());

			bootbox.confirm('Apakah anda yakin untuk membuat Permintaan Barang ?', function(result) {
				if(result){
					bootbox.dialog({
						message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
						closeButton: false
					});
					$.ajax({
						url: _url + 'permintaanbarang/add-mintabarang-post/',
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
										window.location = _url + 'permintaanbarang/list-mintabarang/Permintaan Barang Berhasil Ditambahkan';
									}
								});
							} else {
								$('#submit').removeAttr('disabled');
								$('.overlay').hide();
								var body = $("html, body");
								body.animate({scrollTop:0}, '50', 'swing');
								$("#emsg").attr('style',  'background-color:#e46f61');
								$("#emsgbody").html(obj.msg);
								$("#emsg").show('slow');
								jQuery('#emsgbody').animate({
										scrollTop: jQuery('#emsg').scrollTop()-150
									}, 500);
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
					$('#submit').removeAttr('disabled');
				}
			});
		// }
	});

	function formatDate() {
		$('.tgl').datepicker({
			changeMonth: true,
			changeYear: true,
			format: 'dd-mm-yyyy',
			autoclose:true,
			todayHighlight:true
		})
		.css({"cursor":"pointer", "background":"white"});
	}
});