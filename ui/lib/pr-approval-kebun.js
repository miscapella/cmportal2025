$(document).ready(function () {
	let _url = $("#_url").val();
	let uid = $("#uid").val();
	let token = $("#token").val();
	let kodedept = $("#kodedept").val();
	let approval = $("#approval").val();


	$('#approve').on('click', function () {
		let isi = $("#isi").val();
		$(".container *").attr("disabled", "disabled");
		$.post(_url + 'kebun-api/comment-pr-approve/', {
			uid: uid,
			token: token,
			isi: isi,
			kodedept: kodedept,
			approval: approval
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
		$.post(_url + 'kebun-api/comment-pr-reject/', {
			uid: uid,
			token: token,
			isi: isi,
			kodedept: kodedept,
			approval: approval
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