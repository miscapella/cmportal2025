function cekOto(nilai) {
    var $data = new FormData();
    var kode = document.getElementById(nilai);
    var kode_group = document.getElementById('kode_group').value;
    var _url = $("#_url").val();
    var item_check = [];
    item_check[0]=nilai;
    $data.append('item',item_check);
    $data.append('kode_group',kode_group);
    
    if(kode.checked){
        $.ajax({
            url: _url + 'settings/group-oto-tambah/',
            type: 'POST',
            data: $data,
            cache: false,
//			dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                $('#ibox_form').unblock();
                var body = $("html, body");
                body.animate({scrollTop:0}, '1000', 'swing');
                $("#emsgbody").html(data);
                $("#emsg").show("slow");
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                location.reload();
            }
        });
    }else{
        $.ajax({
            url: _url + 'settings/group-oto-hapus/',
            type: 'POST',
            data: $data,
            cache: false,
//			dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                $('#ibox_form').unblock();
                var body = $("html, body");
                body.animate({scrollTop:0}, '1000', 'swing');
                $("#emsgbody").html(data);
                $("#emsg").show("slow");
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                location.reload();
            }
        });
    }
}

$(document).ready(function () {
    var _url = $("#_url").val();
    $("#emsg").hide();

    $("#select_all").click(function (e) {
		var select_all = document.getElementById("select_all");
        var select = document.getElementsByClassName("checkbox");
        var $data = new FormData();
        var _url = $("#_url").val();
        $data.append('kode_group',$("#kode_group").val());
        var item_check = [];
        
		if(select_all.checked){
            for (let i = 0; i < select.length; i++) {
                item_check[i]=select[i].value;
                select[i].checked = true;
            }
            $data.append('item',item_check);
            $.ajax({
				url: _url + 'settings/group-oto-tambah/',
				type: 'POST',
				data: $data,
				cache: false,
	//			dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				success: function(data, textStatus, jqXHR)
				{
					$('#ibox_form').unblock();
					var body = $("html, body");
					body.animate({scrollTop:0}, '1000', 'swing');
					$("#emsgbody").html(data);
					$("#emsg").show("slow");
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					location.reload();
				}
			});
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
            $.ajax({
				url: _url + 'settings/group-oto-hapusall/',
				type: 'POST',
				data: $data,
				cache: false,
	//			dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				success: function(data, textStatus, jqXHR)
				{
					$('#ibox_form').unblock();
					var body = $("html, body");
					body.animate({scrollTop:0}, '1000', 'swing');
					$("#emsgbody").html(data);
					$("#emsg").show("slow");
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					location.reload();
				}
			});
        }
	});
	$(".checkbox").click(function (e) {
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
	});

//    $("#submit").click(function (e) {
//        e.preventDefault();
//		$('#ibox_form').block({ message: null });
//		var _url = $("#_url").val();
//        var kode_group = $("#kode_group").val();
//		var $data = new FormData();
//		var item_check = [];
//		var i=0;
//		var box = $("input[name='no']:checked");
//		$.each($(box), function() {
//			item_check[i]=$(this).val();
//			i++;
//		});
//		if(i>0) {
//			$data.append('item',item_check);
//			$data.append('id',$("#id").val());
//			$.ajax({
//				url: _url + 'settings/group-oto-simpan/' + kode_group,
//				type: 'POST',
//				data: $data,
//				cache: false,
//	//			dataType: 'json',
//				processData: false, // Don't process the files
//				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
//				success: function(data, textStatus, jqXHR)
//				{
//					$('#ibox_form').unblock();
//					var body = $("html, body");
//					body.animate({scrollTop:0}, '1000', 'swing');
//					$("#emsgbody").html(data);
//					$("#emsg").show("slow");
//				},
//				error: function(jqXHR, textStatus, errorThrown)
//				{
//					location.reload();
//				}
//			});
//		}
//		else {
//			alert("Tidak ada yang dipilih !");
//		}
//		});
});