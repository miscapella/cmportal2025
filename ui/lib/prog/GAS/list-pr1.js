$(document).ready(function () {
    let _url = $("#_url").val();
    let print = $("#print").val() === 'y';
    let cancel = $("#cancel").val() === 'y';
    let tableData = [];  // Store table data from serverside
    let filteredTableData = [];  // Table data shown following user status' filter

    // Load data from serverside and keep it in tableData variable
    $.ajax({
        url: _url + "serverside/load_pr/",
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            tableData = data;
            filteredTableData = data;
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ', status, error);
        },
        complete: function() {
            loadTable();
        }
    });

    // Create table and destroy table when user changes status' filter
    function loadTable() {
        $('#list-permintaan').DataTable({
            "pagingType": "full_numbers",
            "pageLength": 25,
            "scrollX": true,
            "processing": true,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "data": filteredTableData,
            "serverSide" : false,
            "createdRow": function(row, data, dataIndex) {
                if (data[3] == "PENDING")
                    $('td:eq(3)', row).html(`<div class="text-center"><span class="status btn btn-warning btn-xs">${data[3]}</span></div>`);
                else if (data[3] == "REJECT")
                    $('td:eq(3)', row).html(`<div class="text-center"><span class="status btn btn-danger btn-xs">REJECTED</span></div>`);
                else if (data[3] == "CANCEL")
                    $('td:eq(3)', row).html(`<div class="text-center"><span class="status btn btn-danger btn-xs">CANCELLED</span></div>`);
                else
                    $('td:eq(3)', row).html(`<div class="text-center"><span class="status btn btn-primary btn-xs">APPROVED</span></div>`);

                if (data[3] == "PENDING")
                    if (cancel)
                        $('td:eq(4)', row).html(`<div class="text-right">
                            <a class="btn btn-danger btn-xs cdelete" id="uid${data[4]}"><i class="fa fa-trash"></i> Cancel</a>
                            <a href="${_url}permintaan/detail-pr/${data[4]}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                        </div>`);
                    else
                        $('td:eq(4)', row).html(`<div class="text-right">
                            <a href="${_url}permintaan/detail-pr/${data[4]}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                        </div>`);
                else if (data[3] == "APPROVE")
                    if (print)
                        $('td:eq(4)', row).html(`<div class="text-right">
                            <a href="${_url}laporan/print-pr/${data[4]}/" target="_blank" class="btn btn-primary btn-xs" id="uid${data[4]}"><i class="fa fa-print"></i> Print</a>
                            <a href="${_url}permintaan/detail-pr/${data[4]}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                        </div>`)
                    else
                        $('td:eq(4)', row).html(`<div class="text-right">
                            <a href="${_url}permintaan/detail-pr/${data[4]}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                        </div>`);
                else
                    $('td:eq(4)', row).html(`<div class="text-right">
                        <a href="${_url}permintaan/detail-pr/${data[4]}/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                    </div>`);
            },
            "rowCallback": function(row, data, index) {
                $('td:eq(0)', row).html(index + 1);
            },
            "initComplete": function() {
                let table = $('#list-permintaan').DataTable();

                $('#status-filter').select2({
                    theme: "bootstrap",
                }).on('select2:open', function(e) {
                    table.column(3).header().style.pointerEvents = 'none';
                }).on('select2:close', function(e) {
                    table.column(3).header().style.pointerEvents = '';
                }).on('change', function() {
                    let filter = $("#status-filter").val();
                    if (filter == "") {
                        filteredTableData = [...tableData];
                    } else {
                        filteredTableData = tableData.filter(data => data[3] == filter);
                    }
                    $('#list-permintaan').DataTable().clear().rows.add(filteredTableData).draw();
                });
            }
        });
    }

    $(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        let id = this.id;
        bootbox.confirm('Apakah anda yakin untuk membatalkan PR ini?', function(result) {
            if(result){
                window.location.href = _url + "delete/pr/" + id;
            }
        });
    });
});

$(document).on("click", ".status", function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode = $(this).attr("value");
    $.post(_url + "permintaan/render-status-pr/", {
      kode: kode,
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      console.log(obj);
      var title = "No. PR " + obj.no_pr;
      var template =
        '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Approval</th><th style="text-align: center; width:15%">Nama</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Status</th></tr>';
      template +=
        '<tr style="height: 30px;"><td style="text-align: center"><b>Approve IT</b></td>';
      if (obj.aprv_it_nama != "") {
        template +=
          '<td style="text-align: center">' + obj.aprv_it_nama + "</td>";
        template +=
          '<td style="text-align: center">' + obj.aprv_it_tgl + "</td>";
        template +=
          '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
      } else {
        template += '<td style="text-align: center">Belum</td>';
        template += '<td style="text-align: center">-</td>';
        template +=
          '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
      }
      template += "</tr>";
      template +=
        '<tr style="height: 30px;"><td style="text-align: center"><b>Approve GA SPV</b></td>';
      if (obj.aprv_ga_spv_nama != "") {
        template +=
          '<td style="text-align: center">' + obj.aprv_ga_spv_nama + "</td>";
        template +=
          '<td style="text-align: center">' + obj.aprv_ga_spv_tgl + "</td>";
        template +=
          '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
      } else {
        template += '<td style="text-align: center">Belum</td>';
        template += '<td style="text-align: center">-</td>';
        template +=
          '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
      }
      template += "</tr>";
      template +=
        '<tr style="height: 30px;"><td style="text-align: center"><b>Approve GA Head</b></td>';
      if (obj.aprv_ga_head_nama != "") {
        template +=
          '<td style="text-align: center">' + obj.aprv_ga_head_nama + "</td>";
        template +=
          '<td style="text-align: center">' + obj.aprv_ga_head_tgl + "</td>";
        template +=
          '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
      } else {
        template += '<td style="text-align: center">Belum</td>';
        template += '<td style="text-align: center">-</td>';
        template +=
          '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
      }
      template += "</tr>";
      template += "</tr>";
      template +=
        '<tr style="height: 30px;"><td style="text-align: center"><b>Approve Marketing</b></td>';
      if (obj.aprv_mktsrv_nama != "") {
        template +=
          '<td style="text-align: center">' + obj.aprv_mktsrv_nama + "</td>";
        template +=
          '<td style="text-align: center">' + obj.aprv_mktsrv_tgl + "</td>";
        template +=
          '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
      } else {
        template += '<td style="text-align: center">Belum</td>';
        template += '<td style="text-align: center">-</td>';
        template +=
          '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
      }
      template += "</tr>";
      template += "</tr>";
      template +=
        '<tr style="height: 30px;"><td style="text-align: center"><b>Approve Direksi</b></td>';
      if (obj.aprv_dir_nama != "") {
        template +=
          '<td style="text-align: center">' + obj.aprv_dir_nama + "</td>";
        template +=
          '<td style="text-align: center">' + obj.aprv_dir_tgl + "</td>";
        template +=
          '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
      } else {
        template += '<td style="text-align: center">Belum</td>';
        template += '<td style="text-align: center">-</td>';
        template +=
          '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
      }
    //   template += "</tr>";
    //   if (obj.pesan != "") {
    //     template += '<tr><td colspan="4"><b>Pesan</b></td></tr>';
    //     template += '<tr><td colspan="4">' + obj.pesan + "</td></tr>";
    //   }
      template += "</table>";
      bootbox.dialog({
        size: "large",
        title: title,
        message: template,
        buttons: {
          cancel: {
            label: "Close",
            className: "btn-danger",
            callback: function () {},
          },
        },
      });
    });
});