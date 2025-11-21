$(document).ready(function () {
	var _url = $("#_url").val();
	var opt = $('#opt').html();
	$('#emsgModal').hide();
	$("#add-itemstock-modal").modal('hide');

	$('#add-itemstock').on("click", function (e) {
		e.preventDefault();
	});

	$('#direksi').select2({
		theme: "bootstrap",
		width: "100%"
	});

	$('#referensi_url').select2({
		theme: "bootstrap",
		width: "100%"
	});

	$('#emsg').hide();

	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

	// Add PR
    $('#add').on('click', function(e) {
		e.preventDefault();
		addPR();
	});

	// Add PR by UR
	$("#add-ur").on("click", function(e) {
		e.preventDefault();
		var kode = $("#referensi_url").val();

		$.post(_url + 'serverside/load_ur/', {
			kode: kode,
		})
		.done(function (data) {
			const obj = jQuery.parseJSON(data);
			for (let ur of obj) {
				addPR(ur);
			}
		});
    });

	// Change Item Stock
    $(document).on('change', '.kd_item', function(e) {
		var kode = $(this).val();
		var contains_ur = $(this).hasClass("ur");
		var namabarang = $(this).closest('tr').find(".namabarang");
		var merk = $(this).closest('tr').find(".merk");
		var tipe = $(this).closest('tr').find(".tipe");
		var spesifikasi = $(this).closest('tr').find(".spesifikasi");
		$.post(_url + 'inventaris/render-itemstock/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			!contains_ur && namabarang.val(obj.nm_item);
			merk.val(obj.merk);
			tipe.val(obj.tipe);
			spesifikasi.val(obj.spesifikasi);
		});
    });

	// Exclude ppn clicked
	$(document).on('change', '.exclude_ppn', function() {
		const exclude = $(this).prop('checked');
		const input = $(this).parent().parent().children().first();
		input.prop('disabled', exclude);
	});

	// Hapus PR
    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
			reindexTable();
			reloadHargaTotal();
        });
    });

	function reindexTable() {
		$("#table-pr tr").each(function(index) {
			if (index > 0) {
				$(this).find("td:first").html(`<td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a> ${index}</td>`);
			}
		});
	}

	// Quantity changes
	$(document).on('change', '.qty_req', function() {
		reloadHargaTotal();
	});

	// Supplier pilihan changes
	$(document).on('change', '.supplierpilihan', function() {
		reloadHargaTotal();
	});

	// Harga changes
	$(document).on('change', '.harga', function() {
        const parent = $(this).closest('td');
		const harga = +parent.find('.harga').val().replaceAll('.', '') ?? 0;
		const ppn = +parent.prev().find('.ppn').val() ?? 0;
		const exclude = parent.prev().find('.exclude_ppn').prop('checked');

		const input = parent.next().find('.harga_ppn');
		input.val(exclude ? harga : harga + (harga * ppn / 100));

		reloadHargaTotal();
	});

	// Hitung ppn
	$(document).on('change', '.exclude_ppn, .ppn', function() {
        const parent = $(this).closest('td');
		const exclude = parent.find('.exclude_ppn').prop('checked');
		const ppn = +parent.find('.ppn').val() ?? 0;
		const harga = +parent.next().find('.harga').val().replaceAll('.', '') ?? 0;

		const input = parent.next().next().find('.harga_ppn');
		input.val(exclude ? harga : harga + (harga * ppn / 100));

		reloadHargaTotal();
    });

	// Save file supplier
	$(document).on('change', '.files', function(e) {
		var fd = new FormData();
		var files = $(this)[0].files;
		var elementId = "#s" + $(this).attr('id');
		if(files.length > 0 ){
			fd.append('file',files[0]);
			$.ajax({
				url: _url + 'permintaan/upload-file/',
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

	// Save PR
	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$(this).attr('disabled','disabled');

		var id = [];
		var max = [];
		var kd_inventaris = [];
		var kd_item = [];
		var qty_req = [];
		var tgl = [];
		var keterangan = [];
		var supplier1 = [];
		var exclude_ppn1 = [];
		var ppn1 = [];
		var hargasupplier1 = [];
		var keterangansupplier1 = [];
		var garansi_bulan_supplier1 = [];
		var garansi_hari_supplier1 = [];
		var filesupplier1 = [];
		var supplier2 = [];
		var exclude_ppn2 = [];
		var ppn2 = [];
		var hargasupplier2 = [];
		var keterangansupplier2 = [];
		var filesupplier2 = [];
		var garansi_bulan_supplier2 = [];
		var garansi_hari_supplier2 = [];
		var supplier3 = [];
		var exclude_ppn3 = [];
		var ppn3 = [];
		var hargasupplier3 = [];
		var keterangansupplier3 = [];
		var filesupplier3 = [];
		var garansi_bulan_supplier3 = [];
		var garansi_hari_supplier3 = [];
		var supplierpilihan = [];
		var list_ur = [];
		$.each($("input[name='chk[]']:checked"), function(){
			id.push($(this).closest('tr').find("input[name='id_ur_detail[]']").val());
			max.push($(this).closest('tr').find("input[name='max_ur[]']").val());
			kd_inventaris.push($(this).closest('tr').find("select[name='kd_inventaris[]'] option").filter(':selected').val());
			kd_item.push($(this).closest('tr').find("select[name='kd_item[]'] option").filter(':selected').val());
			qty_req.push(parseInt($(this).closest('tr').find("input[name='qty_req[]']").val()));
			tgl.push($(this).closest('tr').find("input[name='tgl[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
			supplier1.push($(this).closest('tr').find("select[name='kode_supplier1[]'] option").filter(':selected').val());
			exclude_ppn1.push($(this).closest('tr').find("input[name='exclude_ppn1[]']").prop('checked'));
			ppn1.push($(this).closest('tr').find("input[name='ppn1[]']").val());
			hargasupplier1.push($(this).closest('tr').find("input[name='harga1[]']").val());
			keterangansupplier1.push($(this).closest('tr').find("input[name='keterangan_supplier1[]']").val());
			garansi_bulan_supplier1.push($(this).closest('tr').find("input[name='garansi_bulan_supplier1[]']").val());
			garansi_hari_supplier1.push($(this).closest('tr').find("input[name='garansi_hari_supplier1[]']").val());
			filesupplier1.push($(this).closest('tr').find("input[name='sfile_supplier1[]']").val());
			supplier2.push($(this).closest('tr').find("select[name='kode_supplier2[]'] option").filter(':selected').val());
			exclude_ppn2.push($(this).closest('tr').find("input[name='exclude_ppn2[]']").prop('checked'));
			ppn2.push($(this).closest('tr').find("input[name='ppn2[]']").val());
			hargasupplier2.push($(this).closest('tr').find("input[name='harga2[]']").val());
			keterangansupplier2.push($(this).closest('tr').find("input[name='keterangan_supplier2[]']").val());
			garansi_bulan_supplier2.push($(this).closest('tr').find("input[name='garansi_bulan_supplier2[]']").val());
			garansi_hari_supplier2.push($(this).closest('tr').find("input[name='garansi_hari_supplier2[]']").val());
			filesupplier2.push($(this).closest('tr').find("input[name='sfile_supplier2[]']").val());
			supplier3.push($(this).closest('tr').find("select[name='kode_supplier3[]'] option").filter(':selected').val());
			exclude_ppn3.push($(this).closest('tr').find("input[name='exclude_ppn3[]']").prop('checked'));
			ppn3.push($(this).closest('tr').find("input[name='ppn3[]']").val());
			hargasupplier3.push($(this).closest('tr').find("input[name='harga3[]']").val());
			keterangansupplier3.push($(this).closest('tr').find("input[name='keterangan_supplier3[]']").val());
			garansi_bulan_supplier3.push($(this).closest('tr').find("input[name='garansi_bulan_supplier3[]']").val());
			garansi_hari_supplier3.push($(this).closest('tr').find("input[name='garansi_hari_supplier3[]']").val());
			filesupplier3.push($(this).closest('tr').find("input[name='sfile_supplier3[]']").val());
			supplierpilihan.push($(this).closest('tr').find("input[type='radio']:checked").val());
			$(this).closest('tr').find("input[name='namabarang[]']").hasClass('ur') &&
			list_ur.push($(this).closest('tr').find("input[name='namabarang[]']").attr('class').split(' ')[2]);
		});

		var $data = new FormData();
		$data.append('id', id);
		$data.append('max', max);
		$data.append('kd_inventaris', kd_inventaris);
		$data.append('kd_item', kd_item);
		$data.append('qty_req', qty_req);
		$data.append('tgl', tgl);
		$data.append('keterangan', keterangan);
		$data.append('idate', $('#idate').val());
		$data.append('supplier1', supplier1);
		$data.append('exclude_ppn1', exclude_ppn1);
		$data.append('ppn1', ppn1);
		$data.append('hargasupplier1', hargasupplier1);
		$data.append('keterangansupplier1', keterangansupplier1);
		$data.append('garansi_bulan_supplier1', garansi_bulan_supplier1);
		$data.append('garansi_hari_supplier1', garansi_hari_supplier1);
		$data.append('filesupplier1', filesupplier1);
		$data.append('supplier2', supplier2);
		$data.append('exclude_ppn2', exclude_ppn2);
		$data.append('ppn2', ppn2);
		$data.append('hargasupplier2', hargasupplier2);
		$data.append('keterangansupplier2', keterangansupplier2);
		$data.append('garansi_bulan_supplier2', garansi_bulan_supplier2);
		$data.append('garansi_hari_supplier2', garansi_hari_supplier2);
		$data.append('filesupplier2', filesupplier2);
		$data.append('supplier3', supplier3);
		$data.append('exclude_ppn3', exclude_ppn3);
		$data.append('ppn3', ppn3);
		$data.append('hargasupplier3', hargasupplier3);
		$data.append('keterangansupplier3', keterangansupplier3);
		$data.append('garansi_bulan_supplier3', garansi_bulan_supplier3);
		$data.append('garansi_hari_supplier3', garansi_hari_supplier3);
		$data.append('filesupplier3', filesupplier3);
		$data.append('supplierpilihan', supplierpilihan);
		$data.append('list_ur', list_ur);
		$data.append('dir_pilihan', $('#direksi').val());

		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});

				$.ajax({
					url: _url + 'permintaan/add-pr-post/',
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
							var body = $("html, body");
							bootbox.alert({
								message: obj.msg,
								backdrop: true,
								timeout : 2000,
								callback: function(){
									window.location = _url + 'permintaan/list-pr/';
								}
							});
						} else {
							$('#save').removeAttr('disabled');
							var body = $("html, body");
							body.animate({scrollTop:0}, '50', 'swing');
							$("#emsg").attr('style',  'background-color:#e46f61');
							$("#emsgbody").html(obj.msg);
							$("#emsg").show('slow');
							jQuery('#emsgbody').animate({
									scrollTop: jQuery('#emsg').scrollTop()-150
								}, 500);
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
						//location.reload();
					}
				});
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });

	// Add itemstock
	$(document).on('click', '#submitAddItemstock', function(e) {
		e.preventDefault();
		$('mform').attr('disabled','disabled');

		let nama = $('#nama').val();
		let merek = $('#merek').val();
		let tipe = $('#tipe').val();
		let kategori = $('#kategori').val();
		let spesifikasi = $('#spesifikasi').val();
		let reorder = $('#reorder').val();
		let error = '';

		if (nama == '') error += 'Nama Item Stock tidak boleh kosong <br>';
		if (kategori == '') error += 'Kategori tidak boleh kosong <br>';
		if (parseInt(reorder) < 0) error += 'Reorder Time tidak valid <br>';

		if(error != ''){
			var body = $(".modal");
			body.animate({scrollTop:0}, '50', 'swing');
			$("#emsgModal").attr('style',  'background-color:#e46f61');
			$("#emsgModalbody").html(error);
			$("#emsgModal").show('slow');
			jQuery('#emsgModalbody').animate({
					scrollTop: jQuery('#emsgModal').scrollTop()-150
				}, 500);
			$('mform').attr('disabled',false);
		} else {
			let $data = new FormData();
			$data.append('nama', nama);
			$data.append('merk', merek);
			$data.append('tipe', tipe);
			$data.append('kategori', kategori);
			$data.append('spesifikasi', spesifikasi);
			$data.append('reorder', reorder);

			$.ajax({
				url: _url + 'itemstock/add-post/',
				type: 'POST',
				data: $data,
				cache: false,
				processData: false,
				contentType: false,
				success: function(data, textStatus, jqXHR)
				{
					$('mform').attr('disabled',false);
					if ($.isNumeric(data)) {
						$("#add-itemstock-modal").modal('hide');
						$('#nama').val('');
						$('#merek').val('');
						$('#tipe').val('');
						$('#kategori').val('').trigger("change");
						$('#spesifikasi').val('');
						$('#reorder').val('');

						var body = $("html, body");
						body.animate({scrollTop:0}, '50', 'swing');
						$("#emsg").attr('style',  'background-color:#1AB394;');
						$("#emsgbody").html('Berhasil menambahkan itemstock!');
						$("#emsg").show('slow');
						jQuery('#emsgbody').animate({
							scrollTop: jQuery('#emsg').scrollTop()-150
						}, 500);
					} else {
						$("#emsgModal").attr('style',  'background-color:#e46f61');
						$("#emsgModalbody").html(data);
						$("#emsgModal").show('slow');
						jQuery('#emsgModalbody').animate({
							scrollTop: jQuery('#emsgModal').scrollTop()-150
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

	function addPR(ur=null) {
		let rowCount = $("#table-pr tr").length;

		let formattedDate = '';
		if (ur) {
			const date = new Date(ur[4]);
			const day = String(date.getDate()).padStart(2, '0');
			const month = String(date.getMonth() + 1).padStart(2, '0');
			const year = date.getFullYear();
			formattedDate = `${day}-${month}-${year}`;
		}

		let clist = `<tr><td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a> ${rowCount}`
		clist += `<input type="hidden" name="id_ur_detail[]" class="id_ur_detail ${ur ? 'ur' : ''}" value="${ur ? ur[5] : ''}"/>`;
		clist += `<input type="hidden" name="max_ur[]" class="max_ur ${ur ? 'ur' : ''}" value="${ur ? ur[3] : ''}"/></td>`;
		clist += `<td style="vertical-align: middle"><input type="text" name="namabarang[]" class="namabarang ${ur ? 'ur' : ''} ${ur ? ur[0] : ''}" value="${ur ? ur[1] : ''}" style="background-color: #f7f7f7" readonly></td>`;
		clist += `<td style="vertical-align: middle"><select name="kd_inventaris[]" class="kd_inventaris">${opt}</select></td>`;
		clist += `<td style="vertical-align: middle"><select name="kd_item[]" class="kd_item ${ur ? 'ur' : ''}"><option value="">Pilih Item Stock</option></select></td>`;
		clist += '<td style="vertical-align: middle"><input type="text" name="merk[]" class="merk" style="background-color: #f7f7f7" readonly></td>';
		clist += '<td style="vertical-align: middle"><input type="text" name="tipe[]" class="tipe" style="background-color: #f7f7f7" readonly></td>';
		clist += '<td style="vertical-align: middle"><input type="text" name="spesifikasi[]" class="spesifikasi" style="background-color: #f7f7f7" readonly></td>';
		clist += `<td style="vertical-align: middle"><input type="number" name="qty_req[]" class="qty_req amount" value="${ur ? ur[3] : 0}" min="0"></td>`;
		clist += `<td style="vertical-align: middle"><input type="text" name="tgl[]" class="tgl" value="${ur ? formattedDate : ""}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true"></td>`;
		clist += '<td style="vertical-align: middle"><input type="text" name="keterangan[]" class="keterangan"></td>';
		clist += getSupplier(1) + getSupplier(2) + getSupplier(3);
		clist += '<td style="vertical-align: middle;">';
		clist += `<input type="radio" name="supplierpilihan-${rowCount}" id="supplierpilihan-${rowCount}-1" class="cekbox supplierpilihan" value="1"><label style="font-weight: normal" for="supplierpilihan-${rowCount}-1"> Supplier 1</label><br>`
		clist += `<input type="radio" name="supplierpilihan-${rowCount}" id="supplierpilihan-${rowCount}-2" class="cekbox supplierpilihan" value="2"><label style="font-weight: normal" for="supplierpilihan-${rowCount}-2"> Supplier 2</label><br>`
		clist += `<input type="radio" name="supplierpilihan-${rowCount}" id="supplierpilihan-${rowCount}-3" class="cekbox supplierpilihan" value="3"><label style="font-weight: normal" for="supplierpilihan-${rowCount}-3"> Supplier 3</label><br>`
		clist += '</td>';
		$(".sys_table").find('tbody').append(clist);
		ur && $('.kd_inventaris').last().val(ur[2]).change();

		reloadKeperluan();
		reloadItemStock();
		reloadSupplier();
		reloadHarga();
		reloadTanggal();
	}

	function getSupplier(num) {
		let rowCount = $("#table-pr tr").length;

		let supplier = '<td style="vertical-align: middle;">';
		supplier += `<select name="kode_supplier${num}[]" class="kode_supplier" style="width: 200px;">`;
		supplier += `<option value="">Pilih Supplier ${num}</option></select></td>`;
		supplier += `<td style="vertical-align: middle;">
			<input type="number" name="ppn${num}[]" class="form-control ppn" value="0" style="display: block; margin-top: 5px;">
			<label for="exclude_ppn-${rowCount}-${num}" style="display: block; margin-top: 10px;">
				<input type="checkbox" id="exclude_ppn-${rowCount}-${num}" name="exclude_ppn${num}[]" class="exclude_ppn" style="vertical-align: middle;"> Exclude Ppn
			</label>
		</td>`;
		supplier += `<td style="vertical-align: middle;"><input type="text" name="harga${num}[]" class="harga amount"></td>`;
		supplier += `<td style="vertical-align: middle;"><input type="text" name="harga_ppn${num}[]" class="harga_ppn amount" readonly style="pointer-events: none;"></td>`;
		supplier += `<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier${num}[]" class="keterangan"></td>`;
		supplier += `<td style="vertical-align: middle;"><input type="file" id="file_supplier-${rowCount}-${num}" name="file_supplier${num}[]" class="files"><input type="text" id="sfile_supplier-${rowCount}-${num}" name="sfile_supplier${num}[]" style="display: none;"></td>`;
		supplier += `<td style="vertical-align: middle;"><input type="number" name="garansi_bulan_supplier${num}[]" class="garansi_bulan_supplier" placeholder="BULAN" size=3> <input type="number" name="garansi_hari_supplier${num}[]" class="garansi_hari_supplier" placeholder="HARI" size=3></td>`;
		return supplier;
	}

	function reloadKeperluan() {
		$('.kd_inventaris').select2({
			width: 168
		});
	}

	function reloadItemStock() {
		$('.kd_item').select2({
			width: 168,
			minimumInputLength:3,
			delay: 250,
			ajax: {
				url: _url + "serverside/search-itemstock/",
				dataType: 'json',
				type: 'POST',
				data: function (params) {
					return {
						q: params.term,
						page: params.page
					};
				},
				processResults: function (data) {
					return {
						results: data.results
					};
				},
				cache: true
			}
		});
	}

	function reloadSupplier() {
		$(".kode_supplier").select2({
			theme: "bootstrap",
			width: 168,
			minimumInputLength: 1,
			delay: 250,
			ajax: {
				url: _url + "serverside/search-supplier/",
				dataType: "json",
				type: "POST",
				data: function (params) {
					return {
					q: params.term,
					page: params.page,
					};
				},
				processResults: function (data) {
					return {
					results: data.results,
					};
				},
				cache: true,
			},
		});
	}

	function reloadHarga() {
		$(".amount").autoNumeric("init", {
			mDec: 0,
			aSep: ".",
			aDec: ",",
			nBracket: "(,)",
			vMin: -999999999,
		});
	}

	function reloadTanggal() {
		$('.tgl').datepicker({
			changeMonth: true,
			changeYear: true,
			format: 'dd-mm-yyyy',
			autoclose:true,
			todayHighlight:true,
			//endDate: new Date(new Date().setDate(new Date().getDate()))
		}).css({"cursor":"pointer", "background":"white"});
	}

	function reloadHargaTotal() {
		let total = 0;
		$('.qty_req').each(function() {
			let supplierpilihan = $(this).closest('tr').find("input[type='radio']:checked").val();
			if (supplierpilihan) {
				let hargapilihan = +$(this).closest('tr').find('.harga_ppn').eq(supplierpilihan - 1).val().replaceAll(".", "");
				total += hargapilihan;
				// total += $(this).val() * hargapilihan;
			}
		});

		let numStr = (total.toString().replace(/\D/g, '')).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
		$('#total').val(`Rp ${numStr}`);

		total >= 2000000 ? $('.direksi').show() : $('.direksi').hide();
	}
});