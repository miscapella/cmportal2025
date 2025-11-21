$(document).ready(function () {
	$('#approve').on('click',function (e) {
		var _url = $("#_url").val();
		var uid = $("#uid").val();
		var token = $("#token").val();
		var isi = $("#isi").val();
		$(".container *").attr("disabled", "disabled");
		$.post(_url + 'form-api/comment-approve-form/', {
			uid: uid,
			token:token,
			isi:isi,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			alert(obj);
			window.location = _url + 'login/';
		})
	});
	$('#reject').on('click',function (e) {
		var _url = $("#_url").val();
		var uid = $("#uid").val();
		var token = $("#token").val();
		var isi = $("#isi").val();
		$(".container *").attr("disabled", "disabled");
		$.post(_url + 'form-api/comment-reject-form/', {
			uid: uid,
			token:token,
			isi:isi,
		})
		.done(function (data) {
			var obj = jQuery.parseJSON(data);
			alert(obj);
			window.location = _url + 'login/';
		})
	});
});