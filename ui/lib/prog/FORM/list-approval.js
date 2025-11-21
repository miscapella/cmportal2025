$(document).ready(function () {
  $("#emsg").hide();
  $("#emsgs").hide();
  var _url = $("#_url").val();
  // $('#datatable-list-approval').DataTable();
  // $.ajax({
  //   url: _url + "serverside/list-approval/",
  //   type: "POST",
  //   cache: false,
  //   processData: false,
  //   contentType: false,
  //   success: function (data, textStatus, jqXHR) {
  //     console.log(data)
  //   },
  //   error: function (jqXHR, textStatus, errorThrown) {
  //     if (jqXHR.status === 0) {
  //       msg = "Not connect.\n Verify Network.";
  //     } else if (jqXHR.status == 404) {
  //       msg = "Requested page not found. [404]";
  //     } else if (jqXHR.status == 500) {
  //       msg = "Internal Server Error [500].";
  //     } else if (exception === "parsererror") {
  //       msg = "Requested JSON parse failed.";
  //     } else if (exception === "timeout") {
  //       msg = "Time out error.";
  //     } else if (exception === "abort") {
  //       msg = "Ajax request aborted.";
  //     } else {
  //       msg = "Uncaught Error.\n" + jqXHR.responseText;
  //     }
  //     alert(msg);
  //     //location.reload();
  //   },
  //   complete: function () {
      
  //   },
  // });

  $("#datatable-list-approval").DataTable({
    order: [1, "desc"],
    pagingType: "full_numbers",
    pageLength: 10,
    scrollX: true,
    responsive: true,
    autoWidth: false,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    serverSide: true,
    ajax: {
      url: _url + "serverside/list-approval/",
      type: "POST",
      dataSrc: function (json) {
        console.log(json); // Log the response data to the console
        return json.data; // Return the data to be used by DataTables
      },
    },
  });

  $(document).on("click", ".btn-list-approve", function (e) {
    e.preventDefault();
    bootbox.confirm("Apakah anda yakin untuk approve?", function (result) {
      if (result) {
      }
    });
  });

  // $(document).on('click', '.list-approval-approve', function(e) {
  //     e.preventDefault();
  //     var id = this.id;
  //     bootbox.confirm('Apakah anda yakin untuk Approve?', function(result) {
  //         if(result){

  //             href="{$app_url}?ng=form-api/approve-form/{$ds}/token_{$approve[$i]}

  //             var _url = $("#_url").val();
  //             window.location.href = _url + "delete/form/" + id;
  //         }
  //     });
  // });

  $("#datatable-history-input").DataTable({
    order: [1, "desc"],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    responsive: true,
    autoWidth: false,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    serverSide: true,
    createdRow: function (row, data, dataIndex) {
      const statusValue = $(data[4]).find(".status").text();
      if (statusValue == "Rejected") {
        $(row).find(".status").addClass("btn-danger");
      } else if (statusValue == "In Progress") {
        $(row).find(".status").addClass("btn-warning");
      }
    },
    ajax: {
      url: _url + "serverside/history-input/",
      type: "POST",
    },
  });

  $("#datatable-history-approval").DataTable({
    order: [1, "desc"],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    responsive: true,
    autoWidth: false,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    serverSide: true,
    createdRow: function (row, data, dataIndex) {
      const statusValue = $(data[4]).find(".status").text();
      if (statusValue == "Rejected") {
        $(row).find(".status").addClass("btn-danger");
      } else if (statusValue == "In Progress") {
        $(row).find(".status").addClass("btn-warning");
      }
    },
    ajax: {
      url: _url + "serverside/history-approval/",
      type: "POST",
    },
  });
  //detail list approval
  $(document).on("click", ".detail", async function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode_form = $("#kode_form").val();
    var kode = $(this).attr("value");
    try {
      $(".loader-container").removeClass("hide");
      $(".panel-body").addClass("hide");
      const renderDetail = await $.post(_url + "response/render-response/", {
        kode: kode,
      });
      if (renderDetail) {
        const data = renderDetail;
        var obj = jQuery.parseJSON(data);
        var question = obj.question.split("|");
        var value = obj.value.split("|");
        var approval = obj.approval.split(",");
        var tanggal = obj.tanggal.split(",");
        var status = obj.status.split(",");
        var message = obj.message.split(",");
        var title = "Request #" + kode;
        var template =
          '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th>Question</th><th>Response</th></tr>';
        var i = 0;
        $.each(question, function () {
          if (value[i] != "") {
            var file = value[i].replace(
              "https://cmportal.capelladaihatsu.co.id/uploads/FORM/",
              ""
            );
            var files = file;
            var lower = file.toLowerCase();
            lower = lower.split(".");
            file = file.split(".");
            if (
              lower[1] == "pdf" ||
              lower[1] == "png" ||
              lower[1] == "jpg" ||
              lower[1] == "jpeg"
            ) {
              template +=
                '<tr style="height: 30px;"><td>' + question[i] + "</td>";
              template +=
                '<td><a href="/uploads/FORM/' +
                files +
                '" target="_blank">' +
                file[0] +
                "</a></td></tr>";
            } else {
              template +=
                '<tr style="height: 30px;"><td>' + question[i] + "</td>";
              template += "<td>" + value[i] + "</td></tr>";
            }
          }
          i++;
        });
        template += "</table>";
        template +=
          '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th>Approval</th><th style="text-align: center; width:20%">Date</th><th>Message</th><th>Status</th></tr>';
        var j = 0;
        $.each(approval, function () {
          template += '<tr style="height: 30px;"><td>' + approval[j] + "</td>";
          if (tanggal[j] == "NULL") {
            template += '<td style="text-align: center"></td>';
          } else {
            var pecah = tanggal[j].split(" ");
            var hari = pecah[0].split("-");
            var waktu = pecah[1].split(":");
            template +=
              '<td style="text-align: center">' +
              hari[2] +
              "-" +
              hari[1] +
              "-" +
              hari[0] +
              " " +
              waktu[0] +
              ":" +
              waktu[1] +
              "</td>";
          }
          if (message[j] == "NULL") {
            template += "<td></td>";
          } else {
            template += "<td>" + message[j] + "</td>";
          }
          if (status[j] == "Approved") {
            template +=
              '<td style="text-align: center"><span class="btn btn-primary btn-xs">' +
              status[j] +
              "</span></td>";
          } else if (status[j] == "Rejected") {
            template +=
              '<td style="text-align: center"><span class="btn btn-danger btn-xs">' +
              status[j] +
              "</span></td>";
          } else {
            template +=
              '<td style="text-align: center"><span class="btn btn-warning btn-xs">' +
              status[j] +
              "</span></td>";
          }
          j++;
        });
        template += "</table>";
        bootbox.alert({
          size: "large",
          title: title,
          message: template,
          callback: function () {},
        });
      }
    } finally {
      $(".loader-container").addClass("hide");
      $(".panel-body").removeClass("hide");
    }
  });

  $(document).on("click", ".status", async function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode_form = $("#kode_form").val();
    var kode = $(this).attr("value");
    try {
      $(".loader-container").removeClass("hide");
      $(".panel-body").addClass("hide");
      const renderStatus = await $.post(_url + "response/render-status/", {
        kode: kode,
      });
      if (renderStatus) {
        const data = renderStatus;
        var obj = jQuery.parseJSON(data);
        var approval = obj.approval.split(",");
        var tanggal = obj.tanggal.split(",");
        var status = obj.status.split(",");
        var comment = obj.comment.split(",");
        var stat = obj.stat;
        var title = "Request #" + kode;
        var template =
          '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th style="text-align: center; width:25%">Email</th><th style="text-align: center; width:15%">Status</th><th style="text-align: center; width:20%">Date</th><th style="text-align: center;">Comment</th></tr>';
        var i = 0;
        $.each(approval, function () {
          template +=
            '<tr style="height: 30px;"><td style="text-align: center">' +
            approval[i] +
            "</td>";
          if (status[i] == "Approved") {
            template +=
              '<td style="text-align: center"><span class="btn btn-primary btn-xs">' +
              status[i] +
              "</span></td>";
          } else if (status[i] == "Rejected") {
            template +=
              '<td style="text-align: center"><span class="btn btn-danger btn-xs">' +
              status[i] +
              "</span></td>";
          } else {
            template +=
              '<td style="text-align: center"><span class="btn btn-warning btn-xs">' +
              status[i] +
              "</span></td>";
          }
          if (tanggal[i] == "NULL") {
            template += '<td style="text-align: center"></td>';
          } else {
            var pecah = tanggal[i].split(" ");
            var hari = pecah[0].split("-");
            var waktu = pecah[1].split(":");
            template +=
              '<td style="text-align: center">' +
              hari[2] +
              "-" +
              hari[1] +
              "-" +
              hari[0] +
              " " +
              waktu[0] +
              ":" +
              waktu[1] +
              "</td>";
          }
          if (comment[i] == "NULL") {
            template += '<td style="text-align: center"></td>';
          } else {
            template +=
              '<td style="text-align: center">' + comment[i] + "</td>";
          }
          template += "</tr>";
          i++;
        });
        template += "</table>";

        bootbox.alert({
          size: "large",
          title: title,
          message: template,
          callback: function () {},
        });
      }
    } finally {
      $(".loader-container").addClass("hide");
      $(".panel-body").removeClass("hide");
    }
  });

  $(document).on("click", ".details", async function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode_form = $("#kode_form").val();
    var kode = $(this).attr("value");
    try {
      $(".loader-container").removeClass("hide");
      $(".panel-body").addClass("hide");
      const renderDetails = await $.post(_url + "response/render-response/", {
        kode: kode,
      });

      if (renderDetails) {
        const data = renderDetails;
        var obj = jQuery.parseJSON(data);
        var question = obj.question.split("|");
        var value = obj.value.split("|");
        var title = "Request #" + kode;
        var template =
          '<table class="table table-bordered table-hover sys_table" style="width:100%"><tr><th>Question</th><th>Response</th></tr>';
        var i = 0;
        $.each(question, function () {
          if (value[i] != "") {
            var file = value[i].replace(
              "https://cmportal.capelladaihatsu.co.id/uploads/FORM/",
              ""
            );
            var files = file;
            var lower = file.toLowerCase();
            lower = lower.split(".");
            file = file.split(".");
            if (
              lower[1] == "pdf" ||
              lower[1] == "png" ||
              lower[1] == "jpg" ||
              lower[1] == "jpeg"
            ) {
              template +=
                '<tr style="height: 30px;"><td>' + question[i] + "</td>";
              template +=
                '<td><a href="/uploads/FORM/' +
                files +
                '" target="_blank">' +
                file[0] +
                "</a></td></tr>";
            } else {
              template +=
                '<tr style="height: 30px;"><td>' + question[i] + "</td>";
              template += "<td>" + value[i] + "</td></tr>";
            }
          }
          i++;
        });
        template += "</table>";

        bootbox.alert({
          size: "large",
          title: title,
          scrollable: true,
          message: template,
          callback: function () {},
        });
      }
    } finally {
      $(".loader-container").addClass("hide");
      $(".panel-body").removeClass("hide");
    }
  });
});
