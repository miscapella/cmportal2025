$(document).ready(function () {
	$('.target').select2();
	$('.condition').select2();
	$('.value').select2();
	$('#emsg').hide();
	$(document).on('click', '.addCase', function(e) {
		var kondisi = $('#kondisi').html();
		var opt = $('#opt').html();
		var cid = this.id;
		var cases = cid.replace("case", "");
		var target = "#isi_" + cid;
		var clist = '';
		var level = ''
		for (let i = 1; i < 11; i++) {
			level += '<option value="'+ i +'">Approval Level '+ i +'</option>';
		}
		clist += '<tr>';
		clist += '<td style="text-align:center"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">Case</td>';
		clist += '<td style="display:none"><input type="number" id="case_number" name="case_number[]" class="form-control" value='+cases+'></td>';
		clist += '<td><select name="condition[]" class="condition" id="condition"><option value="">Pilih Kondisi</option><option value="golongan">Tingkatan</option>'+ kondisi +'</select></td>';
		clist += '<td><select name="value[]" class="value" id="value"><option value="">Pilih Nilai</option></select></td>';
		clist += '<td><select name="target[]" class="target" id="target"><option value="">Pilih Target</option>'+level+'<option value="manager">Atasan Langsung</option><option value="supervisor">Atasan Langsung Berikutnya</option>'+opt+'</select></td>';
		clist += '<td class="text-right"><button type="button" class="btn btn-danger hapus btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>';
		clist += '</tr>';
		$(target).find('tbody')
			.append(clist);
		$('.target').select2();
		$('.condition').select2();
		$('.value').select2();
    });

	$('#addLevel').on('click', function(){
		var kondisi = $('#kondisi').html();
		var opt = $('#opt').html();
		var level_number = $("#level_number").val();
		var tambah = parseInt(level_number) + 1;
		$("#level_number").val(tambah);
        var clist = '<table class="table table-bordered table-hover sys_table" id="isi_case'+tambah+'"><thead><tr>';
        clist += '<th style="width: 5%; text-align: center;">Level</th>';
		clist += '<th style="width: 35%; text-align: center;">Condition</th>';
		clist += '<th style="width: 25%; text-align: center;">Value</th>';
		clist += '<th style="width: 25%; text-align: center;">Target</th>';
		clist += '<th class="width: 10%; text-right">Manage</th></tr></thead>';
		clist += '<tbody><tr>';
		clist += '<td style="text-align:center"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">'+tambah+'</td>';
		clist += '<td style="display:none"><input type="number" id="case_number" name="case_number[]" class="form-control" value='+tambah+'></td>';
		clist += '<td><select name="condition[]" class="condition" id="condition"><option value="default">Default</option></select></td>';
		clist += '<td><select name="value[]" class="value" id="value"><option value="default">Default</option></select></td>';
		clist += '<td><select name="target[]" class="target" id="target"><option value="">Pilih Target</option><option value="manager">Atasan Langsung</option><option value="supervisor">Atasan Langsung Berikutnya</option>'+opt+'</select></td>';
		clist += '<td class="text-right"><button type="button" class="btn addCase btn-primary btn-sm" id="case'+tambah+'"><i class="fa fa-plus"></i> Tambah Case</button> <button type="button" class="btn btn-danger hapus_level btn-sm"><i class="fa fa-trash"></i> Hapus</button></td>';
		clist += '</tr></tbody></table>';
		var dlist = 'tes';
        $(".level").append(clist);
        $('.target').select2();
		$('.condition').select2();
		$('.value').select2();
    });
	$(document).on('change', '.condition', function(e) {
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
			$("#value").trigger("change");
		});
    });
    $(document).on('click', '.hapus', function(e) {
		var posisi = $(this).closest('tr');
        posisi.fadeOut(300, function(){
            posisi.remove();
        });
    });
	$(document).on('click', '.hapus_level', function(e) {
        $(this).closest('.sys_table').fadeOut(300, function(){
            $(this).closest('.sys_table').remove();
        });
    });
	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		var _url = $("#_url").val();
        var kode = $("#kode_form").val();

		var condition = [];
		var condition_value = [];
		var condition_target = [];
		var case_number = [];
		$.each($("input[name='chk[]']:checked"), function(){
			condition_target.push($(this).closest('tr').find("select[name='target[]'] option").filter(':selected').val());
			condition_value.push($(this).closest('tr').find("select[name='value[]'] option").filter(':selected').val());
			condition.push($(this).closest('tr').find("select[name='condition[]'] option").filter(':selected').val());
			case_number.push($(this).closest('tr').find("input[name='case_number[]']").val());
		});

		var $data = new FormData();
        $data.append('condition', condition);
		$data.append('condition_value', condition_value);
		$data.append('condition_target', condition_target);
		$data.append('case_number', case_number);
		$data.append('kode_form', $('#kode_form').val());
		bootbox.confirm('Klik OK Untuk SIMPAN', function(result) {
			if(result){
				$.ajax({
					url: _url + 'form/approval-post/',
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