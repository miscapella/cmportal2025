$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();
    function update_address(){
        var _url = $("#_url").val();
        var cid = $('#cid').val();
        if(cid != ''){
            $.post(_url + 'contacts/render-address/', {
                cid: cid

            })
                .done(function (data) {
                    var adrs = $("#address");


                    adrs.html(data);

                });
        }

    }
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
    $('#contact_add').on('click', function(e){
        e.preventDefault();
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=contacts/modal_add/', '', function(){
                $modal.modal();
                $("#ajax-modal .country").select2({
                    theme: "bootstrap"
                });
            });

        }, 1000);
    });
    $modal.on('click', '.contact_submit', function(e){
        e.preventDefault();
      //  var tableControl= document.getElementById('items_table');
        $modal.modal('loading');
        setTimeout(function(){
          //  $modal.modal('loading');


            var _url = $("#_url").val();
            $.post(_url + 'contacts/add-post/', {


                account: $('#account').val(),
                company: $('#company').val(),
                address: $('#m_address').val(),

                city: $('#city').val(),
                state: $('#state').val(),
                zip: $('#zip').val(),
                country: $('#country').val(),
                phone: $('#phone').val(),
                id_no: $('#id_no').val(),
                email: $('#email').val()

            })
                .done(function (data) {

                    setTimeout(function () {
						jQuery('#ajax').html(loader);
					},100);

					var _url = $("#_url").val();
					var obj = jQuery.parseJSON(data);
					if (obj.msg == '') {
						$modal.modal('hide');
						$("#cid").append(obj.dataopt);
						$("#cid").val(obj.dataval).trigger('change');
						//$('#cid').children('option:not(:first)').remove();
					}
					else {

						$modal
							.modal('loading')
							.find('.modal-body')
							.prepend('<div class="alert alert-danger fade in">' + obj.msg +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'</div>');
						$("#cid").select2(obj.dataval, {id: newID, text: newText});
					}
                });


        }, 200);

    });
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'pesanan/edit-post/', $( "#invform" ).serialize())
            .done(function (data) {
                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
					var obj = jQuery.parseJSON(data);
                    if ($.isNumeric(obj.dataval)) {
                        alert(obj.msg);
                        window.location = _url + 'pesanan/list/';
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