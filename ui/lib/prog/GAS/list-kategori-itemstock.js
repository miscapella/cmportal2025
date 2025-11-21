$(document).ready(function () {
	$('.kd_item').select2();
	$('#emsg').hide();
    $('#add').on('click', function(){
		var opt = $('#opt').html();
		// var kode = $("#kode_user").val();
		// var kode_vihara = $("#kode_vihara").val();
		// $.post(_url + 'render/data-donasi2/'+kode_vihara, {
			// kode: kode,
		// })
		// .done(function (data) {
			var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><select name="kd_item[]" class="kd_item" id="kd_item">'+opt+'</select></td>';
            clist += '<td><input type="text" name="merk[]" class="merk" readonly></td>';
			clist += '<td><input type="text" name="tipe[]" class="tipe" readonly></td>';
            clist += '<td><input type="text" name="spesifikasi[]" class="spesifikasi" readonly><input type="text" name="baru[]" style="display:none" class="baru" value="baru"></td>';
			clist += '<td><input type="checkbox" name="aktif[]" class="cekbox" checked></td>';
			clist += '<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>';
			$(".sys_table").find('tbody')
				.append(clist);
			$('.kd_item').select2();
		// });
    });
    $(document).on('click', '.hapus', function(e) {
//        $(this).closest('tr').fadeOut(300, function(){
//            $(this).closest('tr').remove();
//        });
        //item_remove.hide();
        var kd_kategori = $('#kd_kategori').val();
		var kode = $(this).closest('tr').find('.kd_item').val();
		var _url = $("#_url").val();
		var posisi = $(this).closest('tr');
		var baru = $(this).closest('tr').find('.baru').val();
		if(baru == 'baru') {
			posisi.fadeOut(300, function(){
				posisi.remove();
			});
		} else {
			$.post(_url + 'kategori/hapus-itemstock/', {
				kode: kode,
				kd_kategori: kd_kategori,
			})
			.done(function (data) {
				if ($.isNumeric(data)) {
					posisi.fadeOut(300, function(){
						posisi.remove();
					});
				} else {
					bootbox.alert({
						message: 'Kesalahan dalam menghapus data Kategori - Item Stock',
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
    $(document).on('change', '.kd_item', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
		var merk = $(this).closest('tr').find(".merk");
		var tipe = $(this).closest('tr').find(".tipe");
		var spesifikasi = $(this).closest('tr').find(".spesifikasi");
		$.post(_url + 'kategori/render-itemstock/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			merk.val(obj.merk);
			tipe.val(obj.tipe);
			spesifikasi.val(obj.spesifikasi);
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
		var aktif = [];
		$.each($("input[name='chk[]']:checked"), function(){
			kd_item.push($(this).closest('tr').find("select[name='kd_item[]'] option").filter(':selected').val());
			if($($(this).closest('tr').find("input[name='aktif[]']:checked")).prop('checked') == true)
				aktif.push('Y');
			else
				aktif.push('N');
		});
		var $data = new FormData();
		$data.append('kd_item', kd_item);
		$data.append('aktif', aktif);
		$data.append('kd_kategori', $('#kd_kategori').val());
		$.ajax({
			url: _url + 'kategori/itemstock-post/',
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
				//location.reload();
			}
		});
    });
});