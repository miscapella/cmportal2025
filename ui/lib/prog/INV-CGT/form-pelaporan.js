$(document).ready(function () {
  $(".emsg").hide();
  $("#item_select").select2({
    width: 200,
    minimumResultsForSearch: -1,
  });
  $("#komponen_select").select2({
    width: 200,
    minimumResultsForSearch: -1,
  });

  if ($("#komponen_check_box").is(":checked")) {
    $("#form-group-komponen").show();
  } else {
    $("#form-group-komponen").hide();
  }

  $("#komponen_check_box").change(function () {
    if ($(this).is(":checked")) {
      $("#form-group-komponen").show();
    } else {
      $("#form-group-komponen").hide();
    }
  });

  $("#item_select").change(function () {
    const _url = $("#_url").val();
    const itemSelect = $("#item_select").find(":selected").val();
    const kodeItem = itemSelect.split('|')[0];
    const $data = new FormData();
    $data.append("kode_item", kodeItem);
    $.ajax({
      url: _url + "serverside/load-komponen-by-kodeitem/",
      type: "POST",
      data: $data,
      cache: true,
      processData: false,
      contentType: false,
      success: function (data, textStatus, jqXHR) {
        var obj = jQuery.parseJSON(data);
        if (obj.ada_komponen) {
          $("#komponen_select").html(obj.opt);
          $("#komponen_check_box").attr("disabled", false);
        } else {
          $("#komponen_check_box").attr("disabled", true);
          $("#komponen_check_box").attr("checked", false);
          $("#form-group-komponen").hide();
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
    });
  });

  $("#submit").click(function (e) {
    e.preventDefault();
    $("#submit").attr('disabled', true);
    const _url = $("#_url").val();
    const [kodeInventaris, namaInventaris] = $("#inventaris").val().split('|');
    const selectedItem = $("#item_select").find(":selected").val();
    const [kodeItem = "", namaItem = ""] = selectedItem ? selectedItem.split('|'): ["", ""];
    const selectedKomponen = $("#komponen_select").find(":selected").val();
    const [kodeKomponen = "", namaKomponen = ""] = selectedKomponen ? selectedKomponen.split('|') : ["", ""];
    const detailPermasalahan = $("#detail_permasalahan").val();
    const form_data = new FormData();
    form_data.append('kode_inventaris', kodeInventaris);
    form_data.append('nama_inventaris', namaInventaris);
    form_data.append('kode_item', kodeItem);
    form_data.append('nama_item', namaItem);
    form_data.append('kode_komponen', kodeKomponen);
    form_data.append('nama_komponen', namaKomponen);
    form_data.append('detail_permasalahan', detailPermasalahan);
    $.ajax({
      url: _url + "inventaris/form-pelaporan-post/",
      type: "POST",
      data: form_data,
      cache: false,
      processData: false,
      contentType: false,
      success: function (data, textStatus, jqXHR) {
        var obj = jQuery.parseJSON(data);
        console.log(obj);
        if ($.isNumeric(obj)) {
          const idInventaris = $("#id_inventaris").val();
          window.location =
            _url + `inventaris/home/${idInventaris}/Form Pelaporan Berhasil Ditambahkan!`;
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
        alert(msg);
        //location.reload();
      },
      complete: function() {
        $("#submit").attr("disabled", false);
      }
    });
  });
});
