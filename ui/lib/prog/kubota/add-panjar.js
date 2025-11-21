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
			$.post(_url + 'panjar/render-panjar/', {
				id: id

			})
				.done(function (data) {
					var obj = jQuery.parseJSON(data);
					$("#id_cust").val(obj.id_cust);
					$("#no_pesan").val(obj.no_pesan);
					$("#nama").val(obj.account);
					$("#address").html(obj.adrs);
					$('#tpanjar').autoNumeric('set',obj.tpanjar);
					$('#tbayar').autoNumeric('set',obj.tbayar);
					$('#sisa').autoNumeric('set',obj.sisa);

				});
        });

    var $modal = $('#ajax-modal');
    //
	$('#jumlah').change(function (){
		var sisa = $('#sisa').autoNumeric('get');
		var byr = $('#jumlah').autoNumeric('get');
		if(byr > sisa) {
			alert('Pembayaran melebihi sisa yang harus dibayar');
			$('#jumlah').autoNumeric('set',sisa);
		}
		$('#terbilang').val(terbilang($('#jumlah').autoNumeric('get')));
	});
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'panjar/add-post/', $( "#invform" ).serialize())
            .done(function (data) {
                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
					var obj = jQuery.parseJSON(data);
                    if ($.isNumeric(obj.dataval)) {
						alert(obj.msg);
						window.location = _url + 'panjar/list/';
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