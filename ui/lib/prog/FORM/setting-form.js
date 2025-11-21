$(document).ready(function () {
	$('.section').select2();
    $('.question').select2();
    $('.value').select2();
    $('.target').select2();
	$('#emsg').hide();
    $('#add').on('click', function(){
		var opt = $('#opt').html();
			var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><select name="section[]" class="section" id="section">'+ opt +'</select></td>';
			clist += '<td><select name="question[]" class="question" id="question"><option value="">Pilih Question</option></select></td>';
			clist += '<td><select name="value[]" class="value" id="value"><option value="">Pilih Value</option></select></td>';
			clist += '<td><select name="target[]" class="target" id="target">'+opt+'</select></td>';
			clist += '<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td></tr>';
			$(".sys_table").find('tbody')
				.append(clist);
			$('.section').select2();
			$('.question').select2();
			$('.value').select2();
			$('.target').select2();
    });
    $(document).on('click', '.hapus', function(e) {
		var posisi = $(this).closest('tr');
        posisi.fadeOut(300, function(){
            posisi.remove();
        });
        //item_remove.hide();
    });
	$(document).on('change', '.question', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
        var kode_form = $("#kode_form").val();
        var item = $(this).closest('tr').find(".value");
		$.post(_url + 'form/render-value/', {
			kode: kode,
            kode_form: kode_form,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$(this).closest('#value').trigger("change");
		});
    });
    $(document).on('change', '.section', function(e) {
		var kode = $(this).val();
		var _url = $("#_url").val();
        var kode_form = $("#kode_form").val();
        var item = $(this).closest('tr').find(".question");
		$.post(_url + 'form/render-question/', {
			kode: kode,
            kode_form: kode_form,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			item.html(obj.opt);
			$(this).closest('#question').trigger("change");
		});
    });
    
	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		var _url = $("#_url").val();
		var start = [];
        var value = [];
        var target = [];
		$.each($("input[name='chk[]']:checked"), function(){
			start.push($(this).closest('tr').find("select[name='question[]'] option").filter(':selected').val());
            value.push($(this).closest('tr').find("select[name='value[]'] option").filter(':selected').val());
            target.push($(this).closest('tr').find("select[name='target[]'] option").filter(':selected').val());
		});
		var $data = new FormData();
        $data.append('start', start);
        $data.append('value', value);
        $data.append('target', target);
		$data.append('kode_form', $('#kode_form').val());
		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'form/setting-post/',
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
									window.location = _url + 'form/list/';
								}
							});
						} else {
                            alert('tes');
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