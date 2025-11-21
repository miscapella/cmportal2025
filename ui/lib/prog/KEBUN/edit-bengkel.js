$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();

	$('#tglstnk').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});

	$('#tglservice').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
		endDate: new Date(new Date().setDate(new Date().getDate()))
	}).css({"cursor":"pointer", "background":"white"});
    //
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
		$(this).attr('disabled','disabled');
        var _url = $("#_url").val();
        $.post(_url + 'inventaris/edit-post/', $( "#rform" ).serialize())
            .done(function (data) {

                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        window.location = _url + 'inventaris/list';
                    }
                    else {
						$('#submit').removeAttr('disabled');
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