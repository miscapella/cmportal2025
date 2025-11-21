$(document).ready(function () {
    var $modal = $('#ajax-modal');
	$(".chasil").click(function (e) {
        e.preventDefault();
        var id = this.id;
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=prod/modal-hasil/&id='+id, '', function(){
                $modal.modal();
            });
        }, 1000);
	});

    $modal.on('click', '.update', function(e){
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();

        $('body').modalmanager('loading');
        $.post(_url + 'prod/add-hasil/', {

			cid: $("#id").val(),
			modal_qty: $('#qty').val()
        })

            .done(function (data) {
	
                setTimeout(function () {
					$('body').modalmanager('loading');
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {
                        $('#ibox_form').unblock();
                        alert(data);
						location.reload();
                    }
                }, 200);
            });

            $modal.modal('hide');

    });

    $(".progress").hide();
	
});