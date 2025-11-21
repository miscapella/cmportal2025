$(document).ready(function () {
    $("#emsg").hide();
    $("#emsgs").hide();
    var _url = $("#_url").val();
    
    $('#datatable').DataTable({
        "order": [1, 'desc'],
        "pagingType": "full_numbers",
        "pageLength": 25,
        responsive: true,
        autoWidth: false,
        "scrollX": true,
        "processing": true,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "serverSide" : true,
        "ajax": {
          'url' : _url + "serverside/load-datatype/",
          'type' : 'POST',
        },
    });

    $(document).on('click', '.cdelete', function(e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk menghapus datatype ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/datatype/" + id;
           }
        });
    });
});