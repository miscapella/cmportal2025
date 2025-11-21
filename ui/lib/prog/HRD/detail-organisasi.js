$(document).ready(function () {
    $("#parent_valid_dari > p").text(formattedDate($("#parent_valid_dari > p").text()));
    $("#parent_valid_sampai > p").text(formattedDate($("#parent_valid_sampai > p").text()));
    $("#valid_dari").val(formattedDate($("#valid_dari").val()));
    $("#valid_sampai").val(formattedDate($("#valid_sampai").val()));
});

function formattedDate(time) {
    return new Date(time).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
}