$(document).ready(function () {
	var _url = $("#_url").val();
  $("#emsg").hide();
  $(".kode_supplier").select2({
    theme: "bootstrap",
    width: 168,
    minimumInputLength: 1,
    delay: 250,
    ajax: {
      url: _url + "serverside/search-supplier/",
      dataType: "json",
      type: "POST",
      data: function (params) {
        return {
          q: params.term,
          page: params.page,
        };
      },
      processResults: function (data) {
        return {
          results: data.results,
        };
      },
      cache: true,
    },
  });
  $(".amount").autoNumeric("init", {
    mDec: 0,
    aSep: ".",
    aDec: ",",
    nBracket: "(,)",
    vMin: -999999999,
  });
  $("#idate")
    .datepicker({
      changeMonth: true,
      changeYear: true,
      format: "dd-mm-yyyy",
      autoclose: true,
      todayHighlight: true,
      //endDate: new Date(new Date().setDate(new Date().getDate()))
    })
    .css({ cursor: "pointer", background: "white" });
  $(".tgl")
    .datepicker({
      changeMonth: true,
      changeYear: true,
      format: "dd-mm-yyyy",
      autoclose: true,
      todayHighlight: true,
    })
    .css({ cursor: "pointer", background: "white" });
  $(document).on("click", ".detail-bagian", function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode = $(this).attr("value");
    $.post(_url + "pembelian/render-detail-bagian/", {
      kode: kode,
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      var template =
        '<table style="width:100%"><tr><td><b>Detail Bagian</b><td></tr><tr><td style="width:30%">Bagian</td>';
      if (obj.bagian == "") {
        template += "<td>: STOCK</td></tr>";
        template += "<tr><td>Main Data</td>";
        template += "<td>: STOCK</td></tr>";
        template += "<tr><td>Sub Data</td>";
        template += "<td>: STOCK</td></tr>";
        template += "<tr><td>Line Data</td>";
        template += "<td>: STOCK</td></tr>";
      } else {
        template += "<td>: " + obj.bagian + "</td></tr>";
        template += "<tr><td>Main Data</td>";
        template += "<td>: " + obj.main + "</td></tr>";
        template += "<tr><td>Sub Data</td>";
        template += "<td>: " + obj.sub + "</td></tr>";
        template += "<tr><td>Line Data</td>";
        template += "<td>: " + obj.line + "</td></tr>";
      }
      bootbox.alert(template, function () {
        console.log("This was logged in the callback!");
      });
    });
  });

  $(document).on("click", ".detail-itemstock", function (e) {
    e.preventDefault();
    var _url = $("#_url").val();
    var kode = $(this).attr("value");
    var xx = new Intl.NumberFormat("de-DE");
    $.post(_url + "itemstock/render-detail-itemstock/", {
      kode: kode,
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      var template =
        '<table style="width:100%"><tr><td><b>Detail Item Stock</b><td></tr><tr><td style="width:30%">Kode Item Stock</td>';
      template += "<td>: " + kode + "</td></tr>";
      template += "<tr><td>Nama Item Stock</td>";
      template += "<td>: " + obj.nama + "</td></tr>";
      template += "<tr><td>Merk</td>";
      template += "<td>: " + obj.merk + "</td></tr>";
      template += "<tr><td>Tipe</td>";
      template += "<td>: " + obj.tipe + "</td></tr>";
      template += "<tr><td>.</td></tr><tr><td><b>Detail Satuan</b><td>";
      template += "<tr><td>Satuan</td>";
      template += "<td>: " + obj.satuan + "</td></tr>";
      template += "<tr><td>Spesifikasi</td>";
      template += "<td>: " + obj.spesifikasi + "</td></tr>";
      template += "<tr><td>Quantity Min</td>";
      template +=
        "<td>: " +
        obj.qtymin.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +
        "</td></tr>";
      template += "<tr><td>Quantity Max</td>";
      template +=
        "<td>: " +
        obj.qtymax.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +
        "</td></tr>";
      template += "<tr><td>Jumlah per Satuan</td>";
      template +=
        "<td>: " +
        xx.format(obj.jumlahpersatuan) +
        " / " +
        obj.satuanharga +
        "</td></tr>";
      template += "<tr><td>Reorder Time</td>";
      template += "<td>: " + obj.reorder + " Hari</td></tr>";
      bootbox.alert(template, function () {
        console.log("This was logged in the callback!");
      });
    });
  });

  $(document).on("change", ".files", function (e) {
    var _url = $("#_url").val();
    var fd = new FormData();
    var files = $(this)[0].files;
    var elementId = "#" + $(this).attr("id").substring(1);
    if (files.length > 0) {
      fd.append("file", files[0]);
      bootbox.dialog({
        message:
          '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
        closeButton: false,
      });
      $.ajax({
        url: _url + "pembelian/upload-file/",
        type: "post",
        data: fd,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
          if (response.status == 1) {
            var uploadedFileName = response.filename;
            $(elementId).val(uploadedFileName);
            bootbox.alert({
              message: "File Berhasil di Upload " + uploadedFileName,
              backdrop: true,
              timeout: 2000,
              callback: function () {
                bootbox.hideAll();
              },
            });
          } else if (response.status == 2) {
            bootbox.alert({
              message: "Nama File telah ditemukan, mohon ganti nama file anda",
              backdrop: true,
              timeout: 2000,
              callback: function () {
                bootbox.hideAll();
              },
              className: "custom-alert-red",
            });
          } else {
            bootbox.alert({
              message:
                "File gagal di upload. Sistem hanya menerima format .jpg .jpeg .png .pdf .xlsx .xls",
              backdrop: true,
              timeout: 2000,
              callback: function () {
                bootbox.hideAll();
              },
              className: "custom-alert-red",
            });
          }
        },
      });
    } else {
      alert("Please select a file.");
    }
  });

  $("#save").click(function (e) {
    e.preventDefault();
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    $(".overlay").show();
    $(this).attr("disabled", "disabled");
    var _url = $("#_url").val();

    var keperluan = [];
    var item = [];
    // var bagian = [];
    var main = [];
    var sub = [];
    var line = [];
    var qty = [];
    var diperlukan = [];
    var keterangan = [];
    var kode_supplier1 = [];
    var harga1 = [];
    var keterangan_supplier1 = [];
    var file_supplier1 = [];
    var kode_supplier2 = [];
    var harga2 = [];
    var keterangan_supplier2 = [];
    var file_supplier2 = [];
    var kode_supplier3 = [];
    var harga3 = [];
    var keterangan_supplier3 = [];
    var file_supplier3 = [];
    var supplierpilihan = [];
    $.each($("input[name='chk[]']:checked"), function () {
      var kode = $(this).closest("tr").find("input[name='item[]']").val();
      kode = kode.replace(" ", "");
      var kode1 = $(this).closest("tr").find("input[name='keperluan[]']").val();
      kode1 = kode1.replace(" ", "");
      if (kode1 === 'PENGADAANBARU') {
        kode1 = 'PENGADAAN';
      }
      keperluan.push(
        $(this).closest("tr").find("input[name='keperluan[]']").val()
      );
      qty.push($(this).closest("tr").find("input[name='qty[]']").val());
      item.push($(this).closest("tr").find("input[name='item[]']").val());
      // bagian.push($(this).closest("tr").find("input[name='bagian[]']").val());
      main.push($(this).closest("tr").find("input[name='main[]']").val());
      sub.push($(this).closest("tr").find("input[name='sub[]']").val());
      line.push($(this).closest("tr").find("input[name='line[]']").val());
      diperlukan.push(
        $(this).closest("tr").find("input[name='diperlukan[]']").val()
      );
      keterangan.push(
        $(this).closest("tr").find("input[name='keterangan[]']").val()
      );
      kode_supplier1.push(
        $(this)
          .closest("tr")
          .find("select[name='kode_supplier1[]'] option")
          .filter(":selected")
          .val()
      );
      harga1.push($(this).closest("tr").find("input[name='harga1[]']").val());
      keterangan_supplier1.push(
        $(this).closest("tr").find("input[name='keterangan_supplier1[]']").val()
      );
      file_supplier1.push(
        $(this).closest("tr").find("input[name='file_supplier1[]']").val()
      );
      kode_supplier2.push(
        $(this)
          .closest("tr")
          .find("select[name='kode_supplier2[]'] option")
          .filter(":selected")
          .val()
      );
      harga2.push($(this).closest("tr").find("input[name='harga2[]']").val());
      keterangan_supplier2.push(
        $(this).closest("tr").find("input[name='keterangan_supplier2[]']").val()
      );
      file_supplier2.push(
        $(this).closest("tr").find("input[name='file_supplier2[]']").val()
      );
      kode_supplier3.push(
        $(this)
          .closest("tr")
          .find("select[name='kode_supplier3[]'] option")
          .filter(":selected")
          .val()
      );
      harga3.push($(this).closest("tr").find("input[name='harga3[]']").val());
      keterangan_supplier3.push(
        $(this).closest("tr").find("input[name='keterangan_supplier3[]']").val()
      );
      file_supplier3.push(
        $(this).closest("tr").find("input[name='file_supplier3[]']").val()
      );
      supplierpilihan.push(
        $(this)
          .closest("tr")
          .find("input[name='" + kode1 + kode + "supplierpilihan[]']:checked")
          .val()
      );
    });
    var $data = new FormData();
    $data.append("keperluan", keperluan);
    $data.append("qty_req", qty);
    $data.append("kd_item", item);
    // $data.append("bagian", bagian);
    $data.append("main", main);
    $data.append("sub", sub);
    $data.append("line", line);
    $data.append("diperlukan", diperlukan);
    $data.append("keterangan", keterangan);
    $data.append("kd_supplier1", kode_supplier1);
    $data.append("harga1", harga1);
    $data.append("keterangan_supplier1", keterangan_supplier1);
    $data.append("file_supplier1", file_supplier1);
    $data.append("kd_supplier2", kode_supplier2);
    $data.append("harga2", harga2);
    $data.append("keterangan_supplier2", keterangan_supplier2);
    $data.append("file_supplier2", file_supplier2);
    $data.append("kd_supplier3", kode_supplier3);
    $data.append("harga3", harga3);
    $data.append("keterangan_supplier3", keterangan_supplier3);
    $data.append("file_supplier3", file_supplier3);
    $data.append("supplierpilihan", supplierpilihan);
    $data.append("idate", $("#idate").val());
    $data.append("no_pr", $("#no_pr").val());
    $data.append("pembelian", $("#pembelian").val());
    bootbox.confirm("Apakah anda yakin untuk mengubah PR ?", function (result) {
      if (result) {
        bootbox.dialog({
          message:
            '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
          closeButton: false,
        });
        $.ajax({
          url: _url + "pembelian/supplier-pr-post/",
          type: "POST",
          data: $data,
          cache: false,
          processData: false,
          contentType: false,
          success: function (data, textStatus, jqXHR) {
            var obj = jQuery.parseJSON(data);
            if ($.isNumeric(obj.dataval)) {
              $(".overlay").hide();
              var body = $("html, body");
              bootbox.alert({
                message: obj.msg,
                backdrop: true,
                timeout: 2000,
                callback: function () {
                  window.location =
                    _url +
                    "pembelian/list-pr1-pending/PR Biding Berhasil Ditambah";
                },
              });
            } else {
              $("#save").removeAttr("disabled");
              $(".overlay").hide();
              var body = $("html, body");
              body.animate({ scrollTop: 0 }, "50", "swing");
              $("#emsg").attr("style", "background-color:#e46f61");
              $("#emsgbody").html(obj.msg);
              $("#emsg").show("slow");
              jQuery("#emsgbody").animate(
                {
                  scrollTop: jQuery("#emsg").scrollTop() - 150,
                },
                500
              );

              $("#emsg").delay(5200).fadeOut(500);
              bootbox.hideAll();
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {
              msg = "Not connect.\n Verify Network.";
            } else if (jqXHR.status == 404) {
              msg = "Requested page not found. [404]";
            } else if (jqXHR.status == 500) {
              msg = "Internal Server Error [500].";
            } else if (exception === "parsererror") {
              msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
              msg = "Time out error.";
            } else if (exception === "abort") {
              msg = "Ajax request aborted.";
            } else {
              msg = "Uncaught Error.\n" + jqXHR.responseText;
            }
            bootbox.hideAll();
            alert(msg);
          },
        });
      } else {
        $("#save").removeAttr("disabled");
      }
    });
  });
});
