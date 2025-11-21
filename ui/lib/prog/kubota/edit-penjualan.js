$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
	document.getElementById("optTunai").checked = true;
	$('#jenisk').prop('disabled', 'disabled');
	$('#lama').prop('disabled', 'disabled');
	$('#idate1').prop('disabled', 'disabled');
    var _url = $("#_url").val();
    function update_address(){
        var _url = $("#_url").val();
        var cid = $('#cid').val();
        if(cid != ''){
            $.post(_url + 'penjualan/render-pesan/', {
                cid: cid

            })
                .done(function (data) {
					var obj = jQuery.parseJSON(data);
					$('#nama').val(obj.nama_cust);
					$('#alamat').val(obj.alamat);
					$('#no_ktp').val(obj.no_ktp);
					$('#agama').val(obj.agama);
					$('#no_hp').val(obj.no_hp);
					$('#email').val(obj.email);
					$('#merk').val(obj.merk);
					$('#type').val(obj.type);
					$('#tbuat').val(obj.thn_buat);
					$('#warna').val(obj.warna);
					$('#id_cust').val(obj.id_cust);
					$('#no_pesan').val(obj.no_pesan);
					$('#harga').autoNumeric('set',obj.harga);
					$('#panjar').autoNumeric('set',obj.panjar);
					$('#bayar').autoNumeric('set',obj.bayar);
					calculate();
                });
        }

    }
	function calculate() {
		var harga = $('#harga').autoNumeric('get');
		if(harga>0) {
			var biaya = $('#by_surat').autoNumeric('get');
			var disc = $('#disc').autoNumeric('get');
			var panjar = $('#panjar').autoNumeric('get');
			var bayar = $('#bayar').autoNumeric('get');
			var total = parseInt(harga)+parseInt(biaya)-parseInt(disc);
			var total1 = parseInt(harga)+parseInt(biaya)-parseInt(disc)-parseInt(panjar);
			var sisa = parseInt(panjar)-parseInt(bayar);
			$("#total").autoNumeric('set',total);
			$("#jumlah").autoNumeric('set',total1);
			$("#sisa").autoNumeric('set',sisa);
		}
	}
	$('.chassis').change(function() {
		var _url = $("#_url").val();
		var _theme = $("#_theme").val();
		var chassis = $("#chassis").val();
		var engine = $("#engine").val();
		if(chassis!="" && engine!="")
		{
			$("#engine_status").html('<img src="'+_theme+'/img/loader.gif">&nbsp;Checking availability...');
			$("#chassis_status").html('<img src="'+_theme+'/img/loader.gif">&nbsp;Checking availability...');
			$.ajax({
				type: "POST",
				url: _url + 'penjualan/cekchseng/'+chassis+'/'+engine+'/',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				success: function(response) {
				   $( '#engine_status' ).html(response);
				   $( '#chassis_status' ).html(response);
					if(response=="<img src='"+_theme+"/img/drop.png'>")	
					{
					 $('#status').val('tdk');
					}
					else
					{
					 $('#status').val('ok');
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					location.reload();
				}
			});
		}
		else
		{
		   $('#engine_status').html("");
		   return false;
		}
	});
	$('input[type="radio"]').on('change', function(e) {
		var jenis = $(this).val();
		if(jenis=='tunai') {
			$('#jenisk').prop('disabled', 'disabled');
			$('#lama').prop('disabled', 'disabled');
			$('#idate1').prop('disabled', 'disabled');
		}
		else {
			$('#jenisk').prop('disabled', false);
			$('#lama').prop('disabled', false);
			$('#idate1').prop('disabled', false);
		}
	});
	$('.amount').change(function() {
		var harga = $('#harga').autoNumeric('get');
		if(harga>0) {
			calculate();
		} else {
			$(this).autoNumeric('set',0);
		}
	});
    update_address();
    $('#cid').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    })
        .on("change", function(e) {
            // mostly used event, fired to the original element when the value changes
           // log("change val=" + e.val);
          //  alert(e.val);

            update_address();
        });

    var $modal = $('#ajax-modal');
    //
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'penjualan/add-post/', $( "#invform" ).serialize())
            .done(function (data) {
                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
					var obj = jQuery.parseJSON(data);
                    if ($.isNumeric(obj.dataval)) {
						alert(obj.msg);
						window.location = _url + 'penjualan/list/';
                    }
                    else {
                        $('#ibox_form').unblock();
                        var body = $("html, body");
                        body.animate({scrollTop:0}, '50', 'swing');
                        $("#emsgbody").html(obj.msg);
                        $("#emsg").show("slow");
                    }
                }, 0);
            });
    });
});