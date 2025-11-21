$(document).ready(function () {
	$('#emsg').hide();
	$('#supplier').select2({
		theme: "bootstrap",
		width: "100%"
	});
	$('#priority').select2();

    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
			reindexTable();
			reloadHargaTotal();
        });
        //item_remove.hide();
    });

	function reindexTable() {
		$("#table-po tr").each(function(index) {
			if (index > 0) {
				$(this).find("td:first").html(`<td style="vertical-align: middle"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a> ${index}</td>`);
			}
		});
	}

	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

	$(document).on('change', '.qty_req', function() {
		reloadHargaTotal();
	});

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

    $(document).on('change', '#supplier', function(e) {
        var kode = $(this).val();
        if(kode != ''){
            var _url = $("#_url").val();
            var item = $(this).closest('tr').find(".kd_item");
            $.post(_url + 'pembelian/render-po-supplier/', {
                kode: kode,
            })
            .done(function (data) {
                var obj = jQuery.parseJSON(data);
                var opt = $('#opt').html();
                $(".sys_tables").find('tr')
                .remove();
                $(".sys_table").find('tbody')
                .append(obj.clist);
				$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
                $('.kode_item').select2();
				reindexTable();
				reloadHargaTotal();
            });
        } else {
            $(".sys_tables").find('tr')
            .remove();
            
        }
		
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

	$(document).on('click', '#exclude_ppn', function(e) {
		if (e.target.checked) $('#ppn').attr('readonly', true);
		else $('#ppn').attr('readonly', false);
	});
	

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var no_pr = [];
		var kd_item = [];
		var id = [];
		var max = [];
		var qty_req = [];
		var garansi_bulan = [];
		var garansi_hari = [];
		var harga = [];
		var keterangan = [];
		$.each($("input[name='chk[]']:checked"), function(){
			no_pr.push($(this).closest('tr').find("input[name='no_pr[]']").val());
			kd_item.push($(this).closest('tr').find("input[name='kd_item[]']").val());
			id.push($(this).closest('tr').find("input[name='id_pr_detail[]']").val());
			max.push($(this).closest('tr').find("input[name='max[]']").val());
			qty_req.push($(this).closest('tr').find("input[name='qty_req[]']").val());
            garansi_bulan.push(parseInt($(this).closest('tr').find("input[name='garansi_bulan[]']").val()));
            garansi_hari.push(parseInt($(this).closest('tr').find("input[name='garansi_hari[]']").val()));
            harga.push($(this).closest('tr').find("input[name='harga[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
		});
		var $data = new FormData();
		$data.append('no_pr', no_pr);
		$data.append('kd_item', kd_item);
		$data.append('id', id);
		$data.append('max', max);
		$data.append('qty_req', qty_req);
		$data.append('garansi_bulan', garansi_bulan);
		$data.append('garansi_hari', garansi_hari);
		$data.append('harga', harga);
		$data.append('keterangan', keterangan);
		$data.append('supplier', $('#supplier').val());
		$data.append('lokasi_pengiriman', $('#lokasi_pengiriman').val());
		$data.append('syarat_pembayaran', $('#syarat_pembayaran').val());
		$data.append('catatan', $('#catatan').val());
		$data.append('ppn', parseInt($('#ppn').val()));
		$data.append('exclude_ppn', $('#exclude_ppn').is(':checked'));
		$data.append('bayar_pusat', $('#bayar_pusat').is(':checked'));
		$data.append('idate', $('#idate').val());
		$data.append('priority', $('#priority').val());
		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'pembelian/add-po-post/',
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
									window.location = _url + 'pembelian/list-po/';
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

	// function reloadHargaTotal() {
	// 	let total = 0;
	// 	$('.harga').each(function() {
	// 		let amount = $(this).val().replaceAll(".", "");
	// 		let qtyReq = $(this).closest('tr').find('.qty_req').val();
	// 		total += amount * qtyReq;
	// 	});

	// 	let numStr = (total.toString().replace(/\D/g, '')).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
	// 	$('#total').val(`Rp ${numStr}`);
	// }
	function reloadHargaTotal() {
		let total = 0;
		$('.harga_ppn').each(function() {
			let amount = $(this).val().replaceAll(".", ""); // Hapus pemisah ribuan
			let qtyReq = $(this).closest('tr').find('.qty_req').val(); // Ambil jumlah permintaan
			total += amount * qtyReq; // Hitung total
		});
	
		// Format total ke format rupiah
		let numStr = (total.toString().replace(/\D/g, '')).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
		$('#total').val(`Rp ${numStr}`);
	
		// Logika otomatis centang checkbox "Bayar Pusat" jika total >= 2 juta
		if (total >= 2000000) {
			$('#bayar_pusat').prop('checked', true); // Centang checkbox
		} else {
			$('#bayar_pusat').prop('checked', false); // Hilangkan centang
		}
	}
	
});