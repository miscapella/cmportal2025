$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    var _url = $("#_url").val();

    //
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        var $data = new FormData();
        $data.append('link_zoom',CKEDITOR.instances.link_zoom.getData());
        $data.append('cid',$('#cid').val());
        $data.append('subjek',$('#subjek').val());
        
        $.ajax({
			url: _url + 'book_zoom/edit-post/',
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