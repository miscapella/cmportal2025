$(document).on("click", "#approve", function (e) {
    e.preventDefault();
  
    bootbox.confirm(
      "Apakah anda yakin untuk Approve UR ini ?",
      function (result) {
        if (result) {
          var idjs = $("#idtpl").val();
          var _url = $("#_url").val();
  
          var $data = new FormData();
          $data.append("idphp", idjs);
          bootbox.dialog({
            message:
              '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
            closeButton: false,
          });
          $.ajax({
            url: _url + "permintaanbarang/detail-ur-aprv1/",
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
                    window.location = _url + "permintaanbarang/list-ur-aprv/";
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
              alert(msg);
            },
          });
        }
      }
    );
  });
  
  $(document).on("click", "#reject", function (e) {
    e.preventDefault();
    bootbox.confirm("Apakah anda yakin untuk reject PR ini ?", function (result) {
      if (result) {
        bootbox.dialog({
          message:
            '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
          closeButton: false,
        });
        var idjs = $("#idtpl").val();
        var _url = $("#_url").val();
  
        var $data = new FormData();
        $data.append("idphp", idjs);
  
        $.ajax({
          url: _url + "permintaanbarang/detail-ur-reject/",
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
                  window.location = _url + "permintaanbarang/list-ur-aprv/";
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
            alert(msg);
          },
        });
      }
    });
  });
  