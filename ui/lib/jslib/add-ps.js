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
    $('#item-add1').on('click', function(){
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=ps/modal-list1a/', '', function(){
                $modal.modal();
            });
        }, 1000);
    });

//	$('#code').select2({
//        theme: "bootstrap",
//        language: {
//            noResults: function () {
//                return $("#_lan_no_results_found").val();
//            }
//        }
//    });

//	$('#equip_no').select2({
//        theme: "bootstrap"
//    });

    $('#invoice_items').on('click', '.item_name', function(){
		$("tr").removeClass("info");
        $(this).closest('tr').addClass("info");
        item_remove.show();
    });

    $('#invoice_items1').on('click', '.item_name', function(){
		$("tr").removeClass("info");
        $(this).closest('tr').addClass("info");
        item_remove.show();
    });

    item_remove.on('click', function(){
        $("tr.info").fadeOut(300, function(){
            $(this).remove();
        });

    });

    $modal.on('click', '.update', function(){
        var tableControl= document.getElementById('items_table');
        $modal.modal('loading');
        setTimeout(function(){
            $modal.modal('loading');

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
						'<tr> <td><input type="text" class="form-control item name" name="code1[]" value="'+  item_code + '" disabled=disabled</td> <td><input type="text" class="form-control item_name" name="name1[]" id="name1" value="' + item_name + '"></td>  <td><input type="text" class="form-control item_price" name="unit1[]" value="' + item_unit + '"></td></tr>'
					);
				}
				
            });

            $modal.modal('hide');

        }, 1000);

    });

    $modal.on('click', '.update1', function(){
        var tableControl= document.getElementById('items_table1');
        $modal.modal('loading');
        setTimeout(function(){
            $modal.modal('loading');

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
					$("#invoice_items1").find('tbody')
						.append(
						'<tr> <td><input type="text" class="form-control item name" name="code1[]" value="'+  item_code + '" disabled=disabled</td> <td><input type="text" class="form-control item_name" name="name1[]" id="name1" value="' + item_name + '"></td> <td><input type="text" class="form-control persen" value="1" name="persen[]" id="persen"></td><td><input type="text" class="form-control qty" value="1" name="qty[]" id="qty"></td> <td><input type="text" class="form-control item_price" name="unit1[]" value="' + item_unit + '"></td></tr>'
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

    $(':file').on('change', function() {
		var file = this.files[0];
		if (file.size > 10000000) {
			alert('max upload size is 10MB')
			$(':file').val('');
		}

		// Also see .name, .type
		var fileExtension = ['jpeg', 'jpg', 'png', 'dwg'];
		if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', ')+'.');
			$(':file').val('');
        }
	});
	
	$("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
		var type = $("#type").val();
//		var file = $("#file").prop('files')[0];
//		var formdata = new FormData($('form')[0]);
		var $data = new FormData();
		if (type=="Product") {
			var code1 = $("#code1").val();
			var code2 = $("#code2").val();
			var code3 = $("#code3").val();
			var code = code1 +"-"+ code2 +"-"+ code3 +"-";
		} else {
			var code = $("#code4").val();
		}
		$data.append('code',code);
		$data.append('name',$('#name').val());
		if(type == "Product") {
			$data.append('no_part',$('#no_part').val());
//			$data.append('sales_price',$('#sales_price').val());
//			$data.append('unit',$('#unit').val());
			$data.append('item_number', $('#item_number').val());
			$data.append('file', $("#file").get(0).files[0]);
			$data.append('pci_no',$('#pci_no').val());
			$data.append('equip_no',$('#equip_no').val());
			$data.append('draw_no',$('#draw_no').val());
			$data.append('satuan',$('#satuan').val());
			$data.append('pos_no',$('#pos_no').val());
			$data.append('material',$('#material').val());
			$data.append('manufacture',$('#manufacture').val());
			$data.append('model',$('#model').val());
			$data.append('od',$('#od').val());
			$data.append('id_data',$('#id_data').val());
			$data.append('ht',$('#ht').val());
			$data.append('berat',$('#berat').val());
//			$data.append('qc',$('input[name=qc]:checked', '#rform').val());
//			$data.append('label',$('input[name=label]:checked', '#rform').val());
			$data.append('spek',CKEDITOR.instances.editor1.getData());
		} else {
			$data.append('description',$('#description').val());
		}
		if(type == "Komposisi") {
			var data_code1 = $('input[name="code1[]"]').map(function(){return $(this).val();}).get();
			var data_name1 = $('input[name="name1[]"]').map(function(){return $(this).val();}).get();
			var data_unit1 = $('input[name="unit1[]"]').map(function(){return $(this).val();}).get();
			$data.append('code1',data_code1);
			$data.append('name1',data_name1);
			$data.append('unit1',data_unit1);
		}
		$data.append('type',type);

		$.ajax({
			url: _url + 'ps/add-post/',
			type: 'POST',
			data: $data,
			cache: false,
//			dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
				$('#ibox_form').unblock();
				$("#emsgbody").html(data);
				$("#emsg").show("slow");
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				location.reload();
			}
        });

    });
});