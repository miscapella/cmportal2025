$(document).ready(function () {
  let _url = $("#_url").val();
  let tableData = []; // Store table data from serverside
  let filteredTableData = []; // Table data shown following user status' filter

  // Load data from serverside and keep it in tableData variable
  $.ajax({
    url: _url + "serverside/list-mintabarang/",
    type: "POST",
    dataType: "json",
    success: function (data) {
      tableData = data;
      filteredTableData = data;
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error: ", status, error);
    },
    complete: function () {
      loadTable();
    },
  });

  // Create table and destroy table when user changes status' filter
  function loadTable() {
    $("#list-mintabarang").DataTable({
      pagingType: "full_numbers",
      pageLength: 25,
      scrollX: true,
      processing: true,
      lengthMenu: [
        [10, 25, 50, 100],
        [10, 25, 50, 100],
      ],
      data: filteredTableData,
      serverSide: false,
      createdRow: function (row, data, dataIndex) {
        if (data[3] == "PENDING")
          $("td:eq(3)", row).html(
            `<div class="text-center"><span class="status btn btn-warning btn-xs" value="${data[1]}">${data[3]}</span></div>`
          );
        else if (data[3] == "REJECTED")
          $("td:eq(3)", row).html(
            `<div class="text-center"><span class="status btn btn-danger btn-xs" value="${data[1]}">${data[3]}</span></div>`
          );
        else if (data[3] == "CANCEL")
          $("td:eq(3)", row).html(
            `<div class="text-center"><span class="status btn btn-danger btn-xs" value="${data[1]}">CANCELLED</span></div>`
          );
        else
          $("td:eq(3)", row).html(
            `<div class="text-center"><span class="status btn btn-primary btn-xs" value="${data[1]}">${data[3]}</span></div>`
          );

        if (data[3] == "PENDING") {
          let buttons = `<div class="text-right">
                <a class="btn btn-success btn-sm cdetail" id="uid${data[4]}" title="Detail"><i class="fa fa-book"></i></a>`;

          if (data[5] == 1) {
            // If user has permission, show both edit and cancel
            if (data[6] == true) {
              buttons += `&nbsp;&nbsp;<a class="btn btn-primary btn-sm cedit" id="uid${data[4]}" title="Edit"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;<a class="btn btn-danger btn-sm cdelete" id="uid${data[4]}" title="Cancel">X</a>`;
            } else {
              // If no permission, show only cancel
              buttons += `&nbsp;&nbsp;<a class="btn btn-danger btn-sm cdelete" id="uid${data[4]}" title="Cancel">X</a>`;
            }
          }

          buttons += `</div>`;

          $("td:eq(4)", row).html(buttons);
        } else {
          $("td:eq(4)", row).html(
            `<div class="text-right">
                    <a class="btn btn-success btn-sm cdetail" id="uid${data[4]}" title="Detail"><i class="fa fa-book"></i></a>
                </div>`
          );
        }

        // if (data[3] == "PENDING")
        //   if (data[5] == 1 && data[6] == true) {
        //     $("td:eq(4)", row).html(`<div class="text-right">
        //                 <a class="btn btn-success btn-sm cdetail" id="uid${data[4]}" title="Detail"><i class="fa fa-book"></i></a>
        //                 <a class="btn btn-primary btn-sm cedit" id="uid${data[4]}" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
        //                 <a class="btn btn-danger btn-sm cdelete" id="uid${data[4]}" title="Cancel">X</a>
        //             </div>`);
        //   } else {
        //     $("td:eq(4)", row).html(
        //       `<div class="text-right">
        //                 <a class="btn btn-success btn-sm cdetail" id="uid${data[4]}" title="Detail"><i class="fa fa-book"></i></a>
        //             </div>`
        //     );
        //   }
        // else
        //   $("td:eq(4)", row).html(`<div class="text-right">
        //                 <a class="btn btn-success btn-sm cdetail" id="uid${data[4]}" title="Detail"><i class="fa fa-book"></i></a>
        //             </div>`);
      },
      rowCallback: function (row, data, index) {
        $("td:eq(0)", row).html(index + 1);
      },
      initComplete: function () {
        let table = $("#list-mintabarang").DataTable();

        $("#status-filter")
          .select2({
            theme: "bootstrap",
          })
          .on("select2:open", function (e) {
            table.column(3).header().style.pointerEvents = "none";
          })
          .on("select2:close", function (e) {
            table.column(3).header().style.pointerEvents = "";
          })
          .on("change", function () {
            let filter = $("#status-filter").val();
            if (filter == "") {
              filteredTableData = [...tableData];
            } else {
              filteredTableData = tableData.filter((data) => data[3] == filter);
            }
            $("#list-mintabarang")
              .DataTable()
              .clear()
              .rows.add(filteredTableData)
              .draw();
          });
      },
    });
  }

  // $('#list-mintabarang').DataTable({
  //     "order": [2,'desc'],
  //     "pagingType": "full_numbers",
  // 	"pageLength": 25,
  // 	"scrollX": true,
  // 	"processing": true,
  // 	"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
  //     "createdRow": function(row, data, dataIndex) {
  //         const statusValue = $(data[4]).find('.status').text();
  //         if( statusValue == "CANCEL") {
  //             $(row).find('.status').text("CANCELLED");
  //             $(row).find('.status').removeClass('btn-primary').addClass('btn-danger');
  //             $(row).find('td:eq(6) .text-right').children().not('.cdetail').remove();
  //         } else if (statusValue == "PENDING") {
  //             $(row).find('.status').removeClass('btn-primary').addClass('btn-warning');
  //         } else if (statusValue == "REJECTED") {
  //             $(row).find('.status').removeClass('btn-primary').addClass('btn-danger');
  //             $(row).find('td:eq(6) .text-right').children().not('.cdetail').remove();
  //         } else if (statusValue == "APPROVED") {
  //             $(row).find('td:eq(6) .text-right').children().not('.cdetail').remove();
  //         }
  //         const statusPR = $(data[5]).find('.status_pr').text();
  //         if( statusPR == "CANCEL") {
  //             $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
  //         } else if (statusPR == "PENDING") {
  //             $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-warning');
  //         } else if (statusPR == "REJECTED") {
  //             $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-danger');
  //         } else if (statusPR == "NOT CREATED" ) {
  //             $(row).find('.status_pr').removeClass('btn-primary').addClass('btn-info');
  //         }
  //     },
  // 	"serverSide" : true,
  //     "ajax": {
  // 		'url' : `${_url}serverside/list-mintabarang/`,
  // 		'type' : 'POST',
  // 	},
  //     "initComplete": function() {
  //         var table = $('#list-mintabarang').DataTable();
  //         var statusColumnIndex = 4;

  //         $('#status-filter').select2({
  //             theme: "bootstrap",
  //         }).on('select2:open', function(e) {
  //             table.column(statusColumnIndex).header().style.pointerEvents = 'none';
  //         }).on('select2:close', function(e) {
  //             table.column(statusColumnIndex).header().style.pointerEvents = '';
  //         });
  //     }
  // });

  $("#administrator-list-mintabarang").DataTable({
    order: [2, "desc"],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    createdRow: function (row, data, dataIndex) {
      const statusValue = $(data[6]).find(".status").text();
      if (statusValue == "CANCEL") {
        $(row).find(".status").text("CANCELLED");
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
        $(row).find("td:eq(6) .text-right").children().not(".cdetail").remove();
      } else if (statusValue == "PENDING") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusValue == "REJECTED") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
        $(row).find("td:eq(6) .text-right").children().not(".cdetail").remove();
      } else if (statusValue == "APPROVED") {
        $(row).find("td:eq(6) .text-right").children().not(".cdetail").remove();
      }
      const statusPR = $(data[7]).find(".status_pr").text();
      if (statusPR == "CANCEL") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "PENDING") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusPR == "REJECTED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "NOT CREATED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-info");
      }
    },
    serverSide: true,
    ajax: {
      url: _url + "serverside/administrator-list-mintabarang/",
      type: "POST",
    },
  });

  $("#dept-list-mintabarang").DataTable({
    order: [2, "desc"],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    createdRow: function (row, data, dataIndex) {
      const statusValue = $(data[5]).find(".status").text();
      if (statusValue == "CANCEL") {
        $(row).find(".status").text("CANCELLED");
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
        $(row).find("td:eq(6) .text-right").children().not(".cdetail").remove();
      } else if (statusValue == "PENDING") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusValue == "REJECTED") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusValue == "NOT CREATED") {
        $(row).find(".status").removeClass("btn-primary").addClass("btn-info");
      }
      const statusPR = $(data[6]).find(".status_pr").text();
      if (statusPR == "CANCEL") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "PENDING") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusPR == "REJECTED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "NOT CREATED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-info");
      }
    },
    serverSide: true,
    ajax: {
      url: _url + "serverside/dept-list-mintabarang/",
      type: "POST",
    },
  });

  $("#service-head-list-mintabarang").DataTable({
    order: [2, "desc"],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    createdRow: function (row, data, dataIndex) {
      const statusValue = $(data[6]).find(".status").text();
      if (statusValue == "CANCEL") {
        $(row).find(".status").text("CANCELLED");
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
        $(row).find("td:eq(6) .text-right").children().not(".cdetail").remove();
      } else if (statusValue == "PENDING") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusValue == "REJECTED") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusValue == "NOT CREATED") {
        $(row).find(".status").removeClass("btn-primary").addClass("btn-info");
      }
      const statusPR = $(data[7]).find(".status_pr").text();
      if (statusPR == "CANCEL") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "PENDING") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusPR == "REJECTED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "NOT CREATED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-info");
      }
    },
    serverSide: true,
    ajax: {
      url: _url + "serverside/service-head-list-mintabarang/",
      type: "POST",
    },
  });

  $("#gaadmin-list-mintabarang").DataTable({
    order: [2, "desc"],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    createdRow: function (row, data, dataIndex) {
      const statusValue = $(data[6]).find(".status").text();
      if (statusValue == "CANCEL") {
        $(row).find(".status").text("CANCELLED");
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
        $(row).find("td:eq(6) .text-right").children().not(".cdetail").remove();
      } else if (statusValue == "PENDING") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusValue == "REJECTED") {
        $(row)
          .find(".status")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusValue == "NOT CREATED") {
        $(row).find(".status").removeClass("btn-primary").addClass("btn-info");
      }
      const statusPR = $(data[7]).find(".status_pr").text();
      if (statusPR == "CANCEL") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "PENDING") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-warning");
      } else if (statusPR == "REJECTED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-danger");
      } else if (statusPR == "NOT CREATED") {
        $(row)
          .find(".status_pr")
          .removeClass("btn-primary")
          .addClass("btn-info");
      }
    },
    serverSide: true,
    ajax: {
      url: _url + "serverside/gaadmin-list-mintabarang/",
      type: "POST",
    },
  });

  $(document).on("click", ".cdetail", function (e) {
    e.preventDefault();
    var id = this.id;
    window.location.href = _url + "permintaanbarang/detail-mb/" + id;
  });

  $(document).on("click", ".cedit", function (e) {
    e.preventDefault();
    var id = this.id;
    window.location.href = _url + "permintaanbarang/edit-mb/" + id;
  });

  $(document).on("click", ".cdelete", function (e) {
    e.preventDefault();
    var id = this.id;
    bootbox.confirm(
      "Apakah anda yakin untuk menghapus material request ini? ",
      function (result) {
        if (result) {
          window.location.href = _url + "delete/mintabarang/" + id;
        }
      }
    );
  });

  $(document).on("click", ".status", function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode = $(this).attr("value");
    $.post(_url + "permintaanbarang/render-status-ur/", {
      kode: kode,
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      console.log(obj);
      var title = "No. UR " + obj.no_mintabarang;
      var template =
        '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Approval</th><th style="text-align: center; width:15%">Nama</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Status</th></tr>';
      template +=
        '<tr style="height: 30px;"><td style="text-align: center"><b>Atasan Langsung</b></td>';
      if (obj.disetujui_atasan_oleh != "") {
        template +=
          '<td style="text-align: center">' + obj.disetujui_atasan_oleh + "</td>";
        template +=
          '<td style="text-align: center">' + obj.disetujui_atasan_tgl + "</td>";
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
        '<tr style="height: 30px;"><td style="text-align: center"><b>GA Admin</b></td>';
      if (obj.disetujui_gas_oleh != "") {
        template +=
          '<td style="text-align: center">' + obj.disetujui_gas_oleh + "</td>";
        template +=
          '<td style="text-align: center">' + obj.disetujui_gas_tgl + "</td>";
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
        '<tr style="height: 30px;"><td style="text-align: center"><b>Service Head</b></td>';
      if (obj.disetujui_service_oleh != "") {
        template +=
          '<td style="text-align: center">' + obj.disetujui_service_oleh + "</td>";
        template +=
          '<td style="text-align: center">' + obj.disetujui_service_tgl + "</td>";
        template +=
          '<td style="text-align: center"><span class="btn btn-primary btn-xs">Approved</span></td>';
      } else {
        template += '<td style="text-align: center">Belum</td>';
        template += '<td style="text-align: center">-</td>';
        template +=
          '<td style="text-align: center"><span class="btn btn-warning btn-xs">Pending</span></td>';
      }
      template += "</tr>";
      if (obj.pesan != "") {
        template += '<tr><td colspan="4"><b>Pesan</b></td></tr>';
        template += '<tr><td colspan="4">' + obj.pesan + "</td></tr>";
      }
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
});
