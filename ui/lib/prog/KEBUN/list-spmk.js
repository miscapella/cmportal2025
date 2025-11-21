$(document).ready(function () {
    var _url = $("#_url").val();

    $('#datatablepending').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spmk-pending/",
			'type' : 'POST',
		},
    });

    $('#datatablebiddingpending').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spmk-bidding-pending/",
			'type' : 'POST',
		},
    });

    $('#datatablependings').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spnk-pending/",
			'type' : 'POST',
		},
    });

    $('#datatableapproved').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spmk-approved/",
			'type' : 'POST',
		},
    });

    $('#datatablebiddingapproved').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spmk-bidding-approved/",
			'type' : 'POST',
		},
    });

    $('#datatableapproveds').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spnk-approved/",
			'type' : 'POST',
		},
    });

    $('#datatablespmkrejected').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 10,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spmk-rejected/",
			'type' : 'POST',
		},
    });

    $('#datatablespmksuprejected').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 10,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spmk-sup-rejected/",
			'type' : 'POST',
		},
    });
    $('#datatablerejecteds').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-spnk-rejected/",
			'type' : 'POST',
		},
    });

	$('.dataTables_processing').css({"display": "block", "z-index": 10000 });

    $(document).on('click', '.cdelete', function(e) {
		e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk menghapus data SPmK ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/spmk/" + id;
           }
        });
   	});

    //Status SPMK
    $(document).on('click', '.status', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		$.post(_url + 'pembelian/render-status-spmk-pending/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
            var title = 'No. SPmK ' + obj.no_spmk;
			var template = '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Approval</th><th style="text-align: center; width:15%">Nama</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Status</th></tr>';
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Diperiksa</b></td>';
            if(obj.diperiksa_nama != ''){
                template += '<td style="text-align: center">'+ obj.diperiksa_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.diperiksa_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            template += '</tr>'
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Diketahui</b></td>';
            if(obj.diketahui_nama != ''){
                template += '<td style="text-align: center">'+ obj.diketahui_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.diketahui_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            template += '</tr>'
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Disetujui</b></td>';
            if(obj.disetujui_nama != ''){
                template += '<td style="text-align: center">'+ obj.disetujui_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.disetujui_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            template += '</tr>'
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Disurvey</b></td>';
            if(obj.disurvey_nama != ''){
                template += '<td style="text-align: center">'+ obj.disurvey_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.disurvey_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            template += '</tr>'
            if(obj.pesan != ''){
                template += '<tr><td colspan="4"><b>Pesan</b></td></tr>';
                template += '<tr><td colspan="4">'+ obj.pesan +'</td></tr>';
            }
            template += '</table>'
			bootbox.dialog({
                size: 'large',
                title: title,
                message: template,
                buttons: {
                    cancel: {
                        label: 'Close',
                        className: 'btn-danger',
                        callback: function(){
                        }
                    }
                }
			});
		});
	});


    //Status SPMK Bidding
    $(document).on('click', '.statusbidding', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		$.post(_url + 'pembelian/render-status-spmk-bidding/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
            var title = 'No. SPmK ' + obj.no_spmk;
			var template = '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Approval</th><th style="text-align: center; width:15%">Nama</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Status</th></tr>';
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Disetujui Asisten Direksi</b></td>';
            if(obj.ktr_disetujui_nama != ''){
                template += '<td style="text-align: center">'+ obj.ktr_disetujui_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.ktr_disetujui_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            template += '</tr>'
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Disetujui Direksi</b></td>';
            if(obj.ktr_disetujui_dir_nama != ''){
                template += '<td style="text-align: center">'+ obj.ktr_disetujui_dir_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.ktr_disetujui_dir_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            
            template += '</tr>'
            if(obj.pesan != ''){
                template += '<tr><td colspan="4"><b>Pesan</b></td></tr>';
                template += '<tr><td colspan="4">'+ obj.pesan +'</td></tr>';
            }
            template += '</table>'
			bootbox.dialog({
                size: 'large',
                title: title,
                message: template,
                buttons: {
                    cancel: {
                        label: 'Close',
                        className: 'btn-danger',
                        callback: function(){
                        }
                    }
                }
			});
		});
	});

    $(document).on('click', '.statusktr', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		$.post(_url + 'pembelian/render-status-spmk-pending/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
            var title = 'No. PR ' + obj.no_pr;
			var template = '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Approval</th><th style="text-align: center; width:15%">Nama</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Status</th></tr>';
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Disetujui</b></td>';
            if(obj.ktr_disetujui_nama != ''){
                template += '<td style="text-align: center">'+ obj.ktr_disetujui_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.ktr_disetujui_tgl +'</td>';
                template += '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
            } else {
                template += '<td style="text-align: center">Belum</td>';
                template += '<td style="text-align: center">-</td>';
                template += '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
            }
            template += '</tr>';
            if(obj.pesan != ''){
                template += '<tr><td colspan="4"><b>Pesan</b></td></tr>';
                template += '<tr><td colspan="4">'+ obj.pesan +'</td></tr>';
            }
            template += '</table>';
			bootbox.dialog({
                size: 'large',
                title: title,
                message: template,
                buttons: {
                    cancel: {
                        label: 'Close',
                        className: 'btn-danger',
                        callback: function(){
                        }
                    }
                }
			});
		});
	});
});