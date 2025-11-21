$(document).ready(function () {
    $("#emsg").hide();
    $("#emsgs").hide();
    var _url = $("#_url").val();
    $('#datatable').DataTable({
        "order": [1, 'desc'],
        "pagingType": "full_numbers",
        "pageLength": 25,
        "scrollX": false,
        "processing": true,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "serverSide" : true,
        "ajax": {
            'url' : _url + "serverside/otoritas-user/",
            'type' : 'POST',
        },
    });

   
});