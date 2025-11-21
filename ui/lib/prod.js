$(document).ready(function () {
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
				$.post(_url + 'prod/render-target/', {
					cid: cid
	
				})
					.done(function (data) {
						var cta = $("#cta");
	
	
						cta.html(data);
	
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
        $.post(_url + 'prod/add-post/', $('#rform').serialize(), function(data){

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