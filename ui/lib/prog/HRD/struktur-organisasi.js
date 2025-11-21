$(document).ready(function () {
  var _url = $("#_url").val();

  $.ajax({
    url: _url + "serverside/load-organisasi/",
    type: "GET",
    success: function (response) {
      $(".just-padding").append(response);

      $(document).on("click", ".list-group-item", function (e) {
        const id = (e.currentTarget.id).substring(2);
        if ($(`#${id}`).hasClass("in") || $(`#${id}`).hasClass("collapse")) {
          $(".glyphicon", this).toggleClass("glyphicon-chevron-right").toggleClass("glyphicon-chevron-down");
        }

        $(`#${id}`).collapse("toggle");

        $(".list-group-item").removeClass("selected");
        $(this).addClass("selected");
      });
    },
    error: function (xhr, status, error) {
      alert("Error: " + xhr.status + ": " + xhr.statusText);
    }
  });

  $(document).on("click", ".cdelete", function (e) {
    e.preventDefault();
    var id = this.id;
    bootbox.confirm("Apakah anda yakin untuk menghapus data organisasi ini?<br><strong>Semua anakan dari organisasi juga akan terhapus<strong>", function (result) {
      if (result) {
        var _url = $("#_url").val();
        window.location.href = _url + "delete/organisasi/" + id;
      }
    });
  });
});