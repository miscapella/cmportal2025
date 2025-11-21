// $('input[type="date"]').val(new Date().toISOString().slice(0, 10));

function escapeRegExp(string) {
  return string.replace(/[.^$*+?()[{|\\]/g, "\\$&"); // $& means the whole matched string
}

function replaceAll(str, find, replace) {
  return str.replace(new RegExp(escapeRegExp(find), "g"), replace);
}

$(document).ready(function () {
  $(".emsg").hide();
  $(".jawaban").select2({
    theme: "bootstrap",
  });
  var current_index = 0;
  var current_section = [1];
  var form_section = current_section[current_index];
  var status_next = 1;
  $(".section").hide();
  $("#section" + current_section[current_index]).show();
  if ($(".section").length == 1) {
    $("#next").hide();
    $("#prev").hide();
    $("#save").show();
  } else {
    $("#prev").hide();
    $("#save").hide();
  }

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
        url: _url + "form/upload-file/",
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

  // $(document).on('click', '#next', function(e) {
  // 	var _url = $("#_url").val();
  // 	var kode = $("#kode").val();
  // 	var isi = [];
  // 	var tipearr = [];
  // 	var sub_section = 0.01;
  // 	$.each($("input[name='chk"+current_section[current_index]+"[]']:checked"), function(){
  // 		var id = current_section[current_index]+sub_section;
  // 		var cid = id.toString();
  // 		cid = cid.replace('.','');
  // 		var tipe = $("#tipe"+cid).val();
  // 		tipearr.push(tipe);
  // 		if(tipe == 'radiobutton'){
  // 			isi.push($("input[name='jawaban"+ cid +"[]']:checked").val());
  // 		} else if(tipe == 'checkbox') {
  // 			var checkbox = [];
  // 			$.each($("input[name='jawaban"+ cid +"[]']:checked"), function(){
  // 				checkbox.push($(this).val());
  // 			});
  // 			isi.push(checkbox.join(";"));
  // 		}
  // 		else if(tipe == 'datetime') {
  // 			var formattanggal = '';
  // 			if ($("#"+cid).val()){
  // 				var tanggalinput = new Date($("#"+cid).val());
  // 				var tanggal = tanggalinput.getDate();
  // 				var bulan = tanggalinput.getMonth()+ 1;
  // 				var tahun = tanggalinput.getFullYear();
  // 				formattanggal = tanggal + '-' + bulan + '-' + tahun;
  // 			}
  // 			var waktuinput = $("#s"+cid).val();
  // 			isi.push(formattanggal + ' ' + waktuinput);
  // 		}
  // 		else {
  // 			isi.push($("#"+cid).val());
  // 		}
  // 		sub_section = sub_section + 0.01;
  // 	});
  // 	isi = isi.join('|');
  // 	tipearr = tipearr.join('|');

  // 	$.post(_url + 'form/next-page/', {
  // 		kode: kode,
  // 		isi: isi,
  // 		tipearr: tipearr,
  // 	})
  // 	.done(function (data) {
  // 		var obj = jQuery.parseJSON(data);
  // 		var start = obj.start;
  // 		var value = obj.value;
  // 		var target = obj.target;
  // 		var require = obj.require;
  // 		var unik = [];
  // 		if(require == 0){
  // 		$.each(start, function(i, item){
  // 			if($.inArray(Math.floor(item), unik) === -1) unik.push(Math.floor(item));
  // 		});
  // 		var status = 0;
  // 		$.each(unik, function(i, item){
  // 			if(current_section[current_index] == item){
  // 				status = 1;
  // 				// alert(start);
  // 				// alert(value);
  // 				$.each(start, function(x, items){
  // 					if(current_section[current_index] == Math.floor(items)){
  // 						var id = items.replace('.','');
  // 						var tipe = $("#tipe"+id).val();
  // 						var cek = '';
  // 						if(tipe == 'radiobutton'){
  // 							cek = $("input[name='jawaban"+ id +"[]']:checked").val()
  // 						} else {
  // 							cek = $("#"+id).val();
  // 						}
  // 						// alert(x + ' - ' + value[x]);
  // 						if(cek == value[x]){
  // 							cek_kosong = 1;
  // 							status_next = 0;
  // 							$('#section'+current_section[current_index]).hide();
  // 							var current = Math.floor(target[x]);
  // 							current_section.push(current);
  // 							current_index = current_index + 1;
  // 							$('#section'+current_section[current_index]).show();
  // 							$('#prev').show();
  // 							$('#next').show();
  // 							// alert(current_section+ '1');
  // 							return false;
  // 						}
  // 					}
  // 				});
  // 				if(status_next == 1){
  // 					status_next = 1;
  // 					$('#section'+current_section[current_index]).hide();
  // 					var current = current_section[current_index] + 1;
  // 					current_section.push(current);
  // 					current_index = current_index + 1;
  // 					$('#section'+current_section[current_index]).show();
  // 					$('#prev').show();
  // 					$('#next').show();
  // 					// alert(current_section+ '2');
  // 				}
  // 				return false;
  // 			}
  // 		});
  // 		if(status == 0){
  // 			if(status_next == 0){
  // 				alert("STATUS SUDAH 0 " + status_next);
  // 				var kurang = 0;
  // 				$.each(target, function(i, item){
  // 					// alert("item " + item);
  // 					if(current_section[current_index] < Math.floor(item)) {
  // 						kurang = kurang + 1;
  // 					}
  // 				});
  // 				var end = current_section[current_index] + kurang;
  // 				// var end = 5;
  // 				// 1, 3, 4
  // 				// alert("current_section " + current_section)
  // 				// 2
  // 				// alert("kurang" + kurang);
  // 				// 2
  // 				// alert("current_index: " + current_index)
  // 				// 6
  // 				alert("end: " + end);
  // 				if(end < $('.section').length){
  // 					$('#section'+current_section[current_index]).hide();
  // 					var current = end + 1;
  // 					current_index = current_index + 1;
  // 					current_section.push(current);
  // 					$('#section'+current_section[current_index]).show();
  // 					$('#prev').show();
  // 					$('#next').show();
  // 					// alert(current_section+ '3');
  // 					end = end + 1;
  // 				}
  // 				if(end == $('.section').length){
  // 					$('#next').hide();
  // 					$('#save').show();
  // 				}

  // 			} else if(status_next == 1){
  // 				$('#section'+current_section[current_index]).hide();
  // 				var current = current_section[current_index] + 1;
  // 				current_index = current_index + 1;
  // 				current_section.push(current);
  // 				$('#section'+current_section[current_index]).show();
  // 				$('#prev').show();
  // 				$('#next').show();
  // 				// alert(current_section+ '4');
  // 				if(current_section[current_index] == $('.section').length){
  // 					$('#next').hide();
  // 					$('#save').show();
  // 				}
  // 			}
  // 		} else if(status == 1){
  // 			if(status_next == 0){
  // 				var kurang = 0;
  // 				$.each(target, function(i, item){
  // 					if(current_section[current_index] < Math.floor(item)) {
  // 						kurang = kurang + 1;
  // 					}
  // 				});
  // 				var end = current_section[current_index] + kurang;
  // 				if(end == $('.section').length){
  // 					$('#next').hide();
  // 					$('#save').show();
  // 				}
  // 			}
  // 		}
  // 		} else {
  // 			$('.overlay').hide();
  // 			var body = $("html, body");
  // 			body.animate({scrollTop:0}, '50', 'swing');
  // 			$("#emsg"+current_section[current_index]).attr('style',  'background-color:#e46f61');
  // 			//$("#emsgbody"+current_section[current_index]).html('jawaban tidak boleh kosong');
  // 			$("#emsgbody"+current_section[current_index]).html(isi);
  // 			$("#emsg"+current_section[current_index]).show('slow');
  // 			jQuery('#emsgbody'+current_section[current_index]).animate({
  // 					scrollTop: jQuery('#emsg'+current_section[current_index]).scrollTop()-150
  // 				}, 500);
  // 			$("#emsg"+current_section[current_index]).delay(5200).fadeOut(500);
  // 		}
  // 		// alert(current_section);
  // 		alert("Setelah" + status);
  // 	});
  // });

  // Edit by steven 15/12/2023
  $(document).on("click", "#next", function (e) {
    var _url = $("#_url").val();
    var kode = $("#kode").val();
    var isi = [];
    var tipearr = [];
    var sub_section = 0.01;
    $.each(
      $("input[name='chk" + current_section[current_index] + "[]']:checked"),
      function () {
        var id = current_section[current_index] + sub_section;
        var cid = id.toString();
        cid = cid.replace(".", "");
        if (cid.length <= 2) {
          cid = cid * 10;
        }
        var tipe = $("#tipe" + cid).val();
        tipearr.push(tipe);
        if (tipe == "radiobutton") {
          isi.push($("input[name='jawaban" + cid + "[]']:checked").val());
        } else if (tipe == "checkbox") {
          var checkbox = [];
          $.each($("input[name='jawaban" + cid + "[]']:checked"), function () {
            checkbox.push($(this).val());
          });
          isi.push(checkbox.join(";"));
        } else if (tipe == "datetime") {
          var formattanggal = "";
          if ($("#" + cid).val()) {
            var tanggalinput = new Date($("#" + cid).val());
            var tanggal = tanggalinput.getDate();
            var bulan = tanggalinput.getMonth() + 1;
            var tahun = tanggalinput.getFullYear();
            formattanggal = tanggal + "-" + bulan + "-" + tahun;
          }
          var waktuinput = $("#s" + cid).val();
          isi.push(formattanggal + " " + waktuinput);
        } else {
          isi.push($("#" + cid).val());
        }
        sub_section = sub_section + 0.01;
      }
    );
    isi = isi.join("|");
    tipearr = tipearr.join("|");
    $.post(_url + "form/next-page/", {
      kode: kode,
      isi: isi,
      section: current_section[current_index],
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      var target_section = Math.floor(obj.target);
      var end_page = obj.end_page;
      var require = obj.require;
      if (require == 0) {
        if (end_page == 0) {
          $("#section" + current_section[current_index]).hide();
          var current = Math.floor(target_section);
          current_section.push(current);
          current_index = current_index + 1;
          $("#section" + current_section[current_index]).show();
          $("#prev").show();
          $("#next").show();
        } else {
          $("#section" + current_section[current_index]).hide();
          var current = Math.floor(target_section);
          current_section.push(current);
          current_index = current_index + 1;
          $("#section" + current_section[current_index]).show();
          $("#prev").show();
          $("#save").show();
          $("#next").hide();
        }
      }
    });
  });

  $(document).on("click", "#prev", function (e) {
    $("#section" + current_section[current_index]).hide();
    current_index = current_index - 1;
    current_section.pop();
    $("#section" + current_section[current_index]).show();
    $("#next").show();
    $("#save").hide();
    if (current_section[current_index] == 1) {
      $("#prev").hide();
    }
  });

  $("#save").click(function (e) {
    e.preventDefault();
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    $(".overlay").show();
    $(this).attr("disabled", "disabled");
    var _url = $("#_url").val();
    var kode = $("#kode").val();
    var jawaban = [];
    var pertanyaan = [];
    var attachment = [];
    var section = 1;
    var last_section = current_section[current_index];
    var require = 0;
    $.each($(".section"), function () {
      var sub_section = 0.01;
      $.each($("input[name='chk" + section + "[]']:checked"), function () {
        var id = section + sub_section;
        var cid = id.toString();
        cid = cid.replace(".", "");
        var tipe = $("#tipe" + cid).val();
        pertanyaan.push($(this).parent().find(".label-pertanyaan").text());
        if (tipe == "radiobutton") {
          jawaban.push($("input[name='jawaban" + cid + "[]']:checked").val());
          if (last_section == section)
            if (!$("input[name='jawaban" + cid + "[]']:checked").val())
              require = 1;
        } else if (tipe == "checkbox") {
          var checkbox = [];
          $.each($("input[name='jawaban" + cid + "[]']:checked"), function () {
            checkbox.push($(this).val());
          });
          jawaban.push(checkbox.join(";"));
          if (last_section == section) if (checkbox == "") require = 1;
        } else if (tipe == "file") {
          // var hasil = $("#"+cid).val().replace(/C:\\fakepath\\/i, 'https://cmportal.capelladaihatsu.co.id/uploads/FORM/');
          // var attach = $("#"+cid).val().replace(/C:\\fakepath\\/i, './uploads/FORM/');
          var hasil = "";
          if ($("#" + cid).val() != "") {
            var hasil =
              "http://192.168.201.180/cmportal/uploads/FORM/" +
              $("#" + cid).val();
            var attach = "./uploads/FORM/" + $("#" + cid).val();
            attachment.push(attach);
          }
          jawaban.push(hasil);
          if (last_section == section)
            if ($("#" + cid).val() == "") require = 1;
        } else if (tipe == "datetime") {
          var formattanggal = "";
          if ($("#" + cid).val()) {
            var tanggalinput = new Date($("#" + cid).val());
            var tanggal = tanggalinput.getUTCDate();
            var bulan = tanggalinput.getUTCMonth() + 1;
            var tahun = tanggalinput.getUTCFullYear();
            formattanggal = tanggal + "-" + bulan + "-" + tahun;
          }
          var waktuinput = $("#s" + cid).val();
          jawaban.push(formattanggal + " " + waktuinput);

          // var hasil = $("#"+cid).val().split('T');
          // var hari = hasil[0].split('-');
          // var tanggal = hari[2] + '-' + hari[1] + '-' + hari[0] + ' ' + hasil[1];
          // if(hasil[0] != 0){
          // 	jawaban.push(tanggal);
          // }
          // else{
          // 	jawaban.push('');
          // }
          if (last_section == section)
            if (!$("#" + cid).val() || !$("#s" + cid).val()) require = 1;
        } else if (tipe == "date") {
          var formattanggal = "";
          if ($("#" + cid).val()) {
            var tanggalinput = new Date($("#" + cid).val());
            var tanggal = tanggalinput.getUTCDate();
            var bulan = tanggalinput.getUTCMonth() + 1;
            var tahun = tanggalinput.getUTCFullYear();
            formattanggal = tanggal + "-" + bulan + "-" + tahun;
          }
          jawaban.push(formattanggal);
          // var hasil = $("#"+cid).val().split('-');
          // var tanggal = hasil[2] + '-' + hasil[1] + '-' + hasil[0];
          // jawaban.push(tanggal);
          if (last_section == section) if (!$("#" + cid).val()) require = 1;
        } else if (tipe == "14harikerja") {
          $.ajax({
            url: "https://dayoffapi.vercel.app/api",
            type: "GET",
            cache: false,
            async: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function (data, textStatus, jqXHR) {
              // Filter only tgl merah (no cuti bersama)
              const tglMerah = data.filter((eachData) => {
                return !eachData.is_cuti;
              });
              let isEnd = false;
              let startDate = new Date(Date.now());
              // let startDate = new Date("2024-06-17");
              let endDate = new Date(startDate);
              let skipDay = 14;
              let starterDate = new Date(endDate);
              while (!isEnd) {
                const setterDate = new Date(endDate);
                // Add skip day
                while (skipDay > 0) {
                  endDate = new Date(
                    setterDate.setDate(setterDate.getDate() + 1)
                  );
                  if (endDate.getDay() != 0 && endDate.getDay() != 6) {
                    skipDay--;
                  }
                }
                // Check tgl merah from current start date to current end date
                const sekarang = tglMerah.filter((eachData) => {
                  const checker = new Date(eachData.tanggal);
                  if (checker.getDay() != 0 && checker.getDay() != 6) {
                    return checker > starterDate && checker <= endDate;
                  }
                });
                skipDay = sekarang.length;
                if (skipDay == 0) {
                  isEnd = true;
                }
                starterDate = endDate;
              }
              let formattanggal = "";
              var tanggal = endDate.getDate();
              var bulan = endDate.getMonth() + 1;
              var tahun = endDate.getFullYear();
              formattanggal = tanggal + "-" + bulan + "-" + tahun;
              jawaban.push(formattanggal);
            },
          });
        } else {
          jawaban.push($("#" + cid).val());
          if (last_section == section)
            if ($("#" + cid).val() == "") require = 1;
        }
        sub_section = sub_section + 0.01;
      });
      section = section + 1;
    });
    jawaban = jawaban.join("|");
    pertanyaan = pertanyaan.join("|");
    var $data = new FormData();
    $data.append("jawaban", jawaban);
    $data.append("pertanyaan", pertanyaan);
    $data.append("require", require);
    $data.append("attachment", attachment);
    $data.append("kode", kode);
    bootbox.confirm("Klik OK Untuk SIMPAN", function (result) {
      if (result) {
        bootbox.dialog({
          message:
            '<div class="text-center"><i class="fas fa-spinfa-spinner"></i> Loading...</div>',
          closeButton: false,
        });
        $.ajax({
          url: _url + "form/add-input-post/",
          type: "POST",
          data: $data,
          cache: false,
          //dataType: 'json',
          processData: false, // Don't process the files
          contentType: false, // Set content type to false as jQuery will tell the server its a query string request
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
                  window.location = _url + "form/list-input/";
                },
              });
            } else {
              bootbox.hideAll();
              $("#save").removeAttr("disabled");
              $(".overlay").hide();
              var body = $("html, body");
              body.animate({ scrollTop: 0 }, "50", "swing");
              $("#emsg" + last_section).attr(
                "style",
                "background-color:#e46f61"
              );
              $("#emsgbody" + last_section).html(obj.msg);
              $("#emsg" + last_section).show("slow");
              jQuery("#emsgbody" + last_section).animate(
                {
                  scrollTop: jQuery("#emsg" + last_section).scrollTop() - 150,
                },
                500
              );

              $("#emsg" + last_section)
                .delay(5200)
                .fadeOut(500);
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
            //location.reload();
          },
        });
      } else {
        $("#save").removeAttr("disabled");
      }
    });
  });
});
