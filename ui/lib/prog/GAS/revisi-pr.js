$(document).ready(function () {
	$('#emsg').hide();

	$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
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

    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
        //item_remove.hide();
    });
	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});
    
    $('#idates').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		//endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

    $('#add').on('click', function(){
		var opt = $('#opt').html();
		var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
		clist += '<td><select name="kd_inventaris[]" class="kd_inventaris" id="kd_inventaris">'+opt+'</select></td>';
		clist += '<td><select name="kd_item[]" class="kd_item" id="kd_item" class="kd_item"><option>Pilih Item Stock</option></select></td>';
		clist += '<td><input type="text" name="merk[]" class="merk" style="background-color: #ccc" readonly></td>';
		clist += '<td><input type="text" name="tipe[]" class="tipe" style="background-color: #ccc" readonly></td>';
		clist += '<td><input type="text" name="spesifikasi[]" class="spesifikasi" style="background-color: #ccc" readonly></td>';
		clist += '<td><input type="text" name="satuan[]" class="satuan" style="background-color: #ccc" readonly></td>';
		clist += '<td><input type="text" name="qty_req[]" class="qty_req amount" value=0></td>';
		clist += '<td><input type="text" name="qty_balance[]" class="qty_balance amount" style="background-color: #ccc" value=0 readonly><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>';
		clist += '<td><input type="text" name="tgl[]" class="tgl" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true"></td>';
		clist += '<td><input type="text" name="keterangan[]" class="keterangan"></td>';
		$(".sys_table").find('tbody')
			.append(clist);
		$('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
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

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var kd_inventaris = [];
		var kd_item = [];
		var qty_req = [];
		var qty_stock = [];
		var keterangan = [];
		var tgl = [];
		$.each($("input[name='chk[]']:checked"), function(){
			kd_item.push($(this).closest('tr').find("select[name='kd_item[]'] option").filter(':selected').val());
			kd_inventaris.push($(this).closest('tr').find("select[name='kd_inventaris[]'] option").filter(':selected').val());
			qty_req.push($(this).closest('tr').find("input[name='qty_req[]']").val());
			qty_stock.push($(this).closest('tr').find("input[name='qty_balance[]']").val());
			tgl.push($(this).closest('tr').find("input[name='tgl[]']").val());
			keterangan.push($(this).closest('tr').find("input[name='keterangan[]']").val());
		});
		var $data = new FormData();
		$data.append('kd_inventaris', kd_inventaris);
		$data.append('kd_item', kd_item);
		$data.append('qty_req', qty_req);
		$data.append('qty_stock', qty_stock);
		$data.append('keterangan', keterangan);
		$data.append('tgl', tgl);
		$data.append('idate', $('#idate').val());
		$data.append('no_pr', $('#no_pr').val());
        $data.append('idates', $('#idates').val());
		$data.append('no_revisi', $('#no_revisi').val());
        $data.append('ket_revisi', $('#ket_revisi').val());
		$data.append('priority_revisi', $('#priority_revisi').val());

		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'pembelian/revisi-pr-post/',
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
									window.location = _url + 'pembelian/list-pr-pending/';
								}
							});
						}
						else {
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