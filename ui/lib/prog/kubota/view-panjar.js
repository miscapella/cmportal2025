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
	$('#terbilang').val(terbilang($('#jlh').val()));
    $("#submit").click(function (e) {
        e.preventDefault();
		var _url = $("#_url").val();
		window.location = _url + 'panjar/list/';
	});
});