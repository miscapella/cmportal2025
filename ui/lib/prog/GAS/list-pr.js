$(document).ready(function () {
    var _url = $("#_url").val();

    $('#list-mintabarang').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/list-mintabarang/",
			'type' : 'POST',
		},
    });

    $('#datatablepr').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "createdRow": function(row, data, dataIndex) {
            const statusValue = $(data[5]).find('.status').text();
            if( statusValue == "CANCEL" ) {       
                $(row).find('.status').removeClass('btn-primary').addClass('btn-danger');
            } else if (statusValue == "PENDING") {
                $(row).find('.status').removeClass('btn-primary').addClass('btn-warning');
            } else if (statusValue == "REJECT") {
                $(row).find('.status').css({"background-color": "#FF7F7F", "border-color": "#FF7F7F"});
            }
        },
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr/",
			'type' : 'POST',
		},
    });

    $('#datatableprpending').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-pending/",
			'type' : 'POST',
		},
    });
    $('#datatableprsuppending').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-sup-pending/",
			'type' : 'POST',
		},
    });

    $('#datatableprapproved').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-approved/",
			'type' : 'POST',
		},
    });
    $('#datatableprsupapproved').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-sup-approved/",
			'type' : 'POST',
		},
    });

    $('#datatableprrejected').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-rejected/",
			'type' : 'POST',
		},
    });
    $('#datatableprsuprejected').DataTable({
        "order": [],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-pr-sup-rejected/",
			'type' : 'POST',
		},
    });

    $(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk membatalkan PR ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/pr/" + id;
           }
        });
    });

    $(document).on('click', '.status', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		$.post(_url + 'pembelian/render-status-pending/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
            var title = 'No. PR ' + obj.no_pr;
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

    $(document).on('click', '.statussup', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
		$.post(_url + 'pembelian/render-status-pending/', {
			kode: kode,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
            var title = 'No. PR ' + obj.no_pr;
			var template = '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Approval</th><th style="text-align: center; width:15%">Nama</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Status</th></tr>';
            template += '<tr style="height: 30px;"><td style="text-align: center"><b>Disetujui</b></td>';
            if(obj.sup_disetujui_nama != ''){
                template += '<td style="text-align: center">'+ obj.sup_disetujui_nama +'</td>';
                template += '<td style="text-align: center">'+ obj.sup_disetujui_tgl +'</td>';
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