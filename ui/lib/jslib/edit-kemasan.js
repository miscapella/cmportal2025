$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();

    var $modal = $('#ajax-modal');
    var sysrender = $('#sysfrm_ajaxrender');

   var item_remove = $('#item-remove');
   item_remove.hide();

    $('#item-add').on('click', function(){
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=ps/modal-list1/', '', function(){
                $modal.modal();
            });
        }, 1000);
    });

    $('#invoice_items').on('click', '.item_name', function(){
		$("tr").removeClass("info");
        $(this).closest('tr').addClass("info");
        item_remove.show();
    });

    item_remove.on('click', function(){
        $("#invoice_items tr.info").fadeOut(300, function(){
            $(this).remove();
        });

    });

    $modal.on('click', '.update', function(){
        var tableControl= document.getElementById('items_table');
        $modal.modal('loading');
        setTimeout(function(){
            $modal.modal('loading');
            //$modal
            //    .modal('loading')
            //    .find('.modal-body')
            //    .prepend('<div class="alert alert-info fade in">' +
            //    'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            //    '</div>');

           // var obj = new Array();

            $('input:checkbox:checked', tableControl).each(function() {

                var item_code = $(this).closest('tr').find('td:eq(1)').text();
                var item_name = $(this).closest('tr').find('td:eq(2)').text();

                var item_unit = $(this).closest('tr').find('td:eq(3)').text();

              //  obj.push(innertext);
			  var item_check = $('input[name="code1[]"]').map(function(){return $(this).val();}).get();
			  var ssitem = true;
				for (var i = 0; i < item_check.length; i++) {
					if (item_check[i] === item_code) {
						ssitem=false;
					}
				}
				if(ssitem === true) {                
					$("#invoice_items").find('tbody')
						.append(
						'<tr> <td><input type="text" class="form-control item name" name="code1[]" value="'+  item_code + '" disabled=disabled</td> <td><input type="text" class="form-control item_name" name="name1[]" id="name1" value="' + item_name + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]" id="qty"></td> <td><input type="text" class="form-control item_price" name="unit1[]" value="' + item_unit + '"></td></tr>'
					);
				}
				
            });

            $modal.modal('hide');

        }, 1000);

    });

//    $("#submit").click(function (e) {
//        e.preventDefault();
//        $('#ibox_form').block({ message: null });
//        var _url = $("#_url").val();
//        $.post(_url + 'ps/add-post/', $('#rform').serialize(), function(data) {
//
//                setTimeout(function () {
//                    var sbutton = $("#submit");
//                    var _url = $("#_url").val();
//                    if ($.isNumeric(data)) {
//
//                        location.reload();
//                    }
//                    else {
//                        $('#ibox_form').unblock();
//
//                        $("#emsgbody").html(data);
//                        $("#emsg").show("slow");
//                    }
//                }, 2000);
//            });
//	});

    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
		//var name1 = $('input[name="name1[]"]').map(function(){return $(this).val();}).get();
        $.post(_url + 'ps/edit-post/', {

            id: $('#id').val(),
            code: $('#code').val(),
			name: $('#name').val(),
            sales_price: $('#sales_price').val(),
            item_number: $('#item_number').val(),
			unit: $('#unit').val(),
			shape: $('#shape').val(),
			pack: $('#pack').val(),
            description: $('#description').val(),
			//name1: $('#name1').val(JSON.stringify(name1)),
			//desc: $("input[name^=desc]").val(),
			//desc: $("input[name='desc\\[\\]']").val(),
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