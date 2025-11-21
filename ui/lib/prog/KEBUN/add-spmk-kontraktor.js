$(document).ready(function () {
  $("#emsg").hide();
  $(".kode_kontraktor").select2({
    theme: "bootstrap",
    width: "100%",
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
    var spesifikasi = [];
    var block = [];
    var ha = [];
    var pkk = [];
    var kode_kontraktor1 = [];
    var harga1 = [];
    var keterangan_kontraktor1 = [];
    var file_kontraktor1 = [];
    var kode_kontraktor2 = [];
    var harga2 = [];
    var keterangan_kontraktor2 = [];
    var file_kontraktor2 = [];
    var kode_kontraktor3 = [];
    var harga3 = [];
    var keterangan_kontraktor3 = [];
    var file_kontraktor3 = [];
    var kontraktorpilihan = [];
    $.each($("input[name='chk[]']:checked"), function () {
      var kode = $(this)
        .closest("tr")
        .find("input[name='kontraktorid[]']")
        .val();
      spesifikasi.push(
        $(this).closest("tr").find("input[name='spesifikasi[]']").val()
      );
      block.push($(this).closest("tr").find("input[name='block[]']").val());
      ha.push($(this).closest("tr").find("input[name='ha[]']").val());
      pkk.push($(this).closest("tr").find("input[name='pkk[]']").val());
      kode_kontraktor1.push(
        $(this)
          .closest("tr")
          .find("select[name='kode_kontraktor1[]'] option")
          .filter(":selected")
          .val()
      );
      harga1.push($(this).closest("tr").find("input[name='harga1[]']").val());
      keterangan_kontraktor1.push(
        $(this)
          .closest("tr")
          .find("input[name='keterangan_kontraktor1[]']")
          .val()
      );
      file_kontraktor1.push(
        $(this).closest("tr").find("input[name='file_kontraktor1[]']").val()
      );
      kode_kontraktor2.push(
        $(this)
          .closest("tr")
          .find("select[name='kode_kontraktor2[]'] option")
          .filter(":selected")
          .val()
      );
      harga2.push($(this).closest("tr").find("input[name='harga2[]']").val());
      keterangan_kontraktor2.push(
        $(this)
          .closest("tr")
          .find("input[name='keterangan_kontraktor2[]']")
          .val()
      );
      file_kontraktor2.push(
        $(this).closest("tr").find("input[name='file_kontraktor2[]']").val()
      );
      kode_kontraktor3.push(
        $(this)
          .closest("tr")
          .find("select[name='kode_kontraktor3[]'] option")
          .filter(":selected")
          .val()
      );
      harga3.push($(this).closest("tr").find("input[name='harga3[]']").val());
      keterangan_kontraktor3.push(
        $(this)
          .closest("tr")
          .find("input[name='keterangan_kontraktor3[]']")
          .val()
      );
      file_kontraktor3.push(
        $(this).closest("tr").find("input[name='file_kontraktor3[]']").val()
      );
      kontraktorpilihan.push(
        $(this)
          .closest("tr")
          .find("input[name='" + kode + "kontraktorpilihan[]']:checked")
          .val()
      );
    });
    var $data = new FormData();
    $data.append("spesifikasi", spesifikasi);
    $data.append("block", block);
    $data.append("ha", ha);
    $data.append("pkk", pkk);
    $data.append("kode_kontraktor1", kode_kontraktor1);
    $data.append("harga1", harga1);
    $data.append("keterangan_kontraktor1", keterangan_kontraktor1);
    $data.append("file_kontraktor1", file_kontraktor1);
    $data.append("kode_kontraktor2", kode_kontraktor2);
    $data.append("harga2", harga2);
    $data.append("keterangan_kontraktor2", keterangan_kontraktor2);
    $data.append("file_kontraktor2", file_kontraktor2);
    $data.append("kode_kontraktor3", kode_kontraktor3);
    $data.append("harga3", harga3);
    $data.append("keterangan_kontraktor3", keterangan_kontraktor3);
    $data.append("file_kontraktor3", file_kontraktor3);
    $data.append("kontraktorpilihan", kontraktorpilihan);
    $data.append("idate", $("#idate").val());
    $data.append("no_spmk", $("#no_spmk").val());
    bootbox.confirm(
      "Apakah anda yakin untuk mengubah SPmK ?",
      function (result) {
        if (result) {
          bootbox.dialog({
            message:
              '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
            closeButton: false,
          });
          $.ajax({
            url: _url + "pembelian/kontraktor-spmk-post/",
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
                      "pembelian/list-spmk-pending/SPmK Berhasil Ditambah";
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
      }
    );
  });
});
