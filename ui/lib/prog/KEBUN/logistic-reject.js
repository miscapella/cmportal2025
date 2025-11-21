$(document).ready(function () {
    var _url = $("#_url").val();
    

    $("#btnsimpan").click(function (e) {
        e.preventDefault();
        const pesan = $("#pesan").val()
        const _id = $("#idtpl").val();

        rows.forEach(function(row) {
			var rowdata={};
            
        })

        $.post(_url + 'pengeluaranbarang/reject-post/', {
            pesan: pesan,
            _id: _id
        })

        .done(function(response) {
            console.log('Success:', response);
            alert('Data berhasil dikirim!');
          })
        
        .fail(function(error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim data.');
          });

    });


});