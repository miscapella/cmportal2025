$(document).ready(function () {

//       var pbar = $('#progressbar');
//    pbar.hide();

//    pbar.progressbar({
//        warningMarker: 100,
//        dangerMarker: 100,
//        maximum: 100,
//        step: 15
//    });

// comment string plg kiri utk menutup progress bar sewaktu buka menu produk
    function updateDiv(){
     //   $("#sysfrm_ajaxrender").html('Loading...');
//        $('#ibox_form').block({ message: null });
//        $('#progressbar').show();

//        var timer = setInterval(function () {
//            pbar.progressbar('stepIt');

//        }, 250);

        var btnsearch = $("#search");
//        $('.progress').show();
//        $('.progress .progress-bar').progressbar();
        //btnsearch.html(_L['Searching']);
        //btnsearch.addClass("btn-danger");
        var _url = $("#_url").val();
        $.post(_url + 'search/ps/', {

            txtsearch: $('#txtsearch').val(),
            stype: $('#stype').val()

        })
            .done(function (data) {

//                setTimeout(function () {
                    var sbutton = $("#search");
                    var result =  $("#sysfrm_ajaxrender");
                    //sbutton.html('Search');
                    //sbutton.removeClass("btn-danger");
                    $('.progress').hide();
                    $('#ibox_form').unblock();
                    result.html(data);
                    result.show();

//                }, 2000);
            });

    }

    updateDiv();

    $("#search").click(function (e) {
        e.preventDefault();
        updateDiv();
    });
    var $modal = $('#ajax-modal');
    var sysrender = $('#sysfrm_ajaxrender');
    
	sysrender.on('click', '.cdelete', function(e){
        e.preventDefault();
        var id = this.id;
		var type = this.name;
        var lan_msg = $("#_lan_are_you_sure").val();
        bootbox.confirm(lan_msg, function(result) {
            if(result){
                var _url = $("#_url").val();
                window.location.href = _url + "delete/ps/" + id + '/' + type +'/';
            }
        });
    });

	sysrender.on('click', '.cedit', function(e){
        e.preventDefault();
        var vid = this.id;
		var id = vid.replace("e", "");
        var id = id.replace("t", "");
		var type = this.name;
		$('body').modalmanager('loading');
		var _url = $("#_url").val();
		window.location.href = _url + "ps/edit-form/" + id + '/' + type +'/';
	});
//    sysrender.on('click', '.cedit', function(e){
//        e.preventDefault();
//        var vid = this.id;
//        var id = vid.replace("e", "");
//        var id = id.replace("t", "");
//
//       // var id = $(this).closest('tr').attr('id');
//        // create the backdrop and wait for next modal to be triggered
//        $('body').modalmanager('loading');
//        var _url = $("#_url").val();
//        setTimeout(function(){
//            $modal.load(_url + 'ps/edit-form/' + id, '', function(){
//			   var item_remove = $('#item-remove');
//			   item_remove.hide();
//				$('#invoice_items').on('click', '.item_name', function(){
//					$("tr").removeClass("info");
//					$(this).closest('tr').addClass("info");
//					item_remove.show();
//				});
//				item_remove.on('click', function(){
//					$("#invoice_items tr.info").fadeOut(300, function(){
//						$(this).remove();
//					});
//			
//				});
//				$('#item-add').on('click', function(){
//					// create the backdrop and wait for next modal to be triggered
//					$('body').modalmanager('loading');
//			
//					setTimeout(function(){
//						$modal.load('?ng=ps/modal-list1/', '', function(){
//							$modal.modal();
//						});
//					}, 1000);
//				});
//
//                $modal.modal();
//            });
//        }, 1000);
//    });

    sysrender.on('click', '.ccompose', function(e){
        e.preventDefault();
        var vid = this.id;
        var id = vid.replace("e", "");
        var id = id.replace("t", "");

       // var id = $(this).closest('tr').attr('id');
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');
        var _url = $("#_url").val();
        setTimeout(function(){
            $modal.load(_url + 'ps/edit-form/' + id, '', function(){
                $modal.modal();
            });
        }, 1000);
    });

// Edit by Taniwan
//    $modal.on('click', '#update', function(){
//        $modal.modal('loading');
//        setTimeout(function(){
//
//
//            var _url = $("#_url").val();
//            $.post(_url + 'ps/edit-post/', $('#edit_form').serialize(), function(data){
//
//                setTimeout(function () {
//
//                    var _url = $("#_url").val();
//                    if ($.isNumeric(data)) {
//
//                        location.reload();
//                    }
//                    else {
//
//                        $modal
//                            .modal('loading')
//                            .find('.modal-body')
//                            .prepend('<div class="alert alert-danger fade in">' + data +
//
//                            '</div>');
//
//                    }
//                }, 2000);
//            });
//        }, 1000);
//
//    });

    $modal.on('click', '#update', function(){
        $modal.modal('loading');
        setTimeout(function(){


            var _url = $("#_url").val();
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
				code1: $('input[name="code1[]"]').map(function(){return $(this).val();}).get(),
				name1: $('input[name="name1[]"]').map(function(){return $(this).val();}).get(),
				qty: $('input[name="qty[]"]').map(function(){return $(this).val();}).get(),
				unit1: $('input[name="unit1[]"]').map(function(){return $(this).val();}).get(),
				type: $('#type').val()
			})
				
            .done(function (data) {
                setTimeout(function () {

                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {

                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend('<div class="alert alert-danger fade in">' + data +

                            '</div>');

                    }
                }, 2000);
            });
        });

    });


});