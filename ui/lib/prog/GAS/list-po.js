$(document).ready(function () {
    let _url = $("#_url").val();

    $('#datatable-po').DataTable({
        "order": [2, 'desc'],
        "pagingType": "full_numbers",
		"pageLength": 25,
		"scrollX": true,
		"processing": true,
		"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
		"serverSide" : true,
        "ajax": {
			'url' : _url + "serverside/load-po1/",
			'type' : 'POST'
		},
        "createdRow": function(row, data, dataIndex) {
			if (data[4]) {
				let numberString = data[4].toString();
    			let formattedString = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
				$('td:eq(4)', row).html(`Rp ${formattedString}`);
			} else {
				$('td:eq(4)', row).html('Rp 0');
			}

            if (data[5] == "RENDAH")
                $('td:eq(5)', row).html(`<div class="text-center"><span class="status btn btn-primary btn-xs">${data[5]}</span></div>`);
            else if (data[5] == "MENENGAH")
                $('td:eq(5)', row).html(`<div class="text-center"><span class="status btn btn-warning btn-xs">${data[5]}</span></div>`);
            else if (data[5] == "TINGGI")
                $('td:eq(5)', row).html(`<div class="text-center"><span class="status btn btn-danger btn-xs">${data[5]}</span></div>`);
		},
        "initComplete": function () {
            $('#print-po').val() !== 'y' && $('.print-po').hide();
        }
    });


    $(document).on('click', '.pelunasan', function(e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var kode = $(this).attr('value');
        $.post(_url + 'pembelian/render-status-pembayaran/', {
			kode: kode,
		})
        .done(function (data) {
            var obj = jQuery.parseJSON(data);
            var title = 'Pembayaran - No. PO ' + obj.no_po;
            var template = '<table class="table table-bordered table-hover sys_table" style="width:100%">' +
                '<tr>' +
                '<th style="text-align: center; width:33%">Tanggal Bayar</th>' +
                '<th style="text-align: center; width:33%">Nilai Bayar</th>' +
                '<th style="text-align: center; width:33%">No. PO</th>' +
                '</tr>';
        
            if (obj.tgl_bayar && obj.nilai_bayar) {
                template += '<tr>' +
                    '<td style="text-align: center">' + obj.tgl_bayar + '</td>' +
                    '<td style="text-align: center">' + obj.nilai_bayar + '</td>' +
                    '<td style="text-align: center">' + obj.no_po + '</td>' +
                    '</tr>';
            } else {
                template += '<tr>' +
                    '<td colspan="3" style="text-align: center; color: red;">Data pembayaran tidak ditemukan</td>' +
                    '</tr>';
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
                        callback: function () {}
                    }
                }
            });
        });
    });

    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
           if(result){
               window.location.href = _url + "delete/po/" + id;
           }
        });
    });
});