$(document).ready(function () {
	$('#emsg').hide();
	$('#supplier').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('#priority').select2({
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
    $(document).on('change', '#supplier', function(e) {
        var kode = $(this).val();
        if(kode != ''){
            var _url = $("#_url").val();
            var item = $(this).closest('tr').find(".kode_item");
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
            });
        } else {
            $(".sys_tables").find('tr')
            .remove();
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
		var qty_req = [];
		var harga = [];
		var keterangan = [];
		$.each($("input[name='chk[]']:checked"), function(){
			no_pr.push($(this).closest('tr').find("input[name='no_pr[]']").val());
			kode_item.push($(this).closest('tr').find("input[name='kode_item[]']").val());
			qty_req.push($(this).closest('tr').find("input[name='qty_req[]']").val());
            harga.push($(this).closest('tr').find("input[name='harga[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
		});
		var $data = new FormData();
		$data.append('no_pr', no_pr);
		$data.append('kode_item', kode_item);
		$data.append('qty_req', qty_req);
		$data.append('harga', harga);
		$data.append('keterangan', keterangan);
		$data.append('supplier', $('#supplier').val());
		$data.append('lokasi_pengiriman', $('#lokasi_pengiriman').val());
		$data.append('syarat_pembayaran', $('#syarat_pembayaran').val());
		$data.append('catatan', $('#catatan').val());
		$data.append('ppn', $('#ppn').val());
		$data.append('idate', $('#idate').val());
		$data.append('priority', $('#priority').val());
		bootbox.confirm('Apakah anda yakin untuk menambahkan PO ?', function(result) {
			if(result){
				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});
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
									window.location = _url + 'pembelian/list-po-pending/Berhasil menambahkan PO';
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
						bootbox.hideAll();
						alert(msg);
					}
				});
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });
});