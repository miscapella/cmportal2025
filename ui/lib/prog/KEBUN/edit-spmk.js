$(document).ready(function () {
	$('#emsg').hide();
	$('#emsgModal').hide();
	
	
	$(".detail-kontraktor").click(function (e) {
		
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		var xx = new Intl.NumberFormat('de-DE');
		$.post(_url + 'itemstock/render-detail-supplier/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			var template = '<table style="width:100%"><tr><td><b>Detail Kontraktor</b><td></tr><tr><td style="width:30%">Kode Kontraktor</td>';
			template += '<td>: '+ kode +'</td></tr>';
			template += '<tr><td>Nama Supplier</td>';
			template += '<td>: '+ obj.nama +'</td></tr>';
			template += '<tr><td>Bidang</td>';
			template += '<td>: '+ obj.bidang +'</td></tr>';
			template += '<tr><td>Foto Toko</td>';
			template += '<td>: '+ obj.foto_toko +'</td></tr>';
			template += '<tr><td>Telp Toko</td>';
			split_telp_toko = obj.telp_toko.split("|");
			template += '<td>: +'+ split_telp_toko[0] +' ('+ split_telp_toko[1] +') '+ split_telp_toko[2] +'</td></tr>';
			template += '<tr><td>Hp Toko</td>';
			split_hp_toko = obj.hp_toko.split("|");
			template += '<td>: +'+ split_hp_toko[0] +' '+ split_hp_toko[1] +'</td></tr>';
			template += '<tr><td>Email</td>';
			template += '<td>: '+ obj.email +'</td></tr>';
			template += '<tr><td>Website</td>';
			template += '<td>: '+ obj.website + '</td></tr>';
			template += '<tr><td>Tanggal Mulai Kerjasama</td>';
			template += '<td>: '+ obj.tgl_mulai_kerjasama +'</td></tr>';
			template += '<tr><td>Lama Pembayaran</td>';
			template += '<td>: '+ obj.lama_pembayaran +' Hari</td></tr>';
			template += '<tr><td>Rekomendasi Dari</td>';
			template += '<td>: '+ obj.rekomendasi_dari +'</td></tr>';
			template += '<tr><td>NIB</td>';
			template += '<td>: '+ obj.nib +'</td></tr>';
			template += '<tr><td>File NIB</td>';
			template += '<td>: '+ obj.file_nib +'</td></tr>';
			template += '<tr><td>NPWP</td>';
			template += '<td>: '+ obj.npwp +'</td></tr>';
			template += '<tr><td>File NPWP</td>';
			template += '<td>: '+ obj.file_npwp +'</td></tr>';
			template += '<tr><td>File Kontrak</td>';
			template += '<td>: '+ obj.file_kontrak +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Alamat</b><td>';
			template += '<tr><td>Negara</td>';
			template += '<td>: '+ obj.negara +'</td></tr>';
			template += '<tr><td>Provinsi</td>';
			template += '<td>: '+ obj.provinsi +'</td></tr>';
			template += '<tr><td>Kota</td>';
			template += '<td>: '+ obj.kota +'</td></tr>';
			template += '<tr><td>Kelurahan</td>';
			template += '<td>: '+ obj.kelurahan +'</td></tr>';
			template += '<tr><td>Kecamatan</td>';
			template += '<td>: '+ obj.kecamatan +'</td></tr>';
			template += '<tr><td>Kotamadya / Kabupaten</td>';
			template += '<td>: '+ obj.kotamadya +'</td></tr>';
			template += '<tr><td>RT / RW</td>';
			template += '<td>: '+ obj.rtrw +'</td></tr>';
			template += '<tr><td>Alamat</td>';
			template += '<td>: '+ obj.alamat +'</td></tr>';
			template += '<tr><td>Nomor Gedung</td>';
			template += '<td>: '+ obj.nomor_gedung +'</td></tr>';
			template += '<tr><td>Kode Pos</td>';
			template += '<td>: '+ obj.kode_pos +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Contact</b><td>';
			template += '<tr><td>File Ktp</td>';
			template += '<td>: '+ obj.file_ktp +'</td></tr>';
			template += '<tr><td>Nama Pemilik</td>';
			template += '<td>: '+ obj.nama_pemilik +'</td></tr>';
			template += '<tr><td>Hp Pemilik</td>';
			split_hp_pemilik = obj.hp_pemilik.split("|");
			template += '<td>: +'+ split_hp_pemilik[0] +' '+ split_hp_pemilik[1] +'</td></tr>';
			template += '<tr><td>Nama Emergency</td>';
			template += '<td>: '+ obj.nama_emergency +'</td></tr>';
			template += '<tr><td>Hp Emergency</td>';
			split_hp_emergency = obj.hp_emergency.split("|");
			template += '<td>: +'+ split_hp_emergency[0] +' '+ split_hp_emergency[1] +'</td></tr>';
			template += '<tr><td>Nama Contact</td>';
			template += '<td>: '+ obj.nama_contact +'</td></tr>';
			template += '<tr><td>Hp Contact</td>';
			split_hp_contact = obj.hp_contact.split("|");
			template += '<td>: +'+ split_hp_contact[0] +' '+ split_hp_contact[1] +'</td></tr>';
			template += '<tr><td>.</td></tr><tr><td><b>Detail Rekening</b><td>';
			template += '<tr><td>Bank</td>';
			template += '<td>: '+ obj.bank +'</td></tr>';
			template += '<tr><td>No Rekening</td>';
			template += '<td>: '+ obj.no_rekening +'</td></tr>';
			template += '<tr><td>AN Rekening</td>';
			template += '<td>: '+ obj.an_rekening +'</td></tr>';
			bootbox.alert(template, function () {
				console.log('This was logged in the callback!');
			});
		});
	});
	
    $(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
    });
	$('#idate').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
	}).css({"cursor":"pointer", "background":"white"});
	$('.tgl').datepicker({ 
		changeMonth: true, 
		changeYear: true, 
		format: 'dd-mm-yyyy',
		autoclose:true,
		todayHighlight:true,
	}).css({"cursor":"pointer", "background":"white"});
	$('#priority').select2({
		theme: "bootstrap",
		width: '100%'
	});
    $('#add').on('click', function(){
		var clist = '<tr><td><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none"><a><i class="fa fa-remove hapus" style="color:red"></i></a></td>';
		clist += '<td><input style="width:100%;" type="text" name="spesifikasi[]" class="spesifikasi"></td>';
        clist += '<td><input style="width:100%;" type="text" name="block[]" class="block"></td>';
        clist += '<td><input style="width:100%;" type="text" name="ha[]" class="ha"></td>';
        clist += '<td><input style="width:100%;" type="text" name="pkk[]" class="pkk"></td>';
		$(".sys_table").find('tbody')
			.append(clist);
    });

	$("#save").click(function (e) {
        e.preventDefault();
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
		$('.overlay').show();
		$(this).attr('disabled','disabled');
		var _url = $("#_url").val();
		var spesifikasi = [];
		var block = [];
		var ha = [];
		var pkk = [];
		$.each($("input[name='chk[]']:checked"), function(){
			spesifikasi.push($(this).closest('tr').find("input[name='spesifikasi[]']").val());
			block.push($(this).closest('tr').find("input[name='block[]']").val());
			ha.push($(this).closest('tr').find("input[name='ha[]']").val());
			pkk.push($(this).closest('tr').find("input[name='pkk[]']").val());
		});
		var $data = new FormData();
		$data.append('spesifikasi', spesifikasi);
		$data.append('block', block);
		$data.append('ha', ha);
		$data.append('pkk', pkk);
		$data.append('idate', $('#idate').val());
		$data.append('priority', $('#priority').val());
		$data.append('divisi', $('#divisi').val());
		$data.append('jenis_pekerjaan', $('#jenis_pekerjaan').val());
		$data.append('lokasi', $('#lokasi').val());
		$data.append('afdeling', $('#afdeling').val());
        $data.append('no_spmk', $('#no_spmk').val());
		bootbox.confirm('Apakah anda yakin untuk membuat SPmK ?', function(result) {
			if(result){
				bootbox.dialog({
					message: '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
					closeButton: false
				});
				$.ajax({
					url: _url + 'pembelian/edit-spmk-post/',
					type: 'POST',
					data: $data,
					cache: false,
					processData: false, 
					contentType: false, 
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
									window.location = _url + 'pembelian/list-spmk-pending/SPmK Berhasil Diubah';
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
							bootbox.hideAll()
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
					}
				});
			} else {
				$('#save').removeAttr('disabled');
			}
		});
    });
});