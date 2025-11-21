$(document).ready(function () {
    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
           if(result){
               var _url = $("#_url").val();
               // window.location.href = _url + "penjualan/delete/" + id;
           }
        });
    });
    $(".cetak").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Yakin Cetak Bast ?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "penjualan/cetak/" + id;
           }
        });
    });
    $(".cetak1").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Yakin Batal Cetak Bast ?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "penjualan/cetak1/" + id;
           }
        });
    });
    $(".ctk-fkt").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Yakin Cetak Faktur ?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "penjualan/ctk-fkt/" + id;
           }
        });
    });
    $(".ctk-fkt1").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Yakin Batal Cetak Faktur ?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "penjualan/ctk-fkt1/" + id;
           }
        });
    });

	$("#filter").change(function () {
		var name = this.options[this.selectedIndex].text;
		$('#name').attr('placeholder','Filter '+name+' ...');
	});









});