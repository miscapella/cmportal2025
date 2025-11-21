$(document).ready(function () {
  $('#emsg').hide();
  $('#kontraktor').select2({
		theme: "bootstrap",
		width: '100%'
	});
	$('#priority').select2({
		theme: "bootstrap",
		width: '100%'
	});

  $(document).on('change', '#kontraktor', function(e) {
    var kode = $(this).val();
    if(kode != ''){
        var _url = $("#_url").val();
        var item = $(this).closest('tr').find(".kode_item");
        $.post(_url + 'pembelian/render-spnk-kontraktor/', {
            kode: kode,
        })
        .done(function (data) {
            var obj = jQuery.parseJSON(data);
            var opt = $('#opt').html();
            $(".sys_tables").find('tr')
            .remove();
            $(".sys_table").find('tbody')
            .append(obj.clist);
    $('.amount').autoNumeric('init',{mDec:0, aSep :'.', aDec : ',', nBracket: '(,)', vMin: -999999999});
            $('.kode_item').select2();
        });
    } else {
        $(".sys_tables").find('tr')
        .remove();
    }
});
})