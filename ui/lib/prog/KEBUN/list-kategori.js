$(document).ready(function () {
    $('.table').DataTable();

    $(document).on('click', '.cdelete', function(e) {
		e.preventDefault();
        var id = this.id;
        bootbox.confirm('Apakah anda yakin untuk menghapus data bagian ini?', function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/kategori/" + id;
           }
        });
   	});
});