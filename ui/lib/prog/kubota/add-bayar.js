$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();
    $('#cid1').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    });
    $('#cid').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    })
        .on("change", function(e) {
			var _url = $("#_url").val();
			var id = this.value;
			var idate = $("#idate").val();
			$.post(_url + 'bayar/render-bayar/', {
				id: id,
				idate: idate

			})
				.done(function (data) {
					var obj = jQuery.parseJSON(data);
					if(obj.msg !='') {
						alert(obj.msg);
						$('#cid').val('');
						$('#cid').trigger('change');
					}
					$("#id_cust").val(obj.id_cust);
					$("#no_jual").val(obj.no_jual);
					$("#nama").val(obj.account);
					$("#address").html(obj.adrs);
					$("#tangs").html(obj.tangs);
					$('#angsuran').autoNumeric('set',obj.angsuran);
					$('#tunggak').autoNumeric('set',obj.tunggak);
					$('#tdenda').autoNumeric('set',obj.tdenda);
					$('#piutang').autoNumeric('set',obj.angsuran+obj.tunggak);
					$('#tpiutang').autoNumeric('set',obj.tpiutang);
				});
        });
	$('#idate').on('change',function (e) {
		var _url = $("#_url").val();
		var id = $('#cid').val();
		var idate = this.value;
		$.post(_url + 'bayar/render-bayar/', {
			id: id,
			idate: idate

		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			if(obj.msg !='') {
				alert(obj.msg);
				$('#cid').val('');
				$('#cid').trigger('change');
			}
			$("#id_cust").val(obj.id_cust);
			$("#no_jual").val(obj.no_jual);
			$("#nama").val(obj.account);
			$("#address").html(obj.adrs);
			$("#tangs").html(obj.tangs);
			$('#angsuran').autoNumeric('set',obj.angsuran);
			$('#tunggak').autoNumeric('set',obj.tunggak);
			$('#tdenda').autoNumeric('set',obj.tdenda);
			$('#piutang').autoNumeric('set',obj.angsuran+obj.tunggak);
			$('#tpiutang').autoNumeric('set',obj.tpiutang);

		})
	});

    var $modal = $('#ajax-modal');
    //
	$('#jumlah').change(function (){
		var byr = parseInt($('#jumlah').autoNumeric('get'));
		var byr1 = parseInt($('#jumlah1').autoNumeric('get'));
		var tpiutang = parseInt($('#tpiutang').autoNumeric('get'));
		if(byr > tpiutang) {
			alert('Pembayaran melebihi Total All Piutang');
			$('#jumlah').autoNumeric('set',tpiutang);
			byr = tpiutang;
		}
		$('#total').autoNumeric('set',byr+byr1);
		$('#terbilang').val(terbilang(byr+byr1));
	});
	$('#jumlah1').change(function (){
		var byr = parseInt($('#jumlah').autoNumeric('get'));
		var tdenda = parseInt($('#tdenda').autoNumeric('get'));
		var byr1 = parseInt($('#jumlah1').autoNumeric('get'));
		if(byr1 > tdenda) {
			alert('Pembayaran melebihi Total denda');
			$('#jumlah1').autoNumeric('set',tdenda);
			byr1 = tdenda;
		}
		$('#total').autoNumeric('set',byr+byr1);
		$('#terbilang').val(terbilang(byr+byr1));
	});
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'bayar/add-post/', $( "#invform" ).serialize())
            .done(function (data) {
                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
					var obj = jQuery.parseJSON(data);
                    if ($.isNumeric(obj.dataval)) {
						alert(obj.msg);
						window.location = _url + 'bayar/list/';
                    }
                    else {
                        $('#ibox_form').unblock();
                        var body = $("html, body");
                        body.animate({scrollTop:0}, '50', 'swing');
                        $("#emsgbody").html(obj.msg);
                        $("#emsg").show("slow");
                    }
                }, 0);
            })
			.fail(function(xhr, status, error) {
				alert('tes');
			});
    });
});