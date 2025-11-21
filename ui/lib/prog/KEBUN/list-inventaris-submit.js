$(document).ready(function () {
	$('#emsg').hide();
    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
        //item_remove.hide();
    });
	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		//$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var kd_item = [];
		$.each($("input[name='chk[]']:checked"), function(){
			kd_item.push($(this).closest('tr').find("input[name='kd_item[]']").val());
		});
		var $data = new FormData();
		$data.append('kd_item', kd_item);
		$data.append('kd_inventaris', $('#kd_inventaris').val());
		$.ajax({
			url: _url + 'inventaris/submit-post/',
			type: 'POST',
			data: $data,
			cache: false,
			//dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
				var obj = jQuery.parseJSON(data);
				if ($.isNumeric(obj.dataval)) {
					$('.overlay').hide();
					var body = $("html, body");
					bootbox.alert({
						message: obj.msg,
						backdrop: true,
						timeout : 2000,
						callback: function(){ 
							window.location.reload();
						}
					});
				}
				else {
					$("#submit").prop('disabled',false);
					$('.overlay').hide();
					var body = $("html, body");
					body.animate({scrollTop:0}, '50', 'swing');
					$("#emsg").attr('style',  'background-color:#e46f61');
					$("#emsgbody").html(obj.msg);
					$("#emsg").show('slow');
					jQuery('#emsgbody').animate({
							 scrollTop: jQuery('#emsg').scrollTop()-150
						 }, 500);
					
					$("#emsg").delay(5200).fadeOut(500);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404]';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				alert(msg);
				//location.reload();
			}
		});
    });
});