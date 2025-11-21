$(document).ready(function () {
    var _url = $("#_url").val();
    $('#no').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    });
        // .on("change", function(e) {
			// var _url = $("#_url").val();
			// var id = this.value;
			// $.post(_url + 'bayar/render-bayar/', {
				// id: id

			// })
				// .done(function (data) {
					// var obj = jQuery.parseJSON(data);
					// $("#id_cust").val(obj.id_cust);
					// $("#no_jual").val(obj.no_jual);
					// $("#nama").val(obj.account);
					// $("#address").html(obj.adrs);
					// $("#tangs").html(obj.tangs);
					// $('#angsuran').autoNumeric('set',obj.angsuran);
					// $('#tunggak').autoNumeric('set',obj.tunggak);
					// $('#tdenda').autoNumeric('set',obj.tdenda);
					// $('#piutang').autoNumeric('set',obj.angsuran+obj.tunggak);
					// $('#tpiutang').autoNumeric('set',obj.tpiutang);

				// });
        // });

});