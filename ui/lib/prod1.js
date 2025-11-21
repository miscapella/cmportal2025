$(document).ready(function () {
    var $modal = $('#ajax-modal');
    var sysrender = $('#sysfrm_ajaxrender');

   var item_remove = $('#item-remove');
   item_remove.hide();

    $('#item-add').on('click', function(){

        // create the backdrop and wait for next modal to be triggered
		var id = $("#cid").val();
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=prod/modal-kemasan/&id='+id, '', function(){
				updateselect();
                $modal.modal();
            });
        }, 1000);
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
			var cid = $('#cid').val();
			$("#emsg").hide("slow");
			$("#emsgbody").html('');
			if(cid != ''){
				$.post(_url + 'prod/render-target1/', {
					cid: cid
	
				})
					.done(function (data) {
	
						$("#target").val(data);
	
					});

				$.post(_url + 'prod/render-select1/', {
					cid: cid
	
				})
					.done(function (data) {
					$("#invoice_items tr.item_name").remove();
					$("#invoice_items").find('tbody')
						.append(data);
					});
				
				$.post(_url + 'prod/render-select1a/', {
					cid: cid
	
				})
					.done(function (data) {
					$("#invoice_items1 tr.item_name").remove();
					$("#invoice_items1").find('tbody')
						.append(data);
					});
			}
        });
	
	$(document).on('change','#modal_qty', function () {
		var _url = $("#_url").val();
		var cqty = this.value;
		var ccode = $('input#modal_code').val();
		var sisa = $('input#modal_sisa').val();
		var cbatch = $('#modal_batch').val();
		if (cbatch==="") {
			alert("Belum pilih No Batch !");
			$("#modal_batch").focus();
		} 
		else {
			if(parseInt(cqty)>0) {
				if(parseInt(sisa)-parseInt(cqty) >= 0) {
					$.post(_url + 'prod/render-qty/', {
						cqty: cqty,
						ccode: ccode,
						cbatch: cbatch
					})
					.done(function (data) {	
						if(parseInt(cqty) !== parseInt(data)) {
							alert("Qty tidak mencukupi !");
							$("#modal_qty").focus();
						}
						$("#modal_qty").val(data);
	
					});
				}
				else {
					alert("Qty melebihi sisa yang dibutuhkan !");
					$("#modal_qty").focus();
				}
			}
			else {
				alert("Belum mengisi Qty !");
				$("#modal_qty").focus();
			} 
		}
	});

	$(document).on('change','#code', function () {
		var _url = $("#_url").val();
		var ccode = this.value;
		if(ccode != ''){
			$.post(_url + 'prod/render-target2/', {ccode: ccode})
				.done(function (data) {	
					$("#nama").val(data);
					$("#batch").focus();
					document.getElementById('code').disabled = true;
				});
		}
	});

//	$(document).on('focus','#batch', function() {
//		var _url = $("#_url").val();
//		var ccode = $("#code").val();
//		if(ccode != ''){
//			$.post(_url + 'prod/render-target3/', {ccode: ccode})
//				.done(function (data) {	
//					$("#batch").empty();
//					$("#batch").append(data);
//
//				});
//		}
//	});

    $('#blank-add').on('click', function(){
		var _url = $("#_url").val();
		var id = $("#cid").val();
		if(id !== '') {
			$.post(_url + 'prod/render-select/', {id: id})
				.done(function (data) {	
				$("#invoice_items").find('tbody')
					.append(data);
	
				});
				$(this).hide();
		}
		else {
			alert('Belum memilih No. Batch !');
		}
    });

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

//    $('#invoice_items').on('click', '#btn-plus', function(){
	$(document).on('click','#btn-plus', function () {
		var id = $(this).val();
		var batch = $("#cid").val();
		var jtarget = $("#target").val();
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=prod/modal-plus/&id='+id+'&nobatch='+batch+'&jtarget='+jtarget, '', function(){
			    $("#emsg1").hide();
                $modal.modal();
            });
        }, 1000);
	});

//    $('#invoice_items').on('click', '#btn-view', function(){
	$(document).on('click','#btn-view', function () {
		var id = $(this).val();
		var batch = $("#cid").val();
		var jtarget = $("#target").val();
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=prod/modal-view/&id='+id+'&nobatch='+batch+'&jtarget='+jtarget, '', function(){
			    $("#emsg1").hide();
                $modal.modal();
            });
        }, 1000);
	});

    item_remove.on('click', function(){
        $("#invoice_items tr.info").fadeOut(300, function(){
            $(this).remove();
        });

    });
		 
    $modal.on('click', '.update', function(e){
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();

        $('body').modalmanager('loading');
        $.post(_url + 'prod/add-post-stock/', {

			cid: $("#cid").val(),
			modal_code: $("#modal_code").val(),
			modal_batch: $("#modal_batch").val(),
			modal_name: $('#modal_name').val(),
			modal_qty: $('#modal_qty').val(),
			modal_sisa: $('#modal_sisa').val(),
			penimbang: $('#penimbang').val(),
			periksa_timbang: $('#periksa_timbang').val()
        })

            .done(function (data) {
	
                setTimeout(function () {
					$('body').modalmanager('loading');
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {
                        $('#ibox_form').unblock();
						$('#cid').change();
                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                }, 2000);
            });

            $modal.modal('hide');

//			var item_code = $("#code").val();
//			var item_name = $("#nama").val();
//			var item_batch = $("#batch").val();
//			var item_qty = $("#qty").val();
//		    var item_check = $('input[name="code[]"]').map(function(){return $(this).val();}).get();
//		    var item_check1 = $('input[name="batch[]"]').map(function(){return $(this).val();}).get();
//		    var ssitem = true;
//			  for (var i = 0; i < item_check.length; i++) {
//				  if (item_check[i] === item_code && item_check1[i] === item_batch) {
//					  ssitem=false;
//			  	  }
//			  }
//			  if(ssitem === true) {                
//				$("#invoice_items").find('tbody')
//					.append(
//					'<tr class="item_name"> <td><input type="text" class="form-control item_name" name="code1[]" value="'+ item_code +'" readonly ></td> <td><input type="text" class="form-control item_name" name="name1[]" value="'+ item_name +'" readonly></td> <td><input type="text" class="form-control  item_name" value="'+ item_batch +'" name="batch1[]" readonly></td> <td><input type="text" class="form-control  item_name" name="qty1[]" value="'+ item_qty +'" readonly></td></tr>'
//				);
//			  }
//			  else {
//				alert("Item dengan No. Batch tersebut telah ada di dalam daftar !");
//			  }

//            $modal.modal('hide');

//        }, 1000);

    });

	function updateselect () {
	$('select[name="code"]').select2({
        theme: "bootstrap",
        language: {
            noResults: function () {
                return $("#_lan_no_results_found").val();
            }
        }
    });
	}
//        .on("change", function(e) {
//			var _url = $("#_url").val();
//			var ccode = this.value;
//			if(ccode != ''){
//				$.post(_url + 'prod/render-target2/', {
//					ccode: ccode
//	
//				})
//					.done(function (data) {
//	
//						$("#nama").val(data);
//	
//					});
//			}
//        });


    var $modal = $('#ajax-modal');

    $(".progress").hide();
    $("#emsg").hide();
	
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'prod/add-post-stock/', $('#rform').serialize(), function(data){

                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {
	                     $('#ibox_form').unblock();

                        $("#emsgbody").html(data);
//						alert(data);
                        $("#emsg").show("slow");
                    }
                }, 2000);
            });
    });
});