$(document).ready(function () {
    $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm(_L['are_you_sure'], function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "pesanan/delete/" + id;
           }
        });
    });

	$("#filter").change(function () {
		var name = this.options[this.selectedIndex].text;
		$('#name').attr('placeholder','Filter '+name+' ...');
	});









});