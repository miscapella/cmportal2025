function escapeRegExp(string) {
	return string.replace(/[.^$*+?()[{|\\]/g, "\\$&"); // $& means the whole matched string
}
  
function replaceAll(str, find, replace) {
	return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

$(document).ready(function () {
	$('#emsg').hide();

    $(document).on('click', '.hapus', function(e) {
        $(this).closest('.form-group').fadeOut(300, function(){
            $(this).closest('.form-group').remove();
        });
    });

	$(document).on('click', '#opsi', function(e) {
        var clist = '';
        clist += '<div class="form-group">';
        clist += '<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>';
        clist += '<label class="col-lg-3 control-label text-right" for="option">Option</label>';
		clist += '<div class="col-lg-8">';
		clist += '<input type="text" id="option" name="option[]" class="form-control"></div>';
        clist += '<div class="col-lg-1 text-right">';
        clist += '<button class="btn btn-danger btn-sm hapus" name="delete_option" title="Delete Option"><i class="fa fa-times"></i></button></div><br></div>';
		$('#option-group')
			.append(clist);
    });

	$("#save").click(function (e) {
		
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var options = [];
		$.each($("input[name='chk[]']:checked"), function(){
			options.push(replaceAll($(this).closest('div').find("input[name='option[]']").val(), ",", "."));
		});
		var $data = new FormData();
		$data.append('options', options);
        $data.append('kode', $('#kode').val());
        $data.append('nama', $('#nama').val());
        $data.append('tipe', $('#tipe').val());
        $data.append('keterangan', $('#keterangan').val());

		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'datatype/add-post/',
					type: 'POST',
					data: $data,
					cache: false,
					//dataType: 'json',
					processData: false, // Don't process the files
					contentType: false, // Set content type to false as jQuery will tell the server its a query string request
					success: function(data, textStatus, jqXHR)
					{
						var obj = jQuery.parseJSON(data);
						if (obj.dataval == 1) {
							$('.overlay').hide();
							var body = $("html, body");
							bootbox.alert({
								message: obj.msg,
								backdrop: true,
								timeout : 2000,
								callback: function(){
									window.location = _url + 'datatype/list/';
								}
							});
						} else {
							$('#save').removeAttr('disabled');
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
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });
});