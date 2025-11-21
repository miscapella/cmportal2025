$(document).ready(function () {
	let _url = $("#_url").val();
	let uid = $("#uid").val();
	let token = $("#token").val();

	$('#approve').on('click', function () {
		let isi = $("#isi").val();
		$(".container *").attr("disabled", "disabled");
		$.post(_url + 'gas-api/comment-ur-approve/', {
			uid: uid,
			token: token,
			isi: isi
		})
		.done(function (data) {
			$(".container *").attr("disabled", false);
			let obj = jQuery.parseJSON(data);
			if ($.isNumeric(obj.dataval)) {
				alert(obj.msg);
				window.location = _url + 'login/';
			} else {
				alert(obj.msg);
			}
		})
	});

	$('#reject').on('click', function () {
		let isi = $("#isi").val();
		$(".container *").attr("disabled", "disabled");
		$.post(_url + 'gas-api/comment-ur-reject/', {
			uid: uid,
			token: token,
			isi: isi
		})
		.done(function (data) {
			$(".container *").attr("disabled", false);
			let obj = jQuery.parseJSON(data);
			if ($.isNumeric(obj.dataval)) {
				alert(obj.msg);
				window.location = _url + 'login/';
			} else {
				alert(obj.msg);
			}
		})
	});
});