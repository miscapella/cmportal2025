$(document).ready(function () {
    var _url = $("#_url").val();
    var $modal = $('#ajax-modal');
    $(".progress").hide();
    $("#emsg").hide();

    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'purchase/stock-post/', $('#invform').serialize(), function(data){
			setTimeout(function () {
				var sbutton = $("#submit");
				var _url = $("#_url").val();
				if ($.isNumeric(data)) {
					alert('Penerimaan Barang telah berhasil disimpan');
					window.location = _url + 'purchase/list/';
				}
				else {
					$('#ibox_form').unblock();
					var body = $("html, body");
					body.animate({scrollTop:0}, '1000', 'swing');
					$("#emsgbody").html(data);
					$("#emsg").show("slow");
				}
			}, 2000);
        });
    });
});