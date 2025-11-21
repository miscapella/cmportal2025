$(document).ready(function () {
  var _url = $("#_url").val();
  $("#emsgModalPerbaikan").hide();
  $("#emsgModalPergantian").hide();

  // Load Item
  $("#datatable").DataTable({
    order: [],
    pagingType: "full_numbers",
    pageLength: 25,
    scrollX: true,
    processing: true,
    lengthMenu: [
      [10, 25, 50, 100],
      [10, 25, 50, 100],
    ],
    serverSide: true,
    ajax: {
      url: _url + "serverside/load-item/",
      type: "POST",
      data: function (d) {
        d.inv_id = $("#id_inventaris").val();
      },
    },
  });
  $(".dataTables_processing").css({ display: "block", "z-index": 10000 });

  // Submit Perbaikan
  $(document).on("click", "#submitPerbaikanModalForm", function (e) {
    e.preventDefault();
    $(this).attr("disabled", "disabled");
    $("#cancelPerbaikanModal").attr("disabled", "disabled");
    $("#closePerbaikanModal").attr("disabled", "disabled");
    $("#perbaikanModal").data("bs.modal").options.backdrop = "static";
    $("#perbaikanModal").data("bs.modal").options.keyboard = false;
    const form_data = new FormData($("#perbaikanModalForm")[0]);
    $.ajax({
      url: _url + "inventaris/perbaikan-post/",
      type: "POST",
      data: form_data,
      cache: false,
      processData: false,
      contentType: false,
      success: function (data, textStatus, jqXHR) {
        var _url = $("#_url").val();
        const id_inventaris = $("#id_inventaris").val();
        if ($.isNumeric(data)) {
          window.location =
            _url +
            `inventaris/detail/${id_inventaris}/Detail Perbaikan Berhasil Diinput!`;
          // Clear Inputs
          $("#keteranganPerbaikanModal").val("");
          $("#perbaikanModal").modal("hide");
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
        alert(msg);
        //location.reload();
      },
      complete: function () {
        $("#submitPerbaikanModalForm").removeAttr("disabled");
        $("#cancelPerbaikanModal").removeAttr("disabled");
        $("#closePerbaikanModal").removeAttr("disabled");
        $("#perbaikanModal").data("bs.modal").options.backdrop = true;
        $("#perbaikanModal").data("bs.modal").options.keyboard = true;
      },
    });
  });

  // Submit Pergantian
  $(document).on("click", "#submitPergantianModalForm", function (e) {
    e.preventDefault();
    $(this).attr("disabled", "disabled");
    $("#cancelPergantianModal").attr("disabled", "disabled");
    $("#closePergantianModal").attr("disabled", "disabled");
    $("#pergantianModal").data("bs.modal").options.backdrop = "static";
    $("#pergantianModal").data("bs.modal").options.keyboard = false;
    const form_data = new FormData($("#pergantianModalForm")[0]);
    $.ajax({
      url: _url + "inventaris/perbaikan-post/",
      type: "POST",
      data: form_data,
      cache: false,
      processData: false,
      contentType: false,
      success: function (data, textStatus, jqXHR) {
        var _url = $("#_url").val();
        const id_inventaris = $("#id_inventaris").val();
        if ($.isNumeric(data)) {
          window.location =
            _url +
            `inventaris/detail/${id_inventaris}/Detail Pergantian Barang Berhasil Diinput!`;
          // Clear Inputs
          $("#namaBarangLamaPergantianModal").val("");
          $("#namaBarangBaruPergantianModal").val("");
          $("#alasanPergantianModal").val("");
          $("#keteranganPergantianModal").val("");
          $("#pergantianModal").modal("hide");
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
        alert(msg);
        //location.reload();
      },
      complete: function () {
        $("#submitPergantianModalForm").removeAttr("disabled");
        $("#cancelPergantianModal").removeAttr("disabled");
        $("#closePergantianModal").removeAttr("disabled");
        $("#pergantianModal").data("bs.modal").options.backdrop = true;
        $("#pergantianModal").data("bs.modal").options.keyboard = true;
      },
    });
  });

  // Setup Modal Hidden Input for Perbaikan Modal
  $("#datatable").on("click", '[data-target="#perbaikanModal"]', function () {
    const kodeBarang = $(this).data("kode-barang");
    $("#kodeBarangPerbaikanModal").val(kodeBarang);
  });

  // Setup Modal Hidden Input for Pergantian Modal
  $("#datatable").on("click", '[data-target="#pergantianModal"]', function () {
    const kodeBarang = $(this).data("kode-barang");
    const namaBarang = $(this).data("nama-barang");
    $("#kodeBarangPergantianModal").val(kodeBarang);
    $("#namaBarangLamaPergantianModal").val(namaBarang);
  });

  $(document).on("click", ".cdelete", function (e) {
    e.preventDefault();
    var id = this.id;
    bootbox.confirm(
      "Apakah anda yakin untuk menghapus data departemen ini?",
      function (result) {
        if (result) {
          var _url = $("#_url").val();
          window.location.href = _url + "delete/departemen/" + id;
        }
      }
    );
  });
});
