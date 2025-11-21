$(document).ready(function () {
	$('#emsg').hide();
	$('#emsgModal').hide();


	$(document).on('click', '.hapus', function(e) {
        $(this).closest('tr').fadeOut(300, function(){
            $(this).closest('tr').remove();
        });
    });
	
	$("#save").click(function (e) {
		e.preventDefault();
		var _url = $("#_url").val();
		var tabledata=[];
		//var tabledata = new FormData();
		var rows=document.querySelectorAll("#list-mintabarang tbody tr")

		rows.forEach(function(row) {
			var rowdata={};
			var cells=row.querySelectorAll("td");
			rowdata.kode_item=cells[1].textContent.trim();
			
			rowdata.qty_req=cells[3].textContent.trim();
			rowdata.qty_on_hand=cells[4].textContent.trim();			
			rowdata.qty=cells[5].querySelector("input").value;
			
			rowdata.no_mintabarang=cells[6].textContent.trim();
			tabledata.push(rowdata);
		});
		
		$.post(_url + 'pengeluaranbarang/simpan/', {
			data: JSON.stringify(tabledata)			
		})
		.done(function (data, textStatus, jqXHR) { 						
			var obj = jQuery.parseJSON(data);			
			if ($.isNumeric(obj.dataval)) {
				$('.overlay').hide();
				var body = $("html, body");
				bootbox.alert({
					message: obj.msg,
					backdrop: true,
					timeout : 2000,
					callback: function(){ 
						window.location = _url + 'pengeluaranbarang/list-keluarbarang/';
					}
				});
			} else {
				console.log(obj.msg);
				$('.overlay').hide();
				bootbox.alert({
					message: obj.msg,
					backdrop: true,
					timeout : 2});
			};
				
		});
	});

	$("#add").click(function (e) {				
		var nomor_ur = $("#nomor_ur").val();
		var _url = $("#_url").val();
		var tabellist=document.getElementById("list-mintabarang");
		var rows=tabellist.getElementsByTagName("tr");

		for (var i=1; i<rows.length; i++) {			
			var cells = rows[i].getElementsByTagName("td");
			var nomor_ur_tabel=cells[6].innerText.trim();
			
			if(nomor_ur==nomor_ur_tabel){
				alert("Data sudah ditambahkan");
				return;
			}
		}
		
		$.post(_url + 'pengeluaranbarang/add-ur/', {
			nomor_ur: nomor_ur})
		.done(function (data) {
			$("#list-mintabarang").find('tbody')
			.append(data);
		});        
    });


});