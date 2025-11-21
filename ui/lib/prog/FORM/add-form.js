function escapeRegExp(string) {
	return string.replace(/[.^$*+?()[{|\\]/g, "\\$&"); // $& means the whole matched string
}
  
function replaceAll(str, find, replace) {
	return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

$(document).ready(function () {
	$('#emsg').hide();
	$('.tipe_data').select2({
        theme: "bootstrap",
	});

	$(document).on('click', '.hapus', function(e) {
        $(this).closest('.panel-body').fadeOut(300, function(){
            $(this).closest('.panel-body').remove();
        });
    });

	$(document).on('click', '.hapus_section', function(e) {
        $(this).closest('.row').fadeOut(300, function(){
            $(this).closest('.row').remove();
        });
    });

	$(document).on('click', '.add_question', function(e) {
		var opt = $('#tipe_data').html();
		var cid = this.id;
		var section = cid.replace("question", "");
		var target = "#isi_" + cid;
		var clist = '';
		clist += '<div class="panel-body">';
		clist += '<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>';
		clist += '<div style="display:none"><input type="number" id="question_number" name="question_number[]" class="form-control" value='+section+'></div>';
		clist += '<div class="form-group"><label class="col-lg-2 control-label text-right" for="pertanyaan">Question</label>';
		clist += '<div class="col-lg-6"><input type="text" id="pertanyaan" name="pertanyaan[]" class="form-control"></div>';
		clist += '<div class="col-lg-3"><select name="tipe_data[]" class="tipe_data" id="tipe_data">'+opt+'</select></div>';
		clist += '<div class="col-lg-1 text-right">';
		clist += '<button class="btn btn-danger btn-sm hapus" name="delete_question" title="Delete Question"><i class="fa fa-times"></i></button></div></div><br>';
		clist += '<div class="form-group"><label class="col-lg-2 control-label text-right" for="keterangan">Description</label>';
		clist += '<div class="col-lg-10"><textarea type="text" id="keterangan" name="keterangan[]" class="form-control" rows="2"></textarea>';
		clist += '</div></div></div>';
		$(target)
			.append(clist);
		$('.tipe_data').select2({
			theme: "bootstrap",
		});
    });

	$('#add_section').on('click', function(){
		var opt = $('#tipe_data').html();
		var section_number = $("#section_number").val();
		var tambah = parseInt(section_number) + 1;
		$("#section_number").val(tambah);
		var clist = '';
		clist += '<div class="row"><div class="col-md-12"><div class="panel panel-default"><div class="panel-body" style="background-color: #ccc;">';
		clist += '<div class="col-md-1"></div>'
		clist += '<h3 class="col-md-10" style="text-align: center;"><b>SECTION ';
		// clist += tambah;
		clist += '</b></h3>';
		clist += '<div class="col-md-1 text-right"><button class="btn btn-danger btn-sm hapus_section" name="delete_section" title="Delete Section"><i class="fa fa-times"></i></button></div>'
		clist += '</div></div></div>';
		clist += '<div class="col-md-12"><div class="panel panel-default"><div class="panel-body">';
		clist += '<td style="vertical-align: middle;"><input type="checkbox" name="chks[]" class="cekbox" checked="checked" style="display:none"></td>';
		clist += '<div style="display:none"><input type="number" id="section" name="section[]" class="form-control" value='+tambah+'></div>';
		clist += '<div class="form-group"><label class="col-lg-3 control-label" for="form_title">Section Title </label>';
		clist += '<div class="col-lg-9"><input type="text" id="form_title" name="form_title[]" class="form-control"></div></div><br>';
		clist += '<div class="form-group"><label class="col-lg-3 control-label" for="form_description">Section Description </label>';
		clist += '<div class="col-lg-9"><textarea type="text" id="form_description" name="form_description[]" class="form-control" rows="5"></textarea></div></div><br>';
		clist += '</div></div></div>';
		clist += '<div class="col-md-12"><div class="panel panel-default isi_question" id="isi_question';
		clist += tambah;
		clist += '"><div class="panel-body">';
		clist += '<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"></td>';
		clist += '<div style="display:none"><input type="number" id="question_number" name="question_number[]" class="form-control" value='+tambah+'></div>';
		clist += '<div class="form-group"><label class="col-lg-2 control-label text-right" for="pertanyaan">Question</label>';
		clist += '<div class="col-lg-6"><input type="text" id="pertanyaan" name="pertanyaan[]" class="form-control"></div>';
		clist += '<div class="col-lg-4"><select name="tipe_data[]" class="tipe_data" id="tipe_data">'+opt+'</select></div></div><br>';
		clist += '<div class="form-group"><label class="col-lg-2 control-label text-right" for="keterangan">Description</label>';
		clist += '<div class="col-lg-10"><textarea type="text" id="keterangan" name="keterangan[]" class="form-control" rows="2"></textarea>';
		clist += '</div></div></div></div>';
		clist += '<div class="panel-body text-center">';
		clist += '<button class="btn btn-success btn-sm add_question" name="add_question" id="question';
		clist += tambah;
		clist += '" title="Add Question"><i class="fa fa-plus"></i></button>';
		clist += '</div></div></div>';
		$(".isi_form")
			.append(clist);
		$('.tipe_data').select2({
			theme: "bootstrap",
		});
    });

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();

		var section_title = [];
		var section_description = [];
		$.each($("input[name='chks[]']:checked"), function(){
			section_title.push(replaceAll($(this).closest('div').find("input[name='form_title[]']").val(), ",", "."));
			section_description.push(replaceAll($(this).closest('div').find("textarea[name='form_description[]']").val(), ",", "."));
		});

		var question = [];
		var question_description = [];
		var tipe = [];
		var question_section = [];
		$.each($("input[name='chk[]']:checked"), function(){
			question_section.push($(this).closest('div').find("input[name='question_number[]']").val());
			question.push(replaceAll($(this).closest('div').find("input[name='pertanyaan[]']").val(), ",", "."));
			question_description.push(replaceAll($(this).closest('div').find("textarea[name='keterangan[]']").val(), ",", "."));
			tipe.push($(this).closest('div').find("select[name='tipe_data[]'] option").filter(':selected').val());
		});
		var $data = new FormData();
		$data.append('section_title', section_title);
		$data.append('section_description', section_description);
		$data.append('question', question);
		$data.append('question_description', question_description);
		$data.append('tipe', tipe);
		$data.append('question_section', question_section);
		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'form/add-post/',
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