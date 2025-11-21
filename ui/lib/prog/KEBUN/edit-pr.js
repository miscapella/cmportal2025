$(document).ready(function () {
	$('#emsg').hide();
	$('#emsgModal').hide();
	$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	$('.desimal').autoNumeric('init',{mDec:2, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	$(document).on('click', '.detail-bagian', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		$.post(_url + 'pembelian/render-detail-bagian/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			var template = '<table style="width:100%"><tr><td><b>Detail Bagian</b><td></tr><tr><td style="width:30%">Bagian</td>';
			if(obj.bagian == ''){
				template += '<td>: STOCK</td></tr>';
				template += '<tr><td>Main Data</td>';
				template += '<td>: STOCK</td></tr>';
				template += '<tr><td>Sub Data</td>';
				template += '<td>: STOCK</td></tr>';
				template += '<tr><td>Line Data</td>';
				template += '<td>: STOCK</td></tr>';
			} else {
				template += '<td>: '+ obj.bagian +'</td></tr>';
				template += '<tr><td>Main Data</td>';
				template += '<td>: '+ obj.main +'</td></tr>';
				template += '<tr><td>Sub Data</td>';
				template += '<td>: '+ obj.sub +'</td></tr>';
				template += '<tr><td>Line Data</td>';
				template += '<td>: '+ obj.line +'</td></tr>';
			}
			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
		});
	});

	$(document).on('click', '.detail-itemstock', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		var xx = new Intl.NumberFormat('de-DE');
		$.post(_url + 'itemstock/render-detail-itemstock/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			var template = '<table style="width:100%"><tr><td><b>Detail Item Stock</b><td></tr><tr><td style="width:30%">Kode Item Stock</td>';
			template += '<td>: '+ kode +'</td></tr>';
			template += '<tr><td>Nama Item Stock</td>';
			template += '<td>: '+ obj.nama +'</td></tr>';
			template += '<tr><td>Merk</td>';
			template += '<td>: '+ obj.merk +'</td></tr>';
			template += '<tr><td>Tipe</td>';
			template += '<td>: '+ obj.tipe +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Satuan</b><td>';
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
			template += '<tr><td>Reorder Time</td>';
			template += '<td>: '+ obj.reorder +' Hari</td></tr>';
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
			var template = '<table style="width:100%"><tr><td><b>Detail Supplier</b><td></tr><tr><td style="width:30%">Kode Supplier</td>';
			template += '<td>: '+ kode +'</td></tr>';
			template += '<tr><td>Nama Supplier</td>';
			template += '<td>: '+ obj.nama +'</td></tr>';
			template += '<tr><td>Bidang</td>';
			template += '<td>: '+ obj.bidang +'</td></tr>';
			template += '<tr><td>Foto Toko</td>';
			template += '<td>: '+ obj.foto_toko +'</td></tr>';
			template += '<tr><td>Telp Toko</td>';
			split_telp_toko = obj.telp_toko.split("|");
			template += '<td>: +'+ split_telp_toko[0] +' ('+ split_telp_toko[1] +') '+ split_telp_toko[2] +'</td></tr>';
			template += '<tr><td>Hp Toko</td>';
			split_hp_toko = obj.hp_toko.split("|");
			template += '<td>: +'+ split_hp_toko[0] +' '+ split_hp_toko[1] +'</td></tr>';
			template += '<tr><td>Email</td>';
			template += '<td>: '+ obj.email +'</td></tr>';
			template += '<tr><td>Website</td>';
			template += '<td>: '+ obj.website + '</td></tr>';
			template += '<tr><td>Tanggal Mulai Kerjasama</td>';
			template += '<td>: '+ obj.tgl_mulai_kerjasama +'</td></tr>';
			template += '<tr><td>Lama Pembayaran</td>';
			template += '<td>: '+ obj.lama_pembayaran +' Hari</td></tr>';
			template += '<tr><td>Rekomendasi Dari</td>';
			template += '<td>: '+ obj.rekomendasi_dari +'</td></tr>';
			template += '<tr><td>NIB</td>';
			template += '<td>: '+ obj.nib +'</td></tr>';
			template += '<tr><td>File NIB</td>';
			template += '<td>: '+ obj.file_nib +'</td></tr>';
			template += '<tr><td>NPWP</td>';
			template += '<td>: '+ obj.npwp +'</td></tr>';
			template += '<tr><td>File NPWP</td>';
			template += '<td>: '+ obj.file_npwp +'</td></tr>';
			template += '<tr><td>File Kontrak</td>';
			template += '<td>: '+ obj.file_kontrak +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Alamat</b><td>';
			template += '<tr><td>Negara</td>';
			template += '<td>: '+ obj.negara +'</td></tr>';
			template += '<tr><td>Provinsi</td>';
			template += '<td>: '+ obj.provinsi +'</td></tr>';
			template += '<tr><td>Kota</td>';
			template += '<td>: '+ obj.kota +'</td></tr>';
			template += '<tr><td>Kelurahan</td>';
			template += '<td>: '+ obj.kelurahan +'</td></tr>';
			template += '<tr><td>Kecamatan</td>';
			template += '<td>: '+ obj.kecamatan +'</td></tr>';
			template += '<tr><td>Kotamadya / Kabupaten</td>';
			template += '<td>: '+ obj.kotamadya +'</td></tr>';
			template += '<tr><td>RT / RW</td>';
			template += '<td>: '+ obj.rtrw +'</td></tr>';
			template += '<tr><td>Alamat</td>';
			template += '<td>: '+ obj.alamat +'</td></tr>';
			template += '<tr><td>Nomor Gedung</td>';
			template += '<td>: '+ obj.nomor_gedung +'</td></tr>';
			template += '<tr><td>Kode Pos</td>';
			template += '<td>: '+ obj.kode_pos +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Contact</b><td>';
			template += '<tr><td>File Ktp</td>';
			template += '<td>: '+ obj.file_ktp +'</td></tr>';
			template += '<tr><td>Nama Pemilik</td>';
			template += '<td>: '+ obj.nama_pemilik +'</td></tr>';
			template += '<tr><td>Hp Pemilik</td>';
			split_hp_pemilik = obj.hp_pemilik.split("|");
			template += '<td>: +'+ split_hp_pemilik[0] +' '+ split_hp_pemilik[1] +'</td></tr>';
			template += '<tr><td>Nama Emergency</td>';
			template += '<td>: '+ obj.nama_emergency +'</td></tr>';
			template += '<tr><td>Hp Emergency</td>';
			split_hp_emergency = obj.hp_emergency.split("|");
			template += '<td>: +'+ split_hp_emergency[0] +' '+ split_hp_emergency[1] +'</td></tr>';
			template += '<tr><td>Nama Contact</td>';
			template += '<td>: '+ obj.nama_contact +'</td></tr>';
			template += '<tr><td>Hp Contact</td>';
			split_hp_contact = obj.hp_contact.split("|");
			template += '<td>: +'+ split_hp_contact[0] +' '+ split_hp_contact[1] +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Rekening</b><td>';
			template += '<tr><td>Bank</td>';
			template += '<td>: '+ obj.bank +'</td></tr>';
			template += '<tr><td>No Rekening</td>';
			template += '<td>: '+ obj.no_rekening +'</td></tr>';
			template += '<tr><td>AN Rekening</td>';
			template += '<td>: '+ obj.an_rekening +'</td></tr>';
			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
		});
	});
	
	$('.keperluanModal').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.bagianModal').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.mainModal').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.subModal').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.lineModal').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('.itemModal').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('#priority').select2({
		theme: "bootstrap",
		width: '100%'
	});
	
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
	$('.tgl').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
	}).css({"cursor":"pointer", "background":"white"});
	$(".detail-supplier").click(function (e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
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

    $(document).on('change', '.keperluanModal', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var item = $("#bagianModal");
		$.post(_url + 'pembelian/render-bagian/', {
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
		$.post(_url + 'pembelian/render-main/', {
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
		$.post(_url + 'pembelian/render-sub/', {
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
		$.post(_url + 'pembelian/render-line/', {
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
		$.post(_url + 'pembelian/render-inv_item/', {
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
		$.post(_url + 'pembelian/render-itemstock/', {
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

	$(document).on('click', '#submitAddPR', function(e) {
		var opt = $('#opt').html();
		var keperluan = $('#keperluanModal').val();
		var bagian = $('#bagianModal').val();
		var nama_bagian = $('#namaBagianModal').val();
		var main = $('#mainModal').val();
		var sub = $('#subModal').val();
		var line = $('#lineModal').val();
		var item = $('#itemModal').val();
		var nama_item = $('#namaItemModal').val();
		var qty = $('#qtyModal').val();
		var diperlukan = $('#diperlukanModal').val();
		var keterangan = $('#keteranganModal').val();
		var error = '';

		if(keperluan == '')
			error += 'Keperluan Tidak Boleh Kosong <br>';
		if(bagian == '')
			error += 'Bagian Tidak Boleh Kosong <br>';
		if(main == '')
			error += 'Main Data Tidak Boleh Kosong <br>';
		if(sub == '')
			error += 'Sub Data Tidak Boleh Kosong <br>';
		if(line == '')
			error += 'Line Data Tidak Boleh Kosong <br>';
		if(item == '')
			error += 'Item Stock Tidak Boleh Kosong <br>';
		if(qty == '')
			error += 'Qty Request Tidak Boleh Kosong <br>';
		if(qty == 0)
			error += 'Qty Request Tidak Boleh 0 <br>';
		if(diperlukan == '')
			error += 'Tanggal Diperlukan Tidak Boleh Kosong <br>';

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
			var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
			clist += '<td><input type="text" name="keperluan[]" class="keperluan" value="'+ keperluan +'" readonly></td>';
			clist += '<td style="display:none;"><input type="text" name="bagian[]" class="bagian" value="'+ bagian +'"></td>';
			clist += '<td style="display:none;"><input type="text" name="main[]" class="main" value="'+ main +'"></td>';
			clist += '<td style="display:none;"><input type="text" name="sub[]" class="sub" value="'+ sub +'"></td>';
			clist += '<td style="display:none;"><input type="text" name="line[]" class="line" value="'+ line +'"></td>';
			clist += '<td><a href="#" class="detail-bagian" value="'+ line +'">'+ nama_bagian +'</a></td>';
			clist += '<td style="display:none;"><input type="text" name="item[]" class="item" value="'+ item +'" readonly></td>';
			clist += '<td><a href="#" class="detail-itemstock" value="'+ item +'">'+ nama_item +'</a></td>';
			clist += '<td><input type="text" name="qty[]" class="qty amount" value='+ qty +'></td>';
			clist += '<td><input type="text" name="diperlukan[]" class="diperlukan tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" value="'+ diperlukan +'"></td>';
			clist += '<td><input type="text" name="keterangan[]" class="keterangan" value="'+ keterangan +'"></td>';
			$(".sys_table").find('tbody')
				.append(clist);
			$("#addPRModal").modal('hide');
			var kode = '';
			var _url = $("#_url").val();
			var item = $("#bagianModal");
			$.post(_url + 'pembelian/render-bagian/', {
				kode: kode,
			})
			.done(function (data) {
				var obj = jQuery.parseJSON(data);
				item.html(obj.opt);
				$('#qtyModal').val(0);
				$('#diperlukanModal').val('');
				$('#keteranganModal').val('');
				$("#bagianModal").trigger("change");
			});
		}
		$('.tgl').datepicker({ 
			changeMonth: true, 
			changeYear: true, 
			format: 'dd-mm-yyyy',
			autoclose:true,
			todayHighlight:true,
		}).css({"cursor":"pointer", "background":"white"});
		$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
	});

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
		var keperluan = [];
		var item = [];
		var bagian = [];
		var main = [];
		var sub = [];
		var line = [];
		var qty = [];
		var diperlukan = [];
		var keterangan = [];
		$.each($("input[name='chk[]']:checked"), function(){
			keperluan.push($(this).closest('tr').find("input[name='keperluan[]']").val());
			qty.push($(this).closest('tr').find("input[name='qty[]']").val());
			item.push($(this).closest('tr').find("input[name='item[]']").val());
			bagian.push($(this).closest('tr').find("input[name='bagian[]']").val());
			main.push($(this).closest('tr').find("input[name='main[]']").val());
			sub.push($(this).closest('tr').find("input[name='sub[]']").val());
			line.push($(this).closest('tr').find("input[name='line[]']").val());
			diperlukan.push($(this).closest('tr').find("input[name='diperlukan[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
		});
		var $data = new FormData();
		$data.append('keperluan', keperluan);
		$data.append('qty', qty);
		$data.append('item', item);
		$data.append('bagian', bagian);
		$data.append('main', main);
		$data.append('sub', sub);
		$data.append('line', line);
		$data.append('diperlukan', diperlukan);
		$data.append('keterangan', keterangan);
		$data.append('idate', $('#idate').val());
		$data.append('priority', $('#priority').val());
		$data.append('no_pr', $('#no_pr').val());
		bootbox.confirm('Apakah anda yakin untuk mengubah PR ?', function(result) {
			if(result){
				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});
				$.ajax({
					url: _url + 'pembelian/edit-pr-post/',
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
									window.location = _url + 'pembelian/list-pr-pending/PR Berhasil Diubah';
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
							bootbox.hideAll();
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