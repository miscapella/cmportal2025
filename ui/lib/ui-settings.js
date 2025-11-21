$(document).ready(function () {

    var _url = $("#_url").val();
    $('#config_animate').change(function() {

        $('#ui_settings').block({ message: null });


      if($(this).prop('checked')){

          $.post( _url+'settings/update_option/', { opt: "animate", val: "1" })
              .done(function( data ) {
                $('#ui_settings').unblock();
                  location.reload();
              });

      }
        else{
          $.post( _url+'settings/update_option/', { opt: "animate", val: "0" })
              .done(function( data ) {
                  $('#ui_settings').unblock();
                  location.reload();
              });
      }
    });


    $('#console_notify_invoice_created').change(function() {

        $('#additional_settings').block({ message: null });


        if($(this).prop('checked')){

            $.post( _url+'settings/update_option/', { opt: "console_notify_invoice_created", val: "1" })
                .done(function( data ) {
                    $('#additional_settings').unblock();
                    location.reload();
                });

        }
        else{
            $.post( _url+'settings/update_option/', { opt: "console_notify_invoice_created", val: "0" })
                .done(function( data ) {
                    $('#additional_settings').unblock();
                    location.reload();
                });
        }
    });


    $('#config_rtl').change(function() {

           $('#ui_settings').block({ message: null });


        if($(this).prop('checked')){

            $.post( _url+'settings/update_option/', { opt: "rtl", val: "1" })
                .done(function( data ) {
                    $('#ui_settings').unblock();
                    location.reload();
                });

        }
        else{
            $.post( _url+'settings/update_option/', { opt: "rtl", val: "0" })
                .done(function( data ) {
                      $('#ui_settings').unblock();
                    location.reload();
                });
        }
    })
	jQuery('#idate, #idate1').datetimepicker({
		minDate:0,
		format: 'd-m-Y H:i'
	});
    $('#idate1').on("focusout", function(e) {
		var from = $("#idate").val().split("-")
		var dt = new Date($("#idate").val().replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
		var dt1 = new Date($('#idate1').val().replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
		if(dt > dt1) {
			alert('Waktu ke-2 tidak boleh lebih awal dari Waktu ke-1');
			$('#idate1').val(dt);
		}
	});

});