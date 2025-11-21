$(document).ready(function () {
    $('.amount').autoNumeric('init');

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
			var cid = $('#cid').val();
			if(cid != ''){
				$.post(_url + 'purchase/render-target/', {
					cid: cid
	
				})
					.done(function (data) {
						var json = data;
						obj = JSON.parse(json);
						$('#description').val(obj.ketkw);
						$('.amount').autoNumeric('set',obj.nominal);
						$('#payer_name').val(obj.account);
					});
			}
        });


    var $modal = $('#ajax-modal');

    $(".progress").hide();
    $("#emsg").hide();

    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		var _url = $("#_url").val();
		$.post(_url + 'purchase/add-payment-post', {


			account: $('#account').val(),
			date: $('#date').val(),
			iid: $('#cid').val(),

			amount: $('#amount').val(),
			cats: $('#cats').val(),
			description: $('#description').val(),
			payer: $('#payer').val(),
			pmethod: $('#pmethod').val()

		}).done(function (data) {

			setTimeout(function () {

				if ($.isNumeric(data)) {
					location.reload();
				}
				else {
					$modal
						.modal('loading')
						.find('.modal-body')
						.prepend(data);
				}

			}, 2000);
		});
    });
});