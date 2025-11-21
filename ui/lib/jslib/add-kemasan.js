$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();

    var $modal = $('#ajax-modal');
    var sysrender = $('#sysfrm_ajaxrender');

    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
		//var name1 = $('input[name="name1[]"]').map(function(){return $(this).val();}).get();
        $.post(_url + 'ps/add-kemasan/', {

            code: $('#code').val(),
			name: $('#name').val(),
            sales_price: $('#sales_price').val(),
            item_number: $('#item_number').val(),
			unit: $('#unit').val(),
			shape: $('#shape').val(),
			pack: $('#pack').val(),
            description: $('#description').val(),
			code1: $('input[name="code1[]"]').map(function(){return $(this).val();}).get(),
			name1: $('input[name="name1[]"]').map(function(){return $(this).val();}).get(),
			qty: $('input[name="qty[]"]').map(function(){return $(this).val();}).get(),
			unit1: $('input[name="unit1[]"]').map(function(){return $(this).val();}).get(),

            type: $('#type').val()
        })

            .done(function (data) {
	
                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {
                        $('#ibox_form').unblock();

                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                }, 2000);
            });
    });
});