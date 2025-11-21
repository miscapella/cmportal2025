$(document).ready(function () {
    var _url = $("#_url").val();
	$('#progressbar').hide();
    function updateDiv () {
		var kata = $('#kata').val();
 		$.post(_url + 'cari/modal-cari/', {
			kata: kata,
			_url: _url
		})
		.done(function (data) {
			var result =  $("#sysfrm_ajaxrender");
			$('#progressbar').html('<b>Hasil Pencarian : '+kata+'</b>');
			$('#ibox_form').unblock();
			result.html(data);
			result.show();
//			$('#items_table').find('tbody')
//				.append(data);
		});
	}
	updateDiv();
	$("#search").click(function (e) {
        e.preventDefault();
        updateDiv();
		$('#progressbar').show();
//		$('.pagination').hide(); 

   });
    $("#reset").click(function (e) {
        e.preventDefault();
		$('#kata').val('');
        updateDiv();
		$('#progressbar').hide();
//		$('.pagination').show(); 
    });
});